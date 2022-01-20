<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AEMIAdm extends CI_Controller {
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
		redirect(base_url());
	}
	public function Adm($usuario = NULL, $pass = NULL){
		$tbl_usuarios = "usuarios";
		$tbl_correos = "correos";
		$data['User'] = $_GET['usuario'];
    $data['Password'] = $_GET['pass'];
		if ($data != NULL) {
			$campo1 = "Usuario";
			$valor1 = $data['User'];
			$campo2 = "Password";
			$valor2 = $data['Password'];
			$registro = $this -> ma -> GetCampos($tbl_usuarios, $campo1, $valor1, $campo2, $valor2);
			if ($registro) {
				$data['correos'] = $this -> ma -> GetAll($tbl_correos);
				$this -> load -> view('Principal/Header');
				$this -> load -> view('Administrador/Admin', $data);
				$this -> load -> view ('Principal/Footer');
			}
			else {
				redirect(base_url());
				exit();
			}
		}
		else {
			redirect(base_url());
			exit();
		}
	}
}
