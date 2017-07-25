<?php

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );

/**
 * Image Size wordpress documentation on function use:
 * @link https://developer.wordpress.org/reference/functions/add_image_size/
 */

function image_sizes() {
	add_image_size( 'banner', 1840 );
	add_image_size( 'background', 1540 );
	add_image_size( 'card', 620 );

}

add_action( 'after_setup_theme', 'image_sizes' );


/**
 * @desc Disable annoying responsive post images
 */

add_filter( 'xmlrpc_enabled', '__return_false' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );

	return $html;
}

