<?php

namespace Drupal\drupal_nestle\Controller;

use Drupal\Core\Controller\ControllerBase;

class DrupalNestle extends ControllerBase{
    public function view(){

        return [
            '#theme' => 'glossary',
            '#content' => '',      
        ];
    }
}


