<?php
/**
 * Custom Posts wordpress documentation on function use:
 * @link https://codex.wordpress.org/Post_Types
 */


/**
 * @desc We will automatically set the permalink structure
 */

function prop_update_permalinks() {

	if ( get_option( 'permalink_structure' ) == '' ) {
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%' );
		$wp_rewrite->flush_rules();
	}

}

add_action( 'after_switch_theme', 'prop_update_permalinks' );

function my_theme_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/assets/src/css/tinymce.css' );
}

add_action( 'init', 'my_theme_add_editor_styles' );

/**
 * @desc Redirects search results from /?s=query to /search/query/
 * @link http://txfx.net/wordpress-plugins/nice-search/
 */

function redirect() {
	global $wp_rewrite;
	if ( ! isset( $wp_rewrite ) || ! is_object( $wp_rewrite ) || ! $wp_rewrite->get_search_permastruct() ) {
		return;
	}
	$search_base = $wp_rewrite->search_base;
	if ( is_search() && ! is_admin() && strpos( $_SERVER['REQUEST_URI'], "/{$search_base}/" ) === false && strpos( $_SERVER['REQUEST_URI'], '&' ) === false ) {
		wp_redirect( get_search_link() );
		exit();
	}
}

add_action( 'template_redirect', 'redirect' );
function rewrite( $url ) {
	return str_replace( '/?s=', '/search/', $url );
}

add_filter( 'wpseo_json_ld_search_url', 'rewrite' );

