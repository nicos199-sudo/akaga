<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?>">

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>
  
  <div class="c-content-blog-post-1-list">
    <?php print $rows; ?>
  </div>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

</div>