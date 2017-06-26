<?php

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );

/**
 * Image Size wordpress documentation on function use:
 * @link https://developer.wordpress.org/reference/functions/add_image_size/
 */

function image_sizes() {
	add_image_size( 'banner', 1700 );
	add_image_size( 'background', 1540 );
	add_image_size( 'half', 760, 520);
	add_image_size( 'triple', 500, 555);
	add_image_size( 'card', 640, 430);
	add_image_size( 'card_row', 450, 800);
	add_image_size( 'logo', 490, 490 );

}

add_action( 'after_setup_theme', 'image_sizes' );

