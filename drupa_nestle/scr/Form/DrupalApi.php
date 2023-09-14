<?php

namespace Drupal\drupal_nestle\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DrupalApi extends FormBase{

    const DOPPLER_API_CONFIG_PAGE = 'doppler_api_config:values';

    public function getFormId(){
        return 'drupal_api_config_page';
    }

    public function buildForm(array $form, FormStateInterface $form_state){
        $form = [];
        $values = \Drupal::state()->get(key:self::DOPPLER_API_CONFIG_PAGE);


        $form['title'] = [
                '#type' => 'textfield',
                '#title' => this->t(string: 'title'),
                '#description' => this->t(string: 'This is the title'),
                '#required' => TRUE,
                '#default_value' => $values['title'],
            ];

        $form['description'] = [
            '#type' => 'long',
            '#title' => this->t(string: 'title'),
            '#description' => this->t(string: 'This is the description'),
            '#required' => TRUE,
            '#default_value' => $values['description'],
        ];

        $form['action']['#type'] = 'actions';
        $form['action']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t(string:'Save'),
            '#button_type' => 'primary'
        ];

        return $form;   
    }

    public function submitFomr(array $form, FormStateInterface $form_state) {
        $submitted_values = $form_state->cleanValues()->getValues();
        
        \Drupal::state()->set(self::DOPPLER_API_CONFIG_PAGE, $submitted_values);
    
        $messanger = \Drupal::service(id:'messenger');

        $messanger->addMessage($this->t(string:'Your content has been save'));

    }
}
