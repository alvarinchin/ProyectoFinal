<?php
require_once 'vendor/autoload.php';
require_once 'JwtController.php';
class Puntuacion extends JwtController {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
	}
	public function insertar() {
		if ($this->consultarPermisosJuez ()) {
			if (isset ( $_REQUEST ["dificultad"] )) {
				if (! empty ( $_REQUEST ["dificultad"] ) && ! empty ( $_REQUEST ["ejecucion"] ) && ! empty ( $_REQUEST ["artistico"] ) && ! empty ( $_REQUEST ["penalizacion"] ) && ! empty ( $_REQUEST ["total"] ) && ! empty ( $_REQUEST ["id_rotacion"] )) {
					$campos = [ ];
					$campos ["dificultad"] = $this->utilphp->sanear ( $_REQUEST ["dificultad"] );
					$campos ["ejecucion"] = $this->utilphp->sanear ( $_REQUEST ["ejecucion"] );
					$campos ["artistico"] = $this->utilphp->sanear ( $_REQUEST ["artistico"] );
					$campos ["penalizacion"] = $this->utilphp->sanear ( $_REQUEST ["penalizacion"] );
					$campos ["total"] = $this->utilphp->sanear ( $_REQUEST ["total"] );
					$rotacion = $this->adaptador_model->getOne ( "rotacion", $this->utilphp->sanear ( $_REQUEST ["id_rotacion"] ) );
					$campos ["rotacion"] = $rotacion;
					
					$status = $this->adaptador_model->insert ( "puntuacion", $campos, Array (
							"nombre" 
					) );
					
					if ($status) {
                                            $rotacion->puntuacion=
						echo json_encode ( array (
								"status" => "ok",
								"data" => $_REQUEST,
								"msg" => "Inserción correcta",
								"debub" => $status 
						) );
					} else {
						echo json_encode ( array (
								"status" => "error",
								"msg" => "Error al insertar puntuacion nuevo, nombre repetido",
								"debub" => $status 
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
		if ($this->consultarListar ()) {
			$clubs = $this->adaptador_model->getAll ( "puntuacion" );
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
		if ($this->consultarPermisosAdmin ()) {
			if (isset ( $_REQUEST ["dificultad"] )) {
				if (! empty ( $_REQUEST ["dificultad"] ) && ! empty ( $_REQUEST ["ejecucion"] ) && ! empty ( $_REQUEST ["artistico"] ) && ! empty ( $_REQUEST ["penalizacion"] ) && ! empty ( $_REQUEST ["total"] ) && ! empty ( $_REQUEST ["id_rotacion"] )) {
					$campos = [ ];
					$campos ["dificultad"] = $this->utilphp->sanear ( $_REQUEST ["dificultad"] );
					$campos ["ejecucion"] = $this->utilphp->sanear ( $_REQUEST ["ejecucion"] );
					$campos ["artistico"] = $this->utilphp->sanear ( $_REQUEST ["artistico"] );
					$campos ["penalizacion"] = $this->utilphp->sanear ( $_REQUEST ["penalizacion"] );
					$campos ["total"] = $this->utilphp->sanear ( $_REQUEST ["total"] );
					
					$campos ["rotacion"] = $this->adaptador_model->getOne ( "rotacion", $this->utilphp->sanear ( $_REQUEST ["id_rotacion"] ) );
					
					$status = $this->adaptador_model->insert ( "Puntuacion", $campos, Array (
							"nombre" 
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
		if ($this->consultarPermisosAdmin ()) {
			if (isset ( $_REQUEST ["id"] )) {
				if (! empty ( $_REQUEST ["id"] )) {
					
					$status = $this->adaptador_model->delete ( "club", $_REQUEST ["id"] );
					
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
