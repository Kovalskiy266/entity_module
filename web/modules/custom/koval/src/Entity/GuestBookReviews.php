<?php

namespace Drupal\koval\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Guestbook entity.
 *
 *  @ContentEntityType(
 *    id = "koval_review",
 *    label = @Translation("Review"),
 *    base_table = "koval_review",
 *    entity_keys = {
 *      "id" = "id",
 *      "uuid" = "uuid",
 *   },
 *   handlers = {
 *    "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *    "list_builder" = "Drupal\koval\ReviewsListBuilder",
 *    "views_data" = "Drupal\views\EntityViewsData",
 *    "form" = {
 *      "default" = "Drupal\koval\Form\GuestBookForm",
 *      "delete" = "Drupal\koval\Form\GuestBookDeleteForm",
 *     },
 *    "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     },
 *   },
 *   links = {
 *    "canonical" = "/koval/koval_review/{koval_review}",
 *    "delete-form" = "/koval/koval_review/{koval_review}/delete",
 *    "edit-form" = "/koval/koval_review/{koval_review}/edit",
 *    "collection" = "/koval/koval_review/list"
 *  },
 * )
 */
class GuestBookReviews extends ContentEntityBase {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('ID'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('UUID'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('Write your name'))
      ->setSettings([
        'max_length' => 100,
      ])
      ->setPropertyConstraints('value', [
        'Length' => [
          'min' => 2,
          'minMessage' => 'You name must be longer than 2 symbols',
        ],
        'Regex' => [
          'pattern' => '/^[aA-zZ]{2,100}$/',
          'message' => t('The name must contain only Latin letters, from 2 to 100 characters'),
        ],
      ])
      ->setRequired(TRUE)
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['email'] = BaseFieldDefinition::create('email')
      ->setLabel(t('Email'))
      ->setDescription(t('Write you email.'))
      ->setSettings([
        'max_length' => 70,
      ])
      ->setPropertyConstraints(
        'value', [
          'Regex' => [
            'pattern' => '/^\S+@\S+\.\S+$/',
            'message' => t('Email must be like this "yourname@mail.com"'),
          ],
        ]
      )
      ->setRequired(TRUE)
      // Set no default value.
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'email',
        'weight' => 20,
      ])
      ->setDisplayOptions('form', [
        'type' => 'email',
        'weight' => 20,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['phone_number'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Phone number'))
      ->setDescription(t('Input your phone number'))
      ->setSettings([
        'max_length' => 20,
      ])
      ->setPropertyConstraints(
        'value', [
          'Regex' => [
            'pattern' => '/^[0-9]{9,15}$/',
            'message' => t('The phone number can only contain digits, from 9 to 15 digits'),
          ],
        ]
      )
      ->setRequired(TRUE)
      // Set no default value.
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => 30,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
        'weight' => 30,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['review'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Review'))
      ->setDescription(t('Write your review.'))
      ->setRequired(TRUE)
      // Set no default value.
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'text_default',
      ])
      ->setDisplayOptions('form', [
        'label' => 'above',
        'type' => 'string_long',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['avatar'] = BaseFieldDefinition::create('image')
      ->setLabel(t('The avatar'))
      ->setDescription(t('The avatar.'))
      ->setSettings([
        'file_extensions' => 'png jpg jpeg',
        'file_directory' => 'images/avatars/',
        'max_filesize' => 2097152,
        'alt_field' => FALSE,
      ])
      // Set no default value.
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'image',
      ])
      ->setDisplayOptions('form', [
        'type' => 'image',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['image'] = BaseFieldDefinition::create('image')
      ->setLabel(t('Image'))
      ->setDescription(t('The image for review.'))
      ->setSettings([
        'file_extensions' => 'png jpg jpeg',
        'file_directory' => 'images/pictures/',
        'max_filesize' => 5242880,
        'alt_field' => FALSE,
      ])
      // Set no default value.
      ->setDefaultValue(NULL)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'image',
      ])
      ->setDisplayOptions('form', [
        'type' => 'image',
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['langcode'] = BaseFieldDefinition::create('language')
      ->setLabel(t('Language code'))
      ->setDescription(t('The language code of ContentEntityExample entity.'));
    $fields['date_created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Date created'))
      ->setDescription(t('The time that the entity was created.'))
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'datetime_custom',
        'settings' => [
          'data_format' => 'm/j/Y H:i:s',
        ],
        'weight' => 70,
      ])
      ->setDisplayConfigurable('view', TRUE);
    return $fields;
  }

}
