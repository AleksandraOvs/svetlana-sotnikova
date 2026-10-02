<section class="broadcasts-section" id="broadcasts">
    <div class="fixed-container">

        <?php

        $block_subtitle = carbon_get_post_meta(get_the_ID(), 'broadcasts_block_subtitle');
        $block_title = carbon_get_post_meta(get_the_ID(), 'broadcasts_block_title');
        $block_title_accent = carbon_get_post_meta(get_the_ID(), 'broadcasts_block_title_accent');
        $block_description = carbon_get_post_meta(get_the_ID(), 'broadcasts_block_title_description');

        get_template_part(
            'template-parts/block-title',
            null,
            [
                'desc' => 'programms_block_titles',

                'subtitle' => $block_subtitle,
                'title'        => $block_title,
                'title_accent' => $block_title_accent,
                'description'  => $block_description,
            ]
        );
        ?>

        <?php
        $programms = new WP_Query([
            'post_type'      => 'broadcasts',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ]);

        if ($programms->have_posts()) :
        ?>
            <div class="broadcasts-list">
            <?php
            while ($programms->have_posts()) :
                $programms->the_post();

                get_template_part('template-parts/broadcast-item');

            endwhile;

            wp_reset_postdata();

        endif;
            ?>
            </div>
            <div class="videos-section__button">

                <a
                    href="/broadcasts"
                    class="button">
                    Смотреть все видео
                </a>

            </div>

    </div>
</section>