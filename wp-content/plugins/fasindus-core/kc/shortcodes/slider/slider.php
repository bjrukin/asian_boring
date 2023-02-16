<?php
if (!function_exists('fasindus_slider_function')) {
    add_shortcode( 'aqt_slider', 'fasindus_slider_function' );
    function fasindus_slider_function($atts, $content ){
      extract($atts);

      $e_uniqid       = uniqid();
      $inline_style   = '';
     
      if ( $title_size || $title_color ) {
        $inline_style .= '.fasindus-hero-'.$e_uniqid .'.fasindus-hero .slide-title > h2 {';
        $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= '}';
      }

      if ( $subtitle_size || $subtitle_color ) {
        $inline_style .= '.fasindus-hero-'.$e_uniqid .'.fasindus-hero .slide-subtitle span {';
        $inline_style .= ( $subtitle_size ) ? 'font-size:'.fasindus_core_check_px($subtitle_size) .';' : '';
        $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
        $inline_style .= '}';
      }

      if ( $subtitle_bgcolor ) {
        $inline_style .= '.fasindus-hero-'.$e_uniqid .'.fasindus-hero .slide-subtitle span {';
        $inline_style .= ( $subtitle_bgcolor ) ? 'background-color:'. $subtitle_bgcolor .';' : '';
        $inline_style .= '}';
      }

      if ( $btn_size || $btn_color || $btn_bg_color ) {
        $inline_style .= '.page-wraper .fasindus-hero-'.$e_uniqid .'.fasindus-hero .slide-btns a {';
        $inline_style .= ( $btn_size ) ? 'font-size:'.fasindus_core_check_px($btn_size) .';' : '';
        $inline_style .= ( $btn_color ) ? 'color:'. $btn_color .';' : '';
        $inline_style .= ( $btn_bg_color ) ? 'background-color:'. $btn_bg_color .';' : '';
        $inline_style .= '}';
      }
      if ( $btn_size || $btn_color ) {
        $inline_style .= '.page-wraper .fasindus-hero-'.$e_uniqid .'.fasindus-hero .slide-btns a {';
        $inline_style .= ( $btn_size ) ? 'font-size:'.fasindus_core_check_px($btn_size) .';' : '';
        $inline_style .= ( $btn_color ) ? 'color:'. $btn_color .';' : '';
        $inline_style .= '}';
      }
      if ( $btn_hover || $btn_hover_bg ) {
        $inline_style .= '.page-wraper .fasindus-hero-'.$e_uniqid .'.fasindus-hero .slide-btns a:hover {';
        $inline_style .= ( $btn_hover ) ? 'color:'. $btn_hover .';' : '';
        $inline_style .= ( $btn_hover_bg ) ? 'background-color:'. $btn_hover_bg .';' : '';
        $inline_style .= ( $btn_hover_bg ) ? 'border-color:'. $btn_hover_bg .';' : '';
        $inline_style .= '}';
      }
      if ( $nav_color ) {
        $inline_style .= '.page-wraper .fasindus-hero-'.$e_uniqid .'.fasindus-hero .swiper-button-prev:before , .page-wraper .fasindus-hero-'.$e_uniqid .'.fasindus-hero .swiper-button-next:before  {';
        $inline_style .= ( $nav_color ) ? 'color:'. $nav_color .';' : '';
        $inline_style .= '}';
      }
      if ( $nav_bgcolor ) {
        $inline_style .= '.page-wraper .fasindus-hero-'.$e_uniqid .'.fasindus-hero .swiper-button-prev , .page-wraper .fasindus-hero-'.$e_uniqid .'.fasindus-hero .swiper-button-next  {';
        $inline_style .= ( $nav_bgcolor ) ? 'background-color:'. $nav_bgcolor .';' : '';
        $inline_style .= '}';
      }

      if ( $slide_style == 'style_one' ) {
        $slide_class = ' hero-style-1 ';
      } elseif( $slide_style == 'style_two' )  {
        $slide_class = ' hero-style-2 ';
      } else {
         $slide_class = ' hero-style-3 ';
      }

    $slider_items = ( $slider_items ) ? (array) $slider_items : array();
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fasindus-hero-'.$e_uniqid.' ';

    ob_start(); ?>
    <section class="hero-slider fasindus-hero <?php echo esc_attr( $slide_class.$styled_class.$class ); ?>">
      <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php if ( $slider_items ) {
              foreach ( $slider_items as $key => $slider_item ) {
              if ( isset( $slider_item->slider_image ) && !empty( $slider_item->slider_image ) ) {
              $image_url = wp_get_attachment_url( $slider_item->slider_image );
              $image_alt = get_post_meta($slider_item->slider_image, '_wp_attachment_image_alt', true);
              ?>
              <div class="swiper-slide">
                  <div class="slide-inner slide-bg-image" data-background="<?php echo esc_attr( $image_url ); ?>">
                      <div class="container">
                        <?php if ( $slider_item->subtitle ) { ?>
                          <div  data-swiper-parallax="300" class="slide-subtitle">
                              <span><?php echo esc_html( $slider_item->subtitle ); ?></span>
                          </div>
                        <?php } 
                        if ( $slider_item->title ) { ?>
                          <div data-swiper-parallax="400" class="slide-title">
                              <h2><?php echo wp_kses_post( $slider_item->title ); ?></h2>
                          </div>
                        <?php } ?>
                          <div class="clearfix"></div>
                        <?php if ( $slider_item->button_text || $slider_item->button2_text ) { ?>
                          <div data-swiper-parallax="500" class="slide-btns">
                              <a href="<?php echo esc_url( $slider_item->button_link ); ?>" class="theme-btn">
                                  <?php echo esc_html( $slider_item->button_text ); ?>
                              </a>
                              <a href="<?php echo esc_url( $slider_item->button2_link ); ?>" class="theme-btn-s2">
                                  <?php echo esc_html( $slider_item->button2_text ); ?>
                              </a>
                          </div>
                        <?php } ?>
                      </div>
                  </div> <!-- end slide-inner -->
              </div><!-- end swiper-slide -->
            <?php } } } ?>
          </div>
          <!-- end swiper-wrapper -->
          <!-- swipper controls -->
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
      </div>
    </section> 
  <?php return ob_get_clean();
  }
}