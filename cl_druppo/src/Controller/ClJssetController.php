<?php

namespace Drupal\cl_druppo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Output of our JS page.
 */
class ClJssetController extends ControllerBase {

  public function jsPage() {

    $build = [];
    $build['content'] = [
      '#markup' => '<div class="foo-class"> Custom JS Page: &nbsp;</div>',
    ];
    $build['#attached']['library'][] = 'cl_druppo/js_example';
    // get site's name from settings
    $build['#attached']['drupalSettings']['js_example']['title'] = $this->config('system.site')->get('name');

    return $build;
  }

}
