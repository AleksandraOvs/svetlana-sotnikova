<?php

$photos = carbon_get_post_meta(get_the_ID(), 'about_me_photos');
$list = carbon_get_post_meta(get_the_ID(), 'about_me_list');

?>

<section class="about-me">

    <div class="fixed-container">

        <!-- Заголовок -->
        <?php

        $about_me_block_subtitle = carbon_get_post_meta(get_the_ID(), 'about_me_block_subtitle');
        $about_me_block_title = carbon_get_post_meta(get_the_ID(), 'about_me_block_title');
        $about_me_block_title_accent = carbon_get_post_meta(get_the_ID(), 'about_me_block_title_accent');
        $about_me_block_description = carbon_get_post_meta(get_the_ID(), 'about_me_block_title_description');

        get_template_part(
            'template-parts/block-title',
            null,
            [
                'desc'         => 'about_me_block_titles',

                'subtitle' => $about_me_block_subtitle,
                'title'        => $about_me_block_title,
                'title_accent' => $about_me_block_title_accent,
                'description'  => $about_me_block_description,
            ]
        );
        ?>


        <!-- Контент -->
        <div class="about-me__inner">

            <div class="about-me__inner__content">


                <?php
                /*
                 * ========================================
                 * Фотографии
                 * ========================================
                 */

                if (!empty($photos)) :

                    foreach ($photos as $index => $photo) :

                        $photo_id = $photo['about_me_photo'] ?? '';
                        $photo_sign = $photo['about_me_photo_sign'] ?? '';

                        if (!$photo_id) {
                            continue;
                        }

                        $image_url = wp_get_attachment_image_url($photo_id, 'full');
                        $image_alt = get_post_meta(
                            $photo_id,
                            '_wp_attachment_image_alt',
                            true
                        );

                ?>

                        <div
                            class="about-me__inner__img<?php echo $index === 1 ? ' _img-second' : ''; ?>">

                            <img
                                class="about-me__img"
                                data-scroll-animation="brightness"
                                src="<?php echo esc_url($image_url); ?>"
                                alt="<?php echo esc_attr($image_alt); ?>">

                            <?php if ($photo_sign) : ?>

                                <div
                                    class="about-me__inner__img__sign"
                                    data-scroll-animation="<?php echo $index === 1 ? 'fade-right' : 'fade'; ?>">
                                    <?php echo wp_kses_post($photo_sign); ?>
                                </div>

                            <?php endif; ?>

                        </div>

                <?php

                    endforeach;

                endif;
                ?>


                <?php
                /*
                 * ========================================
                 * Список
                 * ========================================
                 */

                if (!empty($list)) :
                ?>

                    <ul class="about-me__list">

                        <?php foreach ($list as $index => $item) : ?>

                            <?php
                            $item_text = $item['about_me_list_item'] ?? '';

                            if (!$item_text) {
                                continue;
                            }
                            ?>

                            <li
                                class="about-me__list__item"
                                data-scroll-animation="fade">

                                <span class="item-num">
                                    <?php echo esc_html(sprintf('%02d', $index + 1)); ?>
                                </span>

                                <div class="list-content">
                                    <?php echo wp_kses_post($item_text); ?>
                                </div>

                            </li>

                        <?php endforeach; ?>

                    </ul>

                <?php endif; ?>


            </div>

        </div>

    </div>

</section>