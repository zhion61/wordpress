<?php

if( class_exists( 'WP_Customize_Control' ) ) {
    class Pro_Features_Info extends WP_Customize_Control {
        public $type = 'customtext';
        public $extra = ''; // we add this for the extra description
        public function render_content() {
        ?>
        <label>            
            <a href="<?php echo esc_url( 'https://thebootstrapthemes.com/downloads/chic-lifestyle-pro/' ); ?>" target='_blank'><?php echo esc_html( $this->label ); ?></a>
            <span><?php echo esc_html( $this->extra ); ?></span>         
        </label>
        <?php
        }
    }

    class Heading_Options_Text extends WP_Customize_Control {
        public $type = 'customtext';
        public function render_content() {
        ?>
        <label>            
            <h2><?php echo esc_html( $this->label ); ?></h2>         
        </label>
        <?php
        }
    }
}