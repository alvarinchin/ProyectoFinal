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

include_once 'Administracion.php';

class administrador extends CI_Controller{
    public function index(){
        /*
		 * roles:
		 * 1 -> enlace
		 * 2 -> juez
		 * 3 -> administrador
		 */
        //new Administracion;
    	
    	//$this->Administracion->redirigeTrasCheck('welcome');
    	
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
                            
                            //en caso de que sea un juez debería dar un error y redirigir al welcome de JUEZ
				$zona = "juez/welcome";
			} else if ($rol == 3) {
				$zona = "administracion/administracion";
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
    //put your code here

