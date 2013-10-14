<?php
/**
 * The template used when no results are found. Used in archive.php, author.php, index.php, and search.php
 *
 * @package Alien Ship
 * @since Alien Ship 0.56
 */
?>
<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'alienship' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'alienship' ); ?></p>
		<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 -->