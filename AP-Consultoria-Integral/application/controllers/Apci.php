<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Apci extends CI_Controller {
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
				$active['nosotros'] = 'false';
				$this -> load -> view ('Header', $active);
				$this -> load -> view ('Home');
				$this -> load -> view ('Footer');
			}
			// el metodo si viene | mandamos página de error404
			else {
				$active['empresas'] = 'false';
				$active['nosotros'] = 'false';
				$this -> load -> view ('Header', $active);
				$this -> load -> view ('Error404');
				$this -> load -> view ('Footer');
			}
		}
		public function index_($metodo = NULL){
			$tbl_metodos_permitidos = "metodos_permitidos";
			// validamos que venga el metodo
			if (isset($metodo)) {
				// el metodo si viene | validamos que exista en la db
				$campo = "ruta";
				$valor = $metodo;
				$bandera = $this -> Model -> GetRowWhere($tbl_metodos_permitidos, $campo, $valor);
				// validamos si el metodo existe
				if ($bandera != "") {
					// si existe el metodo | validamos el metodo
					switch ($bandera -> ruta) {
						case 'nosotros':
							$active['empresas'] = 'false';
							$active['nosotros'] = 'true';
							$this -> load -> view ('Header', $active);
							$this -> load -> view ('Home');
							$this -> load -> view ('Footer');
						break;
						case 'empresas-apci':
							$active['empresas'] = 'true';
							$active['nosotros'] = 'false';
							$this -> load -> view ('Header', $active);
							$this -> load -> view ('Empresas');
							$this -> load -> view ('Footer');
						break;
						default:
							$active['empresas'] = 'false';
							$active['nosotros'] = 'true';
							$this -> load -> view ('Header', $active);
							$this -> load -> view ('Error404');
							$this -> load -> view ('Footer');
						break;
					}
				}
				// el metodo no existe en la db | mandamos a la página 404
				else {
					$active['empresas'] = 'false';
					$active['nosotros'] = 'false';
					$this -> load -> view ('Header', $active);
					$this -> load -> view ('Error404');
					$this -> load -> view ('Footer');
				}
			}
			// el metodo viene vacio | mandamos a la página principal
			else {
				$active['empresas'] = 'false';
				$active['nosotros'] = 'true';
				$this -> load -> view ('Header', $active);
				$this -> load -> view ('Home');
				$this -> load -> view ('Footer');
			}
		}
	}
