<?php
/*
 * The header for our theme.
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */
?><!DOCTYPE html>
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php
$fasindus_viewport = cs_get_option( 'theme_responsive' );
if( !$fasindus_viewport ) { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php } $fasindus_all_element_color  = cs_get_customize_option( 'all_element_colors' ); ?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr( $fasindus_all_element_color ); ?>">
<meta name="theme-color" content="<?php echo esc_attr( $fasindus_all_element_color ); ?>">
<link rel="profile" href="//gmpg.org/xfn/11">
<?php
// Metabox
global $post;
$fasindus_id    = ( isset( $post ) ) ? $post->ID : false;
$fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
$fasindus_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fasindus_id;
$fasindus_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $fasindus_id : false;
$fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox', true );
// Theme Layout Width
$fasindus_layout_width  = cs_get_option( 'theme_layout_width' );
$theme_preloder  = cs_get_option( 'theme_preloder' );
$fasindus_layout_width_class = ( $fasindus_layout_width === 'container' ) ? 'layout-boxed' : 'layout-full';
// Header Style
if ( $fasindus_meta ) {
  $fasindus_header_design  = $fasindus_meta['select_header_design'];
  $fasindus_sticky_header = isset( $fasindus_meta['sticky_header'] ) ? $fasindus_meta['sticky_header'] : '' ;
} else {
  $fasindus_header_design  = cs_get_option( 'select_header_design' );
  $fasindus_sticky_header  = cs_get_option( 'sticky_header' );
}

if ( $fasindus_header_design === 'default' ) {
  $fasindus_header_design_actual  = cs_get_option( 'select_header_design' );
} else {
  $fasindus_header_design_actual = ( $fasindus_header_design ) ? $fasindus_header_design : cs_get_option('select_header_design');
}

$fasindus_header_design_actual = $fasindus_header_design_actual ? $fasindus_header_design_actual : 'style_one';

if ( $fasindus_header_design_actual == 'style_one' ) {
  $header_class = 'header-style-1';
} elseif ( $fasindus_header_design_actual == 'style_two' ) {
  $header_class = 'header-style-2';
}  else {
  $header_class = 'header-style-2';
}


if ( $fasindus_sticky_header ) {
  $fasindus_sticky_header = $fasindus_sticky_header ? ' sticky-menu-on ' : '';
} else {
  $fasindus_sticky_header = '';
}
// Header Transparent
if ( $fasindus_meta ) {
  $fasindus_transparent_header = $fasindus_meta['transparency_header'];
  $fasindus_transparent_header = $fasindus_transparent_header ? ' header-transparent' : ' dont-transparent';
  // Shortcode Banner Type
  $fasindus_banner_type = ' '. $fasindus_meta['banner_type'];
} else { $fasindus_transparent_header = ' dont-transparent'; $fasindus_banner_type = ''; }
wp_head();
?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrapper <?php echo esc_attr( $fasindus_layout_width_class ); ?>"> <!-- #fasindus-theme-wrapper -->
<?php if( $theme_preloder ) {
 get_template_part( 'theme-layouts/header/preloder' );
 } ?>
 <header id="header" class="site-header <?php echo esc_attr( $header_class ); ?>">
      <?php  get_template_part( 'theme-layouts/header/top','bar' ); ?>
      <nav class="navigation <?php echo esc_attr( $fasindus_sticky_header ); ?> navbar navbar-default">
        <?php get_template_part( 'theme-layouts/header/menu','bar' ); ?>
      </nav>
  </header>
  <?php
  // Title Area
  $fasindus_need_title_bar = cs_get_option('need_title_bar');
  if ( !$fasindus_need_title_bar ) {
    get_template_part( 'theme-layouts/header/title', 'bar' );
  }
