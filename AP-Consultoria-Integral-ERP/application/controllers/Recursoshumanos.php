<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Recursoshumanos extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this -> load -> library('Pdf_generator', TRUE);
			$this -> load -> library('Convert_number_to_letter', TRUE);
			$this -> load -> library('Date', TRUE);
			$this -> load -> library('Random_code_generator', TRUE);
			$this -> load -> library('Excel_generator', TRUE);
		}
		public function _remap($method, $params = array()) {
			if (!method_exists($this, $method)) {
				$this -> index($method, $params);
			}
			else {
				return call_user_func_array(array($this,$method), $params);
			}
		}

		public function index($universal_company = NULL, $universal_url = NULL){
			// --------------- variables para tablas --------------- //
			$tbl_aa = "actas_administrativas";
			$tbl_a = "areas";
			$tbl_c = "carteras";
			$tbl_e = "empleados";
			$tbl_em = "empresas";
			$tbl_en = "entrevistas";
			$tbl_ev = "evaluaciones";
			$tbl_ex = "expedientes";
			$tbl_g = "generos";
			$tbl_mp = "metodos_permitidos";
			$tbl_mu = "movimientos_usuarios";
			$tbl_ps = "pases_salidas";
			$tbl_p = "permisos";
			$tbl_pu = "permisos_urgentes";
			$tbl_pr = "prospectos";
			$tbl_pue = "puestos";
			$tbl_st = "status_turnos";
			$tbl_u = "usuarios";
			$tbl_v = "vacaciones";
			$tbl_va = "vacantes";
			$tbl_vi = "visitas";
			// $tbl_e_eliminados = "empleados_eliminados";
			// --------------- variables para campos --------------- //
			// ----- tabla actas administratias ----- //
			$fields_aa_encrypt = "encrypt_folio_aa";
			// ----- tabla areas ----- //
			$fields_a_id = "id_a";
			$fields_a_empresa = "empresa_a";
			// ----- tabla carteras ----- //
			$fields_c_encrypt = "encrypt_codigo_c";
			$fields_c_vacante = "vacante_c";
			$fields_c_status = "status_c";
			// ----- tabla empleados ----- //
			$fields_e_id = "id_e";
			$fields_e_status = "status_e";
			$fields_e_numero = "numero_empleado_e";
			$fields_e_encrypt = "encrypt_numero_empleado_e";
			$fields_e_sexo = "sexo_e";
			$fields_e_rfc = "rfc_e";
			$fields_e_curp = "curp_e";
			$fields_e_imss = "imss_e";
			$fields_e_puesto = "puesto_e";
			$fields_e_turno = "turno_e";
			$fields_e_antiguedad = "antiguedad_e";
			// ----- tabla empresas ----- //
			$fields_em_id = "id_em";
			$fields_em_ruta = "ruta_em";
			// ----- tabla entrevistas ----- //
			$fields_en_fecha = "fecha_en";
			$fields_en_prospecto = "prospecto_en";
			// ----- tabla evaluaciones ----- //
			$fields_ev_encrypt = "encrypt_codigo_ev";
			$fields_ev_empleado = "empleado_ev";
			$fields_ev_mes = "mes_ev";
			// ----- tabla expedientes ----- //
			$fields_ex_empleado = "empleado_ex";
			// ----- tabla generos ----- //
			$fields_g_id = "id_g";
			// ----- tabla metodos_permitidos ----- //
			$fields_mp_ruta = "ruta_mp";
			$fields_mp_usuario = "usuario_mp";
			// ----- tabla pases de salida ----- //
			$fields_ps_empleado = "empleado_ps";
			$fields_ps_start = "start_ps";
			// ----- tabla permisos ----- //
			$fields_p_empleado = "empleado_p";
			$fields_p_fecha = "fecha_permiso_p";
			$fields_p_autorizado = "autorizado_p";
			// ----- tabla permisos urgentes ----- //
			$fields_pu_empleado = "empleado_pu";
			$fields_pu_fecha = "fecha_pu";
			$fields_pu_autorizado = "autorizado_pu";
			// ----- tabla prospectos ----- //
			$fields_pr_id = "id_pr";
			$fields_pr_vacante = "vacante_pr";
			$fields_pr_encrypt = "encrypt_codigo_pr";
			// ----- tabla puestos ----- //
			$fields_pue_id = "id_pue";
			$fields_pue_area = "area_pue";
			// ----- tabla usuarios ----- //
			$fields_u_id = "id_u";
			// ----- tabla status turnos ----- //
			$fields_st_id = "id_st";
			// ----- tabla vacaciones ----- //
			$fields_v_empleado = "empleado_v";
			$fields_v_encrypt = "encrypt_codigo_v";
			// ----- tabla vacantes ----- //
			$fields_va_id = "id_va";
			$fields_va_encrypt = "encrypt_codigo_va";
			$fields_va_puesto = "puesto_va";
			$fields_va_autorizado = "autorizado_va";
			$fields_va_status  = "status_va";
			// ----- tabla visitas ----- //
			$fields_vi_departamento = "departamento_vi";
			$fields_vi_fecha = "fecha_vi";
			// --------------- variables de sesion --------------- //
			$session_validate = $this -> session -> validate;
			$session_empleado = $this -> session -> empleado;
			$session_login = $this -> session -> login;
			$session_user = $this -> session -> user;
			$session_type = $this -> session -> type;
			// variable con el numero 1
			$num_val1 = 1;
			// variable con el numero 2
			$num_val2 = 2;
			// variable con el numero 3
			$num_val3 = 3;
			// --------------- HEADER --------------- //
			// obtenemos el empleado
			$select = "id_e, foto_empleado_e, nombre_e, puesto_e";
			$query_header['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $session_empleado);
			// ------ VALORES PARA PONER COLOR Y QUE APAREZCA EL NOMBRE EN EL HEADER ------ //
			$select = "id_pue, area_pue"; // obtenemos el puesto del empleado
			$query_header['tbl_pue'] = $this -> mm -> getRowWhere1($select, $tbl_pue, $fields_pue_id, $query_header['tbl_e'] -> puesto_e);
			$select = "empresa_a"; // obtenemos el area del empleado
			$query_header['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $query_header['tbl_pue'] -> area_pue);
			$select = "id_em, ruta_em, icono_em"; // obtenemos la empresa del empleado
			$query_header['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $query_header['tbl_a'] -> empresa_a);
			$query_header['tbl_em_ruta'] = $query_header['tbl_em'] -> ruta_em; // ruta para la foto del empleado
			// --------------- MENU --------------- //
			if ($session_user == "VBrheo" || $session_user == "VJrheo") { // si el usuario es de tultitlan | buscar la empresa de caemi
				$select = "empresa_em, ruta_em, icono_em"; // obtenemos las empresas para los menus
				$query_menu['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $num_val2);
			}
			else { // el usuario es otro | buscamos todas las empresas
				$select = "empresa_em, ruta_em, icono_em"; // obtenemos las empresas para los menus
				$query_menu['tbl_em'] = $this -> mm -> getAll($select, $tbl_em);
			}
			$select = "empleado_u"; // obtenemos el usuario
			$query_menu['tbl_u'] = $this -> mm -> getRowWhere1($select, $tbl_u, $fields_u_id, $session_login);
			$query_menu['tbl_em_ruta'] = $query_header['tbl_em_ruta']; // obtenemos la ruta de la empresa
			// --------------- HOME --------------- //
			$query_home['tbl_em'] = $query_menu['tbl_em'];
			if (!empty($session_validate)){ // validamos las variables de sesion
				if ($session_validate == "true") { // si viene la variable de sesion | validamos que sea iguala a ok
					if (!empty($universal_company)) { // validamos que exista la empresa
						$select = "id_em, ruta_em";
						$query_controller['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_ruta, $universal_company);
						if (!empty($query_controller['tbl_em'])) { // la empresa si viene | validamos que exista en la db
							if ($session_user == "SGrheo" || $session_user == "DTrheo" || $session_user == "ESrheo" || $session_user == "TTrheo" || $session_user == "VBrheo" || $session_user == "VJrheo" || $session_user == "EMapci") { // la empresa si existe | validamos que el usuario sea de rrhh
								if (!empty($universal_url[0])) { // el usuario es de RRHH | validamos que no venga información en la url
									$select = "ruta_mp";
									$query_controller['tbl_mp'] = $this -> mm -> getRowWhere2Like($select, $tbl_mp, $fields_mp_ruta, $universal_url[0], $fields_mp_usuario, $session_type);
									if (!empty($query_controller['tbl_mp'])) { // si viene información en la url | validamos que el metodo exista y que el usuario sea el correcto
										$select = "id_g, genero_g"; // obtenemos todas los generos
										$universal_tbl_g = $this -> mm -> getAll($select, $tbl_g);
										$select = "id_st, turno_st"; // obtenemos todas los turnos
										$universal_tbl_st = $this -> mm -> getAll($select, $tbl_st);
										$select ="id_em, ruta_em, abreviatura_em"; // obtenemos todas la empresa
										$universal_tbl_em = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_ruta, $universal_company);
										$select ="id_a, area_a"; // obtenemos todas las areas
										$universal_tbl_a = $this -> mm -> getAllWhere1($select, $tbl_a, $fields_a_empresa, $universal_tbl_em -> id_em);
										$select ="id_pue, puesto_pue, area_pue"; // obtenemos todas los puestos
										$universal_tbl_pue = $this -> mm -> getAllWhere1For($select, $tbl_pue, $fields_pue_area, $universal_tbl_a, $fields_a_id);
										$select ="id_e, foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, fecha_proximo_contrato_e, contrato_e"; // obtenemos todos los empleados activos
										$universal_tbl_e = $this -> mm -> getAllWhere2For($select, $tbl_e, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id, $fields_e_status, $num_val1);
										if (!empty($universal_tbl_e)) { // validamos que existan empleados
											arsort($universal_tbl_e);
											$universal_tbl_e_total = count($universal_tbl_e);
										}
										else { // no existen empleados | mandamos la variable total en 0
											$universal_tbl_e_total = 0;
										}
										switch ($query_controller['tbl_mp'] -> ruta_mp) {
											// --------------- ver empleados --------------- //
											case 'view-employee':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$query_view_loe['tbl_e'] = $universal_tbl_e;
													$query_view_loe['total_tbl_e'] = $universal_tbl_e_total;
													$query_view_loe['tbl_em'] = $universal_tbl_em;
													$query_view_loe['tbl_a'] = $universal_tbl_a;
													$query_view_loe['tbl_pue'] = $universal_tbl_pue;
													$query_view_loe['tbl_st'] = $universal_tbl_st;
													$query_view_loe['tbl_g'] = $universal_tbl_g;
													$insert_tbl_mu['movimiento_mu'] = 48; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('human_resources/employees/list_of_employees', $query_view_loe);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- generar reporte de empleados --------------- //
											case 'generate-reports-of-active-employees':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "numero_empleado_e, nombre_e, apellido_paterno_e, apellido_materno_e, sexo_e, fecha_ingreso_e, fecha_nacimiento_e, edad_e, rfc_e, curp_e, imss_e,
													puesto_e, numero_cuenta_e, salario_mensual_bruto_e, salario_mensual_neto_e, otros_ingresos_e, salario_diario_e, salario_base_cotizacion_e, calle_e,
													numero_exterior_e, numero_interior_e, colonia_e, municipio_e, cp_e, numero_casa_e, email_e";
													$universal_tbl_e = $this -> mm -> getAllWhere2For($select, $tbl_e, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id, $fields_e_status, $num_val1);
													$insert_tbl_mu['movimiento_mu'] = 49; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													$library_aer['tbl_e'] = $universal_tbl_e;
													$library_aer['total_tbl_e'] = $universal_tbl_e_total;
													$library_aer['tbl_em'] = $universal_tbl_em;
													$library_aer['tbl_a'] = $universal_tbl_a;
													$library_aer['tbl_pue'] = $universal_tbl_pue;
													$library_aer['tbl_g'] = $universal_tbl_g;
													$library_aer['tbl_st'] = $universal_tbl_st;
											    $excel = $this -> excel_generator -> active_employee_report($library_aer);
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- agregar empleado --------------- //
											case 'add-employee':
											  if (empty($universal_url[1])) { // validamos si viene información en la url
											    $insert_tbl_e['status_e'] = 1;
											    $insert_tbl_e['apellido_paterno_e'] = trim(mb_strtoupper($this -> input -> post('apellido_paterno'), 'UTF-8'));
													if (!empty($insert_tbl_e['apellido_paterno_e'])) { // validamos que venga información del fomrulario
												    $insert_tbl_e['apellido_materno_e'] = trim(mb_strtoupper($this -> input -> post('apellido_materno'), 'UTF-8'));
												    $insert_tbl_e['nombre_e'] = trim(mb_strtoupper($this -> input -> post('nombre'), 'UTF-8'));
												    $insert_tbl_e['numero_casa_e'] = trim($this -> input -> post('numero_casa'));
												    $insert_tbl_e['numero_celular_e'] = trim($this -> input -> post('numero_celular'));
												    $insert_tbl_e['email_e'] = trim(mb_strtoupper($this -> input -> post('email'), 'UTF-8'));
												    $insert_tbl_e['sexo_e'] = trim($this -> input -> post('sexo'));
												    $insert_tbl_e['fecha_nacimiento_e'] = trim($this -> input -> post('fecha_nacimiento'));
														$controller_fecha = date('Y'); // obtenemos la edad del empleado
														$controller_fecha_nacimiento = $insert_tbl_e['fecha_nacimiento_e'][0].$insert_tbl_e['fecha_nacimiento_e'][1].$insert_tbl_e['fecha_nacimiento_e'][2].$insert_tbl_e['fecha_nacimiento_e'][3];
														$insert_tbl_e['edad_e'] = trim($controller_fecha - $controller_fecha_nacimiento);
												    $insert_tbl_e['rfc_e'] = trim(mb_strtoupper($this -> input -> post('rfc'), 'UTF-8'));
												    $insert_tbl_e['curp_e'] = trim(mb_strtoupper($this -> input -> post('curp'), 'UTF-8'));
												    $insert_tbl_e['imss_e'] = trim($this -> input -> post('imss'));
												    $insert_tbl_e['calle_e'] = trim(mb_strtoupper($this -> input -> post('calle'), 'UTF-8'));
												    $insert_tbl_e['numero_exterior_e'] = trim(mb_strtoupper($this -> input -> post('numero_exterior'), 'UTF-8'));
												    $insert_tbl_e['numero_interior_e'] = trim(mb_strtoupper($this -> input -> post('numero_interior'), 'UTF-8'));
												    $insert_tbl_e['colonia_e'] = trim(mb_strtoupper($this -> input -> post('colonia'), 'UTF-8'));
												    $insert_tbl_e['municipio_e'] = trim(mb_strtoupper($this -> input -> post('municipio'), 'UTF-8'));
												    $insert_tbl_e['cp_e'] = trim($this -> input -> post('cp'));
												    $insert_tbl_e['puesto_e'] = trim($this -> input -> post('puesto'));
												    $insert_tbl_e['lugar_trabajo_e'] = trim(mb_strtoupper($this -> input -> post('lugar_trabajo'), 'UTF-8'));
												    $insert_tbl_e['fecha_ingreso_e'] = trim($this -> input -> post('fecha_ingreso'));
												    $insert_tbl_e['fecha_proximo_contrato_e'] = trim($this -> input -> post('fecha_proximo_contrato'));
												    $insert_tbl_e['contrato_e'] = 1;
												    $insert_tbl_e['turno_e'] = trim($this -> input -> post('turno'));
												    $insert_tbl_e['numero_cuenta_e'] = 0;
												    $insert_tbl_e['salario_mensual_bruto_e'] = trim($this -> input -> post('salario_mensual_bruto'));
												    $insert_tbl_e['salario_mensual_neto_e'] = "";
												    $insert_tbl_e['otros_ingresos_e'] = "";
												    $insert_tbl_e['salario_diario_e'] = "";
												    $insert_tbl_e['salario_base_cotizacion_e'] = "";
												    $insert_tbl_e['fecha_baja_e'] = "";
												    $insert_tbl_e['antiguedad_e'] = 0;
												    $insert_tbl_e['motivo_baja_e'] = "";
														if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $insert_tbl_e['apellido_paterno_e']) &&
												        preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $insert_tbl_e['apellido_materno_e']) &&
												        preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $insert_tbl_e['nombre_e']) &&
												        preg_match('/^[0-9]+$/', $insert_tbl_e['numero_casa_e']) &&
												        preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $insert_tbl_e['email_e']) &&
												        preg_match('/^[0-9]+$/', $insert_tbl_e['sexo_e']) &&
												        preg_match('/^[0-9]+$/', $insert_tbl_e['edad_e']) &&
												        preg_match('/^[a-zA-Z0-9]+$/', $insert_tbl_e['rfc_e']) &&
												        preg_match('/^[a-zA-Z0-9]+$/', $insert_tbl_e['curp_e']) &&
												        preg_match('/^[0-9]+$/', $insert_tbl_e['imss_e']) &&
												        preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['calle_e']) &&
												        preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['numero_exterior_e']) &&
												        preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['numero_interior_e']) &&
												        preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['colonia_e']) &&
												        preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['municipio_e']) &&
												        preg_match('/^[0-9]+$/', $insert_tbl_e['cp_e']) &&
												        preg_match('/^[0-9]+$/', $insert_tbl_e['puesto_e']) &&
												        preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['lugar_trabajo_e']) &&
												        preg_match('/^[0-9]+$/', $insert_tbl_e['turno_e']) &&
												        preg_match('/^[0-9]+$/', $insert_tbl_e['salario_mensual_bruto_e'])) { // validamos que el formato de los valores sea el correcto
															$select ="numero_empleado_e"; // obtenemos todos los empleados
															$universal_tbl_e = $this -> mm -> getAllWhere1For($select, $tbl_e, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id);
												      // validamos que existan empeados en la empresa
												      if (!empty($universal_tbl_e)) {
												        asort($universal_tbl_e); // si existen empleados |  obtenemos el array ordenado de el primero al ultimo
												        $controller_tbl_e_asc = end($universal_tbl_e); // obetenemos el ultimo registro del array
												        $controller_tbl_e_explode = explode("-", $controller_tbl_e_asc -> numero_empleado_e); // separamos por un "-" el número de empleado
												        $controller_tbl_e_numero = $controller_tbl_e_explode[1] + 1; // le sumamos 1 al número de empleado
												        if (strlen($controller_tbl_e_numero) == 4) { // validamos la cantidad de caracteres para crear el número de empleado
												          $controller_tbl_e_numero = $controller_tbl_e_numero;
												        }
												        elseif (strlen($controller_tbl_e_numero) == 3) {
												          $controller_tbl_e_numero = "0".$controller_tbl_e_numero;
												        }
												        elseif (strlen($controller_tbl_e_numero) == 2) {
												          $controller_tbl_e_numero = "00".$controller_tbl_e_numero;
												        }
												        elseif (strlen($controller_tbl_e_numero) == 1) {
												          $controller_tbl_e_numero = "000".$controller_tbl_e_numero;
												        }
												        else {
												          $controller_tbl_e_numero = $controller_tbl_e_numero;
												        }
												        $insert_tbl_e['numero_empleado_e'] = $controller_tbl_e_explode[0]."-".$controller_tbl_e_numero;
												      }
												      else { // no existen empleados | agregamos el primero empleado
												        $insert_tbl_e['numero_empleado_e'] = $universal_tbl_em -> abreviatura_em."-0001";
												      }
															$insert_tbl_e['encrypt_numero_empleado_e'] = trim(hash('whirlpool', $insert_tbl_e['numero_empleado_e']));
												      $controller_file = 'images/Empleado/'.$universal_company; // obtenemos datos | Foto de emplpeado
												      $numero_empleado_e = trim($insert_tbl_e['numero_empleado_e']);
												      $controller_nombre_empleado = str_replace(' ', '', $insert_tbl_e['nombre_e']);
												      if (!file_exists($controller_file)) { // validamos si existe la carpeta creada
												          mkdir($controller_file, 0777, true);
												      }
												      $controller_folder = opendir($controller_file); //Abrimos el directorio de destino
												      if (!empty($_FILES['foto']['name'])) { // validamos si existe un campo type file en el formulario
												        move_uploaded_file($_FILES['foto']['tmp_name'],"images/Empleado/$universal_company/$numero_empleado_e-Foto-$controller_nombre_empleado".".webp");
												        $universal_url_img_Foto = "$numero_empleado_e-Foto-$controller_nombre_empleado".".webp";
												      }
												      closedir($controller_folder); //Cerramos el directorio de destino
												      $insert_tbl_e['foto_empleado_e'] = $universal_url_img_Foto;
												      $insert_tbl_e['nuevo_e'] = 2;
															$select = "encrypt_numero_empleado_e";
															$query_controller_tbl_e['folio'] = $this -> mm -> getAllWhere4($select, $tbl_e, $fields_e_encrypt, $insert_tbl_e['encrypt_numero_empleado_e'], $fields_e_rfc, $insert_tbl_e['rfc_e'], $fields_e_curp, $insert_tbl_e['curp_e'], $fields_e_imss,	$insert_tbl_e['imss_e']);
															if (empty($query_controller_tbl_e['folio'])) { // validamos si existe un código igual o el RFC, CURP o IMSS en la db
													      $result_insert_tbl_e = $this -> mm -> insert($tbl_e, $insert_tbl_e);
													      $insert_tbl_mu['movimiento_mu'] = 1; // insertamos el movimiento realizado
													      $insert_tbl_mu['usuario_mu'] = $session_login;
													      $insert_tbl_mu['receptor_mu'] = $insert_tbl_e['numero_empleado_e'];
																$insert_tbl_mu['hora_mu'] = date('H:i:s');
																$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													      $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													      if ($result_insert_tbl_e == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
													        $query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
													        $query_view_popup['text'] = "¡El empleado se agregó correctamente!";
													        $query_view_popup['type'] = "success";
													        $query_view_popup['ruta'] = "ruta";
													        // --------------- VISTAS --------------- //
													        $this -> load -> view('main/Header', $query_header);
													        $this -> load -> view('menu/human_resources', $query_menu);
													        $this -> load -> view('popup/popup_time', $query_view_popup);
													        $this -> load -> view('main/Footer');
													      }
													      else { // hubo un error en los querys | mandamos alerta de error
													        $query_view_popup['title'] = "¡ERROR!";
													        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													        $query_view_popup['type'] = "error";
													        $query_view_popup['ruta'] = "ruta";
													        // --------------- VISTAS --------------- //
													        $this -> load -> view('main/Header', $query_header);
													        $this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
													        $this -> load -> view('popup/popup_time', $query_view_popup);
													        $this -> load -> view('main/Footer');
													      }
															}
															else { // si existe el código | mandamos alerta de error
															  $query_view_popup['title'] = "¡ERROR!";
															  $query_view_popup['text'] = "El empleado ya se encuentra registrado.";
															  $query_view_popup['type'] = "error";
															  $query_view_popup['ruta'] = "ruta";
															  // --------------- VISTAS --------------- //
															  $this -> load -> view('main/Header', $query_header);
															  $this -> load -> view('menu/human_resources', $query_menu);
																$this -> load -> view('bug/404');
															  $this -> load -> view('popup/popup_time', $query_view_popup);
															  $this -> load -> view('main/Footer');
															}
												    }
												    else { // formato no valido | mandamos alerta de error
												      $query_view_popup['title'] = "¡ERROR!";
												      $query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
												      $query_view_popup['type'] = "error";
												      $query_view_popup['ruta'] = "ruta";
												      // --------------- VISTAS --------------- //
												      $this -> load -> view('main/Header', $query_header);
												      $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
												      $this -> load -> view('popup/popup_time', $query_view_popup);
												      $this -> load -> view('main/Footer');
												    }
													}
													else { // no viene información | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
													}
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver perfil del empleado --------------- //
											case 'view-an-employee-s-profile':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos que el número de empleado venga con información
														$select = "foto_empleado_e, numero_empleado_e, nombre_e, apellido_paterno_e, apellido_materno_e, sexo_e, fecha_ingreso_e, fecha_nacimiento_e, edad_e, rfc_e, curp_e, imss_e,
														puesto_e, numero_cuenta_e, salario_mensual_bruto_e, salario_mensual_neto_e, otros_ingresos_e, salario_diario_e, salario_base_cotizacion_e, calle_e,
														numero_exterior_e, numero_interior_e, colonia_e, municipio_e, cp_e, numero_casa_e, email_e, numero_celular_e, fecha_baja_e, motivo_baja_e, lugar_trabajo_e, antiguedad_e,
														fecha_proximo_contrato_e, genero_g, puesto_pue, area_pue, turno_st";
											      $query_view_ec['tbl_e'] = $this -> mm -> getAllInner4Where1($select, $tbl_e, $tbl_g, $fields_e_sexo, $fields_g_id, $tbl_pue, $fields_e_puesto, $fields_pue_id, $tbl_st, $fields_e_turno, $fields_st_id, $fields_e_encrypt, $universal_url[1]);
											      if (!empty($query_view_ec['tbl_e'])) { // el numero de empleado viene con información | validamos que el número de empleado exista en la DB
											        $select = "area_a, empresa_a"; // buscamos el área del empleado
											        $query_view_ec['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $query_view_ec['tbl_e'] -> area_pue);
															$select = "empresa_em, ruta_em"; // buscamos la empresa del empleado
											        $query_view_ec['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $query_view_ec['tbl_a'] -> empresa_a);
											        $controller_antiguedad = $this -> date -> get_seniority($query_view_ec['tbl_e'] -> fecha_ingreso_e); // obtenemos la antiguedad del empleado
											        $result_update_tbl_e = $this -> mm -> updateOneWhere1($tbl_e, $fields_e_antiguedad, $controller_antiguedad, $fields_e_numero, $query_view_ec['tbl_e'] -> numero_empleado_e); // actualizamos la antiguedad
															$insert_tbl_mu['movimiento_mu'] = 50; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = $query_view_ec['tbl_e'] -> numero_empleado_e;
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
											        $this -> load -> view('human_resources/employees/view/employee_card', $query_view_ec);
											        $this -> load -> view('main/Footer');
											      }
														else { // el empleado no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // el numero de empleado viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- vista para editar un empleado --------------- //
											case 'edit-employee-profile':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { //validamos que el número de empleado venga con información
														$select = "foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, nombre_e, apellido_paterno_e, apellido_materno_e, sexo_e, fecha_ingreso_e, fecha_nacimiento_e, edad_e, rfc_e, curp_e, imss_e,
														puesto_e, numero_cuenta_e, salario_mensual_bruto_e, salario_mensual_neto_e, otros_ingresos_e, salario_diario_e, salario_base_cotizacion_e, calle_e,
														numero_exterior_e, numero_interior_e, colonia_e, municipio_e, cp_e, numero_casa_e, email_e, numero_celular_e, fecha_baja_e, motivo_baja_e, lugar_trabajo_e, antiguedad_e,
														fecha_proximo_contrato_e, genero_g, puesto_pue, area_pue, id_st, turno_st";
											      $query_view_ec['tbl_e'] = $this -> mm -> getAllInner4Where1($select, $tbl_e, $tbl_g, $fields_e_sexo, $fields_g_id, $tbl_pue, $fields_e_puesto, $fields_pue_id, $tbl_st, $fields_e_turno, $fields_st_id, $fields_e_encrypt, $universal_url[1]);
											      if (!empty($query_view_ec['tbl_e'])) { // el numero de empleado viene con información | validamos que el número de empleado exista en la DB
											        $select = "area_a, empresa_a"; // buscamos el área del empleado
											        $query_view_ec['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $query_view_ec['tbl_e'] -> area_pue);
															$select = "empresa_em, ruta_em"; // buscamos la empresa del empleado
											        $query_view_ec['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $query_view_ec['tbl_a'] -> empresa_a);
															$select = "id_st, turno_st"; // buscamos todos los turnos
															$query_view_ec['tbl_st'] = $this -> mm -> getAll($select, $tbl_st);
															$insert_tbl_mu['movimiento_mu'] = 51; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = $query_view_ec['tbl_e'] -> numero_empleado_e;
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
											        $this -> load -> view('human_resources/employees/edit/employee_card', $query_view_ec);
											        $this -> load -> view('main/Footer');
											      }
											      else { // el empleado no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // el numero de empleado viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- editar información personal del empleado --------------- //
											case 'edit-personal-information-of-an-employee':
										    if (empty($universal_url[2])) { // validamos si viene información en la url
										      if(!empty($universal_url[1])){ // validamos que venga el empleado
										        $select = "status_e, numero_empleado_e"; // el numero de empleado viene con información | buscamos al empleado
										        $controller_empleado = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
										        if (!empty($controller_empleado)) { // el empleado si existe en la DB | validamo que venga el apellido del empleado
										          $controller_apellido = trim($this -> input -> post('apellido_paterno'));
															if (!empty($controller_apellido)) { // viene apellido | obtenemos datos
										            $insert_tbl_e['apellido_paterno_e'] = trim(mb_strtoupper($this -> input -> post('apellido_paterno'), 'UTF-8'));
										            $insert_tbl_e['apellido_materno_e'] = trim(mb_strtoupper($this -> input -> post('apellido_materno'), 'UTF-8'));
										            $insert_tbl_e['nombre_e'] = trim(mb_strtoupper($this -> input -> post('nombre'), 'UTF-8'));
										            $insert_tbl_e['numero_casa_e'] = trim($this -> input -> post('numero_casa'));
										            $insert_tbl_e['numero_celular_e'] = trim($this -> input -> post('numero_celular'));
										            $insert_tbl_e['email_e'] = trim(mb_strtoupper($this -> input -> post('email'), 'UTF-8'));
										            $insert_tbl_e['fecha_nacimiento_e'] = trim($this -> input -> post('fecha_nacimiento'));
																$controller_fecha = date('Y'); // obtenemos la edad del empleado
																$controller_fecha_nacimiento = $insert_tbl_e['fecha_nacimiento_e'][0].$insert_tbl_e['fecha_nacimiento_e'][1].$insert_tbl_e['fecha_nacimiento_e'][2].$insert_tbl_e['fecha_nacimiento_e'][3];
																$insert_tbl_e['edad_e'] = trim($controller_fecha - $controller_fecha_nacimiento);
										            $insert_tbl_e['rfc_e'] = trim(mb_strtoupper($this -> input -> post('rfc'), 'UTF-8'));
										            $insert_tbl_e['curp_e'] = trim(mb_strtoupper($this -> input -> post('curp'), 'UTF-8'));
										            $insert_tbl_e['imss_e'] = trim(mb_strtoupper($this -> input -> post('imss'), 'UTF-8'));
										            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $insert_tbl_e['apellido_paterno_e']) &&
										                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $insert_tbl_e['apellido_materno_e']) &&
										                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $insert_tbl_e['nombre_e']) &&
										                preg_match('/^[0-9 ]+$/', $insert_tbl_e['numero_casa_e']) &&
										                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $insert_tbl_e['email_e']) &&
										                preg_match('/^[0-9]+$/', $insert_tbl_e['edad_e']) &&
										                preg_match('/^[a-zA-Z0-9]+$/', $insert_tbl_e['rfc_e']) &&
										                preg_match('/^[a-zA-Z0-9]+$/', $insert_tbl_e['curp_e']) &&
										                preg_match('/^[a-zA-Z0-9]+$/', $insert_tbl_e['imss_e'])) { // validamos que el formato de los valores sea el correcto
										              $result_update_tbl_e = $this -> mm -> updateWhere1($tbl_e, $fields_e_encrypt, $universal_url[1], $insert_tbl_e); // formato valido | editamos los nuevos valores
										              $insert_tbl_mu['movimiento_mu'] = 2; // insertamos el movimiento realizado
										              $insert_tbl_mu['usuario_mu'] = $session_login;
										              $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
																	$insert_tbl_mu['hora_mu'] = date('H:i:s');
																	$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
										              $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
										              if ($result_update_tbl_e == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
										                $query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
										                $query_view_popup['text'] = "¡El registro se actualizó correctamente!";
										                $query_view_popup['type'] = "success";
										                $query_view_popup['ruta'] = "ruta";
										                // --------------- VISTAS --------------- //
										                $this -> load -> view('main/Header', $query_header);
										                $this -> load -> view('menu/human_resources', $query_menu);
										                $this -> load -> view('popup/popup_time', $query_view_popup);
										                $this -> load -> view('main/Footer');
										              }
										              else { // hubo un error en los querys | mandamos alerta de error
										                $query_view_popup['title'] = "¡ERROR!";
										                $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
										                $query_view_popup['type'] = "error";
										                $query_view_popup['ruta'] = "ruta";
										                // --------------- VISTAS --------------- //
										                $this -> load -> view('main/Header', $query_header);
										                $this -> load -> view('menu/human_resources', $query_menu);
																		$this -> load -> view('bug/404');
										                $this -> load -> view('popup/popup_time', $query_view_popup);
										                $this -> load -> view('main/Footer');
										              }
										            }
										            else { // formato no valido | mandamos alerta de error
										              $query_view_popup['title'] = "¡ERROR!";
										              $query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
										              $query_view_popup['type'] = "error";
										              $query_view_popup['ruta'] = "ruta";
										              // --------------- VISTAS --------------- //
										              $this -> load -> view('main/Header', $query_header);
										              $this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
										              $this -> load -> view('popup/popup_time', $query_view_popup);
										              $this -> load -> view('main/Footer');
										            }
										          }
															else { // no viene apellido | redirigimos a la página de error 404
																$this -> load -> view('main/Header', $query_header);
														    $this -> load -> view('menu/human_resources', $query_menu);
														    $this -> load -> view('bug/404');
														    $this -> load -> view('main/Footer');
										          }
										        }
										        else { // el empleado no existe | mandamos alerta de error
										          $query_view_popup['title'] = "¡ERROR!";
										          $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
										          $query_view_popup['type'] = "error";
										          $query_view_popup['ruta'] = "ruta";
										          // --------------- VISTAS --------------- //
										          $this -> load -> view('main/Header', $query_header);
										          $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
										          $this -> load -> view('popup/popup_time', $query_view_popup);
										          $this -> load -> view('main/Footer');
										        }
										      }
													else { // el empleado no viene | redirigimos a la página de error 404l
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/human_resources', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
										      }
										    }
										    else { // viene variable | redirigimos a la página de error 404
										      $this -> load -> view('main/Header', $query_header);
										      $this -> load -> view('menu/human_resources', $query_menu);
										      $this -> load -> view('bug/404');
										      $this -> load -> view('main/Footer');
										    }
											break;
											// --------------- editar información del domicilio del empleado --------------- //
											case 'edit-address-information-of-an-employee':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if(!empty($universal_url[1])){ // validamos que venga el empleado
														$select = "status_e, numero_empleado_e";
														$controller_empleado = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
														if (!empty($controller_empleado)) { // el numero de empleado viene con información | validamos que exista el empleado en la db
															$insert_tbl_e['calle_e'] = trim(mb_strtoupper($this -> input -> post('calle'), 'UTF-8'));
											        if (!empty($insert_tbl_e['calle_e'])) { // el empleado si existe en la DB | validamo que venga la calle del empleado
											          $insert_tbl_e['numero_exterior_e'] = trim(mb_strtoupper($this -> input -> post('numero_exterior'), 'UTF-8'));
											          $insert_tbl_e['numero_interior_e'] = trim(mb_strtoupper($this -> input -> post('numero_interior'), 'UTF-8'));
											          $insert_tbl_e['colonia_e'] = trim(mb_strtoupper($this -> input -> post('colonia'), 'UTF-8'));
											          $insert_tbl_e['municipio_e'] = trim(mb_strtoupper($this -> input -> post('municipio'), 'UTF-8'));
											          $insert_tbl_e['cp_e'] = trim(mb_strtoupper($this -> input -> post('cp'), 'UTF-8'));
											          if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['calle_e']) &&
											              preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['numero_exterior_e']) &&
											              preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['numero_interior_e']) &&
											              preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['colonia_e']) &&
											              preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_e['municipio_e']) &&
											              preg_match('/^[0-9]+$/', $insert_tbl_e['cp_e'])){ // validamos que el formato de los valores sea el correcto
											            $result_update_tbl_e = $this -> mm -> updateWhere1($tbl_e, $fields_e_numero, $controller_empleado -> numero_empleado_e, $insert_tbl_e); // formato valido | editamos los nuevos valores
											            $insert_tbl_mu['movimiento_mu'] = 3; // insertamos el movimiento realizado
											            $insert_tbl_mu['usuario_mu'] = $session_login;
											            $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
																	$insert_tbl_mu['hora_mu'] = date('H:i:s');
																	$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
											            $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											            if ($result_update_tbl_e == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
											              $query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
											              $query_view_popup['text'] = "¡El registro se actualizó correctamente!";
											              $query_view_popup['type'] = "success";
											              $query_view_popup['ruta'] = "ruta";
											              // --------------- VISTAS --------------- //
											              $this -> load -> view('main/Header', $query_header);
											              $this -> load -> view('menu/human_resources', $query_menu);
											              $this -> load -> view('popup/popup_time', $query_view_popup);
											              $this -> load -> view('main/Footer');
											            }
											            else { // hubo un error en los querys | mandamos alerta de error
											              $query_view_popup['title'] = "¡ERROR!";
											              $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											              $query_view_popup['type'] = "error";
											              $query_view_popup['ruta'] = "ruta";
											              // --------------- VISTAS --------------- //
											              $this -> load -> view('main/Header', $query_header);
											              $this -> load -> view('menu/human_resources', $query_menu);
																		$this -> load -> view('bug/404');
											              $this -> load -> view('popup/popup_time', $query_view_popup);
											              $this -> load -> view('main/Footer');
											            }
											          }
											          else { // formato no valido | mandamos alerta de error
											            $query_view_popup['title'] = "¡ERROR!";
											            $query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
											            $query_view_popup['type'] = "error";
											            $query_view_popup['ruta'] = "ruta";
											            // --------------- VISTAS --------------- //
											            $this -> load -> view('main/Header', $query_header);
											            $this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
											            $this -> load -> view('popup/popup_time', $query_view_popup);
											            $this -> load -> view('main/Footer');
											          }
											        }
															else { // no viene apellido | redirigimos a la página de error 404
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/human_resources', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('main/Footer');
											        }
											      }
											      else { // el empleado no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // el empleado no viene | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/human_resources', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- editar información de la empresa del empleado --------------- //
											case 'edit-job-information-of-an-employee':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if(!empty($universal_url[1])){ // validamos que venga el empleado
														$select = "status_e, numero_empleado_e";
														$controller_empleado = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
											      if (!empty($controller_empleado)) { // el numero de empleado viene con información | validamos que exista en la db
											        $insert_tbl_e['lugar_trabajo_e'] = trim(mb_strtoupper($this -> input -> post('lugar_trabajo'), 'UTF-8'));
															$insert_tbl_e['numero_cuenta_e'] = trim($this -> input -> post('numero_cuenta'));
															$insert_tbl_e['salario_mensual_neto_e'] = trim($this -> input -> post('salario_mensual_neto'));
											        $insert_tbl_e['fecha_proximo_contrato_e'] = trim($this -> input -> post('fecha_proximo_contrato'));
											        $insert_tbl_e['turno_e'] = trim($this -> input -> post('turno'));
											        $insert_tbl_e['fecha_baja_e'] = trim($this -> input -> post('fecha_baja'));
											        $insert_tbl_e['motivo_baja_e'] = trim(mb_strtoupper($this -> input -> post('motivo_baja'), 'UTF-8'));
											        if (!empty($insert_tbl_e['motivo_baja_e'])) { // validamos que el motivo de baja viene vacio
											          if (!empty($insert_tbl_e['fecha_baja_e'])) { // validamos que la fecha venga con información
											            if (preg_match('/^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\s_ ]+$/', $insert_tbl_e['motivo_baja_e']) &&
											                preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,. ]+$/', $insert_tbl_e['lugar_trabajo_e'])) { // validamos que el formato de los valores sea el correcto
											              // formato valido | editamos los nuevos valores
											              $insert_tbl_e['status_e'] = 2;
											              $result_update_tbl_e = $this -> mm -> updateWhere1($tbl_e, $fields_e_numero, $controller_empleado -> numero_empleado_e, $insert_tbl_e);
											              $insert_tbl_mu['movimiento_mu'] = 52; // insertamos el movimiento realizado
											              $insert_tbl_mu['usuario_mu'] = $session_login;
											              $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
																		$insert_tbl_mu['hora_mu'] = date('H:i:s');
																		$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
											              $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											              if ($result_update_tbl_e == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
											                $query_view_popup['title'] = "¡LISTO!"; // los cuerys se ejecutaron | mandamos alerta de success
											                $query_view_popup['text'] = "¡El registro se actualizó correctamente!";
											                $query_view_popup['type'] = "success";
											                $query_view_popup['ruta'] = "ruta";
											                // --------------- VISTAS --------------- //
											                $this -> load -> view('main/Header', $query_header);
											                $this -> load -> view('menu/human_resources', $query_menu);
											                $this -> load -> view('popup/popup_time', $query_view_popup);
											                $this -> load -> view('main/Footer');
											              }
											              else { // hubo un error en los querys | mandamos alerta de error
											                $query_view_popup['title'] = "¡ERROR!";
											                $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											                $query_view_popup['type'] = "error";
											                $query_view_popup['ruta'] = "ruta";
											                // --------------- VISTAS --------------- //
											                $this -> load -> view('main/Header', $query_header);
											                $this -> load -> view('menu/human_resources', $query_menu);
																			$this -> load -> view('bug/404');
											                $this -> load -> view('popup/popup_time', $query_view_popup);
											                $this -> load -> view('main/Footer');
											              }
											            }
											            else { // formato no valido | mandamos alerta de error
											              $query_view_popup['title'] = "¡ERROR!";
											              $query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
											              $query_view_popup['type'] = "error";
											              $query_view_popup['ruta'] = "ruta";
											              // --------------- VISTAS --------------- //
											              $this -> load -> view('main/Header', $query_header);
											              $this -> load -> view('menu/human_resources', $query_menu);
																		$this -> load -> view('bug/404');
											              $this -> load -> view('popup/popup_time', $query_view_popup);
											              $this -> load -> view('main/Footer');
											            }
											          }
											          else { // no viene información | mandamos alerta de error
											            $query_view_popup['title'] = "¡ERROR!";
											            $query_view_popup['text'] = "Lo sentimos para dar de baja a un empleado debes de ingresar la fecha y el motivo.";
											            $query_view_popup['type'] = "error";
											            $query_view_popup['ruta'] = "ruta";
											            // --------------- VISTAS --------------- //
											            $this -> load -> view('main/Header', $query_header);
											            $this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
											            $this -> load -> view('popup/popup_time', $query_view_popup);
											            $this -> load -> view('main/Footer');
											          }
											        }
											        else { // viene vacio | validamos que la fecha de baja viene vacia
											          if (!empty($insert_tbl_e['fecha_baja_e'])) { // validamos que venga la fecha de baja
											            $query_view_popup['title'] = "¡ERROR!";
											            $query_view_popup['text'] = "Lo sentimos para dar de baja a un empleado debes de ingresar la fecha y el motivo.";
											            $query_view_popup['type'] = "error";
											            $query_view_popup['ruta'] = "ruta";
											            // --------------- VISTAS --------------- //
											            $this -> load -> view('main/Header', $query_header);
											            $this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
											            $this -> load -> view('popup/popup_time', $query_view_popup);
											            $this -> load -> view('main/Footer');
											          }
											          else { // la fecha no viene | modificamos la información
											            if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,. ]+$/', $insert_tbl_e['lugar_trabajo_e']) && preg_match('/^[0-9]+$/', $insert_tbl_e['numero_cuenta_e']) && preg_match('/^[0-9]+$/', $insert_tbl_e['salario_mensual_neto_e'])) { // validamos que el formato de los valores sea el correcto
											              $result_update_tbl_e = $this -> mm -> updateWhere1($tbl_e, $fields_e_numero, $controller_empleado -> numero_empleado_e, $insert_tbl_e); // formato valido | editamos los nuevos valores
											              $insert_tbl_mu['movimiento_mu'] = 4; // insertamos el movimiento realizado
											              $insert_tbl_mu['usuario_mu'] = $session_login;
											              $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
																		$insert_tbl_mu['hora_mu'] = date('H:i:s');
																		$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
											              $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											              if ($result_update_tbl_e == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
											                $query_view_popup['title'] = "¡LISTO!"; // los cuerys se ejecutaron | mandamos alerta de success
											                $query_view_popup['text'] = "¡El registro se actualizó correctamente!";
											                $query_view_popup['type'] = "success";
											                $query_view_popup['ruta'] = "ruta";
											                // --------------- VISTAS --------------- //
											                $this -> load -> view('main/Header', $query_header);
											                $this -> load -> view('menu/human_resources', $query_menu);
											                $this -> load -> view('popup/popup_time', $query_view_popup);
											                $this -> load -> view('main/Footer');
											              }
											              else { // hubo un error en los querys | mandamos alerta de error
											                $query_view_popup['title'] = "¡ERROR!";
											                $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											                $query_view_popup['type'] = "error";
											                $query_view_popup['ruta'] = "ruta";
											                // --------------- VISTAS --------------- //
											                $this -> load -> view('main/Header', $query_header);
											                $this -> load -> view('menu/human_resources', $query_menu);
																			$this -> load -> view('bug/404');
											                $this -> load -> view('popup/popup_time', $query_view_popup);
											                $this -> load -> view('main/Footer');
											              }
											            }
											            else { // formato no valido | mandamos alerta de error
											              $query_view_popup['title'] = "¡ERROR!";
											              $query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
											              $query_view_popup['type'] = "error";
											              $query_view_popup['ruta'] = "ruta";
											              // --------------- VISTAS --------------- //
											              $this -> load -> view('main/Header', $query_header);
											              $this -> load -> view('menu/human_resources', $query_menu);
																		$this -> load -> view('bug/404');
											              $this -> load -> view('popup/popup_time', $query_view_popup);
											              $this -> load -> view('main/Footer');
											            }
											          }
											        }
											      }
											      else { // el empleado no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
											    else { // el empleado no viene | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver empleados --------------- //
											case 'list-administrative-act':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$query_view_loaa['tbl_e'] = $universal_tbl_e;
													$query_view_loaa['total_tbl_e'] = $universal_tbl_e_total;
													$query_view_loaa['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 104; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('human_resources/administrative_act/list_of_administrative_act', $query_view_loaa);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- generar acta administrativa --------------- //
											case 'generate-administrative-act':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos que el número de empleado venga con información
														$select = "encrypt_numero_empleado_e, numero_empleado_e, nombre_e, apellido_paterno_e, apellido_materno_e";
														$query_view_gaa['tbl_e'] = $this -> mm -> getAllInner4Where1($select, $tbl_e, $tbl_g, $fields_e_sexo, $fields_g_id, $tbl_pue, $fields_e_puesto, $fields_pue_id, $tbl_st, $fields_e_turno, $fields_st_id, $fields_e_encrypt, $universal_url[1]);
														if (!empty($query_view_gaa['tbl_e'])) { // el numero de empleado viene con información | validamos que el número de empleado exista en la DB
															$query_view_gaa['tbl_em'] = $query_controller['tbl_em'];
															$insert_tbl_mu['movimiento_mu'] = 103; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = $query_view_gaa['tbl_e'] -> numero_empleado_e;
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('human_resources/administrative_act/generate_administrative_act', $query_view_gaa);
															$this -> load -> view('main/Footer');
														}
														else { // el empleado no existe | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // el numero de empleado viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/human_resources', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- generar documento acta administrativa --------------- //
											case 'generate-administrative-act-document':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos si viene información en la url
														$select = "id_e, numero_empleado_e, nombre_e, apellido_paterno_e, apellido_materno_e, puesto_pue, area_pue";
											      $library_administrative_act_generator['tbl_e'] = $this -> mm -> getAllInner4Where1($select, $tbl_e, $tbl_g, $fields_e_sexo, $fields_g_id, $tbl_pue, $fields_e_puesto, $fields_pue_id, $tbl_st, $fields_e_turno, $fields_st_id, $fields_e_encrypt, $universal_url[1]);
											      if (!empty($library_administrative_act_generator['tbl_e'])) { // el numero de empleado viene con información | validamos que el número de empleado exista en la DB
															$library_administrative_act_generator['motivo_RRHH'] = trim(mb_strtoupper($this -> input -> post('motivo_aa_rrhh'), 'UTF-8'));
															if (!empty($library_administrative_act_generator['motivo_RRHH'])) { // validamos que venga información del formulario
																$library_administrative_act_generator['fecha_actual'] = $this -> date -> get_date(); // obtenemos la fecha actual
																$library_administrative_act_generator['hora_actual'] = date('H:i'); // obtenemos la hora actual
												        $select = "area_a, empresa_a"; // buscamos el área del empleado
												        $library_administrative_act_generator['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $library_administrative_act_generator['tbl_e'] -> area_pue);
																$select = "empresa_em, ruta_em, jefe_inmediato_em"; // buscamos la empresa del empleado
												        $library_administrative_act_generator['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $library_administrative_act_generator['tbl_a'] -> empresa_a);
																$library_administrative_act_generator['user'] = $this -> session -> user; // mandamos el usuario para el responsable de rrhh
																$library_code = 7;
																$result_library_code_aa = trim($this -> random_code_generator -> index($library_code));
																$insert_tbl_aa['folio_aa'] = preg_replace('[\s+]',"", "ap-aa-".$library_administrative_act_generator['tbl_e'] -> numero_empleado_e."-".$result_library_code_aa);
																$insert_tbl_aa['encrypt_folio_aa'] = hash('whirlpool', $insert_tbl_aa['folio_aa']);
																$select = "fregistro_aa";
																$query_controller_tbl_aa['folio_aa'] = $this -> mm -> getAllWhere1($select, $tbl_aa, $fields_aa_encrypt, $insert_tbl_aa['encrypt_folio_aa']);
																if (empty($query_controller_tbl_aa['folio_aa'])) { // buscamos si existe un código igual en la db
																	$insert_tbl_aa['empleado_aa'] = $library_administrative_act_generator['tbl_e'] -> id_e;
																	$insert_tbl_aa['fecha_creacion_aa'] = date('Y-m-d');
																	$insert_tbl_aa['hora_creacion'] = date('H:i:s');
																	$insert_tbl_aa['creador_aa'] = $session_empleado;
																	$insert_tbl_aa['motivo_rrhh_aa'] = $library_administrative_act_generator['motivo_RRHH'];
																	$insert_tbl_aa['nuevo_aa'] = 2;
																	$result_insert_tbl_aa = $this -> mm -> insert($tbl_aa, $insert_tbl_aa);
																	$insert_tbl_mu['movimiento_mu'] = 105; // insertamos el movimiento realizado
																	$insert_tbl_mu['usuario_mu'] = $session_login;
																	$insert_tbl_mu['receptor_mu'] = $library_administrative_act_generator['tbl_e'] -> numero_empleado_e;
																	$insert_tbl_mu['hora_mu'] = date('H:i:s');
																	$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																	$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																	if ($result_insert_tbl_aa == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																		$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																		$query_view_popup['text'] = "¡Se generó exitosamento el acta administrativa!";
																		$query_view_popup['type'] = "success";
																		$query_view_popup['ruta'] = "ruta";
																		// --------------- VISTAS --------------- //
											 							$this -> load -> view('main/Header', $query_header);
											 							$this -> load -> view('menu/human_resources', $query_menu);
											 							$this -> load -> view('popup/popup_time', $query_view_popup);
											 							$this -> load -> view('main/Footer');
																		$GenerarContrato = $this -> pdf_generator -> generate_administrative_act($library_administrative_act_generator); // generamos el contrato del empleado
											 						}
																	else { // hubo un error en los querys | mandamos alerta de error
																	  $query_view_popup['title'] = "¡ERROR!";
																	  $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																	  $query_view_popup['type'] = "error";
																	  $query_view_popup['ruta'] = "ruta";
																	  // --------------- VISTAS --------------- //
																	  $this -> load -> view('main/Header', $query_header);
																	  $this -> load -> view('menu/human_resources', $query_menu);
																	  $this -> load -> view('popup/popup', $query_view_popup);
																	  $this -> load -> view('main/Footer');
																	}
																}
																else { // si existe el código | mandamos alerta de error
																	$query_view_popup['title'] = "¡ERROR!";
																	$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // no viene información
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/human_resources', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('main/Footer');
															}
											      }
											      else { // el empleado no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/human_resources', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver personal con baja --------------- //
											case 'unsubscribe':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select ="id_e, foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, fecha_baja_e, motivo_baja_e";
													$universal_tbl_e = $this -> mm -> getAllWhere2For($select, $tbl_e, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id, $fields_e_status, $num_val2); // obtenemos todos los empleados de baja
													if (!empty($universal_tbl_e)) { // validamos si existen empleados con baja
														arsort($universal_tbl_e);
														$universal_tbl_e_total = count($universal_tbl_e);
													}
													else { // no existen empleados con baja | ponemos la variable de total en 0
														$universal_tbl_e_total = 0;
													}
													$query_view_eu['tbl_e'] = $universal_tbl_e;
													$query_view_eu['total_tbl_e'] = $universal_tbl_e_total;
													$query_view_eu['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 53; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/unsubscribe/employees_unsubscribe', $query_view_eu);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- generar reporte de baja --------------- //
											case 'generate-report-of-unemployed':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "numero_empleado_e, nombre_e, apellido_paterno_e, apellido_materno_e, sexo_e, fecha_ingreso_e, fecha_nacimiento_e, edad_e, rfc_e, curp_e, imss_e, puesto_e, numero_cuenta_e, salario_mensual_bruto_e, salario_mensual_neto_e, otros_ingresos_e, salario_diario_e, salario_base_cotizacion_e, calle_e, numero_exterior_e, numero_interior_e, colonia_e, municipio_e, cp_e, numero_casa_e, email_e";
													$universal_tbl_e = $this -> mm -> getAllWhere2For($select, $tbl_e, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id, $fields_e_status, $num_val2);
													$insert_tbl_mu['movimiento_mu'] = 49; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													$library_uer['tbl_e'] = $universal_tbl_e;
													$library_uer['total_tbl_e'] = $universal_tbl_e_total;
													$library_uer['tbl_em'] = $universal_tbl_em;
													$library_uer['tbl_a'] = $universal_tbl_a;
													$library_uer['tbl_pue'] = $universal_tbl_pue;
													$library_uer['tbl_g'] = $universal_tbl_g;
													$library_uer['tbl_st'] = $universal_tbl_st;
													$excel = $this -> excel_generator -> unsubscribe_employee_report($library_uer);
												}
											  else { // viene variable | redirigimos a la página principal
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver las vacantes de las empresas --------------- //
											case 'view-job-vacancies':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (empty($universal_url[1])) { // validamos si viene información en la url
														$select = "puesto_pue, id_va,encrypt_codigo_va, lugar_trabajo_va, empleados_va, sueldo_va, actividades_va, requisitos_va, fecha_limite_va, fecha_cubierta_va, fecha_solicitud_va, status_va";
														$query_view_vl['tbl_va'] = $this -> mm -> getAllInner2Where2For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_va_autorizado, $num_val1);
														if (!empty($query_view_vl['tbl_va'])) { // validamos que existan vacantes | para contabilizarlas
															$query_view_vl['total_tbl_va'] = count($query_view_vl['tbl_va']);
														}
														else { // no existen vacantes | mandamos el valor total en 0
															$query_view_vl['total_tbl_va'] = 0;
														}
														$query_view_vl['tbl_em'] = $universal_tbl_em;
														$insert_tbl_mu['movimiento_mu'] = 54; // insertamos el movimiento realizado
														$insert_tbl_mu['usuario_mu'] = $session_login;
														$insert_tbl_mu['receptor_mu'] = "";
														$insert_tbl_mu['hora_mu'] = date('H:i:s');
														$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
														$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
												    // --------------- VISTAS --------------- //
												    $this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('human_resources/vacancies/vacancy_list', $query_view_vl);
												    $this -> load -> view('main/Footer');
													}
													else { // viene variable | redirigimos a la página de error 404
												    $this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
												  }
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las vacantes contratadas --------------- //
											case 'view-hired-vacancies':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (empty($universal_url[1])) { // validamos si viene información en la url
														$select = "puesto_pue, id_va, encrypt_codigo_va, lugar_trabajo_va, empleados_va, sueldo_va, actividades_va, requisitos_va, fecha_limite_va, fecha_cubierta_va, fecha_solicitud_va, status_va";
														$query_view_vl['tbl_va'] = $this -> mm -> getAllInner2Where3For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_va_autorizado, $num_val1, $fields_va_status, $num_val3);
														if (!empty($query_view_vl['tbl_va'])) { // validamos que existan vacantes | para contabilizarlas
															$universal_tbl_e_total = count($query_view_vl['tbl_va']);
														}
														else { // no existen vacantes | mandamos el valor total en 0
															$universal_tbl_e_total = 0;
														}
														$query_view_vl['total_tbl_va'] = $universal_tbl_e_total;
														$query_view_vl['tbl_em'] = $universal_tbl_em;
														$insert_tbl_mu['movimiento_mu'] = 55; // insertamos el movimiento realizado
														$insert_tbl_mu['usuario_mu'] = $session_login;
														$insert_tbl_mu['receptor_mu'] = "";
														$insert_tbl_mu['hora_mu'] = date('H:i:s');
														$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
														$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
												    // --------------- VISTAS --------------- //
												    $this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('human_resources/vacancies/vacancy_list', $query_view_vl);
												    $this -> load -> view('main/Footer');
											  	}
												  else { // viene variable | redirigimos a la página principal
												    $this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
												  }
											  }
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las vacantes con candidatos --------------- //
											case 'view-vacancies-with-candidate':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (empty($universal_url[1])) { // validamos si viene información en la url
														$select = "puesto_pue, id_va, encrypt_codigo_va, lugar_trabajo_va, empleados_va, sueldo_va, actividades_va, requisitos_va, fecha_limite_va, fecha_cubierta_va, fecha_solicitud_va, status_va";
														$query_view_vl['tbl_va'] = $this -> mm -> getAllInner2Where3For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_va_autorizado, $num_val1, $fields_va_status, $num_val2);
														if (!empty($query_view_vl['tbl_va'])) { // validamos que existan vacantes | para contabilizarlas
															$universal_tbl_e_total = count($query_view_vl['tbl_va']);
														}
														else { // no existen vacantes | mandamos el valor total en 0
															$universal_tbl_e_total = 0;
														}
														$query_view_vl['total_tbl_va'] = $universal_tbl_e_total;
														$query_view_vl['tbl_em'] = $universal_tbl_em;
														$insert_tbl_mu['movimiento_mu'] = 56; // insertamos el movimiento realizado
														$insert_tbl_mu['usuario_mu'] = $session_login;
														$insert_tbl_mu['receptor_mu'] = "";
														$insert_tbl_mu['hora_mu'] = date('H:i:s');
														$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
														$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/human_resources', $query_menu);
														$this -> load -> view('human_resources/vacancies/vacancy_list', $query_view_vl);
														$this -> load -> view('main/Footer');
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/human_resources', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las vacantes sin candidatos --------------- //
											case 'view-vacancies-without-a-candidate':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (empty($universal_url[1])) { // validamos si viene información en la url
														$select = "puesto_pue, id_va, encrypt_codigo_va, lugar_trabajo_va, empleados_va, sueldo_va, actividades_va, requisitos_va, fecha_limite_va, fecha_cubierta_va, fecha_solicitud_va, status_va";
														$query_view_vl['tbl_va'] = $this -> mm -> getAllInner2Where3For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_va_autorizado, $num_val1, $fields_va_status, $num_val1);
														if (!empty($query_view_vl['tbl_va'])) { // validamos que existan vacantes | para contabilizarlas
															$universal_tbl_e_total = count($query_view_vl['tbl_va']);
														}
														else { // no existen vacantes | mandamos el valor total en 0
															$universal_tbl_e_total = 0;
														}
														$query_view_vl['total_tbl_va'] = $universal_tbl_e_total;
														$query_view_vl['tbl_em'] = $universal_tbl_em;
														$insert_tbl_mu['movimiento_mu'] = 57; // insertamos el movimiento realizado
														$insert_tbl_mu['usuario_mu'] = $session_login;
														$insert_tbl_mu['receptor_mu'] = "";
														$insert_tbl_mu['hora_mu'] = date('H:i:s');
														$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
														$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/human_resources', $query_menu);
														$this -> load -> view('human_resources/vacancies/vacancy_list', $query_view_vl);
														$this -> load -> view('main/Footer');
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/human_resources', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- asignar candidato --------------- //
											case 'assignment-candidate':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // validamos que venga la vacante
											      $select = "id_va, codigo_va, encrypt_codigo_va";
											      $query_view_vl['tbl_va'] = $this -> mm -> getRowWhere1($select, $tbl_va, $fields_va_encrypt, $universal_url[1]);
														if (!empty($query_view_vl['tbl_va'])) { // la vacante si viene | validamos que exista la vacante
															$select = "codigo_pr, vacante_pr";
											        $query_view_vl['tbl_pr'] = $this -> mm -> getAllWhere1($select, $tbl_pr, $fields_pr_vacante, $query_view_vl['tbl_va'] -> id_va); // obtenemos los prospectos actuales que tiene la vacante
															if (!empty($query_view_vl['tbl_pr'])) {  // validamos que existan prospectos | para contabilizarlas
																$query_view_vl['tbl_pr'] = $query_view_vl['tbl_pr'];
																$query_view_vl['total_tbl_pr'] = count($query_view_vl['tbl_pr']);
											        }
															else { // no existen prospectos | mandamos el valor total en 0
																$query_view_vl['tbl_pr'] = "null";
																$query_view_vl['total_tbl_pr'] = 0;
											        }
															$query_view_vl['tbl_em'] = $universal_tbl_em; // mandamos la ruta para que aparezca la foto del empleado
															$insert_tbl_mu['movimiento_mu'] = 58; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
											        $this -> load -> view('human_resources/vacancies/assign_candidate', $query_view_vl);
											        $this -> load -> view('main/Footer');
											      }
											      else {// no existe la vacante en la db | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // la vacante no viene | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- agregar candidato --------------- //
											case 'add-candidate':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // validamos que venga la vacante
											      $select = "id_va, encrypt_codigo_va";
											      $controller_tbl_va = $this -> mm -> getRowWhere1($select, $tbl_va, $fields_va_encrypt, $universal_url[1]);
														if (!empty($controller_tbl_va)) { // la vacante si viene | validamos que exista la vacante
															$library_code = 14;
															$result_library_code_pr = trim($this -> random_code_generator -> index($library_code));
															$insert_tbl_pr['codigo_pr'] = preg_replace('[\s+]',"", "ap-pr-".$result_library_code_pr);
															$insert_tbl_pr['encrypt_codigo_pr'] = hash('whirlpool', $insert_tbl_pr['codigo_pr']);
											        $insert_tbl_pr['vacante_pr'] = $controller_tbl_va -> id_va;
											        $insert_tbl_pr['apellido_paterno_pr'] = trim(mb_strtoupper($this -> input -> post('apellido_paterno'), 'UTF-8'));
											        $insert_tbl_pr['apellido_materno_pr'] = trim(mb_strtoupper($this -> input -> post('apellido_materno'), 'UTF-8'));
											        $insert_tbl_pr['nombre_pr'] = trim(mb_strtoupper($this -> input -> post('nombre'), 'UTF-8'));
											        $insert_tbl_pr['telefono_pr'] = trim(mb_strtoupper($this -> input -> post('telefono'), 'UTF-8'));
											        $insert_tbl_pr['email_pr'] = trim(mb_strtoupper($this -> input -> post('email'), 'UTF-8'));
											        $controller_cv = $_FILES['cv']['name'];
											        if (!empty($controller_cv)) {
											          $controller_folder = 'dcs/curriculum-vitae/'.$universal_company; // cv del prospecto
											          $controller_apellido_paterno = $insert_tbl_pr['apellido_paterno_pr'];
											          $controller_nombre_prospecto = $insert_tbl_pr['nombre_pr'];
											          if (!file_exists($controller_folder)) { // validamos si existe la carpeta
											            mkdir($controller_folder, 0777, true);
											          }
											          $controller_file = opendir($controller_folder); //Abrimos el directorio de destino
											          if (!empty($_FILES['cv']['name'])) {
											            move_uploaded_file($_FILES['cv']['tmp_name'],"dcs/curriculum-vitae/$universal_company/CV-$controller_nombre_prospecto-$controller_apellido_paterno".".pdf");
											            $universal_url_cv = "CV-$controller_nombre_prospecto-$controller_apellido_paterno".".pdf";
											          }
											          closedir($controller_file); //Cerramos el directorio de destino
											          $insert_tbl_pr['cv_pr'] = $universal_url_cv;
											        }
											        else {
											          $insert_tbl_pr['cv_pr'] = "";
											        }
											        $insert_tbl_pr['prospecto_pr'] = 1;
											        $query_form_prospecto_tbl_pr = trim($this -> input -> post('ap-prospecto'));
															if (!empty($query_form_prospecto_tbl_pr)) { // validamos que venga información del formulario para actualizar prospecto
																$select = "fregistro_pr";
																$controller_candidate = $this -> mm -> getRowWhere1($select, $tbl_pr, $fields_pr_encrypt, $query_form_prospecto_tbl_pr);
																if (!empty($controller_candidate)) { // si viene información | validamos que el prospecto exista
											            $result_update_tbl_va = $this -> mm -> updateWhere1($tbl_pr, $fields_pr_encrypt, $query_form_prospecto_tbl_pr, $insert_tbl_pr); // prospecto
											            $insert_tbl_c['vacante_c'] = $insert_tbl_pr['vacante_pr']; // cartera
											            $insert_tbl_c['apellido_paterno_c'] = $insert_tbl_pr['apellido_paterno_pr'];
											            $insert_tbl_c['apellido_materno_c'] = $insert_tbl_pr['apellido_materno_pr'];
											            $insert_tbl_c['nombre_c'] = $insert_tbl_pr['nombre_pr'];
											            $insert_tbl_c['telefono_c'] = $insert_tbl_pr['telefono_pr'];
											            $insert_tbl_c['email_c'] = $insert_tbl_pr['email_pr'];
											            $insert_tbl_c['cv_c'] = $insert_tbl_pr['cv_pr'];
											            $insert_tbl_c['status_c'] = 2;
											            $result_insert_tbl_c = $this -> mm -> insert($tbl_c, $insert_tbl_c);
																	$insert_tbl_mu['movimiento_mu'] = 29; // insertamos el movimiento realizado
																	$insert_tbl_mu['usuario_mu'] = $session_login;
																	$insert_tbl_mu['receptor_mu'] = "";
																	$insert_tbl_mu['hora_mu'] = date('H:i:s');
																	$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																	$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											            if ($result_update_tbl_va == "true" && $result_insert_tbl_c == "true" && $result_insert_tbl_mu == "true") {  // validamos si se ejecutaron los querys
											              $query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
											              $query_view_popup['text'] = "¡El prospecto se actualizó correctamente!";
											              $query_view_popup['type'] = "success";
											              $query_view_popup['ruta'] = "ruta";
											              // --------------- VISTAS --------------- //
											              $this -> load -> view('main/Header', $query_header);
											              $this -> load -> view('menu/human_resources', $query_menu);
											              $this -> load -> view('popup/popup_time', $query_view_popup);
											              $this -> load -> view('main/Footer');
											            }
											            else { // hubo un error en los querys | mandamos alerta de error
											              $query_view_popup['title'] = "¡ERROR!";
											              $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											              $query_view_popup['type'] = "error";
											              $query_view_popup['ruta'] = "ruta";
											              // --------------- VISTAS --------------- //
											              $this -> load -> view('main/Header', $query_header);
											              $this -> load -> view('menu/human_resources', $query_menu);
																		$this -> load -> view('bug/404');
											              $this -> load -> view('popup/popup_time', $query_view_popup);
											              $this -> load -> view('main/Footer');
											            }
																}
																else { // el candidato no existe | mandamos alerta de error
																	$query_view_popup['title'] = "¡ERROR!";
																	$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
											        }
															else { // la información no viene | insertamos el prospecto
																$result_insert_tbl_pr = $this -> mm -> insert($tbl_pr, $insert_tbl_pr); // prospecto
																$library_code = 15;
																$result_library_code_c = trim($this -> random_code_generator -> index($library_code));
																$insert_tbl_c['codigo_c'] = preg_replace('[\s+]',"", "ap-c-".$result_library_code_c);
																$insert_tbl_c['encrypt_codigo_c'] = hash('whirlpool', $insert_tbl_c['codigo_c']);
																$insert_tbl_c['vacante_c'] = $insert_tbl_pr['vacante_pr'];
																$insert_tbl_c['apellido_paterno_c'] = $insert_tbl_pr['apellido_paterno_pr'];
																$insert_tbl_c['apellido_materno_c'] = $insert_tbl_pr['apellido_materno_pr'];
																$insert_tbl_c['nombre_c'] = $insert_tbl_pr['nombre_pr'];
																$insert_tbl_c['telefono_c'] = $insert_tbl_pr['telefono_pr'];
																$insert_tbl_c['email_c'] = $insert_tbl_pr['email_pr'];
																$insert_tbl_c['cv_c'] = $insert_tbl_pr['cv_pr'];
																$insert_tbl_c['status_c'] = 2;
																$result_insert_tbl_c = $this -> mm -> insert($tbl_c, $insert_tbl_c); // cartera
																$result_update_tbl_va = $this -> mm -> updateOneWhere1($tbl_va, $fields_va_status, $num_val2, $fields_va_id, $insert_tbl_pr['vacante_pr']); // actualizamos el status de la vacante
																$insert_tbl_mu['movimiento_mu'] = 30; // insertamos el movimiento realizado
																$insert_tbl_mu['usuario_mu'] = $session_login;
																$insert_tbl_mu['receptor_mu'] = "";
																$insert_tbl_mu['hora_mu'] = date('H:i:s');
																$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																if ($result_insert_tbl_pr == "true" && $result_insert_tbl_c == "true" && $result_update_tbl_va == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																	$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																	$query_view_popup['text'] = "¡El prospecto se agregó correctamente!";
																	$query_view_popup['type'] = "success";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
																else { // hubo un error en los querys | mandamos alerta de error
																	$query_view_popup['title'] = "¡ERROR!";
																	$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
											        }
											      }
											      else { // la vacante no existe en la bd | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // la vacante no viene | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // no viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver los candidatos --------------- //
											case 'view-candidate':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos que venga la vacante
														$select = "encrypt_codigo_pr, prospecto_pr, apellido_paterno_pr, apellido_materno_pr, nombre_pr, telefono_pr, email_pr, cv_pr";
														$query_view_cl['tbl_pr'] = $this -> mm -> getAllInner2Where1($select, $tbl_va, $tbl_pr, $fields_va_id, $fields_pr_vacante, $fields_va_encrypt, $universal_url[1]);
														if (!empty($query_view_cl['tbl_pr'])) { // la vacante si viene | validamos que exista la vacante
															$query_view_cl['tbl_em'] = $universal_tbl_em; // mandamos la ruta para ver el cv
															$insert_tbl_mu['movimiento_mu'] = 62; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
											        $this -> load -> view('human_resources/vacancies/candidate_list', $query_view_cl);
											        $this -> load -> view('main/Footer');
											      }
											      else { // la vacante no existe en la bd | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // la vacante no viene | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- agregar nueva entrevista --------------- //
											case 'add-new-interview':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos si viene información en la url
												    $select = "id_pr";
														$controller_prospecto = $this -> mm -> getRowWhere1($select, $tbl_pr, $fields_pr_encrypt, $universal_url[1]);
														if (!empty($controller_prospecto)) { // validamos que el prospecto exista en la db
															$library_code = 14; // si viene información | agregamos entrevista
															$result_library_code_en = trim($this -> random_code_generator -> index($library_code));
															$insert_tbl_en['codigo_en'] = preg_replace('[\s+]',"", "ap-en-".$result_library_code_en);
															$insert_tbl_en['encrypt_codigo_en'] = hash('whirlpool', $insert_tbl_en['codigo_en']);
												      $insert_tbl_en['prospecto_en'] = $controller_prospecto -> id_pr;
												      $insert_tbl_en['fecha_en'] = trim($this -> input -> post('fecha'));
												      $insert_tbl_en['hora_en'] = trim($this -> input -> post('hora'));
												      $insert_tbl_en['comentarios_en'] = "";
												      $insert_tbl_en['pruebas_en'] = "";
												      $insert_tbl_en['nuevo_en'] = 2;
												      $result_insert_tbl_en = $this -> mm -> insert($tbl_en, $insert_tbl_en);
															$insert_tbl_mu['movimiento_mu'] = 31; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
												      if ($result_insert_tbl_en == "true" && $result_insert_tbl_mu == "true") {  // validamos si se ejecutaron los querys
												        $popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
												        $popup['text'] = "¡La entrevista se agregó correctamente. Comunicate con el gerente para notificarle la entrevista!";
												        $popup['type'] = "success";
												        $popup['ruta'] = "ruta";
												        // --------------- VISTAS --------------- //
												        $this -> load -> view('main/Header', $query_header);
												        $this -> load -> view('menu/human_resources', $query_menu);
												        $this -> load -> view('popup/popup_time', $popup);
												        $this -> load -> view('main/Footer');
												      }
												      else { // hubo un error en los querys | mandamos alerta de error
												        $popup['title'] = "¡ERROR!";
												        $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
												        $popup['type'] = "error";
												        $popup['ruta'] = "ruta";
												        // --------------- VISTAS --------------- //
												        $this -> load -> view('main/Header', $query_header);
												        $this -> load -> view('menu/human_resources', $query_menu);
																$this -> load -> view('bug/404');
												        $this -> load -> view('popup/popup_time', $popup);
												        $this -> load -> view('main/Footer');
												      }
												    }
														else { // no viene información | redirigimos a la página de error 404
															$this -> load -> view('main/Header', $query_header);
													    $this -> load -> view('menu/human_resources', $query_menu);
													    $this -> load -> view('bug/404');
													    $this -> load -> view('main/Footer');
												    }
												  }
												  else { // viene variable | redirigimos a la página de error 404
												    $this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
												  }
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
												}
											break;
											// --------------- agregar nuevo candidato --------------- //
											case 'edit-candidate':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos que venga la vacante
														$select = "encrypt_codigo_va, encrypt_codigo_pr, prospecto_pr, apellido_paterno_pr, apellido_materno_pr, nombre_pr, telefono_pr, email_pr";
														$query_view_ec['tbl_pr'] = $this -> mm -> getAllInner2Where1($select, $tbl_va, $tbl_pr, $fields_va_id, $fields_pr_vacante, $fields_va_encrypt, $universal_url[1]);
														if (!empty($query_view_ec['tbl_pr'])) { // validamos si existe el prospecto en la db
															$query_view_ec['tbl_em'] = $universal_tbl_em;
															$insert_tbl_mu['movimiento_mu'] = 61; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
										          // --------------- VISTAS --------------- //
										          $this -> load -> view('main/Header', $query_header);
										          $this -> load -> view('menu/human_resources', $query_menu);
										          $this -> load -> view('human_resources/vacancies/edit_candidate', $query_view_ec);
										          $this -> load -> view('main/Footer');
										        }
										        else { // el prospecto no existe en la bd | mandamos alerta de error
										          $query_view_popup['title'] = "¡ERROR!";
										          $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
										          $query_view_popup['type'] = "error";
										          $query_view_popup['ruta'] = "ruta";
										          // --------------- VISTAS --------------- //
										          $this -> load -> view('main/Header', $query_header);
										          $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
										          $this -> load -> view('popup/popup_time', $query_view_popup);
										          $this -> load -> view('main/Footer');
										        }
											    }
													else { // la vacante no viene | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- cubrir vacante --------------- //
											case 'fill-vacancy':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // validamos que venga la vacante
											      $select = "fregistro_va";
											      $controller_vacante = $this -> mm -> getRowWhere1($select, $tbl_va, $fields_va_encrypt, $universal_url[1]);
											      if (!empty($controller_vacante)) { // la vacante si viene | validamos que exista la vacante en la db
											        $controller_info['status_va'] = 3; // si existe la vacante | actualizamos la vacante
											        $controller_info['fecha_cubierta_va'] = date('Y-m-d');
											        $result_update_tbl_va = $this -> mm -> updateWhere1($tbl_va, $fields_va_encrypt, $universal_url[1], $controller_info);
															$insert_tbl_mu['movimiento_mu'] = 19; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu =  $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        if ($result_update_tbl_va == "true" && $result_insert_tbl_mu ="true") { // validamos si se ejecutaron los querys
											          $query_view_popup['title'] = "¡FELICIDADES!"; // los querys se ejecutaron | mandamos alerta de success
											          $query_view_popup['text'] = "¡Se cubrio la vacante!";
											          $query_view_popup['type'] = "success";
											          $query_view_popup['ruta'] = "ruta";
											          // --------------- VISTAS --------------- //
											          $this -> load -> view('main/Header', $query_header);
											          $this -> load -> view('menu/human_resources', $query_menu);
											          $this -> load -> view('popup/popup_time', $query_view_popup);
											          $this -> load -> view('main/Footer');
											        }
											        else { // hubo un error en los querys | mandamos alerta de error
											          $query_view_popup['title'] = "¡ERROR!";
											          $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											          $query_view_popup['type'] = "error";
											          $query_view_popup['ruta'] = "ruta";
											          // --------------- VISTAS --------------- //
											          $this -> load -> view('main/Header', $query_header);
											          $this -> load -> view('menu/human_resources', $query_menu);
																$this -> load -> view('bug/404');
											          $this -> load -> view('popup/popup_time', $query_view_popup);
											          $this -> load -> view('main/Footer');
											        }
											      }
											      else { // la vacante no existe en la bd | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // la vacante no viene | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver las entrevistas --------------- //
											case 'view-interview':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "apellido_paterno_pr, apellido_materno_pr, nombre_pr, prospecto_pr, encrypt_codigo_en, fecha_en, hora_en";
													$query_view_il['tbl_en'] = $this -> mm -> getAllInner4Where1For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $tbl_pr, $fields_va_id, $fields_pr_vacante, $tbl_en, $fields_pr_id, $fields_en_prospecto, $fields_pue_area, $universal_tbl_a, $fields_a_id); // obtenemos las entrevistas
											    if (!empty($query_view_il['tbl_en'])) { // validamos que existan entrevistas | para contabilizarlas
											      $query_view_il['total_tbl_en'] = count($query_view_il['tbl_en']);
											    }
											    else { // no existen entrevistas | mandamos el valor total en 0
											      $query_view_il['total_tbl_en'] = 0;
											    }
													$select = "puesto_pue, encrypt_codigo_va"; // entrevistas para el buscador
													$query_view_il['tbl_va'] = $this -> mm -> getAllInner2Where1For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $universal_tbl_a, $fields_a_id);
											    $query_view_il['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 60; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/vacancies/interview_list', $query_view_il);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- buscar entrevistas --------------- //
											case 'search-interviews':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$controller_vacante = trim($this -> input -> post('vacante')); // validamos que venga información del fomrulario
													if (!empty($controller_vacante)) {
														$select = "id_va";
											      $controller_tbl_va = $this -> mm -> getRowWhere1($select, $tbl_va, $fields_va_encrypt, $controller_vacante);
														if (!empty($controller_tbl_va)) { // si viene información | validamos que la vacante exista en la db
															$select = "apellido_paterno_pr, apellido_materno_pr, nombre_pr, prospecto_pr, encrypt_codigo_en, fecha_en, hora_en";
															$query_view_il['tbl_en'] = $this -> mm -> getAllInner2Where1($select, $tbl_pr, $tbl_en, $fields_pr_id, $fields_en_prospecto, $fields_pr_vacante, $controller_tbl_va -> id_va);
															if (!empty($query_view_il['tbl_en'])) { // validamos que existan entrevistas | para contabilizarlas
													      $query_view_il['total_tbl_en'] = count($query_view_il['tbl_en']);
													    }
													    else { // no existen entrevistas | mandamos el valor total en 0
													      $query_view_il['total_tbl_en'] = 0;
													    }
															// entrevistas para el buscador
															$select = "puesto_pue, encrypt_codigo_va";
															$query_view_il['tbl_va'] = $this -> mm -> getAllInner2Where1For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $universal_tbl_a, $fields_a_id);
													    $query_view_il['tbl_em'] = $universal_tbl_em;
															$insert_tbl_mu['movimiento_mu'] = 73; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        // --------------- VISTAS --------------- //
													    $this -> load -> view('main/Header', $query_header);
													    $this -> load -> view('menu/human_resources', $query_menu);
													    $this -> load -> view('human_resources/vacancies/interview_list', $query_view_il);
													    $this -> load -> view('main/Footer');
											      }
											      else { // no viene información | mandamos alerta de error
											        $popup['title'] = "¡ERROR!";
											        $popup['text'] = "Lo sentimos la vacante no se encuentra registrada, intentalo nuevamente.";
											        $popup['type'] = "error";
											        $popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // no viene información | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver la cartera de una empresa --------------- //
											case 'view-wallet':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "puesto_pue, encrypt_codigo_c, apellido_paterno_c, apellido_materno_c, nombre_c, telefono_c, email_c, cv_c, status_c";
													$query_view_wl['tbl_c'] = $this -> mm -> getAllInner3Where1For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $tbl_c, $fields_va_id, $fields_c_vacante, $fields_pue_area, $universal_tbl_a, $fields_a_id);
													if (!empty($query_view_wl['tbl_c'])) { // validamos que existan carteras | para contabilizarlas
														$query_view_wl['total_tbl_c'] = count($query_view_wl['tbl_c']);
													}
													else { // no existen carteras | mandamos el valor total en 0
														$query_view_wl['total_tbl_c'] = 0;
													}
													$query_view_wl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 59; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/wallet/wallet_list', $query_view_wl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver cartera con empleo --------------- //
											case 'view-job-candidates':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "puesto_pue, encrypt_codigo_c, apellido_paterno_c, apellido_materno_c, nombre_c, telefono_c, email_c, cv_c, status_c";
													$query_view_wl['tbl_c'] = $this -> mm -> getAllInner3Where2For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $tbl_c, $fields_va_id, $fields_c_vacante, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_c_status, $num_val1);
													if (!empty($query_view_wl['tbl_c'])) { // validamos que existan carteras | para contabilizarlas
														$query_view_wl['total_tbl_c'] = count($query_view_wl['tbl_c']);
													}
													else { // no existen carteras | mandamos el valor total en 0
														$query_view_wl['total_tbl_c'] = 0;
													}
													$query_view_wl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 94; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('human_resources/wallet/wallet_list', $query_view_wl);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver cartera sin empleos --------------- //
											case 'view-unemployed-candidates':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "puesto_pue, encrypt_codigo_c, apellido_paterno_c, apellido_materno_c, nombre_c, telefono_c, email_c, cv_c, status_c";
													$query_view_wl['tbl_c'] = $this -> mm -> getAllInner3Where2For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $tbl_c, $fields_va_id, $fields_c_vacante, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_c_status, $num_val2);
													if (!empty($query_view_wl['tbl_c'])) { // validamos que existan vacantes | para contabilizarlas
														$query_view_wl['total_tbl_c'] = count($query_view_wl['tbl_c']);
													}
													else { // no existen vacantes | mandamos el valor total en 0
														$query_view_wl['total_tbl_c'] = 0;
													}
													$query_view_wl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 95; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('human_resources/wallet/wallet_list', $query_view_wl);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/human_resources', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- actualizamos el status de la cartera --------------- //
											case 'update-candidate-status':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // validamos que venga el prospecto
											      $select = "encrypt_codigo_c, status_c";
											      $controller_tbl_c = $this -> mm -> getRowWhere1($select, $tbl_c, $fields_c_encrypt, $universal_url[1]);
														if (!empty($controller_tbl_c)) { // validamos que el prospecto exista en la db
															if ($controller_tbl_c -> status_c == 1) { // validamos el status del prospecto
											          $update_tbl_c['status_c'] = 2;
											          $result_update_tbl_c = $this -> mm -> updateWhere1($tbl_c, $fields_c_encrypt, $universal_url[1], $update_tbl_c); // si el status es empleado | lo actualizamos a desempleado
																$insert_tbl_mu['movimiento_mu'] = 29; // insertamos el movimiento realizado
																$insert_tbl_mu['usuario_mu'] = $session_login;
																$insert_tbl_mu['receptor_mu'] = "";
																$insert_tbl_mu['hora_mu'] = date('H:i:s');
																$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											          if ($result_update_tbl_c == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
											            $query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
											            $query_view_popup['text'] = "¡Se actualizó el status del prospecto!";
											            $query_view_popup['type'] = "success";
											            $query_view_popup['ruta'] = "ruta";
											            // --------------- VISTAS --------------- //
											            $this -> load -> view('main/Header', $query_header);
											            $this -> load -> view('menu/human_resources', $query_menu);
											            $this -> load -> view('popup/popup_time', $query_view_popup);
											            $this -> load -> view('main/Footer');
											          }
											          else { // hubo un error en los querys | mandamos alerta de error
											            $query_view_popup['title'] = "¡ERROR!";
											            $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											            $query_view_popup['type'] = "error";
											            $query_view_popup['ruta'] = "ruta";
											            // --------------- VISTAS --------------- //
											            $this -> load -> view('main/Header', $query_header);
											            $this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
											            $this -> load -> view('popup/popup_time', $query_view_popup);
											            $this -> load -> view('main/Footer');
											          }
											        }
											        else { // si el status es desempleado | lo actualizamos a empleado
											          $update_tbl_c['status_c'] = 1; // si el status es empleado | lo actualizamos a desempleado
											          $result_update_tbl_c = $this -> mm -> updateWhere1($tbl_c, $fields_c_encrypt, $universal_url[1], $update_tbl_c);
																$insert_tbl_mu['movimiento_mu'] = 29; // insertamos el movimiento realizado
																$insert_tbl_mu['usuario_mu'] = $session_login;
																$insert_tbl_mu['receptor_mu'] = "";
																$insert_tbl_mu['hora_mu'] = date('H:i:s');
																$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											          if ($result_update_tbl_c == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
											            $query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
											            $query_view_popup['text'] = "¡Se actualizó el status del prospecto!";
											            $query_view_popup['type'] = "success";
											            $query_view_popup['ruta'] = "ruta";
											            // --------------- VISTAS --------------- //
											            $this -> load -> view('main/Header', $query_header);
											            $this -> load -> view('menu/human_resources', $query_menu);
											            $this -> load -> view('popup/popup_time', $query_view_popup);
											            $this -> load -> view('main/Footer');
											          }
											          else { // hubo un error en los querys | mandamos alerta de error
											            $query_view_popup['title'] = "¡ERROR!";
											            $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											            $query_view_popup['type'] = "error";
											            $query_view_popup['ruta'] = "ruta";
											            // --------------- VISTAS --------------- //
											            $this -> load -> view('main/Header', $query_header);
											            $this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
											            $this -> load -> view('popup/popup_time', $query_view_popup);
											            $this -> load -> view('main/Footer');
											          }
											        }
											      }
											      else { // el prospecto no exitse en la db | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // no viene el prospecto | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver las evaluaciones --------------- //
											case 'view-evaluations':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, encrypt_codigo_ev, fecha_evaluacion_ev, comentarios_ev";
													$query_view_el['tbl_ev'] = $this -> mm -> getAllInner3Where2For2($select, $tbl_pue, $tbl_e, $fields_pue_id, $fields_e_puesto, $tbl_ev, $fields_e_id, $fields_ev_empleado, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_e_status, $num_val1);
													if (!empty($query_view_el['tbl_ev'])) { // validamos que existan evaluaciones | para contabilizarlas
											      $query_view_el['total_tbl_ev'] = count($query_view_el['tbl_ev']);
											    }
											    else { // no existen evaluaciones | mandamos el valor total en 0
											      $query_view_el['total_tbl_ev'] = 0;
											    }
													$query_view_el['tbl_em'] = $universal_tbl_em;
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/evaluation/evaluation_list', $query_view_el);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- descargar la evaluación --------------- //
											case 'download-my-evaluation':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // validamos si viene información en la url
											      $select = "numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, fecha_ingreso_e, area_a, puesto_pue, jefe_inmediato_em, fecha_evaluacion_ev, calificacion_ev, comunicacion_ev, tolerancia_ev, autocontrol_ev, motivacion_ev, adaptacion_ev, seguridad_ev, creatividad_ev, cooperacion_ev, normas_ev, vision_ev, planeacion_ev, organizacional_ev, seguimiento_ev, liderazgo_ev, responsabilidad_ev, ejecucion_ev, confiabilidad_ev, social_ev, manejo_ev, rendimiento_ev, trabajo_ev, asertividad_ev, empuje_ev, comentarios_ev, codigo_ev";
											      $library_generate_evaluation = $this -> mm -> getAllInner5Where1($select, $tbl_ev, $tbl_e, $fields_ev_empleado, $fields_e_id, $tbl_pue, $fields_e_puesto, $fields_pue_id, $tbl_a, $fields_pue_area, $fields_a_id, $tbl_em, $fields_a_empresa, $fields_em_id, $fields_ev_encrypt, $universal_url[1]);
														if (!empty($library_generate_evaluation)) { // validar que existe la evaluación
															$insert_tbl_mu['movimiento_mu'] = 22; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = $library_generate_evaluation -> numero_empleado_e;
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        $this -> pdf_generator -> generate_evaluation($library_generate_evaluation);
											      }
											      else { // la evaluación no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver las visitas de las empresas --------------- //
											case 'view-visits':
											  if (empty($universal_url[1])) { // validamos si viene información en la url
											    $select = "visitante_vi, hora_vi, fecha_vi, motivo_vi";
											    $query_view_vl['tbl_vi'] = $this -> mm -> getAllWhere1($select, $tbl_vi, $fields_vi_departamento, $query_controller['tbl_em'] -> id_em);
													if (!empty($query_view_vl['tbl_vi'])) { // validamos que existan visitas | para contabilizarlas
													  $query_view_vl['total_tbl_vi'] = count($query_view_vl['tbl_vi']);
													}
													else { // no existen visitas | mandamos el valor total en 0
													  $query_view_vl['total_tbl_vi'] = 0;
													}
													$query_view_vl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 64; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/visits/visit_list', $query_view_vl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver los pases de salida de los empleados --------------- //
											case 'view-exit-pass':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, start_ps, hora_ps";
													$query_view_epl['tbl_ps'] = $this -> mm -> getAllInner3Where2For2($select, $tbl_pue, $tbl_e, $fields_pue_id, $fields_e_puesto, $tbl_ps, $fields_e_id, $fields_ps_empleado, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_e_status, $num_val1);
													if (!empty($query_view_epl['tbl_ps'])) { // validamos que existan pases de salida | para contabilizarlas
													  $query_view_epl['total_tbl_ps'] = count($query_view_epl['tbl_ps']);
													}
													else { // no existen pases de salida | mandamos el valor total en 0
													  $query_view_epl['total_tbl_ps'] = 0;
													}
											    $query_view_epl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 65; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/exit_passes/exit_pass_list', $query_view_epl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver los permisos --------------- //
											case 'view-permission':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, inicio_p, horas_p, fin_p, horas_p, fecha_permiso_p";
													$query_view_pl['tbl_p'] = $this -> mm -> getAllInner3Where2For2($select, $tbl_pue, $tbl_e, $fields_pue_id, $fields_e_puesto, $tbl_p, $fields_e_id, $fields_p_empleado, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_e_status, $num_val1);
													if (!empty($query_view_pl['tbl_p'])) { // validamos que existan permisos | para contabilizarlas
													  $query_view_pl['total_tbl_p'] = count($query_view_pl['tbl_p']);
													}
													else { // no existen permisos | mandamos el valor total en 0
													  $query_view_pl['total_tbl_p'] = 0;
													}
													$query_view_pl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 66; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/permissions/permission_list', $query_view_pl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver permisos urgentes --------------- //
											case 'view-urgent-permissions':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, hora_pu, fecha_pu, autorizado_pu";
													$query_view_upl['tbl_pu'] = $this -> mm -> getAllInner3Where2For2($select, $tbl_pue, $tbl_e, $fields_pue_id, $fields_e_puesto, $tbl_pu, $fields_e_id, $fields_pu_empleado, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_e_status, $num_val1);
													if (!empty($query_view_upl['tbl_pu'])) { // validamos que existan vacantes | para contabilizarlas
													  $query_view_upl['total_tbl_pu'] = count($query_view_upl['tbl_pu']);
													}
													else { // no existen vacantes | mandamos el valor total en 0
													  $query_view_upl['total_tbl_pu'] = 0;
													}
													$query_view_upl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 67; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/urgent_permits/urgent_permission_list', $query_view_upl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver contratos --------------- //
											case 'view-the-contracts':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$query_view_cl['tbl_e'] = $universal_tbl_e; // buscamos la información | obtenemos los empleados
													$query_view_cl['total_tbl_e'] = $universal_tbl_e_total;
													$query_view_cl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 68; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/contracts/contract_list', $query_view_cl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- generar contrato temporal --------------- //
											case 'generate-partial-contract':
												if (!empty($universal_url[1])) { // validamos que venga el número de empleado
													$select = "id_e, numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, edad_e, calle_e, numero_exterior_e, numero_interior_e, colonia_e, municipio_e, imss_e, curp_e, turno_e, salario_mensual_neto_e, fecha_proximo_contrato_e, fecha_ingreso_e, puesto_pue";
													$library_contract_generator['tbl_e'] = $this -> mm -> getRowInner3Where1($select, $tbl_e, $tbl_pue, $fields_e_puesto, $fields_pue_id, $tbl_a, $fields_pue_area, $fields_a_id, $fields_e_encrypt, $universal_url[1]);
											    if (!empty($library_contract_generator['tbl_e'])) { // si viene el número | buscamos al empleado en la db
											      $select = "calificacion_ev";
											      $mes = $library_contract_generator['tbl_e'] -> fecha_proximo_contrato_e[0].
											             $library_contract_generator['tbl_e'] -> fecha_proximo_contrato_e[1].
											             $library_contract_generator['tbl_e'] -> fecha_proximo_contrato_e[2].
											             $library_contract_generator['tbl_e'] -> fecha_proximo_contrato_e[3].
											             $library_contract_generator['tbl_e'] -> fecha_proximo_contrato_e[4].
											             $library_contract_generator['tbl_e'] -> fecha_proximo_contrato_e[5].
											             $library_contract_generator['tbl_e'] -> fecha_proximo_contrato_e[6];
											      $controller_evaluacion = $this -> mm -> getRowWhere2($select, $tbl_ev, $fields_ev_empleado, $library_contract_generator['tbl_e'] -> id_e, $fields_ev_mes, $mes);
											      if (!empty($controller_evaluacion)) { // el empleado si existe | validamos que tenga una evaluación
											        if ($controller_evaluacion -> calificacion_ev >= 8.0) { // si cuenta con una evaluación | validamos que paso la calificación mayor a 8
											          if (!empty($universal_url[2])) { // el empleado cuneta con un promedio mayor a 8.0 | validamos que venga el número del contrato
											            if (is_numeric($universal_url[2])) { // viene el número del contrato | validamos que sea número
											              switch ($universal_url[2]) { // si es número | validamos el número
											                case 1: // primer contrato
											                  $update_tbl_e['contrato_e'] = 2;
																				$result_update_tbl_e = $this -> mm -> updateWhere1($tbl_e, $fields_e_encrypt, $universal_url[1], $update_tbl_e); // actualizamos los estatus de los contratos
											                  if ($result_update_tbl_e == "true") { // validamos que la actualización se realizó correctamnete
											                    $insert_tbl_mu['movimiento_mu'] = 6; // insertamos el movimiento realizado
											                    $insert_tbl_mu['usuario_mu'] = $session_login;
											                    $insert_tbl_mu['receptor_mu'] = $library_contract_generator['tbl_e'] -> numero_empleado_e;
											                    $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											                    $controller_salario = $library_contract_generator['tbl_e'] -> salario_mensual_neto_e;
											                    $library_contract_generator['salario'] = $this -> convert_number_to_letter -> generate($controller_salario); // convertimos el sueldo a letra
											                    $library_contract_generator['fecha_actual'] = $this -> date -> get_date(); // obtenemos la fecha actual
											                    $controller_fecha_ingreso = $library_contract_generator['tbl_e'] -> fecha_ingreso_e; // obtenemos la fecha de ingreso y la convertimos a letra
											                    $library_contract_generator['fecha_ingreso'] = $this -> date -> convert_date_to_letter($controller_fecha_ingreso);
																					$controller_fecha_termino_contrato = $library_contract_generator['tbl_e'] -> fecha_proximo_contrato_e; // obtenemos la fecha de termino del contrato
											                    $library_contract_generator['fecha_termino'] = $this -> date -> convert_date_to_letter($controller_fecha_termino_contrato);
											                    $GenerarContrato = $this -> pdf_generator -> contract_generator($library_contract_generator); // generamos el contrato del empleado
											                  }
											                  else { // NO se actualiza correctamente | mandamos alerta de error
											                    $query_view_popup['title'] = "¡ERROR!";
											                    $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											                    $query_view_popup['type'] = "error";
											                    $query_view_popup['ruta'] = "ruta";
											                    // --------------- VISTAS --------------- //
											                    $this -> load -> view('main/Header', $query_header);
											                    $this -> load -> view('menu/human_resources', $query_menu);
																					$this -> load -> view('bug/404');
											                    $this -> load -> view('popup/popup_time', $query_view_popup);
											                    $this -> load -> view('main/Footer');
											                  }
											                break;
																			case 2: // segundo contrato
																				$update_tbl_e['contrato_e'] = 3;
																				$result_update_tbl_e = $this -> mm -> updateWhere1($tbl_e, $fields_e_encrypt, $universal_url[1], $update_tbl_e); // actualizamos los estatus de los contratos
																				if ($result_update_tbl_e == "true") { // validamos que la actualización se realizó correctamnete
																					$insert_tbl_mu['movimiento_mu'] = 6; // insertamos el movimiento realizado
																					$insert_tbl_mu['usuario_mu'] = $session_login;
																					$insert_tbl_mu['receptor_mu'] = $library_contract_generator['tbl_e'] -> numero_empleado_e;
																					$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																					$controller_salario = $library_contract_generator['tbl_e'] -> salario_mensual_neto_e;
																					$library_contract_generator['salario'] = $this -> convert_number_to_letter -> generate($controller_salario); // convertimos el sueldo a letra
																					$library_contract_generator['fecha_actual'] = $this -> date -> get_date(); // obtenemos la fecha actual
																					$controller_fecha_ingreso = $library_contract_generator['tbl_e'] -> fecha_ingreso_e; // obtenemos la fecha de ingreso y la convertimos a letra
																					$library_contract_generator['fecha_ingreso'] = $this -> date -> convert_date_to_letter($controller_fecha_ingreso);
																					$controller_fecha_termino_contrato = $library_contract_generator['tbl_e'] -> fecha_proximo_contrato_e; // obtenemos la fecha de termino del contrato
																					$library_contract_generator['fecha_termino'] = $this -> date -> convert_date_to_letter($controller_fecha_termino_contrato);
																					$GenerarContrato = $this -> pdf_generator -> contract_generator($library_contract_generator); // generamos el contrato del empleado
																				}
																				else { // NO se actualiza correctamente | mandamos alerta de error
																					$query_view_popup['title'] = "¡ERROR!";
																					$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																					$query_view_popup['type'] = "error";
																					$query_view_popup['ruta'] = "ruta";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('main/Header', $query_header);
																					$this -> load -> view('menu/human_resources', $query_menu);
																					$this -> load -> view('bug/404');
																					$this -> load -> view('popup/popup_time', $query_view_popup);
																					$this -> load -> view('main/Footer');
																				}
											                break;
																			case 3: // tercer contrato
																				$update_tbl_e['contrato_e'] = 4; // actualizamos los estatus de los contratos
																				$result_update_tbl_e = $this -> mm -> updateWhere1($tbl_e, $fields_e_encrypt, $universal_url[1], $update_tbl_e);
																				if ($result_update_tbl_e == "true") { // validamos que la actualización se realizó correctamnete
																					$insert_tbl_mu['movimiento_mu'] = 6; // insertamos el movimiento realizado
																					$insert_tbl_mu['usuario_mu'] = $session_login;
																					$insert_tbl_mu['receptor_mu'] = $library_contract_generator['tbl_e'] -> numero_empleado_e;
																					$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																					$controller_salario = $library_contract_generator['tbl_e'] -> salario_mensual_neto_e; // convertimos el sueldo a letra
																					$library_contract_generator['salario'] = $this -> convert_number_to_letter -> generate($controller_salario);
																					$library_contract_generator['fecha_actual'] = $this -> date -> get_date(); // obtenemos la fecha actual
																					$controller_fecha_ingreso = $library_contract_generator['tbl_e'] -> fecha_ingreso_e;
																					$library_contract_generator['fecha_ingreso'] = $this -> date -> convert_date_to_letter($controller_fecha_ingreso);
																					$controller_fecha_termino_contrato = $library_contract_generator['tbl_e'] -> fecha_proximo_contrato_e;
																					$library_contract_generator['fecha_termino'] = $this -> date -> convert_date_to_letter($controller_fecha_termino_contrato); // obtenemos la fecha de termino del contrato
																					$GenerarContrato = $this -> pdf_generator -> contract_generator($library_contract_generator); // generamos el contrato del empleado
																				}
																				else { // NO se actualiza correctamente | mandamos alerta de error
																					$query_view_popup['title'] = "¡ERROR!";
																					$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																					$query_view_popup['type'] = "error";
																					$query_view_popup['ruta'] = "ruta";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('main/Header', $query_header);
																					$this -> load -> view('menu/human_resources', $query_menu);
																					$this -> load -> view('bug/404');
																					$this -> load -> view('popup/popup_time', $query_view_popup);
																					$this -> load -> view('main/Footer');
																				}
											                break;
																			default: // no existe el contrato | redirigimos a la página de error 404
																				$this -> load -> view('main/Header', $query_header);
																				$this -> load -> view('menu/human_resources', $query_menu);
																				$this -> load -> view('bug/404');
																				$this -> load -> view('main/Footer');
											                break;
											              }
											            }
											            else { // no es número | redirigimos a la página de error 404
																		$this -> load -> view('main/Header', $query_header);
																    $this -> load -> view('menu/human_resources', $query_menu);
																    $this -> load -> view('bug/404');
																    $this -> load -> view('main/Footer');
											            }
											          }
																else { // el número del contrato no viene | redirigimos a la página de error 404
																	$this -> load -> view('main/Header', $query_header);
															    $this -> load -> view('menu/human_resources', $query_menu);
															    $this -> load -> view('bug/404');
															    $this -> load -> view('main/Footer');
											          }
											        }
											        else { // el empleado no cuenta con calificación suficiente para renovar contrato | mandamos alerta de error
											          $query_view_popup['title'] = "¡ERROR!";
											          $query_view_popup['text'] = "Lo sentimos no podemos generar el contrato porque el empleado no paso la evaluación con un promedio mínimo de 8.0.";
											          $query_view_popup['type'] = "error";
											          $query_view_popup['ruta'] = "ruta";
											          // --------------- VISTAS --------------- //
											          $this -> load -> view('main/Header', $query_header);
											          $this -> load -> view('menu/human_resources', $query_menu);
																$this -> load -> view('bug/404');
											          $this -> load -> view('popup/popup_time', $query_view_popup);
											          $this -> load -> view('main/Footer');
											        }
											      }
											      else { // el empleado no cuenta con evaluación en el mes | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos no podemos generar el contrato porque el empleado no cuneta con una evaluación para este contrato.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
											    else { // el empleado no existe | mandamos alerta de error
											      $query_view_popup['title'] = "¡ERROR!";
											      $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											      $query_view_popup['type'] = "error";
											      $query_view_popup['ruta'] = "ruta";
											      // --------------- VISTAS --------------- //
											      $this -> load -> view('main/Header', $query_header);
											      $this -> load -> view('menu/human_resources', $query_menu);
														$this -> load -> view('bug/404');
											      $this -> load -> view('popup/popup_time', $query_view_popup);
											      $this -> load -> view('main/Footer');
											    }
											  }
												else { // el número de empleado no existe | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver los expedientes --------------- //
											case 'view-the-case-files':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$query_view_lof['tbl_e'] = $universal_tbl_e;
													$select ="empleado_ex";
													$select = "foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e";
													$query_view_lof['tbl_ex'] = $this -> mm -> getAllInner3Where2For2($select, $tbl_pue, $tbl_e, $fields_pue_id, $fields_e_puesto, $tbl_ex, $fields_e_id, $fields_ex_empleado, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_e_status, $num_val1);
													if (!empty($query_view_lof['tbl_ex'])) { // validamos que existan vacantes | para contabilizarlas
														arsort($query_view_lof['tbl_ex']);
														$query_view_lof['total_tbl_e'] = count($query_view_lof['tbl_ex']);
													}
													else { // no existen vacantes | mandamos el valor total en 0
														$query_view_lof['total_tbl_e'] = 0;
													}
													$query_view_lof['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 69; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/files/list_of_files', $query_view_lof);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- generar expediente --------------- //
											case 'generate-the-case-files':
											  if (empty($universal_url[1])) { // validamos si viene información en la url
											    $controller_form_empleado = trim($this -> input -> post('empleado'));
													if (!empty($controller_form_empleado)) { // validamos si existe información del formulario
														if ($controller_form_empleado != "Seleccionar_empleado") { // validamos que seleccionaron un empleado
															$select = "encrypt_codigo_ex";
															$controller_expediente = $this -> mm -> getAllInner2Where1($select, $tbl_e, $tbl_ex, $fields_e_id, $fields_ex_empleado, $fields_e_encrypt, $controller_form_empleado);
															if (empty($controller_expediente)) { // empleado seleccionado | validamos que el expediente no exista en la db
																$select = "id_e, numero_empleado_e, nombre_e, puesto_e";
											          $controller_empleado = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $controller_form_empleado); // seleccionaron un empleado | buscamos al empleado
											          $nombre_e = $controller_empleado -> nombre_e;
											          $controller_numero_empleado_e = $controller_empleado -> numero_empleado_e;
											          $controller_folder = 'dcs/case-files/'.$universal_company.'/'.$controller_numero_empleado_e;
											          if (!file_exists($controller_folder)) {
											              mkdir($controller_folder, 0777, true);
											          }
											          $controller_file = opendir($controller_folder); //Abrimos el directorio de destino
											          if (!empty($_FILES['curriculum']['name'])) {
											            move_uploaded_file($_FILES['curriculum']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-Curriculum".".webp");
											            $img_Curriculum = "$controller_numero_empleado_e-Curriculum".".webp";
											          }
											          if (!empty($_FILES['acta']['name'])) {
											            move_uploaded_file($_FILES['acta']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-Acta".".webp");
											            $img_Acta = "$controller_numero_empleado_e-Acta".".webp";
											          }
											          if (!empty($_FILES['ine']['name'])) {
											            move_uploaded_file($_FILES['ine']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-INE".".webp");
											            $img_INE = "$controller_numero_empleado_e-INE".".webp";
											          }
											          if (!empty($_FILES['comprobante']['name'])) {
											            move_uploaded_file($_FILES['comprobante']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-Estudios".".webp");
											            $img_Estudios = "$controller_numero_empleado_e-Estudios".".webp";
											          }
											          if (!empty($_FILES['domicilio']['name'])) {
											            move_uploaded_file($_FILES['domicilio']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-Domicilio".".webp");
											            $img_Domicilio = "$controller_numero_empleado_e-Domicilio".".webp";
											          }
											          if (!empty($_FILES['curp']['name'])) {
											            move_uploaded_file($_FILES['curp']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-CURP".".webp");
											            $img_CURP = "$controller_numero_empleado_e-CURP".".webp";
											          }
											          if (!empty($_FILES['nss']['name'])) {
											            move_uploaded_file($_FILES['nss']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-NSS".".webp");
											            $img_NSS = "$controller_numero_empleado_e-NSS".".webp";
											          }
											          if (!empty($_FILES['carta1']['name'])) {
											            move_uploaded_file($_FILES['carta1']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-Carta1".".webp");
											            $img_Carta1 = "$controller_numero_empleado_e-Carta1".".webp";
											          }
											          if (!empty($_FILES['carta2']['name'])) {
											            move_uploaded_file($_FILES['carta2']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-Carta2".".webp");
											            $img_Carta2 = "$controller_numero_empleado_e-Carta2".".webp";
											          }
											          if (!empty($_FILES['fotos']['name'])) {
											            move_uploaded_file($_FILES['fotos']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-Fotos".".webp");
											            $img_fotos = "$controller_numero_empleado_e-Fotos".".webp";
											          }
																if (!empty($_FILES['rfc_homoclave']['name'])) {
											            move_uploaded_file($_FILES['rfc_homoclave']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-RFC".".webp");
											            $img_rfc = "$controller_numero_empleado_e-RFC".".webp";
																}
											          if (!empty($_FILES['cuenta']['name'])) {
											            move_uploaded_file($_FILES['cuenta']['tmp_name'],"dcs/case-files/$universal_company/$controller_numero_empleado_e/$controller_numero_empleado_e-Cuenta".".webp");
											            $img_Cuenta = "$controller_numero_empleado_e-Cuenta".".webp";
											          }
											          closedir($controller_file); //Cerramos el directorio de destino
																$library_code = 7;
																$result_library_code_ex = trim($this -> random_code_generator -> index($library_code));
																$insert_tbl_ex['codigo_ex'] = preg_replace('[\s+]',"", "ap-ex-".$controller_numero_empleado_e."-".$result_library_code_ex);
																$insert_tbl_ex['encrypt_codigo_ex'] = hash('whirlpool', $insert_tbl_ex['codigo_ex']);
											          $insert_tbl_ex['curriculum_ex'] = trim($img_Curriculum);
											          $insert_tbl_ex['acta_ex'] = trim($img_Acta);
											          $insert_tbl_ex['ine_ex'] = trim($img_INE);
											          $insert_tbl_ex['estudios_ex'] = trim($img_Estudios);
											          $insert_tbl_ex['domicilio_ex'] = trim($img_Domicilio);
											          $insert_tbl_ex['curp_ex'] = trim($img_CURP);
											          $insert_tbl_ex['seguro_social_ex'] = trim($img_NSS);
																if (!empty($img_Carta1)) {
											            $insert_tbl_ex['carta1_ex'] = trim($img_Carta1);
											          }
											          else {
											            $insert_tbl_ex['carta1_ex'] = "sin imagen";
											          }
											          if (!empty($img_Carta2)) {
											            $insert_tbl_ex['carta2_ex'] = trim($img_Carta2);
											          }
											          else {
											            $insert_tbl_ex['carta2_ex'] = "sin imagen";
											          }
																if (!empty($img_fotos)) {
											            $insert_tbl_ex['fotos_ex'] = trim($img_fotos);
											          }
											          else {
											            $insert_tbl_ex['fotos_ex'] = "sin imagen";
											          }
																$insert_tbl_ex['rfc_ex'] = trim($img_rfc);
											          $insert_tbl_ex['cuenta_ex'] = trim($img_Cuenta);
											          $insert_tbl_ex['empleado_ex'] = $controller_empleado -> id_e;
											          $insert_tbl_ex['nuevo_ex'] = 2;
											          $result_insert_tbl_ex = $this -> mm -> insert($tbl_ex, $insert_tbl_ex);
																$insert_tbl_mu['movimiento_mu'] = 8; // insertamos el movimiento realizado
																$insert_tbl_mu['usuario_mu'] = $session_login;
																$insert_tbl_mu['receptor_mu'] = $controller_numero_empleado_e;
																$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											          if ($result_insert_tbl_ex == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
											            $query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
											            $query_view_popup['text'] = "¡El Expediente se agregó correctamente!";
											            $query_view_popup['type'] = "success";
											            $query_view_popup['ruta'] = "ruta";
											            // --------------- VISTAS --------------- //
											            $this -> load -> view('main/Header', $query_header);
											            $this -> load -> view('menu/human_resources', $query_menu);
											            $this -> load -> view('popup/popup_time', $query_view_popup);
											            $this -> load -> view('main/Footer');
											          }
											          else { // hubo un error en los querys | mandamos alerta de error
											            $query_view_popup['title'] = "¡ERROR!";
											            $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											            $query_view_popup['type'] = "error";
											            $query_view_popup['ruta'] = "ruta";
											            // --------------- VISTAS --------------- //
											            $this -> load -> view('main/Header', $query_header);
											            $this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
											            $this -> load -> view('popup/popup_time', $query_view_popup);
											            $this -> load -> view('main/Footer');
											          }
											        }
															else { // el expediente si existe en la db | mandamos alerta de error
																$query_view_popup['title'] = "¡ERROR!";
											          $query_view_popup['text'] = "Lo sentimos este empleado ya tiene un expediente. No podemos generar el expediente.";
											          $query_view_popup['type'] = "error";
											          $query_view_popup['ruta'] = "ruta";
											          // --------------- VISTAS --------------- //
											          $this -> load -> view('main/Header', $query_header);
											          $this -> load -> view('menu/human_resources', $query_menu);
																$this -> load -> view('bug/404');
											          $this -> load -> view('popup/popup_time', $query_view_popup);
											          $this -> load -> view('main/Footer');
											        }
											      }
											      else { // no seleccionaron un empleado | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Selecciona un empleado para generar el expediente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // no existe información dle formulario | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- descargar expediente --------------- //
											case 'download-the-case-files':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos que el número de empleado venga con información
														$select = "id_e, numero_empleado_e, curriculum_ex, acta_ex, ine_ex, estudios_ex, domicilio_ex, curp_ex, seguro_social_ex, carta1_ex, carta2_ex, fotos_ex, rfc_ex, cuenta_ex";
														$library_case_files_generator['tbl_ex'] = $this -> mm -> getRowInner2Where1($select, $tbl_e, $tbl_ex, $fields_e_id, $fields_ex_empleado, $fields_e_encrypt, $universal_url[1]);
											      if (!empty($library_case_files_generator['tbl_ex'])) { // el numero de empleado viene con información | validamos que el número de empleado exista en la DB
											        $insert_tbl_mu['movimiento_mu'] = 9; // insertamos el movimiento realizado
											        $insert_tbl_mu['usuario_mu'] = $session_login;
											        $insert_tbl_mu['receptor_mu'] = $library_case_files_generator['tbl_ex'] -> numero_empleado_e;
											        $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        $library_case_files_generator['tbl_em'] = $universal_tbl_em;
											        // $generarExp = $this -> generate_file -> download_files($library_case_files_generator); // creamos el pdf
															$generarExp = $this -> pdf_generator -> generate_case_files($library_case_files_generator); // generamos el expediente del empleado
											      }
											      else { // el empleado no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // el numero de empleado viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver las vacaciones --------------- //
											case 'view-the-holidays':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$query_view_hl['tbl_e'] = $universal_tbl_e; // buscamos la información | obtenemos los empleados
													$query_view_hl['total_tbl_e'] = $universal_tbl_e_total;
													$query_view_hl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 70; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/holidays/holiday_list', $query_view_hl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver vacaciones de un empleado --------------- //
											case 'view-employee-holidays':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // validamos que el número de empleado venga con información
											      $select = "id_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, fecha_ingreso_e";
											      $query_view_eh['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
											      if (!empty($query_view_eh['tbl_e'])) { // el numero de empleado viene con información | validamos que el número de empleado exista en la DB
											        // obtenemos los días de vacaciones del empleado
															$select = "title, title, textcolor, textcolor, start, end";
											        $query_view_eh['tbl_v'] = json_encode($this -> mm -> getAllWhere1($select, $tbl_v, $fields_v_empleado, $query_view_eh['tbl_e'] -> id_e));
											        $query_view_eh['total_tbl_v'] = $this -> mm -> getAllWhere1($select, $tbl_v, $fields_v_empleado, $query_view_eh['tbl_e'] -> id_e);
											        $query_view_eh['tbl_em'] = $universal_tbl_em;
											        $query_view_eh_antiguedad = $this -> date -> get_seniority($query_view_eh['tbl_e'] -> fecha_ingreso_e); // obtenemos la antiguedad del empleado
															$result_update_tbl_e = $this -> mm -> updateOneWhere1($tbl_e, $fields_e_antiguedad, $query_view_eh_antiguedad, $fields_e_numero, $query_view_eh['tbl_e'] -> numero_empleado_e); // actualizamos la antiguedad
															$insert_tbl_mu['movimiento_mu'] = 71; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
											        $this -> load -> view('human_resources/holidays/add/employee_holidays', $query_view_eh);
											        $this -> load -> view('main/Footer');
											      }
											      else { // el empleado no existe | mandamos alerta de error
											        $popup['title'] = "¡ERROR!";
											        $popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $popup['type'] = "error";
											        $popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // el numero de empleado viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- agregar vacaciones a un empleado --------------- //
											case 'add-holidays':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // validamos que venga información en la variable
											      $select = "id_e, numero_empleado_e, antiguedad_e";
											      $controller_empleado = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
														if (!empty($controller_empleado)) { // si viene información | validamos que exista el empleado en la db
															$library_code = 8; // el empleado si existe en la db | validamos el total de vacaciones
															$result_library_code_v = trim($this -> random_code_generator -> index($library_code));
															$insert_tbl_v['codigo_v'] = preg_replace('[\s+]',"", "ap-v-".$controller_empleado -> numero_empleado_e."-".$result_library_code_v);
															$insert_tbl_v['encrypt_codigo_v'] = hash('whirlpool', $insert_tbl_v['codigo_v']);
											        $insert_tbl_v['empleado_v'] = $controller_empleado -> id_e;
											        $insert_tbl_v['title'] = "Vacaciones";
											        $insert_tbl_v['color'] = "#309b0c";
											        $insert_tbl_v['textcolor'] = "#ffffff";
											        $insert_tbl_v['start'] = trim($this -> input -> post('start'));
											        $insert_tbl_v['end'] = trim($this -> input -> post('end'));
											        $insert_tbl_v['autorizado_v'] = 2;
											        $insert_tbl_v['nuevo_v'] = 2;
															$select = "encrypt_codigo_v";
															$query_controller_tbl_v['folio'] = $this -> mm -> getAllWhere1($select, $tbl_v, $fields_v_encrypt, $insert_tbl_v['encrypt_codigo_v']);
															if (empty($query_controller_tbl_v['folio'])) { // validamos si existe el folio generado
																$controller_dias = $this -> date -> validate_holiday_day($insert_tbl_v['start']);
												        if ($controller_dias >= 15) { // validamos que el día solicitado es con 15 días de anticipación
												          $select = "encrypt_codigo_v";
												          $controller_vacaciones = $this -> mm -> getAllWhere1($select, $tbl_v, $fields_v_empleado, $controller_empleado -> id_e);
												          if (!empty($controller_vacaciones)) { // validamos que existan vacaciones | para contabilizarlas
												            $controller_total_vacaciones = count($controller_vacaciones);
												          }
												          else { // no existen vacaciones | mandamos el valor total en 0
												            $controller_total_vacaciones = 0;
												          }
												          if ($controller_total_vacaciones < 6 && $controller_empleado -> antiguedad_e <= 1) { // validamos los días permitidos de vacaciones
												            $result_insert_tbl_v = $this -> mm -> insert($tbl_v, $insert_tbl_v);
												            $insert_tbl_mu['movimiento_mu'] = 10; // insertamos el movimiento realizado
												            $insert_tbl_mu['usuario_mu'] = $session_login;
												            $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
												            $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
												            if ($result_insert_tbl_v == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
												              $popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
												              $popup['text'] = "¡El día de vacacines se agregó correctamente!";
												              $popup['type'] = "success";
												              $popup['ruta'] = "ruta";
												              // --------------- VISTAS --------------- //
												              $this -> load -> view('main/Header', $query_header);
												              $this -> load -> view('menu/human_resources', $query_menu);
												              $this -> load -> view('popup/popup_time', $popup);
												              $this -> load -> view('main/Footer');
												            }
												            else { // hubo un error en los querys | mandamos alerta de error
												              $popup['title'] = "¡ERROR!";
												              $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
												              $popup['type'] = "error";
												              $popup['ruta'] = "ruta";
												              // --------------- VISTAS --------------- //
												              $this -> load -> view('main/Header', $query_header);
												              $this -> load -> view('menu/human_resources', $query_menu);
																			$this -> load -> view('bug/404');
												              $this -> load -> view('popup/popup_time', $popup);
												              $this -> load -> view('main/Footer');
												            }
												          }
																	else { // validamos los días permitidos de vacaciones
																		if ($controller_total_vacaciones < 8 && $controller_empleado -> antiguedad_e == 2) { // validamos los días permitidos de vacaciones
																			$result_insert_tbl_v = $this -> mm -> insert($tbl_v, $insert_tbl_v);
													            $insert_tbl_mu['movimiento_mu'] = 10; // insertamos el movimiento realizado
													            $insert_tbl_mu['usuario_mu'] = $session_login;
													            $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
													            $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													            if ($result_insert_tbl_v == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
													              $popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
													              $popup['text'] = "¡El día de vacacines se agregó correctamente!";
													              $popup['type'] = "success";
													              $popup['ruta'] = "ruta";
													              // --------------- VISTAS --------------- //
													              $this -> load -> view('main/Header', $query_header);
													              $this -> load -> view('menu/human_resources', $query_menu);
													              $this -> load -> view('popup/popup_time', $popup);
													              $this -> load -> view('main/Footer');
													            }
													            else { // hubo un error en los querys | mandamos alerta de error
													              $popup['title'] = "¡ERROR!";
													              $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													              $popup['type'] = "error";
													              $popup['ruta'] = "ruta";
													              // --------------- VISTAS --------------- //
													              $this -> load -> view('main/Header', $query_header);
													              $this -> load -> view('menu/human_resources', $query_menu);
																				$this -> load -> view('bug/404');
													              $this -> load -> view('popup/popup_time', $popup);
													              $this -> load -> view('main/Footer');
													            }
												            }
																		else { // validamos los días permitidos de vacaciones
																			if ($controller_total_vacaciones < 10 && $controller_empleado -> antiguedad_e == 3) { // validamos los días permitidos de vacaciones
																				$result_insert_tbl_v = $this -> mm -> insert($tbl_v, $insert_tbl_v);
														            $insert_tbl_mu['movimiento_mu'] = 10; // insertamos el movimiento realizado
														            $insert_tbl_mu['usuario_mu'] = $session_login;
														            $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
														            $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
														            if ($result_insert_tbl_v == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
														              $popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
														              $popup['text'] = "¡El día de vacacines se agregó correctamente!";
														              $popup['type'] = "success";
														              $popup['ruta'] = "ruta";
														              // --------------- VISTAS --------------- //
														              $this -> load -> view('main/Header', $query_header);
														              $this -> load -> view('menu/human_resources', $query_menu);
														              $this -> load -> view('popup/popup_time', $popup);
														              $this -> load -> view('main/Footer');
														            }
														            else { // hubo un error en los querys | mandamos alerta de error
														              $popup['title'] = "¡ERROR!";
														              $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
														              $popup['type'] = "error";
														              $popup['ruta'] = "ruta";
														              // --------------- VISTAS --------------- //
														              $this -> load -> view('main/Header', $query_header);
														              $this -> load -> view('menu/human_resources', $query_menu);
																					$this -> load -> view('bug/404');
														              $this -> load -> view('popup/popup_time', $popup);
														              $this -> load -> view('main/Footer');
														            }
												              }
																			else { // validamos los días permitidos de vacaciones
																				if ($controller_total_vacaciones < 12 && $controller_empleado -> antiguedad_e == 4) { // validamos los días permitidos de vacaciones
																					$result_insert_tbl_v = $this -> mm -> insert($tbl_v, $insert_tbl_v);
															            $insert_tbl_mu['movimiento_mu'] = 10; // insertamos el movimiento realizado
															            $insert_tbl_mu['usuario_mu'] = $session_login;
															            $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
															            $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															            if ($result_insert_tbl_v == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
															              $popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
															              $popup['text'] = "¡El día de vacacines se agregó correctamente!";
															              $popup['type'] = "success";
															              $popup['ruta'] = "ruta";
															              // --------------- VISTAS --------------- //
															              $this -> load -> view('main/Header', $query_header);
															              $this -> load -> view('menu/human_resources', $query_menu);
															              $this -> load -> view('popup/popup_time', $popup);
															              $this -> load -> view('main/Footer');
															            }
															            else { // hubo un error en los querys | mandamos alerta de error
															              $popup['title'] = "¡ERROR!";
															              $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
															              $popup['type'] = "error";
															              $popup['ruta'] = "ruta";
															              // --------------- VISTAS --------------- //
															              $this -> load -> view('main/Header', $query_header);
															              $this -> load -> view('menu/human_resources', $query_menu);
																						$this -> load -> view('bug/404');
															              $this -> load -> view('popup/popup_time', $popup);
															              $this -> load -> view('main/Footer');
															            }
																				}
																				else { // validamos los días permitidos de vacaciones
																					if ($controller_total_vacaciones < 14 && $controller_empleado -> antiguedad_e > 4 && $controller_empleado -> antiguedad_e <= 9 ){ // validamos los días permitidos de vacaciones
																						$result_insert_tbl_v = $this -> mm -> insert($tbl_v, $insert_tbl_v);
																            $insert_tbl_mu['movimiento_mu'] = 10; // insertamos el movimiento realizado
																            $insert_tbl_mu['usuario_mu'] = $session_login;
																            $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
																            $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																            if ($result_insert_tbl_v == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																              $popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																              $popup['text'] = "¡El día de vacacines se agregó correctamente!";
																              $popup['type'] = "success";
																              $popup['ruta'] = "ruta";
																              // --------------- VISTAS --------------- //
																              $this -> load -> view('main/Header', $query_header);
																              $this -> load -> view('menu/human_resources', $query_menu);
																              $this -> load -> view('popup/popup_time', $popup);
																              $this -> load -> view('main/Footer');
																            }
																            else { // hubo un error en los querys | mandamos alerta de error
																              $popup['title'] = "¡ERROR!";
																              $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																              $popup['type'] = "error";
																              $popup['ruta'] = "ruta";
																              // --------------- VISTAS --------------- //
																              $this -> load -> view('main/Header', $query_header);
																              $this -> load -> view('menu/human_resources', $query_menu);
																							$this -> load -> view('bug/404');
																              $this -> load -> view('popup/popup_time', $popup);
																              $this -> load -> view('main/Footer');
																            }
												                  }
																					else { // validamos los días permitidos de vacaciones
																						if ($controller_total_vacaciones < 16 && $controller_empleado -> antiguedad_e > 9 && $controller_empleado -> antiguedad_e <= 14 ){ // validamos los días permitidos de vacaciones
																							$result_insert_tbl_v = $this -> mm -> insert($tbl_v, $insert_tbl_v);
																	            $insert_tbl_mu['movimiento_mu'] = 10; // insertamos el movimiento realizado
																	            $insert_tbl_mu['usuario_mu'] = $session_login;
																	            $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
																	            $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																	            if ($result_insert_tbl_v == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																	              $popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																	              $popup['text'] = "¡El día de vacacines se agregó correctamente!";
																	              $popup['type'] = "success";
																	              $popup['ruta'] = "ruta";
																	              // --------------- VISTAS --------------- //
																	              $this -> load -> view('main/Header', $query_header);
																	              $this -> load -> view('menu/human_resources', $query_menu);
																	              $this -> load -> view('popup/popup_time', $popup);
																	              $this -> load -> view('main/Footer');
																	            }
																	            else { // hubo un error en los querys | mandamos alerta de error
																	              $popup['title'] = "¡ERROR!";
																	              $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																	              $popup['type'] = "error";
																	              $popup['ruta'] = "ruta";
																	              // --------------- VISTAS --------------- //
																	              $this -> load -> view('main/Header', $query_header);
																	              $this -> load -> view('menu/human_resources', $query_menu);
																								$this -> load -> view('bug/404');
																	              $this -> load -> view('popup/popup_time', $popup);
																	              $this -> load -> view('main/Footer');
																	            }
												                    }
																						else { // validamos los días permitidos de vacaciones
																							if ($controller_total_vacaciones < 18 && $controller_empleado -> antiguedad_e > 14 && $controller_empleado -> antiguedad_e <= 19 ){ // validamos los días permitidos de vacaciones
																								$result_insert_tbl_v = $this -> mm -> insert($tbl_v, $insert_tbl_v);
																		            $insert_tbl_mu['movimiento_mu'] = 10; // insertamos el movimiento realizado
																		            $insert_tbl_mu['usuario_mu'] = $session_login;
																		            $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
																		            $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																		            if ($result_insert_tbl_v == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																		              $popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																		              $popup['text'] = "¡El día de vacacines se agregó correctamente!";
																		              $popup['type'] = "success";
																		              $popup['ruta'] = "ruta";
																		              // --------------- VISTAS --------------- //
																		              $this -> load -> view('main/Header', $query_header);
																		              $this -> load -> view('menu/human_resources', $query_menu);
																		              $this -> load -> view('popup/popup_time', $popup);
																		              $this -> load -> view('main/Footer');
																		            }
																		            else { // hubo un error en los querys | mandamos alerta de error
																		              $popup['title'] = "¡ERROR!";
																		              $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																		              $popup['type'] = "error";
																		              $popup['ruta'] = "ruta";
																		              // --------------- VISTAS --------------- //
																		              $this -> load -> view('main/Header', $query_header);
																		              $this -> load -> view('menu/human_resources', $query_menu);
																									$this -> load -> view('bug/404');
																		              $this -> load -> view('popup/popup_time', $popup);
																		              $this -> load -> view('main/Footer');
																		            }
												                      }
																							else { // validamos los días permitidos de vacaciones
																								if ($controller_total_vacaciones < 20 && $controller_empleado -> antiguedad_e > 19 && $controller_empleado -> antiguedad_e <= 24 ){ // validamos los días permitidos de vacaciones
																									$result_insert_tbl_v = $this -> mm -> insert($tbl_v, $insert_tbl_v);
																			            $insert_tbl_mu['movimiento_mu'] = 10; // insertamos el movimiento realizado
																			            $insert_tbl_mu['usuario_mu'] = $session_login;
																			            $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
																			            $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																			            if ($result_insert_tbl_v == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																			              $popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																			              $popup['text'] = "¡El día de vacacines se agregó correctamente!";
																			              $popup['type'] = "success";
																			              $popup['ruta'] = "ruta";
																			              // --------------- VISTAS --------------- //
																			              $this -> load -> view('main/Header', $query_header);
																			              $this -> load -> view('menu/human_resources', $query_menu);
																			              $this -> load -> view('popup/popup_time', $popup);
																			              $this -> load -> view('main/Footer');
																			            }
																			            else { // hubo un error en los querys | mandamos alerta de error
																			              $popup['title'] = "¡ERROR!";
																			              $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																			              $popup['type'] = "error";
																			              $popup['ruta'] = "ruta";
																			              // --------------- VISTAS --------------- //
																			              $this -> load -> view('main/Header', $query_header);
																			              $this -> load -> view('menu/human_resources', $query_menu);
																										$this -> load -> view('bug/404');
																			              $this -> load -> view('popup/popup_time', $popup);
																			              $this -> load -> view('main/Footer');
																			            }
												                        }
																								else { // validamos los días permitidos de vacaciones
																									if ($controller_total_vacaciones < 22 && $controller_empleado -> antiguedad_e > 24 && $controller_empleado -> antiguedad_e <= 29 ){ // validamos los días permitidos de vacaciones
																										$result_insert_tbl_v = $this -> mm -> insert($tbl_v, $insert_tbl_v);
																				            $insert_tbl_mu['movimiento_mu'] = 10; // insertamos el movimiento realizado
																				            $insert_tbl_mu['usuario_mu'] = $session_login;
																				            $insert_tbl_mu['receptor_mu'] = $controller_empleado -> numero_empleado_e;
																				            $result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																				            if ($result_insert_tbl_v == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																				              $popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																				              $popup['text'] = "¡El día de vacacines se agregó correctamente!";
																				              $popup['type'] = "success";
																				              $popup['ruta'] = "ruta";
																				              // --------------- VISTAS --------------- //
																				              $this -> load -> view('main/Header', $query_header);
																				              $this -> load -> view('menu/human_resources', $query_menu);
																				              $this -> load -> view('popup/popup_time', $popup);
																				              $this -> load -> view('main/Footer');
																				            }
																				            else { // hubo un error en los querys | mandamos alerta de error
																				              $popup['title'] = "¡ERROR!";
																				              $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																				              $popup['type'] = "error";
																				              $popup['ruta'] = "ruta";
																				              // --------------- VISTAS --------------- //
																				              $this -> load -> view('main/Header', $query_header);
																				              $this -> load -> view('menu/human_resources', $query_menu);
																											$this -> load -> view('bug/404');
																				              $this -> load -> view('popup/popup_time', $popup);
																				              $this -> load -> view('main/Footer');
																				            }
												                          }
												                          else { // no se puede agregar días de vacaciones
												                            $popup['title'] = "¡ERROR!";
												                            $popup['text'] = "Lo sentimos no podemos agregar un día más de vacaciones debido a que el empleado ya no cuenta con días disponibles.";
												                            $popup['type'] = "error";
												                            $popup['ruta'] = "ruta";
												                            // --------------- VISTAS --------------- //
												                            $this -> load -> view('main/Header', $query_header);
												                            $this -> load -> view('menu/human_resources', $query_menu);
																										$this -> load -> view('bug/404');
												                            $this -> load -> view('popup/popup_time', $popup);
												                            $this -> load -> view('main/Footer');
												                          }
												                        }
												                      }
												                    }
												                  }
												                }
												              }
												            }
												          }
												        }
												        else { // los días no son pedidos con 15 días de anticipación 1 mandamos alerta de error
												          $popup['title'] = "¡ERROR!";
												          $popup['text'] = "Lo sentimos el día de vacación se debe de solicitar con 15 días de anticipación. Prueba con otro día.";
												          $popup['type'] = "error";
												          $popup['ruta'] = "ruta";
												          // --------------- VISTAS --------------- //
												          $this -> load -> view('main/Header', $query_header);
												          $this -> load -> view('menu/human_resources', $query_menu);
																	$this -> load -> view('bug/404');
												          $this -> load -> view('popup/popup_time', $popup);
												          $this -> load -> view('main/Footer');
												        }
															}
															else { // si existe el código | mandamos alerta de error
															  $query_view_popup['title'] = "¡ERROR!";
															  $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
															  $query_view_popup['type'] = "error";
															  $query_view_popup['ruta'] = "ruta";
															  // --------------- VISTAS --------------- //
															  $this -> load -> view('main/Header', $query_header);
															  $this -> load -> view('menu/human_resources', $query_menu);
																$this -> load -> view('bug/404');
															  $this -> load -> view('popup/popup_time', $query_view_popup);
															  $this -> load -> view('main/Footer');
															}
											      }
											      else { // el empleado no existe en la db | mandamos alerta de error
											        $popup['title'] = "¡ERROR!";
											        $popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $popup['type'] = "error";
											        $popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/human_resources', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // no viene información | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/human_resources', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// ********************************** RECEPCIÓN ********************************** //
											// --------------- ver las entrevistas de hoy --------------- //
											case 'view-today-s-interviews':
											  if (empty($universal_url[1])) { // validamos si viene información en la url
											    $select = "apellido_paterno_pr, apellido_materno_pr, nombre_pr, hora_en";
											    $query_view_il['tbl_en'] = $this -> mm -> getAllInner3Where2For($select, $tbl_va, $tbl_pr, $fields_va_id, $fields_pr_vacante, $tbl_en, $fields_pr_id, $fields_en_prospecto, $fields_va_puesto, $universal_tbl_pue, $fields_pue_id, $fields_en_fecha, date('Y-m-d'));
											    if (!empty($query_view_il['tbl_en'])) { // validamos que existan entrevistas | para contabilizarlas
											      $query_view_il['total_tbl_en'] = count($query_view_il['tbl_en']);
											    }
											    else { // no existen entrevistas | mandamos el valor total en 0
											      $query_view_il['total_tbl_en'] = 0;
											    }
													$insert_tbl_mu['movimiento_mu'] = 77; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/reception/interviews/interview_list', $query_view_il);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver las visitas de las empresas de hoy **** recepcion **** --------------- //
											case 'view-today-s-visits':
											  if (empty($universal_url[1])) { // validamos si viene información en la url
											    $select = "visitante_vi, hora_vi, motivo_vi";
											    $query_view_vl['tbl_vi'] = $this -> mm -> getAllWhere2($select, $tbl_vi, $fields_vi_departamento, $universal_tbl_em -> id_em, $fields_vi_fecha, date('Y-m-d'));
													if (!empty($query_view_vl['tbl_vi'])) { // validamos que existan visitas | para contabilizarlas
											      $query_view_vl['total_tbl_vi'] = count($query_view_vl['tbl_vi']);
											    }
											    else { // no existen visitas | mandamos el valor total en 0
											      $query_view_vl['total_tbl_vi'] = 0;
											    }
													$insert_tbl_mu['movimiento_mu'] = 78; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/reception/visits/visit_list', $query_view_vl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver los pases de salida de hoy **** recepcion **** --------------- //
											case 'view-today-s-exit-pass':
											  if (empty($universal_url[1])) { // validamos si viene información en la url
											    $select = "foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, hora_ps, motivo_ps";
											    $query_view_epl['tbl_ps'] = $this -> mm -> getAllInner2Where2For($select, $tbl_e, $tbl_ps, $fields_e_id, $fields_ps_empleado, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id, $fields_ps_start, date('Y-m-d'));
													if (!empty($query_view_epl['tbl_ps'])) { // validamos que existan pases de salida | para contabilizarlas
											      $query_view_epl['total_tbl_ps'] = count($query_view_epl['tbl_ps']);
											    }
											    else { // no existen pases de salida | mandamos el valor total en 0
											      $query_view_epl['total_tbl_ps'] = 0;
											    }
													$query_view_epl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 79; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/reception/exit_pass/exit_pass_list', $query_view_epl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver los permisos de hoy **** recepcion **** --------------- //
											case 'view-today-s-permissions':
											  if (empty($universal_url[1])) { // validamos si viene información en la url
											    $select = "foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, inicio_p, fin_p";
											    $query_view_pl['tbl_p'] = $this -> mm -> getAllInner2Where3For($select, $tbl_e, $tbl_p, $fields_e_id, $fields_p_empleado, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id, $fields_p_fecha, date('Y-m-d'), $fields_p_autorizado, $num_val1);
													if (!empty($query_view_pl['tbl_p'])) { // validamos que existan permisos | para contabilizarlas
											      $query_view_pl['total_tbl_p'] = count($query_view_pl['tbl_p']);
											    }
											    else { // no existen permisos | mandamos el valor total en 0
											      $query_view_pl['total_tbl_p'] = 0;
											    }
													$query_view_pl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 80; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/reception/permissions/permission_list', $query_view_pl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver permisos urgentes de hoy **** recepcion **** --------------- //
											case 'view-today-s-urgent-permits':
											  if (empty($universal_url[1])) { // validamos si viene información en la url
											    $select = "foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, hora_pu";
											    $query_view_upl['tbl_pu'] = $this -> mm -> getAllInner2Where3For($select, $tbl_e, $tbl_pu, $fields_e_id, $fields_pu_empleado, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id, $fields_pu_fecha, date('Y-m-d'), $fields_pu_autorizado, $num_val1);
													if (!empty($query_view_upl['tbl_pu'])) { // validamos que existan vacantes | para contabilizarlas
											      $query_view_upl['total_tbl_pu'] = count($query_view_upl['tbl_pu']);
											    }
											    else { // no existen vacantes | mandamos el valor total en 0
											      $query_view_upl['total_tbl_pu'] = 0;
											    }
													$query_view_upl['tbl_em'] = $universal_tbl_em;
													// insertamos el movimiento realizado
													$insert_tbl_mu['movimiento_mu'] = 81;
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													// --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('human_resources/reception/urgent_permits/urgent_permission_list', $query_view_upl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/human_resources', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- no existe el metodo --------------- //
											default:
												$this -> load -> view('main/Header', $query_header);
												$this -> load -> view('bug/404');
												$this -> load -> view('main/Footer');
											break;
										}
									}
									else { // el metodo no existe | redirigimos a la página de error 404
										$this -> load -> view('main/Header', $query_header);
										$this -> load -> view('bug/404');
										$this -> load -> view('main/Footer');
									}
								}
								else { // viene vacia | mandamos a lá página de home
									// insertamos el movimiento realizado
									$insert_tbl_mu['movimiento_mu'] = 47;
									$insert_tbl_mu['usuario_mu'] = $session_login;
									$insert_tbl_mu['receptor_mu'] = "";
									$insert_tbl_mu['hora_mu'] = date('H:i:s');
									$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
									$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
									$this -> load -> view('main/Header', $query_header);
									$this -> load -> view('menu/human_resources', $query_menu);
									$this -> load -> view('home/human_resources_home', $query_home);
									$this -> load -> view('main/Footer');
								}
							}
							else { // el usuario no es de RRHH | redirigimos a la página de error 404
								$this -> load -> view('main/Header', $query_header);
								$this -> load -> view('bug/404');
								$this -> load -> view('main/Footer');
							}
						}
						else { // la empresa no existe | redirigimos a la página de error 404
							$this -> load -> view('main/Header', $query_header);
							$this -> load -> view('bug/404');
							$this -> load -> view('main/Footer');
						}
					}
					else { // la empresa no viene | redirigimos a la página de error 404
						$this -> load -> view('main/Header', $query_header);
						$this -> load -> view('bug/404');
						$this -> load -> view('main/Footer');
					}
				}
				else { // no es igual a true | redirigimos a la página de error 404
					$this -> load -> view('main/Header', $query_header);
					$this -> load -> view('bug/404');
					$this -> load -> view('main/Footer');
				}
			}
			else { // no viene la variable de sesion | redirigimos a la página de error 404
				$this -> load -> view('main/Header', $query_header);
				$this -> load -> view('bug/404');
				$this -> load -> view('main/Footer');
			}
		}
	}
