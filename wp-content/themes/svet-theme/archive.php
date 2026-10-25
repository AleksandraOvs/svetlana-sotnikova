<?php get_header(); ?>

<div class="page-content">
    <div class="fixed-container">

        <div class="section-title">
            <?php site_breadcrumbs(); ?>

            <div class="section-title__inner">
                <h1>
                    <?php
                    if (is_category()) {
                        single_cat_title();
                    } elseif (is_tag()) {
                        single_tag_title();
                    } elseif (is_tax()) {
                        single_term_title();
                    } elseif (is_post_type_archive()) {
                        post_type_archive_title();
                    } elseif (is_author()) {
                        the_archive_title();
                    } elseif (is_date()) {
                        the_archive_title();
                    } else {
                        the_archive_title();
                    }
                    ?>
                </h1>
            </div>
        </div>

        <?php
        // Описание архива: категории, метки, таксономии.
        $archive_description = get_the_archive_description();

        if ($archive_description) :
        ?>
            <div class="videos-page__content">
                <?php echo wp_kses_post($archive_description); ?>
            </div>
        <?php endif; ?>

        <?php if (have_posts()) : ?>

            <div class="archive__list">

                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    /*
                     * Подключаем карточку записи.
                     * Создай универсальный template-parts/archive-item.php
                     * либо замени путь на свой шаблон карточки.
                     */

                    $post_type = get_post_type();

                    $item_template = 'template-parts/' . $post_type . '-item';

                    //print_r($item_template);
                    // Если специализированного шаблона нет — используем универсальный.
                    if (locate_template($item_template . '.php')) {
                        get_template_part($item_template);
                    } else {
                        get_template_part('template-parts/archive-item');
                    }
                    ?>


                <?php endwhile; ?>

            </div>

            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => 'Назад',
                'next_text' => 'Вперёд',
            ));
            ?>

        <?php else : ?>

            <p class="videos-list__empty">
                Записи пока не добавлены.
            </p>

        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>