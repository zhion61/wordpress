<?php
/**
 * Homepage Settings
 *
 * @package chic-lifestyle
 */

add_action( 'customize_register', 'chic_lifestyle_customize_register_homepage_panel' );

function chic_lifestyle_customize_register_homepage_panel( $wp_customize ) {
	Kirki::add_panel( 'chic_lifestyle_homepage_panel', array(
	    'priority'    => 10,
	    'title'       => esc_attr__( 'Theme Options', 'chic-lifestyle' ),
	    'description' => esc_attr__( 'Theme Options', 'chic-lifestyle' ),
	) );

	// Move Header Image and Backgroud Image Panel to Chic Lifestyle Panel
	$wp_customize->get_section( 'header_image' )->panel = 'chic_lifestyle_homepage_panel';
	$wp_customize->get_section( 'header_image' )->priority = 202;
	$wp_customize->get_section( 'background_image' )->panel = 'chic_lifestyle_homepage_panel';
	$wp_customize->get_section( 'background_image' )->priority = 202;
}