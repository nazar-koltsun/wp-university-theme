<?php
/*
Template Name: Past Events Template
*/
get_header();

$page_title = get_the_title() ;
$page_subtitle = 'A recap of our past event';
?>

<?php include 'page-banner.php' ?>

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
  ?>
    <div class="event-summary">
      <a class="event-summary__date t-center" href="<?php the_permalink() ?>">
        <span class="event-summary__month">
          <?php
          $data = new DateTime(get_field('event_date'));
          echo $data->format('M'); ?>
        </span>
        <span class="event-summary__day"><?php echo $data->format('d'); ?></span>
      </a>
      <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny">
          <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </h5>
        <p>
          <?php echo wp_trim_words(get_the_content(), 10) ?>
          <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a>
        </p>
      </div>
    </div>
  <?php }
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