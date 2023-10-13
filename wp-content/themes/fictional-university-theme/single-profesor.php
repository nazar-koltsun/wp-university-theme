<?php
get_header();

$page_title = get_the_title();
$page_subtitle = get_field('page_banner_subtitle');

include 'page-banner.php';
?>


<div class="container container--narrow page-section">
  <div class="generic-content">
    <div class="row group">
      <div class="one-third">
        <?php the_post_thumbnail('profesorPortrait') ?>
      </div>
      <div class="two-thirds">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
  <?php
  $relatedPrograms = get_field('related_program');
  if ($relatedPrograms) { ?>
    <hr class="section-break">
    <h2 class="headline headline--medium">Subject(s) Taught:</h2>
    <ul class="link-list min-list">
      <?php
      foreach ($relatedPrograms as $program) { ?>
        <li>
          <a href="<?php echo get_the_permalink($program); ?>">
            <?php echo get_the_title($program); ?>
          </a>
        </li>
      <?php } ?>
    </ul>
  <?php } ?>
</div>


<?php get_footer(); ?>