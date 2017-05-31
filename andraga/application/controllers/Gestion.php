<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gestion
 *
 * @author alvaro
 */

require_once 'vendor/autoload.php';
require_once 'JwtController.php';
class Gestion extends JwtController{
    
    public function index(){
        
       // $datos="";
        //$this->template->cargarVista ( "juez/gestor", $datos, 2 );
        
        
        //BYPASS-----------------------------------------
         /*
		 * roles:
		 * 1 -> enlace
		 * 2 -> juez
		 * 3 -> administrador
		 */
        
    	$this->redirigeTrasCheck('','gestor','welcome');

    }
}
