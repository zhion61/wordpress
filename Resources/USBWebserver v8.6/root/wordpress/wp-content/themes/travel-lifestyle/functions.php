<?php
function travel_lifestyle_enqueue_child_styles() {
    $parent_style = 'chic-lifestyle-style';
   
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'travel-lifestyle', get_stylesheet_directory_uri() . '/style.css', array( 'bootstrap', $parent_style ), wp_get_theme()->get( 'Version' ) );


}
add_action( 'wp_enqueue_scripts', 'travel_lifestyle_enqueue_child_styles' );

add_action( 'wp_enqueue_scripts', 'travel_lifestyle_enqueue_child_custom_scripts', 100 );
function travel_lifestyle_enqueue_child_custom_scripts()
{
    wp_dequeue_script( 'chic-lifestyle-scripts' );
    wp_enqueue_script( 'travel-lifestyle-scripts', get_stylesheet_directory_uri().'/js/script.js', array( 'jquery' ) );
}