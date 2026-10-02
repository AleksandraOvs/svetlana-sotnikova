<?php
get_header();

$broadcast_id = get_the_ID();

$broadcast_url = carbon_get_post_meta(
    $broadcast_id,
    'broadcast_url'
);

$broadcast_content = carbon_get_post_meta(
    $broadcast_id,
    'broadcast_content'
);

$broadcast_placeholder = carbon_get_post_meta(
    $broadcast_id,
    'broadcast_placeholder'
);

if (!$broadcast_placeholder) {
    $broadcast_placeholder = get_template_directory_uri()
        . '/imgs/svg/video-placeholder.svg';
}

?>

<div class="page-content">

    <div class="fixed-container">

        <div class="section-title">

            <?php site_breadcrumbs(); ?>

            <div class="section-title__inner">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>

        </div>


        <div class="broadcast-single">

            <?php $embed_url = get_broadcast_embed_url($broadcast_url); ?>

            <?php if ($embed_url) : ?>

                <div class="broadcast-single__video">

                    <div class="broadcast-single__video-wrapper">

                        <iframe
                            src="<?php echo esc_url($embed_url); ?>"
                            title="<?php echo esc_attr(get_the_title()); ?>"
                            frameborder="0"
                            allow="autoplay; fullscreen; picture-in-picture"
                            allowfullscreen></iframe>

                    </div>

                </div>

            <?php elseif ($broadcast_url) : ?>

                <div class="broadcast-single__video-link">

                    <a
                        href="<?php echo esc_url($broadcast_url); ?>"
                        target="_blank"
                        rel="noopener noreferrer">
                        Смотреть эфир
                    </a>

                </div>

            <?php endif; ?>


            <?php if ($broadcast_content) : ?>

                <div class="broadcast-single__content">
                    <?php echo wp_kses_post($broadcast_content); ?>
                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?php
get_footer();
?>