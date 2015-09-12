<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Alien Ship
 */
?>
<footer class="site-footer" id="colophon" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="bottom-navigation col-sm-6 col-sm-push-6">
				<?php if ( has_nav_menu( 'bottom' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'bottom',
						'container'      => false,
						'menu_class'     => 'footer-nav mobile'
						)
					);
				} ?>
			</div><!-- .bottom-navigation -->
			<div class="footer-text col-sm-6 col-sm-pull-6">
				&copy; <?php echo date( 'Y' ) . ' ' . get_bloginfo( 'name' ); ?>
			</div><!-- .footer-text -->

		</div><!-- .row -->
	</div><!-- .container -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
