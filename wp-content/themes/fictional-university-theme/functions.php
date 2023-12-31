<?php

function university_files()
{
  wp_enqueue_script('slider-script', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('roboto-font-style', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('fot-awesome-style', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('normalize-style', get_theme_file_uri('/build/index.css'));
  wp_enqueue_style('main-style', get_theme_file_uri('/build/style-index.css'));
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('profesorLandscape', 400, 260, true);
  add_image_size('profesorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query)
{
  if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
    $today = date('Ymd');

    $query->set('meta_key', 'event_date');
    $query->set('meta_query', array(
      'key' => 'event_date',
      'compare' => '>=',
      'value' => $today,
      'type' => 'DATE',
    ));
    $query->set('orderby', 'meta_value');
    $query->set('order', 'ASC');
  }

  if (!is_admin() and is_post_type_archive('program') and $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }
}

add_action('pre_get_posts', 'university_adjust_queries');
