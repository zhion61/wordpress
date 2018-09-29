<?php
/**
 * Banner News Settings
 *
 * @package chic-lifestyle
 */

add_action( 'customize_register', 'chic_lifestyle_customize_register_slider_section' );

function chic_lifestyle_customize_register_slider_section( $wp_customize ) {

    Kirki::add_config( 'my_config' );
    
	Kirki::add_section( 'chic_lifestyle_slider_sections', array(
	    'title'          => esc_attr__( 'Slider Section', 'chic-lifestyle' ),
	    'description'    => esc_attr__( 'Slider section :', 'chic-lifestyle' ),
	    'panel'          => 'chic_lifestyle_homepage_panel',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'slider_display', array(
        'label'     => esc_attr__( 'Show Slider', 'chic-lifestyle' ),
        'section'   => 'chic_lifestyle_slider_sections',
        'settings'  => 'slider_display',
        'type'      => 'checkbox',
        'default'   => '1',
    ) );

    Kirki::add_field( 'slider_title', array(
        'label'     => esc_attr__( 'Slider Title', 'chic-lifestyle' ),
        'section'   => 'chic_lifestyle_slider_sections',
        'settings'  => 'slider_title',
        'type'      => 'text',
        'default'	=> '',
    ) );

    Kirki::add_field( 'slider_category', array(
        'label'     => esc_attr__( 'Slider Category', 'chic-lifestyle' ),
        'section'   => 'chic_lifestyle_slider_sections',
        'settings'  => 'slider_category',
        'type'      => 'select',
        'default'   => '',
        'multiple' 	=> 1,
		'choices'  	=> Kirki_Helper::get_terms( array( 'taxonomy' => 'category', 'exclude' => array(1) ) ),
    ) );

    Kirki::add_field( 'slider_number_of_posts', array(
        'label'     => esc_attr__( 'Number of posts', 'chic-lifestyle' ),
        'section'   => 'chic_lifestyle_slider_sections',
        'settings'  => 'slider_number_of_posts',
        'type'      => 'text',
        'default'   => 3,
        'description'   =>  'put -1 for unlimited'
    ) );

    Kirki::add_field( 'slider_details_show_hide', array(
        'type'        => 'multicheck',
        'settings'    => 'slider_details_show_hide',
        'label'       => esc_attr__( 'Show / Hide details', 'chic-lifestyle' ),
        'section'     => 'chic_lifestyle_slider_sections',
        'default'     => array( 'date', 'categories', 'summary', 'readmore' ),
        'priority'    => 10,
        'choices'     => array(
            'date' => esc_attr__( 'Show post date', 'chic-lifestyle' ),     
            'categories' => esc_attr__( 'Show Categories', 'chic-lifestyle' ),
            'summary' => esc_attr__( 'Show Summary', 'chic-lifestyle' ),
            'readmore' => esc_attr__( 'Show Read More text', 'chic-lifestyle' ),
        ),
    ) );
    

    Kirki::add_field( 'chic_lifestyle_slider_layouts', array(
        'type'        => 'radio-image',
        'settings'    => 'chic_lifestyle_slider_layouts',
        'label'       => esc_html__( 'Layouts', 'chic-lifestyle' ),
        'section'     => 'chic_lifestyle_slider_sections',
        'default'     => 'one',
        'priority'    => 10,
        'choices'     => array(
            'one'   => get_stylesheet_directory_uri() . '/images/slider-layouts/slider-layout.jpg',
        ),
    ) );
        
    $wp_customize->add_setting( 'pro_features_slider_info', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Pro_Features_Info( $wp_customize, 'pro_features_slider_info', array(
        'label' => esc_attr__( 'Upgrade to Pro', 'chic-lifestyle' ),
        'section' => 'chic_lifestyle_slider_sections',
        'settings' => 'pro_features_slider_info',
        'extra' => esc_attr__( ' for more slider options.', 'chic-lifestyle' ),
        'priority'    => 11,
    ) ) );

}