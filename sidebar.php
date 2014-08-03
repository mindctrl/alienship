<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<?php if ( current_theme_supports( 'theme-layouts' ) && 'layout-1c' !== theme_layouts_get_layout() || !current_theme_supports( 'theme-layouts' ) ) : ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="secondary" class="col-md-4">
		<div id="sidebar" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- #sidebar -->
	</div><!-- #secondary -->
	<?php endif;

endif;