<?php
/**
 * King Composer Library
 * Common Fields
 */
class FasindusLibrary {

	// Get Theme Name
	public static function fasindus_kc_cat_name() {
		return esc_html__( "by Fasindus", 'fasindus-core' );
	}

	// Extra Class
	public static function fasindus_class_option() {
		return array(
		  "type" => "text",
		  "label" => esc_html__( "Extra class name", 'fasindus-core' ),
		  "name" => "class",
		  "description" => esc_html__( "Custom styled class name.", 'fasindus-core')
		);
	}

	// ID
	public static function fasindus_id_option() {
		return array(
		  "type" => "text",
		  "label" => esc_html__( "Element ID", 'fasindus-core' ),
		  "name" => "id",
		  'value' => '',
		  "description" => esc_html__( "Enter your ID for this element. If you want.", 'fasindus-core')
		);
	}

	// Open Link in New Tab
	public static function fasindus_open_link_tab() {
		return array(
			"type" => "toggle",
			"label" => esc_html__( "Open New Tab? (Links)", 'fasindus-core' ),
			"name" => "open_link",
		);
	}

	/**
	 * Carousel Default Options
	 */

	// Loop
	public static function fasindus_carousel_loop() {
		return array(
			"type" => "toggle",
			"label" => esc_html__( "Disable Loop?", 'fasindus-core' ),
			"name" => "carousel_loop",
			"description" => esc_html__( "Continuously moving carousel, if enabled.", 'fasindus-core')
		);
	}
	// Items
	public static function fasindus_carousel_items() {
		return array(
		  "type" => "text",
			"label" => esc_html__( "Items", 'fasindus-core' ),
		  "name" => "carousel_items",
		  "description" => esc_html__( "Enter the numeric value of how many items you want in per slide.", 'fasindus-core')
		);
	}
	// Margin
	public static function fasindus_carousel_margin() {
		return array(
		  "type" => "text",
			"label" => esc_html__( "Margin", 'fasindus-core' ),
		  "name" => "carousel_margin",
		  "description" => esc_html__( "Enter the numeric value of how much space you want between each carousel item.", 'fasindus-core')
		);
	}
	// Dots
	public static function fasindus_carousel_dots() {
		return array(
		  "type" => "toggle",
			"label" => esc_html__( "Dots", 'fasindus-core' ),
		  "name" => "carousel_dots",
		  "description" => esc_html__( "If you want Carousel Dots, enable it.", 'fasindus-core')
		);
	}
	// Nav
	public static function fasindus_carousel_nav() {
		return array(
		  "type" => "toggle",
			"label" => esc_html__( "Navigation", 'fasindus-core' ),
		  "name" => "carousel_nav",
		  "description" => esc_html__( "If you want Carousel Navigation, enable it.", 'fasindus-core')
		);
	}
	// Autoplay Timeout
	public static function fasindus_carousel_autoplay_timeout() {
		return array(
		  "type" => "text",
			"label" => esc_html__( "Autoplay Timeout", 'fasindus-core' ),
		  "group" => esc_html__( "Carousel", 'fasindus-core' ),
		  "name" => "carousel_autoplay_timeout",
		  "description" => esc_html__( "Change carousel Autoplay timing value. Default : 5000. Means 5 seconds.", 'fasindus-core')
		);
	}
	// Autoplay
	public static function fasindus_carousel_autoplay() {
		return array(
		  "type" => "toggle",
			"label" => esc_html__( "Autoplay", 'fasindus-core' ),
		  "name" => "carousel_autoplay",
		  "description" => esc_html__( "If you want to start Carousel automatically, enable it.", 'fasindus-core')
		);
	}
	// Animate Out
	public static function fasindus_carousel_animateout() {
		return array(
		  "type" => "toggle",
			"label" => esc_html__( "Animate Out", 'fasindus-core' ),
		  "name" => "carousel_animate_out",
		  "description" => esc_html__( "CSS3 animation out.", 'fasindus-core')
		);
	}
	// Mouse Drag
	public static function fasindus_carousel_mousedrag() {
		return array(
		  "type" => "toggle",
			"label" => esc_html__( "Disable Mouse Drag?", 'fasindus-core' ),
		  "name" => "carousel_mousedrag",
		  "description" => esc_html__( "If you want to disable Mouse Drag, check it.", 'fasindus-core')
		);
	}
	// Auto Width
	public static function fasindus_carousel_autowidth() {
		return array(
		  "type" => "toggle",
			"label" => esc_html__( "Auto Width", 'fasindus-core' ),
		  "name" => "carousel_autowidth",
		  "description" => esc_html__( "Adjust Auto Width automatically for each carousel items.", 'fasindus-core')
		);
	}
	// Auto Height
	public static function fasindus_carousel_autoheight() {
		return array(
		  "type" => "toggle",
			"label" => esc_html__( "Auto Height", 'fasindus-core' ),
		  "name" => "carousel_autoheight",
		  "description" => esc_html__( "Adjust Auto Height automatically for each carousel items.", 'fasindus-core')
		);
	}
	// Tablet
	public static function fasindus_carousel_tablet() {
		return array(
		  "type" => "text",
			"label" => esc_html__( "Tablet", 'fasindus-core' ),
		  "name" => "carousel_tablet",
		  "description" => esc_html__( "Enter number of items to show in tablet.", 'fasindus-core')
		);
	}
	// Mobile
	public static function fasindus_carousel_mobile() {
		return array(
		  "type" => "text",
			"label" => esc_html__( "Mobile", 'fasindus-core' ),
		  "name" => "carousel_mobile",
		  "description" => esc_html__( "Enter number of items to show in mobile.", 'fasindus-core')
		);
	}
	// Small Mobile
	public static function fasindus_carousel_small_mobile() {
		return array(
		  "type" => "text",
			"label" => esc_html__( "Small Mobile", 'fasindus-core' ),
		  "name" => "carousel_small_mobile",
		  "description" => esc_html__( "Enter number of items to show in small mobile.", 'fasindus-core')
		);
	}
}