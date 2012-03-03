<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>
<?php alienship_content_before(); ?>
	<div id="primary">
		<div class="row-fluid">
			<div id="content" role="main" class="span9">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'alienship' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'alienship' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<div class="widget">
						<h2 class="widget-title"><?php _e( 'Most Used Categories', 'alienship' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>

					<?php
					/* translators: %1$s: smilie */
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'alienship' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
		<?php alienship_content_after(); ?>
		</div><!-- #content -->
		<?php alienship_sidebar_before(); ?>
		<div id="sidebar" class="span3">
			<?php alienship_sidebar_inside_before(); ?>
			<?php get_sidebar(); ?>
			<?php alienship_sidebar_inside_after(); ?>
		</div><!-- #sidebar -->
		<?php alienship_sidebar_after(); ?>
	</div><!-- #primary -->

<?php get_footer(); ?>