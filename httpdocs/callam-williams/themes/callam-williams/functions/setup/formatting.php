<?php
/**
 * @desc Useful extras and custom functions
 * @link https://codex.wordpress.org/Function_Reference/
 */

/**
 * @desc Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 */

function wpdocs_excerpt_more( $more ) {

	return sprintf( '%2$s',

		get_permalink( get_the_ID() ),

		__( '...', 'wppt' )

	);
}

/**
 * @desc Get the excerpt and specify character limit
 * usage: get_excerpt(140);
 */


function get_excerpt($limit, $source = null){

    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    return $excerpt;
}

/**
 * @desc Add pagination bar, and include custom post types if needed
 */

function pagination_bar( $loop ) {

	$total_pages = $loop->max_num_pages;

	if ( $total_pages > 1 ) {
		$current_page = max( 1, get_query_var( 'paged' ) );

		echo paginate_links( [
			'base'    => get_pagenum_link( 1 ) . '%_%',
			'format'  => 'page/%#%',
			'current' => $current_page,
			'total'   => $total_pages,
		] );
	}
}

function add_custom_types( $query ) {

	$post_types = get_post_types();

	if ( is_tag() && $query->is_main_query() || $query->is_author() ) {

		$query->set( 'post_type', $post_types );

	}
}

add_filter( 'pre_get_posts', 'add_custom_types' );

/**
 * @desc Disable annoying responsive post images
 */
add_filter('xmlrpc_enabled', '__return_false');
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

//  We will automatically set the permalink structure  //

function prop_update_permalinks() {

	if (get_option('permalink_structure') == '') {
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure('/%postname%');
		$wp_rewrite->flush_rules();
	}

}

add_action( 'after_switch_theme', 'prop_update_permalinks' );

/*
 * Callback function to filter the MCE settings
 */

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}

// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

function my_mce_before_init_insert_formats($init_array) {
// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Small Font',
			'inline' => 'span',
			'classes' => 'font-small'
		),
		array(
			'title' => 'Medium Font',
			'inline' => 'span',
			'classes' => 'font-medium'
		),
		array(
			'title' => 'Large Font',
			'inline' => 'span',
			'classes' => 'font-large'
		),
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode($style_formats);
	return $init_array;
}

// Attach callback to 'tiny_mce_before_init'
add_filter('tiny_mce_before_init', 'my_mce_before_init_insert_formats');

function my_theme_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/assets/src/css/tinymce.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

/**
 * @desc make lowercase strip whitespace for dynamic classnames
 */

function sanitizeClassName($string) {
	return strtolower(str_replace(' ', '', $string));
}
