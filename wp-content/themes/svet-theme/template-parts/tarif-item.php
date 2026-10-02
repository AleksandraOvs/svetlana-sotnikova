<?php

$tarif_id = get_the_ID();

// Основные поля
$tarif_level = carbon_get_post_meta(
    $tarif_id,
    'crb_tarif_level'
);

$tarif_time = carbon_get_post_meta(
    $tarif_id,
    'crb_tarif_time'
);

$tarif_desc = carbon_get_post_meta(
    $tarif_id,
    'crb_tarif_desc'
);

// Структура
$tarif_structure = carbon_get_post_meta(
    $tarif_id,
    'tarif_structure'
);

// Цена
$tarif_price = carbon_get_post_meta(
    $tarif_id,
    'crb_tarif_price'
);

// Ссылка
$tarif_link = carbon_get_post_meta(
    $tarif_id,
    'crb_tarif_link'
);

$tarif_link_text = carbon_get_post_meta(
    $tarif_id,
    'crb_tarif_link_text'
);

// Стиль
$tarif_style = carbon_get_post_meta(
    $tarif_id,
    'crb_tarif_style'
);

if (!$tarif_style) {
    $tarif_style = 'light';
}

?>

<article class="tarif-item tarif-item--<?php echo esc_attr($tarif_style); ?>" data-scroll-animation="fade-up">

    <div class="tarif-item__content">
        <div class="tarif-item__top">

            <?php if ($tarif_level) : ?>

                <div class="tarif-item__level">
                    <?php echo esc_html($tarif_level); ?>
                </div>

            <?php endif; ?>
            <?php if ($tarif_time) : ?>

                <div class="tarif-item__time">
                    <?php echo esc_html($tarif_time); ?>
                </div>

            <?php endif; ?>
        </div>

        <?php if (get_the_title()) : ?>

            <h3 class="tarif-item__title">
                <?php the_title(); ?>
            </h3>

        <?php endif; ?>


        <?php if ($tarif_desc) : ?>

            <div class="tarif-item__desc">
                <?php echo wp_kses_post($tarif_desc); ?>
            </div>

        <?php endif; ?>


        <?php if (!empty($tarif_structure)) : ?>

            <ul class="tarif-item__structure">

                <?php foreach ($tarif_structure as $item) : ?>

                    <?php if (!empty($item['tarif_structure_item'])) : ?>

                        <li class="tarif-item__structure-item">
                            <div class="tarif-item__structure-item__icon">
                                <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 7.00002L7 13L17 1.00002" stroke="#A0000B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>

                            <span>
                                <?php echo esc_html($item['tarif_structure_item']); ?>
                            </span>

                        </li>

                    <?php endif; ?>

                <?php endforeach; ?>

            </ul>

        <?php endif; ?>
    </div>



    <div class="tarif-item__bottom">

        <?php if ($tarif_price) : ?>

            <div class="tarif-item__price">
                <?php echo esc_html($tarif_price); ?>
            </div>

        <?php endif; ?>


        <?php if ($tarif_link) : ?>

            <a
                href="<?php echo esc_url($tarif_link); ?>"
                class="tarif-item__link button-dark">
                <?php
                echo esc_html(
                    $tarif_link_text ?: 'Записаться'
                );
                ?>
            </a>

        <?php endif; ?>

    </div>

</article>