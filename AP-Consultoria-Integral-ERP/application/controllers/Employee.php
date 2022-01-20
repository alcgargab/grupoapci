<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Employee extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this -> load -> library('Random_code_generator', TRUE);
			$this -> load -> library('Pdf_generator', TRUE);
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
			$tbl_t = "tareas";
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
			$fields_ev_id = "id_ev";
			$fields_ev_codigo = "codigo_ev";
			$fields_ev_encrypt = "encrypt_codigo_ev";
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
			// ----- tabla status turnos ----- //
			$fields_st_id = "id_st";
			// ----- tabla tareas ----- //
			$fields_t_id = "id_t";
			$fields_t_status = "status_t";
			$fields_t_encrypt = "encrypt_codigo_t";
			$fields_t_empleado = "empleado_t";
			$fields_t_inicio = "inicio_t";
			$fields_t_fin = "fin_t";
			// ----- tabla usuarios ----- //
			$fields_u_id = "id_u";
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
			// --------------- variables de numeración --------------- //
			// variable con el numero 1
			$num_val1 = 1;
			// variable con el numero 2
			$num_val2 = 2;
			// variable con el numero 3
			$num_val3 = 3;
			// variable con el numero 5
			$num_val5 = 5;
			// --------------- variables de ordenamiento --------------- //
			$orderASC = "ASC";
			$orderDESC = "DESC";
			// --------------- HEADER --------------- //
			$query_header['tbl_e'] = ""; // obtenemos el empleado
			// ------ VALORES PARA PONER COLOR Y QUE APAREZCA EL NOMBRE EN EL HEADER ------ //
			$query_header['tbl_pue'] = ""; // obtenemos el puesto del empleado
			$query_header['tbl_a'] = ""; // obtenemos el area del empleado
			$query_header['tbl_em'] = ""; // obtenemos la empresa del empleado
			$query_header['tbl_em_ruta'] = ""; // ruta para la foto del empleado
			$query_menu['tbl_e'] = ""; // obtenemos el empleado
			// --------------- HOME --------------- //
			$query_home['tbl_em'] = ""; // mandamos la empresa para el logo del home
			if (!empty($session_validate)){ // validamos las variables de sesion
				// si viene la variable de sesion | validamos que sea iguala a true
				// --------------- HEADER --------------- //
				$select = "id_e, foto_empleado_e, encrypt_numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, puesto_e, fecha_ingreso_e";
				$query_header['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $session_empleado); // obtenemos el empleado
				// ------ VALORES PARA PONER COLOR Y QUE APAREZCA EL NOMBRE EN EL HEADER ------ //
				$select = "puesto_pue, area_pue";
				$query_header['tbl_pue'] = $this -> mm -> getRowWhere1($select, $tbl_pue, $fields_pue_id, $query_header['tbl_e'] -> puesto_e); // obtenemos el puesto del empleado
				$select = "area_a, empresa_a";
				$query_header['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $query_header['tbl_pue'] -> area_pue); // obtenemos el area del empleado
				$select = "id_em, ruta_em, icono_em, jefe_inmediato_em";
				$query_header['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $query_header['tbl_a'] -> empresa_a); // obtenemos la empresa del empleado
				$query_header['tbl_em_ruta'] = $query_header['tbl_em'] -> ruta_em; // ruta para la foto del empleado
				$query_menu['tbl_e'] = $query_header['tbl_e']; // obtenemos el empleado
				// --------------- HOME --------------- //
				$query_home['tbl_em'] = $query_header['tbl_em']; // mandamos la empresa para el logo del home
				if ($session_validate == "true") { // validamos que la sesión sea igual a true
					if (!empty($universal_company)) { // validamos que exista la empresa
						$select = "fregistro_em";
						$query_controller['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_ruta, $universal_company);
						if (!empty($query_controller['tbl_em'])) { // la empresa si viene | validamos que exista en la db
							if ($session_user == "DTrheo" || $session_user == "AVteleviales" || $session_user == "JHteleviales" || $session_user == "GLrheo" || $session_user == "JJcaemi" || $session_user == "VBrheo" || $session_user == "VJrheo" || $session_user == "GLapci" || $session_user == "ABinfinito" || $session_user == "GAteleviales" || $session_user == "ROapci" || $session_user == "MPcaemi" || $session_user == "DGapci" || $session_user == "AFapci" || $session_user == "GRteleviales" || $session_user == "VAteleviales" || $session_user == "SGrheo" || $session_user == "TSteleviales" || $session_user == "ECcaemi") { // la empresa si existe | validamos que el usuario sea empleado
								if (!empty($universal_url[0])) { // validamos que no venga información en la url
									$select = "ruta_mp";
									$query_controller['tbl_mp'] = $this -> mm -> getRowWhere2Like($select, $tbl_mp, $fields_mp_ruta, $universal_url[0], $fields_mp_usuario, $session_type);
									if (!empty($query_controller['tbl_mp'])) { // validamos que el metodo exista
										switch ($query_controller['tbl_mp'] -> ruta_mp) {
											// --------------- enviar correos --------------- //
											case 'send-files':
												if (empty($universal_url[1])) { // validamos si viene información en la url
													$select = "numero_empleado_e, apellido_paterno_e, apellido_materno_e, nombre_e, email_e, email_password_e";
													$controller_empleado = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $session_empleado); // buscamos al empleado
											    if (!empty($controller_empleado -> email_e) && !empty($controller_empleado -> email_password_e)) { // validamos que el empleado tenga correo y contraseña
											      $library_send_email['email'] = trim($controller_empleado -> email_e); // el empleado si tiene email | enviamos email
											      $library_send_email['email_password_e'] = trim($controller_empleado -> email_password_e);
											      $library_send_email['from'] = trim(mb_strtoupper($this -> input -> post('from-email'), 'UTF-8')); // validamos que vengan los datos del formulario
											      $library_send_email['Cc'] = trim(mb_strtoupper($this -> input -> post('Cc-email'), 'UTF-8'));
											      $library_send_email['Cco'] = trim(mb_strtoupper($this -> input -> post('Cco-email'), 'UTF-8'));
											      $library_send_email['subject'] = trim(mb_strtoupper($this -> input -> post('subject-email'), 'UTF-8'));
											      // $library_send_email['adjArchivos'] = trim($this -> input -> post('files-email'));
											      $library_send_email['redactar'] = trim(mb_strtoupper($this -> input -> post('redactar-email'), 'UTF-8'));
											      $library_send_email['empresa'] = trim($universal_company);
											      if (!empty($library_send_email['from'])) { // validamos si viene información del form
											        $controller_fecha = date('Y-m-d');
															$controller_file = 'Docs/emails/'.$library_send_email['empresa'].'/'.$controller_empleado -> numero_empleado_e.'/'.$controller_fecha.'/'.$library_send_email['from'].'/'.$library_send_email['subject'];
											        $library_send_email['adjArchivos'] = array();
															if (!file_exists($controller_file)) {
																mkdir($controller_file, 0777, true);
															}
															$controller_folder = opendir($controller_file); //Abrimos el directorio de destino
															if(!empty($_FILES['files-email']['name'])) {  // validamos que existan vacantes | para contabilizarlas
																$controller_total_file = count($_FILES["files-email"]['name']);
																for ($i=0; $i <= $controller_total_file - 1; $i++) {
																	move_uploaded_file($_FILES['files-email']['tmp_name'][$i],"Docs/emails/".$library_send_email['empresa'].'/'.$controller_empleado -> numero_empleado_e."/".$controller_fecha."/".$library_send_email['from'].'/'.$library_send_email['subject'].'/'.$_FILES['files-email']['name'][$i]);
																	$controller_docs = $_FILES["files-email"]['name'][$i];
																	$library_send_email['adjArchivos'][] = $controller_docs;
																}
															}
											        closedir($controller_folder); //Cerramos el directorio de destino
															$insert_tbl_mu['movimiento_mu'] = 20; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = $library_send_email['from'];
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															$library_send_email['tbl_e'] = $controller_empleado; // mandamos al empleado para obtener los archivos de las carpetas
											        $result_library_send_email = $this -> se -> send($library_send_email); // si viene información | mandamos email
															// if ($result_library_send_email && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
																$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
												        $query_view_popup['text'] = "¡El correo se envió exitosamente!";
												        $query_view_popup['type'] = "success";
												        $query_view_popup['ruta'] = "ruta";
												        // --------------- VISTAS --------------- //
												        $this -> load -> view('main/Header', $query_header);
												        $this -> load -> view('menu/employee', $query_menu);
												        $this -> load -> view('popup/popup_time', $query_view_popup);
												        $this -> load -> view('main/Footer');
															// }
															// else { // hubo un error en los querys | mandamos alerta de error
															// 	$query_view_popup['title'] = "¡ERROR!";
															// 	$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
															// 	$query_view_popup['type'] = "error";
															// 	$query_view_popup['ruta'] = "ruta";
															// 	// --------------- VISTAS --------------- //
															// 	$this -> load -> view('main/Header', $query_header);
															// 	$this -> load -> view('menu/employee', $query_menu);
															// 	$this -> load -> view('bug/404');
															// 	$this -> load -> view('popup/popup_time', $query_view_popup);
															// 	$this -> load -> view('main/Footer');
															// }
											      }
														else { // no viene información | redirigimos a la página de error 404
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/employee', $query_menu);
													    $this -> load -> view('bug/404');
													    $this -> load -> view('main/Footer');
											      }
											    }
											    else { // el empleado no tiene permiso para enviar email | mandamos alerta de error
											      $query_view_popup['title'] = "¡ERROR!";
											      $query_view_popup['text'] = "Ponte en contacto con el administrador para que genere tus permisos para enviar email.";
											      $query_view_popup['type'] = "error";
											      $query_view_popup['ruta'] = "ruta";
											      // --------------- VISTAS --------------- //
											      $this -> load -> view('main/Header', $query_header);
											      $this -> load -> view('menu/employee', $query_menu);
														$this -> load -> view('bug/404');
											      $this -> load -> view('popup/popup_time', $query_view_popup);
											      $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/employee', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- agregar tareas --------------- //
											case 'add-task':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
											      $select = "id_e, numero_empleado_e";
											      $controller_empleado = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
														if (!empty($controller_empleado)) { // si existe | buscamos al empleado en la db
															$controller_task_total = $this -> input -> post('total_task');
															if (!empty($controller_task_total)) { // validamos si viene información del formulario
																if (is_numeric($controller_task_total)) { // viene con información | validamos que sea un número
																	for ($i = 1; $i <= $controller_task_total ; $i++) { // si es número | obtenemos los valores
																		$insert_tbl_t['status_t'] = 1;
																		$insert_tbl_t['autor_t'] = 2;
																		$library_code = 8;
																		$result_library_code_t = trim($this -> random_code_generator -> index($library_code));
																		$insert_tbl_t['codigo_t'] = preg_replace('[\s+]',"", "ap-t-".$controller_empleado -> numero_empleado_e."-".$result_library_code_t);
																		$insert_tbl_t['encrypt_codigo_t'] = hash('whirlpool', $insert_tbl_t['codigo_t']);
																		$select = "fregistro_t";
																		$query_controller_tbl_t['codigo'] = $this -> mm -> getAllWhere1($select, $tbl_t, $fields_t_encrypt, $insert_tbl_t['encrypt_codigo_t']);
																		if (empty($query_controller_tbl_t['codigo'])) { // validamos si el código ya existe en la db
																			$insert_tbl_t['empleado_t'] = $controller_empleado -> id_e;
																			$insert_tbl_t['nombre_tarea_t'] = $this -> input -> post('task'.$i);
																			$insert_tbl_t['fecha_estimada_t'] = "";
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
												 							$this -> load -> view('menu/employee', $query_menu);
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
																		$query_view_popup['text'] = "¡Se agregaron todas tus tareas del día de hoy, favor de inicializarlas!";
																		$query_view_popup['type'] = "success";
																		$query_view_popup['ruta'] = "ruta";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('menu/employee', $query_menu);
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
																		$this -> load -> view('menu/employee', $query_menu);
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
																	$this -> load -> view('menu/employee', $query_menu);
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
																$this -> load -> view('menu/employee', $query_menu);
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
															$this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													// viene vacio | redirigimos a la página de error 404
													else {
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/employee', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
												}
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/employee', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver tareas --------------- //
											case 'view-my-task':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
											      $select = "id_e, encrypt_numero_empleado_e";
											      $query_view_mt['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
											      if (!empty($query_view_mt['tbl_e'])) { // si existe | buscamos la tarea en la db
											        $select = "status_t, autor_t, encrypt_codigo_t, nombre_tarea_t, fecha_estimada_t, inicio_t, fin_t, dia_creacion_t, mes_creacion_t, anio_creacion_t, comentarios_d_t";
											        $query_view_mt['tbl_t'] = $this -> mm -> getAllWhere1Order($select, $tbl_t, $fields_t_empleado, $query_view_mt['tbl_e'] -> id_e, $fields_t_id, $orderDESC);
															if (!empty($query_view_mt['tbl_t'])) { // validamos que existan tareas | para contabilizarlas
															  $query_view_mt['total_tbl_t'] = count($query_view_mt['tbl_t']);
															}
															else { // no existen tareas | mandamos el valor total en 0
															  $query_view_mt['total_tbl_t'] = 0;
															}
															$query_view_mt['tbl_em'] = $query_header['tbl_em'];
															// insertamos el movimiento realizado
															$insert_tbl_mu['movimiento_mu'] = 86;
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/employee', $query_menu);
											        $this -> load -> view('employee/taks/my_taks', $query_view_mt);
											        $this -> load -> view('main/Footer');
														}
														else { // la tarea no existe | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos la tarea no se encuentra registrado, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
  											    $this -> load -> view('menu/employee', $query_menu);
  											    $this -> load -> view('bug/404');
  											    $this -> load -> view('main/Footer');
											    }
												}
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/employee', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- iniciar tareas --------------- //
											case 'start-task':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
														$select = "fregistro_t";
														$controller_task = $this -> mm -> getRowWhere1($select, $tbl_t, $fields_t_encrypt, $universal_url[1]);
														if (!empty($controller_task)) { // si existe la tarea | actualizamos la hora
															$update_tbl_t['inicio_t'] = date('H:i:s');
															$update_tbl_t['fecha_inicio_t'] = date('Y-m-d');
															$update_tbl_t['status_t'] = 2;
															$result_update_tbl_t = $this -> mm -> updateWhere1($tbl_t, $fields_t_encrypt, $universal_url[1], $update_tbl_t);
															$insert_tbl_mu['movimiento_mu'] = 87; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															if ($result_update_tbl_t == "true" && $result_insert_tbl_mu = "true") { // validamos si se ejecutaron los querys
																$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																$query_view_popup['text'] = "¡Se inicio la tarea, no te olvides de finalizarla cuando la termines!";
																$query_view_popup['type'] = "success";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/employee', $query_menu);
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
																$this -> load -> view('menu/employee', $query_menu);
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
															$this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													// viene vacio | redirigimos a la página de error 404
													else {
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/employee', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/employee', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- terminar tareas --------------- //
											case 'finish-task':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
														$select = "status_t, autor_t";
														$controller_task = $this -> mm -> getRowWhere1($select, $tbl_t, $fields_t_encrypt, $universal_url[1]);
														if (!empty($controller_task)) { // si existe | buscamos la tarea en la db
															if ($controller_task -> status_t == 2) { // si existe la tarea | validamos que se haya iniciado primero
																if ($controller_task -> autor_t == 1) { // validamos si la tarea fue creada por dirección | mandamos a validación
																	$update_tbl_t['status_t'] = 3;
																	$result_update_tbl_t = $this -> mm -> updateWhere1($tbl_t, $fields_t_encrypt, $universal_url[1], $update_tbl_t);
																	$insert_tbl_mu['movimiento_mu'] = 100; // insertamos el movimiento realizado
																	$insert_tbl_mu['usuario_mu'] = $session_login;
																	$insert_tbl_mu['receptor_mu'] = "";
																	$insert_tbl_mu['hora_mu'] = date('H:i:s');
																	$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																	$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																	if ($result_update_tbl_t == "true" && $result_insert_tbl_mu = "true") { // validamos si se ejecutaron los querys
																		$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																		$query_view_popup['text'] = "¡Tu tarea se fue a validación. Espera el Vo.Bo. del autor de la tarea!";
																		$query_view_popup['type'] = "info";
																		$query_view_popup['ruta'] = "ruta";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('menu/employee', $query_menu);
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
																		$this -> load -> view('menu/employee', $query_menu);
																		$this -> load -> view('bug/404');
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																}
																else { // la tarea fue creada por el empleado | finalizamos tarea
																	$update_tbl_t['fin_t'] = date('H:i:s');
																	$update_tbl_t['fecha_fin_t'] = date('Y-m-d');
																	$update_tbl_t['comentarios_e_t'] = trim(mb_strtoupper($this -> input -> post('coment_e'), 'UTF-8'));
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
																		$this -> load -> view('menu/employee', $query_menu);
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
																		$this -> load -> view('menu/employee', $query_menu);
																		$this -> load -> view('bug/404');
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																}
															}
															elseif ($controller_task -> status_t == 4) {
																$update_tbl_t['status_t'] = 3;
																$result_update_tbl_t = $this -> mm -> updateWhere1($tbl_t, $fields_t_encrypt, $universal_url[1], $update_tbl_t);
																$insert_tbl_mu['movimiento_mu'] = 100; // insertamos el movimiento realizado
																$insert_tbl_mu['usuario_mu'] = $session_login;
																$insert_tbl_mu['receptor_mu'] = "";
																$insert_tbl_mu['hora_mu'] = date('H:i:s');
																$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																if ($result_update_tbl_t == "true" && $result_insert_tbl_mu = "true") { // validamos si se ejecutaron los querys
																	$query_view_popup['title'] = "¡LISTO!"; // los querys se ejecutaron | mandamos alerta de success
																	$query_view_popup['text'] = "¡Tu tarea se fue a validación. Espera el Vo.Bo. del autor de la tarea!";
																	$query_view_popup['type'] = "info";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('menu/employee', $query_menu);
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
																	$this -> load -> view('menu/employee', $query_menu);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // la tarea no se inicio antes | mandamos alerta de error
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "Lo sentimos no podemos validar la tarea porque no la has iniciado.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('menu/employee', $query_menu);
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
															$this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													// viene vacio | redirigimos a la página de error 404
													else {
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/employee', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/employee', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver tareas pendinetes --------------- //
											case 'view-pending-tasks':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
														$select = "id_e, encrypt_numero_empleado_e";
														$query_view_mt['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
														if (!empty($query_view_mt['tbl_e'])) { // si existe | buscamos la tarea en la db
															$select = "status_t, autor_t, encrypt_codigo_t, nombre_tarea_t, fecha_estimada_t, inicio_t, fin_t, dia_creacion_t, mes_creacion_t, anio_creacion_t, comentarios_d_t";
															$query_view_mt['tbl_t'] = $this -> mm -> getAllWhere2Order($select, $tbl_t, $fields_t_empleado, $query_view_mt['tbl_e'] -> id_e, $fields_t_status, $num_val1, $fields_t_id, $orderDESC);
															if (!empty($query_view_mt['tbl_t'])) { // validamos que existan tareas | para contabilizarlas
																$query_view_mt['total_tbl_t'] = count($query_view_mt['tbl_t']);
															}
															else { // no existen tareas | mandamos el valor total en 0
																$query_view_mt['total_tbl_t'] = 0;
															}
															$query_view_mt['tbl_em'] = $query_header['tbl_em'];
															// insertamos el movimiento realizado
															$insert_tbl_mu['movimiento_mu'] = 97;
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('employee/taks/my_taks', $query_view_mt);
															$this -> load -> view('main/Footer');
														}
														else { // la tarea no existe | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos la tarea no se encuentra registrado, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/employee', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/employee', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver tareas trabajando --------------- //
											case 'view-working-tasks':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
														$select = "id_e, encrypt_numero_empleado_e";
														$query_view_mt['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
														if (!empty($query_view_mt['tbl_e'])) { // si existe | buscamos la tarea en la db
															$select = "status_t, autor_t, encrypt_codigo_t, nombre_tarea_t, fecha_estimada_t, inicio_t, fin_t, dia_creacion_t, mes_creacion_t, anio_creacion_t, comentarios_d_t";
															$query_view_mt['tbl_t'] = $this -> mm -> getAllWhere2Order($select, $tbl_t, $fields_t_empleado, $query_view_mt['tbl_e'] -> id_e, $fields_t_status, $num_val2, $fields_t_id, $orderDESC);
															if (!empty($query_view_mt['tbl_t'])) { // validamos que existan tareas | para contabilizarlas
																$query_view_mt['total_tbl_t'] = count($query_view_mt['tbl_t']);
															}
															else { // no existen tareas | mandamos el valor total en 0
																$query_view_mt['total_tbl_t'] = 0;
															}
															$query_view_mt['tbl_em'] = $query_header['tbl_em'];
															// insertamos el movimiento realizado
															$insert_tbl_mu['movimiento_mu'] = 98;
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('employee/taks/my_taks', $query_view_mt);
															$this -> load -> view('main/Footer');
														}
														else { // la tarea no existe | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos la tarea no se encuentra registrado, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/employee', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/employee', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver tareas atendidas --------------- //
											case 'view-completed-tasks':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
														$select = "id_e, encrypt_numero_empleado_e";
														$query_view_mt['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
														if (!empty($query_view_mt['tbl_e'])) { // si existe | buscamos la tarea en la db
															$select = "status_t, autor_t, encrypt_codigo_t, nombre_tarea_t, fecha_estimada_t, inicio_t, fin_t, dia_creacion_t, mes_creacion_t, anio_creacion_t, comentarios_d_t";
															$query_view_mt['tbl_t'] = $this -> mm -> getAllWhere2Order($select, $tbl_t, $fields_t_empleado, $query_view_mt['tbl_e'] -> id_e, $fields_t_status, $num_val5, $fields_t_id, $orderDESC);
															if (!empty($query_view_mt['tbl_t'])) { // validamos que existan tareas | para contabilizarlas
																$query_view_mt['total_tbl_t'] = count($query_view_mt['tbl_t']);
															}
															else { // no existen tareas | mandamos el valor total en 0
																$query_view_mt['total_tbl_t'] = 0;
															}
															$query_view_mt['tbl_em'] = $query_header['tbl_em'];
															// insertamos el movimiento realizado
															$insert_tbl_mu['movimiento_mu'] = 99;
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('employee/taks/my_taks', $query_view_mt);
															$this -> load -> view('main/Footer');
														}
														else { // la tarea no existe | mandamos alerta de error
															$query_view_popup['title'] = "¡ERROR!";
															$query_view_popup['text'] = "Lo sentimos la tarea no se encuentra registrado, intentalo nuevamente.";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('menu/employee', $query_menu);
														$this -> load -> view('bug/404');
														$this -> load -> view('main/Footer');
													}
												}
												else { // viene variable | redirigimos a la página de error 404
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('menu/employee', $query_menu);
													$this -> load -> view('bug/404');
													$this -> load -> view('main/Footer');
												}
											break;
											// --------------- ver mis evaluaciones --------------- //
											case 'view-my-evaluations':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
											      $select = "id_e";
											      $controller_empleado = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
											      if (!empty($controller_empleado)) { // si existe | buscamos al empleado en la db
											        $select = "encrypt_codigo_ev, fecha_evaluacion_ev, comentarios_ev";
											        $query_view_me['tbl_ev'] = $this -> mm -> getAllWhere1Order($select, $tbl_ev, $fields_ev_empleado, $controller_empleado -> id_e, $fields_ev_id, $orderDESC);
															if (!empty($query_view_me['tbl_ev'])) { // validamos que existan vacantes | para contabilizarlas
															  $query_view_me['total_tbl_ev'] = count($query_view_me['tbl_ev']);
															}
															else { // no existen vacantes | mandamos el valor total en 0
															  $query_view_me['total_tbl_ev'] = 0;
															}
															$query_view_me['tbl_em'] = $query_header['tbl_em'];
															$insert_tbl_mu['movimiento_mu'] = 83; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/employee', $query_menu);
											        $this -> load -> view('employee/evaluation/my_evaluations', $query_view_me);
											        $this -> load -> view('main/Footer');
											      }
											      else { // el empleado no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/employee', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/employee', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- descargar mis evaluaciones --------------- //
											case 'download-my-evaluation':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // validamos si viene información en la url
											      $select = "codigo_ev, calificacion_ev, comunicacion_ev, tolerancia_ev, autocontrol_ev, motivacion_ev, adaptacion_ev, seguridad_ev, creatividad_ev, cooperacion_ev, normas_ev, vision_ev, planeacion_ev, organizacional_ev, seguimiento_ev, liderazgo_ev, responsabilidad_ev, ejecucion_ev, confiabilidad_ev, social_ev, manejo_ev, rendimiento_ev, trabajo_ev, asertividad_ev, empuje_ev, comentarios_ev, fecha_evaluacion_ev";
											      $library_evaluacion['tbl_ev'] = $this -> mm -> getRowWhere1($select, $tbl_ev, $fields_ev_encrypt, $universal_url[1]);
											      if (!empty($library_evaluacion['tbl_ev'])) { // validar que existe la evaluación
											        $library_evaluacion['tbl_e'] = $query_header['tbl_e']; // si existe la evaluación | empleado
											        $library_evaluacion['tbl_pue'] = $query_header['tbl_pue'] ; // puesto
											        $library_evaluacion['tbl_a'] = $query_header['tbl_a'] ; // area
											        $library_evaluacion['tbl_em'] = $query_header['tbl_em'] ; // empresa
															$insert_tbl_mu['movimiento_mu'] = 23; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        $this -> pdf_generator -> generate_evaluation($library_evaluacion);
											      }
											      else { // la evaluación no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
											    else { // viene variable | redirigimos a la página de error 404
											      $this -> load -> view('main/Header', $query_header);
											      $this -> load -> view('menu/employee', $query_menu);
											      $this -> load -> view('bug/404');
											      $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/employee', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver mis permisos --------------- //
											case 'view-my-permissions':
											  if (empty($universal_url[2])) { // validamos si viene información en la url
											    if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
											      $select = "id_e";
											      $query_view_mp['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
														if (!empty($query_view_mp['tbl_e'])) { // si existe | buscamos al empleado en la db
															$select = "fecha_permiso_p, inicio_p, fin_p, horas_p";
											        $query_view_mp['tbl_p'] = $this -> mm -> getAllWhere1($select, $tbl_p, $fields_p_empleado, $query_view_mp['tbl_e'] -> id_e); // el empleado si existe en la db | obtenemos todos los permisos del empleado
															if (!empty($query_view_mp['tbl_p'])) { // validamos que existan permisos | para contabilizarlas
															  $query_view_mp['total_tbl_p'] = count($query_view_mp['tbl_p']);
															}
															else { // no existen permisos | mandamos el valor total en 0
															  $query_view_mp['total_tbl_p'] = 0;
															}
															$insert_tbl_mu['movimiento_mu'] = 84; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/employee', $query_menu);
											        $this -> load -> view('employee/permissions/my_permissions', $query_view_mp);
											        $this -> load -> view('main/Footer');
											      }
											      else { // el empleado no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/employee', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/employee', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver mis permisos urgentes --------------- //
											case 'view-my-urgent-permission':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // la empresa si existe | validamos que venga el empleado
														$select = "id_e";
											      $query_view_mup['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
														if (!empty($query_view_mup['tbl_e'])) { // si existe | buscamos al empleado en la db
															$select = "hora_pu, fecha_pu";
											        $query_view_mup['tbl_pu'] = $this -> mm -> getAllWhere1($select, $tbl_pu, $fields_pu_empleado, $query_view_mup['tbl_e'] -> id_e); // el empleado si existe en la db | obtenemos todos los permisos del empleado
															if (!empty($query_view_mup['tbl_pu'])) { // validamos que existan vacantes | para contabilizarlas
															  $query_view_mup['total_tbl_pu'] = count($query_view_mup['tbl_pu']);
															}
															else { // no existen vacantes | mandamos el valor total en 0
															  $query_view_mup['total_tbl_pu'] = 0;
															}
															$insert_tbl_mu['movimiento_mu'] = 85; // insertamos el movimiento realizado
															$insert_tbl_mu['usuario_mu'] = $session_login;
															$insert_tbl_mu['receptor_mu'] = "";
															$insert_tbl_mu['hora_mu'] = date('H:i:s');
															$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
															$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/employee', $query_menu);
											        $this -> load -> view('employee/urgent_permits/my_urgent_permits', $query_view_mup);
											        $this -> load -> view('main/Footer');
											      }
											      else { // el empleado no existe | mandamos alerta de error
											        $query_view_popup['title'] = "¡ERROR!";
											        $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											        $query_view_popup['type'] = "error";
											        $query_view_popup['ruta'] = "ruta";
											        // --------------- VISTAS --------------- //
											        $this -> load -> view('main/Header', $query_header);
											        $this -> load -> view('menu/employee', $query_menu);
															$this -> load -> view('bug/404');
											        $this -> load -> view('popup/popup_time', $query_view_popup);
											        $this -> load -> view('main/Footer');
											      }
											    }
													else { // viene vacio | redirigimos a la página de error 404
														$this -> load -> view('main/Header', $query_header);
												    $this -> load -> view('menu/employee', $query_menu);
												    $this -> load -> view('bug/404');
												    $this -> load -> view('main/Footer');
											    }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/employee', $query_menu);
											    $this -> load -> view('bug/404');
											    $this -> load -> view('main/Footer');
											  }
											break;
											// --------------- ver mis vacaciones --------------- //
											case 'view-my-holidays':
												if (empty($universal_url[2])) { // validamos si viene información en la url
													if (!empty($universal_url[1])) { // validamos el número de empleado
											        // si viene número | validamos que exista el empleado
															$select = "id_e";
												      $query_view_mh['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_encrypt, $universal_url[1]);
															if (!empty($query_view_mh['tbl_e'])) {
																$select = "title, color, textcolor, start, end";
																$query_view_mh['tbl_v'] = json_encode($this -> mm -> getAllWhere1($select, $tbl_v, $fields_v_empleado, $query_view_mh['tbl_e'] -> id_e));
												        $query_view_mh['count_tbl_v'] = $this -> mm -> getAllWhere1($select, $tbl_v, $fields_v_empleado, $query_view_mh['tbl_e'] -> id_e);
																if (!empty($query_view_mh['count_tbl_v'])) { // validamos que existan vacantes | para contabilizarlas
																  $query_view_mh['total_tbl_v'] = count($query_view_mh['count_tbl_v']);
																}
																else { // no existen vacantes | mandamos el valor total en 0
																  $query_view_mh['total_tbl_v'] = 0;
																}
																$insert_tbl_mu['movimiento_mu'] = 24; // insertamos el movimiento realizado
																$insert_tbl_mu['usuario_mu'] = $session_login;
																$insert_tbl_mu['receptor_mu'] = "";
																$insert_tbl_mu['hora_mu'] = date('H:i:s');
																$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											          $this -> load -> view('main/Header', $query_header);
											          $this -> load -> view('menu/employee', $query_menu);
											          $this -> load -> view('employee/holidays/my_holidays', $query_view_mh);
											          $this -> load -> view('main/Footer');
											        }
											        else { // el empleado no existe | mandamos alerta de error
											          $query_view_popup['title'] = "¡ERROR!";
											          $query_view_popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
											          $query_view_popup['type'] = "error";
											          $query_view_popup['ruta'] = "ruta";
											          // --------------- VISTAS --------------- //
											          $this -> load -> view('main/Header', $query_header);
											          $this -> load -> view('menu/employee', $query_menu);
																$this -> load -> view('bug/404');
											          $this -> load -> view('popup/popup_time', $query_view_popup);
											          $this -> load -> view('main/Footer');
											        }
											      }
														else { // viene variable | redirigimos a la página de error 404
															$this -> load -> view('main/Header', $query_header);
													    $this -> load -> view('menu/employee', $query_menu);
													    $this -> load -> view('bug/404');
													    $this -> load -> view('main/Footer');
										      }
											  }
											  else { // viene variable | redirigimos a la página de error 404
											    $this -> load -> view('main/Header', $query_header);
											    $this -> load -> view('menu/employee', $query_menu);
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
									$insert_tbl_mu['movimiento_mu'] = 82; // insertamos el movimiento realizado
									$insert_tbl_mu['usuario_mu'] = $session_login;
									$insert_tbl_mu['receptor_mu'] = "";
									$insert_tbl_mu['hora_mu'] = date('H:i:s');
									$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
									$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
									$this -> load -> view('main/Header', $query_header);
									$this -> load -> view('menu/employee', $query_menu);
									$this -> load -> view('home/employee_home', $query_home);
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
