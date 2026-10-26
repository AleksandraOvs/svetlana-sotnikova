<?php
$phone      = carbon_get_theme_option('crb_phone');
$phone_link = carbon_get_theme_option('crb_phone_link');
$phone_icon = carbon_get_theme_option('crb_phone_icon');

$email      = carbon_get_theme_option('crb_email');
$email_link = carbon_get_theme_option('crb_email_link');
$email_icon = carbon_get_theme_option('crb_email_icon');
$messengers = carbon_get_theme_option('messengers');
?>

<div class="toggle-contacts__bar">
    <div class="toggle-contacts__list">

        <?php if (!empty($messengers)) : ?>
            <?php foreach ($messengers as $messenger) :

                $mes_link = $messenger['link'] ?? '';
                $mes_img_id = $messenger['icon'] ?? '';
                $mes_img_alt_id = $messenger['contact_image_alt'] ?? '';
                $mes_text = $messenger['name'] ?? '';

                $mes_img_url = $mes_img_id
                    ? wp_get_attachment_image_url($mes_img_id, 'full')
                    : '';

                //$mes_img_alt_url = $mes_img_alt_id
                //   ? wp_get_attachment_image_url($mes_img_alt_id, 'full')
                //  : '';

                //$mes_img_url = $mes_img_alt_url ?: $mes_img_url;


            ?>
                <?php if ($mes_link) : ?>
                    <div class="toggle-contacts__list__item">
                        <a
                            class="toggle-contacts__list__item__link"
                            href="<?php echo esc_url($mes_link); ?>"
                            target="_blank"
                            rel="noopener noreferrer">


                            <?php if ($mes_img_url) : ?>
                                <img
                                    src="<?php echo esc_url($mes_img_url); ?>"
                                    alt="<?php echo esc_attr($mes_text); ?>">
                            <?php endif; ?><span><?php echo esc_html($mes_text); ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if ($phone_link && $phone) : ?>
            <div class="toggle-contacts__list__item">
                <a
                    href="<?php echo esc_url($phone_link); ?>"
                    class="toggle-contacts__list__item__link">
                    <span><?php echo esc_html($phone); ?></span>
                </a>
            </div>
        <?php endif; ?>

        <?php if ($email_link && $email) : ?>
            <div class="toggle-contacts__list__item">
                <a
                    href="<?php echo esc_url('mailto:' . sanitize_email($email_link)); ?>"
                    class="toggle-contacts__list__item__link">
                    <span><?php echo esc_html($email); ?></span>

                    <?php
                    $email_icon_url = $email_icon
                        ? wp_get_attachment_image_url($email_icon, 'full')
                        : '';
                    ?>

                    <?php if ($email_icon_url) : ?>
                        <img
                            src="<?php echo esc_url($email_icon_url); ?>"
                            alt="">
                    <?php endif; ?>
                </a>
            </div>
        <?php endif; ?>

    </div>

    <a href="#" class="toggle-contacts-icon" aria-label="Открыть контакты">
        <svg width="22" height="21" viewBox="0 0 22 21"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.7496 8.75001C20.7496 7.98001 20.7356 7.22701 20.7096 6.50001C20.6266 4.12701 20.5846 2.94001 19.6196 1.96701C18.6546 0.995012 17.4336 0.943012 14.9936 0.838012C13.5797 0.778653 12.1647 0.749313 10.7496 0.750012C9.26956 0.750012 7.84456 0.780012 6.50556 0.838012C4.06556 0.943012 2.84556 0.995012 1.87956 1.96801C0.914563 2.94001 0.872563 4.12701 0.789563 6.50001C0.736812 7.99955 0.736812 9.50048 0.789563 11C0.872563 13.373 0.914563 14.56 1.87956 15.533C2.84456 16.505 4.06556 16.557 6.50556 16.662C7.24023 16.6933 7.99856 16.7167 8.78056 16.732C9.52056 16.746 9.89156 16.752 10.2176 16.877C10.5436 17.002 10.8176 17.235 11.3656 17.705L13.5446 19.575C13.6506 19.6659 13.7805 19.7244 13.9188 19.7437C14.0572 19.763 14.1981 19.7422 14.325 19.6837C14.4518 19.6253 14.5592 19.5317 14.6345 19.4141C14.7098 19.2964 14.7497 19.1597 14.7496 19.02V16.672L14.9936 16.662C17.4336 16.557 18.6536 16.505 19.6196 15.532C20.5846 14.56 20.6266 13.373 20.7096 11C20.7356 10.273 20.7496 9.52001 20.7496 8.75001Z"
                stroke="#242424" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10.8755 8.75H10.7495M6.87351 8.75H6.74951M14.8745 8.75H14.7495M10.9995 8.75C10.9995 8.8163 10.9732 8.87989 10.9263 8.92678C10.8794 8.97366 10.8158 9 10.7495 9C10.6832 9 10.6196 8.97366 10.5727 8.92678C10.5259 8.87989 10.4995 8.8163 10.4995 8.75C10.4995 8.6837 10.5259 8.62011 10.5727 8.57322C10.6196 8.52634 10.6832 8.5 10.7495 8.5C10.8158 8.5 10.8794 8.52634 10.9263 8.57322C10.9732 8.62011 10.9995 8.6837 10.9995 8.75ZM6.99951 8.75C6.99951 8.8163 6.97317 8.87989 6.92629 8.92678C6.8794 8.97366 6.81582 9 6.74951 9C6.68321 9 6.61962 8.97366 6.57273 8.92678C6.52585 8.87989 6.49951 8.8163 6.49951 8.75C6.49951 8.6837 6.52585 8.62011 6.57273 8.57322C6.61962 8.52634 6.68321 8.5 6.74951 8.5C6.81582 8.5 6.8794 8.52634 6.92629 8.57322C6.97317 8.62011 6.99951 8.6837 6.99951 8.75ZM14.9995 8.75C14.9995 8.8163 14.9732 8.87989 14.9263 8.92678C14.8794 8.97366 14.8158 9 14.7495 9C14.6832 9 14.6196 8.97366 14.5727 8.92678C14.5259 8.87989 14.4995 8.8163 14.4995 8.75C14.4995 8.6837 14.5259 8.62011 14.5727 8.57322C14.6196 8.52634 14.6832 8.5 14.7495 8.5C14.8158 8.5 14.8794 8.52634 14.9263 8.57322C14.9732 8.62011 14.9995 8.6837 14.9995 8.75Z"
                stroke="#242424" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </a>
</div>