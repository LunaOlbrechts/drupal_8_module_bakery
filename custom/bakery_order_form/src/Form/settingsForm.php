<?php 

namespace Drupal\bakery_order_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\BaseFormIdInterface;
use Drupal\Core\Form\FormStateInterface;

class SettingsForm extends FormBase{

    public function getFormId()
    {
        return 'bakery_order_form_settings';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['type_order'] = [
            '#type' => 'select',
            '#title' => $this->t('Wat wil je bestellen?'),
            '#options' => array(
                "select" => $this->t('select'),
               "brood" => $this->t('Brood'),
               "koffiekoeken" => $this->t('Koffiekoeken'),

             ),
            '#default_value' => NULL,
        ];
            
        $form['soort_brood'] = [
            '#type' => 'select',
            '#title' => $this->t('Kies type brood'),
            '#options' => array(
                0 => 'Wit',
               1 => 'Bruin',
               2 => 'Volkoren',
               3 => 'Boerenbrood',
             ),
            '#states' => array(
                // Only show this field when the 'toggle_me' checkbox is enabled.
                'visible' => array(
                  ':input[name="type_order"]' => array(
                    'value' => 'brood'),
                ),
            ),
        ];

        $form['kind_of_cake'] = [
            '#type' => 'select',
            '#title' => $this->t('Kies type koffiekoek'),
            '#options' => array(
                0 => 'selecteer',
               'chocoladebroodje' => 'chocoladebroodje',
               'carree_confituur' => 'Carree confituur',
               'croisant' => 'Croisant',
               'ronde_rozijnenkoek' => 'Ronde Rozijnenkoek',
             ),
            '#states' => array(
                // Only show this field when the 'toggle_me' checkbox is enabled.
                'visible' => array(
                  ':input[name="type_order"]' => array(
                    'value' => 'koffiekoeken'),
                ),
            ),
        ];

        $form['amount_of_chocoladebroodje'] =[
            '#type' => 'select',
            '#title' => $this->t('Aantal'),
            '#options' => array(
                '1' => '1',
               '2' => '2',
               '3' => '3',
               '4' => '4',
               '5' => '5',
             ),
            '#states' => array(
                // Only show this field when the 'toggle_me' checkbox is enabled.
                'visible' => array(
                  ':input[name="kind_of_cake"]' => array(
                    'value' => 'chocoladebroodje'),
                ),
            ),
        ];

        $form['amount_of_carree_confituur'] =[
            '#type' => 'select',
            '#title' => $this->t('Aantal'),
            '#options' => array(
                '1' => '1',
               '2' => '2',
               '3' => '3',
               '4' => '4',
               '5' => '5',
             ),
            '#states' => array(
                // Only show this field when the 'toggle_me' checkbox is enabled.
                'visible' => array(
                  ':input[name="kind_of_cake"]' => array(
                    'value' => 'carree_confituur'),
                ),
            ),
        ];

        $form['amount_of_croisant'] =[
            '#type' => 'select',
            '#title' => $this->t('Aantal'),
            '#options' => array(
                '1' => '1',
               '2' => '2',
               '3' => '3',
               '4' => '4',
               '5' => '5',
             ),
            '#states' => array(
                // Only show this field when the 'toggle_me' checkbox is enabled.
                'visible' => array(
                  ':input[name="kind_of_cake"]' => array(
                    'value' => 'croisant'),
                ),
            ),
        ];

        $form['amount_of_ronde_rozijnenkoek'] =[
            '#type' => 'select',
            '#title' => $this->t('Aantal'),
            '#options' => array(
                '1' => '1',
               '2' => '2',
               '3' => '3',
               '4' => '4',
               '5' => '5',
             ),
            '#states' => array(
                // Only show this field when the 'toggle_me' checkbox is enabled.
                'visible' => array(
                  ':input[name="kind_of_cake"]' => array(
                    'value' => 'ronde_rozijnenkoek'),
                ),
            ),
        ];

        $form['cutomer_first_name'] =[
            '#type' => 'textfield',
            '#title' => $this->t('Voornaam'),
        ];

        $form['cutomer_last_name'] =[
            '#type' => 'textfield',
            '#title' => $this->t('Achternaam'),
        ];

        $form['cutomer_number'] =[
            '#type' => 'textfield',
            '#title' => $this->t('Telefoon nummer'),
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $typeOrder = $form_state->getValue(['type_order']);
        $kindOfCake = $form_state->getValue(['kind_of_cake']);
        $amountOfRondeRozijnenkoek = $form_state->getValue(['amount_of_ronde_rozijnenkoek']);
        $amountOfCroisant = $form_state->getValue(['amount_of_croisant']);
        $amountOfChocoladebroodje = $form_state->getValue(['amount_of_chocoladebroodje']);
        $amountOfCarreeConfituur = $form_state->getValue(['amount_of_carree_confituur']);

        $tomorrow =  date("m-d-Y", strtotime("+1 day"));

        $this->messenger()->addStatus(
            $this->t('Your order number is @number. 
                You can get your order on @time', 
                ['@number' => $form_state->getValue('type_order'), '@time' => $tomorrow],
            )
        );
        \Drupal::state()->set('type_order', $typeOrder);
        \Drupal::state()->set('kind_of_cake', $kindOfCake);
        \Drupal::state()->set('amount_of_ronde_rozijnenkoek', $amountOfRondeRozijnenkoek);
        \Drupal::state()->set('amount_of_croisant', $amountOfCroisant);
        \Drupal::state()->set('amount_of_chocoladebroodje', $amountOfChocoladebroodje);
        \Drupal::state()->set('amount_of_carree_confituur', $amountOfCarreeConfituur);
    }
}