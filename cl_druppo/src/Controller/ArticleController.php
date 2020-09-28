<?php

namespace Drupal\cl_druppo\Controller;

class ArticleController {

  public function page() {

    $items = [
      array('name' => 'Article one'),
      array('name' => 'Article two'),
      array('name' => 'Article three'),
      array('name' => 'Article four'),
    ];

    return [
      '#theme' => 'article_list',
      '#items' => $items,
      '#title' => 'Our article list'
    ];
  }
}
