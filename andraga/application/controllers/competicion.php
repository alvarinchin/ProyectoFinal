<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Competicion extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
	}
	public function index() {
		$this->template->cargarVista ( 'competicion/crear' );
	}
	public function crear() {
		session_start ();
		// $datos = '';
		$this->template->cargarVista ( 'competicion/crear' );
	}
	public function crearPost() {
		$nombre = isset ( $_REQUEST ['nombre'] ) ? $_REQUEST ['nombre'] : '';
		$fecha = isset ( $_REQUEST ['fecha'] ) ? $_REQUEST ['fecha'] : '';
		$datos = [ 
				"nombre" => $nombre,
				"fecha" => $fecha 
		];
		
		$status = $this->adaptador_model->insert ( "competicion", $datos, Array (
				"nombre" 
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
					
					"msg" => "Error al insertar competicion nueva, nombre repetido" 
			) );
		}
	}
	/*
	 * public function crearOK() {
	 * $this->template->cargarVista ( 'competicion/crearOK' );
	 * //header ( 'Location:' . base_url () . 'deportista/crear' );
	 * }
	 */
	public function crearERROR() {
		$this->template->cargarVista ( 'competicion/crearERROR' );
	}
	public function listar() {
		
		// $datos ['body'] ['deportistas'] = $this->deportista_model->getTodos ();
		// $this->template->cargarVista ( 'deportista/listarDeportista', $datos );
		$beans = $this->adaptador_model->getAll ( "competicion" );
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
				
				$status = $this->adaptador_model->delete ( "competicion", $_REQUEST ["id"] );
				
				if ($status) {
					echo json_encode ( array (
							"status" => "ok",
							"msg" => "datos eliminados" 
					) );
				} else {
					echo json_encode ( array (
							"status" => "error",
							"msg" => "Error al borrar un competición " 
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
