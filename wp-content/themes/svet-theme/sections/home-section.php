<?php

$title = carbon_get_post_meta(get_the_ID(), 'crb_home_block_title');
$title_accent = carbon_get_post_meta(get_the_ID(), 'crb_home_block_title_accent');
$description = carbon_get_post_meta(get_the_ID(), 'crb_home_block_title_description');
$content = carbon_get_post_meta(get_the_ID(), 'crb_home_block_content');
$image_id = carbon_get_post_meta(get_the_ID(), 'crb_home_block_image');

$image_url = $image_id
    ? wp_get_attachment_image_url($image_id, 'full')
    : '';

$image_alt = $image_id
    ? get_post_meta($image_id, '_wp_attachment_image_alt', true)
    : '';

?>

<section class="home">

    <?php if ($image_url) : ?>
        <img
            class="home-section__img"
            data-scroll-animation="brightness"
            src="<?php echo esc_url($image_url); ?>"
            alt="<?php echo esc_attr($image_alt); ?>">
    <?php endif; ?>

    <div class="section-home__inner">

        <div class="fixed-container">

            <div class="section-title__inner _section-home__title">

                <?php if ($title || $title_accent) : ?>
                    <h2 data-scroll-animation="fade-left">

                        <?php if ($title) : ?>
                            <?php echo esc_html($title); ?>
                        <?php endif; ?>

                        <?php if ($title_accent) : ?>
                            <span class="accent-text">
                                <?php echo esc_html($title_accent); ?>
                            </span>
                        <?php endif; ?>

                    </h2>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div
                        class="section-title__description"
                        data-scroll-animation="fade-right">
                        <?php echo esc_html($description); ?>
                    </div>
                <?php endif; ?>

            </div>

            <?php if ($content) : ?>
                <div class="section-home__inner__content">
                    <?php echo wpautop(wp_kses_post($content)); ?>
                </div>
            <?php endif; ?>

        </div>

    </div>

</section>