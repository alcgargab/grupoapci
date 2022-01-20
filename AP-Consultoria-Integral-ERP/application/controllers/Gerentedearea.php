<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Gerentedearea extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this -> load -> library('Random_code_generator', TRUE);
			$this -> load -> library('encryption', TRUE);
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
			$tbl_a = "areas";
			$tbl_e = "empleados";
			$tbl_em = "empresas";
			$tbl_en = "entrevistas";
			$tbl_ev = "evaluaciones";
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
			// --------------- variables para campos --------------- //
			// ----- tabla areas ----- //
			$fields_a_id = "id_a";
			$fields_a_empresa = "empresa_a";
			// ----- tabla empleados ----- //
			$fields_e_id = "id_e";
			$fields_e_status = "status_e";
			$fields_e_encrypt = "encrypt_numero_empleado_e";
			$fields_e_sexo = "sexo_e";
			$fields_e_puesto = "puesto_e";
			$fields_e_turno = "turno_e";
			// ----- tabla empresas ----- //
			$fields_em_id = "id_em";
			$fields_em_ruta = "ruta_em";
			// ----- tabla entrevistas ----- //
			$fields_en_prospecto = "prospecto_en";
			// ----- tabla evaluaciones ----- //
			$fields_ev_codigo = "codigo_ev";
			$fields_ev_empleado = "empleado_ev";
			// ----- tabla generos ----- //
			$fields_g_id = "id_g";
			// ----- tabla metodos_permitidos ----- //
			$fields_mp_ruta = "ruta_mp";
			$fields_mp_usuario = "usuario_mp";
			// ----- tabla pases de salida ----- //
			$fields_ps_empleado = "empleado_ps";
			$fields_ps_folio = "folio_ps";
			$fields_ps_encrypt = "encrypt_folio_ps";
			// ----- tabla permisos ----- //
			$fields_p_encrypt = "encrypt_folio_p";
			$fields_p_empleado = "empleado_p";
			$fields_p_permiso = "fecha_permiso_p";
			$fields_p_autorizado = "autorizado_p";
			// ----- tabla permisos urgentes ----- //
			$fields_pu_empleado = "empleado_pu";
			$fields_pu_fecha = "fecha_pu";
			$fields_pu_encrypt = "encrypt_folio_pu";
			// ----- tabla puestos ----- //
			$fields_pue_id = "id_pue";
			$fields_pue_area = "area_pue";
			// ----- tabla prospectos ----- //
			$fields_pr_id = "id_pr";
			$fields_pr_encrypt = "encrypt_codigo_pr";
			$fields_pr_vacante = "vacante_pr";
			$fields_pr_prospecto = "prospecto_pr";
			// ----- tabla usuarios ----- //
			$fields_u_id = "id_u";
			// ----- tabla status turnos ----- //
			$fields_st_id = "id_st";
			// ----- tabla vacaciones ----- //
			$fields_v_empleado = "empleado_v";
			$fields_v_encrypt = "encrypt_codigo_v";
			$fields_v_autorizado = "autorizado_v";
			// ----- tabla visitas ----- //
			$fields_vi_codigo = "codigo_vi";
			$fields_vi_encrypt = "encrypt_codigo_vi";
			// ----- tabla vacantes ----- //
			$fields_va_id = "id_va";
			$fields_va_encrypt = "encrypt_codigo_va";
			$fields_va_puesto = "puesto_va";
			$fields_va_autorizado = "autorizado_va";
			$fields_va_status  = "status_va";
			// --------------- variables de sesion --------------- //
			$session_validate = $this -> session -> validate;
			$session_login = $this -> session -> login;
			$session_empleado = $this -> session -> empleado;
			$session_user = $this -> session -> user;
			$session_type = $this -> session -> type;
			// variable con el numero 1
			$num_val1 = 1;
			// variable con el numero 2
			$num_val2 = 2;
			// variable con el numero 3
			$num_val3 = 3;
			// --------------- HEADER --------------- //
			$query_header['tbl_e'] = ""; // obtenemos el empleado
			// ------ VALORES PARA PONER COLOR Y QUE APAREZCA EL NOMBRE EN EL HEADER ------ //
			$query_header['tbl_pue'] = ""; // obtenemos el puesto del empleado
			$query_header['tbl_a'] = ""; // obtenemos el area del empleado
			$query_header['tbl_em'] = ""; // obtenemos la empresa del empleado
			$query_header['tbl_em_ruta'] = ""; // ruta para la foto del empleado
			// --------------- MENU --------------- //
			// ------ VALORES PARA LAS EVALUACIONES, PERMISOS, LAS VACANTES Y LAS VACACIONES ------ //
			$query_menu['tbl_a'] = ""; // obtenemos los puestos para las vacantes | obtenemos las areas
			$query_menu['tbl_u'] = ""; // obtenemos el usuario
			$query_menu['tbl_e'] = ""; // obtenemos los empleados
			if (!empty($query_menu['tbl_e'])) { // validamos que existan empledos | para contabilizarlas
				$query_menu['total_tbl_e'] = count($query_menu['tbl_e']);
			}
			else { // no existen empledos | mandamos el valor total en 0
				$query_menu['total_tbl_e'] = 0;
			}
			$query_menu['tbl_em_ruta'] = "";
			$query_menu['tbl_em'] = "";
			// --------------- HOME --------------- //
			$query_home['tbl_em'] = ""; // mandamos la empresa para el logo del home
			if (!empty($session_validate)){ // validamos las variables de sesion
				// --------------- HEADER --------------- //
				$select = "id_e, foto_empleado_e, nombre_e, puesto_e";
				$query_header['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $session_empleado); // obtenemos el empleado
				// ------ VALORES PARA PONER COLOR Y QUE APAREZCA EL NOMBRE EN EL HEADER ------ //
				$select = "area_pue";
				$query_header['tbl_pue'] = $this -> mm -> getRowWhere1($select, $tbl_pue, $fields_pue_id, $query_header['tbl_e'] -> puesto_e); // obtenemos el puesto del empleado
				$select = "empresa_a";
				$query_header['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $query_header['tbl_pue'] -> area_pue); // obtenemos el area del empleado
				$select = "id_em, ruta_em, icono_em";
				$query_header['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $query_header['tbl_a'] -> empresa_a); // obtenemos la empresa del empleado
				$query_header['tbl_em_ruta'] = $query_header['tbl_em'] -> ruta_em; // ruta para la foto del empleado
				// --------------- MENU --------------- //
				// ------ VALORES PARA LAS EVALUACIONES, PERMISOS, LAS VACANTES Y LAS VACACIONES ------ //
				$select = "id_a, area_a";
				$valor = $query_header['tbl_em'] -> id_em;
				$query_menu['tbl_a'] = $this -> mm -> getAllWhere1($select, $tbl_a, $fields_a_empresa, $valor); // obtenemos los puestos para las vacantes | obtenemos las areas
				$select = "usuario_u";
				$query_menu['tbl_u'] = $this -> mm -> getRowWhere1($select, $tbl_u, $fields_u_id, $session_login); // obtenemos el usuario
				if ($query_menu['tbl_u'] -> usuario_u == "JHteleviales") { // gerente de call center
					$select = "id_pue, puesto_pue";
					$query_menu['tbl_pue'] = $this -> mm -> getAllWhereCall($select, $tbl_pue, $fields_pue_id); // obtenemos todas los puestos
					$select = "id_e, foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, fecha_proximo_contrato_e";
					$query_menu['tbl_e'] = $this -> mm -> getAllWhere2For($select, $tbl_e, $fields_e_puesto, $query_menu['tbl_pue'], $fields_pue_id, $fields_e_status, $num_val1); // obtenemos todos los empleados para los select
					arsort($query_menu['tbl_e']);
				}
				elseif($query_menu['tbl_u'] -> usuario_u == "AVteleviales") { // gerente de televiales
					$select = "id_pue, puesto_pue";
					$query_menu['tbl_pue'] = $this -> mm -> getAllWhereTV($select, $tbl_pue, $fields_pue_id); // obtenemos todas los puestos
					$select = "id_e, foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, fecha_proximo_contrato_e";
					$query_menu['tbl_e'] = $this -> mm -> getAllWhere2For($select, $tbl_e, $fields_e_puesto, $query_menu['tbl_pue'], $fields_pue_id, $fields_e_status, $num_val1); // obtenemos todos los empleados para los select
					arsort($query_menu['tbl_e']);
				}
				elseif($query_menu['tbl_u'] -> usuario_u == "ABinfinito") { // gerente de casa infinito
					$select = "id_pue, puesto_pue";
					$query_menu['tbl_pue'] = $this -> mm -> getAllWhereCI($select, $tbl_pue, $fields_pue_id); // obtenemos todas los puestos
					$select = "id_e, foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, fecha_proximo_contrato_e";
					$query_menu['tbl_e'] = $this -> mm -> getAllWhere2For($select, $tbl_e, $fields_e_puesto, $query_menu['tbl_pue'], $fields_pue_id, $fields_e_status, $num_val1); // obtenemos todos los empleados para los select
					arsort($query_menu['tbl_e']);
				}
				else { // gerente de otra empresa
					$select = "id_pue, puesto_pue";
					$query_menu['tbl_pue'] = $this -> mm -> getAllWhere1For($select, $tbl_pue, $fields_pue_area, $query_menu['tbl_a'], $fields_a_id); // obtenemos todas los puestos
					$select = "id_e, foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, fecha_proximo_contrato_e";
					$query_menu['tbl_e'] = $this -> mm -> getAllWhere2For($select, $tbl_e, $fields_e_puesto, $query_menu['tbl_pue'], $fields_pue_id, $fields_e_status, $num_val1); // obtenemos todos los empleados para los select
					arsort($query_menu['tbl_e']);
				}
				if (!empty($query_menu['tbl_e'])) {
					$query_menu['total_tbl_e'] = count($query_menu['tbl_e']);
				}
				else {
					$query_menu['total_tbl_e'] = 0;
				}
				$query_menu['tbl_em_ruta'] = $query_header['tbl_em'] -> ruta_em;
				$query_menu['tbl_em'] = $query_header['tbl_em'];
				// --------------- HOME --------------- //
				$query_home['tbl_em'] = $query_header['tbl_em']; // mandamos la empresa para el logo del home
				if ($session_validate == "true") { // si viene la variable de sesion | validamos que sea iguala a ok
					if (!empty($universal_company)) { // validamos que exista la empresa
						$select = "fregistro_em";
						$query_controller['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_ruta, $universal_company);
						if (!empty($query_controller['tbl_em'])) { // la empresa si viene | validamos que exista en la db
							if ($session_user == "SGrheo" || $session_user == "DTrheo" || $session_user == "AVteleviales" || $session_user == "JHteleviales" || $session_user == "GLrheo" || $session_user == "JJcaemi" || $session_user == "GLapci" || $session_user == "ABinfinito" || $session_user == "ECcaemi") { // la empresa si existe | validamos que el usuario sea gerente de area
								if (!empty($universal_url[0])
							) { // validamos que no venga información en la url
									$select = "ruta_mp";
									$query_controller['tbl_mp'] = $this -> mm -> getRowWhere2Like($select, $tbl_mp, $fields_mp_ruta, $universal_url[0], $fields_mp_usuario, $session_type);
									if (!empty($query_controller['tbl_mp'])) { // validamos que el metodo exista y que el usuario sea el correcto
										// echo "<pre>"; print_r($session_user); echo "</pre>"; die();
										switch ($query_controller['tbl_mp'] -> ruta_mp) {
											// --------------- ver empleados --------------- //
											case 'view-employee':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$query_view_loe['tbl_e'] = $query_menu['tbl_e'];
													$query_view_loe['total_tbl_e'] = $query_menu['total_tbl_e'];
													$query_view_loe['tbl_em_ruta'] = $query_menu['tbl_em_ruta'];
													$insert_tbl_mu['movimiento_mu'] = 48; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('manager/employees/list_of_employees', $query_view_loe);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
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
											        $select = "area_a, empresa_a";
											        $query_view_ec['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $query_view_ec['tbl_e'] -> area_pue); // buscamos el área del empleado
															$select = "empresa_em, ruta_em";
											        $query_view_ec['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $query_view_ec['tbl_a'] -> empresa_a); // buscamos la empresa del empleado
															$insert_tbl_mu['movimiento_mu'] = 50; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = $query_view_ec['tbl_e'] -> numero_empleado_e;
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/manager', $query_menu);
											        $this -> load -> view('manager/employees/view/employee_card', $query_view_ec);
											        $this -> load -> view('main/Footer');
											      }
											      else { // el empleado no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // el numero de empleado viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/manager', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/manager', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- generar evaluacion --------------- //
											case 'generate-evaluation':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$query_form_empleado_ev = trim($this -> input -> post('selectempleado'));
													if (!empty($query_form_empleado_ev)) { // validamos que venga el empleado
														if ($query_form_empleado_ev != "selecciona-un-empleado") { // si viene información | validamos que seleccionaron empleado
															$select = "id_e, numero_empleado_e";
															$query_controller['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $query_form_empleado_ev); // obtenemos al empleado
															$select = "mes_ev";
															$query_controller_tbl_ev['mes'] = $this -> mm -> getRowWhere1($select, $tbl_ev, $fields_ev_empleado, $query_controller['tbl_e'] -> id_e);
															if (!empty($query_controller_tbl_ev['mes'])) { // validamos que el empleado no tenga una evaluación
																if ($query_controller_tbl_ev['mes'] -> mes_ev == date('Y-m')) { // la evaluación si existe | validamos que no exista una en el mes actual
																	$query_view_popup['title'] = "¡ERROR!"; // el empleado ya tiene una evaluación en el mes | mandamos alerta de error
																	$query_view_popup['text'] = "Lo sentimos el empleado ya tiene una evaluación en este mes.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/manager', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
																else { // el empleado no tiene evaluación en el mes | agregamos la evaluación
																	$library_code = 7;
																	$result_library_code_ev = trim($this -> random_code_generator -> index($library_code));
																	$insert_tbl_ev['codigo_ev'] = preg_replace('[\s+]',"", "ap-ev-".$query_controller['tbl_e'] -> numero_empleado_e."-".$result_library_code_ev);
																	$select = "encrypt_codigo_ev";
																	$query_controller_tbl_ev['codigo'] = $this -> mm -> getAllWhere1($select, $tbl_ev, $fields_ev_codigo, $insert_tbl_ev['codigo_ev']);
																	if ($query_controller_tbl_ev['codigo'] == "") { // validamos si existe el código en la db
																		$insert_tbl_ev['encrypt_codigo_ev'] = hash('whirlpool', $insert_tbl_ev['codigo_ev']);
																		$insert_tbl_ev['empleado_ev'] = $query_controller['tbl_e'] -> id_e;
																		$insert_tbl_ev['fecha_evaluacion_ev'] = date('Y-m-d');
																		$insert_tbl_ev['comunicacion_ev'] = trim(mb_strtoupper($this -> input -> post('comunicacion'), 'UTF-8'));
																		$insert_tbl_ev['tolerancia_ev'] = trim(mb_strtoupper($this -> input -> post('TolFru'), 'UTF-8'));
																		$insert_tbl_ev['autocontrol_ev'] = trim(mb_strtoupper($this -> input -> post('Autocontrol'), 'UTF-8'));
																		$insert_tbl_ev['motivacion_ev'] = trim(mb_strtoupper($this -> input -> post('Motivacion'), 'UTF-8'));
																		$insert_tbl_ev['adaptacion_ev'] = trim(mb_strtoupper($this -> input -> post('Adaptacion'), 'UTF-8'));
																		$insert_tbl_ev['seguridad_ev'] = trim(mb_strtoupper($this -> input -> post('Seguridad'), 'UTF-8'));
																		$insert_tbl_ev['creatividad_ev'] = trim(mb_strtoupper($this -> input -> post('Creatividad'), 'UTF-8'));
																		$insert_tbl_ev['cooperacion_ev'] = trim(mb_strtoupper($this -> input -> post('Cooperacion'), 'UTF-8'));
																		$insert_tbl_ev['normas_ev'] = trim(mb_strtoupper($this -> input -> post('ApNormas'), 'UTF-8'));
																		$insert_tbl_ev['vision_ev'] = trim(mb_strtoupper($this -> input -> post('VisCom'), 'UTF-8'));
																		$insert_tbl_ev['planeacion_ev'] = trim(mb_strtoupper($this -> input -> post('Planeacion'), 'UTF-8'));
																		$insert_tbl_ev['organizacional_ev'] = trim(mb_strtoupper($this -> input -> post('Organizacional'), 'UTF-8'));
																		$insert_tbl_ev['seguimiento_ev'] = trim(mb_strtoupper($this -> input -> post('SegInst'), 'UTF-8'));
																		$insert_tbl_ev['liderazgo_ev'] = trim(mb_strtoupper($this -> input -> post('Liderazgo'), 'UTF-8'));
																		$insert_tbl_ev['responsabilidad_ev'] = trim(mb_strtoupper($this -> input -> post('Responsabilidad'), 'UTF-8'));
																		$insert_tbl_ev['ejecucion_ev'] = trim(mb_strtoupper($this -> input -> post('EjSim'), 'UTF-8'));
																		$insert_tbl_ev['confiabilidad_ev'] = trim(mb_strtoupper($this -> input -> post('Confiabilidad'), 'UTF-8'));
																		$insert_tbl_ev['social_ev'] = trim(mb_strtoupper($this -> input -> post('ResSocial'), 'UTF-8'));
																		$insert_tbl_ev['manejo_ev'] = trim(mb_strtoupper($this -> input -> post('ManCon'), 'UTF-8'));
																		$insert_tbl_ev['rendimiento_ev'] = trim(mb_strtoupper($this -> input -> post('RenPre'), 'UTF-8'));
																		$insert_tbl_ev['trabajo_ev'] = trim(mb_strtoupper($this -> input -> post('TraEqui'), 'UTF-8'));
																		$insert_tbl_ev['asertividad_ev'] = trim(mb_strtoupper($this -> input -> post('Asertividad'), 'UTF-8'));
																		$insert_tbl_ev['empuje_ev'] = trim(mb_strtoupper($this -> input -> post('Empuje'), 'UTF-8'));
																		$insert_tbl_ev['comentarios_ev'] = trim(mb_strtoupper($this -> input -> post('Comentarios'), 'UTF-8'));
																		$insert_tbl_ev['mes_ev'] = date('Y-m');
																		$operation_calificacion = $insert_tbl_ev['comunicacion_ev'] + $insert_tbl_ev['tolerancia_ev'] + $insert_tbl_ev['autocontrol_ev'] + $insert_tbl_ev['motivacion_ev'] +
																		$insert_tbl_ev['adaptacion_ev'] + $insert_tbl_ev['seguridad_ev'] + $insert_tbl_ev['creatividad_ev'] + $insert_tbl_ev['cooperacion_ev'] +
																		$insert_tbl_ev['normas_ev'] + $insert_tbl_ev['vision_ev'] + $insert_tbl_ev['planeacion_ev'] + $insert_tbl_ev['organizacional_ev'] + $insert_tbl_ev['seguimiento_ev'] +
																		$insert_tbl_ev['liderazgo_ev'] + $insert_tbl_ev['responsabilidad_ev'] + $insert_tbl_ev['ejecucion_ev'] + $insert_tbl_ev['confiabilidad_ev'] + $insert_tbl_ev['social_ev'] +
																		$insert_tbl_ev['manejo_ev'] + $insert_tbl_ev['rendimiento_ev'] + $insert_tbl_ev['trabajo_ev'] + $insert_tbl_ev['asertividad_ev'] + $insert_tbl_ev['empuje_ev'];
																		$operation_calificacion = $operation_calificacion / 23;
																		$insert_tbl_ev['calificacion_ev'] = number_format($operation_calificacion, 1, '.', '');
																		$insert_tbl_ev['nuevo_ev'] = 2;
																		if (preg_match('/^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\s_ ]+$/', $insert_tbl_ev['comentarios_ev'])) { // validamos el formato de los campos
																			$result_insert_tbl_ev = $this -> mm -> insert($tbl_ev, $insert_tbl_ev); // insertamos la evaluación
																			$insert_tbl_mu['movimiento_mu'] = 23; // insertamos el movimiento realizado
																			$insert_tbl_mu['usuario_mu'] = $session_login;
																			$insert_tbl_mu['receptor_mu'] = $query_controller['tbl_e'] -> numero_empleado_e;
																			$insert_tbl_mu['hora_mu'] = date('H:i:s');
																			$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																			$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																			if ($result_insert_tbl_ev == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																				$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																				$query_view_popup['text'] = "¡La evaluación se generó correctamente!";
																				$query_view_popup['type'] = "success";
																				$query_view_popup['ruta'] = "ruta";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('main/Header', $query_header);
																				$this -> load -> view('menu/manager', $query_menu);
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
																				$this -> load -> view('menu/manager', $query_menu);
																				$this -> load -> view('bug/404');
																				$this -> load -> view('popup/popup_time', $query_view_popup);
																				$this -> load -> view('main/Footer');
																			}
																		}
																		else { // los formatos no son correctos | mandamos alerta de error
																			$query_view_popup['title'] = "¡ERROR!";
																			$query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
																			$query_view_popup['type'] = "error";
																			$query_view_popup['ruta'] = "ruta";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('main/Header', $query_header);
																			$this -> load -> view('menu/manager', $query_menu);
																			$this -> load -> view('bug/404');
																			$this -> load -> view('popup/popup_time', $query_view_popup);
																			$this -> load -> view('main/Footer');
																		}
																	}
																	else { // el código ya existe en la db | mandamos alerta de error
																		$query_view_popup['title'] = "!ERROR!";
																		$query_view_popup['text'] = "¡Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																		$query_view_popup['type'] = "error";
																		$query_view_popup['ruta'] = "ruta";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('menu/manager', $query_menu);
																		$this -> load -> view('bug/404');
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																}
															}
															else { // no existe una evaluación | insertamos la primera evaluación
																$library_code = 7;
																$result_library_code_ev = trim($this -> random_code_generator -> index($library_code));
																$insert_tbl_ev['codigo_ev'] = preg_replace('[\s+]',"", "ap-ev-".$query_controller['tbl_e'] -> numero_empleado_e."-".$result_library_code_ev);
																$select = "encrypt_codigo_ev";
																$query_controller_tbl_ev['folio'] = $this -> mm -> getAllWhere1($select, $tbl_ev, $fields_ev_codigo, $insert_tbl_ev['codigo_ev']);
																if (empty($query_controller_tbl_ev['folio'])) { // validamos si existe el código en la db
																	$insert_tbl_ev['encrypt_codigo_ev'] = hash('whirlpool', $insert_tbl_ev['codigo_ev']);
																	$insert_tbl_ev['empleado_ev'] = $query_controller['tbl_e'] -> id_e;
																	$insert_tbl_ev['fecha_evaluacion_ev'] = date('Y-m-d');
																	$insert_tbl_ev['comunicacion_ev'] = trim(mb_strtoupper($this -> input -> post('comunicacion'), 'UTF-8'));
																	$insert_tbl_ev['tolerancia_ev'] = trim(mb_strtoupper($this -> input -> post('TolFru'), 'UTF-8'));
																	$insert_tbl_ev['autocontrol_ev'] = trim(mb_strtoupper($this -> input -> post('Autocontrol'), 'UTF-8'));
																	$insert_tbl_ev['motivacion_ev'] = trim(mb_strtoupper($this -> input -> post('Motivacion'), 'UTF-8'));
																	$insert_tbl_ev['adaptacion_ev'] = trim(mb_strtoupper($this -> input -> post('Adaptacion'), 'UTF-8'));
																	$insert_tbl_ev['seguridad_ev'] = trim(mb_strtoupper($this -> input -> post('Seguridad'), 'UTF-8'));
																	$insert_tbl_ev['creatividad_ev'] = trim(mb_strtoupper($this -> input -> post('Creatividad'), 'UTF-8'));
																	$insert_tbl_ev['cooperacion_ev'] = trim(mb_strtoupper($this -> input -> post('Cooperacion'), 'UTF-8'));
																	$insert_tbl_ev['normas_ev'] = trim(mb_strtoupper($this -> input -> post('ApNormas'), 'UTF-8'));
																	$insert_tbl_ev['vision_ev'] = trim(mb_strtoupper($this -> input -> post('VisCom'), 'UTF-8'));
																	$insert_tbl_ev['planeacion_ev'] = trim(mb_strtoupper($this -> input -> post('Planeacion'), 'UTF-8'));
																	$insert_tbl_ev['organizacional_ev'] = trim(mb_strtoupper($this -> input -> post('Organizacional'), 'UTF-8'));
																	$insert_tbl_ev['seguimiento_ev'] = trim(mb_strtoupper($this -> input -> post('SegInst'), 'UTF-8'));
																	$insert_tbl_ev['liderazgo_ev'] = trim(mb_strtoupper($this -> input -> post('Liderazgo'), 'UTF-8'));
																	$insert_tbl_ev['responsabilidad_ev'] = trim(mb_strtoupper($this -> input -> post('Responsabilidad'), 'UTF-8'));
																	$insert_tbl_ev['ejecucion_ev'] = trim(mb_strtoupper($this -> input -> post('EjSim'), 'UTF-8'));
																	$insert_tbl_ev['confiabilidad_ev'] = trim(mb_strtoupper($this -> input -> post('Confiabilidad'), 'UTF-8'));
																	$insert_tbl_ev['social_ev'] = trim(mb_strtoupper($this -> input -> post('ResSocial'), 'UTF-8'));
																	$insert_tbl_ev['manejo_ev'] = trim(mb_strtoupper($this -> input -> post('ManCon'), 'UTF-8'));
																	$insert_tbl_ev['rendimiento_ev'] = trim(mb_strtoupper($this -> input -> post('RenPre'), 'UTF-8'));
																	$insert_tbl_ev['trabajo_ev'] = trim(mb_strtoupper($this -> input -> post('TraEqui'), 'UTF-8'));
																	$insert_tbl_ev['asertividad_ev'] = trim(mb_strtoupper($this -> input -> post('Asertividad'), 'UTF-8'));
																	$insert_tbl_ev['empuje_ev'] = trim(mb_strtoupper($this -> input -> post('Empuje'), 'UTF-8'));
																	$insert_tbl_ev['comentarios_ev'] = trim(mb_strtoupper($this -> input -> post('Comentarios'), 'UTF-8'));
																	$insert_tbl_ev['mes_ev'] = date('Y-m');
																	$operation_calificacion = $insert_tbl_ev['comunicacion_ev'] + $insert_tbl_ev['tolerancia_ev'] + $insert_tbl_ev['autocontrol_ev'] + $insert_tbl_ev['motivacion_ev'] +
																	$insert_tbl_ev['adaptacion_ev'] + $insert_tbl_ev['seguridad_ev'] + $insert_tbl_ev['creatividad_ev'] + $insert_tbl_ev['cooperacion_ev'] +
																	$insert_tbl_ev['normas_ev'] + $insert_tbl_ev['vision_ev'] + $insert_tbl_ev['planeacion_ev'] + $insert_tbl_ev['organizacional_ev'] + $insert_tbl_ev['seguimiento_ev'] +
																	$insert_tbl_ev['liderazgo_ev'] + $insert_tbl_ev['responsabilidad_ev'] + $insert_tbl_ev['ejecucion_ev'] + $insert_tbl_ev['confiabilidad_ev'] + $insert_tbl_ev['social_ev'] +
																	$insert_tbl_ev['manejo_ev'] + $insert_tbl_ev['rendimiento_ev'] + $insert_tbl_ev['trabajo_ev'] + $insert_tbl_ev['asertividad_ev'] + $insert_tbl_ev['empuje_ev'];
																	$operation_calificacion = $operation_calificacion / 23;
																	$insert_tbl_ev['calificacion_ev'] = number_format($operation_calificacion, 1, '.', '');
																	$insert_tbl_ev['nuevo_ev'] = 2;
																	if (preg_match('/^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\s_ ]+$/', $insert_tbl_ev['comentarios_ev'])) { // validamos el formato de los campos
																		$result_insert_tbl_ev = $this -> mm -> insert($tbl_ev, $insert_tbl_ev); // insertamos la evaluación
																		$insert_tbl_mu['movimiento_mu'] = 23; // insertamos el movimiento realizado
																		$insert_tbl_mu['usuario_mu'] = $session_login;
																		$insert_tbl_mu['receptor_mu'] = $query_controller['tbl_e'] -> numero_empleado_e;
																		$insert_tbl_mu['hora_mu'] = date('H:i:s');
																		$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																		$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																		if ($result_insert_tbl_ev == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																			$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																			$query_view_popup['text'] = "¡La evaluación se generó correctamente!";
																			$query_view_popup['type'] = "success";
																			$query_view_popup['ruta'] = "ruta";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('main/Header', $query_header);
																			$this -> load -> view('menu/manager', $query_menu);
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
																			$this -> load -> view('menu/manager', $query_menu);
																			$this -> load -> view('bug/404');
																			$this -> load -> view('popup/popup_time', $query_view_popup);
																			$this -> load -> view('main/Footer');
																		}
																	}
																	else { // los formatos no son correctos | mandamos alerta de error
																		$query_view_popup['title'] = "¡ERROR!";
																		$query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
																		$query_view_popup['type'] = "error";
																		$query_view_popup['ruta'] = "ruta";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('menu/manager', $query_menu);
																		$this -> load -> view('bug/404');
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																}
																else { // el código ya existe en la db | mandamos alerta de error
																	$query_view_popup['title'] = "¡ERROR!";
																	$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud. Inentalo nuevamente.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/manager', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
														}
														else { // no seleccionaron empleado | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Favor de validar que seleccionaste empleado y que calificaste todos los rubros de la evaluación.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													// no viene información | redirigimos a la página de error 404
													else {
														$this -> load -> view('main/Header', $query_header);
													  $this -> load -> view('menu/manager', $query_menu);
													  $this -> load -> view('bug/404');
													  $this -> load -> view('main/Footer');
													}
												}
												else { // viene información en la url | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- generar visita --------------- //
											case 'generate-visit':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$insert_tbl_vi['visitante_vi'] = trim(mb_strtoupper($this -> input -> post('visitante_vi'), 'UTF-8'));
													$insert_tbl_vi['departamento_vi'] = trim(mb_strtoupper($this -> input -> post('departamento_vi'), 'UTF-8'));
													$insert_tbl_vi['hora_vi'] = trim(mb_strtoupper($this -> input -> post('hora_vi'), 'UTF-8'));
													$insert_tbl_vi['fecha_vi'] = trim(mb_strtoupper($this -> input -> post('fecha_vi'), 'UTF-8'));
													$insert_tbl_vi['motivo_vi'] = trim(mb_strtoupper($this -> input -> post('motivo_vi'), 'UTF-8'));
													if (!empty($insert_tbl_vi['visitante_vi'])) { // validamos si viene información del formuario
														if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $insert_tbl_vi['visitante_vi']) &&
																preg_match('/^[0-4]+$/', $insert_tbl_vi['departamento_vi']) &&
																preg_match('/^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\s_ ]+$/', $insert_tbl_vi['motivo_vi'])) { // validamos el formato de los campos
															$library_code = 14;
															$result_library_code_vi = trim($this -> random_code_generator -> index($library_code));
															$insert_tbl_vi['codigo_vi'] = preg_replace('[\s+]',"", "ap-vi-".$result_library_code_vi);
															$insert_tbl_vi['encrypt_codigo_vi'] = hash('whirlpool', $insert_tbl_vi['codigo_vi']);
															$select = "encrypt_codigo_vi";
															$query_controller_tbl_vi['folio'] = $this -> mm -> getAllWhere1($select, $tbl_vi, $fields_vi_encrypt, $insert_tbl_vi['encrypt_codigo_vi']);
															if (empty($query_controller_tbl_vi['folio'])) { // validamos si existe el código en la db
																$insert_tbl_vi['nuevo_vi'] = 2;
																$result_insert_tbl_vi = $this -> mm -> insert($tbl_vi, $insert_tbl_vi);
																$insert_tbl_mu['movimiento_mu'] = 37; // insertamos el movimiento realizado
																$insert_tbl_mu['usuario_mu'] = $session_login;
																$insert_tbl_mu['receptor_mu'] = $insert_tbl_vi['visitante_vi'];
																$insert_tbl_mu['hora_mu'] = date('H:i:s');
																$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																if ($result_insert_tbl_vi == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																	$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																	$query_view_popup['text'] = "¡Se generó exitosamente la visita!";
																	$query_view_popup['type'] = "success";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/manager', $query_menu);
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
																	$this -> load -> view('menu/manager', $query_menu);
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // el código si existe en la db | mandamos alerta de error
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/manager', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														// los formatos no son correctos | mandamos alerta de error
														else {
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // no viene información del formulario | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/manager', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- generar pase de salida --------------- //
											case 'generate-exit-pass':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$query_form_empleado_ps = trim(mb_strtoupper($this -> input -> post('empleado_p_s'), 'UTF-8'));
													$query_form_motivo_ps = trim(mb_strtoupper($this -> input -> post('motivo_p_s'), 'UTF-8'));
													if (!empty($query_form_empleado_ps)) { // validamos que venga información del formulario
														$select = "id_e, numero_empleado_e";
														$query_controller_tbl_ps['empleado'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $query_form_empleado_ps);
														if (!empty($query_controller_tbl_ps['empleado'])) { // validamos que el empleado exista
															$insert_tbl_ps['empleado_ps'] = $query_controller_tbl_ps['empleado'] -> id_e;
															$library_code = 7;
															$result_library_code_ps = trim($this -> random_code_generator -> index($library_code));
															$insert_tbl_ps['folio_ps'] = preg_replace('[\s+]',"", "ap-ps-".$query_controller_tbl_ps['empleado'] -> numero_empleado_e."-".$result_library_code_ps);
															$insert_tbl_ps['encrypt_folio_ps'] = hash('whirlpool', $insert_tbl_ps['folio_ps']);
															$select = "encrypt_folio_ps";
															$query_controller_tbl_ps['folio'] = $this -> mm -> getRowWhere1($select, $tbl_ps, $fields_ps_encrypt, $insert_tbl_ps['encrypt_folio_ps']);
															if (empty($query_controller_tbl_ps['folio'])) { // validamos si el folio ya existe
																$insert_tbl_ps['title_ps'] = "Pase de salida";
																$insert_tbl_ps['color_ps'] = "#8a0c0c";
																$insert_tbl_ps['textcolor_ps'] = "#ffffff";
																$insert_tbl_ps['hora_ps'] = trim(mb_strtoupper($this -> input -> post('hora_p_s'), 'UTF-8'));
																$insert_tbl_ps['start_ps'] = date('Y-m-d');
																$insert_tbl_ps['motivo_ps'] = $query_form_motivo_ps;
																$insert_tbl_ps['autorizado_ps'] = 1;
																$insert_tbl_ps['nuevo_ps'] = 2;
																if (preg_match('/^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\s_ ]+$/', $insert_tbl_ps['motivo_ps'])) { // validamos el formato de los campos
																	$result_insert_tbl_ps = $this -> mm -> insert($tbl_ps, $insert_tbl_ps); // insertamos el pase de salida
																	$insert_tbl_mu['movimiento_mu'] = 36; // insertamos el movimiento realizado
																	$insert_tbl_mu['usuario_mu'] = $session_login;
																	$insert_tbl_mu['receptor_mu'] = $query_controller_tbl_ps['empleado'] -> numero_empleado_e;
																	$insert_tbl_mu['hora_mu'] = date('H:i:s');
																	$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																	$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																	if ($result_insert_tbl_ps == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																		$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																		$query_view_popup['text'] = "¡Se generó exitosamento el pase!";
																		$query_view_popup['type'] = "success";
																		$query_view_popup['ruta'] = "ruta";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('menu/manager', $query_menu);
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
																		$this -> load -> view('menu/manager', $query_menu);
																		$this -> load -> view('bug/404');
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																}
																else { // los formatos no son correctos | mandamos alerta de error
																  $query_view_popup['title'] = "¡ERROR!";
																  $query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
																  $query_view_popup['type'] = "error";
																  $query_view_popup['ruta'] = "ruta";
																  // --------------- VISTAS --------------- //
																  $this -> load -> view('main/Header', $query_header);
																  $this -> load -> view('menu/manager', $query_menu);
																	$this -> load -> view('bug/404');
																  $this -> load -> view('popup/popup_time', $query_view_popup);
																  $this -> load -> view('main/Footer');
																}
															}
															else { // el folio ya existe | mandamos alerta de error
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/manager', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // el empleado no existe en la db | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // no viene información | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/manager', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver los pases de salida de mi equipo --------------- //
											case 'view-exit-pass-of-my-team':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, start_ps, hora_ps";
													$query_view_oep['tbl_ps'] = $this -> mm -> getAllInner2Where1For($select, $tbl_e, $tbl_ps, $fields_e_id, $fields_ps_empleado, $fields_e_puesto, $query_menu['tbl_pue'], $fields_pue_id); // obtenemos todos los empleados de la empresa con pases de salida
													if (!empty($query_view_oep['tbl_ps'])) { // validamos que existan pases de salida | para contabilizarlas
													  $query_view_oep['total_tbl_ps'] = count($query_view_oep['tbl_ps']);
													}
													else { // no existen pases de salida | mandamos el valor total en 0
													  $query_view_oep['total_tbl_ps'] = 0;
													}
													$query_view_oep['tbl_em_ruta'] = $universal_company; // ruta para la foto
													$insert_tbl_mu['movimiento_mu'] = 40; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('manager/exit_passes/our_exit_pass', $query_view_oep);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- generar un permiso --------------- //
											case 'add-permissions':
												if (empty($universal_url[1])) { // validamos que venga información en la variable
													$query_form_empleado_p = trim(mb_strtoupper($this -> input -> post('selectempleado'), 'UTF-8'));
													$query_form_motivo_p = trim(mb_strtoupper($this -> input -> post('Motivo'), 'UTF-8'));
													if (!empty($query_form_empleado_p) && preg_match('/^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\s_ ]+$/', $query_form_motivo_p)) { // validamos que venga la información y el formato sea el correcto
														$select = "id_e, numero_empleado_e";
														$query_controller_tbl_p['empleado'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $query_form_empleado_p);
														if (!empty($query_controller_tbl_p['empleado'])) { // validamos que el empleado exista
															$select = "horas_p";
															$query_controller_tbl_p['time'] = $this -> mm -> getAllWhere1AndLike1($select, $tbl_p, $fields_p_empleado, $query_controller_tbl_p['empleado'] -> id_e, $fields_p_permiso, date('Y-m'));
															if (!empty($query_controller_tbl_p['time'])) { // validamos que existan permisos | para contabilizarlas
																$operation_parcialhoras = 0;
																$operation_totalquery = count($query_controller_tbl_p['time']);
																$operation_result = count($query_controller_tbl_p['time']);
																for ($i=0; $i <= $operation_result -1 ; $i++) {
																	$operation_parcialhoras += $query_controller_tbl_p['time'][$i] -> horas_p;
																}
															}
															else { // no existen permisos | mandamos el valor total en 0
																$operation_totalquery = 0;
																$operation_parcialhoras = 0;
															}
															if ($operation_totalquery < 3) { // validamos el número total de permisos sea <= 3
																$operation_totalhoras = $operation_parcialhoras + $this -> input -> post('horas');
																if ($operation_parcialhoras < 5 && $operation_totalhoras <= 6) { // validamos que no haya excedido el total de horas por mes
																	$library_code = 7;
																	$result_library_code_p = trim($this -> random_code_generator -> index($library_code));
																	$insert_tbl_p['folio_p'] = preg_replace('[\s+]',"", "ap-p-".$query_controller_tbl_p['empleado'] -> numero_empleado_e."-".$result_library_code_p);
																	$insert_tbl_p['encrypt_folio_p'] = hash('whirlpool', $insert_tbl_p['folio_p']);
																	$select = "encrypt_folio_p";
																	$query_controller_tbl_p['folio'] = $this -> mm -> getAllWhere1($select, $tbl_p, $fields_p_encrypt, $insert_tbl_p['encrypt_folio_p']);
																	if (empty($query_controller_tbl_p['folio'])) { // buscamos si existe un código igual en la db
																		$insert_tbl_p['empleado_p'] = $query_controller_tbl_p['empleado'] -> id_e;
																		$insert_tbl_p['titulo_p'] = "Permiso";
																		$insert_tbl_p['color_p'] = "#b52100";
																		$insert_tbl_p['textcolor_p'] = "#ffffff";
																		$insert_tbl_p['fecha_solicitud_p'] = date('Y-m-d');
																		$insert_tbl_p['horas_p'] = trim($this -> input -> post('horas'));
																		$insert_tbl_p['inicio_p'] = trim($this -> input -> post('horastart'));
																		$insert_tbl_p['fin_p'] = trim($this -> input -> post('horaend'));
																		$insert_tbl_p['fecha_permiso_p'] = trim($this -> input -> post('FPermiso'));
																		$insert_tbl_p['motivo_p'] = $query_form_motivo_p;
																		$insert_tbl_p['autorizado_p'] = 2;
																		$insert_tbl_p['nuevo_p'] = 2;
																		$result_insert_tbl_p = $this -> mm -> insert($tbl_p, $insert_tbl_p); // no existe un código | insertamos el permiso
												 						$insert_tbl_mu['movimiento_mu'] = 11; // insertamos el movimiento realizado
												 						$insert_tbl_mu['usuario_mu'] = $session_login;
												 						$insert_tbl_mu['receptor_mu'] = $query_controller_tbl_p['empleado'] -> numero_empleado_e;
																		$insert_tbl_mu['hora_mu'] = date('H:i:s');
																		$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
												 						$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																		if ($result_insert_tbl_p == "true" && $result_insert_tbl_mu = "true") { // validamos si se ejecutaron los querys
																			$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																			$query_view_popup['text'] = "¡Se generó exitosamento el permiso!";
																			$query_view_popup['type'] = "success";
																			$query_view_popup['ruta'] = "ruta";
																			// --------------- VISTAS --------------- //
												 							$this -> load -> view('main/Header', $query_header);
												 							$this -> load -> view('menu/manager', $query_menu);
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
												 							$this -> load -> view('menu/manager', $query_menu);
																			$this -> load -> view('bug/404');
												 							$this -> load -> view('popup/popup_time', $query_view_popup);
												 							$this -> load -> view('main/Footer');
																		}
																	}
																	else { // si existe el código | mandamos alerta de error
																		$query_view_popup['title'] = "¡ERROR!";
																		$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																		$query_view_popup['type'] = "error";
																		$query_view_popup['ruta'] = "ruyta";
																		// --------------- VISTAS --------------- //
											 							$this -> load -> view('main/Header', $query_header);
											 							$this -> load -> view('menu/manager', $query_menu);
																		$this -> load -> view('bug/404');
											 							$this -> load -> view('popup/popup_time', $query_view_popup);
											 							$this -> load -> view('main/Footer');
																	}
																}
																else { // si excedio el total de horas | mandamos alerta de error
																	$query_view_popup['title'] = "¡ERROR!";
																	$query_view_popup['text'] = "Lo sentimos no podemos agregar tu permiso porque con el permiso excedes tus 6 horas por mes.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
										 							$this -> load -> view('main/Header', $query_header);
										 							$this -> load -> view('menu/manager', $query_menu);
																	$this -> load -> view('bug/404');
										 							$this -> load -> view('popup/popup_time', $query_view_popup);
										 							$this -> load -> view('main/Footer');
																}
															}
															else { // el número de permisos excedio los minimos | mandamos alerta de error
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "Lo sentimos este empleado ya no cuenta con permisos este mes.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/manager', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // el empleado no existe en la db | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
								 							$this -> load -> view('main/Header', $query_header);
								 							$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
								 							$this -> load -> view('popup/popup_time', $query_view_popup);
								 							$this -> load -> view('main/Footer');
														}
													}
													else { // el formato no es el correcto |  mandamos alerta de error
														$query_view_popup['title'] = "¡ERROR!";
														$query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
														$query_view_popup['type'] = "error";
														$query_view_popup['ruta'] = "ruta";
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/manager', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('popup/popup_time', $query_view_popup);
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- buscar el empleado en la base de datos --------------- //
											case 'look-for-ajax-employee':
												if (!empty($universal_url[1])) { // validamos que venga información en la variable
													$select = "numero_empleado_e";
													$query_controller['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
													echo json_encode($query_controller);
												}
												else { // no viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver los permisos de mi equipo --------------- //
											case 'view-permissions-of-my-team':
												if (empty($universal_url[1])) { // validamos que venga información en la variable
													$select = "id_e, foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, encrypt_folio_p, horas_p, inicio_p, fin_p, fecha_permiso_p, autorizado_p";
													$query_view_owp['tbl_p'] = $this -> mm -> getAllInner2Where1For($select, $tbl_e, $tbl_p, $fields_e_id, $fields_p_empleado, $fields_e_puesto, $query_menu['tbl_pue'], $fields_pue_id);
													if (!empty($query_view_owp['tbl_p'])) { // validamos que existan permisos | para contabilizarlas
													  $query_view_owp['total_tbl_p'] = count($query_view_owp['tbl_p']);
													}
													else { // no existen permisos | mandamos el valor total en 0
													  $query_view_owp['total_tbl_p'] = 0;
													}
													$query_view_owp['tbl_e'] = $query_header['tbl_e']; // mandamos el empleado para validar si los permisos son de un gerente
													$insert_tbl_mu['movimiento_mu'] = 43; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('manager/permissions/our_work_permits', $query_view_owp);
													$this -> load -> view('main/Footer');
												}
												else { // viene información en el url | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- autorizar permisos de mi equipo --------------- //
											case 'authorize-permissions':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos que venga información en la variable
														$select = "encrypt_folio_p, autorizado_p, empleado_p";
														$query_controller_tbl_p['folio'] = $this -> mm -> getRowWhere1($select, $tbl_p, $fields_p_encrypt, $universal_url[1]);
														if (!empty($query_controller_tbl_p['folio'])) { // si viene la variable | validamos que exista el permiso
															if ($query_controller_tbl_p['folio'] -> autorizado_p == 2) { // validamos que el estatus del jefe este sin autorizar
																$result_update_tbl_p = $this -> mm -> updateOneWhere1($tbl_p, $fields_p_autorizado, $num_val1, $fields_p_encrypt, $query_controller_tbl_p['folio'] -> encrypt_folio_p); // el permiso no esta autorizado | actualizamos el status
																$select = "numero_empleado_e";
																$query_controller['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $query_controller_tbl_p['folio'] -> empleado_p); // buscamos al empleado para generar el movimiento
																$insert_tbl_mu['movimiento_mu'] = 12; // insertamos el movimiento realizado
																$insert_tbl_mu['usuario_mu'] = $session_login;
																$insert_tbl_mu['receptor_mu'] = $query_controller['tbl_e'] -> numero_empleado_e;
																$insert_tbl_mu['hora_mu'] = date('H:i:s');
																$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																if ($result_update_tbl_p == "true" && $result_insert_tbl_mu = "true") { // validamos si se ejecutaron los querys
																	$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																	$query_view_popup['text'] = "¡El permiso se autorizó!";
																	$query_view_popup['type'] = "success";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/manager', $query_menu);
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
																	$this -> load -> view('menu/manager', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // el permiso ya esta autorizado | mandamos alerta de error
																$query_view_popup['title'] = "¡ATENCIÓN!";
																$query_view_popup['text'] = "Lo sentimos este permiso ya se autorizó.";
																$query_view_popup['type'] = "info";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/manager', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // el permiso no existe | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // no viene información | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
													  $this -> load -> view('menu/manager', $query_menu);
													  $this -> load -> view('bug/404');
													  $this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
												  $this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- agregar un permiso urgente --------------- //
											case 'generate-urgent-permission':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$query_form_empleado_pu = trim($this -> input -> post('selectempleadoperU'));
													$query_form_motivo_pu = trim(mb_strtoupper($this -> input -> post('MotivoPerU'), 'UTF-8'));
													if (!empty($query_form_empleado_pu) && preg_match('/^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\s_ ]+$/', $query_form_motivo_pu)) { // validamos que venga la información y el formato sea el correcto
														$select = "id_e, numero_empleado_e";
														$query_controller['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $query_form_empleado_pu); // el formato si es el correcto | buscamos al empleado
														if (!empty($query_controller['tbl_e'])) { // validamos que el empleado exista
															$select = "encrypt_folio_pu";
															$query_controller_tbl_pu['folio'] = $this -> mm -> getAllWhere1AndLike1($select, $tbl_pu, $fields_pu_empleado, $query_controller['tbl_e'] -> id_e, $fields_pu_fecha, date('Y-m'));
															if (!empty($query_controller_tbl_pu['folio'])) { // validamos que existan permisos urgentes | para contabilizarlas
																$operation_totalquery = count($query_controller_tbl_pu['folio']);
															}
															else { // no existen permisos urgentes | mandamos el valor total en 0
																$operation_totalquery = 0;
															}
															if ($operation_totalquery < 3) { // validamos que el total de pases sea menor a 3 por mes
																$insert_tbl_pu['empleado_pu'] = $query_controller['tbl_e'] -> id_e;
																$library_code = 7;
																$result_library_code_pu = trim($this -> random_code_generator -> index($library_code));
																$insert_tbl_pu['folio_pu'] = preg_replace('[\s+]',"", "ap-pu-".$query_controller['tbl_e'] -> numero_empleado_e."-".$result_library_code_pu);
																$insert_tbl_pu['encrypt_folio_pu'] = hash('whirlpool', $insert_tbl_pu['folio_pu']);
																$select = "encrypt_folio_pu";
																$query_controller_tbl_pu['folio_pu'] = $this -> mm -> getAllWhere1($select, $tbl_pu, $fields_pu_encrypt, $insert_tbl_pu['encrypt_folio_pu']);
																if (empty($query_controller_tbl_pu['folio_pu'])) { // buscamos si existe un código igual en la db
																	$insert_tbl_pu['titulo_pu'] = "Permiso urgente";
																	$insert_tbl_pu['color_pu'] = "#8a0c0c";
																	$insert_tbl_pu['textcolor_pu'] = "#ffffff";
																	$insert_tbl_pu['hora_pu'] = trim($this -> input -> post('horaPerU'));
																	$insert_tbl_pu['fecha_pu'] = date('Y-m-d');
																	$insert_tbl_pu['motivo_pu'] = $query_form_motivo_pu;
																	$insert_tbl_pu['autorizado_pu'] = 1;
																	$insert_tbl_pu['nuevo_pu'] = 2;
																	$result_insert_tbl_pu = $this -> mm -> insert($tbl_pu, $insert_tbl_pu); // insertamos el permiso urgente
											 						$insert_tbl_mu['movimiento_mu'] = 27; // insertamos el movimiento realizado
											 						$insert_tbl_mu['usuario_mu'] = $session_login;
											 						$insert_tbl_mu['receptor_mu'] = $query_controller['tbl_e'] -> numero_empleado_e;
																	$insert_tbl_mu['hora_mu'] = date('H:i:s');
																	$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
											 						$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																	if ($result_insert_tbl_pu == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																		$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																		$query_view_popup['text'] = "¡Se generó exitosamento el permiso!";
																		$query_view_popup['type'] = "success";
																		$query_view_popup['ruta'] = "ruta";
																		// --------------- VISTAS --------------- //
											 							$this -> load -> view('main/Header', $query_header);
											 							$this -> load -> view('menu/manager', $query_menu);
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
																	  $this -> load -> view('menu/manager', $query_menu);
																	  $this -> load -> view('popup/popup_time', $query_view_popup);
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
																	$this -> load -> view('menu/manager', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // no es menor a 3 | mandamos alerta de error
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "Lo sentimos este empleado ya no cuenta con permisos urgentes este mes.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
									 							$this -> load -> view('main/Header', $query_header);
									 							$this -> load -> view('menu/manager', $query_menu);
																$this -> load -> view('bug/404');
									 							$this -> load -> view('popup/popup_time', $query_view_popup);
									 							$this -> load -> view('main/Footer');
															}
														}
														else { // el empleado no existe en la db | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
								 							$this -> load -> view('main/Header', $query_header);
								 							$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
								 							$this -> load -> view('popup/popup_time', $query_view_popup);
								 							$this -> load -> view('main/Footer');
														}
													}
													else { // el formato no es el correcto |  mandamos alerta de error
														$query_view_popup['title'] = "¡ERROR!";
														$query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
														$query_view_popup['type'] = "error";
														$query_view_popup['ruta'] = "ruta";
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/manager', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('popup/popup_time', $query_view_popup);
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
												  $this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver los permisos urgentes de mi equipo --------------- //
											case 'view-urgent-permissions-of-my-team':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, hora_pu, fecha_pu";
													$query_view_owup['tbl_pu'] = $this -> mm -> getAllInner2Where1For($select, $tbl_e, $tbl_pu, $fields_e_id, $fields_pu_empleado, $fields_e_puesto, $query_menu['tbl_pue'], $fields_pue_id); // obtenemos los emprleados con permisos
													if (!empty($query_view_owup['tbl_pu'])) { // validamos que existan permisos urgentes | para contabilizarlas
													  $query_view_owup['total_tbl_pu'] = count($query_view_owup['tbl_pu']);
													}
													else { // no existen permisos urgentes | mandamos el valor total en 0
													  $query_view_owup['total_tbl_pu'] = 0;
													}
													$query_view_owup['tbl_e'] = $query_header['tbl_e']; // mandamos el empleado para validar si los permisos son de un gerente
													$insert_tbl_mu['movimiento_mu'] = 44; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('manager/urgent_permits/our_work_urgent_permits', $query_view_owup);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
												  $this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las vacaciones de mi equipo --------------- //
											case 'view-the-holidays-of-my-team':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "foto_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, start, end, encrypt_codigo_v, autorizado_v";
													$query_view_ov['tbl_v'] = $this -> mm -> getAllInner2Where1For($select, $tbl_e, $tbl_v, $fields_e_id, $fields_v_empleado, $fields_e_puesto, $query_menu['tbl_pue'], $fields_pue_id);
													if (!empty($query_view_ov['tbl_v'])) { // validamos que existan vacantes | para contabilizarlas
													  $query_view_ov['total_tbl_v'] = count($query_view_ov['tbl_v']);
													}
													else { // no existen vacantes | mandamos el valor total en 0
													  $query_view_ov['total_tbl_v'] = 0;
													}
													$query_view_ov['tbl_e'] = $query_header['tbl_e']; // mandamos el empleado para validar si los permisos son de un gerente
													$insert_tbl_mu['movimiento_mu'] = 45; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('manager/holidays/our_holidays', $query_view_ov);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
												  $this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- autorizar vacaciones --------------- //
											case 'authorize-holidays':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos que venga información en la variable
														$select = "numero_empleado_e, id_v, autorizado_v";
														$controller_tbl_v = $this -> mm -> getRowInner2Where1($select, $tbl_v, $tbl_e, $fields_v_empleado, $fields_e_id, $fields_v_encrypt, $universal_url[1]);
														if (!empty($controller_tbl_v)) { // si viene la variable | validamos que exista el día de vacación
															if ($controller_tbl_v -> autorizado_v == 2) { // validamos que el estatus del jefe este sin autorizar
																$result_update_tbl_v = $this -> mm -> updateOneWhere1($tbl_v, $fields_v_autorizado, $num_val1, $fields_v_encrypt, $universal_url[1]); // el día de vacación no esta autorizado | actualizamos el status
																$insert_tbl_mu['movimiento_mu'] = 13; // insertamos el movimiento realizado
																$insert_tbl_mu['usuario_mu'] = $session_login;
																$insert_tbl_mu['receptor_mu'] = $controller_tbl_v -> numero_empleado_e;
																$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																if ($result_update_tbl_v == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																	$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																	$query_view_popup['text'] = "¡El día de vacación se autorizo!";
																	$query_view_popup['type'] = "success";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/manager', $query_menu);
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
																	$this -> load -> view('menu/manager', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // el día de vacación ya esta autorizado | mandamos alerta de error
																$query_view_popup['title'] = "¡ATENCIÓN!";
																$query_view_popup['text'] = "Lo sentimos este día ya se autorizó.";
																$query_view_popup['type'] = "info";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/manager', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // no existe el día de vacación | redirigimos a la página de error 404
															$this -> load -> view('main/Header', $query_header);
														  $this -> load -> view('menu/manager', $query_menu);
														  $this -> load -> view('bug/404');
														  $this -> load -> view('main/Footer');
														}
													}
													else { // no viene información | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
													  $this -> load -> view('menu/manager', $query_menu);
													  $this -> load -> view('bug/404');
													  $this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
												  $this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- agregar nueva vacante --------------- //
											case 'add-job-vacancy':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$library_code = 14; // obtenemos los datos del formulario
													$result_library_code_va = trim($this -> random_code_generator -> index($library_code));
													$insert_tbl_va['codigo_va'] = preg_replace('[\s+]',"", "ap-va-".$result_library_code_va);
													$insert_tbl_va['encrypt_codigo_va'] = hash('whirlpool', $insert_tbl_va['codigo_va']);
													$insert_tbl_va['puesto_va'] = trim(mb_strtoupper($this -> input -> post('Puesto'), 'UTF-8'));
													$insert_tbl_va['lugar_trabajo_va'] = trim(mb_strtoupper($this -> input -> post('LTrabajo'), 'UTF-8'));
													$insert_tbl_va['empleados_va'] = trim(mb_strtoupper($this -> input -> post('empleados_va'), 'UTF-8'));
													$insert_tbl_va['sueldo_va'] = trim(mb_strtoupper($this -> input -> post('Sueldo'), 'UTF-8'));
													$insert_tbl_va['actividades_va'] = trim(mb_strtoupper($this -> input -> post('aDesempenae'), 'UTF-8'));
													$insert_tbl_va['requisitos_va'] = trim(mb_strtoupper($this -> input -> post('Requisitos'), 'UTF-8'));
													$insert_tbl_va['fecha_limite_va'] = trim(mb_strtoupper($this -> input -> post('FLimite'), 'UTF-8'));
													$insert_tbl_va['fecha_cubierta_va'] = "0000-00-00";
													$insert_tbl_va['empresa_va'] = $query_header['tbl_em'] -> id_em;
													$insert_tbl_va['status_va'] = 1;
													$insert_tbl_va['autorizado_va'] = 2;
													$insert_tbl_va['fecha_solicitud_va'] = date('Y-m-d');
													$insert_tbl_va['nuevo_va'] = 2;
													if (!empty($insert_tbl_va['puesto_va'])) { // validamos que venga la información del formulario
														if ($insert_tbl_va['puesto_va'] != "selecciona-el-puesto"
																&& preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $insert_tbl_va['lugar_trabajo_va'])
																&& preg_match('/^[0-9]+$/', $insert_tbl_va['empleados_va'])
																&& preg_match('/^[0-9]+$/', $insert_tbl_va['sueldo_va'])
																&& preg_match('/^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\s_ ]+$/', $insert_tbl_va['actividades_va'])
																&& preg_match('/^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\s_ ]+$/', $insert_tbl_va['requisitos_va'])){ // validamos que la información tenga el formato correcto
															$select = "encrypt_codigo_va";
															$query_controller_tbl_va['folio'] = $this -> mm -> getAllWhere1($select, $tbl_va, $fields_va_encrypt, $insert_tbl_va['encrypt_codigo_va']);
															if (empty($query_controller_tbl_va['folio'])) { // buscamos si existe un código igual en la db
																$result_insert_tbl_va = $this -> mm -> insert($tbl_va, $insert_tbl_va); // no existe el folio | insertamos la vacante
																$insert_tbl_mu['movimiento_mu'] = 17; // insertamos el movimiento realizado
																$insert_tbl_mu['usuario_mu'] = $session_login;
																$insert_tbl_mu['receptor_mu'] = "";
																$insert_tbl_mu['hora_mu'] = date('H:i:s');
																$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																if ($result_insert_tbl_va == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																	$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																	$query_view_popup['text'] = "¡La vacante se generó correctamente!";
																	$query_view_popup['type'] = "success";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/manager', $query_menu);
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
																	$this -> load -> view('menu/manager', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
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
																$this -> load -> view('menu/manager', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // no tiene el formato correcto | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													// no viene información del formulario | redirigimos a la página de error 404
													else {
														$this -> load -> view('main/Header', $query_header);
													  $this -> load -> view('menu/manager', $query_menu);
													  $this -> load -> view('bug/404');
													  $this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
												  $this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver mis vacantes --------------- //
											case 'view-my-job-vacancies':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "encrypt_codigo_va, lugar_trabajo_va, empleados_va, actividades_va, requisitos_va, fecha_limite_va, fecha_cubierta_va, autorizado_va, status_va, puesto_pue";
													$query_view_ova['tbl_va'] = $this -> mm -> getAllInner2Where1For($select, $tbl_va, $tbl_pue, $fields_va_puesto, $fields_pue_id, $fields_va_puesto, $query_menu['tbl_pue'], $fields_pue_id);
													if (!empty($query_view_ova['tbl_va'])) { // validamos que existan vacantes | para contabilizarlas
														$query_view_ova['total_tbl_va'] = count($query_view_ova['tbl_va']);
													}
													else { // no existen vacantes | mandamos el valor total en 0
														$query_view_ova['total_tbl_va'] = 0;
													}
													arsort($query_view_ova['tbl_va']);
													$query_view_ova['tbl_em_ruta'] = $universal_company; // ruta para la foto
													$insert_tbl_mu['movimiento_mu'] = 46; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('Y:i:s');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('manager/vacancies/our_vacancies', $query_view_ova);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
												  $this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las vacantes contratadas --------------- //
											case 'view-hired-vacancies':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (empty($universal_url[1])) { // validamos si viene información en la url
														$select = "encrypt_codigo_va, lugar_trabajo_va, actividades_va, requisitos_va, fecha_limite_va, fecha_cubierta_va, autorizado_va, status_va, puesto_pue";
														$query_view_ova['tbl_va'] = $this -> mm -> getAllInner2Where3For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $query_menu['tbl_a'], $fields_a_id, $fields_va_autorizado, $num_val1, $fields_va_status, $num_val3);
														if (!empty($query_view_ova['tbl_va'])) { // validamos que existan vacantes | para contabilizarlas
															$universal_tbl_e_total = count($query_view_ova['tbl_va']);
														}
														else { // no existen vacantes | mandamos el valor total en 0
															$universal_tbl_e_total = 0;
														}
														arsort($query_view_ova['tbl_va']);
														$query_view_ova['total_tbl_va'] = $universal_tbl_e_total;
														$query_view_ova['tbl_em'] = $query_view_oep['tbl_em_ruta'] = $universal_company;
														$insert_tbl_mu['movimiento_mu'] = 55; // insertamos el movimiento realizado
														$insert_tbl_mu['usuario_mu'] = $session_login;
														$insert_tbl_mu['receptor_mu'] = "";
														$insert_tbl_mu['hora_mu'] = date('H:i:s');
														$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
														$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
												    // --------------- VISTAS --------------- //
												    $this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/manager', $query_menu);
												    $this -> load -> view('manager/vacancies/our_vacancies', $query_view_ova);
												    $this -> load -> view('main/Footer');
												  }
												  else { // viene variable | redirigimos a la página de error 404
												    $this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/manager', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
												  }
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las vacantes con candidatos --------------- //
											case 'view-vacancies-with-candidate':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (empty($universal_url[1])) { // validamos si viene información en la url
														$select = "encrypt_codigo_va, lugar_trabajo_va, actividades_va, requisitos_va, fecha_limite_va, fecha_cubierta_va, autorizado_va, status_va, puesto_pue";
														$query_view_ova['tbl_va'] = $this -> mm -> getAllInner2Where3For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $query_menu['tbl_a'], $fields_a_id, $fields_va_autorizado, $num_val1, $fields_va_status, $num_val2);
														if (!empty($query_view_ova['tbl_va'])) { // validamos que existan vacantes | para contabilizarlas
															$universal_tbl_e_total = count($query_view_ova['tbl_va']);
														}
														else { // no existen vacantes | mandamos el valor total en 0
															$universal_tbl_e_total = 0;
														}
														arsort($query_view_ova['tbl_va']);
														$query_view_ova['total_tbl_va'] = $universal_tbl_e_total;
														$query_view_ova['tbl_em'] = $query_view_oep['tbl_em_ruta'] = $universal_company;
														$insert_tbl_mu['movimiento_mu'] = 55; // insertamos el movimiento realizado
														$insert_tbl_mu['usuario_mu'] = $session_login;
														$insert_tbl_mu['receptor_mu'] = "";
														$insert_tbl_mu['hora_mu'] = date('H:i:s');
														$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
														$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/manager', $query_menu);
														$this -> load -> view('manager/vacancies/our_vacancies', $query_view_ova);
														$this -> load -> view('main/Footer');
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/manager', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las vacantes sin candidatos --------------- //
											case 'view-vacancies-without-a-candidate':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (empty($universal_url[1])) { // validamos si viene información en la url
														$select = "encrypt_codigo_va, lugar_trabajo_va, actividades_va, requisitos_va, fecha_limite_va, fecha_cubierta_va, autorizado_va, status_va, puesto_pue";
														$query_view_ova['tbl_va'] = $this -> mm -> getAllInner2Where3For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $query_menu['tbl_a'], $fields_a_id, $fields_va_autorizado, $num_val1, $fields_va_status, $num_val1);
														if (!empty($query_view_ova['tbl_va'])) { // validamos que existan vacantes | para contabilizarlas
															$universal_tbl_e_total = count($query_view_ova['tbl_va']);
														}
														else { // no existen vacantes | mandamos el valor total en 0
															$universal_tbl_e_total = 0;
														}
														arsort($query_view_ova['tbl_va']);
														$query_view_ova['total_tbl_va'] = $universal_tbl_e_total;
														$query_view_ova['tbl_em'] = $query_view_oep['tbl_em_ruta'] = $universal_company;
														$insert_tbl_mu['movimiento_mu'] = 55; // insertamos el movimiento realizado
														$insert_tbl_mu['usuario_mu'] = $session_login;
														$insert_tbl_mu['receptor_mu'] = "";
														$insert_tbl_mu['hora_mu'] = date('H:i:s');
														$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
														$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/manager', $query_menu);
														$this -> load -> view('manager/vacancies/our_vacancies', $query_view_ova);
														$this -> load -> view('main/Footer');
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/manager', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver los prospectos --------------- //
											case 'view-candidate':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos si viene información en la url
														$select = "encrypt_codigo_pr, apellido_paterno_pr, apellido_materno_pr, nombre_pr, telefono_pr, email_pr, cv_pr, prospecto_pr";
														$query_view_cl['tbl_pr'] = $this -> mm -> getAllInner2Where1($select, $tbl_va, $tbl_pr, $fields_va_id, $fields_pr_vacante, $fields_va_encrypt, $universal_url[1]);
														if (!empty($query_view_cl['tbl_pr'])) { // si viene información | validamos que exista el candidato
															$query_view_cl['tbl_em_ruta'] = $universal_company; // mandamos la ruta para ver el cv
															$insert_tbl_mu['movimiento_mu'] = 72; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('manager/vacancies/our_candidates', $query_view_cl);
															$this -> load -> view('main/Footer');
														}
														else { // la vacante no existe en la bd | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos el candidato no existe, intentelo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													// viene variable | redirigimos a la página de error 404
													else {
														$this -> load -> view('main/Header', $query_header);
													  $this -> load -> view('menu/manager', $query_menu);
													  $this -> load -> view('bug/404');
													  $this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
												  $this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- aceptar el prospecto --------------- //
											case 'accept-candidate':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos que venga el prospecto
														$select = "id_pr";
														$controller_prospecto = $this -> mm -> getRowWhere1($select, $tbl_pr, $fields_pr_encrypt, $universal_url[1]);
														if (!empty($controller_prospecto)) { // si viene el prospecto | validamos que exista en la db
															$result_update_tbl_pr = $this -> mm -> updateOneWhere1($tbl_pr, $fields_pr_prospecto, $num_val2, $fields_pr_encrypt, $universal_url[1]); // si viene el prospecto | actualizamos el status
															$insert_tbl_mu['movimiento_mu'] = 33; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															if ($result_update_tbl_pr == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																$query_view_popup['text'] = "Se actualizó el status del prospecto. Comunicate con recursos humanos para hacerle saber del cambio.";
																$query_view_popup['type'] = "success";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/manager', $query_menu);
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
																$this -> load -> view('menu/manager', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // el prospecto no existe | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // no viene el prospecto | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
													  $this -> load -> view('menu/manager', $query_menu);
													  $this -> load -> view('bug/404');
													  $this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
												  $this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/manager', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- rechazar prospecto --------------- //
											case 'deny-candidate':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos que venga el prospecto
														$select = "id_pr";
														$controller_prospecto = $this -> mm -> getRowWhere1($select, $tbl_pr, $fields_pr_encrypt, $universal_url[1]);
														if (!empty($controller_prospecto)) { // si viene el prospecto | validamos que exista en la db
															$result_update_tbl_pr = $this -> mm -> updateOneWhere1($tbl_pr, $fields_pr_prospecto, $num_val3, $fields_pr_encrypt, $universal_url[1]); // si viene el prospecto | actualizamos el status
															$insert_tbl_mu['movimiento_mu'] = 34; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															if ($result_update_tbl_pr == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																$query_view_popup['text'] = "Se actualizó el status del prospecto. Comunicate con recursos humanos para hacerle saber del cambio.";
																$query_view_popup['type'] = "success";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/manager', $query_menu);
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
																$this -> load -> view('menu/manager', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // el prospecto no existe | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // no viene el prospecto | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/manager', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver mis entrevistas --------------- //
											case 'view-interview':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "apellido_paterno_pr, apellido_materno_pr, nombre_pr, fecha_en, hora_en";
													$query_view_oi['tbl_en'] = $this -> mm -> getAllInner3Where1For($select, $tbl_va, $tbl_pr, $fields_va_id, $fields_pr_vacante, $tbl_en, $fields_pr_id, $fields_en_prospecto, $fields_va_puesto, $query_menu['tbl_pue'], $fields_pue_id); // buscamos las entrevistas
													if (!empty($query_view_oi['tbl_en'])) { // validamos que existan entrevistas | para contabilizarlas
											      $query_view_oi['total_tbl_en'] = count($query_view_oi['tbl_en']);
											    }
											    else { // no existen entrevistas | mandamos el valor total en 0
											      $query_view_oi['total_tbl_en'] = 0;
											    }
													$select = "puesto_pue, encrypt_codigo_va";
													$query_view_oi['tbl_va'] = $this -> mm -> getAllInner2Where1For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $query_menu['tbl_a'], $fields_a_id);
													$query_view_oi['tbl_em_ruta'] = $universal_company;
													$insert_tbl_mu['movimiento_mu'] = 60; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('manager/vacancies/our_interviews', $query_view_oi);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/manager', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- buscar entrevistas --------------- //
											case 'search-interviews':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$controller_vacante = trim($this -> input -> post('vacante'));
													if (!empty($controller_vacante)) { // validamos que venga información del fomrulario
														$select = "id_va";
											      $controller_tbl_va = $this -> mm -> getRowWhere1($select, $tbl_va, $fields_va_encrypt, $controller_vacante);
														if (!empty($controller_tbl_va)) { // si viene información | validamos que la vacante exista en la db
															$select = "apellido_paterno_pr, apellido_materno_pr, nombre_pr, prospecto_pr, encrypt_codigo_en, fecha_en, hora_en";
															$query_view_oi['tbl_en'] = $this -> mm -> getAllInner2Where1($select, $tbl_pr, $tbl_en, $fields_pr_id, $fields_en_prospecto, $fields_pr_vacante, $controller_tbl_va -> id_va);
															if (!empty($query_view_oi['tbl_en'])) { // validamos que existan entrevistas | para contabilizarlas
													      $query_view_oi['total_tbl_en'] = count($query_view_oi['tbl_en']);
													    }
													    else { // no existen entrevistas | mandamos el valor total en 0
													      $query_view_oi['total_tbl_en'] = 0;
													    }
															$select = "puesto_pue, encrypt_codigo_va";
															$query_view_oi['tbl_va'] = $this -> mm -> getAllInner2Where1For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $query_menu['tbl_a'], $fields_a_id); // entrevistas para el buscador
															$query_view_oi['tbl_em_ruta'] = $universal_company;
															$insert_tbl_mu['movimiento_mu'] = 73; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        // --------------- VISTAS --------------- //
													    $this -> load -> view('main/Header', $query_header);
													    $this -> load -> view('menu/manager', $query_menu);
													    $this -> load -> view('manager/vacancies/our_interviews', $query_view_oi);
													    $this -> load -> view('main/Footer');
											      }
											      else { // no viene información | mandamos alerta de error
											        $popup['title'] = "¡ERROR!";
											        $popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $popup['type'] = "error";
											        $popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/manager', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // no viene información | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/manager', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/manager', $query_menu);
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
									$insert_tbl_mu['movimiento_mu'] = 42; // insertamos el movimiento realizado
									$insert_tbl_mu['usuario_mu'] = $session_login;
									$insert_tbl_mu['receptor_mu'] = "";
									$insert_tbl_mu['hora_mu'] = date('H:i:s');
									$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
									$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
									$this -> load -> view('main/Header', $query_header);
									$this -> load -> view('menu/manager', $query_menu);
									$this -> load -> view('home/manager_home', $query_home);
									$this -> load -> view('main/Footer');
								}
							}
							else { // el usuario es OTRO | redirigimos a la página de error 404
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
