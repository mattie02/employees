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

// CREATE CUSTOM POST TYPES

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
			'supports' => array('title', 'editor', 'thumbnail' ), 
			'taxonomies' => array(''),
			'menu_icon' => plugins_url('images/image.png', __FILE__ ),
			'has_archive' => true
		)
	);
}

//CREATE CUSTOM META BOXES

add_action ('admin_init', 'my_admin'); 

function my_admin() {
	add_meta_box( 'employee_information_meta_box', 
		'Employee Information', 
		'display_employee_information_meta_box',
		'employees', 'normal', 'high'
	);
}

function display_employee_information_meta_box( $employees ) {
	$position = esc_html( get_post_meta( $employees->ID, 'employees_position', true ) );
	$facebook = esc_html( get_post_meta( $employees->ID, 'employees_facebook', true ) );
	$twitter = esc_html( get_post_meta( $employees->ID, 'employees_twitter', true ) );
	$linkedin = esc_html( get_post_meta( $employees->ID, 'employees_linkedin', true ) );
	$email = esc_html( get_post_meta( $employees->ID, 'employees_email', true ) );
?>
<table>
	<tr>
		<td style="width: 100%;">Position</td>
		<td><input type="text" size="80" name="employees_position" value="<?php echo $position; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 100%;">Facebook</td>
		<td><input type="text" size="80" name="employees_facebook" value="<?php echo $facebook; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 100%;">Twitter</td>
		<td><input type="text" size="80" name="employees_twitter" value="<?php echo $twitter; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 100%;">Linked In</td>
		<td><input type="text" size="80" name="employees_linkedin" value="<?php echo $linkedin; ?>" /></td>
	</tr>
	<tr>
		<td style="width: 100%;">Email</td>
		<td><input type="text" size="80" name="employees_email" value="<?php echo $email; ?>" /></td>
	</tr>
</table>

<?php }

add_action( 'save_post', 'add_employee_information_fields', 10, 2 );

function add_employee_information_fields( $employees_id, $employees ) {
	if ( $employees->post_type == 'employees' ) {
		if ( isset( $_POST['employees_position'] ) && $_POST['employees_position'] != '') {
			update_post_meta( $employees_id, 'employees_position', $_POST['employees_position'] );
		}
		if ( isset( $_POST['employees_facebook'] ) && $_POST['employees_facebook'] != '') {
			update_post_meta( $employees_id, 'employees_facebook', $_POST['employees_facebook'] );
		}
		if ( isset( $_POST['employees_twitter'] ) && $_POST['employees_twitter'] != '') {
			update_post_meta( $employees_id, 'employees_twitter', $_POST['employees_twitter'] );
		}
		if ( isset( $_POST['employees_linkedin'] ) && $_POST['employees_linkedin'] != '') {
			update_post_meta( $employees_id, 'employees_linkedin', $_POST['employees_linkedin'] );
		}
		if ( isset( $_POST['employees_email'] ) && $_POST['employees_email'] != '') {
			update_post_meta( $employees_id, 'employees_email', $_POST['employees_email'] );
		}
	}
}





