<?php
/* ==========================================================
  Testimonials
=========================================================== */
if ( !function_exists('fasindus_testimonial_function')) {
  function fasindus_testimonial_function( $atts, $content = NULL ) {
    extract($atts);

    $e_uniqid       = uniqid();
    $inline_style   = '';

    if ( $title_size || $title_color ) {
      $title_style = ' style="';
      $title_style .= $title_size ? 'font-size: '. fasindus_plugin_check_px($title_size) .';': '';
      $title_style .= $title_color ? 'color: '.$title_color : '';
      $title_style .= '"';
    } else {
      $title_style = '';
    }

    if ( $desc_size || $desc_color ) {
      $desc_style = ' style="';
      $desc_style .= $desc_size ? 'font-size: '. fasindus_plugin_check_px($desc_size) .';': '';
      $desc_style .= $desc_color ? 'color: '.$desc_color : '';
      $desc_style .= '"';
    } else {
      $desc_style = '';
    }

    if ( $name_size || $name_color ) {
      $name_style = ' style="';
      $name_style .= $name_size ? 'font-size: '. fasindus_plugin_check_px($name_size) .';': '';
      $name_style .= $name_color ? 'color: '.$name_color : '';
      $name_style .= '"';
    } else {
      $name_style = '';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'fasindus-testimonials-'.$e_uniqid.' ';

    $testimonial_items = ( $testimonial_items ) ? (array) $testimonial_items : array();


    if ( $testimonial_style == 'standard' ) {
      $section_class = 'testimonials-section ';
      $slide_class = ' testimonials-slider';
    } elseif ( $testimonial_style == 'carousel' ) {
       $section_class = 'testimonials-section-s2 ';
       $slide_class = ' testimonials-slider-s2';
    } else {
      $section_class = 'testimonials-section-s3 ';
      $slide_class = ' clearfix';
    }

  ob_start(); ?>
  <section class="fasindus-testimonials <?php echo esc_attr( $section_class.$class.$styled_class ); ?>">
    <div class="row">
        <div class="col col-xs-12">
            <div class="testimonial-grids <?php echo esc_attr( $slide_class ); ?>">
              <?php if ( $testimonial_items ) {
                foreach ( $testimonial_items as $key => $testimonial_item ) { 
                if ( isset( $testimonial_item->title ) && !empty( $testimonial_item->desc ) ) {
                $image_url = wp_get_attachment_url( $testimonial_item->image_url );
                $image_alt = get_post_meta( $testimonial_item->image_url, '_wp_attachment_image_alt', true);  ?>
                <div class="grid">
                    <div class="client-info">
                        <div class="client-pic">
                            <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                        </div>
                        <h4 <?php echo wp_kses_post( $name_style ); ?>><?php echo esc_html( $testimonial_item->name ); ?></h4>
                        <span <?php echo wp_kses_post( $title_style ); ?>><?php echo esc_html( $testimonial_item->title ); ?></span>
                    </div>
                    <div class="client-quote">
                       <p <?php echo wp_kses_post( $desc_style ); ?>><?php echo esc_html( $testimonial_item->desc ); ?></p>
                    </div>
                </div>
              <?php } } } ?>  
            </div>
        </div>
    </div>
  </section>
  <?php return ob_get_clean();
  }
}
add_shortcode( 'ndrst_testimonial', 'fasindus_testimonial_function' );
