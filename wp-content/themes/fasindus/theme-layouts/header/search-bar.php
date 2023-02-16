<?php
$fasindus_id    = ( isset( $post ) ) ? $post->ID : 0;
$fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
$fasindus_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fasindus_id;
$fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox', true);

$fasindus_search  = cs_get_option( 'fasindus_search' );
$fasindus_header_cta  = cs_get_option( 'header_cta' );
$fasindus_cta_text  = cs_get_option( 'cta_text' );
$fasindus_cta_link  = cs_get_option( 'cta_link' );

?>
<div class="search-contact">
		<?php if ( !$fasindus_search ) { ?>
		<div class="header-search-form-wrapper">
        <button class="search-toggle-btn"><i class="ti-search"></i></button>
        <div class="header-search-form">
            <form method="get" id="searchform" action="<?php echo esc_url( home_url('/') ); ?>" class="searchform" >
                <div>
                    <input type="text" name="s" id="s2" class="form-control" placeholder="<?php echo esc_attr__( 'Search...','fasindus' ); ?>">
                    <button type="submit"><i class="ti-search"></i></button>
                </div>
            </form>
        </div>
    </div>
		<?php }
		if ( $fasindus_header_cta ) { ?>
    <div class="contact-btn">
        <a href="<?php echo esc_url( $fasindus_cta_link ); ?>" class="theme-btn">
        	<?php echo esc_html( $fasindus_cta_text ); ?>
        </a>
    </div>
    <?php } ?>
</div>
