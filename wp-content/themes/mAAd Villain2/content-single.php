<?php
/**
 * @package mAAd Villain
 */
?>

		<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'maad-villain' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

