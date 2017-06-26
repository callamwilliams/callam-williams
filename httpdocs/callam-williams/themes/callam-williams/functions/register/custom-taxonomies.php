<?php

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //

//  This file creates any custom taxonomies we need for our theme. Get started
//  by un-commenting everything below, and customizing the taxonomy to suit.

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //

function create_prop_taxonomies() {


	register_taxonomy(
		'Services', //  Your taxonomy title  //
		'services',   //  The Custom Post Type it will belong to  //
		array(
			'hierarchical' => true,
			'label'        => 'Services',
			'query_var'    => true,
			'rewrite'      => array( 'slug' => 'services' )
		)
	);
	register_taxonomy(
		'Clients', //  Your taxonomy title  //
		'clients',   //  The Custom Post Type it will belong to  //
		array(
			'hierarchical' => true,
			'label'        => 'Clients',
			'query_var'    => true,
			'rewrite'      => array( 'slug' => 'clients' )
		)
	);
//  Add the next taxonomy here  //

	flush_rewrite_rules();
}

add_action( 'init', 'create_prop_taxonomies' );