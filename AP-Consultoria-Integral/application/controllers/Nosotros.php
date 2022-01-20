<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Nosotros extends CI_Controller {
		function __construct(){
			parent::__construct();
		}
		public function _remap($method, $params = array()) {
			if (!method_exists($this, $method)) {
				$this -> index($method, $params);
			} else {
				return call_user_func_array(array($this,$method), $params);
			}
		}
		public function index($metodo = NULL){
			// validamos que venga el metodo
			if ($metodo == "") {
				$active['empresas'] = 'false';
				$active['nosotros'] = 'true';
				$this -> load -> view ('Header', $active);
				$this -> load -> view ('Home');
				$this -> load -> view ('Footer');
			}
			// el metodo si viene | mandamos página de error404
			else {
				$active['empresas'] = 'false';
				$active['nosotros'] = 'true';
				$this -> load -> view ('Header', $active);
				$this -> load -> view ('Error404');
				$this -> load -> view ('Footer');
			}
		}
	}
