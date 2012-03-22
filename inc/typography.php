<?php
/* Custom fonts */
$alienship_body_font = of_get_option('alienship_body_font');
$alienship_post_paragraph_font = of_get_option('alienship_post_paragraph_font');
if ($alienship_body_font) {
  echo '<style type="text/css">
  body,
  p {
    font-family: ' . $alienship_body_font['face'] .';
    font-weight: ' . $alienship_body_font['style'] .';
    font-size: ' . $alienship_body_font['size'] .';
    color: ' . $alienship_body_font['color'] . '; }';

  if ($alienship_post_paragraph_font) {
    echo "\r\n  ";
    echo 'article > .entry-content p {
    font-family: ' . $alienship_post_paragraph_font['face'] .';
    font-weight: ' . $alienship_post_paragraph_font['style'] .';
    font-size: ' . $alienship_post_paragraph_font['size'] .';
    color: ' . $alienship_post_paragraph_font['color'] .'; }';
  }
  echo "\r\n";
  echo '</style>';
}
// end up custom fonts section ?>