<?php
/**
 * The template for displaying posts in the Link post format
 *
 * @package Alien Ship
 * @since Alien Ship 0.64
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title">
			<a class="entry-title" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark" href="<?php echo esc_url( alienship_link_format_helper( 'link' ) ); ?>">
				<?php the_title(); ?>&rarr;
			</a>
		</h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php echo alienship_link_format_helper( 'post_content' ); // displays post content without the link. See inc/template-tags.php.
		wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<?php get_template_part( '/templates/parts/content-entry-footer' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
