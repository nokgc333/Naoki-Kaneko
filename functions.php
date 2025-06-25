<?php
function assets_css() {
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'assets_css');

function assets_js() {
    wp_enqueue_script('javascript', get_template_directory_uri() . '/assets/js/index.js', array('jquery'), false, true);
}
add_action('wp_enqueue_scripts', 'assets_js');

add_theme_support('post-thumbnails');

// URLの制御
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'blog';
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_archive()) {
        $title = "ブログ";
    }
    return $title;
});

/**
* 予約フォームページのH2タイトルを動的に変更する
*
* @return string 表示するタイトル
*/
function get_reservation_page_dynamic_title() {
    $form_key = '255';
    $default_title = 'ご予約';
    $confirm_title = 'ご予約の確認';
    $reservation_page_slug = 'page-reservation';

    if ( ! is_page( $reservation_page_slug ) ) {
        return $default_title;
    }
    if ( 'POST' === $_SERVER['REQUEST_METHOD'] ) {
        if ( isset( $_POST[ $form_key . '_mw-wp-form-confirm-submit' ] ) && $_POST[ $form_key . '_mw-wp-form-confirm-submit' ] === '1' ) {
            return $confirm_title;
        }
    }
    return $default_title;
}

// OGP画像
define('OGP_DEFAULT_IMAGE', get_template_directory_uri() . '/images/ogp.png');

/**
 * OGP/SEO用タイトル
 */
function generate_ogp_title() {
    global $page, $paged;
    $title = '';
    $site_name = get_bloginfo('name');

    if (is_front_page() || is_home()) {
        $title = $site_name;
        $description = get_bloginfo('description', 'display');
        if ($description) {
            $title .= ' | ' . $description;
        }
    } elseif (is_singular()) {
        $title = get_the_title();
        $title .= ' | ' . $site_name;
    } elseif (is_archive()) {
        $title = get_the_archive_title();
        $title .= ' | ' . $site_name;
    } elseif (is_search()) {
        $title = '「' . get_search_query() . '」の検索結果';
        $title .= ' | ' . $site_name;
    } elseif (is_404()) {
        $title = 'ページが見つかりません';
        $title .= ' | ' . $site_name;
    } else {
        $title = $site_name;
    }

    if ( ($paged >= 2 || $page >= 2) && !is_404() ) {
        $title .= ' | ' . sprintf('%sページ', max($paged, $page));
    }
    return strip_tags($title);
}

/**
 * OGP/SEO用ディスクリプション
 */
