<?php

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //

//  This file creates any custom post types we need for our theme. Get started
//  by un-commenting everything below, and customizing the cpt to suit.

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //

function create_prop_post_types() {

	register_post_type( 'menu',

		array(

			//  What will the CPT be known as?  //
			'labels'                => array(
				'name'               => _x( 'Menus', 'propeller' ),
				'singular_name'      => _x( 'Menus', 'propeller' ),
				'menu_name'          => _x( 'Menus', 'propeller' ),
				'name_admin_bar'     => _x( 'Menus', 'propeller' ),
				'add_new'            => _x( 'Add New', 'propeller' ),
				'add_new_item'       => __( 'Add New Menu', 'propeller' ),
				'new_item'           => __( 'New Menu', 'propeller' ),
				'edit_item'          => __( 'Edit Menu', 'propeller' ),
				'view_item'          => __( 'View Menu', 'propeller' ),
				'all_items'          => __( 'All Menus', 'propeller' ),
				'search_items'       => __( 'Search Menus', 'propeller' ),
				'parent_item_colon'  => __( 'Parent Menu:', 'propeller' ),
				'not_found'          => __( 'No Menus found.', 'propeller' ),
				'not_found_in_trash' => __( 'No Menus found in Trash.', 'propeller' )
			),

			//  Settings - how will the CPT behave?  //
			'public'                => true,
			'show_ui'               => true,
			'publicly_queryable'    => true,
			'rewrite'               => array( 'slug' => 'menu' ),
			'exclude_from_search'   => true,
			'capability_type'       => 'post',
			'has_archive'           => false,
			'menu_icon'             => 'dashicons-carrot',
			'menu_position'         => 18,
			'show_in_rest'          => true,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'show_in_nav_menus'     => true,

			//  Which Taxonomies will be applicable?  //
			'taxonomies'            => array(
				'Menus'
			),

		)
	);


	//  Register any additional CPTs here  //

	flush_rewrite_rules();

}

add_action( 'init', 'create_prop_post_types' );

