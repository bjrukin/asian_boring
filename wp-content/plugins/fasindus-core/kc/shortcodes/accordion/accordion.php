<?php
/* ==========================================================
  Accordion
=========================================================== */
if ( !function_exists('aequity_accordion_function')) {
  function aequity_accordion_function( $atts, $content = NULL ) {
    extract($atts);

    $e_uniqid       = uniqid();
    $inline_style   = '';
    if ( $title_color || $title_size || $title_bg ) {
      $inline_style .= '.project-sigle-section-'. $e_uniqid .' .theme-accordion-s1 .panel-heading .collapsed {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_bg ) ? 'background-color:'. $title_bg .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'.aequity_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $desc_color  ) {
      $inline_style .= '.project-sigle-section-'. $e_uniqid .' .theme-accordion-s1 .panel-heading + .panel-collapse > .panel-body p {';
      $inline_style .= ( $desc_color ) ? 'color:'. $desc_color .';' : '';
      $inline_style .= '}';
    }
    if ( $active_color ) {
      $inline_style .= '.project-sigle-section-'. $e_uniqid .' .theme-accordion-s1 .panel-heading a {';
      $inline_style .= ( $active_color ) ? 'color:'. $active_color .';' : '';
      $inline_style .= '}';
    }
  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' project-sigle-section-'. $e_uniqid.' ';
  $accordion_items = ( $accordion_items ) ? (array) $accordion_items : array();

  ob_start(); ?>
  <div class="project-sigle-section <?php echo esc_attr( $styled_class.$class ); ?>">
    <div class="challange-solution-section">
        <div class="panel-group faq-accordion theme-accordion-s1" id="accordion">
        <?php 
          if ( $accordion_items ) {
            $id = 1;
            foreach ( $accordion_items as $key => $accordion_item ) {
              $id++;
              if ( $accordion_item->active_tabs == 'yes') {
                $active_class = 'in';
                $heade_class = '';
                $active_bg_color = ' active-bg-color';
              } else {
                $active_class = '';
                $heade_class = 'collapsed';
                $active_bg_color = '';
              }
             ?>
            <div class="panel panel-default <?php echo esc_attr( $active_bg_color ); ?> ">
                <div class="panel-heading">
                    <a class="<?php echo esc_attr( $heade_class ); ?>" data-toggle="collapse" data-parent="#accordion" href="#<?php echo esc_attr( $id ); ?>" aria-expanded="true">
                      <?php echo esc_html( $accordion_item->tab_title ); ?>
                    </a>
                </div>

                <div id="<?php echo esc_attr( $id ); ?>" class="panel-collapse collapse <?php echo esc_attr( $active_class ); ?>">
                    <div class="panel-body">
                       <?php echo wp_kses_post( $accordion_item->tab_desc ); ?>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
      </div>
    </div>
    <?php return ob_get_clean();
  }
}
add_shortcode( 'dhr_accordion', 'aequity_accordion_function' );
