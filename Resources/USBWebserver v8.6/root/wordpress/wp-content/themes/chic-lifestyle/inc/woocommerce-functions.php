<?php

/**
 * Woocommerce related hooks
*/
add_action( 'after_setup_theme', 'chic_lifestyle_woocommerce_support');

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'woocommerce_before_main_content', 'chic_lifestyle_wc_wrapper', 10 );
add_action( 'woocommerce_after_main_content',  'chic_lifestyle_wc_wrapper_end', 10 );


/**
 * Declare Woocommerce Support
*/
function chic_lifestyle_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
*/
function chic_lifestyle_wc_wrapper(){    
    ?>
    <div class="container"><div class="chic-lifestyle-woo spacer"><div class="row">
        <main id="main" class="col-sm-12" role="main">
    <?php
}

/**
 * After Content
 * Closes the wrapping divs
*/
function chic_lifestyle_wc_wrapper_end(){
    ?>
        </main>
        </div></div></div>
<?php
}


?>