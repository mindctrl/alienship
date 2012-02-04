<?php
/** 
 * Alien Ship shortcodes
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

/* [button] shortcode. Options for type= are "primary", "info", "success", "warning", "danger" */
function alienship_button($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#', 'type' => 'btn'), $atts));
   if (isset($type)) {
   return '<a class="btn btn-'.$type.'" href="'.$link.'">' . do_shortcode($content) . '</a>';   	
   } else {
   return '<a class="btn" href="'.$link.'">' . do_shortcode($content) . '</a>';
   }
}
add_shortcode('button', 'alienship_button');