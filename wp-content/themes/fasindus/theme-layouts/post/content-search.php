<?php
/**
 * Template part for displaying posts.
 */
// Metabox
$fasindus_id    = ( isset( $post ) ) ? $post->ID : 0;
$fasindus_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fasindus_id;
$fasindus_id    = ( is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fasindus_id;
$fasindus_meta  = get_post_meta( $fasindus_id, 'page_type_metabox', true );
$fasindus_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$fasindus_alt = get_post_meta($fasindus_large_image, '_wp_attachment_image_alt', true);
$fasindus_read_more_text = cs_get_option('read_more_text');
$fasindus_read_text = $fasindus_read_more_text ? $fasindus_read_more_text : esc_html__( 'Read More', 'fasindus' );
$fasindus_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
$fasindus_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
  // Sticky
$post_class = get_post_class();
$find_sticky = array_search( 'sticky', $post_class );

if ( 'gallery' == get_post_format() && ! empty( $fasindus_post_type['gallery_post_format'] ) ) {
  $post_format_class = ' slider-post';
  $quote_output = '';
} elseif ( 'video' == get_post_format() && ! empty( $fasindus_post_type['video_post_format'] ) ) {
  $post_format_class = ' video-post';
  $quote_output = '';
}  elseif ( 'quote' == get_post_format() && ! empty( $fasindus_post_type['quote_post_format'] ) ) {
  $post_format_class = ' quote-post';
  $post_format_class = ' <div class="quote-icon"><i class="ti-quote-right"></i></div>';
} else {
  $post_format_class = ' ';
  $quote_output = '';
}
?>
 <div <?php post_class('post'.$post_format_class); ?>>
  <?php
    if ( $find_sticky ) {
        echo '<div class="sticky-badge"><h2>Featured</h2></div>';
    }
    if ( 'gallery' == get_post_format() && ! empty( $fasindus_post_type['gallery_post_format'] ) ) { ?>
    <div class="entry-media post-slider"
        data-nav="true"
        data-autoplay="true"
        data-auto-height="true"
        data-dots="true">
    <?php
      $fasindus_ids = explode( ',', $fasindus_post_type['gallery_post_format'] );
      foreach ( $fasindus_ids as $id ) {
        $fasindus_attachment = wp_get_attachment_image_src( $id, 'full' );
        $fasindus_alt = get_post_meta($id, '_wp_attachment_image_alt', true);
        echo '<img src="'. $fasindus_attachment[0] .'" alt="'. esc_attr( $fasindus_alt ) .'" />';
      }
    ?>
   </div>
  <?php } elseif ( 'video' == get_post_format() && ! empty( $fasindus_post_type['video_post_format'] ) ) { ?>
    <div class="entry-media video-holder">
        <img src="<?php echo esc_url( $fasindus_large_image[0] ); ?>" alt="<?php echo esc_attr( $fasindus_alt ); ?>">
        <a href="<?php echo esc_url( $fasindus_post_type['video_post_format'] ); ?>?autoplay=1" class="video-btn" data-type="iframe">
            <i class="fi flaticon-play-button-2"></i>
        </a>
    </div>
   <?php }  elseif ( 'quote' == get_post_format() ) { ?>
      <div class="quote-icon"></div>
    <?php } elseif ( $fasindus_large_image ) { ?>
    <div class="entry-media">
        <img src="<?php echo esc_url( $fasindus_large_image[0] ); ?>" alt="<?php echo esc_attr( $fasindus_alt ); ?>">
    </div>
    <?php } ?>
    <div class="meta-title">
        <div class="meta">
             <ul class="entry-meta">
              <li>
                <?php if ( !in_array( 'date', $fasindus_metas_hide ) ) { ?> 
                  <a href="<?php echo esc_url( get_permalink() ); ?>">
                    <i class="ti-timer"></i>
                    <?php echo esc_html( get_the_date() );  ?>
                  </a>
                <?php } ?>
              </li>
              <li>
              <?php
                $postcats = get_the_category();
                $count=0;
                if ( $postcats ) {
                   foreach( $postcats as $cat) {
                      $count++;
                      echo '<i class="ti-folder"></i><a href="'.esc_url( get_category_link( $cat->term_id ) ).'">'.esc_html( $cat->name ).'</a>';
                      if( $count >0 ) break;
                   }
                  }
                ?>
              </li>
              <li>
                <?php if ( !in_array( 'comment', $fasindus_metas_hide ) ) { ?> 
                 <a class="fasindus-comment" href="<?php echo esc_url( get_comments_link() ); ?>">
                  <i class="ti-comment-alt"></i>
                  <?php printf( esc_html( _nx( 'Comments (%1$s)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'fasindus' ) ), '<span class="comment">'.number_format_i18n( get_comments_number() ).'</span>','<span>' . get_the_title() . '</span>' ); ?>
                  </a>
                <?php } ?>
              </li>
          </ul>
        </div>
        <div class="title">
            <h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h3>
        </div>
    </div>
      <p>
        <?php
          $blog_excerpt = cs_get_option('theme_blog_excerpt');
          if ($blog_excerpt) {
            $blog_excerpt = $blog_excerpt;
          } else {
            $blog_excerpt = '25';
          }
          if(fasindus_excerpt($blog_excerpt)) {
            fasindus_excerpt($blog_excerpt);
          } else {
             echo wp_trim_words( get_the_content(), 30);
          }
          echo fasindus_wp_link_pages();
        ?>
      </p>
      <a href="<?php echo esc_url( get_permalink() ); ?>" class="theme-btn">
        <?php echo esc_attr($fasindus_read_text); ?>
      </a>
</div>
