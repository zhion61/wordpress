<?php
/**
 * Instagram Settings
 *
 * @package chic-lifestyle
 */

if( class_exists( 'Blossomthemes_Instagram_Feed' ) ) {
	add_action( 'customize_register', 'chic_lifestyle_customize_register_instagram' );
}

function chic_lifestyle_customize_register_instagram( $wp_customize ) {

	Kirki::add_section( 'chic_lifestyle_instagram_sections', array(
	    'title'          => esc_attr__( 'Instagram Section', 'chic-lifestyle' ),
	    'description'    => esc_attr__( 'Instagram Section:', 'chic-lifestyle' ),
	    'panel'          => 'chic_lifestyle_homepage_panel',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'instagram_display', array(
        'label'     => esc_attr__( 'Show Instagram Section', 'chic-lifestyle' ),
        'section'   => 'chic_lifestyle_instagram_sections',
        'settings'  => 'instagram_display',
        'type'      => 'checkbox',
        'default'   => '1',
    ) );

}