<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <header>
 *
 * @package chic-lifestyle
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( 'http://gmpg.org/xfn/11' ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php $layout = get_theme_mod( 'chic_lifestyle_header_layouts', 'one' ); ?>
<?php $menu_sticky = get_theme_mod( 'chic_lifestyle_header_sticky_menu_option', false ); ?>

<?php
// Default values for 'chic_lifestyle_social_media' theme mod.
$defaults = array(
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
);


	$social_media = get_theme_mod( 'chic_lifestyle_social_media', $defaults );
?>

<?php
	set_query_var( 'menu_sticky', $menu_sticky );
	set_query_var( 'social_media', $social_media );
	if( $layout == 'one' ) {
		get_template_part( 'layouts/header/header', 'layout' );
	}
?>