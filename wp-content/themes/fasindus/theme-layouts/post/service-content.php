<?php
/**
 * Single Project.
 */
$fasindus_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$fasindus_large_image = $fasindus_large_image[0];
$image_alt = get_post_meta( $fasindus_large_image, '_wp_attachment_image_alt', true);
$service_options = get_post_meta( get_the_ID(), 'service_options', true );
$service_title = isset($project_options['service_title']) ? $project_options['service_title'] : '';
$service_icon = isset($project_options['service_icon']) ? $project_options['service_icon'] : '';
?>
<div class="service-single-content">
		<div class="service-single-img-holder">
	      <img src="<?php echo esc_url( $fasindus_large_image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
	  </div>
    <h2><?php echo get_the_title(); ?></h2>
     <?php the_content();?>
</div>
