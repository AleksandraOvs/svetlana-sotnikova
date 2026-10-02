<?php

$broadcast_id = get_the_ID();

$broadcast_url = carbon_get_post_meta(
    $broadcast_id,
    'broadcast_url'
);

$broadcast_placeholder = carbon_get_post_meta(
    $broadcast_id,
    'broadcast_placeholder'
);

$broadcast_content = carbon_get_post_meta(
    $broadcast_id,
    'broadcast_content'
);

$broadcast_show_link = carbon_get_post_meta(
    $broadcast_id,
    'broadcast_show_link'
);

$broadcast_show_title = carbon_get_post_meta(
    $broadcast_id,
    'broadcast_show_title'
);


// Дефолтное изображение
if (!$broadcast_placeholder) {
    $broadcast_placeholder = get_template_directory_uri()
        . '/imgs/svg/video-placeholder.svg';
}

?>

<div class="broadcast-item">

    <a
        href="<?php echo esc_url($broadcast_url); ?>"
        class="broadcast-item__video"
        data-video-id="<?php echo esc_attr($broadcast_id); ?>">

        <div class="broadcast-item__image">

            <img
                src="<?php echo esc_url($broadcast_placeholder); ?>"
                alt="<?php echo esc_attr(get_the_title()); ?>"
                loading="lazy">

            <span
                class="item-play"
                aria-hidden="true">
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M8 5V19L19 12L8 5Z"
                        fill="#fff" />
                </svg>
            </span>

        </div>

        <?php if (
            $broadcast_show_title === 'show'
            && get_the_title()
        ) : ?>

            <h3 class="broadcast-item__title">
                <?php the_title(); ?>
            </h3>

        <?php endif; ?>

    </a>


    <?php if ($broadcast_content) : ?>

        <div
            id="broadcast-content-<?php echo esc_attr($broadcast_id); ?>"
            class="broadcast-item__popup-content"
            hidden>
            <?php echo wp_kses_post($broadcast_content); ?>
        </div>

    <?php endif; ?>


    <?php if ($broadcast_show_link === 'show') : ?>

        <a
            href="<?php echo esc_url(get_permalink($broadcast_id)); ?>"
            class="broadcast-item__link">
            Подробнее
        </a>

    <?php endif; ?>

</div>