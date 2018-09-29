<?php
/**
 * Archive Settings
 *
 * @package chic-lifestyle
 */

add_action( 'customize_register', 'chic_lifestyle_customize_register_archive' );

function chic_lifestyle_customize_register_archive( $wp_customize ) {
	Kirki::add_section( 'chic_lifestyle_archive_sections', array(
	    'title'          => esc_attr__( 'Archive Section', 'chic-lifestyle' ),
	    'description'    => esc_attr__( 'Archive section.', 'chic-lifestyle' ),
	    'panel'          => 'chic_lifestyle_homepage_panel',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'archive_display', array(
        'label'     => esc_attr__( 'Show Archive', 'chic-lifestyle' ),
        'section'   => 'chic_lifestyle_archive_sections',
        'settings'  => 'archive_display',
        'type'      => 'checkbox',
        'default'   => '1',
    ) );

    Kirki::add_field( 'archive_title', array(
        'label'     => esc_attr__( 'Archive Title', 'chic-lifestyle' ),
        'section'   => 'chic_lifestyle_archive_sections',
        'settings'  => 'archive_title',
        'type'      => 'text',
        'default'	=> '',
    ) );

    Kirki::add_field( 'archive_category', array(
        'label'     => esc_attr__( 'Archive Category', 'chic-lifestyle' ),
        'section'   => 'chic_lifestyle_archive_sections',
        'settings'  => 'archive_category',
        'type'      => 'select',
        'multiple' 	=> 1,
		'choices'  	=> Kirki_Helper::get_terms( array( 'taxonomy' => 'category' ) ),
    ) );

    Kirki::add_field( 'chic_lifestyle_post_layout', array(
        'type'        => 'select',
        'settings'    => 'chic_lifestyle_post_layout',
        'label'       => esc_attr__( 'Select your post layout', 'chic-lifestyle' ),
        'section'     => 'chic_lifestyle_archive_sections',
        'default'     => 'sidebar-right',
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => array(
            'sidebar-right' => esc_attr__( 'Sidebar at right', 'chic-lifestyle' ),
            'sidebar-left' => esc_attr__( 'Sidebar at left', 'chic-lifestyle' ),
        ),
    ) );

    Kirki::add_field( 'chic_lifestyle_post_view', array(
        'type'        => 'select',
        'settings'    => 'chic_lifestyle_post_view',
        'label'       => esc_attr__( 'Select your post view', 'chic-lifestyle' ),
        'section'     => 'chic_lifestyle_archive_sections',
        'default'     => 'list-view',
        'priority'    => 10,
        'multiple'    => 1,
        'choices'     => array(
            'grid-view' => esc_attr__( 'Grid View', 'chic-lifestyle' ),
            'list-view' => esc_attr__( 'List View', 'chic-lifestyle' ),
            'full-width-view' => esc_attr__( 'Fullwidth View', 'chic-lifestyle' ),
        ),
    ) );

    Kirki::add_field( 'archive_list_details', array(
        'type'        => 'multicheck',
        'settings'    => 'archive_list_details',
        'label'       => esc_attr__( 'Show / Hide details', 'chic-lifestyle' ),
        'section'     => 'chic_lifestyle_archive_sections',
        'default'     => array( 'date', 'categories', 'tags' ),
        'priority'    => 10,
        'choices'     => array(
            'author' => esc_attr__( 'Show post author', 'chic-lifestyle' ),
            'date' => esc_attr__( 'Show post date', 'chic-lifestyle' ),     
            'categories' => esc_attr__( 'Show Categories', 'chic-lifestyle' ),
            'tags' => esc_attr__( 'Show Tags', 'chic-lifestyle' ),
            'number_of_comments' => esc_attr__( 'Show number of comments', 'chic-lifestyle' ),
        ),
    ) );

}