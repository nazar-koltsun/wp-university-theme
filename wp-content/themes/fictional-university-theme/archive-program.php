<?php
get_header();

$page_title = 'All programs';
$page_subtitle = 'There is something for everyone. Have a look around.';

include 'page-banner.php';
?>


<div class="container container--narrow page-section">
  <ul class="link-list min-list">
    <?php
    
    while (have_posts()) {
      the_post();
    ?>
      <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
    <?php }
    ?>
  </ul>

  <div class="pagination">
    <?php echo paginate_links(array(
      'prev_text' => __('Previous', 'textdomain'),
      'next_text' => __('Next', 'textdomain'),
    )); ?>
  </div>
</div>

<?php
get_footer()
?>