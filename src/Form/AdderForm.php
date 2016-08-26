<?php

namespace Drupal\number_adder\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

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
    );
    $form['num2'] = array(
      '#type' => 'textfield',
      '#title' => t('Number 2'),
      '#required' => TRUE,
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
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message((int) $form_state->getValue('num1') + (int) $form_state->getValue('num2'));
  }

}
