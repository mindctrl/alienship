<?php
// header*.php
function alienship_head() { do_action('alienship_head'); }
function alienship_header_before() { do_action('alienship_header_before'); }
function alienship_header_inside() { do_action('alienship_header_inside'); }
function alienship_header_after() { do_action('alienship_header_after'); }

// 404.php, archive.php, author.php content*.php index.php, page*.php, search.php, single.php
function alienship_content_before() { do_action('alienship_content_before'); }
function alienship_content() { do_action('alienship_content'); }
function alienship_content_after() { do_action('alienship_content_after'); }
function alienship_main_before() { do_action('alienship_main_before'); }
function alienship_main_after() { do_action('alienship_main_after'); }
function alienship_post_before() { do_action('alienship_post_before'); }
function alienship_post_after() { do_action('alienship_post_after'); }
function alienship_post_inside_before() { do_action('alienship_post_inside_before'); }
function alienship_post_inside_after() { do_action('alienship_post_inside_after'); }
function alienship_loop_before() { do_action('alienship_loop_before'); }
function alienship_loop_after() { do_action('alienship_loop_after'); }
function alienship_sidebar_before() { do_action('alienship_sidebar_before'); }
function alienship_sidebar_inside_before() { do_action('alienship_sidebar_inside_before'); }
function alienship_sidebar_inside_after() { do_action('alienship_sidebar_inside_after'); }
function alienship_sidebar_after() { do_action('alienship_sidebar_after'); }

// footer*.php
function alienship_footer_before() { do_action('alienship_footer_before'); }
function alienship_footer_inside() { do_action('alienship_footer_inside'); }
function alienship_footer_after() { do_action('alienship_footer_after'); }
function alienship_footer() { do_action('alienship_footer'); }
?>