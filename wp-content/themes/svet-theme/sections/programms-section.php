<section class="programms-section" id="programms">
    <div class="fixed-container">

        <?php

        $block_subtitle = carbon_get_post_meta(get_the_ID(), 'programms_block_subtitle');
        $block_title = carbon_get_post_meta(get_the_ID(), 'programms_block_title');
        $block_title_accent = carbon_get_post_meta(get_the_ID(), 'programms_block_title_accent');
        $block_description = carbon_get_post_meta(get_the_ID(), 'programms_block_title_description');

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
            'post_type'      => 'programms',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ]);

        if ($programms->have_posts()) :
        ?>
            <div class="programms-list">
            <?php
            while ($programms->have_posts()) :
                $programms->the_post();

                get_template_part('template-parts/programms-item');

            endwhile;

            wp_reset_postdata();

        endif;
            ?>
            </div>

    </div>
</section>