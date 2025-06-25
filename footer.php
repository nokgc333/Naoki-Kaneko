        <!-- フッター -->
        <footer class="footer">
            <div class="container footer_inner">
                <div class="footer_logo_area">
                    <img
                        src="<?php echo esc_url( get_theme_file_uri( 'images/logo_gold.png' ) ); ?>"
                        alt="楽園雅苑 ロゴ"
                        class="footer_logo"
                    >
                </div>

                <nav class="footer_nav">
                    <ul class="footer_nav_main_list">
                        <li><a href="<?php echo esc_url( home_url( '/#room' ) ); ?>">お部屋</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/#plan_section' ) ); ?>">プラン</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/#season_scenery_section' ) ); ?>">四季</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/#access_section' ) ); ?>">アクセス</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/page-service/' ) ); ?>" target="_blank" rel="noreferrer">楽園雅苑のサービス</a></li>
                        <li><a href="<?php echo esc_url( home_url( '#blog_section' ) ); ?>">ブログ</a></li>
                        <li><a href="<?php echo esc_url( home_url( '#news_section' ) ); ?>">お知らせ</a></li>
                    </ul>
                    <ul class="footer_nav_sub_list">
                        <li><a href="<?php echo esc_url( home_url( '/page-companyinfo/' ) ); ?>" target="_blank" rel="noreferrer">運営会社情報</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/page-privacypolicy/' ) ); ?>" target="_blank" rel="noreferrer">プライバシーポリシー</a></li>
                        <li>利用規約</li>
                    </ul>
                </nav>

                <div class="footer_copyright">
                    <p>© RAKUENGAEN.</p>
                </div>
            </div>
        </footer>
        
        <?php wp_footer(); ?>
    </body>
</html>