<?php

if (!function_exists("add_action")) {
	echo "Hi there, why are you calling this plugin directly that is bad practise";
	exit;
}

add_action("admin_menu", "my_plugin_menu");

function my_plugin_menu() {
	add_menu_page("My Plugin options", "Lises Hemmelighet", "manage_options", "my-unique-identifier", "my_plugin_options");
}

function my_plugin_options() {
	if ( !current_user_can("manage_options")) {
		wp_die(__("You do not have the sufficient permissions to access this page"));
	}


	//TODO Here we add setting for using the database, and how we setup the plugin to work.
	//TODO Include database, fetch the current not closed orders from the database


	include_once("dbconnection.php");


	echo "We got here";




}
