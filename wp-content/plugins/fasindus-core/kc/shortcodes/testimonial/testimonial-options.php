<?php
add_action('init', 'fasindus_testimonial_kc_map', 99 );
function fasindus_testimonial_kc_map() {

	if (function_exists('kc_add_map')){
	    kc_add_map(
	        array(
	            'ndrst_testimonial' => array(
	                'name' =>  esc_html__('Fasindus Testimonial','fasindus-core'),
	                'description' => esc_html__('Display single icon', 'fasindus-core'),
	                'icon' => 'cpicon kc-icon-testi',
	                'category' => FasindusLibrary::fasindus_kc_cat_name(),
	                'params' => array(
                  'Content' => array(
                   array(
                      'name' => 'testimonial_style',
                      'label' => esc_html__('Testimonial Style', 'fasindus-core'),
                      'type' => 'select',
                      'options' => array(
                        'standard' => esc_html__( 'Standard', 'fasindus-core' ),
                        'carousel' => esc_html__( 'Carousel (Grid)', 'fasindus-core' ),
                        'grid' => esc_html__( 'grid', 'fasindus-core' ),
                      ),
                    ),
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__('Options', 'fasindus-core'),
                        'name'          => 'testimonial_items',
                        'description'   => esc_html__('Lis Iteams Group Field', 'fasindus-core' ),
                        'options'       => array('add_text' => esc_html__('Add new Lis Iteam', 'fasindus-core')),
                        'params' => array(
                          array(
                              'name' => 'name',
                              'label' => esc_html__('Testimonial Name','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Testimonial name ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'title',
                              'label' => esc_html__('Testimonial Title','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Testimonial Title ', 'fasindus-core'),
                            ),
                            array(
                              'name' => 'desc',
                              'label' => esc_html__('Description','fasindus-core'),
                              'type' => 'textarea',
                              'admin_label' => false,
                              'description' => esc_html__('Write Testimonial  Description ', 'fasindus-core'),
                            ),
                             array(
                              'name' => 'image_url',
                              'type' => 'attach_image',
                              'label' => esc_html__('Set Testimonial Image ', 'fasindus'),
                            ),
                        ),
                      ),
                    ),
                    'Style' => array(
	                    array(
                        'name' => 'class',
                        'label' => esc_html__('Extra Class','fasindus-core'),
                        'type' => 'text',
                        'description' => esc_html__('Enter Extra Class for Titlte ..', 'fasindus-core')
                      ),
                      array(
                        'name' => 'name_size',
                        'label' => esc_html__('Name Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 16,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for name such as: 15px, 1em ..etc..', 'fasindus-core')
                      ),
                      array(
                        'name' => 'name_color',
                        'label' => esc_html__('Name Color','fasindus-core'),
                        'type' => 'color_picker',
                        'description' => esc_html__('Set color for name', 'fasindus-core')
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
                        'description' => esc_html__('Set color for title', 'fasindus-core')
                      ),
	                    array(
                        'name' => 'desc_size',
                        'label' => esc_html__('description Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 16,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for Sub Testimonial such as: 15px, 1em ..etc..', 'fasindus-core')
	                    ),
                      array(
                        'name' => 'desc_color',
                        'label' => esc_html__('description Color','fasindus-core'),
                        'type' => 'color_picker',
                        'description' => esc_html__('Set color for Testimonial description', 'fasindus-core')
                      ),
		                )
	                )
	            ),  // End of elemnt kc_icon

	        )
	    ); // End add map

	} // End if

}
