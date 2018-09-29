<?php
/**
 * Rearrange Sections
 *
 * @package chic-lifestyle
 */
add_action( 'customize_register', 'chic_lifestyle_sort_homepage_sections' );

function chic_lifestyle_sort_homepage_sections( $wp_customize ) {

	Kirki::add_section( 'chic_lifestyle_sort_homepage_sections', array(
	    'title'          => esc_attr__( 'Drag and Drop', 'chic-lifestyle' ),
	    'description'    => esc_attr__( 'Drag and Drop', 'chic-lifestyle' ),
	    'panel'          => 'chic_lifestyle_homepage_panel',
	    'priority'       => 201,
	) );

	Kirki::add_field( 'chic_lifestyle_sort_homepage', array(
		'type'        => 'sortable',
		'settings'    => 'chic_lifestyle_sort_homepage',
		'label'       => __( 'Drag and Drop Sections to rearrange.', 'chic-lifestyle' ),
		'section'     => 'chic_lifestyle_sort_homepage_sections',
		'default'     => array(	       
	        'slider-section',
	        'pages-select-section',
	        'newsletter-section',
	        'archive-section',
	        'instagram-section',	        
    	),
		'choices'     => array(			
			'slider-section' => esc_attr__( 'Slider Section', 'chic-lifestyle' ),
			'pages-select-section' => esc_attr__( 'Pages Select Section', 'chic-lifestyle' ),
			'newsletter-section' => esc_attr__( 'Newsletter Section', 'chic-lifestyle' ),
			'archive-section' => esc_attr__( 'Archive Section', 'chic-lifestyle' ),
			'instagram-section'	=> esc_attr__( 'Instagram Section', 'chic-lifestyle' ),			
		),
		'priority'    => 10,
	) );
}