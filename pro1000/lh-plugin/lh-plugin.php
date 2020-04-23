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


/* Database Creation */
require_once ("dbconnection.php");

/* Admin panel */
require_once ("lh-Admin.php");


/* Shortcodes */

function wp_shortcode_create() {

	return include_once("lh-Form.php");

}

add_shortcode("CreateForm", "wp_shortcode_create");
