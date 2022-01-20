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
			$this -> load -> view('Header');
			$this -> load -> view('Error404');
			$this -> load -> view('Footer');
		}
	}
