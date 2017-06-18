<<<<<<< HEAD
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inscripcion_model
 *
 * @author alvaro
 */
class inscripcion_model {
    
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
	public function insert($club,$competicion,$categoria,$especialidad,$deportistas,$dorsal,$tipoejercicio) {
		
		$inscripcion = R::dispense("inscripcion");
                
				$inscripcion->club=$club;        
				$inscripcion ->competicion = $competicion;
                                $inscripcion->especialidad = $especialidad;
                                $inscripcion ->categoria = $categoria;
                                $inscripcion ->dorsal = R::findLast("inscripcion")->dorsal+1;
                                $inscripcion ->tipoejercicio = $tipoejercicio;
                                
                                foreach ($deportistas as $key => $value) {
                                     $inscripcion->ownDeportistaList[$key]=$value;
                                }
                           
                            
                           
                        
                        
                         
                     //  return $campos;
		if (! $this->existe ( "dorsal", "inscripcion","",$inscripcion )) {
		 R::store ( $inscripcion );
			return true;
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
=======
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inscripcion_model
 *
 * @author alvaro
 */
class inscripcion_model {
	public function getOne($nombreBean, $id) {
		return R::load ( $nombreBean, $id );
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
	public function insert($club, $competicion, $categoria, $especialidad, $deportistas, $dorsal, $tipoejercicio) {
		$inscripcion = R::dispense ( "inscripcion" );
		
		$inscripcion->club = $club;
		$inscripcion->competicion = $competicion;
		$inscripcion->especialidad = $especialidad;
		$inscripcion->categoria = $categoria;
		$inscripcion->dorsal = $dorsal;
		$inscripcion->tipoejercicio = $tipoejercicio;
		
		foreach ( $deportistas as $key => $value ) {
			$inscripcion->ownDeportistaList [$key] = $value;
		}
		
		// return $campos;
		if (! $this->existe ( "dorsal", "inscripcion", "", $inscripcion )) {
			R::store ( $inscripcion );
			return true;
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
		
		if (! $this->existe ( $campoKey, $nombreBean, $id, $bean )) {
			
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
	public function getInscCatEsp($nombreBean, $categoria, $especialidad) {
		$inscripciones=R::load($nombreBean,'idCategoria like ?',['%'.$categoria.'%'] and 'idEspecialidad like ?',['%'.$especialidad.'%']);
		return $inscripciones;
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
	private function existe($nombres, $nombreBean, $id = "", $bean) {
		$res = false;
		for($x = 0; $x < sizeof ( $nombres ); $x ++) {
			$sql = $nombres [$x] . "= '" . $bean [$nombres [$x]] . "'";
			
			if (empty ( R::find ( $nombreBean, $sql ) )) {
				// no existe ese bean en la base de datos
				$res = false;
			} else {
				// existe ese bean en la base de datos con campo clave similar
				
				if ($bean ["id"] == R::findOne ( $nombreBean, $sql ) ["id"]) {
					// el bean es el mismo que tengo en la base id iguales
					$res = false;
				} else {
					// el nean no es el mismo que traigo
					$res = true;
				}
			}
		}
		
		return $res;
	}
>>>>>>> 45d6f294ff47eca42b1ac401a1de0806b3d0e02d
}
