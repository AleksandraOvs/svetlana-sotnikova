<?php

$block_title = $args['title'] ?? '';
$block_title_accent = $args['title_accent'] ?? '';
$block_description = $args['description'] ?? '';
$block_subtitle = $args['subtitle'] ?? '';

?>

<div class="section-title --centered-title">

    <?php if ($block_subtitle) : ?>
        <div class="section-title__desc --centered">
            <?php echo esc_html($block_subtitle); ?>
        </div>
    <?php endif; ?>

    <div class="section-title__inner --centered">

        <?php if ($block_title || $block_title_accent) : ?>

            <h2>

                <?php if ($block_title) : ?>
                    <?php echo wp_kses_post($block_title); ?>
                <?php endif; ?>

                <?php if ($block_title_accent) : ?>
                    <span class="accent-text">
                        <?php echo wp_kses_post($block_title_accent); ?>
                    </span>
                <?php endif; ?>

            </h2>

        <?php endif; ?>

        <?php if ($block_description) : ?>

            <div class="section-title__description">
                <?php echo wpautop(wp_kses_post($block_description)); ?>
            </div>

        <?php endif; ?>

    </div>

</div>