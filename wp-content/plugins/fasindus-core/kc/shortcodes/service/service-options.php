<?php
add_action('init', 'fasindus_service_kc_map', 99 );
function fasindus_service_kc_map() {

	if (function_exists('kc_add_map')){
	    kc_add_map(
	        array(
	            'ndrst_service' => array(
                'name' => esc_html__('Fasindus Service','fasindus-core'),
                'description' => esc_html__('Display single icon', 'fasindus-core'),
                'icon' => 'cpicon kc-icon-box-alert',
                'category' => FasindusLibrary::fasindus_kc_cat_name(),
                'params' => array(
                'Content' => array(
                 array(
                      'name' => 'service_style',
                      'label' => esc_html__('Slide Style', 'fasindus-core'),
                      'type' => 'select',
                      'options' => array(
                        'style_one' => esc_html__( 'Style One', 'fasindus-core' ),
                        'style_two' => esc_html__( 'Style Two', 'fasindus-core' ),
                        'style_three' => esc_html__( 'Style Two', 'fasindus-core' ),
                      ),
                      'admin_label' => true,
                    ),
                    array(
                        'name' => 'service_limit',
                        'label' => esc_html__( 'Service Limit','fasindus-core'),
                        'type' => 'text',
                        'description' => esc_html__('Write Service Limit ', 'fasindus-core'),
                      ),
                    array(
                        'name' => 'service_order',
                        'label' => esc_html__( 'Service Orderby','fasindus-core'),
                        'type' => 'select',
                          'options' => array(
                            '' => esc_html__('Service Order','fasindus-core'),
                            'ASC' => esc_html__('Asending','fasindus-core'),
                            'DESC' => esc_html__('Desending','fasindus-core'),
                          ),
                        'admin_label' => true,
                        'description' => esc_html__('Select Service Orderby ', 'fasindus-core'),
                      ),
                    array(
                        'name' => 'service_orderby',
                        'label' => esc_html__( 'Order By','fasindus-core'),
                        'type' => 'select',
                          'options' => array(
                            'none' => esc_html__('None','fasindus-core'),
                            'ID' => esc_html__('ID','fasindus-core'),
                            'author' => esc_html__('Author','fasindus-core'),
                            'title' => esc_html__('Title','fasindus-core'),
                            'date' => esc_html__('Date','fasindus-core'),
                          ),
                        'admin_label' => true,
                      ),
                    array(
                        'name' => 'service_excerpt_limit',
                        'label' => esc_html__( 'Short Content','fasindus-core'),
                        'type' => 'text',
                        'description' => esc_html__('Write Content Limit ', 'fasindus-core'),
                      ),
                    array(
                        'name' => 'read_more_text',
                        'label' => esc_html__( 'Read More Text','fasindus-core'),
                        'type' => 'text',
                        'description' => esc_html__('Write Read More Text ', 'fasindus-core'),
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
                          'min' => 15,
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
                        'name' => 'desc_size',
                        'label' => esc_html__('Description Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 15,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for description such as: 15px, 1em ..etc..', 'fasindus-core')
	                    ),
                      array(
                        'name' => 'desc_color',
                        'label' => esc_html__('description Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for description', 'fasindus-core')
                      ),
                      array(
                        'name' => 'icon_color',
                        'label' => esc_html__('Icon Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Icon', 'fasindus-core')
                      ),
	                    array(
                        'name' => 'icon_size',
                        'label' => esc_html__('Icon Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 15,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for description such as: 15px, 1em ..etc..', 'fasindus-core')
	                    ),
		                )
	                )
	            ),  // End of elemnt kc_icon

	        )
	    ); // End add map

	} // End if

}
