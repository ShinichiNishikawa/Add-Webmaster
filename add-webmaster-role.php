<?php
/*
Plugin Name: Add Webmaster Role
Plugin URI: https://github.com/ShinichiNishikawa/Add-Webmaster
Description: This plugin adds a role Webmaster. Webmaster Role has all the capabilities of Editor and edit_theme_options so that one can handle widgets, menu and customize the site.
Author: Shinichi Nishikawa
Version: 0.0
Author URI: http://nskw-style.com
*/

// add Role on activation
register_activation_hook( __FILE__, 'awr_activate' );
function awr_activate() {

	// editorのCapabilitiesを取得して、
	$editor_role  = get_role( 'editor' );
	$new_cap      = $editor_role->capabilities;
	
	// edit_theme_optionsを追加
	$new_cap['edit_theme_options'] = true;
	
	add_role( 'webmaster', 'Webmaster', $new_cap );
	
}

// remove Role on deactivation
register_deactivation_hook( __FILE__, 'awr_deactivate' );
function awr_deactivate() {

	remove_role( 'webmaster' );
	
}
