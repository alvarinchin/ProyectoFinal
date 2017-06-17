<?php

class JwtController extends CI_Controller{
	
	private $cookie;
	private $datos;
	private $rol;
	private $zona;
	private $raiz;
	private $granted;
	
	public function __construct(){	
		parent::__construct ();		
		$this->cookie = isset($_COOKIE['tkn'])?$_COOKIE['tkn']:null;
		$this->datos = '';		
		$this->ruta = '';
		$this->raiz = '';		
		$this->rol = $this->comprobarCookie($this->cookie);
		if (isset($this->cookie)){
			$this->granted = true;
		}
		else {
			$this->granted = false;
		}
	}

	public function redirigeTrasCheck($datos = '', $rutaJuez, $rutaAdmin, $rutaEnlace){

		//echo ($this->rol);
		$this->zona= '';
		echo ($this->rol);
		if ($this->rol==-1){
			$this->datos = [];
			$this->datos ['mensaje'] = 'Login y contraseña necesarios. Redirigiendo';
			$this->datos ['destino'] = 'Pantalla de Login';
			$this->zona = 'errors/errorLogin';
			$this->rol='';
		}
		else if ($this->rol ==1){
			$this->zona = "enlace/".$rutaEnlace;
		}
		else if ($this->rol == 2) {
			$this->zona = "juez/".$rutaJuez;	
		}
		else if ($this->rol == 3) {
			$this->zona = "administracion/".$rutaAdmin;	
		}
               
		$this->template->cargarVista ( $this->zona, $this->datos, $this->rol );		
	}
	
	public function consultarPermisosJuez (){
		
		if ($this->granted && $this->rol==2){
			return true;
		}
		else if ($this->granted && ($this->rol==1 || $this->rol==3)){
			$zona = 'errors/errorPermiso';
			$datos['mensaje'] = 'Permisos incorrectos. Redirigiendo';
			$datos['destino'] = 'Inicio';
			$this->template->cargarVista ($zona, $datos, $this->rol);
		}
		else {
			$datos ['mensaje'] = 'Login y Contraseña necesarios. Redirigiendo';
			$datos ['destino'] = '';
			$zona = 'errors/errorLogin';
			$this->template->cargarVista ($zona, $datos);
		}
	}
	
	public function consultarListar (){
		
		if ($this->granted && ($this->rol==2 || $this->rol==3)){
			return true;
		}		
		else if ($this->rol ==1 ){
			$zona = 'errors/errorPermiso';
			$datos['mensaje'] = 'Permisos insuficientes. Redirigiendo';
			$datos['destino'] = 'Inicio';
			$this->template->cargarVista ($zona, $datos, $this->rol);
		}
		else {
			$datos ['mensaje'] = 'Login y Contraseña necesarios. Redirigiendo';
			$datos ['destino'] = '';
			$zona = 'errors/errorLogin';
			$this->template->cargarVista ($zona, $datos);
		}
	}
	
	public function consultarPermisosAdmin (){		
		if ($this->granted && $this->rol==3){
			return true;
		}
		else if ($this->granted && ($this->rol==1 || $this->rol==2)){
			$zona = 'errors/errorPermiso';
			$datos['mensaje'] = 'Permisos incorrectos. Redirigiendo';
			$datos['destino'] = 'Inicio';
			$this->template->cargarVista ($zona, $datos, $this->rol);
		}
		else {
			$datos ['mensaje'] = 'Necesario usuario y contraseña. Redirigiendo';
			$datos ['destino'] = 'Pantalla de Login';
			$zona = 'errors/errorLogin';
			$this->template->cargarVista ($zona, $datos);
		}
	}
	
	public function comprobarCookie($cookie){
		
		if (isset($cookie)){
			
			$obj = $this->jwtauth->decodificarToken ( $cookie );
			$login = $obj->data->login;
			$password = password_hash ( $obj->data->password, PASSWORD_BCRYPT );
			$rol = $obj->data->rol;
			
			$this->load->model ( 'login_model' );
			$usuario = $this->login_model->getUsuarioPorLogin ( $login );
		}
		
		if (! empty ( $usuario ) && password_verify ( $usuario->password, $password )) {
			
			return $rol;
			
		} else {
			
			return -1;
		}
		
	}
	
}