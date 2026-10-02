<?php

// Блок «Точка узнавания»
$point_rec_block_list_title = carbon_get_post_meta(get_the_ID(), 'point_rec_block_list_title');
$point_rec_block_list_first = carbon_get_post_meta(get_the_ID(), 'point_rec_block_list_first');

$point_rec_block_list_title_second = carbon_get_post_meta(get_the_ID(), 'point_rec_block_list_title_second');
$point_rec_block_list_second = carbon_get_post_meta(get_the_ID(), 'point_rec_block_list_second');

$point_rec_problems_block_subtitle = carbon_get_post_meta(get_the_ID(), 'point_rec_problems_block_subtitle');
$point_rec_problems_block_title = carbon_get_post_meta(get_the_ID(), 'point_rec_problems_block_title');
$point_rec_problems_block_title_accent = carbon_get_post_meta(get_the_ID(), 'point_rec_problems_block_title_accent');
$point_rec_problems_block_title_description = carbon_get_post_meta(get_the_ID(), 'point_rec_problems_block_title_description');

$point_rec_problems_block_list = carbon_get_post_meta(get_the_ID(), 'point_rec_problems_block_list');
$point_rec_problems_block_content = carbon_get_post_meta(get_the_ID(), 'point_rec_problems_block_content');

?>

<section class="point-rec">
    <div class="fixed-container">
        <div class="point-rec__inner">

            <?php
            $point_rec_block_subtitle = carbon_get_post_meta(get_the_ID(), 'point_rec_block_subtitle');
            $point_rec_block_title = carbon_get_post_meta(get_the_ID(), 'point_rec_block_title');
            $point_rec_block_title_accent = carbon_get_post_meta(get_the_ID(), 'point_rec_block_title_accent');
            $point_rec_block_title_description = carbon_get_post_meta(get_the_ID(), 'point_rec_block_title_description');

            get_template_part(
                'template-parts/block-title',
                null,
                [
                    'desc' => 'programms_block_titles',

                    'subtitle' => $point_rec_block_subtitle,
                    'title'        => $point_rec_block_title,
                    'title_accent' => $point_rec_block_title_accent,
                    'description'  => $point_rec_block_title_description,
                ]
            );
            ?>

            <div class="point-rec__lists">

                <?php if ($point_rec_block_list_title || $point_rec_block_list_first) : ?>
                    <div class="point-rec__list">

                        <?php if ($point_rec_block_list_title) : ?>
                            <h3>
                                <?php echo esc_html($point_rec_block_list_title); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($point_rec_block_list_first) : ?>
                            <ul>
                                <?php foreach ($point_rec_block_list_first as $item) : ?>
                                    <?php if (!empty($item['point_rec_block_item'])) : ?>
                                        <li>
                                            <?php echo wp_kses_post($item['point_rec_block_item']); ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>


                <?php if ($point_rec_block_list_title_second || $point_rec_block_list_second) : ?>
                    <div class="point-rec__list">

                        <?php if ($point_rec_block_list_title_second) : ?>
                            <h3>
                                <?php echo esc_html($point_rec_block_list_title_second); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($point_rec_block_list_second) : ?>
                            <ul>
                                <?php foreach ($point_rec_block_list_second as $item) : ?>
                                    <?php if (!empty($item['point_rec_block_item_second'])) : ?>
                                        <li>
                                            <?php echo wp_kses_post($item['point_rec_block_item_second']); ?>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>

            </div>


            <div class="point-rec__inner__content">

                <?php if ($point_rec_problems_block_title || $point_rec_problems_block_title_accent) : ?>
                    <h2>
                        <?php echo esc_html($point_rec_problems_block_title); ?>

                        <?php if ($point_rec_problems_block_title_accent) : ?>
                            <span class="accent-text">
                                <?php echo esc_html($point_rec_problems_block_title_accent); ?>
                            </span>
                        <?php endif; ?>
                    </h2>
                <?php endif; ?>


                <?php if ($point_rec_problems_block_list) : ?>
                    <ul class="list-problems">

                        <?php foreach ($point_rec_problems_block_list as $item) : ?>

                            <?php if (!empty($item['point_rec_problems_block_list_item'])) : ?>
                                <li
                                    class="problem-item"
                                    data-scroll-animation="fade">
                                    <?php echo esc_html($item['point_rec_problems_block_list_item']); ?>
                                </li>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    </ul>
                <?php endif; ?>


                <?php if ($point_rec_problems_block_content) : ?>
                    <div class="point-rec__answer">
                        <?php echo wp_kses_post($point_rec_problems_block_content); ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>
</section>