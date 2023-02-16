<?php
/*
 * All Custom Shortcode for [theme_name] theme.
 * Author & Copyright: quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */

if( ! function_exists( 'fasindus_shortcodes' ) ) {
  function fasindus_shortcodes( $options ) {

    $options       = array();

    /* Topbar Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Topbar Shortcodes', 'fasindus'),
      'shortcodes' => array(

        // Topbar item
        array(
          'name'          => 'fasindus_widget_topbars',
          'title'         => esc_html__('Topbar info', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'fasindus_widget_topbar',
          'clone_title'   => esc_html__('Add New', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),
          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Header Info Title', 'fasindus')
            ),
            array(
              'id'        => 'info_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Header Info Icon', 'fasindus')
            ),

          ),

        ),
       

      ),
    );

    /* Header Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Header Shortcodes', 'fasindus'),
      'shortcodes' => array(

        // header Social
        array(
          'name'          => 'fasindus_header_socials',
          'title'         => esc_html__('Header Social', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'fasindus_header_social',
          'clone_title'   => esc_html__('Add New Social', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'fasindus')
            ),
            array(
              'id'        => 'social_icon_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Color', 'fasindus'),
            ),
            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'title'     => esc_html__('Social Link', 'fasindus')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'fasindus'),
              'yes'     => esc_html__('Yes', 'fasindus'),
              'no'     => esc_html__('No', 'fasindus'),
            ),

          ),

        ),
        // header Social End

        // header Middle Infos
        array(
          'name'          => 'fasindus_header_middle_infos',
          'title'         => esc_html__('Header Middle Info', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'fasindus_header_middle_info',
          'clone_title'   => esc_html__('Add New Info', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'fasindus')
            ),
            array(
              'id'        => 'social_icon_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Color', 'fasindus'),
            ),
            array(
              'id'        => 'address_text',
              'type'      => 'text',
              'title'     => esc_html__('Address Text', 'fasindus')
            ),
            array(
              'id'        => 'address_desc',
              'type'      => 'text',
              'title'     => esc_html__('Address Details', 'fasindus')
            ),
          ),

        ),
        // header Middle Infos End



      ),
    );

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Content Shortcodes', 'fasindus'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => esc_html__('Spacer', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => esc_html__('Height', 'fasindus'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Social Icons
        array(
          'name'          => 'fasindus_socials',
          'title'         => esc_html__('Social Icons', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'fasindus_social',
          'clone_title'   => esc_html__('Add New', 'fasindus'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Colors', 'fasindus')
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Color', 'fasindus'),
              'wrap_class' => 'column_third',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Icon Hover Color', 'fasindus'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-three'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Backrgound Color', 'fasindus'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '!=', 'style-one'),
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Backrgound Hover Color', 'fasindus'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-two'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Color', 'fasindus'),
              'wrap_class' => 'column_third',
              'dependency'  => array('social_select', '==', 'style-three'),
            ),

            // Icon Size
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => esc_html__('Icon Size', 'fasindus'),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => esc_html__('Link', 'fasindus')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'fasindus')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'fasindus'),
              'on_text'     => esc_html__('Yes', 'fasindus'),
              'off_text'     => esc_html__('No', 'fasindus'),
            ),

          ),

        ),
        // Social Icons

        // Useful Links
        array(
          'name'          => 'fasindus_useful_links',
          'title'         => esc_html__('Useful Links', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'fasindus_useful_link',
          'clone_title'   => esc_html__('Add New', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'column_width',
              'type'      => 'select',
              'title'     => esc_html__('Column Width', 'fasindus'),
              'options'        => array(
                'full-width' => esc_html__('One Column', 'fasindus'),
                'half-width' => esc_html__('Two Column', 'fasindus'),
                'third-width' => esc_html__('Three Column', 'fasindus'),
              ),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title_link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'fasindus')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'fasindus'),
              'on_text'     => esc_html__('Yes', 'fasindus'),
              'off_text'     => esc_html__('No', 'fasindus'),
            ),
            array(
              'id'        => 'link_title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'fasindus')
            ),

          ),

        ),
        // Useful Links

        // Simple Image List
        array(
          'name'          => 'fasindus_image_lists',
          'title'         => esc_html__('Simple Image List', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'fasindus_image_list',
          'clone_title'   => esc_html__('Add New', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => esc_html__('Image', 'fasindus')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => esc_html__('Link', 'fasindus')
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => esc_html__('Open link to new tab?', 'fasindus')
            ),

          ),

        ),
        // Simple Image List

        // Simple Link
        array(
          'name'          => 'fasindus_simple_link',
          'title'         => esc_html__('Simple Link', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'link_style',
              'type'      => 'select',
              'title'     => esc_html__('Link Style', 'fasindus'),
              'options'        => array(
                'link-underline' => esc_html__('Link Underline', 'fasindus'),
                'link-arrow-right' => esc_html__('Link Arrow (Right)', 'fasindus'),
                'link-arrow-left' => esc_html__('Link Arrow (Left)', 'fasindus'),
              ),
            ),
            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Icon', 'fasindus'),
              'value'      => 'fa fa-caret-right',
              'dependency'  => array('link_style', '!=', 'link-underline'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => esc_html__('Link Text', 'fasindus'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'fasindus'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'fasindus'),
              'on_text'     => esc_html__('Yes', 'fasindus'),
              'off_text'     => esc_html__('No', 'fasindus'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Normal Mode', 'fasindus')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Text Color', 'fasindus'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Color', 'fasindus'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Hover Mode', 'fasindus')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Text Hover Color', 'fasindus'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_hover_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Hover Color', 'fasindus'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => esc_html__('Font Sizes', 'fasindus')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => esc_html__('Text Size', 'fasindus'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),

          ),
        ),
        // Simple Link

        // Blockquotes
        array(
          'name'          => 'fasindus_blockquote',
          'title'         => esc_html__('Blockquote', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'blockquote_style',
              'type'      => 'select',
              'title'     => esc_html__('Blockquote Style', 'fasindus'),
              'options'        => array(
                '' => esc_html__('Select Blockquote Style', 'fasindus'),
                'style-one' => esc_html__('Style One', 'fasindus'),
                'style-two' => esc_html__('Style Two', 'fasindus'),
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => esc_html__('Text Size', 'fasindus'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),
            array(
              'id'        => 'content_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Content Color', 'fasindus'),
            ),
            array(
              'id'        => 'left_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Left Border Color', 'fasindus'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Border Color', 'fasindus'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => esc_html__('Background Color', 'fasindus'),
            ),
            // Content
            array(
              'id'        => 'content',
              'type'      => 'textarea',
              'title'     => esc_html__('Content', 'fasindus'),
            ),

          ),

        ),
        // Blockquotes

      ),
    );

    /* Widget Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Widget Shortcodes', 'fasindus'),
      'shortcodes' => array(

        // widget Contact info
        array(
          'name'          => 'fasindus_widget_contact_info',
          'title'         => esc_html__('Contact info', 'fasindus'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'fasindus'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'textarea',
              'title'     => esc_html__('Description', 'fasindus'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => esc_html__('Link text', 'fasindus'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'fasindus'),
            ),

          ),
        ),

       // About widget Block
        array(
          'name'          => 'fasindus_about_widget',
          'title'         => esc_html__('About Widget Block', 'fasindus'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),
            array(
              'id'        => 'image_url',
              'type'      => 'image',
              'title'     => esc_html__('About Block Image', 'fasindus'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'textarea',
              'title'     => esc_html__('Description', 'fasindus'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => esc_html__('Link text', 'fasindus'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Link', 'fasindus'),
            ),

          ),
        ),


      // Service Contact Widget
        array(
          'name'          => 'fasindus_service_widget_contacts',
          'title'         => esc_html__('Service Feature Widget', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'fasindus_service_widget_contact',
          'clone_title'   => esc_html__('Add New', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),
            array(
              'id'        => 'contact_title',
              'type'      => 'text',
              'title'     => esc_html__('Title', 'fasindus')
            ),
          ),
          'clone_fields'  => array(
           
             array(
              'id'        => 'info',
              'type'      => 'text',
              'title'     => esc_html__('Contact Info', 'fasindus')
            ),

          ),

        ),
      // Service Contact Widget End
        // widget download-widget
        array(
          'name'          => 'fasindus_download_widgets',
          'title'         => esc_html__('Download Widget', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'fasindus_download_widget',
          'clone_title'   => esc_html__('Add New', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),
          ),
          'clone_fields'  => array(

            array(
              'id'        => 'download_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Download Icon', 'fasindus')
            ),
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Download Title', 'fasindus')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => esc_html__('Download Link', 'fasindus')
            ),

          ),

        ),

      ),
    );

    /* Footer Shortcodes */
    $options[]     = array(
      'title'      => esc_html__('Footer Shortcodes', 'fasindus'),
      'shortcodes' => array(

        // Footer Menus
        array(
          'name'          => 'fasindus_footer_menus',
          'title'         => esc_html__('Footer Menu Links', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'fasindus_footer_menu',
          'clone_title'   => esc_html__('Add New', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'menu_title',
              'type'      => 'text',
              'title'     => esc_html__('Menu Title', 'fasindus')
            ),
            array(
              'id'        => 'menu_link',
              'type'      => 'text',
              'title'     => esc_html__('Menu Link', 'fasindus')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => esc_html__('Open New Tab?', 'fasindus'),
              'on_text'     => esc_html__('Yes', 'fasindus'),
              'off_text'     => esc_html__('No', 'fasindus'),
            ),

          ),

        ),
        // Footer Menus
        array(
          'name'          => 'footer_infos',
          'title'         => esc_html__('footer logo and Text', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'footer_info',
          'clone_title'   => esc_html__('Add New', 'fasindus'),
          'fields'        => array(
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),
            array(
              'id'        => 'desc',
              'type'      => 'textarea',
              'title'     => esc_html__('Description', 'fasindus'),
            ),
            
          ),
          'clone_fields'  => array(
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => esc_html__('Social Icon', 'fasindus')
            ),
            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'title'     => esc_html__('Social Link', 'fasindus')
            ),
          ),

        ),

      // footer contact info
      array(
        'name'          => 'fasindus_footer_contact_infos',
        'title'         => esc_html__('Contact info', 'fasindus'),
        'view'          => 'clone',
        'clone_id'      => 'fasindus_footer_contact_info',
        'clone_title'   => esc_html__('Add New', 'fasindus'),
        'fields'        => array(

          array(
            'id'        => 'custom_class',
            'type'      => 'text',
            'title'     => esc_html__('Custom Class', 'fasindus'),
          ),
          array(
            'id'        => 'title',
            'type'      => 'textarea',
            'title'     => esc_html__('Heading Title', 'fasindus'),
          ),

        ),
        'clone_fields'  => array(

          array(
            'id'        => 'item',
            'type'      => 'text',
            'title'     => esc_html__('Contact info item', 'fasindus')
          ),
        ),

      ),

      // footer Address
       array(
          'name'          => 'fasindus_footer_address_item',
          'title'         => esc_html__('Footer Top Address', 'fasindus'),
          'view'          => 'clone',
          'clone_id'      => 'fasindus_footer_address_items',
          'clone_title'   => esc_html__('Add New', 'fasindus'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => esc_html__('Custom Class', 'fasindus'),
            ),

          ),
          'clone_fields'  => array(
            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => esc_html__('Address Title', 'fasindus')
            ),
            array(
              'id'        => 'item1',
              'type'      => 'text',
              'title'     => esc_html__('Address item One', 'fasindus')
            ),
            array(
              'id'        => 'item2',
              'type'      => 'text',
              'title'     => esc_html__('Address item Two', 'fasindus')
            ),

          ),
        ),

      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'fasindus_shortcodes' );
}