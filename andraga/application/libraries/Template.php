<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Template {
	var $template_data = array ();
	function set($name, $value) {
		$this->template_data [$name] = $value;
	}
	function load($template = '', $view = '', $view_data = array(), $return = FALSE) {
		$this->CI = & get_instance ();
		$this->set ( 'contents', $this->CI->load->view ( $view, $view_data, TRUE ) );
		return $this->CI->load->view ( $template, $this->template_data, $return );
	}
	function cargarVista($view = '', $view_data = array(), $rol = 1, $return = FALSE) {
		$this->CI = & get_instance ();
		$this->set ( 'contents', $this->CI->load->view ( $view, $view_data, TRUE ) );
		if ($rol == 1) {
			
			return $this->CI->load->view ( "templates/Template_main", $this->template_data, $return );
		} else if ($rol == 2) {
			return $this->CI->load->view ( "templates/Template_juez", $this->template_data, $return );
		} else {
			return $this->CI->load->view ( "templates/Template_admin", $this->template_data, $return );
		}
	}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */