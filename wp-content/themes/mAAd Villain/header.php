<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package mAAd Villain
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title(' | ', TRUE, 'right'); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <header>
			<nav id="site-navigation" class="main-navigation" role="navigation">
			    <h1 class="menu-toggle"><?php _e( 'Primary Menu', 'maad-villain' ); ?></h1>
                <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to Content','maad-villain'); ?></a>

			    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		    </nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
