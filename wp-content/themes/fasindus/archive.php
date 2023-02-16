<?php
/*
 * The main template file.
 * Author & Copyright: quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */
get_header();
	// Metabox
	$fasindus_id    = ( isset( $post ) ) ? $post->ID : 0;
	$fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
	$fasindus_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fasindus_id;
	$fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox', true );
	if ( $fasindus_meta ) {
		$fasindus_content_padding = isset( $fasindus_meta['content_spacings'] ) ? $fasindus_meta['content_spacings'] : '';
	} else { $fasindus_content_padding = ''; }
	// Padding - Metabox
	if ($fasindus_content_padding && $fasindus_content_padding !== 'padding-default') {
		$fasindus_content_top_spacings = $fasindus_meta['content_top_spacings'];
		$fasindus_content_bottom_spacings = $fasindus_meta['content_bottom_spacings'];
		if ($fasindus_content_padding === 'padding-custom') {
			$fasindus_content_top_spacings = $fasindus_content_top_spacings ? 'padding-top:'. fasindus_check_px($fasindus_content_top_spacings) .';' : '';
			$fasindus_content_bottom_spacings = $fasindus_content_bottom_spacings ? 'padding-bottom:'. fasindus_check_px($fasindus_content_bottom_spacings) .';' : '';
			$fasindus_custom_padding = $fasindus_content_top_spacings . $fasindus_content_bottom_spacings;
		} else {
			$fasindus_custom_padding = '';
		}
	} else {
		$fasindus_custom_padding = '';
	}
	// Theme Options
	$fasindus_sidebar_position = cs_get_option( 'blog_sidebar_position' );
	$fasindus_sidebar_position = $fasindus_sidebar_position ?$fasindus_sidebar_position : 'sidebar-right';
	$fasindus_blog_widget = cs_get_option( 'blog_widget' );
	$fasindus_blog_widget = $fasindus_blog_widget ? $fasindus_blog_widget : 'sidebar-1';

	if (isset($_GET['sidebar'])) {
	  $fasindus_sidebar_position = $_GET['sidebar'];
	}

	$fasindus_sidebar_position = $fasindus_sidebar_position ? $fasindus_sidebar_position : 'sidebar-right';

	// Sidebar Position
	if ( $fasindus_sidebar_position === 'sidebar-hide' ) {
		$layout_class = 'col col col-md-10 col-md-offset-1';
		$fasindus_sidebar_class = 'hide-sidebar';
	} elseif ( $fasindus_sidebar_position === 'sidebar-left' && is_active_sidebar( $fasindus_blog_widget ) ) {
		$layout_class = 'col col-md-8 col-md-push-4';
		$fasindus_sidebar_class = 'left-sidebar';
	} elseif( is_active_sidebar( $fasindus_blog_widget ) ) {
		$layout_class = 'col col-md-8';
		$fasindus_sidebar_class = 'right-sidebar';
	} else {
		$layout_class = 'col col-md-12';
		$fasindus_sidebar_class = 'hide-sidebar';
	}

	?>
<div class="blog-pg-section section-padding">
	<div class="container <?php echo esc_attr( $fasindus_content_padding .' '. $fasindus_sidebar_class ); ?>" style="<?php echo esc_attr( $fasindus_custom_padding ); ?>">
		<div class="row">
			<div class="<?php echo esc_attr( $layout_class ); ?>">
				<div class="blog-content">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'theme-layouts/post/content' );
					endwhile;
				else :
					get_template_part( 'theme-layouts/post/content', 'none' );
				endif;
				fasindus_posts_navigation();
		    wp_reset_postdata(); ?>
		    </div>
			</div><!-- Content Area -->
			<?php
			if ( $fasindus_sidebar_position !== 'sidebar-hide' && is_active_sidebar( $fasindus_blog_widget ) ) {
				get_sidebar(); // Sidebar
			} ?>
		</div>
	</div>
</div>
<?php
get_footer();