<?php

namespace Drupal\koval;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * Provides a list controller for content_entity_example_contact entity.
 *
 * @ingroup content_entity_example
 */
class ReviewsListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   *
   * We override ::render() so that we can add our own content above the table.
   * parent::render() is where EntityListBuilder creates the table using our
   * buildHeader() and buildRow() implementations.
   */
  public function render() {
    $build['description'] = [
      '#markup' => $this->t('Here are user reviews'),
    ];
    $build += parent::render();
    return $build;
  }

  /**
   * {@inheritdoc}
   *
   * Building the header and content lines for the contact list.
   *
   * Calling the parent::buildHeader() adds a column for the possible actions
   * and inserts the 'edit' and 'delete' links as defined for the entity type.
   */
  public function buildHeader() {
    $header['name'] = $this->t('Name of user');
    $header['email'] = $this->t('Email of user');
    $header['number_phone'] = $this->t('Number phone of user');
    $header['review'] = $this->t('Review of user');
    $header['avatar'] = $this->t('Avatar of user');
    $header['image'] = $this->t('Image for review');
    $header['date'] = $this->t('Date created');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /** @var \Drupal\koval\Entity\GuestBookReviews $entity */
    $row['name'] = $entity->name->value;
    $row['email'] = $entity->email->value;
    $row['phone_number'] = $entity->phone_number->value;
    $row['review'] = $entity->review->value;
    $row['date_created'] = $entity->date_created->value;
    return $row + parent::buildRow($entity);
  }

}
