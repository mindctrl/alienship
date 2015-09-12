<?php
/**
 * @package Alien Ship
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Link to %s', 'alienship' ), the_title_attribute( 'echo=0' ) ); ?>">
			<?php echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'aligncenter', 'title' => "" ) ); ?>
		</a>
		<?php
	} // has_post_thumbnail()

	get_template_part( '/templates/parts/content-entry-header' ); ?>

	<div class="entry-content">
		<?php

		// Display excerpt on archives, full content in singular views.
		is_singular() ? the_content() : the_excerpt();

		wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<?php get_template_part( '/templates/parts/content-entry-footer' ); ?>
</article><!-- #post-<?php the_ID(); ?> -->
