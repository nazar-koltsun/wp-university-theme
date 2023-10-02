<?php get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="
    background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>);
  ">
  </div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php the_title(); ?></h1>
    <div class="page-banner__intro">
      <p><?php echo get_post_meta(get_the_ID(), 'event_date', true); ?></p>
    </div>
  </div>
</div>

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