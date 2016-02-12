<?php
/**
 * maxifier functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package maxifier
 */

if ( ! function_exists( 'maxifier_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function maxifier_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on maxifier, use a find and replace
	 * to change 'maxifier' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'maxifier', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'large-thumb', 750, 550, true );
	add_image_size( 'index-thumb', 350, 150, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'maxifier' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'maxifier_custom_background_args', array(
		'default-color' => 'b4b7b8',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'maxifier_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function maxifier_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'maxifier_content_width', 900 );
}
add_action( 'after_setup_theme', 'maxifier_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function maxifier_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'maxifier' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'maxifier' ),
		'description'	=> 'Sidebar lies at the footer section',
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'maxifier_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function maxifier_scripts() {
	wp_enqueue_style( 'maxifier-style', get_stylesheet_uri() );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,900italic,900,700italic,700,500italic,500,400italic,300italic,300,100italic,100&subset=latin,latin-ext,cyrillic,vietnamese,cyrillic-ext,greek-ext,greek' );
	wp_enqueue_style('fontawesome-icons', get_template_directory_uri() . "custom-assets/css/font-awesome.min.css");
	wp_enqueue_style('sidr-dark', get_template_directory_uri() . "/custom_assets/css/jquery.sidr.dark.css");
	// custom-maxifier theme style sheets
	wp_enqueue_style( 'maxifier-main-style', get_template_directory_uri() . '/custom_assets/css/main.css' );

//	wp_enqueue_script( 'jquery', 'http://code.jquery.com/jquery.min.js', array(), '20160301', true );
	// http://deelay.me/1000/ ---> for creating a fake delay in page loading
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.4.js', array(), '020104', true );
	wp_enqueue_script( 'modernizr', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js', array(), '2.8.2', true );

	wp_enqueue_script( 'sidr', get_template_directory_uri() . '/js/sidr/jquery.sidr.min.js', array(), '20160301', true );

	wp_enqueue_script( 'general-js-settings', get_template_directory_uri() . '/js/settings.js', array('jquery'), '20160301', true );

	wp_enqueue_script( 'maxifier-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'maxifier-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'maxifier-masonry', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20150401', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'maxifier_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*****************************
 * CUSTOM FUNCTIONs
******************************/
function custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );