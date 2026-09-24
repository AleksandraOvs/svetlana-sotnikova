</main>
<?php
$footer_logo_id = get_theme_mod('footer_logo');
$footer_logo_url = $footer_logo_id ? wp_get_attachment_image_url($footer_logo_id, 'full') : '';

$site_name = get_bloginfo('name');
$site_description = get_bloginfo('description');
?>

<footer id="colophon" class="footer white-content" role="contentinfo">
    <div class="fixed-container">
        <div class="footer-inner">
            <div class="footer-inner__col">
                <div class="footer-inner__col__logo">
                    <?php if ($footer_logo_url) { ?>
                        <img
                            src="<?= esc_url($footer_logo_url); ?>"
                            alt="<?= esc_attr($site_name); ?>">
                    <?php } else {
                    ?>
                        <div class="_footer-site-info__logo__company">

                            <?php if ($site_name): ?>
                                <p class="site-name">
                                    <?= esc_html($site_name); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($site_description): ?>
                                <p class="site-description">
                                    <?= esc_html($site_description); ?>
                                </p>
                            <?php endif; ?>

                        </div>

                    <?php

                    } ?>



                </div>
                <?php if (is_active_sidebar('footer-sidebar-1')) : ?>
                    <div class="footer-inner__col">
                        <?php dynamic_sidebar('footer-sidebar-1'); ?>
                    </div>
                <?php endif; ?>
                <?php
                // wp_nav_menu([
                //     'theme_location' => 'docs_menu',
                //     'container'      => false,
                //     'menu_class'     => 'docs-menu',
                //     'menu_id'        => '',
                //     'fallback_cb'    => false,
                //     'link_before'    => '',
                //     'link_after'     => '',
                // ]);
                ?>
            </div>
            <?php if (is_active_sidebar('footer-sidebar-2')) : ?>
                <div class="footer-inner__col">
                    <?php dynamic_sidebar('footer-sidebar-2'); ?>
                </div>
            <?php endif; ?>

            <?php if (is_active_sidebar('footer-sidebar-3')) : ?>
                <div class="footer-inner__col">
                    <?php dynamic_sidebar('footer-sidebar-3'); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
</footer>

<div id="hero-popup" class="popup" style="display:none;">
    <?php echo do_shortcode('[contact-form-7 id="e491c26" title="Предварительный расчет"]');
    ?>
</div>

<!-- SCROLL TOP -->
<button class="scroll-top" type="button" aria-label="Наверх">
    <svg width="10" height="12" viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 0L0 5L0.705 5.705L4.5 1.915V12H5.5V1.915L9.295 5.705L10 5L5 0Z" fill="#000000" />
    </svg>

</button>

</div>
<!-- end main wrapper-->

<?php if (current_user_can('manage_options')) : ?>
    <div class="current-temp"
        style="position: fixed;
  background: rgba(255,255,255,.7);
  color: #404040;
  padding: 5px 10px;
  font-size: 10px;
  bottom: 10px;
  right: 10px;">
        <?php echo get_current_template() ?>
    </div>
<?php endif; ?>

<?php get_template_part('template-parts/popups')
?>

<?php wp_footer(); ?>
</body>

</html>