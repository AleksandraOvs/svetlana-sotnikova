<?php

$reviews_block_subtitle = carbon_get_theme_option('reviews_block_subtitle');
$reviews_block_title = carbon_get_theme_option('reviews_block_title');
$reviews_block_title_accent = carbon_get_theme_option('reviews_block_title_accent');
$reviews_block_title_description = carbon_get_theme_option('reviews_block_title_description');

$reviews_list = carbon_get_theme_option('reviews_list');

?>

<?php if (!empty($reviews_list)) : ?>

    <section class="reviews-section" id="reviews">
        <div class="fixed-container">

            <div class="reviews-section__inner">

                <?php
                get_template_part(
                    'template-parts/block-title-center',
                    null,
                    [
                        'subtitle'     => $reviews_block_subtitle,
                        'title'        => $reviews_block_title,
                        'title_accent' => $reviews_block_title_accent,
                        'description'  => $reviews_block_title_description,
                    ]
                );
                ?>

                <div class="reviews-section__slider swiper">
                    <button
                        class="reviews-slider-button-prev"
                        type="button"
                        aria-label="Предыдущий отзыв">
                        <span></span>
                    </button>
                    <div class="reviews-section__list swiper-wrapper">

                        <?php foreach ($reviews_list as $review) : ?>

                            <div class="reviews-section__item swiper-slide">
                                <div class="review-quotes">
                                    <svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.75 1V6.5C5.74917 7.2954 5.43284 8.05798 4.87041 8.62041C4.30798 9.18284 3.5454 9.49917 2.75 9.5C2.61739 9.5 2.49021 9.44732 2.39645 9.35355C2.30268 9.25979 2.25 9.13261 2.25 9C2.25 8.86739 2.30268 8.74021 2.39645 8.64645C2.49021 8.55268 2.61739 8.5 2.75 8.5C3.28043 8.5 3.78914 8.28929 4.16421 7.91421C4.53929 7.53914 4.75 7.03043 4.75 6.5V6H1C0.734784 6 0.48043 5.89464 0.292893 5.70711C0.105357 5.51957 0 5.26522 0 5V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H4.75C5.01522 0 5.26957 0.105357 5.45711 0.292893C5.64464 0.48043 5.75 0.734784 5.75 1ZM12 0H8.25C7.98478 0 7.73043 0.105357 7.54289 0.292893C7.35536 0.48043 7.25 0.734784 7.25 1V5C7.25 5.26522 7.35536 5.51957 7.54289 5.70711C7.73043 5.89464 7.98478 6 8.25 6H12V6.5C12 7.03043 11.7893 7.53914 11.4142 7.91421C11.0391 8.28929 10.5304 8.5 10 8.5C9.86739 8.5 9.74021 8.55268 9.64645 8.64645C9.55268 8.74021 9.5 8.86739 9.5 9C9.5 9.13261 9.55268 9.25979 9.64645 9.35355C9.74021 9.44732 9.86739 9.5 10 9.5C10.7954 9.49917 11.558 9.18284 12.1204 8.62041C12.6828 8.05798 12.9992 7.2954 13 6.5V1C13 0.734784 12.8946 0.48043 12.7071 0.292893C12.5196 0.105357 12.2652 0 12 0Z" fill="#c4beb3" />
                                    </svg>
                                </div>


                                <?php if (!empty($review['reviews_list_item_text'])) : ?>
                                    <div class="reviews-section__text">
                                        <?php echo wp_kses_post($review['reviews_list_item_text']); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($review['reviews_list_item_sign'])) : ?>
                                    <div class="reviews-section__sign">
                                        <?php echo esc_html($review['reviews_list_item_sign']); ?>
                                    </div>
                                <?php endif; ?>

                            </div>

                        <?php endforeach; ?>

                    </div>


                    <div class="reviews-section__pagination swiper-pagination"></div>
                    <button
                        class="reviews-slider-button-next"
                        type="button"
                        aria-label="Следующий отзыв">
                        <span></span>
                    </button>
                </div>


            </div>

        </div>
    </section>

<?php endif; ?>