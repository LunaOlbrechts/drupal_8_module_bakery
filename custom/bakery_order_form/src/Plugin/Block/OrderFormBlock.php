<?php

namespace Drupal\bakery_order_form\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Bakery order form block'
 * 
 * @Block(
 *   id = "bakery_order_form_block",
 *   admin_label = @Translation("bakery_order_form"),
 *   category = @Translation("bakery_order_form")
 * )
 */

class OrderFormBlock extends BlockBase{
    /**
     * {@inheritdoc}
     */
    public function Build(){

        $form = \Drupal::formBuilder()->getForm('Drupal\bakery_order_form\Form\SettingsForm');
       
        return $form;
    }
}