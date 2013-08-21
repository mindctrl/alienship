<?php
/**
 * Template Name: Marketing
 * The template for displaying a marketing landing page.
 *
 * @package Alien Ship
 * @since .93
 */

get_header( 'marketing' ); ?>

	<div class="container-narrow">

		<div class="masthead">
			<?php get_template_part( '/templates/parts/menu', 'marketing-top' ); ?>
			<h3 id="marketing-header" class="muted"><?php echo apply_filters( 'alienship_marketing_page_header_name', get_bloginfo('name') ); ?></h3>
		</div><!-- /.masthead -->

		<hr>

		<div class="jumbotron">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( '/templates/parts/content', 'marketing-page' );
			endwhile; ?>
		</div>

		<hr>

		<div id="marketing-widgets-top-row" class="row marketing">
			<div id="marketing-top-wrap" class="col-sm-12">
				<?php dynamic_sidebar( 'marketingwidgets-1' ); ?>
			</div>
		</div><!-- /.marketing -->

		<div id="marketing-widgets-bottom-row" class="row marketing">
			<div id="marketing-bottom-wrap" class="col-sm-12">
				<?php dynamic_sidebar( 'marketingwidgets-2' ); ?>
			</div>
		</div><!-- /.marketing -->

	</div><!-- /.container-narrow -->
<?php get_footer( 'marketing' ); ?>