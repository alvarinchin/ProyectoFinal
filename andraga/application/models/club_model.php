<?php

class club_model extends CI_Model{
    
    public function getTodos(){
       return R::loadAll("club");
    }
    
     public function insert($nombre, $origen, $comunidad){
         
       $club=  R::dispense("club");
       $club->nombre= $nombre;
       $club->origen = $origen;
       $club->comunidad= $comunidad;
       R::store($club);
       
       return true;
    }
    public function update($id,$nombre, $origen,$comunidad){
        $club =R::load("club", $id);
        $club->nombre= $nombre;
       $club->origen = $origen;
       $club->comunidad= $comunidad;
       R::store("club"); 
       
    }
     public function delete($id){
       R::trash("club", $id);
     }
}
