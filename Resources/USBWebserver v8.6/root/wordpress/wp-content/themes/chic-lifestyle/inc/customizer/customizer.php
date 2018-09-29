<?php
/**
 * chic-lifestyle Theme Customizer
 *
 * @package chic-lifestyle
 */

$panels   = array( 'homepage-panel', 'colors-fonts-panel' );

require get_template_directory() . '/inc/customizer/custom-controls.php';

add_action( 'customize_register', 'chic_lifestyle_change_homepage_settings_options' );
function chic_lifestyle_change_homepage_settings_options( $wp_customize)  {
	$wp_customize->get_section('title_tagline')->priority = 12;
	$wp_customize->get_section('static_front_page')->priority = 13;

	$wp_customize->remove_control('header_textcolor');

	Kirki::add_field( 'chic_lifestyle_logo_size', array(
        'type'        => 'slider',
        'settings'    => 'chic_lifestyle_logo_size',
        'label'       => esc_attr__( 'Logo Size', 'chic-lifestyle' ),
        'section'     => 'title_tagline',
        'priority' => 8, 
        'default'     => 400,
        'choices'     => array(
            'min'  => 200,
            'max'  => 500,
            'step' => 1,
        ),
    ) );
}

$homepage_sections = array( 'slider-section', 'archive-section', 'pages-select-section', 'instagram-section' );


if( ! empty( $panels ) ) :
	foreach( $panels as $panel ){
	    require get_template_directory() . '/inc/customizer/panels/' . $panel . '.php';
	}
endif;


require get_template_directory() . '/inc/customizer/sections/header-layout.php';


if( ! empty( $homepage_sections ) ) :
	foreach( $homepage_sections as $section ){
	    require get_template_directory() . '/inc/customizer/sections/homepage-sections/' . $section . '.php';
	}
endif;


require get_template_directory() . '/inc/customizer/sections/colors-fonts.php';

require get_template_directory() . '/inc/customizer/sections/sort-homepage-section.php';

require get_template_directory() . '/inc/customizer/sections/post-options-section.php';

require get_template_directory() . '/inc/customizer/sections/social-media.php';


/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';