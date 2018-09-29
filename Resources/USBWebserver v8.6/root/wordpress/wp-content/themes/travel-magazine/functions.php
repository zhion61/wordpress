<?php
/**
 * Theme functions and definitions
 *
 * @package Travel_Magazine
 */

/**
 * After setup theme hook
 */
function travel_magazine_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'travel-magazine', get_stylesheet_directory() . '/languages' );

    // Custom Image Size
    add_image_size( 'travel-magazine-header-slider', 180, 90, true );
}
add_action( 'after_setup_theme', 'travel_magazine_theme_setup' );

/**
 * Load assets.
 *
 */
function travel_magazine_enqueue_styles_and_scripts() {
    $my_theme = wp_get_theme();
    $version = $my_theme['Version'];
    wp_enqueue_style( 'numinous-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'travel-magazine-style', get_stylesheet_directory_uri() . '/style.css', array( 'numinous-style', 'ticker-style' ), $version );

    wp_enqueue_script( 'travel-magazine-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery', 'jquery-ticker'), $version, true );

    $array = array(
        'rtl'  => is_rtl(),
    );

    wp_localize_script( 'travel-magazine-custom-js', 'tm_data', $array );
}
add_action( 'wp_enqueue_scripts', 'travel_magazine_enqueue_styles_and_scripts' );

/**
 * Remove action from parent
 */
function travel_magazine_remove_parent_action(){
    remove_action( 'customize_register', 'numinous_customizer_theme_info' );
}
add_action( 'init', 'travel_magazine_remove_parent_action' );

/**
 * Travel Magazine Theme Info
 */
function travel_magazine_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Demo and Documentation' , 'travel-magazine' ),
		'priority'    => 6,
		));
        
    $wp_customize->add_setting(
		'setup_instruction',
		array(
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		new Numinous_Theme_Info( 
			$wp_customize,
			'setup_instruction',
			array(
                'settings'      => 'setup_instruction',
                'section'       => 'theme_info',
			)
		)
	);

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	));
    
    $theme_info = '';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Documentation', 'travel-magazine' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/documentation/travel-magazine/' ) . '" target="_blank">' . __( 'here', 'travel-magazine' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Demo', 'travel-magazine' ) . ': </label><a href="' . esc_url( 'https://demo.raratheme.com/travel-magazine' ) . '" target="_blank">' . __( 'here', 'travel-magazine' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme info', 'travel-magazine' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/wordpress-themes/travel-magazine/' ) . '" target="_blank">' . __( 'Click here', 'travel-magazine' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support Ticket', 'travel-magazine' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/support-ticket/' ) . '" target="_blank">' . __( 'here', 'travel-magazine' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'More WordPress Themes', 'travel-magazine' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/wordpress-themes/' ) . '" target="_blank">' . __( 'Click here', 'travel-magazine' ) . '</a></span><br />';

	$wp_customize->add_control( new Numinous_Theme_Info( $wp_customize ,'theme_info_theme',array(
        'label' => __( 'About Travel Magazine' , 'travel-magazine' ),
		'section' => 'theme_info',
		'description' => $theme_info
	)));
}
add_action( 'customize_register', 'travel_magazine_customizer_theme_info' );

/**
 * Customize resgister settings and controls 
 */
