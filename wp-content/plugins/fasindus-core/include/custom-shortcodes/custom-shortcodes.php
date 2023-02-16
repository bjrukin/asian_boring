<?php
/* Spacer */
function fasindus_spacer_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "height" => '',
  ), $atts));

  $result = do_shortcode('[vc_empty_space height="'. $height .'"]');
  return $result;

}
add_shortcode("fasindus_spacer", "fasindus_spacer_function");

/* Social Icons */
function fasindus_socials_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "social_select" => '',
    "custom_class" => '',
    // Colors
    "icon_color" => '',
    "icon_hover_color" => '',
    "bg_color" => '',
    "bg_hover_color" => '',
    "border_color" => '',
    "icon_size" => '',
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $icon_color || $icon_size ) {
    $inline_style .= '.social-links-'. $e_uniqid .'.social-links ul li a {';
    $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
    $inline_style .= ( $icon_size ) ? 'font-size:'. fasindus_core_check_px($icon_size) .';' : '';
    $inline_style .= '}';
  }


  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' social-links-'. $e_uniqid;

  $result = '<div class="social-links"><ul>'. do_shortcode($content) .'</ul></div>';
  return $result;

}
add_shortcode("fasindus_socials", "fasindus_socials_function");

/* Social Icon */
function fasindus_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_link" => '',
      "social_icon" => '',
      "target_tab" => ''
   ), $atts));

   $social_link = ( isset( $social_link ) ) ? 'href="'. $social_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? ' target="_blank"' : '';

   $result = '<li><a '. $social_link . $target_tab .'><i class="'. $social_icon .'"></i></a></li>';
   return $result;

}
add_shortcode("fasindus_social", "fasindus_social_function");



/* Simple Images */
function fasindus_image_lists_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "custom_class" => '',
  ), $atts));

  $result = '<ul class="simple-img '. $custom_class .'">'. do_shortcode($content) .'</ul>';
  return $result;

}
add_shortcode("fasindus_image_lists", "fasindus_image_lists_function");

/* Simple Image */
function fasindus_image_list_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "get_image" => '',
    "link" => '',
    "open_tab" => ''
  ), $atts));

  // Atts
  if ($get_image) {
    $my_image = ($get_image) ? '<img src="'. $get_image .'" alt=""/>' : '';
  } else {
    $my_image = '';
  }
  if ($link) {
    $open_tab = $open_tab ? 'target="_blank"' : '';
    $link_o = '<a href="'. $link .'" '. $open_tab .'>';
    $link_c = '</a>';
  } else {
    $link_o = '';
    $link_c = '';
  }

  $result = '<li>'. $link_o . $my_image . $link_c .'</li>';
  return $result;

}
add_shortcode("fasindus_image_list", "fasindus_image_list_function");

