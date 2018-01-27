<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AMP_wordpress_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'amp-wordpress-theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="head">
				<div class="hamburger-menu">
					<a href="#" class="amp-sidebar-toggle">
							<span></span>
							<span></span>
							<span></span>
						</a>
				</div>
				<div class="logo">
	              <a href="<?php bloginfo('url'); ?>">
	                <?php 
	                $custom_logo_id = get_theme_mod( 'custom_logo' );
	                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	                if ( has_custom_logo() ) {
	                    echo '<img src="'. esc_url( $logo[0] ) .'">';
	                } else {
	                    echo '<h1>'. esc_attr( get_bloginfo( 'name' ) ) .'</h1>';
	                } ?>
	              </a>
	            </div><!-- /.logo -->
                <div class="h-srch h-ic">
                    <a class="lb icon-search" href="#search"></a>
                    <div class="lb-btn"> 
                        <div class="lb-t" id="search">
                           <?php amp_search();?>
                           <a class="lb-x" href="#"></a>
                        </div> 
                    </div>
                </div><!-- /.search -->
		    </div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
		<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'amp-wordpress-theme' ); ?></button>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
		?>
	</nav><!-- #site-navigation -->
