<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eshop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() . '/imgs/favi/favicon.ico' ?>" sizes="any" />

    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() . '/imgs/favi/favicon.svg' ?>" type="image/svg+xml" />
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() . '/imgs/favi/favicon.svg' ?>" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrapper">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'eshop'); ?></a>

        <header id="masthead" class="header">
            <div class="fixed-container">
                <!-- header logo -->
                <?php
                $header_logo_id = get_theme_mod('header_logo');
                $header_logo_url = $header_logo_id ? wp_get_attachment_image_url($header_logo_id, 'full') : '';

                $site_name = get_bloginfo('name');
                $site_description = get_bloginfo('description');
                ?>

                <div class="header-logo">

                    <?php if ($header_logo_url) { ?>
                        <a class="header-logo__image" href="<?php echo esc_url(home_url('/')); ?>">
                            <img
                                src="<?= esc_url($header_logo_url); ?>"
                                alt="<?= esc_attr($site_name); ?>">
                        </a>

                    <?php } else {
                    ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo__site-info">

                            <?php if ($site_name): ?>
                                <p class="site-name">
                                    <?= esc_html($site_name); ?>
                                </p>
                            <?php endif; ?>

                        </a>
                    <?php
                    } ?>



                </div>

                <?php
                wp_nav_menu([
                    'theme_location' => 'main_menu',
                    'container'      => false,
                    'menu_class'     => 'main-menu',
                    'menu_id'        => '',
                    'fallback_cb'    => false,
                    'link_before'    => '',
                    'link_after'     => '',
                    'walker'           => new MAIN_Menu_Walker
                ]);
                ?>

                <div class="header__contacts">

                    <?php
                    $phone = carbon_get_theme_option('crb_phone');
                    $phone_link = carbon_get_theme_option('crb_phone_link');

                    $email = carbon_get_theme_option('crb_email');
                    $email_link = carbon_get_theme_option('crb_email_link');

                    $callback_button_text = carbon_get_theme_option('crb_callback_button_text');
                    $callback_form_id = carbon_get_theme_option('crb_callback_button_shortcode');
                    ?>

                    <div class="header__contacts__links">
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
                    </div>



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
                    <button class="menu-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>





                <!-- end of header logo -->
            </div>





        </header><!-- #masthead -->

        <?php get_template_part('template-parts/mobile-menu')
        ?>

        <main id="primary" class="site-main">