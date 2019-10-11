<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */
hide($content['links']['comment']);
hide($content['links']['node']);
hide($content['field_small_description']);
hide($content['field_client']);
hide($content['field_categories']);
$output = field_view_field('node', $node, 'field_categories');
if(arg(2) == 'teaser'): ?>
  <div class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <div class="cbp-l-inline">
      <div class="cbp-l-inline-left">
         <?php print render($content['field_images']); ?>
      </div>

      <div class="cbp-l-inline-right">
          <div class="cbp-l-inline-title"><?php print $title; ?></div>
          <div class="cbp-l-inline-subtitle"><?php print render($content['field_client']); ?></div>

          <div class="cbp-l-inline-desc"><?php print render($content); ?></div>

          <?php if (isset($content['field_url_the_site'])) : ?>
          <a href="<?php print $content['field_url_the_site']['#items'][0]['value']; ?>" target="_blank" class="cbp-l-inline-view btn btn-sm c-btn-square c-btn-border-1x c-btn-dark c-btn-uppercase c-btn-bold"><?php print t('VIEW PROJECT'); ?></a>
          <?php endif; ?>
      </div>
    </div>
  </div>
<?php else: ?>

  <div class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <div class="cbp-popup-content">
      <div class="cbp-l-project-title"><?php print $title; ?></div>
      <div
        class="cbp-l-project-subtitle"><?php print render($content['field_small_description']); ?>
      </div>
      <?php print render($content['field_images']); ?>
      <div class="cbp-l-project-container">
        <div class="cbp-l-project-desc">
          <div class="cbp-l-project-desc-title">
            <span><?php print t('Project Description'); ?></span>
          </div>
          <div class="cbp-l-project-desc-text">
            <?php print render($content); ?>
          </div>
        </div>
        <div class="cbp-l-project-details">
          <div class="cbp-l-project-details-title">
            <span><?php print t('Project Details'); ?></span>
          </div>

          <ul class="cbp-l-project-details-list">
            <li>
              <strong><?php print t('Client'); ?></strong><?php print $content['field_client']['#items'][0]['value']; ?>
            </li>
            <li>
              <strong><?php print t('Date'); ?></strong><?php print date('d ', $created) . t(date('M', $created)) . date(' Y', $created); ?>
            </li>
            <li>
              <strong><?php print t('Categories'); ?></strong><?php print render($content['field_categories']); ?>
            </li>
          </ul>
          <?php if (isset($content['field_url_the_site'])) : ?>
          <a href="<?php print $content['field_url_the_site']['#items'][0]['value']; ?>" target="_blank" class="cbp-l-project-details-visit btn btn-sm c-btn-border-1x c-btn-square c-btn-dark c-btn-uppercase c-btn-bold">
            <?php print t('visit the site'); ?>
          </a>
          <?php endif; ?>
        </div>
      </div>
      <br>
      <br>
      <br>
    </div>
  </div>
<?php endif; ?>