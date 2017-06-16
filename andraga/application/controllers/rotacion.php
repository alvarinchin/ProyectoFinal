<?php
require_once 'JwtController.php';
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
class rotacion extends JwtController {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
	}
	public function insertar() {
		if (isset ( $_REQUEST ["id"] )) {
			if (! empty ( $_REQUEST ["id"] )) {
				
				$inscripcion = $this->adaptador_model->getOne ( "inscripcion", $this->utilphp->sanear ( $_REQUEST ["id"] ) );
				
				$idInscripcion = $this->utilphp->sanear ( $_REQUEST ["id"] );
				$categoria = $inscripcion ['idCategoria'] ['nombre'];
				$especialidad = $inscripcion ['idEspecialidad'] ['descripcion'];
				$dorsal = $inscripcion ['dorsal'];
				
				$status = $this->rotacion_model->insert ( $categoria, $especialidad, $dorsal, $idInscripcion );
				
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
	private function cargarDeportistas($ids) {
		$deportistas = [ ];
		$ids = explode ( ",", $ids );
		foreach ( $ids as $key => $value ) {
			
			$deportistas [$key] = $this->adaptador_model->getOne ( "deportista", $value );
		}
		
		return $deportistas;
	}
	public function listar() {
		$campos = [
				"categoria",
				"especialidad",
				"dorsal",
				"ownDeportistaList"
				
		];
		$res = [ ];
		$rotaciones = $this->adaptador_model->getAll ( "rotacion" );
		foreach ( $rotaciones as $k => $rotacion ) {
			$fila = [ ];
			$ins = $this->adaptador_model->getOne ( "rotacion", $rotacion->id );
			foreach ( $campos as $ke => $campo ) {
				$fila [$campo] = $ins->$campo;
			}
			$fila ["id"] = $rotacion->id;
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
	public function borrar() {
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