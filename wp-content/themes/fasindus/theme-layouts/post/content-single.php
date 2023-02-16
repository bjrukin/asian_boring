<?php
/**
 * Single Post.
 */
$fasindus_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$fasindus_large_image = $fasindus_large_image[0];
$image_alt = get_post_meta( $fasindus_large_image, '_wp_attachment_image_alt', true);
$fasindus_post_type = get_post_meta( get_the_ID(), 'post_type_metabox', true );
// Single Theme Option
$fasindus_post_pagination_option = cs_get_option('single_post_pagination');
$fasindus_single_featured_image = cs_get_option('single_featured_image');
$fasindus_single_author_info = cs_get_option('single_author_info');
$fasindus_single_share_option = cs_get_option('single_share_option');
$fasindus_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
?>
  <div <?php post_class('post clearfix'); ?>>
  	<?php if ( $fasindus_large_image ) { ?>
  	  <div class="entry-media">
        <img src="<?php echo esc_url( $fasindus_large_image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
   		</div>
  	<?php	} ?>
    <div class="meta-title">
       <div class="meta">
          <ul class="entry-meta">
            <li>
              <i class="ti-user"></i>
               <?php if ( !in_array( 'author', $fasindus_metas_hide ) ) { // Author Hide
                  printf(
                  '<a href="%1$s" rel="author">%2$s</a>',
                  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author()
                  );
              } ?>
            </li>
            <li>
              <i class="ti-timer"></i>
              <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() );  ?></a></li>
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
        </ul>
      </div>
    </div>
    <div class="entry-details">
	     <?php
				the_content();
				echo fasindus_wp_link_pages();
			 ?>
    </div>
</div>
<?php if( has_tag() || ( $fasindus_single_share_option && function_exists('fasindus_wp_share_option') ) ) { ?>
<div class="tag-share clearfix">
  <?php if( has_tag() ) { ?>
     <div class="tag">
          <?php
            echo '<span>'.esc_html__('Tags:','fasindus').'</span>';
            $tag_list = get_the_tags();
            if($tag_list) {
              echo the_tags( ' <ul><li>', '</li><li>', '</li></ul>' );
           } ?>
      </div>
    <?php } 
  		if ( $fasindus_single_share_option && function_exists('fasindus_wp_share_option') ) {
  					echo fasindus_wp_share_option();
  			}
  	 ?>
</div>
<?php
}
if( !$fasindus_single_author_info ) {
	fasindus_author_info();
	}
?>

