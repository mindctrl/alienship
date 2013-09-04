<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

do_action( 'alienship_footer_before' ); ?>
<footer class="colophon" id="colophon" role="contentinfo">

	<?php do_action( 'alienship_footer_inside ' ); ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">

				<?php edit_post_link( __( 'Edit page', 'alienship' ), '<span class="edit-link"><i class="glyphicon glyphicon-pencil"></i>&nbsp;', ' - </span>' );
				if ( of_get_option('alienship_custom_footer_toggle') ) {
					echo '' . of_get_option('alienship_custom_footer_text') . '';
				} else {
					echo 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.'; } ?>

			</div><!-- col-sm-6 -->

			<div class="col-sm-6">

				<?php if ( has_nav_menu( 'bottom' ) ) {
					wp_nav_menu( array( 'theme_location' => 'bottom', 'container' => false, 'menu_class' => 'footer-nav mobile' ) );
				} ?>

			</div>
		</div><!-- row -->
	</div><!-- container -->
</footer><!-- #colophon -->
<?php do_action( 'alienship_footer_after' ); ?>

<?php wp_footer(); ?>

<?php do_action( 'alienship_footer' ); ?>
</body>
</html>
