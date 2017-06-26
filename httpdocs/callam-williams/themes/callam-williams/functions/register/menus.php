<?php

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //

//  Register navigation menus for our theme.

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //

function register_prop_menus() {

	register_nav_menus(

		array(

			'left-navigation'  => __( 'Left Navigation' ),
			'right-navigation' => __( 'Right Navigation' )
		)

	);

}

add_action( 'init', 'register_prop_menus' );
