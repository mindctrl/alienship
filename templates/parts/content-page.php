<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
do_action( 'alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	do_action( 'alienship_post_top' );
	do_action( 'alienship_entry_header' );
	do_action( 'alienship_entry_content_before' );
	?>
	<div class="entry-content">
		<?php
		the_content( __( 'Continue Reading &raquo;', 'alienship' ) );

		wp_link_pages();

		edit_post_link( __( ' Edit', 'alienship' ), '<span class="edit-link pull-right"><i class="glyphicon glyphicon-pencil"></i>', '</span>' );

		do_action( 'alienship_post_bottom' ); ?>
	</div><!-- .entry-content -->
	<?php do_action( 'alienship_entry_content_after' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>