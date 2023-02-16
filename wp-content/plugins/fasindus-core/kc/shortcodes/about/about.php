<?php
if (!function_exists('fasindus_about_function')) {
    add_shortcode( 'ndrst_about', 'fasindus_about_function' );
    function fasindus_about_function($atts, $content = NULL){
      extract($atts);
      $e_uniqid       = uniqid();
      $inline_style   = '';

      if ( $subtitle_color || $subtitle_size ) {
        $inline_style .= '.fasindus-about-'.$e_uniqid .'.fasindus-about .section-title span {';
        $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
        $inline_style .= ( $subtitle_size ) ? 'font-size:'.fasindus_core_check_px($subtitle_size) .';' : '';
        $inline_style .= '}';
      }

      if ( $title_color || $title_size ) {
        $inline_style .= '.fasindus-about-'.$e_uniqid .'.fasindus-about .section-title h2 {';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
        $inline_style .= '}';
      }
    
      if ( $desc_size || $desc_color  ) {
        $inline_style .= '.fasindus-about-'.$e_uniqid .'.fasindus-about .details p,.fasindus-about-'.$e_uniqid .'.fasindus-about .details ul li,.fasindus-about-'.$e_uniqid .'.fasindus-about .bottom-area span,.fasindus-about-'.$e_uniqid .'.fasindus-about .video-btn span {';
        $inline_style .= ( $desc_size ) ? 'font-size:'.fasindus_core_check_px($desc_size) .';' : '';
        $inline_style .= ( $desc_color ) ? 'color:'. $desc_color .';' : '';
        $inline_style .= '}';
      }

      if ( $button_color || $button_bgcolor ) {
        $inline_style .= '.fasindus-about-'.$e_uniqid .'.fasindus-about .bottom-area a.theme-btn {';
        $inline_style .= ( $button_color ) ? 'color:'. $button_color .';' : '';
        $inline_style .= ( $button_bgcolor ) ? 'background-color:'. $button_bgcolor .';' : '';
        $inline_style .= '}';
      }
      if ( $icon_color ) {
        $inline_style .= '.fasindus-about-'.$e_uniqid .'.fasindus-about .details ul li:before,.fasindus-about-'.$e_uniqid .'.fasindus-about .bottom-area .icon i,.fasindus-about-'.$e_uniqid .'.fasindus-about .video .fi:before {';
        $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
        $inline_style .= '}';
      }

    // add inline style
  add_inline_style( $inline_style );
  $styled_class  = 'fasindus-about-'.$e_uniqid.' ';
  $image_url = wp_get_attachment_url( $image_url );
  $image_alt = get_post_meta( $image_url, '_wp_attachment_image_alt', true);
  $about_items = ( $about_items ) ? (array) $about_items : array();
  ob_start(); ?>
  <?php if ( $about_style == 'standard' ) { ?>
  <section class="fasindus-about about-us-section <?php echo esc_attr( $class.$styled_class ); ?>">
      <div class="row">
          <div class="col col-md-7">
              <div class="section-title">
                  <?php if ( $subtitle ) { ?>
                    <span><?php echo esc_html( $subtitle ); ?></span>
                  <?php } 
                  if ( $title ) { ?>
                    <h2><?php echo wp_kses_post( $title ); ?></h2>
                  <?php } ?>
              </div>
              <div class="details">
                  <?php echo wp_kses_post( $desc );?>
              </div>
              <div class="bottom-area">
                <?php if ( $cell_number || $number_title || $cell_icon ) { ?>
                  <div class="contact">
                      <div class="icon">
                          <i class="<?php echo esc_attr( $cell_icon ); ?>"></i>
                      </div>
                      <div class="info">
                          <h3><?php echo esc_html( $cell_number ); ?></h3>
                          <span><?php echo esc_html( $number_title ); ?></span>
                      </div>
                  </div>
                <?php } 
                if ( $button_link && $button_title ) { ?>
                 <div class="btn-holder">
                      <a href="<?php echo esc_url( $button_link ); ?>" class="theme-btn"><?php echo esc_html( $button_title ); ?></a>
                  </div>
                <?php } 
                if ( $video_link && $video_title ) { ?>
                  <div class="video">
                      <a href="<?php echo esc_url( $video_link ); ?>" class="video-btn" data-type="iframe" tabindex="0"><i class="fi flaticon-play-button"></i> <span><?php echo esc_html( $video_title ); ?></span></a>
                  </div>
                <?php } ?>
              </div>
          </div>
          <div class="col col-md-5">
              <div class="img-holder about-image">
                  <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
              </div>
          </div>
      </div>
  </section>
  <?php } elseif ( $about_style == 'classic' ) { ?>
  <section class="fasindus-about about-us-section-s2 <?php echo esc_attr( $class.$styled_class ); ?>">
    <div class="row">
        <div class="col col-md-5">
            <div class="img-holder about-image">
                 <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
            </div>
        </div>
        <div class="col col-md-7">
            <div class="about-details">
                <div class="section-title">
                   <?php if ( $subtitle ) { ?>
                      <span><?php echo esc_html( $subtitle ); ?></span>
                    <?php } 
                    if ( $title ) { ?>
                      <h2><?php echo wp_kses_post( $title ); ?></h2>
                    <?php } ?>
                </div>
                <div class="details">
                    <?php echo wp_kses_post( $desc );?>
                </div>
               <div class="bottom-area">
                  <?php if ( $cell_number || $number_title || $cell_icon ) { ?>
                    <div class="contact">
                        <div class="icon">
                            <i class="<?php echo esc_attr( $cell_icon ); ?>"></i>
                        </div>
                        <div class="info">
                            <h3><?php echo esc_html( $cell_number ); ?></h3>
                            <span><?php echo esc_html( $number_title ); ?></span>
                        </div>
                    </div>
                  <?php } 
                  if ( $button_link && $button_title ) { ?>
                   <div class="btn-holder">
                        <a href="<?php echo esc_url( $button_link ); ?>" class="theme-btn"><?php echo esc_html( $button_title ); ?></a>
                    </div>
                  <?php } 
                  if ( $video_link && $video_title ) { ?>
                    <div class="video">
                        <a href="<?php echo esc_url( $video_link ); ?>" class="video-btn" data-type="iframe" tabindex="0"><i class="fi flaticon-play-button"></i> <span><?php echo esc_html( $video_title ); ?></span></a>
                    </div>
                  <?php } ?>
              </div>
            </div>
        </div>
    </div>
  </section>
  <?php } else { ?>
  <section class="fasindus-about about-us-section-s3 <?php echo esc_attr( $class.$styled_class ); ?>">
      <div class="row">
          <div class="about-area">
              <div class="section-title">
                <?php if ( $subtitle ) { ?>
                  <span><?php echo esc_html( $subtitle ); ?></span>
                <?php } 
                if ( $title ) { ?>
                  <h2><?php echo wp_kses_post( $title ); ?></h2>
                <?php } ?>
              </div>
              <div class="details">
                  <?php echo wp_kses_post( $desc );
                  if ( $about_items ) {
                    foreach ($about_items as $key => $about_item ) { 
                      if ( isset( $about_item->title ) && !empty( $about_item->title ) ) { ?>
                     <div>
                      <h4><i class="ti-arrow-circle-right"></i><?php echo esc_html( $about_item->title ); ?></h4>
                      <p><?php echo esc_html( $about_item->desc ); ?></p>
                  </div>
                  <?php } }
                  } ?>
              </div>
          </div>
      </div>
  </section>
  <?php } 
  return ob_get_clean();
  }
}