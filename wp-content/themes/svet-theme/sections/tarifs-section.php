<?php

$tarifs_query = new WP_Query([
    'post_type'      => 'tarifs',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
?>

<?php if ($tarifs_query->have_posts()) : ?>

    <section class="tarifs-section" id="tarifs">
        <div class="fixed-container">

            <div class="tarifs-section__inner">

                <?php
                $tarifs_block_subtitle = carbon_get_post_meta(get_the_ID(), 'tarifs_block_subtitle');
                $tarifs_block_title = carbon_get_post_meta(get_the_ID(), 'tarifs_block_title');
                $tarifs_block_title_accent = carbon_get_post_meta(get_the_ID(), 'tarifs_block_title_accent');
                $tarifs_block_title_description = carbon_get_post_meta(get_the_ID(), 'tarifs_block_title_description');

                get_template_part(
                    'template-parts/block-title',
                    null,
                    [
                        'desc' => 'programms_block_titles',

                        'subtitle' => $tarifs_block_subtitle,
                        'title'        => $tarifs_block_title,
                        'title_accent' => $tarifs_block_title_accent,
                        'description'  => $tarifs_block_title_description,
                    ]
                );
                ?>

                <div class="tarifs-section__list">

                    <?php while ($tarifs_query->have_posts()) : $tarifs_query->the_post(); ?>

                        <?php
                        get_template_part('template-parts/tarif-item');
                        ?>

                    <?php endwhile; ?>

                </div>

            </div>

        </div>
    </section>

<?php endif; ?>

<?php wp_reset_postdata(); ?>