<?php


// Add Settings Sections and Fields in trustrol Settings Page
function trustrol_settings()
{
	
	// If Plugin Settings Don't Exist, Then Create Them
	trustrol_first_install();
  
	// Find trustrol Setting Section Hook and Add a Section There
	add_settings_section( 'trustrol_settings_section', __( '', 'trustrol' ), 'trustrol_settings_description_callback', 'trustrol' );
	
	// Add Enable Checkbox Field in trustrol Setting Page
	add_settings_field( 'trustrol_settings_enable', __( 'Enable Plugin', 'trustrol'), 'trustrol_settings_enable_callback', 'trustrol', 'trustrol_settings_section' );

	// Add Pixel Key Field in trustrol Setting Page
	add_settings_field( 'trustrol_settings_key', __( 'TrustRol Key', 'trustrol'), 'trustrol_settings_key_callback', 'trustrol', 'trustrol_settings_section' );
	
	// Add Page ID Field in trustrol Setting Page
	add_settings_field( 'trustrol_settings_pageid', __( 'Pages to Exclude', 'trustrol'), 'trustrol_settings_pageid_callback', 'trustrol', 'trustrol_settings_section' );
	
	
	// Register Our Settings and Save Them
	register_setting( 'trustrol_settings', 'trustrol_settings' );
	
}
add_action( 'admin_init', 'trustrol_settings' );


// Build Layout For Chat Enable Field
function trustrol_settings_enable_callback()
{
	$options = get_option( 'trustrol_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'enable' ] ) ) {
		$custom_text = $options['enable'];
	}
	
	if ($custom_text == 1)
	{
		echo '<input type="checkbox" id="trustrol_custom_enable" name="trustrol_settings[enable]" checked value="1" />';
	}
	else
	{
		echo '<input type="checkbox" id="trustrol_custom_enable" name="trustrol_settings[enable]" value="1" />';
	}
	
}


// Build Layout For KEY Field
function trustrol_settings_key_callback()
{
	$options = get_option( 'trustrol_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'key' ] ) ) {
		$custom_text = esc_html( $options['key'] );
	}

	echo '<input type="text" id="trustrol_custom_key" name="trustrol_settings[key]" value="' . $custom_text . '" style="width:842px;" /><br><small><i>Login to your trustrol.com account >> Choose Campaign >> Copy the Pixel key and Paste it here Not Have account yet? <a href="https://trustrol.com/register" target="_blank" style="color:#d30c5c">Create Free Account from here</a></small><i>';
}


// Build Layout For Page ID Field
function trustrol_settings_pageid_callback()
{
	$options = get_option( 'trustrol_settings' );
	$custom_text = '';
	
	if( isset( $options[ 'pageid' ] ) ) {
		$custom_text = esc_html( $options['pageid'] );
	}

	echo '<input type="text" id="trustrol_custom_pageid" name="trustrol_settings[pageid]" value="' . $custom_text . '" style="width:842px;" /><br><small><i>Add Comma Seperated Page IDs where you want to hide the Chat Widget. Example: <b>536, 965, 5862</b></small><i>';
}