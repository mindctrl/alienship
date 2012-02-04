<?php
/** 
 * Alien Ship shortcodes
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

/* =Buttons
----------------------------------------------- */
/* [button] shortcode. Options for type= are "primary", "info", "success", "warning", "danger" */
function alienship_button($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#', 'type' => 'btn'), $atts));
   if ($type != "btn") {
   return '<a class="btn btn-'.$type.'" href="'.$link.'">' . do_shortcode($content) . '</a>';
   } else {
   return '<a class="'.$type.'" href="'.$link.'">' . do_shortcode($content) . '</a>';
   }
}
add_shortcode('button', 'alienship_button');

/* [largebutton] shortcode. Options for type= are "primary", "info", "success", "warning", "danger" */
function alienship_largebutton($atts, $content = null) {
   extract(shortcode_atts(array('link' => '#', 'type' => 'btn'), $atts));
   if ($type != "btn") {
   return '<a class="btn btn-large btn-'.$type.'" href="'.$link.'">' . do_shortcode($content) . '</a>';
   } else {
   return '<a class="btn btn-large" href="'.$link.'">' . do_shortcode($content) . '</a>';
   }
}
add_shortcode('largebutton', 'alienship_largebutton');

/* =Labels
----------------------------------------------- */
function alienship_label($atts, $content = null) {
   extract(shortcode_atts(array('type' => 'label'), $atts));
   if ($type != "label") {
   return '<span class="label label-'.$type.'">' . do_shortcode($content) . '</span>';
   } else {
   return '<span class="'.$type.'">' . do_shortcode($content) . '</span>';
   }
}
add_shortcode('label', 'alienship_label');

/* =Wells
----------------------------------------------- */
function alienship_well($atts, $content = null) {
   return '<div class="well">' . do_shortcode($content) .'</div>';
}
add_shortcode('well', 'alienship_well');