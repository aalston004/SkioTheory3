<?php

/**
 * Register theme settings
 * @since 0.4.0
 * @author Chris Reynolds
 * registers the settings
 */
if (!function_exists('ap_core_theme_options_init')) {
	function ap_core_theme_options_init() {
	    register_setting( 'AP_CORE_OPTIONS', 'ap_core_theme_options' );
	}
	add_action ( 'admin_init', 'ap_core_theme_options_init' );
}


/**
 * Use the theme customizer
 * @since 2.0.0
 * @author Chris Reynolds
 * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 * uses the customizer for all the settings
 */
if ( !function_exists( 'ap_core_theme_customizer_init' ) ) {

	function ap_core_theme_customizer_init( $wp_customize ) {

		$defaults = ap_core_get_theme_defaults();


	class AP_Core_Textarea_Control extends WP_Customize_Control {

		public $type = 'textarea';

		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<textarea rows="10" style="width:100%; font-family: monospace;" <?php $this->link(); ?>><?php echo esc_textarea( stripslashes_deep( $this->value() ) ); ?></textarea>
			</label>
			<?php
		}

	}

	class AP_Core_Legacy_CSS_Control extends WP_Customize_Control {

		public $type = 'ap-legacy-css';

		public function render_content() {

			$options = get_option( 'ap_core_theme_options' );

			if ( isset( $options['css'] ) && ( $options['css'] != '1' ) && ( $options['css'] != '' ) ) {
				echo '<div style="background-color: #fcf8e3; border: 1px solid #fbeed5; border-radius: 4px; padding: 2px 7px;"><label>';
				echo '<span class="customize-control-title">' . __( 'Custom CSS is no longer supported.', 'evil_genius' ) . '</span>';
				echo sprintf( _x( 'Museum Core no longer supports custom CSS. Please use %1$sMy Custom CSS%2$s or %3$sJetpack%2$s to add custom CSS to your site. Your Custom CSS is displayed below.', '1: link to My Custom CSS, 2: closing <a> tag, 3: link to Jetpack', 'evil_genius' ), '<a href="wordpress.org/plugins/my-custom-css/" target="_blank">', '</a>', '<a href="http://wordpress.org/plugins/jetpack" target="_blank">' );
				echo '</label>';
				echo '<pre style="overflow-x: scroll;">';
				echo $options['css'];
				echo '</pre>';
				echo '</div>';
				echo '<label>';
				echo '<input type="checkbox" value="" data-customize-setting-link="ap_core_theme_options[css]" /> ' . __( 'I\'ve copied my CSS. Dismiss this message.', 'evil_genius' );

				echo '</label>';
			}


		}

	}

		/* add sections */
		$wp_customize->add_section( 'ap_core_layout', array(

			'title' => __( 'Layout Options', 'evil_genius' ),
			'priority' => 35

		) );

		$wp_customize->add_section( 'ap_core_typography', array(

			'title' => __( 'Typography Options', 'evil_genius' ),
			'priority' => 36

		) );

		$wp_customize->add_section( 'ap_core_advanced', array(

			'title' => __( 'Advanced Settings', 'evil_genius' ),
			'priority' => 120

		) );


		/* add settings */

		// site title & tagline
		$wp_customize->add_setting( 'ap_core_theme_options[site-title]', array(

			'default' => $defaults['site-title'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		// layout options
		$wp_customize->add_setting( 'ap_core_theme_options[sidebar]', array(

			'default' => $defaults['sidebar'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[nav-menu]', array(

			'default' => $defaults['nav-menu'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[breadcrumbs]', array(

			'default' => $defaults['breadcrumbs'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[excerpts]', array(

			'default' => $defaults['excerpts'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );


		$wp_customize->add_setting( 'ap_core_theme_options[archive-excerpt]', array(

			'default' => $defaults['archive-excerpt'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[post-author]', array(

			'default' => $defaults['post-author'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		// typography options
		$wp_customize->add_setting( 'ap_core_theme_options[heading]', array(

			'default' => $defaults['heading'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[body]', array(

			'default' => $defaults['body'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[alt]', array(

			'default' => $defaults['alt'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[alth1]', array(

			'default' => $defaults['alth1'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[font_subset]', array(

			'default' => $defaults['font_subset'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		// colors
		$wp_customize->add_setting( 'ap_core_theme_options[font-color]', array(

			'default' => $defaults['font-color'],
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[link]', array(

			'default' => $defaults['link'],
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[hover]', array(

			'default' => $defaults['hover'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[content-color]', array(

			'default' => $defaults['content-color'],
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[navbar-color]', array(

			'default' => $defaults['navbar-color'],
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[navbar-inverse]', array(

			'default' => $defaults['navbar-inverse'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[navbar-link]', array(

			'default' => $defaults['navbar-link'],
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'type' => 'option'

		) );

		// advanced options
		$wp_customize->add_setting( 'ap_core_theme_options[author]', array(

			'default' => $defaults['author'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[footer]', array(

			'default' => $defaults['footer'],
			'capability' => 'edit_theme_options',
			'transport' => 'postMessage',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[favicon]', array(

			'default' => $defaults['favicon'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[presstrends]', array(

			'default' => $defaults['presstrends'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[generator]', array(

			'default' => $defaults['generator'],
			'capability' => 'edit_theme_options',
			'transport' => 'refresh',
			'type' => 'option'

		) );

		$wp_customize->add_setting( 'ap_core_theme_options[css]', array(

			'default' => '',
			'capability' => 'edit_theme_options',
			'type' => 'option'

		) );

		/* add controls */

		// site title & tagline
		$wp_customize->add_control( 'ap_core_theme_options[site-title]', array(

			'label' => __( 'Show site title?', 'evil_genius' ),
			'section' => 'title_tagline',
			'settings' => 'ap_core_theme_options[site-title]',
			'type' => 'select',
			'choices' => ap_core_true_false(),
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );

		// layout options
		$wp_customize->add_control( 'ap_core_theme_options[sidebar]', array(

			'label' => __( 'Sidebar', 'evil_genius' ),
			'section' => 'ap_core_layout',
			'settings' => 'ap_core_theme_options[sidebar]',
			'type' => 'select',
			'choices' => ap_core_sidebar(),
			'sanitize_callback' => 'ap_core_validate_sidebar'

		) );

		$wp_customize->add_control( 'ap_core_theme_options[nav-menu]', array(

			'label' => __( 'Fixed nav menu?', 'evil_genius' ),
			'section' => 'ap_core_layout',
			'settings' => 'ap_core_theme_options[nav-menu]',
			'type' => 'select',
			'choices' => ap_core_true_false(),
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );

		$wp_customize->add_control( 'ap_core_theme_options[breadcrumbs]', array(

			'label' => __( 'Enable breadcrumbs?', 'evil_genius' ),
			'section' => 'ap_core_layout',
			'settings' => 'ap_core_theme_options[breadcrumbs]',
			'type' => 'select',
			'choices' => ap_core_true_false(),
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );

		$wp_customize->add_control( 'ap_core_theme_options[excerpts]', array(

			'label' => __( 'Full posts or excerpts on blog home?', 'evil_genius' ),
			'section' => 'ap_core_layout',
			'settings' => 'ap_core_theme_options[excerpts]',
			'type' => 'select',
			'choices' => ap_core_show_excerpts(),
			'sanitize_callback' => 'ap_core_validate_excerpts'

		) );

		$wp_customize->add_control( 'ap_core_theme_options[archive-excerpt]', array(

			'label' => __( 'Full posts or excerpts on archive pages?', 'evil_genius' ),
			'section' => 'ap_core_layout',
			'settings' => 'ap_core_theme_options[archive-excerpt]',
			'type' => 'select',
			'choices' => ap_core_show_excerpts(),
			'sanitize_callback' => 'ap_core_validate_excerpts'

		) );

		$wp_customize->add_control( 'ap_core_theme_options[post-author]', array(

			'label' => __( 'Display post author?', 'evil_genius' ),
			'section' => 'ap_core_layout',
			'settings' => 'ap_core_theme_options[post-author]',
			'type' => 'select',
			'choices' => ap_core_true_false(),
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );


		// typography options
		$wp_customize->add_control( 'ap_core_theme_options[heading]', array(

			'label' => __( 'Heading Font', 'evil_genius' ),
			'section' => 'ap_core_typography',
			'settings' => 'ap_core_theme_options[heading]',
			'type' => 'select',
			'choices' => ap_core_fonts(),
			'sanitize_callback' => 'ap_core_validate_fonts'

		) );

		$wp_customize->add_control( 'ap_core_theme_options[body]', array(

			'label' => __( 'Body Font', 'evil_genius' ),
			'section' => 'ap_core_typography',
			'settings' => 'ap_core_theme_options[body]',
			'type' => 'select',
			'choices' => ap_core_fonts(),
			'sanitize_callback' => 'ap_core_validate_fonts'

		) );

		$wp_customize->add_control( 'ap_core_theme_options[alt]', array(

			'label' => __( 'Alternate Font', 'evil_genius' ),
			'section' => 'ap_core_typography',
			'settings' => 'ap_core_theme_options[alt]',
			'type' => 'select',
			'choices' => ap_core_fonts(),
			'sanitize_callback' => 'ap_core_validate_fonts'

		) );

		$wp_customize->add_control( 'ap_core_theme_options[alth1]', array(

			'label' => __( 'Use alternate font for site title?', 'evil_genius' ),
			'section' => 'ap_core_typography',
			'settings' => 'ap_core_theme_options[alth1]',
			'type' => 'select',
			'choices' => ap_core_true_false(),
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );

		$wp_customize->add_control( 'ap_core_theme_options[font_subset]', array(

			'label' => __( 'Font Subset', 'evil_genius' ),
			'section' => 'ap_core_typography',
			'settings' => 'ap_core_theme_options[font_subset]',
			'type' => 'select',
			'choices' => ap_core_font_subset(),
			'sanitize_callback' => 'ap_core_validate_subset'

		) );

		// colors
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ap_core_theme_options[font-color]', array(

			'label' => __( 'Font Color', 'evil_genius' ),
			'section' => 'colors',
			'settings' => 'ap_core_theme_options[font-color]',
			'sanitize_callback' => 'sanitize_hex_color'

		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ap_core_theme_options[link]', array(

			'label' => __( 'Link Color', 'evil_genius' ),
			'section' => 'colors',
			'settings' => 'ap_core_theme_options[link]',
			'sanitize_callback' => 'sanitize_hex_color'

		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ap_core_theme_options[hover]', array(

			'label' => __( 'Hover Color', 'evil_genius' ),
			'section' => 'colors',
			'settings' => 'ap_core_theme_options[hover]',
			'sanitize_callback' => 'sanitize_hex_color'

		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ap_core_theme_options[content-color]', array(

			'label' => __( 'Content Background color', 'evil_genius' ),
			'section' => 'colors',
			'settings' => 'ap_core_theme_options[content-color]',
			'sanitize_callback' => 'sanitize_hex_color'

		) ) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ap_core_theme_options[navbar-color]', array(

			'label' => __( 'Navbar (top) Background Color', 'evil_genius' ),
			'section' => 'colors',
			'settings' => 'ap_core_theme_options[navbar-color]',
			'sanitize_callback' => 'sanitize_hex_color'

		) ) );

		$wp_customize->add_control( 'ap_core_theme_options[navbar-inverse]', array(

			'label' => __( 'Inverted navbar?', 'evil_genius' ),
			'section' => 'colors',
			'settings' => 'ap_core_theme_options[navbar-inverse]',
			'type' => 'select',
			'choices' => ap_core_true_false(),
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ap_core_theme_options[navbar-link]', array(

			'label' => __( 'Navbar Link Color', 'evil_genius' ),
			'section' => 'colors',
			'settings' => 'ap_core_theme_options[navbar-link]',
			'sanitize_callback' => 'sanitize_hex_color'

		) ) );

		// advanced options
		$wp_customize->add_control( 'ap_core_theme_options[author]', array(

			'label' => __( 'Use author meta tags?', 'evil_genius' ),
			'section' => 'ap_core_advanced',
			'settings' => 'ap_core_theme_options[author]',
			'type' => 'select',
			'choices' => ap_core_true_false(),
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );

		$wp_customize->add_control( new AP_Core_Textarea_Control( $wp_customize, 'ap_core_theme_options[footer]', array(

			'label' => __( 'Footer Text', 'evil_genius' ),
			'section' => 'ap_core_advanced',
			'settings' => 'ap_core_theme_options[footer]',
			'type' => 'textarea',
			'sanitize_callback' => 'esc_textarea'

		) ) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ap_core_theme_options[favicon]', array(

			'label' => __( 'Custom Favicon', 'evil_genius' ),
			'section' => 'ap_core_advanced',
			'settings' => 'ap_core_theme_options[favicon]',
			'sanitize_callback' => 'ap_core_validate_favicon'

		) ) );

		$wp_customize->add_control( 'ap_core_theme_options[presstrends]', array(

			'label' => __( 'Send usage data?', 'evil_genius' ),
			'section' => 'ap_core_advanced',
			'settings' => 'ap_core_theme_options[presstrends]',
			'type' => 'select',
			'choices' => ap_core_true_false(),
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );

		$wp_customize->add_control( 'ap_core_theme_options[generator]', array(

			'label' => __( 'Debug Mode Active', 'evil_genius' ),
			'section' => 'ap_core_advanced',
			'settings' => 'ap_core_theme_options[generator]',
			'type' => 'select',
			'choices' => ap_core_true_false(),
			'sanitize_callback' => 'ap_core_validate_true_false'

		) );

		$wp_customize->add_control( new AP_Core_Legacy_CSS_Control( $wp_customize, 'ap_core_theme_options[css]', array(

			'section' => 'ap_core_advanced',
			'settings' => 'ap_core_theme_options[css]'

		) ) );

		// adds live refresh on site title and tagline
		$wp_customize->get_setting('blogname')->transport='postMessage';
		$wp_customize->get_setting('blogdescription')->transport='postMessage';

		// adds live refresh business
		if ( $wp_customize->is_preview() && ! is_admin() )
    		add_action( 'wp_footer', 'ap_core_customize_preview', 21);

	}
	add_action( 'customize_register', 'ap_core_theme_customizer_init' );

}

/**
 * Customize preview
 * @since 2.0.0
 * @author Chris Reynolds
 * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
 * makes live-refreshing settings live refresh
 */
if ( !function_exists( 'ap_core_customize_preview' ) ) {

	function ap_core_customize_preview() {
		?>
		<script type="text/javascript">
			( function( $ ){
				wp.customize('ap_core_theme_options[footer]',function( value ) {
					value.bind(function(to) {
						$('footer .credit').html(to);
					});
				});
				wp.customize('blogname',function( value ) {
					value.bind(function(to) {
						$('.siteinfo h2').html(to);
					});
				});
				wp.customize('blogdescription',function( value ) {
					value.bind(function(to) {
						$('.siteinfo h3').html(to);
					});
				});
				wp.customize('ap_core_theme_options[font-color]',function( value ) {
					value.bind(function(to) {
						$('body').css('color', to ? to : '');
					});
				});
				wp.customize('ap_core_theme_options[link]',function( value ) {
					value.bind(function(to) {
						$('.content a, .sidebar a').css('color', to ? to : '');
					});
				});
				wp.customize('ap_core_theme_options[content-color]',function( value ) {
					value.bind(function(to) {
						$('.container').css('background', to ? to : '');
					});
				});
				wp.customize('ap_core_theme_options[navbar-color]',function( value ) {
					value.bind(function(to) {
						$('.topnav').css('background', to ? to : '');
					});
				});
				wp.customize('ap_core_theme_options[navbar-link]',function( value ) {
					value.bind(function(to) {
						$('.topnav .navbar-nav>li>a').css('color', to ? to : '');
					});
				});
			} )( jQuery )
		</script>
		<?php
	}

}

// Start of PressTrends Magic
if (!function_exists('ap_core_presstrends')) {
	function ap_core_presstrends() {

	// PressTrends Account API Key
	$api_key = 'i93727o4eba1lujhti5bjgiwfmln5xm5o0iv';
	$plugin_name = ''; // sets the plugin_name varible with something to fix that not defined error...

	// Start of Metrics
	global $wpdb;
	$data = get_transient( 'presstrends_data' );
	if (!$data || $data == ''){
	$api_base = 'http://api.presstrends.io/index.php/api/sites/update/api/';
	$url = $api_base . $api_key . '/';
	$data = array();
	$count_posts = wp_count_posts();
	$count_pages = wp_count_posts('page');
	$comments_count = wp_count_comments();
	$theme_data = get_theme_data(get_stylesheet_directory() . '/style.css');
	$plugin_count = count(get_option('active_plugins'));
	$all_plugins = get_plugins();
	foreach($all_plugins as $plugin_file => $plugin_data) {
	$plugin_name .= $plugin_data['Name'];
	$plugin_name .= '&';}
	$posts_with_comments = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}posts WHERE post_type='post' AND comment_count > 0");
	$comments_to_posts = number_format(($posts_with_comments / $count_posts->publish) * 100, 0, '.', '');
	$pingback_result = $wpdb->get_var('SELECT COUNT(comment_ID) FROM '.$wpdb->comments.' WHERE comment_type = "pingback"');
	$data['url'] = stripslashes(str_replace(array('http://', '/', ':' ), '', site_url()));
	$data['posts'] = $count_posts->publish;
	$data['pages'] = $count_pages->publish;
	$data['comments'] = $comments_count->total_comments;
	$data['approved'] = $comments_count->approved;
	$data['spam'] = $comments_count->spam;
	$data['pingbacks'] = $pingback_result;
	$data['post_conversion'] = $comments_to_posts;
	$data['theme_version'] = $theme_data['Version'];
	$data['theme_name'] = $theme_data['Name'];
	$data['site_name'] = str_replace( ' ', '', get_bloginfo( 'name' ));
	$data['plugins'] = $plugin_count;
	$data['plugin'] = urlencode($plugin_name);
	$data['wpversion'] = get_bloginfo('version');
	foreach ( $data as $k => $v ) {
	$url .= $k . '/' . $v . '/';}
	$response = wp_remote_get( $url );
	set_transient('presstrends_data', $data, 60*60*24);}
	}

	$options = get_option( 'ap_core_theme_options' );
	if ( $options['presstrends'] == true ) {
	add_action('admin_init', 'ap_core_presstrends');
	}
}

/**
 * Validate true/false
 * @since 2.0.0
 * @author Chris Reynolds
 * @link http://themeshaper.com/2013/04/29/validation-sanitization-in-customizer/
 */
function ap_core_validate_true_false( $value ) {
	if ( ! array_key_exists( $value, ap_core_true_false() ) )
		$value = null;

	return $value;
}

/**
 * Validate font options
 * @since 2.0.0
 * @author Chris Reynolds
 * @link http://themeshaper.com/2013/04/29/validation-sanitization-in-customizer/
 */
function ap_core_validate_fonts( $value ) {
	if ( ! array_key_exists( $value, ap_core_fonts() ) )
		$value = null;

	return $value;
}

/**
 * Validate excerpts options
 * @since 2.0.0
 * @author Chris Reynolds
 * @link http://themeshaper.com/2013/04/29/validation-sanitization-in-customizer/
 */
function ap_core_validate_excerpts( $value ) {
	if ( !array_key_exists( $value, ap_core_show_excerpts() ) )
		$value = null;

	return $value;
}

/**
 * Validate sidebar options
 * @since 2.0.0
 * @author Chris Reynolds
 * @link http://themeshaper.com/2013/04/29/validation-sanitization-in-customizer/
 */
function ap_core_validate_sidebar( $value ) {
	if ( !array_key_exists( $value, ap_core_sidebar() ) )
		$value = null;

	return $value;
}

/**
 * Validate font subset
 * @since 2.0.0
 * @author Chris Reynolds
 * @link http://themeshaper.com/2013/04/29/validation-sanitization-in-customizer/
 */
function ap_core_validate_subset( $value ) {
	if ( !array_key_exists( $value, ap_core_font_subsets() ) )
		$value = null;

	return $value;
}

/**
 * Validate favicon
 * @since 0.4.0
 * @author Chris Reynolds
 * @link http://themeshaper.com/2013/04/29/validation-sanitization-in-customizer/
 */
function ap_core_validate_favicon( $value ) {

	define('TYPE_WHITELIST', serialize(array(
		'image/jpeg',
		'image/jpg',
		'image/png',
		'image/gif',
		'image/ico'
	)));

	if ( isset( $value['favicon'] ) ) {
		$favicon = $value['favicon'];
		$favicon = getimagesize($favicon);
		if (in_array($favicon['mime'], unserialize(TYPE_WHITELIST))) {
			$value['favicon'] = esc_url_raw( $value['favicon'] );
		} else {
			$value['favicon'] = null;
		}
	}

    return $value;
}