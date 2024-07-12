<?php

// WordPress title tag management
add_theme_support('title-tag');

// Enable menus feature
add_theme_support('menus');

// Define menus locations
register_nav_menus([
    'main-menu'  => 'Main navigation',
    'footer-menu'     => 'Footer navigation'
]);

function mytheme_setup() {
    // Support pour les logos personnalisés
    add_theme_support('custom-logo');

    // Enregistrement des menus
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'mytheme'),
    ));

    // Support pour les images d'en-tête personnalisées
    add_theme_support('custom-header', array(
        'width'         => 1600,
        'height'        => 900,
        'flex-height'   => true,
        'flex-width'    => true,
        'header-text'   => false,
    ));
}
add_action('after_setup_theme', 'mytheme_setup');

// Enregistrement des zones de widgets (si nécessaire)
function mytheme_widgets_init() {
    register_sidebar(array(
        'name' => __('Header Right', 'mytheme'),
        'id' => 'header-right',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'mytheme_widgets_init');

// Ajouter des paramètres et des contrôles au customizer
function mytheme_customizer_settings($wp_customize) {
    // Ajouter une section pour le header
    $wp_customize->add_section('mytheme_header_section', array(
        'title' => __('Header Settings', 'mytheme'),
        'priority' => 30,
    ));

    // Ajouter un setting pour l'image de fond du header
    $wp_customize->add_setting('mytheme_header_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Ajouter un control pour l'image de fond du header
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mytheme_header_image_control', array(
        'label' => __('Header Background Image', 'mytheme'),
        'section' => 'mytheme_header_section',
        'settings' => 'mytheme_header_image',
    )));
}
add_action('customize_register', 'mytheme_customizer_settings');
