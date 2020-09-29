<?php

namespace Drupal\cl_druppo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a "Example ajax submit form block".
 *
 * @Block(
 *   id = "ajax_submit_form_block",
 *   admin_label = @Translation("Example ajax submit form block")
 * )
 */
class ExampleAjaxFormBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('\Drupal\cl_druppo\Form\CustomAjaxForm');
    return $form;
  }

}
