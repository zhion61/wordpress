<?php
/**
 * Header Layout Settings
 *
 * @package chic-lifestyle
 */

add_action( 'customize_register', 'chic_lifestyle_customize_register_header_layouts' );

function chic_lifestyle_customize_register_header_layouts( $wp_customize ) {

    Kirki::add_section( 'chic_lifestyle_header_layout_section', array(
        'title'          => esc_attr__( 'Header Options', 'chic-lifestyle' ),
        'description'    => esc_attr__( 'Header Options', 'chic-lifestyle' ),
        'panel'          => 'chic_lifestyle_homepage_panel',
        'priority'       => 9,
        'capability'     => 'edit_theme_options',
    ) );

    Kirki::add_field( 'chic_lifestyle_header_sticky_menu_option', array(
        'type'        => 'checkbox',
        'settings'    => 'chic_lifestyle_header_sticky_menu_option',
        'label'       => esc_attr__( 'Make menu sticky?', 'chic-lifestyle' ),
        'description' => esc_attr__( 'Check the box to make menu sticky.', 'chic-lifestyle' ),
        'section'     => 'chic_lifestyle_header_layout_section',
        'default'     => false,
    ) );
    
    Kirki::add_field( 'chic_lifestyle_header_layouts', array(
        'type'        => 'radio-image',
        'settings'    => 'chic_lifestyle_header_layouts',
        'label'       => esc_html__( 'Layouts', 'chic-lifestyle' ),        
        'section'     => 'chic_lifestyle_header_layout_section',
        'default'     => 'one',
        'priority'    => 10,
        'choices'     => array(
            'one'   => get_stylesheet_directory_uri() . '/images/header-layouts/header-layout.jpg',
        ),
    ) );

    $wp_customize->add_setting( 'header_pro_features_info', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Pro_Features_Info( $wp_customize, 'header_pro_features_info', array(
        'label' => esc_attr__( 'Upgrade to Pro', 'chic-lifestyle' ),
        'section' => 'chic_lifestyle_header_layout_section',
        'settings' => 'header_pro_features_info',
        'extra' => esc_attr__( ' for more header layouts.', 'chic-lifestyle' ),
        'priority'  =>  20
        ) ) 
    );
}