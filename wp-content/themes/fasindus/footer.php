<?php
/*
 * The template for displaying the footer.
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */

$fasindus_id    = ( isset( $post ) ) ? $post->ID : 0;
$fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
$fasindus_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fasindus_id;
$fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox', true );
$fasindus_ft_bg = cs_get_option('fasindus_ft_bg');
$fasindus_attachment = wp_get_attachment_image_src( $fasindus_ft_bg , 'full' );

$footer_contact_block = cs_get_option('footer_contact_block');
$address_text = cs_get_option('address_text');

if ( $fasindus_meta ) {
	$fasindus_hide_footer  = $fasindus_meta['hide_footer'];
} else { $fasindus_hide_footer = ''; }
if ( !$fasindus_hide_footer ) { // Hide Footer Metabox
	$hide_copyright = cs_get_option('hide_copyright');
?>
	<!-- Footer -->
	 <!-- start footer-contact -->
	 <?php if ( $footer_contact_block ) { ?>
	  <div class="footer-contact">
	      <div class="container">
	          <div class="row">
	              <div class="col col-xs-12">
	                  <div class="contact-grids clearfix">
	                      <?php echo wp_kses_post( do_shortcode( $address_text ) );  ?>
	                  </div>
	              </div>
	          </div>    
	      </div>
	  </div>
	 <?php } ?>
    <!-- end footer-contact -->
	<footer class="site-footer" style="background-image: url( <?php echo esc_url( $fasindus_attachment[0] ); ?>);">
		<?php
			$footer_widget_block = cs_get_option( 'footer_widget_block' );
			if ( $footer_widget_block ) {
	      get_template_part( 'theme-layouts/footer/footer', 'widgets' );
	    }
			if ( !$hide_copyright ) {
      	get_template_part( 'theme-layouts/footer/footer', 'copyright' );
	    }
    ?>
	</footer>
	<!-- Footer -->
<?php } // Hide Footer Metabox ?>
</div><!--fasindus-theme-wrapper -->
<?php wp_footer(); ?>
</body>
</html>
