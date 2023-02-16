<?php
add_action('init', 'fasindus_cta_kc_map', 99 );
function fasindus_cta_kc_map() {

  if (function_exists('kc_add_map')){
      kc_add_map(
          array(
              'endrst_cta' => array(
                  'name' => esc_html__('Fasindus CTA','fasindus-core'),
                  'description' => esc_html__('Display single icon', 'fasindus-core'),
                  'icon' => 'cpicon kc-icon-call-action',
                  'category' => FasindusLibrary::fasindus_kc_cat_name(),
                  'params' => array(
                  'Content' => array(
                     array(
                        'name' => 'cta_style',
                        'label' => esc_html__('CTA Style', 'fasindus-core'),
                        'type' => 'select',
                        'options' => array(
                          'standard' => esc_html__( 'Standard', 'fasindus-core' ),
                          'classic' => esc_html__( 'Classic', 'fasindus-core' ),
                        ),
                      ),
                     array(
                        'name' => 'title',
                        'label' => esc_html__( 'CTA Title','fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => esc_html__('Write Contact Info  Title ', 'fasindus-core'),
                      ),
                      array(
                        'name' => 'subtitle',
                        'label' => esc_html__( 'CTA Sub Title','fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => esc_html__('Write CTA Sub Title', 'fasindus-core'),
                        'relation' => array(
                          'parent'    => 'cta_style',
                          'hide_when' => 'standard'
                         ),
                      ),
                       array(
                        'name' => 'cta_icon',
                        'type' => 'icon_picker',
                        'label' => esc_html__('Set CTA Icon ', 'fasindus'),
                        'relation' => array(
                          'parent'    => 'cta_style',
                          'show_when' => 'standard'
                         ),
                      ),
                      array(
                        'name' => 'video_link',
                        'type' => 'text',
                        'label' => esc_html__('Set CTA Video Link ', 'fasindus'),
                        'relation' => array(
                          'parent'    => 'cta_style',
                          'show_when' => 'standard'
                         ),
                      ),
                      array(
                        'name' => 'link_text',
                        'label' => esc_html__( 'CTA Link Text','fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => esc_html__('Write CTA Link Text', 'fasindus-core'),
                        'relation' => array(
                          'parent'    => 'cta_style',
                          'hide_when' => 'standard'
                         ),
                      ),
                      array(
                        'name' => 'link',
                        'label' => esc_html__( 'CTA Button Link','fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => esc_html__('Write CTA button Link ', 'fasindus-core'),
                        'relation' => array(
                          'parent'    => 'cta_style',
                          'hide_when' => 'standard'
                         ),
                      ),
                     
                    ),
                    'Style' => array(
                      array(
                        'name' => 'class',
                        'label' => esc_html__('Extra Class','fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => esc_html__('Enter Extra Class for Titlte ..', 'fasindus-core')
                      ),
                       array(
                        'name' => 'title_size',
                        'label' => esc_html__('Title Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 16,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for title such as: 15px, 1em ..etc..', 'fasindus-core')
                      ),
                      array(
                        'name' => 'title_color',
                        'label' => esc_html__('Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for title', 'fasindus-core')
                      ),
                      array(
                        'name' => 'subtitle_size',
                        'label' => esc_html__('CTA Sub Title Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 25,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for Sub title such as: 15px, 1em ..etc..', 'fasindus-core')
                      ),
                    array(
                        'name' => 'subtitle_color',
                        'label' => esc_html__('CTA Sub Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Sub title', 'fasindus-core')
                      ),
                     
                      array(
                        'name' => 'icon_color',
                        'label' => esc_html__('icon Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for icon', 'fasindus-core')
                      ),
                      array(
                        'name' => 'btn_color',
                        'label' => esc_html__('Button Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Button', 'fasindus-core')
                      ),
                      array(
                        'name' => 'btn_bgcolor',
                        'label' => esc_html__('Button Background Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set Background color for Button', 'fasindus-core')
                      ),
                    )
                  )
              ),  // End of elemnt kc_icon
          )
      ); // End add map
  } // End if
}
