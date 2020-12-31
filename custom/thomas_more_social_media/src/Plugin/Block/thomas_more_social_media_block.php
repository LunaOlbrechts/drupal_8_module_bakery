<?php

namespace Drupal\thomas_more_social_media\Plugin\Block;
use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Thomas more social media block'
 * 
 * @Block(
 *   id = "thomas_more_social_media_block",
 *   admin_label = @Translation("thomas_more_social_media_block"),
 *   category = @Translation("thomas_more_social_media_block")
 * )
 */

class thomas_more_social_media_block extends BlockBase{

    public function Build(){

        $facebook = \Drupal::state()->get('facebookUrl');

        return[
            '#theme'=> 'social-media',
            '#attached' => ['library' => ['thomas_more_social_media/social_media']],
            '#facebook_url' => $facebook,
            '#twitter_url' => NULL,
            '#google_plus_url' => NULL,
            '#linkedin_url' => NULL,
            '#foursquare_url' => NULL,
            '#facebookcount' => 1,
            '#twitter_count' => 4,
            '#google_plus_count' => 2,
            '#linkedin_count' => 6,
            '#foursquare_count' => 1,
        ];
    }
}