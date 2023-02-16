<?php
/* ==========================================================
  Tabs
=========================================================== */
if ( !function_exists('fasindus_tabs_function')) {
  function fasindus_tabs_function( $atts, $content = NULL ) {
    extract($atts);

    $e_uniqid       = uniqid();
    $inline_style   = '';
    if ( $title_color || $title_size  ) {
      $inline_style .= '.mission-vision-faq-'. $e_uniqid .'.mission-vision-faq .tablinks ul li a {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $desc_color  ) {
      $inline_style .= '.mission-vision-faq-'. $e_uniqid .'.mission-vision-faq .mission-vision .tab-content .tab-pane p {';
      $inline_style .= ( $desc_color ) ? 'color:'. $desc_color .';' : '';
      $inline_style .= '}';
    }
    if ( $title_active ) {
      $inline_style .= '.mission-vision-faq-'. $e_uniqid .'.mission-vision-faq .tablinks li.active a {';
      $inline_style .= ( $title_active ) ? 'background-color:'. $title_active .';' : '';
      $inline_style .= '}';
    }
    if ( $title_border ) {
      $inline_style .= '.mission-vision-faq-'. $e_uniqid .'.mission-vision-faq .tablinks a {';
      $inline_style .= ( $title_border ) ? 'border-color:'. $title_border .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' mission-vision-faq-'. $e_uniqid.' ';
    $tabs_items = ( $tabs_items ) ? (array) $tabs_items : array();
    ob_start(); ?>
    <div class="service-single-section <?php echo esc_attr( $styled_class.$class ); ?>">
       <div class="service-single-tab">
          <!-- Nav tabs -->
          <div class="tablinks">
             <ul class="nav">
              <?php if ( $tabs_items ) {
                $id = 1;
                foreach ( $tabs_items as $key => $tabs_item ) {
                $id++;
                if ( $tabs_item->active_tabs == 'yes') {
                  $active_class = 'active in';
                } else {
                  $active_class = '';
                }
               ?>
                <li class="<?php echo esc_attr( $active_class ); ?>">
                   <a href="#<?php echo esc_attr( $id ); ?>" data-toggle="tab" aria-expanded="true"><?php echo esc_html( $tabs_item->tab_title ); ?></a>
                </li>
              <?php } } ?>
             </ul>
          </div>
          <!-- Tab panes -->
          <div class="tab-content">
          <?php if ( $tabs_items ) {
            $id = 1;
            foreach ( $tabs_items as $key => $tabs_item ) {
              $id++;
              if ( $tabs_item->active_tabs == 'yes') {
                $active_class = 'active in';
              } else {
                $active_class = '';
              }
               ?>
             <div class="tab-pane <?php echo esc_attr( $active_class ); ?>" id="<?php echo esc_attr( $id ); ?>">
                <?php echo wp_kses_post( $tabs_item->tab_desc ); ?>
             </div>
          <?php } } ?>
          </div>
       </div>
    </div>
   <?php return ob_get_clean();
  }
}
add_shortcode( 'aqt_tabs', 'fasindus_tabs_function' );
