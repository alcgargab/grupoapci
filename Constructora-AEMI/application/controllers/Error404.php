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
	public function index($universal_method = NULL){
		// --------------- variables para tablas --------------- //
		$tbl_h = "headers";
		$tbl_rs = "redes_sociales";
		// --------------- HEADER --------------- //
		$select = "item_h, ruta_h";
		$query_header['items'] = $this -> ma -> getAll($select, $tbl_h); // obtenemos las opciones del menú
		// --------------- FOOTER --------------- //
		$select = "red_social_rs, imagen_rs";
		$query_footer['tbl_rs'] = $this -> ma -> getAll($select, $tbl_rs); // obtenemos las redes sociales
		$this -> load -> view ('main/header', $query_header);
		$this -> load -> view ('bug/404');
		$this -> load -> view ('main/footer', $query_footer);
	}
}
