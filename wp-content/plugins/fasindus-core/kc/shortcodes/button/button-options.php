<?php
if (!function_exists( 'fasindus_button_kc_map' ) ) {
  add_action('init', 'fasindus_button_kc_map', 99 );
  function fasindus_button_kc_map() {
    kc_add_map(
      array(
        'fasindus_button' => array(
          'name' => esc_html__('Fasindus Button', 'fasindus-core'),
          'description' => esc_html__( 'Button Styles', 'fasindus-core' ),
          'category' => FasindusLibrary::fasindus_kc_cat_name(),
          'icon' => 'cpicon kc-icon-button',
          'title' => esc_html__('Button Settings', 'fasindus-core'),
          'params' => array(
            esc_html__( 'General', 'fasindus-core' ) => array(
              array(
                  'name' => 'button_style',
                  'label' => esc_html__('Button Style', 'fasindus-core'),
                  'type' => 'select',
                  'options' => array(
                    'standard' => esc_html__( 'Standard', 'fasindus-core' ),
                    'classic' => esc_html__( 'Classic', 'fasindus-core' ),
                  ),
                ),
              array(
                'name' => 'title',
                'label' => esc_html__('Button Title', 'fasindus-core'),
                'type' => 'text',
                'admin_label' => true
              ),
              array(
                'name' => 'link',
                'label' => esc_html__('Button Link', 'fasindus-core'),
                'type' => 'link',
                'admin_label' => true,
                'description' => esc_html__( 'Add your relative URL. Each URL contains link, anchor text and target attributes.', 'fasindus-core' ),
              ),
              array(
                'name' => 'class',
                'label' => esc_html__('Extra class name', 'fasindus-core'),
                'type' => 'text',
                'description' => esc_html__(' ', 'fasindus-core')
              )
            ),
            esc_html__( 'Style', 'fasindus-core' ) => array(
              array(
                'name' => 'button_color',
                'label' => esc_html__('Button Text Color', 'fasindus-core'),
                'type' => 'color_picker'
              ),
              array(
                'name' => 'button_size',
                'label' => esc_html__('Button Text Size', 'fasindus-core'),
                'type' => 'number_slider',
                'options' => array(
                  'min' => 14,
                  'max' =>24,
                  'unit' => 'px',
                  'show_input' => true
                ),
              ),
              array(
                'name' => 'background',
                'label' => esc_html__('Background Color', 'fasindus-core'),
                'type' => 'color_picker'
              ),
              array(
                'name' => 'hover_color',
                'label' => esc_html__('Hover Color', 'fasindus-core'),
                'type' => 'color_picker'
              ),
              array(
                'name' => 'hover_bg',
                'label' => esc_html__('Hover Background', 'fasindus-core'),
                'type' => 'color_picker'
              ),
              array(
                'name' => 'border_color',
                'label' => esc_html__('Border Color', 'fasindus-core'),
                'type' => 'color_picker'
              ),
              array(
                'name' => 'border_hover_color',
                'label' => esc_html__('Border Color', 'fasindus-core'),
                'type' => 'color_picker'
              ),
              array(
                'name' => 'border_size',
                'label' => esc_html__('Border Size', 'fasindus-core'),
                'type' => 'number_slider',
                'options' => array(
                  'min' => 2,
                  'max' => 5,
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