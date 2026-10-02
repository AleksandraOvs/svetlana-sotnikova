<?php

/**
 * Title: Hero v2
 * Slug: svet-theme/hero-v1
 * Categories: hero, featured
 * Description: Hero-блок с акцентным заголовком, кнопками, цифрами и изображением.
 */
?>

<!-- wp:group {"align":"full","className":"hero hero-v2","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull hero hero-v2">

    <!-- wp:group {"className":"hero__inner","layout":{"type":"constrained"}} -->
    <div class="wp-block-group hero__inner">

        <!-- wp:group {"className":"hero__inner__content","layout":{"type":"constrained"}} -->
        <div class="wp-block-group hero__inner__content">

            <!-- wp:group {"className":"hero-title","layout":{"type":"constrained"}} -->
            <div class="wp-block-group hero-title">

                <!-- wp:heading {"level":1,"className":"hero__title","metadata":{"bindings":{"__default":{"source":"core/pattern-overrides"}}}} -->
                <h1 class="wp-block-heading hero__title">
                    Заголовок
                    <span class="hero__title-accent">акцентный текст</span>
                </h1>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"hero__description"} -->
                <p class="hero__description">
                    Краткое описание первого экрана. Здесь можно разместить несколько предложений о компании, услуге или основном предложении.
                </p>
                <!-- /wp:paragraph -->

            </div>
            <!-- /wp:group -->

            <!-- wp:buttons {"className":"hero-buttons"} -->
            <div class="wp-block-buttons hero-buttons">

                <!-- wp:button {"className":"button"} -->
                <div class="wp-block-button button">
                    <a class="wp-block-button__link wp-element-button">Подробнее</a>
                </div>
                <!-- /wp:button -->

                <!-- wp:button {"className":"button button-outline"} -->
                <div class="wp-block-button button button-outline">
                    <a class="wp-block-button__link wp-element-button">Связаться</a>
                </div>
                <!-- /wp:button -->

            </div>
            <!-- /wp:buttons -->

            <!-- wp:columns {"className":"wp-block-column hero-nums"} -->
            <div class="wp-block-columns hero-nums">

                <!-- wp:column {"className":"wp-block-column hero-num"} -->
                <div class="wp-block-column hero-num">
                    <!-- wp:group {"align":"full","className":"about-num__value","layout":{"type":"constrained"}} -->
                    <div class="wp-block-group alignfull about-num__value">
                        <!-- wp:paragraph {"className":"js-anim-numbers"} -->
                        <p class="js-anim-numbers">10</p>
                        <!-- /wp:paragraph -->
                    </div>

                    <!-- /wp:group -->
                    <!-- wp:paragraph -->
                    <p>описание</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->



            </div>
            <!-- /wp:columns -->



        </div>
        <!-- /wp:group -->

        <!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"hero__image"} -->
        <figure class="wp-block-image size-full hero__image">
            <img
                src="<?php echo esc_url(get_theme_file_uri('/assets/images/hero-placeholder.jpg')); ?>"
                alt="background" />
        </figure>
        <!-- /wp:image -->

    </div>
    <!-- /wp:group -->

</div>
<!-- /wp:group -->