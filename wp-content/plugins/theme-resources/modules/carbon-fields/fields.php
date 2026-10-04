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

            Field::make('text', 'programms_block_subtitle', 'Название раздела')
                ->set_width(33),
            Field::make('text', 'programms_block_title', 'Заголовок часть 1')
                ->set_width(33),
            Field::make('text', 'programms_block_title_accent', 'Заголовок часть акцент')
                ->set_width(33),

            Field::make('rich_text', 'programms_block_title_description', 'краткое описание')
                ->set_width(100),

        ])
        // ------------------------
        // Вкладка Дом в котором тебя принимают
        // ------------------------

        ->add_tab('Блок с темным фоном и фото', [

            Field::make(
                'text',
                'crb_home_block_title',
                'Заголовок блока'
            )
                ->set_width(33),
            Field::make(
                'text',
                'crb_home_block_title_accent',
                'Акцентная часть заголовка'
            )
                ->set_width(33),
            Field::make(
                'text',
                'crb_home_block_title_description',
                'Краткое описание'
            )
                ->set_width(33),
            Field::make(
                'rich_text',
                'crb_home_block_content',
                'Контент блока'
            )
                ->set_width(70),
            Field::make(
                'image',
                'crb_home_block_image',
                'Фото для блока'
            )
                ->set_width(70),


        ])

        // ------------------------
        // Вкладка Обо мне
        // ------------------------

        ->add_tab('Блок «Обо мне»', [

            Field::make('text', 'about_me_block_subtitle', 'Название раздела')
                ->set_width(33),
            Field::make('text', 'about_me_block_title', 'Заголовок часть 1')
                ->set_width(33),
            Field::make('text', 'about_me_block_title_accent', 'Заголовок часть акцент')
                ->set_width(33),
            Field::make('rich_text', 'about_me_block_title_description', 'Краткое описание')
                ->set_width(33),

            Field::make('rich_text', 'about_me_block_text_content', 'Контент блока')
                ->set_width(100),
            Field::make('complex', 'about_me_photos', 'Фотографии для блока')
                ->set_layout('tabbed-vertical')
                ->help_text('Добавьте не более 3х фото для отображения с правой стороны блока')
                ->set_max(3)
                ->add_fields([

                    Field::make('image', 'about_me_photo', 'Фотография')
                        ->set_width(50),
                    Field::make('rich_text', 'about_me_photo_sign', 'Подпись к фото')
                        ->set_width(50),
                ]),

            Field::make('complex', 'about_me_list', 'Пункты')
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make('rich_text', 'about_me_list_item', 'Текст')
                        ->set_width(50),
                ])
        ])

        // ------------------------
        // Блок Точка узнавания
        // ------------------------
        ->add_tab('Блок «Точка узнавания»', [
            Field::make('text', 'point_rec_block_subtitle', 'Название раздела')
                ->set_width(33),
            Field::make('text', 'point_rec_block_title', 'Заголовок часть 1')
                ->set_width(33),
            Field::make('text', 'point_rec_block_title_accent', 'Заголовок часть акцент')
                ->set_width(33),
            Field::make('rich_text', 'point_rec_block_title_description', 'Краткое описание')
                ->set_width(33),

            Field::make('text', 'point_rec_block_list_title', 'Список#1 - Заголовок')
                ->set_width(50),
            Field::make('complex', 'point_rec_block_list_first', 'Пункты списка #1')
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make('rich_text', 'point_rec_block_item', 'Текст пункта')
                ]),

            Field::make('text', 'point_rec_block_list_title_second', 'Список#2 - Заголовок')
                ->set_width(50),
            Field::make('complex', 'point_rec_block_list_second', 'Пункты списка #2')
                ->set_layout('tabbed-vertical')
                ->add_fields([
                    Field::make('rich_text', 'point_rec_block_item_second', 'Краткое описание')
                ]),

            Field::make('text', 'point_rec_problems_block_subtitle', 'Название раздела')
                ->set_width(33),
            Field::make('text', 'point_rec_problems_block_title', 'Заголовок часть 1')
                ->set_width(33),
            Field::make('text', 'point_rec_problems_block_title_accent', 'Заголовок часть акцент')
                ->set_width(33),
            Field::make('rich_text', 'point_rec_problems_block_title_description', 'Краткое описание')
                ->set_width(100),

            Field::make('complex', 'point_rec_problems_block_list', 'Проблемы')
                ->add_fields([
                    Field::make('text', 'point_rec_problems_block_list_item', 'Проблема')
                ]),

            Field::make('rich_text', 'point_rec_problems_block_content', 'Текстовый контент блока')
                ->set_width(100),

        ])

        // ------------------------
        // Блок с Видеоматериалами
        // ------------------------
        ->add_tab('Блок «Лучшие видеоматериалы»', [
            Field::make('text', 'videos_block_subtitle', 'Название раздела')
                ->set_width(33),
            Field::make('text', 'videos_block_title', 'Заголовок часть 1')
                ->set_width(33),
            Field::make('text', 'videos_block_title_accent', 'Заголовок часть акцент')
                ->set_width(33),
            Field::make('rich_text', 'videos_block_title_description', 'Краткое описание')
                ->set_width(33),

        ])

        // ------------------------
        // Блок с Эфирами и обсуждениями
        // ------------------------
        ->add_tab('Блок «Эфиры и обсуждения»', [
            Field::make('text', 'broadcasts_block_subtitle', 'Название раздела')
                ->set_width(33),
            Field::make('text', 'broadcasts_block_title', 'Заголовок часть 1')
                ->set_width(33),
            Field::make('text', 'broadcasts_block_title_accent', 'Заголовок часть акцент')
                ->set_width(33),
            Field::make('rich_text', 'broadcasts_block_title_description', 'Краткое описание')
                ->set_width(33),

        ])

        // ------------------------
        // Блок Тарифов
        // ------------------------
        ->add_tab('Блок «Тарифы»', [
            Field::make('text', 'tarifs_block_subtitle', 'Название раздела')
                ->set_width(33),
            Field::make('text', 'tarifs_block_title', 'Заголовок часть 1')
                ->set_width(33),
            Field::make('text', 'tarifs_block_title_accent', 'Заголовок часть акцент')
                ->set_width(33),
            Field::make('rich_text', 'tarifs_block_title_description', 'Краткое описание')
                ->set_width(33),

        ])

        // ------------------------
        // Методология
        // ------------------------
        ->add_tab('Методология', [

            Field::make('text', 'metods_block_subtitle', 'Название раздела')
                ->set_width(33),
            Field::make('text', 'metods_block_title', 'Заголовок часть 1')
                ->set_width(33),
            Field::make('text', 'metods_block_title_accent', 'Заголовок часть акцент')
                ->set_width(33),
            Field::make('rich_text', 'metods_block_title_description', 'Краткое описание')
                ->set_width(33),
            Field::make('image', 'metods_block_image', 'Изображение для блока')
                ->set_width(33),


            Field::make('complex', 'metods_list', 'Список методов (ссылки)')
                ->add_fields([
                    Field::make('text', 'metods_list_item_link', 'Ссылка блока'),
                    Field::make('image', 'metods_list_item_icon', 'Иконка'),
                    Field::make('text', 'metods_list_item_subtitle', 'Подзаголовок'),
                    Field::make('text', 'metods_list_item_title', 'Заголовок'),
                    Field::make('rich_text', 'metods_list_item_description', 'Описание метода')
                ]),

        ])

        // ------------------------
        // FAQ
        // ------------------------

        ->add_tab('FAQ', [

            Field::make('text', 'faq_block_subtitle', 'Название раздела')
                ->set_width(33),
            Field::make('text', 'faq_block_title', 'Заголовок часть 1')
                ->set_width(33),
            Field::make('text', 'faq_block_title_accent', 'Заголовок часть акцент')
                ->set_width(33),
            Field::make('rich_text', 'faq_block_title_description', 'Краткое описание')
                ->set_width(33),
            Field::make('image', 'faq_block_image', 'Изображение для блока')
                ->set_width(33),

            Field::make('complex', 'faq', 'Вопросы и ответы')
                ->set_layout('tabbed-vertical')
                ->add_fields([

                    Field::make('text', 'question', 'Вопрос'),

                    Field::make('rich_text', 'answer', 'Ответ')
                        ->set_rows(5),

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
        ]);



    // ------------------------
    // VIDEOS
    // ------------------------
    Container::make('post_meta', 'Данные видео')
        ->where('post_type', '=', 'videos')
        ->add_fields([

            Field::make('text', 'video_url', 'Ссылка на видео')
                ->set_width(50)
                ->set_help_text(
                    'Вставьте ссылку на видео с YouTube, VK Видео, Rutube и т. д.'
                ),

            Field::make('image', 'video_placeholder', 'Превью видео')
                ->set_width(50)
                ->set_value_type('url')
                ->set_help_text(
                    'Если изображение не указано, будет использовано изображение по умолчанию.'
                ),

            Field::make('rich_text', 'video_content', 'Текстовый контент'),

        ]);

    // ------------------------
    // Broadcasts
    // ------------------------

    Container::make('post_meta', 'Данные эфира')
        ->where('post_type', '=', 'broadcasts')
        ->add_fields([

            Field::make(
                'text',
                'broadcast_url',
                'Ссылка на эфир'
            )
                ->set_help_text(
                    'Ссылка на YouTube, VK Видео, Rutube и т. д.'
                ),

            Field::make(
                'select',
                'broadcast_show_title',
                'Отображать заголовок'
            )
                ->set_options([
                    'show' => 'Отображать заголовок',
                    'hide' => 'Не отображать заголовок',
                ])
                ->set_default_value('show'),

            Field::make(
                'image',
                'broadcast_placeholder',
                'Превью эфира'
            )
                ->set_value_type('url')
                ->set_help_text(
                    'Если изображение не указано, будет использовано изображение по умолчанию.'
                ),

            Field::make(
                'rich_text',
                'broadcast_content',
                'Текстовый контент'
            ),

            Field::make(
                'select',
                'broadcast_show_link',
                'Ссылка на страницу эфира'
            )
                ->set_options([
                    'show' => 'Отображать ссылку',
                    'hide' => 'Не отображать ссылку',
                ])
                ->set_default_value('show'),

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

    // ------------------------
    // TARIFS   
    // ------------------------
    Container::make('post_meta', 'Тариф')
        ->where('post_type', '=', 'tarifs')
        ->add_fields([

            Field::make('text', 'crb_tarif_level', 'Уровень тарифа')
                ->set_width(33),
            Field::make('text', 'crb_tarif_time', 'Объем и формат')
                ->set_width(33),
            Field::make('rich_text', 'crb_tarif_desc', 'Краткое описание')
                ->set_width(33),

            Field::make('complex', 'tarif_structure', 'Структура тарифа')
                ->add_fields([
                    Field::make('text', 'tarif_structure_item', 'Пункт')
                ]),

            Field::make('text', 'crb_tarif_price', 'Цена тарифа')
                ->set_width(33),
            Field::make('text', 'crb_tarif_link', 'Ссылка на запись')
                ->set_width(33),
            Field::make('text', 'crb_tarif_link_text', 'Текст ссылки')
                ->set_width(33),

            Field::make('select', 'crb_tarif_style', 'Стиль карточки')
                ->set_width(100)
                ->set_options([
                    'accent' => 'Accent',
                    'light'  => 'Light',
                ])
                ->set_default_value('light'),
        ]);

    Container::make('theme_options', 'Настройки сайта')
        ->add_tab('Контакты', [

            Field::make('text', 'crb_phone', 'Номер телефона')
                ->set_width(50),
            Field::make('text', 'crb_phone_link', 'Ссылка номера телефона')
                ->set_width(50),

            Field::make('image', 'crb_email_icon', 'Email иконка')
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
        ])

        ->add_tab('Отзывы', [
            Field::make('text', 'reviews_block_subtitle', 'Название раздела')
                ->set_width(33),
            Field::make('text', 'reviews_block_title', 'Заголовок часть')
                ->set_width(33),
            Field::make('text', 'reviews_block_title_accent', 'Заголовок часть акцент')
                ->set_width(33),
            Field::make('rich_text', 'reviews_block_title_description', 'Краткое описание')
                ->set_width(33),

            Field::make('complex', 'reviews_list', 'Отзывы')
                ->add_fields([
                    Field::make('rich_text', 'reviews_list_item_text', 'Текст отзыва')
                        ->set_width(70),
                    Field::make('text', 'reviews_list_item_sign', 'Подпись')
                        ->set_width(30),
                ])
        ])

        ->add_tab('Бегущая строка', [
            Field::make('rich_text', 'scrolling_text', 'Текст бегущей строки')
                ->set_width(33),
        ])

        ->add_tab('Футер', [
            Field::make('rich_text', 'footer_text', 'Текст в левой колонке футера')
                ->set_width(33),
        ]);
});
