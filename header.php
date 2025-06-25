<!DOCTYPE html>
<html lang="ja">

<head>
   <!-- 文字形式設定 -->
   <meta charset="UTF-8">
   <!-- スマホ対応の表示設定 -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
   <?php
    // functions.phpのOGP情報関数呼び出し
    $ogp_title = generate_ogp_title();
    $ogp_description = generate_ogp_description();
    $ogp_url = generate_ogp_url();
    $ogp_image_url = generate_ogp_image();
    $ogp_image_alt = generate_ogp_image_alt();
    $ogp_type = generate_ogp_type();
    $ogp_site_name = get_bloginfo('name');

    // TwitterCardタイプ
    $twitter_card_type = 'summary_large_image';

    // FacebookAppID
    $facebook_app_id_value = defined('FACEBOOK_APP_ID') ? FACEBOOK_APP_ID : '';
    $twitter_site_username_value = defined('TWITTER_SITE_USERNAME') ? TWITTER_SITE_USERNAME : '';
    ?>

    <!-- ディスクリプション -->
    <meta name="description" content="<?php echo $ogp_description; ?>" />

    <!-- OGP基本設定 -->
    <meta property="og:type" content="<?php echo esc_attr( $ogp_type ); ?>" />
    <meta property="og:title" content="<?php echo esc_attr( $ogp_title ); ?>" />
    <meta property="og:description" content="<?php echo $ogp_description; ?>" />
    <meta property="og:url" content="<?php echo esc_url( $ogp_url ); ?>" />
    <meta property="og:site_name" content="<?php echo esc_attr( $ogp_site_name ); ?>" />
    <meta property="og:image" content="<?php echo esc_url( $ogp_image_url ); ?>" />
    <meta property="og:image:alt" content="<?php echo esc_attr( $ogp_image_alt ); ?>" />
    <?php
        if ( $ogp_image_url !== OGP_DEFAULT_IMAGE || (OGP_DEFAULT_IMAGE && file_exists(str_replace(get_template_directory_uri(), get_template_directory(), OGP_DEFAULT_IMAGE))) ) {
            $local_image_path = '';

            if (strpos($ogp_image_url, get_site_url()) === 0) {
                $relative_path = str_replace(get_site_url(), '', $ogp_image_url);
                $local_image_path = ABSPATH . ltrim($relative_path, '/');
            } elseif (strpos($ogp_image_url, get_template_directory_uri()) === 0 && $ogp_image_url === OGP_DEFAULT_IMAGE) {
                $local_image_path = str_replace(get_template_directory_uri(), get_template_directory(), OGP_DEFAULT_IMAGE);
            }

            if ($local_image_path && file_exists($local_image_path)) {
                list($width, $height) = @getimagesize($local_image_path);
                if ($width && $height) {
                    echo '<meta property="og:image:width" content="' . $width . '" />' . "\n";
                    echo '  <meta property="og:image:height" content="' . $height . '" />' . "\n";
                }
            }
        }
    ?>

    <meta property="og:locale" content="ja_JP" />

    <!-- XCard -->
    <meta name="twitter:card" content="<?php echo esc_attr( $twitter_card_type ); ?>" />
    <meta name="twitter:title" content="<?php echo esc_attr( $ogp_title ); ?>" />
    <meta name="twitter:description" content="<?php echo $ogp_description; ?>" />
    <meta name="twitter:image" content="<?php echo esc_url( $ogp_image_url ); ?>" />
    <?php if ( !empty($twitter_site_username_value) ): ?>
    <meta name="twitter:site" content="<?php echo esc_attr( $twitter_site_username_value ); ?>" />
    <?php endif; ?>

   <!-- サイトタイトル -->
   <title>楽園雅苑 | RAKUENGAEN</title>

   <!-- ファビコン設置 -->
   <link rel="icon" href="<?php echo get_theme_file_uri( 'images/favicon.ico' ); ?>">

   <!-- フォント(Noto serif JP)適用 -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200;300;400;500;700&display=swap" rel="stylesheet">

   <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
     <!-- ヘッダー -->
    <header class="header">
        <div class="container header_inner">
            <div class="logo">
                <a href="<?php echo home_url( '/' ); ?>" rel="home">
                    <img
                        src="<?php echo get_theme_file_uri( 'images/logo_white.png' ); ?>"
                        alt="楽園雅苑(らくえんがえん)ロゴ1"
                        class="logo_image01"
                    >
                </a>
            </div>

            <!-- PCナビゲーション -->
            <nav class="nav pc-nav">
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/#room' ) ); ?>" rel="noreferrer" class="menu">お部屋</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#plan_section' ) ); ?>" rel="noreferrer" class="menu">プラン</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#season_scenery_section' ) ); ?>" rel="noreferrer" class="menu">四季</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/#access_section' ) ); ?>" rel="noreferrer" class="menu">アクセス</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/page-service/' ) ); ?>" target="_blank" rel="noreferrer" class="menu">楽園雅苑のサービス</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/page-reservation/' ) ); ?>" rel="noreferrer" class="btn" id="reserveLink">予約</a></li>
                </ul>
            </nav>

            <!-- 予約ボタンとハンバーガー -->
            <div class="mobile-header-elements">
                <a href="<?php echo esc_url( home_url( '/page-reservation/' ) ); ?>" rel="noreferrer" class="btn mobile-reservation-btn" id="reserveLink">予約</a>
                <button class="hamburger-button" aria-label="メニューを開閉" aria-expanded="false" aria-controls="mobile-nav-menu">
                    <span class="hamburger-icon">
                        <span class="hamburger-icon-bar"></span>
                        <span class="hamburger-icon-bar"></span>
                        <span class="hamburger-icon-bar"></span>
                    </span>
                    <span class="hamburger-text">menu</span>
                </button>
            </div>
        </div>

        <!-- モバイルナビゲーションメニュー -->
        <nav class="mobile-nav" id="mobile-nav-menu" aria-hidden="true">
            <div class="mobile-nav-logo-container">
                <a href="<?php echo home_url( '/' ); ?>" rel="home">
                    <img
                        src="<?php echo get_theme_file_uri( 'images/logo_white.png' ); ?>" 
                        alt="楽園雅苑 RAKUENGAEN"
                    >
                </a>
            </div>
            <ul>
                <li><a href="<?php echo esc_url( home_url( '/#room' ) ); ?>" rel="noreferrer" class="menu">お部屋</a></li>
                <li><a href="<?php echo esc_url( home_url( '/#plan_section' ) ); ?>" rel="noreferrer" class="menu">プラン</a></li>
                <li><a href="<?php echo esc_url( home_url( '/#season_scenery_section' ) ); ?>" rel="noreferrer" class="menu">四季</a></li>
                <li><a href="<?php echo esc_url( home_url( '/#access_section' ) ); ?>" rel="noreferrer" class="menu">アクセス</a></li>
                <li><a href="<?php echo esc_url( home_url( '/page-service/' ) ); ?>" target="_blank" rel="noreferrer" class="menu">楽園雅苑のサービス</a></li>
            </ul>
        </nav>
    </header>