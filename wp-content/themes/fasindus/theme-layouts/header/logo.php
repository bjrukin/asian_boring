<?php
// Metabox
global $post;
$fasindus_id    = ( isset( $post ) ) ? $post->ID : false;
$fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
$fasindus_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fasindus_id;
$fasindus_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('service') ) ? $fasindus_id : false;
$fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox', true );
// Header Style
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
$fasindus_header_design_actual = $fasindus_header_design_actual ? $fasindus_header_design_actual : 'style_one';

$fasindus_logo = cs_get_option( 'fasindus_logo' );
$fasindus_trlogo = cs_get_option( 'fasindus_trlogo' );
$logo_url = wp_get_attachment_url( $fasindus_logo );
$logo_alt = get_post_meta( $fasindus_logo, '_wp_attachment_image_alt', true );
$trlogo_url = wp_get_attachment_url( $fasindus_trlogo );
$trlogo_alt = get_post_meta( $fasindus_trlogo, '_wp_attachment_image_alt', true );

if ( $logo_url ) {
  $logo_url = $logo_url;
} else {
 $logo_url = FASINDUS_IMAGES.'/logo.png';
}

if ( $trlogo_url ) {
  $trlogo_url = $trlogo_url;
} else {
 $trlogo_url = FASINDUS_IMAGES.'/tr-logo.png';
}

if ( $fasindus_header_design_actual == 'style_one' ) {
  $fasindus_logo_url = $trlogo_url;
  $fasindus_logo_alt = $trlogo_alt;
} else {
  $fasindus_logo_url = $logo_url;
  $fasindus_logo_alt = $logo_alt;
  
}

if ( has_nav_menu( 'primary' ) ) {
  $logo_padding = ' has_menu ';
}
else {
   $logo_padding = ' dont_has_menu ';
}


// Logo Spacings
// Logo Spacings
$fasindus_brand_logo_top = cs_get_option( 'fasindus_logo_top' );
$fasindus_brand_logo_bottom = cs_get_option( 'fasindus_logo_bottom' );
if ( $fasindus_brand_logo_top ) {
  $fasindus_brand_logo_top = 'padding-top:'. fasindus_check_px( $fasindus_brand_logo_top ) .';';
} else { $fasindus_brand_logo_top = ''; }
if ( $fasindus_brand_logo_bottom ) {
  $fasindus_brand_logo_bottom = 'padding-bottom:'. fasindus_check_px( $fasindus_brand_logo_bottom ) .';';
} else { $fasindus_brand_logo_bottom = ''; }
?>
<div class="site-logo <?php echo esc_attr( $logo_padding ); ?>"  style="<?php echo esc_attr( $fasindus_brand_logo_top ); echo esc_attr( $fasindus_brand_logo_bottom ); ?>">
   <?php if ( $fasindus_logo ) {
    ?>
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
       <img src="<?php echo esc_url( $fasindus_logo_url ); ?>" alt=" <?php echo esc_attr( $fasindus_logo_alt ); ?>">
     </a>
   <?php } elseif( has_custom_logo() ) {
      the_custom_logo();
    } else {
    ?>
    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
       <img src="<?php echo esc_url( $fasindus_logo_url ); ?>" alt="<?php echo get_bloginfo('name'); ?>">
     </a>
   <?php
  } ?>
</div>