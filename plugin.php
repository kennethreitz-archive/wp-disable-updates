<?php 

/*
Plugin Name: Disable All Updates. Period.
Plugin URI: http://github.com/kennethreitz/disable-updates-wordpress-plugin
Description: Because all they do is break stuff.
Version: 0.6
Author: Kenneth Reitz
Author URI: http://kennethreitz.com/
License: MIT License - http://www.opensource.org/licenses/mit-license.php
 
*/

// No Upgrades to WordPress Core
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );

// Disable Plugin Update Check
remove_action( 'load-plugins.php', 'wp_update_plugins' );
remove_action( 'load-update.php', 'wp_update_plugins' );
remove_action( 'admin_init', '_maybe_update_plugins' );
remove_action( 'wp_update_plugins', 'wp_update_plugins' );
add_filter( 'pre_transient_update_plugins', create_function( '$a', "return null;" ) );

// Disable Theme Update Check
remove_action( 'load-themes.php', 'wp_update_themes' );
remove_action( 'load-update.php', 'wp_update_themes' );
remove_action( 'admin_init', '_maybe_update_themes' );
remove_action( 'wp_update_themes', 'wp_update_themes' );
add_filter( 'pre_transient_update_themes', create_function( '$a', "return null;" ) );