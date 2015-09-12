<?php
/**
 * Template for display Featured Content
 */
?>
<div class="row">
	<div class="col-sm-12">
		<div id="featured-carousel" class="carousel slide">

			<div class="carousel-inner" role="listbox">

				<?php
					do_action( 'alienship_featured_posts_before' );

					$featured_posts = alienship_get_featured_posts();

					foreach ( (array) $featured_posts as $order => $post ) {
						setup_postdata( $post );
						get_template_part( '/templates/parts/content-featured-post' );
					}

					do_action( 'alienship_featured_posts_after' );

					wp_reset_postdata();
				?>

			</div><!-- .carousel-inner -->

			<ol class="carousel-indicators">
			<?php
				$indicators = count( $featured_posts );
				$count = 0;
				while ( $count != $indicators ) {
					echo '<li data-target="#featured-carousel" data-slide-to="' . (int) $count . '"></li>';
					$count++;
				}
			?>
			</ol>

			<a class="left carousel-control" href="#featured-carousel" role="button" data-slide="prev">
				<span class="icon-prev"></span>
				<span class="sr-only"><?php _ex( 'Previous', 'Used to navigate the featured content carousel.', 'alienship' ); ?></span>
			</a>
			<a class="right carousel-control" href="#featured-carousel" role="button" data-slide="next">
				<span class="icon-next"></span>
				<span class="sr-only"><?php _ex( 'Next', 'Used to navigate the featured content carousel.', 'alienship' ); ?></span>
			</a>
		</div><!-- #featured-carousel -->
	</div><!-- .col-sm-12 -->
</div><!-- .row -->