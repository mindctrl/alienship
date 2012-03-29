<?php
/* Custom fonts
 * @since Alien Ship .53 */
$alienship_body_font = of_get_option('alienship_body_font');
$alienship_post_paragraph_font = of_get_option('alienship_post_paragraph_font');
$alienship_header_font = of_get_option('alienship_header_font');
$alienship_h1_font = of_get_option('alienship_h1_font');
$alienship_h2_font = of_get_option('alienship_h2_font');
$alienship_h3_font = of_get_option('alienship_h3_font');
$alienship_h4_font = of_get_option('alienship_h4_font');
$alienship_h5_font = of_get_option('alienship_h5_font');
$alienship_h6_font = of_get_option('alienship_h6_font');
if ($alienship_body_font) {
  echo '<style type="text/css">
  body,
  p {
    font-family: ' . $alienship_body_font['face'] .';
    font-style: ' . $alienship_body_font['style'] .';
    font-weight: ' . $alienship_body_font['weight'] .';
    font-size: ' . $alienship_body_font['size'] .';
    color: ' . $alienship_body_font['color'] . '; }';

  if ($alienship_post_paragraph_font) {
    echo "\r\n  ";
    echo 'article > .entry-content p {
    font-family: ' . $alienship_post_paragraph_font['face'] .';
    font-style: ' . $alienship_post_paragraph_font['style'] .';
    font-weight: ' . $alienship_post_paragraph_font['weight'] .';
    font-size: ' . $alienship_post_paragraph_font['size'] .';
    color: ' . $alienship_post_paragraph_font['color'] .'; }';
  }

  if ($alienship_h1_font) {
    echo "\r\n  ";
    echo 'h1 {
    font-family: ' . $alienship_h1_font['face'] .';
    font-style: ' . $alienship_h1_font['style'] .';
    font-weight: ' . $alienship_h1_font['weight'] .';
    font-size: ' . $alienship_h1_font['size'] .';
    color: ' . $alienship_h1_font['color'] .'; }';
  }

  if ($alienship_h2_font) {
    echo "\r\n  ";
    echo 'h2 {
    font-family: ' . $alienship_h2_font['face'] .';
    font-style: ' . $alienship_h2_font['style'] .';
    font-weight: ' . $alienship_h2_font['weight'] .';
    font-size: ' . $alienship_h2_font['size'] .';
    color: ' . $alienship_h2_font['color'] .'; }';
  }

  if ($alienship_h3_font) {
    echo "\r\n  ";
    echo 'h3 {
    font-family: ' . $alienship_h3_font['face'] .';
    font-style: ' . $alienship_h3_font['style'] .';
    font-weight: ' . $alienship_h3_font['weight'] .';
    font-size: ' . $alienship_h3_font['size'] .';
    color: ' . $alienship_h3_font['color'] .'; }';
  }

  if ($alienship_h4_font) {
    echo "\r\n  ";
    echo 'h4 {
    font-family: ' . $alienship_h4_font['face'] .';
    font-style: ' . $alienship_h4_font['style'] .';
    font-weight: ' . $alienship_h4_font['weight'] .';
    font-size: ' . $alienship_h4_font['size'] .';
    color: ' . $alienship_h4_font['color'] .'; }';
  }

  if ($alienship_h5_font) {
    echo "\r\n  ";
    echo 'h5 {
    font-family: ' . $alienship_h5_font['face'] .';
    font-style: ' . $alienship_h5_font['style'] .';
    font-weight: ' . $alienship_h5_font['weight'] .';
    font-size: ' . $alienship_h5_font['size'] .';
    color: ' . $alienship_h5_font['color'] .'; }';
  }

  if ($alienship_h6_font) {
    echo "\r\n  ";
    echo 'h6 {
    font-family: ' . $alienship_h6_font['face'] .';
    font-style: ' . $alienship_h6_font['style'] .';
    font-weight: ' . $alienship_h6_font['weight'] .';
    font-size: ' . $alienship_h6_font['size'] .';
    color: ' . $alienship_h6_font['color'] .'; }';
  }
  echo "\r\n";
  echo '</style>';
}
// end of custom fonts section ?>

