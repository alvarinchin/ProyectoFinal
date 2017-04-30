<?php

class club_model extends CI_Model{
    
    
    
    
    public function getAll(){
       return R::findAll("club");
    }
    
     public function insert($nombre, $origen, $comunidad){
       if(!$this->existe($nombre)){  
       $club=  R::dispense("club");
       $club->nombre= $nombre;
       $club->origen = $origen;
       $club->comunidad= $comunidad;
       R::store($club);
       return true;
       }else{
           return false;
       }
    }
    public function update($id,$nombre, $origen,$comunidad){
      if(!$this->existe($nombre)){
        $club =R::load("club", $id);
       $club->nombre= $nombre;
       $club->origen = $origen;
       $club->comunidad= $comunidad;
       R::store($club); 
       return true;
      }else{
          return false;
      }
    }
     public function delete($id){
       R::trash("club", $id);
       return true;
     }
     /**
      * 
      * @param String $nombre
      * @return bollean si existe o no en base de datos ese bean
      * Comprueba si existe el beam en la base de datos.
      * Si existe devuelve true, si no false 
      * 
      */
     private function existe($nombre){
         
         $sql="nombre = '".$nombre."'";
         if(empty(R::find("club",$sql))){
             return false;
         }else{
             return true;
         }
         
     }
}
