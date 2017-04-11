<?php


class Deportistas extends CI_Controller{
	
	public function index(){
		echo "hola";
		$this->template->load("templates/pruebaTemplate","deportistas/prueba");
	}
	
}

