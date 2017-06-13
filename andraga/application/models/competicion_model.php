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

}

?>