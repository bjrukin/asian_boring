<?php
/* ==========================================================
  CTA Info
=========================================================== */
if ( !function_exists('fasindus_cta_shortcode_function')) {
  function fasindus_cta_shortcode_function( $atts, $content = true ) {
  	extract($atts);
  	$e_uniqid       = uniqid();
    $inline_style   = '';

    if ( $title_color || $title_size ) {
        $inline_style .= '.endst-cta-'. $e_uniqid .'.endst-cta .cta-details h2 {';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
        $inline_style .= '}';
      } 
    if ( $subtitle_color || $subtitle_size ) {
        $inline_style .= '.endst-cta-'. $e_uniqid .'.endst-cta .cta-details p {';
        $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
        $inline_style .= ( $subtitle_size ) ? 'font-size:'.fasindus_core_check_px($subtitle_size) .';' : '';
        $inline_style .= '}';
      }
   
    if ( $icon_color ) {
      $inline_style .= '.endst-cta-'. $e_uniqid .'.endst-cta.cta-section .fi:before {';
      $inline_style .= ( $icon_color ) ? 'background:-webkit-linear-gradient('. $icon_color .', #fff);-webkit-background-clip: text;
    -webkit-text-fill-color: transparent;' : '';
      $inline_style .= '}';
    }

    if ( $btn_color || $btn_bgcolor ) {
      $inline_style .= '.endst-cta-'. $e_uniqid .'.endst-cta .cta-details a.theme-btn {';
      $inline_style .= ( $btn_color ) ? 'color:'. $btn_color .';' : '';
      $inline_style .= ( $btn_bgcolor ) ? 'background-color:'. $btn_bgcolor .';' : '';
      $inline_style .= '}';
    }

    // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' endst-cta-'. $e_uniqid.' ';

  if ( $cta_style == 'standard' ) { 
    $cta_class = 'cta-section ';
  } else {
    $cta_class = 'cta-section-s2 ';
  }

  ob_start(); ?>
  <section class="endst-cta <?php echo esc_attr( $cta_class.$styled_class.$class ); ?>">
    <div class="container">
      <div class="row">
          <div class="col col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2">
              <div class="cta-details">
                <?php if ( $cta_style == 'classic' ) { ?>
                <p><?php echo esc_html( $subtitle ); ?></p>
                <?php } 
                if ( $cta_style == 'standard') { ?>
                 <div class="video">
                    <a href="<?php echo esc_url( $video_link ); ?>" class="video-btn" data-type="iframe" tabindex="0">
                      <i class="fi <?php echo esc_attr( $cta_icon ); ?>"></i>
                    </a>
                  </div>
                <?php } ?>
                  <h2><?php echo esc_html( $title ); ?></h2>
                <?php if ( $cta_style == 'classic') { ?>
                  <a href="<?php echo esc_url( $link ); ?>" class="theme-btn">
                    <?php echo esc_html( $link_text ); ?>
                  </a>
                <?php } ?>
              </div>
          </div>
      </div>  
    </div>
  </section>
  <?php return ob_get_clean();
  }
}
add_shortcode( 'endrst_cta', 'fasindus_cta_shortcode_function' );