function travel_magazine_customize_register( $wp_customize ){

    // Load our custom control.
    require_once get_stylesheet_directory() . '/inc/custom-controls/select/class-select-control.php';
    require_once get_stylesheet_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
            
    // Register the control type.
    $wp_customize->register_control_type( 'Travel_Magazine_Select_Control' );
    $wp_customize->register_control_type( 'Travel_Magazine_Radio_Image_Control' );

    $wp_customize->add_panel( 
        'travel_magazine_header_setting',
        array(
            'priority' => 10,
            'title' => __( 'Header Settings', 'travel-magazine' ),
            'capability' => 'edit_theme_options',
        ) 
    );

    $wp_customize->add_section(
        'travel_magazine_header_misc_setting',
        array(
            'title' => __( 'Misc Settings', 'travel-magazine' ),
            'panel' => 'travel_magazine_header_setting'
        )
    );

    $wp_customize->get_control( 'numinous_ed_search_form' )->section = 'travel_magazine_header_misc_setting';
    $wp_customize->get_control( 'numinous_breaking_news_label' )->section = 'travel_magazine_header_misc_setting';
    $wp_customize->get_control( 'numinous_breaking_news_cat' )->section = 'travel_magazine_header_misc_setting';

    $wp_customize->add_section( 
        'travel_magazine_header_slider_setting', 
        array(
            'title'      => __( 'Header Slider Settings', 'travel-magazine' ),
            'priority'   => 22,
            'panel' => 'travel_magazine_header_setting',
        ) 
    );
    
    /** Toggle Slider */
    $wp_customize->add_setting(
        'travel_magazine_ed_slider',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );

     $wp_customize->add_control(
        'travel_magazine_ed_slider',
        array(
            'label'   => __( 'Enable header slider in homepage', 'travel-magazine' ),
            'section' => 'travel_magazine_header_slider_setting',
            'type'    => 'checkbox',
        )
    );

    /** Header slider category */
    $wp_customize->add_setting(
        'travel_magazine_header_slider_cat',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );

    /** Select Category */
    $wp_customize->add_control(
        new Travel_Magazine_Select_Control(
            $wp_customize,
            'travel_magazine_header_slider_cat', 
            array(
                'label'    => __( 'Slider Category', 'travel-magazine' ),
                'section'  => 'travel_magazine_header_slider_setting',
                'type'     => 'select',
                'choices'  => travel_magazine_get_categories(),
            )
        ) 
    );

    /** Top section Layout */
    $wp_customize->add_setting( 'travel_magazine_top_layout', array(
        'default'           => 'layout1',
        'sanitize_callback' => 'travel_magazine_sanitize_radio'
    ) );
    
    $wp_customize->add_control(
        new Travel_Magazine_Radio_Image_Control(
            $wp_customize,
            'travel_magazine_top_layout',
            array(
                'section'       => 'numinous_top_news_settings',
                'label'         => __( 'Top Section Layout', 'travel-magazine' ),
                'description'   => __( 'Choose the layout for top section.', 'travel-magazine' ),
                'choices'       => array(
                    'layout1' => get_stylesheet_directory_uri() . '/images/top1.png',
                    'layout2' => get_stylesheet_directory_uri() . '/images/top2.png',
                )
            )
        )
    );

    /** Middle section */
    $wp_customize->add_section( 
        'travel_magazine_middle_section_setting', 
        array(
            'title'    => __( 'Middle Section', 'travel-magazine' ),
            'priority' => 25,
            'panel'    => 'numinous_home_page_settings',
        ) 
    );

    /** Enable Middle Section */
    $wp_customize->add_setting(
        'travel_magazine_ed_middle_section',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control( 
        'travel_magazine_ed_middle_section', 
        array(
            'label'       => __( 'Enable Middle Section', 'travel-magazine' ),
            'section'     => 'travel_magazine_middle_section_setting',
            'type'        => 'checkbox',
        ) 
    );
    
    /** Middle News Label */
    $wp_customize->add_setting(
        'travel_magazine_middle_section_label',
        array(
            'default'     => __( 'Latest News', 'travel-magazine' ),
            'sanitize_callback' => 'numinous_sanitize_checkbox',
        )
    );

    $wp_customize->add_control( 
        'travel_magazine_middle_section_label',
        array(
            'label' => __( 'Middle Section Label', 'travel-magazine' ),
            'section'     => 'travel_magazine_middle_section_setting',
        ) 
    );
    
    /** Header slider category */
    $wp_customize->add_setting(
        'travel_magazine_middle_section_cat',
        array(
            'default' => '',
            'sanitize_callback' => 'numinous_sanitize_select',
        )
    );

    /** Middle Section Category */
    $wp_customize->add_control( 
        new Travel_Magazine_Select_Control(
            $wp_customize,
            'travel_magazine_middle_section_cat', 
            array(
                'label'       => __( 'Middle Section Category', 'travel-magazine' ),
                'section'     => 'travel_magazine_middle_section_setting',
                'choices'     => travel_magazine_get_categories()
            ) 
        )
    );

}
add_action( 'customize_register', 'travel_magazine_customize_register', 100 );

function travel_magazine_get_categories(){

    /* Option list of all categories */
    $option_categories = array();

    $args = array( 'hide_empty' => false );

    $category_lists = get_categories( $args );
    $option_categories[''] = __( 'Choose Category', 'travel-magazine' );
    foreach( $category_lists as $category ){
        $option_categories[$category->term_id] = $category->name;
    }

    return $option_categories;
}

function travel_magazine_sanitize_radio( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );
    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;
    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function travel_magazine_header_slider(){

    $enable_slider = get_theme_mod( 'travel_magazine_ed_slider' );
    $slider_cat    = get_theme_mod( 'travel_magazine_header_slider_cat' );

    if( $enable_slider && $slider_cat && ( is_page_template( 'template-home.php' ) || ( is_front_page() && ! is_home() ) ) ){

        $args = array(
            'post_type'           => 'post', 
            'cat'                 => $slider_cat, 
            'post_status'         => 'publish',
            'posts_per_page'      => -1, 
            'ignore_sticky_posts' => true 
        );
        
        $qry = new WP_Query( $args );
        if( $qry->have_posts() ){ ?>
            <div class="header-slider-warp">
                <ul class="top-news-slide owl-carousel">
                    <?php 
                    while( $qry->have_posts() ){
                        $qry->the_post();
                        if( has_post_thumbnail() ){ ?>
                            <li>
                                <div class="post">
                                    <a href="<?php the_permalink(); ?>" class="post-thumbnail"><?php the_post_thumbnail( 'travel-magazine-header-slider', array( 'itemprop' => 'image' ) ); ?></a>
                                    <header class="entry-header"><?php the_title(); ?></header>
                                </div>
                            </li>
                        <?php                                 
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        <?php
        }
    }
}
add_action( 'numinous_after_header', 'travel_magazine_header_slider', 11 );

/**
 * Top news section
 */
function numinous_top_news_section(){

    $top_news_title = get_theme_mod( 'numinous_top_news_label', __( 'Top News', 'travel-magazine' ) ); //from customizer
    $top_news_one   = get_theme_mod( 'numinous_top_news_one' ); //from customizer
    $top_news_two   = get_theme_mod( 'numinous_top_news_two' ); //from customizer
    $top_news_three = get_theme_mod( 'numinous_top_news_three' ); //from customizer
    $top_news_four  = get_theme_mod( 'numinous_top_news_four' ); //from customizer
    $ed_topnews_sec = get_theme_mod( 'numinous_ed_top_news_section' ); //from customizer
    $top_layout     = get_theme_mod( 'travel_magazine_top_layout', 'layout1' );
    
    $top_news_posts = array( $top_news_one, $top_news_two, $top_news_three, $top_news_four );
    $top_news_posts = array_diff( array_unique( $top_news_posts ), array('') );
    
    if( $ed_topnews_sec && $top_news_one && $top_news_posts && ( is_page_template( 'template-home.php' ) || ( is_front_page() && !is_home() ) ) ){

        echo '<section class="news-section top-news ' . esc_attr( $top_layout ) . '"><div class="container">';
    
        if( $top_news_title ) echo '<h2 class="section-title">' . esc_html( $top_news_title ) . '</h2>';
        
        if( $top_layout === 'layout1' ){        
            
            echo '<div class="news-content">';        
            
            numinous_pro_cat_query( 'top', 'layout1', $top_news_posts, 'numinous-without-sidebar', 1, false, true );
            numinous_pro_cat_query( 'top', 'layout1', $top_news_posts, 'numinous-single-col', 3, 1, true );        
            
            echo '</div>';        
            
        }elseif( $top_layout === 'layout2' ){        
            
            echo '<div class="row">';        
            
            numinous_pro_cat_query( 'top', 'layout2', $top_news_posts, 'numinous-top-news', 1, false, true );
            numinous_pro_cat_query( 'top', 'layout2', $top_news_posts, 'numinous-more-news', 3, 1, true );        
            
            echo '</div>';
                    
        }   
        echo '</div></section>'; 
    }
}

/**
 * Middle Section
*/
function numinous_pro_middle_section(){
    $ed_middle_sec = get_theme_mod( 'travel_magazine_ed_middle_section' );
    $middle_title  = get_theme_mod( 'travel_magazine_middle_section_label', __( 'Latest News', 'travel-magazine' ) );
    $middle_cat    = get_theme_mod( 'travel_magazine_middle_section_cat' );
    $middle_title  = $middle_title ? $middle_title : get_cat_name( $middle_cat );
    
    if( $ed_middle_sec && $middle_cat && ( is_front_page() && ! is_home() ) ){

        echo '<section class="featured-news layout1"><div class="container">';
    
        if( $middle_title ) echo '<h2 class="section-title">' . esc_html( $middle_title ) . '</h2>';
                    
        numinous_pro_cat_query( 'middle', 'layout1', $middle_cat, 'numinous-single-col', -1, false, true );
                                
        echo '</div></section>';
    }

}
add_action( 'numinous_after_header', 'numinous_pro_middle_section', 40 );
/**
 * Function to query category posts in home page
*/
function numinous_pro_cat_query( $section, $layout, $top_news_posts, $image_size, $post_per_page, $offset = false, $class = false ){
        
    $args = array(
        'post_type'           => 'post',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
        'posts_per_page'      => $post_per_page
    );

    if( 'top' == $section ){
        $args['post__in']  = $top_news_posts;
        $args['order_by']  = 'post__in';
    }else{
        $args['cat'] = $top_news_posts;
    }
            
    if( $offset ) $args['offset'] = $offset;  
        
    $qry = new WP_Query( $args );
            
    if( $qry->have_posts() ){
        
        numinous_pro_query_wrapper_start( $section, $layout, $offset, $post_per_page );        
        
        while( $qry->have_posts() ){
            $qry->the_post();
            
            numinous_pro_query_wrapper_start( $section, $layout, $offset, $post_per_page, true ); 
            
            if( $section === 'top' && $layout === 'layout2' ){ 
                                
                numinous_pro_get_post_thumbnail( $image_size, $class ); ?>                            
                    
                <div class="text-holder">
                    <?php numinous_colored_category(); ?>
                    <header class="entry-header">
                        <?php numinous_pro_get_header(); ?>                 
                    </header>
                    
                    <?php 
                        numinous_pro_get_entry_content();
                        numinous_pro_query_entry_meta( 'top', $layout ); 
                    ?>
                </div>
                
            <?php    
            }elseif( $section === 'middle' ){ 
                ?>
                    <div class="image-holder">              
                        <?php 
                            numinous_pro_get_post_thumbnail( $image_size, $class );
                            numinous_colored_category(); 
                        ?>
                    </div>
                    <header class="entry-header">
                        <?php numinous_pro_get_header(); ?>             
                    </header>
                <?php
                
            }else{ ?>
                <div class="image-holder">              
                    <?php numinous_pro_get_post_thumbnail( $image_size, $class ); ?>
                    <div class="text-holder">
                        <?php numinous_colored_category(); ?>
                        <header class="entry-header">                           
                            <?php 
                                numinous_pro_get_header();
                                numinous_pro_query_entry_meta( 'top', $layout ); 
                            ?>
                        </header>
                    </div>
                </div>
            <?php 
            }
            
            numinous_pro_query_wrapper_end( $section, $layout, $offset, $post_per_page, true );
                                                      
        }
        wp_reset_postdata();
        
        numinous_pro_query_wrapper_end( $section, $layout, $offset, $post_per_page );
                           
    }
}

/**
 * Starter Wraper for while loop in cat query
*/
function numinous_pro_query_wrapper_start( $section, $layout, $offset, $post_per_page, $after_while = false ){
    
    if( $after_while ){ //After while loop
        if( $section === 'top' || $section === 'middle' ){
            switch( $layout ){
                case 'layout1':
                case 'layout2':
                    echo '<article class="post">';
                break;
            }
        }
    }else{ // Before while loop
        if( $section === 'top' ){
            switch( $layout ){
                case 'layout1':
                    if( $offset ) echo '<div class="post-lists"><div class="row">';
                break;
                case 'layout2':                    
                    echo $offset ? '<div class="col-1 lists">' : '<div class="col-1">';
                break;
            }
        }elseif( $section === 'middle' ){
            switch( $layout ){                
                case 'layout1':
                    echo '<div id="featured-news-slide" class="owl-carousel">';
                break;
                case 'layout2':
                    echo '<div class="row">';
                break;
            }
        }
    }
}

/**
 * End Wrapper for while loop in cat query
*/
function numinous_pro_query_wrapper_end( $section, $layout, $offset, $post_per_page, $after_while = false ){
    
    if( $after_while ){ //After while loop
       if( $section === 'top' || $section === 'middle' ){
            switch( $layout ){
                case 'layout1':
                case 'layout2':
                    echo '</article>';
                break;
            }
        }
    }else{ // Before while loop
        if( $section === 'top' ){
            switch( $layout ){
                case 'layout1':
                    if( $offset ) echo '</div></div>';
                break;
                case 'layout2':
                    echo '</div>';
                break;
            }
        }elseif( $section === 'middle' ){
            switch( $layout ){
                case 'layout1':
                case 'layout2':
                    echo '</div>';
                break;
            }
        }
    }
}

/**
 * Output post thumbnail else fallback image.
*/
function numinous_pro_get_post_thumbnail( $img_size, $class = false ){
    ?>
    <a href="<?php the_permalink(); ?>" <?php if( $class ) echo 'class="post-thumbnail"'?>>
        <?php 
            if( has_post_thumbnail() ){
                the_post_thumbnail( $img_size, array( 'itemprop' => 'image' ) );    
            }else{
                echo '<img src="' . esc_url( get_stylesheet_directory_uri() . '/images/' . $img_size . '.png' ) . '" />';
            } 
        ?>
    </a>
    <?php
}

/**
 * Output Post title
*/
function numinous_pro_get_header(){ ?>    
    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php   
}

/**
 * Output post excerpt content
*/
function numinous_pro_get_entry_content(){
    echo '<div class="entry-content">';                        
        the_excerpt();
    echo '</div>';
}

/**
 * Post meta for category in home page
*/
function numinous_pro_query_entry_meta( $section, $layout ){
    echo '<div class="entry-meta">';
    if( $section === 'top' ){
        switch( $layout ){
            case 'layout1':
            case 'layout2':
                echo '<span class="posted-on"><i class="fa fa-calendar" aria-hidden="true"></i><a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_date( 'd M Y' ) ) . '</a></span>';
                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                    echo '<span class="comment"><i class="fa fa-comment" aria-hidden="true"></i>';
                    comments_popup_link( esc_html__( 'Leave a comment', 'travel-magazine' ), esc_html__( '1 Comment', 'travel-magazine' ), esc_html__( '% Comments', 'travel-magazine' ) );
                    echo '</span>';
                }
            break;            
        }
    }
    echo '</div>';
}

/**
 * Footer Bottom
 * 
 * @since 1.0.0 
*/
function numinous_footer_bottom(){
    $copyright_text = get_theme_mod( 'numinous_footer_copyright_text' );
    ?>
    <div class="footer-b">
        <div class="container">
            <div class="site-info">
                <span class="copyright">
                    <?php
                    if( $copyright_text ){
                        echo wp_kses_post( $copyright_text );
                    }else{
                        echo esc_html__( '&copy; Copyright ', 'travel-magazine' ) . date_i18n( esc_html__( 'Y', 'travel-magazine' ) ); ?> 
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>.
                    <?php } ?>
                </span>
                <span class="by">
                <a href="<?php echo esc_url( 'https://raratheme.com/wordpress-themes/travel-magazine/' ); ?>" rel="author" target="_blank"><?php echo esc_html__( 'Travel Magazine by Rara Theme', 'travel-magazine' ); ?></a>.
                <?php printf( esc_html__( 'Powered by %s', 'travel-magazine' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'travel-magazine' ) ) .'" target="_blank">WordPress</a>' ); ?>.
                <?php
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
                ?>
                </span>
            </div>
        </div>
    </div>
    <?php
}