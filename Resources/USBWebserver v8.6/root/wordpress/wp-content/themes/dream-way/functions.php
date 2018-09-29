<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage Dream Way
 * @since Dream Way 1.0
*/

/**
 * Dream Way setup.
 *
 * @since Dream Way 1.0
 */
 
define( 'SGWINDOWCHILD', 'DreamWay' );
  
function dreamway_setup() {

	$defaults = sgwindow_get_defaults();

	load_child_theme_textdomain( 'dreamway', get_stylesheet_directory() . '/languages' );
	
	$args = array(
		'default-image'          => get_stylesheet_directory_uri() . '/img/header.jpg',
		'header-text'            => true,
		'default-text-color'     => '000',
		'width'                  => absint( sgwindow_get_theme_mod( 'size_image' ) ),
		'height'                 => absint( sgwindow_get_theme_mod( 'size_image_height' ) ),
		'flex-height'            => true,
		'flex-width'             => true,
	);
	add_theme_support( 'custom-header', $args );
	
	remove_action( 'sgwindow_empty_sidebar_before_footer-home', 'sgwindow_the_footer_sidebar_widgets', 20 );
	remove_action( 'sgwindow_empty_sidebar_top-home', 'sgwindow_the_top_sidebar_widgets', 20 );
	remove_action( 'sgwindow_empty_column_2-portfolio-page', 'sgwindow_right_sidebar_portfolio', 20 );
	remove_action( 'admin_menu', 'sgwindow_admin_page' );
}
add_action( 'after_setup_theme', 'dreamway_setup' );

/**
 * Dream Way Colors.
 *
 * @since Dream Way 1.0
 */
   
function dreamway_setup_colors() {
	
	/* colors */
	global $sgwindow_colors_class;
	
	$section_id = 'main_colors';
	$section_priority = 10;
	$p = 10;
	
	$i = 'link_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Link', 'sg-window'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#840a2b');
	$sgwindow_colors_class->set_color($i, 1, '#840a2b');
	$sgwindow_colors_class->set_color($i, 2, '#840a2b');
	
	$i = 'heading_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('H1-H6 heading', 'sg-window'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#000');
	$sgwindow_colors_class->set_color($i, 1, '#000');
	$sgwindow_colors_class->set_color($i, 2, '#000');
	
	$i = 'heading_link';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('H1-H6 Link', 'sg-window'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#840a2b');	
	$sgwindow_colors_class->set_color($i, 1, '#840a2b');	
	$sgwindow_colors_class->set_color($i, 2, '#840a2b');
	
	$i = 'description_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Description', 'sg-window'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#6b6b6b');	
	$sgwindow_colors_class->set_color($i, 1, '#6b6b6b');
	$sgwindow_colors_class->set_color($i, 2, '#6b6b6b');			
	
	$i = 'hover_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Link Hover', 'sg-window'), $p++, false, 'refresh');
	$sgwindow_colors_class->set_color($i, 0, '#dd3333');
	$sgwindow_colors_class->set_color($i, 1, '#dd3333');
	$sgwindow_colors_class->set_color($i, 2, '#dd3333');

}
add_action( 'after_setup_theme', 'dreamway_setup_colors', 100 );

