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

    get_template_part('template-parts/event');  
  }
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