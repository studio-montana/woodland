<?php
/**
 * Woodland functions and definitions
 * @package WordPress
 * @subpackage Woodland
 * @since Woodland 1.0
 * @author Sébastien Chandonay www.seb-c.com / Cyril Tissot www.cyriltissot.com
 */

/**
 * Constantes
 */
define('WOODLAND_THEME_NAME', 'woodland');
define('WOODLAND_TEXT_DOMAIN', 'woodland');

define('WOODLAND_CSS_FOLDER', 'css/');
define('WOODLAND_JS_FOLDER', 'js/');
define('WOODLAND_LANG_FOLDER', 'lang/');

/**
 * Remove generator tag from html source code
*/
remove_action('wp_head', 'wp_generator');

/**
 * Woodland setup.
 *
 * @return void
*/
function woodland_setup() {
	/*
	 * Makes Woodland available for translation.
	*/
	load_theme_textdomain(WOODLAND_TEXT_DOMAIN, get_template_directory() . '/'.WOODLAND_LANG_FOLDER);

	/*
	 * Adds RSS feed links to <head> for posts and comments.
	*/
	add_theme_support('automatic-feed-links');

	/*
	 * Switches default core markup for search form, comment form, and comments to output valid HTML5.
	*/
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list') );

	/*
	 * This theme supports all available post formats by default. See http://codex.wordpress.org/Post_Formats
	*/
	add_theme_support('post-formats', array());

	/*
	 * This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menu('primary', __('Main menu', WOODLAND_TEXT_DOMAIN) );

	/*
	 * This theme uses a woodland image size for featured images, displayed on "standard" posts and pages.
	*/
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(1200, 300, true);
	add_image_size('post-content', 1200, 400, true);
}
add_action('after_setup_theme', 'woodland_setup');

/**
 * Enqueue scripts and styles for the front end.
 *
 * @return void
*/
function woodland_scripts_styles() {

	wp_enqueue_style('woodland-main-style', get_stylesheet_uri(), array('woodkit-core-slider-style'), '1.0');

	wp_enqueue_style('woodland-woodland-style', get_stylesheet_directory_uri().'/css/woodland.css', array('woodland-main-style'), '1.0');

	// Loads Internet Explorer specific stylesheet
	wp_enqueue_style('ie', get_stylesheet_directory_uri().'/css/ie.css', array('style'), '1.0');
	wp_style_add_data('ie', 'conditional', 'lt IE 9');

	// Loads Functions JavaScript file
	wp_enqueue_script('script-woodland-functions', get_stylesheet_directory_uri().'/js/functions.js', array('jquery'), '1.0', true);

}
add_action('woodkit_front_enqueue_styles_after', 'woodland_scripts_styles');

/**
 * Register widgets areas.
 *
 * @return void
*/
function woodland_widgets_init() {
	register_sidebar( array(
	'name'          => __('Sidebar', WOODLAND_TEXT_DOMAIN),
	'id'            => 'sidebar',
	'description'   => __('Shown in your site', WOODLAND_TEXT_DOMAIN),
	'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="widget-container">',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>',
	'after_widget'  => '</div></aside>',
	) );
}
add_action('widgets_init', 'woodland_widgets_init');