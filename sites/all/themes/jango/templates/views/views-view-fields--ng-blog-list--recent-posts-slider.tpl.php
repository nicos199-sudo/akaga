<?php
/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php $name = _views_field($fields, 'name'); ?>

<?php print _views_field($fields, 'field_images'); ?>
<div class="c-body">
  <div class="c-title c-font-uppercase c-font-bold">
      <a href="<?php print _views_field($fields, 'path'); ?>"><?php print _views_field($fields, 'title'); ?></a>
  </div>
  <div class="c-author"> <?php print $name ? t('By') : ''; ?>
          <span class="c-font-uppercase"><?php print $name; ?></span>
       <?php print t('on'); ?>
      <span class="c-font-uppercase"><?php print _views_field($fields, 'created'); ?></span>
  </div>
  <div class="c-panel">
      <?php print _views_field($fields, 'field_tags'); ?>
      <div class="c-comments">
          <a href="<?php print _views_field($fields, 'path'); ?>">
              <i class="icon-speech"></i> <?php print _views_field($fields, 'comment_count') . ' ' .t('omments'); ?></a>
      </div>
  </div>
  <?php print _views_field($fields); ?>
</div>