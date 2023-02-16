<?php
/*
 * All CSS and JS files are enqueued from this file
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */

/**
 * Enqueue Files for FrontEnd
 */
function fasindus_google_font_url() {
    $font_url = '';
    if ( 'off' !== esc_html__( 'on', 'fasindus' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Open Sans:400,400i,600|Roboto:300,500,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

if ( ! function_exists( 'fasindus_scripts_styles' ) ) {
  function fasindus_scripts_styles() {

    // Styles
    wp_enqueue_style( 'themify-icons', FASINDUS_CSS .'/themify-icons.css', array(), '4.6.3', 'all' );
    wp_enqueue_style( 'flaticon', FASINDUS_CSS .'/flaticon.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'bootstrap', FASINDUS_CSS .'/bootstrap.min.css', array(), '3.3.7', 'all' );
    wp_enqueue_style( 'animate', FASINDUS_CSS .'/animate.css', array(), '3.5.1', 'all' );
    wp_enqueue_style( 'odometer', FASINDUS_CSS .'/odometer.css', array(), '0.4.8', 'all' );
    wp_enqueue_style( 'owl-carousel', FASINDUS_CSS .'/owl.carousel.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'owl-theme', FASINDUS_CSS .'/owl.theme.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'slick', FASINDUS_CSS .'/slick.css', array(), '1.6.0', 'all' );
    wp_enqueue_style( 'swiper', FASINDUS_CSS .'/swiper.min.css', array(), '4.0.7', 'all' );
    wp_enqueue_style( 'slick-theme', FASINDUS_CSS .'/slick-theme.css', array(), '1.6.0', 'all' );
    wp_enqueue_style( 'owl-transitions', FASINDUS_CSS .'/owl.transitions.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'fancybox', FASINDUS_CSS .'/fancybox.css', array(), '2.0.0', 'all' );
    wp_enqueue_style( 'fasindus-style', FASINDUS_CSS .'/styles.css', array(), FASINDUS_VERSION, 'all' );
    wp_enqueue_style( 'element', FASINDUS_CSS .'/elements.css', array(), FASINDUS_VERSION, 'all' );
    if ( !function_exists('cs_framework_init') ) {
      wp_enqueue_style('fasindus-default-style', get_template_directory_uri() . '/style.css', array(),  FASINDUS_VERSION, 'all' );
    }
    wp_enqueue_style( 'fasindus-default-google-fonts', fasindus_google_font_url(), array(), FASINDUS_VERSION, 'all' );
    // Scripts
    wp_enqueue_script( 'bootstrap', FASINDUS_SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), '3.3.7', true );
    wp_enqueue_script( 'imagesloaded');
    wp_enqueue_script( 'isotope', FASINDUS_SCRIPTS . '/isotope.min.js', array( 'jquery' ), '2.2.2', true );
    wp_enqueue_script( 'fancybox', FASINDUS_SCRIPTS . '/fancybox.min.js', array( 'jquery' ), '2.1.5', true );
    wp_enqueue_script( 'masonry');
    wp_enqueue_script( 'owl-carousel', FASINDUS_SCRIPTS . '/owl-carousel.js', array( 'jquery' ), '2.0.0', true );
    wp_enqueue_script( 'jquery-easing', FASINDUS_SCRIPTS . '/jquery-easing.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'wow', FASINDUS_SCRIPTS . '/wow.min.js', array( 'jquery' ), '1.4.0', true );
    wp_enqueue_script( 'odometer', FASINDUS_SCRIPTS . '/odometer.min.js', array( 'jquery' ), '0.4.8', true );
    wp_enqueue_script( 'magnific-popup', FASINDUS_SCRIPTS . '/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_script( 'slick-slider', FASINDUS_SCRIPTS . '/slick-slider.js', array( 'jquery' ), '1.6.0', true );
    wp_enqueue_script( 'swiper', FASINDUS_SCRIPTS . '/swiper.min.js', array( 'jquery' ), '4.0.7', true );
    wp_enqueue_script( 'wc-quantity-increment', FASINDUS_SCRIPTS . '/wc-quantity-increment.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'fasindus-scripts', FASINDUS_SCRIPTS . '/scripts.js', array( 'jquery' ), FASINDUS_VERSION, true );
    // Comments
    wp_enqueue_script( 'fasindus-validate', FASINDUS_SCRIPTS . '/jquery.validate.min.js', array( 'jquery' ), '1.9.0', true );
    wp_add_inline_script( 'fasindus-inline-validate', 'jQuery(document).ready(function($) {$("#commentform").validate({rules: {author: {required: true,minlength: 2},email: {required: true,email: true},comment: {required: true,minlength: 10}}});});' );

    // Responsive Active
    $fasindus_viewport = cs_get_option('theme_responsive');
    if( !$fasindus_viewport ) {
      wp_enqueue_style( 'fasindus-responsive', FASINDUS_CSS .'/responsive.css', array(), FASINDUS_VERSION, 'all' );
    }

    // Adds support for pages with threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }
  add_action( 'wp_enqueue_scripts', 'fasindus_scripts_styles' );
}

/**
 * Enqueue Files for BackEnd
 */
if ( ! function_exists( 'fasindus_admin_scripts_styles' ) ) {
  function fasindus_admin_scripts_styles() {

    wp_enqueue_style( 'fasindus-admin-main', FASINDUS_CSS . '/admin-styles.css', true );
    wp_enqueue_style( 'flaticon', FASINDUS_CSS . '/flaticon.css', true );
    wp_enqueue_style( 'themify-icons', FASINDUS_CSS . '/themify-icons.css', true );
    wp_enqueue_script( 'fasindus-admin-scripts', FASINDUS_SCRIPTS . '/admin-scripts.js', true );

  }
  add_action( 'admin_enqueue_scripts', 'fasindus_admin_scripts_styles' );
}
