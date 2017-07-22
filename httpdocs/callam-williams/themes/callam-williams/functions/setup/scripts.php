<?

function head() {

	wp_register_style( 'main', get_stylesheet_directory_uri() . '/assets/style.css', false, filemtime( get_stylesheet_directory() . '/assets/style.css' ) );
	wp_enqueue_style( 'main' );

}

function footer() {

	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
	}
	wp_deregister_script( 'wp-embed' );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/scripts.min.js#defer', false, filemtime( get_template_directory() . '/assets/scripts.min.js' ), true );
	wp_enqueue_script( 'main-js' );

}

add_action( 'wp_enqueue_scripts', 'head' );
add_action( 'wp_enqueue_scripts', 'footer' );


/**
 * @desc if you add #defer or #async at the end of a script source it will add that attribute to the script tag automatically
 */

function script_attributes( $url ) {

	if ( strpos( $url, '#' ) === false ) {
		return $url;
	} else {
		$hash = explode( "#", $url )[1];

		return str_replace( '#' . $hash, '', $url ) . "' $hash";
	}
}

add_filter( 'clean_url', 'script_attributes', 11, 1 );