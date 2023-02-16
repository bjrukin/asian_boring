<?php

/**
 * Plugin language
 */
function fasindus_plugin_language_setup() {
  load_plugin_textdomain( 'fasindus-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'init', 'fasindus_plugin_language_setup' );

/* WPAUTOP for shortcode output */
if( ! function_exists( 'fasindus_set_wpautop' ) ) {
  function fasindus_set_wpautop( $content, $force = true ) {
    if ( $force ) {
      $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
    }
    return do_shortcode( shortcode_unautop( $content ) );
  }
}

/* Use shortcodes in text widgets */
add_filter('widget_text', 'do_shortcode');

/* Shortcodes enable in the_excerpt */
add_filter('the_excerpt', 'do_shortcode');

/* Remove p tag and add by our self in the_excerpt */
remove_filter('the_excerpt', 'wpautop');


/* Add Extra Social Fields in Admin User Profile */
function fasindus_add_twitter_facebook( $contactmethods ) {
  $contactmethods['twitter']    = 'Twitter';
  $contactmethods['facebook']   = 'Facebook';
  $contactmethods['instagram']  = 'Instagram';
  $contactmethods['pinterest']   = 'Pinterest';
  return $contactmethods;
}
add_filter('user_contactmethods','fasindus_add_twitter_facebook',10,1);

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
  function cs_encode_string( $string ) {
    return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
  function cs_decode_string( $string ) {
    return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
  }
}


/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'add_inline_style' ) ) {
  function add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Enqueue Inline Styles */
if ( ! function_exists( 'fasindus_enqueue_inline_styles' ) ) {
  function fasindus_enqueue_inline_styles() {

    global $all_inline_styles;

    if ( ! empty( array_filter($all_inline_styles) ) ) {
      echo '<style id="fasindus-inline-style" type="text/css">'. fasindus_compress_css_lines( join( '', $all_inline_styles ) ) .'</style>';
    }

  }
  add_action( 'wp_footer', 'fasindus_enqueue_inline_styles' );
}

/* Validate px entered in field */
if( ! function_exists( 'fasindus_core_check_px' ) ) {
  function fasindus_core_check_px( $num ) {
    return ( is_numeric( $num ) ) ? $num . 'px' : $num;
  }
}


/* Share Options */
if ( ! function_exists( 'fasindus_wp_share_option' ) ) {
  function fasindus_wp_share_option() {

    global $post;
    $page_url = get_permalink($post->ID );
    $title = $post->post_title;
    $share_text = cs_get_option('share_text');
    $share_text = $share_text ? $share_text : esc_html__( 'Share', 'fasindus' );
    $share_on_text = cs_get_option('share_on_text');
    $share_on_text = $share_on_text ? $share_on_text : esc_html__( 'Share On', 'fasindus' );
    ?>
     <div class="share">
      <?php  echo '<span>'.esc_html__('Share:','fasindus').'</span>'; ?>
      <ul>
        <li>
          <a href="//www.facebook.com/sharer/sharer.php?u=<?php print(urlencode($page_url)); ?>&amp;t=<?php print(urlencode($title)); ?>" class="facebook" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Facebook', 'fasindus'); ?>" target="_blank"><i class="ti-facebook"></i></a>
        </li>
        <li>
          <a href="//twitter.com/home?status=<?php print(urlencode($title)); ?>+<?php print(urlencode($page_url)); ?>" class="twitter" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Twitter', 'fasindus'); ?>" target="_blank"><i class="ti-twitter-alt"></i></a>
        </li>
        <li>
          <a href="//www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode($page_url)); ?>&amp;title=<?php print(urlencode($title)); ?>" class="linkedin" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Linkedin', 'fasindus'); ?>" target="_blank"><i class="ti-linkedin"></i></a>
        </li>
        <li>
          <a href="//plus.google.com/share?url=<?php print(urlencode($page_url)); ?>" class="plus.google" data-toggle="tooltip" data-placement="top" title="<?php echo esc_attr( $share_on_text .' '); echo esc_attr('Google+', 'fasindus'); ?>" target="_blank"><i class="ti-google"></i></a>
        </li>
      </ul>
    </div>
<?php
  }
}

/* Maintenance Mode */
if( ! function_exists( 'fasindus_maintenance_mode' ) ) {
  function fasindus_maintenance_mode(){
    if( function_exists( 'cs_get_option' ) ) {
       $maintenance_mode_page = cs_get_option( 'maintenance_mode_page' );
    }
    if ( ! empty( $maintenance_mode_page ) && ! is_user_logged_in() ) {
      get_template_part('theme-layouts/post/content', 'maintenance');
      exit;
    }

  }
  add_action( 'wp', 'fasindus_maintenance_mode', 1 );
}

/* Compress CSS */
if ( ! function_exists( 'fasindus_compress_css_lines' ) ) {
  function fasindus_compress_css_lines( $css ) {
    $css  = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css  = str_replace( ': ', ':', $css );
    $css  = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }
}


/* Custom WordPress admin login logo */
if( ! function_exists( 'fasindus_theme_login_logo' ) ) {
  function fasindus_theme_login_logo() {
    $login_logo = cs_get_option('brand_logo_wp');
    if($login_logo) {
      $login_logo_url = wp_get_attachment_url($login_logo);
    } else {
      $login_logo_url = FASINDUS_IMAGES . '/logo.png';
    }
    if($login_logo) {
    echo "
      <style>
        body.login #login h1 a {
        background: url('$login_logo_url') no-repeat scroll center bottom transparent;
        height: 100px;
        width: 100%;
        margin-bottom:0px;
        }
      </style>";
    }
  }
  add_action('login_head', 'fasindus_theme_login_logo');
}

/* WordPress admin login logo link */
if( ! function_exists( 'fasindus_login_url' ) ) {
  function fasindus_login_url() {
    return site_url();
  }
  add_filter( 'login_headerurl', 'fasindus_login_url', 10, 4 );
}

/* WordPress admin login logo link */
if( ! function_exists( 'fasindus_login_title' ) ) {
  function fasindus_login_title() {
    return get_bloginfo('name');
  }
  add_filter('login_headertitle', 'fasindus_login_title');
}

/* Support WordPress uploader to following file extensions */
if( ! function_exists( 'fasindus_upload_mimes' ) ) {
  function fasindus_upload_mimes( $mimes ) {

    $mimes['ttf']   = 'font/ttf';
    $mimes['eot']   = 'font/eot';
    $mimes['woff']  = 'font/woff';
    $mimes['otf']   = 'font/otf';

    return $mimes;

  }
  add_filter( 'upload_mimes', 'fasindus_upload_mimes' );
}
