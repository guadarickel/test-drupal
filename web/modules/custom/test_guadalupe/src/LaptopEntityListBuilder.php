<?php

namespace Drupal\test_guadalupe;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Laptop entity entities.
 *
 * @ingroup test_guadalupe
 */
class LaptopEntityListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Laptop entity ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\test_guadalupe\Entity\LaptopEntity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.laptop_entity.edit_form',
      ['laptop_entity' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
