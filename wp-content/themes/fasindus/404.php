<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */
// Theme Options
$fasindus_error_heading = cs_get_option('error_heading');
$fasindus_error_subheading = cs_get_option('error_subheading');
$fasindus_error_page_content = cs_get_option('error_page_content');
$fasindus_error_page_bg = cs_get_option('error_page_bg');
$fasindus_error_btn_text = cs_get_option('error_btn_text');
$fasindus_error_heading = ( $fasindus_error_heading ) ? $fasindus_error_heading : esc_html__( '404', 'fasindus' );
$fasindus_error_subheading = ( $fasindus_error_subheading ) ? $fasindus_error_subheading : esc_html__( 'Oops! Page Not Found!', 'fasindus' );
$fasindus_error_page_content = ( $fasindus_error_page_content ) ? $fasindus_error_page_content : esc_html__( 'We’re sorry but we can’t seem to find the page you requested. This might be because you have typed the web address incorrectly.', 'fasindus' );
$fasindus_error_page_bg = ( $fasindus_error_page_bg ) ? wp_get_attachment_url($fasindus_error_page_bg) : FASINDUS_IMAGES . '/404.png';
$fasindus_error_btn_text = ( $fasindus_error_btn_text ) ? $fasindus_error_btn_text : esc_html__( 'BACK TO HOME', 'fasindus' );
$image_alt = get_post_meta( $fasindus_error_page_bg , '_wp_attachment_image_alt', true);
get_header(); ?>
<section class="error-404-section section-padding">
  <div class="container">
      <div class="row">
          <div class="col col-xs-12">
              <div class="content clearfix">
                  <div class="error">
                      <h2><?php echo esc_html( $fasindus_error_heading ); ?></h2>
                  </div>
                  <div class="error-message">
                      <h3><?php echo wp_kses_post( $fasindus_error_subheading ); ?>!</h3>
                      <p><?php echo esc_html( $fasindus_error_page_content ); ?></p>
                      <a href="<?php echo esc_url(home_url( '/' )); ?>" class="theme-btn">
                        <?php echo esc_html( $fasindus_error_btn_text ); ?>
                      </a>
                  </div>
              </div>
          </div>
      </div> <!-- end row -->
  </div> <!-- end container -->
</section>
<?php
get_footer();