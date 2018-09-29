<?php
/**
 * Custom template tags for this theme
 * @package WordPress
 * @subpackage lz-fashion-ecommerce
 * @since 1.0
 */

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */

if ( ! function_exists( 'lz_fashion_ecommerce_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function lz_fashion_ecommerce_entry_footer() {

	$separate_meta = __( ', ', 'lz-fashion-ecommerce' );
	$categories_list = get_the_category_list( $separate_meta );
	$tags_list = get_the_tag_list( '', $separate_meta );
	if ( ( ( lz_fashion_ecommerce_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer">';			

			lz_fashion_ecommerce_edit_link();

		echo '</footer> <!-- .entry-footer -->';
	}
}
endif;


if ( ! function_exists( 'lz_fashion_ecommerce_edit_link' ) ) :

function lz_fashion_ecommerce_edit_link() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'lz-fashion-ecommerce' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

function lz_fashion_ecommerce_categorized_blog() {
	$category_count = get_transient( 'lz_fashion_ecommerce_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'lz_fashion_ecommerce_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}

if ( ! function_exists( 'lz_fashion_ecommerce_the_custom_logo' ) ) :

function lz_fashion_ecommerce_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

function lz_fashion_ecommerce_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'lz_fashion_ecommerce_categories' );
}
add_action( 'edit_category', 'lz_fashion_ecommerce_category_transient_flusher' );
add_action( 'save_post',     'lz_fashion_ecommerce_category_transient_flusher' );