<?php


// Add Links to plugins.php Page and Rearrange Settings Links
function trustrol_setting_links( $actions, $plugin_file ) 
{
	static $plugin;

	if (!isset($plugin))
		$plugin = TRUSTROL_BASENAME;
	
	if ($plugin == $plugin_file)
	{
		$settings = array('settings' => '<a href="options-general.php?page=trustrol">' . __('Settings', 'General') . '</a>');
		$site_link = array('support' => '<b><a href="https://trustrol.com/register" target="_blank" style="color:#d30c5c">Create Free Account</a></b>');
		
    	$actions = array_merge($settings, $actions);
		$actions = array_merge($site_link, $actions);
	}
		
	return $actions;
}
add_filter( 'plugin_action_links', 'trustrol_setting_links', 10, 2 );

// Register trustrol Settings in WordPress General Settings Page
function trustrol_register_options_page()
{
  add_options_page('', 'trustrol', 'manage_options', 'trustrol', 'trustrol_options_page');
}
add_action('admin_menu', 'trustrol_register_options_page');

// Add Settings If Plugin Has Been Activated For the First Time
function trustrol_first_install()
{
	$options = [];
	$options['enable']	= 1;
	$options['key']	= "";
  
	if( !get_option( 'trustrol_settings' ) )
		update_option( 'trustrol_settings', $options );
}