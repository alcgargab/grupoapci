<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Servicios extends CI_Controller {
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
	public function index($universal_method = NULL, $universal_url = NULL){
		// --------------- variables para tablas --------------- //
		$tbl_mp = "metodos_permitidos";
		$tbl_c = "categorias";
		$tbl_b = "banners";
		$tbl_h = "headers";
		$tbl_rs = "redes_sociales";
		$tbl_s = "servicios";
		$tbl_ss = "sub_servicios";
		$tbl_co = "correos";
		// --------------- variables para campos --------------- //
		// ----- tabla banner ----- //
		$fields_b_ruta = "ruta_b";
		// ----- tabla categorias ----- //
		$fields_c_servicio = "servicio_c";
		// ----- tabla metodos_permitidos ----- //
		$fields_mp_ruta = "ruta_mp";
		// ----- tabla servicios ----- //
		$fields_s_id = "id_s";
		$fields_s_ruta = "ruta_s";
		// ----- tabla sub servicios ----- //
		$fields_ss_servicio = "servicio_ss";
		// --------------- HEADER --------------- //
		$select = "item_h, ruta_h";
		$query_header['items'] = $this -> ma -> getAll($select, $tbl_h); // obtenemos las opciones del menú
		// --------------- FOOTER --------------- //
		$select = "red_social_rs, imagen_rs";
		$query_footer['tbl_rs'] = $this -> ma -> getAll($select, $tbl_rs); // obtenemos las redes sociales
		if (!empty($universal_method)) { // validamos que venga un metodo en la ruta
			$select = "ruta_mp";
			$query_controller['tbl_mp'] = $this -> ma -> getRowWhere1($select, $tbl_mp, $fields_mp_ruta, $universal_method);
			if (!empty($query_controller['tbl_mp'])) { // si viene metodo | validamos que exista en la bd
				$select = "imagen_b, texto_b";
				$query_controller['tbl_b'] = $this -> ma -> getRowWhere1($select, $tbl_b, $fields_b_ruta, $query_controller['tbl_mp'] -> ruta_mp); // obtenemos el banner
				switch ($query_controller['tbl_mp'] -> ruta_mp) { // si viene el metodo | validamos el metodo
					case 'servicios-caemi':
						$select = "id_s, servicio_s, imagen_s, ruta_s";
						$query_view_s['tbl_s'] = $this -> ma -> getAll($select, $tbl_s); // obtenemos todos los servicios
						$this -> load -> view('main/header', $query_header);
						$this -> load -> view('main/servicios', $query_view_s);
						$this -> load -> view('main/footer', $query_footer);
					break;
					case 'limpieza':
						$select = "id_s, token_s, banner_s";
						$query_view_c['tbl_s'] = $this -> ma -> getRowWhere1($select, $tbl_s, $fields_s_ruta, $query_controller['tbl_mp'] -> ruta_mp); // obtenemos todos los servicios
						$select = "categoria_c, icono_c, texto_c";
						$query_view_c['tbl_c'] = $this -> ma -> getAllWhere1($select, $tbl_c, $fields_c_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos las categorias
						$select = "class_css_ss, imagen_ss, sub_servicio_ss";
						$query_view_c['tbl_ss'] = $this -> ma -> getAllWhere1($select, $tbl_ss, $fields_ss_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos los subservicios
						$query_view_c['tbl_b'] = $query_controller['tbl_b']; // banner
						$this -> load -> view('main/header', $query_header);
						$this -> load -> view('servicios/categoria', $query_view_c);
						$this -> load -> view('main/footer', $query_footer);
					break;
					case 'hidroneumaticos':
						$select = "id_s, token_s, banner_s";
						$query_view_c['tbl_s'] = $this -> ma -> getRowWhere1($select, $tbl_s, $fields_s_ruta, $query_controller['tbl_mp'] -> ruta_mp); // obtenemos todos los servicios
						$select = "categoria_c, icono_c, texto_c";
						$query_view_c['tbl_c'] = $this -> ma -> getAllWhere1($select, $tbl_c, $fields_c_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos las categorias
						$select = "class_css_ss, imagen_ss, sub_servicio_ss";
						$query_view_c['tbl_ss'] = $this -> ma -> getAllWhere1($select, $tbl_ss, $fields_ss_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos los subservicios
						$query_view_c['tbl_b'] = $query_controller['tbl_b']; // banner
						$this -> load -> view('main/header', $query_header);
						$this -> load -> view('servicios/categoria', $query_view_c);
						$this -> load -> view('main/footer', $query_footer);
					break;
					case 'hidrosanitarios':
						$select = "id_s, token_s, banner_s";
						$query_view_c['tbl_s'] = $this -> ma -> getRowWhere1($select, $tbl_s, $fields_s_ruta, $query_controller['tbl_mp'] -> ruta_mp); // obtenemos todos los servicios
						$select = "categoria_c, icono_c, texto_c";
						$query_view_c['tbl_c'] = $this -> ma -> getAllWhere1($select, $tbl_c, $fields_c_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos las categorias
						$select = "class_css_ss, imagen_ss, sub_servicio_ss";
						$query_view_c['tbl_ss'] = $this -> ma -> getAllWhere1($select, $tbl_ss, $fields_ss_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos los subservicios
						$query_view_c['tbl_b'] = $query_controller['tbl_b']; // banner
						$this -> load -> view('main/header', $query_header);
						$this -> load -> view('servicios/categoria', $query_view_c);
						$this -> load -> view('main/footer', $query_footer);
					break;
					case 'mantenimiento-en-industrias-centros-comerciales-y-residencias':
						$select = "id_s, token_s, banner_s";
						$query_view_c['tbl_s'] = $this -> ma -> getRowWhere1($select, $tbl_s, $fields_s_ruta, $query_controller['tbl_mp'] -> ruta_mp); // obtenemos todos los servicios
						$select = "categoria_c, icono_c, texto_c";
						$query_view_c['tbl_c'] = $this -> ma -> getAllWhere1($select, $tbl_c, $fields_c_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos las categorias
						$select = "class_css_ss, imagen_ss, sub_servicio_ss";
						$query_view_c['tbl_ss'] = $this -> ma -> getAllWhere1($select, $tbl_ss, $fields_ss_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos los subservicios
						$query_view_c['tbl_b'] = $query_controller['tbl_b']; // banner
						$this -> load -> view('main/header', $query_header);
						$this -> load -> view('servicios/categoria', $query_view_c);
						$this -> load -> view('main/footer', $query_footer);
					break;
					case 'jardineria':
						$select = "id_s, token_s, banner_s";
						$query_view_c['tbl_s'] = $this -> ma -> getRowWhere1($select, $tbl_s, $fields_s_ruta, $query_controller['tbl_mp'] -> ruta_mp); // obtenemos todos los servicios
						$select = "categoria_c, icono_c, texto_c";
						$query_view_c['tbl_c'] = $this -> ma -> getAllWhere1($select, $tbl_c, $fields_c_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos las categorias
						$select = "class_css_ss, imagen_ss, sub_servicio_ss";
						$query_view_c['tbl_ss'] = $this -> ma -> getAllWhere1($select, $tbl_ss, $fields_ss_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos los subservicios
						$query_view_c['tbl_b'] = $query_controller['tbl_b']; // banner
						$this -> load -> view('main/header', $query_header);
						$this -> load -> view('servicios/categoria', $query_view_c);
						$this -> load -> view('main/footer', $query_footer);
					break;
					// case 'fertilizacion':
					// 	print_r("fertilizacion"); die();
					// break;
					case 'fumigacion':
						$select = "id_s, token_s, banner_s";
						$query_view_c['tbl_s'] = $this -> ma -> getRowWhere1($select, $tbl_s, $fields_s_ruta, $query_controller['tbl_mp'] -> ruta_mp); // obtenemos todos los servicios
						$select = "categoria_c, icono_c, texto_c";
						$query_view_c['tbl_c'] = $this -> ma -> getAllWhere1($select, $tbl_c, $fields_c_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos las categorias
						$select = "class_css_ss, imagen_ss, sub_servicio_ss";
						$query_view_c['tbl_ss'] = $this -> ma -> getAllWhere1($select, $tbl_ss, $fields_ss_servicio, $query_view_c['tbl_s'] -> id_s); // obtenemos los subservicios
						$query_view_c['tbl_b'] = $query_controller['tbl_b']; // banner
						$this -> load -> view('main/header', $query_header);
						$this -> load -> view('servicios/categoria', $query_view_c);
						$this -> load -> view('main/footer', $query_footer);
					break;
					default:
						$this -> load -> view('main/header', $query_header);
						$this -> load -> view('bug/404');
						$this -> load -> view('main/footer', $query_footer);
					break;
				}
			}
			else { // no viene la variable | redirigimos a la página de error 404
				$this -> load -> view('main/header', $query_header);
				$this -> load -> view('bug/404');
				$this -> load -> view('main/footer', $query_footer);
			}
		}
		else { // viene vacio el metodo | mandamos a la página principal
			$select = "id_s, servicio_s, imagen_s, ruta_s";
			$query_view_s['tbl_s'] = $this -> ma -> getAll($select, $tbl_s); // obtenemos todos los servicios
			$this -> load -> view('main/header', $query_header);
			$this -> load -> view('main/servicios', $query_view_s);
			$this -> load -> view('main/footer', $query_footer);
		}
	}
}