/* Simple Underline Link */
function fasindus_simple_link_function($atts, $content = NULL) {
  extract(shortcode_atts(array(
    "link_style" => '',
    "link_icon" => '',
    "link_text" => '',
    "link" => '',
    "target_tab" => '',
    "custom_class" => '',
    // Normal
    "text_color" => '',
    "border_color" => '',
    // Hover
    "text_hover_color" => '',
    "border_hover_color" => '',
    // Size
    "text_size" => '',
  ), $atts));

  // Atts
  $target_tab = $target_tab ? 'target="_blank"' : '';
  if ($link_style === 'link-arrow-right') {
    $arrow_icon = $link_icon ? ' <i class="'. $link_icon .'"></i>' : ' <i class="fa fa-caret-right"></i>';
  } elseif ($link_style === 'link-arrow-left') {
    $arrow_icon = $link_icon ? ' <i class="'. $link_icon .'"></i>' : ' <i class="fa fa-caret-left"></i>';
  } else {
    $arrow_icon = '';
  }
  $link_style = $link_style ? $link_style. ' ' : 'link-underline ';

  // Shortcode Style CSS
  $e_uniqid       = uniqid();
  $inline_style   = '';

  // Colors & Size
  if ( $text_color || $text_size ) {
    $inline_style .= '.-simple-link-'. $e_uniqid .'.-'. $link_style .', .-simple-link-'. $e_uniqid .'.-link-arrow-left i, .-simple-link-'. $e_uniqid .'.-link-arrow-right i {';
    $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
    $inline_style .= ( $text_size ) ? 'font-size:'. fasindus_core_check_px($text_size) .';' : '';
    $inline_style .= '}';
  }
  if ( $text_hover_color ) {
    $inline_style .= '.-simple-link-'. $e_uniqid .'.-'. $link_style .':hover, .-simple-link-'. $e_uniqid .'.-link-arrow-right:hover, .-simple-link-'. $e_uniqid .'.-link-arrow-left:hover, .-simple-link-'. $e_uniqid .'.-link-arrow-right:hover i, .-simple-link-'. $e_uniqid .'.-link-arrow-left:hover i {';
    $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .';' : '';
    $inline_style .= '}';
  }
  if ( $border_color ) {
    $inline_style .= '.-simple-link-'. $e_uniqid .'.-'. $link_style .':after {';
    $inline_style .= ( $border_color ) ? 'background-color:'. $border_color .';' : '';
    $inline_style .= '}';
  }
  if ( $border_hover_color ) {
    $inline_style .= '.-simple-link-'. $e_uniqid .'.-'. $link_style .':hover:after {';
    $inline_style .= ( $border_hover_color ) ? 'background-color:'. $border_hover_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' -simple-link-'. $e_uniqid;

  $result = '<a href="'. $link .'" '. $target_tab .' class="-'. $link_style . $custom_class . $styled_class .'">'. $link_text . $arrow_icon .'</a>';
  return $result;

}
add_shortcode("fasindus_simple_link", "fasindus_simple_link_function");


/* Top bar info */
function fasindus_widget_topbars_functions($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
   ), $atts));
   $result = '<div class="contact-info '. esc_attr( $custom_class ) .'"><ul>'. do_shortcode($content) .'</ul></div>';
   return $result;

}
add_shortcode("fasindus_widget_topbars", "fasindus_widget_topbars_functions");

/* Top bar info */
function fasindus_widget_topbar_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "title" => '',
      "info_icon" => '',
   ), $atts));

   $result = '<li><i class="'. esc_attr( $info_icon ) .'"></i>'.esc_html( $title ).'</li>';
   return $result;
}
add_shortcode("fasindus_widget_topbar", "fasindus_widget_topbar_function");


/*header Social */
function fasindus_header_socials_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => ''
   ), $atts));

   $result = '<div class="social '. $custom_class .'"> <div class="social-links"><ul>'. do_shortcode($content) .'</ul></div></div>';
   return $result;

}
add_shortcode("fasindus_header_socials", "fasindus_header_socials_function");

/* Address Info */
function fasindus_header_social_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_icon" => '',
      "social_icon_color" => '',
      "social_link" => '',
      "target_tab" => ''
   ), $atts));

   // Color
   $social_icon_color = $social_icon_color ? 'color:'. $social_icon_color .';' : '';

   $social_link =  ( isset( $social_link ) ) ? $social_link : '#';
   $target_tab = ( $target_tab === 'yes' ) ? 'target="_blank"' : '';
   $social_icon = ( isset( $social_icon ) ) ? '<i class="'.esc_attr(  $social_icon ) .'" style="'. $social_icon_color .'"></i>' : '';

   $result = '<li><a href="'.esc_url( $social_link ).'" '.esc_attr( $target_tab ).'>'.$social_icon.'</a></li>';
   return $result;

}
add_shortcode("fasindus_header_social", "fasindus_header_social_function");


/*header Middle Info */
function fasindus_header_middle_infos_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => ''
   ), $atts));

   $result = '<div class="contact-info '. $custom_class .'"><ul>'. do_shortcode($content) .'</ul></div>';
   return $result;

}
add_shortcode("fasindus_header_middle_infos", "fasindus_header_middle_infos_function");

/*header Middle Info  */
function fasindus_header_middle_info_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_icon" => '',
      "social_icon_color" => '',
      "address_text" => '',
      "address_desc" => ''
   ), $atts));

   // Color
   $social_icon_color = $social_icon_color ? 'color:'. $social_icon_color .';' : '';


   $social_icon = ( isset( $social_icon ) ) ? '<i class="'.esc_attr(  $social_icon ) .'" style="'. $social_icon_color .'"></i>' : '';

   $result = '<li><div class="icon">'.$social_icon.'</div><div class="details"><h5>'.esc_html( $address_text ).'</h5>
   <span>'.esc_html( $address_desc ).'</span></div></li>';
   return $result;

}
add_shortcode("fasindus_header_middle_info", "fasindus_header_middle_info_function");
/*header Middle Info End */

