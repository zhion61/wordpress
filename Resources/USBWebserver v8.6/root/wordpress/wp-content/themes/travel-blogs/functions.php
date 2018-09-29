<?php

/**
 * [travel_blogs_enqueue_style description]
 * @return [type] [description]
 */
function travel_blogs_enqueue_style() {

	/**
	 * If using WooCommerce, child style will also depend on di-blog-style-woo.
	 * @var array
	 */
	$dependency = array( 'bootstrap', 'font-awesome', 'di-blog-style-default', 'di-blog-style-core' );
	if( class_exists( 'WooCommerce' ) ) {
		$dependency = array( 'bootstrap', 'font-awesome', 'di-blog-style-default', 'di-blog-style-core', 'di-blog-style-woo' ); 
	}

	/**
	 * Load parent theme default style files.
	 */
    wp_enqueue_style( 'di-blog-style-default', get_template_directory_uri() . '/style.css' );

    /**
     * Load style file of this child theme.
     */
    wp_enqueue_style( 'travel-blogs-style',  get_stylesheet_directory_uri() . '/style.css', $dependency, wp_get_theme()->get('Version'), 'all' );
}
add_action( 'wp_enqueue_scripts', 'travel_blogs_enqueue_style' );


/**
 * Do not add filter for dashboard pages.
 */
if( ! is_admin() ) {
	/**
	 * [travel_blogs_excerpt_more description]
	 * @param  [type] $more [description]
	 * @return [type]       [description]
	 */
	function travel_blogs_excerpt_more( $more ) {
		global $post;
		return '&#8230; <a class="tbreadmore" href="' . esc_url( get_permalink( $post->ID ) ) . '"> ' . __( 'Continue Reading', 'travel-blogs' ) . '&#8230;</a>';
	}
	add_filter( 'excerpt_more', 'travel_blogs_excerpt_more', 1002, 1 );
}


/**
 * [travel_blogs_default_a_color description]
 * @param  [type] $default_a_color [description]
 * @return [type]                  [description]
 */
function travel_blogs_default_a_color( $default_a_color ) {
	$default_a_color = '#ff5303';
	return $default_a_color;
}
add_filter( 'di_blog_default_a_color', 'travel_blogs_default_a_color' );

/**
 * [travel_blogs_woo_onsale_lbl_bg_clr description]
 * @param  [type] $woo_onsale_lbl_bg_clr [description]
 * @return [type]                        [description]
 */
function travel_blogs_woo_onsale_lbl_bg_clr( $woo_onsale_lbl_bg_clr ) {
	$woo_onsale_lbl_bg_clr = '#ff5303';
	return $woo_onsale_lbl_bg_clr;
}
add_filter( 'di_blog_woo_onsale_lbl_bg_clr', 'travel_blogs_woo_onsale_lbl_bg_clr' );

/**
 * [travel_blogs_woo_price_clr description]
 * @param  [type] $woo_price_clr [description]
 * @return [type]                [description]
 */
function travel_blogs_woo_price_clr( $woo_price_clr ) {
	$woo_price_clr = '#ff5303';
	return $woo_price_clr;
}
add_filter( 'di_blog_woo_price_clr', 'travel_blogs_woo_price_clr' );
