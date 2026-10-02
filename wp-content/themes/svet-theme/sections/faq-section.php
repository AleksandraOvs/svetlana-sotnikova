<?php


$faq = carbon_get_post_meta(get_the_ID(), 'faq');

if (!empty($faq)) :
?>
    <section class="faq-section" id="faq">
        <div class="fixed-container">

            <?php
            $faq_block_subtitle = carbon_get_post_meta(get_the_ID(), 'faq_block_subtitle');
            $faq_block_title = carbon_get_post_meta(get_the_ID(), 'faq_block_title');
            $faq_block_title_accent = carbon_get_post_meta(get_the_ID(), 'faq_block_title_accent');
            $faq_block_title_description = carbon_get_post_meta(get_the_ID(), 'faq_block_title_description');

            get_template_part(
                'template-parts/block-title',
                null,
                [
                    'desc' => 'programms_block_titles',

                    'subtitle' => $faq_block_subtitle,
                    'title'        => $faq_block_title,
                    'title_accent' => $faq_block_title_accent,
                    'description'  => $faq_block_title_description,
                ]
            );
            ?>


            <ul class="faq-items__list">

                <?php foreach ($faq as $item) : ?>

                    <li class="faq-items__item">

                        <?php if (!empty($item['question'])) : ?>

                            <button
                                type="button"
                                class="faq-items__question"
                                aria-expanded="false">

                                <span class="faq-items__question__text">
                                    <?= esc_html($item['question']); ?>
                                </span>

                                <span class="faq-items__question__icon"></span>

                            </button>

                        <?php endif; ?>

                        <?php if (!empty($item['answer'])) : ?>

                            <div class="faq-items__answer">
                                <?= apply_filters('the_content', $item['answer']); ?>
                            </div>

                        <?php endif; ?>

                    </li>

                <?php endforeach; ?>

            </ul>
        </div>

    </section>

<?php endif; ?>