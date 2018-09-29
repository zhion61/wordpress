<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package chic-lifestyle
 */

?>
	
	<footer>
		<div class="container">
		<?php dynamic_sidebar( 'footer-1' ); ?>		
	</div>
	</footer>
		<div class="copyright text-center spacer">
			<?php esc_html_e( "Powered by", 'chic-lifestyle' ); ?> <a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>"><?php esc_html_e( "WordPress", 'chic-lifestyle' ); ?></a> | <?php esc_html_e( 'Theme by', 'chic-lifestyle' ); ?> <a href="<?php echo esc_url( 'http://thebootstrapthemes.com/' ); ?>"><?php esc_html_e( 'TheBootstrapThemes','chic-lifestyle' ); ?></a>
		</div>
		<div class="scroll-top-wrapper"> <span class="scroll-top-inner"><i class="fa fa-2x fa-angle-up"></i></span></div> 
		
		<?php wp_footer(); ?>
	</body>
</html>