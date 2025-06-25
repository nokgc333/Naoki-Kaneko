<?php
/**
 * The sidebar containing the popular posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
if ( ! class_exists( 'WordPressPopularPosts\\Query' ) ) {
	if ( current_user_can( 'manage_options' ) ) {
        echo '<aside id="secondary" class="widget-area popular-posts-sidebar" role="complementary">';
        echo '<h2 class="sidebar-title">人気記事</h2>';
		echo '<p style="padding:15px; background:#fff; border:1px solid #ccc; color:red;">人気記事を表示するには「WordPress Popular Posts」プラグインをインストールし、有効化してください。</p>';
        echo '</aside>';
	}
	return;
}
?>

<aside id="secondary" class="widget-area popular-posts-sidebar" role="complementary">
    <h2 class="sidebar-title">人気記事</h2>
    
    <?php
        $popular_posts_args = array(
            'limit' => 10,
            'post_type' => 'post',
            'range' => 'all',
            'order_by' => 'views',
        );
        $popular_posts_query = new \WordPressPopularPosts\Query( $popular_posts_args );
        $popular_items = $popular_posts_query->get_posts();

        if ( $popular_items ) :
    ?>

    <div class="popular-posts-list">
        <?php foreach ( $popular_items as $popular_post_item ) :
            $post_id = $popular_post_item->id;
        ?>
        <article class="popular-post-item">
            <a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" class="popular-post-link">
                <div class="popular-post-thumbnail">
                    <?php if ( has_post_thumbnail( $post_id ) ) : ?>
                        <?php echo get_the_post_thumbnail( $post_id, 'thumbnail' ); ?>
                    <?php else : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/no-image-small.png' ); ?>" alt="イメージがありません">
                    <?php endif; ?>
                </div>
                <div class="popular-post-content">
                    <h3 class="popular-post-title"><?php echo esc_html( get_the_title( $post_id ) ); ?></h3>
                </div>
            </a>
        </article>
        <?php endforeach; ?>
    </div>

    <?php
    else :
        echo '<p>現在、人気記事はありません。</p>';
    endif;
    ?>
</aside>