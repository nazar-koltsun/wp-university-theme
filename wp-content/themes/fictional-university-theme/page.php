<?php
get_header();

$page_title = get_the_title();
$page_subtitle = get_field('page_banner_subtitle');

include 'page-banner.php';
?>


<div class="container container--narrow page-section">

  <?php
  $parentID = wp_get_post_parent_id(get_the_ID());
  if ($parentID) { ?>
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a class="metabox__blog-home-link" href="<?php echo get_permalink($parentID); ?>">
          <i class="fa fa-home" aria-hidden="true"></i>
          Back to <?php echo get_the_title($parentID) ?>
        </a>
        <span class="metabox__main"><?php the_title(); ?></span>
      </p>
    </div>
  <?php } ?>

  <?php
  $mainPageId = $parentID ? $parentID : get_the_ID();
  $pages = get_pages(array(
    'child_of' => $mainPageId
  ));

  if (count($pages) > 0) { ?>
    <div class="page-links">
      <h2 class="page-links__title">
        <a href="<?php echo get_permalink($parentID) ?>">
          <?php echo get_the_title($parentID) ?>
        </a>
      </h2>
      <ul class="min-list">
        <?php
        wp_list_pages(
          array(
            'title_li' => NULL,
            'child_of' => $mainPageId,
            'sort_column' => 'menu_order',
          )
        );
        ?>
      </ul>
    </div>
  <?php } ?>

  <div class="generic-content">
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>