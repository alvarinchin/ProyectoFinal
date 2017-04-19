<?php

class Login extends CI_Controller{
	
	private function comprobarUsuario(){
		$nombre = (!empty($_POST['nombre'])?$_POST['nombre']:null);
		$password = (!empty($_POST['password'])?$_POST['password']:null);
		$enlace = $_POST['enlace'];
		$check = false;
		$nombreF = "Pepe";
		$passF = "Perico";
		
		$this->load->model ('login_model');
		$usuario = $this->login_model->getUsuariosPorNombre($nombre);
		
		if ($nombreF == $nombre && $password == $passF){
				//$usuario->nombre == $nombre && 
				//$usuario->password == $password){
			$check = true;
		}
		
		if ($check == true){
			echo ("He entrado ".$enlace);
			//CREAR EL TOKEN
			//REDIRIGIR AL ADMINISTRADOR O ENLACE
		}
		else {
			echo ("No he entrado ".$enlace);
			//REDIRIGIR A HOME O ERROR.
		}
		
	}
}



?>