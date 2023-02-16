<?php
add_action('init', 'fasindus_accordion_kc_map', 99 );
function fasindus_accordion_kc_map() {

	if (function_exists('kc_add_map')){
	    kc_add_map(
	        array(
	            'dhr_accordion' => array(
	                'name' => esc_html__('Accordion','fasindus-core'),
	                'description' => esc_html__('Display single icon', 'fasindus-core'),
	                'icon' => 'cpicon kc-icon-tabs',
	                'category' => FasindusLibrary::fasindus_kc_cat_name(),
	                'params' => array(
                  'Content' => array(
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__('Options', 'fasindus-core'),
                        'name'          => 'accordion_items',
                        'description'   => esc_html__( 'Iteams Group Field', 'fasindus-core' ),
                        'options'       => array('add_text' => esc_html__(' Add new Accordion', 'fasindus-core')),
                        'params' => array(
                        array(
                            'name' => 'tab_title',
                            'label' => esc_html__( 'Title','fasindus-core'),
                            'type' => 'text',
                            'admin_label' => true,
                            'description' => esc_html__('Write  Title Here', 'fasindus-core'),
                          ),
                        array(
                            'name' => 'tab_desc',
                            'label' => esc_html__( 'Description','fasindus-core'),
                            'type' => 'editor',
                            'admin_label' => true,
                            'description' => esc_html__('Write  Description Here', 'fasindus-core'),
                          ),
                          array(
                            'name' => 'active_tabs',
                            'type' => 'toggle',
                            'label' => esc_html__( 'Active Tab', 'fasindus-core' ),
                            'description' => esc_html__('Please Turn On to active Accordion, Please Only One Accordion turn on, Otherwise tab stop working', 'fasindus-core'),
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
                        'name' => 'title_size',
                        'label' => esc_html__('Title Text Size', 'fasindus-plugin'),
                        'type' => 'number_slider',
                        'options' => array(
                          'min' => 10,
                          'max' => 60,
                          'unit' => 'px',
                          'show_input' => true
                        ),
                       ),
                     array(
                        'name' => 'title_color',
                        'label' => esc_html__('Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for title', 'fasindus-core')
                     ),
                     array(
                        'name' => 'title_bg',
                        'label' => esc_html__('Title Background Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color Background for title', 'fasindus-core')
                     ),
	                   array(
                        'name' => 'active_color',
                        'label' => esc_html__('Title Active  Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set Active color for title', 'fasindus-core')
	                   ),
                    array(
                        'name' => 'desc_color',
                        'label' => esc_html__('Accordion Description Text Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Accordion Description Text', 'fasindus-core')
                      ),
		                )
	                )
	            ),  // End of elemnt kc_icon
	        )
	    ); // End add map
	} // End if
}
