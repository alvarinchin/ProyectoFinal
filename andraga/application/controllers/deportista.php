<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Deportista extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
	}
	public function index() {
		$this->template->cargarVista ( 'deportista/crear' );
	}
	public function crear() {
		session_start ();
		// $datos = '';
		$this->load->model ( 'deportista_model' );
		
		$datos ['body'] ['deportistas'] = $this->deportista_model->getTodos ();
		
		$this->template->cargarVista ( 'deportista/crear', $datos );
	}
	public function insertar() {
		if (isset ( $_REQUEST ["nombre"] )) {
			if (! empty ( $_REQUEST ["nombre"] ) && ! empty ( $_REQUEST ["ape1"] ) && ! empty ( $_REQUEST ["ape2"] ) && ! empty ( $_REQUEST ["fecha"] ) && ! empty ( $_REQUEST ["numerofederacion"] )) {
				$campos = [ ];
				$campos ["nombre"] = $this->utilphp->sanear ( $_REQUEST ["nombre"] );
				$campos ["ape1"] = $this->utilphp->sanear ( $_REQUEST ["ape1"] );
				$campos ["ape2"] = $this->utilphp->sanear ( $_REQUEST ["ape2"] );
				$campos ["fecha"] = $this->utilphp->sanear ( $_REQUEST ["fecha"] );
				$campos ["numerofederacion"] = $this->utilphp->sanear ( $_REQUEST ["numerofederacion"] );
				
				$status = $this->adaptador_model->insert ( "deportista", $campos, Array (
						"numerofederacion" 
				) );
				if ($status) {
					echo json_encode ( array (
							"status" => "ok",
							"data" => $_REQUEST,
							"msg" => "Inserción correcta" 
					) );
				} else {
					echo json_encode ( array (
							"status" => "error",
							"msg" => "Error al insertar deportista nuevo, número de federación repetido" 
					) );
				}
			} else {
				echo json_encode ( array (
						"status" => "error",
						"msg" => "Debes rellenar todos los campos" 
				) );
			}
		}
	}
	public function crearOK() {
		$this->template->cargarVista ( 'deportista/crearOK' );
	}
	public function crearERROR() {
		$this->template->cargarVista ( 'deportista/crearERROR' );
	}
	public function modificar() {
		if (isset ( $_REQUEST ["nombre"] )) {
			if (! empty ( $_REQUEST ["nombre"] ) && ! empty ( $_REQUEST ["ape1"] ) && ! empty ( $_REQUEST ["ape2"] ) && ! empty ( $_REQUEST ["fecha"] ) && ! empty ( $_REQUEST ["numerofederacion"] ) && ! empty ( $_REQUEST ["id"] )) {
				$campos = [ ];
				$campos ["nombre"] = $this->utilphp->sanear ( $_REQUEST ["nombre"] );
				$campos ["ape1"] = $this->utilphp->sanear ( $_REQUEST ["ape1"] );
				$campos ["ape2"] = $this->utilphp->sanear ( $_REQUEST ["ape2"] );
				$campos ["fecha"] = $this->utilphp->sanear ( $_REQUEST ["fecha"] );
				$campos ["numerofederacion"] = $this->utilphp->sanear ( $_REQUEST ["numerofederacion"] );
				$id = $this->utilphp->sanear ( $_REQUEST ["id"] );
				
				$status = $this->adaptador_model->update ( "deportista", $id, $campos, "id" );
				if ($status) {
					echo json_encode ( array (
							"status" => "ok",
							"msg" => "Modificación correcta" 
					) );
				} else {
					echo json_encode ( array (
							"status" => "error",
							"msg" => "Error al modificar deportista nuevo, número de federación repetido" 
					) );
				}
			}
		} else {
			echo json_encode ( array (
					"status" => "error",
					"msg" => "Error no han llegado los datos" 
			) );
		}
	}
	public function listar() {
		
		// $datos ['body'] ['deportistas'] = $this->deportista_model->getTodos ();
		// $this->template->cargarVista ( 'deportista/listarDeportista', $datos );
		$beans = $this->adaptador_model->getAll ( "deportista" );
		if ($beans != null) {
			// deben devolverse en un echo porque son cadenas de texto
			echo json_encode ( array (
					"status" => "ok",
					"data" => $beans,
					"msg" => "Datos cargados" 
			) );
		} else {
			echo json_encode ( array (
					"status" => "error",
					"msg" => "error en BD" 
			) );
		}
	}
	public function borrar() {
		if (isset ( $_REQUEST ["id"] )) {
			if (! empty ( $_REQUEST ["id"] )) {
				
				$status = $this->adaptador_model->delete ( "deportista", $_REQUEST ["id"] );
				
				if ($status) {
					echo json_encode ( array (
							"status" => "ok",
							"msg" => "datos eliminados" 
					) );
				} else {
					echo json_encode ( array (
							"status" => "error",
							"msg" => "Error al borrar un deportista " 
					) );
				}
			} else {
				echo json_encode ( array (
						"status" => "error",
						"msg" => "Error algún dato está vacío" 
				) );
			}
		} else {
			echo json_encode ( array (
					"status" => "error",
					"msg" => "Error no han llegado los datos" 
			) );
		}
	}
}
