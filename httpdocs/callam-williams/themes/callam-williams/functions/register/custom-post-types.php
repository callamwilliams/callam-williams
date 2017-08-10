<?php

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //

//  This file creates any custom post types we need for our theme. Get started
//  by un-commenting everything below, and customizing the cpt to suit.

//  ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** ***** *****  //

function create_post_types() {

	register_post_type( 'project',

		array(

			//  What will the CPT be known as?  //
			'labels'                => array(
				'name'               => _x( 'Projects', 'callam-williams' ),
				'singular_name'      => _x( 'Projects', 'callam-williams' ),
				'project_name'          => _x( 'Projects', 'callam-williams' ),
				'name_admin_bar'     => _x( 'Projects', 'callam-williams' ),
				'add_new'            => _x( 'Add New', 'callam-williams' ),
				'add_new_item'       => __( 'Add New Project', 'callam-williams' ),
				'new_item'           => __( 'New Project', 'callam-williams' ),
				'edit_item'          => __( 'Edit Project', 'callam-williams' ),
				'view_item'          => __( 'View Project', 'callam-williams' ),
				'all_items'          => __( 'All Projects', 'callam-williams' ),
				'search_items'       => __( 'Search Projects', 'callam-williams' ),
				'parent_item_colon'  => __( 'Parent Project:', 'callam-williams' ),
				'not_found'          => __( 'No Projects found.', 'callam-williams' ),
				'not_found_in_trash' => __( 'No Projects found in Trash.', 'callam-williams' )
			),

			//  Settings - how will the CPT behave?  //
			'public'                => true,
			'show_ui'               => true,
			'publicly_queryable'    => true,
			'rewrite'               => array( 'slug' => 'project' ),
			'exclude_from_search'   => true,
			'capability_type'       => 'post',
			'has_archive'           => false,
			'project_icon'             => 'dashicons-welcome-widgets-menus',
			'project_position'         => 18,
			'show_in_rest'          => true,
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			'show_in_nav_projects'     => true,

			//  Which Taxonomies will be applicable?  //
			'taxonomies'            => array(
				'Projects'
			),

		)
	);

}

add_action( 'init', 'create_post_types' );

