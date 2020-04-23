<?php

/*
Plugin Name: Lh Plugin
Plugin URI: https://github.com/Hansi132/USN_Fag
Description: Lises Hemmelighet custom plugin.
Version: 1.1
Author: Hans Kristian Odberg Markeseth
Author URI: https://github.com/Hansi132/
License: A "Slug" license name e.g. GPL2
*/


function function_submitform() {
	global $wpdb;
	wp_redirect("http://localhost/wordpress/?page_id=119");
	$wpdb->insert(
		'wp_order_system',
		array(
			'name' => $_POST["lh_name"],
			'email' => $_POST["lh_email"],
			'phone' => $_POST["lh_telefon"],
			'what' => $_POST["lh_hvorfor"],
			'created_at' => "2020-04-23 15:32:32", //TODO Find a way to get the time working.
			'is_done' => 0
		),
		array(
			'%s',
			'%s',
			'%d',
			'%s',
			'%s',
			'%d',
		));
}

add_action('admin_post_nopriv_submitform', 'function_submitform');
add_action('admin_post_submitform', 'function_submitform');


/* Database Creation */
require_once ("dbconnection.php");

/* Admin panel */
require_once ("lh-Admin.php");


/* Shortcodes */

function wp_shortcode_create() {

	return include_once("lh-Form.php");

}

add_shortcode("CreateForm", "wp_shortcode_create");
