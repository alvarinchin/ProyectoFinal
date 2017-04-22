<?php

class Login_Model extends CI_Model{	
	
	function crearUsuario($login, $password, $rol){		
		$usuario = R::dispense('usuario');
		$usuario->login = $login;
		$usuario->password = $password;
		$usuario->rol = $rol;
		R::store($usuario);		
	}
	
	function getUsuarioPorLogin($login){
		return R::findOne("usuario", "login like :login", [":login"=>$login]);		
	}
	
}

?>