/* Address Infos */
function fasindus_address_infos_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => ''
   ), $atts));

   $result = '<div class="-top-info '. $custom_class .'">'. do_shortcode($content) .'</div>';
   return $result;

}
add_shortcode("fasindus_address_infos", "fasindus_address_infos_function");

/* Address Info */
function fasindus_address_info_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "address_style" => '',
      "info_icon" => '',
      "info_icon_color" => '',
      "info_main_text" => '',
      "info_main_text_link" => '',
      "info_main_text_color" => '',
      "info_sec_text" => '',
      "info_sec_text_link" => '',
      "info_sec_text_color" => '',
      "target_tab" => ''
   ), $atts));

   // Color
   $info_icon_color = $info_icon_color ? 'color:'. $info_icon_color .';' : '';
   $info_main_text_color = $info_main_text_color ? 'color:'. $info_main_text_color .';' : '';
   $info_sec_text_color = $info_sec_text_color ? 'color:'. $info_sec_text_color .';' : '';

   $address_style = ( $address_style === 'style-two' ) ? '-ai-two' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';
   $info_icon = ( isset( $info_icon ) ) ? '<i class="'. $info_icon .'" style="'. $info_icon_color .'"></i>' : '';

   if (isset( $info_main_text ) && !$info_main_text_link ) {
      $info_main_text = '<span style="'. $info_main_text_color .'">'. $info_main_text .'</span>';
   } elseif (isset( $info_main_text ) && isset( $info_main_text_link )) {
      $info_main_text = '<span><a href="'. $info_main_text_link .'" '. $target_tab .'  style="'. $info_main_text_color .'">'. $info_main_text .'</a></span>';
   } else {
      $info_main_text = '';
   }
   if (isset( $info_sec_text ) && !$info_sec_text_link ) {
      $info_sec_text = '<p style="'. $info_sec_text_color .'">'. $info_sec_text .'</p>';
   } elseif (isset( $info_sec_text ) && isset( $info_sec_text_link )) {
      $info_sec_text = '<a href="'. $info_sec_text_link .'" '. $target_tab .' style="'. $info_sec_text_color .'">'. $info_sec_text .'</a>';
   } else {
      $info_sec_text = '';
   }

   $result = '<div class="-address-info '. $address_style .'">'. $info_icon .'<div class="-ai-content">'. $info_main_text . $info_sec_text .'</div></div>';
   return $result;

}
add_shortcode("fasindus_address_info", "fasindus_address_info_function");

/* Useful Links */
function fasindus_useful_links_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "column_width" => '',
      "custom_class" => ''
   ), $atts));

   $result = '<div class="site-footer"><div class="link-widget"><ul class="useful-links '. $custom_class .' '. $column_width .'">'. do_shortcode($content) .'</ul></div></div>';
   return $result;

}
add_shortcode("fasindus_useful_links", "fasindus_useful_links_function");

/* Useful Link */
function fasindus_useful_link_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "target_tab" => '',
      "title_link" => '',
      "link_title" => ''
   ), $atts));

   $title_link = ( isset( $title_link ) ) ? 'href="'. $title_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';

   $result = '<li><a '. $title_link . $target_tab .'>'. $link_title .'</a></li>';
   return $result;

}
add_shortcode("fasindus_useful_link", "fasindus_useful_link_function");

/* Footer Menus */
function fasindus_footer_menus_function($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => ''
   ), $atts));

   $result = '<div class="short-links"><ul class=" '. $custom_class .'">'. do_shortcode($content) .'</ul></div>';
   return $result;

}
add_shortcode("fasindus_footer_menus", "fasindus_footer_menus_function");

