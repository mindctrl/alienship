<?php
if (! function_exists( 'alienship_wp_mail_to_smtp') ):
/**
 * Rewrite outgoing mail sender information so it doesn't suck like the defaults
 * @since Alien Ship .5
 */
if ( of_get_option( 'alienship_phpmailer_rewrite',1 ) && of_get_option( 'alienship_phpmailer_rewrite_custom' ) ) { 
    function alienship_wp_mail_to_smtp(&$phpmailer) {
      $phpmailer->Sender = '' . of_get_option( 'alienship_phpmailer_rewrite_custom_sender' ) . '';
      $phpmailer->From = '' . of_get_option( 'alienship_phpmailer_rewrite_custom_from_email' ) . '';
      $phpmailer->FromName = '' . of_get_option( 'alienship_phpmailer_rewrite_custom_from_name' ) . '';
    } } else if ( of_get_option( 'alienship_phpmailer_rewrite',1 ) ) {
      function alienship_wp_mail_to_smtp(&$phpmailer) {
        $phpmailer->Sender = '' . get_bloginfo( 'admin_email' ) . '';
        $phpmailer->From = '' . get_bloginfo( 'admin_email' ) . '';
        $phpmailer->FromName = '' . get_bloginfo( 'name' ) . '';
      }
    }
    else {
  }
endif;
add_action('phpmailer_init', 'alienship_wp_mail_to_smtp');