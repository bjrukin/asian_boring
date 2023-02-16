<?php
/*
 * All Metabox related options for Fasindus theme.
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */

function fasindus_metabox_options( $options ) {

 $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
    $contact_forms = array();
    if ( $cf7 ) {
      foreach ( $cf7 as $cform ) {
        $contact_forms[ $cform->ID ] = $cform->post_title;
      }
    } else {
      $contact_forms[ esc_html__( 'No contact forms found', 'fasindus' ) ] = 0;
    }
  $options      = array();

  // -----------------------------------------
  // Post Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_type_metabox',
    'title'     => esc_html__('Post Options', 'fasindus'),
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // All Post Formats
      array(
        'name'   => 'section_post_formats',
        'fields' => array(

          // Standard, Image
          array(
            'title' => 'Standard Image',
            'type'  => 'subheading',
            'content' => esc_html__('There is no Extra Option for this Post Format!', 'fasindus'),
            'wrap_class' => 'fasindus-minimal-heading hide-title',
          ),
          // Standard, Image

          // Gallery
          array(
            'type'    => 'notice',
            'title'   => 'Gallery Format',
            'wrap_class' => 'hide-title',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Gallery Format', 'fasindus')
          ),
          array(
            'id'          => 'gallery_post_format',
            'type'        => 'gallery',
            'title'       => esc_html__('Add Gallery', 'fasindus'),
            'add_title'   => esc_html__('Add Image(s)', 'fasindus'),
            'edit_title'  => esc_html__('Edit Image(s)', 'fasindus'),
            'clear_title' => esc_html__('Clear Image(s)', 'fasindus'),
          ),
          array(
            'type'    => 'text',
            'title'   => esc_html__('Add Video URL', 'fasindus' ),
            'id'   => 'video_post_format',
            'desc' => esc_html__('Add youtube or vimeo video link', 'fasindus' ),
            'wrap_class' => 'video_post_format',
          ),
          array(
            'type'    => 'icon',
            'title'   => esc_html__('Add Quote Icon', 'fasindus' ),
            'id'   => 'quote_post_format',
            'desc' => esc_html__('Add Quote Icon here', 'fasindus' ),
            'wrap_class' => 'quote_post_format',
          ),
          // Gallery

        ),
      ),

    ),
  );

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'fasindus'),
    'post_type' => array('post', 'page'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Title Section
      array(
        'name'  => 'page_topbar_section',
        'title' => esc_html__('Top Bar', 'fasindus'),
        'icon'  => 'fa fa-minus',

        // Fields Start
        'fields' => array(

          array(
            'id'           => 'topbar_options',
            'type'         => 'image_select',
            'title'        => esc_html__('Topbar', 'fasindus'),
            'options'      => array(
              'default'     => FASINDUS_CS_IMAGES .'/topbar-default.png',
              'custom'      => FASINDUS_CS_IMAGES .'/topbar-custom.png',
              'hide_topbar' => FASINDUS_CS_IMAGES .'/topbar-hide.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'hide_topbar_select',
            ),
            'radio'     => true,
            'default'   => 'default',
          ),
          array(
            'id'          => 'top_left',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Left', 'fasindus'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'          => 'top_right',
            'type'        => 'textarea',
            'title'       => esc_html__('Top Right', 'fasindus'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
            'shortcode'       => true,
          ),
          array(
            'id'    => 'topbar_bg',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Background Color', 'fasindus'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),
          array(
            'id'    => 'topbar_border',
            'type'  => 'color_picker',
            'title' => esc_html__('Topbar Border Color', 'fasindus'),
            'dependency'  => array('hide_topbar_select', '==', 'custom'),
          ),

        ), // End : Fields

      ), // Title Section

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'fasindus'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => esc_html__('Select Header Design', 'fasindus'),
            'options'      => array(
              'default'     => FASINDUS_CS_IMAGES .'/hs-0.png',
              'style_one'   => FASINDUS_CS_IMAGES .'/hs-1.png',
              'style_two'   => FASINDUS_CS_IMAGES .'/hs-2.png',
              'style_three'   => FASINDUS_CS_IMAGES .'/hs-3.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'     => true,
            'default'   => 'default',
            'info'      => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'fasindus'),
          ),
          array(
            'id'    => 'transparency_header',
            'type'  => 'switcher',
            'title' => esc_html__('Transparent Header', 'fasindus'),
            'info' => esc_html__('Use Transparent Method', 'fasindus'),
          ),
          array(
            'id'    => 'transparent_menu_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Menu Color', 'fasindus'),
            'info' => esc_html__('Pick your menu color. This color will only apply for non-sticky header mode.', 'fasindus'),
            'dependency'   => array('transparency_header', '==', 'true'),
          ),
          array(
            'id'    => 'transparent_menu_hover_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Menu Hover Color', 'fasindus'),
            'info' => esc_html__('Pick your menu hover color. This color will only apply for non-sticky header mode.', 'fasindus'),
            'dependency'   => array('transparency_header', '==', 'true'),
          ),
          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'fasindus'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'fasindus'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'fasindus'),
          ),

          // Enable & Disable
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Enable & Disable', 'fasindus'),
            'dependency' => array('header_design', '!=', 'default'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'fasindus'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'fasindus'),
            'default' => true,
            'dependency' => array('header_design', '!=', 'default'),
          ),
        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'fasindus'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'        => 'banner_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Banner Type', 'fasindus'),
            'options'   => array(
              'default-title'    => 'Default Title',
              'revolution-slider' => 'Shortcode [Rev Slider]',
              'hide-title-area'   => 'Hide Title/Banner Area',
            ),
          ),
          array(
            'id'    => 'page_revslider',
            'type'  => 'textarea',
            'title' => esc_html__('Revolution Slider or Any Shortcodes', 'fasindus'),
            'desc' => __('Enter any shortcodes that you want to show in this page title area. <br />Eg : Revolution Slider shortcode.', 'fasindus'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your shortcode...', 'fasindus'),
            ),
            'dependency'   => array('banner_type', '==', 'revolution-slider'),
          ),
          array(
            'id'    => 'page_custom_title',
            'type'  => 'text',
            'title' => esc_html__('Custom Title', 'fasindus'),
            'attributes' => array(
              'placeholder' => esc_html__('Enter your custom title...', 'fasindus'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'fasindus'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'fasindus'),
              'padding-custom' => esc_html__('Custom Padding', 'fasindus'),
            ),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'fasindus'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'fasindus'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('banner_type|title_area_spacings', '==|==', 'default-title|padding-custom'),
          ),
          array(
            'id'    => 'title_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background', 'fasindus'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'titlebar_bg_overlay_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Overlay Color', 'fasindus'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),
          array(
            'id'    => 'title_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Title Color', 'fasindus'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'fasindus'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'fasindus'),
            'options'   => array(
              'padding-default' => esc_html__('Default Spacing', 'fasindus'),
              'padding-custom' => esc_html__('Custom Padding', 'fasindus'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'fasindus'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'fasindus'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'fasindus'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'fasindus'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'hide_header',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Header', 'fasindus'),
            'label' => esc_html__('Yes, Please do it.', 'fasindus'),
          ),
          array(
            'id'    => 'hide_breadcrumbs',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Breadcrumbs', 'fasindus'),
            'label' => esc_html__('Yes, Please do it.', 'fasindus'),
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'fasindus'),
            'label' => esc_html__('Yes, Please do it.', 'fasindus'),
          ),
       
        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'fasindus'),
    'post_type' => 'page',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => FASINDUS_CS_IMAGES . '/page-1.png',
              'extra-width'   => FASINDUS_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => FASINDUS_CS_IMAGES . '/page-3.png',
              'right-sidebar' => FASINDUS_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'fasindus'),
            'options'        => fasindus_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'fasindus'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),

    ),
  );


  // -----------------------------------------
  // Service
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'service_options',
    'title'     => esc_html__('Service Extra Options', 'fasindus'),
    'post_type' => 'service',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'service_option_section',
        'fields' => array(
         array(
            'id'    => 'service_title',
            'type'  => 'text',
            'title' => esc_html__('Service Title', 'fasindus'),
            'info'    => esc_html__('Enter Service Title for Service Item.', 'fasindus'),
          ),
         array(
            'id'    => 'service_icon',
            'type'  => 'icon',
            'title' => esc_html__('Service icon', 'fasindus'),
            'info'    => esc_html__('Enter Service icon for Service Item.', 'fasindus'),
          ),
         array(
            'id'           => 'service_image',
            'type'         => 'image',
            'title'        => esc_html__('Service Grid Image', 'fasindus'),
            'add_title' => esc_html__('Add Service Grid Image', 'fasindus'),
          ),
        ),
      ),

    ),
  );

  // -----------------------------------------
  // Project
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'project_options',
    'title'     => esc_html__('Project Extra Options', 'fasindus'),
    'post_type' => 'project',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'project_option_section',
        'fields' => array(
          array(
            'id'           => 'project_title',
            'type'         => 'text',
            'title'        => esc_html__('Project title', 'fasindus'),
            'add_title' => esc_html__('Add Project title', 'fasindus'),
            'attributes' => array(
              'placeholder' => esc_html__('Project Title', 'fasindus'),
            ),
            'info'    => esc_html__('Write Project Title.', 'fasindus'),
          ),
          array(
            'id'      => 'project_subtitle',
            'type'    => 'text',
            'attributes' => array(
              'placeholder' => esc_html__('Project : Sub Title', 'fasindus'),
            ),
            'info'    => esc_html__('Write Project Sub Title.', 'fasindus'),
          ),
          array(
            'id'           => 'project_image',
            'type'         => 'image',
            'title'        => esc_html__('Project Image', 'fasindus'),
            'add_title' => esc_html__('Add Project Image', 'fasindus'),
          ),
          
        // Start fields
          array(
            'id'                  => 'project_infos',
            'title'   => esc_html__('Project Info', 'fasindus'),
            'type'                => 'group',
            'fields'              => array(
              array(
                'id'              => 'title',
                'type'            => 'text',
                'title'           => esc_html__('Info Title', 'fasindus'),
              ),
              array(
                'id'              => 'desc',
                'type'            => 'text',
                'title'           => esc_html__('Info Description', 'fasindus'),
              ),
            ),
            'button_title'        => esc_html__('Add Project info', 'fasindus'),
            'accordion_title'     => esc_html__('project Info', 'fasindus'),
          ),
           // Start fields
        ),
      ),

    ),
  );


  // -----------------------------------------
  // Project
  // -----------------------------------------

  $options[]    = array(
    'id'        => 'project_page_options',
    'title'     => esc_html__('Project Meta', 'fasindus'),
    'post_type' => 'project',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'project_accordions',
        'title' => esc_html__('Project Metabox Area', 'fasindus'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(
          array(
            'id'                  => 'accordion_box',
            'type'                => 'group',
            'fields'              => array(
              array(
                'id'              => 'accordion_title',
                'type'            => 'text',
                'title'           => esc_html__('Accordion Title', 'fasindus'),
              ),
              array(
                'id'              => 'accordion_desc',
                'type'            => 'textarea',
                'title'           => esc_html__('Accordion Desctription', 'fasindus'),
              ),
              array(
                'id'    => 'accordion_active',
                'type'  => 'switcher',
                'title' => esc_html__('Accordion Active', 'fasindus'),
                'info' => esc_html__('Turn On to show active accourdion.', 'fasindus'),
                'default' => false,
              ),
             
            ),
            'button_title'        => esc_html__('Add Project Accordion', 'fasindus'),
            'accordion_title'     => esc_html__('Project Accordion', 'fasindus'),
          ),
        ),
      ),
    ),
  );


  // -----------------------------------------
  // post options
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'post_options',
    'title'     => esc_html__('Grid Image', 'fasindus'),
    'post_type' => 'post',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(
      array(
        'name'   => 'post_option_section',
        'fields' => array(
          array(
            'id'           => 'widget_post_title',
            'type'         => 'text',
            'title'        => esc_html__('Widget Post Title', 'fasindus'),
            'add_title' => esc_html__('Add Widget Post Title here', 'fasindus'),
          ),
          array(
            'id'           => 'grid_image',
            'type'         => 'image',
            'title'        => esc_html__('Post Grid Image', 'fasindus'),
            'add_title' => esc_html__('Add Post Grid Image', 'fasindus'),
          ),
        ),
      ),

    ),
  );


  return $options;

}
add_filter( 'cs_metabox_options', 'fasindus_metabox_options' );