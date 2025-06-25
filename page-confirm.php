<?php
/*
Template Name: ご予約の確認
*/
get_header();
?>

<main id="main" class="site-main reservation-page-content">
    <section class="form">
        <div class="breadcrumb-area reservation-breadcrumb">
            <div class="container">
                <a href="<?php echo esc_url(home_url('/')); ?>">トップ</a> >
                <a href="<?php echo esc_url(get_permalink(get_post_field('post_parent', get_the_ID()))); ?>">ご予約</a> >
                <span><?php the_title(); ?></span>
            </div>
        </div>

        <div class="container form_inner">
            <div class="form_header">
                <h2 class="form_title01">ご予約の確認</h2>
            </div>
            <?php echo do_shortcode('[mwform_formkey key="255"]'); ?>
        </div>
    </section>
</main>

<?php
get_footer();
?>