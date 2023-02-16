<?php
/* ==========================================================
  Accordion Info
=========================================================== */
if ( !function_exists('fasindus_button_shortcode_function')) {
  function fasindus_button_shortcode_function( $atts, $content = true ) {
  	extract($atts);
  	$uniqid = uniqid( '-', false);
  	$inline_style = '';
    if ( $button_color || $button_size || $background || $border_color || $border_size ) {
      $inline_style .= '.themebtns'.$uniqid.'.btns a {';
      $inline_style .= $background ? 'background-color: '.$background.'; ' : '';
      $inline_style .= $button_color ? 'color: '.$button_color.'; ' : '';
      $inline_style .= $button_size ? 'font-size: '.$button_size.'; ' : '';
      $inline_style .= $border_size ? 'border: '.$border_size.' solid; ' : '';
      $inline_style .= $border_color ? 'border-color: '.$border_color.'; ' : '';
      $inline_style .= '}';
    }

  	if ( $hover_color || $hover_bg || $border_hover_color ) {
  		$inline_style .= '.themebtns'.$uniqid.'.btns a:hover {';
      $inline_style .= $hover_color ? 'color: '.$hover_color.'; ' : '';
      $inline_style .= $hover_bg ? 'background-color: '.$hover_bg.'; ' : '';
  		$inline_style .= $border_hover_color ? 'border-color: '.$border_hover_color.'; ' : '';
  		$inline_style .= '}';
  	}

  	// integrate css
  	add_inline_style( $inline_style );
  	$inline_class = ' themebtns'.$uniqid;
    if ( $button_style == 'standard' ) {
      $button_wrap = 'btns ';
      $button_class = 'theme-btn';
    } else {
      $button_wrap = 'view-all text-center  ';
      $button_class = 'theme-btn-s2';
    }


    $link = ( '||' === $link ) ? '' : $link;
    $link = kc_parse_link($link);

    if ( strlen( $link['url'] ) > 0 ) {
      $a_href   = $link['url'];
      $a_title  = $link['title'];
      $a_target   = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
    }

    if( !isset( $a_href ) )
      $a_href = "#";

    if( isset( $a_href ) )
      $button_attr[] = 'href="'. esc_attr($a_href) .'"';

    if( isset( $a_target ) )
      $button_attr[] = 'target="'. esc_attr($a_target) .'"';

    if( isset( $a_title ) )
      $button_attr[] = 'title="'. esc_attr($a_title) .'"';

    if( isset( $onclick ) )
      $button_attr[] = 'onclick="'. $onclick .'"';


    ob_start(); ?>
     <div class="themebtns <?php echo esc_attr( $button_wrap.$inline_class.' '.$class ); ?>">
        <a class="<?php echo esc_attr( $button_class ); ?>" <?php echo implode(' ', $button_attr); ?>>
          <?php echo esc_html( $title ); ?>
        </a>
     </div>
		<?php
    return ob_get_clean();
  }
}
add_shortcode( 'fasindus_button', 'fasindus_button_shortcode_function' );