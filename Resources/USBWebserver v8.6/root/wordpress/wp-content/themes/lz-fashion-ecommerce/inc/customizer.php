<?php
/**
 * lz-fashion-ecommerce: Customizer
 *
 * @package WordPress
 * @subpackage lz-fashion-ecommerce
 * @since 1.0
 */

function lz_fashion_ecommerce_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'lz_fashion_ecommerce_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'lz-fashion-ecommerce' ),
	    'description' => __( 'Description of what this panel does.', 'lz-fashion-ecommerce' ),
	) );

	$wp_customize->add_section( 'lz_fashion_ecommerce_theme_options_section', array(
    	'title'      => __( 'General Settings', 'lz-fashion-ecommerce' ),
		'priority'   => 30,
		'panel' => 'lz_fashion_ecommerce_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('lz_fashion_ecommerce_theme_options',array(
        'default' => __('Right Sidebar','lz-fashion-ecommerce'),
        'sanitize_callback' => 'lz_fashion_ecommerce_sanitize_choices'	        
	));

	$wp_customize->add_control('lz_fashion_ecommerce_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','lz-fashion-ecommerce'),
        'section' => 'lz_fashion_ecommerce_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','lz-fashion-ecommerce'),
            'Right Sidebar' => __('Right Sidebar','lz-fashion-ecommerce'),
            'One Column' => __('One Column','lz-fashion-ecommerce'),
            'Three Columns' => __('Three Columns','lz-fashion-ecommerce'),
            'Four Columns' => __('Four Columns','lz-fashion-ecommerce'),
            'Grid Layout' => __('Grid Layout','lz-fashion-ecommerce')
        ),
	));

	// Contact Details
	$wp_customize->add_section( 'lz_fashion_ecommerce_contact_details', array(
    	'title'      => __( 'Contact Details', 'lz-fashion-ecommerce' ),
		'priority'   => null,
		'panel' => 'lz_fashion_ecommerce_panel_id'
	) );

	$wp_customize->add_setting('lz_fashion_ecommerce_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_fashion_ecommerce_call',array(
		'label'	=> __('Contact Number','lz-fashion-ecommerce'),
		'section'=> 'lz_fashion_ecommerce_contact_details',
		'setting'=> 'lz_fashion_ecommerce_call',
		'type'=> 'text'
	));

	$wp_customize->add_setting('lz_fashion_ecommerce_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_fashion_ecommerce_mail',array(
		'label'	=> __('Email Address','lz-fashion-ecommerce'),
		'section'=> 'lz_fashion_ecommerce_contact_details',
		'setting'=> 'lz_fashion_ecommerce_mail',
		'type'=> 'text'
	));	

	//home page slider
	$wp_customize->add_section( 'lz_fashion_ecommerce_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'lz-fashion-ecommerce' ),
		'priority'   => null,
		'panel' => 'lz_fashion_ecommerce_panel_id'
	) );

	$wp_customize->add_setting('lz_fashion_ecommerce_slider_hide_show',array(
	       'default' => 'true',
	       'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lz_fashion_ecommerce_slider_hide_show',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider','lz-fashion-ecommerce'),
	   'section' => 'lz_fashion_ecommerce_slider_section',
	));


	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'lz_fashion_ecommerce_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'lz_fashion_ecommerce_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'lz_fashion_ecommerce_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'lz-fashion-ecommerce' ),
			'section'  => 'lz_fashion_ecommerce_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	//	Terms and Condition
	$wp_customize->add_section('lz_fashion_ecommerce_service',array(
		'title'	=> __('Terms and Condition','lz-fashion-ecommerce'),
		'description'=> __('This section will appear below the slider.','lz-fashion-ecommerce'),
		'panel' => 'lz_fashion_ecommerce_panel_id',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
	if($i==0){
	$default = $category->slug;
	$i++;
	}

	$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('lz_fashion_ecommerce_category_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('lz_fashion_ecommerce_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','lz-fashion-ecommerce'),
		'section' => 'lz_fashion_ecommerce_service',
	));

	//Trending-products
	$wp_customize->add_section( 'lz_fashion_ecommerce_trending_page' , array(
    	'title'      => __( 'Trending Products', 'lz-fashion-ecommerce' ),
		'priority'   => null,
		'panel' => 'lz_fashion_ecommerce_panel_id'
	) );

	for ( $count = 0; $count <= 0; $count++ ) {

		$wp_customize->add_setting( 'lz_fashion_ecommerce_trending_products' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'lz_fashion_ecommerce_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'lz_fashion_ecommerce_trending_products' . $count, array(
			'label'    => __( 'Select Page', 'lz-fashion-ecommerce' ),
			'section'  => 'lz_fashion_ecommerce_trending_page',
			'type'     => 'dropdown-pages'
		));
	}


	//Footer
    $wp_customize->add_section( 'lz_fashion_ecommerce_footer', array(
    	'title'      => __( 'Footer Text', 'lz-fashion-ecommerce' ),
		'priority'   => null,
		'panel' => 'lz_fashion_ecommerce_panel_id'
	) );

    $wp_customize->add_setting('lz_fashion_ecommerce_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_fashion_ecommerce_footer_copy',array(
		'label'	=> __('Footer Text','lz-fashion-ecommerce'),
		'section'	=> 'lz_fashion_ecommerce_footer',
		'setting'	=> 'lz_fashion_ecommerce_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'lz_fashion_ecommerce_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'lz_fashion_ecommerce_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'lz_fashion_ecommerce_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'lz_fashion_ecommerce_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'lz-fashion-ecommerce' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'lz-fashion-ecommerce' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'lz_fashion_ecommerce_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'lz_fashion_ecommerce_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'lz_fashion_ecommerce_customize_register' );

function lz_fashion_ecommerce_customize_partial_blogname() {
	bloginfo( 'name' );
}

function lz_fashion_ecommerce_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function lz_fashion_ecommerce_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function lz_fashion_ecommerce_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class LZ_Fashion_Ecommerce_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'LZ_Fashion_Ecommerce_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new LZ_Fashion_Ecommerce_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'LZ Fashion Ecommerce Pro', 'lz-fashion-ecommerce' ),
					'pro_text' => esc_html__( 'Go Pro','lz-fashion-ecommerce' ),
					'pro_url'  => esc_url( 'https://www.luzuk.com/themes/fashion-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'lz-fashion-ecommerce-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'lz-fashion-ecommerce-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
LZ_Fashion_Ecommerce_Customize::get_instance();