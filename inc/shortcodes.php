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
function alienship_alert($atts, $content = null) {
   extract(shortcode_atts(array('type' => 'alert', 'heading' => ''), $atts));
   if ($type != "alert") {
   return '<div class="alert alert-'.$type.' fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>'. do_shortcode($heading) .'</strong><p> ' . do_shortcode($content) . '</p></div>';
   } else {
   return '<div class="'.$type.' fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>'. do_shortcode($heading) .'</strong>' . do_shortcode($content) . '</div>';
   }
}
add_shortcode('alert', 'alienship_alert');



/* =Buttons
----------------------------------------------- */
/* [button] shortcode. Options for type= are "primary", "info", "success", "warning", "danger"
 *  Example: [button type="info" link="http://yourlink.com"]Button Text[/button] */
function alienship_button($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#', 'type' => 'btn'), $atts));
   if ($type != "btn") {
   return '<a class="btn btn-'.$type.'" href="'.$link.'">' . do_shortcode($content) . '</a>';
   } else {
   return '<a class="'.$type.'" href="'.$link.'">' . do_shortcode($content) . '</a>';
   }
}
add_shortcode('button', 'alienship_button');

/* [largebutton] shortcode. Options for type= are "primary", "info", "success", "warning", "danger"
 *  Example: [largebutton type="info" link="http://yourlink.com"]Large Button Text[/largebutton] */
function alienship_largebutton($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#', 'type' => 'btn'), $atts));
   if ($type != "btn") {
   return '<a class="btn btn-large btn-'.$type.'" href="'.$link.'">' . do_shortcode($content) . '</a>';
   } else {
   return '<a class="'.$type.' '.$type.'-large" href="'.$link.'">' . do_shortcode($content) . '</a>';
   }
}
add_shortcode('largebutton', 'alienship_largebutton');



/* =Labels
----------------------------------------------- 
* [label] shortcode. Options for type= are "important", "info", "success", and "warning". If you don't specify a type there is a default style. 
* Example: [label type="important"]Label text[/label] */
function alienship_label($atts, $content = null) {
   extract(shortcode_atts(array('type' => 'label'), $atts));
   if ($type != "label") {
   return '<span class="label label-'.$type.'">' . do_shortcode($content) . '</span>';
   } else {
   return '<span class="'.$type.'">' . do_shortcode($content) . '</span>';
   }
}
add_shortcode('label', 'alienship_label');



/* =Panels
----------------------------------------------- 
* [panel] shortcode. Columns defaults to 6. You can specify columns in the shortcode.
* Example: [panel columns="4"]Your panel text here.[/panel] */
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


/* =Wells
-----------------------------------------------
* [well] shortcode.
* Example: [well]Your text here.[/well] */
function alienship_well($atts, $content = null) {
   return '<div class="well">' . do_shortcode($content) .'</div>';
}
add_shortcode('well', 'alienship_well');