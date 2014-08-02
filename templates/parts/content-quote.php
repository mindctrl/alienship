<?php
/**
 * The template for displaying posts in the Quote post format
 *
 * @package Alien Ship
 * @since Alien Ship 0.4
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<blockquote>
			<?php the_content( __( 'Continue Reading &raquo;', 'alienship' ) ); ?>
		</blockquote>
	</div>
	<?php get_template_part( '/templates/parts/content-entry-footer' ); ?>
</article><!-- #post -->
