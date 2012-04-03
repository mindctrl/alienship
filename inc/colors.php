<?php
/* Custom colors
 * @since Alien Ship .56
 */

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
$alienship_color_sidebar_bg = of_get_option('alienship_color_sidebar_bg');
$alienship_color_body_bg = of_get_option('alienship_color_body_bg');
$alienship_color_footer_entry_meta_border = of_get_option('alienship_color_footer_entry_meta_border');

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
    echo '.navbar .nav > li > a, .btn-navbar .icon-bar-text {
    color: ' . $alienship_color_navbar_link . '; }';
  }

  if ($alienship_color_navbar_link_hover) {
    echo "\r\n ";
    echo '.navbar .nav > li > a:hover {
    color: ' . $alienship_color_navbar_link_hover . ';
    background-color: ' . $alienship_color_navbar_color2 . ' }';
  }

  if ($alienship_color_navbar_link_active && $alienship_color_navbar_link_active_bg) {
    echo "\r\n ";
    echo '.navbar .nav .active > a, .navbar .nav .active > a:hover, .dropdown-menu .active > a {
    color: ' . $alienship_color_navbar_link_active . ';
    background-color: '. $alienship_color_navbar_link_active_bg .'; }';
  }

  if ($alienship_color_navbar_color1 && $alienship_color_navbar_color2) {
    echo "\r\n ";
    echo '.navbar-inner, .navbar-inner > .btn, .btn-navbar, btn-navbar:hover, .btn-navbar:active, .btn-navbar.active, .btn-navbar.disabled, .btn-navbar[disabled] {
    color: ' . $alienship_color_navbar_color2 .' !important;
    background-color: ' . $alienship_color_navbar_color2 . ' !important;
    background-image: -moz-linear-gradient(top , ' . $alienship_color_navbar_color1 . ', ' . $alienship_color_navbar_color2 .') !important;
    background-image: -ms-linear-gradient(top, ' . $alienship_color_navbar_color1 . ', ' . $alienship_color_navbar_color2 .') !important;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $alienship_color_navbar_color1 . '), to(' . $alienship_color_navbar_color2 . ')) !important;
    background-image: -webkit-linear-gradient(top, ' . $alienship_color_navbar_color1 . ', ' . $alienship_color_navbar_color2 . ') !important;
    background-image: -o-linear-gradient(top, ' . $alienship_color_navbar_color1 . ', ' . $alienship_color_navbar_color2 . ') !important;
    background-image: linear-gradient(top, ' . $alienship_color_navbar_color1 . ', ' . $alienship_color_navbar_color2 . ') !important;
    background-repeat: repeat-x;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="' . $alienship_color_navbar_color1 . '", endColorstr="' . $alienship_color_navbar_color2 . '", GradientType=0); }';
  }

  if ($alienship_color_navbar_color2) {
    echo "\r\n ";
    echo '.dropdown-menu li > a:hover, .dropdown-menu .active > a:hover {
      background-color: ' . $alienship_color_navbar_color2 . ' !important; }';
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

  if ($alienship_color_sidebar_bg) {
    echo "\r\n ";
    echo '#sidebar .well {
    background-color: ' . $alienship_color_sidebar_bg . '; }';
  }

  if ($alienship_color_body_bg) {
    echo "\r\n ";
    echo 'body {
    background-color: ' . $alienship_color_body_bg . '; }';
  }

  if ($alienship_color_footer_entry_meta_border) {
    echo "\r\n ";
    echo 'footer.entry-meta {
    border-bottom: 1px solid ' . $alienship_color_footer_entry_meta_border . '; }';
  }

  echo "\r\n ";
  echo '</style>';
}
?>