<?php
/*
Template Name: Past Events Template
*/
get_header();

$page_title = get_the_title();
$page_subtitle = 'A recap of our past event';
include 'page-banner.php'
?>


<div class="container container--narrow page-section">
  <?php
  $today = date('Y-m-d');
  $past_events = new WP_Query(array(
    'paged' => get_query_var('paged', 1),
    'post_type' => 'event',
    'meta_key' => 'event_date',
    'meta_query' => array(
      'key' => 'event_date',
      'compare' => '<',
      'value' => $today,
      'type' => 'DATE',
    ),
    'orderby' => 'meta_value',
    'order' => 'ASC',
  ));

  while ($past_events->have_posts()) {
    $past_events->the_post();
    get_template_part('template-parts/event');}
  ?>
  <div class="pagination">
    <?php echo paginate_links(array(
      'total' => $past_events->max_num_pages,
      'prev_text' => __('Previous', 'textdomain'),
      'next_text' => __('Next', 'textdomain'),
    )); ?>
  </div>
</div>

<?php
get_footer()
?>