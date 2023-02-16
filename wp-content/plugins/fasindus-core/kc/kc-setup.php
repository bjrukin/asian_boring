<?php

function fasindus_all_shortcodes() {
  $dirs = glob( FASINDUS_KC_SHORTCODE_PATH . '*', GLOB_ONLYDIR );
  if ( !$dirs ) return;
  foreach ($dirs as $dir) {
    $dirname = basename( $dir );

    /* Include all shortcodes backend options file */
    $options_file = $dir . DS . $dirname . '-options.php';
    $options = array();
    if ( file_exists( $options_file ) ) {
      include_once( $options_file );
    } else {
      continue;
    }

    /* Include all shortcodes frondend options file */
    $shortcode_class_file = $dir . DS . $dirname .'.php';
    if ( file_exists( $shortcode_class_file ) ) {
      include_once( $shortcode_class_file );
    }
  }
}
if ( is_plugin_active('kingcomposer/kingcomposer.php') || is_plugin_active('kingcomposer-master/kingcomposer.php') ) {
  fasindus_all_shortcodes();
}

if ( is_plugin_active('kingcomposer/kingcomposer.php') ) {
  function fasindus_kc_custom_post_type(){
    global $kc;
    $kc->add_content_type( 'service' );
    $kc->add_content_type( 'project' );
  }
  add_action('init', 'fasindus_kc_custom_post_type', 99 );
}