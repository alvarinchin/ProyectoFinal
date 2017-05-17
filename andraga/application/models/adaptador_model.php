<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adaptador_model
 *
 * @author alvaro
 */
class adaptador_model {
	public function getAll($nombreBean) {
		return R::findAll ( $nombreBean );
	}
	
	/**
	 *
	 * @param String $nombreBean        	
	 * @param Array $campos        	
	 * @return boolean
	 */
	public function insert($nombreBean, $campos, $campoKey) {
		
		// AÑADIDO $nombreBean a la invo del método "existe".
            
           $camposK=[];
           foreach ($campoKey as $key => $value) {
               $camposK[$key]=$campos[$value];
           }
          
		if (! $this->existe ( $camposK, $nombreBean )) {
			$bean = R::dispense ( $nombreBean );
			foreach ( $campos as $nombreCampo => $value ) {
				$bean [$nombreCampo] = $value;
			}
			R::store ( $bean );
			return true;
		} else {
			return false;
		}
	}
        
        
	public function update($nombreBean, $id, $campos, $campoKey) {
		// AÑADIDO $nombreBean a la invo del método "existe".
             $camposK=[];
           foreach ($campoKey as $key => $value) {
               $camposK[$key]=$campos[$value];
           }
		if (! $this->existe ($camposK, $nombreBean, $id )) {
			$bean = R::load ( $nombreBean, $id );
			foreach ( $campos as $nombreCampo => $value ) {
				$bean [$nombreCampo] = $value;
			}
			
			R::store ( $bean );
			return true;
		} else {
			return false;
		}
		return false;
	}
	public function delete($nombreBean, $id) {
		R::trash ( $nombreBean, $id );
		return true;
	}
	/**
	 *
	 * @param String $nombre        	
	 * @return bollean si existe o no en base de datos ese bean
	 *         Comprueba si existe el beam en la base de datos.
	 *         Si existe devuelve true, si no false
	 *        
	 */
	
	/*
	 * private function existe($nombre){
	 *
	 * $sql="nombre = '".$nombre."'";
	 * if(empty(R::find("club",$sql))){
	 * return false;
	 * }else{
	 * return true;
	 * }
	 *
	 * }
	 */
	
	/**
         * 
         * @param Array $nombres
         * @param type $bean
         * @param type $id
         * @return boolean
         */
	private function existe($nombres, $bean, $id = "") {
            
            $res=false;
            for ($x=0;$x<sizeof($nombres);$x++) {
                	$sql = "nombre = '" . $nombres[$x] . "'";
                        
		if (empty ( R::find ( $bean, $sql ) )) {
			$res= false;
                       
                        
		} else {
                   //$d+=  empty ( R::find ( $bean, $sql ));
                    $d=R::find ( $bean, $sql );
			if (R::find ( $bean, $sql )[1]["id"] === $id) {
                            
				$res= false;
			} else {
                            
				$res= true;
			}
			
		}
            }
	
		return $res;
	}
}
