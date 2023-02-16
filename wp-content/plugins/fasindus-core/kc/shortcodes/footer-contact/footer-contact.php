<?php
/* ==========================================================
  Contact Info
=========================================================== */
if ( !function_exists('fasindus_footer_contact_function')) {
  function fasindus_footer_contact_function( $atts, $content = NULL ) {
    extract($atts);

    $e_uniqid       = uniqid();
    $inline_style   = '';
    if ( $title_size || $title_color ) {
      $inline_style .= '.footer-contact-'.$e_uniqid .'.footer-contact .contact-grids h3 {';
      $inline_style .= $title_size ? 'font-size: '. fasindus_plugin_check_px($title_size) .';': '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
   
    if ( $desc_size || $desc_color ) {
      $inline_style .= '.footer-contact-'.$e_uniqid .'.footer-contact .contact-grids p {';
      $inline_style .= $desc_size ? 'font-size: '. fasindus_plugin_check_px($desc_size) .';': '';
      $inline_style .= ( $desc_color ) ? 'color:'. $desc_color .';' : '';
      $inline_style .= '}';
    }
  
    if ( $bg_color ) {
      $inline_style .= '.footer-contact-'.$e_uniqid .'.footer-contact .contact-grids,.footer-contact-'.$e_uniqid .'.footer-contact .contact-grids > .grid:nth-child(2) {';
      $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
      $inline_style .= '}';
    }
   
  
     // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' footer-contact-'. $e_uniqid.' ';

    $contact_items = ( $contact_items ) ? (array) $contact_items : array();
     ob_start(); ?>
    <div class="footer-contact <?php echo esc_attr( $styled_class.$class ); ?>">
        <div class="row">
            <div class="col col-xs-12">
                <div class="contact-grids clearfix">
                  <?php if ( $contact_items ) {
                    foreach ( $contact_items as $key => $contact_item ) { ?>
                    <div class="grid">
                        <h3><?php echo esc_html( $contact_item->title ); ?></h3>
                        <?php echo wp_kses_post( $contact_item->desc ); ?>
                    </div>
                  <?php } } ?>
                </div>
            </div>
        </div>
    </div>
    <?php return ob_get_clean();
  }
}
add_shortcode( 'footer_contact', 'fasindus_footer_contact_function' );
