<?php

// =============================================
// Add title meta support
// =============================================

add_theme_support( 'title-tag' );


// =============================================
// Add post thumbnail support
// =============================================

add_theme_support( 'post-thumbnails' );


// =============================================
// Add oembed for codepen
// =============================================

wp_oembed_add_provider('http://codepen.io/*/pen/*', 'http://codepen.io/api/oembed');


// =============================================
// Register a main nav
// =============================================

register_nav_menus( array(
	'primary' => esc_html__( 'Primary', 'color-block' ),
  'social' => esc_html__( 'Social', 'color-block' ),
  'footer' => esc_html__( 'Footer', 'color-block' )
) );


// =============================================
// Disable emojicons
// =============================================

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}
add_action( 'init', 'disable_wp_emojicons' );


// =============================================
// Disable various embeds
// =============================================

function disable_embeds_init() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}

add_action('init', 'disable_embeds_init', 9999);


// =============================================
// Clean up menu classes
// =============================================

add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);

function my_css_attributes_filter($var) {
	return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
}


// =============================================
// Adds classes for custom post types
// to body_class() and post_class()
// =============================================

function fb_add_body_class( $class ) {
	$post_type = 'photography'; // the Post Type

	if ( get_query_var('post_type') === $post_type ) { // only, if post type is active
		$class[] = $post_type;
		//$class[] = 'type-' . $post_type;
	}

	return $class;
}
add_filter( 'body_class', 'fb_add_body_class' );