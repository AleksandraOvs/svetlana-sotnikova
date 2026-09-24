<?php

defined('ABSPATH') || exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

if (!class_exists('\Carbon_Fields\Container')) {

    add_action('admin_notices', function () {
?>
        <div class="notice notice-warning">
            <p>
                <strong>Theme Resources:</strong>
                Carbon Fields не подключен.
                Для работы полей необходимо включить
                «Carbon Fields» в настройках Site Resources.
            </p>
        </div>
<?php
    });

    return;
}

add_action('carbon_fields_register_fields', function () {

    // ------------------------
    // иконки для пунктов меню
    // ------------------------

    Container::make('nav_menu_item', 'Настройки пункта меню')
        ->add_fields([
            Field::make('image', 'menu_item_icon', 'Иконка')
                ->set_value_type('id'),
        ]);


    // ------------------------
    // страница ABOUT
    // ------------------------

    Container::make('post_meta', 'About Page')
        ->where('post_type', '=', 'page')
        ->where('post_id', '=', get_option('page_on_front'))

        // ------------------------
        // Hero
        // ------------------------

        ->add_tab('Hero', [

            Field::make('text', 'hero_title', 'Заголовок')
                ->set_width(50),

            Field::make('text', 'hero_title_accent', 'Выделенный текст')
                ->set_width(50),
            Field::make('image', 'hero_background', 'Изображение фона')
                ->set_value_type('url'),
            Field::make('rich_text', 'hero_description', 'Описание')
                ->set_rows(5),



            Field::make('complex', 'hero_button', 'Кнопки первого экрана')
                ->set_layout('tabbed-vertical')
                ->set_max(2)
                ->add_fields([

                    Field::make('text', 'text', 'Текст кнопки'),

                    Field::make('text', 'url', 'Ссылка кнопки')
                        ->set_attribute('type', 'url'),

                ]),

            Field::make('complex', 'hero_nums', 'Показатели')
                ->set_layout('grid')
                ->add_fields([
                    Field::make('text', 'num_value', 'Значение')
                        ->set_attribute('type', 'number')
                        ->set_default_value(0)
                        ->set_width(30),

                    Field::make('text', 'num_suffix', 'Суффикс')
                        ->set_width(20)
                        ->set_help_text('Например: +'),

                    Field::make('text', 'num_label', 'Подпись')
                        ->set_width(50),
                ])

        ])

        ->add_tab('Программы', [

            Field::make('text', 'programms_block_title', 'Заголовок часть 1')
                ->set_width(50),
            Field::make('text', 'programms_block_title_2', 'Заголовок часть акцент')
                ->set_width(50),

            Field::make('rich_text', 'programms_block_title_description', 'краткое описание')
                ->set_width(50),

        ])
        // ------------------------
        // Вкладка PROJECTS
        // ------------------------

        ->add_tab('Проекты', [

            Field::make(
                'text',
                'crb_projects_block_title',
                'Заголовок блока Проекты'
            )
                ->set_width(100),

            Field::make(
                'complex',
                'crb_about_projects_list',
                'О проектах'
            )
                ->add_fields([
                    Field::make(
                        'text',
                        'crb_about_projects_list_item',
                        'Пункт проекта'
                    )
                        ->set_width(100),
                ]),

            Field::make(
                'complex',
                'crb_projects_list',
                'Слайды проектов'
            )
                ->add_fields([

                    Field::make(
                        'association',
                        'projects',
                        'Проекты в слайде'
                    )
                        ->set_types([
                            [
                                'type'      => 'post',
                                'post_type' => 'projects',
                            ],
                        ])
                        ->set_max(2)
                        ->set_width(100),
                ]),

        ])

        // ------------------------
        // Блок с формой о/с
        // ------------------------

        ->add_tab('Форма обратной связи', [
            Field::make(
                'text',
                'crb_feedback_block_title',
                'Заголовок блока'
            )
                ->set_width(50),
            Field::make(
                'rich_text',
                'crb_feedback_block_description',
                'Описание блока'
            )
                ->set_width(50),

            Field::make(
                'association',
                'crb_feedback_form',
                'Форма обратной связи'
            )
                ->set_types([
                    [
                        'type'      => 'post',
                        'post_type' => 'wpcf7_contact_form',
                    ],
                ])
                ->set_max(1),
        ])

        // ------------------------
        // О нашей работе
        // ------------------------


        ->add_tab('Как мы работаем', [

            Field::make('text', 'crb_about_works_title', 'Заголовок')
                ->set_width(50),
            Field::make('text', 'crb_about_works_subtitle', 'Подзаголовок')
                ->set_width(50),
            Field::make('complex', 'crb_about_works_list', 'Текстовые пункты')
                ->set_layout('tabbed-vertical')
                ->add_fields([

                    Field::make('text', 'crb_about_works_list_item_title', 'Заголовок пункта')
                        ->set_width(50),
                    Field::make('rich_text', 'crb_about_works_list_item_text', 'Текст')
                        ->set_width(50),
                ]),
            Field::make('image', 'crb_about_works_image', 'Изображение для блока')
                ->set_width(50),


        ])

        // ------------------------
        // PARTNERS
        // ------------------------

        ->add_tab('Наши партнеры', [
            Field::make('text', 'title', 'Заголовок H2')
                ->set_width(50),
            Field::make('text', 'subtitle', 'Подзаголовок')
                ->set_width(50),
            Field::make('complex', 'slider-partners', 'Слайды')
                ->add_fields([
                    Field::make('text', 'crb_partner_name', 'Название компании')
                        ->set_width(50),

                    Field::make('image', 'crb_partner_logo', 'Логотип')
                        ->set_width(50),

                ]),

        ])

        // ------------------------
        // ЗАДАЧИ
        // ------------------------

        ->add_tab('Задачи', [
            Field::make('text', 'tasks_title', 'Заголовок H2')
                ->set_width(50),

            Field::make('complex', 'crb_tasks_list', 'Список задач')
                ->add_fields([
                    Field::make('text', 'crb_tasks_list_title', 'Заголовок задачи')
                        ->set_width(50),

                    Field::make('rich_text', 'crb_tasks_list_text', 'Текст задачи')
                        ->set_width(50),

                ]),

        ])

        // ------------------------
        // ИНФОБЛОК
        // ------------------------

        ->add_tab('Инф. блок', [
            Field::make('text', 'info_block_title', 'Заголовок H2')
                ->set_width(50),
            Field::make('text', 'info_block_description', 'Подзаголовок')
                ->set_width(50),

            Field::make('complex', 'info_block_list', 'Список')
                ->add_fields([
                    Field::make('text', 'info_block_list_item_title', 'Заголовок пункта')
                        ->set_width(50),

                    Field::make('rich_text', 'info_block_list_item_text', 'Текст пункта')
                        ->set_width(50),

                ]),

            Field::make('image', 'crb_info_block_image', 'Изображение для блока')
                ->set_width(50),

        ])

        // ------------------------
        // ПРЕИМУЩЕСТВА
        // ------------------------

        ->add_tab('Преимущества', [
            Field::make('text', 'adv_block_title', 'Заголовок H2')
                ->set_width(50),

            Field::make('complex', 'adv_block_list', 'Список')
                ->add_fields([
                    Field::make('rich_text', 'adv_block_list_item_title', 'Заголовок пункта')
                        ->set_width(50),

                    Field::make('rich_text', 'adv_block_list_item_text', 'Текст пункта')
                        ->set_width(50),

                ]),

        ])

        ->add_tab('Благодарственные письма', [
            Field::make('text', 'reviews_title', 'Заголовок H2')
                ->set_width(50),

            Field::make('complex', 'reviews_list', 'Письма')
                ->add_fields([
                    Field::make('image', 'review_item', 'Изображение')
                        ->set_width(50),
                ]),
        ])

        ->add_tab('Этапы работ', [
            Field::make('text', 'how_title', 'Заголовок H2')
                ->set_width(50),

            Field::make('complex', 'how_list', 'Список')
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make('text', 'how_list_item_title', 'Заголовок пункта')
                        ->set_width(50),
                    Field::make('rich_text', 'how_list_item', 'Пункт')
                        ->set_width(50),

                ]),

        ])

        // ------------------------
        // Блок с формой о/с
        // ------------------------

        ->add_tab('Форма обратной связи #2', [
            Field::make(
                'text',
                'crb_feedback_block2_title',
                'Заголовок блока'
            )
                ->set_width(50),
            Field::make(
                'rich_text',
                'crb_feedback_block2_description',
                'Описание блока'
            )
                ->set_width(50),

            Field::make(
                'association',
                'crb_feedback2_form',
                'Форма обратной связи'
            )
                ->set_types([
                    [
                        'type'      => 'post',
                        'post_type' => 'wpcf7_contact_form',
                    ],
                ])
                ->set_max(1),
        ]);




    // ------------------------
    // FAQ
    // ------------------------

    // ->add_tab('FAQ', [

    //     Field::make('complex', 'faq', 'Вопросы и ответы')
    //         ->set_layout('tabbed-vertical')
    //         ->add_fields([

    //             Field::make('text', 'question', 'Вопрос'),

    //             Field::make('rich_text', 'answer', 'Ответ')
    //                 ->set_rows(5),

    //         ]),

    // ]);

    // ------------------------
    // SERVICES
    // ------------------------
    Container::make('post_meta', 'Подробности услуги')
        ->where('post_type', '=', 'services')
        ->add_fields([

            Field::make('complex', 'service_details', 'Подробности')
                //->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make('text', 'text', 'Значение')
                        ->set_width(100),
                ]),

        ]);

    // ------------------------
    // PROGRAMMS
    // ------------------------
    Container::make('post_meta', 'Контент программы')
        ->where('post_type', '=', 'programms')
        ->add_fields([

            Field::make('text', 'crb_programm_description', 'Подзаголвок программы')
                ->set_width(100),
            Field::make('rich_text', 'crb_programm_summary', 'Краткое описание программы')
                ->set_width(100),

            Field::make('complex', 'programm_structure', 'Структура программы')
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make('image', 'crb_programm_structure_icon', 'Иконка элемента')
                        ->set_width(33),
                    Field::make('text', 'crb_programm_structure_name', 'Название элемента')
                        ->set_width(33),
                    Field::make('text', 'crb_programm_structure_title', 'Заголовок элемента')
                        ->set_width(33),
                    Field::make('rich_text', 'crb_programm_structure_description', 'Описание элемента')
                        ->set_width(33),
                ]),

            Field::make('text', 'crb_programm_button', 'Текст кнопки')
                ->set_width(33),
            Field::make('text', 'crb_programm_button_link', 'Ссылка кнопки')
                ->set_width(33),
            Field::make('text', 'crb_programm_button_desc', 'Описание кнопки')
                ->set_width(33),
            Field::make('image', 'crb_programm_image', 'Изображение для программы')
                ->set_width(33),


            Field::make('select', 'crb_programm_style', 'Стиль карточки')
                ->set_width(100)
                ->set_options([
                    'dark'   => 'Dark',
                    'accent' => 'Accent',
                    'light'  => 'Light',
                ])
                ->set_default_value('light'),

        ]);

    Container::make('theme_options', 'Контакты')
        ->add_tab('Контакты', [

            Field::make('text', 'crb_phone', 'Номер телефона')
                ->set_width(50),
            Field::make('text', 'crb_phone_link', 'Ссылка номера телефона')
                ->set_width(50),

            Field::make('text', 'crb_email', 'Email')
                ->set_width(50),
            Field::make('text', 'crb_email_link', 'Ссылка Email')
                ->set_width(50),

            Field::make('text', 'crb_callback_button_text', 'Текст кнопки для формы')
                ->set_width(50),

            Field::make('select', 'crb_callback_button_shortcode', 'Форма для кнопки')
                ->set_width(50)
                ->set_options(function () {

                    $forms = get_posts([
                        'post_type'      => 'wpcf7_contact_form',
                        'posts_per_page' => -1,
                        'post_status'    => 'publish',
                        'orderby'        => 'title',
                        'order'          => 'ASC',
                    ]);

                    $options = [
                        '' => '— Выберите форму —',
                    ];

                    foreach ($forms as $form) {
                        $options[$form->ID] = $form->post_title;
                    }

                    return $options;
                }),


            Field::make('rich_text', 'crb_address', 'Адрес')
                ->set_width(50),
            Field::make('rich_text', 'crb_hours', 'Время работы')
                ->set_width(50),
            Field::make('text', 'crb_map', 'Код карты')
                ->set_width(100),


            Field::make('complex', 'messengers', 'Мессенджеры')
                ->set_layout('tabbed-vertical')
                ->setup_labels([
                    'plural_name'   => 'Мессенджеры',
                    'singular_name' => 'Мессенджер',
                ])
                ->add_fields([
                    Field::make('image', 'icon', 'Иконка')
                        ->set_value_type('url')
                        ->set_width(25),

                    Field::make('text', 'name', 'Название')
                        ->set_width(30),

                    Field::make('text', 'link', 'Ссылка')
                        ->set_width(45),
                ]),
        ]);
});
