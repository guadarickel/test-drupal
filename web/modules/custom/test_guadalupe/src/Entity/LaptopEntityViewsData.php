<?php

namespace Drupal\test_guadalupe\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Laptop entity entities.
 */
class LaptopEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.

    return $data;
  }

}
