<?php

namespace Drupal\cl_druppo;

use Drupal\Core\Session\AccountProxy;

/**
 * CowService is a simple exampe of a Drupal 8 service.
 * Usage: 
 * $myservice = \Drupal::service('cl_druppo.cow'); 
 * echo $myservice->saySomething();
 * echo $myservice->whoIsYourOwner();
  * echo $myservice->howDoYouLookLike();
 */
class DruppoService {

  private $currentUser;
  private $sounds = ["looO", 'mooO'];

  /**
   * Part of the DependencyInjection magic happening here.
   */
  public function __construct(
    AccountProxy $currentUser
  ) {
    $this->currentUser = $currentUser;
  }

  /**
   * Returns a a Drupal user as an owner.
   */
  public function whoIsYourOwner() {
    return $this->currentUser->getDisplayName();
  }

  /**
   * Returns a cow sound.
   */
  public function saySomething() {
    return $this->sounds[array_rand($this->sounds)];
  }

  /**
   * Real photo of our cow.
   */
  public function howDoYouLookLike() {
    return print_r('
           (    )
            (oo)
   )\.-----/(O O)
  # ;       / u
    (  .   |} )
     |/ `.;|/;
     "     " "
     ', FALSE);
  }

}