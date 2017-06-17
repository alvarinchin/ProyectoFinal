<?php
require_once 'JwtController.php';
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
class rotacion extends JwtController {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
		$this->load->model ( "rotacion_model" );
	}
	public function insertar() {
		if ($this->consultarPermisosJuez ()) {
			if (isset ( $_REQUEST ["id"] )) {
				if (! empty ( $_REQUEST ["id"] )) {
					
					$inscripcion = $this->adaptador_model->getOne ( "inscripcion", $this->utilphp->sanear ( $_REQUEST ["id"] ) );
					// que se cree y vaya creciendo
					$orden = 0;
					$puntuacion = null;
					$status = $this->rotacion_model->insert ( $inscripcion, $orden, $puntuacion );
					
					if ($status) {
						echo json_encode ( array (
								"status" => "ok",
								"data" => $_REQUEST,
								"msg" => "Inserción correcta",
								"debub" => $status 
						) );
					} else {
						echo json_encode ( array (
								"status" => "error",
								"msg" => "Error al insertar rotación nueva, nombre repetido",
								"debub" => $status 
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
	private function cargarDeportistas($ids) {
		$deportistas = [ ];
		$ids = explode ( ",", $ids );
		foreach ( $ids as $key => $value ) {
			
			$deportistas [$key] = $this->adaptador_model->getOne ( "deportista", $value );
		}
		
		return $deportistas;
	}
	public function listar() {
		if ($this->consultarListar ()) {
			$campos = [ 
					"categoria",
					"especialidad",
					"dorsal",
					"ownDeportistaList",
					"tipoejercicio" 
			
			];
			$res = [ ];
			$rotaciones = $this->adaptador_model->getAll ( "rotacion" );
			foreach ( $rotaciones as $k => $rotacion ) {
				$fila = [ ];
				$rot = ($this->adaptador_model->getOne ( "rotacion", $rotacion->id ));
				$ins = $rot->inscripcion;
				foreach ( $campos as $ke => $campo ) {
					$fila [$campo] = $ins->$campo;
				}
				$fila ["id"] = $rotacion->id;
				$fila ["orden"] = $rotacion->orden;
				$res [$k] = $fila;
			}
			
			if ($res != null) {
				// deben devolverse en un echo porque son cadenas de texto
				echo json_encode ( array (
						"status" => "ok",
						"data" => $res,
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
	public function borrar() {
		if ($this->consultarPermisosJuez ()) {
			if (isset ( $_REQUEST ["id"] )) {
				if (! empty ( $_REQUEST ["id"] )) {
					
					$status = $this->adaptador_model->delete ( "rotacion", $this->utilphp->sanear ( $_REQUEST ["id"] ) );
					
					if ($status) {
						echo json_encode ( array (
								"status" => "ok",
								"msg" => "datos eliminados" 
						) );
					} else {
						echo json_encode ( array (
								"status" => "error",
								"msg" => "Error al borrar una rotacion " 
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