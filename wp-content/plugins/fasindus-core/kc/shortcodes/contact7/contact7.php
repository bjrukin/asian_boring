<?php
/* ==========================================================
  Contact form 7
=========================================================== */
if ( !function_exists('fasindus_contact7_function')) {
  function fasindus_contact7_function( $atts, $content = NULL ) {
    extract($atts);

      $e_uniqid       = uniqid();
      $inline_style   = '';

       if ( $title_color || $title_size ) {
        $inline_style .= '.indrst-contact-'.$e_uniqid .' .section-title h2 {';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
        $inline_style .= '}';
      }
  
      if ( $subtitle_color || $subtitle_size ) {
        $inline_style .= '.indrst-contact-'.$e_uniqid .' .section-title span {';
        $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
        $inline_style .= ( $subtitle_size ) ? 'font-size:'.fasindus_core_check_px($subtitle_size) .';' : '';
        $inline_style .= '}';
      }
  
      if (  $call_info_color  ) {
        $inline_style .= '.indrst-contact-'.$e_uniqid .'.contact-section .left-col h3 {';
        $inline_style .= ( $call_info_color ) ? 'color:'. $call_info_color .';' : '';
        $inline_style .= '}';
      }

      if (  $call_info_desc_color  ) {
        $inline_style .= '.indrst-contact-'.$e_uniqid .'.contact-section .left-col .call-back span {';
        $inline_style .= ( $call_info_desc_color ) ? 'color:'. $call_info_desc_color .';' : '';
        $inline_style .= '}';
      }

      if ( $button_color ) {
        $inline_style .= '.indrst-contact-'.$e_uniqid .'.indrst-contact .wpcf7 .wpcf7-form-control.wpcf7-submit {';
        $inline_style .= ( $button_color ) ? 'color:'. $button_color .';' : '';
        $inline_style .= '}';
      }
      if ( $bg_color ) {
        $inline_style .= '.indrst-contact-'.$e_uniqid .'.indrst-contact .wpcf7 .wpcf7-form-control.wpcf7-submit {';
        $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
        $inline_style .= '}';
      }
      if ( $button_hover ) {
        $inline_style .= '.indrst-contact-'.$e_uniqid .'.indrst-contact .wpcf7 .wpcf7-form-control.wpcf7-submit:hover {';
        $inline_style .= ( $button_hover ) ? 'background-color:'. $button_hover .';' : '';
        $inline_style .= '}';
      }
      if ( $input_border ) {
        $inline_style .= '.indrst-contact-'.$e_uniqid .'.indrst-contact .wpcf7 input , .indrst-contact-'.$e_uniqid .'.indrst-contact .wpcf7 textarea , .indrst-contact-'.$e_uniqid .'.indrst-contact form select {';
        $inline_style .= ( $input_border ) ? 'border-color:'. $input_border .';' : '';
        $inline_style .= '}';
      }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' indrst-contact-'.$e_uniqid.' ';
    $contact_id = ( $contact_id ) ? $contact_id : 0;

    $image_url = wp_get_attachment_url( $image_url );
    $image_alt = get_post_meta( $image_url, '_wp_attachment_image_alt', true);

    ob_start(); ?>
    <?php if ( $contact_style == 'standard' ) { ?>
    <section class="indrst-contact contact-section <?php echo esc_attr( $styled_class.$class ); ?>">
        <div class="row">
            <div class="col col-md-6">
                <div class="left-col">
                    <div class="img-holder">
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                        <div class="call-back">
                            <?php echo wp_kses_post( $call_info ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-md-6">
                <div class="contact-form">
                    <div class="section-title">
                        <span><?php echo esc_html( $title ); ?></span>
                        <h2><?php echo wp_kses_post( $desc ); ?></h2>
                    </div>
                    <?php echo do_shortcode( '[contact-form-7 id="'. $contact_id .'"]' ); ?>
                </div>
            </div>
        </div>
    </section>
    <?php } else { ?>
    <section class="indrst-contact contact-pg-section">
        <div class="row">
            <div class="section-title">
               <span><?php echo esc_html( $title ); ?></span>
               <h2><?php echo wp_kses_post( $desc ); ?></h2>
            </div>
        </div>
        <div class="row">
          <div class="contact-form">
            <?php echo do_shortcode( '[contact-form-7 id="'. $contact_id .'"]' ); ?>
          </div> 
        </div>
    </section>
    <?php }
   return ob_get_clean();
  }
}
add_shortcode( 'indrsl_ontact7', 'fasindus_contact7_function' );
