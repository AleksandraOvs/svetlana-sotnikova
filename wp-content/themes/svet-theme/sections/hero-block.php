<section class="hero">
    <?php
    $title = carbon_get_post_meta(get_the_ID(), 'hero_title');
    $title_accent = carbon_get_post_meta(get_the_ID(), 'hero_title_accent');
    $description = carbon_get_post_meta(get_the_ID(), 'hero_description');
    $buttons = carbon_get_post_meta(get_the_ID(), 'hero_button');
    $background = carbon_get_post_meta(get_the_ID(), 'hero_background');
    ?>

    <div class="hero__inner">
        <div class="hero__inner__content">
            <?php if ($title || $title_accent) : ?>

                <div class="hero-title">
                    <ul class="hero-title-descriptions">
                        <li>книга бренда</li>
                    </ul>
                    <h1 class="hero__title" data-scroll-animation="brightness">
                        <?php echo esc_html($title); ?>


                        <?php if ($title_accent) : ?>
                            <span>
                                <?php echo esc_html($title_accent); ?>
                            </span>
                        <?php endif; ?>
                    </h1>
                    <ul class="hero-title-descriptions">
                        <li>Коуч</li>
                        <li>Психолог</li>
                        <li>Лидер мнений</li>
                    </ul>
                </div>

            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="hero__description" data-scroll-animation="fade-up">
                    <?php echo apply_filters('the_content', $description); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($buttons)) : ?>

                <div class="hero-buttons">
                    <?php foreach ($buttons as $index => $button) : ?>

                        <a
                            class="button <?php echo $index === 1 ? 'button-outline' : ''; ?>"
                            href="<?php echo esc_url($button['url']); ?>">
                            <?php echo esc_html($button['text']); ?>
                        </a>

                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

            <?php
            $nums = carbon_get_post_meta(get_the_ID(), 'hero_nums');
            ?>

            <?php if (!empty($nums)) : ?>

                <ul class="hero-nums">

                    <?php foreach ($nums as $num) : ?>

                        <li class="hero-num" data-scroll-animation="fade-up">

                            <div class="about-num__value">
                                <span
                                    class="js-anim-numbers"
                                    data-number="<?php echo esc_attr($num['num_value']); ?>">0</span><?php echo esc_html($num['num_suffix']); ?>
                            </div>

                            <span>
                                <?php echo esc_html($num['num_label']); ?>
                            </span>

                        </li>

                    <?php endforeach; ?>

                </ul>

            <?php endif; ?>
        </div>

        <?php if ($background) :
        ?>

            <?php echo '<img class="hero__image" data-scroll-animation="brightness" src="' . esc_url($background) . '" alt="background">'; ?>
        <?php endif; ?>

        <!-- <div class="hero-inner__advs" data-scroll-animation="fade-right">
            <?php
            //$hero_advs = carbon_get_post_meta(get_the_ID(), 'hero_advs');
            ?>
            <?php //if ($hero_advs) : 
            ?>


                <ul class="hero-advs list-style-markers">

                    <?php //foreach ($hero_advs as $adv) : 
                    ?>

                        <?php //if (!empty($adv['text'])) : 
                        ?>
                            <li class="hero-advs__item">
                                <?php //echo esc_html($adv['text']); 
                                ?>
                            </li>
                        <?php //endif; 
                        ?>

                    <?php //endforeach; 
                    ?>

                </ul>


            <?php //endif; 
            ?>
        </div> -->

    </div>


</section>