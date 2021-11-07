<?php

namespace Drupal\koval\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for koval routes.
 */
class GuestBookReviewsController extends ControllerBase {

  /**
   * Drupal services.
   *
   * @var \Drupal\Core\Entity\EntityTypeManager
   */
  protected $entityManager;

  /**
   * Drupal services.
   *
   * @var \Drupal\Core\Entity\EntityFormBuilder
   */
  protected $formBuild;

  /**
   * Method provide dependency injection and add services.
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->entityManager = $container->get('entity_type.manager');
    $instance->formBuild = $container->get('entity.form_builder');
    return $instance;
  }

  /**
   * Method that create output of module.
   */
  public function build() {
    $entity = $this->entityManager
      ->getStorage('koval_review')
      ->create([
        'entity_type' => 'node',
        'entity' => 'koval_review',
      ]);
    $storage = $this->entityManager->getStorage('koval_review');
    // Get a form default.
    $form = $this->formBuild->getForm($entity, 'default');
    $query = $storage->getQuery()
      ->sort('date_created', 'DESC')
      ->pager(5);
    $pager = [
      '#type' => 'pager',
    ];
    // Get reviews.
    $reviews = $query->execute();
    $result = $storage->loadMultiple($reviews);
    $view_builder = $this->entityManager->getViewBuilder('koval_review');
    $full_output = $view_builder->viewMultiple($result);
    return [
      '#theme' => 'koval-guestbook-page',
      '#form' => $form,
      '#pager' => $pager,
      '#reviews' => $full_output,
    ];
  }

}
