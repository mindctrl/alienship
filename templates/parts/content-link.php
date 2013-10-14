<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @package Alien Ship
 * @since Alien Ship 0.64
 */

do_action( 'alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'alienship_post_top' ); ?>

	<header class="entry-header">
		<h2 class="entry-title">
			<a class="entry-title" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" href="<?php echo alienship_link_format_helper( 'link' ); ?>">
				<?php the_title(); ?>&rarr;
			</a>
		</h2>
	</header><!-- .entry-header -->

	<?php do_action( 'alienship_entry_content_before' ); ?>
	<div class="entry-content">
		<?php echo alienship_link_format_helper( 'post_content' ); // displays post content without the link. See inc/template-tags.php.
		wp_link_pages(); ?>
	</div><!-- .entry-content -->
	<?php
	do_action( 'alienship_entry_content_after' );
	do_action( 'alienship_entry_footer' );
	do_action( 'alienship_post_bottom' );
	?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>