<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contacto extends CI_Controller {
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
	public function index($universal_url = NULL){
		// --------------- variables para tablas --------------- //
		$tbl_b = "banners";
		$tbl_h = "headers";
		$tbl_rs = "redes_sociales";
		$tbl_s = "servicios";
		// --------------- variables para campos --------------- //
		// ----- tabla banner ----- //
		$fields_b_ruta = "ruta_b";
		// ----- tabla servicios ----- //
		$fields_s_token = "token_s";
		$fields_s_ruta = "ruta_s";
		// --------------- HEADER --------------- //
		$select = "item_h, ruta_h";
		$query_header['items'] = $this -> ma -> getAll($select, $tbl_h); // obtenemos las opciones del menú
		// --------------- FOOTER --------------- //
		$select = "red_social_rs, imagen_rs";
		$query_footer['tbl_rs'] = $this -> ma -> getAll($select, $tbl_rs); // obtenemos las redes sociales
		$select = "imagen_b, texto_b";
		$valor = "contacto";
		$query_controller['tbl_b'] = $this -> ma -> getRowWhere1($select, $tbl_b, $fields_b_ruta, $valor); // obtenemos el banner
		$query_view_c['site_key'] = '6Ler3LIUAAAAAJvEky3cboaMm4Xf79Io3yYXkVbO'; // key para el recaptcha
		// $query_view_c['site_key'] = '6Lfl3LIUAAAAAN1Et__2lkvJoLSWAWOrt87nIoeX'; // key para el recaptcha produccion
		$query_view_c['tbl_b'] = $query_controller['tbl_b']; // obtenemos el banner
		if (!empty($universal_url)) { // validamos que venga de un servicio
			$select = "texto_correo_s";
			$query_view_c['tbl_s'] = $this -> ma -> getRowWhere1($select, $tbl_s, $fields_s_token, $universal_url);
			if (!empty($query_view_c['tbl_s'])) { // si viene información | validamos que el servicio exista en la db
				$this -> load -> view('main/header', $query_header);
				$this -> load -> view('main/contacto', $query_view_c);
				$this -> load -> view('main/footer', $query_footer);
			}
			else { // el servicio no existe en la db | redirigimos a la página de error 404
				$this -> load -> view('main/header', $query_header);
				$this -> load -> view('bug/404');
				$this -> load -> view('main/footer', $query_footer);
			}
		}
		else { // el servicio viene vacio | mandamos página sin servicio
			$select = "imagen_b, texto_b";
			$valor = "contacto";
			$query_controller['tbl_b'] = $this -> ma -> getRowWhere1($select, $tbl_b, $fields_b_ruta, $valor); // obtenemos el banner
			$query_view_c['tbl_s'] = ""; // texto en asunto
			$this -> load -> view('main/header', $query_header);
			$this -> load -> view('main/contacto', $query_view_c);
			$this -> load -> view('main/footer', $query_footer);
		}
	}
}