/* Footer Menu */
function fasindus_footer_menu_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "menu_title" => '',
      "menu_link" => '',
      "target_tab" => ''
   ), $atts));

   $menu_link = ( isset( $menu_link ) ) ? 'href="'. $menu_link . '"' : '';
   $target_tab = ( $target_tab === '1' ) ? 'target="_blank"' : '';

   $result = '<li><a '. $menu_link . $target_tab .'>'. $menu_title .'</a></li>';
   return $result;

}
add_shortcode("fasindus_footer_menu", "fasindus_footer_menu_function");

/* footer contact */
function fasindus_footer_contacts_functions($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "title" => ''
   ), $atts));

   $result = '<div class="service-link-widget '. $custom_class .'">
   <p>'.esc_html( $title ).'</p><ul>'. do_shortcode($content) .'</ul></div>';
   return $result;

}
add_shortcode("fasindus_footer_contact_infos", "fasindus_footer_contacts_functions");

/*  footer contact  */
function fasindus_footer_contacts_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "item" => '',
   ), $atts));
   $result = '<li>'.esc_html( $item ).'</li>';
   return $result;

}
add_shortcode("fasindus_footer_contact_info", "fasindus_footer_contacts_function");


 /* footer Address */
function fasindus_addresss_functions($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
   ), $atts));
    $result = do_shortcode($content);
   return $result;
}
add_shortcode("fasindus_footer_address_item", "fasindus_addresss_functions");


 /* footer Addresss */
function fasindus_address_functions($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "item1" => '',
      "item2" => '',
      "title" => '',
   ), $atts));

    $title = ( isset( $title ) ) ? '<h3>'. esc_html( $title ) .'</h3>' : '';
    $item1 = ( isset( $item1 ) ) ? '<p>'. wp_kses_post( $item1 ) .'</p>' : '';
    $item2 = ( isset( $item2 ) ) ? '<p>'. esc_html( $item2 ) .'</p>' : '';

    $result =  '<div class="grid">'. $title.$item1.$item2.'</div>';

    return $result;
}
add_shortcode("fasindus_footer_address_items", "fasindus_address_functions");

/* Blockquote */
function fasindus_blockquote_function($atts, $content = true) {
  extract(shortcode_atts(array(
    "blockquote_style" => '',
    "text_size" => '',
    "custom_class" => '',
    "content_color" => '',
    "left_color" => '',
    "border_color" => '',
    "bg_color" => ''
  ), $atts));

  // Shortcode Style CSS
  $e_uniqid        = uniqid();
  $inline_style  = '';

  // Text Color
  if ( $text_size || $content_color || $border_color || $bg_color ) {
    $inline_style .= '.-blockquote-'. $e_uniqid .' {';
    $inline_style .= ( $text_size ) ? 'font-size:'. $text_size .';' : '';
    $inline_style .= ( $content_color ) ? 'color:'. $content_color .';' : '';
    $inline_style .= ( $border_color ) ? 'border-color:'. $border_color .';' : '';
    $inline_style .= ( $bg_color ) ? 'background-color:'. $bg_color .';' : '';
    $inline_style .= '}';
  }
  if ( $left_color ) {
    $inline_style .= '.-blockquote-'. $e_uniqid .':before {';
    $inline_style .= ( $left_color ) ? 'background-color:'. $left_color .';' : '';
    $inline_style .= '}';
  }

  // add inline style
  add_inline_style( $inline_style );
  $styled_class  = ' -blockquote-'. $e_uniqid;

  // Style
  $blockquote_style = ($blockquote_style === 'style-two') ? 'blockquote-two ' : '';

  $result = '<blockquote class="'. $blockquote_style . $custom_class . $styled_class .'">'. do_shortcode($content) .'</blockquote>';
  return $result;

}
add_shortcode("fasindus_blockquote", "fasindus_blockquote_function");


/* Footer Logo Items */
function fasindus_widget_footer_infos_functions($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "desc" => '',
   ), $atts));

   $result = '<div class="widget about-widget '. $custom_class .'">
       <p>'.esc_html( $desc ).'</p>
       <div class="social">
         <ul>'. do_shortcode($content) .'</ul>
       </div>
    </div>';
   return $result;

}
add_shortcode("footer_infos", "fasindus_widget_footer_infos_functions");


