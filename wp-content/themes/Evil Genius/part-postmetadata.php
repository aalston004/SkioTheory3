<section class="postmetadata clearfix">
	<?php
		if ( !is_page() ) {
			$options = get_option( 'ap_core_theme_options' );

			$time = '<time datetime=' . get_the_time('Y-m-d') . '>' . get_the_time('j F Y') . '</time>';
	    	$categories = get_the_category_list( __(', ', 'evil_genius') );
			$tags = get_the_tag_list( __('and tagged ', 'evil_genius'),', ' );
			$author_name = get_the_author_meta('display_name');
			$author_ID = get_the_author_meta('ID');
			$author_link = '<a href="' . get_author_posts_url($author_ID) . '">' . $author_name . '</a>';
			$author = sprintf( __( 'by %s', 'evil_genius' ), $author_link );
			if ( $options['post-author'] ) {
				if ( is_singular() ) {
					$postmeta = __('Posted in %1$s on %2$s %3$s %4$s', 'evil_genius');
				} elseif ( 'chat' == get_post_format() ) {
					$postmeta = __( 'Filed under %1$s %2$s %3$s', 'evil_genius' );
				} elseif ( 'gallery' == get_post_format() || 'image' == get_post_format() ) {
					$postmeta = __( 'Displayed in %1$s %2$s %3$s', 'evil_genius' );
				} else {
					$postmeta = __('Posted in %1$s %2$s %3$s', 'evil_genius');
				}
			} else {
				if ( is_singular() ) {
					$postmeta = __('Posted in %1$s on %2$s %3$s', 'evil_genius');
				} elseif ( 'chat' == get_post_format() ) {
					$postmeta = __( 'Filed under %1$s %2$s', 'evil_genius' );
				} elseif ( 'gallery' == get_post_format() || 'image' == get_post_format() ) {
					$postmeta = __( 'Displayed in %1$s %2$s', 'evil_genius' );
				} else {
					$postmeta = __('Posted in %1$s %2$s', 'evil_genius');
				}
			}
			if ( is_singular() ) {
				printf( $postmeta, $categories, $time, $tags, $author );
			} else {
				printf( $postmeta, $categories, $tags, $author );
			}
		?>
		<br />
	    <?php comments_popup_link(__('No Comments &#187;','evil_genius'), __('One Comment &#187;','evil_genius'), __('% Comments &#187;','evil_genius')); ?>
    <?php }
    if ( is_singular() || is_page() ) { ?>
    	<p><?php edit_post_link(__('Edit this entry','evil_genius'),'','.'); ?></p>
	<?php } ?>
</section>