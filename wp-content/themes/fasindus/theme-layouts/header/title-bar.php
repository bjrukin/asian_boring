<?php
	// Metabox
	$fasindus_id    = ( isset( $post ) ) ? $post->ID : 0;
	$fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
	$fasindus_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fasindus_id;
	$fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox', true );
	if ($fasindus_meta && is_page()) {
		$fasindus_title_bar_padding = $fasindus_meta['title_area_spacings'];
	} else { $fasindus_title_bar_padding = ''; }
	// Padding - Theme Options
	if ($fasindus_title_bar_padding && $fasindus_title_bar_padding !== 'padding-default') {
		$fasindus_title_top_spacings = $fasindus_meta['title_top_spacings'];
		$fasindus_title_bottom_spacings = $fasindus_meta['title_bottom_spacings'];
		if ($fasindus_title_bar_padding === 'padding-custom') {
			$fasindus_title_top_spacings = $fasindus_title_top_spacings ? 'padding-top:'. fasindus_check_px($fasindus_title_top_spacings) .';' : '';
			$fasindus_title_bottom_spacings = $fasindus_title_bottom_spacings ? 'padding-bottom:'. fasindus_check_px($fasindus_title_bottom_spacings) .';' : '';
			$fasindus_custom_padding = $fasindus_title_top_spacings . $fasindus_title_bottom_spacings;
		} else {
			$fasindus_custom_padding = '';
		}
	} else {
		$fasindus_title_bar_padding = cs_get_option('title_bar_padding');
		$fasindus_titlebar_top_padding = cs_get_option('titlebar_top_padding');
		$fasindus_titlebar_bottom_padding = cs_get_option('titlebar_bottom_padding');
		if ($fasindus_title_bar_padding === 'padding-custom') {
			$fasindus_titlebar_top_padding = $fasindus_titlebar_top_padding ? 'padding-top:'. fasindus_check_px($fasindus_titlebar_top_padding) .';' : '';
			$fasindus_titlebar_bottom_padding = $fasindus_titlebar_bottom_padding ? 'padding-bottom:'. fasindus_check_px($fasindus_titlebar_bottom_padding) .';' : '';
			$fasindus_custom_padding = $fasindus_titlebar_top_padding . $fasindus_titlebar_bottom_padding;
		} else {
			$fasindus_custom_padding = '';
		}
	}
	// Banner Type - Meta Box
	if ($fasindus_meta && is_page()) {
		$fasindus_banner_type = $fasindus_meta['banner_type'];
	} else { $fasindus_banner_type = ''; }
	// Header Style
	if ($fasindus_meta) {
	  $fasindus_header_design  = $fasindus_meta['select_header_design'];
	  $fasindus_hide_breadcrumbs  = $fasindus_meta['hide_breadcrumbs'];
	} else {
	  $fasindus_header_design  = cs_get_option('select_header_design');
	  $fasindus_hide_breadcrumbs = cs_get_option('need_breadcrumbs');
	}
	if ( $fasindus_header_design === 'default') {
	  $fasindus_header_design_actual  = cs_get_option('select_header_design');
	} else {
	  $fasindus_header_design_actual = ( $fasindus_header_design ) ? $fasindus_header_design : cs_get_option('select_header_design');
	}
	if ( $fasindus_header_design_actual == 'style_three') {
		$overly_class = ' overly';
	} else {
		$overly_class = ' ';
	}
	// Overlay Color - Theme Options
		if ($fasindus_meta && is_page()) {
			$fasindus_bg_overlay_color = $fasindus_meta['titlebar_bg_overlay_color'];
			$title_color = isset( $fasindus_meta['title_color'] );
		} else { $fasindus_bg_overlay_color = ''; }
		if (!empty($fasindus_bg_overlay_color)) {
			$fasindus_bg_overlay_color = $fasindus_bg_overlay_color;
			$title_color = $title_color;
		} else {
			$fasindus_bg_overlay_color = cs_get_option('titlebar_bg_overlay_color');
			$title_color = cs_get_option('title_color');
		}
		$e_uniqid        = uniqid();
		$inline_style  = '';
		if ( $fasindus_bg_overlay_color ) {
		 $inline_style .= '.crumbs-area-'.$e_uniqid .'.crumbs-area.overly:after  {';
		 $inline_style .= ( $fasindus_bg_overlay_color ) ? 'background-color:'. $fasindus_bg_overlay_color.';' : '';
		 $inline_style .= '}';
		}
		if ( $title_color ) {
		 $inline_style .= '.crumbs-area-'.$e_uniqid .'.crumbs-area.overly .banner-content h2, .crumbs-area-'.$e_uniqid .'.crumbs-area.overly .crumbs ul li span, .crumbs-area-'.$e_uniqid .'.crumbs-area.overly .crumbs ul li a {';
		 $inline_style .= ( $title_color ) ? 'color:'. $title_color.';' : '';
		 $inline_style .= '}';
		}
		// add inline style
		add_inline_style( $inline_style );
		$styled_class  = ' crumbs-area-'.$e_uniqid;
	// Background - Type
	if( $fasindus_meta ) {
		$title_bar_bg = $fasindus_meta['title_area_bg'];
	} else {
		$title_bar_bg = '';
	}
	$fasindus_custom_header = get_custom_header();
	$header_text_color = get_theme_mod( 'header_textcolor' );
	$background_color = get_theme_mod( 'background_color' );
	if( isset( $title_bar_bg['image'] ) && ( $title_bar_bg['image'] ||  $title_bar_bg['color'] ) ) {
	  extract( $title_bar_bg );
	  $fasindus_background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . esc_url($image) . ');' : '';
	  $fasindus_background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . esc_attr( $repeat) . ';' : '';
	  $fasindus_background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . esc_attr($position) . ';' : '';
	  $fasindus_background_size    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . esc_attr($size) . ';' : '';
	  $fasindus_background_attachment    = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-attachment: ' . esc_attr( $attachment ) . ';' : '';
	  $fasindus_background_color       = ( ! empty( $color ) ) ? ' background-color: ' . esc_attr( $color ) . ';' : '';
	  $fasindus_background_style       = ( ! empty( $image ) ) ? $fasindus_background_image . $fasindus_background_repeat . $fasindus_background_position . $fasindus_background_size . $fasindus_background_attachment : '';
	  $fasindus_title_bg = ( ! empty( $fasindus_background_style ) || ! empty( $fasindus_background_color ) ) ? $fasindus_background_style . $fasindus_background_color : '';
	} elseif( $fasindus_custom_header->url ) {
		$fasindus_title_bg = 'background-image:  url('. esc_url( $fasindus_custom_header->url ) .');';
	} else {
		$fasindus_title_bg = '';
	}
	if($fasindus_banner_type === 'hide-title-area') { // Hide Title Area
	} elseif($fasindus_meta && $fasindus_banner_type === 'revolution-slider') { // Hide Title Area
		echo do_shortcode($fasindus_meta['page_revslider']);
	} else {
	?>
 <!-- start page-title -->
  <section class="page-title <?php echo esc_attr( $overly_class.$styled_class.' '.$fasindus_banner_type ); ?>" style="<?php echo esc_attr( $fasindus_title_bg ); ?>">
  		<div class="container">
          	<div class="row">
              <div class="col col-xs-12" style="<?php echo esc_attr( $fasindus_custom_padding ); ?>" >
              		<div class="title">
                    <h2><?php echo fasindus_title_area(); ?></h2>
                	</div>
                  <?php if ( !$fasindus_hide_breadcrumbs && function_exists( 'breadcrumb_trail' )) { breadcrumb_trail();  } ?>
               </div>
          	</div> <!-- end row -->
       </div>
  </section>
  <!-- end page-title -->
<?php } ?>