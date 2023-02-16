<?php
add_action('init', 'fasindus_slider_kc_map', 99 );
function fasindus_slider_kc_map() {

    if (function_exists('kc_add_map')){
        kc_add_map(
            array(
                'aqt_slider' => array(
                    'name' =>  esc_html__('Fasindus Slider','fasindus-core'),
                    'description' => esc_html__('Display single icon', 'fasindus-core'),
                    'icon' => 'cpicon kc-icon-icarousel',
                    'category' => FasindusLibrary::fasindus_kc_cat_name(),
                    'params' => array(
                    'Content' => array(
                     array(
                          'name' => 'slide_style',
                          'label' => esc_html__('Slide Style', 'fasindus-core'),
                          'type' => 'select',
                          'options' => array(
                            'style_one' => esc_html__( 'Style One', 'fasindus-core' ),
                            'style_two' => esc_html__( 'Style Two', 'fasindus-core' ),
                            'style_three' => esc_html__( 'Style Three', 'fasindus-core' ),
                          ),
                          'admin_label' => true,
                      ),
                      array(
                        'type'          => 'group',
                        'label'         => esc_html__(' Options', 'fasindus-core'),
                        'name'          => 'slider_items',
                        'description'   => esc_html__( 'Slider Iteams Group Field', 'fasindus-core' ),
                        'options'       => array('add_text' => esc_html__(' Add new Slider  Iteam', 'fasindus-core')),
                        'params' => array(
                           array(
                              'name' => 'subtitle',
                              'label' => esc_html__( 'Sub Title','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Slider Sub Title ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'title',
                              'label' => esc_html__( 'Title','fasindus-core'),
                              'type' => 'textarea',
                              'admin_label' => true,
                              'description' => esc_html__('Write Slider Title ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'button_text',
                              'label' => esc_html__( 'Button Text','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Slider Button Text ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'button_link',
                              'label' => esc_html__( 'Button Link','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Slider Button Link ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'button2_text',
                              'label' => esc_html__( 'Button Text','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Slider Button Text ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'button2_link',
                              'label' => esc_html__( 'Button Link','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Slider Button Link ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'slider_image',
                              'label' => esc_html__( 'Slider Image','fasindus-core'),
                              'type' => 'attach_image',
                              'admin_label' => true,
                              'description' => esc_html__('Attach Slider Image ', 'fasindus-core'),
                            ),
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
                        'name' => 'subtitle_size',
                        'label' => esc_html__('Slider Sub Title Size','fasindus-core'),
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
                        'label' => esc_html__('Slider Sub Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Sub title', 'fasindus-core')
                      ),
                    array(
                        'name' => 'subtitle_bgcolor',
                        'label' => esc_html__('Slider Sub Title Background Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set Background color for Sub title', 'fasindus-core')
                      ),
                    array(
                        'name' => 'title_size',
                        'label' => esc_html__('Slider Title Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 25,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for title such as: 15px, 1em ..etc..', 'fasindus-core')
                      ),
                    array(
                        'name' => 'title_color',
                        'label' => esc_html__('Slider Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for title', 'fasindus-core')
                      ),
                    array(
                        'name' => 'btn_bg_color',
                        'label' => esc_html__('Slider Button Background','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Slider Button Background', 'fasindus-core')
                      ),
                    array(
                        'name' => 'btn_color',
                        'label' => esc_html__('Slider Button Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Slider Button', 'fasindus-core')
                      ),
                   array(
                        'name' => 'btn_size',
                        'label' => esc_html__('Slider Button Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 25,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for Button such as: 15px, 1em ..etc..', 'fasindus-core')
                      ),
                    array(
                        'name' => 'btn_hover_bg',
                        'label' => esc_html__('Slider Button Hover Background','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Slider Button Hover Background', 'fasindus-core')
                      ),
                    array(
                        'name' => 'btn_hover',
                        'label' => esc_html__('Slider Button Hover Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set Hover color for Slider Button', 'fasindus-core')
                      ),
                    array(
                        'name' => 'nav_color',
                        'label' => esc_html__('Slider Navigation Arrow Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set Navigation color for Slider', 'fasindus-core')
                      ),
                    array(
                        'name' => 'nav_bgcolor',
                        'label' => esc_html__('Slider Navigation Arrow Background Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set Navigation Background color for Slider', 'fasindus-core')
                      ),
                    )
                  )
                ),  // End of elemnt kc_icon

            )
        ); // End add map

    } // End if

}
