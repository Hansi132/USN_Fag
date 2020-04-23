<?php

if (!function_exists("add_action")) {
	echo "Hi there, why are you calling this plugin directly that is bad practise";
	exit;
}

add_action("admin_menu", "my_plugin_menu");

function my_plugin_menu() {
	add_menu_page("My Plugin options", "Lises Hemmelighet", "manage_options", "lh_admin_page", "my_plugin_options");
}

function my_plugin_options() {
	if ( !current_user_can("manage_options")) {
		wp_die(__("You do not have the sufficient permissions to access this page"));
	}


	//TODO Here we add setting for using the database, and how we setup the plugin to work.
	//TODO Include database, fetch the current not closed orders from the database


	include_once("dbconnection.php");

	global $wpdb;

	$sql = "SELECT * FROM {$wpdb->base_prefix}order_system /*WHERE wp_order_system.is_done =! 1*/";

	$results = $wpdb -> get_results($sql);

	?>
	<table class="table table-hover">
	<?php foreach ($results as $result) { ?>
		<tr>
			<!-- We need a radio button with the class of result->order_id -->
			<td><button>Done</button></td>
			<td><?php echo $result->name; ?></td>
			<td><?php echo $result->email;?></td>
			<td><?php echo $result->phone; ?></td>
			<td><?php echo $result->what; ?></td>
			<td><?php echo $result->created_at; ?></td>
			<td><?php echo $result->is_done; ?></td>
		</tr>
		<br><br><br>

	<?php }

}
?>