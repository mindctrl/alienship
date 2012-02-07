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
    <div class="site-info">
      <?php edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">', ' - </span>' ); ?>
      <?php echo 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.'; ?>
    </div><!-- .site-info -->
  </div><!-- row-fluid -->
</footer><!-- #colophon -->

<script type="text/javascript">
// Adding the class "dropdown" to li elements with submenus  //	
  jQuery(document).ready(function(){
  jQuery("ul.sub-menu").parent().addClass("dropdown");
  jQuery("[id^=menu-] li.dropdown a").addClass("dropdown-toggle");
  jQuery("ul.sub-menu li a").removeClass("dropdown-toggle");
  jQuery('.dropdown-toggle').append('<b class="caret"></b>');
  });
</script>

<script type="text/javascript">
  jQuery(document).ready(function(){
  // Don't FORGET: replace all $ with jQuery to prevent conflicts //
  jQuery('a.dropdown-toggle')
  .attr('data-toggle', 'dropdown');
  });
</script>

<script type="text/javascript">
  jQuery(document).ready(function(){
  // Don't FORGET: replace all $ with jQuery to prevent conflicts //
  jQuery(function () {
  // jQuery(".tablesorter-example").tablesorter({ sortList: [[1,0]] });
  jQuery('.dropdown-toggle').dropdown();
  })
  });
</script>
<?php wp_footer('hero'); ?>
</body>
</html>