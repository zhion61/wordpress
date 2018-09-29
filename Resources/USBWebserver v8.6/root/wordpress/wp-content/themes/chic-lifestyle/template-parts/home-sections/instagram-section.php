<?php if( class_exists( 'Blossomthemes_Instagram_Feed' ) && get_theme_mod( 'instagram_display', true ) ) { ?>
	<div class="widget-instagram clearfix">
		<?php echo do_shortcode( "[blossomthemes_instagram_feed]" ); ?>		
	</div>
<?php } ?>