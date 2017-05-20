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
	public function crearPost() {
		$nombre = isset ( $_REQUEST ['nombre'] ) ? $_REQUEST ['nombre'] : '';
		$ape1 = isset ( $_REQUEST ['ape1'] ) ? $_REQUEST ['ape1'] : '';
		$ape2 = isset ( $_REQUEST ['ape2'] ) ? $_REQUEST ['ape2'] : '';
		$fecha = isset ( $_REQUEST ['fecha'] ) ? $_REQUEST ['fecha'] : '';
		$numerofederacion = isset ( $_REQUEST ['numerofederacion'] ) ? $_REQUEST ['numerofederacion'] : '';
		$datos = [ 
				"nombre" => $nombre,
				"ape1" => $ape1,
				"ape2" => $ape2,
				"numerofederacion" => $numerofederacion,
				"fecha" => $fecha 
		];
		
		$status = $this->adaptador_model->insert ( "deportista", $datos, Array("numerofederacion"));
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
	}
	public function crearOK() {
		$this->template->cargarVista ( 'deportista/crearOK' );
	}
	public function crearERROR() {
		$this->template->cargarVista ( 'deportista/crearERROR' );
	}
	public function modificarPost() {
		echo json_encode ( array (
				"status" => "ok",
				
				"msg" => "Modificación correcta"
		) );
		$nombre = isset ( $_REQUEST ['nombre'] ) ? $_REQUEST ['nombre'] : '';
		$ape1 = isset ( $_REQUEST ['ape1'] ) ? $_REQUEST ['ape1'] : '';
		$ape2 = isset ( $_REQUEST ['ape2'] ) ? $_REQUEST ['ape2'] : '';
		$fecha = isset ( $_REQUEST ['fecha'] ) ? $_REQUEST ['fecha'] : '';
		$id = isset ( $_REQUEST ['id'] ) ? $_REQUEST ['id'] : '';
		$numerofederacion = isset ( $_REQUEST ['numerofederacion'] ) ? $_REQUEST ['numerofederacion'] : '';
		$datos = [ 
				"nombre" => $nombre,
				"ape1" => $ape1,
				"ape2" => $ape2,
				"numerofederacion" => $numerofederacion,
				"fecha" => $fecha,
				"id" => $id
		];
		
		$status = $this->adaptador_model->update ( "deportista", $id, $datos, "id" );
		if ($status) {
			echo json_encode ( array (
					"status" => "ok",
					"data" => $_REQUEST,
					"msg" => "Modificación correcta" 
			) );
		} else {
			echo json_encode ( array (
					"status" => "error",
					"msg" => "Error al modificar deportista nuevo, nombre repetido" 
			) );
		}
		echo json_encode ( array (
					"status" => "mal",
					"msg" => "Modificación correcta" 
			) ); 
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
