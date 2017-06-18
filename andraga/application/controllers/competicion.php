<?php
require_once 'vendor/autoload.php';
require_once 'JwtController.php';

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Competicion extends JwtController {
	function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
	}
	public function index() {
		$this->template->cargarVista ( 'competicion/crear' );
	}
	public function crear() {
		session_start ();
		// $datos = '';
		$this->template->cargarVista ( 'competicion/crear' );
	}
	public function insertar() {
		if ($this->consultarPermisosAdmin ()) {
			if (isset ( $_REQUEST ["nombre"] )) {
				if (! empty ( $_REQUEST ["nombre"] ) && ! empty ( $_REQUEST ["fecha"] )) {
					$campos = [ ];
					$campos ["nombre"] = $this->utilphp->sanear ( $_REQUEST ["nombre"] );
					$campos ["fecha"] = $this->utilphp->sanear ( $_REQUEST ["fecha"] );
					
					try {
						$this->load->model ( "competicion_model" );
						$numCompeticiones = $this->competicion_model->count ( "competicion" );
					} catch ( Exception $e ) {
					}
					if ($numCompeticiones != 0) {
						echo json_encode ( array (
								"status" => "error",
								
								"msg" => "Ya existe una competición. Elimine la competición actual para crear una nueva" 
						) );
					} else {
						
						$status = $this->adaptador_model->insert ( "competicion", $campos, Array (
								"nombre" 
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
									
									"msg" => "Error al insertar competicion nueva, nombre repetido" 
							) );
						}
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
						"msg" => "Debes rellenar todos los campos" 
				) );
			}
		}
	}
	public function modificar() {
		if ($this->consultarPermisosAdmin ()) {
			if (isset ( $_REQUEST ["nombre"] )) {
				if (! empty ( $_REQUEST ["nombre"] ) && ! empty ( $_REQUEST ["fecha"] ) && ! empty ( $_REQUEST ["id"] )) {
					$campos = [ ];
					$campos ["nombre"] = $this->utilphp->sanear ( $_REQUEST ["nombre"] );
					$campos ["fecha"] = $this->utilphp->sanear ( $_REQUEST ["fecha"] );
					$id = $this->utilphp->sanear ( $_REQUEST ["id"] );
					
					$status = $this->adaptador_model->update ( "competicion", $id, $campos, "id" );
					if ($status) {
						echo json_encode ( array (
								"status" => "ok",
								"msg" => "Modificación correcta" 
						) );
					} else {
						echo json_encode ( array (
								"status" => "error",
								"msg" => "Error al modificar competicion nueva, nombre repetido" 
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
	
	/*
	 * public function crearOK() {
	 * $this->template->cargarVista ( 'competicion/crearOK' );
	 * //header ( 'Location:' . base_url () . 'deportista/crear' );
	 * }
	 */
	public function crearERROR() {
		$this->template->cargarVista ( 'competicion/crearERROR' );
	}
	public function listar() {
		if ($this->consultarListar ()) {
			// $datos ['body'] ['deportistas'] = $this->deportista_model->getTodos ();
			// $this->template->cargarVista ( 'deportista/listarDeportista', $datos );
			$beans = $this->adaptador_model->getAll ( "competicion" );
			if ($beans != null) {
				// deben devolverse en un echo porque son cadenas de texto
				echo json_encode ( array (
						"status" => "ok",
						"data" => $beans,
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
		if ($this->consultarPermisosAdmin ()) {
			if (isset ( $_REQUEST ["id"] )) {
				if (! empty ( $_REQUEST ["id"] )) {
					
					$status = $this->adaptador_model->delete ( "competicion", $_REQUEST ["id"] );
					
					if ($status) {
						try {							
							$status1 =$this->adaptador_model->borrar ( "clubes" );
							if (!$status1) {
								echo json_encode ( array (
										"status" => "error",
										"msg" => "Error al borrar un club "
								) );
							}
							$status2 =$this->adaptador_model->borrar( "categorias" );
							if (!$status2) {
								echo json_encode ( array (
										"status" => "error",
										"msg" => "Error al borrar un categoria "
								) );
							}
							$status3 =$this->adaptador_model->borrar( "tiposejercicio" );
							if (!$status3) {
								echo json_encode ( array (
										"status" => "error",
										"msg" => "Error al borrar un tipo"
								) );
							}
							$status4 =$this->adaptador_model->borrar( "especialidades" );
							if (!$status4) {
								echo json_encode ( array (
										"status" => "error",
										"msg" => "Error al borrar un especialidades "
								) );
							}
							$status5 =$this->adaptador_model->borrar( "deportistas" );
							if (!$status5) {
								echo json_encode ( array (
										"status" => "error",
										"msg" => "Error al borrar un deportistas "
								) );
							}
							$status6 =$this->adaptador_model->borrar( "inscripciones" );
							if (!$status6) {
								echo json_encode ( array (
										"status" => "error",
										"msg" => "Error al borrar un inscripciones "
								) );
							}
							$status7 =$this->adaptador_model->borrar( "rotaciones" );
							if (!$status7) {
								echo json_encode ( array (
										"status" => "error",
										"msg" => "Error al borrar un rotaciones "
								) );
							}
							$status8 =$this->adaptador_model->borrar( "puntuaciones" );
							if (!$status8) {
								echo json_encode ( array (
										"status" => "error",
										"msg" => "Error al borrar un puntuaciones "
								) );
							}
							$status9 =$this->adaptador_model->borrar( "podiums" );
							if (!$status9) {
								echo json_encode ( array (
										"status" => "error",
										"msg" => "Error al borrar un podiums "
								) );
							}
						} catch ( Exception $e ) {
						}
						
						echo json_encode ( array (
								"status" => "ok",
								"msg" => "datos eliminados" 
						) );
					} else {
						echo json_encode ( array (
								"status" => "error",
								"msg" => "Error al borrar una competición " 
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
