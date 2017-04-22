<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;

class Login extends CI_Controller{
	
	public function comprobarUsuario(){
		$nombre = $_POST['nombre'];
		$password = $_POST['password'];
		//$enlace = $_POST['enlace'];
		
		$nombreF = "Pepe";
		$passF = "Perico";
		
		//$this->load->model ('login_model');
		//$usuario = $this->login_model->getUsuariosPorNombre($nombre);
		
                //externalizado a una libreria
                
		/*if ($nombreF == $nombre && $password == $passF){
				//$usuario->nombre == $nombre && 
				//$usuario->password == $password){			
			echo ("He entrado ");
			//CREAR EL TOKEN
			$tok = [				
				"iat"=>time(),
				"data" => ["id"=>1, "nombre"=>$nombre]
			];
			$clave_secreta = "pupu";
			$jwt = JWT::encode($tok,$clave_secreta);
			//$data = JWT::decode($jwt, $clave_secreta, array("HS256"));
			var_dump($jwt);
			//REDIRIGIR AL ADMINISTRADOR O ENLACE
			
			
		}
		else {
			echo ("No he entrado ");
			//REDIRIGIR A HOME O ERROR.
		}*/
                
                //con ese metodo que está en libraries se hace lo mismo que arriba
                //y es accesible desde cualquier parte de la aplicacion
             var_dump($this->jwtauth->login($nombre,$password));
		
	}
}



?>