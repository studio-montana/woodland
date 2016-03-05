<?php
/**
 Theme Name: Woodland
 Theme URI: http://lab.studio-montana.com/woodland-theme/
 Author: Studio Montana (Sébastien Chandonay / Cyril Tissot)
 Author URI: http://www.studio-montana.com
 License: GNU General Public License v2 or later
 License URI: http://www.gnu.org/licenses/gpl-2.0.html

 This theme, like WordPress, is licensed under the GPL.
 Use it to make something cool, have fun, and share what you've learned with others.
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

	$main_style_dependecies = array();
	if (class_exists('Woodkit')) // Woodkit plugin support
		$main_style_dependecies[] = 'woodkit-core-slider-style';
	wp_enqueue_style('woodland-main-style', get_stylesheet_uri(), $main_style_dependecies, '1.0');

	wp_enqueue_style('woodland-woodland-style', get_template_directory_uri().'/css/woodland.css', array('woodland-main-style'), '1.0');

	// Loads Internet Explorer specific stylesheet
	wp_enqueue_style('ie', get_template_directory_uri().'/css/ie.css', array('style'), '1.0');
	wp_style_add_data('ie', 'conditional', 'lt IE 9');

	// Loads Functions JavaScript file
	wp_enqueue_script('script-woodland-functions', get_template_directory_uri().'/js/functions.js', array('jquery'), '1.0', true);
	if (is_multisite()){
		$home_url = get_site_url(BLOG_ID_CURRENT_SITE);
		$home_minisite_url = get_site_url(get_current_blog_id());
	}else{
		$home_url = home_url('/');
		$home_minisite_url = "";
	}
	$id_blog_page = get_option('page_for_posts');
	if (!empty($id_blog_page) && is_numeric($id_blog_page)){
		$blog_url = get_permalink($id_blog_page);
	}else{
		$blog_url = "";
	}
	if (is_single() && get_post_type() == 'post'){
		$is_post = "1";
	}else{
		$is_post = "0";
	}
	$current_url = get_current_url();
	wp_localize_script('script-woodland-functions', 'Woodland', array(
	'current_url' => $current_url,
	'home_url' => $home_url,
	'home_minisite_url' => $home_minisite_url,
	'blog_url' => $blog_url,
	'is_post' => $is_post
	));

}
if (class_exists('Woodkit')) // Woodkit plugin support
	add_action('woodkit_front_enqueue_styles_after', 'woodland_scripts_styles');
else
	add_action('wp_enqueue_scripts', 'woodland_scripts_styles');

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

if (!class_exists('Woodkit') && !function_exists("get_current_url")):
/**
 * get the current URL
*/
function get_current_url($with_parameters = false){
	if ($with_parameters){
		$protocol = get_protocol();
		return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}else{
		$uri_parts = explode('?', $_SERVER['REQUEST_URI']);
		$protocol = get_protocol();
		return $protocol . $_SERVER['HTTP_HOST'] . $uri_parts[0];
	}
}
endif;

if (!class_exists('Woodkit') && !function_exists("get_protocol")):
/**
 * get the current Protocol (http || https)
*/
function get_protocol(){
	if (isset($_SERVER['HTTPS']) &&
			($_SERVER['HTTPS'] == ‘on’ || $_SERVER['HTTPS'] == 1) ||
			isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
			$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
		$protocol = 'https://';
	}
	else {
		$protocol = 'http://';
	}
	return $protocol;
}
endif;

if (!function_exists('woodland_entry_meta') ) :
/**
 * Woodkit entry-meta
*
* @since Woodkit 1.0
* @return void
*/
function woodland_entry_meta() {
	if (is_sticky() && is_home() && ! is_paged())
		echo '<span class="featured-post">' . __('Sticky', WOODLAND_TEXT_DOMAIN) . '</span>';

	if (!has_post_format('link') && 'post' == get_post_type() )
		woodland_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __(', ', WOODLAND_TEXT_DOMAIN));
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list('', __(', ', WOODLAND_TEXT_DOMAIN) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ('post' == get_post_type() ) {
		printf('<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta('ID') ) ),
		esc_attr( sprintf( __('View all posts by %s', WOODLAND_TEXT_DOMAIN), get_the_author() ) ),
		get_the_author()
		);
	}
}
endif;

if (!function_exists('woodland_entry_date')) :
/**
 * Woodkit entry-date
*
* @since Woodkit 1.0
* @return void
*/
function woodland_entry_date($echo = true) {
	if (has_post_format( array('chat', 'status')))
		$format_prefix = _x('%1$s on %2$s', '1: post format name. 2: date', WOODLAND_TEXT_DOMAIN);
	else
		$format_prefix = '%2$s';

	$date = sprintf('<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
			esc_url( get_permalink() ),
			esc_attr( sprintf( __('Permalink to %s', WOODLAND_TEXT_DOMAIN), the_title_attribute('echo=0') ) ),
			esc_attr( get_the_date('c') ),
			esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;