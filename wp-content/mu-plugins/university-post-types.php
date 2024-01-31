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

  // Profesor Post Type
  $profesorsLabels = array(
    'name'               => 'Profesors',
    'singular_name'      => 'Profesors',
    'menu_name'          => 'Profesors',
    'add_new'            => 'Add Profesor',
    'add_new_item'       => 'Add New Profesor',
    'edit_item'          => 'Edit Profesor',
    'new_item'           => 'New Profesor',
    'view_item'          => 'View Profesor',
    'search_items'       => 'Search Profesors',
    'not_found'          => 'No Profesors found',
    'all_items'          => 'All Profesors',
    'not_found_in_trash' => 'No Profesors found in trash',
  );

  register_post_type('profesor', array(
    'labels'              =>  $profesorsLabels,
    'menu_icon'           => 'dashicons-welcome-learn-more',
    'show_in_rest'        => true,
    'public'              => true,
    'publicly_queryable'  => true,
    'query_var'           => true,
    'menu_position'       => 7, // Position in the admin menu
    'supports'            => array('title', 'editor', 'thumbnail'),
  ));

  // Campus Post Type
  $campusLabels = array(
    'name'               => 'Campuses',
    'singular_name'      => 'Campuses',
    'menu_name'          => 'Campuses',
    'add_new'            => 'Add Campuse',
    'add_new_item'       => 'Add New Campuse',
    'edit_item'          => 'Edit Campuse',
    'new_item'           => 'New Campuse',
    'view_item'          => 'View Campuse',
    'search_items'       => 'Search Campuses',
    'not_found'          => 'No Campuses found',
    'all_items'          => 'All Campuses',
    'not_found_in_trash' => 'No Campuses found in trash',
  );

  register_post_type('campus', array(
    'labels'              =>  $campusLabels,
    'menu_icon'           => 'dashicons-building',
    'show_in_rest'        => true,
    'public'              => true,
    'publicly_queryable'  => true,
    'query_var'           => true,
    'rewrite'             => array('slug' => 'campuses'),
    'menu_position'       => 8, // Position in the admin menu
    'supports'            => array('title', 'editor', 'thumbnail'),
  ));
}

add_action('init', 'university_post_types');
