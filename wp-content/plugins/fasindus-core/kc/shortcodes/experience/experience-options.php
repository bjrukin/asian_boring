<?php
add_action('init', 'fasindus_experiene_kc_map', 99 );
function fasindus_experiene_kc_map() {

    if (function_exists('kc_add_map')){
        kc_add_map(
            array(
                'ndrst_experiene' => array(
                    'name' =>  esc_html__('Fasindus Experiene','fasindus-core'),
                    'description' => esc_html__('Fasindus Experiene Section', 'fasindus-core'),
                    'icon' => 'cpicon kc-icon-progress',
                    'category' => FasindusLibrary::fasindus_kc_cat_name(),
                    'params' => array(
                    'Content' => array(
                      array(
                        'name' => 'experiene_style',
                        'label' => esc_html__('Experiene Style', 'fasindus-core'),
                        'type' => 'select',
                        'options' => array(
                          'standard' => esc_html__( 'Standard', 'fasindus-core' ),
                          'classic' => esc_html__( 'Classic', 'fasindus-core' ),
                          'normal' => esc_html__( 'Normal', 'fasindus-core' ),
                        ),
                      ),
                      array(
                          'name' => 'subtitle',
                          'label' => esc_html__( 'Experiene Sub Title','fasindus-core'),
                          'type' => 'text',
                          'admin_label' => true,
                          'description' => esc_html__('Write Experiene Sub Title ', 'fasindus-core'),
                        ),
                      array(
                          'name' => 'title',
                          'label' => esc_html__( 'Experiene Title','fasindus-core'),
                          'type' => 'textarea',
                          'admin_label' => true,
                          'description' => esc_html__('Write Experiene Title ', 'fasindus-core'),
                      ),
                      array(
                          'name' => 'desc',
                          'label' => esc_html__( 'Experiene Description','fasindus-core'),
                          'type' => 'textarea',
                          'admin_label' => true,
                          'description' => esc_html__('Write Experiene Experiene Description', 'fasindus-core'),
                        ),
                        array(
                          'type'          => 'group',
                          'label'         => esc_html__(' Options', 'fasindus-core'),
                          'name'          => 'experiene_items',
                          'description'   => esc_html__( 'Experiene Items Group Field', 'fasindus-core' ),
                          'options'       => array('add_text' => esc_html__(' Add new Experiene Item', 'fasindus-core')),
                          'params' => array(
                            array(
                                'name' => 'title',
                                'label' => esc_html__( 'Prograss Title','fasindus-core'),
                                'type' => 'text',
                                'admin_label' => true,
                                'description' => esc_html__('Write Experiene Prograss Title ', 'fasindus-core'),
                              ),
                            array(
                                'name' => 'parcent',
                                'label' => esc_html__( 'Prograss Parcent','fasindus-core'),
                                'type' => 'text',
                                'admin_label' => true,
                                'description' => esc_html__('Write Experiene Prograss Parcent ', 'fasindus-core'),
                              ),
                          ),
                        ),
                      array(
                        'name' => 'image_url',
                        'type' => 'attach_image',
                        'label' => esc_html__('Set Experiene Image ', 'fasindus'),
                        'relation' => array(
                            'parent'    => 'experiene_style',
                            'hide_when' => 'normal'
                        ),
                      ),
                      array(
                        'name' => 'class',
                        'label' => esc_html__('Extra Class','fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => esc_html__('Enter Extra Class for Titlte ..', 'fasindus-core')
                      ),
                    ),
                    'Style' => array(
                      array(
                        'name' => 'subtitle_color',
                        'label' => esc_html__('Experiene Sub Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Sub title', 'fasindus-core')
                      ),
                     array(
                        'name' => 'subtitle_size',
                        'label' => esc_html__('Experiene Sub Title Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 15,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for Sub title such as: 15px, 1em ..etc..', 'fasindus-core')
                      ),
                    array(
                        'name' => 'title_color',
                        'label' => esc_html__('Experiene Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for title', 'fasindus-core')
                      ),
                    array(
                        'name' => 'title_size',
                        'label' => esc_html__('Experiene Title Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 15,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for title such as: 15px, 1em ..etc..', 'fasindus-core')
                      ),
                    array(
                        'name' => 'desc_color',
                        'label' => esc_html__('Experiene Description Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Description', 'fasindus-core')
                    ),
                    array(
                        'name' => 'desc_size',
                        'label' => esc_html__('Experiene Description Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 15,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for Description such as: 15px, 1em ..etc..', 'fasindus-core')
                      ),
                    array(
                        'name' => 'prograss_color',
                        'label' => esc_html__('Experiene Prograss Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Prograss', 'fasindus-core')
                      ),
                    array(
                        'name' => 'prograss_title',
                        'label' => esc_html__('Experiene Prograss Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set Title color for Prograss', 'fasindus-core')
                      ),
                    array(
                        'name' => 'prograss_number',
                        'label' => esc_html__('Experiene Prograss Number Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set Number color for Prograss', 'fasindus-core')
                      ),
                    )
                  )
                ),  // End of elemnt kc_icon

            )
        ); // End add map

    } // End if

}
