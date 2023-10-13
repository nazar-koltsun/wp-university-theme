<?php
get_header();

$page_title = 'All events';
$page_subtitle = 'Se what is going in all world.';

include 'page-banner.php';
?>


<div class="container container--narrow page-section">
  <?php
  
  while (have_posts()) {
    the_post();
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
      'prev_text' => __('Previous', 'textdomain'),
      'next_text' => __('Next', 'textdomain'),
    )); ?>
  </div>
  <hr class="section-break">
  <p>Are you lookin for the past events?
    <a href="<?php echo site_url('/past-events') ?>">Check out our past vents archive.</a>
  </p>
</div>

<?php
get_footer()
?>