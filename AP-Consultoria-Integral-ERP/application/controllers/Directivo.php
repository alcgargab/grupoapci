<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Directivo extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this -> load -> library('Date', TRUE);
			$this -> load -> library('Random_code_generator', TRUE);
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
			$tbl_pue = "puestos";
			$tbl_g = "generos";
			$tbl_u = "usuarios";
			$tbl_mp = "metodos_permitidos";
			$tbl_m = "movimientos";
			$tbl_mu = "movimientos_usuarios";
			$tbl_p = "permisos";
			$tbl_pu = "permisos_urgentes";
			$tbl_pr = "prospectos";
			$tbl_st = "status_turnos";
			$tbl_t = "tareas";
			$tbl_va = "vacantes";
			// --------------- variables para campos --------------- //
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
			$fields_e_puesto = "puesto_e";
			$fields_e_turno = "turno_e";
			$fields_e_antiguedad = "antiguedad_e";
			// ----- tabla empresas ----- //
			$fields_em_id = "id_em";
			$fields_em_ruta = "ruta_em";
			// ----- tabla entrevistas ----- //
			$fields_en_prospecto = "prospecto_en";
			// ----- tabla evaluaciones ----- //
			$fields_ev_encrypt = "encrypt_codigo_ev";
			$fields_ev_empleado = "empleado_ev";
			$fields_ev_mes = "mes_ev";
			// ----- tabla expedientes ----- //
			$fields_ex_empleado = "empleado_ex";
			// ----- tabla generos ----- //
			$fields_g_id = "id_g";
			$fields_g_genero = "genero_g";
			// ----- tabla metodos_permitidos ----- //
			$fields_mp_ruta = "ruta_mp";
			$fields_mp_usuario = "usuario_mp";
			// ----- tabla movimientos ----- //
			$fields_m_id = "id_m";
			// ----- tabla movimientos_usuarios ----- //
			$fields_mu_movimiento = "movimiento_mu";
			$fields_mu_usuario = "usuario_mu";
			$fields_mu_fecha = "fecha_mu";
			// ----- tabla pases de salida ----- //
			$fields_ps_empleado = "empleado_ps";
			// ----- tabla permisos ----- //
			$fields_p_encrypt = "encrypt_folio_p";
			$fields_p_empleado = "empleado_p";
			$fields_p_autorizado = "autorizado_p";
			// ----- tabla permisos urgentes ----- //
			$fields_pu_empleado = "empleado_pu";
			$fields_pu_autorizado = "autorizado_pu";
			// ----- tabla prospectos ----- //
			$fields_pr_id = "id_pr";
			$fields_pr_vacante = "vacante_pr";
			$fields_pr_encrypt = "encrypt_codigo_pr";
			// ----- tabla puestos ----- //
			$fields_pue_id = "id_pue";
			$fields_pue_puesto = "puesto_pue";
			$fields_pue_area = "area_pue";
			// ----- tabla usuarios ----- //
			$fields_u_id = "id_u";
			$fields_u_empleado = "empleado_u";
			// ----- tabla status turnos ----- //
			$fields_st_id = "id_st";
			// ----- tabla tareas ----- //
			$fields_t_id = "id_t";
			$fields_t_empleado = "empleado_t";
			$fields_t_status = "status_t";
			$fields_t_encrypt = "encrypt_codigo_t";
			// ----- tabla vacaciones ----- //
			$fields_v_empleado = "empleado_v";
			// ----- tabla vacantes ----- //
			$fields_va_id = "id_va";
			$fields_va_encrypt = "encrypt_codigo_va";
			$fields_va_puesto = "puesto_va";
			$fields_va_autorizado = "autorizado_va";
			$fields_va_status  = "status_va";
			// ----- tabla visitas ----- //
			$fields_vi_departamento = "departamento_vi";
			// --------------- variables de sesion --------------- //
			$session_validate = $this -> session -> validate;
			$session_empleado = $this -> session -> empleado;
			$session_login = $this -> session -> login;
			$session_name = $this -> session -> name;
			$session_user = $this -> session -> user;
			$session_type = $this -> session -> type;
			// variable con el numero 1
			$num_val1 = 1;
			// variable con el numero 2
			$num_val2 = 2;
			// variable con el numero 3
			$num_val3 = 3;
			// variable con el numero 4
			$num_val4 = 4;
			// variable con el numero 5
			$num_val5 = 5;
			// --------------- variables de ordenamiento --------------- //
			$orderDESC = "DESC";
			if (!empty($session_validate) && $session_validate == "true") { // validamos si viene la sesión iniciada | obtenermos la información de las variables
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
				// --------------- MENU --------------- //
				$select = "empresa_em, ruta_em, icono_em";
				$query_menu['tbl_em'] = $this -> mm -> getAll($select, $tbl_em); // obtenemos las empresas para los menus
				$select = "empleado_u";
				$query_menu['tbl_u'] = $this -> mm -> getRowWhere1($select, $tbl_u, $fields_u_id, $session_login); // obtenemos el usuario
				$query_menu['tbl_em_ruta'] = $query_header['tbl_em_ruta']; // obtenemos la ruta de la empresa
			}
			else { // no viene la sesión | mandamos variables vacias
				// --------------- HEADER --------------- //
				$query_header['tbl_e'] = ""; // obtenemos el empleado
				// ------ VALORES PARA PONER COLOR Y QUE APAREZCA EL NOMBRE EN EL HEADER ------ //
				$query_header['tbl_pue'] = ""; // obtenemos el puesto del empleado
				$query_header['tbl_a'] = ""; // obtenemos el area del empleado
				$query_header['tbl_em'] = ""; // obtenemos la empresa del empleado
				$query_header['tbl_em_ruta'] = ""; // ruta para la foto del empleado
				// --------------- MENU --------------- //
				$query_menu['tbl_em'] = ""; // obtenemos las empresas para los menus
				$select = "empleado_u"; // obtenemos el usuario
				$query_menu['tbl_u'] = "";
				$query_menu['tbl_em_ruta'] = ""; // obtenemos la ruta de la empresa
			}
			// --------------- HOME --------------- //
			$query_home['tbl_em'] = "";
			// --------------- HOME --------------- //
			if (!empty($session_validate)){ // validamos las variables de sesion
				// --------------- HOME --------------- //
				$query_home['tbl_em'] = $query_menu['tbl_em'];
				if ($session_validate == "true") { // si viene la variable de sesion | validamos que sea iguala a true
					if (!empty($universal_company)) { // validamos que exista la empresa
						$select = "id_em, fregistro_em";
						$query_controller['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_ruta, $universal_company);
						if (!empty($query_controller['tbl_em'])) { // la empresa si viene | validamos que exista en la db
							if ($session_user == "EMapci") { // la empresa si existe | validamos que el usuario sea de directivo
								if (!empty($universal_url[0])) { // validamos que no venga información en la url
									$select = "ruta_mp";
									$query_controller['tbl_mp'] = $this -> mm -> getRowWhere2Like($select, $tbl_mp, $fields_mp_ruta, $universal_url[0], $fields_mp_usuario, $session_type);
									if (!empty($query_controller['tbl_mp'])) { // validamos que el metodo exista y que el usuario sea el correcto
										$select = "id_g, genero_g";
										$universal_tbl_g = $this -> mm -> getAll($select, $tbl_g); // obtenemos todas los generos
										$select = "id_st, turno_st";
										$universal_tbl_st = $this -> mm -> getAll($select, $tbl_st); // obtenemos todas los turnos
										$select ="id_em, ruta_em, abreviatura_em";
										$universal_tbl_em = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_ruta, $universal_company); // obtenemos todas la empresa
										$select ="id_a, area_a";
										$universal_tbl_a = $this -> mm -> getAllWhere1($select, $tbl_a, $fields_a_empresa, $universal_tbl_em -> id_em); // obtenemos todas las areas
										$select ="id_pue, puesto_pue, area_pue";
										$universal_tbl_pue = $this -> mm -> getAllWhere1For($select, $tbl_pue, $fields_pue_area, $universal_tbl_a, $fields_a_id); // obtenemos todas los puestos
										$select ="id_e, foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, fecha_proximo_contrato_e, contrato_e";
										$universal_tbl_e = $this -> mm -> getAllWhere2For($select, $tbl_e, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id, $fields_e_status, $num_val1); // obtenemos todos los empleados activos
										if (!empty($universal_tbl_e)) {
											arsort($universal_tbl_e);
											$universal_tbl_e_total = count($universal_tbl_e);
										}
										else {
											$universal_tbl_e_total = 0;
										}
										switch ($query_controller['tbl_mp'] -> ruta_mp) {
											// --------------- ver las lista de empleados --------------- //
											case 'view-task':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "status_usuario_u, foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e";
													$query_view_tl['tbl_e'] = $this -> mm -> getAllInner2Where1For($select, $tbl_e, $tbl_u, $fields_e_id, $fields_u_empleado, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id );
													$query_view_tl['total_tbl_e'] = count($query_view_tl['tbl_e']);
													$query_view_tl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 94; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('executive/task/task_list', $query_view_tl);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las tareas de un empleado --------------- //
											case 'view-the-tasks-of-an-employee':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													// validamos que venga la vacante
													if (!empty($universal_url[1])) {
														$select = "status_t, autor_t, encrypt_codigo_t, nombre_tarea_t, fecha_estimada_t, inicio_t, fin_t, dia_creacion_t, mes_creacion_t, anio_creacion_t, comentarios_d_t";
														$query_view_lotoae['tbl_t'] = $this -> mm -> getAllInner2Where1Order($select, $tbl_e, $tbl_t, $fields_e_id, $fields_t_empleado, $fields_e_encrypt, $universal_url[1], $fields_t_id, $orderDESC);
														if (!empty($query_view_lotoae['tbl_t'])) { // validamos que existan tareas | para contabilizarlas
															$query_view_lotoae['total_tbl_t'] = count($query_view_lotoae['tbl_t']);
														}
														else { // no existen tareas | mandamos el valor total en 0
															$query_view_lotoae['total_tbl_t'] = 0;
														}
														$query_view_lotoae['tbl_em'] = $universal_tbl_em;
														$insert_tbl_mu['movimiento_mu'] = 95; // insertamos el movimiento realizado
														$insert_tbl_mu['usuario_mu'] = $session_login;
														$insert_tbl_mu['receptor_mu'] = "";
														$insert_tbl_mu['hora_mu'] = date('H:i:s');
														$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
														$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/executive', $query_menu);
														$this -> load -> view('executive/task/list_of_tasks_of_an_employee', $query_view_lotoae);
														$this -> load -> view('main/Footer');
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/executive', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- agregar tareas a un empleado --------------- //
											case 'add-task':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													// validamos que venga la vacante
													if (!empty($universal_url[1])) {
														$select = "encrypt_numero_empleado_e";
														$query_view_at['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
														if (!empty($query_view_at['tbl_e'])) { // validamos que existan tareas
															$query_view_at['tbl_em'] = $universal_tbl_em; // mandamos la ruta
															$insert_tbl_mu['movimiento_mu'] = 96; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/executive', $query_menu);
															$this -> load -> view('executive/task/add_task', $query_view_at);
															$this -> load -> view('main/Footer');
														}
														else { // no existe el empleado | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/executive', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
														}
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/executive', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- generar tareas a un empleado --------------- //
											case 'generate-task':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													// validamos que venga la vacante
													if (!empty($universal_url[1])) {
														$select = "id_e, numero_empleado_e";
														$controller_empleado = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
														if (!empty($controller_empleado)) { // validamos que exista el empleado
															$controller_task_total = $this -> input -> post('total_task');
															if (!empty($controller_task_total)) { // validamos si viene información del formulario
																if (is_numeric($controller_task_total)) { // viene con información | validamos que sea un número
																	for ($i = 1; $i <= $controller_task_total ; $i++) { // si es número | obtenemos los valores
																		$insert_tbl_t['status_t'] = 1;
																		$insert_tbl_t['autor_t'] = 1;
																		$library_code = 8;
																		$result_library_code_t = trim($this -> random_code_generator -> index($library_code));
																		$insert_tbl_t['codigo_t'] = preg_replace('[\s+]',"", "ap-t-".$controller_empleado -> numero_empleado_e."-".$result_library_code_t);
																		$insert_tbl_t['encrypt_codigo_t'] = hash('whirlpool', $insert_tbl_t['codigo_t']);
																		$select = "fregistro_t";
																		$query_controller_tbl_t['codigo'] = $this -> mm -> getAllWhere1($select, $tbl_t, $fields_t_encrypt, $insert_tbl_t['encrypt_codigo_t']);
																		if (empty($query_controller_tbl_t['codigo'])) { // validamos si el código ya existe en la db
																			$insert_tbl_t['empleado_t'] = $controller_empleado -> id_e;
																			$insert_tbl_t['nombre_tarea_t'] = $this -> input -> post('task'.$i);
																			$insert_tbl_t['fecha_estimada_t'] = $this -> input -> post('date_task'.$i);
																			$insert_tbl_t['inicio_t'] = "";
																			$insert_tbl_t['fecha_inicio_t'] = "";
																			$insert_tbl_t['fin_t'] = "";
																			$insert_tbl_t['fecha_fin_t'] = "";
																			$insert_tbl_t['dia_creacion_t'] = date('d');
																			$insert_tbl_t['mes_creacion_t'] = date('m');
																			$insert_tbl_t['anio_creacion_t'] = date('Y');
																			$insert_tbl_t['comentarios_e_t'] = "";
																			$insert_tbl_t['comentarios_d_t'] = "";
																			$insert_tbl_t['nuevo_t'] = 2;
																			$result_insert_tbl_t = $this -> mm -> insert($tbl_t, $insert_tbl_t); // el código no existe | insertamos la tarea
																		}
																		else { // si existe el código | mandamos alerta de error
																			$query_view_popup['title'] = "¡ERROR!";
																			$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																			$query_view_popup['type'] = "error";
																			$query_view_popup['ruta'] = "ruta";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('main/Header', $query_header);
																			$this -> load -> view('menu/executive', $query_menu);
																			$this -> load -> view('bug/404');
																			$this -> load -> view('popup/popup_time', $query_view_popup);
																			$this -> load -> view('main/Footer');
																		}
																	}
																	$insert_tbl_mu['movimiento_mu'] = 63; // insertamos el movimiento realizado
																	$insert_tbl_mu['usuario_mu'] = $session_login;
																	$insert_tbl_mu['receptor_mu'] = "";
																	$insert_tbl_mu['hora_mu'] = date('H:i:s');
																	$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																	$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																	if ($result_insert_tbl_t == "true" && $result_insert_tbl_mu = "true") { // validamos si se ejecutaron los querys
																		$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																		$query_view_popup['text'] = "¡Se agregaron todas las tareas para el empleado!";
																		$query_view_popup['type'] = "success";
																		$query_view_popup['ruta'] = "ruta";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('menu/executive', $query_menu);
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
																		$this -> load -> view('menu/executive', $query_menu);
																		$this -> load -> view('bug/404');
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																}
																else { // no es número | redirigimos a la página principal
																	$query_view_popup['title'] = "¡ERROR!";
																	$query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/executive', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // viene vacio | mandamos alerta de error
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/executive', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // no existe el empleado | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/executive', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/executive', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- evaluar la tarea --------------- //
											case 'evaluate-tasks':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
														$select = "status_t, autor_t, comentarios_d_t";
														$controller_task = $this -> mm -> getRowWhere1($select, $tbl_t, $fields_t_encrypt, $universal_url[1]);
														if (!empty($controller_task)) { // si existe | buscamos la tarea en la db
															if ($controller_task -> status_t == 3) { // si existe la tarea | validamos que se haya iniciado primero
																if ($controller_task -> autor_t == 1) { // validamos si la tarea fue creada por dirección
																$contrlloer_status_task = trim($this -> input -> post('ap-status-task'));
																	if ($contrlloer_status_task == 'no') { // validamos el status de la tarea
																		if (!empty($controller_task -> comentarios_d_t)) { // validamos si ya se habia validado esta tarea
																			$update_tbl_t['status_t'] = 4;
																			$update_tbl_t['comentarios_d_t'] = $controller_task -> comentarios_d_t.",-".trim(mb_strtoupper($this -> input -> post('coment_e'), 'UTF-8'));
																			$result_update_tbl_t = $this -> mm -> updateWhere1($tbl_t, $fields_t_encrypt, $universal_url[1], $update_tbl_t);
																			$insert_tbl_mu['movimiento_mu'] = 101; // insertamos el movimiento realizado
																			$insert_tbl_mu['usuario_mu'] = $session_login;
																			$insert_tbl_mu['receptor_mu'] = "";
																			$insert_tbl_mu['hora_mu'] = date('H:i:s');
																			$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																			$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																			if ($result_update_tbl_t == "true" && $result_insert_tbl_mu = "true") { // validamos si se ejecutaron los querys
																				$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																				$query_view_popup['text'] = "¡La tarea fue calificada!";
																				$query_view_popup['type'] = "info";
																				$query_view_popup['ruta'] = "ruta";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('main/Header', $query_header);
																				$this -> load -> view('menu/executive', $query_menu);
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
																				$this -> load -> view('menu/executive', $query_menu);
																				$this -> load -> view('bug/404');
																				$this -> load -> view('popup/popup_time', $query_view_popup);
																				$this -> load -> view('main/Footer');
																			}
																		}
																		else { // no se habia validado | se evalua como primera vez
																			$update_tbl_t['status_t'] = 4;
																			$update_tbl_t['comentarios_d_t'] = trim(mb_strtoupper($this -> input -> post('coment_e'), 'UTF-8'));
																			$result_update_tbl_t = $this -> mm -> updateWhere1($tbl_t, $fields_t_encrypt, $universal_url[1], $update_tbl_t);
																			$insert_tbl_mu['movimiento_mu'] = 101; // insertamos el movimiento realizado
																			$insert_tbl_mu['usuario_mu'] = $session_login;
																			$insert_tbl_mu['receptor_mu'] = "";
																			$insert_tbl_mu['hora_mu'] = date('H:i:s');
																			$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																			$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																			if ($result_update_tbl_t == "true" && $result_insert_tbl_mu = "true") { // validamos si se ejecutaron los querys
																				$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																				$query_view_popup['text'] = "¡La tarea fue calificada!";
																				$query_view_popup['type'] = "info";
																				$query_view_popup['ruta'] = "ruta";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('main/Header', $query_header);
																				$this -> load -> view('menu/executive', $query_menu);
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
																				$this -> load -> view('menu/executive', $query_menu);
																				$this -> load -> view('bug/404');
																				$this -> load -> view('popup/popup_time', $query_view_popup);
																				$this -> load -> view('main/Footer');
																			}
																		}
																	}
																	else { // terminamos la tarea
																		$update_tbl_t['fin_t'] = date('H:i:s');
																		$update_tbl_t['fecha_fin_t'] = date('Y-m-d');
																		$update_tbl_t['comentarios_d_t'] = trim(mb_strtoupper($this -> input -> post('coment_e'), 'UTF-8'));
																		$update_tbl_t['status_t'] = 5;
																		$result_update_tbl_t = $this -> mm -> updateWhere1($tbl_t, $fields_t_encrypt, $universal_url[1], $update_tbl_t);
																		$insert_tbl_mu['movimiento_mu'] = 88; // insertamos el movimiento realizado
																		$insert_tbl_mu['usuario_mu'] = $session_login;
																		$insert_tbl_mu['receptor_mu'] = "";
																		$insert_tbl_mu['hora_mu'] = date('H:i:s');
																		$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																		$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																		if ($result_update_tbl_t == "true" && $result_insert_tbl_mu = "true") { // validamos si se ejecutaron los querys
																			$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																			$query_view_popup['text'] = "¡Felicidades has concluido una tarea. Sigue así.!";
																			$query_view_popup['type'] = "success";
																			$query_view_popup['ruta'] = "ruta";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('main/Header', $query_header);
																			$this -> load -> view('menu/executive', $query_menu);
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
																			$this -> load -> view('menu/executive', $query_menu);
																			$this -> load -> view('bug/404');
																			$this -> load -> view('popup/popup_time', $query_view_popup);
																			$this -> load -> view('main/Footer');
																		}
																	}
																}
																else { // la tarea fue creada por el empleado | mandamos alerta de error
																	$query_view_popup['title'] = "¡ERROR!";
																	$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/executive', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // la tarea no se inicio antes | mandamos alerta de error
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "Lo sentimos no podemos actualizar el status de la tarea.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/executive', $query_menu);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // la tarea no existe | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos la tarea no se encuentra registrado, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/executive', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													// viene vacio | redirigimos a la página de error 404
													else {
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/executive', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- reporte de las tarea --------------- //
											case 'task-report':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													// validamos que venga la vacante
													if (!empty($universal_url[1])) {
														$select = "status_t, autor_t, encrypt_codigo_t, nombre_tarea_t, fecha_estimada_t, inicio_t, fin_t, dia_creacion_t, mes_creacion_t, anio_creacion_t, comentarios_d_t";
														$query_view_rotoae['tbl_t_p'] = $this -> mm -> getAllInner2Where2($select, $tbl_e, $tbl_t, $fields_e_id, $fields_t_empleado, $fields_e_encrypt, $universal_url[1], $fields_t_status, $num_val1); // obtener las tareas pendinetes
														$query_view_rotoae['tbl_t_t'] = $this -> mm -> getAllInner2Where2($select, $tbl_e, $tbl_t, $fields_e_id, $fields_t_empleado, $fields_e_encrypt, $universal_url[1], $fields_t_status, $num_val2); // obtener las tareas trabajando
														$query_view_rotoae['tbl_t_v'] = $this -> mm -> getAllInner2Where2($select, $tbl_e, $tbl_t, $fields_e_id, $fields_t_empleado, $fields_e_encrypt, $universal_url[1], $fields_t_status, $num_val3); // obtener las tareas en validación
														$query_view_rotoae['tbl_t_c'] = $this -> mm -> getAllInner2Where2($select, $tbl_e, $tbl_t, $fields_e_id, $fields_t_empleado, $fields_e_encrypt, $universal_url[1], $fields_t_status, $num_val4); // obtener las tareas con corrección
														$query_view_rotoae['tbl_t_a'] = $this -> mm -> getAllInner2Where2($select, $tbl_e, $tbl_t, $fields_e_id, $fields_t_empleado, $fields_e_encrypt, $universal_url[1], $fields_t_status, $num_val5); // obtener las tareas atendidas
														$query_view_rotoae['tbl_t'] = $this -> mm -> getAllInner2Where1Order($select, $tbl_e, $tbl_t, $fields_e_id, $fields_t_empleado, $fields_e_encrypt, $universal_url[1], $fields_t_id, $orderDESC);
														echo "<pre>"; print_r($query_view_rotoae); echo "</pre>"; die();

														if (!empty($query_view_rotoae['tbl_t'])) { // validamos que existan tareas | para contabilizarlas
															$query_view_rotoae['total_tbl_t'] = count($query_view_rotoae['tbl_t']);
														}
														else { // no existen tareas | mandamos el valor total en 0
															$query_view_rotoae['total_tbl_t'] = 0;
														}
														$query_view_rotoae['tbl_em'] = $universal_tbl_em;
														$insert_tbl_mu['movimiento_mu'] = 102; // insertamos el movimiento realizado
														$insert_tbl_mu['usuario_mu'] = $session_login;
														$insert_tbl_mu['receptor_mu'] = "";
														$insert_tbl_mu['hora_mu'] = date('H:i:s');
														$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
														$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/executive', $query_menu);
														$this -> load -> view('executive/task/report_of_tasks_of_an_employee', $query_view_rotoae);
														$this -> load -> view('main/Footer');
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/executive', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver los usuarios activos --------------- //
											case 'view-sessions':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "status_usuario_u, foto_empleado_e, numero_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e";
													$query_view_sl['tbl_e'] = $this -> mm -> getAllInner2Where1For($select, $tbl_e, $tbl_u, $fields_e_id, $fields_u_empleado, $fields_e_puesto, $universal_tbl_pue, $fields_pue_id );
													$query_view_sl['total_tbl_e'] = count($query_view_sl['tbl_e']);
													$query_view_sl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 89; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('executive/sessions/session_list', $query_view_sl);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las actividades de los empleados --------------- //
											case 'view-employee-activities':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													// validamos que venga la vacante
													if (!empty($universal_url[1])) {
														$select = "movimiento_mu, receptor_mu, hora_mu, fecha_mu, movimiento_m";
											      $query_view_al['tbl_e'] = $this -> mm -> getAllInner4Where1_2($select, $tbl_e, $tbl_u, $fields_e_id, $fields_u_empleado, $tbl_mu, $fields_u_id, $fields_mu_usuario, $tbl_m, $fields_mu_movimiento, $fields_m_id, $fields_e_encrypt, $universal_url[1]);
														if (!empty($query_view_al['tbl_e'])) { // validamos que existan ectividades | para contabilizarlas
															$query_view_al['total_tbl_e'] = count($query_view_al['tbl_e']);
														}
														else { // no existen ectividades | mandamos el valor total en 0
															$query_view_al['total_tbl_e'] = 0;
														}
														$query_view_al['encrypt_numero_empleado_e'] = $universal_url[1]; // mandamos el usuario para el form
														$query_view_al['tbl_em'] = $universal_tbl_em; // mandamos la ruta
														$insert_tbl_mu['movimiento_mu'] = 90; // insertamos el movimiento realizado
														$insert_tbl_mu['usuario_mu'] = $session_login;
														$insert_tbl_mu['receptor_mu'] = "";
														$insert_tbl_mu['hora_mu'] = date('H:i:s');
														$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
														$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/executive', $query_menu);
														$this -> load -> view('executive/sessions/activities_list', $query_view_al);
														$this -> load -> view('main/Footer');
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/executive', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las actividades de los empleados por fecha --------------- //
											case 'view-employee-activities-by-date':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos que vengan las actividades
														$query_view_al['fecha_mu'] = trim($this -> input -> post('fecha_mu')); // validamos que venga información del formulario
														if (!empty($query_view_al['fecha_mu'])) {
															$select = "movimiento_mu, receptor_mu, hora_mu, fecha_mu, movimiento_m";
												      $query_view_al['tbl_e'] = $this -> mm -> getAllInner4Where2($select, $tbl_e, $tbl_u, $fields_e_id, $fields_u_empleado, $tbl_mu, $fields_u_id, $fields_mu_usuario, $tbl_m, $fields_mu_movimiento, $fields_m_id, $fields_e_encrypt, $universal_url[1], $fields_mu_fecha, $query_view_al['fecha_mu']); // viene información | obtenemos la información
															if (!empty($query_view_al['tbl_e'])) { // validamos que existan vacantes | para contabilizarlas
																$query_view_al['total_tbl_e'] = count($query_view_al['tbl_e']);
															}
															else { // no existen vacantes | mandamos el valor total en 0
																$query_view_al['total_tbl_e'] = 0;
															}
															$query_view_al['encrypt_numero_empleado_e'] = $universal_url[1]; // mandamos el usuario para el form
															$query_view_al['tbl_em'] = $universal_tbl_em; // mandamos la ruta
															$insert_tbl_mu['movimiento_mu'] = 91; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/executive', $query_menu);
															$this -> load -> view('executive/sessions/activities_list', $query_view_al);
															$this -> load -> view('main/Footer');
														}
														else { // viene variable | redirigimos a la página de error 404
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/executive', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('main/Footer');
														}
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/executive', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver las vacantes --------------- //
											case 'view-job-vacancies':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "puesto_pue, id_va,encrypt_codigo_va, lugar_trabajo_va, sueldo_va, actividades_va, requisitos_va, fecha_limite_va, fecha_cubierta_va, fecha_solicitud_va, status_va, autorizado_va";
													$query_view_vl['tbl_va'] = $this -> mm -> getAllInner2Where2For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_va_autorizado, $num_val2);
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
											    $this -> load -> view('menu/executive', $query_menu);
											    $this -> load -> view('executive/vacancies/vacancy_list', $query_view_vl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/executive', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver las vacantes con autorización --------------- //
											case 'view-vacancies-whit-authorization':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "puesto_pue, id_va,encrypt_codigo_va, lugar_trabajo_va, sueldo_va, actividades_va, requisitos_va, fecha_limite_va, fecha_cubierta_va, fecha_solicitud_va, status_va, autorizado_va";
													$query_view_vl['tbl_va'] = $this -> mm -> getAllInner2Where2For($select, $tbl_pue, $tbl_va, $fields_pue_id, $fields_va_puesto, $fields_pue_area, $universal_tbl_a, $fields_a_id, $fields_va_autorizado, $num_val1);
													if (!empty($query_view_vl['tbl_va'])) { // validamos que existan vacantes | para contabilizarlas
														$query_view_vl['total_tbl_va'] = count($query_view_vl['tbl_va']);
													}
													else { // no existen vacantes | mandamos el valor total en 0
														$query_view_vl['total_tbl_va'] = 0;
													}
													$query_view_vl['tbl_em'] = $universal_tbl_em;
													$insert_tbl_mu['movimiento_mu'] = 76; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('executive/vacancies/vacancy_list', $query_view_vl);
													$this -> load -> view('main/Footer');
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/executive', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- autorizar las vacantes --------------- //
											case 'authorize-vacancy':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // validamos que venga la vacante
											      // si viene la vacante | buscamos la vacante
											      $select = "id_va";
											      $controller_vacante = $this -> mm -> getRowWhere1($select, $tbl_va, $fields_va_encrypt, $universal_url[1]);
											      if (!empty($controller_vacante)) { // validamos que exista la vacante
											        $result_update_tbl_va = $this -> mm -> updateOneWhere1($tbl_va, $fields_va_autorizado, $num_val1, $fields_va_encrypt, $universal_url[1]); // actualizamos la autorización de la vacante
															$insert_tbl_mu['movimiento_mu'] = 35; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $this -> session -> login;
															$insert_tbl_mu['receptor_mu'] = $universal_url[1];
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        if ($result_update_tbl_va == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
											          $query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
											          $query_view_popup['text'] = "¡Se autorizó la vacante!";
											          $query_view_popup['type'] = "success";
											          $query_view_popup['ruta'] = "ruta";
											          // --------------- VISTAS --------------- //
											          $this -> load -> view('main/Header', $query_header);
											          $this -> load -> view('menu/executive', $query_menu);
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
											          $this -> load -> view('menu/executive', $query_menu);
																$this -> load -> view('bug/404');
											          $this -> load -> view('popup/popup_time', $query_view_popup);
											          $this -> load -> view('main/Footer');
											        }
											      }
											      else { // la vacante no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/executive', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/executive', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/executive', $query_menu);
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
											        $this -> load -> view('menu/executive', $query_menu);
											        $this -> load -> view('executive/vacancies/candidate_list', $query_view_cl);
											        $this -> load -> view('main/Footer');
											      }
											      else { // la vacante no existe en la bd | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/executive', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/executive', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/executive', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver los permisos --------------- //
											case 'view-permission':
											  if (empty($url[1])) { // validamos si viene información en la url
											    // la empresa si existe | buscamos los permisos
											    $select = "apellido_paterno_e, apellido_materno_e, nombre_e, encrypt_folio_p, fecha_permiso_p, inicio_p, fin_p, horas_p";
											    $query_view_pl['tbl_p'] = $this -> mm -> getAllDeveloperInner2Where2($select, $tbl_p, $tbl_e, $fields_p_empleado, $fields_e_id, $fields_p_empleado, $fields_p_autorizado, $num_val2);
													if (!empty($query_view_pl['tbl_p'])) { // validamos que existan vacantes | para contabilizarlas
														$query_view_pl['total_tbl_p'] = count($query_view_pl['tbl_p']);
													}
													else { // no existen vacantes | mandamos el valor total en 0
														$query_view_pl['total_tbl_p'] = 0;
													}
													$insert_tbl_mu['movimiento_mu'] = 66; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													$query_view_pl['tbl_em'] = $universal_tbl_em;
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/executive', $query_menu);
											    $this -> load -> view('executive/permissions/permission_list', $query_view_pl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/executive', $query_menu);
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
														if (!empty($query_controller_tbl_p['folio'])) { // si viene la variable | validamos que exista el día de vacación
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
																	$this -> load -> view('menu/executive', $query_menu);
																	$this -> load -> view('bug/404');
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
																	$this -> load -> view('menu/executive', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // el día de vacación ya esta autorizado | mandamos alerta de error
																$query_view_popup['title'] = "¡ATENCIÓN!";
																$query_view_popup['text'] = "Lo sentimos este permiso ya se autorizó.";
																$query_view_popup['type'] = "info";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/executive', $query_menu);
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
															$this -> load -> view('menu/executive', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // viene variable | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
													  $this -> load -> view('menu/executive', $query_menu);
													  $this -> load -> view('bug/404');
													  $this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
												  $this -> load -> view('main/Header', $query_header);
												  $this -> load -> view('menu/executive', $query_menu);
												  $this -> load -> view('bug/404');
												  $this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver los permisos urgentes --------------- //
											case 'view-urgent-permissions':
											  if (empty($url[1])) { // validamos si viene información en la url
											    $select = "id_pu, apellido_paterno_e, apellido_materno_e, nombre_e";
											    $alias = "total_de_permisos";
											    $query_view_upl['tbl_pu'] = $this -> mm -> getAllInner2Where1GroupBy($fields_e_id, $alias, $select, $tbl_e, $fields_e_id, $fields_e_id, $tbl_pu, $fields_pu_empleado, $fields_pu_autorizado, $num_val1, $fields_pu_empleado);
													if (!empty($query_view_upl['tbl_pu'])) { // validamos que existan vacantes | para contabilizarlas
														$query_view_upl['total_tbl_pu'] = count($query_view_upl['tbl_pu']);
													}
													else { // no existen vacantes | mandamos el valor total en 0
														$query_view_upl['total_tbl_pu'] = 0;
													}
													$insert_tbl_mu['movimiento_mu'] = 67; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $session_login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													$query_view_pl['tbl_em'] = $universal_tbl_em;
											    // --------------- VISTAS --------------- //
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/executive', $query_menu);
											    $this -> load -> view('executive/urgent_permits/urgent_permission_list', $query_view_upl);
											    $this -> load -> view('main/Footer');
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/executive', $query_menu);
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
									$insert_tbl_mu['movimiento_mu'] = 75;
									$insert_tbl_mu['usuario_mu'] = $session_login;
									$insert_tbl_mu['receptor_mu'] = "";
									$insert_tbl_mu['hora_mu'] = date('H:i:s');
									$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
									$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
									$this -> load -> view('main/Header', $query_header);
									$this -> load -> view('menu/executive', $query_menu);
									$this -> load -> view('home/executive_home', $query_home);
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
