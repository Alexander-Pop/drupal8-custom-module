<?php

namespace Drupal\cl_druppo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Our simple form class.
 */
class CustomAjaxForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'cl_druppo_ajax_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(
    array $form, 
    FormStateInterface $form_state
  ) {

    $form['massage'] = [
      '#type' => 'markup',
      '#markup' => '<div class="result_message"></div>',
    ];

    $form['number_1'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First number'),
    ];

    $form['number_2'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Second number'),
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
    ];

    $form['actions'] = [
      '#type' => 'button',
      '#value' => $this->t('Calculate'),
      '#ajax' => [
        'callback' => '::setMessage',
      ]
    ];

    return $form;
  }

  public function setMessage(
    array &$form, 
    FormStateInterface $form_state
  ) {
    $response = new AjaxResponse();

    $response->addCommand(
      new HtmlCommand(
        '.result_message',
        '<div class="my_top_message">' . $this->t('The result is @result', ['@result' => ($form_state->getValue('number_1') + $form_state->getValue('number_2'))])
        )
    );

    return $response;
  }

    /**
   * {@inheritdoc}
   */
  public function validateForm(
    array &$form, 
    FormStateInterface $form_state
  ) {
    if (strlen($form_state->getValue('name')) < 3) {
      $form_state->setErrorByName(
        'name',
        $this->t('Your name should be longer than 3 letters in order for me to say it ;)')
      );
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(
    array &$form, 
    FormStateInterface $form_state
  ) {
    drupal_set_message( $this->t("Your name is ") . $form_state->getValue('name'));
  }

}