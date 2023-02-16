<?php
/* ==========================================================
  Service Info
=========================================================== */
if ( !function_exists('fasindus_servicebox_function')) {
  function fasindus_servicebox_function( $atts, $content = NULL ) {
    extract($atts);
  $image_url = wp_get_attachment_url( $image_url );
  $image_alt = get_post_meta( $image_url, '_wp_attachment_image_alt', true);
  ob_start(); ?>
  <div class="benefit clearfix">
    <div class="img-holder">
       <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_url( $image_alt ); ?>">
    </div>
    <div class="details">
        <h3><?php echo esc_html( $title ); ?></h3>
        <?php echo wp_kses_post( $desc ); ?>
    </div>
</div>
  <?php return ob_get_clean();
  }
}
add_shortcode( 'ndrst_servicebox', 'fasindus_servicebox_function' );
