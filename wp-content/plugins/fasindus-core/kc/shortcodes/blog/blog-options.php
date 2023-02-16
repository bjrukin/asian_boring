<?php
add_action('init', 'fasindus_blog_kc_map', 99 );
function fasindus_blog_kc_map() {
  if (function_exists('kc_add_map')){
      kc_add_map(
        array(
        'ndrst_blog' => array(
        'name' => esc_html__('Fasindus Blog', 'fasindus-core'),
        'description' => esc_html__( 'Blog content', 'fasindus-core' ),
        'category' => FasindusLibrary::fasindus_kc_cat_name(),
        'icon' => 'cpicon kc-icon-blog-posts',
        'title' => esc_html__('Blog Settings', 'fasindus-core'),
        'is_container' => true,
        'priority'  => 130,
        'params' => array(
          esc_html__( 'General', 'fasindus-core' )  => array(
          	array(
                'name' => 'subtitle',
                'label' => esc_html__( 'Blog Sub Title','fasindus-core'),
                'type' => 'text',
                'admin_label' => true,
                'description' => esc_html__('Write Blog Sub Title ', 'fasindus-core'),
              ),
            array(
                'name' => 'title',
                'label' => esc_html__( 'Blog Title','fasindus-core'),
                'type' => 'textarea',
                'admin_label' => true,
                'description' => esc_html__('Write Blog Title ', 'fasindus-core'),
            ),
            array(
                'name' => 'desc',
                'label' => esc_html__( 'Blog Description','fasindus-core'),
                'type' => 'editor',
                'admin_label' => true,
                'description' => esc_html__('Write Blog Blog Description', 'fasindus-core'),
              ),
            array(
                'name' => 'button_title',
                'label' => esc_html__('Button Title', 'fasindus-core'),
                'type' => 'text',
                'admin_label' => true,
              ),
            array(
                'name' => 'button_link',
                'label' => esc_html__('Button Link', 'fasindus-core'),
                'type' => 'text',
                'admin_label' => true,
              ),
            array(
              "label"     =>esc_html__('Post Limit', 'fasindus-core'),
              "name"  => "blog_limit",
              'type' => 'number_slider',
                'options' => array(
                    'min' => 1,
                    'max' => 50,
                    'show_input' => true
                ),
              "description" => esc_html__( "Enter the number of items to show.", 'fasindus-core'),
            ),
            array(
              'type' => 'select',
              'label' => esc_html__( 'Order', 'fasindus-core' ),
              'options' => array(
                '' => esc_html__( 'Select Order', 'fasindus-core' ),
                'ASC' => esc_html__( 'Asending', 'fasindus-core' ),
                'DESC' => esc_html__( 'Desending', 'fasindus-core' ),
              ),
              'name' => 'blog_order',
            ),
            array(
              'name' => 'blog_orderby',
              'type' => 'select',
              'label' => esc_html__( 'Order By', 'fasindus-core' ),
              'options' => array(
                '' => esc_html__( 'Select Order', 'fasindus-core' ),
                'none' => esc_html__( 'None', 'fasindus-core' ),
                'ID' => esc_html__( 'ID', 'fasindus-core' ),
                'author' => esc_html__( 'Author', 'fasindus-core' ),
                'title' => esc_html__( 'Title', 'fasindus-core' ),
                'date' => esc_html__( 'Date', 'fasindus-core' ),
                'menu_order' => esc_html__( 'Menu Order', 'fasindus-core' ),
              ),
            ),
            array(
              'name' => 'particular_item',
              'type' => 'post_taxonomy',
              'label' => esc_html__( 'Set particular category for display post from these category.', 'fasindus-core' ),
            ),
            array(
              'name' => 'pagination',
              'type' => 'toggle',
              'label' => esc_html__( 'Pagination', 'fasindus-core' ),
              'description' => esc_html__('Turn On if you want to Show Blog Date.', 'fasindus-core'),
            ),
           array(
              'name' => 'blog_date',
              'label' => esc_html__('Blog Date','fasindus-core'),
              'type' => 'toggle',
              'value'     => 'yes',
              'admin_label' => true,
              'description' => esc_html__('Turn On if you want to Hide Blog Date.', 'fasindus-core')
            ),
            array(
              "type"        =>'text',
              "label"     =>esc_html__('Content Length', 'fasindus-core'),
              "name"  => "short_content",
            ),
            array(
              'name' => 'readmore_text',
              'type' => 'text',
              'label' => esc_html__( 'Readmore Text', 'fasindus-core' ),
            ),
            array(
              'name' => 'class',
              'type' => 'text',
              'label' => esc_html__( 'Custom Class', 'fasindus-core' ),
            ),
          ),
          esc_html__( 'Style', 'fasindus-core' ) => array(
            array(
              "name"  => "title_color",
              "type"        =>'color_picker',
              "label"     =>esc_html__('Title Color', 'fasindus-core'),
            ),
            array(
              "name"  => "title_size",
              "type"        =>'number_slider',
              "label"     =>esc_html__('Title Size', 'fasindus-core'),
              'options' => array(
                'min' => 10,
                'max' => 40,
                'unit' => 'px',
                'show_input' => true
              )
            ),
            array(
              "name"  => "desc_color",
              "type"        =>'color_picker',
              "label"     =>esc_html__('Desctription Color', 'fasindus-core'),
            ),
            array(
              "name"  => "desc_size",
              "type"        =>'number_slider',
              "label"     =>esc_html__('Desctription Size', 'fasindus-core'),
              'options' => array(
                'min' => 10,
                'max' => 40,
                'unit' => 'px',
                'show_input' => true
              )
            ),
            array(
                  'name' => 'btn_color',
                  'label' => esc_html__('Blog Button Color','fasindus-core'),
                  'type' => 'color_picker',
                  'admin_label' => true,
                  'description' => esc_html__('Set color for Button', 'fasindus-core')
              ),
            array(
                  'name' => 'btn_bgcolor',
                  'label' => esc_html__('Blog Button Background Color','fasindus-core'),
                  'type' => 'color_picker',
                  'admin_label' => true,
                  'description' => esc_html__('Set Background color for Button', 'fasindus-core')
              ),
            array(
              'name' => 'meta_color',
              'label' => esc_html__('Post Meta Color', 'fasindus-core'),
              'type' => 'color_picker',
            ),

          ),
        ),
      ),
      )
    ); // End add map
    }
} // End if