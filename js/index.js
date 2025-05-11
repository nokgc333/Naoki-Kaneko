$(document).ready(function() {
    // タブ要素/コンテンツ要素取得
    const $tabs = $('.room_select_list .tab');
    const $contents = $('.rooms .room_view');

    // タブクリック時
    $tabs.on('click', function() {
        // クリックされたタブ
        const $clickedTab = $(this);

        // 0. すでにアクティブなタブがクリックされた場合は何もしない
        if ($clickedTab.hasClass('active')) {
            return;
        }

        // 1. すべてのタブからactiveクラス削除
        $tabs.removeClass('active');

        // 2. クリックされたタブにactiveクラス追加
        $clickedTab.addClass('active');

        $contents.filter('.active').removeClass('active');

        // 4. 対応するコンテンツにactiveクラス追加(cssで表示になる)
        // クリックされたタブのIDを取得
        const tabId = $clickedTab.attr("id");

        const targetContentId = '#' + tabId + '_content'
        $(targetContentId).addClass('active');
    })
})

$(function () {
    // お問い合わせフォーム送信処理
    // 'event'オブジェクト→デフォルトの送信動作を制御
    $('form[action="./thanks.html"]').submit(function(event) { 
        // 1. 初期化
        // 過去表示バリデーションメッセージを全て消去
        $('.validation_message').empty().removeClass('is-visible');

        var validation_flg = false;

        // 2. 入力必須項目
        // 入力必須項目のname属性リスト
        const requiredFields = [
            'name', 'email', 'tel',
            'postal_code', 'prefecture', 'city', 'street',
            'checkin_date', 'checkout_date', 'plan', 'adults', 'children'
        ];

        // 3. 入力必須項目の共通チェック
        // 各必須項目に対して処理実行
        requiredFields.forEach(function(fieldName) {
            // フィールドのjQueryオブジェクト取得
            const $field = $(`[name="${fieldName}"]`);

            // フィールドの値取得
            let value = $field.val();

            // 値が文字列の場合、前後の空白は取る
            if (typeof value === 'string') {
                value = value.trim();
            }

            // 値が空文字またはnullの場合、未入力とする
            if (value === "" || value === null) {
                let $validationMsgElementContainer = $field.closest('.input_field_wrapper');

                // 住所内の各入力フィールドの場合、メッセージ表示コンテナを調整
                if ($field.is('input[type="text"], input[type="email"], input[type="tel"]') && $field.closest('.address_field_item').length) {
                    $validationMsgElementContainer = $field.parent();
                }

                // 対応するバリデーションメッセージ表示箇所にエラーテキスト設定
                $validationMsgElementContainer.find('.validation_message').text("*入力必須です").addClass('is-visible');

                // バリデーションエラーありとマーク
                validation_flg = true; 
            }
        });

        // 4. 個別のバリデーション設定
        // 4-1. メールアドレス形式
        var email = $('input[name="email"]').val().trim();
        // メッセージ表示要素
        var $emailValidationMsg = $('input[name="email"]').closest('.input_field_wrapper').find('.validation_message');

        // メールアドレスが入力されている場合のみ形式チェックする
        if (email !== "") {
            // メールアドレスの正規表現
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            // パターンに合致しない場合
            if (!emailPattern.test(email)) {
                $emailValidationMsg.text("*正しいメールアドレスの形式で入力してください。").addClass('is-visible');
                // バリデーションエラーあり
                validation_flg = true;
            }
        }

        // 4-2. 電話番号形式(数字のみ、10桁または11桁)
        var tel = $('input[name="tel"]').val().trim();
        // メッセージ表示要素
        var $telValidationMsg = $('input[name="tel"]').closest('.input_field_wrapper').find('.validation_message'); 

        // 電話番号が入力されている場合のみ形式チェックする
        if (tel !== "") {
            // 電話番号の正規表現
            const telPattern = /^\d{10,11}$/; 
            // パターンに合致しない場合
            if (!telPattern.test(tel)) {
                $telValidationMsg.text("*正しい電話番号の形式で入力してください (例: 09012345678)。").addClass('is-visible');
                // バリデーションエラーあり
                validation_flg = true;
            }
        }

        // 4-3. 郵便番号形式(数字のみ、7桁)
        var postal_code = $('input[name="postal_code"]').val().trim(); 
        // メッセージ表示要素
        var $postalValidationMsg = $('input[name="postal_code"]').parent().find('.validation_message');

        // 郵便番号が入力されている場合のみ形式チェックする
        if (postal_code !== "") {
            // 郵便番号の正規表現
            const postalPattern = /^\d{7}$/; 
            // パターンに合致しない場合
            if (!postalPattern.test(postal_code)) {
                $postalValidationMsg.text("*正しい郵便番号の形式で入力してください (例: 1234567)。").addClass('is-visible');
                // バリデーションエラーあり
                validation_flg = true;
            }
        }

        // 5. バリデーション結果→最終処理
        // バリデーションフラグがtrue(エラーあり)の場合
        if (validation_flg) {
            // フォームのデフォルトの送信動作を中止する
            event.preventDefault();
            // 関数の実行をここで終了して送信しない
            return false;
        }

        return true;

    });
});