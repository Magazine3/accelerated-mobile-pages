<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AMP_wordpress_Theme
 */

?>
	<div class="fsp">
		<div class="fsp-img">
			<?php amp_wordpress_theme_post_thumbnail('module-1'); ?>
		</div>
		<div class="fsp-cnt">
			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; 
			?>
			<?php the_excerpt(); ?>
		</div>
	</div>
