<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<?php if ( current_theme_supports( 'theme-layouts' ) && !is_admin() && 'layout-1c' !== theme_layouts_get_layout() || !current_theme_supports( 'theme-layouts' ) ) { ?>

<?php alienship_sidebar_before(); ?>
  <div id="sidebar" class="<?php echo apply_filters('alienship_sidebar_container_class', 'span3'); ?>">
    <?php alienship_sidebar_inside_before(); ?>
    <div id="secondary" class="<?php echo apply_filters('alienship_secondary_container_class', 'widget-area well'); ?>" role="complementary">
      <?php do_action( 'before_sidebar' ); ?>
      <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

        <aside id="search" class="widget widget_search">
          <?php get_search_form(); ?>
        </aside>

        <aside id="archives" class="widget">
          <h3 class="widget-title"><?php _e( 'Archives', 'alienship' ); ?></h3>
          <ul>
            <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
          </ul>
        </aside>

        <aside id="meta" class="widget">
          <h3 class="widget-title"><?php _e( 'Meta', 'alienship' ); ?></h3>
          <ul>
            <?php wp_register(); ?>
            <aside><?php wp_loginout(); ?></aside>
            <?php wp_meta(); ?>
          </ul>
        </aside>

      <?php endif; // end sidebar widget area ?>
    </div><!-- #secondary .widget-area -->
    <?php alienship_sidebar_inside_after(); ?>
  </div><!-- #sidebar -->
<?php alienship_sidebar_after(); ?>

<?php } //endif ?>