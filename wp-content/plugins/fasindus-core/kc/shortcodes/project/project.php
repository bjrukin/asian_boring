<?php
/* ==========================================================
  Project
=========================================================== */
if ( !function_exists('fasindus_project_function')) {
  function fasindus_project_function( $atts, $content = NULL ) {
    extract($atts);

      $e_uniqid       = uniqid();
      $inline_style   = '';
      if ( $title_color || $title_size ) {
        $inline_style .= '.fasindus-project-'.$e_uniqid .'.fasindus-project .details h3 a {';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= ( $title_size ) ? 'font-size:'.fasindus_core_check_px($title_size) .';' : '';
        $inline_style .= '}';
      }
  
      if ( $subtitle_color || $subtitle_size ) {
        $inline_style .= '.fasindus-project-'.$e_uniqid .'.fasindus-project .details p {';
        $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .';' : '';
        $inline_style .= ( $subtitle_size ) ? 'font-size:'.fasindus_core_check_px($subtitle_size) .';' : '';
        $inline_style .= '}';
      }

      // add inline style
      add_inline_style( $inline_style );
      $styled_class  = ' fasindus-project-'.$e_uniqid.' ';

      $aparticular_item = explode(',', $particular_item);
      $perticular_items = array();
      foreach ( $aparticular_item as $item ) {
        $perticular_items[] = substr($item, 0, strpos($item, ":"));;
      }
      $perticular_items = ($particular_item) ? $perticular_items : '';


      if ( $project_style == 'normal' ) {
        $project_class = ' portfolio-section ';
        $slde_class = ' portfolio-slider';
        $container  = 'container ';
      } else {
        $project_class = ' portfolio-section-s2 ';
        $slde_class = ' portfolio-slider-s2 ';
        $container  = 'container-fluid ';
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
      ?>
      <section class="nor-portfolio  <?php echo esc_attr( $project_class.$styled_class.$class ) ?>">
        <div class="portfolio-grids <?php echo esc_attr( $slde_class ); ?>">
          <?php
            while ( $fasindus_project->have_posts()) : $fasindus_project->the_post();
            $project_options = get_post_meta( get_the_ID(), 'project_options', true );
            $project_title = isset( $project_options['project_title']) ? $project_options['project_title'] : '';
            $project_subtitle = isset( $project_options['project_subtitle']) ? $project_options['project_subtitle'] : '';
            $project_image = isset( $project_options['project_image']) ? $project_options['project_image'] : '';
            global $post;

            $image_url = wp_get_attachment_url( $project_image );
            $image_alt = get_post_meta( $project_image , '_wp_attachment_image_alt', true);
           ?>
            <div class="grid">
                <div class="img-holder">
                    <img src="<?php echo esc_url( $image_url ); ?>"  alt="<?php echo esc_attr( $image_alt ); ?>">
                </div>
                <div class="details">
                    <h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $project_title ); ?></a></h3>
                    <p class="cat"><?php echo esc_html( $project_subtitle ) ?></p>
                </div>
            </div>
             <?php endwhile;
              wp_reset_postdata();
              ?>
          </div>
      </section>
     <?php endif;
    return ob_get_clean();
  }
}
add_shortcode( 'nor_project', 'fasindus_project_function' );
