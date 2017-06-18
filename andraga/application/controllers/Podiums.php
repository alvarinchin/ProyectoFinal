<?php
require_once 'vendor/autoload.php';
require_once 'JwtController.php';

class Podiums extends JwtController {
	public function index() {
		/*
		 * roles:
		 * 1 -> enlace
		 * 2 -> juez
		 * 3 -> administrador
		 */
		//añadido
		
		$this->redirigeTrasCheck('','podium','welcome','welcome');
		
		
	}
	
	
}

