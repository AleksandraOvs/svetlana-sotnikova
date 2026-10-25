<?php
$programm_id = get_the_ID();

$description = carbon_get_post_meta($programm_id, 'crb_programm_description');
$summary     = carbon_get_post_meta($programm_id, 'crb_programm_summary');
$style       = carbon_get_post_meta($programm_id, 'crb_programm_style');

$structure = carbon_get_post_meta($programm_id, 'programm_structure');

$button_text = carbon_get_post_meta($programm_id, 'crb_programm_button');
$button_link = carbon_get_post_meta($programm_id, 'crb_programm_button_link');
$button_desc = carbon_get_post_meta($programm_id, 'crb_programm_button_desc');

$image = carbon_get_post_meta($programm_id, 'crb_programm_image');

$style = in_array($style, ['dark', 'accent', 'light'], true)
    ? $style
    : 'light';
?>

<article class="programm-item <?php echo esc_attr($style); ?>" data-scroll-animation="fade">
    <?php
    if ($image) {
        echo '<div class="programm-item__image">';
        $image_id = wp_get_attachment_image_url($image, 'full');
        echo '<img class="programm-image" src="' . $image_id . '" alt="the_title()" />';
        echo '</div>';
    }
    ?>

    <div class="programm-item__content">
        <div class="programm-item__content__inner">
            <?php if ($description) : ?>
                <div class="programm-item__description">
                    <?php echo esc_html($description); ?>
                </div>
            <?php endif; ?>
            <h3 class="programm-item__title">
                <?php the_title(); ?>
            </h3>



            <?php if ($summary) : ?>
                <div class="programm-item__summary">
                    <?php echo esc_html($summary); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($structure)) : ?>

                <?php
                $structure_class = count($structure) > 3 ? 'grid-element' : '';
                ?>

                <div class="programm-item__structure">

                    <?php foreach ($structure as $item) : ?>

                        <div class="programm-item__structure-item <?php echo esc_attr($structure_class); ?>">

                            <?php if (!empty($item['crb_programm_structure_icon'])) : ?>

                                <div class="programm-item__structure-icon">
                                    <?php
                                    echo wp_get_attachment_image(
                                        $item['crb_programm_structure_icon'],
                                        'full'
                                    );
                                    ?>
                                </div>

                            <?php endif; ?>

                            <div class="programm-item__structure-content">

                                <?php if (!empty($item['crb_programm_structure_name'])) : ?>
                                    <div class="programm-item__structure-name">
                                        <?php echo esc_html($item['crb_programm_structure_name']); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($item['crb_programm_structure_title'])) : ?>
                                    <div class="programm-item__structure-title">
                                        <?php echo esc_html($item['crb_programm_structure_title']); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($item['crb_programm_structure_description'])) : ?>
                                    <div class="programm-item__structure-description">
                                        <?php echo esc_html($item['crb_programm_structure_description']); ?>
                                    </div>
                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>


        </div>


        <?php if ($button_text && $button_link) : ?>
            <div class="programm-button">
                <a
                    class="programm-item__button button"
                    href="<?php echo esc_url($button_link); ?>">
                    <?php echo esc_html($button_text); ?>
                </a>
                <?php
                if ($button_desc) {
                    echo '<p>' . $button_desc . '</p>';
                }
                ?>

            </div>


        <?php endif; ?>

    </div>


</article>