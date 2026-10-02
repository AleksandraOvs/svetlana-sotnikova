<?php

$videos_query = new WP_Query([
    'post_type'      => 'videos',
    'posts_per_page' => 6,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

?>

<?php if ($videos_query->have_posts()) : ?>

    <section class="videos-section">
        <div class="fixed-container">


            <div class="videos-section__inner">

                <?php
                $videos_block_subtitle = carbon_get_post_meta(get_the_ID(), 'videos_block_subtitle');
                $videos_block_title = carbon_get_post_meta(get_the_ID(), 'videos_block_title');
                $videos_block_title_accent = carbon_get_post_meta(get_the_ID(), 'videos_block_title_accent');
                $videos_block_title_description = carbon_get_post_meta(get_the_ID(), 'videos_block_title_description');

                get_template_part(
                    'template-parts/block-title',
                    null,
                    [
                        'desc' => 'programms_block_titles',

                        'subtitle' => $videos_block_subtitle,
                        'title'        => $videos_block_title,
                        'title_accent' => $videos_block_title_accent,
                        'description'  => $videos_block_title_description,
                    ]
                );
                ?>



                <div class="videos-section__list">

                    <?php while ($videos_query->have_posts()) : $videos_query->the_post(); ?>

                        <?php
                        get_template_part('template-parts/video-item');
                        ?>

                    <?php endwhile; ?>

                </div>


                <div class="videos-section__button">

                    <a
                        href="/videos"
                        class="button">
                        Смотреть все видео
                    </a>

                </div>

            </div>

        </div>
    </section>

<?php endif; ?>

<?php wp_reset_postdata(); ?>