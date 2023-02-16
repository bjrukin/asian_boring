<?php
add_action('init', 'fasindus_contact7_kc_map', 99 );
function fasindus_contact7_kc_map() {
   $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
    $contact_forms = array();
    if ( $cf7 ) {
      foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->ID ] = $cform->post_title;
      }
    } else {
      $contact_forms[ esc_html__( 'No contact forms found', 'fasindus-core' ) ] = 0;
    }
  if (function_exists('kc_add_map')){
      kc_add_map(
          array(
              'indrsl_ontact7' => array(
                  'name' =>  esc_html__('Contact 7','fasindus-core'),
                  'description' => esc_html__('Display single icon', 'fasindus-core'),
                  'icon' => 'cpicon fas fa-envelope',
                  'category' => FasindusLibrary::fasindus_kc_cat_name(),
                  'params' => array(
                  'Content' => array(
                    array(
                      'name' => 'contact_style',
                      'label' => esc_html__('Contact Style', 'fasindus-core'),
                      'type' => 'select',
                      'options' => array(
                        'standard' => esc_html__( 'Standard', 'fasindus-core' ),
                        'classic' => esc_html__( 'Classic', 'fasindus-core' ),
                      ),
                    ),
                    array(
                        'name' => 'title',
                        'label' => esc_html__( 'Contact Title','fasindus-core'),
                        'type' => 'text',
                        'admin_label' => true,
                        'description' => esc_html__('Write Contact Title ', 'fasindus-core'),
                    ),
                    array(
                        'name' => 'desc',
                        'label' => esc_html__( 'Contact Description','fasindus-core'),
                        'type' => 'textarea',
                        'admin_label' => true,
                        'description' => esc_html__('Write Contact Contact Description', 'fasindus-core'),
                      ),
                    array(
                      'name' => 'contact_id',
                      'label' => esc_html__('Contact Style','fasindus-core'),
                      'type' => 'select',
                        'options' => $contact_forms,
                      'admin_label' => true,
                      'description' => esc_html__('Select your Contact style. ', 'fasindus-core'),
                     ),
                    array(
                      'name' => 'image_url',
                      'type' => 'attach_image',
                      'label' => esc_html__('Set Contact Image ', 'fasindus'),
                      'relation' => array(
                        'parent'    => 'contact_style',
                        'show_when' => 'standard'
                      ),
                    ),
                    array(
                        'name' => 'call_info',
                        'label' => esc_html__( 'Contact Call Info','fasindus-core'),
                        'type' => 'textarea',
                        'admin_label' => true,
                        'description' => esc_html__('Write Contact Contact Call Info', 'fasindus-core'),
                        'relation' => array(
                          'parent'    => 'contact_style',
                          'show_when' => 'standard'
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
                        'name' => 'title_color',
                        'label' => esc_html__('Contact Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for title', 'fasindus-core')
                      ),
                      array(
                        'name' => 'title_size',
                        'label' => esc_html__('Contact Title Size','fasindus-core'),
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
                        'label' => esc_html__('Contact Sub Title Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Sub title', 'fasindus-core')
                      ),
                      array(
                        'name' => 'subtitle_size',
                        'label' => esc_html__('Contact Sub Title Size','fasindus-core'),
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
                          'name' => 'call_info_color',
                          'label' => esc_html__('Contact Call Info Color','fasindus-core'),
                          'type' => 'color_picker',
                          'admin_label' => true,
                          'description' => esc_html__('Set color for Call Info', 'fasindus-core')
                        ),
                      array(
                          'name' => 'call_info_desc_color',
                          'label' => esc_html__('Contact Call Info desc Color','fasindus-core'),
                          'type' => 'color_picker',
                          'admin_label' => true,
                          'description' => esc_html__('Set color for Call Info Desctription', 'fasindus-core')
                        ),
                      array(
                        'name' => 'button_color',
                        'label' => esc_html__('Button Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set color for Button', 'fasindus-core')
                      ),
                      array(
                        'name' => 'bg_color',
                        'label' => esc_html__('Button Background Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set Background color for Button', 'fasindus-core')
                      ),
                      array(
                        'name' => 'button_hover',
                        'label' => esc_html__('Button Hover Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set hover color for Button', 'fasindus-core')
                      ),
                      array(
                        'name' => 'input_border',
                        'label' => esc_html__('Form Input Border Color','fasindus-core'),
                        'type' => 'color_picker',
                        'admin_label' => true,
                        'description' => esc_html__('Set form input Border Color', 'fasindus-core')
                      ),
                    )
                  )
              ),  // End of elemnt kc_icon

          )
      ); // End add map

  } // End if

}
