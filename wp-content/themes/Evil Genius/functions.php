<?php 


// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 698;

//---------------------------------------------------------------------------------------------------------------------------------

// Register Theme Features
function add_theme_support()  {

    // load up the theme options
    require_once ( get_template_directory() . '/inc/theme-options.php' );
    
    // include theme hook alliance hooks
    require_once( get_template_directory() . '/inc/hooks.php' );
    
    // include bootstrap nav walker class
    require_once( get_template_directory() . '/inc/wp_bootstrap_navwalker.php' );
    
	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'gallery', 'image', 'video', 'audio', 'link', 'aside' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

	 // Set custom thumbnail dimensions
	set_post_thumbnail_size( 150, 150, true );

	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => '',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-background', $background_args );

	// Add theme support for Custom Header
	$header_args = array(
		'default-image'          => '',
		'width'                  => 250,
		'height'                 => 1140,
		'flex-width'             => false,
		'flex-height'            => true,
		'uploads'                => true,
		'random-default'         => true,
		'header-text'            => false,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => 'eg_admin_header_style',
		'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $header_args );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption' ) );

	// Add theme support for custom CSS in the TinyMCE visual editor
	add_editor_style();
}
// Hook into the 'after_setup_theme' action
add_action( 'after_setup_theme', 'add_theme_support' );

//-----------------------------------------------------------------------------------------------------------------------

// Register Navigation Menus
function nav_menus() {
	$locations = array(
		'Top' => __( 'main nav', 'evil_genius' ),
		'Footer' => __( 'footer nav', 'evil_genius' ),
	);
	register_nav_menus( $locations );
}
// Hook into the 'init' action
add_action( 'init', 'nav_menus' );


// Register Sidebar
function main_sidebar() {

	$args = array(
		'name'          => __( 'sidebar', 'evil_genius' ),
		'description'   => __( 'Main, widetized sidebar', 'evil_genius' ),
		'before_title'  => '<h3 class = "widgettitle">',
		'after_title'   => '</h3>',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
	);
	register_sidebar( $args );
}
// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'main_sidebar' );

//---------------------------------------------------------------------------------------------------------------------------------

// Register Script
function load_scripts1() {
    wp_register_script( 'jquery', 'http://code.jquery.com/jquery-2.1.4.min.js', false, '2.1.4', false );
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'bs', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, false );
	wp_enqueue_script( 'bs' );

	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', false, '2.8.3', false );
	wp_enqueue_script( 'modernizr' );
    }
// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'load_scripts1' );


// Register Style
function load_styles1() {
	wp_register_style( 'bs', get_template_directory_uri() . '/css/bootstrap.min.css', false, false );
	wp_enqueue_style( 'bs' );

    wp_enqueue_style('fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
}
// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'load_styles1' );

//----------------------------------------------------------------------------------------------------------------------------

// Call Googles HTML5 Shim, but only for users on old versions of IE
function wpfme_IEhtml5_shim () {
	global $is_IE;
	if ($is_IE)
	echo '<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
}
add_action('wp_head', 'wpfme_IEhtml5_shim');

// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');

// Obscure login screen error messages
function wpfme_login_obscure(){ return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';}
add_filter( 'login_errors', 'wpfme_login_obscure' );

// Disable the theme / plugin text editor in Admin
define('DISALLOW_FILE_EDIT', true);

?>