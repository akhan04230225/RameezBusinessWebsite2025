<?php
/**
 * RJB Services Theme functions
 */

function rjb_services_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( [
        'primary' => __( 'Primary Menu', 'rjb-services' ),
    ] );
}
add_action( 'after_setup_theme', 'rjb_services_setup' );

function rjb_services_scripts() {
    wp_enqueue_style( 'rjb-services-style', get_stylesheet_uri(), [], '1.0' );
}
add_action( 'wp_enqueue_scripts', 'rjb_services_scripts' );
