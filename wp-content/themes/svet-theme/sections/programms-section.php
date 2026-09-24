<section class="programms-section" id="programms">
    <div class="fixed-container">

        <?php
        $programms_title_1 = carbon_get_post_meta(get_the_ID(), 'programms_block_title');
        $programms_title_2 = carbon_get_post_meta(get_the_ID(), 'programms_block_title_2');
        $programms_description = carbon_get_post_meta(get_the_ID(), 'programms_block_title_description');
        ?>

        <div class="section-title">
            <div class="section-title__desc">С чего начать</div>

            <div class="section-title__inner">
                <?php if ($programms_title_1 || $programms_title_2) : ?>

                    <h2>
                        <?php if ($programms_title_1) : ?>
                            <?php echo esc_html($programms_title_1); ?>
                        <?php endif; ?>

                        <?php if ($programms_title_2) : ?>
                            <span class="accent-text">
                                <?php echo esc_html($programms_title_2); ?>
                            </span>
                        <?php endif; ?>
                    </h2>

                <?php endif; ?>

                <?php if ($programms_description) : ?>

                    <div class="section-title__description">
                        <?php echo wpautop(wp_kses_post($programms_description)); ?>
                    </div>

                <?php endif; ?>
            </div>


        </div>

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

                get_template_part('template-parts/programm-item');

            endwhile;

            wp_reset_postdata();

        endif;
            ?>
            </div>

    </div>
</section>