<?php
/*
Template Name: 楽園雅苑のサービス
*/
get_header();
?>

<main id="main" class="site-main service-page-content">
    <div class="breadcrumb-area service-breadcrumb">
        <div class="container">
            <a href="<?php echo esc_url(home_url('/')); ?>">トップ</a> >
            <span><?php the_title(); ?></span>
        </div>
    </div>

    <div class="service-page-title-area">
        <div class="container">
            <h1 class="service-main-title">楽園雅苑のサービス</h1>
        </div>
    </div>

    <!-- 温泉セクション -->
    <section id="service-onsen" class="service-section">
        <div class="service-section-container">
            <h2 class="service-section-title">温泉</h2>
            <p class="service-section-subtitle">癒しの源泉、<span class="mobile_br3"><br></span>心と体を満たす至福の温泉体験</p>
            <p class="service-section-description">
                「楽園雅苑・桜庭温泉の隠れ家」では、自然の恵みに満ちた温泉を誇ります。当館の温泉は、大自然の地下深くから湧き出る化石海水を起源とし、鉄分を豊富に含んだナトリウム・カルシウム-塩化物泉です。その美しい褐色と温かさは、まるで天然の宝石のよう。保温効果が高く、湯冷めしにくいのが特徴で、日々の喧騒から解放される贅沢な時間を提供します。楽園雅苑の温泉で、極上の癒しとリフレッシュをご体験ください。
            </p>
            <div class="service-onsen-images">
                <div class="service-onsen-image-item">
                    <img src="<?php echo get_template_directory_uri() . '/images/onsen1.png'; ?>" alt="楽園雅苑 温泉1" class="onsen1">
                </div>
                <div class="service-onsen-image-item">
                    <img src="<?php echo get_template_directory_uri() . '/images/onsen2.png'; ?>" alt="楽園雅苑 温泉2" class="onsen2">
                </div>
            </div>
            <div class="service-onsen-table">
                <div class="service-onsen-table-row">
                    <div class="service-onsen-table-label">
                        <h3 class="service-onsen-detail-title">泉質</h3>
                    </div>
                    <div class="service-onsen-table-content">
                        <p class="service-onsen-detail-text">
                            「桜庭温泉」の泉質は、鉄分豊富とナトリウム・カルシウム塩化物泉が混ざり合った特殊な組み合わせです。独自の黄金の香りと透明感のある褐色が特徴で、温泉効果に肌がつるつるになる感覚を堪能します。
                        </p>
                    </div>
                </div>
                <div class="service-onsen-table-row">
                    <div class="service-onsen-table-label">
                        <h3 class="service-onsen-detail-title">効能</h3>
                    </div>
                    <div class="service-onsen-table-content">
                        <ul class="service-onsen-detail-list">
                            <li>疲労回復：泉質の特性から、疲れた筋肉をほぐし、日々のストレスや疲れを和らげます。</li>
                            <li>美肌効果：温泉中のミネラルが肌に潤いを与え、美トラブルを緩和します。</li>
                            <li>活力促進：温まった温泉効果で血行が促進され、身体全体をリフレッシュさせます。</li>
                            <li>神経の静寂：温かい泉質が神経を鎮め、リラックスした状態へ誘います。</li>
                        </ul>
                        <p class="service-onsen-detail-text_additional">
                            このような効能と泉質は、体のリラックスやリフレッシュに役立ちます。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 施設情報セクション -->
    <section id="service-facilities" class="service-section service-bg-gray">
        <div class="service-section-container">
            <h2 class="service-section-title">施設情報</h2>
            
            <!-- 客室サブセクション -->
            <div class="service-subsection">
                <h3 class="service-subsection-title">客室</h3>
                <p class="service-section-description2">
                    プレミアスイート、デラックスルーム、スタンダードルームの豊富な選択肢。<br>
                    快適なベッドとモダンな設備完備。<br>
                    自然の風景を望む客室や温泉露天風呂付き客室をご用意しております。
                </p>
                <div class="service-rooms-gallery">
                    <div class="service-room-item">
                        <img src="<?php echo get_template_directory_uri() . '/images/room_standard.jpg'; ?>" alt="スタンダードルーム" class="standard">
                    </div>
                    <div class="service-room-item">
                        <img src="<?php echo get_template_directory_uri() . '/images/room_deluxe.jpg'; ?>" alt="デラックスルーム" class="deluxe">
                    </div>
                    <div class="service-room-item">
                        <img src="<?php echo get_template_directory_uri() . '/images/room_premium.jpg'; ?>" alt="プレミアスイート" class="premium">
                    </div>
                </div>
                <div class="service-button-wrapper">
                    <a href="<?php echo home_url('#plan_section'); ?>" class="service-button">宿泊プランを見る<span class="arrow arrow--right" aria-hidden="true"></span></a>
                </div>
            </div>
        </div>
    </section>

    <!-- レストラン・ダイニングセクション -->
    <section id="service-dining" class="service-section">
        <div class="service-section-container">
            <h3 class="service-subsection-title">レストラン・ダイニング</h3>
            <p class="service-section-description2">
                地元の食材を使用した料理を楽しめるレストラン。<br>
                お部屋食や個室も用意され、贅沢な食体験を提供。
            </p>
            <div class="service-dining-content">
                <div class="service-dining-images">
                    <div class="service-dining-image-item">
                        <img src="<?php echo get_template_directory_uri() . '/images/restaurant.png'; ?>" alt="レストラン内観" class="restaurant">
                    </div>
                    <div class="service-dining-image-item">
                        <img src="<?php echo get_template_directory_uri() . '/images/food.png'; ?>" alt="料理" class="food">
                    </div>
                </div>
                <div class="service-dining-info">
                    <p>朝食 7:00 - 10:00<span class="mobile_br3"><br></span> (ラストオーダー 9:30)</p>
                    <p>ランチ 11:30 - 14:00<span class="mobile_br3"><br></span> (ラストオーダー 13:30)</p>
                    <p>ディナー 18:00 - 21:00<span class="mobile_br3"><br></span> (ラストオーダー 20:30)</p>
                    <p class="service-dining-note">※ 営業時間は季節や施設の状況によって変動する場合がございますので、事前にご確認ください。</p>
                </div>
            </div>
        </div>
    </section>

    <!-- その他施設・サービスセクション -->
    <section id="service-other" class="service-section service-bg-gray">
        <div class="service-section-container">
            <h2 class="service-section-title">その他施設・サービス</h2>

            <!-- 会議室・イベントスペース サブセクション -->
            <div class="service-subsection service-other-subsection">
                <h3 class="service-subsection-title">会議室、イベントスペース</h3>
                <div class="service-other-layout">
                    <div class="service-other-images">
                        <div class="service-other-image-item">
                            <img src="<?php echo get_template_directory_uri() . '/images/space1.png'; ?>" alt="会議室・イベントスペース1" class="space1">
                        </div>
                        <div class="service-other-image-item">
                            <img src="<?php echo get_template_directory_uri() . '/images/space2.png'; ?>" alt="会議室・イベントスペース2" class="space2">
                        </div>
                    </div>
                </div>
            </div>

            <!-- マッサージ サブセクション -->
            <div class="service-subsection service-other-subsection">
                <h3 class="service-subsection-title">マッサージ</h3>
                <div class="service-other-layout">
                    <div class="service-other-images">
                        <div class="service-other-image-item">
                            <img src="<?php echo get_template_directory_uri() . '/images/massage1.png'; ?>" alt="マッサージ1" class="massage1">
                        </div>
                        <div class="service-other-image-item">
                            <img src="<?php echo get_template_directory_uri() . '/images/massage2.png'; ?>" alt="マッサージ2" class="massage2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>