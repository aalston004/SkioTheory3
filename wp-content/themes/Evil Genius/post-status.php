<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<time datetime=<?php the_time('Y-m-d'); ?>></time>

	<?php tha_entry_before(); ?>
	<section class="entry">
		<?php tha_entry_top(); ?>

		<?php the_content(__('Read more &raquo;','evil_genius')); ?>
		<?php get_template_part( 'parts/part', 'link-pages' ); ?>

		<?php tha_entry_bottom(); ?>
	</section>
	<?php tha_entry_after(); ?>

	<div class="icon icon-bullhorn pull-left" title="<?php _e( 'Status', 'evil_genius' ); ?>"></div><?php get_template_part( 'parts/part', 'micropostmeta' ); ?>

</article>