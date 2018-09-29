<?php
/**
 * Post Layout Settings
 *
 * @package chic-lifestyle
 */

add_action( 'customize_register', 'chic_lifestyle_customize_register_post_layout' );

function chic_lifestyle_customize_register_post_layout( $wp_customize ) {
	Kirki::add_section( 'chic_lifestyle_post_layout_section', array(
	    'title'          => esc_attr__( 'Blog Options', 'chic-lifestyle' ),
	    'description'    => esc_attr__( 'Blog Options', 'chic-lifestyle' ),
	    'panel'          => 'chic_lifestyle_homepage_panel',
	    'priority'       => 200,
	) );
	

	Kirki::add_field( 'chic_lifestyle_post_details', array(
		'type'        => 'multicheck',
		'settings'    => 'chic_lifestyle_post_details',
		'label'       => esc_attr__( 'Select the details to show on each post', 'chic-lifestyle' ),
		'section'     => 'chic_lifestyle_post_layout_section',
		'default'     => array( 'date', 'categories', 'tags', 'author_block' ),
		'priority'    => 10,
		'choices'     => array(
			'date' => esc_attr__( 'Show post date', 'chic-lifestyle' ),
			'author' => esc_attr__( 'Show post author', 'chic-lifestyle' ),
			'number_of_comments' => esc_attr__( 'Show number of comments', 'chic-lifestyle' ),
			'categories' => esc_attr__( 'Show Categories', 'chic-lifestyle' ),
			'tags' => esc_attr__( 'Show Tags', 'chic-lifestyle' ),
			'author_block' => esc_attr__( 'Show Author Block', 'chic-lifestyle' ),
		),
	) );
}
