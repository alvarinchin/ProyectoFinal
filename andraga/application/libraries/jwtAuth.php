<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class jwtAuth {
	private $key;
		
	public function __construct() {
		
		// Deja de cambiar la key que me lias las pruebas
		// La he cambiado a una más molona :D
		$this->key = base64_encode ( "pUpu_VegEtal32" );
	}
	public function codificarToken($usuario) {
		$key = $this->key;
		$tok = [ 
				"iat" => time (),	
				"data" => [ 
						"login" => $usuario->login,
						"password" => $usuario->password,
						"rol" => $usuario->rol,
						"enlace" => true 
				] 
		];
		$jwt = JWT::encode ( $tok, $key);
		//echo $jwt;
		//var_dump (JWT::decode($jwt, $key,array('HS256')));
		return $jwt;
	}
	public function decodificarToken($jwt) {
		$key = $this->key;
		
		if (is_object ( JWT::decode ( $jwt, $key, array('HS256')) )) {
			return JWT::decode ( $jwt, $key, array('HS256'));
		} else {
			return null;
		}
	}
}

