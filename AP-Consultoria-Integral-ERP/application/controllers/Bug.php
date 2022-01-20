<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Bug extends CI_Controller {
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
		public function index(){ }
		public function _404(){
			// --------------- variables para tablas --------------- //
			$tbl_e = "empleados";
			$tbl_pue = "puestos";
			$tbl_a = "areas";
			$tbl_em = "empresas";
			// ----- tabla areas ----- //
			$fields_a_id = "id_a";
			// ----- tabla empleados ----- //
			$fields_e_id = "id_e";
			// ----- tabla empresas ----- //
			$fields_em_id = "id_em";
			// ----- tabla puestos ----- //
			$fields_pue_id = "id_pue";
			// --------------- variables de sesion --------------- //
			$session_validate = $this -> session -> validate;
			$session_empleado = $this -> session -> empleado;
			$session_login = $this -> session -> login;
			$session_name = $this -> session -> name;
			$session_user = $this -> session -> user;
			$session_type = $this -> session -> type;
			// --------------- HEADER --------------- //
			$query_header['tbl_e'] = ""; // obtenemos el empleado
			// ------ VALORES PARA PONER COLOR Y QUE APAREZCA EL NOMBRE EN EL HEADER ------ //
			$query_header['tbl_pue'] = ""; // obtenemos el puesto del empleado
			$query_header['tbl_a'] = ""; // obtenemos el area del empleado
			$query_header['tbl_em'] = ""; // obtenemos la empresa del empleado
			$query_header['tbl_em_ruta'] = ""; // ruta para la foto del empleado
			if (!empty($session_validate)) { // validamos las variables de sesion
				// --------------- HEADER --------------- //
				$select = "id_e, foto_empleado_e, nombre_e, puesto_e";
				$query_header['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $session_empleado); // obtenemos el empleado
				// ------ VALORES PARA PONER COLOR Y QUE APAREZCA EL NOMBRE EN EL HEADER ------ //
				$select = "id_pue, area_pue";
				$query_header['tbl_pue'] = $this -> mm -> getRowWhere1($select, $tbl_pue, $fields_pue_id, $query_header['tbl_e'] -> puesto_e); // obtenemos el puesto del empleado
				$select = "empresa_a";
				$query_header['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $query_header['tbl_pue'] -> area_pue); // obtenemos el area del empleado
				$select = "id_em, ruta_em, icono_em";
				$query_header['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $query_header['tbl_a'] -> empresa_a); // obtenemos la empresa del empleado
				$query_header['tbl_em_ruta'] = $query_header['tbl_em'] -> ruta_em; // ruta para la foto del empleado
				if ($session_validate == "true") { // si viene la sesión | validamos que sea igual a true
					$this -> load -> view('main/Header', $query_header); // la sesion es correcta | redirigimos a la página de error 404
					$this -> load -> view('bug/404');
					$this -> load -> view('main/Footer');
				}
				else { // la sesión no es igual a true | redirigimos a la página de error 404
					$this -> load -> view('main/Header', $query_header);
					$this -> load -> view('bug/404');
					$this -> load -> view('main/Footer');
				}
			}
			else { // no viene la sesión | redirigimos a la página de error 404
				$this -> load -> view('main/Header', $query_header);
				$this -> load -> view('bug/404');
				$this -> load -> view('main/Footer');
			}
		}
	}
