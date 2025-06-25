<?php
/*
Template Name: 予約が完了しました
*/
get_header();
?>

<main id="main" class="site-main reservation-page-content">
    <section class="form">
        <div class="breadcrumb-area service-breadcrumb">
            <div class="container">
                <a href="<?php echo esc_url(home_url('/')); ?>">トップ</a> >
                <span><?php the_title(); ?></span>
            </div>
        </div>

        <div class="container form_inner">
            <div class="form_header">
                <h2 class="form_title01">予約が完了しました</h2>
            </div>
        </div>

        <div class="thanks_message_container">
            <div class="thanks_message_block">
                <p>
                    「楽園雅苑 - 桜庭温泉の隠れ家 - 」へのご予約、誠にありがとうございます。<br>
                    お客様の予約が正常に受け付けられました。
                </p>
            </div>

            <div class="thanks_notes_block">
                <p class="notes_title">ご注意事項：</p>
                <p class="notes_text">
                    ご予約に関する特別なリクエストや変更がある場合、お手続きの前に当館のスタッフがご連絡いたします。<br>
                    予約内容の変更やキャンセルについては、ご予約確認メールに記載の手順に従ってご連絡いただけます。
                </p>
            </div>

            <div class="thanks_closing_block">
                <p>
                    「楽園雅苑」でのご滞在が、素晴らしい思い出とくつろぎに満ちたひとときとなることを心より願っております。<br>
                    何かご質問やご要望がある場合は、いつでもご連絡いただけます。<br>
                    お客様にお会いできることを楽しみにしております。
                </p>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>