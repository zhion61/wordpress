<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package chic-lifestyle
 */

get_header(); ?>
<?php
    global $wp_query;
?>

<?php
  $layout = get_theme_mod( 'chic_lifestyle_post_layout', 'sidebar-right' );
  $view = get_theme_mod( 'chic_lifestyle_post_view', 'list-view' );

  $content_column_class = 'col-sm-9';
  $sidebar_left_class = 'col-sm-3';
  $sidebar_right_class = 'col-sm-3';

?>

<div class="post-list">
  <div class="container">
  	<?php
  		if( have_posts() ) :
  	        the_archive_title( '<h1 class="category-title">', '</h1>' );
  	        the_archive_description( '<div class="taxonomy-description">', '</div>' );
  	    endif;
    ?>
    <div class="row">

      <?php if( $layout == 'sidebar-left' ) { ?>
        <div class="<?php echo esc_attr( $sidebar_left_class ); ?>"><?php dynamic_sidebar( 'left-sidebar' ); ?></div>
      <?php } ?>
      
      <div class="<?php echo esc_attr( $content_column_class ); ?>">
        <div class="<?php echo esc_attr( $view ); ?> blog-list-block">
          <?php if ( have_posts() ) : ?>
              <?php while ( have_posts() ) : the_post(); ?>
                  <?php get_template_part( 'template-parts/content' ); ?>
              <?php endwhile; ?>

              <?php                                    
                if (  $wp_query->max_num_pages > 1 ) { ?>
                    <button class="loadmore"><?php esc_html_e( 'More posts', 'chic-lifestyle' ); ?></button>
                <?php }
              ?>

          <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
          <?php endif; ?>
        </div>
      </div>
    
      <?php if( $layout == 'sidebar-right' ) { ?>
          <div class="<?php echo esc_attr( $sidebar_right_class ); ?>"><?php get_sidebar(); ?></div>
        <?php } ?>

    </div>
  </div>
</div>
<?php get_footer(); ?>
