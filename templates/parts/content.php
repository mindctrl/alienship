<?php
/**
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>
<?php do_action( 'alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	do_action( 'alienship_post_inside_before' );

	do_action( 'alienship_entry_title' ); ?>

	<div class="entry-content">
		<?php the_content( __( 'Continue Reading &raquo;', 'alienship' ) ); ?>
	</div>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : ?>
			<?php
			do_action( 'alienship_posted_on' ); // show published date
			do_action( 'alienship_post_author' ); // show post author
			do_action( 'alienship_post_categories' ); // show post categories
			do_action( 'alienship_post_tags' ); // show post tags
			do_action( 'alienship_post_comments_link' ); // show comment link
			edit_post_link( __( ' Edit', 'alienship' ), '<span class="edit-link pull-right"><i class="glyphicon glyphicon-pencil"></i>', '</span>' ); // display the edit link
			?>
		<?php endif; ?>
	</footer><!-- #entry-meta -->

	<?php do_action( 'alienship_post_inside_after' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>