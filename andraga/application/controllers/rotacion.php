    
<?php
require_once 'JwtController.php';
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
class rotacion extends JwtController {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
                $this->load->model ( "rotacion_model" );
                $this->load->model ( "Orden_model" );
	}
	public function insertar() {
		if (isset ( $_REQUEST ["id"] )) {
			if (! empty ( $_REQUEST ["id"] )) {
                            
				$inscripcion = $this->adaptador_model->getOne ( "inscripcion", $this->utilphp->sanear ( $_REQUEST ["id"] ) );
				//que se cree y vaya creciendo 
                              
                               
				$status = $this->rotacion_model->insert ( $inscripcion);
                                
                                
                                $orden=$this->adaptador_model->getOne("orden",$status->orden_id);
                                $orden->rotacion=$status;
                                $orden->competicion=$this->adaptador_model->getOne("competicion",$inscripcion->competicion_id);
                                 
                                $this->Orden_model->insert($orden);
                            
                        
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
				"ownDeportistaList",
                                "tipoejercicio",
                                "puntuacion",
                                "club"      
        
                        	];
		$res = [ ];
		$rotaciones = $this->rotacion_model->getAll ( "rotacion" );
                 ;
		foreach ( $rotaciones as $k => $rotacion ) {
                   
			$fila = [ ];
			$rot = ($this->adaptador_model->getOne ( "rotacion", $rotacion->id ));
                       
                        $ins= $rot->inscripcion;
			foreach ( $campos as $ke => $campo ) {
				$fila [$campo] = $ins->$campo;
                               
			}
                        $fila ["puntuacion"] = $this->adaptador_model->getOne("puntuacion",$rotacion->puntuacion_id);
			$fila ["id"] = $rotacion->id;
                        $fila ["puntuacion_id"] = $rotacion->puntuacion_id;
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