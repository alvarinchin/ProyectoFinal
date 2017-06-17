<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';
require_once 'JwtController.php';

class Welcome extends JwtController {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		
		$this->load->model ('login_model');
		$adm = $this->login_model->getUsuarioPorLogin ("admin");
		
		if (!isset ($adm)){
			$adm = R::dispense ('usuario');
			$adm->login = "admin";
			$adm->password = "admin";
			$adm->rol = 3;
			R::store($adm);
			//echo ("Se ha creado un usuario administrador. Continúa la carga");
		}
		/*
		else {
			echo ("El usuario Administrador ya existe. Continúa la carga");
		}*/
		
		if (isset ($_COOKIE['tkn'])){			
			$this->redirigeTrasCheck('','gestor','welcome', 'welcome');
		}
		else {
			$this->template->cargarVista('login/loginGet');
		}		
		//$this->template->cargarVista('login/loginGet');
		//$this->load->view('templates/pruebaTemplate');
	}
}
