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

	public function redirigeTrasCheck($datos = '', $rutaJuez, $rutaAdmin,$rutaEnlace){

		//echo ($this->rol);
		$this->zona= '';
	
		if ($this->rol==-1){
			$this->datos = [];
			$this->datos ['mensaje'] = 'Login y contraseña necesarios. Redirigiendo';
			$this->datos ['destino'] = 'Pantalla de Login';
			$this->template->cargarVista ( 'errors/errorLogin', $datos );
		}
		else if ($this->rol ==1){
			$this->zona = "enlace/".$rutaEnlace; //HAY QUE CAMBIARLO POR EL ENLACE.
		}
		else if ($this->rol == 2) {
			$this->zona = "juez/".$rutaJuez;	
		}
		else if ($this->rol == 3) {
			$this->zona = "administracion/".$rutaAdmin;	
		}
               
		$this->template->cargarVista ( $this->zona, $this->datos, $this->rol );		
	}	
	
}