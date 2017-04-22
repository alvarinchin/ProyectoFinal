<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Firebase\JWT\JWT;
class jwtAuth {
	private $key;
	
	// HACER UN SINGLETON
	public function __construct() {
		$this->key = "elpaladinviril";
	}
	
	public function codificarToken($usuario, $codificado = false) {
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
		
		$jwt = JWT::encode ( $tok, $key, array(
				'HS256' 
		) );
		if ($codificado) {
			$res = $data;
		} else {
			$res = $jwt;
		}
		
		return $res;
	}
    
     public function decodificarToken($jwt){     
         $key= $this->key;
         return JWT::decode($jwt, $key, array('HS256'));
     }
    
    
    
}

