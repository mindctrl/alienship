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
