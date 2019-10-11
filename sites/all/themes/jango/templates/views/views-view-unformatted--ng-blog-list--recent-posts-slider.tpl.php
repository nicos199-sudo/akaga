<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="c-content-blog-post-card-1-slider" data-slider="owl">
  <div class="owl-carousel owl-theme c-theme" data-items="3" data-auto-play="true" data-auto-play-hover-pause = "true" data-slide-speed = "8000"> 
    <?php if (!empty($title)): ?>
      <h3><?php print $title; ?></h3>
    <?php endif; ?>
    <?php foreach ($rows as $id => $row): ?>
      <div class="item">
        <div class="c-content-blog-post-card-1 c-option-2">
          <?php print $row; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>