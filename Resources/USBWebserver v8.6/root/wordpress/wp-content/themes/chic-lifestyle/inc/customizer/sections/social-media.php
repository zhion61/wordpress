<?php
/**
 * Social Media Sections
 *
 * @package chic-lifestyle
 */
add_action( 'customize_register', 'chic_lifestyle_social_media_sections' );

function chic_lifestyle_social_media_sections( $wp_customize ) {

	Kirki::add_section( 'chic_lifestyle_social_media_sections', array(
	    'title'         => esc_attr__( 'Social Media', 'chic-lifestyle' ),
	    'description'   => esc_attr__( 'Social Media', 'chic-lifestyle' ),
	    'panel'			=>	'chic_lifestyle_homepage_panel',
	    'priority'      => 10,
	) );

	Kirki::add_field( 'chic_lifestyle_social_media', array(
		'type'        => 'repeater',
		'label'       => esc_attr__( 'Social Media', 'chic-lifestyle' ),
		'section'     => 'chic_lifestyle_social_media_sections',
		'priority'    => 10,
		'row_label' => array(
			'type'  => 'field',
			'value' => esc_attr__('Social Media Title', 'chic-lifestyle' ),
			'field' => 'social_media_title',
		),
		'settings'    => 'chic_lifestyle_social_media',
		'default'     => '',
		'default'     => array(
			array(
				'social_media_title' => esc_attr__( 'Facebook', 'chic-lifestyle' ),
				'social_media_class' => 'fa fa-facebook',
				'social_media_link'  => 'http://facebook.com/thebootstrapthemes/',
			),
			array(
				'social_media_title' => esc_attr__( 'Twitter', 'chic-lifestyle' ),
				'social_media_class' => 'fa fa-twitter',
				'social_media_link'  => 'http://twitter.com/themesbootstrap/',
			),
			array(
				'social_media_title' => esc_attr__( 'Google Plus', 'chic-lifestyle' ),
				'social_media_class' => 'fa fa-google-plus',
				'social_media_link'  => '',
			),
			array(
				'social_media_title' => esc_attr__( 'Youtube', 'chic-lifestyle' ),
				'social_media_class' => 'fa fa-youtube-play',
				'social_media_link'  => '',
			),
			array(
				'social_media_title' => esc_attr__( 'Linkedin', 'chic-lifestyle' ),
				'social_media_class' => 'fa fa-linkedin',
				'social_media_link'  => '',
			),
			array(
				'social_media_title' => esc_attr__( 'Pinterest', 'chic-lifestyle' ),
				'social_media_class' => 'fa fa-pinterest',
				'social_media_link'  => '',
			),
			array(
				'social_media_title' => esc_attr__( 'Instagram', 'chic-lifestyle' ),
				'social_media_class' => 'fa fa-instagram',
				'social_media_link'  => '',
			),
				
			
		),
		'fields' => array(
			'social_media_title' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Social Media Title', 'chic-lifestyle' ),
				'description' => esc_attr__( 'This will be the label.', 'chic-lifestyle' ),
				'default'     => '',
			),
			'social_media_class' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Social Media Class', 'chic-lifestyle' ),
				'default'     => '',
			),
			'social_media_link' => array(
				'type'      => 'text',
				'label'     => esc_attr__( 'Social Media Links', 'chic-lifestyle' ),
		        'default'   => '',
			),			
		)
	) );
	
}