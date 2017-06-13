<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
class rotacion extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
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