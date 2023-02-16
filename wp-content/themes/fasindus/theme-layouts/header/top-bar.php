<?php
// Metabox
global $post;
$fasindus_id    = ( isset( $post ) ) ? $post->ID : false;
$fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
$fasindus_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fasindus_id;
$fasindus_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $fasindus_id : false;
$fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox', true );
  if ($fasindus_meta) {
    $fasindus_topbar_options = $fasindus_meta['topbar_options'];
  } else {
    $fasindus_topbar_options = '';
  }

  if ( $fasindus_meta ) {
    $fasindus_header_design  = $fasindus_meta['select_header_design'];
  } else {
    $fasindus_header_design  = cs_get_option( 'select_header_design' );
  }

 if ( $fasindus_header_design === 'default' ) {
    $fasindus_header_design_actual  = cs_get_option( 'select_header_design' );
  } else {
    $fasindus_header_design_actual = ( $fasindus_header_design ) ? $fasindus_header_design : cs_get_option('select_header_design');
  }


  if ( $fasindus_header_design_actual == 'style_three'  ) {
    $topbar_container = 'container ';
  } else {
    $topbar_container = 'container-fluid ';
  }

// Define Theme Options and Metabox varials in right way!
if ($fasindus_meta) {
  if ($fasindus_topbar_options === 'custom' && $fasindus_topbar_options !== 'default') {
    $fasindus_top_left          = $fasindus_meta['top_left'];
    $fasindus_top_right          = $fasindus_meta['top_right'];
    $fasindus_hide_topbar        = $fasindus_topbar_options;
    $fasindus_topbar_bg          = $fasindus_meta['topbar_bg'];
    if ($fasindus_topbar_bg) {
      $fasindus_topbar_bg = 'background-color: '. $fasindus_topbar_bg .';';
    } else {$fasindus_topbar_bg = '';}
  } else {
    $fasindus_top_left          = cs_get_option('top_left');
    $fasindus_top_right          = cs_get_option('top_right');
    $fasindus_hide_topbar        = cs_get_option('top_bar');
    $fasindus_topbar_bg          = '';
  }
} else {
  // Theme Options fields
  $fasindus_top_left         = cs_get_option('top_left');
  $fasindus_top_right          = cs_get_option('top_right');
  $fasindus_hide_topbar        = cs_get_option('top_bar');
  $fasindus_topbar_bg          = '';
}
// All options
if ( $fasindus_meta && $fasindus_topbar_options === 'custom' && $fasindus_topbar_options !== 'default' ) {
  $fasindus_top_right = ( $fasindus_top_right ) ? $fasindus_meta['top_right'] : cs_get_option('top_right');
  $fasindus_top_left = ( $fasindus_top_left ) ? $fasindus_meta['top_left'] : cs_get_option('top_left');
} else {
  $fasindus_top_right = cs_get_option('top_right');
  $fasindus_top_left = cs_get_option('top_left');
}
if ( $fasindus_meta && $fasindus_topbar_options !== 'default' ) {
  if ( $fasindus_topbar_options === 'hide_topbar' ) {
    $fasindus_hide_topbar = 'hide';
  } else {
    $fasindus_hide_topbar = 'show';
  }
} else {
  $fasindus_hide_topbar_check = cs_get_option( 'top_bar' );
  if ( $fasindus_hide_topbar_check === true ) {
     $fasindus_hide_topbar = 'hide';
  } else {
     $fasindus_hide_topbar = 'show';
  }
}
if ( $fasindus_meta ) {
  $fasindus_topbar_bg = ( $fasindus_topbar_bg ) ? $fasindus_meta['topbar_bg'] : '';
} else {
  $fasindus_topbar_bg = '';
}
if ( $fasindus_topbar_bg ) {
  $fasindus_topbar_bg = 'background-color: '. $fasindus_topbar_bg .';';
} else { $fasindus_topbar_bg = ''; }

if( $fasindus_hide_topbar === 'show' && ( $fasindus_top_left || $fasindus_top_right ) ) {
?>
<div class="topbar" style="<?php echo esc_attr( $fasindus_topbar_bg ); ?>">
  <div class="<?php echo esc_attr( $topbar_container ); ?>">
      <div class="row">
          <div class="col col-md-9">
              <?php echo do_shortcode( $fasindus_top_left ); ?>
          </div>
          <div class="col col-md-3">
              <?php echo do_shortcode( $fasindus_top_right ); ?>
          </div>
      </div>
  </div>
</div> 
<?php } // Hide Topbar - From Metabox