function generate_ogp_description() {
    global $post;
    $description = '';
    $default_description = "大分の雄大な自然と調和する、極上の癒しを提供する温泉宿「楽園雅苑」。四季折々の美しさ、心温まるおもてなし、そして地元食材を活かした美食で、忘れられないひとときをお約束します。";

    if (is_front_page() || is_home()) {
        $description = get_bloginfo('description');
        if (empty($description)) {
            $description = $default_description;
        }
    } elseif (is_singular()) {
        if (has_excerpt($post->ID)) {
            $description = get_the_excerpt($post->ID);
        } else {
            $content = strip_shortcodes($post->post_content);
            $content = strip_tags($content);
            $content = str_replace(array("\r\n", "\r", "\n", " "), '', $content);
            $description = wp_html_excerpt($content, 120, '...');
        }
        // 各固定ページのディスクリプション
        if (empty($description) || strlen(trim($description)) < 20 ) {
            if (is_page_template('page-companyinfo.php')) {
                $description = "楽園雅苑を運営する桜庭観光株式会社の会社情報です。所在地、連絡先、事業内容などをご確認いただけます。";
            } elseif (is_page_template('page-privacypolicy.php')) {
                $description = "楽園雅苑のプライバシーポリシーについて。個人情報の取り扱い方針やお客様の権利について記載しています。";
            } elseif (is_page_template('page-service.php')) {
                $description = "楽園雅苑が提供する温泉、客室、レストラン、その他施設・サービスのご案内です。お客様に至福のひとときをお届けするためのこだわりをご紹介します。";
            } elseif (is_page_template('page-reservation.php')) {
                $description = "楽園雅苑のご宿泊予約はこちらから。お部屋タイプ、日程、人数を選択して、簡単にご予約いただけます。極上の癒し体験をお楽しみください。";
            } elseif (get_post_type() === 'news' && is_singular('news')) { // お知らせ詳細ページ
                $content = strip_shortcodes($post->post_content);
                $content = strip_tags($content);
                $content = str_replace(array("\r\n", "\r", "\n", " "), '', $content);
                $description = wp_html_excerpt($content, 100, '...');
                 if (empty($description)) $description = get_the_title() . "に関するお知らせです。";
            } else {
                $description = $default_description;
            }
        }
    } elseif (is_archive()) {
        $description = get_the_archive_description();
        if (empty($description)) {
            if (is_category()) {
                $description = single_cat_title('', false) . 'に関する記事一覧です。楽園雅苑のブログから最新情報をお届けします。';
            } elseif (is_tag()) {
                $description = single_tag_title('', false) . 'に関する記事一覧です。楽園雅苑のブログから関連情報をお届けします。';
            } elseif (is_post_type_archive('news')) {
                $description = '楽園雅苑からのお知らせ一覧です。最新情報やイベント情報をご確認ください。';
            } elseif (is_post_type_archive('post')) { // ブログアーカイブ一覧
                 $description = '楽園雅苑のブログ一覧です。宿の魅力や周辺情報、季節の便りなどをお届けします。';
            } else {
                $description = get_the_archive_title() . 'の一覧ページ。' . $default_description;
            }
        }
    } elseif (is_search()) {
        $description = '「' . get_search_query() . '」の検索結果ページです。お探しの情報が見つかることを願っています。';
    } elseif (is_404()) {
        $description = 'お探しのページは見つかりませんでした。サイト内検索をお試しいただくか、トップページから再度お探しください。';
    } else {
        $description = get_bloginfo('description');
         if (empty($description)) {
            $description = $default_description;
        }
    }
    return esc_attr(strip_tags(str_replace(array("\r\n", "\r", "\n"), '', $description)));
}

/**
 * OGP用正規URL
 */
function generate_ogp_url() {
    global $post;

    if (is_singular()) {
        return esc_url(get_permalink($post->ID));
    } elseif (is_archive()) {
        if (is_post_type_archive()) {
            return esc_url(get_post_type_archive_link(get_post_type()));
        } elseif (is_category()) {
            return esc_url(get_category_link(get_queried_object_id()));
        } elseif (is_tag()) {
            return esc_url(get_tag_link(get_queried_object_id()));
        }
    }
    return esc_url((is_ssl() ? 'https' : 'http') . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
}

/**
 * OGP用画像URL
 */
function generate_ogp_image() {
    global $post;
    $image_url = OGP_DEFAULT_IMAGE;

    if (is_singular() && has_post_thumbnail($post->ID)) {
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $image_attributes = wp_get_attachment_image_src($thumbnail_id, 'full');
        if ($image_attributes) {
            $image_url = $image_attributes[0];
        }
    } elseif (is_front_page() || is_home()) {
    }

    if (!preg_match('~^(?:f|ht)tps?://~i', $image_url)) {
        $image_url = site_url($image_url);
    }
    return esc_url($image_url);
}

/**
 * OGP用画像altテキスト
 */
function generate_ogp_image_alt() {
    global $post;
    $alt_text = '';

    if (is_singular() && has_post_thumbnail($post->ID)) {
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
        if (empty($alt_text)) {
            $alt_text = get_the_title($post->ID);
        }
    } else {
        $alt_text = generate_ogp_title();
    }
    return esc_attr($alt_text);
}

/**
 * OGP用タイプ
 */
function generate_ogp_type() {
    if (is_front_page() || is_home()) {
        return 'website';
    } elseif (is_singular(array('post', 'news'))) {
        return 'article';
    } else {
        return 'website';
    }
}

/**
 * 「入力必須」メッセージ統一
 */
add_filter(
	'mwform_error_message_mw-wp-form-255',

	function ( $error, $key, $rule ) {
		if ( 'noempty' === $rule ) {
			return '＊入力必須です';
		}
		return $error;
	},
	10,
	3
);

wp_enqueue_style(
    'datepicker-custom',
    
    get_template_directory_uri() . '/assets/css/datepicker-custom.css',
    array(),
    null
);