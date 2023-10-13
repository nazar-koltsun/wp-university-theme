<?php
get_header();

$page_title = get_the_title();
$page_subtitle = get_field('page_banner_subtitle');

include 'page-banner.php';
?>


<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <a class="metabox__blog-home-link" href="<?php echo site_url('/blog') ?>">
        <i class="fa fa-home" aria-hidden="true"></i>
        Blog Home
      </a>
      <span class="metabox__main">
        Posted by: <?php the_author_posts_link() ?> on <?php the_time('n.j.y g:i a'); ?> in <?php echo get_the_category_list(', ') ?>
      </span>
    </p>
  </div>
  <div class="generic-content"><?php the_content(); ?></div>
</div>


<?php get_footer(); ?>