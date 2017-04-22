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
        //hayar el role con el token generado
       //$token=$_REQUEST["token"];
        //$token=$_POST["token"];
        $token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE0OTI4NjQ1OTksImRhdGEiOnsiaWQiOjEsIm5vbWJyZSI6IlBlcGUiLCJyb2wiOjN9fQ.gFIxtbU4XkJuN4UwgCMMksX5O7OQDOb-G-mYJupusMo";
        
        
        $zona="";
        $datos="";
        $obj= $this->jwtauth->descodificar($token);
        $rol= $obj->data->rol;
        
        
        if ($rol==2){
            $zona="juez";
            
            
            
        }else if ( $rol==3){
             $zona="administracion";
             
             //cargamos todos los modelos que tenemos 
            
            
        }
        
        $this->template->cargarVista("administracion/".$zona,$datos,$rol); 
    }
    
}

