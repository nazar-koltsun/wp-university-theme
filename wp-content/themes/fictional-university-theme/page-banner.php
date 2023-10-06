<?php 
  $bannerBackgroundImage = get_theme_file_uri('/images/ocean.jpg');

  if (get_field('page_banner_image')) {
    $bannerBackgroundImage = get_field('page_banner_image')['sizes']['pageBanner'];
  }
?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="
    background-image: url(<?php echo $bannerBackgroundImage ?>);
  ">
  </div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php echo $page_title ?></h1>
    <div class="page-banner__intro">
      <p><?php echo $page_subtitle ?></p>
    </div>
  </div>
</div>