<?php
if (!function_exists('fasindus_med_client_shortcode_function')) {
	function fasindus_med_client_shortcode_function( $atts, $content = null ){
		extract($atts);

  $logo_items = ( $logo_items ) ? (array) $logo_items : array();
	ob_start();  ?>
  <section class="partners-section">
      <div class="container">
          <div class="row">
              <div class="col col-xs-12">
                  <div class="partner-grids partners-slider">
                  <?php
                    foreach ($logo_items as $key => $item) {
                    $image_url = wp_get_attachment_url( $item->logo_image );
                    $image_alt = get_post_meta($item->logo_image, '_wp_attachment_image_alt', true);
                    if ($item->logo_image) { ?>
                    <div class="grid">
                        <a href="<?php echo esc_url( $item->link ); ?>">
                          <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                        </a>
                    </div>
                    <?php } } ?>
                  </div>
              </div>
            </div>
          <div class="separator"></div>
      </div> 
  </section>
 <?php return ob_get_clean();
	}
}
add_shortcode( 'ndrst_client', 'fasindus_med_client_shortcode_function' );