/* Footer Logo Item */
function fasindus_widget_footer_infos_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "social_icon" => '',
      "social_link" => '',
   ), $atts));

   $result = '<li><a href="'.esc_url( $social_link ).'"><i class="'.esc_attr( $social_icon ).'"></i></a></li>';
   return $result;

}
add_shortcode("footer_info", "fasindus_widget_footer_infos_function");


/* Contact Infos */
function fasindus_widget_contact_infos_functions($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "heading_title" => ''
   ), $atts));

   $result = '<div class="contact-widget-inner '. $custom_class .'"><h3>'.esc_html( $heading_title ).'</h3><ul>'. do_shortcode($content) .'</ul></div>';
   return $result;

}
add_shortcode("fasindus_widget_contact_infos", "fasindus_widget_contact_infos_functions");


/* Widget Contact Info */
function fasindus_widget_contact_infos_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "title" => '',
      "desc" => '',
      "link_text" => '',
      "link" => '',
   ), $atts));



   $result = '<div class="contact-widget '.esc_attr( $custom_class ).'"><div><h5>'.esc_html( $title ).'<span>'.esc_html( $desc ).'</span></h5><a href="'.esc_url( $link ).'">'.esc_html( $link_text ).'</a></div></div>';
   return $result;

}
add_shortcode("fasindus_widget_contact_info", "fasindus_widget_contact_infos_function");


/* Service Contact Widgets */
function fasindus_service_widget_contacts_functions($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "contact_title" => '',
   ), $atts));
   $result = '<div class="service-features-widget  '. $custom_class .'"><div><h3>'.esc_html( $contact_title ).'</h3><ol>'. do_shortcode($content) .'</ol></div></div>';
   return $result;

}
add_shortcode("fasindus_service_widget_contacts", "fasindus_service_widget_contacts_functions");

/* Service Contact Widget */
function fasindus_service_widget_contact_functions($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "info" => '',
   ), $atts));

   $result = '<li>'.esc_html( $info ).'</li>';
   return $result;
}
add_shortcode("fasindus_service_widget_contact", "fasindus_service_widget_contact_functions");

/* Download Widgets */
function fasindus_download_widgets_functions($atts, $content = true) {
   extract(shortcode_atts(array(
      "custom_class" => '',
   ), $atts));
   $result = '<div class="download-widget '. $custom_class .'"><ul>'. do_shortcode($content) .'</ul></div>';
   return $result;

}
add_shortcode("fasindus_download_widgets", "fasindus_download_widgets_functions");

/* Download Widget */
function fasindus_download_widget_functions($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "download_icon" => '',
      "title" => '',
      "link" => '',
   ), $atts));

   $result = '<li><a href="'.esc_url( $link ).'"><i class="'.esc_attr( $download_icon ).'"></i>'.esc_html( $title ).'</a><li>';
   return $result;
}
add_shortcode("fasindus_download_widget", "fasindus_download_widget_functions");

/* Current Year - Shortcode */
if( ! function_exists( 'fasindus_current_year' ) ) {
  function fasindus_current_year() {
    return date('Y');
  }
  add_shortcode( 'fasindus_current_year', 'fasindus_current_year' );
}

/* Get Home Page URL - Via Shortcode */
if( ! function_exists( 'fasindus_home_url' ) ) {
  function fasindus_home_url() {
    return esc_url( home_url( '/' ) );
  }
  add_shortcode( 'fasindus_home_url', 'fasindus_home_url' );
}


/* About Widget */
function fasindus_widget_about_block_function($atts, $content = NULL) {
   extract(shortcode_atts(array(
      "custom_class" => '',
      "image_url" => '',
      "desc" => '',
      "link_text" => '',
      "link" => '',
   ), $atts));

    $image_url = wp_get_attachment_url( $image_url );
    $image_alt = get_post_meta( $image_url, '_wp_attachment_image_alt', true);
   
   $result = '<div class="about-widget  '.esc_attr( $custom_class ).'"><div class="img-holder"><img src="'.esc_url( $image_url ).'" alt="'.esc_attr( $image_alt ).' "></div><p>'.esc_html( $desc ).'</p><a href="'.esc_url( $link ).'">'.esc_html( $link_text ).'</a></div>';
   return $result;

}
add_shortcode("fasindus_about_widget", "fasindus_widget_about_block_function");