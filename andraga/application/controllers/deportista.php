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
		
		$this->template->cargarVista ( 'deportista/crear', $datos );
	}
	public function crearPost() {
		$nombre = isset ( $_POST ['nombre'] ) ? $_POST ['nombre'] : '';
		$ape1 = isset ( $_POST ['ape1'] ) ? $_POST ['ape1'] : '';
		$ape2 = isset ( $_POST ['ape2'] ) ? $_POST ['ape2'] : '';
		$fecha = isset ( $_POST ['fecha'] ) ? $_POST ['fecha'] : '';
		$this->load->model ( 'deportista_model' );
		$status = $this->deportista_model->crear ( $nombre, $ape1, $ape2, $fecha );
		
		if ($status >= 0) {
			$datos ['body'] ['deportistas'] = $this->deportista_model->getTodos ();
			$this->template->cargarVista ( 'deportista/listarDeportista', $datos );
			// header ( 'Location:' . base_url () . 'deportista/crear' );
		} else {
			// $this->template->cargarVista ( 'deportista/crear' );
			header ( 'Location:' . base_url () . 'deportista/crearERROR' );
		}
	}
	public function crearOK() {
		$this->template->cargarVista ( 'deportista/crearOK' );
	}
	public function crearERROR() {
		$this->template->cargarVista ( 'deportista/crearERROR' );
	}
	public function editar() {
		$this->load->model ( 'deportista_model' );
		$id_ciudad = $_POST ['id_deportista'];
		$id_deportista ['body'] ['deportistas'] = $this->deportista_model->getDeportistaPorId ( $id_deportista );
		$this->template->cargarVista ( 'deportista/crear', $datos );
	}
	public function editarPost() {
		$nombre = isset ( $_POST ['nombre'] ) ? $_POST ['nombre'] : '';
		$ape1 = isset ( $_POST ['ape1'] ) ? $_POST ['ape1'] : '';
		$ape2 = isset ( $_POST ['ape2'] ) ? $_POST ['ape2'] : '';
		$fecha = isset ( $_POST ['fecha'] ) ? $_POST ['fecha'] : '';
		$id_deportista = isset ( $_POST ['id_deportista'] ) ? $_POST ['id_deportista'] : '';
		
		$this->load->model ( 'deportista_model' );
		$this->deportista_model->editar ( $id_deportista, $nombre, $ape1, $ape2, $fecha );
		
		header ( 'Location:' . base_url ( 'deportista/crear' ) );
	}
	public function listarAjaxPost() {
		$this->load->model ( 'deportista_model' );
		$datos ['body'] ['deportistas'] = $this->deportista_model->getTodos ();
		$this->template->cargarVista ( 'deportista/listarDeportista', $datos );
	}
	public function borrarPost() {
		$this->load->model ( 'deportista_model' );
		$id_deportista = $_POST ['id_deportista'];
		$this->deportista_model->borrar ( $id_deportista );
		switch ($_POST ['v']) {
			case 'filtrar' :
				$datos ['body'] ['accion'] = 'borrar';
				$datos ['body'] ['filtro'] = $_POST ['filtro'];
				$datos ['head'] ['onload'] = 'filtrar()';
				$this->filtrar ( $datos );
				break;
			case 'listarTodos' :
				header ( 'Location:' . base_url () . 'deportista/crear' );
				break;
		}
	}
}
