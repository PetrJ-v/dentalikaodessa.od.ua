<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package dentalika
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dentalika_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'dentalika_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function dentalika_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'dentalika_pingback_header' );

add_action("wp_ajax_get_contacts_popup", "load_contacts_popup");
add_action("wp_ajax_nopriv_get_contacts_popup", "load_contacts_popup");

function load_contacts_popup() {
	$html = '';
	$html .= get_template_part("template-parts/sign-popup");
	die($html);
}
