<?php
/**
 * Demo configuration
 *
 * @package Feminine_Lifestyle
 */

$config = array(
	'static_page'    => 'home',
	'posts_page'     => 'blog',
	'menu_locations' => array(
		'primary'	=>'Primary Menu',
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import - Layout One', 'chic-lifestyle' ),
			'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/widget.wie',
      		'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/customizer.dat',
      		'import_notice'					=> esc_html__( 'It will overwrite your settings', 'chic-lifestyle' ),
      		'preview_url'					=> esc_url( 'https://thebootstrapthemes.com/demo/chic-lifestyle' ),
      		'import_preview_image_url'		=> esc_url( 'http://thebootstrapthemes.com/demo/1.jpg' )
		),
		
	),
);

Chic_Lifestyle_Demo::init( apply_filters( 'chic_lifestyle_demo_filter', $config ) );