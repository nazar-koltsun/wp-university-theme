<?php

function university_post_types() {
  // Event Post Type
  $eventsLabels = array(
    'name'               => 'Events',
    'singular_name'      => 'Events',
    'menu_name'          => 'Events',
    'add_new'            => 'Add New',
    'add_new_item'       => 'Add New Event',
    'edit_item'          => 'Edit Event',
    'new_item'           => 'New Event',
    'view_item'          => 'View Event',
    'search_items'       => 'Search Events',
    'not_found'          => 'No Events found',
    'all_items'          => 'All Events',
    'not_found_in_trash' => 'No Events found in trash',
  );

  register_post_type('event', array(
    'labels'              =>  $eventsLabels,
    'menu_icon'           => 'dashicons-calendar',
    'show_in_rest'        => true,
    'public'              => true,
    'has_archive'         => true,
    'publicly_queryable'  => true,
    'query_var'           => true,
    'rewrite'             => array('slug' => 'events'),
    // 'capability_type'     => 'post',
    // 'hierarchical'        => false,
    'menu_position'       => 5, // Position in the admin menu
    'supports'            => array('title', 'editor', 'excerpt'),
  ));

  // Program Post Type
  $programsLabels = array(
    'name'               => 'Programs',
    'singular_name'      => 'Programs',
    'menu_name'          => 'Programs',
    'add_new'            => 'Add Program',
    'add_new_item'       => 'Add New Program',
    'edit_item'          => 'Edit Program',
    'new_item'           => 'New Program',
    'view_item'          => 'View Program',
    'search_items'       => 'Search Programs',
    'not_found'          => 'No Programs found',
    'all_items'          => 'All Programs',
    'not_found_in_trash' => 'No Programs found in trash',
  );

  register_post_type('program', array(
    'labels'              =>  $programsLabels,
    'menu_icon'           => 'dashicons-desktop',
    'show_in_rest'        => true,
    'public'              => true,
    'has_archive'         => true,
    'publicly_queryable'  => true,
    'query_var'           => true,
    'rewrite'             => array('slug' => 'programs'),
    // 'capability_type'     => 'post',
    // 'hierarchical'        => false,
    'menu_position'       => 6, // Position in the admin menu
    'supports'            => array('title', 'editor'),
  ));
}

add_action('init', 'university_post_types');

?>
