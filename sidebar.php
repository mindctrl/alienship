<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<?php if ( current_theme_supports( 'theme-layouts' ) && !is_admin() && 'layout-1c' !== theme_layouts_get_layout() || !current_theme_supports( 'theme-layouts' ) ) {

	do_action( 'alienship_secondary_before' ); ?>
	<div id="secondary" class="<?php echo apply_filters( 'alienship_secondary_container_class', 'col-sm-4' ); ?>">

		<?php do_action( 'alienship_sidebar_before' ); ?>
		<div id="sidebar" class="<?php echo apply_filters( 'alienship_sidebar_container_class', 'widget-area' ); ?>" role="complementary">
			<?php
			do_action( 'alienship_sidebar_top' );
			dynamic_sidebar( 'sidebar-1' );
			do_action( 'alienship_sidebar_bottom' );
			?>
		</div><!-- #sidebar -->
	<?php do_action( 'alienship_sidebar_after' ); ?>

	</div><!-- #secondary -->
	<?php do_action( 'alienship_secondary_after' );

} //endif ?>