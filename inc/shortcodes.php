<?php
/** 
 * Alien Ship shortcodes
 *
 * @package Alien Ship
 * @since Alien Ship 0.2
 */

/* Allow shortcodes in widgets */
add_filter('widget_text', 'do_shortcode');



/* =Alerts - Types are 'info', 'error', 'success', and unspecified(which displays a default color). Specify a heading text. See example.
 *  Example: [alert type="success" heading="Congrats!"]You won the lottery![/alert]
----------------------------------------------- */
if ( ! function_exists( 'alienship_alert' ) ):
function alienship_alert($atts, $content = null) {
   extract(shortcode_atts(array('type' => 'alert', 'heading' => ''), $atts));
   if ($type != "alert") {
   return '<div class="alert alert-'.$type.' fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>'. do_shortcode($heading) .'</strong><p> ' . do_shortcode($content) . '</p></div>';
   } else {
   return '<div class="'.$type.' fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>'. do_shortcode($heading) .'</strong>' . do_shortcode($content) . '</div>';
   }
}
add_shortcode('alert', 'alienship_alert');
endif;



/* =Badges
----------------------------------------------- 
* [badge] shortcode. Options for type are default, success, warning, error, info, and inverse. If a type of not specified, default is used. 
* Example: [badge type="important"]1[/badge] */
if ( ! function_exists( 'alienship_badge' ) ):
function alienship_badge($atts, $content = null) {
   extract(shortcode_atts(array('type' => 'badge'), $atts));
   if ($type != "badge") {
   return '<span class="badge badge-'.$type.'">' . do_shortcode($content) . '</span>';
   } else {
   return '<span class="'.$type.'">' . do_shortcode($content) . '</span>';
   }
}
add_shortcode('badge', 'alienship_badge');
endif;



/* =Buttons
----------------------------------------------- */
/* [button] shortcode. Options for type= are "primary", "info", "success", "warning", "danger", and "inverse".
 * Options for size are mini, small, medium and large. If none is specified it defaults to medium size.
 * Example: [button type="info" size="large" link="http://yourlink.com"]Button Text[/button] */
if ( ! function_exists( 'alienship_button' ) ):
function alienship_button($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#', 'type' => '', 'size' => 'medium'), $atts));
   
   if (empty($type)) {
    $type = "btn";
   } else {
    $type = "btn btn-" . $type;
   }

   if ($size == "medium") {
    $size = "";
   } else {
    $size = "btn-" . $size;
   }

   return '<a class="'.$type.' '.$size.'" href="'.$link.'">' . do_shortcode($content) . '</a>';
}
add_shortcode('button', 'alienship_button');
endif;



/* =Featured Posts Carousel
----------------------------------------------- 
* [featured-posts] shortcode. Options are tag, max, width, and height. Defaults: tag="featured" max="3" width="745" height="350".
* Example: [featured-posts tag="featured" max="3"] This will feature up to 3 posts tagged "featured". */
if ( ! function_exists( 'alienship_featured_posts_shortcode' ) ):
function alienship_featured_posts_shortcode( $atts, $content = null ) {
  extract(shortcode_atts(array('tag' => '', 'max' => '', 'width' => '', 'height' => ''), $atts));

  if (empty($tag)) {
    $tag = "featured";
  } else {
    $tag = ''. $tag .'';
  }

  if (empty($max)) {
    $max = "3";
  } else {
    $max = ''. $max .'';
  }

  if (empty($width)) {
    $width = "745";
  } else {
    $width = ''.$width.'';
  }

  if (empty($height)) {
    $height = "350";
  } else {
    $height = ''.$height.'';
  }
  
  $featuredquery = 'posts_per_page=' . absint( $max );
  $featuredquery .= '&tag=' . $tag;
  $featured_query_shortcode = new WP_Query( $featuredquery );
  
  if ( $featured_query_shortcode->have_posts() ) { ?>
    <!-- Featured listings -->
    <div style="width:<?php echo $width;?>px; max-width: 100%">
    <div class="row-fluid">
    <div class="span12">
      <div id="featured-carousel-shortcode" class="carousel slide">
        <div class="carousel-inner">

          <?php while ( $featured_query_shortcode->have_posts() ) : $featured_query_shortcode->the_post(); ?>

          <div class="item">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail( ''. $featured_query_shortcode->post->ID .'', array($width, $height), array('title' => "" )); ?></a>
            <div class="carousel-caption">
              <h4><?php the_title(); ?></h4>
            </div><!-- .carousel-caption -->
          </div><!-- .item -->

        <?php endwhile; ?>
        </div><!-- .carousel-inner -->
        <a class="left carousel-control" href="#featured-carousel-shortcode" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#featured-carousel-shortcode" data-slide="next">&rsaquo;</a>
      </div><!-- #featured-carousel-shortcode -->
    </div><!-- .span12 -->
    </div><!-- .row-fluid -->
    </div>
    <div class="clear">&nbsp;</div>
    <script type="text/javascript">
      jQuery(function() {
        // Activate the first carousel item //
        jQuery("div#featured-carousel-shortcode").children("div.carousel-inner").children("div.item:first").addClass("active");
        // Start the Carousel //
        jQuery('.carousel').carousel();
      });
    </script>
    <?php } // if(have_posts()) ?>
    <!-- End featured listings -->
<?php wp_reset_query();
}
add_shortcode('featured-posts', 'alienship_featured_posts_shortcode');
endif;



