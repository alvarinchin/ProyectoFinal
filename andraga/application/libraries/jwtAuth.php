<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Firebase\JWT\JWT;

class jwtAuth {
    
    private $key;
    
    
    public function __construct() {
        $this->key= "pupu";
    }
    
    public function login($usuario, $password, $codificado=false) {
        
        $key= $this->key;
                
        // conexión a base para comprobar usuarios.
        //$check= usuariosmodel-> login ( $user, $password);
        $check = true;
             
        if ($check== true){
				//$usuario->nombre == $nombre && 
				//$usuario->password == $password){			
			echo ("He entrado ");
			//CREAR EL TOKEN
			$tok = [				
				"iat"=>time(),
				"data" => ["id"=>1, "nombre"=>$usuario,"rol"=>3]
			];
			
			$jwt = JWT::encode($tok,$key,"HS256");
			$data = JWT::decode($jwt, $key, array("HS256"));
			if( $codificado){
                            $res = $data;
                        }else{
                            $res= $jwt;
                        }
                            
			//REDIRIGIR AL ADMINISTRADOR O ENLACE
			return $res;
			
		}
		else {
			echo ("No he entrado ");
			//REDIRIGIR A HOME O ERROR.
                        return null;
		}
    }
    
     public function descodificar($jwt){     
         $key= $this->key;
         return JWT::decode($jwt, $key, array("HS256"));
     }
    
    
    
}

