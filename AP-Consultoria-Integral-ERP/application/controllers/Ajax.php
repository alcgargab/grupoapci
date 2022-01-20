<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Ajax extends CI_Controller {
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

		public function index($universal_company = NULL, $universal_url = NULL){
			// --------------- variables para tablas --------------- //
			$tbl_a = "areas";
			$tbl_e = "empleados";
			$tbl_em = "empresas";
			$tbl_en = "entrevistas";
			$tbl_ev = "evaluaciones";
			$tbl_ex = "expedientes";
			$tbl_mp = "metodos_permitidos";
			$tbl_ps = "pases_salidas";
			$tbl_p = "permisos";
			$tbl_pr = "prospectos";
			$tbl_pue = "puestos";
			$tbl_t = "tareas";
			$tbl_v = "vacaciones";
			$tbl_va = "vacantes";
			// --------------- variables para campos --------------- //
			// ----- tabla areas ----- //
			$fields_a_id = "id_a";
			$fields_a_empresa = "empresa_a";
			// ----- tabla empleados ----- //
			$fields_e_id = "id_e";
			$fields_e_nuevo = "nuevo_e";
			// ----- tabla empresas ----- //
			$fields_em_id = "id_em";
			$fields_em_ruta = "ruta_em";
			// ----- tabla evaluaciones ----- //
			$fields_ev_nuevo = "nuevo_ev";
			// ----- tabla expedientes ----- //
			$fields_ex_nuevo = "nuevo_ex";
			// ----- tabla metodos_permitidos ----- //
			$fields_mp_ruta = "ruta_mp";
			$fields_mp_usuario = "usuario_mp";
			// ----- tabla puestos ----- //
			$fields_pue_id = "id_pue";
			// ----- tabla pases de salida ----- //
			$fields_ps_nuevo = "nuevo_ps";
			// ----- tabla permisos ----- //
			$fields_p_nuevo = "nuevo_p";
			// ----- tabla tareas ----- //
			$fields_t_empleado = "empleado_t";
			$fields_t_nuevo = "nuevo_t";
			// ----- tabla vacaciones ----- //
			$fields_v_nuevo = "nuevo_v";
			// ----- tabla vacantes ----- //
			$fields_va_nuevo = "nuevo_va";
			$fields_va_fecha_limite = "fecha_limite_va";
			$fields_va_status = "status_va";
			// --------------- variables de sesion --------------- //
			$session_validate = $this -> session -> validate;
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
			// --------------- HOME --------------- //
			if (!empty($session_validate)){ // validamos las variables de sesion
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
				if ($session_validate == "true") { // si viene la variable de sesion | validamos que sea iguala a true
					if (!empty($universal_company)) { // validamos que exista la empresa
						$select = "fregistro_em";
						$query_controller['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_ruta, $universal_company);
						if (!empty($query_controller['tbl_em'])) { // la empresa si viene | validamos que exista en la db
							$select = "ruta_mp";
							$query_controller['tbl_mp'] = $this -> mm -> getRowWhere2Like($select, $tbl_mp, $fields_mp_ruta, $universal_url[0], $fields_mp_usuario, $session_type);
							if (!empty($query_controller['tbl_mp'])) { // si viene información en la url | validamos que el metodo exista y que el usuario sea el correcto
								switch ($query_controller['tbl_mp'] -> ruta_mp) {
									// *************** USUARIO TIPO EMPLEADO *************** //
									// --------------- validar si existen nuevas tareas --------------- //
									case 'validate-new-task':
										$select = "fregistro_t";
										$ajax_task = $this -> mm -> getAllWhere2($select, $tbl_t, $fields_t_empleado, $session_empleado, $fields_t_nuevo, $num_val2);
										if (!empty($ajax_task)) { // validamos que existan vacantes | para contabilizarlas
											$ajax_total_task = count($ajax_task);
										}
										else { // no existen vacantes | mandamos el valor total en 0
											$ajax_total_task = 0;
										}
										echo $ajax_total_task;
									break;
									// --------------- actualizar las alertas --------------- //
									case 'update-alert-task':
										$result_update_tbl_t = $this -> mm -> updateOneWhere1($tbl_t, $fields_t_nuevo, $num_val1, $fields_t_empleado, $session_empleado);
										echo $result_update_tbl_t;
									break;
									// ************************************************** //
									// *************** USUARIO TIPO RRHH *************** //
									// --------------- validar si existen nuevos empleados --------------- //
									case 'validate-new-employee':
										$select = "fregistro_e";
										$ajax_empleado = $this -> mm -> getAllWhere1($select, $tbl_e, $fields_e_nuevo, $num_val2);
										if (!empty($ajax_empleado)) { // validamos que existan vacantes | para contabilizarlas
											$ajax_total_empleado = count($ajax_empleado);
										}
										else { // no existen vacantes | mandamos el valor total en 0
											$ajax_total_empleado = 0;
										}
										echo $ajax_total_empleado;
									break;
									// --------------- actualizar las alertas --------------- //
									case 'update-alert-new-employee':
										$result_update_tbl_e = $this -> mm -> updateOneWhere1($tbl_e, $fields_e_nuevo, $num_val1, $fields_e_nuevo, $num_val2);
										echo $result_update_tbl_e;
									break;
									// --------------- validar si existen nuevas vacantes --------------- //
									case 'validate-new-job-vacancies':
										$select = "fregistro_va";
										$ajax_vacante = $this -> mm -> getAllWhere1($select, $tbl_va, $fields_va_nuevo, $num_val2);
										if (!empty($ajax_vacante)) { // validamos que existan vacantes | para contabilizarlas
											$ajax_total_vacante = count($ajax_vacante);
										}
										else { // no existen vacantes | mandamos el valor total en 0
											$ajax_total_vacante = 0;
										}
										echo $ajax_total_vacante;
									break;
									// --------------- actualizar las alertas --------------- //
									case 'update-alert-new-job-vacancies':
										$result_update_tbl_va = $this -> mm -> updateOneWhere1($tbl_va, $fields_va_nuevo, $num_val1, $fields_va_nuevo, $num_val2);
										echo $result_update_tbl_va;
									break;
									// --------------- validar si existen nuevas evaluaciones --------------- //
									case 'validate-new-evaluation':
										$select = "fregistro_ev";
										$ajax_evaluacion = $this -> mm -> getAllWhere1($select, $tbl_ev, $fields_ev_nuevo, $num_val2);
										if (!empty($ajax_evaluacion)) { // validamos que existan vacantes | para contabilizarlas
											$ajax_total_evaluacion = count($ajax_evaluacion);
										}
										else { // no existen vacantes | mandamos el valor total en 0
											$ajax_total_evaluacion = 0;
										}
										echo $ajax_total_evaluacion;
									break;
									// --------------- actualizar las alertas --------------- //
									case 'update-alert-new-evaluation':
										$result_update_tbl_ev = $this -> mm -> updateOneWhere1($tbl_ev, $fields_ev_nuevo, $num_val1, $fields_ev_nuevo, $num_val2);
										echo $result_update_tbl_ev;
									break;
									// --------------- validar si existen nuevos pases de salida --------------- //
									case 'validate-new-exit-pass':
										$select = "fregistro_ps";
										$ajax_pase_salida = $this -> mm -> getAllWhere1($select, $tbl_ps, $fields_ps_nuevo, $num_val2);
										if (!empty($ajax_pase_salida)) { // validamos que existan vacantes | para contabilizarlas
											$ajax_total_pase_salida = count($ajax_pase_salida);
										}
										else { // no existen vacantes | mandamos el valor total en 0
											$ajax_total_pase_salida = 0;
										}
										echo $ajax_total_pase_salida;
									break;
									// --------------- actualizar las alertas --------------- //
									case 'update-alert-new-exit-pass':
										$result_update_tbl_ps = $this -> mm -> updateOneWhere1($tbl_ps, $fields_ps_nuevo, $num_val1, $fields_ps_nuevo, $num_val2);
										echo $result_update_tbl_ps;
									break;
									// --------------- validar si existen nuevos permisos --------------- //
									case 'validate-new-work-permits':
										$select = "fregistro_p";
										$ajax_permisos = $this -> mm -> getAllWhere1($select, $tbl_p, $fields_p_nuevo, $num_val2);
										if (!empty($ajax_permisos)) { // validamos que existan vacantes | para contabilizarlas
											$ajax_total_permisos = count($ajax_permisos);
										}
										else { // no existen vacantes | mandamos el valor total en 0
											$ajax_total_permisos = 0;
										}
										echo $ajax_total_permisos;
									break;
									// --------------- actualizar las alertas --------------- //
									case 'update-alert-new-work-permits':
										$result_update_tbl_p = $this -> mm -> updateOneWhere1($tbl_p, $fields_p_nuevo, $num_val1, $fields_p_nuevo, $num_val2);
										echo $result_update_tbl_p;
									break;
									// --------------- validar si existen nuevos días de vacaciones --------------- //
									case 'validate-new-holidays':
										$select = "fregistro_v";
										$ajax_vacaciones = $this -> mm -> getAllWhere1($select, $tbl_v, $fields_v_nuevo, $num_val2);
										if (!empty($ajax_vacaciones)) { // validamos que existan vacantes | para contabilizarlas
											$ajax_total_vacaciones = count($ajax_vacaciones);
										}
										else { // no existen vacantes | mandamos el valor total en 0
											$ajax_total_vacaciones = 0;
										}
										echo $ajax_total_vacaciones;
									break;
									// --------------- actualizar las alertas --------------- //
									case 'update-alert-holidays':
										$result_update_tbl_v = $this -> mm -> updateOneWhere1($tbl_v, $fields_v_nuevo, $num_val1, $fields_v_nuevo, $num_val2);
										echo $result_update_tbl_v;
									break;
									// --------------- validar la fecha de vencimiento de la vacante --------------- //
									case 'validate-vacancy-date':
										$select = "fecha_limite_va";
										$ajax_vacantes = $this -> mm -> getAllWhere2Different($select, $tbl_va, $fields_va_fecha_limite, date('Y-m-d'), $fields_va_status, $num_val3);
										if (!empty($ajax_vacantes)) { // validamos que existan vacantes | para contabilizarlas
											$ajax_total_vacantes = count($ajax_vacantes);
										}
										else { // no existen vacantes | mandamos el valor total en 0
											$ajax_total_vacantes = 0;
										}
										echo $ajax_total_vacantes;
										// echo json_encode($ajax_vacantes);
									break;
									// ************************************************** //
									// *************** USUARIO TIPO DEVELOPER *************** //
									// --------------- validar si existen entrevistas FIX --------------- //
									case 'validate-new-job-interviews_FIX':
										$select = "id_a";
										$ctr_db_tbl_a = $this -> mm -> getAllWhere1($select, $tbl_a, $fields_a_empresa, $ctr_db_tbl_em -> id_em); // buscamos las areas con la empresa
										$select = "id_pue";
										$posicion = "id_a";
										$ctr_db_tbl_pue = $this -> mm -> getAllWhere1For($select, $tbl_pue, $cmp_db_a_pue, $ctr_db_tbl_a, $posicion); // obtenemos los puestos con el area
										$select = "id_va";
										$posicion = "id_pue";
										$ctr_db_tbl_va = $this -> mm -> getAllWhere1For($select, $tbl_va, $cmo_db_va_p, $ctr_db_tbl_pue, $posicion); // buscamos todas las vacantes
										if (!empty($ctr_db_tbl_va)) { // validamos que existan vacantes
											$select = "id_pr";
											$posicion = "id_va";
											$ctr_db_tbl_pr = $this -> mm -> getAllWhere1For($select, $tbl_pr, $cmp_db_pr_v, $ctr_db_tbl_va, $posicion); // buscamos todos los prospectos
											$select = "id_en";
											$posicion = "id_pr";
											$ctr_db_tbl_en = $this -> mm -> getAllWhere2For($select, $tbl_en, $cmp_db_en_p, $ctr_db_tbl_pr, $posicion, $cmp_db_en_n, $vlr_num_2); // buscamos todas las entrevistas
											if (!empty($ctr_db_tbl_en)) { // validamos que existan entrevistas | para contabilizarlas
												$tentrevista = count($ctr_db_tbl_en);
											}
											else { // no existen entrevistas | mandamos el valor total en 0
												$tentrevista = 0;
											}
											echo $tentrevista;
										}
										else { // no existen vacantes | mandamos el valor total en 0
											echo $tentrevista = 0;
										}
									break;
									// --------------- actualizar las alertas FIX --------------- //
									case 'update-alert-job-interviews_FIX':
										$select = "id_a";
										$ctr_db_tbl_a = $this -> mm -> getAllWhere1($select, $tbl_a, $fields_a_empresa, $ctr_db_tbl_em -> id_em); // buscamos las areas con la empresa
										$select = "id_pue";
										$posicion = "id_a";
										$ctr_db_tbl_pue = $this -> mm -> getAllWhere1For($select, $tbl_pue, $cmp_db_a_pue, $ctr_db_tbl_a, $posicion); // obtenemos los puestos con el area
										$select = "id_va";
										$posicion = "id_pue";
										$ctr_db_tbl_va = $this -> mm -> getAllWhere1For($select, $tbl_va, $cmo_db_va_p, $ctr_db_tbl_pue, $posicion); // buscamos todas las vacantes
										if (!empty($ctr_db_tbl_va)) { // validamos si existen vacantes
											$select = "id_pr";
											$posicion = "id_va";
											$ctr_db_tbl_pr = $this -> mm -> getAllWhere1For($select, $tbl_pr, $cmp_db_pr_v, $ctr_db_tbl_va, $posicion); // buscamos todos los prospectos
											$posicion = "id_pr";
											$update = $this -> mm -> updateWhere1For($tbl_en, $cmp_db_en_n, $vlr_num_1, $cmp_db_en_p, $ctr_db_tbl_pr, $posicion); // buscamos todas las entrevistas
											echo $update;
										}
										else { // no existen vacantes | mandamos el valor total en null
											echo "null";
										}
									break;
									// ****************************************************** //
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
