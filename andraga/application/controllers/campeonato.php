<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campeonato extends CI_Controller{
	
	
	public function index(){
		 $this->template->cargarVista('deportistas/prueba');
	}
	
	
}

