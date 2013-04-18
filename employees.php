<?php
/*
Plugin Name: Employees
Plugin URI: http://flightofthedodo.com
Description: Custom post type for custom author pages.
Version: 1.0.0 alpha
Author: Matthew R. Hansen
Author URI: http://flightofthedodo.com
License: GPLv2
*/

add_action( 'init', 'create_employees'); 

function create_employees() {
	register_post_type( 'employees', 
		array(
			'labels' => array(
				'name' => 'Employee\'s', 
				'singular_name' => 'Employee\'s',
				'add_new' => 'Add New', 
				'add_new_item' => 'Add New Employee',
				'edit' => 'Edit', 
				'edit_item' => 'Edit Employee', 
				'new_item' => 'New Employee',
				'view' => 'View', 
				'view_item' => 'View Employee',
				'search_items' => 'Search Employee\'s', 
				'not_found' => 'No Employee\'s Found',
				'not_found_in_trash' => 'No Employee\'s found in Trash', 
				'parent' => 'Parent Employee'
			),
			'public' => true,
			'menu_position' => 15,
			'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'), 
			'taxonomies' => array(''),
			'menu_icon' => plugins_url('images/image.png', __FILE__ ),
			'has_archive' => true
		)
	);
}

?>
