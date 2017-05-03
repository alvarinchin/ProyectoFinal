<?php
class Competicion_Model extends CI_Model {
	private function existeCompeticion($nombre) {
		$competicion = R::findOne ( 'competicion', 'nombre = ?', [ 
				$nombre 
		] );
		return $competicion != null ? true : false;
	}
	public function crear($nombre, $fecha) {
		$status = 0;
		
		if (! $this->existeCompeticion ( $nombre )) {
			$c = R::dispense ( 'competicion' );
			$c->nombre = $nombre;
			$c->fecha = $fecha;
			R::store ( $c );
			R::close ();
		} else {
			$status = - 1;
		}
		
		return $status;
	}
	public function listar() {
		$lista = R::findAll ( 'competicion' );
		
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
	public function getTodas() {
		return R::findAll ( 'ciudad', 'order by nombre' );
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