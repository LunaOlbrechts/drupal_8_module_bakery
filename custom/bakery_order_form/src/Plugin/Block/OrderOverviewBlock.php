<?php

namespace Drupal\bakery_order_form\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Bakery order overview block'
 * 
 * @Block(
 *   id = "bakery_order_overview_block",
 *   admin_label = @Translation("bakery_order_overview"),
 *   category = @Translation("bakery_order_overview")
 * )
 */

class OrderOverviewBlock extends BlockBase{
  
    public function Build(){

        return [
            '#theme' => 'bakery_order',
        ];

    }
}