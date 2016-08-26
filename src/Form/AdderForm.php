<?php

namespace Drupal\number_adder\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Class AdderForm.
 *
 * @package Drupal\number_adder\Form
 */
class AdderForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'adder_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['title'] = array(
      '#type' => 'markup',
      '#markup' => 'I will add the two numbers you enter.',
    );
    $form['num1'] = array(
      '#type' => 'textfield',
      '#title' => t('Number 1'),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => array($this, '_adderAjax'),
        'event' => 'change',
        'progress' => array(
          'type' => 'throbber',
          'message' => $this,
        ),
      ],
    );
    $form['num2'] = array(
      '#type' => 'textfield',
      '#title' => t('Number 2'),
      '#required' => TRUE,
      '#ajax' => [
        'callback' => array($this, '_adderAjax'),
        'event' => 'change',
        'progress' => array(
          'type' => 'throbber',
          'message' => $this,
        ),
      ],
      '#suffix' => '<span class="ajax-adder"></span>'
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Submit'),
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (!is_numeric($form_state->getValue('num1'))) {
      $form_state->setErrorByName('num1', $this->t('Must be a number.'));
    }
    if (!is_numeric($form_state->getValue('num2'))) {
      $form_state->setErrorByName('num2', $this->t('Must be a number.'));
    }
  }

  /**
   * Ajax callback.
   */
  public function _adderAjax(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $num1 = !empty($form_state->getValue('num1')) ? $form_state->getValue('num1') : 0;
    $num2 = !empty($form_state->getValue('num2')) ? $form_state->getValue('num2') : 0;
    if (is_numeric($num1) && is_numeric($num2)) {
      $message =  "sum: " . $num1 . " + " . $num2 . " = " . ($num1 + $num2);
    }
    else {
      $message = "Only numbers may be added.";
    }
    $response->addCommand(new HtmlCommand('.ajax-adder', $message));
    return $response;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message((int) $form_state->getValue('num1') + (int) $form_state->getValue('num2'));
  }

}
