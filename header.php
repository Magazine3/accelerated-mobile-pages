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
				<div class="hamburger-menu drawer drawer--left">
	                <button type="button" class="drawer-toggle drawer-hamburger">
	                  <span class="sr-only">toggle navigation</span>
	                  <span class="drawer-hamburger-icon"></span>
	                </button>
	                <nav class="drawer-nav" role="navigation">
	                  <div class="drawer-menu">
	                      <!-- <h3><?php echo esc_attr_x( 'Navigate', 'newsdesk_theme' ) ?></h3> -->
	                    <?php
	                    if ( has_nav_menu( 'header-menu' ) ) {
	                      wp_nav_menu(array(
	                    	'theme_location' => 'header-menu',
							'menu_class'        => 'header-menu',
	                    ));
	                    } ?>
	                  </div>
	                  <span class="icon-close drawer-toggle"></span>
	                </nav>
                </div><!-- /.mobile-menu -->
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
                    <a class="lb icon-search2" href="#search"></a>
                    <div class="lb-btn"> 
                        <div class="lb-t" id="search">
                           <form role="search" method="get" class="mk-fullscreen-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		                      <label>
		                          <span class="text-above-search-bar"></span>
		                          <input type="search" class="search-field"
		                              placeholder="<?php echo esc_attr_x( 'Search...', 'label', 'amp_wp_theme' ) ?>"
		                              value="<?php echo esc_attr( get_search_query() ); ?>" name="s"
		                              title="<?php echo esc_attr_x( 'Search for:', 'label', 'amp_wp_theme' ) ?>" id="mk-fullscreen-search-input"/>
		                      </label>
		                      <label class="search-button search-overlay">
		                          <i class="fa fa-search" aria-hidden="true"></i>
		                      <input type="submit" class="search-submit"
		                          value="<?php echo esc_attr_x( '', 'label', 'amp_wp_theme' ) ?>" />
		                      </label>
		                      <!-- <div class="overlay-search"></div> -->
		                  </form>
                           <a class="lb-x" href="#"></a>
                        </div> 
                    </div>
                </div><!-- /.search -->
		    </div><!-- /.head -->
		</div><!-- /.container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
		<nav id="site-navigation" class="main-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'amp-wordpress-theme' ); ?></button>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'primary-menu',
				'menu_id'        => 'primary-menu',
			) );
		?>
	</nav><!-- #site-navigation -->
