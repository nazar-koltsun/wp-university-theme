<?php
get_header();

$page_title = get_the_archive_title();
$page_subtitle = get_the_archive_description();

include 'page-banner.php';
?>


<div class="container container--narrow page-section">
  <?php
  while (have_posts()) {
    the_post();
  ?>

    <div class="post-item">
      <h2 class="headline headline--medium headline--post-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>
      <div class="metabox">
        <p>Posted by: <?php the_author_posts_link() ?> on <?php the_time('n.j.y g:i a'); ?> in <?php echo get_the_category_list(', ') ?></p>
      </div>
      <div class="generic-content">
        <?php the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading »</a></p>
      </div>
    </div>
    <?php }
  ?>
  <div class="pagination">
    <?php echo paginate_links(array(
      'prev_text' => __( 'Previous', 'textdomain' ),
      'next_text' => __( 'Next', 'textdomain' ),
    ));?>
  </div>
</div>

<?php
get_footer()
?>