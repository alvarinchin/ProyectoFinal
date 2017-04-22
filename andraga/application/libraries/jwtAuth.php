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
	
	// HACER UN SINGLETON
	public function __construct() {
		$this->key = "elpaladinviril";
	}
	
	//TODO par�metros del token
	public function codificarToken($usuario) {
		
		$key = $this->key;		
		$tok = [ 
				"iat" => time (),
				//"exp" => $permanencia,
				// TODO TEMA DEL ROL
				"data" => [ 
						"login" => $usuario->login,
						"enlace" => true
				] 
		];		
		$jwt = JWT::encode ( $tok, $key	);
		echo ($jwt);
		return $jwt;
	}
    
     public function decodificarToken($jwt){     
         $key= $this->key;
         return JWT::decode($jwt, $key, array('HS256'));
     }
    
    
    
}
