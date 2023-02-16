<?php
/* ==========================================================
  Contact Info
=========================================================== */
if ( !function_exists('fasindus_contact_info_function')) {
  function fasindus_contact_info_function( $atts, $content = NULL ) {
    extract($atts);

    $e_uniqid       = uniqid();
    $inline_style   = '';
    if ( $title_size || $title_color ) {
      $inline_style .= '.contact-pg-section-'.$e_uniqid .'.contact-pg-section .office-info h3 {';
      $inline_style .= $title_size ? 'font-size: '. fasindus_plugin_check_px($title_size) .';': '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
   
    if ( $desc_size || $desc_color ) {
      $inline_style .= '.contact-pg-section-'.$e_uniqid .'.contact-pg-section .office-info li {';
      $inline_style .= $desc_size ? 'font-size: '. fasindus_plugin_check_px($desc_size) .';': '';
      $inline_style .= ( $desc_color ) ? 'color:'. $desc_color .';' : '';
      $inline_style .= '}';
    }
   
  
     // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' contact-pg-section-'. $e_uniqid.' ';

    $contact_items = ( $contact_items ) ? (array) $contact_items : array();
     ob_start(); ?>
    <div class="contact-pg-section <?php echo esc_attr( $styled_class.$class ); ?>">
        <div class="office-info">
        <?php if ( $contact_items ) {
          foreach ( $contact_items as $key => $contact_item ) { ?>
         
          <div>
              <h3><?php echo esc_html( $contact_item->title ); ?></h3>
              <ul>
                  <li><i class="<?php echo esc_attr( $contact_item->streat_icon ); ?>"></i>
                    <?php echo esc_html( $contact_item->streat_title ); ?></li>
                  <li><i class="<?php echo esc_attr( $contact_item->mobile_icon ); ?>"></i>
                    <?php echo esc_html( $contact_item->mobile_title ); ?></li>
                  <li><i class="<?php echo esc_attr( $contact_item->email_icon ); ?>"></i>
                    <?php echo esc_html( $contact_item->email_title ); ?></li>
              </ul>
          </div>
        
        <?php } } ?>
        </div>
    </div>
    <?php return ob_get_clean();
  }
}
add_shortcode( 'contact_info', 'fasindus_contact_info_function' );
