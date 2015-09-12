<?php
/**
 * The template for displaying posts in the Status post format
 *
 * @package Alien Ship
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<?php get_template_part( '/templates/parts/content-entry-footer' ); ?>
</article><!-- #post -->
