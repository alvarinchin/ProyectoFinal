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
		if (! $this->existe ( $campos [$campoKey], $nombreBean )) {
			$bean = R::dispense ( $nombreBean );
			foreach ( $campos as $nombreCampo => $value ) {
				$bean[$nombreCampo]= $value;				
			}			
			R::store ( $bean );
			return true;
		} else {
			return false;
		}
	}
	public function update($nombreBean, $id, $campos, $campoKey) {
		if (! $this->existe ( $campos [$campoKey] )) {
			$bean = R::load ( $nombreBean, $id );
			foreach ( $campos as $nombreCampo => $value ) {
				$bean [$nombreCampo] = $value;
			}
			
			R::store ( $bean );
			return true;
		} else {
			return false;
		}
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
	
	// AÑADIDO 06/05/2017 -- JOSE
	private function existe($nombre, $bean = "club") {
		$sql = "nombre = '" . $nombre . "'";
		if (empty ( R::find ( $bean, $sql ) )) {
			return false;
		} else {
			return true;
		}
	}
}
