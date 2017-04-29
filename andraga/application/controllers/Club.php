<?php

class Club extends CI_Controller{
    public function insertar (){   
        $this->load->model("club_model");
      if ( isset($_REQUEST["nombre"])){
        if ( !empty($_REQUEST["nombre"]) && !empty($_REQUEST["origen"]) && !empty($_REQUEST["comunidad"]) ){
            $nombre=$_REQUEST["nombre"];
            $origen= $_REQUEST["origen"];
            $comunidad= $_REQUEST["comunidad"];
            
           $status=$this->club_model->insert($nombre,$origen,$comunidad);
           
           if($status){
               echo json_encode(array("status"=>"ok","data"=>$_REQUEST));
               }else{
               echo json_encode(array("status"=>"error","msg"=>"Error al insertar club nuevo"));
           }
      } else {
            echo json_encode(array("status"=>"error","msg"=>"Error algún dato está vacío"));
        }
      }else{
          echo json_encode(array("status"=>"error","msg"=>"Error no han llegado los datos"));
      }
    }
    
    public function listar (){
        $this->load->model("club_model");
     $clubs=$this->club_model->getAll();
     if($clubs!=null){
         //deben devolverse en un echo porque son cadenas de texto
         echo json_encode(array("status"=>"ok","data"=>$clubs));
     }else{
         echo json_encode(array("status"=>"error","msg"=>"error en BD"));
     }
    }
}
