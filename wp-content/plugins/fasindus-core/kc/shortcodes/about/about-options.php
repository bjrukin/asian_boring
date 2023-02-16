<?php
add_action('init', 'fasindus_about_kc_map', 99 );
function fasindus_about_kc_map() {

    if (function_exists('kc_add_map')){
        kc_add_map(
            array(
                'ndrst_about' => array(
                    'name' =>  esc_html__('Fasindus About','fasindus-core'),
                    'description' => esc_html__('Fasindus About Section', 'fasindus-core'),
                    'icon' => 'cpicon kc-icon-box',
                    'category' => FasindusLibrary::fasindus_kc_cat_name(),
                    'params' => array(
                    'Content' => array(
                      array(
                        'name' => 'about_style',
                        'label' => esc_html__('About Style', 'fasindus-core'),
                        'type' => 'select',
                        'options' => array(
                          'standard' => esc_html__( 'Standard', 'fasindus-core' ),
                          'classic' => esc_html__( 'Classic', 'fasindus-core' ),
                          'normal' => esc_html__( 'Normal', 'fasindus-core' ),
                        ),
                      ),
                      array(
                          'name' => 'subtitle',
                          'label' => esc_html__( 'About Sub Title','fasindus-core'),
                          'type' => 'text',
                          'admin_label' => true,
                          'description' => esc_html__('Write About Sub Title ', 'fasindus-core'),
                        ),
                      array(
                          'name' => 'title',
                          'label' => esc_html__( 'About Title','fasindus-core'),
                          'type' => 'textarea',
                          'admin_label' => true,
                          'description' => esc_html__('Write About Title ', 'fasindus-core'),
                      ),
                      array(
                          'name' => 'desc',
                          'label' => esc_html__( 'About Description','fasindus-core'),
                          'type' => 'editor',
                          'admin_label' => true,
                          'description' => esc_html__('Write About About Description', 'fasindus-core'),
                        ),
                        array(
                          'type'          => 'group',
                          'label'         => esc_html__(' Options', 'fasindus-core'),
                          'name'          => 'about_items',
                          'description'   => esc_html__( 'About Items Group Field', 'fasindus-core' ),
                          'options'       => array('add_text' => esc_html__(' Add new About Item', 'fasindus-core')),
                          'relation' => array(
                            'parent'    => 'about_style',
                            'show_when' => 'normal'
                           ),
                          'params' => array(
                            array(
                                'name' => 'title',
                                'label' => esc_html__( 'Title','fasindus-core'),
                                'type' => 'text',
                                'admin_label' => true,
                                'description' => esc_html__('Write About  Title ', 'fasindus-core'),
                              ),
                            array(
                                'name' => 'desc',
                                'label' => esc_html__( 'Desctription','fasindus-core'),
                                'type' => 'textarea',
                                'admin_label' => true,
                                'description' => esc_html__('Write About desctription ', 'fasindus-core'),
                              ),
                          ),
                        ),
                       array(
                          'name' => 'cell_icon',
                          'label' => esc_html__( 'Icon','fasindus-core'),
                          'type' => 'icon_picker',
                          'admin_label' => true,
                          'description' => esc_html__('Select Icon for about number', 'fasindus-core'),
                          'relation' => array(
                            'parent'    => 'about_style',
                            'hide_when' => 'normal'
                           ),
                      ),
                      array(
                          'name' => 'cell_number',
                          'label' => esc_html__( 'Mobile Number','fasindus-core'),
                          'type' => 'text',
                          'admin_label' => true,
                          'description' => esc_html__('Write About Mobile Number', 'fasindus-core'),
                          'relation' => array(
                            'parent'    => 'about_style',
                            'hide_when' => 'normal'
                           ),
                      ),
                      array(
                          'name' => 'number_title',
                          'label' => esc_html__( 'Mobile Number Title','fasindus-core'),
                          'type' => 'text',
                          'admin_label' => true,
                          'description' => esc_html__('Write About Mobile Number Title', 'fasindus-core'),
                          'relation' => array(
                            'parent'    => 'about_style',
                            'hide_when' => 'normal'
                           ),
                      ),
                      array(
                        'name' => 'button_title',
                        'label' => esc_html__('Button Title', 'fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'relation' => array(
                          'parent'    => 'about_style',
                          'hide_when' => 'normal'
                         ),
                      ),
                      array(
                        'name' => 'button_link',
                        'label' => esc_html__('Button Link', 'fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => esc_html__( 'Add your relative URL. Each URL contains link, anchor text and target attributes.', 'fasindus-core' ),
                        'relation' => array(
                          'parent'    => 'about_style',
                          'hide_when' => 'normal'
                         ),
                      ),
                      array(
                          'name' => 'video_title',
                          'label' => esc_html__( 'Video Title','fasindus-core'),
                          'type' => 'text',
                          'admin_label' => true,
                          'description' => esc_html__('Write About Video Title ', 'fasindus-core'),
                          'relation' => array(
                            'parent'    => 'about_style',
                            'hide_when' => 'normal'
                          ),
                      ),
                      array(
                          'name' => 'video_link',
                          'label' => esc_html__( 'About Video Link','fasindus-core'),
                          'type' => 'text',
                          'admin_label' => true,
                          'description' => esc_html__('Write About Video link', 'fasindus-core'),
                          'relation' => array(
                            'parent'    => 'about_style',
                            'hide_when' => 'normal'
                          ),
                        ),
                     
                      array(
                        'name' => 'image_url',
                        'type' => 'attach_image',
                        'label' => esc_html__('Set About Image ', 'fasindus'),
                        'relation' => array(
                          'parent'    => 'about_style',
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
                        'label' => esc_html__('About Sub Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Sub title', 'fasindus-core')
                      ),
                     array(
                        'name' => 'subtitle_size',
                        'label' => esc_html__('About Sub Title Size','fasindus-core'),
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
                        'label' => esc_html__('About Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for title', 'fasindus-core')
                      ),
                    array(
                        'name' => 'title_size',
                        'label' => esc_html__('About Title Size','fasindus-core'),
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
                        'label' => esc_html__('About Description Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Description', 'fasindus-core')
                    ),
                    array(
                        'name' => 'desc_size',
                        'label' => esc_html__('About Description Size','fasindus-core'),
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
                        'name' => 'button_color',
                        'label' => esc_html__('About Button Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Button', 'fasindus-core')
                      ),
                    array(
                        'name' => 'button_bgcolor',
                        'label' => esc_html__('About Button background Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set background color for Button', 'fasindus-core')
                      ),
                    array(
                        'name' => 'icon_color',
                        'label' => esc_html__('About Button Icon Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set Icon color for Button', 'fasindus-core')
                      ),
                    )
                  )
                ),  // End of elemnt kc_icon

            )
        ); // End add map

    } // End if

}
