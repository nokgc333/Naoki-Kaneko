<?php
/*
Template Name: 運営会社情報
Template Post Type: page
*/
get_header(); ?>

<!-- page-companyinfo -->
<main id="main" class="site-main company-info-page">
    <nav class="breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">トップ</a> &gt; <span>運営会社情報</span>
    </nav>

    <h2 class="company-info-main-title">運営会社情報</h2>
    <div class="company-info-table-wrapper">
        <table class="company-info-table">
            <tbody>
                <tr>
                    <th>会社名</th>
                    <td>桜庭観光株式会社</td>
                </tr>
                <tr>
                    <th>所在地</th>
                    <td>〒879-5425 大分県由布市庄内町渕</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>0123-456-7890</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><a href="mailto:info@sakuraba-ryokan.com">info@sakuraba-ryokan.com</a></td>
                </tr>
                <tr>
                    <th>ウェブサイト</th>
                    <td><a href="<?php echo home_url( '/' ); ?>" target="_blank" rel="noopener noreferrer">楽園雅苑ウェブサイト</a></td>
                </tr>
                <tr>
                    <th>代表者名</th>
                    <td>山田太郎</td>
                </tr>
                <tr>
                    <th>創立年</th>
                    <td>1998年</td>
                </tr>
                <tr>
                    <th>事業内容</th>
                    <td>温泉宿「楽園雅苑」の運営</td>
                </tr>
                <tr>
                    <th>会社概要</th>
                    <td>
                        桜庭観光株式会社は、大分県内で美しい自然環境と伝統的な温泉文化を提供するリゾート施設を運営する会社です。私たちの温泉宿「楽園雅苑」では、四季折々の美しい景色と温泉を楽しむ贅沢な滞在を提供しております。
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<?php get_footer(); ?>