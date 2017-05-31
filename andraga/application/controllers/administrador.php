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


class administrador extends JwtController{
    public function index(){
        /*
		 * roles:
		 * 1 -> enlace
		 * 2 -> juez
		 * 3 -> administrador
		 */
        //new Administracion;
        $datos="";
    	$this->template->cargarVista ( "administracion/administracion", $datos, 3 );
    	//$this->Administracion->redirigeTrasCheck('welcome');

    	$this->redirigeTrasCheck('','gestor','administracion');
	}

  
}
    //put your code here

