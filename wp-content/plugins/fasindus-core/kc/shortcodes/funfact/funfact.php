<?php
/* ==========================================================
  Funfact
=========================================================== */
if ( !function_exists('fasindus_funfact_function')) {
  function fasindus_funfact_function( $atts, $content = NULL ) {

    extract($atts);

    $e_uniqid       = uniqid();
    $inline_style   = '';
    if ( $title_size || $title_color  ) {
      $inline_style .= '.fun-fact-section-'.$e_uniqid .'.fun-fact-section .fun-fact-grids .grid .info p {';
      $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }
    if ( $number_size || $number_color  ) {
      $inline_style .= '.fun-fact-section-'.$e_uniqid .'.fun-fact-section .fun-fact-grids .grid .info h3 {';
      $inline_style .= ( $number_size ) ? 'font-size:'.fasindus_core_check_px( $number_size) .';' : '';
      $inline_style .= ( $number_color ) ? 'color:'. $number_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_size || $icon_color  ) {
      $inline_style .= '.fun-fact-section-'.$e_uniqid .'.fun-fact-section .fi:before {';
      $inline_style .= ( $icon_size ) ? 'font-size:'.fasindus_core_check_px( $icon_size) .';' : '';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= '}';
    }
     // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fun-fact-section-'.$e_uniqid.' ';
    $funfact_items = ( $funfact_items ) ? (array) $funfact_items : array();

    ob_start(); ?>
    <section class="fun-fact-section <?php echo esc_attr(  $class.$styled_class ) ?>">
      <div class="container">
        <div class="row">
          <div class="col col-xs-12">
            <?php if ( $title  ) { ?>
              <h2><?php echo esc_html( $title ); ?></h2>
            <?php } ?>
            <div class="fun-fact-grids clearfix">
            <?php
              foreach ( $funfact_items as $key => $funfact_item ) {
                $funfact_item->title = preg_replace('~\s*<br ?/?>\s*~',"<br />",$funfact_item->title);
                $funfact_item->title = nl2br($funfact_item->title);
                if ( $funfact_item->number ||  $funfact_item->title ) { ?>
                <div class="grid">
                    <?php if ( $funfact_item->icon ) { ?>
                      <div class="icon">
                          <div class="fi <?php echo esc_attr( $funfact_item->icon ); ?>"></div>
                      </div>
                    <?php } ?>
                    <div class="info">
                        <h3><span class="odometer" data-count="<?php echo esc_html( $funfact_item->number ) ?>"><?php echo esc_html__( '00','fasindus-core' ); ?></span>
                          <?php if ( $funfact_item->percent) {
                           echo esc_html( $funfact_item->percent );
                          } ?>
                        </h3>
                        <p><?php echo wp_kses_post( $funfact_item->title ); ?></p>
                    </div>
                </div>
              <?php } } ?> 
            </div>
          </div>
        </div>
      </div>
    </section>
   <?php return ob_get_clean();
  }
}
add_shortcode( 'dhr_funfact', 'fasindus_funfact_function' );
