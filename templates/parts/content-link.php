<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @package Alien Ship
 * @since Alien Ship 0.64
 */

// Get the link from the post body
alienship_get_first_link();

global $link_url; global $post_content;

do_action( 'alienship_post_before' ); ?>
<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'alienship_post_inside_before' ); ?>

	<header class="entry-header">
		<h2 class="entry-title"><a class="entry-title" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" href="<?php echo $link_url; ?>"><?php the_title(); ?>&rarr;</a></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php echo $post_content; // displays post content without the link
		wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
		do_action( 'alienship_posted_on' ); // show published date
		do_action( 'alienship_post_author' ); // show post author
		do_action( 'alienship_post_categories' ); // show post categories
		do_action( 'alienship_post_tags' ); // show post tags
		do_action( 'alienship_post_comments_link' ); // show comment link
		edit_post_link( __( ' Edit', 'alienship' ), '<span class="edit-link pull-right"><i class="glyphicon glyphicon-pencil"></i>', '</span>' ); // display the edit link
		?>
	</footer><!-- .entry-meta -->

	<?php do_action( 'alienship_post_inside_after' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php do_action( 'alienship_post_after' ); ?>