<?php
/*
	default page template
*/
get_header();
tha_content_before();
$ap_core_content = ap_core_get_which_content(); ?>
<div class="content col-md-9 <?php echo $ap_core_content; ?>">
	<?php tha_content_top(); ?>

	<?php get_template_part('parts/content', 'page'); ?>

	<?php tha_content_bottom(); ?>
</div>
<?php tha_content_after();?>
<?php get_footer(); ?>