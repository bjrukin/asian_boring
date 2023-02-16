<?php
	// Logo Image
	// Metabox - Header Transparent
	$fasindus_id    = ( isset( $post ) ) ? $post->ID : 0;
	$fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
	$fasindus_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fasindus_id;
	$fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox'. true );
?>
 <!-- start preloader -->
 <div class="preloader">
      <div class="lds-roller">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
      </div>
  </div>
  <!-- end preloader -->