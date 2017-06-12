<?php
class Acceso extends CI_Controller {
	public function logout() {
		if (isset ( $_COOKIE ['tkn'] )) {
			unset ( $_COOKIE ['tkn'] );
			setcookie ( 'tkn', '', time () - 3600, '/' );
			header ( 'Location:' . base_url () . '' );
		}
	}
}

?>