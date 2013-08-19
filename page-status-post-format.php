<?php
/**
 * Template Name: Status Posts
 * The template is for displaying posts with the Status post format.
 *
 * @package Alien Ship
 * @subpackage Templates
 * @since .93
 */

get_header(); ?>
<!-- Main -->
	<?php do_action( 'alienship_content_before' ); ?>
	<div class="row">
		<div id="content" class="<?php echo apply_filters( 'alienship_content_container_class', 'col-sm-9' ); ?>">

			<?php
				$status_posts = get_posts( array(
					'tax_query' => array(
						array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',
							'terms'    => array( 'post-format-status' ),
							'operator' => 'IN'
						)
					)
				) );

			global $post;

			foreach( (array) $status_posts as $post ) {
				setup_postdata( $post );
				get_template_part( '/inc/parts/content', 'status' );
			}

		do_action( 'alienship_content_after' ); ?>
		</div><!-- #content -->

		<?php get_sidebar(); ?>
	</div><!-- .row -->
<?php get_footer(); ?>