<?php
/* ==========================================================
  Case
=========================================================== */
if ( !function_exists('fasindus_project_filter_function')) {
  function fasindus_project_filter_function( $atts, $content = NULL ) {
    extract($atts);

    $e_uniqid       = uniqid();
    $inline_style   = '';
    if ( $title_color || $title_size ) {
      $inline_style .= '.featured-wedding-'.$e_uniqid .'.featured-wedding .feature-grids h3 a {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $subtitle_color || $subtitle_size ) {
      $inline_style .= '.featured-wedding-'.$e_uniqid .'.featured-wedding .feature-grids p {';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
      $inline_style .= ( $subtitle_size ) ? 'font-size:'.fasindus_core_check_px($subtitle_size) .';' : '';
      $inline_style .= '}';
    }
    if ( $bg_color ) {
      $inline_style .= '.featured-wedding-'.$e_uniqid .'.featured-wedding .feature-grids .details {';
      $inline_style .= ( $bg_color ) ? 'background:'. $bg_color .';' : '';
      $inline_style .= '}';
    }


    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' featured-wedding-'.$e_uniqid.' ';

    $aparticular_item = explode(',', $particular_item);
    $perticular_items = array();
    foreach ( $aparticular_item as $item ) {
      $perticular_items[] = substr($item, 0, strpos($item, ":"));;
    }
    $perticular_items = ($particular_item) ? $perticular_items : '';
    $all_project = $all_project ? $all_project : esc_html__( 'All Cases' );


    if ( $project_style == 'filter' ) {
      $project_section = ' latest-projects-section ';
      $project_container = 'containerr';
      $project_class = 'col col-xs-12 sortable-gallery';
      $grid_container = 'gallery-container project-grids';
    } else{
      $project_section = ' latest-projects-section-s2 ';
      $project_container = 'container-fluid';
      $project_class = ' team-grids projects-slider';
      $grid_container = 'grid-area';
    }

    if ( $project_col == 'col_3' ) {
      $column_class = ' portfolio-grid-2 ';
    } else{
      $column_class = ' ';
    }

    ob_start();
    $args = array(
      'post_type' => 'project',
      'posts_per_page' => (int) $project_limit,
      'orderby' => $project_orderby,
      'order' => $project_order,
      'post__in' => $perticular_items,
      'project_category' => esc_attr($project_show_category),
      'post__not_in' => array( $project_hide_post )
    );
    $fasindus_project = new WP_Query( $args );
      if ($fasindus_project->have_posts()) :
      $terms = get_terms( 'project_category' );
    ?>
     <div class="ndrst-project <?php echo esc_attr( $project_section.$styled_class.$class ) ?>">
      <div class="<?php echo esc_attr( $project_container ); ?>">
        <div class="row">
          <div class="<?php echo esc_attr( $project_class ); ?>">
          <?php if ( $project_filter ) { ?>
            <div class="gallery-filters">
              <ul>
                  <li><a data-filter="*" href="#" class="current"><?php echo esc_html( $all_project ) ?></a></li>
                   <?php foreach( $terms as $term ):  ?>
                     <li><a data-filter=".<?php echo esc_attr( $term->slug ); ?>" href="#"><?php echo esc_html(  $term->name ); ?></a></li>
                   <?php  endforeach; ?>
              </ul>
            </div>
           <?php } 

            if (  $project_style == 'filter' ) { ?>
              <div class="<?php echo esc_attr( $grid_container ); ?>">
            <?php } 

              while ( $fasindus_project->have_posts()) : $fasindus_project->the_post();
              $project_options = get_post_meta( get_the_ID(), 'project_options', true );
              $project_number = isset( $project_options['project_number']) ? $project_options['project_number'] : '';
              $project_title = isset( $project_options['project_title']) ? $project_options['project_title'] : '';
              $project_subtitle = isset( $project_options['project_subtitle']) ? $project_options['project_subtitle'] : '';
              $project_image = isset( $project_options['project_image']) ? $project_options['project_image'] : '';
              global $post;
              $image_url = wp_get_attachment_url( $project_image );
              $image_alt = get_post_meta( $project_image , '_wp_attachment_image_alt', true);
              $terms = wp_get_post_terms( get_the_ID(), 'project_category');

              foreach ($terms as $term) {
                $cat_class = $term->slug;
              }
              $count = count($terms);
              $i=0;
              $cat_class = '';
              if ($count > 0) {
                foreach ($terms as $term) {
                  $i++;
                  $cat_class .= $term->slug .' ';
                  if ($count != $i) {
                    $cat_class .= '';
                  } else {
                    $cat_class .= '';
                  }
                }
              }
            ?>
            <div class="grid <?php echo esc_attr( $cat_class ); ?>">
                <div class="inner">
                    <div class="img-holder">
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $image_alt ); ?>">
                    </div>
                    <div class="details">
                        <div class="arrow">
                          <a href="<?php echo esc_url( get_permalink() ); ?>">
                            <i class="fi flaticon-next"></i>
                          </a>
                        </div>
                        <div class="info">
                            <h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $project_title ) ?></a></h3>
                            <p class="date"><?php echo esc_html( $project_subtitle ) ?></p>
                        </div>
                    </div>
                </div>
              </div>
             <?php endwhile;
              wp_reset_postdata(); 
              if (  $project_style == 'filter' ) { ?>
               </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
     <?php endif;
    return ob_get_clean();
  }
}
add_shortcode( 'project_filter', 'fasindus_project_filter_function' );
