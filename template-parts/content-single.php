<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header container">
		<div class="cat-list">
			<?php the_category( ' ' ); ?>
		</div>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="post-img">
		<?php
		$get_description = get_post(get_post_thumbnail_id())->post_excerpt;
		the_post_thumbnail();
		  if(!empty($get_description)){//If description is not empty show the div
		  echo '<div class="featured_caption">' . $get_description . '</div>';
		  }
		?>
	</div>
	<div class="entry-content container">
		<div class="right-part">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'amp_wordpress_theme' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'amp_wordpress_theme' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
		</div>
		<div class="left-part">
			<div class="social-share-btns">
				<span>share</span>
				<ul>
					<li><a class="icon-twitter ic-1" href="#"></a></li>
					<li><a class="icon-facebook2 ic-2" href="#"></a></li>
					<li><a class="icon-pinterest ic-3" href="#"></a></li>
					<li><a class="icon-googleplus ic-4" href="#"></a></li>
					<li><a class="icon-linkedin2 ic-5" href="#"></a></li>
				</ul>
			</div>
			<div class="post-athr">
				<span class="pb-txt">Published by</span>
				<span class="pb-athr"><?php the_author_link(); ?></span>
			</div>
			<div class="tgs">
				<?php the_tags( '<span>Tags:</span>', ' ', ' ' ); ?> 
			</div>
			<div class="pt-dt">
				<span class="posted-dt"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
				<?php edit_post_link(); ?>
			</div>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="container">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'amp_wordpress_theme' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
