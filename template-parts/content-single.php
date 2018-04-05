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
			<div class="content-pt">
				<?php
					the_content();

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'amp-wordpress-theme' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'amp-wordpress-theme' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );

					if ( '' !== get_the_author_meta( 'description' ) ) {
						get_template_part( 'template-parts/biography' );
					}
				?>
			</div>
			<div class="post-author-info">
				<div class="post-aurhor-image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
				</div><!-- /.post-author-image -->
				<div class="post-author-desc">
					<span><?php the_author_link(); ?></span>
					<p><?php the_author_meta('description'); ?></p>
				</div><!-- /.post-author-desc -->
			</div>
			<?php the_post_navigation(); ?>
			<div class="cmts">
				<span class="view-cmts">VIEW COMMENTS</span>
				<?php if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif; ?>
			</div>
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
			
	   		<?php if(has_post_thumbnail()){?>
			   <div class="related-posts">
					<h3><?php echo get_theme_mod( 'releated-article-text', 'Related Posts' )?></h3> 
			    	<?php $categories = get_the_category($post->ID);
		            if ($categories) { $category_ids = array();
		            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		            $args=array(
		            'category__in' => $category_ids,
		            'post__not_in' => array($post->ID), 
		            'showposts'=> esc_attr( get_theme_mod( 'number-of-posts' , '3') ) ,
		            'ignore_sticky_posts'=>1,
		             );
		            $my_query = new WP_Query($args); if( $my_query->have_posts() ) { 
					 while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<div class="rp-list">
							<?php if ( has_post_thumbnail()) { ?>
							<div class="rp-img">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('module-1'); ?></a>
							</div><!-- / latest-post -->
							<?php } ?>
							<div class="rp-tlt">				
								<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
							</div>
						</div><!-- /.latest-posts -->
				   <?php  endwhile;
				} wp_reset_postdata(); } ?>
		</div><!-- /.releted-posts -->
		<?php }  ?>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer container">
		<div class="recent-post">
			<h3><?php echo get_theme_mod('recently-stories-text', 'Recent posts')?></h3>
			<?php  $orig_post = $post;
                global $post;
                $categories = get_the_category($post->ID);
                if ($categories) {
                    $category_ids = array();
                    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                    $args=array(
//	                        'category__in' => $category_ids,
                    'post__not_in' => array($post->ID),
                    'posts_per_page'=> 6, // Number of related posts that will be shown.
                    'showposts'=> esc_attr( get_theme_mod( 'number-of-posts' , '6') ) ,
                    'ignore_sticky_posts'=>1
                    );
                    $my_query = new wp_query( $args );
                    if ($my_query->have_posts()) { ?>
				    <div class="recentpublish-posts">
					<?php
                        while( $my_query->have_posts() ) {
                            $my_query->the_post(); ?>
								<div class="fsp">
									<?php if ( has_post_thumbnail() ) { ?>
							        <div class="fsp-img">
										<a href="<?php the_permalink();?>"><?php the_post_thumbnail('module-1'); ?></a>
									</div>
							        <?php }
							        else { 
							    		echo '';
							    	}?>
							        <div class="fsp-cnt">
										<div class="category-lists">
								           <?php the_category( ' ' ); ?>
								        </div><!-- /.category-lists -->
										<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
										<?php the_excerpt(); ?>
										<span class="posted-dt"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
									</div>
							    </div><!-- /. post-list --> 
                    	<?php 	} // while?>
                    </div><!-- /.recentpublish-posts -->
                   <?php }	// if category
                $post = $orig_post;
            wp_reset_postdata();  ?>				
		<?php }  ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
