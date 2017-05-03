<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Competicion extends CI_Controller{
	
	
	public function index(){
		 $this->template->cargarVista('competicion/crear');
	}
	
	public function crear() {
		session_start();
		//$datos = '';
		$this->template->cargarVista('competicion/crear');
		
	}
	
	public function crearPost() {
		$this->load->model ( 'competicion_model' );
		$nombre = isset ( $_POST ['nombre'] ) ? $_POST ['nombre'] : '';
		$fecha = isset ( $_POST ['fecha'] ) ? $_POST ['fecha'] : '';
		$this->load->model ( 'competicion_model' );
		$status = $this->competicion_model->crear ( $nombre, $fecha );
	
		if ($status >= 0) {
			$this->template->cargarVista( 'competicion/crearOK' );
		} else {
			$this->template->cargarVista( 'competicion/crearERROR' );
		}
	

	}
	public function crearOK() {
		enmarcar ( $this, 'competicion/crearOK' );
	}
	public function crearERROR() {
		enmarcar ( $this, 'competicion/crearERROR' );
	}
	
	
}
