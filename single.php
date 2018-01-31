<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package amp_wordpress_theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="breadcrumbs">
					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="br-crumbs">','</p>');
					} ?>
				</div>
			</div>
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-single', get_post_type() ); 

		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
