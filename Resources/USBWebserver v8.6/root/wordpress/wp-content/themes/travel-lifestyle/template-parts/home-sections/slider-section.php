<?php if( get_theme_mod( 'slider_display', $default = true ) ) : ?>
  <!-- banner-news -->
  <?php
    $category_id = get_theme_mod( 'slider_category', '' );
    $title = get_theme_mod( 'slider_title', '' );
    $number_of_posts = get_theme_mod( 'slider_number_of_posts', 3 );
    $post_details = get_theme_mod( 'slider_details_show_hide', array( 'date', 'categories', 'summary', 'readmore' ) );

    $category_args = array(
      'cat' => $category_id,
      'posts_per_page' => $number_of_posts
    );

    $query = new WP_Query( $category_args );
    set_query_var( 'query', $query );
    set_query_var( 'title', $title );
    set_query_var( 'post_details', $post_details );
  ?>

  <?php if ( $query->have_posts() ) : ?>

    <?php
      $layout = get_theme_mod( 'chic_lifestyle_slider_layouts', 'one' );
      if( $layout == 'one' ) {
        get_template_part( 'layouts/slider/slider', 'layout' );
      }      
    ?>
  <?php endif; ?>
  <!-- banner-news -->
<?php endif;