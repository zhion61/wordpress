<?php
/**
 * Color and Fonts Settings
 *
 * @package chic-lifestyle
 */


add_action( 'customize_register', 'chic_lifestyle_change_colors_panel_title' );


function chic_lifestyle_change_colors_panel_title( $wp_customize)  {
	$wp_customize->get_section('colors')->title = esc_attr__( 'Colors and Fonts', 'chic-lifestyle' );
	$wp_customize->get_section('colors')->priority = 10;
}