<?php
if (!function_exists('fasindus_experiene_function')) {
    add_shortcode( 'ndrst_experiene', 'fasindus_experiene_function' );
    function fasindus_experiene_function($atts, $content = NULL){
      extract($atts);
      $e_uniqid       = uniqid();
      $inline_style   = '';

      if ( $subtitle_color || $subtitle_size ) {
        $inline_style .= '.why-choose-us-section-'.$e_uniqid .' .section-title > span {';
        $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
        $inline_style .= ( $subtitle_size ) ? 'font-size:'.fasindus_core_check_px($subtitle_size) .';' : '';
        $inline_style .= '}';
      }

      if ( $subtitle_color ) {
        $inline_style .= '.why-choose-us-section-'.$e_uniqid .'.why-choose-us-section .section-title span {';
        $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
        $inline_style .= '}';
      }

      if ( $title_color || $title_size ) {
        $inline_style .= '.why-choose-us-section-'.$e_uniqid .'.why-choose-us-section .section-title h2 {';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
        $inline_style .= '}';
      }
    
      if ( $desc_size || $desc_color  ) {
        $inline_style .= '.why-choose-us-section-'.$e_uniqid .'.why-choose-us-section .details p {';
        $inline_style .= ( $desc_size ) ? 'font-size:'.fasindus_core_check_px($desc_size) .';' : '';
        $inline_style .= ( $desc_color ) ? 'color:'. $desc_color .';' : '';
        $inline_style .= '}';
      }

      if ( $prograss_color ) {
        $inline_style .= '.why-choose-us-section-'.$e_uniqid .'.why-choose-us-section .skills .progress-bar {';
        $inline_style .= ( $prograss_color ) ? 'background-color:'. $prograss_color .';' : '';
        $inline_style .= '}';
      }

      if ( $prograss_title ) {
        $inline_style .= '.why-choose-us-section-'.$e_uniqid .'.why-choose-us-section .skills h6 {';
        $inline_style .= ( $prograss_title ) ? 'color:'. $prograss_title .';' : '';
        $inline_style .= '}';
      }

      if ( $prograss_number ) {
        $inline_style .= '.why-choose-us-section-'.$e_uniqid .'.why-choose-us-section .skills .progress > span {';
        $inline_style .= ( $prograss_number ) ? 'color:'. $prograss_number .';' : '';
        $inline_style .= '}';
      }

    // add inline style
  add_inline_style( $inline_style );
  $styled_class  = 'why-choose-us-section-'.$e_uniqid.' ';
  $image_url = wp_get_attachment_url( $image_url );
  $image_alt = get_post_meta( $image_url, '_wp_attachment_image_alt', true);
  $experiene_items = ( $experiene_items ) ? (array) $experiene_items : array();

  if ( $image_url ) {
    $experience_bg = ' style="';
    $experience_bg .= ( $image_url ) ? 'background-image: url( '. $image_url .' );' : '';
    $experience_bg .= '"';
  } else {
    $experience_bg = '';
  }

  ob_start(); ?>
  <?php if ( $experiene_style == 'standard' ) { ?>
    <section class="why-choose-us-section <?php echo esc_attr( $class.$styled_class ); ?>">
        <div class="content-area">
            <div class="left-col">
                <div class="section-title">
                    <?php if ( $subtitle ) { ?>
                      <span><?php echo esc_html( $subtitle ); ?></span>
                    <?php } 
                    if ( $title ) { ?>
                      <h2><?php echo wp_kses_post( $title ); ?></h2>
                    <?php } ?>
                </div>
                <div class="details">
                    <p><?php echo wp_kses_post( $desc ); ?></p>
                    <div class="skills">
                    <?php  if ( $experiene_items ) {
                      foreach ($experiene_items as $key => $experiene_item ) { 
                      if ( isset( $experiene_item->title ) && !empty( $experiene_item->title ) ) { ?>
                        <div class="skill">
                            <h6><?php echo esc_html( $experiene_item->title ); ?></h6>
                            <div class="progress">
                                <div class="progress-bar" data-percent="<?php echo esc_attr( $experiene_item->parcent ); ?>"></div>
                            </div>
                        </div>
                      <?php } }
                        } ?>
                    </div>
                </div>
            </div>
            <div class="right-col" <?php echo wp_kses_post( $experience_bg ); ?>></div>
        </div>
    </section>
  <?php } elseif( $experiene_style == 'classic' ) { ?>
  <section class="why-choose-us-section <?php echo esc_attr( $class.$styled_class ); ?>">
      <div class="row">
          <div class="col col-md-6">
              <div class="inner-area">
                  <div class="section-title">
                    <?php if ( $subtitle ) { ?>
                      <span><?php echo esc_html( $subtitle ); ?></span>
                    <?php } 
                    if ( $title ) { ?>
                      <h2><?php echo wp_kses_post( $title ); ?></h2>
                    <?php } ?>
                  </div>
                  <div class="details">
                      <p><?php echo wp_kses_post( $desc ); ?></p>
                      <div class="skills">
                        <?php  if ( $experiene_items ) {
                          foreach ($experiene_items as $key => $experiene_item ) { 
                          if ( isset( $experiene_item->title ) && !empty( $experiene_item->title ) ) { ?>
                            <div class="skill">
                                <h6><?php echo esc_html( $experiene_item->title ); ?></h6>
                                <div class="progress">
                                    <div class="progress-bar" data-percent="<?php echo esc_attr( $experiene_item->parcent ); ?>"></div>
                                </div>
                            </div>
                        <?php } }
                        } ?>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col col-md-6">
              <div class="img-holder">
                  <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
              </div>
          </div>
      </div>
  </section>
  <?php } else { ?>
  <section class="why-choose-us-section why-choose-faq-section">
      <div class="inner-area">

          <div class="section-title">
             <?php if ( $subtitle ) { ?>
              <span><?php echo esc_html( $subtitle ); ?></span>
            <?php } 
            if ( $title ) { ?>
              <h2><?php echo wp_kses_post( $title ); ?></h2>
            <?php } ?>
          </div>
          <div class="details">
              <p><?php echo wp_kses_post( $desc ); ?></p>
              <div class="skills">
              <?php  if ( $experiene_items ) {
                foreach ($experiene_items as $key => $experiene_item ) { 
                if ( isset( $experiene_item->title ) && !empty( $experiene_item->title ) ) { ?>
                  <div class="skill">
                      <h6><?php echo esc_html( $experiene_item->title ); ?></h6>
                      <div class="progress">
                          <div class="progress-bar" data-percent="<?php echo esc_attr( $experiene_item->parcent ); ?>"></div>
                      </div>
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