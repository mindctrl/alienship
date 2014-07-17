<?php
/**
 * @package Alien Ship
 * @since 1.0.1
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'alienship_entry_header' ); ?>

	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages();
		?>
	</div><!-- .entry-content -->

	<?php do_action( 'alienship_entry_footer' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
