<?php
/*
 * The template for displaying all pages.
 * Author & Copyright: quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */
$fasindus_id    = ( isset( $post ) ) ? $post->ID : 0;
$fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
$fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox', true );
if ( $fasindus_meta ) {
	$fasindus_content_padding = $fasindus_meta['content_spacings'];
} else { $fasindus_content_padding = 'section-padding'; }
// Top and Bottom Padding
if ( $fasindus_content_padding && $fasindus_content_padding !== 'padding-default' ) {
	$fasindus_content_top_spacings = isset( $fasindus_meta['content_top_spacings'] ) ? $fasindus_meta['content_top_spacings'] : '';
	$fasindus_content_bottom_spacings = isset( $fasindus_meta['content_bottom_spacings'] ) ? $fasindus_meta['content_bottom_spacings'] : '';
	if ( $fasindus_content_padding === 'padding-custom' ) {
		$fasindus_content_top_spacings = $fasindus_content_top_spacings ? 'padding-top:'. fasindus_check_px( $fasindus_content_top_spacings ) .';' : '';
		$fasindus_content_bottom_spacings = $fasindus_content_bottom_spacings ? 'padding-bottom:'. fasindus_check_px($fasindus_content_bottom_spacings) .';' : '';
		$fasindus_custom_padding = $fasindus_content_top_spacings . $fasindus_content_bottom_spacings;
	} else {
		$fasindus_custom_padding = '';
	}
	$padding_class = '';
} else {
	$fasindus_custom_padding = '';
	$padding_class = '';
}

// Page Layout
$page_layout_options = get_post_meta( get_the_ID(), 'page_layout_options', true );
if ( $page_layout_options ) {
	$fasindus_page_layout = $page_layout_options['page_layout'];
	$page_sidebar_widget = $page_layout_options['page_sidebar_widget'];
} else {
	$fasindus_page_layout = 'right-sidebar';
	$page_sidebar_widget = '';
}
$page_sidebar_widget = $page_sidebar_widget ? $page_sidebar_widget : 'sidebar-1';
if ( $fasindus_page_layout === 'extra-width' ) {
	$fasindus_page_column = 'extra-width';
	$fasindus_page_container = 'container-fluid';
} elseif ( $fasindus_page_layout === 'full-width' ) {
	$fasindus_page_column = 'col-md-12';
	$fasindus_page_container = 'container ';
} elseif( ( $fasindus_page_layout === 'left-sidebar' || $fasindus_page_layout === 'right-sidebar' ) && is_active_sidebar( $page_sidebar_widget ) ) {
	if( $fasindus_page_layout === 'left-sidebar' ){
		$fasindus_page_column = 'col-md-8 order-12';
	} else {
		$fasindus_page_column = 'col-md-8';
	}
	$fasindus_page_container = 'container ';
} else {
	$fasindus_page_column = 'col-md-12';
	$fasindus_page_container = 'container ';
}
$fasindus_theme_page_comments = cs_get_option( 'theme_page_comments' );
get_header();
?>
<div class="page-wrap <?php echo esc_attr( $padding_class ); ?>">
	<div class="<?php echo esc_attr( $fasindus_page_container.''.$fasindus_content_padding.' '.$fasindus_page_layout ); ?>" style="<?php echo esc_attr( $fasindus_custom_padding ); ?>">
		<div class="row">
			<div class="<?php echo esc_attr( $fasindus_page_column ); ?>">
				<div class="page-wraper clearfix">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
					if ( !$fasindus_theme_page_comments && ( comments_open() || get_comments_number() ) ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
				</div>
				<div class="page-link-wrap">
					<?php fasindus_wp_link_pages(); ?>
				</div>
			</div>
			<?php
			// Sidebar
			if( ($fasindus_page_layout === 'left-sidebar' || $fasindus_page_layout === 'right-sidebar') && is_active_sidebar( $page_sidebar_widget )  ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
</div>
<?php
get_footer();