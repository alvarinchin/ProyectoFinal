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
			if (! empty ( $_REQUEST ["idClub"] ) && ! empty ( $_REQUEST ["idDeportistas"] ) && ! empty ( $_REQUEST ["idCompeticion"] )&& ! empty ( $_REQUEST [" idCategoria"] ) && ! empty ( $_REQUEST ["idEspecialidad"] )) {
				$campos = [ ];
				$campos ["idClub"] = $this->utilphp->sanear ( $_REQUEST ["idClub"] );
				$campos ["idDeportistas"] = $this->utilphp->sanear ( $_REQUEST ["idDeportistas"] );
				$campos ["idCompeticion"] = $this->utilphp->sanear ( $_REQUEST ["idCompeticion"] );
                                $campos ["idEspecialidad"] = $this->utilphp->sanear ( $_REQUEST ["idEspecialidad"] );
                                $campos ["idCategoria"] = $this->utilphp->sanear ( $_REQUEST ["idCategoria"] );
				$campos ["dorsal"]="ssss";
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
    
    
}