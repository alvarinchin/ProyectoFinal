<?php

class Login_Model extends CI_Model{	
	
	function getUsuarioPorNombre($filtro){		
		return R::findOne("usuario", "nombre = ?", $filtro);		
	}
	
}

?>