<?php
add_action('init', 'fasindus_funfact_kc_map', 99 );
function fasindus_funfact_kc_map() {

	if (function_exists('kc_add_map')){
	    kc_add_map(
	        array(
	            'dhr_funfact' => array(
	                'name' => esc_html__('Fasindus Funfact','fasindus-core'),
	                'description' => esc_html__('Display single icon', 'fasindus-core'),
	                'icon' => 'cpicon kc-icon-coundown',
	                'category' => FasindusLibrary::fasindus_kc_cat_name(),
	                'params' => array(
                  'Content' => array(
                    array(
                        'name' => 'title',
                        'label' => esc_html__( 'Title','fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => esc_html__('Write Funfact Title ', 'fasindus-core'),
                      ),
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__(' Options', 'fasindus-core'),
                        'name'          => 'funfact_items',
                        'description'   => esc_html__( 'Funfact Items Group Field', 'fasindus-core' ),
                        'options'       => array('add_text' => esc_html__(' Add new Funfact Iteam', 'fasindus-core')),
                        'params' => array(
                            array(
                              'name' => 'title',
                              'label' => esc_html__( 'Title','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Funfact Title ', 'fasindus-core'),
                            ),
                            array(
                              'name' => 'icon',
                              'label' => esc_html__( 'Funfact Icon','fasindus-core'),
                              'type' => 'icon_picker',
                              'admin_label' => true,
                              'description' => esc_html__('Select Funfact Icon ', 'fasindus-core'),
                            ),
                            array(
                              'name' => 'number',
                              'label' => esc_html__('Number','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => false,
                              'description' => esc_html__('Write Funfact Number ', 'fasindus-core'),
                            ),
                            array(
                              'name' => 'percent',
                              'label' => esc_html__('Percent','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => false,
                              'description' => esc_html__('Write Funfact Percent ', 'fasindus-core'),
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
                        'description' => esc_html__('Enter Extra Class for Titlte .', 'fasindus-core')
                      )
                      ,array(
                        'name' => 'title_size',
                        'label' => esc_html__('Title Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 15,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for title such as: 15px, 1em .etc.', 'fasindus-core')
	                    ),
	                    array(
                        'name' => 'title_color',
                        'label' => esc_html__('Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for title', 'fasindus-core')
	                    ),
                      array(
                        'name' => 'number_size',
                        'label' => esc_html__('Number Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 15,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for Funfact Number such as: 15px, 1em ..etc..', 'fasindus-core')
                      ),
                      array(
                        'name' => 'number_color',
                        'label' => esc_html__('Number Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Funfact Number', 'fasindus-core')
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
                        'description' => esc_html__('Enter font-size for Funfact Icon such as: 15px, 1em ..etc..', 'fasindus-core')
	                    ),
	                    array(
                        'name' => 'icon_color',
                        'label' => esc_html__('Icon Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Funfact Icon', 'fasindus-core')
	                    ),
		                )
	                )
	            ),  // End of elemnt kc_icon
	        )
	    ); // End add map
	} // End if
}
