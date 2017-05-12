<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Deportista extends CI_Controller {
	public function index() {
		$this->template->cargarVista ( 'deportista/crear' );
	}
	public function crear() {
		session_start ();
		// $datos = '';
		$this->load->model ( 'deportista_model' );
		
		$datos ['body'] ['deportistas'] = $this->deportista_model->getTodos ();
		
		$this->template->cargarVista ( 'deportista/crear' );
	}
	public function crearPost() {
		$nombre = isset ( $_POST ['nombre'] ) ? $_POST ['nombre'] : '';
		$ape1 = isset ( $_POST ['ape1'] ) ? $_POST ['ape1'] : '';
		$ape2 = isset ( $_POST ['ape2'] ) ? $_POST ['ape2'] : '';
		$fecha = isset ( $_POST ['fecha'] ) ? $_POST ['fecha'] : '';
		$this->load->model ( 'deportista_model' );
		$status = $this->deportista_model->crear ( $nombre, $ape1, $ape2, $fecha );
		
		if ($status >= 0) {
			//$this->template->cargarVista ( 'deportista/crear' );
			header ( 'Location:' . base_url () . 'deportista/crear' );
		} else {
			//$this->template->cargarVista ( 'deportista/crear' );
			header ( 'Location:' . base_url () . 'deportista/crear' );
		}
	}
	public function crearOK() {
		$this->template->cargarVista ( 'deportista/crearOK' );
	}
	public function crearERROR() {
		$this->template->cargarVista ( 'deportista/crearERROR' );
	}
}
