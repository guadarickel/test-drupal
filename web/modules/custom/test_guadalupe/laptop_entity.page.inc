<?php

/**
 * @file
 * Contains laptop_entity.page.inc.
 *
 * Page callback for Laptop entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Laptop entity templates.
 *
 * Default template: laptop_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_laptop_entity(array &$variables) {
  // Fetch LaptopEntity Entity Object.
  $laptop_entity = $variables['elements']['#laptop_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
