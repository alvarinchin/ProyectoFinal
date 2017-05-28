<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
class Administracion extends CI_Controller {
	public function index() {
		/*
		 * roles:
		 * 1 -> enlace
		 * 2 -> juez
		 * 3 -> administrador
		 */
		session_start ();
		
		if (isset ( $_SESSION ['tkn'] )) {
			
			$zona = "";
			$datos = "";
			
			$obj = $this->jwtauth->decodificarToken ( $_SESSION ['tkn'] );
			$login = $obj->data->login;
			$password = password_hash ( $obj->data->password, PASSWORD_BCRYPT );
			$rol = $obj->data->rol;
			
			$this->load->model ( 'login_model' );
			$usuario = $this->login_model->getUsuarioPorLogin ( $login );
		}
		
		if (! empty ( $usuario ) && $usuario->login == $login && password_verify ( $usuario->password, $password )) {
			
			if ($rol == 2) {
				$zona = "juez/welcome";
			} else if ($rol == 3) {
				$zona = "administracion/welcome";
			}
			
			$this->template->cargarVista ( $zona, $datos, $rol );
		} else {
			$datos = null;
			$datos ['mensaje'] = 'Login y Contraseña deben ser rellenados. Redirigiendo a página principal.';
			$datos ['destino'] = 'Pantalla de login';
			$this->template->cargarVista ( 'errors/errorLogin', $datos );
		}
	}
}

