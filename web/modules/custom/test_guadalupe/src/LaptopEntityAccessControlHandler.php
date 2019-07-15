<?php

namespace Drupal\test_guadalupe;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Laptop entity entity.
 *
 * @see \Drupal\test_guadalupe\Entity\LaptopEntity.
 */
class LaptopEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\test_guadalupe\Entity\LaptopEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished laptop entity entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published laptop entity entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit laptop entity entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete laptop entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add laptop entity entities');
  }

}
