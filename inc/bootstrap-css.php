<?php
/**
 * Load Bootstrap CSS
 *
 * @package Alien Ship
 * @since Alien Ship 0.2
 */
?>
<!-- Load Bootstrap CSS. Javascript is loaded in functions.php -->
<link rel="stylesheet" type="text/css" href="<?php echo alienship_locate_template_uri('css/bootstrap.min.css'); ?>">

<?php if ( of_get_option('alienship_responsive',1) ) { ?>
<link rel="stylesheet" type="text/css" href="<?php echo alienship_locate_template_uri('css/bootstrap-responsive.min.css'); ?>">
<?php } ?>
<!-- End of Bootstrap CSS -->