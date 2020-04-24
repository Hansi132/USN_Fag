<?php

if (!function_exists("add_action")) {
	echo "Hi there, why are you calling this plugin directly that is bad practise";
	exit;
}

add_action("admin_menu", "my_plugin_menu");

function my_plugin_menu() {
	add_menu_page("Lises Hemmelighet", "Lises Hemmelighet", "manage_options", "lh_admin_page", "my_plugin_options", "dashicons-cart");
}

function my_plugin_options() {
	if ( !current_user_can("manage_options")) {
		wp_die(__("You do not have the sufficient permissions to access this page"));
	}

	global $wpdb;

	$sql = "SELECT * FROM {$wpdb->base_prefix}order_system WHERE is_done =! 1";

	$results = $wpdb->get_results($sql);

	?>
<form class="form" method="POST" name="form" action ="<?php echo admin_url('admin-post.php'); ?>" >
	<table class="table" border>
		<tr>
			<td>Fullført</td>
			<td>Navn</td>
			<td>Epost</td>
			<td>Telefon</td>
			<td>Hva</td>
			<td>Ordre Lagd</td>
		</tr>
	<?php foreach ($results as $result) { ?>
		<tr>
			<!-- We need a radio button with the class of result->order_id -->
			<td><button type="submit" id="submit" name="submit" value="<?php echo $result->order_key ?>">Merk ferdig</button></td>
			<td><?php echo $result->name; ?></td>
			<td><?php echo $result->email;?></td>
			<td><?php echo $result->phone; ?></td>
			<td><?php echo $result->what; ?></td>
			<td><?php echo $result->created_at; ?></td>
		</tr>
		<br><br><br>
	<?php } ?>
	</table>
	<input type='hidden' name='action' value='deleteform'/>
	<?php wp_nonce_field( 'submitform', 'deleteform_nonce' ); ?>
</form>


<?php
}
?>