<?php

class club extends CI_Controller{
    
    public function __construct() {
        $this->load->model("club_model");
    }
    public function insertar (){
        
       
        if ( isset($_POST["nombre"])){
            $nombre=$_POST["nombre"];
            $origen= $_POST["origen"];
            $comunidad= $_POST["comunidad"];
            
           $status=$this->ciudad_model->insert($nombre,$rigen,$comunidad);
           
           if($status){
               return json_encode(array("status"=>"ok"));
               }else{
               return json_encode(array("status"=>"error"));
           }
           
                    
        }
    }
}
