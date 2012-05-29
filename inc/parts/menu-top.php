<?php
/**
 * The template used to load the Top Navbar Menu in header*.php
 *
 * @package Alien Ship
 * @since Alien Ship 0.70
 */
?>
<?php if ( of_get_option('alienship_show_top_navbar',1) ) { ?>
<!-- Load Top Menu -->
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span></span>
          <span class="icon-bar-text">Menu</span>
          <span></span>
        </a>
        <?php if (of_get_option('alienship_name_in_navbar',1) ) { // Show site name in navbar? ?>
        <div id="navbar-brand">
          <a class="brand" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
          <?php if (of_get_option('alienship_desc_in_navbar') ) { // Show site desc in navbar? ?>
          <span class="brand-desc hidden-phone"><?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?></span>
          <?php } // alienship_desc_in_navbar ?>
        </div><!-- /#navbar-brand -->
        <?php } // site name in navbar ?>
        <div class="nav-collapse">
          <?php if ( of_get_option('alienship_search_bar', '1') ) { ?>
            <form role="search" class="navbar-search pull-right" action="<?php echo site_url(); ?>" id="searchform" method="get">
              <label class="assistive-text" for="s">Search</label>
              <input type="text" placeholder="Search ..." id="s" name="s" class="search-query">
              <input type="submit" value="Search" id="searchsubmit" name="submit" class="btn btn-primary">
            </form>
          <?php } // end if search bar ?>
          <?php if (of_get_option('alienship_desc_in_navbar') ) { // navbar with site desc ?>
          <?php wp_nav_menu( array( 'theme_location' => 'top', 'container' => false, 'menu_class' => 'nav pull-right', 'walker' => new alienship_Navbar_Nav_Walker(), 'fallback_cb' => false ) ); ?>
          <?php } else if (! of_get_option('alienship_desc_in_navbar' ) ) { //no site desc ?>
          <?php wp_nav_menu( array( 'theme_location' => 'top', 'container' => false, 'menu_class' => 'nav', 'walker' => new alienship_Navbar_Nav_Walker(), 'fallback_cb' => false ) ); ?>
          <?php } ?>
        </div><!-- /nav-collapse -->
      </div><!-- /container -->
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->
<!-- End Top Menu -->
<?php } // if of_get_option('alienship_show_top_navbar') ?>
