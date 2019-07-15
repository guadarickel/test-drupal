<?php

namespace Drupal\test_guadalupe\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Laptop entity entities.
 *
 * @ingroup test_guadalupe
 */
interface LaptopEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Laptop entity name.
   *
   * @return string
   *   Name of the Laptop entity.
   */
  public function getName();

  /**
   * Sets the Laptop entity name.
   *
   * @param string $name
   *   The Laptop entity name.
   *
   * @return \Drupal\test_guadalupe\Entity\LaptopEntityInterface
   *   The called Laptop entity entity.
   */
  public function setName($name);

  /**
   * Gets the Laptop entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Laptop entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Laptop entity creation timestamp.
   *
   * @param int $timestamp
   *   The Laptop entity creation timestamp.
   *
   * @return \Drupal\test_guadalupe\Entity\LaptopEntityInterface
   *   The called Laptop entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Laptop entity published status indicator.
   *
   * Unpublished Laptop entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Laptop entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Laptop entity.
   *
   * @param bool $published
   *   TRUE to set this Laptop entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\test_guadalupe\Entity\LaptopEntityInterface
   *   The called Laptop entity entity.
   */
  public function setPublished($published);

}
