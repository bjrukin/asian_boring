<?php
/*
 * Fasindus Theme's Functions
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */

/**
 * Define - Folder Paths
 */

define( 'FASINDUS_THEMEROOT_URI', get_template_directory_uri() );
define( 'FASINDUS_CSS', FASINDUS_THEMEROOT_URI . '/assets/css' );
define( 'FASINDUS_IMAGES', FASINDUS_THEMEROOT_URI . '/assets/images' );
define( 'FASINDUS_SCRIPTS', FASINDUS_THEMEROOT_URI . '/assets/js' );
define( 'FASINDUS_FRAMEWORK', get_template_directory() . '/includes' );
define( 'FASINDUS_LAYOUT', get_template_directory() . '/theme-layouts' );
define( 'FASINDUS_CS_IMAGES', FASINDUS_THEMEROOT_URI . '/includes/theme-options/framework-extend/images' );
define( 'FASINDUS_CS_FRAMEWORK', get_template_directory() . '/includes/theme-options/framework-extend' ); // Called in Icons field *.json
define( 'FASINDUS_ADMIN_PATH', get_template_directory() . '/includes/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$fasindus_theme_child = wp_get_theme();
	$fasindus_get_parent = $fasindus_theme_child->Template;
	$fasindus_theme = wp_get_theme($fasindus_get_parent);
} else { // Parent Theme Active
	$fasindus_theme = wp_get_theme();
}
define('FASINDUS_NAME', $fasindus_theme->get( 'Name' ));
define('FASINDUS_VERSION', $fasindus_theme->get( 'Version' ));
define('FASINDUS_BRAND_URL', $fasindus_theme->get( 'AuthorURI' ));
define('FASINDUS_BRAND_NAME', $fasindus_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( FASINDUS_FRAMEWORK . '/init.php' );