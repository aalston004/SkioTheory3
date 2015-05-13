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
<div>

     <header>
			<nav class="navbar navbar-default" role="navigation">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>

                      <a class="navbar-brand" href="<?php echo home_url(); ?>">
                                <?php bloginfo('name'); ?>
                            </a>
                    </div>

                       <?php /* Primary navigation */
                            wp_nav_menu( array(
                              'menu' => 'top_menu',
                              'depth' => 2,
                              'container' => false,
                              'menu_class' => 'nav',
                              //Process nav menu using our custom nav walker
                              'walker' => new wp_bootstrap_navwalker())
                            );
                            ?>
                    </div>
                </nav>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
