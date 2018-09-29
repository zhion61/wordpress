<?php if( get_theme_mod( 'archive_display', $default = true ) ) : ?>
    <?php
        $default_posts_per_page = get_option( 'posts_per_page' );
        $archive_cat = get_theme_mod( 'archive_category' );
        $args = array(
            'post_type' => 'post',
            'cat'       => absint( $archive_cat ),
            'posts_per_page'    => absint( $default_posts_per_page ),
            'paged' => get_query_var( 'paged' ) ? get_query_var('paged') : 1
        );
        $wp_query = new WP_Query( $args );
    ?>

    <?php
        $layout = get_theme_mod( 'chic_lifestyle_post_layout', 'sidebar-right' );
        $view = get_theme_mod( 'chic_lifestyle_post_view', 'list-view' );

        $content_column_class = 'col-sm-9';
        $sidebar_left_class = 'col-sm-3';
        $sidebar_right_class = 'col-sm-3';

        if( $layout == 'full-width' ) {
            $content_column_class = 'col-sm-12';
        }
        
        if ( $wp_query->have_posts() ) { ?>
            <div class="home-archive inside-page post-list">
                <div class="container">        
                    <div class="row">
                    	<?php if( $layout == 'sidebar-left' ) { ?>
                    		<div class="<?php echo esc_attr( $sidebar_left_class ); ?>"><?php dynamic_sidebar( 'left-sidebar' ); ?></div>
                    	<?php } ?>
                        <div class="<?php echo esc_attr( $content_column_class ); ?>">
                            <?php $archive_title = get_theme_mod( 'archive_title' ); ?>
                              <?php if( ! empty( $archive_title ) ) { ?><h2 class="news-heading"><?php echo esc_html( $archive_title ); ?></h2><?php } ?>
                        	<div class="blog-list-block <?php echo esc_attr( $view ); ?>">                                         
	                          
	                              <?php /* Start the Loop */ ?>
	                              <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	                                  <?php

	                                      /*
	                                       * Include the Post-Format-specific template for the content.
	                                       * If you want to override this in a child theme, then include a file
	                                       * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	                                       */
	                                      get_template_part( 'template-parts/content' );
	                                  ?>
	                              <?php endwhile; ?>
                                    
	                          <?php wp_reset_postdata(); ?>
	                        </div>
                            <?php                                    
                                if (  $wp_query->max_num_pages > 1 ) { ?>
                                    <button class="loadmore"><?php esc_html_e( 'More posts', 'chic-lifestyle' ); ?></button>
                            <?php } ?>
                        </div>
                        <?php if( $layout == 'sidebar-right' ) { ?>
                    		<div class="<?php echo esc_attr( $sidebar_right_class ); ?>"><?php get_sidebar(); ?></div>
                    	<?php } ?>
                    </div>
                </div>
            </div>
            
            
        <?php } ?>
    
<?php endif; ?>