<?php
class Deportista_Model extends CI_Model {
	private function existeDeportista($nombre, $ape1, $ape2, $fecha) {
		$deportista = R::findOne ( 'deportista', 'nombre = ?', [ 
				$nombre 
		] );
		return $deportista != null ? true : false;
		$ape1 = R::findOne ( 'deportista', 'ape1 = ?', [
				$ape1
		] );
		return $ape1 != null ? true : false;
		
		$ape2 = R::findOne ( 'deportista', 'ape2 = ?', [
				$ape2
		] );
		return $ape2 != null ? true : false;
		
		$fecha = R::findOne ( 'deportista', 'fecha = ?', [
				$fecha
		] );
		return $fecha != null ? true : false;
	}
	public function crear($nombre, $ape1, $ape2, $fecha) {
		$status = 0;
		
		if (! $this->existeDeportista ( $nombre, $ape1, $ape2, $fecha )) {
			$c = R::dispense ( 'deportista' );
			$c->nombre = $nombre;
			$c->ape1 = $ape1;
			$c->ape2 = $ape2;
			$c->fecha = $fecha;
			R::store ( $c );
			R::close ();
		} else {
			$status = - 1;
		}
		
		return $status;
	}
	public function listar() {
		$lista = R::findAll ( 'deportista' );
		
		return $lista;
	}
	public function borrar($idCiudad) {
		$status = 0;
		if (R::findOne ( 'ciudad', 'id=?', [ 
				$idCiudad 
		] ) != - 1) {
			$ciudad = R::load ( 'ciudad', $idCiudad );
			R::trash ( $ciudad );
			R::close ();
		} else {
			$status = - 1;
		}
		
		return $status;
	}
	public function modificar($antigua, $nueva) {
		$status = 0;
		if ($this->existeCiudad ( $antigua ) && ! $this->existeCiudad ( $nueva )) {
			// si existe ciudad antigua y NO existe la nueva
			// no seria necesario comprobar que existe el antiga pero nunca se sabe
			$c = R::findOne ( 'ciudad', 'nombre=?', [ 
					$antigua 
			] );
			$c->nombre = $nueva;
			$id = R::store ( $c );
			
			if ($id == '') {
				// error en el servidor
				$status = 1;
			}
		} else {
			$status = 2;
		}
		
		return $status;
	}
	public function getTodos() {
		return R::findAll ( 'deportista', 'order by nombre' );
	}
	public function getCiudad($nombre) {
		return R::findOne ( 'ciudad', 'nombre=?', [ 
				$nombre 
		] );
	}
	public function getCiudadPorId($id) {
		return R::load ( 'ciudad', $id );
	}
	public function buscar($nombre) {
		$ciudades = R::find ( 'ciudad', 'nombre like ?', [ 
				'%' . $nombre . '%' 
		] );
		R::close ();
		return $ciudades;
	}
}

?>