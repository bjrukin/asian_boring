<?php
/* ==========================================================
Blog Post
=========================================================== */
if ( !function_exists('fasindus_blogs_function')) {
  function fasindus_blogs_function( $atts, $content = NULL ) {
  	extract( $atts );
		$uniqid = uniqid( '-', false);
		$inline_style = '';

		if ( $title_color || $title_size ) {
			$inline_style .= '.blog-section'.$uniqid.'.blog-section .details h3 a, .blog-section'.$uniqid.'.blog-section .section-title h2 {';
			$inline_style .= ( $title_color ) ? 'color: '.$title_color.';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
			$inline_style .= '} ';
		}
	
		if ( $desc_color || $desc_size ) {
			$inline_style .= '.blog-section'.$uniqid.'.blog-section .details p, .blog-section'.$uniqid.'.blog-section .title-text p {';
			$inline_style .= ( $desc_color ) ? 'color: '.$desc_color.';' : '';
      $inline_style .= ( $desc_size ) ? 'font-size:'.fasindus_core_check_px($desc_size) .';' : '';
			$inline_style .= '} ';
		}
	
		if ( $meta_color  ) {
			$inline_style .= '.blog-section'.$uniqid.'.blog-section .meta a , .blog-section'.$uniqid.'.blog-section .comment i , .blog-section'.$uniqid.'.blog-section .meta a {';
			$inline_style .= ( $meta_color ) ? 'color: '.$meta_color.';' : '';
			$inline_style .= '} ';
		}
		if ( $btn_color  || $btn_bgcolor ) {
			$inline_style .= '.blog-section'.$uniqid.'.blog-section .view-all a.theme-btn {';
			$inline_style .= ( $btn_color ) ? 'color: '.$btn_color.';' : '';
			$inline_style .= ( $btn_bgcolor ) ? 'background-color: '.$btn_bgcolor.';' : '';
			$inline_style .= '} ';
		}
		if ( $btn_color  ) {
			$inline_style .= '.blog-section'.$uniqid.'.blog-section .more {';
			$inline_style .= ( $btn_color ) ? 'color: '.$btn_color.';' : '';
			$inline_style .= '} ';
		}
	
		add_inline_style( $inline_style );
		$styled_class = ' blog-section'.$uniqid;

  	$blog_order = $blog_order ? $blog_order : 'DESC';
  	$blog_orderby = $blog_orderby ? $blog_orderby : 'none';
		// Columns
		$short_content = $short_content ? $short_content : '15';
  	$readmore_text = $readmore_text ? $readmore_text : esc_html__( 'Read more' );

  	$aparticular_item = explode(',', $particular_item);
    $perticular_items = array();
    foreach ( $aparticular_item as $item ) {
      $perticular_items[] = substr($item, 0, strpos($item, ":"));;
    }
    $perticular_items = ($particular_item) ? $perticular_items : '';
	  	global $paged;
	    if( get_query_var( 'paged' ) )
	      $my_page = get_query_var( 'paged' );
	    else {
	      if( get_query_var( 'page' ) )
	        $my_page = get_query_var( 'page' );
	      else
	        $my_page = 1;
	      set_query_var( 'paged', $my_page );
	      $paged = $my_page;
	    }
    $args = array(
    	'paged' => $paged,
      'post_type' => 'post',
      'posts_per_page' => (int)$blog_limit,
      'orderby' => $blog_orderby,
      'order' => $blog_order,
      'cat' => $perticular_items,
			'ignore_sticky_posts' => true,
    );

    $query_blog = new WP_Query( $args );
    ob_start();
    $post_count = 0;
    if ( $query_blog->have_posts() ) : ?>
  	<div class="fasindus-blog blog-section <?php echo esc_attr( $class . $styled_class ); ?>">
  			<div class="row">
  				<?php if ( $subtitle || $title ) { ?>
  					<div class="col col-md-4">
              <div class="section-title">
                  <span><?php echo esc_html( $subtitle ); ?></span>
                  <h2><?php echo wp_kses_post( $title ); ?></h2>
              </div>
          </div>
  				<?php } 
  				if ( $desc ) { ?>
          <div class="col col-md-5">
              <div class="title-text">
                  <p><?php echo esc_html( $desc ); ?></p>
              </div>
          </div>
        <?php } 
        	if ( $button_title ) { ?>
          <div class="col col-md-3">
              <div class="view-all">
                  <a href="<?php echo esc_html( $button_link ); ?>" class="theme-btn"><?php echo esc_html( $button_title ); ?></a>
              </div>
          </div>
        <?php } ?>
      </div>
		  <div class="row">
		    <div class="col col-xs-12">
		      <div class="blog-grids clearfix">
					<?php
						while ( $query_blog->have_posts() ) :
						$query_blog-> the_post();
						$post_count++;
						$post_options = get_post_meta( get_the_ID(), 'post_options', true );
						$grid_image = isset( $post_options['grid_image'] ) ? $post_options['grid_image'] : '';
						$image_url = wp_get_attachment_url( $grid_image );
            $image_alt = get_post_meta( $grid_image , '_wp_attachment_image_alt', true); ?>
					 <div class="grid">
	            <div class="entry-media">
	                 <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
	            </div>
	            <div class="details">
	                <h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h3>
	                <?php if ( $blog_date ) { ?>
	                	<p class="date"><?php echo get_the_time('M j,Y'); ?></p>
	                <?php } ?>
	                <p><?php fasindus_excerpt( $short_content ); ?></p>
	                <a href="<?php echo esc_url( get_permalink() ); ?>" class="more"><?php echo esc_html( $readmore_text ); ?></a>
	            </div>
	         </div>
				 <?php
					endwhile; wp_reset_postdata(); ?>
				 </div>
				<?php
					if( $pagination ){
						the_posts_pagination();
					}
				?>
				</div>
			</div>
		</div>
			<!--End blog section-->
    <?php
  	endif;
    return ob_get_clean();
  }
}
add_shortcode( 'ndrst_blog', 'fasindus_blogs_function' );