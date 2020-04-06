<?php

/*
Plugin Name: Lh Plugin
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: hansk
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

$amount = null;

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
	echo "<div class='wrap'>";
	echo "<p>Here is where the options would go if i had some</p>";
	echo "</div>";
	echo "<form class=\"form\" method=\"post\" name=\"forms\" action=\"\">
		<label for='amount'>Amount</label>
        <input type=\"text\" id=\"amount\" name=\"amount\" required>
        <br>
        <input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Søk\"/>
    </form>";


	if(isset($_POST["amount"])) {
		$amount = $_POST["amount"];
		echo "You pushed the amount of " . $amount;
	}


}



function wp_shortcode_create($atts = array()) {

	extract(shortcode_atts(array(
		'name' => 'Name'
	), $atts));

	return "<form class='form' method='post' name='form' action=''" . "<label for='name'> $name" . "<input type='text' class='name' id='name' value='' required>" .
		"<label for='Email'> Email" . "<input type='text' class='name' id='name' value='' required>" .
		"<input type='submit' name='submit' id='submit' value='Send'>" . "</form>";
}

add_shortcode("5", "wp_shortcode_create");
