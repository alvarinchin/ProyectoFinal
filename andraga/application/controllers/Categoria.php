<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author alvaro
 */
class Categoria extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("adaptador_model");
    }

    public function insertar (){   
         
       if ( isset($_REQUEST["nombre"])){
         if ( !empty($_REQUEST["nombre"]) ){
            $campos=[];
             $campos["nombre"]=$this->utilphp->sanear($_REQUEST["nombre"]);
             
             $status=$this->adaptador_model->insert("categoria",$campos,array("nombre"));
            
            if($status){
                echo json_encode(array("status"=>"ok","data"=>$_REQUEST,"msg"=>"Inserción correcta"));
                }else{
                echo json_encode(array("status"=>"error","msg"=>"Error al insertar categoría nueva, nombre repetido"));
            }
       } else {
             echo json_encode(array("status"=>"error","msg"=>"Debes rellenar todos los campos"));
         }
       }else{
           echo json_encode(array("status"=>"error","msg"=>"Debes rellenar los campos"));
       }
     }
     
     public function listar (){
        
      $clubs=$this->adaptador_model->getAll("categoria");
        if($clubs!=null){
          //deben devolverse en un echo porque son cadenas de texto
          echo json_encode(array("status"=>"ok","data"=>$clubs,"msg"=>"Datos cargados"));
      }else{
       echo json_encode(array("status"=>"error","msg"=>"error en BD"));
      }
     }
     
     
     
    public function modificar (){
              if ( isset($_REQUEST["nombre"])){
         if ( !empty($_REQUEST["nombre"])&&!empty($_REQUEST["id"]) ){
             $campos=[];
             
            $campos["nombre"]=$this->utilphp->sanear($_REQUEST["nombre"]);
             
             $id= $this->utilphp->sanear($_REQUEST["id"]);
 
             $status=$this->adaptador_model->update("categoria",$id,$campos,array("nombre"));
            
            if($status){
                echo json_encode(array("status"=>"ok","msg"=>"Entrada actualizada"));
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
             
             $status=$this->adaptador_model->delete("categoria",$_REQUEST["id"]);
            
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
