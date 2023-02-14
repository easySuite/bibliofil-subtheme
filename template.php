<?php

/**
 * @file
 * The primary PHP file for this theme.
 */

/**
 * Implements hook_theme_registry_alter().
 */
function bibliofil_theme_registry_alter(&$theme_registry) {
  // Use emailKanon templates from theme instead of module.
  $theme_registry['newsletter']['path'] = drupal_get_path('theme', 'bibliofil') . '/templates/emailkanon';
  $theme_registry['newsletter']['theme path'] = drupal_get_path('theme', 'bibliofil');
  $theme_registry['newsletter']['template'] = 'bibliofil--newsletter-layout';

  $theme_registry['newsletter_body']['path'] = drupal_get_path('theme', 'bibliofil') . '/templates/emailkanon';
  $theme_registry['newsletter_body']['theme path'] = drupal_get_path('theme', 'bibliofil');
  $theme_registry['newsletter_body']['template'] = 'bibliofil--newsletter-body';
}

/**
 * Implements hook_preprocess_HOOK().
 *
 * Inject a11y markup.
 */
function bibliofil_preprocess_html(&$variables) {
  if (!path_is_admin(current_path())) {
    $variables['a11y'] = theme('a11y');
  }
}

/**
 * Implements hook_preprocess_HOOK().
 *
 * Ensures all link wrapped images have a title attribute.
 */
function bibliofil_preprocess_image_formatter(&$variables) {
  if (is_array($variables['path']) && $variables['path']['options']['entity_type'] === 'node') {
    $title = $variables['path']['options']['entity']->title;
    $variables['path']['options']['attributes']['title'] = check_plain($title);
  }
}

/**
 * Implements hook_theme().
 */
function bibliofil_theme($existing, $type, $theme, $path) {
  return [
    'a11y' => [
      'variables' => [],
      'path' => $path . '/templates',
      'template' => 'a11y',
    ]
  ];
}

/**
 * Implements hook_preprocess_HOOK().
 *
 * Create a11y controls.
 */
function bibliofil_preprocess_a11y(&$variables) {
  $variables['size'] = l('<i class="fa fa-font"></i>', '#', [
    'attributes' => [
      'class' => [
        'a11y-trigger',
        'font-size-trigger',
      ],
      'title' => t('Toggle font size'),
    ],
    'html' => TRUE,
  ]);

  $variables['contrast'] = l('<i class="fa fa-adjust"></i>', '#', [
    'attributes' => [
      'class' => [
        'a11y-trigger',
        'contrast-trigger',
      ],
      'title' => t('Toggle high contrast'),
    ],
    'html' => TRUE,
  ]);

  drupal_add_js(drupal_get_path('theme', 'bibliofil') . '/scripts/a11y.js');
}
