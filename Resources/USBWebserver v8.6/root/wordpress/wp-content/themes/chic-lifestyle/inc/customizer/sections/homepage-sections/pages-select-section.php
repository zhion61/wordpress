<?php
/**
 * Banner News Settings
 *
 * @package chic-lifestyle
 */

add_action( 'customize_register', 'chic_lifestyle_customize_register_pages_select_section' );

function chic_lifestyle_customize_register_pages_select_section( $wp_customize ) {

	Kirki::add_section( 'chic_lifestyle_pages_select_sections', array(
	    'title'          => esc_attr__( 'Pages Select Section', 'chic-lifestyle' ),
	    'description'    => esc_attr__( 'Pages Select section.', 'chic-lifestyle' ),
	    'panel'          => 'chic_lifestyle_homepage_panel',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'display_pages', array(
        'label'     => esc_attr__( 'Show Pages Section', 'chic-lifestyle' ),
        'section'   => 'chic_lifestyle_pages_select_sections',
        'settings'  => 'display_pages',
        'type'      => 'checkbox',
        'default'   => '1',
    ) );

    Kirki::add_field( 'pages_section_title', array(
        'label'     => esc_attr__( 'Pages Section Title', 'chic-lifestyle' ),
        'section'   => 'chic_lifestyle_pages_select_sections',
        'settings'  => 'pages_section_title',
        'type'      => 'text',
        'default'	=> '',
    ) );

    for( $i = 1; $i <= 3; $i++ ) {

        Kirki::add_field( 'select_page_' . $i, array(
            'type'        => 'dropdown-pages',
            'settings'    => 'select_page_' . $i,
            'label'       => esc_attr__( 'Select a page', 'chic-lifestyle' ),
            'section'     => 'chic_lifestyle_pages_select_sections',
            'default'     => '',
            'priority'    => 10,
        ) );
    }
}