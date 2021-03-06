<?php

/*
Plugin Name: Lh Plugin
Plugin URI: https://github.com/Hansi132/USN_Fag
Description: Lises Hemmelighet custom plugin.
Version: 1.0
Author: Hans Kristian Odberg Markeseth
Author URI: https://github.com/Hansi132/
License: A "Slug" license name e.g. GPL2
*/

include_once("lh_dbconnection.php");

date_default_timezone_set("Europe/Oslo");

function function_deleteform() {
	global $wpdb;
	wp_redirect(wp_get_referer());
	$wpdb->query(
		$wpdb->prepare(
			"UPDATE wp_order_system SET is_done=1 WHERE order_key={$_POST['submit']}"
		)
	);
}



add_action('admin_post_nopriv_deleteform', 'function_deleteform');
add_action('admin_post_deleteform', 'function_deleteform');

function function_submitform() {

	global $wpdb;
	wp_redirect(wp_get_referer());
	$wpdb->insert(
		'wp_order_system',
		array(
			'name' => $_POST["lh_name"],
			'email' => $_POST["lh_email"],
			'phone' => $_POST["lh_telefon"],
			'what' => $_POST["lh_hvorfor"],
			'created_at' => date("Y-m-d H:i:s"),
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
require_once("lh_dbconnection.php");

/* Admin panel */
require_once ("lh-Admin.php");


/* Shortcodes */

function wp_shortcode_create() {

	return include_once("lh-Form.php");

}

add_shortcode("CreateForm", "wp_shortcode_create");

add_action("admin_init", "lh_admin_init");

function lh_admin_init() {
	wp_register_style("lh-style", "/wp-content/plugins/lh-plugin/styles/lh-style.css");

	add_action("admin_print_styles", "lh_admin_style");

	function lh_admin_style() {
		wp_enqueue_style("lh-style");
	}

}

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/Hansi132/WP_Plugin',
	__FILE__, //Full path to the main plugin file or functions.php.
	'Lises Plugin'
);


