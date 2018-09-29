<?php
/**
 * Template part for displaying single posts.
 *
 * @package chic-lifestyle
 */

?>

<div class="page-title">
  <h1><?php the_title(); ?></h1>
</div>

<div class="single-post">
  <?php $post_options = get_theme_mod( 'chic_lifestyle_post_details', array( 'date', 'categories', 'tags', 'author_block' ) ); ?>
  <?php if ( is_array( $post_options ) && ! empty( $post_options ) ) : ?>   

    <div class="info">
      <ul class="list-inline">         

            <?php if( in_array( 'date', $post_options ) ) { ?>
              <?php $archive_year  = get_the_time('Y'); $archive_month = get_the_time('m'); $archive_day = get_the_time('d'); ?>
              <li><i class="fa fa-clock-o"></i> <a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) ); ?>"><?php echo get_the_date(); ?></a></li>
            <?php } ?>

            <?php if( in_array( 'author', $post_options ) ) { ?>
              <li>
                <a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                  <?php $avatar = get_avatar( get_the_author_meta( 'ID' ), $size = 60 ); ?>
                  <?php if( $avatar ) : ?>
                    <div class="author-image"> 
                      <?php echo $avatar; ?>
                    </div>
                  <?php endif; ?>
                  <?php echo esc_html( get_the_author() ); ?>
                </a>
             </li>
            <?php } ?>

            <?php if( in_array( 'number_of_comments', $post_options ) ) { ?>
              <li><i class="fa fa-comments-o"></i> <?php comments_popup_link( __( 'zero comment', 'chic-lifestyle' ), __( 'one comment', 'chic-lifestyle' ), __( '% comments', 'chic-lifestyle' ) ); ?></li>
            <?php } ?>

            <?php if( in_array( 'categories', $post_options ) ) { ?>
              <?php $categories = get_the_category();
                if( ! empty( $categories ) ) :
                  foreach ( $categories as $cat ) { ?>
                    <li><a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a></li>
                  <?php }
                endif; ?>
            <?php } ?>

            <?php if( in_array( 'tags', $post_options ) ) { ?>
              <?php $tags = get_the_tags();
                if( ! empty( $tags ) ) :
                  foreach ( $tags as $tag ) { ?>
                    <li><a href="<?php echo esc_url( get_category_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
                  <?php }
                endif; ?>
            <?php } ?>
        
      </ul>
    </div>

  <?php endif; ?>


  <div class="post-content">
    <?php if ( has_post_thumbnail() ) : ?>
      <figure class="feature-image">        
          <?php the_post_thumbnail('full'); ?>       
      </figure>
    <?php endif; ?>    
    <article>
      <?php the_content(); ?>
      
      <?php
        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'chic-lifestyle' ),
          'after'  => '</div>',
        ) );
      ?>     
    </article>

    </div>

    <?php if( in_array( 'author_block', $post_options ) ) : ?>
      <div class="author-post clearfix">
        <?php $avatar = get_avatar( get_the_author_meta( 'ID' ), $size = 75 ); ?>
        <?php if( $avatar ) : ?>
          <div class="author-image"> 
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo $avatar; ?></a>
          </div>
        <?php endif; ?>
        <div class="author-details">
        <h4><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></h4>
        <p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
        </div>
      </div>
    <?php endif; ?>
  </div>


  