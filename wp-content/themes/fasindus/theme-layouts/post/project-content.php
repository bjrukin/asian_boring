<?php
/**
 * Single Project.
 */
$fasindus_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$fasindus_large_image = $fasindus_large_image[0];
$image_alt = get_post_meta( $fasindus_large_image, '_wp_attachment_image_alt', true);
$project_options = get_post_meta( get_the_ID(), 'project_options', true );
$project_page_options = get_post_meta( get_the_ID(), 'project_page_options', true );
$project_infos = isset($project_options['project_infos']) ? $project_options['project_infos'] : '';
$accordion_box = isset($project_page_options['accordion_box']) ? $project_page_options['accordion_box'] : '';

$fasindus_prev_pro = cs_get_option('prev_service');
$fasindus_next_pro = cs_get_option('next_servic');
$fasindus_prev_pro = ($fasindus_prev_pro) ? $fasindus_prev_pro : esc_html__('Previous project', 'fasindus');
$fasindus_next_pro = ($fasindus_next_pro) ? $fasindus_next_pro : esc_html__('Next project', 'fasindus');
$fasindus_prev_post = get_previous_post( '', false);
$fasindus_next_post = get_next_post( '', false);
?>
<div class="img-holder">
    <img src="<?php echo esc_url( $fasindus_large_image ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
</div>
<div class="content-area">
    <div class="project clearfix">
        <div class="project-info">
            <ul>
                <?php foreach ( $project_infos as $key => $project_info ) { ?>
                     <li><span><?php echo esc_html( $project_info['title'] ); ?></span><?php echo esc_html( $project_info['desc'] ); ?></li>
                <?php } ?>
            </ul>
        </div>
        <div class="project-details">
            <h2><?php echo get_the_title(); ?></h2>
            <?php the_content();?>
        </div>
    </div>
    <div class="challange-solution-section">
        <div class="panel-group theme-accordion-s1" id="accordion">
            <?php   $id = 1; foreach ( $accordion_box as $key => $box) : if ( !empty( array_filter( $box ) ) ) :
                $accordion_title = isset($box['accordion_title']) ? $box['accordion_title'] : '';
                $accordion_desc = isset($box['accordion_desc']) ? $box['accordion_desc'] : '';
                $accordion_active = isset($box['accordion_active']) ? $box['accordion_active'] : '';

                $id++;
                if ( $accordion_active ) {
                  $active_class = 'in';
                  $heade_class = '';
                } else {
                  $active_class = '';
                  $heade_class = 'collapsed';
                }
            ?>
            <div class="panel panel-default active-bg-color">
                <div class="panel-heading">
                    <a class="<?php echo esc_attr( $heade_class ); ?>" data-toggle="collapse" data-parent="#accordion" href="#id<?php echo esc_attr( $id ); ?>" aria-expanded="true">
                      <?php echo esc_html( $accordion_title ); ?>
                    </a>
                </div>
                <div id="id<?php echo esc_attr( $id ); ?>" class="panel-collapse collapse <?php echo esc_attr( $active_class ); ?>">
                    <div class="panel-body">
                        <p><?php echo esc_html( $accordion_desc ); ?></p>
                    </div>
                </div>
            </div>
            <?php endif;  endforeach; ?>
        </div>
    </div>
    
    <div class="prev-next-project">
    	<?php if ($fasindus_prev_post) { ?>
        <div>
            <a href="<?php echo esc_url(get_permalink($fasindus_prev_post->ID)); ?>">
                <div class="icon">
                    <i class="fi flaticon-back"></i>
                </div>
                <span><?php echo esc_attr($fasindus_prev_pro); ?></span>
                <h5><?php echo esc_attr($fasindus_prev_post->post_title); ?></h5>
            </a>
        </div>
        <?php } 
        if ($fasindus_next_post) { ?>
        <div>
            <a href="<?php echo esc_url(get_permalink( $fasindus_next_post->ID)); ?>">
                <div class="icon">
                    <i class="fi flaticon-next"></i>
                </div>
                <span><?php echo esc_attr($fasindus_next_pro); ?></span>
                <h5><?php echo esc_attr($fasindus_next_post->post_title); ?></h5>
            </a>
        </div>
         <?php } ?>
    </div>
</div>
  
 