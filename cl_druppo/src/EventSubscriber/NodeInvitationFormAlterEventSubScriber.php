<?php

namespace Drupal\cl_druppo\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;

/**
 * Altering drupal forms with hook_event_dispatcher. (need install)
 */
class NodeInvitationFormAlterEventSubScriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [
      HookEventDispatcherInterface::FORM_ALTER => 'hookFormAlter',
    ];
  }

  /**
   * Altering form array from here.
   */
  public function hookFormAlter($event) {

    if ($event->getFormId() == 'node_article_edit_form') {
      $form = $event->getForm();

      $form['info'] = [
        '#type' => 'markup',
        '#markup' => '<div class="info">John Doe was here.</div>',
      ];

      $event->setForm($form);
    }
  }

}
