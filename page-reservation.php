<?php
/*
Template Name: ご予約
*/
get_header();
?>

<main id="main" class="site-main reservation-page-content">
    <!-- ④ form -->
    <section class="form">
        <div class="breadcrumb-area reservation-breadcrumb">
            <div class="container">
                <a href="<?php echo esc_url(home_url('/')); ?>">トップ</a> >
                <span><?php the_title(); ?></span>
            </div>
        </div>

        <div class="container form_inner">
            <div class="form_header">
                <?php
                $dynamic_title = get_reservation_page_dynamic_title();
                ?>
                <h2 class="form_title01"><?php echo esc_html( $dynamic_title ); ?></h2>
                <p class="form_description">
                    「楽園雅苑 - 桜庭温泉の隠れ家 - 」へのご予約、心よりお待ちしております。お手数をおかけいたしますが、以下のフォームに必要事項をご記入の上、ご送信ください。
                </p>
            </div>

            <?php
            echo do_shortcode('[mwform_formkey key="255"]');
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>