<?php
/*
 * The sidebar containing the main widget area.
 * Author & Copyright: quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */
$fasindus_blog_widget = cs_get_option( 'blog_widget' );
$fasindus_single_blog_widget = cs_get_option( 'single_blog_widget' );
$fasindus_service_widget = cs_get_option( 'single_service_widget' );
$fasindus_service_sidebar_position = cs_get_option( 'service_sidebar_position' );
$fasindus_project_sidebar_position = cs_get_option( 'project_sidebar_position' );
$fasindus_project_widget = cs_get_option( 'single_project_widget' );
$fasindus_blog_sidebar_position = cs_get_option( 'blog_sidebar_position' );
$fasindus_sidebar_position = cs_get_option( 'single_sidebar_position' );
$woo_widget = cs_get_option('woo_widget');
$fasindus_page_layout_shop = cs_get_option( 'woo_sidebar_position' );
$shop_sidebar_position = ( is_woocommerce_shop() ) ? $fasindus_page_layout_shop : '';
if ( is_home() || is_archive() || is_search() ) {
	$fasindus_blog_sidebar_position = $fasindus_blog_sidebar_position;
} else {
	$fasindus_blog_sidebar_position = '';
}
if ( is_single() ) {
	$fasindus_sidebar_position = $fasindus_sidebar_position;
} else {
	$fasindus_sidebar_position = '';
}

if ( is_singular( 'service' ) ) {
	$fasindus_service_sidebar_position = $fasindus_service_sidebar_position;
} else {
	$fasindus_service_sidebar_position = '';
}

if ( is_singular( 'project' ) ) {
	$fasindus_project_sidebar_position = $fasindus_project_sidebar_position;
} else {
	$fasindus_project_sidebar_position = '';
}
if ( is_page() ) {
	// Page Layout Options
	$fasindus_page_layout = get_post_meta( get_the_ID(), 'page_layout_options', true );
	if ( $fasindus_page_layout ) {
		$fasindus_page_sidebar_pos = $fasindus_page_layout['page_layout'];
	} else {
		$fasindus_page_sidebar_pos = '';
	}
} else {
	$fasindus_page_sidebar_pos = '';
}
if (isset($_GET['sidebar'])) {
  $fasindus_blog_sidebar_position = $_GET['sidebar'];
}
// sidebar class
if ( $fasindus_sidebar_position === 'sidebar-left' || $fasindus_page_sidebar_pos == 'left-sidebar' || $fasindus_blog_sidebar_position === 'sidebar-left' ) {
	$col_class = 'col-md-pull-8';
} else {
	$col_class = '';
}

if ( $fasindus_service_sidebar_position === 'sidebar-left' || $fasindus_project_sidebar_position === 'sidebar-left'  ) {
	$atn_push_class = ' col-lg-pull-9';
} else {
	$atn_push_class = '';
}

if ( is_singular( 'service' ) ) {
	$service_col = ' col-md-3 ';
	$sidebar_class = 'service-sidebar';
} elseif ( is_singular( 'project' ) ) {
	$service_col = ' col-md-3 ';
	$sidebar_class = 'project-sidebar';
} else {
	$service_col = ' col-md-4 ';
	$sidebar_class = 'blog-sidebar';
}

if (  $shop_sidebar_position == 'left-sidebar' ) {
	$shop_push_class = ' col-lg-pull-9';
} else {
	$shop_push_class = '';
}

if (  class_exists( 'WooCommerce' ) && is_shop() ) {
	$shop_col = ' shop-sidebar col-lg-4';
} else {
	$shop_col = '';
}

?>
<div class=" <?php echo esc_attr( $col_class.$service_col.$atn_push_class.$shop_col.$shop_push_class ); ?>">
	<div class="<?php echo esc_attr( $sidebar_class ); ?>">
		<?php
		if (is_page() && isset( $fasindus_page_layout['page_sidebar_widget'] ) && !empty( $fasindus_page_layout['page_sidebar_widget'] ) ) {
			if ( is_active_sidebar( $fasindus_page_layout['page_sidebar_widget'] ) ) {
				dynamic_sidebar( $fasindus_page_layout['page_sidebar_widget'] );
			}
		} elseif (!is_page() && $fasindus_blog_widget && !$fasindus_single_blog_widget) {
			if ( is_active_sidebar( $fasindus_blog_widget ) ) {
				dynamic_sidebar( $fasindus_blog_widget );
			}
		}  elseif ( $fasindus_service_widget && is_singular( 'service' ) ) {
			if ( is_active_sidebar( $fasindus_service_widget ) ) {
				dynamic_sidebar( $fasindus_service_widget );
			}
		} elseif ( $fasindus_project_widget && is_singular( 'project' ) ) {
			if ( is_active_sidebar( $fasindus_project_widget ) ) {
				dynamic_sidebar( $fasindus_project_widget );
			}
		}  elseif (is_woocommerce_shop() && $woo_widget) {
			if (is_active_sidebar($woo_widget)) {
				dynamic_sidebar($woo_widget);
			}
		} elseif ( is_single() && $fasindus_single_blog_widget ) {
			if ( is_active_sidebar( $fasindus_single_blog_widget ) ) {
				dynamic_sidebar( $fasindus_single_blog_widget );
			}
		} else {
			if ( is_active_sidebar( 'sidebar-1' ) ) {
				dynamic_sidebar( 'sidebar-1' );
			}
		} ?>
	</div>
</div><!-- #secondary -->
