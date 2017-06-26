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
				'name'               => _x( 'Menus', 'burke-clemens' ),
				'singular_name'      => _x( 'Menus', 'burke-clemens' ),
				'menu_name'          => _x( 'Menus', 'burke-clemens' ),
				'name_admin_bar'     => _x( 'Menus', 'burke-clemens' ),
				'add_new'            => _x( 'Add New', 'burke-clemens' ),
				'add_new_item'       => __( 'Add New Menu', 'burke-clemens' ),
				'new_item'           => __( 'New Menu', 'burke-clemens' ),
				'edit_item'          => __( 'Edit Menu', 'burke-clemens' ),
				'view_item'          => __( 'View Menu', 'burke-clemens' ),
				'all_items'          => __( 'All Menus', 'burke-clemens' ),
				'search_items'       => __( 'Search Menus', 'burke-clemens' ),
				'parent_item_colon'  => __( 'Parent Menu:', 'burke-clemens' ),
				'not_found'          => __( 'No Menus found.', 'burke-clemens' ),
				'not_found_in_trash' => __( 'No Menus found in Trash.', 'burke-clemens' )
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

			//  What editable fields will the CPT support?  //
			'supports'              => array(
				'title',
				'editor',
			),

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

