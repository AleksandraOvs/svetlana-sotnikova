<?php

$video_id = get_the_ID();

$video_url = carbon_get_post_meta(
    $video_id,
    'video_url'
);

$video_placeholder = carbon_get_post_meta(
    $video_id,
    'video_placeholder'
);

$video_content = carbon_get_post_meta(
    $video_id,
    'video_content'
);

// Дефолтное изображение
if (!$video_placeholder) {
    $video_placeholder = get_template_directory_uri()
        . '/imgs/svg/video-placeholder.svg';
}

?>

<a
    href="<?php echo esc_url($video_url); ?>"
    class="videos-section__item"
    data-video-id="<?php echo esc_attr($video_id); ?>">

    <div class="videos-section__item-image">

        <img
            src="<?php echo esc_url($video_placeholder); ?>"
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

    <?php if (get_the_title()) : ?>

        <h3 class="videos-section__item-title">
            <?php the_title(); ?>
        </h3>

    <?php endif; ?>

</a>


<?php if ($video_content) : ?>

    <div
        id="video-content-<?php echo esc_attr($video_id); ?>"
        class="videos-section__popup-content"
        hidden>
        <?php echo wp_kses_post($video_content); ?>
    </div>

<?php endif; ?>