<?php
/*
 * Add Extra Field for WordPress Widgets
 * Author & Copyright: quomodotheme
 * URL: http://themeforest.net/user/quomodotheme
 */
// Add Fields for All WordPress Default Widgets
function fasindus_in_widget_form($form,$return,$instance){
  $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '', 'fasindus_custom_class' => '', 'fasindus_widget_title_icon' => '') );
  if ( !isset($instance['fasindus_custom_class']) ){
    $instance['fasindus_custom_class'] = null;
  }
  if ( !isset($instance['fasindus_widget_title_icon']) ){
    $instance['fasindus_widget_title_icon'] = null;
  }
  $title_value = esc_attr( $instance['fasindus_widget_title_icon'] );
  $title_field = array(
    'id'    => $form->get_field_name('fasindus_widget_title_icon'),
    'name'  => $form->get_field_name('fasindus_widget_title_icon'),
    'type'  => 'icon',
    'title' => esc_html__( 'Add Title Icon :', 'fasindus' ),
  );
  echo cs_add_element( $title_field, $title_value );  ?>
  <p class="widget-field cs-element">
    <label for="<?php echo esc_attr($form->get_field_id('fasindus_custom_class')); ?>"><?php echo esc_html__('Custom Class:', 'fasindus'); ?></label>
    <input class="widefat" type="text" name="<?php echo esc_attr($form->get_field_name('fasindus_custom_class')); ?>" id="<?php echo esc_attr($form->get_field_id('fasindus_custom_class')); ?>" value="<?php echo esc_attr($instance['fasindus_custom_class']);?>" />
    <span class="cs-text-desc"><?php echo esc_html__('Add your custom classes.', 'fasindus'); ?></span>
    <div class="clear"></div>
  </p>
  <?php
  $return = null;
  return array($form,$return,$instance);
}
add_action('in_widget_form', 'fasindus_in_widget_form',5,3);

// Update Fields Data
function fasindus_in_widget_form_update($instance, $new_instance, $old_instance){
  $instance['fasindus_custom_class'] = strip_tags($new_instance['fasindus_custom_class']);
  $instance['fasindus_widget_title_icon'] = strip_tags($new_instance['fasindus_widget_title_icon']);
  return $instance;
}
add_filter('widget_update_callback', 'fasindus_in_widget_form_update',5,3);

// Display Fields Output
function fasindus_dynamic_sidebar_params($params){
  global $wp_registered_widgets;
  $widget_id = $params[0]['widget_id'];
  $widget_obj = $wp_registered_widgets[$widget_id];
  $widget_opt = get_option($widget_obj['callback'][0]->option_name);
  $widget_num = $widget_obj['params'][0]['number'];
  if(isset($widget_opt[$widget_num]['fasindus_custom_class'])) {
    $fasindus_custom_class = $widget_opt[$widget_num]['fasindus_custom_class'];
  } else {
    $fasindus_custom_class = '';
  }
  if(isset($widget_opt[$widget_num]['fasindus_widget_title_icon'])) {
    $fasindus_widget_title_icon = $widget_opt[$widget_num]['fasindus_widget_title_icon'];
  } else {
    $fasindus_widget_title_icon = '';
  }
  $params[0]['before_title'] = preg_replace('/<h4 class="widget-title">/', '<h4 class="widget-title"><span class="'.$fasindus_widget_title_icon.'"></span> ',  $params[0]['before_title'], 1);
  $params[0]['before_widget'] = preg_replace('/class="/', 'class="'.$fasindus_custom_class.' ',  $params[0]['before_widget'], 1);
  return $params;
}
add_filter('dynamic_sidebar_params', 'fasindus_dynamic_sidebar_params');