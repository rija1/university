<?php
function my_theme_enqueue_styles() {
    $parent_style = 'twentytwentyfour-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_scripts() {
    wp_enqueue_script( 'jquery-no-conflict', get_template_directory_uri() . '/js/my-great-script.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );
