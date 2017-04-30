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
     
     public function comprobarToken(){
     	
     	$check = false;
          
     	if (isset ( $_SESSION ['tkn'] )) {
     		
     		$zona = "";
     		$datos = "";
     		
     		$obj = $this->jwtauth->decodificarToken ( $_SESSION['tkn'] );
     		$login = $obj->data->login;
     		$password = password_hash($obj->data->password, PASSWORD_BCRYPT);
     		$rol = $obj->data->rol;
     		
     	}
     	
     	$this->load->model ( 'login_model' );
     	$usuario = $this->login_model->getUsuarioPorLogin ( $login );
     	
     	if (! empty ( $usuario ) && $usuario->login == $login &&  password_verify ($usuario->password, $password)) {
     		$check = true;
     	}
     	
     	return $check;
     }
    
    
    
}

