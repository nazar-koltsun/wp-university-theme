<?php 
  get_header(); 

  $page_title = get_the_title();
  $page_subtitle = get_field('page_banner_subtitle');
?>

<?php include 'page-banner.php' ?>

<div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p>
      <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program') ?>">
        <i class="fa fa-home" aria-hidden="true"></i>
        All Programs
      </a>
      <span class="metabox__main">
        <?php the_title() ?>
      </span>
    </p>
  </div>
  <div class="generic-content"><?php the_content(); ?></div>

  <?php
  $program_profesors = new WP_Query(array(
    'post_type' => 'profesor',
    'posts_per_page' => -1,
    'meta_query' => array(
      array(
        'key' => 'related_program',
        'compare' => 'LIKE',
        'value' => '"' . get_the_ID() . '"',
      ),
    ),
    'orderby' => 'title',
    'order' => 'ASC',
  ));

  if ($program_profesors->have_posts()) {
    echo '<hr class="section-break">';
    echo '<h2 class="headline headline--medium">' . get_the_title() . ' Profesors:</h2>';

    echo '<ul class="professor-cards">';
    while ($program_profesors->have_posts()) {
      $program_profesors->the_post();
    ?>
      <li class="professor-card__list-item">
        <a class="professor-card" href="<?php the_permalink() ?>">
          <img class="professor-card__image" src="<?php the_post_thumbnail_url('profesorLandscape') ?>" alt="">
          <span class="professor-card__name"><?php the_title() ?></span>
        </a>
      </li>
    <?php } wp_reset_postdata() ?>
    
  <?php echo '</ul>'; } ?>


  <?php

  $today = date('Y-m-d');
  $program_events = new WP_Query(array(
    'post_type' => 'event',
    'posts_per_page' => 2,
    'meta_key' => 'event_date',
    'meta_query' => array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'DATE',
      ),
      array(
        'key' => 'related_program',
        'compare' => 'LIKE',
        'value' => '"' . get_the_ID() . '"',
      ),
    ),
    'orderby' => 'meta_value',
    'order' => 'ASC',
  ));

  if ($program_events->have_posts()) {
    echo '<hr class="section-break">';
    echo '<h2 class="headline headline--medium">Upcoming ' . get_the_title() . ' Events</h2>';
  }

  while ($program_events->have_posts()) {
    $program_events->the_post();
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
        <?php echo has_excerpt() ? get_the_excerpt() . '..' : wp_trim_words(get_the_content(), 10) ?>
        <p>
          <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a>
        </p>
      </div>
    </div>
  <?php }
  wp_reset_postdata() ?>
</div>


<?php get_footer(); ?>