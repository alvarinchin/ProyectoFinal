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
			//$this->template->cargarVista ( 'competicion/crearOK' );
			header ( 'Location:' . base_url () . 'deportista/crear' );
		} else {
			$this->crearERROR();
		}
	}
	/*public function crearOK() {
		$this->template->cargarVista ( 'competicion/crearOK' );
		//header ( 'Location:' . base_url () . 'deportista/crear' );
	}*/
	public function crearERROR() {
		$this->template->cargarVista ( 'competicion/crearERROR' );
	}
}
