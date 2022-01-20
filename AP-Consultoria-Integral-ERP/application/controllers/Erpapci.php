<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Erpapci extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this -> load -> library('Random_code_generator', TRUE);
			$this -> load -> library('Detect_device', TRUE);
		}
		public function _remap($method, $params = array()) {
			if (!method_exists($this, $method)) {
				$this -> index($method, $params);
			}
			else {
				return call_user_func_array(array($this,$method), $params);
			}
		}

		public function indexFix($universal_method = NULL){
			// --------------- vista de actualizando ERP --------------- //
			$this -> load -> view('main/Fix');
		}
		public function index($universal_method = NULL, $universal_url = NULL){
			// $pass = gethostbyname($_SERVER['REMOTE_ADDR']);
			// $pass = php_uname();
			// $pass =	password_hash('R-0005', PASSWORD_DEFAULT, array("cost" => 12));
			// $library_code = 16;
			$pass = "ca-dp-Zvk*=yw6HGN%SGH2";
			// $pass = $code.date('Y-m-d').'-'.trim($this -> random_code_generator -> index($library_code));
			// $pass='brochure-ingenieria-nivel-medio-superior-y-superior';
			$passencrypt = hash('whirlpool', $pass);
			echo "<pre>"; print_r($pass); echo "<br>"; print_r($passencrypt); "</pre>"; die();
			// --------------- variables para tablas --------------- //
			$tbl_a = "areas";
			$tbl_e = "empleados";
			$tbl_em = "empresas";
			$tbl_l = "login";
			$tbl_lo = "logout";
			$tbl_mp = "metodos_permitidos";
			$tbl_mu = "movimientos_usuarios";
			$tbl_pue = "puestos";
			$tbl_stu = "status_tipo_usuario";
			$tbl_u = "usuarios";
			// --------------- variables para campos --------------- //
			// ----- tabla areas ----- //
			$fields_a_id = "id_a";
			// ----- tabla empleados ----- //
			$fields_e_id = "id_e";
			// ----- tabla empresas ----- //
			$fields_em_id = "id_em";
			// ----- tabla login ----- //
			$fields_l_token_encrypt = "token_encrypt_l";
			// ----- tabla logout ----- //
			$fields_lo_encrypt = "token_encrypt_lo";
			// ----- tabla metodos_permitidos ----- //
			$fields_mp_ruta = "ruta_mp";
			$fields_mp_usuario = "usuario_mp";
			// ----- tabla puestos ----- //
			$fields_pue_id = "id_pue";
			// ----- tabla usuarios ----- //
			$fields_u_id = "id_u";
			$fields_u_usuario = "usuario_u";
			$fields_u_status_usuario_u = "status_usuario_u";
			// --------------- variables de sesion --------------- //
			$session_validate = $this -> session -> validate;
			$session_token = $this -> session -> token;
			$session_empleado = $this -> session -> empleado;
			$session_login = $this -> session -> login;
			$session_user = $this -> session -> user;
			$session_type = $this -> session -> type;
			$session_time = $this -> session -> time;
			// --------------- variables de numeración --------------- //
			// variable con el numero 1
			$num_val1 = 1;
			// variable con el numero 2
			$num_val2 = 2;
			// --------------- HEADER --------------- //
			// obtenemos el empleado para pintar de color el header
			$select = "foto_empleado_e, nombre_e, puesto_e";
			$query_header['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $session_empleado);
			// --------------- MENU --------------- //
			$select = "id_u, empleado_u, usuario_u, password_u, u_tipo_usuario_u";
			$query_home['tbl_u'] = $this -> mm -> getRowWhere1($select, $tbl_u, $fields_u_id, $session_login); // obtenemos al usuario para las variables de reinicio de sesión
			// --------------- HOME --------------- //
			$select = "empresa_em";
			$query_home['tbl_em'] = $this -> mm -> getAll($select, $tbl_em);
			if (!empty($session_validate)){ // validamos las variables de sesion
				if ($session_validate == "true") { // si viene la variable de sesion | validamos que sea iguala a true
					// --------------- HEADER --------------- //
					$select = "area_pue";
					$valor = $query_header['tbl_e'] -> puesto_e;
					$query_header['tbl_pue'] = $this -> mm -> getRowWhere1($select, $tbl_pue, $fields_pue_id, $valor); // obtenemos el puesto del empleado para pintar de color el header
					$select = "empresa_a";
					$valor = $query_header['tbl_pue'] -> area_pue;
					$query_header['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $valor); // obtenemos el area del empleado para pintar de color el header
					$select = "id_em, ruta_em";
					$valor = $query_header['tbl_a'] -> empresa_a;
					$query_header['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $valor); // obtenemos la empresa del empleado para pintar de color el header
					$query_header['tbl_em_ruta'] = $query_header['tbl_em'] -> ruta_em; // ruta para la foto del empleado
					// --------------- HOME --------------- //
					$query_home['tbl_em_ruta'] = $query_header ['tbl_em'] -> ruta_em; // ruta para poner la empresa en los links
					if (!empty($universal_method)) { // validamos que venga información en la ruta
						$select = "ruta_mp";
						$query_controller['tbl_mp'] = $this -> mm -> getRowWhere2Like($select, $tbl_mp, $fields_mp_ruta, $universal_method, $fields_mp_usuario, $session_type);
						if (!empty($query_controller['tbl_mp'])) { // validamos que el metodo exista y que el usuario sea el correcto
							switch ($query_controller['tbl_mp'] -> ruta_mp) {
								// --------------- cerrar sesión --------------- //
								case 'logout':
									if (empty($universal_url[0])) { // validamos si viene información en la url
										if (!empty($_SESSION['validate'])) { // validamosm que venga la variable sesion
											$insert_tbl_lo['login_lo'] = $session_token;
											$library_code = 14;
											$result_library_code_lo = trim($this -> random_code_generator -> index($library_code));
											$insert_tbl_lo['token_lo'] = preg_replace('[\s+]',"", "ap-lo-".$result_library_code_lo);
											$insert_tbl_lo['token_encrypt_lo'] = hash('whirlpool', $insert_tbl_lo['token_lo']);
											$select = "token_encrypt_lo";
											$query_controller_tbl_lo['folio'] = $this -> mm -> getAllWhere1($select, $tbl_lo, $fields_lo_encrypt, $insert_tbl_lo['token_encrypt_lo']);
											if (empty($query_controller_tbl_lo['folio'])) { // buscamos si existe un código igual en la db
												$insert_tbl_lo['fecha_lo'] = date('Y-m-d');
												$insert_tbl_lo['hora_lo'] = date('H:i:s');
												$result_insert_tbl_lo = $this -> mm -> insert($tbl_lo, $insert_tbl_lo);
												$result_update_tbl_u = $this -> mm -> updateOneWhere1($tbl_u, $fields_u_status_usuario_u, $num_val2, $fields_u_id, $query_home['tbl_u'] -> id_u); // actualizamos el status del usuario
												$insert_tbl_mu['movimiento_mu'] = 39; // insertamos el movimiento realizado
												$insert_tbl_mu['usuario_mu'] = $this -> session -> login;
												$insert_tbl_mu['receptor_mu'] = "";
												$insert_tbl_mu['hora_mu'] = date('H:i:s');
												$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
												$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
												if ($result_insert_tbl_lo == "true" && $result_update_tbl_u == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
													session_destroy(); // los querys se ejecutaron | mandamos alerta de success
													// --------------- POPUP --------------- //
													$query_view_popup['title'] = "¡HASTA PRONTO!";
													$query_view_popup['text'] = "¡Has cerrado sesion!";
													$query_view_popup['type'] = "info";
													$query_view_popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('popup/popup_time', $query_view_popup);
													$this -> load -> view('main/Footer');
												}
												else { // hubo un error en los querys | mandamos alerta de error
													$query_view_popup['title'] = "¡ERROR!";
													$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													$query_view_popup['type'] = "error";
													$query_view_popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $query_header);
													$this -> load -> view('bug/404');
													$this -> load -> view('popup/popup_time', $query_view_popup);
													$this -> load -> view('main/Footer');
												}
											}
											else { // si existe el código | mandamos alerta de error
											  $query_view_popup['title'] = "¡ERROR!";
											  $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											  $query_view_popup['type'] = "error";
											  $query_view_popup['ruta'] = "base";
											  // --------------- VISTAS --------------- //
											  $this -> load -> view('main/Header', $query_header);
												$this -> load -> view('bug/404');
											  $this -> load -> view('popup/popup_time', $query_view_popup);
											  $this -> load -> view('main/Footer');
											}
										}
										else { // viene variable | redirigimos a la página de error 404
											$this -> load -> view('main/Header', $query_header);
											$this -> load -> view('bug/404');
											$this -> load -> view('main/Footer');
										}
									}
									else { // viene variable | redirigimos a la página de error 404
										$this -> load -> view('main/Header', $query_header);
										$this -> load -> view('bug/404');
										$this -> load -> view('main/Footer');
									}
								break;
								// --------------- validamos el timepo de la sesión --------------- //
								case 'validate-sesion-time':
									if (!empty($_SESSION['validate'])) { // validamosm que venga la variable sesion
										if (!empty($_SESSION['time'])) { // viene la variable de validar | validamos la variable de hora de sesion
											$operation_sesion_time = strtotime(date("H:i:s"))-strtotime($session_time); // calculamos el tiempo de sesión
											if ($operation_sesion_time == 1200) { // la sesión es de 20 minutos | mandamos alerta de cierre de sesión
												// if ($operation_sesion_time == 3300) {
												echo "alert";
											}
											elseif ($operation_sesion_time == 1500 || date("H:i:s") == '19:05:00') { // la sesion es de 25 minutos | cerramos sesion del usuario
												// elseif ($operation_sesion_time == 3600) {
												$insert_tbl_lo['login_lo'] = $session_token;
												$library_code = 14;
												$result_library_code_lo = trim($this -> random_code_generator -> index($library_code));
												$insert_tbl_lo['token_lo'] = preg_replace('[\s+]',"", "ap-lo-".$result_library_code_lo);
												$insert_tbl_lo['token_encrypt_lo'] = hash('whirlpool', $insert_tbl_lo['token_lo']);
												$select = "token_encrypt_lo";
												$query_controller_tbl_lo['folio'] = $this -> mm -> getAllWhere1($select, $tbl_lo, $fields_lo_encrypt, $insert_tbl_lo['token_encrypt_lo']);
												if (empty($query_controller_tbl_lo['folio'])) { // buscamos si existe un código igual en la db
													$insert_tbl_lo['fecha_lo'] = date('Y-m-d');
													$insert_tbl_lo['hora_lo'] = date('H:i:s');
													$result_insert_tbl_lo = $this -> mm -> insert($tbl_lo, $insert_tbl_lo);
													$result_update_tbl_u = $this -> mm -> updateOneWhere1($tbl_u, $fields_u_status_usuario_u, $num_val2, $fields_u_id, $query_home['tbl_u'] -> id_u); // actualizamos el status del usuario
													$insert_tbl_mu['movimiento_mu'] = 39; // insertamos el movimiento realizado
													$insert_tbl_mu['usuario_mu'] = $this -> session -> login;
													$insert_tbl_mu['receptor_mu'] = "";
													$insert_tbl_mu['hora_mu'] = date('H:i:s');
													$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
													$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
													if ($result_insert_tbl_lo == "true" && $result_update_tbl_u == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
														session_destroy(); // los querys se ejecutaron | mandamos alerta de success
														echo "true";
													}
													else { // hubo un error en los querys | mandamos alerta de error
														$query_view_popup['title'] = "¡ERROR!";
														$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
														$query_view_popup['type'] = "error";
														$query_view_popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('bug/404');
														$this -> load -> view('popup/popup_time', $query_view_popup);
														$this -> load -> view('main/Footer');
													}
												}
												else { // si existe el código | mandamos alerta de error
												  $query_view_popup['title'] = "¡ERROR!";
												  $query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
												  $query_view_popup['type'] = "error";
												  $query_view_popup['ruta'] = "base";
												  // --------------- VISTAS --------------- //
												  $this -> load -> view('main/Header', $query_header);
													$this -> load -> view('bug/404');
												  $this -> load -> view('popup/popup_time', $query_view_popup);
												  $this -> load -> view('main/Footer');
												}
											}else{ // la sesión es de otro tiempo
											}
										}
										else { // No viene la variable de validar | redirigimos a la página de error 404
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
								break;
								// --------------- validamos la ubicación del empleado --------------- //
								case 'validate-geocode_':
									$controller_geocode = $this -> geo -> search_location_iztacalco($universal_url[0]);
									if ($controller_geocode == "true") { // validamos que el usuario se encuentre dentro del poligono
									}
									else { // el empleado se encuentra fuera de la oficina | cerramos sesión
										$insert_tbl_lo['login_lo'] = $session_token;
										$library_code = 14;
										$result_library_code_lo = trim($this -> random_code_generator -> index($library_code));
										$insert_tbl_lo['token_lo'] = preg_replace('[\s+]',"", "ap-lo-".$result_library_code_lo);
										$insert_tbl_lo['token_encrypt_lo'] = hash('whirlpool', $insert_tbl_lo['token_lo']);
										$select = "token_encrypt_lo";
										$query_controller_tbl_lo['folio'] = $this -> mm -> getAllWhere1($select, $tbl_lo, $fields_lo_encrypt, $insert_tbl_lo['token_encrypt_lo']);
										if (empty($query_controller_tbl_lo['folio'])) { // buscamos si existe un código igual en la db
											$insert_tbl_lo['fecha_lo'] = date('Y-m-d');
											$insert_tbl_lo['hora_lo'] = date('H:i:s');
											$result_insert_tbl_lo = $this -> mm -> insert($tbl_lo, $insert_tbl_lo);
											$result_update_tbl_u = $this -> mm -> updateOneWhere1($tbl_u, $fields_u_status_usuario_u, $num_val2, $fields_u_id, $query_home['tbl_u'] -> id_u); // actualizamos el status del usuario
											$insert_tbl_mu['movimiento_mu'] = 39; // insertamos el movimiento realizado
											$insert_tbl_mu['usuario_mu'] = $this -> session -> login;
											$insert_tbl_mu['receptor_mu'] = "";
											$insert_tbl_mu['hora_mu'] = date('H:i:s');
											$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
											$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
											if ($result_insert_tbl_lo == "true" && $result_update_tbl_u == "true" && $result_insert_tbl_mu == "true") { // validamos si se ejecutaron los querys
												// los querys se ejecutaron | mandamos alerta de success
												session_destroy();
												// --------------- POPUP --------------- //
												$query_view_popup['title'] = "¡HASTA PRONTO!";
												$query_view_popup['text'] = "¡Has cerrado sesion!";
												$query_view_popup['type'] = "info";
												$query_view_popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('main/Header', $query_header);
												$this -> load -> view('popup/popup_time', $query_view_popup);
												$this -> load -> view('main/Footer');
											}
											else { // hubo un error en los querys | redirigimos a la página de error 404
												$this -> load -> view('main/Header', $query_header);
												$this -> load -> view('bug/404');
												$this -> load -> view('main/Footer');
											}
										}
										else { // si existe el código | redirigimos a la página de error 404
											$this -> load -> view('main/Header', $query_header);
											$this -> load -> view('bug/404');
											$this -> load -> view('main/Footer');
										}
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
					else { // no viene información | mandamos pagina principal dependiendo la sesión
						if ($session_user == "EMapci") { // usuario gerente de directivo
							$insert_tbl_mu['movimiento_mu'] = 74; // insertamos el movimiento realizado
							$insert_tbl_mu['usuario_mu'] = $session_login;
							$insert_tbl_mu['receptor_mu'] = "";
							$insert_tbl_mu['hora_mu'] = date('H:i:s');
							$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
							$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
							$this -> load -> view('main/Header', $query_header);
							$this -> load -> view('home/executive', $query_home);
							$this -> load -> view('main/Footer');
						}
						elseif ($session_user == "SGrheo" || $session_user == "DTrheo" || $session_user == "ESrheo" || $session_user == "TTrheo" || $session_user == "VBrheo" || $session_user == "VJrheo") { // usuario gerente de recursos humanos
							$insert_tbl_mu['movimiento_mu'] = 41; // insertamos el movimiento realizado
							$insert_tbl_mu['usuario_mu'] = $session_login;
							$insert_tbl_mu['receptor_mu'] = "";
							$insert_tbl_mu['hora_mu'] = date('H:i:s');
							$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
							$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
							$this -> load -> view('main/Header', $query_header);
							$this -> load -> view('home/human_resources', $query_home);
							$this -> load -> view('main/Footer');
						}
						elseif ($session_user == "AVteleviales" || $session_user == "JHteleviales" || $session_user == "JJcaemi" || $session_user == "GLapci" || $session_user == "ABinfinito" || $session_user == "ECcaemi") { // usuario developer
							$insert_tbl_mu['movimiento_mu'] = 92; // insertamos el movimiento realizado
							$insert_tbl_mu['usuario_mu'] = $session_login;
							$insert_tbl_mu['receptor_mu'] = "";
							$insert_tbl_mu['hora_mu'] = date('H:i:s');
							$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
							$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
							$this -> load -> view('main/Header', $query_header);
							$this -> load -> view('home/manager', $query_home);
							$this -> load -> view('main/Footer');
						}
						elseif ($session_user == "GAteleviales" || $session_user == "ROapci" || $session_user == "MPcaemi" || $session_user == "DGapci" || $session_user == "AFapci" || $session_user == "GRteleviales" || $session_user == "VAteleviales" || $session_user == "SGapci" || $session_user == "TSteleviales") { // usuario empleado
							$insert_tbl_mu['movimiento_mu'] = 82; // insertamos el movimiento realizado
							$insert_tbl_mu['usuario_mu'] = $session_login;
							$insert_tbl_mu['receptor_mu'] = "";
							$insert_tbl_mu['hora_mu'] = date('H:i:s');
							$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
							$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
							$this -> load -> view('main/Header', $query_header);
							$this -> load -> view('home/employee', $query_home);
							$this -> load -> view('main/Footer');
						}
						else { // usuario no existe en la db | cerramos sesión
							session_destroy();
						}
					}
				}
				else { // no es igual a true | mandamos a la página de home
					$this -> load -> view('main/Header', $query_header);
					$this -> load -> view('home/home', $query_home);
					$this -> load -> view('main/Footer');
				}
			}
			else { // no viene la variable de sesion | validamos que venga información en a ruta
				if (!empty($universal_method)) { // validamos que venga información en a ruta
					$select = "ruta_mp";
					$query_controller['tbl_mp'] = $this -> mm -> getRowWhere2Like($select, $tbl_mp, $fields_mp_ruta, $universal_method, $fields_mp_usuario, $session_type);
					if (!empty($query_controller['tbl_mp'])) {
						switch ($query_controller['tbl_mp'] -> ruta_mp) { // validamos que el metodo exista y que el usuario sea el correcto
							// --------------- iniciar sesión --------------- //
							case 'login':
								if (empty($universal_url[0])) { // validamos si viene información en la url
									$query_form_user = trim($this -> input -> post('Usuario')); // usuario
									$query_form_password = password_hash(trim($this -> input -> post('Password')), PASSWORD_DEFAULT, array("cost" => 12)); // contraseña
									if (!empty($query_form_user)) { // validamos que venga información del formulario
										if(preg_match('/^[a-zA-Z]+$/', $query_form_user)){ // existe valor | validamos que los formatos sean correctos
											$query_form_location = trim($this -> input -> post('ERPUbicacion')); // ubicación
											$query_form_browser = trim($this -> input -> post('navegador')); // navegador
											if (!empty($query_form_location)) { // validamos que acepte la ubicación
												if ($query_form_user == "EMapci") { // validamos el tipo de usuario | el usuario es un DIRECTIVO
													$select = "id_u, status_usuario_u, empleado_u, usuario_u, password_u, encryptpass_u, u_tipo_usuario_u";
													$valor = $query_form_user;
													$query_home['tbl_u'] = $this -> mm -> getRowWhere1($select, $tbl_u, $fields_u_usuario, $valor);
													if (!empty($query_home['tbl_u'])) { // validamos que exista el usuario en la db
														if ($query_home['tbl_u'] -> status_usuario_u == 2) { // validamos que no exista otra sesión activa
															if (password_verify(trim($this -> input -> post('Password')), $query_home['tbl_u'] -> encryptpass_u)) { // el usuario si existe | iniciamos sesión
																$select = "nombre_e, puesto_e";
																$query_controller['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $query_home['tbl_u'] -> empleado_u); // obtenemos el empleado
																// el usuario existe | creamos la sesion del usuario
																$library_code = 15;
																$result_library_code_l = trim($this -> random_code_generator -> index($library_code));
																$insert_tbl_l['token_l'] = preg_replace('[\s+]',"", "ap-l-".$result_library_code_l);
																$insert_tbl_l['token_encrypt_l'] = hash('whirlpool', $insert_tbl_l['token_l']);
																$select = "token_encrypt_l";
																$query_controller_tbl_ev['codigo'] = $this -> mm -> getAllWhere1($select, $tbl_l, $fields_l_token_encrypt, $insert_tbl_l['token_encrypt_l']);
																if (empty($query_controller_tbl_ev['codigo'])) { // validamos si existe el código en la db
																	$insert_tbl_l['usuario_l'] = $query_home['tbl_u'] -> id_u;
																	$insert_tbl_l['ubicacion_l'] = $query_form_location;
																	$insert_tbl_l['direccionip_l'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
																	$controller_device = $this -> detect_device -> index();
																	if ($controller_device == "tablet") {
																		$insert_tbl_l['dispositivo_l'] = 3;
																	}
																	elseif ($controller_device == "mobil") {
																		$insert_tbl_l['dispositivo_l'] = 2;
																	}
																	else {
																		$insert_tbl_l['dispositivo_l'] = 1;
																	}
																	$result_insert_tbl_l = $this -> mm -> insert($tbl_l, $insert_tbl_l);
																	if ($result_insert_tbl_l == "true") { // validamos que se inserto la sesion
																		if(empty($_SESSION)) { // creamos variables de la sesion
																			session_start();
																		}
																		$select = "id_l";
																		$controller_session = $this -> mm -> getRowWhere1($select, $tbl_l, $fields_l_token_encrypt, $insert_tbl_l['token_encrypt_l']); // obtenemos la sesión
																		$result_update_tbl_u = $this -> mm -> updateOneWhere1($tbl_u, $fields_u_status_usuario_u, $num_val1, $fields_u_id, $query_home['tbl_u'] -> id_u); // actualizamos el status del usuario
																		$this -> session -> validate = "true"; // variable para validar la sesion del usuario
																		$this -> session -> token = $controller_session -> id_l; // variable para id del login
																		$this -> session -> login = $query_home['tbl_u'] -> id_u; // variable para id del usuario
																		$this -> session -> empleado = $query_home['tbl_u'] -> empleado_u; // variable para id del empleado
																		$this -> session -> user = $query_home['tbl_u'] -> usuario_u; // variable para usuario del usuario
																		$this -> session -> name = $query_controller['tbl_e'] -> nombre_e; // variable para nombre del usuario
																		$this -> session -> type = $query_home['tbl_u'] -> u_tipo_usuario_u; // variable para tipo de usuario del usuario
																		$this -> session -> puesto = $query_controller['tbl_e'] -> puesto_e; // variable para el puesto del usuario
																		$this -> session -> time = date("H:i:s"); // variable de la hora de sesion
																		$insert_tbl_mu['movimiento_mu'] = 38; // insertamos el movimiento realizado
																		$insert_tbl_mu['usuario_mu'] = $this -> session -> login;
																		$insert_tbl_mu['receptor_mu'] = "";
																		$insert_tbl_mu['hora_mu'] = date('H:i:s');
																		$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																		$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																		// mandamos alerta de sesión iniciada
																		// --------------- HEADER --------------- //
																		$select = "area_pue";
																		$valor = $query_controller['tbl_e'] -> puesto_e;
																		$query_header['tbl_pue'] = $this -> mm -> getRowWhere1($select, $tbl_pue, $fields_pue_id, $valor); // obtenemos el puesto del empleado para pintar de color el header
																		$select = "empresa_a";
																		$valor = $query_header['tbl_pue'] -> area_pue;
																		$query_header['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $valor); // obtenemos el area del empleado para pintar de color el header
																		$select = "id_em, ruta_em";
																		$valor = $query_header['tbl_a'] -> empresa_a;
																		$query_header['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $valor); // obtenemos la empresa del empleado para pintar de color el header
																		$query_header['tbl_em_ruta'] = $query_header['tbl_em'] -> ruta_em; // ruta para la foto del empleado
																		// --------------- POPUP --------------- //
																		$query_view_popup['title'] = "¡BIENVENIDO!";
																		$query_view_popup['text'] = "¡Has iniciado sesion!";
																		$query_view_popup['type'] = "success";
																		$query_view_popup['ruta'] = "base";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																	else { // no se creo la sesion | mandamos alerta de inicio de sesión
																		// --------------- POPUP --------------- //
																		$query_view_popup['title'] = "¡ERROR!";
																		$query_view_popup['text'] = "No se pudo iniciar sesión. Intentalo más tarde.";
																		$query_view_popup['type'] = "error";
																		$query_view_popup['ruta'] = "base";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('bug/404');
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																}
																else { // el código ya existe en la db | mandamos alerta de error
																	$query_view_popup['title'] = "¡LISTO!";
																	$query_view_popup['text'] = "¡Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																	$query_view_popup['type'] = "success";
																	$query_view_popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																	// el código ya existe en la db | mandamos alerta de error
																}
															}
															else { // el usuario no existe | mandamos alerta de error
																// --------------- POPUP --------------- //
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "Credenciales incorrectas.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // si existe | mandamos alerta de error
															// --------------- POPUP --------------- //
															$query_view_popup['title'] = "¡ATENCIÓN!";
															$query_view_popup['text'] = "No puedes iniciar sesión porqué existe una sesión en otro dispositivo.";
															$query_view_popup['type'] = "info";
															$query_view_popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // el usuario no existe | mandamos alerta de error
														// --------------- POPUP --------------- //
														$query_view_popup['title'] = "¡ERROR!";
														$query_view_popup['text'] = "Credenciales incorrectas.";
														$query_view_popup['type'] = "error";
														$query_view_popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('bug/404');
														$this -> load -> view('popup/popup_time', $query_view_popup);
														$this -> load -> view('main/Footer');
													}
												}
												else if ($query_form_user == "VBrheo" || $query_form_user == "VJrheo") { // validamos el tipo de usuario | oficina de TULTUTLAN
													if (date('H:i:s') > '08:30:00' && date('H:i:s') < '18:30:00') { // validamos la hora de la sesión
														if (stristr($query_form_browser, 'Chrome') == TRUE) { // validamos el navegador
															// $controller_geocode = $this -> geo -> search_location_tultitlan($query_form_location);
															$controller_geocode = "true";
															if ($controller_geocode == "true") { // validamos que se encuentre dentro del poligono
																$select = "id_u, status_usuario_u, empleado_u, usuario_u, password_u, encryptpass_u, u_tipo_usuario_u";
																$valor = $query_form_user;
																$query_home['tbl_u'] = $this -> mm -> getRowWhere1($select, $tbl_u, $fields_u_usuario, $valor);
																if (!empty($query_home['tbl_u'])) { // validamos que exista el usuario en la db
																	if ($query_home['tbl_u'] -> status_usuario_u == 2) { // validamos que no exista otra sesión activa
																		if (password_verify(trim($this -> input -> post('Password')), $query_home['tbl_u'] -> encryptpass_u)) { // el usuario si existe | iniciamos sesión
																			$select = "nombre_e, puesto_e";
																			$query_controller['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $query_home['tbl_u'] -> empleado_u); // obtenemos el empleado
																			// el usuario existe | creamos la sesion del usuario
																			$library_code = 15;
																			$result_library_code_l = trim($this -> random_code_generator -> index($library_code));
																			$insert_tbl_l['token_l'] = preg_replace('[\s+]',"", "ap-l-".$result_library_code_l);
																			$insert_tbl_l['token_encrypt_l'] = hash('whirlpool', $insert_tbl_l['token_l']);
																			$select = "token_encrypt_l";
																			$query_controller_tbl_ev['codigo'] = $this -> mm -> getAllWhere1($select, $tbl_l, $fields_l_token_encrypt, $insert_tbl_l['token_encrypt_l']);
																			if (empty($query_controller_tbl_ev['codigo'])) { // validamos si existe el código en la db
																				$insert_tbl_l['usuario_l'] = $query_home['tbl_u'] -> id_u;
																				$insert_tbl_l['ubicacion_l'] = $query_form_location;
																				$insert_tbl_l['direccionip_l'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
																				$controller_device = $this -> detect_device -> index();
																				if ($controller_device == "tablet") {
																					$insert_tbl_l['dispositivo_l'] = 3;
																				}
																				elseif ($controller_device == "mobil") {
																					$insert_tbl_l['dispositivo_l'] = 2;
																				}
																				else {
																					$insert_tbl_l['dispositivo_l'] = 1;
																				}
																				$result_insert_tbl_l = $this -> mm -> insert($tbl_l, $insert_tbl_l);
																				if ($result_insert_tbl_l == "true") { // validamos que se inserto la sesion
																					if(empty($_SESSION)) { // creamos variables de la sesion
																						session_start();
																					}
																					$select = "id_l";
																					$controller_session = $this -> mm -> getRowWhere1($select, $tbl_l, $fields_l_token_encrypt, $insert_tbl_l['token_encrypt_l']); // obtenemos la sesión
																					$result_update_tbl_u = $this -> mm -> updateOneWhere1($tbl_u, $fields_u_status_usuario_u, $num_val1, $fields_u_id, $query_home['tbl_u'] -> id_u); // actualizamos el status del usuario
																					$this -> session -> validate = "true"; // variable para validar la sesion del usuario
																					$this -> session -> token = $controller_session -> id_l; // variable para id del login
																					$this -> session -> login = $query_home['tbl_u'] -> id_u; // variable para id del usuario
																					$this -> session -> empleado = $query_home['tbl_u'] -> empleado_u; // variable para id del empleado
																					$this -> session -> user = $query_home['tbl_u'] -> usuario_u; // variable para usuario del usuario
																					$this -> session -> name = $query_controller['tbl_e'] -> nombre_e; // variable para nombre del usuario
																					$this -> session -> type = $query_home['tbl_u'] -> u_tipo_usuario_u; // variable para tipo de usuario del usuario
																					$this -> session -> puesto = $query_controller['tbl_e'] -> puesto_e; // variable para el puesto del usuario
																					$this -> session -> time = date("H:i:s"); // variable de la hora de sesion
																					$insert_tbl_mu['movimiento_mu'] = 38; // insertamos el movimiento realizado
																					$insert_tbl_mu['usuario_mu'] = $this -> session -> login;
																					$insert_tbl_mu['receptor_mu'] = "";
																					$insert_tbl_mu['hora_mu'] = date('H:i:s');
																					$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																					$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																					// mandamos alerta de sesión iniciada
																					// --------------- HEADER --------------- //
																					$select = "area_pue";
																					$valor = $query_controller['tbl_e'] -> puesto_e;
																					$query_header['tbl_pue'] = $this -> mm -> getRowWhere1($select, $tbl_pue, $fields_pue_id, $valor); // obtenemos el puesto del empleado para pintar de color el header
																					$select = "empresa_a";
																					$valor = $query_header['tbl_pue'] -> area_pue;
																					$query_header['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $valor); // obtenemos el area del empleado para pintar de color el header
																					$select = "id_em, ruta_em";
																					$valor = $query_header['tbl_a'] -> empresa_a;
																					$query_header['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $valor); // obtenemos la empresa del empleado para pintar de color el header
																					$query_header['tbl_em_ruta'] = $query_header['tbl_em'] -> ruta_em; // ruta para la foto del empleado
																					// --------------- POPUP --------------- //
																					$query_view_popup['title'] = "¡BIENVENIDO!";
																					$query_view_popup['text'] = "¡Has iniciado sesion!";
																					$query_view_popup['type'] = "success";
																					$query_view_popup['ruta'] = "base";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('main/Header', $query_header);
																					$this -> load -> view('popup/popup_time', $query_view_popup);
																					$this -> load -> view('main/Footer');
																				}
																				else { // no se creo la sesion | mandamos alerta de inicio de sesión
																					// --------------- POPUP --------------- //
																					$query_view_popup['title'] = "¡ERROR!";
																					$query_view_popup['text'] = "No se pudo iniciar sesión. Intentalo más tarde.";
																					$query_view_popup['type'] = "error";
																					$query_view_popup['ruta'] = "base";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('main/Header', $query_header);
																					$this -> load -> view('bug/404');
																					$this -> load -> view('popup/popup_time', $query_view_popup);
																					$this -> load -> view('main/Footer');
																				}
																			}
																			else { // el código ya existe en la db | mandamos alerta de error
																				$query_view_popup['title'] = "¡LISTO!";
																				$query_view_popup['text'] = "¡Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																				$query_view_popup['type'] = "success";
																				$query_view_popup['ruta'] = "ruta";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('main/Header', $query_header);
																				$this -> load -> view('bug/404');
																				$this -> load -> view('popup/popup_time', $query_view_popup);
																				$this -> load -> view('main/Footer');
																				// el código ya existe en la db | mandamos alerta de error
																			}
																		}
																		else { // el usuario no existe | mandamos alerta de error
																			// --------------- POPUP --------------- //
																			$query_view_popup['title'] = "¡ERROR!";
																			$query_view_popup['text'] = "Credenciales incorrectas.";
																			$query_view_popup['type'] = "error";
																			$query_view_popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('main/Header', $query_header);
																			$this -> load -> view('bug/404');
																			$this -> load -> view('popup/popup_time', $query_view_popup);
																			$this -> load -> view('main/Footer');
																		}
																	}
																	else { // si existe | mandamos alerta de error
																		// --------------- POPUP --------------- //
																		$query_view_popup['title'] = "¡ATENCIÓN!";
																		$query_view_popup['text'] = "No puedes iniciar sesión porqué existe una sesión en otro dispositivo.";
																		$query_view_popup['type'] = "info";
																		$query_view_popup['ruta'] = "base";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('bug/404');
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																}
																else { // el usuario no existe | mandamos alerta de error
																	// --------------- POPUP --------------- //
																	$query_view_popup['title'] = "¡ERROR!";
																	$query_view_popup['text'] = "Credenciales incorrectas.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "base";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // no se encuentra en la oficina | mandamos alerta de error
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "No se puede iniciar sesión fuera de la oficina.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // no es chrome | mandamos alerta de error
															// --------------- POPUP --------------- //
															$query_view_popup['title'] = "¡OOOOPS!";
															$query_view_popup['text'] = "¡Lo sentimos solo puedes inicar sesion en Google Chrome!";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // el horario no es correcto | mandamos alerta de error
														$query_view_popup['title'] = "¡ERROR!";
														$query_view_popup['text'] = "No se puede iniciar sesión en un horario fuera de la oficina.";
														$query_view_popup['type'] = "error";
														$query_view_popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('bug/404');
														$this -> load -> view('popup/popup_time', $query_view_popup);
														$this -> load -> view('main/Footer');
													}
												}
												elseif ($query_form_user == "ABinfinito") { // validamos el tipo de usuario | CAFETERÍA
													if (date('H:i:s') > '06:00:00' && date('H:i:s') < '17:00:00') { // validamos la hora de la sesión
														if (stristr($query_form_browser, 'Chrome') == TRUE) { // validamos el navegador
															// $controller_geocode = $this -> geo -> search_location_cafeteria($query_form_location);
															$controller_geocode = "true";
															if ($controller_geocode == "true") { // validamos que se encuentre dentro del poligono
																$select = "id_u, status_usuario_u, empleado_u, usuario_u, password_u, encryptpass_u, u_tipo_usuario_u";
																$valor = $query_form_user;
																$query_home['tbl_u'] = $this -> mm -> getRowWhere1($select, $tbl_u, $fields_u_usuario, $valor);
																if (!empty($query_home['tbl_u'])) { // validamos que exista el usuario en la db
																	if ($query_home['tbl_u'] -> status_usuario_u == 2) { // validamos que no exista otra sesión activa
																		if (password_verify(trim($this -> input -> post('Password')), $query_home['tbl_u'] -> encryptpass_u)) { // el usuario si existe | iniciamos sesión
																			$select = "nombre_e, puesto_e";
																			$query_controller['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $query_home['tbl_u'] -> empleado_u); // obtenemos el empleado
																			// el usuario existe | creamos la sesion del usuario
																			$library_code = 15;
																			$result_library_code_l = trim($this -> random_code_generator -> index($library_code));
																			$insert_tbl_l['token_l'] = preg_replace('[\s+]',"", "ap-l-".$result_library_code_l);
																			$insert_tbl_l['token_encrypt_l'] = hash('whirlpool', $insert_tbl_l['token_l']);
																			$select = "token_encrypt_l";
																			$query_controller_tbl_ev['codigo'] = $this -> mm -> getAllWhere1($select, $tbl_l, $fields_l_token_encrypt, $insert_tbl_l['token_encrypt_l']);
																			if (empty($query_controller_tbl_ev['codigo'])) { // validamos si existe el código en la db
																				$insert_tbl_l['usuario_l'] = $query_home['tbl_u'] -> id_u;
																				$insert_tbl_l['ubicacion_l'] = $query_form_location;
																				$insert_tbl_l['direccionip_l'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
																				$controller_device = $this -> detect_device -> index();
																				if ($controller_device == "tablet") {
																					$insert_tbl_l['dispositivo_l'] = 3;
																				}
																				elseif ($controller_device == "mobil") {
																					$insert_tbl_l['dispositivo_l'] = 2;
																				}
																				else {
																					$insert_tbl_l['dispositivo_l'] = 1;
																				}
																				$result_insert_tbl_l = $this -> mm -> insert($tbl_l, $insert_tbl_l);
																				if ($result_insert_tbl_l == "true") { // validamos que se inserto la sesion
																					if(empty($_SESSION)) { // creamos variables de la sesion
																						session_start();
																					}
																					$select = "id_l";
																					$controller_session = $this -> mm -> getRowWhere1($select, $tbl_l, $fields_l_token_encrypt, $insert_tbl_l['token_encrypt_l']); // obtenemos la sesión
																					$result_update_tbl_u = $this -> mm -> updateOneWhere1($tbl_u, $fields_u_status_usuario_u, $num_val1, $fields_u_id, $query_home['tbl_u'] -> id_u); // actualizamos el status del usuario
																					$this -> session -> validate = "true"; // variable para validar la sesion del usuario
																					$this -> session -> token = $controller_session -> id_l; // variable para id del login
																					$this -> session -> login = $query_home['tbl_u'] -> id_u; // variable para id del usuario
																					$this -> session -> empleado = $query_home['tbl_u'] -> empleado_u; // variable para id del empleado
																					$this -> session -> user = $query_home['tbl_u'] -> usuario_u; // variable para usuario del usuario
																					$this -> session -> name = $query_controller['tbl_e'] -> nombre_e; // variable para nombre del usuario
																					$this -> session -> type = $query_home['tbl_u'] -> u_tipo_usuario_u; // variable para tipo de usuario del usuario
																					$this -> session -> puesto = $query_controller['tbl_e'] -> puesto_e; // variable para el puesto del usuario
																					$this -> session -> time = date("H:i:s"); // variable de la hora de sesion
																					$insert_tbl_mu['movimiento_mu'] = 38; // insertamos el movimiento realizado
																					$insert_tbl_mu['usuario_mu'] = $this -> session -> login;
																					$insert_tbl_mu['receptor_mu'] = "";
																					$insert_tbl_mu['hora_mu'] = date('H:i:s');
																					$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																					$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																					// mandamos alerta de sesión iniciada
																					// --------------- HEADER --------------- //
																					$select = "area_pue";
																					$valor = $query_controller['tbl_e'] -> puesto_e;
																					$query_header['tbl_pue'] = $this -> mm -> getRowWhere1($select, $tbl_pue, $fields_pue_id, $valor); // obtenemos el puesto del empleado para pintar de color el header
																					$select = "empresa_a";
																					$valor = $query_header['tbl_pue'] -> area_pue;
																					$query_header['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $valor); // obtenemos el area del empleado para pintar de color el header
																					$select = "id_em, ruta_em";
																					$valor = $query_header['tbl_a'] -> empresa_a;
																					$query_header['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $valor); // obtenemos la empresa del empleado para pintar de color el header
																					$query_header['tbl_em_ruta'] = $query_header['tbl_em'] -> ruta_em; // ruta para la foto del empleado
																					// --------------- POPUP --------------- //
																					$query_view_popup['title'] = "¡BIENVENIDO!";
																					$query_view_popup['text'] = "¡Has iniciado sesion!";
																					$query_view_popup['type'] = "success";
																					$query_view_popup['ruta'] = "base";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('main/Header', $query_header);
																					$this -> load -> view('popup/popup_time', $query_view_popup);
																					$this -> load -> view('main/Footer');
																				}
																				else { // no se creo la sesion | mandamos alerta de inicio de sesión
																					// --------------- POPUP --------------- //
																					$query_view_popup['title'] = "¡ERROR!";
																					$query_view_popup['text'] = "No se pudo iniciar sesión. Intentalo más tarde.";
																					$query_view_popup['type'] = "error";
																					$query_view_popup['ruta'] = "base";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('main/Header', $query_header);
																					$this -> load -> view('bug/404');
																					$this -> load -> view('popup/popup_time', $query_view_popup);
																					$this -> load -> view('main/Footer');
																				}
																			}
																			else { // el código ya existe en la db | mandamos alerta de error
																				$query_view_popup['title'] = "¡LISTO!";
																				$query_view_popup['text'] = "¡Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																				$query_view_popup['type'] = "success";
																				$query_view_popup['ruta'] = "ruta";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('main/Header', $query_header);
																				$this -> load -> view('bug/404');
																				$this -> load -> view('popup/popup_time', $query_view_popup);
																				$this -> load -> view('main/Footer');
																				// el código ya existe en la db | mandamos alerta de error
																			}
																		}
																		else { // el usuario no existe | mandamos alerta de error
																			// --------------- POPUP --------------- //
																			$query_view_popup['title'] = "¡ERROR!";
																			$query_view_popup['text'] = "Credenciales incorrectas.";
																			$query_view_popup['type'] = "error";
																			$query_view_popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('main/Header', $query_header);
																			$this -> load -> view('bug/404');
																			$this -> load -> view('popup/popup_time', $query_view_popup);
																			$this -> load -> view('main/Footer');
																		}
																	}
																	else { // si existe | mandamos alerta de error
																		// --------------- POPUP --------------- //
																		$query_view_popup['title'] = "¡ATENCIÓN!";
																		$query_view_popup['text'] = "No puedes iniciar sesión porqué existe una sesión en otro dispositivo.";
																		$query_view_popup['type'] = "info";
																		$query_view_popup['ruta'] = "base";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('bug/404');
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																}
																else { // el usuario no existe | mandamos alerta de error
																	// --------------- POPUP --------------- //
																	$query_view_popup['title'] = "¡ERROR!";
																	$query_view_popup['text'] = "Credenciales incorrectas.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "base";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															else { // no se encuentra en la oficina | mandamos alerta de error
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "No se puede iniciar sesión fuera de la oficina.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // no es chrome | mandamos alerta de error
															// --------------- POPUP --------------- //
															$query_view_popup['title'] = "¡OOOOPS!";
															$query_view_popup['text'] = "¡Lo sentimos solo puedes inicar sesion en Google Chrome!";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // el horario no es correcto | mandamos alerta de error
														$query_view_popup['title'] = "¡ERROR!";
														$query_view_popup['text'] = "No se puede iniciar sesión en un horario fuera de la oficina.";
														$query_view_popup['type'] = "error";
														$query_view_popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('bug/404');
														$this -> load -> view('popup/popup_time', $query_view_popup);
														$this -> load -> view('main/Footer');
													}
												}
												else { // validamos el tipo de usuario | oficina de IZTACALCO
													if (date('H:i:s') > '07:30:00' && date('H:i:s') < '19:30:00') { // validamos la hora de la sesión
														if (stristr($query_form_browser, 'Chrome') == TRUE) { // validamos el navegador
															// $controller_geocode = $this -> geo -> search_location_iztacalco($query_form_location);
															$controller_geocode = "true";
															if ($controller_geocode == "true") { // validamos que se encuentre dentro del poligono
																$select = "id_u, status_usuario_u, empleado_u, usuario_u, password_u, encryptpass_u, u_tipo_usuario_u";
																$query_home['tbl_u'] = $this -> mm -> getRowWhere1($select, $tbl_u, $fields_u_usuario, $query_form_user);
																if (!empty($query_home['tbl_u'])) { // validamos que exista el usuario en la db
																	if ($query_home['tbl_u'] -> status_usuario_u == 2) { // validamos que no exista otra sesión activa
																		if (password_verify(trim($this -> input -> post('Password')), $query_home['tbl_u'] -> encryptpass_u)) { // el usuario si existe | iniciamos sesión
																			$select = "nombre_e, puesto_e";
																			$query_controller['tbl_e'] = $this -> mm -> getRowWhere1($select, $tbl_e, $fields_e_id, $query_home['tbl_u'] -> empleado_u); // obtenemos el empleado
																			// el usuario existe | creamos la sesion del usuario
																			$library_code = 15;
																			$result_library_code_l = trim($this -> random_code_generator -> index($library_code));
																			$insert_tbl_l['token_l'] = preg_replace('[\s+]',"", "ap-l-".$result_library_code_l);
																			$insert_tbl_l['token_encrypt_l'] = hash('whirlpool', $insert_tbl_l['token_l']);
																			$select = "token_encrypt_l";
																			$query_controller_tbl_ev['codigo'] = $this -> mm -> getAllWhere1($select, $tbl_l, $fields_l_token_encrypt, $insert_tbl_l['token_encrypt_l']);
																			if (empty($query_controller_tbl_ev['codigo'])) { // validamos si existe el código en la db
																				$insert_tbl_l['usuario_l'] = $query_home['tbl_u'] -> id_u;
																				$insert_tbl_l['ubicacion_l'] = $query_form_location;
																				$insert_tbl_l['direccionip_l'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
																				$controller_device = $this -> detect_device -> index();
																				if ($controller_device == "tablet") {
																					$insert_tbl_l['dispositivo_l'] = 3;
																				}
																				elseif ($controller_device == "mobil") {
																					$insert_tbl_l['dispositivo_l'] = 2;
																				}
																				else {
																					$insert_tbl_l['dispositivo_l'] = 1;
																				}
																				$result_insert_tbl_l = $this -> mm -> insert($tbl_l, $insert_tbl_l);
																				if ($result_insert_tbl_l == "true") { // validamos que se inserto la sesion
																					if(empty($_SESSION)) { // creamos variables de la sesion
																						session_start();
																					}
																					$select = "id_l";
																					$controller_session = $this -> mm -> getRowWhere1($select, $tbl_l, $fields_l_token_encrypt, $insert_tbl_l['token_encrypt_l']); // obtenemos la sesión
																					$result_update_tbl_u = $this -> mm -> updateOneWhere1($tbl_u, $fields_u_status_usuario_u, $num_val1, $fields_u_id, $query_home['tbl_u'] -> id_u); // actualizamos el status del usuario
																					$this -> session -> validate = "true"; // variable para validar la sesion del usuario
																					$this -> session -> token = $controller_session -> id_l; // variable para id del login
																					$this -> session -> login = $query_home['tbl_u'] -> id_u; // variable para id del usuario
																					$this -> session -> empleado = $query_home['tbl_u'] -> empleado_u; // variable para id del empleado
																					$this -> session -> user = $query_home['tbl_u'] -> usuario_u; // variable para usuario del usuario
																					$this -> session -> name = $query_controller['tbl_e'] -> nombre_e; // variable para nombre del usuario
																					$this -> session -> type = $query_home['tbl_u'] -> u_tipo_usuario_u; // variable para tipo de usuario del usuario
																					$this -> session -> puesto = $query_controller['tbl_e'] -> puesto_e; // variable para el puesto del usuario
																					$this -> session -> time = date("H:i:s"); // variable de la hora de sesion
																					$insert_tbl_mu['movimiento_mu'] = 38; // insertamos el movimiento realizado
																					$insert_tbl_mu['usuario_mu'] = $this -> session -> login;
																					$insert_tbl_mu['receptor_mu'] = "";
																					$insert_tbl_mu['hora_mu'] = date('H:i:s');
																					$insert_tbl_mu['fecha_mu'] = date('Y-m-d');
																					$result_insert_tbl_mu = $this -> mm -> insert($tbl_mu, $insert_tbl_mu);
																					// mandamos alerta de sesión iniciada
																					// --------------- HEADER --------------- //
																					$select = "area_pue";
																					$valor = $query_controller['tbl_e'] -> puesto_e;
																					$query_header['tbl_pue'] = $this -> mm -> getRowWhere1($select, $tbl_pue, $fields_pue_id, $valor); // obtenemos el puesto del empleado para pintar de color el header
																					$select = "empresa_a";
																					$valor = $query_header['tbl_pue'] -> area_pue;
																					$query_header['tbl_a'] = $this -> mm -> getRowWhere1($select, $tbl_a, $fields_a_id, $valor); // obtenemos el area del empleado para pintar de color el header
																					$select = "id_em, ruta_em";
																					$valor = $query_header['tbl_a'] -> empresa_a;
																					$query_header['tbl_em'] = $this -> mm -> getRowWhere1($select, $tbl_em, $fields_em_id, $valor); // obtenemos la empresa del empleado para pintar de color el header
																					$query_header['tbl_em_ruta'] = $query_header['tbl_em'] -> ruta_em; // ruta para la foto del empleado
																					// --------------- POPUP --------------- //
																					$query_view_popup['title'] = "¡BIENVENIDO!";
																					$query_view_popup['text'] = "¡Has iniciado sesion!";
																					$query_view_popup['type'] = "success";
																					$query_view_popup['ruta'] = "base";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('main/Header', $query_header);
																					$this -> load -> view('popup/popup_time', $query_view_popup);
																					$this -> load -> view('main/Footer');
																				}
																				else { // no se creo la sesion | mandamos alerta de inicio de sesión
																					// --------------- POPUP --------------- //
																					$query_view_popup['title'] = "¡ERROR!";
																					$query_view_popup['text'] = "No se pudo iniciar sesión. Intentalo más tarde.";
																					$query_view_popup['type'] = "error";
																					$query_view_popup['ruta'] = "base";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('main/Header', $query_header);
																					$this -> load -> view('bug/404');
																					$this -> load -> view('popup/popup_time', $query_view_popup);
																					$this -> load -> view('main/Footer');
																				}
																			}
																			else { // el código ya existe en la db | mandamos alerta de error
																				$query_view_popup['title'] = "¡LISTO!";
																				$query_view_popup['text'] = "¡Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																				$query_view_popup['type'] = "success";
																				$query_view_popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('main/Header', $query_header);
																				$this -> load -> view('bug/404');
																				$this -> load -> view('popup/popup_time', $query_view_popup);
																				$this -> load -> view('main/Footer');
																				// el código ya existe en la db | mandamos alerta de error
																			}
																		}
																		else { // el usuario no existe | mandamos alerta de error
																			// --------------- POPUP --------------- //
																			$query_view_popup['title'] = "¡ERROR!";
																			$query_view_popup['text'] = "Credenciales incorrectas.";
																			$query_view_popup['type'] = "error";
																			$query_view_popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('main/Header', $query_header);
																			$this -> load -> view('bug/404');
																			$this -> load -> view('popup/popup_time', $query_view_popup);
																			$this -> load -> view('main/Footer');
																		}
																	}
																	else { // si existe | mandamos alerta de error
																		// --------------- POPUP --------------- //
																		$query_view_popup['title'] = "¡ATENCIÓN!";
																		$query_view_popup['text'] = "No puedes iniciar sesión porqué existe una sesión en otro dispositivo.";
																		$query_view_popup['type'] = "info";
																		$query_view_popup['ruta'] = "base";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('main/Header', $query_header);
																		$this -> load -> view('bug/404');
																		$this -> load -> view('popup/popup_time', $query_view_popup);
																		$this -> load -> view('main/Footer');
																	}
																}
																else { // el usuario no existe | mandamos alerta de error
																	// --------------- POPUP --------------- //
																	$query_view_popup['title'] = "¡ERROR!";
																	$query_view_popup['text'] = "Credenciales incorrectas.";
																	$query_view_popup['type'] = "error";
																	$query_view_popup['ruta'] = "base";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('main/Header', $query_header);
																	$this -> load -> view('bug/404');
																	$this -> load -> view('popup/popup_time', $query_view_popup);
																	$this -> load -> view('main/Footer');
																}
															}
															// no se encuentra en la oficina | mandamos alerta de error
															else {
																$query_view_popup['title'] = "¡ERROR!";
																$query_view_popup['text'] = "No se puede iniciar sesión fuera de la oficina.";
																$query_view_popup['type'] = "error";
																$query_view_popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $query_header);
																$this -> load -> view('bug/404');
																$this -> load -> view('popup/popup_time', $query_view_popup);
																$this -> load -> view('main/Footer');
															}
														}
														else { // no es chrome | mandamos alerta de error
															// --------------- POPUP --------------- //
															$query_view_popup['title'] = "¡OOOOPS!";
															$query_view_popup['text'] = "¡Lo sentimos solo puedes inicar sesion en Google Chrome!";
															$query_view_popup['type'] = "error";
															$query_view_popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $query_header);
															$this -> load -> view('bug/404');
															$this -> load -> view('popup/popup_time', $query_view_popup);
															$this -> load -> view('main/Footer');
														}
													}
													else { // el horario no es correcto | mandamos alerta de error
														$query_view_popup['title'] = "¡ERROR!";
														$query_view_popup['text'] = "No se puede iniciar sesión en un horario fuera de la oficina.";
														$query_view_popup['type'] = "error";
														$query_view_popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('main/Header', $query_header);
														$this -> load -> view('bug/404');
														$this -> load -> view('popup/popup_time', $query_view_popup);
														$this -> load -> view('main/Footer');
													}
												}
											}
											else { // la ubicación no esta habilitada | mandamos alerta de error
												// --------------- POPUP --------------- //
												$query_view_popup['title'] = "¡ERROR!";
												$query_view_popup['text'] = "Para iniciar SESION debes de conceder permisos para acceder a tu UBICACIÓN.";
												$query_view_popup['type'] = "error";
												$query_view_popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('main/Header', $query_header);
												$this -> load -> view('bug/404');
												$this -> load -> view('popup/popup_time', $query_view_popup);
												$this -> load -> view('main/Footer');
											}
										}
										else { // formatos incorrectos | mandamos alerta de error
											// --------------- POPUP --------------- //
											$query_view_popup['title'] = "¡ERROR!";
											$query_view_popup['text'] = "El usuario o la contraseña tienen caracteres especiales, intentalo nuevamente.";
											$query_view_popup['type'] = "error";
											$query_view_popup['ruta'] = "base";
											// --------------- VISTAS --------------- //
											$this -> load -> view('main/Header', $query_header);
											$this -> load -> view('bug/404');
											$this -> load -> view('popup/popup_time', $query_view_popup);
											$this -> load -> view('main/Footer');
										}
									}
									else { // no existe valor | redirigimos a la página de error 404
										$this -> load -> view('main/Header', $query_header);
										$this -> load -> view('bug/404');
										$this -> load -> view('main/Footer');
									}
								}
								else { // no viene información | redirigimos a la página de error 404
									$this -> load -> view('main/Header', $query_header);
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
				else { // no viene información | mandamos a la página de home
					$this -> load -> view('main/Header', $query_header);
					$this -> load -> view('home/home', $query_home);
					$this -> load -> view('main/Footer');
				}
			}
		}
	}
