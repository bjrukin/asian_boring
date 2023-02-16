<?php
add_action('init', 'fasindus_gmaps_kc_map', 99 );
function fasindus_gmaps_kc_map() {
	if (function_exists('kc_add_map')){
	    kc_add_map(
        array(
          'fasindus_gmap' => array(
            'name' => 'Fasindus Google Map',
            'description' => esc_html__('Display single icon', 'fasindus-core'),
            'icon' => 'cpicon kc-icon-map',
            'category' => FasindusLibrary::fasindus_kc_cat_name(),
            'params' => array(
            'Content' => array(
              array(
                  'name' => 'gmap_id',
                  'label' => esc_html__( 'Map ID','fasindus-core'),
                  'type' => 'text',
                  'admin_label' => true,
                  'description'   => wp_kses( __('Enter google map ID. If you\'re using this in <strong>Map Tab</strong> shortcode, enter unique ID for each map tabs. Else leave it as blank. <strong>Note : This should same as Tab ID in Map Tabs shortcode.</strong> ', 'fasindus-core'), array( 'strong' => array() ) ),
                ),
              array(
                  'name' => 'gmap_api',
                  'label' => esc_html__( 'Google Map API ','fasindus-core'),
                  'type' => 'text',
                  'admin_label' => true,
                  "description" => wp_kses( __( 'New Google Maps usage policy dictates that everyone using the maps should register for a free API key. <br />Please create a key for "Google Static Maps API" and "Google Maps Embed API" using the <a href="https://console.developers.google.com/project" target="_blank">Google Developers Console</a>.<br /> Or follow this step links : <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=maps_embed_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">1. Step One</a> <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=static_maps_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">2. Step Two</a><br /> If you still receive errors, please check following link : <a href="https://churchthemes.com/2016/07/15/page-didnt-load-google-maps-correctly/" target="_blank">How to Fix?</a>', 'fasindus-core'), array( 'br' => array(), 'a' => array( 'href' => array() ) ) ),
                ),
               array(
                  'name' => 'gmap_type',
                  'label' => esc_html__( 'Google Map Type','fasindus-core'),
                  'type' => 'select',
                    'options' => array(
                      '' => 'Select Type',
                      'ROADMAP' => 'ROADMAP',
                      'SATELLITE' => 'SATELLITE',
                      'HYBRID' => 'HYBRID',
                      'TERRAIN' => 'TERRAIN',
                    ),
                  'admin_label' => true,
                  'description' => esc_html__('Select Google Map Type ', 'fasindus-core'),
                ),
               array(
                  'name' => 'gmap_style',
                  'label' => esc_html__( 'Google Map Type','fasindus-core'),
                  'type' => 'select',
                  'options' => array(
                    '' => esc_html__( 'Select Style', 'ifasindus-plugin' ),
                    "gray-scale"  =>  esc_html__( 'Gray Scale', 'ifasindus-plugin' ),
                    "mid-night" => esc_html__( 'Mid Night', 'ifasindus-plugin' ),
                    'blue-water' => esc_html__( 'Blue Water', 'ifasindus-plugin' ) ,
                    'light-dream' =>  esc_html__( 'Light Dream', 'ifasindus-plugin' ) ,
                    'pale-dawn' => esc_html__( 'Pale Dawn', 'ifasindus-plugin' ),
                    'apple-maps' =>  esc_html__( 'Apple Maps-esque', 'ifasindus-plugin' ),
                    'blue-essence' => esc_html__( 'Blue Essence', 'ifasindus-plugin' ),
                    'unsaturated-browns' => esc_html__( 'Unsaturated Browns', 'ifasindus-plugin' ) ,
                    'paper' => esc_html__( 'Paper', 'ifasindus-plugin' ),
                    'midnight-commander' => esc_html__( 'Midnight Commander', 'ifasindus-plugin' ),
                    'light-monochrome' => esc_html__( 'Light Monochrome', 'ifasindus-plugin' ) ,
                    'flat-map' => esc_html__( 'Flat Map', 'ifasindus-plugin' ) ,
                    'retro' => esc_html__( 'Retro', 'ifasindus-plugin' ) ,
                    'becomeadinosaur' => esc_html__( 'becomeadinosaur', 'ifasindus-plugin' ) ,
                    'neutral-blue' => esc_html__( 'Neutral Blue', 'ifasindus-plugin' ),
                    'subtle-grayscale' => esc_html__( 'Subtle Grayscale', 'ifasindus-plugin' ),
                    'ultra-light-labels' => esc_html__( 'Ultra Light with Labels', 'ifasindus-plugin' ),
                    'shades-grey' => esc_html__( 'Shades of Grey', 'ifasindus-plugin' ),
                    ),
                  'relation' => array(
                      'parent'    => 'gmap_type',
                      'show_when' => 'ROADMAP'
                  ),
                  'admin_label' => true,
                  'description' => esc_html__('Select Google Map Type ', 'fasindus-core'),
                ),
                array(
                  'name' => 'gmap_common_marker',
                  'label' => esc_html__( 'Map Marker','fasindus-core'),
                  'type' => 'attach_image',
                  'admin_label' => true,
                  'description' => esc_html__('Enter Map Marker ', 'fasindus-core'),
                ),
                array(
                  'name' => 'gmap_height',
                  'label' => esc_html__( 'Map Height','fasindus-core'),
                  'type' => 'text',
                  'admin_label' => true,
                  'description' => esc_html__('Enter the px value for map height. This will not work if you add this shortcode into the Map Tab shortcode. ', 'fasindus-core'),
                ),
                array(
                  'name' => 'gmap_scroll_wheel',
                  'label' => esc_html__( 'Map Scroll Wheel','fasindus-core'),
                  'type' => 'toggle',
                  'value' => false,
                  'description' => 'Turn this ON to Map Scroll Wheel',
                ),
                array(
                  'name' => 'gmap_street_view',
                  'label' => esc_html__( 'Street View Control','fasindus-core'),
                  'type' => 'toggle',
                  'value' => false,
                  'description' => 'Turn this ON to Street View Control',
                ),
                array(
                  'name' => 'gmap_maptype_control',
                  'label' => esc_html__( 'Map Type Control','fasindus-core'),
                  'type' => 'toggle',
                  'value' => false,
                  'description' => 'Turn this ON toMap Type Control',
                ),
              array(
                  'type'          => 'group',
                  'label'         => esc_html__('Map Locations', 'fasindus-core'),
                  'name'          => 'locations',
                  'description'   => esc_html__( 'Map Locations', 'fasindus-core' ),
                  'options'       => array('add_text' => esc_html__(' Add new Map Locations', 'fasindus-core')),
                  'params' => array(
                    array(
                        'name' => 'latitude',
                        'label' => esc_html__( 'Latitude','fasindus-core'),
                        'type' => 'text',
                        'description' => wp_kses( __( 'Find Latitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'fasindus-core' ), array( 'a' => array( array( 'href' => array(), 'target' => array() ) ) ) ),
                      ),
                    array(
                        'name' => 'longitude',
                        'label' => esc_html__( 'Longitude','fasindus-core'),
                        'type' => 'text',
                        'description' => wp_kses( __( 'Find Longitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'fasindus-core' ), array( 'a' => array(  array( 'href' => array(), 'target' => array()  ) ) ) ),
                      ),
                    array(
                      'name' => 'custom_marker',
                      'label' => esc_html__( 'Custom Marker','fasindus-core'),
                      'type' => 'attach_image',
                      'admin_label' => true,
                      'description' => esc_html__('Upload your unique map marker if your want to differentiate from others. ', 'fasindus-core'),
                    ),
                    array(
                      'name' => 'location_heading',
                      'label' => esc_html__( 'Heading','fasindus-core'),
                      'type' => 'text',
                      'admin_label' => true,
                    ),
                    array(
                      'name' => 'location_text',
                      'label' => esc_html__( 'Content','fasindus-core'),
                      'type' => 'textarea',
                      'admin_label' => true,
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
            )
        ),  // End of elemnt kc_icon
      )
    ); // End add map
	} // End if
}
