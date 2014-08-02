<?php
/**
 * @package Alien Ship
 * @since 1.0.1
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( '/templates/parts/content-entry-header' ); ?>

	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages();
		?>
	</div><!-- .entry-content -->

	<?php get_template_part( '/templates/parts/content-entry-footer' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
