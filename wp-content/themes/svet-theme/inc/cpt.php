<?php

/**
 * -----------------------------------------------------
 * CPT: Программы
 * -----------------------------------------------------
 */
function register_programms_cpt()
{

    register_post_type('programms', [
        'labels' => [
            'name'               => 'Программы',
            'singular_name'      => 'Программа',
            'menu_name'          => 'Программы',
            'add_new'            => 'Добавить программу',
            'add_new_item'       => 'Добавить новую программу',
            'edit_item'          => 'Редактировать программу',
            'new_item'           => 'Новая программа',
            'view_item'          => 'Просмотреть программу',
            'search_items'       => 'Искать программу',
            'not_found'          => 'Программы не найдены',
            'not_found_in_trash' => 'В корзине программ нет',
        ],

        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-portfolio',

        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ],

        'has_archive'         => true,
        'rewrite' => [
            'slug'       => 'programms',
            'with_front' => false,
        ],

        // Поддержка стандартных категорий и тегов
        'taxonomies' => [
            'category',
            'post_tag',
        ],

        'show_in_rest'        => true,
    ]);
}
add_action('init', 'register_programms_cpt');

/**
 *  VIDEOS
 */

function register_videos_cpt()
{

    register_post_type('videos', [
        'labels' => [
            'name'               => 'Лучшие видеоматериалы',
            'singular_name'      => 'Видео',
            'menu_name'          => 'Видео',
            'add_new'            => 'Добавить видео',
            'add_new_item'       => 'Добавить видео',
            'edit_item'          => 'Редактировать видео',
            'new_item'           => 'Новое видео',
            'view_item'          => 'Просмотреть видео',
            'search_items'       => 'Поиск видео',
            'not_found'          => 'Видео не найдены',
            'not_found_in_trash' => 'Видео в корзине не найдены',
        ],

        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,

        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-video-alt3',

        'supports'           => [
            'title',
        ],

        // Архив
        'has_archive'        => false,

        // URL:
        // /videos/
        // /videos/nazvanie-video/
        'rewrite'            => [
            'slug'       => 'videos',
            'with_front' => false,
        ],

        'publicly_queryable' => true,
    ]);
}

add_action('init', 'register_videos_cpt');

function register_broadcasts_cpt()
{
    register_post_type('broadcasts', [
        'labels' => [
            'name'               => 'Эфиры',
            'singular_name'      => 'Эфир',
            'menu_name'          => 'Эфиры',
            'add_new'            => 'Добавить эфир',
            'add_new_item'       => 'Добавить эфир',
            'edit_item'          => 'Редактировать эфир',
            'new_item'           => 'Новый эфир',
            'view_item'          => 'Просмотреть эфир',
            'search_items'       => 'Поиск эфиров',
            'not_found'          => 'Эфиры не найдены',
            'not_found_in_trash' => 'Эфиры в корзине не найдены',
        ],

        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'publicly_queryable' => true,

        'has_archive' => false,

        'rewrite' => [
            'slug'       => 'broadcasts',
            'with_front' => false,
        ],

        'menu_icon' => 'dashicons-video-alt2',

        'supports' => [
            'title',
        ],
    ]);
}

add_action('init', 'register_broadcasts_cpt');

/**
 * TARIFS
 */

function register_tarifs_cpt()
{
    register_post_type('tarifs', [
        'labels' => [
            'name'               => 'Тарифы',
            'singular_name'      => 'Тариф',
            'menu_name'          => 'Тарифы',
            'add_new'            => 'Добавить тариф',
            'add_new_item'       => 'Добавить тариф',
            'edit_item'          => 'Редактировать тариф',
            'new_item'           => 'Новый тариф',
            'view_item'          => 'Просмотреть тариф',
            'search_items'       => 'Поиск тарифов',
            'not_found'          => 'Тарифы не найдены',
            'not_found_in_trash' => 'Тарифы в корзине не найдены',
        ],

        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,

        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-money-alt',

        'supports'           => [
            'title',
        ],

        // Архива CPT нет
        'has_archive'        => true,

        // URL:
        // /tarifs/
        // /tarifs/nazvanie-tarifa/
        'rewrite'            => [
            'slug'       => 'tarifs',
            'with_front' => false,
        ],

        'publicly_queryable' => true,
    ]);
}

add_action('init', 'register_tarifs_cpt');
