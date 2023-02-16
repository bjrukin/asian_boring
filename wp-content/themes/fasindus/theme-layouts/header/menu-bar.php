<?php
  // Metabox
  $fasindus_id    = ( isset( $post ) ) ? $post->ID : 0;
  $fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
  $fasindus_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fasindus_id;
  $fasindus_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $fasindus_id : false;
  $fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox', true );

  // Header Style
  if ( $fasindus_meta ) {
    $fasindus_header_design  = $fasindus_meta['select_header_design'];
    $fasindus_sticky_header = isset( $fasindus_meta['sticky_header'] ) ? $fasindus_meta['sticky_header'] : '' ;
    $fasindus_search = isset( $fasindus_meta['fasindus_search'] ) ? $fasindus_meta['fasindus_search'] : '';
  } else {
    $fasindus_header_design  = cs_get_option( 'select_header_design' );
    $fasindus_sticky_header  = cs_get_option( 'sticky_header' );
    $fasindus_search  = cs_get_option( 'fasindus_search' );
  }

  $fasindus_cart_widget  = cs_get_option( 'fasindus_cart_widget' );

  if ( $fasindus_header_design === 'default' ) {
    $fasindus_header_design_actual  = cs_get_option( 'select_header_design' );
  } else {
    $fasindus_header_design_actual = ( $fasindus_header_design ) ? $fasindus_header_design : cs_get_option('select_header_design');
  }
  $fasindus_header_design_actual = $fasindus_header_design_actual ? $fasindus_header_design_actual : 'style_one';

  if ( $fasindus_meta && $fasindus_header_design !== 'default') {
   $fasindus_search = isset( $fasindus_meta['fasindus_search'] ) ? $fasindus_meta['fasindus_search'] : '';
  } else {
    $fasindus_search  = cs_get_option( 'fasindus_search' );
  }

  if ( $fasindus_header_design_actual == 'style_three'  ) {
    $menu_container = 'container ';
  } else {
    $menu_container = 'container-fluid ';
  }
  if ( $fasindus_cart_widget ) {
   $cart_class = ' has-cart ';
  } else {
    $cart_class = ' not-has-cart ';
  }
  if ( $fasindus_search ) {
   $search_class = ' not-has-search ';
  } else {
    $search_class = ' has-search ';
  }
  if ( has_nav_menu( 'primary' ) ) {
     $menu_padding = ' has-menu ';
  } else {
     $menu_padding = ' dont-has-menu ';
  }
  if ($fasindus_meta) {
    $fasindus_choose_menu = $fasindus_meta['choose_menu'];
  } else { $fasindus_choose_menu = ''; }
  $fasindus_choose_menu = $fasindus_choose_menu ? $fasindus_choose_menu : '';

?>
<!-- Navigation & Search -->
 <div class="<?php echo esc_attr( $menu_container ); ?>">
      <div class="navbar-header">
          <button type="button" class="open-btn">
              <span class="sr-only"><?php echo esc_html__( 'Toggle navigation','fasindus' ) ?></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <?php get_template_part( 'theme-layouts/header/logo' ); ?>
      </div>
    <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder <?php echo esc_attr( $menu_padding.$cart_class.$search_class ); ?>">
     <button class="close-navbar"><i class="ti-close"></i></button>
       <?php
          wp_nav_menu(
            array(
              'menu'              => 'primary',
              'theme_location'    => 'primary',
              'container'         => '',
              'container_class'   => '',
              'container_id'      => '',
              'menu'              => $fasindus_choose_menu,
              'menu_class'        => 'nav navbar-nav',
              'fallback_cb'       => '__return_false',
            )
          );
        ?>
      </div><!-- end of nav-collapse -->
      <?php get_template_part( 'theme-layouts/header/search','bar' ); ?>
  </div><!-- end of container -->


