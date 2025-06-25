jQuery(function ($) {
  "use strict";
  console.log("index.js loaded and $(document).ready. Current page:", window.location.href);
  const mwFormKey = "255"

  // Datepicker
  if ($.datepicker) {
    $.datepicker.setDefaults({
      showMonthAfterYear: true,
      yearSuffix: ''
    });
  } else {
    console.warn("jQuery UI Datepicker is not loaded.");
  }

  // YYYY-MM-DD
  function getTodayDateString() {
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, "0");
    const dd = String(today.getDate()).padStart(2, "0");
    return `${yyyy}-${mm}-${dd}`;
  }

  // MW WP Form
  $(document).on("mwform.ready", function (event) {
    console.log("mwform.ready event triggered");
  
    let $form = $(event.target).closest(`form[data-mwform-formkey="${mwFormKey}"], form#mw_wp_form_${mwFormKey}`);

    if (!$form.length && $(event.target).is(`form[data-mwform-formkey="${mwFormKey}"], form#mw_wp_form_${mwFormKey}`)) {
        $form = $(event.target);
    }

    if (!$form.length) {
      console.log("MW WP Form ready event, but target form not found for key:", mwFormKey);
      return;
    }
    console.log("MW WP Form ready for key: " + mwFormKey, $form.attr('id'));

    // 日付ピッカー
    if ($.fn.datepicker) {
      $form.find('input[type="date"], .datepicker').each(function() {
        if (!$(this).hasClass('hasDatepicker')) {
          $(this).datepicker({ dateFormat: 'yy/mm/dd' });
        } else {
          $(this).datepicker('option', 'dateFormat', 'yy/mm/dd');
        }
      });
      $form.find('#checkin_date').datepicker('option', { dateFormat: 'yy/mm/dd' });
    }

    // チェックイン日/チェックアウト日
    const todayString = getTodayDateString();
    const $checkinDateInput = $form.find('[name="checkin_date"]');
    const $checkoutDateInput = $form.find('[name="checkout_date"]');

    if ($checkinDateInput.length) {
      $checkinDateInput.attr("min", todayString);
      $checkinDateInput.on("change", function () {
        const selectedCheckinDate = $(this).val();
        if (selectedCheckinDate && $checkoutDateInput.length) {
          $checkoutDateInput.attr("min", selectedCheckinDate);
          const currentCheckoutDate = $checkoutDateInput.val();
          if (currentCheckoutDate && new Date(currentCheckoutDate) < new Date(selectedCheckinDate)) {
            $checkoutDateInput.val("");
          }
        } else if ($checkoutDateInput.length) {
          $checkoutDateInput.attr("min", todayString);
        }
      });
    }

    if ($checkoutDateInput.length) {
      $checkoutDateInput.attr("min", todayString);
    }

    // ゴースト要素対策
    // $('#ui-datepicker-div').hide();
  });

  // MW WP Form(エラー時スクロール/メッセージ処理)
  $(document).on("mwform.validate", function (event, Element) {
    if (!Element || !Element.form) {
      console.warn("MW WP Form validate event, but Element or Element.form is undefined.");
      return;
    }

    const $form = $(Element.form);
    const formKeyFromData = $form.data("mwform-formkey") ? $form.data("mwform-formkey").toString() : null;
    const formId = $form.attr("id");

    if (formKeyFromData !== mwFormKey && formId !== `mw_wp_form_${mwFormKey}`) {
      return;
    }

    $form.find('.form_input, .form_select, .form_textarea').removeClass('mwform-is-error');
    $form.find('.custom-validation-message').remove();
    $form.find('.form_item').removeClass('has-error');

    if (!Element.isValid) {
      console.log("MW WP Form validation FAILED for key: " + mwFormKey + " on form: " + ($form.attr('id') || formKeyFromData));
      if (Element.UnderstandInvalidInputKEY && typeof Element.UnderstandInvalidInputKEY === 'object') {
        $.each(Element.UnderstandInvalidInputKEY, function(inputName) {
          const $inputField = $form.find(`[name="${inputName}"]`);
          const $formItem = $inputField.closest('.form_item');
          const $inputWrapper = $inputField.closest('.input_field_wrapper');

          $inputField.addClass('mwform-is-error');
          $formItem.addClass('has-error');

          // .mwform-error-textがあれば表示
          const $mwErrorText = ($inputWrapper.length ? $inputWrapper : $formItem).find('.mwform-error-text');

          if ($mwErrorText.length && $mwErrorText.is(':hidden')) {
            $mwErrorText.show();
          }
        });
      }
      // 最初のエラーへスクロール
      const $firstErrorField = $form.find(".mwform-is-error:first, .mwform-error-text:visible:first")
                               .closest('.form_item').find('input:not([type="hidden"]), select, textarea').first();
      if ($firstErrorField.length) {
        let headerHeightError = 0;
        const $fixedHeader = $('.header');
        if ($fixedHeader.length && ($fixedHeader.css('position') === 'fixed' || $fixedHeader.css('position') === 'sticky')) {
            headerHeightError = $fixedHeader.outerHeight(true);
        } else {
            headerHeightError = ($(window).width() > 1239) ? 178 : 72;
        }
        $("html, body").animate({
          scrollTop: $firstErrorField.offset().top - headerHeightError - 20
        }, 500);
      }
    }
  });

  // お部屋タブ切り替え
  const $tabs = $(".room_select_list .tab");
  const $contents = $(".rooms .room_view");

  if ($tabs.length && $contents.length) {
    $tabs.on("click", function () {
      const $clickedTab = $(this);
      if ($clickedTab.hasClass("active")) return;
      $tabs.removeClass("active");
      $clickedTab.addClass("active");
      $contents.removeClass("active");
      const tabId = $clickedTab.attr("id");
      $(`#${tabId}_content`).addClass("active");
    });
  }

  // --- ヘッダーハイド ---
  function initHeaderHide() {

    const $header = $(".header");

    if (!$header.length) {
      console.warn("Header Hide Function: Element '.header' NOT FOUND. Hide function will not work.");
      return;
    }

    console.log("Header Hide Function: Initializing or Re-initializing...");

    let lastScroll = $(window).scrollTop();

    $(window).off('scroll.headerHide').on('scroll.headerHide', function () {

      const currentScroll = $(this).scrollTop();

      if (currentScroll > 5) {
        if (currentScroll > lastScroll) {
          $header.addClass("header--hide");
        } else {
          $header.removeClass("header--hide");
        }
      } else {
        $header.removeClass("header--hide");
      }

      lastScroll = currentScroll <= 0 ? 0 : currentScroll;
    });

    if ($(window).scrollTop() <= 5) {
        $header.removeClass("header--hide");
    } else {
    }

    console.log("Header Hide Function: Listener attached. LastScroll:", lastScroll);
  }

  // 四季セクションスライダー
  const $thumbsContainer = $(".season_gallery_thumbs");

  if ($thumbsContainer.length && $thumbsContainer.closest(".custom_season_gallery").length) {
    const $originalThumbs = $thumbsContainer.children(".gallery_item.thumb");
    const thumbCount = $originalThumbs.length;

    if (thumbCount > 0) {
      $originalThumbs.clone().appendTo($thumbsContainer);
      $originalThumbs.clone().appendTo($thumbsContainer);
      let totalWidthOriginalSet = 0;
      $thumbsContainer.children(".gallery_item.thumb").slice(0, thumbCount).each(function () {
        totalWidthOriginalSet += $(this).outerWidth(true);
      });
      $thumbsContainer.css("width", totalWidthOriginalSet * 3 + "px");
      const animationDistance = totalWidthOriginalSet;
      const animationDuration = Math.max(30, thumbCount * 2.5); // アニメーション時間(秒)
      const animationName = "slideGalleryThumbsAnimation";
      $("#dynamicSliderStyles").remove();
      $("head").append(
        `<style id="dynamicSliderStyles">
          @keyframes ${animationName} {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-${animationDistance}px); }
          }
          .season_gallery_thumbs.is-sliding {
            animation: ${animationName} ${animationDuration}s linear infinite;
          }
        </style>`
      );
      $thumbsContainer.addClass("is-sliding");
    }
  }

  // ハンバーガーメニュー
  const $hamburgerButton = $(".hamburger-button");
  const $mobileNav = $(".mobile-nav");
  const $body = $("body");

  if ($hamburgerButton.length && $mobileNav.length) {
    $hamburgerButton.on("click", function () {
      const isActive = $(this).hasClass("is-active");
      $(this).toggleClass("is-active");
      $mobileNav.toggleClass("is-open");
      $body.toggleClass("menu-open");
      $(this).attr("aria-expanded", String(!isActive));
      $mobileNav.attr("aria-hidden", String(isActive));
    });
  }

  // モバイルメニュー内のリンクをクリックしたときに必ずメニューを閉じる
  $('.mobile-nav a').on('click', function () {
    $('.hamburger-button').removeClass('is-active');
    $('.mobile-nav').removeClass('is-open');
    $('body').removeClass('menu-open');
    $('.hamburger-button').attr("aria-expanded", "false");
    $('.mobile-nav').attr("aria-hidden", "true");
    $('.hamburger-button').focus();
  });

  // ページ内遷移
  $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function(event) {
    if (
      location.pathname.replace(/^\//, "") === this.pathname.replace(/^\//, "") &&
      location.hostname === this.hostname
    ) {
      let hash = this.hash;
      let targetElem = null;
      if (hash) {
        // document.getElementByIdのみ利用
        targetElem = document.getElementById(hash.slice(1));
        if (!targetElem) {
          // name属性で探す（jQueryセレクタは使わない）
          var nameMatch = document.getElementsByName(hash.slice(1));
          if (nameMatch && nameMatch.length) {
            targetElem = nameMatch[0];
          }
        }
      }
      if (targetElem) {
        event.preventDefault();
        let headerHeight = 0;
        const $fixedHeader = $(".header");
        if (
          $fixedHeader.length &&
          ($fixedHeader.css("position") === "fixed" ||
            $fixedHeader.css("position") === "sticky")
        ) {
          headerHeight = $fixedHeader.outerHeight(true);
        }
        const additionalOffset = 0;
        let scrollPosition = $(targetElem).offset().top;
        $('html, body').animate(
          {
            scrollTop: scrollPosition,
          },
          500,
          "swing"
        );
      }
    }
  });

  // ページロード時処理
  initHeaderHide();

  $(window).on('load', function () {
    console.log("Window fully loaded. Re-running initHeaderHide and hash scroll.");

    initHeaderHide();

    // 他ページから遷移
    const hash = window.location.hash;

    if (hash) {
      setTimeout(function() {
        let targetElem = document.getElementById(hash.slice(1));
        if (!targetElem) {
          var nameMatch = document.getElementsByName(hash.slice(1));
          if (nameMatch && nameMatch.length) {
            targetElem = nameMatch[0];
          }
        }
        if (targetElem) {
          console.log("Scrolling to hash on load:", hash);
          let headerHeight = 0;
          const $fixedHeader = $('.header');
          if ($fixedHeader.length && ($fixedHeader.css('position') === 'fixed' || $fixedHeader.css('position') === 'sticky')) {
            headerHeight = $fixedHeader.outerHeight(true);
          }
          const additionalOffset = 0;
          let scrollPosition = $(targetElem).offset().top;
          if (scrollPosition < 0) scrollPosition = 0;
          $('html, body').stop().animate({
            scrollTop: scrollPosition
          }, 500, 'swing');
        } else {
          console.warn("Target element for hash not found on load:", hash);
        }
      }, 500);
    }
  });

  $('#ui-datepicker-div').hide();

  /* クリック/入力でバリデーションメッセージ隠す */
  (function instantHideError(){
    const target = '.input_field_wrapper input, \
                    .input_field_wrapper select, \
                    .input_field_wrapper textarea';

    // focus → 入力を始めた瞬間走らせる
    $(document).on('focus input change', target, function(){
      const $field   = $(this);
      const $wrapper = $field.closest('.input_field_wrapper');

      $wrapper.find('span.error, .mwform-error-text, .custom-validation-message')
              .fadeOut(150);

      $field.removeClass('mwform-is-error');

      $field.closest('.form_item').removeClass('has-error');
    });
  })();

  /* 選択されていない状態にplaceholderクラス付与 */
  function togglePlaceholder($sel){
    if($sel.val()==='' || $sel.val()===null){
      $sel.addClass('placeholder');
    }else{
      $sel.removeClass('placeholder');
    }
  }

  $(document).ready(function(){
    const $selects = $('.form_select');

    $selects.each(function(){ togglePlaceholder($(this)); });

    $(document).on('change', '.form_select', function(){
      togglePlaceholder($(this));
    });
  });
});