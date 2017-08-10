<?php

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //

//  This file creates any custom taxonomies we need for our theme. Get started
//  by un-commenting everything below, and customizing the taxonomy to suit.

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //

function create_taxonomies() {


	register_taxonomy(
		'Projects', //  Your taxonomy title  //
		'projects',   //  The Custom Post Type it will belong to  //
		array(
			'hierarchical' => true,
			'label'        => 'All Projects',
			'query_var'    => true,
			'rewrite'      => array( 'slug' => 'all-projects' )
		)
	);

}

add_action( 'init', 'create_taxonomies' );