/* =Labels
----------------------------------------------- 
* [label] shortcode. Options for type= are "default", important", "info", "success", "warning", and "inverse". If a type of not specified, default is used. 
* Example: [label type="important"]Label text[/label] */
if ( ! function_exists( 'alienship_label' ) ):
function alienship_label($atts, $content = null) {
   extract(shortcode_atts(array('type' => 'label'), $atts));
   if ($type != "label") {
   return '<span class="label label-'.$type.'">' . do_shortcode($content) . '</span>';
   } else {
   return '<span class="'.$type.'">' . do_shortcode($content) . '</span>';
   }
}
add_shortcode('label', 'alienship_label');
endif;



/* =Login form shortcode
------------------------------------------------
* [loginform] shortcode. Options are redirect="http://your-url-here.com". If redirect is not set, it returns to the current page.
* Example: [loginform redirect="http://www.site.com"] */
function alienship_login_form( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'redirect' => ''
    ), $atts ) );
 
  if (!is_user_logged_in()) {
      if($redirect) {
          $redirect_url = $redirect;
      } else {
          $redirect_url = get_permalink();
      }
      $form = wp_login_form(array('echo' => false, 'redirect' => $redirect_url ));
      return $form;
  }
}
add_shortcode('loginform', 'alienship_login_form');




/* =Panels
----------------------------------------------- 
* [panel] shortcode. Columns defaults to 6. You can specify columns in the shortcode.
* Example: [panel columns="4"]Your panel text here.[/panel] */
if ( ! function_exists( 'alienship_panel' ) ):
function alienship_panel( $atts, $content = null ) {
   extract(shortcode_atts(array('columns' => '6'), $atts));
   $gridsize = '12';
   $span = '"span';
   if ($columns != "12") {
   $span .= ''.$columns.'"';
   $spanfollow = $gridsize - $columns;
   return '<div class="row-fluid"><div class='.$span.'><div class="panel"><p>' . do_shortcode($content) . '</p></div></div><div class="span'.$spanfollow.'">&nbsp;</div></div><div class="clear"></div>'; }
   else {
      $span .= ''.$columns.'"';
      return '<div class="row-fluid"><div class='.$span.'><div class="panel"><p>' . do_shortcode($content) . '</p></div></div></div><div class="clear"></div>';
   }
}
add_shortcode('panel', 'alienship_panel');
endif;



/* =Wells
-----------------------------------------------
* [well] shortcode.
* Example: [well]Your text here.[/well] */
if ( ! function_exists( 'alienship_well' ) ):
function alienship_well($atts, $content = null) {
   return '<div class="well">' . do_shortcode($content) .'</div>';
}
add_shortcode('well', 'alienship_well');
endif;