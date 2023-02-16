<?php
/*
 * All Theme Options for Fasindus theme.
 * Author & Copyright:quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */

function fasindus_settings( $settings ) {

  $settings           = array(
    'menu_title'      => FASINDUS_NAME . esc_html__(' Options', 'fasindus'),
    'menu_slug'       => sanitize_title(FASINDUS_NAME) . '_options',
    'menu_type'       => 'theme',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => FASINDUS_NAME .' <small>V-'. FASINDUS_VERSION .' by <a href="'. FASINDUS_BRAND_URL .'" target="_blank">'. FASINDUS_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'fasindus_settings' );

// Theme Framework Options
function fasindus_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Branding
  // ------------------------------
  $options[]   = array(
    'name'     => 'fasindus_theme_branding',
    'title'    => esc_html__('Brand', 'fasindus'),
    'icon'     => 'fa fa-trophy',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo',
        'title'    => esc_html__('Logo', 'fasindus'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Site Logo', 'fasindus')
          ),
          array(
            'id'    => 'fasindus_logo',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'fasindus'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'fasindus'),
            'add_title' => esc_html__('Add Logo', 'fasindus'),
          ),
          array(
            'id'    => 'fasindus_trlogo',
            'type'  => 'image',
            'title' => esc_html__('Transparent Logo', 'fasindus'),
            'info'  => esc_html__('Upload your Transparent logo here. If you not upload, then site title will load in this logo location.', 'fasindus'),
            'add_title' => esc_html__('Add Logo', 'fasindus'),
          ),
          array(
            'id'          => 'fasindus_logo_top',
            'type'        => 'number',
            'title'       => esc_html__('Logo Top Space', 'fasindus'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'fasindus_logo_bottom',
            'type'        => 'number',
            'title'       => esc_html__('Logo Bottom Space', 'fasindus'),
            'attributes'  => array( 'placeholder' => 5 ),
            'unit'        => 'px',
          ),
          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('WordPress Admin Logo', 'fasindus')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'fasindus'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'fasindus'),
            'add_title' => esc_html__('Add Login Logo', 'fasindus'),
          ),
        ) // end: fields
      ), // end: section
    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'fasindus'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'fasindus'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
       array(
        'id'    => 'theme_responsive',
        'off_text'  => 'No',
        'on_text'  => 'Yes',
        'type'  => 'switcher',
        'title' => esc_html__('Responsive', 'fasindus'),
        'info' => esc_html__('Turn on if you don\'t want your site to be responsive.', 'fasindus'),
        'default' => false,
      ),
      array(
        'id'    => 'theme_preloder',
        'off_text'  => 'No',
        'on_text'  => 'Yes',
        'type'  => 'switcher',
        'title' => esc_html__('Preloder', 'fasindus'),
        'info' => esc_html__('Turn off if you don\'t want your site to be Preloder.', 'fasindus'),
        'default' => true,
      ),
      array(
        'id'    => 'theme_layout_width',
        'type'  => 'image_select',
        'title' => esc_html__('Full Width & Extra Width', 'fasindus'),
        'info' => esc_html__('Boxed or Fullwidth? Choose your site layout width. Default : Full Width', 'fasindus'),
        'options'      => array(
          'container'    => FASINDUS_CS_IMAGES .'/boxed-width.jpg',
          'container-fluid'    => FASINDUS_CS_IMAGES .'/full-width.jpg',
        ),
        'default'      => 'container-fluid',
        'radio'      => true,
      ),
       array(
        'id'    => 'theme_page_comments',
        'type'  => 'switcher',
        'title' => esc_html__('Hide Page Comments?', 'fasindus'),
        'label' => esc_html__('Yes! Hide Page Comments.', 'fasindus'),
        'on_text' => esc_html__('Yes', 'fasindus'),
        'off_text' => esc_html__('No', 'fasindus'),
        'default' => false,
      ),
      array(
        'type'    => 'notice',
        'class'   => 'info cs-fasindus-heading',
        'content' => esc_html__('Background Options', 'fasindus'),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'             => 'theme_layout_bg_type',
        'type'           => 'select',
        'title'          => esc_html__('Background Type', 'fasindus'),
        'options'        => array(
          'bg-image' => esc_html__('Image', 'fasindus'),
          'bg-pattern' => esc_html__('Pattern', 'fasindus'),
        ),
        'dependency' => array( 'theme_layout_width_container', '==', 'true' ),
      ),
      array(
        'id'    => 'theme_layout_bg_pattern',
        'type'  => 'image_select',
        'title' => esc_html__('Background Pattern', 'fasindus'),
        'info' => esc_html__('Select background pattern', 'fasindus'),
        'options'      => array(
          'pattern-1'    => FASINDUS_CS_IMAGES . '/pattern-1.png',
          'pattern-2'    => FASINDUS_CS_IMAGES . '/pattern-2.png',
          'pattern-3'    => FASINDUS_CS_IMAGES . '/pattern-3.png',
          'pattern-4'    => FASINDUS_CS_IMAGES . '/pattern-4.png',
          'custom-pattern'  => FASINDUS_CS_IMAGES . '/pattern-5.png',
        ),
        'default'      => 'pattern-1',
        'radio'      => true,
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-pattern' ),
      ),
      array(
        'id'      => 'custom_bg_pattern',
        'type'    => 'upload',
        'title'   => esc_html__('Custom Pattern', 'fasindus'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type|theme_layout_bg_pattern_custom-pattern', '==|==|==', 'true|bg-pattern|true' ),
        'info' => __('Select your custom background pattern. <br />Note, background pattern image will be repeat in all x and y axis. So, please consider all repeatable area will perfectly fit your custom patterns.', 'fasindus'),
      ),
      array(
        'id'      => 'theme_layout_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'fasindus'),
        'dependency' => array( 'theme_layout_width_container|theme_layout_bg_type', '==|==', 'true|bg-image' ),
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'fasindus'),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'fasindus'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

          // Header Select
          array(
            'id'           => 'select_header_design',
            'type'         => 'image_select',
            'title'        => esc_html__('Select Header Design', 'fasindus'),
            'options'      => array(
              'style_one'    => FASINDUS_CS_IMAGES .'/hs-1.png',
              'style_two'    => FASINDUS_CS_IMAGES .'/hs-2.png',
              'style_three'    => FASINDUS_CS_IMAGES .'/hs-3.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'header_design',
            ),
            'radio'        => true,
            'default'   => 'style_one',
            'info' => esc_html__('Select your header design, following options will may differ based on your selection of header design.', 'fasindus'),
          ),
          // Header Select

          // Extra's
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Extra\'s', 'fasindus'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'fasindus'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'fasindus'),
            'default' => true,
          ),
          array(
            'id'    => 'fasindus_search',
            'type'  => 'switcher',
            'title' => esc_html__('Header Search', 'fasindus'),
            'info' => esc_html__('Turn On if you want to Hide Header Search .', 'fasindus'),
            'default' => false,
          ),
          array(
            'id'    => 'header_cta',
            'type'  => 'switcher',
            'title' => esc_html__('Header CTA', 'fasindus'),
            'info' => esc_html__('Turn On if you want to Show Header CTA .', 'fasindus'),
            'default' => false,
          ),
          array(
            'id'    => 'cta_text',
            'type'  => 'text',
            'title' => esc_html__('CTA text', 'fasindus'),
            'info' => esc_html__('Write Header navigation Bar Cal To Action here.', 'fasindus'),
            'dependency'  => array('header_cta', '==', true),
          ),
          array(
            'id'    => 'cta_link',
            'type'  => 'text',
            'title' => esc_html__('CTA link', 'fasindus'),
            'info' => esc_html__('Write Header navigation Bar Cal To Action Link here.', 'fasindus'),
            'dependency'  => array('header_cta', '==', true),
          ),
        )
      ),

      // header top bar
      array(
        'name'     => 'header_top_bar_tab',
        'title'    => esc_html__('Top Bar', 'fasindus'),
        'icon'     => 'fa fa-minus',
        'fields'   => array(

          array(
            'id'          => 'top_bar',
            'type'        => 'switcher',
            'title'       => esc_html__('Hide Top Bar', 'fasindus'),
            'on_text'     => esc_html__('Yes', 'fasindus'),
            'off_text'    => esc_html__('No', 'fasindus'),
            'default'     => true,
          ),
          array(
            'id'          => 'top_left',
            'title'       => esc_html__('Top left Block', 'fasindus'),
            'desc'        => esc_html__('Top bar left block.', 'fasindus'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
            'after'       => 'Helpful shortcodes: [fasindus_widget_topbars][fasindus_widget_topbar title=" +884574156414" info_icon="ti-mobile"][fasindus_widget_topbar title=" example@demo.com" info_icon="ti-email"][fasindus_widget_topbar title=" Sun - Fri 10AM - PM" info_icon="ti-time"][/fasindus_widget_topbars] or any shortcode.',
          ),
          array(
            'id'          => 'top_right',
            'title'       => esc_html__('Top Right Block', 'fasindus'),
            'desc'        => esc_html__('Top bar right block.', 'fasindus'),
            'type'        => 'textarea',
            'shortcode'   => true,
            'dependency'  => array('top_bar', '==', false),
            'after'       => 'Helpful shortcodes: [fasindus_header_socials][fasindus_header_social social_icon="ti-facebook" social_link="#"][fasindus_header_social social_icon="ti-twitter-alt" social_link="#"][fasindus_header_social social_icon="ti-linkedin" social_link="#"][fasindus_header_social social_icon="ti-pinterest" social_link="#"][/fasindus_header_socials] or any shortcode.',
          ),
        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Title Bar (or) Banner', 'fasindus'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Title Area', 'fasindus')
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar ?', 'fasindus'),
            'label'   => esc_html__('If you want to Hide title bar in your sub-pages, please turn this ON.', 'fasindus'),
            'default'    => false,
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__('Padding Spaces Top & Bottom', 'fasindus'),
            'options'        => array(
              'padding-default' => esc_html__('Default Spacing', 'fasindus'),
              'padding-custom' => esc_html__('Custom Padding', 'fasindus'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'false' ),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Top', 'fasindus'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Bottom', 'fasindus'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Background Options', 'fasindus'),
            'dependency' => array( 'need_title_bar', '==', 'false' ),
          ),
          array(
            'id'      => 'titlebar_bg_overlay_color',
            'type'    => 'color_picker',
            'title'   => esc_html__('Overlay Color', 'fasindus'),
            'dependency' => array( 'need_title_bar', '==', 'false' ),
          ),
          array(
            'id'    => 'title_color',
            'type'  => 'color_picker',
            'title' => esc_html__('Title Color', 'fasindus'),
            'dependency'   => array('banner_type', '==', 'default-title'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Breadcrumbs', 'fasindus'),
          ),
         array(
            'id'      => 'need_breadcrumbs',
            'type'    => 'switcher',
            'title'   => esc_html__('Hide Breadcrumbs', 'fasindus'),
            'label'   => esc_html__('If you want to hide breadcrumbs in your banner, please turn this ON.', 'fasindus'),
            'default'    => false,
          ),
        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'fasindus'),
    'icon'     => 'fa fa-ellipsis-h',
    'sections' => array(

      // footer contacts
      array(
        'name'     => 'footer_contact_tab',
        'title'    => esc_html__('Contact Area', 'fasindus'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Contact Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Footer Contact Block', 'fasindus')
          ),
          array(
            'id'    => 'footer_contact_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Contact Block', 'fasindus'),
            'info' => __('If you turn this ON, then Goto : Appearance > Contacts. There you can see <strong>Footer Contact 1,2,3 or 4</strong> Contact Area, add your contacts there.', 'fasindus'),
            'default' => false,
          ),
          array(
            'id'    => 'address_text',
            'type'  => 'textarea',
            'title' => esc_html__('Address Text', 'fasindus'),
            'shortcode' => true,
            'dependency' => array('footer_contact_block', '==', true),
            'after'       => 'Helpful shortcodes: [fasindus_footer_address_item][fasindus_footer_address_items title="Mail us" item1="demo@example.com" item2="examle@demo.com"] [/fasindus_footer_address_item] or any shortcode.',
          ),

        )
      ),
      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'fasindus'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Footer Widget Block', 'fasindus')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'fasindus'),
            'info' => __('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'fasindus'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'fasindus'),
            'info' => esc_html__('Choose your footer widget theme-layouts.', 'fasindus'),
            'default' => 4,
            'options' => array(
              1   => FASINDUS_CS_IMAGES . '/footer/footer-1.png',
              2   => FASINDUS_CS_IMAGES . '/footer/footer-2.png',
              3   => FASINDUS_CS_IMAGES . '/footer/footer-3.png',
              4   => FASINDUS_CS_IMAGES . '/footer/footer-4.png',
              5   => FASINDUS_CS_IMAGES . '/footer/footer-5.png',
              6   => FASINDUS_CS_IMAGES . '/footer/footer-6.png',
              7   => FASINDUS_CS_IMAGES . '/footer/footer-7.png',
              8   => FASINDUS_CS_IMAGES . '/footer/footer-8.png',
              9   => FASINDUS_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),
           array(
            'id'    => 'fasindus_ft_bg',
            'type'  => 'image',
            'title' => esc_html__('Footer Background', 'fasindus'),
            'info'  => esc_html__('Upload your footer background.', 'fasindus'),
            'add_title' => esc_html__('footer background', 'fasindus'),
            'dependency'  => array('footer_widget_block', '==', true),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'fasindus'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Copyright Layout', 'fasindus'),
          ),
         array(
            'id'    => 'hide_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Copyright?', 'fasindus'),
            'default' => false,
            'on_text' => esc_html__('Yes', 'fasindus'),
            'off_text' => esc_html__('No', 'fasindus'),
            'label' => esc_html__('Yes, do it!', 'fasindus'),
          ),
          array(
            'id'    => 'footer_copyright_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Select Copyright Layout', 'fasindus'),
            'info' => esc_html__('In above image, blue box is copyright text and yellow box is secondary text.', 'fasindus'),
            'default'      => 'copyright-3',
            'options'      => array(
              'copyright-1'    => FASINDUS_CS_IMAGES .'/footer/copyright-1.png',
              ),
            'radio'        => true,
            'dependency'     => array('hide_copyright', '!=', true),
          ),
          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'fasindus'),
            'shortcode' => true,
            'dependency' => array('hide_copyright', '!=', true),
            'after'       => 'Helpful shortcodes: [current_year] [home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-fasindus-heading',
            'content' => esc_html__('Copyright Secondary Text', 'fasindus'),
             'dependency'     => array('hide_copyright', '!=', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__('Secondary Text', 'fasindus'),
            'shortcode' => true,
            'dependency'     => array('hide_copyright', '!=', true),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'fasindus'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'fasindus'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'fasindus'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => esc_html__('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer. Highly customizable colors are in Appearance > Customize', 'fasindus'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'fasindus'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'fasindus'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'fasindus'),
            'info'           => wp_kses( __('Enter css selectors like : <strong>body, .custom-class</strong>', 'fasindus'), array( 'strong' => array() ) ),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'fasindus'),
          ),
          array(
            'id'              => 'size',
            'type'            => 'text',
            'title'           => esc_html__('Font Size', 'fasindus'),
          ),
          array(
            'id'              => 'line_height',
            'type'            => 'text',
            'title'           => esc_html__('Line-Height', 'fasindus'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'fasindus'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'fasindus'),
        'accordion_title'     => esc_html__('New Typography', 'fasindus'),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'fasindus'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'fasindus'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => esc_html__('Thin 100', 'fasindus'),
          '100i'  => esc_html__('Thin 100 Italic', 'fasindus'),
          '200'   => esc_html__('Extra Light 200', 'fasindus'),
          '200i'  => esc_html__('Extra Light 200 Italic', 'fasindus'),
          '300'   => esc_html__('Light 300', 'fasindus'),
          '300i'  => esc_html__('Light 300 Italic', 'fasindus'),
          '400'   => esc_html__('Regular 400', 'fasindus'),
          '400i'  => esc_html__('Regular 400 Italic', 'fasindus'),
          '500'   => esc_html__('Medium 500', 'fasindus'),
          '500i'  => esc_html__('Medium 500 Italic', 'fasindus'),
          '600'   => esc_html__('Semi Bold 600', 'fasindus'),
          '600i'  => esc_html__('Semi Bold 600 Italic', 'fasindus'),
          '700'   => esc_html__('Bold 700', 'fasindus'),
          '700i'  => esc_html__('Bold 700 Italic', 'fasindus'),
          '800'   => esc_html__('Extra Bold 800', 'fasindus'),
          '800i'  => esc_html__('Extra Bold 800 Italic', 'fasindus'),
          '900'   => esc_html__('Black 900', 'fasindus'),
          '900i'  => esc_html__('Black 900 Italic', 'fasindus'),
        ),
        'attributes'         => array(
          'data-placeholder' => esc_html__('Font Weight', 'fasindus'),
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => esc_html__('Upload Custom Fonts', 'fasindus'),
        'button_title'       => esc_html__('Add New Custom Font', 'fasindus'),
        'accordion_title'    => esc_html__('Adding New Font', 'fasindus'),
        'accordion'          => true,
        'desc'               => esc_html__('It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!', 'fasindus'),
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => esc_html__('Font-Family Name', 'fasindus'),
            'attributes'     => array(
              'placeholder'  => esc_html__('for eg. Arial', 'fasindus')
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .ttf <small><i>(optional)</i></small>', 'fasindus'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'fasindus'),
              'button_title' => wp_kses(__('Upload <i>.ttf</i>', 'fasindus'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .eot <small><i>(optional)</i></small>', 'fasindus'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'fasindus'),
              'button_title' => wp_kses(__('Upload <i>.eot</i>', 'fasindus'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .otf <small><i>(optional)</i></small>', 'fasindus'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'fasindus'),
              'button_title' => wp_kses(__('Upload <i>.otf</i>', 'fasindus'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => wp_kses(__('Upload .woff <small><i>(optional)</i></small>', 'fasindus'), array( 'small' => array(), 'i' => array() )),
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => esc_html__('Use this Font-Format', 'fasindus'),
              'button_title' =>wp_kses(__('Upload <i>.woff</i>', 'fasindus'), array( 'i' => array() )),
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => wp_kses(__('Extra CSS Style <small><i>(optional)</i></small>', 'fasindus'), array( 'small' => array(), 'i' => array() )),
            'attributes'     => array(
              'placeholder'  => esc_html__('for eg. font-weight: normal;', 'fasindus'),
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'fasindus'),
    'icon'   => 'fa fa-files-o'
  );

  // ------------------------------
  // Service Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'service_section',
    'title'    => esc_html__('Service', 'fasindus'),
    'icon'     => 'fa fa-th-list',
    'fields' => array(

      // Team Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-fasindus-heading',
        'content' => esc_html__('Service Single', 'fasindus')
      ),
      array(
          'id'             => 'service_sidebar_position',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Position', 'fasindus'),
          'options'        => array(
            'sidebar-right' => esc_html__('Right', 'fasindus'),
            'sidebar-left' => esc_html__('Left', 'fasindus'),
            'sidebar-hide' => esc_html__('Hide', 'fasindus'),
          ),
          'default_option' => 'Select sidebar position',
          'info'          => esc_html__('Default option : Right', 'fasindus'),
        ),
        array(
          'id'             => 'single_service_widget',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Widget', 'fasindus'),
          'options'        => fasindus_registered_sidebars(),
          'default_option' => esc_html__('Select Widget', 'fasindus'),
          'dependency'     => array('service_sidebar_position', '!=', 'sidebar-hide'),
          'info'          => esc_html__('Default option : Main Widget Area', 'fasindus'),
        ),
        array(
          'id'    => 'service_comment_form',
          'type'  => 'switcher',
          'title' => esc_html__('Comment Area/Form', 'fasindus'),
          'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'fasindus'),
          'default' => true,
        ),
    ),
  );


  // ------------------------------
  // Project Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'project_section',
    'title'    => esc_html__('Project', 'fasindus'),
    'icon'     => 'fa fa-medkit',
    'fields' => array(

      // Team Start
      array(
        'type'    => 'notice',
        'class'   => 'info cs-fasindus-heading',
        'content' => esc_html__('Project Single', 'fasindus')
      ),
      array(
          'id'             => 'project_sidebar_position',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Position', 'fasindus'),
          'options'        => array(
            'sidebar-right' => esc_html__('Right', 'fasindus'),
            'sidebar-left' => esc_html__('Left', 'fasindus'),
            'sidebar-hide' => esc_html__('Hide', 'fasindus'),
          ),
          'default_option' => 'Select sidebar position',
          'info'          => esc_html__('Default option : Right', 'fasindus'),
        ),
        array(
          'id'             => 'single_project_widget',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Widget', 'fasindus'),
          'options'        => fasindus_registered_sidebars(),
          'default_option' => esc_html__('Select Widget', 'fasindus'),
          'dependency'     => array('project_sidebar_position', '!=', 'sidebar-hide'),
          'info'          => esc_html__('Default option : Main Widget Area', 'fasindus'),
        ),
        array(
          'id'    => 'project_comment_form',
          'type'  => 'switcher',
          'title' => esc_html__('Comment Area/Form', 'fasindus'),
          'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'fasindus'),
          'default' => true,
        ),
    ),
  );

  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'fasindus'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'fasindus'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Layout', 'fasindus')
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'fasindus'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'fasindus'),
              'sidebar-left' => esc_html__('Left', 'fasindus'),
              'sidebar-hide' => esc_html__('Hide', 'fasindus'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'fasindus'),
            'info'          => esc_html__('Default option : Right', 'fasindus'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'fasindus'),
            'options'        => fasindus_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'fasindus'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'fasindus'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Global Options', 'fasindus')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'fasindus'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'fasindus'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'fasindus'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'fasindus'),
            'default' => '55',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'fasindus'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'fasindus'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'fasindus'),
              'date'    => esc_html__('Date', 'fasindus'),
              'author'     => esc_html__('Author', 'fasindus'),
              'comments'      => esc_html__('Comments', 'fasindus'),
              'Tag'      => esc_html__('Tag', 'fasindus'),
            ),
            // 'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'fasindus'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Enable / Disable', 'fasindus')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'fasindus'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'fasindus'),
            'default' => true,
          ),
           array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'fasindus'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this On.', 'fasindus'),
            'default' => false,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'fasindus'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'fasindus'),
            'default' => true,
          ),
          array(
            'id'    => 'single_comment_form',
            'type'  => 'switcher',
            'title' => esc_html__('Comment Area/Form ?', 'fasindus'),
            'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this On.', 'fasindus'),
            'default' => false,
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Sidebar', 'fasindus')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'fasindus'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'fasindus'),
              'sidebar-left' => esc_html__('Left', 'fasindus'),
              'sidebar-hide' => esc_html__('Hide', 'fasindus'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'fasindus'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'fasindus'),
            'options'        => fasindus_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'fasindus'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'fasindus'),
          ),
          // End fields

        )
      ),

    ),
  );

