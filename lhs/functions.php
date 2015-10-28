<?php
/**
 * LHS functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LHS
 */

if ( ! function_exists( 'lhs_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lhs_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on LHS, use a find and replace
	 * to change 'lhs' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lhs', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	function register_my_menus() {
	  	register_nav_menus(
		    array(
		      'primary-menu' => __( 'Primary Menu' ),
		      'footer-menu' => __( 'Footer Menu' )
		    )
	  	);
	}
	add_action( 'init', 'register_my_menus' );

	// Reduce nav classes, leaving only 'current-menu-item'
	function nav_class_filter( $var ) {
		return is_array($var) ? array_intersect($var, array('current-menu-item', 'current-menu-parent', 'current-menu-ancestor')) : '';
	}
	add_filter('nav_menu_css_class', 'nav_class_filter', 100, 1);
	 
	// Add page slug as nav IDs
	function nav_id_filter( $id, $item ) {
		return 'nav-'.strtolower( str_replace( ' ','-',$item->title ) );
	}
	add_filter( 'nav_menu_item_id', 'nav_id_filter', 10, 2 );

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
	add_theme_support( 'custom-background', apply_filters( 'lhs_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // lhs_setup
add_action( 'after_setup_theme', 'lhs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lhs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lhs_content_width', 640 );
}
add_action( 'after_setup_theme', 'lhs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


function lhs_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lhs' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
        'name'          => __( 'footer-hq', 'lhs' ),
        'id'            => 'ft-hq',
        'description'   => 'Footer Headquartes Column',
        'before_widget' => '<aside id="ft-hq" class="ft-info">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="ft-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'footer-contact', 'lhs' ),
        'id'            => 'ft-contact',
        'description'   => 'Footer Contact Column',
        'before_widget' => '<aside id="ft-contact" class="ft-info">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="ft-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'lhs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lhs_scripts() {
	//load styles//
	wp_enqueue_style( 'bourbon-style', get_stylesheet_uri() );

	//load jquery//
	wp_deregister_script('jquery'); 
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3'); 
	wp_enqueue_script('jquery');

	//load nav//
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/nav.js', array(), '2015', true );

	wp_enqueue_script( 'lhs-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lhs_scripts' );

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
