<?php
/**
 * The template for displaying search forms in Alien Ship
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
  <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <label for="s" class="assistive-text"><?php _e( 'Search', 'alienship' ); ?></label>
    <input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'alienship' ); ?>" />
    <input type="submit" class="btn btn-primary" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'alienship' ); ?>" />
  </form>
