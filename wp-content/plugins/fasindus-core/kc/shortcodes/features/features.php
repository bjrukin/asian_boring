<?php
/* ==========================================================
  Service Info
=========================================================== */
if ( !function_exists('fasindus_features_function')) {
  function fasindus_features_function( $atts, $content = NULL ) {
    extract($atts);

    $e_uniqid       = uniqid();
    $inline_style   = '';
    if ( $title_size || $title_color ) {
      $inline_style .= '.ndrst-feature-'. $e_uniqid .'.ndrst-feature .feature-grids h3 {';
      $inline_style .= $title_size ? 'font-size: '. fasindus_plugin_check_px($title_size) .';': '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }

    if ( $desc_size || $desc_color ) {
      $inline_style .= '.ndrst-feature-'. $e_uniqid .'.ndrst-feature .feature-grids p {';
      $inline_style .= $desc_size ? 'font-size: '. fasindus_plugin_check_px($desc_size) .';': '';
      $inline_style .= ( $desc_color ) ? 'color:'. $desc_color .';' : '';
      $inline_style .= '}';
    }

    if ( $border_color ) {
      $inline_style .= '.ndrst-feature-'. $e_uniqid .'.ndrst-feature .feature-grids .grid, .ndrst-feature-'. $e_uniqid .'.ndrst-feature .feature-grids {';
      $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
      $inline_style .= '}';
    }
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' ndrst-feature-'. $e_uniqid.' ';
    $feature_items = ( $feature_items ) ? (array) $feature_items : array();

    if ( $feature_style == 'normal' ) {
      $features_class = 'about-us-section-s3 ';
    } elseif( $feature_style == 'classic' )  {
      $features_class = 'features-section-s2 ';
    } else {
       $features_class = 'features-section ';
    }
  ob_start(); ?>
  <?php if ( $feature_style == 'normal' ) { ?>
   <section class="ndrst-feature about-us-section-s3">
      <div class="feature-grids clearfix">
        <?php if ( $feature_items ) {
          foreach ( $feature_items as $key => $feature_item ) { 
          $image_url = wp_get_attachment_url( $feature_item->image_url );
          $image_alt = get_post_meta( $feature_item->image_url, '_wp_attachment_image_alt', true);
         ?>
          <div class="grid">
              <div class="img-holder">
                  <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
              </div>
              <h3><?php echo esc_html( $feature_item->title ); ?></h3>
          </div>
         <?php } } ?>
    </div>
  </section>
  <?php } else { ?>
    <section class="ndrst-feature <?php echo esc_attr( $features_class.$class.$styled_class ); ?>">
      <div class="row">
          <div class="col col-xs-12">
              <div class="feature-grids clearfix">
                 <?php if ( $feature_items ) {
                  foreach ( $feature_items as $key => $feature_item ) { 
                    $image_url = wp_get_attachment_url( $feature_item->image_url );
                    $image_alt = get_post_meta( $feature_item->image_url, '_wp_attachment_image_alt', true);
                  ?>
                  <div class="grid">
                      <div class="img-holder">
                          <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                      </div>
                      <h3><?php echo esc_html( $feature_item->title ); ?></h3>
                      <p><?php echo esc_html( $feature_item->desc ); ?></p>
                  </div>
                <?php } } ?>
              </div>
          </div>
      </div>
  </section>
  <?php } 
   return ob_get_clean();
  }
}
add_shortcode( 'ndrst_features', 'fasindus_features_function' );