<?php
/* Custom colors
 * @since Alien Ship .56
 */
if ( of_get_option('alienship_enable_custom_colors') ) {

$alienship_color_link = of_get_option('alienship_color_link');
$alienship_color_link_hover = of_get_option('alienship_color_link_hover');
$alienship_color_navbar_link = of_get_option('alienship_color_navbar_link');
$alienship_color_navbar_link_hover = of_get_option('alienship_color_navbar_link_hover');
$alienship_color_navbar_link_active = of_get_option('alienship_color_navbar_link_active');
$alienship_color_navbar_link_active_bg = of_get_option('alienship_color_navbar_link_active_bg');
$alienship_color_navbar_color1 = of_get_option('alienship_color_navbar_color1');
$alienship_color_navbar_color2 = of_get_option('alienship_color_navbar_color2');
$alienship_color_navbar_search_bg = of_get_option('alienship_color_navbar_search_bg');
$alienship_color_navbar_search_bg_focused = of_get_option('alienship_color_navbar_search_bg_focused');
$alienship_color_navbar_search_placeholder = of_get_option('alienship_color_navbar_search_placeholder');

if ($alienship_color_link) {
  echo '<style type="text/css">
  a {
    color: ' . $alienship_color_link . ';
  }';

  if ($alienship_color_link_hover) {
    echo "\r\n ";
    echo 'a:hover {
    color: ' . $alienship_color_link_hover . '; }';
  }

  if ($alienship_color_navbar_link) {
    echo "\r\n ";
    echo '.navbar .nav > li > a {
    color: ' . $alienship_color_navbar_link . '; }';
  }

  if ($alienship_color_navbar_link_hover) {
    echo "\r\n ";
    echo '.navbar .nav > li > a:hover {
    color: ' . $alienship_color_navbar_link_hover . '; }';
  }

  if ($alienship_color_navbar_link_active && $alienship_color_navbar_link_active_bg) {
    echo "\r\n ";
    echo '.navbar .nav .active > a, .navbar .nav .active > a:hover {
    color: ' . $alienship_color_navbar_link_active . ';
    background-color: '. $alienship_color_navbar_link_active_bg .'; }';
  }

  if ($alienship_color_navbar_color1 && $alienship_color_navbar_color2) {
    echo "\r\n ";
    echo '.navbar-inner {
    background-color: ' . $alienship_color_navbar_color1 . ';
    background-image: -moz-linear-gradient(top , ' . $alienship_color_navbar_color1 . ', ' . $alienship_color_navbar_color2 .');
    background-image: -ms-linear-gradient(top, ' . $alienship_color_navbar_color1 . ', ' . $alienship_color_navbar_color2 .');
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $alienship_color_navbar_color1 . '), to(' . $alienship_color_navbar_color2 . '));
    background-image: -webkit-linear-gradient(top, ' . $alienship_color_navbar_color1 . ', ' . $alienship_color_navbar_color2 . ');
    background-image: -o-linear-gradient(top, ' . $alienship_color_navbar_color1 . ', ' . $alienship_color_navbar_color2 . ');
    background-image: linear-gradient(top, ' . $alienship_color_navbar_color1 . ', ' . $alienship_color_navbar_color2 . ');
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="' . $alienship_color_navbar_color1 . '", endColorstr="' . $alienship_color_navbar_color2 . '", GradientType=0); }';
  }

  if ($alienship_color_navbar_search_bg) {
    echo "\r\n ";
    echo '.navbar-search .search-query {
    background-color: ' . $alienship_color_navbar_search_bg . '; }';
  }

  if ($alienship_color_navbar_search_bg_focused) {
    echo "\r\n ";
    echo '.navbar-search .search-query:focus, .navbar-search .search-query.focused {
    background-color: ' . $alienship_color_navbar_search_bg_focused . '; }';
  }

  if ($alienship_color_navbar_search_placeholder) {
    echo "\r\n ";
    echo '.navbar-search .search-query:-moz-placeholder, .navbar-search .search-query::-webkit-input-placeholder {
    background-color: ' . $alienship_color_navbar_search_placeholder . '; }';
  }

  echo "\r\n ";
  echo '</style>';
}
} // endif custom colors enabled
?>