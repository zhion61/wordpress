<?php
function chic_lifestyle_dynamic_css() {
	wp_enqueue_style(
		'dynamic-css', get_stylesheet_directory_uri() . '/css/dynamic.css'
	);

        $font_family = esc_attr( get_theme_mod( 'font_family', 'Poppins' ) );
        $font_size = esc_attr( get_theme_mod( 'font_size', '13px' ) );
        $font_weight = absint( get_theme_mod( 'chic_lifestyle_font_weight', 400 ) );
        $line_height = absint( get_theme_mod( 'chic_lifestyle_line_height', 22 ) );
       
        $logo_size = absint( get_theme_mod( 'chic_lifestyle_logo_size', 400 ) );
        $logo_font_size = absint( $logo_size / 10 );

        $heading_font_family = esc_attr( get_theme_mod( 'heading_font_family', 'Poppins' ) );
        $heading_font_weight = esc_attr( get_theme_mod( 'heading_font_weight', 400 ) );


        $default_size = array(
                '1' =>  32,
                '2' =>  28,
                '3' =>  24,
                '4' =>  20,
                '5' =>  15,
                '6' =>  12,
        );

	    for( $i = 1; $i <= 6 ; $i++ ) {
	    	$heading[$i] = absint( get_theme_mod( 'chic_lifestyle_heading_' . $i . '_size', absint( $default_size[$i] ) ) );
	    }


        $dynamic_css = "
                body{ font: $font_weight $font_size/$line_height"."px $font_family; }
                section.logo img{ width: {$logo_size}"."px; }
                section.logo h1{ font-size: {$logo_font_size}"."px; }
                
                h1{ font: $heading_font_weight {$heading[1]}"."px $heading_font_family }
                h2{ font: $heading_font_weight {$heading[2]}"."px $heading_font_family }
                h3{ font: $heading_font_weight {$heading[3]}"."px $heading_font_family }
                h4{ font: $heading_font_weight {$heading[4]}"."px $heading_font_family }
                h5{ font: $font_weight {$heading[5]}"."px $font_family }
                h6{ font: $font_weight {$heading[6]}"."px $font_family }
               
        ";
        wp_add_inline_style( 'dynamic-css', $dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'chic_lifestyle_dynamic_css' );
?>