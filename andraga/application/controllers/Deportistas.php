<?php


class Deportistas extends CI_Controller{
	
	public function index(){
		//TODO eliminar cuando no sea necesario
		echo "hola";
		//forma de cargar los templates, ruta dentro de view al template 
		//ruta a la vista
		
		$this->template->load("templates/pruebaTemplate","deportistas/prueba");
	}
	
}

