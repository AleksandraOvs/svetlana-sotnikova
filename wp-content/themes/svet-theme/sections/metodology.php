<?php
$metods_image          = carbon_get_post_meta(get_the_ID(), 'metods_block_image');
$metods_list           = carbon_get_post_meta(get_the_ID(), 'metods_list');
?>
<section class="metodology" id="metodology">
    <div class="fixed-container">

        <div class="metodology__inner">
            <div class="metodology__inner__left">
                <?php
                $metods_block_subtitle = carbon_get_post_meta(get_the_ID(), 'metods_block_subtitle');
                $metods_block_title = carbon_get_post_meta(get_the_ID(), 'metods_block_title');
                $metods_block_title_accent = carbon_get_post_meta(get_the_ID(), 'metods_block_title_accent');
                $metods_block_title_description = carbon_get_post_meta(get_the_ID(), 'metods_block_title_description');

                get_template_part(
                    'template-parts/block-title',
                    null,
                    [
                        'desc' => 'programms_block_titles',

                        'subtitle' => $metods_block_subtitle,
                        'title'        => $metods_block_title,
                        'title_accent' => $metods_block_title_accent,
                        'description'  => $metods_block_title_description,
                    ]
                );
                ?>

                <?php if (!empty($metods_image)) : ?>
                    <div class="metods__image">
                        <?php echo wp_get_attachment_image(
                            $metods_image,
                            'full',
                            false,
                            ['loading' => 'lazy']
                        ); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="metodology__inner__right">
                <?php if (!empty($metods_list)) : ?>
                    <div class="metods__list">

                        <?php foreach ($metods_list as $index => $item) : ?>

                            <?php
                            $link = !empty($item['metods_list_item_link'])
                                ? $item['metods_list_item_link']
                                : '#';
                            ?>

                            <a
                                href="<?php echo esc_url($link); ?>"
                                class="metods-item">

                                <div class="metods-item__number">
                                    <?php echo '0' . esc_html($index + 1); ?>
                                </div>

                                <?php if (!empty($item['metods_list_item_icon'])) : ?>
                                    <div class="metods-item__icon">
                                        <?php echo wp_get_attachment_image(
                                            $item['metods_list_item_icon'],
                                            'full',
                                            false,
                                            ['loading' => 'lazy']
                                        ); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="metods-item__content">

                                    <?php if (!empty($item['metods_list_item_subtitle'])) : ?>
                                        <div class="metods-item__subtitle">
                                            <?php echo esc_html($item['metods_list_item_subtitle']); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($item['metods_list_item_title'])) : ?>
                                        <h3 class="metods-item__title">
                                            <?php echo esc_html($item['metods_list_item_title']); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if (!empty($item['metods_list_item_description'])) : ?>
                                        <div class="metods-item__description">
                                            <?php echo wp_kses_post($item['metods_list_item_description']); ?>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>