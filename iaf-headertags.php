<?php
/*
 * Plugin Name: IAF Headertags
 * Description: Add site description and keywords in your WordPress website's header.
 * Author: Fotso Fonkam
 * Author URI: http://www.iamfotso.cm
 * Version: 1.1
 * Licence: GLP2+
 * Keywords: description, tag, seo, header, keyworks, optimisation, search, engine, custom  post types, cpt
 * Text Domain: headertags
 */

if( !function_exists( 'add_action' ) ) {
    echo "Hi there! I'm just a plugin, not much I can do when called directly.";
    exit;
}

define( 'HEADERTAGS_PLUGIN_URL', __FILE__ );
define( 'HEADERTAGS_DEV_MODE', true );

// INCLUDES
include( 'inc/activate.php' );
include( 'inc/deactivate.php' );
include( 'inc/enqueue.php' );
include( 'inc/menu.php' );
include( 'inc/header.php' );
include( 'inc/save-options.php' );
include( 'inc/metaboxes.php' );
include( 'inc/textdomain.php' );

// HOOKS
register_activation_hook( __FILE__, 'iaf_headertags_activate' );
register_deactivation_hook( __FILE__, 'iaf_headertags_deactivate' );
add_action( 'admin_enqueue_scripts', 'iaf_headertags_admin_enqueue' );
add_action( 'wp_head', 'iaf_headertags_header' );
add_action( 'admin_menu', 'iaf_headertags_menu' );
add_action( 'wp_ajax_iaf_headertags_save_options', 'iaf_headertags_save_options' );
add_action( 'add_meta_boxes', 'iaf_headertags_meta_box' );
add_action( 'save_post', 'iaf_headertags_save_meta_box' );
add_action( 'plugins_loaded', 'iaf_headertags_load_textdomain' );