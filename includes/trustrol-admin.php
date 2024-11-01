<?php

// Design of trustrol in WordPress Settings
function trustrol_options_page()
{
	// Check For User Capabilities
	if ( !current_user_can('manage_options') )
		return;
?>


	<div class="wrap">

		<?php	
			$image = '<img src="'. TRUSTROL_URL .'assets/images/trustrol.png" class="admin-img"> ';
			$title = $image . get_admin_page_title() .'<br>';
		?>

		<h1 class="admin-title"><?php echo  $title;  ?></h1>

		<form method="post" action="options.php">
			
			<!-- Display Necessary Hidden Fields For Settings -->
			<?php settings_fields( 'trustrol_settings' ); ?>
			
			<!-- Hook to Display The Settings Sections For This Page -->
			<?php do_settings_sections( 'trustrol' ); ?>
			
			<!-- Submit Button -->
			<?php submit_button(); ?>
		
		</form>

	</div>

<?php
}
