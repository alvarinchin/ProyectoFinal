<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pantalla
 *
 * @author alvaro
 */

require_once 'vendor/autoload.php';
require_once 'JwtController.php';

class Pantalla extends JwtController{
    public function index(){
        $this->redirigeTrasCheck('','welcome','welcome','pantalla');
    }
}
