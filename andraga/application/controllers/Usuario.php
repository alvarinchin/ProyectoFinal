<?php

require_once 'vendor/autoload.php';
require_once 'JwtController.php';

class Usuario extends JwtController{
	
	public function __construct() {
		parent::__construct();
		$this->load->model("adaptador_model");
	}
	
	public function index(){		
			/*
			 * roles:
			 * 1 -> enlace
			 * 2 -> juez
			 * 3 -> administrador
			 */
		
		$this->redirigeTrasCheck('','gestor','usuario', 'welcome');
					
			/*session_start ();
			
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
				$zona = "usuario";							
				$this->template->cargarVista ( "usuario/" . $zona, $datos, $rol );
			} else {
				$datos = null;
				$datos ['mensaje'] = 'Login y Contraseña deben ser rellenados. Redirigiendo a página principal.';
				$datos ['destino'] = 'Pantalla de login';
				$this->template->cargarVista ( 'errors/errorLogin', $datos );
			}*/
		}
		
	
	public function crearPost(){
		if ($this->consultarPermisosAdmin()){				
		if (isset ($_REQUEST['login']) && isset($_REQUEST['password']) && isset ($_REQUEST['rol'])){
			
			$login = $_REQUEST['login'];
			$password = $_REQUEST['password'];
			$rol = $_REQUEST['rol'];
			
			if (!empty($login) && !empty($password) && !empty($rol)){
				
				$campos=[];
				$campos["login"]=$this->utilphp->sanear($login);
				$campos["password"]= $this->utilphp->sanear($password);
				$campos["rol"]= $this->utilphp->sanear($rol);
				
				$status = $this->adaptador_model->insert('usuario', $campos, "login"); 				
				
				//echo $status;
				
				if ($status){
					echo json_encode(array("status"=>"ok","data"=>$_REQUEST,"msg"=>"Inserción correcta"));
				}else{
					echo json_encode(array("status"=>"error","msg"=>"Error al insertar usuario nuevo, login repetido"));
				}
			}
			else {
				echo json_encode(array("status"=>"error","msg"=>"Debes rellenar todos los campos"));
			}			
		}
		else {
			echo json_encode(array("status"=>"error","msg"=>"Debes rellenar los campos"));
		}		
	}
	}
	public function listar(){
		if ($this->consultarPermisosAdmin()){
		$usuarios=$this->adaptador_model->getAll("usuario");
		if($usuarios!=null){			
			echo json_encode(array("status"=>"ok","data"=>$usuarios,"msg"=>"Datos cargados"));
		}else{
			echo json_encode(array("status"=>"error","msg"=>"error al listar"));
		}
		}
	}
	
	
	public function borrarPost (){
		if ($this->consultarPermisosAdmin()){
		if ( isset($_REQUEST["id"])){
			if ( !empty($_REQUEST["id"])){
				
				$status=$this->adaptador_model->delete("usuario",$_REQUEST["id"]);
				
				if($status){
					echo json_encode(array("status"=>"ok","msg"=>"Usuario eliminado"));
				}else{
					echo json_encode(array("status"=>"error","msg"=>"Error al borrar el usuario  "));
				}
			} else {
				echo json_encode(array("status"=>"error","msg"=>"Error algún dato está vacío"));
			}
		}else{
			echo json_encode(array("status"=>"error","msg"=>"Error no han llegado los datos"));
		}
	}
	}
	
	public function modificarGet(){
		$this->template->cargarVista("usuario/modificarGet");
	}
	
	public function modificarPost(){
		if ($this->consultarPermisosAdmin()){
		if ( isset ($_REQUEST['login']) && isset($_REQUEST['password']) && isset ($_REQUEST['rol']) && isset ($_REQUEST['id'])){
			
			$login = ($_REQUEST['login']);
			$password = ($_REQUEST['password']);
			$rol = ($_REQUEST['rol']);
			$id = ($_REQUEST['id']);
			
			if ( !empty($_REQUEST['login']) && !empty($_REQUEST['password']) && !empty ($_REQUEST['rol']) && !empty ($_REQUEST['id'])){
				
				$campos=[];
				$campos["login"]=$this->utilphp->sanear($login);
				$campos["password"]= $this->utilphp->sanear($password);
				$campos["rol"]= $this->utilphp->sanear($rol);
				$idF= $this->utilphp->sanear($id);
				
				$status=$this->adaptador_model->update("usuario",$idF,$campos,"login");
				
				if($status){
					echo json_encode(array("status"=>"ok","msg"=>"Entrada actualizada"));
				}else{
					echo json_encode(array("status"=>"error","msg"=>"Error al modificar un usuario, nombre repetido "));
				}
			} else {
				echo json_encode(array("status"=>"error","msg"=>"Error algún dato está vacío"));
			}
		}else{
			echo json_encode(array("status"=>"error","msg"=>"Error no han llegado los datos"));
		}
	}
	}
}

?>