<?php
/*
Plugin Name: SOCIAL PROOF Notifications, Sales Pop, Promotion Popup by TrustRol.com
Description: Get more chats and keep conversation going even if visitors leave your website.
Version: 1.0.0
Author: Trustrol
Author URI: https://trustrol.com/
License: GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: Trustrol.com
Domain Path:  Trustrol.com
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


// Define TRUSTROL_URL as a PHP Constant
define( 'TRUSTROL_URL', plugin_dir_url( __FILE__ ) );

// Define TRUSTROL_BASENAME as a PHP Constant
define ( 'TRUSTROL_BASENAME', plugin_basename( __FILE__ ) );



// Initiate Admin Settings
include( plugin_dir_path( __FILE__ ) . 'includes/trustrol-setting.php');

// Design of Plugin Settings Page
include( plugin_dir_path( __FILE__ ) . 'includes/trustrol-admin.php');

// Setting Sections and Fields
include( plugin_dir_path( __FILE__ ) . 'includes/trustrol-options.php');

// Frontend Header Code
include( plugin_dir_path( __FILE__ ) . 'includes/trustrol-widget.php');

?>