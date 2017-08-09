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
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/scripts.min.js', false, filemtime( get_template_directory() . '/assets/scripts.min.js' ), true );
	wp_enqueue_script( 'main-js' );

}

add_action( 'wp_enqueue_scripts', 'head' );
add_action( 'wp_enqueue_scripts', 'footer' );


/**
 * @desc add defer to scripts.min.js
 */

function add_defer_attribute( $tag, $handle ) {
	if ( 'main-js' !== $handle ) {
		return $tag;
	}

	return str_replace( ' src', ' defer src', $tag );
}

add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );