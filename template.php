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
