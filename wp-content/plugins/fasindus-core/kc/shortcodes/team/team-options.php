<?php
add_action('init', 'fasindus_team_kc_map', 99 );
function fasindus_team_kc_map() {
 
	if (function_exists('kc_add_map')){
	    kc_add_map(
	        array(
	            'ndrst_team' => array(
	                'name' =>  esc_html__('Team','fasindus-core'),
	                'description' => esc_html__('Display single icon', 'fasindus-core'),
	                'icon' => 'cpicon kc-icon-team',
	                 'category' => FasindusLibrary::fasindus_kc_cat_name(),
	                'params' => array(
                  'Content' => array(
                    array(
                        'type'          => 'group',
                        'label'         => esc_html__('Options', 'fasindus-core'),
                        'name'          => 'team_items',
                        'description'   => esc_html__('Lis Iteams Group Field', 'fasindus-core' ),
                        'options'       => array('add_text' => esc_html__('Add new Lis Iteam', 'fasindus-core')),
                        'params' => array(
                          array(
                              'name' => 'title',
                              'label' => esc_html__('Team Title','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => true,
                              'description' => esc_html__('Write Team Title ', 'fasindus-core'),
                            ),
                            array(
                              'name' => 'subtitle',
                              'label' => esc_html__('Team Sub Title','fasindus-core'),
                              'type' => 'text',
                              'admin_label' => false,
                              'description' => esc_html__('Write Team Sub Title ', 'fasindus-core'),
                            ),
                            array(
                              'name' => 'team_image',
                              'label' => esc_html__('Team Image','fasindus-core'),
                              'type' => 'attach_image',
                              'description' => esc_html__('Chose Team  Image ', 'fasindus-core'),
                            ),
                          array(
                            'name' => 'facebook',
                            'label' => esc_html__('facebook Icon', 'fasindus-core'),
                            'type' => 'icon_picker',
                            'admin_label' => true
                          ),
                          array(
                            'name' => 'facebook_link',
                            'label' => esc_html__('facebook Link', 'fasindus-core'),
                            'type' => 'text',
                            'admin_label' => true,
                            'description' => esc_html__( 'Add your relative URL. Each URL contains link, anchor text and target attributes.', 'fasindus-core' ),
                          ),
                          array(
                            'name' => 'twitter',
                            'label' => esc_html__('twitter Icon', 'fasindus-core'),
                            'type' => 'icon_picker',
                            'admin_label' => true
                          ),
                          array(
                            'name' => 'twitter_link',
                            'label' => esc_html__('twitter Link', 'fasindus-core'),
                            'type' => 'text',
                            'admin_label' => true,
                            'description' => esc_html__( 'Add your relative URL. Each URL contains link, anchor text and target attributes.', 'fasindus-core' ),
                          ),
                          array(
                            'name' => 'linkedin',
                            'label' => esc_html__('linkedin Icon', 'fasindus-core'),
                            'type' => 'icon_picker',
                            'admin_label' => true
                          ),
                          array(
                            'name' => 'linkedin_link',
                            'label' => esc_html__('Linkedin Link', 'fasindus-core'),
                            'type' => 'text',
                            'admin_label' => true,
                            'description' => esc_html__( 'Add your relative URL. Each URL contains link, anchor text and target attributes.', 'fasindus-core' ),
                          ),
                          array(
                            'name' => 'pinterest',
                            'label' => esc_html__('Pinterest Icon', 'fasindus-core'),
                            'type' => 'icon_picker',
                            'admin_label' => true
                          ),
                          array(
                            'name' => 'pinterest_link',
                            'label' => esc_html__('Pinterest Link', 'fasindus-core'),
                            'type' => 'text',
                            'admin_label' => true,
                            'description' => esc_html__( 'Add your relative URL. Each URL contains link, anchor text and target attributes.', 'fasindus-core' ),
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
                        'name' => 'title_color',
                        'label' => esc_html__('Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'description' => esc_html__('Set color for title', 'fasindus-core')
	                    ),
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
                        'name' => 'icon_color',
                        'label' => esc_html__('Team Icon Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Team Icon', 'fasindus-core')
                      ),
                    array(
                        'name' => 'icon_bgcolor',
                        'label' => esc_html__('Team Icon background Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Team Icon background', 'fasindus-core')
                      ),
		                )
	                )
	            ),  // End of elemnt kc_icon

	        )
	    ); // End add map

	} // End if

}
