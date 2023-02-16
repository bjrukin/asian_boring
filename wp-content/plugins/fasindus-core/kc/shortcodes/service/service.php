<?php
/* ==========================================================
  Service
=========================================================== */
if ( !function_exists('fasindus_service_function')) {
  function fasindus_service_function( $atts, $content = NULL ) {
    extract($atts);

    $e_uniqid       = uniqid();
    $inline_style   = '';

    if ( $icon_color || $icon_size ) {
      $inline_style .= '.fasindus-services-'.$e_uniqid .'.fasindus-services .service-grids .grid .icon i:before {';
      $inline_style .= ( $icon_size ) ? 'font-size:'.fasindus_core_check_px($icon_size) .';' : '';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= '}';
    }
    if ( $title_color || $title_size ) {
      $inline_style .= '.fasindus-services-'.$e_uniqid .'.fasindus-services .service-grids .grid h3 a {';
      $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    if ( $desc_color || $desc_size ) {
      $inline_style .= '.fasindus-services-'.$e_uniqid .'.fasindus-services .service-grids .grid p {';
      $inline_style .= ( $desc_size ) ? 'font-size:'.fasindus_core_check_px($desc_size) .';' : '';
      $inline_style .= ( $desc_color ) ? 'color:'. $desc_color .';' : '';
      $inline_style .= '}';
    }

      // add inline style
      add_inline_style( $inline_style );
      $styled_class  = ' fasindus-services-'.$e_uniqid.' ';

      if ( $service_style == 'style_one' ) {
        $service_class = 'services-section ';
        $content_class = 's1-details';
      }  elseif ( $service_style == 'style_two'  )  {
        $service_class = ' services-section-s2 ';
        $content_class = 'details';
      } else {
        $service_class = ' services-section-s3 ';
        $content_class = 'details';
      }

    ob_start();
    $args = array(
      'post_type' => 'service',
      'posts_per_page' => (int) $service_limit,
      'orderby' => $service_orderby,
      'order' => $service_order,
    );
    $fasindus_service = new WP_Query( $args );
    if ($fasindus_service->have_posts()) : ?>
      <section class="fasindus-services <?php echo esc_attr( $service_class.$styled_class.' '.$class ) ?>">
          <div class="row">
             <div class="col col-xs-12">
                <div class="service-grids clearfix">
                 <?php while ($fasindus_service->have_posts()) : $fasindus_service->the_post();
                  $service_options = get_post_meta( get_the_ID(), 'service_options', true );
                  $service_title = isset($service_options['service_title']) ? $service_options['service_title'] : '';
                  $service_image = isset($service_options['service_image']) ? $service_options['service_image'] : '';
                  $service_icon = isset($service_options['service_icon']) ? $service_options['service_icon'] : '';
                  $read_more_text = $read_more_text ? $read_more_text : esc_html__( 'Read More', 'fasindus' );

                  $image_url = wp_get_attachment_url( $service_image );
                  $image_alt = get_post_meta( $service_image, '_wp_attachment_image_alt', true);

                  $service_title = preg_replace('~\s*<br ?/?>\s*~',"<br />",$service_title);
                  $service_title = nl2br($service_title);

                  $service_excerpt_limit = $service_excerpt_limit ? $service_excerpt_limit : 'none';
                  ?>
              
                  <div class="grid">
                    <?php if ( $service_style == 'style_two'  ) { ?>
                     <div class="img-holder">
                          <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                      </div>
                    <?php } if ( $service_style == 'style_one'  ) { ?>
                      <div class="icon">
                          <i class="fi <?php echo esc_attr( $service_icon ); ?>"></i>
                      </div>
                    <?php } ?>     
                      <div class="<?php echo esc_attr( $content_class ); ?>">
                        <?php if ( $service_style == 'style_two' || $service_style == 'style_three'   ) { ?>  
                          <i class="fi <?php echo esc_attr( $service_icon ); ?>"></i> 
                        <?php } ?>              
                        <h3>
                          <a href="<?php echo esc_url( get_permalink() ); ?>">
                           <?php echo wp_kses_post( $service_title ); ?>
                          </a>
                        </h3>
                       <p><?php echo wp_trim_words( get_the_content(), $service_excerpt_limit ); ?></p>
                      </div>
                      <?php if ( $service_style == 'style_one'  ) { ?>
                      <a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more">
                        <?php echo esc_html( $read_more_text ); ?>
                      </a>
                      <?php } ?>
                  </div>
                  <?php endwhile;
                    wp_reset_postdata();
                  ?>
              </div>
          </div>
        </div>
    </section>
    <?php endif;
    return ob_get_clean();
  }
}
add_shortcode( 'ndrst_service', 'fasindus_service_function' );
