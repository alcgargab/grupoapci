<?php
	if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
	require_once 'C:/xampp/htdocs/OTELUMA/application/libraries/vendor/autoload.php';
	// require_once base_url().'libraries/vendor/autoload.php';
	class Registro extends CI_Controller {
	// class Registro{
		function __construct(){
			parent::__construct();
			$this -> load -> helper('url');
			// $this -> load -> library ('vendor/autoload');
		}
		// public function _remap($method, $params = array()) {
		// 	if (!method_exists($this, $method)) {
		// 		$this -> index($method, $params);
		// 	} else {
		// 		return call_user_func_array(array($this,$method), $params);
		// 	}
		// }
		public function index(){
			// OBJETO DE LA API DE GOOGLE
			$clienteGoogle = new Google_Client();
			// $clienteGoogle -> setAuthConfig(base_url().'models/ClientGoogle.json');
			$clienteGoogle -> setAuthConfig('C:/xampp/htdocs/OTELUMA/application/models/ClientGoogle.json');
			$clienteGoogle -> setAccessType('offline');
			$clienteGoogle -> setScopes(['profile', 'email']);
			// RUTA PARA LOGEAR A GOOGLE
			$rutaGoogle = $clienteGoogle -> createAuthUrl();
			// print_r($rutaGoogle); die();
			echo $rutaGoogle;
		}
	}
