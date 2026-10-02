<?php
get_header();

$videos_query = new WP_Query([
    'post_type'      => 'videos',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
?>

<div class="page-content">

    <div class="fixed-container">

        <div class="section-title">
            <?php site_breadcrumbs() ?>

            <div class="section-title__inner">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>

        </div>


        <?php if (get_the_content()) : ?>

            <div class="videos-page__content">
                <?php the_content(); ?>
            </div>

        <?php endif; ?>


        <?php if ($videos_query->have_posts()) : ?>

            <div class="videos-section__list">

                <?php while ($videos_query->have_posts()) : $videos_query->the_post(); ?>

                    <?php
                    get_template_part('template-parts/video-item');
                    ?>

                <?php endwhile; ?>

            </div>

        <?php else : ?>

            <p class="videos-list__empty">
                Видео пока не добавлены.
            </p>

        <?php endif; ?>

    </div>

</div>

<?php
wp_reset_postdata();
get_footer();
?>