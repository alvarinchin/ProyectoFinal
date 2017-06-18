<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Orden_model
 *
 * @author alvaro
 */
class Orden_model {
      
    public function getOne($nombreBean,$id) {
		return R::load ( $nombreBean,$id );
	}
        
	public function getAll($nombreBean) {
		return R::findAll ( $nombreBean );
	}
	
	/**
	 *
	 * @param String $nombreBean        	
	 * @param Array $campos        	
	 * @return boolean
	 */
	public function insert($bean) {
		
		// AÑADIDO $nombreBean a la invo del método "existe".
            
          
                
		
                       $pos=R::findLast("orden");
                       return $pos;
                             $bean->posicion=$pos+1;
                        
                       
		
			
			if(R::store ( $bean )){
			
                        return true;
		} else {
			return false;
		}
	}

	
}
