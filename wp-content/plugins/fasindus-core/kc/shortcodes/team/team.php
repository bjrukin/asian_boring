<?php
/* ==========================================================
  Team   
=========================================================== */
if ( !function_exists('fasindus_team_function')) {
  function fasindus_team_function( $atts, $content = NULL ) {
    extract($atts);

    $e_uniqid       = uniqid();
    $inline_style   = '';

    if ( $title_color || $title_size ) {
      $inline_style .= '.team-section-'.$e_uniqid .'.team-section .team-grids .grid .details h3 {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }

    if ( $subtitle_color || $subtitle_size ) {
      $inline_style .= '.team-section-'.$e_uniqid .'.team-section .team-grids h3 + span {';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
      $inline_style .= ( $subtitle_size ) ? 'font-size:'.fasindus_core_check_px($subtitle_size) .';' : '';
      $inline_style .= '}';
    }

    if ( $icon_color ) {
      $inline_style .= '.team-section-'.$e_uniqid .'.team-section .team-grids ul li a {';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= '}';
    }

    if ( $icon_bgcolor ) {
      $inline_style .= '.team-section-'.$e_uniqid .'.team-section .team-grids ul li a {';
      $inline_style .= ( $icon_bgcolor ) ? 'background-color:'. $icon_bgcolor .';' : '';
      $inline_style .= '}';
    }
  
    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = 'team-section-'.$e_uniqid.' ';

  $team_items = ( $team_items ) ? (array) $team_items : array();
  ob_start(); ?>
  <section class="team-section <?php echo esc_attr( $styled_class.$class ); ?>">
      <div class="row">
          <div class="col col-xs-12">
              <div class="team-grids">
               <?php if ( $team_items ) {
                  foreach ( $team_items as $key => $team_item ) {
                  if ( isset( $team_item->team_image ) && !empty( $team_item->team_image ) ) {
                  $image_url = wp_get_attachment_url( $team_item->team_image );
                  $image_alt = get_post_meta($team_item->team_image, '_wp_attachment_image_alt', true);
                  ?>
                  <div class="grid">
                      <div class="img-social">
                          <div class="img-holder">
                              <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                          </div>
                          <div class="social">
                              <ul>
                                <li>
                                  <a href="<?php echo esc_url( $team_item->facebook_link ); ?>">
                                    <i class="<?php echo esc_attr( $team_item->facebook ); ?>"></i>
                                  </a>
                                </li>
                                <li>
                                  <a href="<?php echo esc_url( $team_item->twitter_link ); ?>">
                                    <i class="<?php echo esc_attr( $team_item->twitter ); ?>"></i>
                                  </a>
                                </li>
                                <li>
                                  <a href="<?php echo esc_url( $team_item->linkedin_link ); ?>">
                                    <i class="<?php echo esc_attr( $team_item->linkedin ); ?>"></i>
                                  </a>
                                </li>
                                <li>
                                  <a href="<?php echo esc_url( $team_item->pinterest ); ?>">
                                    <i class="<?php echo esc_attr( $team_item->pinterest ); ?>"></i>
                                  </a>
                                </li>
                              </ul>
                          </div>
                      </div>
                      <div class="details">
                          <?php if ( isset( $team_item->title ) && !empty( $team_item->title ) ) { ?>
                            <h3><?php echo esc_html( $team_item->title ); ?></h3>
                          <?php } ?>
                          <?php if ( isset( $team_item->subtitle ) && !empty( $team_item->subtitle ) ) { ?>
                            <span><?php echo esc_html( $team_item->subtitle ); ?></span>
                          <?php } ?>
                      </div>
                  </div>
                  <?php } } } ?>
              </div>
          </div>
      </div>
  </section>
  <?php return ob_get_clean();
  }
}
add_shortcode( 'ndrst_team', 'fasindus_team_function' );
