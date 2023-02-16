<?php
add_action('init', 'fasindus_features_kc_map', 99 );
function fasindus_features_kc_map() {

	if (function_exists('kc_add_map')){
	    kc_add_map(
	        array(
	            'ndrst_features' => array(
	                'name' => esc_html__('Features','fasindus-core'),
	                'description' => esc_html__('Display single icon', 'fasindus-core'),
	                'icon' => 'cpicon cpicon kc-icon-box-alert',
	                'category' => FasindusLibrary::fasindus_kc_cat_name(),
	                'params' => array(
                  'Content' => array(
                    array(
                        'name' => 'feature_style',
                        'label' => esc_html__('Feature Style', 'fasindus-core'),
                        'type' => 'select',
                        'options' => array(
                          'standard' => esc_html__( 'Standard', 'fasindus-core' ),
                          'classic' => esc_html__( 'Classic', 'fasindus-core' ),
                          'normal' => esc_html__( 'Normal', 'fasindus-core' ),
                        ),
                      ),
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__(' Options', 'fasindus-core'),
                        'name'          => 'feature_items',
                        'description'   => esc_html__( 'features Iteams Group Field', 'fasindus-core' ),
                        'options'       => array('add_text' => esc_html__(' Add new features Iteam', 'fasindus-core')),
                        'params' => array(
                          array(
                              'name' => 'image_url',
                              'label' => esc_html__( 'Feature Icon','fasindus-core'),
                              'type' => 'attach_image',
                              'admin_label' => true,
                              'description' => esc_html__('Select features Icon ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'title',
                              'label' => esc_html__( 'Title','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write features  Title ', 'fasindus-core'),
                            ),
                          array(
                              'name' => 'desc',
                              'label' => esc_html__( 'Desctription','fasindus-core'),
                              'type' => 'textarea',
                              'admin_label' => true,
                              'description' => esc_html__('Write features desctription ', 'fasindus-core'),
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
                      ),array(
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
                        'label' => esc_html__('Featue Description Size','fasindus-core'),
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
                        'label' => esc_html__('Featue Description Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Description', 'fasindus-core')
                    ),
                      array(
                        'name' => 'border_color',
                        'label' => esc_html__('features border Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for features border', 'fasindus-core')
                      ),
		                )
	                )
	            ),  // End of elemnt kc_icon
	        )
	    ); // End add map
	} // End if
}
