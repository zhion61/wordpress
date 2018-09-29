<?php

// Template Name: Home

get_header();

$sections = get_theme_mod( 'chic_lifestyle_sort_homepage', array(
    'slider-section',
    'pages-select-section',
    'newsletter-section',
    'archive-section',
    'instagram-section',    
) );


if ( ! empty( $sections ) && is_array( $sections ) ) :

	foreach ( $sections as $section ) :				
		get_template_part( 'template-parts/home-sections/' . $section, $section );
	endforeach;

endif;

get_footer();