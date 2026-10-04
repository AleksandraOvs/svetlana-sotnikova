<?php
$phone         = carbon_get_theme_option('crb_phone');
$phone_link    = carbon_get_theme_option('crb_phone_link');
$email         = carbon_get_theme_option('crb_email');
$email_link    = carbon_get_theme_option('crb_email_link');
$email_icon    = carbon_get_theme_option('crb_email_icon');

$address = carbon_get_theme_option('crb_address');
$hours = carbon_get_theme_option('crb_hours');

$address       = carbon_get_theme_option('crb_address');
$messengers    = carbon_get_theme_option('messengers');

$callback_button_text = carbon_get_theme_option('crb_callback_button_text');
$callback_form_id = carbon_get_theme_option('crb_callback_button_shortcode');
?>

<div class="contacts">

    <h3 class="widget-title">Связаться</h3>

    <?php if ($callback_button_text && $callback_form_id): ?>

        <button
            type="button"
            class="header__callback-button button"
            data-fancybox
            data-src="#callback-form-<?php echo esc_attr($callback_form_id); ?>">
            <span><?php echo esc_html($callback_button_text); ?></span>
        </button>

        <div
            id="callback-form-<?php echo esc_attr($callback_form_id); ?>"
            class="callback-form"
            style="display: none;">
            <?php
            echo do_shortcode(
                '[contact-form-7 id="' . absint($callback_form_id) . '"]'
            );
            ?>
        </div>

    <?php endif; ?>

    <?php if ($phone) : ?>
        <a
            class="contacts__phone"
            href="<?= esc_url($phone_link ?: 'tel:' . preg_replace('/[^0-9+]/', '', $phone)); ?>">
            <?= esc_html($phone); ?>
        </a>
    <?php endif; ?>


    <?php if ($email) :

    ?>
        <a class="contacts__email"
            href="<?= esc_url($email_link ?: 'mailto:' . $email); ?>">

            <?php if ($email_icon) :
                $email_icon_id = wp_get_attachment_image_url($email_icon, 'full');
            ?>
                <img
                    src="<?php echo $email_icon_id ?>"
                    alt=""
                    class="contacts__email-icon">
            <?php endif; ?>


            <?= esc_html($email); ?>
        </a>

    <?php endif; ?>





    <?php if (!empty($messengers)) : ?>
        <div class="contacts__messengers">

            <?php foreach ($messengers as $messenger) : ?>

                <?php
                $icon = $messenger['icon'] ?? '';
                $name = $messenger['name'] ?? '';
                $link = $messenger['link'] ?? '';

                if (!$link) {
                    continue;
                }
                ?>

                <a
                    class="contacts__messenger"
                    href="<?= esc_url($link); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="<?= esc_attr($name); ?>">
                    <?php if ($icon) : ?>
                        <img
                            src="<?= esc_url($icon); ?>"
                            alt="">
                    <?php endif; ?>

                    <?php if ($name) : ?>
                        <span><?= esc_html($name); ?></span>
                    <?php endif; ?>
                </a>

            <?php endforeach; ?>

        </div>
    <?php endif; ?>

    <?php if ($address) : ?>
        <div class="contacts__address">
            <?= wp_kses_post($address); ?>
        </div>
    <?php endif; ?>

    <?php if ($hours) : ?>
        <div class="contacts__hours">
            <?= wp_kses_post($hours); ?>
        </div>
    <?php endif; ?>

</div>