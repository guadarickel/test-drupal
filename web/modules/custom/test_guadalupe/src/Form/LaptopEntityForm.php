<?php

namespace Drupal\test_guadalupe\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Laptop entity edit forms.
 *
 * @ingroup test_guadalupe
 */
class LaptopEntityForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\test_guadalupe\Entity\LaptopEntity */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Laptop entity.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Laptop entity.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.laptop_entity.canonical', ['laptop_entity' => $entity->id()]);
  }

}
