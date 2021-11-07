<?php

namespace Drupal\koval\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Language\Language;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\MessageCommand;

/**
 * Default form for entity type.
 */
class GuestBookForm extends ContentEntityForm {

  /**
   * {@inheritDoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /** @var \Drupal\koval\Entity\GuestBookReviews $entity */
    $form = parent::buildForm($form, $form_state);
    $entity = $this->entity;
    $form['langcode'] = [
      '#title' => $this->t('Language'),
      '#type' => 'language_select',
      '#default_value' => $entity->getUntranslated()->language()->getId(),
      '#languages' => Language::STATE_ALL,
    ];

    $form['name']['widget'][0]['value']['#ajax'] = [
      'callback' => '::validateName',
      'disable-refocus' => TRUE,
      'event' => 'finishedinput',
      'progress' => [
        'type' => 'none',
      ],
    ];

    $form['email']['widget'][0]['value']['#ajax'] = [
      'callback' => '::validateEmail',
      'disable-refocus' => TRUE,
      'event' => 'finishedinput',
      'progress' => [
        'type' => 'none',
      ],
    ];

    $form['phone_number']['widget'][0]['value']['#ajax'] = [
      'callback' => '::validateNumberPhone',
      'disable-refocus' => TRUE,
      'event' => 'finishedinput',
      'progress' => [
        'type' => 'none',
      ],
    ];
    return $form;

  }

  /**
   * {@inheritDoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->getEntity();
    $entity->save();
  }

  /**
   * {@inheritDoc}
   */
  public function validateName(array &$form, FormStateInterface $form_state): object {
    $response = new AjaxResponse();
    $name = $form_state->getValue('name')[0]['value'];
    $pattern = '/^[aA-zZ]{2,100}$/';
    if (!preg_match($pattern, $name)) {
      $response->addCommand(
        new MessageCommand(
          $this->t('The name must contain between 2 and 100 Latin characters!!!'),
          '.field--name-name',
          [
            'type' => 'error',
          ],
        ),
      );
    }
    else {
      $response->addCommand(
        new MessageCommand(
          $this->t('Your name is correct'),
          '.field--name-name',
          [
            'type' => 'status',
          ],
        ),
      );
    }
    return $response;
  }

  /**
   * {@inheritDoc}
   */
  public function validateNumberPhone(array &$form, FormStateInterface $form_state): object {
    $response = new AjaxResponse();
    $phone_number = $form_state->getValue('phone_number')[0]['value'];
    $pattern = '/^[0-9]{9,15}$/';
    if (!preg_match($pattern, $phone_number)) {
      $response->addCommand(
        new MessageCommand(
          $this->t('The number is incorrect!'),
          '.field--name-phone-number',
          [
            'type' => 'error',
          ],
        ),
      );
    }
    else {
      $response->addCommand(
        new MessageCommand(
          $this->t('Your phone number is correct'),
          '.field--name-phone-number',
          [
            'type' => 'status',
          ],
        ),
      );
    }
    return $response;
  }

  /**
   * {@inheritDoc}
   */
  public function validateEmail(array &$form, FormStateInterface $form_state): object {
    $response = new AjaxResponse();
    $email = $form_state->getValue('email')[0]['value'];
    $pattern = '/^\S+@\S+\.\S+$/';
    if (!preg_match($pattern, $email)) {
      $response->addCommand(
        new MessageCommand(
          $this->t('The characters you entered are invalid in the email, enter the correct email!'),
          '.field--name-email',
          [
            'type' => 'error',
          ],
        ),
      );
    }
    else {
      $response->addCommand(
        new MessageCommand(
          $this->t('Your email is correct'),
          '.field--name-email',
          [
            'type' => 'status',
          ],
        ),
      );
    }
    return $response;
  }

}
