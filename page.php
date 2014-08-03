<?php
/**
 * The template is for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Alien Ship
 * @since Alien Ship 0.1
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				do_action( 'alienship_loop_before' );

				get_template_part( '/templates/parts/content', 'page' );

				do_action( 'alienship_loop_after' );

				comments_template( '', true );

			endwhile;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer(); ?>