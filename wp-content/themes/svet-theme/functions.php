<?php

/**
 * Function describe for Stroy-tech theme
 * 
 * @package stroy-tech
 */
if (! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

//include_once(trailingslashit(get_stylesheet_directory()) . 'lib/stroy-tech-metaboxes.php');
//include_once(trailingslashit(get_stylesheet_directory()) . 'lib/custom-config.php');

add_action('wp_enqueue_scripts', 'svet_theme_enqueue_styles');


function svet_theme_enqueue_styles()
{

    wp_enqueue_style('normalize-stylesheet', get_template_directory_uri() . '/css/normalize.css');
    wp_enqueue_style('svet_theme-stylesheet', get_template_directory_uri() . '/css/main-styles.css');
    wp_enqueue_style('programms-stylesheet', get_template_directory_uri() . '/css/programms.css');
    wp_enqueue_style('svet_theme-animations', get_template_directory_uri() . '/css/animations.css');

    wp_enqueue_script('animations-script', get_stylesheet_directory_uri() . '/js/animations.js', array(), _S_VERSION, true);
    wp_enqueue_script('main-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), _S_VERSION, true);
    wp_enqueue_script('faq-scripts', get_stylesheet_directory_uri() . '/js/faq.js', array(), _S_VERSION, true);
    wp_enqueue_script('sliders-script', get_stylesheet_directory_uri() . '/js/sliders.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'svet_theme_enqueue_styles');

// Подключение стилей редактора
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style(
        'svet_theme-editor-style',
        get_stylesheet_directory_uri() . '/css/editor.css',
        ['wp-edit-blocks'], // <-- зависимость от базовых стилей Gutenberg
        '1.0'
    );
});

//add_filter('wp_font_library_enabled', '__return_false');

if (!function_exists('svet_theme_theme_setup')) {
    function svet_theme_theme_setup()
    {
        // Локализация темы
        load_child_theme_textdomain('e-shop', get_stylesheet_directory() . '/languages');

        // Поддержка стилей редактора
        add_theme_support('editor-styles');

        // Поддержка кастомного логотипа
        add_theme_support('custom-logo', [
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
        ]);

        // Поддержка кастомного фона
        add_theme_support('custom-background', [
            'default-color' => 'ffffff',
        ]);
    }
}
add_action('after_setup_theme', 'svet_theme_theme_setup');

add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
});

function theme_widgets_init()
{

    register_sidebar(array(
        'name'          => esc_html__('Footer Sidebar 1', 'stroy-tech'),
        'id'            => 'footer-sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'stroy-tech'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Sidebar 2', 'stroy-tech'),
        'id'            => 'footer-sidebar-2',
        'description'   => esc_html__('Add widgets here.', 'stroy-tech'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer Sidebar 3', 'stroy-tech'),
        'id'            => 'footer-sidebar-3',
        'description'   => esc_html__('Add widgets here.', 'stroy-tech'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'theme_widgets_init');

register_nav_menus(
    array(
        'main_menu' => 'Главное меню',
    )
);

add_action('after_setup_theme', 'svet_theme_theme_setup');

function svet_theme_custom_remove($wp_customize)
{

    $wp_customize->remove_control('header-logo');
    $wp_customize->remove_section('site_bg_section');
}

add_action('customize_register', 'svet_theme_custom_remove', 100);

//разрешить загрузку свг только админам
function allow_svg_upload_for_admins($mimes)
{
    if (current_user_can('administrator')) {
        $mimes['svg'] = 'image/svg+xml';
    }
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload_for_admins');

add_filter('template_include', 'var_template_include', 1000);
function var_template_include($t)
{
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template($echo = false)
{

    if (!isset($GLOBALS['current_theme_template']))
        return false;
    if ($echo)
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}

require get_template_directory() . '/inc/walker.php';
require get_template_directory() . '/inc/customizer.php';
require get_stylesheet_directory() . '/inc/breadcrumbs.php';
require get_stylesheet_directory() . '/inc/views.php';

require get_stylesheet_directory() . '/inc/cpt.php';

add_action('init', function () {
    $patterns = WP_Block_Patterns_Registry::get_instance()->get_all_registered();
    //error_log(print_r(array_keys($patterns), true));
});

// Добавляем новый столбец "ID"
add_filter('manage_edit-product_cat_columns', function ($columns) {
    // Вставляем после названия категории
    $new_columns = [];
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'name') {
            $new_columns['cat_id'] = 'ID';
        }
    }
    return $new_columns;
});

// Заполняем столбец значением ID
add_action('manage_product_cat_custom_column', function ($content, $column, $term_id) {
    if ($column === 'cat_id') {
        $content = $term_id;
    }
    return $content;
}, 10, 3);
