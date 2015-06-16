<?php
/*
	This is the 404 error template
*/
get_header();
tha_content_before();
$ap_core_content = ap_core_get_which_content(); ?>
<div class="content col-md-9 <?php echo $ap_core_content; ?>">
	<?php tha_content_top(); ?>
	<article class="post">

		<h2 class="the_title"><?php _e('Couldn\'t find the page you were looking for.','evil_genius'); ?> <span frown>:(</span></h2>

	</article>
	<?php tha_content_bottom(); ?>
</div>
<?php tha_content_after(); ?>
<?php get_footer(); ?>