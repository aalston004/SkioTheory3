<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package mAAd Villain
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
            <?php endwhile; // end of the loop. ?>

		</div><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
