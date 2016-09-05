<?php

/**
 * @file
 *
 * Contains \Drupal\Tests\number_adder\Unit\NumberAdderTest.
 */

namespace Drupal\Tests\number_adder\Unit;

use Drupal\Tests\UnitTestCase;

/**
 * Test number_adder module.
 *
 * @group number_adder
 */
class NumberAdderTest extends UnitTestCase {

    /**
     * @var \Drupal\number_adder\Form
     */
    public $adder;

    public function setUp() {
        $this->adder = new \Drupal\number_adder\Form\AdderForm();
    }

    /**
     * Unit test for _addNumbers function.
     */
    public function testAdder() {
        $this->assertEquals(7, $this->adder->_addNumbers(5, 2));
    }

}