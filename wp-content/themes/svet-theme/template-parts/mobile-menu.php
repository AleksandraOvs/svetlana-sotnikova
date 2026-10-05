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
        <?php get_template_part('template-parts/contacts'); ?>
    </div>



</div>