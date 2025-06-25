<?php get_header(); ?>

<main class="news-single-page">
    <div class="news-single-container">
        <div class="news-breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">トップ</a> >
            <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>">お知らせ</a> >
            <span><?php the_title(); ?></span>
        </div>

        <div class="news-single-container02">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('news-article-content'); ?>>
                <p class="news-single-date"><?php echo get_the_date('Y/m/d'); ?></p>
                <h1 class="news-single-main-title"><?php the_title(); ?></h1>
                <div class="news-single-body">
                    <?php the_content(); ?>
                </div>
            </article>
            <div class="news-back-button-wrapper">
                <a href="<?php echo esc_url(get_post_type_archive_link('news')); ?>" class="news-back-to-list-button">
                    <span class="arrow" aria-hidden="true"></span>
                    一覧に戻る
                </a>
            </div>
            <?php endwhile; else : ?>
                <p>記事が見つかりませんでした。</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>