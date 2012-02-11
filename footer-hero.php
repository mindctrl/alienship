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
<footer id="colophon" role="contentinfo">
  <div class="row-fluid">
    <div class="span5">
      <?php edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">', ' - </span>' ); ?>
      <?php echo 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.'; ?>
    </div><!-- span5 -->
    <div class="span6">
      <?php if ( has_nav_menu( 'bottom' ) ) { wp_nav_menu(array('theme_location' => 'bottom', 'container' => false, 'menu_class' => 'footer-nav mobile')); } ?>
    </div>
  </div><!-- row-fluid -->
</footer><!-- #colophon -->

<?php wp_footer('hero'); ?>
</body>
</html>