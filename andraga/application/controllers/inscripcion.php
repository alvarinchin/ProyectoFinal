<?php
require_once 'vendor/autoload.php';
require_once 'JwtController.php';
class inscripcion extends JwtController {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
                	$this->load->model ( "inscripcion_model" );
	}
	public function insertar() {
		if ($this->consultarPermisosJuez ()) {
			if (isset ( $_REQUEST ["idClub"] )) {
				if (! empty ( $_REQUEST ["idClub"] ) && ! empty ( $_REQUEST ["idDeportistas"] ) && ! empty ( $_REQUEST ["idCompeticion"] ) && ! empty ( $_REQUEST ["idCategoria"] ) && ! empty ( $_REQUEST ["idEspecialidad"] ) && ! empty ( $_REQUEST ["idTipoEjercicio"] )) {
					
					$club = $this->adaptador_model->getOne ( "club", $this->utilphp->sanear ( $_REQUEST ["idClub"] ) );
					$competicion = $this->adaptador_model->getOne ( "competicion", $this->utilphp->sanear ( $_REQUEST ["idCompeticion"] ) );
					$especialidad = $this->adaptador_model->getOne ( "especialidad", $this->utilphp->sanear ( $_REQUEST ["idEspecialidad"] ) );
					$categoria = $this->adaptador_model->getOne ( "categoria", $this->utilphp->sanear ( $_REQUEST ["idCategoria"] ) );
					$tipoejercicio = $this->adaptador_model->getOne ( "tipoejercicio", $this->utilphp->sanear ( $_REQUEST ["idTipoEjercicio"] ) );
					// $campos ["dorsal"]= strtoupper(substr($campos["Club"]["nombre"],0,2)).rand(1, 90);
                                       
					
					$deportistas = $this->cargarDeportistas ( $this->utilphp->sanear ( $_REQUEST ["idDeportistas"] ) );
				
					$status = $this->inscripcion_model->insert ( $club, $competicion, $categoria, $especialidad, $deportistas, $tipoejercicio );
			
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
								"msg" => "Error al insertar incripcion nueva, dorsal repetido",
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
					"club",
					"categoria",
					"especialidad",
					"competicion",
					"dorsal",
					"ownDeportistaList",
					"tipoejercicio" 
			];
			$res = [ ];
			
			$inscripciones = $this->adaptador_model->getAll ( "inscripcion" );
			
			foreach ( $inscripciones as $k => $inscripcion ) {
				$fila = [ ];
				$ins = $this->adaptador_model->getOne ( "inscripcion", $inscripcion->id );
				$fila ["id"] = $inscripcion->id;
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
	}
	public function borrar() {
		if ($this->consultarPermisosJuez ()) {
			if (isset ( $_REQUEST ["inscSel"] )) {
				if (! empty ( $_REQUEST ["inscSel"] )) {
					
					$status = $this->adaptador_model->delete ( "inscripcion", $this->utilphp->sanear ( $_REQUEST ["inscSel"] ) );
					
					if ($status) {
						echo json_encode ( array (
								"status" => "ok",
								"msg" => "datos eliminados" 
						) );
					} else {
						echo json_encode ( array (
								"status" => "error",
								"msg" => "Error al borrar una inscripcion " 
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
						"msg" => "Error no han llegado los datos al borrar" 
				) );
			}
		}
	}
}