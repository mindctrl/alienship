<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<?php if ( current_theme_supports( 'theme-layouts' ) && !is_admin() && 'layout-1c' !== theme_layouts_get_layout() || !current_theme_supports( 'theme-layouts' ) ) {

	do_action( 'alienship_sidebar_before' ); ?>
	<div id="sidebar" class="<?php echo apply_filters( 'alienship_sidebar_container_class', 'col-lg-3' ); ?>">
		<?php do_action( 'alienship_sidebar_inside_before' ); ?>

		<div id="secondary" class="<?php echo apply_filters( 'alienship_secondary_container_class', 'widget-area well' ); ?>" role="complementary">
			<?php do_action( 'before_sidebar' );

			dynamic_sidebar( 'sidebar-1' ); ?>

		</div><!-- #secondary .widget-area -->

	<?php do_action( 'alienship_sidebar_inside_after' ); ?>
	</div><!-- #sidebar -->
	<?php do_action( 'alienship_sidebar_after' ); ?>

<?php } //endif ?>