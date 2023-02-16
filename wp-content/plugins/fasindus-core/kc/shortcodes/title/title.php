<?php
/* ==========================================================
  Accordion Info
=========================================================== */
if ( !function_exists('fasindus_title_shortcode_function')) {
  function fasindus_title_shortcode_function( $atts, $content = true ) {
  	extract($atts);
  	$uniqid = uniqid( '-', false);
  	$inline_style = '';
  if ( $title_color || $title_size ) {
      $inline_style .= '.section-title-area'.$uniqid.' h2 {';
      $inline_style .= $title_color ? 'color: '.$title_color.'; ' : '';
      $inline_style .= $title_size ? 'font-size: '.$title_size.'; ' : '';
      $inline_style .= '}';
    }

  if ( $subtitle_color || $subtitle_size ) {
      $inline_style .= '.section-title-area'.$uniqid.' span {';
      $inline_style .= $subtitle_color ? 'color: '.$subtitle_color.'; ' : '';
      $inline_style .= $subtitle_size ? 'font-size: '.$subtitle_size.'; ' : '';
      $inline_style .= '}';
    }

  if ( $desc_color || $desc_size ) {
      $inline_style .= '.section-title-area'.$uniqid.' p {';
      $inline_style .= $desc_color ? 'color: '.$desc_color.'; ' : '';
      $inline_style .= $desc_size ? 'font-size: '.$desc_size.'; ' : '';
      $inline_style .= '}';
    }

  	// integrate css
  	add_inline_style( $inline_style );
  	$inline_class = ' section-title-area'.$uniqid;

    $title = preg_replace('~\s*<br ?/?>\s*~',"<br />",$title);
    $title = nl2br($title);
    ob_start(); ?>
    <div class="section-title-area <?php echo esc_attr( $inline_class ); ?>">
      <div class="container">
      <?php if ( $title_style == 'standard' ) { ?>
        <div class="row">
          <div class="col col-md-12">
              <div class="section-title <?php echo esc_attr( $class ); ?>">
                 <?php if ( $subtitle ) { ?>
                      <span><?php echo esc_html( $subtitle ); ?></span>
                    <?php }
                    if ( $title ) { ?>
                      <h2><?php echo wp_kses_post( $title ); ?></h2>
                   <?php }
                   if ( $desc ) { ?>
                      <p><?php echo esc_html( $desc ) ?></p>
                  <?php } ?>
              </div>
          </div>
        </div>
      <?php } else { ?>
        <div class="row">
          <div class="col col-lg-12 text-left">
              <div class="section-title-s4 <?php echo esc_attr( $class ); ?>">
                 <?php if ( $subtitle ) { ?>
                      <span><?php echo esc_html( $subtitle ); ?></span>
                    <?php }
                    if ( $title ) { ?>
                      <h2><?php echo wp_kses_post( $title ); ?></h2>
                   <?php }
                   if ( $desc ) { ?>
                      <p><?php echo esc_html( $desc ) ?></p>
                  <?php } ?>
              </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
   <?php return ob_get_clean();
  }
}
add_shortcode( 'section_title', 'fasindus_title_shortcode_function' );