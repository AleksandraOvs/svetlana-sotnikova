<?php
get_header(); ?>

<div class="page-content">

    <div class="fixed-container">

        <div class="section-title">
            <?php site_breadcrumbs() ?>

            <div class="section-title__inner">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>

        </div>


        <?php if (get_the_content()) : ?>

            <div class="videos-page__content">
                <?php the_content(); ?>
            </div>

        <?php endif; ?>
    </div>

</div>

<?php
get_footer();
?>