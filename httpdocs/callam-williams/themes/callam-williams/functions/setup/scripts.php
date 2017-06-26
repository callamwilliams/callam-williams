<?

// Async load
function async_scripts( $url ) {
	if ( strpos( $url, '#asyncload' ) === false ) {
		return $url;
	} else if ( is_admin() ) {
		return str_replace( '#asyncload', '', $url );
	} else {
		return str_replace( '#asyncload', '', $url ) . "' async='async";
	}
}

add_filter( 'clean_url', 'async_scripts', 11, 1 );

// Async load
function defer_scripts( $url ) {
	if ( strpos( $url, '#deferload' ) === false ) {
		return $url;
	} else if ( is_admin() ) {
		return str_replace( '#deferload', '', $url );
	} else {
		return str_replace( '#deferload', '', $url ) . "' defer";
	}
}

add_filter( 'clean_url', 'defer_scripts', 11, 1 );

function head() {

	wp_register_style( 'main', get_stylesheet_directory_uri() . '/assets/style.css' );
	wp_enqueue_style( 'main' );

	wp_register_script( 'modernizr', get_template_directory_uri() . '/assets/src/js/vendor/modernizr.min.js#asyncload', null, null, true );
	wp_enqueue_script( 'modernizr' );

}

function footer() {

	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
	}
	wp_deregister_script( 'wp-embed' );
	wp_register_script( 'main-js', get_template_directory_uri() . '/assets/scripts.min.js#deferload', [], null, true );
	wp_enqueue_script( 'main-js' );

}

add_action( 'wp_enqueue_scripts', 'head' );
add_action( 'wp_enqueue_scripts', 'footer' );