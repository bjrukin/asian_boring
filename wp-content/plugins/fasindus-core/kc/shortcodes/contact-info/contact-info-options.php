<?php
add_action('init', 'fasindus_contact_info_kc_map', 99 );
function fasindus_contact_info_kc_map() {

    if (function_exists('kc_add_map')){
        kc_add_map(
            array(
                'contact_info' => array(
                    'name' =>  esc_html__('Fasindus Contact Info','fasindus-core'),
                    'description' => esc_html__('Fasindus Contact Info', 'fasindus-core'),
                    'icon' => 'cpicon kc-icon-box',
                    'category' => FasindusLibrary::fasindus_kc_cat_name(),
                    'params' => array(
                    'Content' => array(
                      array(
                        'type'          => 'group',
                        'label'         => esc_html__(' Options', 'fasindus-core'),
                        'name'          => 'contact_items',
                        'description'   => esc_html__( 'Contact Info Iteams Group Field', 'fasindus-core' ),
                        'options'       => array('add_text' => esc_html__(' Add new Contact item', 'fasindus-core')),
                        'params' => array(
                          array(
                              'name' => 'title',
                              'label' => esc_html__( 'Title','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Contact Title ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'streat_icon',
                              'label' => esc_html__( 'Streat icon','fasindus-core'),
                              'type' => 'icon_picker',
                              'admin_label' => true,
                              'description' => esc_html__('Write Contact Info Streat icon ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'streat_title',
                              'label' => esc_html__( 'Streat Title','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Contact Streat Title ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'mobile_icon',
                              'label' => esc_html__( 'Mobile icon','fasindus-core'),
                              'type' => 'icon_picker',
                              'admin_label' => true,
                              'description' => esc_html__('Write Contact Info Mobile icon ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'mobile_title',
                              'label' => esc_html__( 'Mobile Title','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Contact Mobile Title ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'email_icon',
                              'label' => esc_html__( 'Email icon','fasindus-core'),
                              'type' => 'icon_picker',
                              'admin_label' => true,
                              'description' => esc_html__('Write Contact Info Email icon ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'email_title',
                              'label' => esc_html__( 'Email Title','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Contact Email Title ', 'fasindus-core'),
                            ),
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
                        'name' => 'title_color',
                        'label' => esc_html__('Contact Info Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for title', 'fasindus-core')
                      ),
                    array(
                        'name' => 'title_size',
                        'label' => esc_html__('Contact Info Title Size','fasindus-core'),
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
                          'name' => 'desc_color',
                          'label' => esc_html__('About Description Color','fasindus-core'),
                          'type' => 'color_picker',
                          'admin_label' => true,
                          'description' => esc_html__('Set color for Description', 'fasindus-core')
                      ),
                    )
                  )
                ),  // End of elemnt kc_icon

            )
        ); // End add map

    } // End if

}
