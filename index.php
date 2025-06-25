<?php get_header(); ?>

<main>
    <!-- ① fv -->
    <section class="fv" id="fv" style="background-image:url('<?php echo get_template_directory_uri() . '/images/kv.png'; ?>');
        background-size:cover;
        background-position:center;">
        <div class="container fv_inner">
            <p class="catch">
                大自然<span class="kana">と</span>調和<span class="kana">する</span>、<span class="mobile_br"><br></span>極上<span class="kana">の</span>癒<span class="kana">し</span>。
            </p>
            <p class="subtext">
                大分<span class="kana2">の</span>自然環境<span class="kana2">と</span>共<span class="kana2">に</span>、<br>
                身<span class="kana2">も</span>心<span class="kana2">も</span>癒<span class="kana2">やされる</span><span class="mobile_br"><br></span>至福<span class="kana2">のひとときを</span>提供<span class="kana2">します</span>。
            </p>
            <div class="scroll">SCROLL</div>
        </div>
    </section>

    <!-- ② about -->
    <section class="about" id="about">
        <div class="container about_inner">
            <div class="about_text">
                <img src="<?php echo get_template_directory_uri() . '/images/logo_gold.png'; ?>" alt="楽園雅苑(らくえんがえん)ロゴ2" class="about_title">
                <p class="about_description">
                    自然美に囲まれた楽園で、<br>
                    <span class="space">贅沢な癒しのひとときを</span><br>
                    お過ごしください。
                </p>
            </div>
            <div class="about_images">
                <img src="<?php echo get_template_directory_uri() . '/images/about_img_1.png'; ?>" alt="庭園の景色" class="main_image">
                <img src="<?php echo get_template_directory_uri() . '/images/about_img_2.png'; ?>" alt="料理" class="sub_image">
            </div>
        </div>
    </section>

    <!-- ③ room -->
    <section class="room" id="room" style="background-image:url('<?php echo get_template_directory_uri() . '/images/room_bg.png'; ?>');
    background-size:cover;
    background-position:center;">
        <div class="container room_inner">
            <!-- "画像"→"お部屋画像" -->
            <img src="<?php echo get_template_directory_uri() . '/images/room_cloud.png'; ?>" alt="お部屋画像" class="room_pattern">
            <div class="room_header">
                <h2 class="room_title01">お部屋<span class="room_title02">room</span></h2>
                <p class="room_description">
                    「楽園雅苑」の豪華なお部屋は、大分県自然の美しさと格式の高いサービスが調和した完璧な空間を提供します。
                    <span class="wide_spacing">
                        桜花の調べが響くプレミアスィート、静寂の庭園に囲まれたデラックスルーム、そして自然のぬくもりを感じるスタンダードルーム。
                    </span>
                    <span class="wide_spacing02">
                        どの部屋も極上の癒しとくつろぎがお待ちしております。贅沢な温泉体験と非日常のくつろぎをお楽しみください。
                    </span>
                </p>
            </div>

            <!-- お部屋タイプ選択ボタン -->
            <div class="room_select">
                <div class="room_select_list">
                    <p id="standard" class="tab active">
                        スタンダードルーム<br>
                        - 自然のぬくもり -
                    </p>
                    <p id="deluxe" class="tab">
                        デラックスルーム<br>
                        - 静寂の庭園 -
                    </p>
                    <p id="premium" class="tab">
                        プレミアスィート<br>
                        - 桜花の調べ -
                    </p>
                </div>
            </div>

            <!-- お部屋写真と説明 -->
            <div class="rooms">
                <div id="standard_content" class="room_view active">
                    <img src="<?php echo get_template_directory_uri() . '/images/room_standard.jpg'; ?>" alt="スタンダードルーム 自然のぬくもり" class="room_visual_image">
                    <div class="room_textarea">
                        <h3 class="title">自然のぬくもり</h3>
                        <p class="text">
                            「自然のぬくもり」スタンダードルームは、自然との共存を感じるお部屋です。山の景色を楽しむことができ、ナチュラルリトリートプランには朝食が含まれています。心地よいぬくもりとくつろぎのひとときを提供します。
                        </p>
                    </div>
                </div>
                <div id="deluxe_content" class="room_view">
                    <img src="<?php echo get_template_directory_uri() . '/images/room_deluxe.jpg'; ?>" alt="デラックスルーム 静寂の庭園" class="room_visual_image">
                    <div class="room_textarea">
                        <h3 class="title">静寂の庭園</h3>
                        <p class="text">
                            「静寂の庭園」デラックスルームは、静寂と美しさに包まれた部屋です。個別の温泉ビューバルコニーからは、美しい庭園と温泉の景色が広がります。ロマンティックゲットアウェイプランで、特別なひとときを過ごしましょう。
                        </p>
                    </div>
                </div>
                <div id="premium_content" class="room_view">
                    <img src="<?php echo get_template_directory_uri() . '/images/room_premium.jpg'; ?>" alt="プレミアスィート 桜花の調べ" class="room_visual_image">
                    <div class="room_textarea">
                        <h3 class="title">桜花の調べ</h3>
                        <p class="text">
                            「桜花の調べ」プレミアスィートは、最高級のラグジュアリーを追求した特別なお部屋です。広々とした空間に、温泉露天風呂が設けられ、そこからは四季折々の美しい景色を楽しむことができます。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ④ plan -->
    <section class="plan_section" id="plan_section">
        <div class="container plan_inner">
            <div class="plan_section_header">
                <div class="plan_title_group">
                    <h2 class="plan_title01">プラン<span class="plan_title02">plan</span></h2>
                </div>
                <img src="<?php echo get_template_directory_uri() . '/images/plan_cloud.png'; ?>" alt="スクエア01" class="plan_pattern">
            </div>

            <div class="plan_cards_container">
                <!-- スタンダードルーム -->
                <div class="plan_card">
                    <h3 class="plan_card_title">スタンダードルーム</h3>
                    <p class="plan_card_subtitle">- 自然のぬくもり -</p>
                    <hr class="plan_card_divider">
                    <ul class="plan_card_details">
                        <li>　一泊の値段：30,000円/1部屋</li>
                        <li>　チェックイン時間：16:00</li>
                        <li>　チェックアウト時間：10:00</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/page-reservation/' ) ); ?>" rel="noreferrer"  class="plan_card_button">予約</a>
                </div>

                <!-- デラックスルーム -->
                <div class="plan_card">
                    <h3 class="plan_card_title">デラックスルーム</h3>
                    <p class="plan_card_subtitle">- 静寂の庭園 -</p>
                    <hr class="plan_card_divider">
                    <ul class="plan_card_details">
                        <li>　一泊の値段：50,000円/1部屋</li>
                        <li>　チェックイン時間：14:00</li>
                        <li>　チェックアウト時間：12:00</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/page-reservation/' ) ); ?>" rel="noreferrer" class="plan_card_button">予約</a>
                </div>

                <!-- プレミアスィート -->
                <div class="plan_card">
                    <h3 class="plan_card_title">プレミアスィート</h3>
                    <p class="plan_card_subtitle">- 桜花の調べ -</p>
                    <hr class="plan_card_divider">
                    <ul class="plan_card_details">
                        <li>　一泊の値段：100,000円</li>
                        <li>　チェックイン時間：15:00</li>
                        <li>　チェックアウト時間：11:00</li>
                    </ul>
                    <a href="<?php echo esc_url( home_url( '/page-reservation/' ) ); ?>" rel="noreferrer" class="plan_card_button">予約</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ⑤ season -->
    <section class="season_scenery_section" id="season_scenery_section">
        <div class="season_scenery_slider">
            <div class="season_scenery_header_container">
                <div class="season_scenery_header">
                    <div class="season_scenery_title_group">
                        <h2 class="season_scenery_title01">四季<span class="season_scenery_title02">seasons</span></h2>
                    </div>
                </div>
                <p class="season_scenery_description">
                    「楽園雅苑」は、大分県自然の美しさが四季折々に変化する場所です。春には桜花が舞い、夏には新緑が輝き、秋には紅葉が魅了し、冬には雪景色が広がります。四季折々の風景や風味を楽しむためのアクティビティや特別なイベントが用意されています。どの季節に訪れても、自然の美しさに囲まれた楽園で贅沢なひとときを過ごしませんか？
                </p>
            </div>
            <div class="season_gallery_fullwidth_wrapper">
                <div class="custom_season_gallery">
                    <!-- メイン大写真 -->
                    <div class="gallery_item main_photo">
                        <img src="<?php echo get_template_directory_uri() . '/images/seasons1-pc.jpg'; ?>" alt="秋の池と紅葉" class="">
                        <div class="cloud_deco deco1">
                            <img src="<?php echo get_template_directory_uri() . '/images/seasons-deco1.png'; ?>" alt="雲のイラスト1">
                        </div>
                    </div>
                    <!-- サブ写真群-->
                    <div class="gallery_item sub_photo photo1">
                        <img src="<?php echo get_template_directory_uri() . '/images/seasons2-pc.jpg'; ?>" alt="夏の滝" class="">
                    </div>
                    <div class="gallery_item sub_photo photo2">
                        <img src="<?php echo get_template_directory_uri() . '/images/seasons3-pc.jpg'; ?>" alt="冬の温泉" class="">
                        <div class="cloud_deco deco2">
                            <img src="<?php echo get_template_directory_uri() . '/images/seasons-deco2.png'; ?>" alt="雲のイラスト2">
                        </div>
                    </div>
                    <!-- スライダー -->
                    <div class="season_gallery_thumbs">
                        <div class="gallery_item thumb thumb1">
                            <img src="<?php echo get_template_directory_uri() . '/images/slider1.jpg'; ?>" alt="スライダー1" class="">
                        </div>
                        <div class="gallery_item thumb thumb2">
                            <img src="<?php echo get_template_directory_uri() . '/images/slider2.jpg'; ?>" alt="スライダー2" class="">
                        </div>
                        <div class="gallery_item thumb thumb3">
                            <img src="<?php echo get_template_directory_uri() . '/images/slider3.jpg'; ?>" alt="スライダー3" class="">
                        </div>
                        <div class="gallery_item thumb thumb4">
                            <img src="<?php echo get_template_directory_uri() . '/images/slider4.jpg'; ?>" alt="スライダー4" class="">
                        </div>
                        <div class="gallery_item thumb thumb5">
                            <img src="<?php echo get_template_directory_uri() . '/images/slider5.jpg'; ?>" alt="スライダー5" class="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container season_scenery_inner">
                <!-- サービスボタン -->
                <div class="season_service_btn_wrapper">
                    <a href="<?php echo esc_url( home_url( '/page-service/' ) ); ?>" target="_blank" rel="noreferrer" class="season_service_btn">楽園雅苑のサービス<span class="arrow arrow--right" aria-hidden="true"></span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- ⑥ access -->
    <section class="access_section" id="access_section">
        <div class="container access_inner">
            <div class="access_header">
                <div class="access_title_group">
                    <h2 class="access_title01">アクセス<span class="access_title02">access</span></h2>
                </div>
            </div>
        </div>

        <!-- Google Maps 埋め込みコンテナ -->
        <div class="access_map_container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49586.14063434557!2d131.3771777430409!3d33.16639646257572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3546b15d4081bd39%3A0x3353f0a4a0b6def7!2z44CSODc5LTU0MjUg5aSn5YiG55yM55Sx5biD5biC5bqE5YaF55S65riV!5e0!3m2!1sja!2sjp!4v1747829204081!5m2!1sja!2sjp"
                width="100%"
                height="600"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <div class="container access_details_container">
            <div class="access_info_block simple_info_block">
                <img src="<?php echo get_template_directory_uri() . '/images/logo_access.png'; ?>" alt="楽園雅苑(らくえんがえん)ロゴ3" class="access_facility_logo">
                <span class="access_facility_address simple_address">
                    〒879-5425<span class="mobile_br"><br></span>大分県由布市 庄内町渕
                </span>
            </div>
            <div class="access_text_block simple_text_block">
                <p>
                    当宿からのアクセスは便利で、お車や公共交通機関をご利用いただけます。<br><span class="pc_br"><br></span>
                    自家用車をご利用の場合、ご宿泊の方には無料の駐車場がご用意されております。<br><span class="pc_br"><br></span>
                    公共交通機関をご利用の場合、最寄り駅からはバス、タクシー、またはレンタサイクルを利用してお越しいただけます。
                </p>
            </div>
        </div>
    </section>

    <!-- ⑦ blog -->
    <section class="blog_section" id="blog_section">
        <div class="container blog_inner">
            <div class="blog_header">
                <div class="blog_title_group">
                    <h2 class="blog_title01">ブログ<span class="blog_title02">blog</span></h2>
                </div>
            </div>
            <div class="blog_cards_container">
                <?php
                    $blog_query = new WP_Query( array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'techelite-douga-category'
                            )
                        )
                    ) );
                    if ( $blog_query->have_posts() ) :
                    while ( $blog_query->have_posts() ) : $blog_query->the_post();
                ?>
                <article class="blog_card">
                    <a href="<?php the_permalink(); ?>" class="blog_card_link">
                        <div class="blog_image_wrapper">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </div>
                        <div class="blog_content">
                            <p class="blog_date"><?php the_time( 'Y/m/d' ); ?></p>
                            <h3 class="blog_title_text"><?php the_title(); ?></h3>
                            <div class="blog_category_tag_wrapper">
                                <?php
                                    $cats = get_the_category();
                                    if ( $cats ) echo '<span class="blog_category_tag">' . esc_html( $cats[0]->name ) . '</span>';
                                ?>
                            </div>
                        </div>
                    </a>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                    endif;
                ?>
            </div>
            <div class="blog_view_all_btn_wrapper">
                <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" target="_blank" rel="noreferrer" class="blog_view_all_btn">
                    ブログ一覧はこちら<span class="arrow arrow--right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>

    <!-- ⑧ お知らせ -->
    <section class="news-home" id="news_section">
        <div class="container news-home-inner">
            <div class="news-home-header">
                <h2 class="news-home-title-jp">お知らせ<span class="news-home-title-en">news</span></h2>
            </div>
            <?php
            $args_news_home = array(
                'post_type'      => 'news', // カスタム投稿'news'
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC'  // 新→古
            );
            $news_home_query = new WP_Query( $args_news_home );
            if ( $news_home_query->have_posts() ) :
            ?>
            <ul class="news-home-list">
                <?php while ( $news_home_query->have_posts() ) : $news_home_query->the_post(); ?>
                    <li class="news-home-item">
                        <a href="<?php the_permalink(); ?>">
                            <span class="news-home-item-date"><?php echo get_the_date('Y/m/d'); ?></span>
                            <span class="news-home-item-title"><?php the_title(); ?></span>
                            <span class="news-home-item-arrow"></span>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php wp_reset_postdata(); else : ?>
            <p class="news-home-no-posts">お知らせはまだありません。</p>
            <?php endif; ?>
            <div class="news-home-view-all-wrapper">
                <a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" target="_blank" rel="noreferrer" class="news-home-view-all-btn">
                    お知らせ一覧はこちら<span class="arrow arrow--right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>