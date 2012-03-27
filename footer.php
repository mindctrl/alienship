<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>

	</div><!-- #main -->
  <?php alienship_main_after(); ?>
  <div id="footer-container" class="container-fluid">
    <div id="footer-row" class="row-fluid footerwidget">
      <?php dynamic_sidebar("Footer"); ?>
    </div><!-- #footer-row -->
    <div id="footer2-row" class="row-fluid footerwidget">
      <?php dynamic_sidebar("Footer 2"); ?>
    </div><!-- #footer2-row -->
  </div><!-- #footer-container -->

</div><!-- #page -->
<?php alienship_footer_before(); ?>
<footer id="colophon" role="contentinfo">
  <?php alienship_footer_inside(); ?>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span5">
        <?php if ( of_get_option('alienship_custom_footer_toggle') ) {
        echo '' . of_get_option('alienship_custom_footer_text') . '';
        } else {
          echo 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.'; } ?>
      </div><!-- .span5 -->
      <div class="span6">
        <?php if ( has_nav_menu( 'bottom' ) ) { wp_nav_menu(array('theme_location' => 'bottom', 'container' => false, 'menu_class' =>  'footer-nav mobile')); } ?>
      </div>
    </div><!-- row-fluid -->
  </div><!-- container-fluid -->
</footer><!-- #colophon -->
<?php alienship_footer_after(); ?>
<script type="text/javascript">
// Enable Bootstrap popover //
jQuery(function() {
    // jQuery('a[rel].btn').popover();
    jQuery("a[rel='popover']").popover();
});
</script>

<?php if ( of_get_option('alienship_analytics') ) {
  echo '' . of_get_option('alienship_analytics_code') . '';
} ?>

<?php wp_footer(); ?>
<?php alienship_footer(); ?>

</body>
</html>