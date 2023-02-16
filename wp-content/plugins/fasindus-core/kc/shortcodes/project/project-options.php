<?php
add_action('init', 'fasindus_project_kc_map', 99 );
function fasindus_project_kc_map() {

	if (function_exists('kc_add_map')){
	    kc_add_map(
	        array(
	            'nor_project' => array(
	                'name' => esc_html__('Project','fasindus-core'),
	                'description' => esc_html__('Display Project', 'fasindus-core'),
	                'icon' => 'cpicon kc-icon-image-hover',
	                'category' => FasindusLibrary::fasindus_kc_cat_name(),
	                'params' => array(
                  'Content' => array(
                   array(
                        'name' => 'project_style',
                        'label' => esc_html__('Project Style', 'fasindus-core'),
                        'type' => 'select',
                        'options' => array(
                          'fullid' => esc_html__( 'Full Width', 'fasindus-core' ),
                          'normal' => esc_html__( 'Normal', 'fasindus-core' ),
                        ),
                        'admin_label' => true,
                    ),
                   array(
                        'name' => 'project_limit',
                        'label' => esc_html__( 'Project Limit','fasindus-core'),
                        'type' => 'text',
                        'description' => esc_html__('Write Project Limit ', 'fasindus-core'),
                      ),
                    array(
                        'name' => 'particular_item',
                        'type' => 'autocomplete',
                        'label' => esc_html__( 'Particular Project', 'fasindus-core' ),
                        'options'       => array(
                          'multiple'      => true,
                          'post_type'     => 'project',
                        ),
                        'description' => esc_html__('Type Project Name, and select after auto detect', 'fasindus-core'),
                      ),
                    array(
                        'name' => 'project_show_category',
                        'label' => esc_html__( 'Show Certain Categories','fasindus-core'),
                        'type' => 'text',
                        'description' => esc_html__('Show only certain categories ', 'fasindus-core'),
                      ),
                    array(
                        'name' => 'project_hide_post',
                        'label' => esc_html__( 'Hide Certain Project','fasindus-core'),
                        'type' => 'text',
                        'description' => esc_html__('Hide only certain Project ', 'fasindus-core'),
                      ),
                    array(
                        'name' => 'project_order',
                        'label' => esc_html__( 'Orderby','fasindus-core'),
                        'type' => 'select',
                          'options' => array(
                            '' => esc_html__('Order','fasindus-core'),
                            'ASC' => esc_html__('Asending','fasindus-core'),
                            'DESC' => esc_html__('Desending','fasindus-core'),
                          ),
                        'admin_label' => true,
                        'description' => esc_html__('Select Project Orderby ', 'fasindus-core'),
                      ),
                    array(
                        'name' => 'project_orderby',
                        'label' => esc_html__( 'Order By','fasindus-core'),
                        'type' => 'select',
                          'options' => array(
                            'none' => esc_html__('None','fasindus-core'),
                            'ID' => esc_html__('ID','fasindus-core'),
                            'author' => esc_html__('Author','fasindus-core'),
                            'title' => esc_html__('Title','fasindus-core'),
                            'date' => esc_html__('Date','fasindus-core'),
                            'menu_order' => esc_html__('Menu order','fasindus-core'),
                          ),
                        'admin_label' => true,
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
                        'name' => 'title_color',
                        'label' => esc_html__('Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for title', 'fasindus-core')
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
                        'name' => 'subtitle_color',
                        'label' => esc_html__('Sub Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Sub title', 'fasindus-core')
	                    ),
                      array(
                        'name' => 'subtitle_size',
                        'label' => esc_html__('Sub Title Size','fasindus-core'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 15,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                        'description' => esc_html__('Enter font-size for Sub title such as: 15px, 1em ..etc..', 'fasindus-core')
                      ),
		                )
	                )
	            ),  // End of elemnt kc_icon

	        )
	    ); // End add map

	} // End if

}
