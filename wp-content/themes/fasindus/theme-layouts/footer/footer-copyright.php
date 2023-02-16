<?php
	// Main Text
	$fasindus_need_copyright = cs_get_option('hide_copyright');
	$fasindus_copyright_text = cs_get_option( 'copyright_text' );
	if ( $fasindus_copyright_text ) {
		$footer_class = '';
	} else {
		$footer_class = ' has-not-copyright text-center';
	}
?>
<div class="lower-footer <?php echo esc_attr( $footer_class ); ?>">
  <div class="container">
    <div class="row">
      <div class="separator"></div>
      <div class="col col-xs-12">
         <?php
			  if ( $fasindus_copyright_text ) {
				  echo '<p class="copyright" >'. wp_kses_post( do_shortcode( $fasindus_copyright_text ) ) .'</p>';
			  } else {
				  echo '<p>&copy; Copyright '.current_time( 'Y' ).' | <a href="'.esc_url( get_home_url( '/' ) ).'">'.get_bloginfo( 'name' ).'</a> | All right reserved.</p>';
			  }
			  $fasindus_secondary_text = cs_get_option( 'secondary_text' );
			  echo wp_kses_post( do_shortcode( $fasindus_secondary_text ) );
		  ?>
      </div>
    </div>
  </div>
</div>