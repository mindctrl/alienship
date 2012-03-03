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
<?php alienship_footer_before(); ?>
<footer id="colophon" role="contentinfo">
  <?php alienship_footer_inside(); ?>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span5">
        <?php edit_post_link( __( 'Edit page', 'alienship' ), '<span class="edit-link"><i class="icon-pencil"></i>&nbsp;', ' - </span>' ); ?>
        <?php echo 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.'; ?>
      </div><!-- span5 -->
      <div class="span6">
        <?php if ( has_nav_menu( 'bottom' ) ) { wp_nav_menu(array('theme_location' => 'bottom', 'container' => false, 'menu_class' =>  'footer-nav mobile')); } ?>
      </div>
    </div><!-- row-fluid -->
  </div><!-- container-fluid -->
</footer><!-- #colophon -->
<?php alienship_footer_after(); ?>
<?php wp_footer('hero'); ?>
<?php alienship_footer(); ?>
</body>
</html>