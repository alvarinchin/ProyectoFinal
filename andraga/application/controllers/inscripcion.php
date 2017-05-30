<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
class inscripcion extends CI_Controller {
    
    public function __construct() {
		parent::__construct ();
		$this->load->model ( "adaptador_model" );
	}
        
        public function insertar(){
            if (isset ( $_REQUEST ["idClub"] )) {
			if (! empty ( $_REQUEST ["idClub"] ) && ! empty ( $_REQUEST ["idDeportistas"] ) && ! empty ( $_REQUEST ["idCompeticion"] )&& ! empty ( $_REQUEST ["idCategoria"] ) && ! empty ( $_REQUEST ["idEspecialidad"] )&& ! empty ( $_REQUEST ["dorsal"] )) {
				$campos = [ ];
				$campos ["club"] = $this->adaptador_model->getOne("club",$this->utilphp->sanear ( $_REQUEST ["idClub"] ));
				
				$campos ["competicion"] = $this->adaptador_model->getOne("competicion",$this->utilphp->sanear ( $_REQUEST ["idCompeticion"]) );
                                $campos ["especialidad"] = $this->adaptador_model->getOne("especialidad",$this->utilphp->sanear ( $_REQUEST ["idEspecialidad"] ));
                                $campos ["categoria"] = $this->adaptador_model->getOne("especialidad",$this->utilphp->sanear ( $_REQUEST ["idCategoria"]) );
				//$campos ["dorsal"]= strtoupper(substr($campos["Club"]["nombre"],0,2)).rand(1, 90);
				$campos ["dorsal"] = $this->utilphp->sanear ( $_REQUEST ["dorsal"]) ;
                                $campos ["deportistas"]=$this->cargarDeportistas($this->utilphp->sanear ( $_REQUEST ["idDeportistas"]));
                               
                                
                                
                                
                                
                                $status = $this->adaptador_model->insert ( "inscripcion", $campos, Array("dorsal") );
				
                              
				if ($status) {
					echo json_encode ( array (
							"status" => "ok",
							"data" => $_REQUEST,
							"msg" => "Inserción correcta",
                                                        "debub"=>$status
					) );
				} else {
					echo json_encode ( array (
							"status" => "error",
							"msg" => "Error al insertar club nuevo, nombre repetido",
                                            "debub"=>$status
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
        private function cargarDeportistas($ids){
            $deportistas=[];
            $ids= explode(",", $ids);
            foreach ($ids as $key => $value) {
                
                $deportistas[$key]=$this->adaptador_model->getOne("deportista",$value);
                
            }
            
            return $deportistas;
        }


        public function listar() {
		$inscripciones = $this->adaptador_model->getAll ( "inscripcion" );
                
		if ($inscripciones != null) {
			// deben devolverse en un echo porque son cadenas de texto
			echo json_encode ( array (
					"status" => "ok",
					"data" => $inscripciones,
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
				
				$status = $this->adaptador_model->delete ( "inscripcion", $this->utilphp->sanear($_REQUEST ["id"]) );
				
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