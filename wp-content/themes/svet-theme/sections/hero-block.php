<section class="hero">
    <?php
    $title = carbon_get_post_meta(get_the_ID(), 'hero_title');
    $title_accent = carbon_get_post_meta(get_the_ID(), 'hero_title_accent');
    $description = carbon_get_post_meta(get_the_ID(), 'hero_description');
    $buttons = carbon_get_post_meta(get_the_ID(), 'hero_button');
    $background = carbon_get_post_meta(get_the_ID(), 'hero_background');
    ?>
    <svg
        viewBox="0 0 1200 160"
        preserveAspectRatio="none"
        className={`pointer-events-none absolute left-0 top-0 w-full ${className}`}
        aria-hidden="true">
        <g fill="#a0000b">
            <path d="M80,0 L80,110 C80,120 74,120 74,110 L74,0 Z" />
            <path d="M110,0 L110,70 C110,78 105,78 105,70 L105,0 Z" />
            <path d="M140,0 L140,140 C140,150 134,150 134,140 L134,0 Z" />
            <path d="M320,0 L320,90 C320,100 314,100 314,90 L314,0 Z" />
            <path d="M350,0 L350,40 C350,48 345,48 345,40 L345,0 Z" />
            <path d="M600,0 L600,130 C600,140 594,140 594,130 L594,0 Z" />
            <path d="M630,0 L630,60 C630,68 625,68 625,60 L625,0 Z" />
            <path d="M920,0 L920,110 C920,120 914,120 914,110 L914,0 Z" />
            <path d="M950,0 L950,50 C950,58 945,58 945,50 L945,0 Z" />
            <path d="M1080,0 L1080,95 C1080,105 1074,105 1074,95 L1074,0 Z" />
            <path d="M1110,0 L1110,30 C1110,38 1105,38 1105,30 L1105,0 Z" />
        </g>
    </svg>

    <div class="hero__inner">
        <div class="hero__inner__content">
            <?php if ($title || $title_accent || $description) : ?>

                <div class="hero-title">

                    <h1 class="hero__title" data-scroll-animation="brightness">
                        <?php echo esc_html($title); ?>


                        <?php if ($title_accent) : ?>
                            <span>
                                <?php echo esc_html($title_accent); ?>
                            </span>
                        <?php endif; ?>
                    </h1>

                    <div class="hero__description" data-scroll-animation="fade-up">
                        <?php echo apply_filters('the_content', $description); ?>
                    </div>
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