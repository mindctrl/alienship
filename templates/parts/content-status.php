<?php
/**
 * The template for displaying posts in the Status post format
 *
 * @package Alien Ship
 * @since Alien Ship 0.64
 */
do_action( 'alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	do_action( 'alienship_post_top' );
	do_action( 'alienship_entry_content_before' );
	?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php
	do_action( 'alienship_entry_content_after' );
	do_action( 'alienship_entry_footer' );
	do_action( 'alienship_post_bottom' );
	?>
</article><!-- #post -->
<?php do_action( 'alienship_post_after' ); ?>