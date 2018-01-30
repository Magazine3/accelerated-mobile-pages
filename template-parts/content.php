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
			<?php the_post_thumbnail('module-1'); ?>
		</div>
		<div class="fsp-cnt">
			<div class="category-lists">
               <?php 
                  $id = get_the_ID();
                  $cats = get_the_category($id);
                  echo ( count($cats) == 1  ? '' : '');
                  $c = 0; $n = 0;
                  $c = count($cats);
                  foreach ( $cats as $cat ):
                      $n++; ?>
                      <li><a href="<?php echo get_category_link($cat->cat_ID); ?>">
                          <?php echo $cat->name; echo ( $n > 0 && $n < $c ? '' : ''); ?>
                      </a></li>
                  <?php endforeach; ?>
            </div><!-- /.category-lists -->
			<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; 
			?>
			<?php the_excerpt(); ?>
			<span class="posted-dt"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
		</div>
	</div>
