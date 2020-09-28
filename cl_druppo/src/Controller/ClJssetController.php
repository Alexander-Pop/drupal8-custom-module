<?php

namespace Drupal\cl_druppo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Output of our JS page.
 */
class ClJssetController extends ControllerBase {

  public function jsPage() {

    // Deny any page caching on the current request - also see routing.yml for other way   
    //\Drupal::service('page_cache_kill_switch')->trigger();

    $build = [];
    $build['content'] = [
      '#markup' => '<div class="foo-class"> Custom JS Page: &nbsp;</div>',
      //'#cache' => ['max-age' => 0,],    //other way handle cache - Set cache for 0 seconds.
    ];
    $build['#attached']['library'][] = 'cl_druppo/js_example';
    // get site's name from settings
    $build['#attached']['drupalSettings']['js_example']['title'] = $this->config('system.site')->get('name');

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function titleCallback() {
    $randTitleId = rand(0, 3);
    $randTitles = [
      'Quorum altera prosunt, nocent altera. Quod totum contra est.',
      'Sed quot homines, tot sententiae',
      'Lorem ipsum dolor sit amet',
      'Quod totum contra est.',
    ];

    return $randTitles[$randTitleId];
  }

}
