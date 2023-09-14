<?php

class DrupalAPIConnector{
    
    private $cliente;

    private $query;

    public function __construct(\Drupa\Core\Http\ClientFactory $client){
        $drupal_api_config = \Drupal::state()->get(\Drupal\drupal_nestle\Form\DrupalApi::DOPPLER_API_CONFIG_PAGE);

        $title = ($drupal_api_config['title']) ?: '';

        $description = ($drupal_api_config['description']) ?: '';


    }
}
