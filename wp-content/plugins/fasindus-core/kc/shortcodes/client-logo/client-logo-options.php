<?php
add_action('init', 'fasindus_med_client_kc_map', 99 );
function fasindus_med_client_kc_map() {
  if (function_exists('kc_add_map')){
      kc_add_map(
        array(
        'ndrst_client' => array(
          'name' => esc_html__('Client Logo', 'fasindus-core'),
          'description' => esc_html__( 'Client Logo', 'fasindus-core' ),
          'category' => FasindusLibrary::fasindus_kc_cat_name(),
          'title' => esc_html__('Carousel Settings', 'fasindus-core'),
          'is_container' => true,
          'icon' => 'cpicon kc-icon-image',
          'params' => array(
          'Content' => array(
              array(
                'name'      => 'logo_items',
                'type'      => 'group',
                'label'     => esc_html__('Counter Items', 'fasindus'),
                'options'   => array('add_text' => esc_html__('Add Item', 'fasindus')),
                'params' => array(
                  array(
                    'name' => 'logo_image',
                    'type' => 'attach_image',
                    'label' => esc_html__('Client Image', 'fasindus'),
                    'admin_label' => true,
                  ),
                  array(
                    'name' => 'link',
                    'type' => 'text',
                    'label' => esc_html__('Client Link', 'fasindus'),
                  ),
                )
              ),
              array(
                'name' => 'class',
                'label' => esc_html__('Extra Class', 'fasindus-core'),
                'type' => 'text',
              )
            ),
          ),
        ),
      )
    ); // End add map
  }
} // End if