<div class="container">
<div class="banner-news banner-news-3 banner-news-slider text-center">
  <div class="clearfix">   
    <?php if( $title ) : ?><h4><?php echo esc_html( $title ); ?></h4><?php endif; ?>
    <section  id="owl-slider-three" class="owl-carousel"> 
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="item">
          <div class="banner-news-list">
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
            <?php if( ! empty( $image ) ) { ?>
              <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( $title ); ?>" class="img-responsive">
            <?php } ?>
              <div class="banner-news-caption">
                <?php
                  if( in_array( 'categories', $post_details ) ) :
                    $categories = get_the_category();
                    $separator = ' ';
                    $output = '';
                    if ( ! empty( $categories ) ) :
                      foreach ( $categories as $cat ) {
                        $output .= '<h5 class="category"><a class="news-category" href="'. esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></h5>' . $separator;
                      }
                      echo trim( $output, $separator );
                    endif;
                  endif
                ?>
                <h4 class="news-title"><a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>"><?php the_title(); ?></a></h4>
                <?php if( in_array( 'date', $post_details ) ) : ?>
                  <div class="info">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <?php echo get_the_date(); ?>
                  </div>
                <?php endif; ?>
                <?php
                  if( in_array( 'summary', $post_details ) ) :
                    the_excerpt();
                  endif;
                ?>
                <?php if( in_array( 'readmore', $post_details ) ) : ?>
                  <a href="<?php echo esc_url( get_the_permalink( $post->ID ) ); ?>" class="readmore"><?php esc_attr_e( 'Read More', 'travel-lifestyle' ); ?></a>
                <?php endif; ?>
              </div> 
          </div>
          </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </section> 
  </div>
</div>
</div>