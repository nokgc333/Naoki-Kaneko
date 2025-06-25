<?php get_header(); ?>

<div class="archive-page-wrapper">
    <div class="container">
        <div class="breadcrumb-area archive-breadcrumb">
            <?php
                if (function_exists('bcn_display')) {
                    bcn_display();
                } else {
                    echo '<a href="' . esc_url(home_url('/')) . '">トップ</a> > ';
                    if (is_category()) {
                        $blog_archive_link = get_post_type_archive_link('post');
                        if (!$blog_archive_link) {
                            $blog_archive_link = home_url('/blog/');
                        }
                        $page_for_posts_id = get_option('page_for_posts');
                        if ($page_for_posts_id) {
                            $blog_archive_link = get_permalink($page_for_posts_id);
                        }
                        echo '<a href="' . esc_url($blog_archive_link) . '">ブログ一覧</a> > ';
                        echo '<span>' . single_cat_title('', false) . '</span>';
                    } elseif (is_tag()) {
                        $blog_archive_link = get_post_type_archive_link('post');
                        if (!$blog_archive_link) {
                            $blog_archive_link = home_url('/blog/');
                        }
                        $page_for_posts_id = get_option('page_for_posts');
                        if ($page_for_posts_id) {
                            $blog_archive_link = get_permalink($page_for_posts_id);
                        }
                        echo '<a href="' . esc_url($blog_archive_link) . '">ブログ一覧</a> > ';
                        echo '<span>' . single_tag_title('', false) . '</span>';
                    } elseif (is_date()) {
                        echo '<span>' . get_the_archive_title() . '</span>';
                    } elseif (is_author()) {
                        echo '<span>' . get_the_author() . 'の記事</span>';
                    } else {
                        echo '<span>ブログ一覧</span>';
                    }
                }
            ?>
        </div>

        <h1 class="archive-main-title">
            <?php the_archive_title(); ?>
        </h1>

        <nav class="category-filter-nav">
            <ul>
                <?php
                    $current_term_id = 0;
                    if (is_category() || is_tag()) {
                        $current_term_id = get_queried_object_id();
                    }
                    $all_posts_url = home_url('/blog/');
                    $all_active_class = (!is_category() && !is_tag() && !is_date() && !is_author()) ? 'active' : '';
                    echo '<li class="' . esc_attr($all_active_class) . '"><a href="' . esc_url($all_posts_url) . '">ALL</a></li>';
                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'hide_empty' => 1,
                    ));
                    if ($categories) {
                        foreach ($categories as $category) {
                            $category_link = get_category_link($category->term_id);
                            $active_class = ($current_term_id === $category->term_id) ? 'active' : '';
                            echo '<li class="' . esc_attr($active_class) . '"><a href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a></li>';
                        }
                    }
                ?>
            </ul>
        </nav>

        <?php
        /* ==== 現在のアーカイブ条件を取得 ==== */
        $current_term_id  = 0;
        $current_taxonomy = '';
        if ( is_category() ) {
            $current_term_id  = get_queried_object_id();
            $current_taxonomy = 'category';
        } elseif ( is_tag() ) {
            $current_term_id  = get_queried_object_id();
            $current_taxonomy = 'post_tag';
        } elseif ( is_tax() ) {
            $q = get_queried_object();
            $current_term_id  = $q->term_id;
            $current_taxonomy = $q->taxonomy;
        }
        ?>

        <?php if (have_posts()) : ?>

        <div class="blog_cards_container archive_blog_cards_container">
            <?php while (have_posts()) : the_post(); ?>
            <article class="blog_card">
                <a href="<?php the_permalink(); ?>" class="blog_card_link">
                    <div class="blog_image_wrapper">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium_large'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri() . '/images/dummy-thumbnail.png'; ?>" alt="サムネイル画像がありません">
                        <?php endif; ?>
                    </div>
                    <div class="blog_content">
                        <p class="blog_date"><?php echo get_the_date('Y/m/d'); ?></p>
                        <h3 class="blog_title_text"><?php $title = get_the_title(); echo esc_html($title); ?></h3>
                        <?php
                        /* ==== 絞り込みタームを優先的に表示 ==== */
                        $display_term = null;
                        if ( $current_taxonomy ) {
                            $same_tax_terms = get_the_terms( get_the_ID(), $current_taxonomy );
                            if ( $same_tax_terms && ! is_wp_error( $same_tax_terms ) ) {
                                foreach ( $same_tax_terms as $t ) {
                                    if ( (int) $t->term_id === (int) $current_term_id ) {
                                        $display_term = $t;
                                        break;
                                    }
                                }
                            }
                        }
                        /* ==== 見つからなければ従来どおり先頭カテゴリーにフォールバック ==== */
                        if ( ! $display_term ) {
                            $cats = get_the_category();
                            if ( ! empty( $cats ) ) {
                                $display_term = $cats[0];
                            }
                        }
                        /* ==== 出力 ==== */
                        if ( $display_term ) :
                            // ① ここで総カテゴリ数を数える -------------
                            $all_cats    = get_the_category();
                            $extra_count = $all_cats ? max( 0, count( $all_cats ) - 1 ) : 0;
                            $multi_class = $extra_count > 0 ? ' has-multi' : '';
                            $data_attr   = $extra_count > 0 ? ' data-count="' . esc_attr( $extra_count ) . '"' : '';
                        ?>
                            <div class="blog_category_tag_wrapper<?php echo esc_attr( $multi_class ); ?>"<?php echo $data_attr; ?>>
                                <span class="blog_category_tag">
                                    <?php echo esc_html( $display_term->name ); ?>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
            </article>
            <?php endwhile; ?>
        </div>

        <div class="archive-pagination">
            <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '',
                    'next_text' => '',
                    'screen_reader_text' => __('Posts navigation', 'your-theme-textdomain'),
                    'type'      => 'plain',
                ));
            ?>
        </div>

        <?php else : ?>
            <p class="no-posts-found">該当する記事が見つかりませんでした。</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>