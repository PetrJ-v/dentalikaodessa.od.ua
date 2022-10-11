<?php
/**
 * dentalika functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dentalika
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

function switch_to_ua(){
	$url = $_SERVER['REQUEST_URI'];
	if (mb_stristr($url, "/ua/") == false) {
		$url = 'ua' . $url;
		$location = "Location: " . "https://dentalikaodessa.od.ua/" . $url;
		header($location, true, 301);
	}
}

add_action('init', 'language_setup', 1);

function language_setup(){

		if(!isset($_COOKIE['new_visitor'])) {
			// The cookie new_visitor is not set. Lets setup.
			setcookie( 'new_visitor', 'false', time() + (86400 * 30), '/' );
			setcookie( 'lang', 'UA', time() + (86400 * 30), '/' );
			switch_to_ua();
		}
};

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dentalika_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on dentalika, use a find and replace
		* to change 'dentalika' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dentalika', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'main_menu' => ' Меню главной страницы',
			'secondary_menu' => 'Вспомагательное меню',
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dentalika_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 257,
			'width'       => 72,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'dentalika_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dentalika_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dentalika_content_width', 640 );
}
add_action( 'after_setup_theme', 'dentalika_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function dentalika_scripts() {
	wp_enqueue_style( 'bootstrap-reboot', get_template_directory_uri() . '/accets/libs/bootstrap/dist/css/bootstrap-reboot.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/accets/libs/bootstrap/dist/css/bootstrap-grid.min.css', array('bootstrap-reboot'), _S_VERSION );
	wp_enqueue_style( 'hamburgers', get_template_directory_uri() . '/accets/libs/hamburgers/hamburgers.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/accets/libs/slick-carousel/slick.css', array(), _S_VERSION );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/accets/css/main.css', array('bootstrap-grid'), _S_VERSION );
	// wp_style_add_data( 'dentalika-style', 'rtl', 'replace' );
	// wp_enqueue_script( 'jquery', get_template_directory_uri() . '/accets/libs/jquery/jquery-3.6.0.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/accets/libs/slick-carousel/slick.min.js', array('jquery'), _S_VERSION, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/accets/js/main1-4.js', array('slick'), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'dentalika_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Disable unused default image sizez.
 */
add_filter( 'intermedate_image_sizes_advanced', 'true_remove_default_sizes' );

function true_remove_default_sizes( $sizes ) {
	unset( $sizes[ '1536x1536' ] );
	unset( $sizes[ '2048x2048' ] );
	return $sizes;
}

add_image_size( 'content', 1076, 1076, false );

add_filter('jpeg_quality', function($arg){return 95;});
function custom_length_excerpt($word_count_limit) {
	$content = wp_strip_all_tags(get_the_content() , true );
	echo wp_trim_words($content, $word_count_limit);
}
