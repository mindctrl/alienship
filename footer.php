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

	<footer id="colophon" role="contentinfo">
    <?php dynamic_sidebar("Footer"); ?>

    <div class="row-fluid">
		  <div class="site-info">
			  <?php echo 'Copyright &copy; ' . date('Y') . ' ' . get_bloginfo('name') . '. All Rights Reserved.'; ?>
		  </div><!-- .site-info -->
    </div><!-- row-fluid -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<script type="text/javascript">
// Adding the class "dropdown" to li elements with submenus  //	
jQuery(document).ready(function(){
jQuery("ul.sub-menu").parent().addClass("dropdown");
// jQuery("ul#menu-main-menu li.dropdown a").addClass("dropdown-toggle");
jQuery("[id^=menu-] li.dropdown a").addClass("dropdown-toggle");
jQuery("ul.sub-menu li a").removeClass("dropdown-toggle");
// jQuery("ul.sub-menu li").removeClass("dropdown");
// jQuery("ul.sub-menu li ul.sub-menu").siblings('a').addClass("dropdown-toggle");
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
 // Loaded for javascript Demo page - I prefer it when demos actually work, don't you?  //	
 // Don't FORGET: replace all $ with jQuery to prevent conflicts //
jQuery(function () {
        // tooltip demo
        jQuery('.tooltip-demo.well').tooltip({
          selector: "a[rel=tooltip]"
        })
        jQuery('.tooltip-test').tooltip()

        // popover demo
        jQuery("a[rel=popover]")
          .popover()
          .click(function(e) {
            e.preventDefault()
          })

        // button state demo
        jQuery('#fat-btn')
          .click(function () {
            var btn = $(this)
            btn.button('loading')
            setTimeout(function () {
              btn.button('reset')
            }, 3000)
          })

        // carousel demo
        jQuery('#myCarousel').carousel()
      })
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



<?php wp_footer(); ?>

</body>
</html>