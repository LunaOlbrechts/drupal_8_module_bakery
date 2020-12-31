<?php 

namespace Drupal\thomas_more_social_media\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\BaseFormIdInterface;
use Drupal\Core\Form\FormStateInterface;

class SettingsForm extends FormBase{

    public function getFormId()
    {
        return 'thomas_more_social_media_settings';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['facebook_url'] = [
            '#type' => 'textfield',
            '#title' => $this->t('facebook_url'),
            '#default_value' => 'facebook url',
        ];
            
        $form['linkedin_url'] = [
            '#type' => 'textfield',
            '#title' => $this->t('linkedin_url'),
            '#default_value' => 'linkedin url',
        ];

        $form['google_url'] = [
            '#type' => 'textfield',
            '#title' => $this->t('google_url'),
            '#default_value' => 'google url',
        ];

        $form['twitter_url'] = [
            '#type' => 'textfield',
            '#title' => $this->t('twitter_url'),
            '#default_value' => 'twitter url',
        ];

        $form['foursquare_url'] = [
            '#type' => 'textfield',
            '#title' => $this->t('foursquare url'),
            '#default_value' => 'foursquare url',
        ];
        
        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $getFacebookUrl = $form_state->getValue(['facebook_url']);
        $this->messenger()->addStatus($this->t('Your phone number is @number', ['@number' => $form_state->getValue('facebook_url')]));
        \Drupal::state()->set('facebook_url', $getFacebookUrl);
    }
}