<?php

/**
 * @file
 * Color.
 */

$info = [
  // Available colors and color labels used in theme.
  'fields' => [
    'base' => t('Base'),
    'link' => t('Link'),

    'primary' => t('Primary'),
    'secondary' => t('Secondary'),
    'text' => t('Text'),
    'text_link' => t('Text link'),
    'text_link_on_dark' => t('Text link on dark background'),
    'text_on_primary' => t('Text on primary'),
    'text_on_secondary' => t('Text on secondary'),
    'topbar' => t('Topbar'),
    'topbar_text_color' => t('Topbar text color'),
    'body_background_color' => t('Body background color'),
    'extended_search_pane' => t('Extended search pane'),
  ],
  // Pre-defined color schemes.
  'schemes' => [
    'default' => [
      'title' => t('Default'),
      'colors' => [
        'base' => '#2c2c30',
        'link' => '#5b9f50',

        'primary' => '#2c2c30',
        'secondary' => '#f66d70',
        'text' => '#ffffff',
        'text_link' => '#5b9f50',
        'text_link_on_dark' => '#4d898d',
        'text_on_primary' => '#ffffff',
        'text_on_secondary' => '#fffff2',
        'topbar' => '#f1f2f3',
        'topbar_text_color' => '#5b9f50',
        'body_background_color' => '#4d4d51',
        'extended_search_pane' => '#262625',
      ],
    ],
  ],

  // Images to copy over.
  'copy' => [],

  // CSS files (excluding @import) to rewrite with new color scheme.
  'css' => [],

  // Gradient definitions.
  'gradients' => [],

  // Color areas to fill (x, y, width, height).
  'fill' => [],

  // Coordinates of all the theme slices (x, y, width, height)
  // with their filename as used in the stylesheet.
  'slices' => [],

  // Reference color used for blending. Matches the base.png's colors.
  'blend_target' => '#ffffff',

  // Preview files.
  'preview_css' => 'color/preview.css',

  // Base file for image generation.
  'base_image' => 'color/base.png',
];
