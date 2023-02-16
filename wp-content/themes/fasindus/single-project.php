<?php
/*
 * The template for displaying all single posts.
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
		$fasindus_content_padding = $fasindus_meta['content_spacings'];
	} else { $fasindus_content_padding = ''; }
	// Padding - Metabox
	if ( $fasindus_content_padding && $fasindus_content_padding !== 'padding-default' ) {
		$fasindus_content_top_spacings = $fasindus_meta['content_top_spacings'];
		$fasindus_content_bottom_spacings = $fasindus_meta['content_bottom_spacings'];
		if ( $fasindus_content_padding === 'padding-custom' ) {
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
	$fasindus_sidebar_position = cs_get_option( 'project_sidebar_position' );
	$fasindus_single_comment = cs_get_option( 'project_comment_form' );
	$fasindus_sidebar_position = $fasindus_sidebar_position ? $fasindus_sidebar_position : 'sidebar-hide';
	// Sidebar Position
	if ( $fasindus_sidebar_position === 'sidebar-hide' ) {
		$fasindus_layout_class = 'col-md-12 col col-xs-12';
		$fasindus_sidebar_class = 'hide-sidebar';
	} elseif ( $fasindus_sidebar_position === 'sidebar-left' ) {
		$fasindus_layout_class = 'col col-lg-9 col-lg-push-3';
		$fasindus_sidebar_class = 'left-sidebar';
	} else {
		$fasindus_layout_class = 'col-lg-9';
		$fasindus_sidebar_class = 'right-sidebar';
	} ?>
<div class="portfolio-sigle-section  section-padding <?php echo esc_attr( $fasindus_content_padding .' '. $fasindus_sidebar_class ); ?>" style="<?php echo esc_attr( $fasindus_custom_padding ); ?>">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr( $fasindus_layout_class ); ?>">
				<div class="project-single-content">
					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							if ( post_password_required() ) {
									echo '<div class="password-form">'.get_the_password_form().'</div>';
								} else {
									get_template_part( 'theme-layouts/post/project', 'content' );
									$fasindus_single_comment = !$fasindus_single_comment ? comments_template() : '';

								}
						endwhile;
					else :
						get_template_part( 'theme-layouts/post/content', 'none' );
					endif; ?>
				</div><!-- Blog Div -->
				<?php
		    wp_reset_postdata(); ?>
			</div><!-- Content Area -->
				<?php
				if ( $fasindus_sidebar_position !== 'sidebar-hide' ) {
					get_sidebar(); // Sidebar
				} ?>
		</div>
	</div>
</div>
<?php
get_footer();