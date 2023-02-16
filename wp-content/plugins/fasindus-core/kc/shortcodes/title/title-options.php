<?php
if (!function_exists( 'fasindus_section_title_kc_map' ) ) {
  add_action('init', 'fasindus_section_title_kc_map', 99 );
  function fasindus_section_title_kc_map() {
    kc_add_map(
      array(
        'section_title' => array(
          'name' => esc_html__('Fasindus Title', 'fasindus-core'),
          'description' => esc_html__( 'Fasindus Title Styles', 'fasindus-core' ),
          'category' => FasindusLibrary::fasindus_kc_cat_name(),
          'icon' => 'cpicon kc-icon-title',
          'title' => esc_html__('Title Settings', 'fasindus-core'),
          'is_container' => true,
          'priority'  => 130,
          'params' => array(
            esc_html__( 'General', 'fasindus-core' ) => array(
              array(
                'name' => 'title_style',
                'label' => esc_html__('Title Style', 'fasindus-core'),
                'type' => 'select',
                'options' => array(
                  'standard' => esc_html__( 'Standard', 'fasindus-core' ),
                  'center' => esc_html__( 'Center', 'fasindus-core' ),
                ),
                'admin_label' => true,
              ),
              array(
                'name' => 'subtitle',
                'label' => esc_html__('Sub Title', 'fasindus-core'),
                'type' => 'text',
                'admin_label' => true
              ),
              array(
                'name' => 'title',
                'label' => esc_html__('Title', 'fasindus-core'),
                'type' => 'textarea',
                'admin_label' => true,
              ),
              array(
                'name' => 'desc',
                'label' => esc_html__('Description', 'fasindus-core'),
                'type' => 'textarea',
                'admin_label' => true,
              ),
              array(
                'name' => 'class',
                'label' => esc_html__(' Extra class name', 'fasindus-core'),
                'type' => 'text',
                'description' => esc_html__(' ', 'fasindus-core')
              )
            ),
            esc_html__( 'Style', 'fasindus-core' ) => array(
            array(
                'name' => 'title_color',
                'label' => esc_html__(' Title Color', 'fasindus-core'),
                'type' => 'color_picker'
              ),
              array(
                'name' => 'title_size',
                'label' => esc_html__(' Title Size', 'fasindus-core'),
                'type' => 'number_slider',
                'options' => array(
                  'min' => 15,
                  'max' => 60,
                  'unit' => 'px',
                  'show_input' => true
                ),
              ),
             array(
                'name' => 'subtitle_color',
                'label' => esc_html__('Sub Title Color', 'fasindus-core'),
                'type' => 'color_picker'
              ),
              array(
                'name' => 'subtitle_size',
                'label' => esc_html__('Sub Title Size', 'fasindus-core'),
                'type' => 'number_slider',
                'options' => array(
                  'min' => 15,
                  'max' => 60,
                  'unit' => 'px',
                  'show_input' => true
                ),
              ),
             array(
                'name' => 'desc_color',
                'label' => esc_html__('Description Title Color', 'fasindus-core'),
                'type' => 'color_picker'
              ),
              array(
                'name' => 'desc_size',
                'label' => esc_html__('Description Title Size', 'fasindus-core'),
                'type' => 'number_slider',
                'options' => array(
                  'min' => 15,
                  'max' => 60,
                  'unit' => 'px',
                  'show_input' => true
                ),
              ),
            ),
          )
        ),
      )
    ); // End add map
  }
} // End if