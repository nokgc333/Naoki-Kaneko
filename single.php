<?php
/*
The template for displaying all single posts
*/
get_header(); ?>

<?php $the_current_post_id = null; ?>

<div class="single-page-outer-container">
    <div class="breadcrumb-area">
        <div class="container">
            <?php
                if (function_exists('bcn_display')) {
                    bcn_display();
                } elseif (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                } else {
                    echo '<a href="' . esc_url( home_url( '/' ) ) . '">トップ</a> > ';
                    $blog_page_id  = get_option( 'page_for_posts' );
                    $blog_page_url = $blog_page_id ? get_permalink( $blog_page_id ) : '';
                    if ( ! $blog_page_url ) {
                        $blog_page_url = get_post_type_archive_link( 'post' );
                    }
                    if ( ! $blog_page_url ) {
                        $blog_page_url = home_url( '/blog/' );
                    }
                    echo '<a href="' . esc_url( $blog_page_url ) . '">ブログ一覧</a> > ';
                    echo '<span>' . esc_html( get_the_title() ) . '</span>';
                }
            ?>
        </div>
    </div>

    <div class="single-page-container">
        <div id="primary" class="content-area single-post-content-area">
            <main id="main" class="site-main">
                <?php
                    while (have_posts()) :
                    the_post();
                    $the_current_post_id = get_the_ID();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('entry-content-wrapper'); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        <div class="entry-meta">
                            <span class="posted-on"><time class="entry-date published updated" datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date('Y/m/d')); ?></time></span>
                            <?php
                                $categories = get_the_category();

                                if (!empty($categories)) :
                            ?>
                            <div class="entry-categories">
                                <?php foreach ($categories as $category) : ?>
                                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="category-tag single-category-tag"><?php echo esc_html($category->name); ?></a>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </header>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail single-post-thumbnail">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="entry-content-body">
                        <?php
                            the_content();
                            wp_link_pages(
                                array(
                                    'before' => '<div class="page-links">' . __('Pages:', 'your-theme-textdomain'),
                                    'after'  => '</div>',
                                )
                            );
                        ?>
                    </div>
                </article><!-- #post-<?php the_ID(); ?> -->

                <?php
                endwhile;
                ?>
            </main>
        </div>

        <?php get_sidebar(); ?>

        <!-- 「こんな記事も読まれています」 -->
        <?php
            if ($the_current_post_id) :
            $args_related = array(
                'post_type'      => 'post',
                'posts_per_page' => 2,
                'orderby'        => 'rand',
                'post_status'    => 'publish',
                'post__not_in'   => array($the_current_post_id),
            );
            $related_query = new WP_Query($args_related);
            if ($related_query->have_posts()) :
        ?>

        <section class="related-posts-section">
            <div class="container"> 
                <h2 class="section-title related-posts-main-title">こんな記事も読まれています</h2>
                <div class="related-posts-container blog_cards_container"> 
                    <?php
                        while ($related_query->have_posts()) :
                        $related_query->the_post();
                    ?>

                    <article class="blog_card related-post-card"> 
                        <a href="<?php the_permalink(); ?>" class="blog_card_link">
                            <div class="blog_image_wrapper">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium_large'); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/no-image.png' ); ?>" alt="<?php the_title_attribute(); ?>のイメージ" style="object-fit: cover; width:100%; height:100%;">
                                <?php endif; ?>
                            </div>
                            <div class="blog_content">
                                <p class="blog_date"><?php echo get_the_date('Y/m/d'); ?></p>
                                <h3 class="blog_title_text"><?php the_title(); ?></h3>
                                <?php
                                    // ① 全カテゴリを取得し、先頭以外の数を算出
                                    $cats        = get_the_category();           
                                    $extra_count = $cats ? max( 0, count( $cats ) - 1 ) : 0;
                                    $multi_class = $extra_count > 0 ? ' has-multi' : '';
                                    $data_attr   = $extra_count > 0 ? ' data-count="' . esc_attr( $extra_count ) . '"' : '';
                                ?>
                                <div class="blog_category_tag_wrapper<?php echo esc_attr( $multi_class ); ?>"<?php echo $data_attr; ?>>
                                    <?php if ( $cats ) : ?>
                                        <span class="blog_category_tag">
                                            <?php echo esc_html( $cats[0]->name ); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </article>

                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>

        <?php
        endif;
        endif;
        ?>
    </div>
</div>


<?php get_footer(); ?>