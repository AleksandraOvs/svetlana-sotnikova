<?php
$phone = carbon_get_theme_option('crb_phone');
$phone_link = carbon_get_theme_option('crb_phone_link');

$email = carbon_get_theme_option('crb_email');
$email_link = carbon_get_theme_option('crb_email_link');

$messengers    = carbon_get_theme_option('messengers');

?>

<div class="mobile-menu">

    <?php wp_nav_menu([
        'container' => false,
        'theme_location' => 'main_menu',
        //'walker' => new Custom_Walker_Nav_Menu,
        // 'depth' => 2,
    ]); ?>


    <div class="mobile-menu__contacts">
        <?php if ($phone): ?>
            <a
                href="<?php echo esc_url($phone_link ?: 'tel:' . preg_replace('/[^0-9+]/', '', $phone)); ?>"
                class="header__phone">
                <?php echo esc_html($phone); ?>
            </a>
        <?php endif; ?>

        <?php if ($email): ?>
            <a
                href="<?php echo esc_url($email_link ?: 'mailto:' . $email); ?>"
                class="header__email">
                <?php echo esc_html($email); ?>
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
    </div>



</div>