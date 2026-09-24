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
 *  SERVICES
 */

function register_services_cpt()
{
    register_post_type('services', [
        'labels' => [
            'name'               => 'Услуги',
            'singular_name'      => 'Услуга',
            'menu_name'          => 'Услуги',
            'add_new'            => 'Добавить услугу',
            'add_new_item'       => 'Добавить новую услугу',
            'edit_item'          => 'Редактировать услугу',
            'new_item'           => 'Новая услуга',
            'view_item'          => 'Просмотреть услугу',
            'search_items'       => 'Искать услуги',
            'not_found'          => 'Услуги не найдены',
            'not_found_in_trash' => 'В корзине услуг нет',
        ],

        'public'       => true,
        'show_ui'      => true,
        'show_in_menu' => true,

        'menu_position' => 6,
        'menu_icon'     => 'dashicons-portfolio',

        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ],

        'taxonomies' => [
            'category',
            'post_tag',
        ],

        'has_archive' => true,

        'rewrite' => [
            'slug'       => 'services',
            'with_front' => false,
        ],

        'show_in_rest' => true,
    ]);
}

add_action('init', 'register_services_cpt');