/**
 * remove section Logo from the customizer
 *
 * @package WordPress
 * @subpackage Dream Way
 * @since Dream Way 1.0
*/
function dreamway_customize_deregister( $wp_customize ) {

	$wp_customize->remove_section( 'sgwindow_theme_logotype' );

}
add_action( 'customize_register', 'dreamway_customize_deregister' );
/**
 * Enqueue parent and child scripts
 *
 * @package WordPress
 * @subpackage Dream Way
 * @since Dream Way 1.0
*/
function dreamway_styles() {
    wp_enqueue_style( 'sgwindow-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'dreamway-style', get_stylesheet_uri(), array( 'sgwindow-style' ) );
	
	wp_enqueue_style( 'dreamway-colors', get_stylesheet_directory_uri() . '/css/scheme-' . esc_attr( sgwindow_get_theme_mod( 'color_scheme' ) ) . '.css', array( 'dreamway-style', 'sgwindow-colors' ) );
}
add_action( 'wp_enqueue_scripts', 'dreamway_styles' );

/**
 * Set defaults
 *
 * @package WordPress
 * @subpackage Dream Way
 * @since Dream Way 1.0
*/

function dreamway_defaults( $defaults ) {

	$defaults['is_parallax_header'] = '1';
	$defaults['parallax_image_speed'] = 30;
	$defaults['parallax_image_height'] = 350;

	$defaults['is_show_top_menu'] = '';
	$defaults['body_font'] = 'Open Sans';
	$defaults['heading_font'] = 'Open Sans';
	$defaults['header_font'] = 'Tangerine';
	$defaults['column_background_url'] = '';
	$defaults['logotype_url'] =  '';
	$defaults['post_thumbnail_size'] = '400';
	
	$defaults['width_top_widget_area'] = '1366';
	$defaults['width_content_no_sidebar'] = '1366';	
	$defaults['width_content'] = '1366';
	$defaults['width_main_wrapper'] = '1366';
	$defaults['is_home_footer'] = '1';
	$defaults['front_page_style'] = '1';
	
	$defaults['is_header_on_front_page_only'] = '';
	
	/* portfolio: excerpt/content */
	$defaults['portfolio_style'] = 'none';
	
	/* Header Image size */
	$defaults['size_image'] = '1680';
	$defaults['size_image_height'] = '500';
	/* Header Image and top sidebar wrapper */
	$defaults['width_image'] = '1680';
		
	$defaults['width_column_1_left_rate'] = '30';
	$defaults['width_column_1_right_rate'] = '30';
	$defaults['width_column_1_rate'] = '22';
	$defaults['width_column_2_rate'] = '22';
	
	$defaults['single_style'] = 'none';

	$defaults['defined_sidebars']['home'] = array(
											'use' => '1', 
											'callback' => 'is_front_page', 
											'param' => '', 
											'title' => __( 'Home', 'sg-window' ),
											'sidebar-top' => '1',
											'sidebar-before-footer' => '1',
											'column-1' => '1',
											'column-2' => '1', 
											);

	$defaults['footer_text'] = '<a href="' . __( 'http://wordpress.org/', 'dreamway' ) . '">' . __( 'Powered by WordPress', 'dreamway' ). '</a> | ' . __( 'theme ', 'dreamway' ) . '<a href="' .  __( '#', 'dreamway') . '">Dream Way</a>';
	
	return $defaults;

}
add_filter( 'sgwindow_option_defaults', 'dreamway_defaults' );

/**
 * Hook widgets into right sidebar at the front page
 *
 * @package WordPress
 * @subpackage Dream Way
 * @since Dream Way 1.0
*/

function dreamway_home_right_column( $layouts ) {

	the_widget( 'WP_Widget_Search', 'title=' );
	the_widget( 'WP_Widget_Categories' );
	the_widget( 'WP_Widget_Tag_Cloud', 'title=' );
	the_widget( 'WP_Widget_Recent_Comments' );
	
}
add_action('sgwindow_empty_column_2-home', 'dreamway_home_right_column', 20);


/**
 * Add widgets to the right sidebar on portfolio pages
 *
 * @since Dream Way 1.0
 */
function dreamway_right_sidebar_portfolio() {

	the_widget( 'sgwindow_items_portfolio', 'title='.__('Recent Projects', 'dreamway').
								'&count=8'.
								'&jetpack-portfolio-type=0'.
								'&columns=column-2'.
								'&is_background=1'.
								'&is_margin_0='.
								'&is_link=1'.
								'&effect_id_0=effect-1');
}
add_action('sgwindow_empty_column_2-portfolio-page', 'dreamway_right_sidebar_portfolio', 20);

/**
 * Hook widgets into right sidebar at the front page
 *
 * @package WordPress
 * @subpackage Dream Way
 * @since Dream Way 1.0
*/

function dreamway_home_left_column( $layouts ) {

	the_widget( 'sgwindow_items_category', 'title=' . __('Recent Posts', 'sg-window').
								'&count=4'.
								'&category=0'.
								'&is_animate=1'.
								'&is_animate_once=1'.
								'&columns=column-1'.
								'&is_background=1'.
								'&is_margin_0='.
								'&is_link=1'.
								'&effect_id=effect-9');
}
add_action('sgwindow_empty_column_1-home', 'dreamway_home_left_column', 20);