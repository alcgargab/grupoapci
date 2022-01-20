<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Error404 extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function _remap($method, $params = array()) {
		if (!method_exists($this, $method)) {
			$this -> index($method, $params);
		}
		else {
			return call_user_func_array(array($this,$method), $params);
		}
	}
	public function index(){
		// validamos que venga la sesion iniciada
		if (isset($this -> session -> validarSesion)) {
			// si viene la sesión | validamos que sea igual a ok
			if ($this -> session -> validarSesion == "ok") {
				// la sesion es correcta | mandamos error con sesión
				$this -> load -> view('Principal/Header');
				$this -> load -> view('Error404/404');
				$this -> load -> view('Principal/Footer');
			}
			// la sesión no es igual a ok | redirigimos al error sin sesión
			else {
				$this -> load -> view('Principal/Header');
				$this -> load -> view('Error404/404');
				$this -> load -> view('Principal/Footer');
			}
		}
		// no viene la sesión | redirigimos al error sin sesión
		else {
			$this -> load -> view('Principal/Header');
			$this -> load -> view('Error404/404');
			$this -> load -> view('Principal/Footer');
		}
	}
}
