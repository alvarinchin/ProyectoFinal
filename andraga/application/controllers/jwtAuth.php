<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Firebase\JWT\JWT;

class jwtAuth{
	private $key;
	
	// HACER UN SINGLETON
	public function __construct() {
		$this->key = "elpaladinviril";
	}
	public function codificarToken($usuario) {
		$key = $this->key;
		$tok = [ 
				"iat" => time (),
				"data" => [ 
						"login" => $usuario->login,
						"password" => $usuario->password,
						"rol" => $usuario->rol 
				] 
		];
		
		$jwt = JWT::encode ( $tok, $key );
		
		return $res;
	}
	public function decodificarToken($jwt) {
		$key = $this->key;
		return JWT::decode ( $jwt, $key, array (
				'HS256' 
		) );
	}
	
	public function comprobarToken($jwt, $usuario, $vista) {
		
		$zona = "";		
		
		if ($usuario->login == $jwt->data->login && password_verify ( $usuario->password, $jwt->data->password )) {
			
			if ($jwt->data->rol == 2) {
				$zona = "juez";
			} else if ($jwt->data->rol == 3) {
				$zona = "administracion";
			}
			
			$this->template->cargarVista ( $vista."/". $zona, $datos, $rol );
		}
		else {			
			$datos ['mensaje'] = 'Login y Contraseña deben ser rellenados. Redirigiendo a página principal.';
			$datos ['destino'] = 'Pantalla de login';
			$this->template->cargarVista ( 'errors/errorLogin', $datos );
		}
	}
}