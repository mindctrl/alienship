<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */
?>

<article role="article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a class="entry-title" title="<?php the_title();?>" rel="bookmark" href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'alienship' ), 'after' => '</div>' ) ); ?>
		<?php edit_post_link( __( 'Edit', 'alienship' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