if (class_exists( 'WooCommerce' )){
  // ------------------------------
  // WooCommerce Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'woocommerce_section',
    'title'    => esc_html__('WooCommerce', 'fasindus'),
    'icon'     => 'fa fa-shopping-cart',
    'fields' => array(

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-fasindus-heading',
        'content' => esc_html__('Layout', 'fasindus')
      ),
     array(
        'id'             => 'woo_product_columns',
        'type'           => 'select',
        'title'          => esc_html__('Product Column', 'fasindus'),
        'options'        => array(
          2 => esc_html__('Two Column', 'fasindus'),
          3 => esc_html__('Three Column', 'fasindus'),
          4 => esc_html__('Four Column', 'fasindus'),
        ),
        'default_option' => esc_html__('Select Product Columns', 'fasindus'),
        'help'          => esc_html__('This style will apply, default woocommerce shop and archive pages.', 'fasindus'),
      ),
      array(
        'id'             => 'woo_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'fasindus'),
        'options'        => array(
          'right-sidebar' => esc_html__('Right', 'fasindus'),
          'left-sidebar' => esc_html__('Left', 'fasindus'),
          'sidebar-hide' => esc_html__('Hide', 'fasindus'),
        ),
        'default_option' => esc_html__('Select sidebar position', 'fasindus'),
        'info'          => esc_html__('Default option : Right', 'fasindus'),
      ),
      array(
        'id'             => 'woo_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'fasindus'),
        'options'        => fasindus_registered_sidebars(),
        'default_option' => esc_html__('Select Widget', 'fasindus'),
        'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        'info'          => esc_html__('Default option : Shop Page', 'fasindus'),
      ),

      array(
        'type'    => 'notice',
        'class'   => 'info cs-fasindus-heading',
        'content' => esc_html__('Listing', 'fasindus')
      ),
      array(
        'id'      => 'theme_woo_limit',
        'type'    => 'text',
        'title'   => esc_html__('Product Limit', 'fasindus'),
        'info'   => esc_html__('Enter the number value for per page products limit.', 'fasindus'),
      ),
      // End fields

      // Start fields
      array(
        'type'    => 'notice',
        'class'   => 'info cs-fasindus-heading',
        'content' => esc_html__('Single Product', 'fasindus')
      ),
      array(
        'id'             => 'woo_related_limit',
        'type'           => 'text',
        'title'          => esc_html__('Related Products Limit', 'fasindus'),
      ),
      array(
        'id'    => 'woo_single_upsell',
        'type'  => 'switcher',
        'title' => esc_html__('You May Also Like', 'fasindus'),
        'info' => esc_html__('If you don\'t want \'You May Also Like\' products in single product page, please turn this ON.', 'fasindus'),
        'default' => false,
      ),
      array(
        'id'    => 'woo_single_related',
        'type'  => 'switcher',
        'title' => esc_html__('Related Products', 'fasindus'),
        'info' => esc_html__('If you don\'t want \'Related Products\' in single product page, please turn this ON.', 'fasindus'),
        'default' => false,
      ),
      // End fields

    ),
  );
}

  // ------------------------------
  // Extra Pages
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'fasindus'),
    'icon'     => 'fa fa-clone',
    'sections' => array(

      // error 404 page
      array(
        'name'     => 'error_page_section',
        'title'    => esc_html__('404 Page', 'fasindus'),
        'icon'     => 'fa fa-exclamation-triangle',
        'fields'   => array(

          // Start 404 Page
          array(
            'id'    => 'error_heading',
            'type'  => 'text',
            'title' => esc_html__('404 Page Heading', 'fasindus'),
            'info'  => esc_html__('Enter 404 page heading.', 'fasindus'),
          ),
          array(
            'id'    => 'error_subheading',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Sub Heading', 'fasindus'),
            'info'  => esc_html__('Enter 404 page Sub heading.', 'fasindus'),
          ),
          array(
            'id'    => 'error_page_content',
            'type'  => 'textarea',
            'title' => esc_html__('404 Page Content', 'fasindus'),
            'info'  => esc_html__('Enter 404 page content.', 'fasindus'),
            'shortcode' => true,
          ),
          array(
            'id'    => 'error_page_bg',
            'type'  => 'image',
            'title' => esc_html__('404 Page Background', 'fasindus'),
            'info'  => esc_html__('Choose 404 page background styles.', 'fasindus'),
            'add_title' => esc_html__('Add 404 Image', 'fasindus'),
          ),
          array(
            'id'    => 'error_btn_text',
            'type'  => 'text',
            'title' => esc_html__('Button Text', 'fasindus'),
            'info'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'fasindus'),
          ),
          // End 404 Page

        ) // end: fields
      ), // end: fields section

      // maintenance mode page
      array(
        'name'     => 'maintenance_mode_section',
        'title'    => esc_html__('Maintenance Mode', 'fasindus'),
        'icon'     => 'fa fa-hourglass-half',
        'fields'   => array(

          // Start Maintenance Mode
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : <strong>Maintenance Mode Page</strong>', 'fasindus')
          ),
          array(
            'id'             => 'enable_maintenance_mode',
            'type'           => 'switcher',
            'title'          => esc_html__('Maintenance Mode', 'fasindus'),
            'default'        => false,
          ),
          array(
            'id'             => 'maintenance_mode_page',
            'type'           => 'select',
            'title'          => esc_html__('Maintenance Mode Page', 'fasindus'),
            'options'        => 'pages',
            'default_option' => esc_html__('Select a page', 'fasindus'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          array(
            'id'             => 'maintenance_mode_title',
            'type'           => 'text',
            'title'          => esc_html__('Maintenance Mode Text', 'fasindus'),
          ),
          array(
            'id'             => 'maintenance_mode_text',
            'type'           => 'textarea',
            'title'          => esc_html__('Maintenance Mode Text', 'fasindus'),
          ),
          array(
            'id'             => 'maintenance_mode_bg',
            'type'           => 'background',
            'title'          => esc_html__('Page Background', 'fasindus'),
            'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
          ),
          // End Maintenance Mode

        ) // end: fields
      ), // end: fields section

    )
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'fasindus'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'fasindus'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'fasindus'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'fasindus'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'fasindus'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'fasindus'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'fasindus'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'fasindus'),
            'accordion_title' => esc_html__('New Sidebar', 'fasindus'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'fasindus'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(
          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Custom JS', 'fasindus')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'fasindus'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'fasindus'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Common Texts', 'fasindus')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'fasindus'),
          ),
          array(
            'id'          => 'view_more_text',
            'type'        => 'text',
            'title'       => esc_html__('View More Text', 'fasindus'),
          ),
          array(
            'id'          => 'share_text',
            'type'        => 'text',
            'title'       => esc_html__('Share Text', 'fasindus'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'fasindus'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__('Author Text', 'fasindus'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'fasindus'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('WooCommerce', 'fasindus')
          ),
          array(
            'id'          => 'add_to_cart_text',
            'type'        => 'text',
            'title'       => esc_html__('Add to Cart Text', 'fasindus'),
          ),
          array(
            'id'          => 'details_text',
            'type'        => 'text',
            'title'       => esc_html__('Details Text', 'fasindus'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Pagination', 'fasindus')
          ),
          array(
            'id'          => 'older_post',
            'type'        => 'text',
            'title'       => esc_html__('Older Posts Text', 'fasindus'),
          ),
          array(
            'id'          => 'newer_post',
            'type'        => 'text',
            'title'       => esc_html__('Newer Posts Text', 'fasindus'),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-fasindus-heading',
            'content' => esc_html__('Single Portfolio Pagination', 'fasindus')
          ),
          array(
            'id'          => 'prev_port',
            'type'        => 'text',
            'title'       => esc_html__('Prev Case Text', 'fasindus'),
          ),
          array(
            'id'          => 'next_port',
            'type'        => 'text',
            'title'       => esc_html__('Next Case Text', 'fasindus'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // envato account
  // ------------------------------
  $options[]   = array(
    'name'     => 'envato_account_section',
    'title'    => esc_html__('Envato Account', 'fasindus'),
    'icon'     => 'fa fa-link',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => esc_html__('Enter your Username and API key. You can get update our themes from WordPress admin itself.', 'fasindus'),
      ),
      array(
        'id'      => 'themeforest_quomodotheme',
        'type'    => 'text',
        'title'   => esc_html__('Envato Username', 'fasindus'),
      ),
      array(
        'id'      => 'themeforest_api',
        'type'    => 'text',
        'title'   => esc_html__('Envato API Key', 'fasindus'),
        'class'   => 'text-security',
        'after'   => __('<p>This is not a password field. Enter your Envato API key, which is located in : <strong>http://themeforest.net/user/[YOUR-USER-NAME]/api_keys/edit</strong></p>', 'fasindus')
      ),

    )
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'fasindus'),
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'fasindus_options' );