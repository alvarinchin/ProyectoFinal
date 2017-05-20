<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Competicion extends CI_Controller {
	public function index() {
		$this->template->cargarVista ( 'competicion/crear' );
	}
	public function crear() {
		session_start ();
		// $datos = '';
		$this->template->cargarVista ( 'competicion/crear' );
	}
	public function crearPost() {
		$this->load->model ( 'competicion_model' );
		$nombre = isset ( $_POST ['nombre'] ) ? $_POST ['nombre'] : '';
		$fecha = isset ( $_POST ['fecha'] ) ? $_POST ['fecha'] : '';
		$this->load->model ( 'competicion_model' );
		$status = $this->competicion_model->crear ( $nombre, $fecha );
		
		if ($status >= 0) {
			// $this->template->cargarVista ( 'competicion/crearOK' );
			header ( 'Location:' . base_url () . 'deportista/crear' );
		} else {
			$this->crearERROR ();
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
