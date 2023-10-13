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