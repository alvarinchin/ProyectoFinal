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
		$this->load->model('jwt_model');
		$this->rol = $this->jwt_model->comprobarCookie($this->cookie);
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
	
	public function consultarPermisos (){
		if ($this->granted){
			return true;
		}
		else {
			$datos ['mensaje'] = 'Login y contraseña necesarios. Redirigiendo';
			$datos ['destino'] = 'Pantalla de Login';
			$zona = 'errors/errorLogin';
			$this->template->cargarVista ($zona, $datos);
		}
	}
	
}