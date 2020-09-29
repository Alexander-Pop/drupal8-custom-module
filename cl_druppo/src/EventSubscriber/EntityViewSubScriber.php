<?php

namespace Drupal\cl_druppo\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Class EntityViewModeAlterEventSubScriber.
 */
class EntityViewSubScriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      HookEventDispatcherInterface::ENTITY_VIEW => 'entityViewCallback',
    ];
  }

  /**
   * Preprocessing the responsive image.
   */
  public function entityViewCallback($event) {
    // Do here the things that you would do in hook_entity_view().
  }

}
