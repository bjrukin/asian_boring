<?php
/*
Plugin Name: Fasindus Core
Plugin URI: http://themeforest.net/user/quomodotheme
Description: Plugin to contain shortcodes and custom post types of the fasindus theme.
Author: quomodotheme
Author URI: http://themeforest.net/user/quomodotheme/portfolio
Version: 1.0
Text Domain: fasindus-core
*/

if( ! function_exists( 'fasindus_block_direct_access' ) ) {
	function fasindus_block_direct_access() {
		if( ! defined( 'ABSPATH' ) ) {
			exit( 'Forbidden' );
		}
	}
}

// Plugin URL
define( 'FASINDUS_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

// Plugin PATH
define( 'FASINDUS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'FASINDUS_PLUGIN_ASTS', FASINDUS_PLUGIN_URL . 'assets' );
define( 'FASINDUS_PLUGIN_IMGS', FASINDUS_PLUGIN_ASTS . '/images' );
define( 'FASINDUS_PLUGIN_INC', FASINDUS_PLUGIN_PATH . 'include' );

// DIRECTORY SEPARATOR
define ( 'DS' , DIRECTORY_SEPARATOR );


/**
 * Check if Codestar Framework is Active or Not!
 */
function fasindus_framework_active() {
  return ( defined( 'CS_VERSION' ) ) ? true : false;
}

/* FASINDUS_THEME_NAME_PLUGIN */
define('FASINDUS_THEME_NAME_PLUGIN', 'Fasindus' );

// Initial File
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('fasindus-core/fasindus-core.php')) {

	// Custom Post Type
  require_once( FASINDUS_PLUGIN_INC . '/custom-post-type.php' );

  if ( is_plugin_active('kingcomposer/kingcomposer.php') ) {

    define( 'FASINDUS_KC_SHORTCODE_BASE_PATH', FASINDUS_PLUGIN_PATH . 'kc/' );
    define( 'FASINDUS_KC_SHORTCODE_PATH', FASINDUS_KC_SHORTCODE_BASE_PATH . 'shortcodes/' );
    // Shortcodes
    require_once( FASINDUS_KC_SHORTCODE_BASE_PATH . '/kc-setup.php' );
    require_once( FASINDUS_KC_SHORTCODE_BASE_PATH . '/library.php' );
  }

  // Theme Custom Shortcode
  require_once( FASINDUS_PLUGIN_INC . '/custom-shortcodes/theme-shortcodes.php' );
  require_once( FASINDUS_PLUGIN_INC . '/custom-shortcodes/custom-shortcodes.php' );

  // Importer
  require_once( FASINDUS_PLUGIN_INC . '/demo/importer.php' );


  if (class_exists('WP_Widget') && is_plugin_active('codestar-framework/cs-framework.php') ) {
    // Widgets

    require_once( FASINDUS_PLUGIN_INC . '/widgets/nav-widget.php' );
    require_once( FASINDUS_PLUGIN_INC . '/widgets/recent-posts.php' );
    require_once( FASINDUS_PLUGIN_INC . '/widgets/footer-posts.php' );
    require_once( FASINDUS_PLUGIN_INC . '/widgets/text-widget.php' );
    require_once( FASINDUS_PLUGIN_INC . '/widgets/widget-extra-fields.php' );
  }

  add_action('wp_enqueue_scripts', 'fasindus_plugin_enqueue_scripts');
  function fasindus_plugin_enqueue_scripts() {
    wp_enqueue_script('plugin-scripts', FASINDUS_PLUGIN_ASTS.'/plugin-scripts.js', array('jquery'), '', true);
  }

}

// Extra functions
require_once( FASINDUS_PLUGIN_INC . '/theme-functions.php' );