<?php
class Login extends CI_Controller {
	public function comprobarUsuario() {
		$login = (! empty ( $_POST ['login'] ) ? $_POST ['login'] : null);
		// HASH DEL PASSWORD PARA COMPROBARLO
		$password = (! empty ( $_POST ['password'] ) ? password_hash ( $_POST ['password'], PASSWORD_BCRYPT ) : null);
		$enlace = (! empty ( $_POST ['enlace'] ) ? true : false);
		
		// var_dump($login." ".$password." ".$enlace.PHP_EOL); //DEBUG
		
		$this->load->model ( 'login_model' );
		$usuario = $this->login_model->getUsuarioPorLogin ( $login );
		
				
		// LOGIN CAMPOS VACÍOS Y ENLACE
		if ($login == null) {
			if ($password == null) {
				$datos = null;
				$datos ['mensaje'] = 'Login y Contraseña deben ser rellenados. Redirigiendo a página principal.';
				$datos ['destino'] = 'Pantalla de login';
				$this->template->cargarVista ( 'errors/errorLogin', $datos );
			}
			if (isset ( $password )) {
				$usuario ['enlace'] = $enlace;
				$usuario ['login'] = 'enlace';
				$usuario ['password'] = $password;
				$jwt = $this->jwauth->codificarToken ( $usuario );
				session_start ();
				$_SESSION ['tkn' + $_SESSION ['cnt']] = $jwt;
				setcookie ( 'tkn', $jwt, time () + 86400000, null, null, true );
				$datos = null;
				$datos ['login'] = 'estimado espectador';				
				$this->template->cargarVista ( 'login/loginPost', $datos );
			}
		}		
				
		// LOGIN CAMPOS LLENOS
		
		/*
		 * PASSWORD_VERIFY PERMITE EVALUAR CONTRA LA PASS DE LA B.D. UN PASSWORD HASHEADO
		 * ARRIBA, SE HA ENCRIPTADO PARA COMPARARLO AQUÍ CON EL BRUTO DE B.D.
		 */
		else if (! empty ( $usuario ) && $usuario->login == $login && password_verify ( $usuario->password, $password )) {
			
			//LOGIN CORRECTO
			
			$usuario ['enlace'] = $enlace;
			$jwt = $this->jwtauth->codificarToken ( $usuario );			
			session_start ();
			$_SESSION ['tkn'] = $jwt;
			//setcookie ( 'tkn', $jwt, time () + 86400000, null, null, true ); //86.400.000  = 1 DÍA
			$datos = null;
			$datos ['login'] = $usuario -> login; 
			$this->template->cargarVista ( 'login/loginPost', $datos );
		} 
		else {
			
			// LOGIN INCORRECTO
			
			$datos = null;
			$datos ['mensaje'] = 'Login o Contraseña erróneos. Redirigiendo a página principal.';
			$datos ['destino'] = 'Pantalla de login';
			$this->template->cargarVista ( 'errors/errorLogin', $datos );
		}
	}
}

?>