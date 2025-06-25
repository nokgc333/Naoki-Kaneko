<?php get_header(); ?>

<main class="news-archive-page">
    <div class="news-archive-container">
        <div class="news-breadcrumb">
            <a href="<?php echo esc_url(home_url('/')); ?>">トップ</a> >
            <span>お知らせ</span>
        </div>

        <h1 class="news-archive-title">お知らせ</h1>

        <?php if (have_posts()) : ?>

        <ul class="news-list">
            <?php while (have_posts()) : the_post(); ?>
                <li class="news-item">
                    <a href="<?php the_permalink(); ?>">
                        <span class="news-item-date"><?php echo get_the_date('Y/m/d'); ?></span>
                        <span class="news-item-title"><?php the_title(); ?></span>
                        <span class="news-item-arrow"></span>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>

        <div class="news-pagination">
            <?php
                the_posts_pagination(array(
                    'mid_size'  => 1, // 両側表示ページ数
                    'prev_text' => '',  // 「前へ」テキスト×
                    'next_text' => '',  // 「次へ」テキスト×
                    'screen_reader_text' => __('投稿ナビゲーション', 'textdomain'),
                ));
            ?>
        </div>
        
        <?php else : ?>
            <p class="no-posts-found">お知らせはまだありません。</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>