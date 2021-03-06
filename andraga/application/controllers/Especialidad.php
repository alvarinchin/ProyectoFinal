<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Especialidad
 *
 * @author alvaro
 */
require_once 'vendor/autoload.php';
require_once 'JwtController.php';

class Especialidad extends JwtController {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
	}
	public function insertar() {
		if ($this->consultarPermisosAdmin()) {
			if (isset ( $_REQUEST ["descripcion"] )) {
				if (! empty ( $_REQUEST ["descripcion"] ) && ! empty ( $_REQUEST ["num"] )) {
					$campos = [ ];
					$campos ["descripcion"] = $this->utilphp->sanear ( $_REQUEST ["descripcion"] );
					$campos ["num"] = $this->utilphp->sanear ( $_REQUEST ["num"] );
					
					$status = $this->adaptador_model->insert ( "especialidad", $campos, array (
							"descripcion" 
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
								"msg" => "Error al insertar especialidad nueva, descripción repetida" 
						) );
					}
				} else {
					echo json_encode ( array (
							"status" => "error",
							"msg" => "Debes rellenar todos los campos" 
					) );
				}
			} else {
				echo json_encode ( array (
						"status" => "error",
						"msg" => "Debes rellenar los campos" 
				) );
			}
		}
	}
	public function listar() {
		if ($this->consultarListar()) {
			$clubs = $this->adaptador_model->getAll ( "especialidad" );
			if ($clubs != null) {
				// deben devolverse en un echo porque son cadenas de texto
				echo json_encode ( array (
						"status" => "ok",
						"data" => $clubs,
						"msg" => "Datos cargados" 
				) );
			} else {
				echo json_encode ( array (
						"status" => "error",
						"msg" => "error en BD" 
				) );
			}
		}
	}
	public function modificar() {
		if ($this->consultarPermisosAdmin()) {
			if (isset ( $_REQUEST ["descripcion"] )) {
				if (! empty ( $_REQUEST ["descripcion"] ) && ! empty ( $_REQUEST ["num"] ) && ! empty ( $_REQUEST ["id"] )) {
					$campos = [ ];
					
					$campos ["descripcion"] = $this->utilphp->sanear ( $_REQUEST ["descripcion"] );
					$campos ["num"] = $this->utilphp->sanear ( $_REQUEST ["num"] );
					
					$id = $this->utilphp->sanear ( $_REQUEST ["id"] );
					
					$status = $this->adaptador_model->update ( "especialidad", $id, $campos, array (
							"descipcion" 
					) );
					
					if ($status) {
						echo json_encode ( array (
								"status" => "ok",
								"msg" => "Entrada actualizada" 
						) );
					} else {
						echo json_encode ( array (
								"status" => "error",
								"msg" => "Error al modificar un club, nombre repetido " 
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
	public function borrar() {
		if ($this->consultarPermisosAdmin()) {
			if (isset ( $_REQUEST ["id"] )) {
				if (! empty ( $_REQUEST ["id"] )) {
					
					$status = $this->adaptador_model->delete ( "especialidad", $_REQUEST ["id"] );
					
					if ($status) {
						echo json_encode ( array (
								"status" => "ok",
								"msg" => "datos eliminados" 
						) );
					} else {
						echo json_encode ( array (
								"status" => "error",
								"msg" => "Error al borrar un club " 
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
}
