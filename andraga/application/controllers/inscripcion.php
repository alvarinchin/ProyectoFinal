<?php
require_once 'vendor/autoload.php';
require_once 'JwtController.php';

class inscripcion extends JwtController {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
	}
	public function insertar() {
		
		if ($this->consultarPermisosJuez()) {
			if (isset ( $_REQUEST ["idClub"] )) {
				if (! empty ( $_REQUEST ["idClub"] ) && ! empty ( $_REQUEST ["idDeportistas"] ) && ! empty ( $_REQUEST ["idCompeticion"] ) && ! empty ( $_REQUEST ["idCategoria"] ) && ! empty ( $_REQUEST ["idEspecialidad"] )) {
					
					$club = $this->adaptador_model->getOne ( "club", $this->utilphp->sanear ( $_REQUEST ["idClub"] ) );
					$competicion = $this->adaptador_model->getOne ( "competicion", $this->utilphp->sanear ( $_REQUEST ["idCompeticion"] ) );
					$especialidad = $this->adaptador_model->getOne ( "especialidad", $this->utilphp->sanear ( $_REQUEST ["idEspecialidad"] ) );
					$categoria = $this->adaptador_model->getOne ( "categoria", $this->utilphp->sanear ( $_REQUEST ["idCategoria"] ) );
					// $campos ["dorsal"]= strtoupper(substr($campos["Club"]["nombre"],0,2)).rand(1, 90);
					// $dorsal = $this->utilphp->sanear ( $_REQUEST ["dorsal"] );
					$deportistas = $this->cargarDeportistas ( $this->utilphp->sanear ( $_REQUEST ["idDeportistas"] ) );
					// $deportistas=$this->adaptador_model->getOne("deportista",$this->utilphp->sanear ($_REQUEST ["idDeportistas"]));
					
					try {
						$this->load->model ( "inscripcion_model" );
						$numBeansInscripcion = $this->adaptador_model->count ( "inscripcion" );
					} catch ( Exception $e ) {
					}
					if ($numBeansInscripcion != 0) {
						$dorsal = $numBeansInscripcion + 1;
						$status = $this->inscripcion_model->insert ( $club, $competicion, $categoria, $especialidad, $deportistas, $dorsal );
					} else {
						$this->load->model ( "inscripcion_model" );
						// $numBeansInscripcion = $this->adaptador_model->count ( "inscripcion" );
						$dorsal = 1;
						$status = $this->inscripcion_model->insert ( $club, $competicion, $categoria, $especialidad, $deportistas, $dorsal );
					}
					
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
		if ($this->consultarPermisosJuez()) {
			$campos = [ 
					"club",
					"categoria",
					"especialidad",
					"competicion",
					"dorsal",
					"ownDeportistaList" 
			];
			$res = [ ];
			$inscripciones = $this->adaptador_model->getAll ( "inscripcion" );
			foreach ( $inscripciones as $k => $inscripcion ) {
				$fila = [ ];
				$ins = $this->adaptador_model->getOne ( "inscripcion", $inscripcion->id );
				foreach ( $campos as $ke => $campo ) {
					$fila [$campo] = $ins->$campo;
				}
				$fila ["id"] = $inscripcion->id;
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
		if ($this->consultarPermisosJuez()) {
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