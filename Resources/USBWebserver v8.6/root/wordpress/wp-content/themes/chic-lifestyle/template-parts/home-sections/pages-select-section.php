<?php if( get_theme_mod( 'display_pages', $default = true ) ) : ?>
<section class="home-pages spacer">	
<div class="container">	
	<?php
		$page_1 = get_theme_mod( 'select_page_1' );
		$page_2 = get_theme_mod( 'select_page_2' );
		$page_3 = get_theme_mod( 'select_page_3' );

		$section_title = get_theme_mod( 'pages_section_title' );

		$pages = array( $page_1, $page_2, $page_3 );

	?>

	<?php
		$args = array(
		   'post_type' => 'page',
		   'post__in'      => $pages,
		   'posts_per_page'	=> 3
		);

		$query = new WP_Query( $args );
	?>

	<?php if( $query->have_posts() ) : ?>
		<h4><?php echo esc_html( $section_title ); ?></h4>		
		<div class="row">
			<?php while( $query->have_posts() ) : $query->the_post(); ?>
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
				<div class="col-sm-4">
					<?php if( ! empty( $image ) ) : ?>
						<a href="<?php the_permalink(); ?>">						
							<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="img-responsive">						
						</a>
					<?php endif; ?>
					<div class="page-home-summary"><h5 class="category"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5></div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	<?php endif; ?>
</div>
</section>
<?php endif; ?>