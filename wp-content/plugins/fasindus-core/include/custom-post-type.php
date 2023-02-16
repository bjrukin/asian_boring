<?php

/**
 * Initialize Custom Post Type - Fasindus Theme
 */

function fasindus_custom_post_type() {

  // Service - Start
  $service_slug = 'service';
  $services = esc_html__('Service', 'fasindus-core');

  // Register custom post type - Service
  register_post_type('service',
    array(
      'labels' => array(
        'name' => $services,
        'singular_name' => sprintf(esc_html__('%s Post', 'fasindus-core' ), $services),
        'all_items' => sprintf(esc_html__('%s', 'fasindus-core' ), $services),
        'add_new' => esc_html__('Add New', 'fasindus-core') ,
        'add_new_item' => sprintf(esc_html__('Add New %s', 'fasindus-core' ), $services),
        'edit' => esc_html__('Edit', 'fasindus-core') ,
        'edit_item' => sprintf(esc_html__('Edit %s', 'fasindus-core' ), $services),
        'new_item' => sprintf(esc_html__('New %s', 'fasindus-core' ), $services),
        'view_item' => sprintf(esc_html__('View %s', 'fasindus-core' ), $services),
        'search_items' => sprintf(esc_html__('Search %s', 'fasindus-core' ), $services),
        'not_found' => esc_html__('Nothing found in the Database.', 'fasindus-core') ,
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'fasindus-core') ,
        'parent_item_colon' => ''
      ) ,
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 11,
      'menu_icon' => 'dashicons-welcome-add-page',
      'rewrite' => array(
        'slug' => $service_slug,
        'with_front' => false
      ),
      'has_archive' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
        'excerpt',
        'revisions',
      )
    )
  );
  // Service - End


  // Project - Start
  $project_slug = 'project';
  $projects = esc_html__('Project', 'fasindus-core');

  // Register custom post type - project
  register_post_type('project',
    array(
      'labels' => array(
        'name' => $projects,
        'singular_name' => sprintf(esc_html__('%s Post', 'fasindus-core' ), $projects),
        'all_items' => sprintf(esc_html__('%s', 'fasindus-core' ), $projects),
        'add_new' => esc_html__('Add New', 'fasindus-core') ,
        'add_new_item' => sprintf(esc_html__('Add New %s', 'fasindus-core' ), $projects),
        'edit' => esc_html__('Edit', 'fasindus-core') ,
        'edit_item' => sprintf(esc_html__('Edit %s', 'fasindus-core' ), $projects),
        'new_item' => sprintf(esc_html__('New %s', 'fasindus-core' ), $projects),
        'view_item' => sprintf(esc_html__('View %s', 'fasindus-core' ), $projects),
        'search_items' => sprintf(esc_html__('Search %s', 'fasindus-core' ), $projects),
        'not_found' => esc_html__('Nothing found in the Database.', 'fasindus-core') ,
        'not_found_in_trash' => esc_html__('Nothing found in Trash', 'fasindus-core') ,
        'parent_item_colon' => ''
      ) ,
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 12,
      'menu_icon' => 'dashicons-portfolio',
      'rewrite' => array(
        'slug' => $project_slug,
        'with_front' => false
      ),
      'has_archive' => true,
      'capability_type' => 'post',
      'hierarchical' => true,
      'supports' => array(
        'title',
        'editor',
        'thumbnail',
      )
    )
  );
  // project - End

  // Add Category Taxonomy for our Custom Post Type - Case
  register_taxonomy(
    'project_category',
    'project',
    array(
      'hierarchical' => true,
      'public' => true,
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'labels' => array(
        'name' => sprintf(esc_html__( '%s Categories', 'fasindus-core' ), $projects),
        'singular_name' => sprintf(esc_html__('%s Category', 'fasindus-core'), $projects),
        'search_items' =>  sprintf(esc_html__( 'Search %s Categories', 'fasindus-core'), $projects),
        'all_items' => sprintf(esc_html__( 'All %s Categories', 'fasindus-core'), $projects),
        'parent_item' => sprintf(esc_html__( 'Parent %s Category', 'fasindus-core'), $projects),
        'parent_item_colon' => sprintf(esc_html__( 'Parent %s Category:', 'fasindus-core'), $projects),
        'edit_item' => sprintf(esc_html__( 'Edit %s Category', 'fasindus-core'), $projects),
        'update_item' => sprintf(esc_html__( 'Update %s Category', 'fasindus-core'), $projects),
        'add_new_item' => sprintf(esc_html__( 'Add New %s Category', 'fasindus-core'), $projects),
        'new_item_name' => sprintf(esc_html__( 'New %s Category Name', 'fasindus-core'), $projects)
      ),
      'rewrite' => array( 'slug' => $project_slug . '_cat' ),
    )
  );



}


// After Theme Setup
function fasindus_custom_flush_rules() {
	// Enter post type function, so rewrite work within this function
	fasindus_custom_post_type();
	// Flush it
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'fasindus_custom_flush_rules');
add_action('init', 'fasindus_custom_post_type');


/* ---------------------------------------------------------------------------
 * Custom columns - Service
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-service_columns", "fasindus_service_edit_columns");
function fasindus_service_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = esc_html__('Title', 'fasindus-core' );
  $new_columns['thumbnail'] = esc_html__('Image', 'fasindus-core' );
  $new_columns['date'] = esc_html__('Date', 'fasindus-core' );

  return $new_columns;
}

add_action('manage_service_posts_custom_column', 'fasindus_manage_service_columns', 10, 2);
function fasindus_manage_service_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}


/* ---------------------------------------------------------------------------
 * Custom columns - case
 * --------------------------------------------------------------------------- */
add_filter("manage_edit-project_columns", "fasindus_project_edit_columns");
function fasindus_project_edit_columns($columns) {
  $new_columns['cb'] = '<input type="checkbox" />';
  $new_columns['title'] = esc_html__('Title', 'fasindus-core' );
  $new_columns['thumbnail'] = esc_html__('Image', 'fasindus-core' );
  $new_columns['date'] = esc_html__('Date', 'fasindus-core' );

  return $new_columns;
}

add_action('manage_project_posts_custom_column', 'fasindus_manage_project_columns', 10, 2);
function fasindus_manage_project_columns( $column_name ) {
  global $post;

  switch ($column_name) {

    /* If displaying the 'Image' column. */
    case 'thumbnail':
      echo get_the_post_thumbnail( $post->ID, array( 100, 100) );
    break;

    /* Just break out of the switch statement for everything else. */
    default :
      break;
    break;

  }
}
