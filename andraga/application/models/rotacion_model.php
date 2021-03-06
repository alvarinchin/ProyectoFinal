<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rotacion_model
 *
 * @author Bárbara
 */
class rotacion_model {
	
	public function getOne($nombreBean,$id) {
		return R::load ( $nombreBean,$id );
	}
	
	public function getAll($nombreBean) {
		return R::findAll ( $nombreBean,'order by orden_id');
	}
	
	/**
	 *
	 * @param String $nombreBean
	 * @param Array $campos
	 * @return boolean
	 */
	public function insert($inscripcion) {
		
		$rotacion = R::dispense("rotacion");
		$rotacion->inscripcion=$inscripcion;
		$rotacion->orden=R::dispense("orden");
                
                $rotacion->puntuacion= R::dispense("puntuacion");
                
		
		//  return $campos;
		if (! $this->existe ( "inscripcion", "rotacion","",$rotacion )) {
			R::store ( $rotacion );
                        
                        
			return $rotacion;
		} else {
			return false;
		}
	}
	public function update($nombreBean, $id, $campos, $campoKey) {
		// AÑADIDO $nombreBean a la invo del método "existe".
		$bean = R::load ( $nombreBean, $id );
		
		foreach ( $campos as $nombreCampo => $value ) {
			$bean [$nombreCampo] = $value;
		}
		
		if (! $this->existe ( $campoKey, $nombreBean, $id,$bean )) {
			
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
	
	public function getRotacionPorInscripcion ( $nombreBean, $inscr){
		$rotaciones=R::load($nombreBean,$inscr);
		return $rotaciones;
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
	private function existe($nombres, $nombreBean, $id = "",$bean) {
		
		$res = false;
		for($x = 0; $x < sizeof ( $nombres ); $x ++) {
			$sql = $nombres [$x] ."= '".$bean[$nombres [$x]]."'";
			
			if (empty ( R::find ( $nombreBean, $sql ) )) {
				//no existe ese bean en la base de datos
				$res =false;
			} else {
				//existe ese bean en la base de datos con campo clave similar
				
				if ($bean["id"]==R::findOne( $nombreBean, $sql)["id"]) {
					//el bean es el mismo que tengo en la base id iguales
					$res = false;
				} else {
					//el nean no es el mismo que traigo
					$res = true;
				}
			}
		}
		
		return $res;
		
	}
}
