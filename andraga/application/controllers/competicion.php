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
	
	
}
