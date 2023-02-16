<?php
/*
 * All theme related setups here.
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */

/* Set content width */
if ( ! isset( $content_width ) ) $content_width = 1170;

/* Register menu */
register_nav_menus( array(
	'primary' => esc_html__( 'Main Navigation', 'fasindus' )
) );

/* Logo */
add_theme_support( 'custom-logo' );

/* Background */
add_theme_support( 'custom-background' );

/* Header */
add_theme_support( 'custom-header' );

/* Thumbnails */
add_theme_support( 'post-thumbnails' );

/* Post formats */
add_theme_support( 'post-formats', array( 'gallery', 'video', 'quote' ) );

/* Feeds */
add_theme_support( 'automatic-feed-links' );

/* Add support for Title Tag. */
add_theme_support( 'title-tag' );

/* HTML5 */
add_theme_support( 'html5', array( 'gallery', 'caption' ) );

/* Breadcrumb Trail Support */
add_theme_support( 'breadcrumb-trail' );

/* WooCommerce Support */
add_theme_support( 'woocommerce' );

/* Languages */
if( ! function_exists( 'fasindus_theme_language_setup' ) ) {
	function fasindus_theme_language_setup(){
	  load_theme_textdomain( 'fasindus', get_template_directory() . '/languages' );
	}
	add_action('after_setup_theme', 'fasindus_theme_language_setup');
}

/* Slider Revolution Theme Mode */
if(function_exists( 'set_revslider_as_theme' )){
	add_action( 'init', 'fasindus_theme_revslider' );
	function fasindus_theme_revslider() {
		set_revslider_as_theme();
	}
}

/* Visual Composer Theme Mode */
if(function_exists('vc_set_as_theme')) vc_set_as_theme();

add_filter('wp_list_categories', 'fasindus_cat_count_span');
function fasindus_cat_count_span($links) {
 $links = str_replace('</a> (', '</a> <span>(', $links);
 $links = str_replace(')', ')</span>', $links);
 return $links;
}