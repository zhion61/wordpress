<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage lz-fashion-ecommerce
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'lz-fashion-ecommerce' ) ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header">
	<div class="toggle"><a class="togglewooMenu" href="#"><?php esc_html_e('Woocommerce Menu','lz-fashion-ecommerce'); ?></a></div>
	<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','lz-fashion-ecommerce'); ?></a></div>
	<div class="top-header">
		<div class="container">	
			<?php get_template_part( 'template-parts/header/header', 'image' ); ?>	
			<div class="row">
				<div class="col-md-6 p-0">
					<div class="top">
						<?php if( get_theme_mod( 'lz_fashion_ecommerce_call','' ) != '') { ?>
					        <i class="fas fa-phone"></i><span class="col-org"><?php echo esc_html( get_theme_mod('lz_fashion_ecommerce_call',__('0123456789','lz-fashion-ecommerce')) ); ?></span>
					    <?php } ?>		
					    <?php if( get_theme_mod( 'lz_fashion_ecommerce_mail','' ) != '') { ?>
					        <i class="fas fa-envelope"></i><span class="col-org"><?php echo esc_html( get_theme_mod('lz_fashion_ecommerce_mail',__('support@sitename.com','lz-fashion-ecommerce')) ); ?></span>
					    <?php } ?>		   		
					</div>	
				</div>
				<div class="col-md-6 p-0">
					<div class="nav">
						<?php wp_nav_menu( array('theme_location'  => 'woocommerce-menu') ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="search-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="logo">
				        <?php if( has_custom_logo() ){ lz_fashion_ecommerce_the_custom_logo();
				           }else{ ?>
				          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				          <?php $description = get_bloginfo( 'description', 'display' );
				          if ( $description || is_customize_preview() ) : ?> 
				            <p class="site-description"><?php echo esc_html($description); ?></p>
				        <?php endif; }?>
				    </div>
				</div>
				<?php if(class_exists('woocommerce')){ ?>
					<div class="col-md-7">
			        	<?php get_product_search_form()?>
			      	</div>
					<div class="col-md-2">
					    <div class="cart_icon">
					        <a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-bag"></i></a>
				            <li class="cart_box">
				              <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
				            </li>
					    </div>
				    </div>
				<?php }else { echo '<h6>'.esc_html('Please Install Woocommerce Plugin','lz-fashion-ecommerce').'<h6>'; }?>
			</div>
		</div>
	</div>	
    <div class="menu-section">
		<div class="container">
			<div class="main-top">
			    <div class="row">
			    	<?php if(class_exists('woocommerce')){ ?>
			      	<div class="col-md-3 col-sm-3">
				        <button class="product-btn"><?php echo esc_html_e('ALL CATEGORIES','lz-fashion-ecommerce'); ?><i class="fa fa-bars" aria-hidden="true"></i></button>
				        <div class="product-cat">
				          <?php
				            $args = array(
				              //'number'     => $number,
				              'orderby'    => 'title',
				              'order'      => 'ASC',
				              'hide_empty' => 0,
				              'parent'  => 0
				              //'include'    => $ids
				            );
				            $product_categories = get_terms( 'product_cat', $args );
				            $count = count($product_categories);
				            if ( $count > 0 ){
				                foreach ( $product_categories as $product_category ) {
				                  $cat_id   = $product_category->term_id;
				                  $cat_link = get_category_link( $cat_id );
				                  if ($product_category->category_parent == 0) { ?>
				                <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
				                <?php
				              }
				                echo esc_html( $product_category->name ); ?></a><i class="fas fa-chevron-right"></i></li>
				                <?php
				                }
				              }
				          ?>
			        	</div>
			      	</div>
			      	<?php }else { echo '<h6>'.esc_html('Please Install Woocommerce Plugin','lz-fashion-ecommerce').'<h6>'; }?>
			      	<div class="col-md-9">
						<div class="nav">
							<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
						</div>
					</div>
			    </div>
			</div>
		</div>
	</div>	
</div>