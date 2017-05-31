<?php

require_once 'vendor/autoload.php';

class Jwt_Model extends CI_Model{
	
	public function comprobarCookie($cookie){
	
		if (isset($cookie)){
						
			$obj = $this->jwtauth->decodificarToken ( $cookie );
			$login = $obj->data->login;
			$password = password_hash ( $obj->data->password, PASSWORD_BCRYPT );
			$rol = $obj->data->rol;
	
			$this->load->model ( 'login_model' );
			$usuario = $this->login_model->getUsuarioPorLogin ( $login );
		}
	
		if (! empty ( $usuario ) && $usuario->login == $login && password_verify ( $usuario->password, $password )) {
	
			return $rol;
	
		} else {
	
			return -1;
		}
	
	}
	
}