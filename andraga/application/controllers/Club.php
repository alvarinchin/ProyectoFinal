<?php

class Club extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("adaptador_model");
    }

    public function insertar (){   
         
       if ( isset($_REQUEST["nombre"])){
         if ( !empty($_REQUEST["nombre"]) && !empty($_REQUEST["origen"]) && !empty($_REQUEST["comunidad"]) ){
            $campos=[];
             $campos["nombre"]=$this->utilphp->sanear($_REQUEST["nombre"]);
             $campos["origen"]= $this->utilphp->sanear($_REQUEST["origen"]);
             $campos["comunidad"]= $this->utilphp->sanear($_REQUEST["comunidad"]);
             
             $status=$this->adaptador_model->insert("club",$campos,"nombre");
            
            if($status){
                echo json_encode(array("status"=>"ok","data"=>$_REQUEST,"msg"=>"Inserción correcta"));
                }else{
                echo json_encode(array("status"=>"error","msg"=>"Error al insertar club nuevo, nombre repetido"));
            }
       } else {
             echo json_encode(array("status"=>"error","msg"=>"Error algún dato está vacío"));
         }
       }else{
           echo json_encode(array("status"=>"error","msg"=>"Error no han llegado los datos"));
       }
     }
     
     public function listar (){
        
      $clubs=$this->adaptador_model->getAll("club");
        if($clubs!=null){
          //deben devolverse en un echo porque son cadenas de texto
          echo json_encode(array("status"=>"ok","data"=>$clubs,"msg"=>"Datos cargados"));
      }else{
       echo json_encode(array("status"=>"error","msg"=>"error en BD"));
      }
     }
     
     
     
    public function modificar (){
              if ( isset($_REQUEST["nombre"])){
         if ( !empty($_REQUEST["nombre"]) && !empty($_REQUEST["origen"]) && !empty($_REQUEST["comunidad"]) ){
             $campos=[];
             
            $campos["nombre"]=$this->utilphp->sanear($_REQUEST["nombre"]);
             $campos["origen"]= $this->utilphp->sanear($_REQUEST["origen"]);
             $campos["comunidad"]= $this->utilphp->sanear($_REQUEST["comunidad"]);
              $campos["id"]= $this->utilphp->sanear($_REQUEST["id"]);
             
             $campos->id= $this->utilphp->sanear($_REQUEST["comunidad"]);
             
             $status=$this->adaptador_model->update("club",$campos,"nombre");
            
            if($status){
                echo json_encode(array("status"=>"ok","data"=>$_REQUEST));
                }else{
                echo json_encode(array("status"=>"error","msg"=>"Error al modificar un club, nombre repetido "));
            }
       } else {
             echo json_encode(array("status"=>"error","msg"=>"Error algún dato está vacío"));
         }
       }else{
           echo json_encode(array("status"=>"error","msg"=>"Error no han llegado los datos"));
       }
     }
      public function borrar (){
              if ( isset($_REQUEST["id"])){
         if ( !empty($_REQUEST["id"])){
             
             $status=$this->adaptador_model->delete("club",$_REQUEST["id"]);
            
            if($status){
                echo json_encode(array("status"=>"ok","msg"=>"datos eliminados"));
                }else{
                echo json_encode(array("status"=>"error","msg"=>"Error al borrar un club "));
            }
       } else {
             echo json_encode(array("status"=>"error","msg"=>"Error algún dato está vacío"));
         }
       }else{
           echo json_encode(array("status"=>"error","msg"=>"Error no han llegado los datos"));
       }
     }
          
     
     
}
