<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of administrador
 *
 * @author alvaro
 */
require_once 'JwtController.php';

class administrador extends JwtController{
    public function index(){
       

    	$this->redirigeTrasCheck('','gestor','administracion');
	}

  
}
    //put your code here

