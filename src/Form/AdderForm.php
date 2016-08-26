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

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  }

}
