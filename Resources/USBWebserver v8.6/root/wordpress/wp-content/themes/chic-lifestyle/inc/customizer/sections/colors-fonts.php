<?php
/**
 * Colors and Fonts Settings
 *
 * @package chic-lifestyle
 */


require get_template_directory() . '/inc/google-fonts.php';

add_action( 'customize_register', 'chic_lifestyle_customize_font_family' );

function chic_lifestyle_customize_font_family( $wp_customize ) {
            
    $wp_customize->add_setting('pro_features_info', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new Pro_Features_Info( $wp_customize, 'pro_features_info', array(
        'label' => esc_attr__( 'Upgrade to Pro', 'chic-lifestyle' ),
        'section' => 'colors',
        'settings' => 'pro_features_info',
        'extra' => esc_attr__( ' for more color options.', 'chic-lifestyle' )
        ) ) 
    );


    $wp_customize->add_setting( 'font_family', array(
        'capability'  => 'edit_theme_options',
        'default'     => 'Poppins',
        'sanitize_callback' => 'chic_lifestyle_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'font_family', array(
        'settings'    => 'font_family',
        'label'       =>  esc_attr__( 'Choose Font Family For Your Site', 'chic-lifestyle' ),
        'section'     => 'colors',
        'type'        => 'select',
        'choices'     => google_fonts(),
        'priority'    => 100
    ) );
}


add_action( 'customize_register', 'chic_lifestyle_customize_font_size' );

function chic_lifestyle_customize_font_size( $wp_customize ) {
    $wp_customize->add_setting( 'font_size', array(
      'capability'  => 'edit_theme_options',
      'default'     => '13px',
      'sanitize_callback' => 'chic_lifestyle_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'font_size', array(
        'settings'    => 'font_size',
        'label'       =>  __( 'Choose Font Size', 'chic-lifestyle' ),
        'section'     => 'colors',
        'type'        => 'select',
        'default'     => '13px',
        'choices'     =>  array(             
                        '13px' => '13px',
                        '14px' => '14px',
                        '15px' => '15px',
                        '16px' => '16px',
                        '17px' => '17px',
                        '18px' => '18px',
                    ),
        'priority'    =>  101
      ) );
}

add_action( 'init', 'chic_lifestyle_font_weight' );

function chic_lifestyle_font_weight( $wp_customize ) {

    Kirki::add_field( 'chic_lifestyle_font_weight', array(
        'type'        => 'slider',
        'settings'    => 'chic_lifestyle_font_weight',
        'label'       => esc_attr__( 'Font Weight', 'chic-lifestyle' ),
        'section'     => 'colors',
        'priority' => 102, 
        'default'     => 400,
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) );
}

add_action( 'init', 'chic_lifestyle_line_height' );

function chic_lifestyle_line_height( $wp_customize ) {

    Kirki::add_field( 'chic_lifestyle_line_height', array(
        'type'        => 'number',
        'settings'    => 'chic_lifestyle_line_height',
        'label'       => esc_attr__( 'Line Height', 'chic-lifestyle' ),
        'section'     => 'colors',
        'priority' => 102, 
        'default'     => 22,
        'choices'     => array(
            'min'  => 13,
            'max'  => 53,
            'step' => 1,
        ),
    ) );
}

add_action( 'customize_register', 'chic_lifestyle_heading_options' );
function chic_lifestyle_heading_options( $wp_customize ) {
            
    $wp_customize->add_setting( 'heading_options_text', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Heading_Options_Text( $wp_customize, 'heading_options_text', array(
        'label' => esc_attr__( 'Heading Options :', 'chic-lifestyle' ),
        'section' => 'colors',
        'settings' => 'heading_options_text',
        'priority'    => 103
    ) ) );
}


add_action( 'customize_register', 'chic_lifestyle_heading_font_family' );

function chic_lifestyle_heading_font_family( $wp_customize ) {

    $wp_customize->add_setting( 'heading_font_family', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'chic_lifestyle_sanitize_google_fonts',
        'default'     => 'Poppins',
    ) );

    $wp_customize->add_control( 'heading_font_family', array(
        'settings'    => 'heading_font_family',
        'label'       =>  esc_attr__( 'Font Family', 'chic-lifestyle' ),
        'section'     => 'colors',
        'type'        => 'select',
        'choices'     => google_fonts(),
        'priority'    => 103
    ) );

}


add_action( 'customize_register', 'chic_lifestyle_heading_font_weight' );

function chic_lifestyle_heading_font_weight( $wp_customize ) {

     Kirki::add_field( 'heading_font_weight', array(
        'type'        => 'slider',
        'settings'    => 'heading_font_weight',
        'label'       => esc_attr__( 'Font Weight', 'chic-lifestyle' ),
        'section'     => 'colors',
        'priority' => 103, 
        'default'     => 400,
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) );

}


add_action( 'customize_register', 'chic_lifestyle_heading_font_style' );

function chic_lifestyle_heading_font_style( $wp_customize ) {
    $default_size = array(
        '1' =>  30,
        '2' =>  28,
        '3' =>  26,
        '4' =>  24,
        '5' =>  22,
        '6' =>  20,
    );

    for( $i = 1; $i <= 6 ; $i++ ) {
        Kirki::add_field( 'chic_lifestyle_heading_' . $i . '_size', array(
            'type'        => 'number',
            'label'       => esc_attr__( 'Heading ', 'chic-lifestyle' ) . $i . esc_attr__(' Size', 'chic-lifestyle' ),
            'settings'    => 'chic_lifestyle_heading_' . $i . '_size',
            'default'     => $default_size[$i],
            'priority' => 103,  
            'section'     => 'colors',
            'choices'     => array(
                'min'  => 10,
                'max'  => 50,
                'step' => 1,
            ), 
        ) );
    }
}