<?php
/**
 * @desc Useful extras and custom functions
 * @link https://codex.wordpress.org/Function_Reference/
 */

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
