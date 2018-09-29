<?php
/**
 * Demo configuration
 *
 * @package Travel Lifestyle
 */

$config = array(
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import - Layout One', 'travel-lifestyle' ),
			'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/widget.wie',
      		'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/customizer.dat',
      		'import_notice'					=> esc_html__( 'It will overwrite your settings', 'travel-lifestyle' )
		),		
		
	),
);

Travel_Lifestyle_Demo::init( apply_filters( 'travel_lifestyle_demo_filter', $config ) );