<?php
require_once 'vendor/autoload.php';
require_once 'JwtController.php';
class Podium extends JwtController {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
	}
	public function insertar() {
		if ($this->consultarPermisosJuez ()) {
			if (isset ( $_REQUEST ["idCategoria"] )) {
				if (! empty ( $_REQUEST ["idCategoria"] ) && ! empty ( $_REQUEST ["idEspecialidad"] )) {
					
					$especialidad = $this->adaptador_model->getOne ( "especialidad", $this->utilphp->sanear ( $_REQUEST ["idEspecialidad"] ) );
					$categoria = $this->adaptador_model->getOne ( "categoria", $this->utilphp->sanear ( $_REQUEST ["idCategoria"] ) );
					
					$this->load->model ( "podium_model" );
					$status = $this->podium_model->insert ( $categoria, $especialidad );
					
					if ($status) {
						// $rotacion->puntuacion=
						echo json_encode ( array (
								"status" => "ok",
								"data" => $_REQUEST,
								"msg" => "Inserción correcta",
								"debub" => $status 
						) );
					} else {
						echo json_encode ( array (
								"status" => "error",
								"msg" => "Error al insertar podium nuevo, categoria repetido",
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
			
			$campos = [ 
					
					"categoria",
					"especialidad" 
			];
			$res = [ ];
			
			$podiums = $this->adaptador_model->getAll ( "podium" );
			
			foreach ( $podiums as $k => $podium ) {
				$fila = [ ];
				$ins = $this->adaptador_model->getOne ( "podium", $podium->id );
				$fila ["id"] = $podium->id;
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
	public function listarRotacion() {
		if ($this->consultarListar ()) {
			if (isset ( $_REQUEST ["idPodium"] )) {
				$campos = [ 
						
						"categoria",
						"especialidad" 
				];
				$res = [ ];
				
				$podium = $this->adaptador_model->getOne ( "podium", $this->utilphp->sanear ( $_REQUEST ["idPodium"] ) );
				
				$categoria= $podium['idCategoria'];
				$especialidad= $podium['idEspecialidad'];
				
				$this->load->model ( "inscripcion_model" );
				
				$inscripciones = $this->inscripcion_model->getInscCatEsp ( "inscripcion", $this->utilphp->sanear ( $categoria ), $this->utilphp->sanear ( $especialidad ));
				
				$this->load->model ( "rotacion_model" );
				
				foreach ($inscripciones as $inscr){
					$rotaciones = $this->rotacion_model->getRotacionPorInscripcion ( "rotacion", $inscr);
					foreach ( $rotaciones as $k => $rotacion) {
						$fila = [ ];
						$ins = $this->adaptador_model->getOne ( "rotacion", $rotacion->id );
						$fila ["id"] = $rotacion->id;
						foreach ( $campos as $ke => $campo ) {
							
							$fila [$campo] = $ins->$campo;
						}
						
						$res [$k] = $fila;
					}
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
	}
	public function borrar() {
		if ($this->consultarPermisosJuez ()) {
			if (isset ( $_REQUEST ["id"] )) {
				if (! empty ( $_REQUEST ["id"] )) {
					
					$status = $this->adaptador_model->delete ( "podium", $_REQUEST ["id"] );
					
					if ($status) {
						echo json_encode ( array (
								"status" => "ok",
								"msg" => "datos eliminados" 
						) );
					} else {
						echo json_encode ( array (
								"status" => "error",
								"msg" => "Error al borrar un podium " 
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
