<?php
add_action('init', 'fasindus_servicebox_kc_map', 99 );
function fasindus_servicebox_kc_map() {

	if (function_exists('kc_add_map')){
	    kc_add_map(
	        array(
	            'ndrst_servicebox' => array(
	                'name' => esc_html__('Service Box','fasindus-core'),
	                'description' => esc_html__('Display single icon', 'fasindus-core'),
	                'icon' => 'cpicon cpicon kc-icon-box-alert',
	                'category' => FasindusLibrary::fasindus_kc_cat_name(),
	                'params' => array(
                  'Content' => array(
                    array(
                        'name' => 'title',
                        'label' => esc_html__( 'About Title','fasindus-core'),
                        'type' => 'text',
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
                        'name' => 'image_url',
                        'type' => 'attach_image',
                        'label' => esc_html__('Set About Image ', 'fasindus'),
                      ),
                    ),
                    'Style' => array(
	                    array(
                        'name' => 'class',
                        'label' => esc_html__('Extra Class','fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => esc_html__('Enter Extra Class for Titlte ..', 'fasindus-core')
                      )
		                )
	                )
	            ),  // End of elemnt kc_icon
	        )
	    ); // End add map
	} // End if
}
