<?php
$scrolling_text = carbon_get_theme_option('scrolling_text');

if ($scrolling_text) :
?>
    <div class="scrolling-text">
        <div class="scrolling-text__track">
            <span class="scrolling-text__item">
                <?= wp_kses_post($scrolling_text); ?>
            </span>
        </div>
    </div>
<?php endif; ?>