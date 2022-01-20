<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SassperAdm extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> library('email');
		$this -> load -> helper('url');
		$this -> load -> model('ModelSassper');

	}
	public function _remap($method, $params = array()) {
		if (!method_exists($this, $method)) {
			$this -> index($method, $params);
		} else {
			return call_user_func_array(array($this,$method), $params);
		}
	}
	public function index(){
		redirect(base_url());
	}
	public function Adm($usuario = NULL, $pass = NULL){
		$data['User'] = $_GET['usuario'];
    $data['Password'] = $_GET['pass'];
		if ($data != NULL) {
			$tabla = "user";
			$campo1 = "Usuario";
			$valor1 = $data['User'];
			$campo2 = "Password";
			$valor2 = $data['Password'];
			$registro = $this -> ModelSassper -> GetCampos($tabla, $campo1, $valor1, $campo2, $valor2);
			if ($registro) {
				$tabla = "correos";
				$data['correos'] = $this -> ModelSassper -> GetAll($tabla);
				$this -> load -> view('ViewSASSPERheader');
				$this -> load -> view('Admin/ViewSASSPERAdmin', $data);
				$this -> load -> view ('ViewSASSPERfooter');
			}else {
				redirect(base_url());
			}
		}else {
			redirect(base_url());
		}
	}
}
