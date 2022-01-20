<?php
	if (! defined('BASEPATH')) exit ('No direct script access allowed');
	class Ejecutivo extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this -> load -> helper('form');
			$this -> load -> library('session');
			$this -> load -> model('Model');
			$this -> load -> helper('url');
		}
		public function _remap($method, $params = array()) {
			if (!method_exists($this, $method)) {
				$this -> index($method, $params);
			} else {
				return call_user_func_array(array($this,$method), $params);
			}
		}
		public function index($method = NULL){
			// validamos que vengan las variables de la sesion
			if (isset($this -> session -> validarSesion)) {
				// si vienen las variables de sesion | validamos que la variable de sesion sea ok
				if ($this -> session -> validarSesion == "ok") {
					if ($this -> session -> TUSesion == 1) {
						// la sesion es ok | validamos el tipo de ususario
						switch ($this -> session -> TUSesion) {
							// tipo de usuario = Ejecutivo Telefonico
							case 1:
								// validamos que venga el metodo
								if (isset($method)) {
									// validamos que el metodo exista en la db
									$tabla = "metodo";
									$campo1 = "Ruta";
									$valor1 = $method;
									$campo2 = "IdUsuario";
									$valor2 = $this -> session -> TUSesion;
									$metodo = $this -> Model -> GetRowWhere2Like($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($metodo != "") {
										// usuario
										$sesion = $this -> session -> idSesion;
										// obtenemos los seguimientos
										$fecha = date('Y-m-d');
										$tabla = "seguimiento";
										$campo1 = "CallUsuario";
										$valor1 = $sesion;
										$campo2 = "CallFSeguimiento";
										$valor2 = $fecha;
										$menu['seguimiento'] = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
										switch ($metodo -> Ruta) {
											case 'tipificar-llamada':
												// validamos si viene valor del formulario
												$data['IdNT'] = $this -> input -> post('IdNT');
												if (isset($data['IdNT'])) {
													// si viene la llamada validamos que la llamada exista en la db
													$tabla = "numerostelefonicos";
													$campo = "IdNT";
													$valor = $data['IdNT'];
													$llamada = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
													if ($llamada != "") {
														$data['statusLlamada'] = $this -> input -> post('statusLlamada');
														$data['idSesion'] = $sesion;
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
														$this -> load -> view('Ejecutivo Telefonico/Tipificacion', $data);
														$this -> load -> view('Principal/Footer');
													}
													// no existe la llamada | mandamos alerta de error
													else {
														// --------------- POPUP --------------- //
														$popup['title'] = "¡ERROR!";
														$popup['text'] = "¡Lo siento el número telefónico no existe, intentalo nuevamente!";
														$popup['type'] = "info";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
												}
												// no viene información del formulario | redirigimos a la página principal
												else {
													redirect(base_url());
													exit();
												}
											break;
											case 're-tipificar-llamada':
												// validamos si viene valor del formulario
												$data['IdNT'] = $this -> input -> post('IdNT');
												if (isset($data['IdNT'])) {
													// si viene la llamada validamos que la llamada exista en la db
													$tabla = "numerostelefonicos";
													$campo = "IdNT";
													$valor = $data['IdNT'];
													$llamada = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
													if ($llamada != "") {
														$data['statusLlamada'] = $this -> input -> post('statusLlamada');
														$data['idSesion'] = $sesion;
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
														$this -> load -> view('Ejecutivo Telefonico/Re Tipificacion', $data);
														$this -> load -> view('Principal/Footer');
													}
													// no existe la llamada | mandamos alerta de error
													else {
														// --------------- POPUP --------------- //
														$popup['title'] = "¡ERROR!";
														$popup['text'] = "¡Lo siento el número telefónico no existe, intentalo nuevamente!";
														$popup['type'] = "info";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
												}
												// no viene información del formulario | redirigimos a la página principal
												else {
													redirect(base_url());
													exit();
												}
											break;
											case 'clasificar-llamada':
												// validamos si viene valor del formulario
												$gral['IdNT'] = trim($this -> input -> post('IdNT'));
												if (isset($gral['IdNT'])) {
													// si viene la llamada validamos que la llamada exista en la db
													$tabla = "numerostelefonicos";
													$campo = "IdNT";
													$valor = $gral['IdNT'];
													$llamada = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
													if ($llamada != "") {
														$gral['statusLlamada'] = trim($this -> input -> post('statusLlamada'));
														// validamos que seleccionarón status
														if ($gral['statusLlamada'] != "Selecciona-estatus-de-la-llamada") {
															$gral['Tipificacion'] = trim($this -> input -> post('Tipificacion'));
															// validar el estatus de la llamada
															$tabla = "statusllamada";
															$campo = "IdStatus";
															$valor = $gral['statusLlamada'];
															$status = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
															if ($status != "") {
																// el status es correcto | validamos la opción
																switch ($status -> CallRuta) {
																	case 'venta':
																		// si existe la llamada | insertamos la venta
																		$tabla = "ventas";
																		$insertVen['V_IdTel'] = $gral['IdNT'];
																		$insertVen['V_IdU'] = $this -> session -> idSesion;
																		$insertVen['Fecha'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertVen);
																		// insertamos el contador
																		$tabla = "contador";
																		$insertCon['C_Id_U'] = $insertVen['V_IdU'];
																		$insertCon['C_Id_T'] = $gral['IdNT'];
																		$insertCon['C_Id_S'] = $gral['statusLlamada'];
																		$insertCon['FModificacion'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertCon);
																		// insertamos el historial de la llamada
																		$tabla = "historial";
																		$insertHis['H_IdU'] = $this -> session -> idSesion;
																		$insertHis['H_IdT'] = $gral['IdNT'];
																		$insertHis['Status'] = $gral['statusLlamada'];
																		$insertHis['Tipificacion'] = $gral['Tipificacion'];
																		$insertHis['Fecha'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertHis);
																		// actualizamos el status de la llamada
																		$tabla = "numerostelefonicos";
																		$campo1 = "Status";
																		$valor1 = $gral['statusLlamada'];
																		$campo2 = "Tipificacion";
																		$valor2 = $gral['Tipificacion'];
																		$camposet = "IdNT";
																		$ruta = $gral['IdNT'];
																		$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																		// validamos si se actualizó el status
																		if ($update == "ok") {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "¡FELICIDADES!";
																			$popup['text'] = "¡Sigue trabajando así!";
																			$popup['type'] = "success";
																			$popup['ruta'] = "ruta";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																		// el status no se actualizó | mandamos alerta de error
																		else {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "¡OOOOPS!";
																			$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																			$popup['type'] = "error";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																	break;
																	case 'volver-a-llamar':
																		// validamos que venga información del form
																		$gral['CallUsuario'] = trim($this -> input -> post('CallUsuario'));
																		$gral['CallFSeguimiento'] = trim($this -> input -> post('CallFSeguimiento'));
																		$gral['CallHSeguimiento'] = trim($this -> input -> post('CallHSeguimiento'));
																		if (isset($gral['CallUsuario'])) {
																			// insertamos el historial de la llamada
																			$tabla = "historial";
																			$insertHis['H_IdU'] = $this -> session -> idSesion;
																			$insertHis['H_IdT'] = $gral['IdNT'];
																			$insertHis['Status'] = $gral['statusLlamada'];
																			$insertHis['Tipificacion'] = $gral['Tipificacion'];
																			$insertHis['Fecha'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertHis);
																			// insertamos el contador
																			$tabla = "contador";
																			$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																			$insertCon['C_Id_T'] = $gral['IdNT'];
																			$insertCon['C_Id_S'] = $gral['statusLlamada'];
																			$insertCon['FModificacion'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertCon);
																			// actualizamos el status de la llamada
																			$tabla = "numerostelefonicos";
																			$campo1 = "Status";
																			$valor1 = $gral['statusLlamada'];
																			$campo2 = "Tipificacion";
																			$valor2 = $gral['Tipificacion'];
																			$camposet = "IdNT";
																			$ruta = $gral['IdNT'];
																			$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																			// validamos si se actualizó el status
																			if ($update == "ok") {
																				// si viene información | validamos si existe un registro del seguimiento
																				$tabla = "seguimiento";
																				$campo = "CallNT";
																				$valor = $gral['IdNT'];
																				$seguimiento = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
																				if ($seguimiento != "") {
																					// si viene seguimiento | actualizamos seguimiento
																					$tabla = "seguimiento";
																					$campo1 = "CallFSeguimiento";
																					$valor1 = $gral['CallFSeguimiento'];
																					$campo2 = "CallHSeguimiento";
																					$valor2 = $gral['CallHSeguimiento'];
																					$camposet = "CallNT";
																					$ruta = $gral['IdNT'];
																					$update2 = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																					if ($update2 == "ok") {
																						// --------------- POPUP --------------- //
																						$popup['title'] = "LISTO!";
																						$popup['text'] = "¡Se actualizó tu seguimiento!";
																						$popup['type'] = "success";
																						$popup['ruta'] = "ruta";
																						// --------------- VISTAS --------------- //
																						$this -> load -> view('Principal/Header');
																						$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																						$this -> load -> view('Popup/Popup', $popup);
																						$this -> load -> view('Principal/Footer');
																					}
																					else {
																						// --------------- POPUP --------------- //
																						$popup['title'] = "¡OOOOPS!";
																						$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																						$popup['type'] = "error";
																						$popup['ruta'] = "base";
																						// --------------- VISTAS --------------- //
																						$this -> load -> view('Principal/Header');
																						$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																						$this -> load -> view('Popup/Popup', $popup);
																						$this -> load -> view('Principal/Footer');
																					}
																				}
																				// no existe seguimiento | insertamos el seguimiento
																				else {
																					// agregamos el seguimiento
																					$dataSeg['CallUsuario'] = $gral['CallUsuario'];
																					$dataSeg['CallNT'] = $gral['IdNT'];
																					$dataSeg['CallFSeguimiento'] = $gral['CallFSeguimiento'];
																					$dataSeg['CallHSeguimiento'] = $gral['CallHSeguimiento'];
																					$tabla = "seguimiento";
																					$insert = $this -> Model -> Insert($tabla, $dataSeg);
																					// validamos que se inserto el seguimiento
																					if ($insert == "ok") {
																						// si se inserto | mandamos alerta de success
																						// --------------- POPUP --------------- //
																						$popup['title'] = "LISTO!";
																						$popup['text'] = "¡Se agregó tu seguimiento!";
																						$popup['type'] = "success";
																						$popup['ruta'] = "base";
																						// --------------- VISTAS --------------- //
																						$this -> load -> view('Principal/Header');
																						$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																						$this -> load -> view('Popup/Popup', $popup);
																						$this -> load -> view('Principal/Footer');
																					}
																					// no se inserto | mandamos alerta de error
																					else {
																						// --------------- POPUP --------------- //
																						$popup['title'] = "¡OOOOPS!";
																						$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																						$popup['type'] = "error";
																						$popup['ruta'] = "base";
																						// --------------- VISTAS --------------- //
																						$this -> load -> view('Principal/Header');
																						$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																						$this -> load -> view('Popup/Popup', $popup);
																						$this -> load -> view('Principal/Footer');
																					}
																				}
																			}
																			// el status no se actualizó | mandamos alerta de error
																			else {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "¡OOOOPS!";
																				$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		}
																		// no viene información | redirigimos a la página principal
																		else {
																			redirect(base_url());
																			exit();
																		}
																	break;
																	case 'no-contesta':
																		// insertamos el historial de la llamada
																		$tabla = "historial";
																		$insertHis['H_IdU'] = $this -> session -> idSesion;
																		$insertHis['H_IdT'] = $gral['IdNT'];
																		$insertHis['Status'] = $gral['statusLlamada'];
																		$insertHis['Tipificacion'] = $gral['Tipificacion'];
																		$insertHis['Fecha'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertHis);
																		// insertamos el contador
																		$tabla = "contador";
																		$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																		$insertCon['C_Id_T'] = $gral['IdNT'];
																		$insertCon['C_Id_S'] = $gral['statusLlamada'];
																		$insertCon['FModificacion'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertCon);
																		// actualizamos el status de la llamada
																		$tabla = "numerostelefonicos";
																		$campo1 = "Status";
																		$valor1 = $gral['statusLlamada'];
																		$campo2 = "Tipificacion";
																		$valor2 = $gral['Tipificacion'];
																		$camposet = "IdNT";
																		$ruta = $gral['IdNT'];
																		$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																		// validamos si se actualizó el status
																		if ($update == "ok") {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "PERFECTO!";
																			$popup['text'] = "¡Se actualizó el status de la llamada!";
																			$popup['type'] = "success";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																		// el status no se actualizó | mandamos alerta de error
																		else {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "¡OOOOPS!";
																			$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																			$popup['type'] = "error";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																	break;
																	case 'numero-equivocado':
																		// insertamos el historial de la llamada
																		$tabla = "historial";
																		$insertHis['H_IdU'] = $this -> session -> idSesion;
																		$insertHis['H_IdT'] = $gral['IdNT'];
																		$insertHis['Status'] = $gral['statusLlamada'];
																		$insertHis['Tipificacion'] = $gral['Tipificacion'];
																		$insertHis['Fecha'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertHis);
																		// insertamos el contador
																		$tabla = "contador";
																		$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																		$insertCon['C_Id_T'] = $gral['IdNT'];
																		$insertCon['C_Id_S'] = $gral['statusLlamada'];
																		$insertCon['FModificacion'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertCon);
																		// actualizamos el status de la llamada
																		$tabla = "numerostelefonicos";
																		$campo1 = "Status";
																		$valor1 = $gral['statusLlamada'];
																		$campo2 = "Tipificacion";
																		$valor2 = $gral['Tipificacion'];
																		$camposet = "IdNT";
																		$ruta = $gral['IdNT'];
																		$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																		// validamos si se actualizó el status
																		if ($update == "ok") {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "PERFECTO!";
																			$popup['text'] = "¡Se actualizó el status de la llamada!";
																			$popup['type'] = "success";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																		// el status no se actualizó | mandamos alerta de error
																		else {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "¡OOOOPS!";
																			$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																			$popup['type'] = "error";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																	break;
																	case 'colgo':
																		// insertamos el historial de la llamada
																		$tabla = "historial";
																		$insertHis['H_IdU'] = $this -> session -> idSesion;
																		$insertHis['H_IdT'] = $gral['IdNT'];
																		$insertHis['Status'] = $gral['statusLlamada'];
																		$insertHis['Tipificacion'] = $gral['Tipificacion'];
																		$insertHis['Fecha'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertHis);
																		// insertamos el contador
																		$tabla = "contador";
																		$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																		$insertCon['C_Id_T'] = $gral['IdNT'];
																		$insertCon['C_Id_S'] = $gral['statusLlamada'];
																		$insertCon['FModificacion'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertCon);
																		// actualizamos el status de la llamada
																		$tabla = "numerostelefonicos";
																		$campo1 = "Status";
																		$valor1 = $gral['statusLlamada'];
																		$campo2 = "Tipificacion";
																		$valor2 = $gral['Tipificacion'];
																		$camposet = "IdNT";
																		$ruta = $gral['IdNT'];
																		$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																		// validamos si se actualizó el status
																		if ($update == "ok") {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "PERFECTO!";
																			$popup['text'] = "¡Se actualizó el status de la llamada!";
																			$popup['type'] = "success";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																		// el status no se actualizó | mandamos alerta de error
																		else {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "¡OOOOPS!";
																			$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																			$popup['type'] = "error";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																	break;
																	case 'renuente':
																		// insertamos el historial de la llamada
																		$tabla = "historial";
																		$insertHis['H_IdU'] = $this -> session -> idSesion;
																		$insertHis['H_IdT'] = $gral['IdNT'];
																		$insertHis['Status'] = $gral['statusLlamada'];
																		$insertHis['Tipificacion'] = $gral['Tipificacion'];
																		$insertHis['Fecha'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertHis);
																		// insertamos el contador
																		$tabla = "contador";
																		$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																		$insertCon['C_Id_T'] = $gral['IdNT'];
																		$insertCon['C_Id_S'] = $gral['statusLlamada'];
																		$insertCon['FModificacion'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertCon);
																		// actualizamos el status de la llamada
																		$tabla = "numerostelefonicos";
																		$campo1 = "Status";
																		$valor1 = $gral['statusLlamada'];
																		$campo2 = "Tipificacion";
																		$valor2 = $gral['Tipificacion'];
																		$camposet = "IdNT";
																		$ruta = $gral['IdNT'];
																		$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																		// validamos si se actualizó el status
																		if ($update == "ok") {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "PERFECTO!";
																			$popup['text'] = "¡Se actualizó el status de la llamada!";
																			$popup['type'] = "success";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																		// el status no se actualizó | mandamos alerta de error
																		else {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "¡OOOOPS!";
																			$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																			$popup['type'] = "error";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																	break;
																	case 'mensaje-a-buzon-grabadora':
																		// insertamos el historial de la llamada
																		$tabla = "historial";
																		$insertHis['H_IdU'] = $this -> session -> idSesion;
																		$insertHis['H_IdT'] = $gral['IdNT'];
																		$insertHis['Status'] = $gral['statusLlamada'];
																		$insertHis['Tipificacion'] = $gral['Tipificacion'];
																		$insertHis['Fecha'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertHis);
																		// insertamos el contador
																		$tabla = "contador";
																		$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																		$insertCon['C_Id_T'] = $gral['IdNT'];
																		$insertCon['C_Id_S'] = $gral['statusLlamada'];
																		$insertCon['FModificacion'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertCon);
																		// actualizamos el status de la llamada
																		$tabla = "numerostelefonicos";
																		$campo1 = "Status";
																		$valor1 = $gral['statusLlamada'];
																		$campo2 = "Tipificacion";
																		$valor2 = $gral['Tipificacion'];
																		$camposet = "IdNT";
																		$ruta = $gral['IdNT'];
																		$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																		// validamos si se actualizó el status
																		if ($update == "ok") {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "PERFECTO!";
																			$popup['text'] = "¡Se actualizó el status de la llamada!";
																			$popup['type'] = "success";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																		// el status no se actualizó | mandamos alerta de error
																		else {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "¡OOOOPS!";
																			$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																			$popup['type'] = "error";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																	break;
																	case 'no-aplica':
																		// insertamos el historial de la llamada
																		$tabla = "historial";
																		$insertHis['H_IdU'] = $this -> session -> idSesion;
																		$insertHis['H_IdT'] = $gral['IdNT'];
																		$insertHis['Status'] = $gral['statusLlamada'];
																		$insertHis['Tipificacion'] = $gral['Tipificacion'];
																		$insertHis['Fecha'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertHis);
																		// insertamos el contador
																		$tabla = "contador";
																		$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																		$insertCon['C_Id_T'] = $gral['IdNT'];
																		$insertCon['C_Id_S'] = $gral['statusLlamada'];
																		$insertCon['FModificacion'] = date('Y-m-d');
																		$this -> Model -> Insert($tabla, $insertCon);
																		// actualizamos el status de la llamada
																		$tabla = "numerostelefonicos";
																		$campo1 = "Status";
																		$valor1 = $gral['statusLlamada'];
																		$campo2 = "Tipificacion";
																		$valor2 = $gral['Tipificacion'];
																		$camposet = "IdNT";
																		$ruta = $gral['IdNT'];
																		$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																		// validamos si se actualizó el status
																		if ($update == "ok") {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "PERFECTO!";
																			$popup['text'] = "¡Se actualizó el status de la llamada!";
																			$popup['type'] = "success";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																		// el status no se actualizó | mandamos alerta de error
																		else {
																			// --------------- POPUP --------------- //
																			$popup['title'] = "¡OOOOPS!";
																			$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																			$popup['type'] = "error";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																	break;
																	default:
																		// --------------- POPUP --------------- //
																		$popup['title'] = "¡OOOOPS!";
																		$popup['text'] = "¡La página no se encuentra!";
																		$popup['type'] = "error";
																		$popup['ruta'] = "base";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('Principal/Header');
																		$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																		$this -> load -> view('Popup/Popup', $popup);
																		$this -> load -> view('Principal/Footer');
																	break;
																}
															}
															// el status de la llamada no se encuentra en la db | mandamos alerta de error
															else {
																// --------------- POPUP --------------- //
																$popup['title'] = "¡OOOOPS!";
																$popup['text'] = "¡La página no se encuentra!";
																$popup['type'] = "error";
																$popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																$this -> load -> view('Popup/Popup', $popup);
																$this -> load -> view('Principal/Footer');
															}
														}
														// no seleccionaron status | mandamos alerta de error
														else {
															// --------------- POPUP --------------- //
															$popup['title'] = "¡ERROR!";
															$popup['text'] = "¡Selecciona el status con el que vas a calificar la llamada!";
															$popup['type'] = "info";
															$popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('Principal/Header');
															$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
															$this -> load -> view('Popup/Popup', $popup);
															$this -> load -> view('Principal/Footer');
														}
													}
													// no existe la llamada | mandamos alerta de error
													else {
														// --------------- POPUP --------------- //
														$popup['title'] = "¡ERROR!";
														$popup['text'] = "¡Lo siento el número telefónico no existe, intentalo nuevamente!";
														$popup['type'] = "info";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
												}
												// no viene información del formulario | redirigimos a la página principal
												else {
													redirect(base_url());
													exit();
												}
											break;
											case 're-clasificar-llamada':
												// validamos si viene valor del formulario
												$gral['IdNT'] = trim($this -> input -> post('IdNT'));
												if (isset($gral['IdNT'])) {
													// si viene la llamada validamos que la llamada exista en la db
													$tabla = "numerostelefonicos";
													$campo = "IdNT";
													$valor = $gral['IdNT'];
													$llamada = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
													if ($llamada != "") {
														$gral['statusLlamada'] = trim($this -> input -> post('statusLlamada'));
														// validamos que seleccionarón status
														if ($gral['statusLlamada'] != "Selecciona-estatus-de-la-llamada") {
															// validamos que exista el seguimiento
															$tabla = "seguimiento";
															$campo = "CallNT";
															$valor = $gral['IdNT'];
															$seguimiento = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
															// validamos que exista el seguimiento
															if ($seguimiento != "") {
																// si existe el seguimiento | eliminamos el seguimiento
																$tabla = "seguimiento";
																$campo = "CallNT";
																$valor = $gral['IdNT'];
																$delete = $this -> Model -> Delete($tabla, $campo, $valor);
																// echo "<pre>"; print_r($seguimiento); die(); echo "</pre>";
																$gral['Tipificacion'] = trim($this -> input -> post('Tipificacion'));
																// validar el estatus de la llamada
																$tabla = "statusllamada";
																$campo = "IdStatus";
																$valor = $gral['statusLlamada'];
																$status = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
																if ($status != "") {
																	// el status es correcto | validamos la opción
																	switch ($status -> CallRuta) {
																		case 'venta':
																			// si existe la llamada | insertamos la venta
																			$tabla = "ventas";
																			$insertVen['V_IdTel'] = $gral['IdNT'];
																			$insertVen['V_IdU'] = $this -> session -> idSesion;
																			$insertVen['Fecha'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertVen);
																			// insertamos el contador
																			$tabla = "contador";
																			$insertCon['C_Id_U'] = $insertVen['V_IdU'];
																			$insertCon['C_Id_T'] = $gral['IdNT'];
																			$insertCon['C_Id_S'] = $gral['statusLlamada'];
																			$insertCon['FModificacion'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertCon);
																			// insertamos el historial de la llamada
																			$tabla = "historial";
																			$insertHis['H_IdU'] = $this -> session -> idSesion;
																			$insertHis['H_IdT'] = $gral['IdNT'];
																			$insertHis['Status'] = $gral['statusLlamada'];
																			$insertHis['Tipificacion'] = $gral['Tipificacion'];
																			$insertHis['Fecha'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertHis);
																			// actualizamos el status de la llamada
																			$tabla = "numerostelefonicos";
																			$campo1 = "Status";
																			$valor1 = $gral['statusLlamada'];
																			$campo2 = "Tipificacion";
																			$valor2 = $gral['Tipificacion'];
																			$camposet = "IdNT";
																			$ruta = $gral['IdNT'];
																			$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																			// validamos si se actualizó el status
																			if ($update == "ok") {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "¡FELICIDADES!";
																				$popup['text'] = "¡Sigue trabajando así!";
																				$popup['type'] = "success";
																				$popup['ruta'] = "ruta";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																			// el status no se actualizó | mandamos alerta de error
																			else {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "¡OOOOPS!";
																				$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		break;
																		case 'volver-a-llamar':
																			// validamos que venga información del form
																			$gral['CallUsuario'] = trim($this -> input -> post('CallUsuario'));
																			$gral['CallFSeguimiento'] = trim($this -> input -> post('CallFSeguimiento'));
																			$gral['CallHSeguimiento'] = trim($this -> input -> post('CallHSeguimiento'));
																			if (isset($gral['CallUsuario'])) {
																				// insertamos el historial de la llamada
																				$tabla = "historial";
																				$insertHis['H_IdU'] = $this -> session -> idSesion;
																				$insertHis['H_IdT'] = $gral['IdNT'];
																				$insertHis['Status'] = $gral['statusLlamada'];
																				$insertHis['Tipificacion'] = $gral['Tipificacion'];
																				$insertHis['Fecha'] = date('Y-m-d');
																				$this -> Model -> Insert($tabla, $insertHis);
																				// insertamos el contador
																				$tabla = "contador";
																				$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																				$insertCon['C_Id_T'] = $gral['IdNT'];
																				$insertCon['C_Id_S'] = $gral['statusLlamada'];
																				$insertCon['FModificacion'] = date('Y-m-d');
																				$this -> Model -> Insert($tabla, $insertCon);
																				// actualizamos el status de la llamada
																				$tabla = "numerostelefonicos";
																				$campo1 = "Status";
																				$valor1 = $gral['statusLlamada'];
																				$campo2 = "Tipificacion";
																				$valor2 = $gral['Tipificacion'];
																				$camposet = "IdNT";
																				$ruta = $gral['IdNT'];
																				$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																				// validamos si se actualizó el status
																				if ($update == "ok") {
																					// si viene información | validamos si existe un registro del seguimiento
																					$tabla = "seguimiento";
																					$campo = "CallNT";
																					$valor = $gral['IdNT'];
																					$seguimiento = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
																					if ($seguimiento != "") {
																						// si viene seguimiento | actualizamos seguimiento
																						$tabla = "seguimiento";
																						$campo1 = "CallFSeguimiento";
																						$valor1 = $gral['CallFSeguimiento'];
																						$campo2 = "CallHSeguimiento";
																						$valor2 = $gral['CallHSeguimiento'];
																						$camposet = "CallNT";
																						$ruta = $gral['IdNT'];
																						$update2 = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																						if ($update2 == "ok") {
																							// --------------- POPUP --------------- //
																							$popup['title'] = "LISTO!";
																							$popup['text'] = "¡Se actualizó tu seguimiento!";
																							$popup['type'] = "success";
																							$popup['ruta'] = "ruta";
																							// --------------- VISTAS --------------- //
																							$this -> load -> view('Principal/Header');
																							$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																							$this -> load -> view('Popup/Popup', $popup);
																							$this -> load -> view('Principal/Footer');
																						}
																						else {
																							// --------------- POPUP --------------- //
																							$popup['title'] = "¡OOOOPS!";
																							$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																							$popup['type'] = "error";
																							$popup['ruta'] = "base";
																							// --------------- VISTAS --------------- //
																							$this -> load -> view('Principal/Header');
																							$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																							$this -> load -> view('Popup/Popup', $popup);
																							$this -> load -> view('Principal/Footer');
																						}
																					}
																					// no existe seguimiento | insertamos el seguimiento
																					else {
																						// agregamos el seguimiento
																						$dataSeg['CallUsuario'] = $gral['CallUsuario'];
																						$dataSeg['CallNT'] = $gral['IdNT'];
																						$dataSeg['CallFSeguimiento'] = $gral['CallFSeguimiento'];
																						$dataSeg['CallHSeguimiento'] = $gral['CallHSeguimiento'];
																						$tabla = "seguimiento";
																						$insert = $this -> Model -> Insert($tabla, $dataSeg);
																						// validamos que se inserto el seguimiento
																						if ($insert == "ok") {
																							// si se inserto | mandamos alerta de success
																							// --------------- POPUP --------------- //
																							$popup['title'] = "LISTO!";
																							$popup['text'] = "¡Se agregó tu seguimiento!";
																							$popup['type'] = "success";
																							$popup['ruta'] = "base";
																							// --------------- VISTAS --------------- //
																							$this -> load -> view('Principal/Header');
																							$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																							$this -> load -> view('Popup/Popup', $popup);
																							$this -> load -> view('Principal/Footer');
																						}
																						// no se inserto | mandamos alerta de error
																						else {
																							// --------------- POPUP --------------- //
																							$popup['title'] = "¡OOOOPS!";
																							$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																							$popup['type'] = "error";
																							$popup['ruta'] = "base";
																							// --------------- VISTAS --------------- //
																							$this -> load -> view('Principal/Header');
																							$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																							$this -> load -> view('Popup/Popup', $popup);
																							$this -> load -> view('Principal/Footer');
																						}
																					}
																				}
																				// el status no se actualizó | mandamos alerta de error
																				else {
																					// --------------- POPUP --------------- //
																					$popup['title'] = "¡OOOOPS!";
																					$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																					$popup['type'] = "error";
																					$popup['ruta'] = "base";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('Principal/Header');
																					$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																					$this -> load -> view('Popup/Popup', $popup);
																					$this -> load -> view('Principal/Footer');
																				}
																			}
																			// no viene información | redirigimos a la página principal
																			else {
																				redirect(base_url());
																				exit();
																			}
																		break;
																		case 'no-contesta':
																			// insertamos el historial de la llamada
																			$tabla = "historial";
																			$insertHis['H_IdU'] = $this -> session -> idSesion;
																			$insertHis['H_IdT'] = $gral['IdNT'];
																			$insertHis['Status'] = $gral['statusLlamada'];
																			$insertHis['Tipificacion'] = $gral['Tipificacion'];
																			$insertHis['Fecha'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertHis);
																			// insertamos el contador
																			$tabla = "contador";
																			$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																			$insertCon['C_Id_T'] = $gral['IdNT'];
																			$insertCon['C_Id_S'] = $gral['statusLlamada'];
																			$insertCon['FModificacion'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertCon);
																			// actualizamos el status de la llamada
																			$tabla = "numerostelefonicos";
																			$campo1 = "Status";
																			$valor1 = $gral['statusLlamada'];
																			$campo2 = "Tipificacion";
																			$valor2 = $gral['Tipificacion'];
																			$camposet = "IdNT";
																			$ruta = $gral['IdNT'];
																			$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																			// validamos si se actualizó el status
																			if ($update == "ok") {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "PERFECTO!";
																				$popup['text'] = "¡Se actualizó el status de la llamada!";
																				$popup['type'] = "success";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																			// el status no se actualizó | mandamos alerta de error
																			else {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "¡OOOOPS!";
																				$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		break;
																		case 'numero-equivocado':
																			// insertamos el historial de la llamada
																			$tabla = "historial";
																			$insertHis['H_IdU'] = $this -> session -> idSesion;
																			$insertHis['H_IdT'] = $gral['IdNT'];
																			$insertHis['Status'] = $gral['statusLlamada'];
																			$insertHis['Tipificacion'] = $gral['Tipificacion'];
																			$insertHis['Fecha'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertHis);
																			// insertamos el contador
																			$tabla = "contador";
																			$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																			$insertCon['C_Id_T'] = $gral['IdNT'];
																			$insertCon['C_Id_S'] = $gral['statusLlamada'];
																			$insertCon['FModificacion'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertCon);
																			// actualizamos el status de la llamada
																			$tabla = "numerostelefonicos";
																			$campo1 = "Status";
																			$valor1 = $gral['statusLlamada'];
																			$campo2 = "Tipificacion";
																			$valor2 = $gral['Tipificacion'];
																			$camposet = "IdNT";
																			$ruta = $gral['IdNT'];
																			$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																			// validamos si se actualizó el status
																			if ($update == "ok") {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "PERFECTO!";
																				$popup['text'] = "¡Se actualizó el status de la llamada!";
																				$popup['type'] = "success";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																			// el status no se actualizó | mandamos alerta de error
																			else {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "¡OOOOPS!";
																				$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		break;
																		case 'colgo':
																			// insertamos el historial de la llamada
																			$tabla = "historial";
																			$insertHis['H_IdU'] = $this -> session -> idSesion;
																			$insertHis['H_IdT'] = $gral['IdNT'];
																			$insertHis['Status'] = $gral['statusLlamada'];
																			$insertHis['Tipificacion'] = $gral['Tipificacion'];
																			$insertHis['Fecha'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertHis);
																			// insertamos el contador
																			$tabla = "contador";
																			$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																			$insertCon['C_Id_T'] = $gral['IdNT'];
																			$insertCon['C_Id_S'] = $gral['statusLlamada'];
																			$insertCon['FModificacion'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertCon);
																			// actualizamos el status de la llamada
																			$tabla = "numerostelefonicos";
																			$campo1 = "Status";
																			$valor1 = $gral['statusLlamada'];
																			$campo2 = "Tipificacion";
																			$valor2 = $gral['Tipificacion'];
																			$camposet = "IdNT";
																			$ruta = $gral['IdNT'];
																			$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																			// validamos si se actualizó el status
																			if ($update == "ok") {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "PERFECTO!";
																				$popup['text'] = "¡Se actualizó el status de la llamada!";
																				$popup['type'] = "success";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																			// el status no se actualizó | mandamos alerta de error
																			else {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "¡OOOOPS!";
																				$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		break;
																		case 'renuente':
																			// insertamos el historial de la llamada
																			$tabla = "historial";
																			$insertHis['H_IdU'] = $this -> session -> idSesion;
																			$insertHis['H_IdT'] = $gral['IdNT'];
																			$insertHis['Status'] = $gral['statusLlamada'];
																			$insertHis['Tipificacion'] = $gral['Tipificacion'];
																			$insertHis['Fecha'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertHis);
																			// insertamos el contador
																			$tabla = "contador";
																			$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																			$insertCon['C_Id_T'] = $gral['IdNT'];
																			$insertCon['C_Id_S'] = $gral['statusLlamada'];
																			$insertCon['FModificacion'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertCon);
																			// actualizamos el status de la llamada
																			$tabla = "numerostelefonicos";
																			$campo1 = "Status";
																			$valor1 = $gral['statusLlamada'];
																			$campo2 = "Tipificacion";
																			$valor2 = $gral['Tipificacion'];
																			$camposet = "IdNT";
																			$ruta = $gral['IdNT'];
																			$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																			// validamos si se actualizó el status
																			if ($update == "ok") {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "PERFECTO!";
																				$popup['text'] = "¡Se actualizó el status de la llamada!";
																				$popup['type'] = "success";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																			// el status no se actualizó | mandamos alerta de error
																			else {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "¡OOOOPS!";
																				$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		break;
																		case 'mensaje-a-buzon-grabadora':
																			// insertamos el historial de la llamada
																			$tabla = "historial";
																			$insertHis['H_IdU'] = $this -> session -> idSesion;
																			$insertHis['H_IdT'] = $gral['IdNT'];
																			$insertHis['Status'] = $gral['statusLlamada'];
																			$insertHis['Tipificacion'] = $gral['Tipificacion'];
																			$insertHis['Fecha'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertHis);
																			// insertamos el contador
																			$tabla = "contador";
																			$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																			$insertCon['C_Id_T'] = $gral['IdNT'];
																			$insertCon['C_Id_S'] = $gral['statusLlamada'];
																			$insertCon['FModificacion'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertCon);
																			// actualizamos el status de la llamada
																			$tabla = "numerostelefonicos";
																			$campo1 = "Status";
																			$valor1 = $gral['statusLlamada'];
																			$campo2 = "Tipificacion";
																			$valor2 = $gral['Tipificacion'];
																			$camposet = "IdNT";
																			$ruta = $gral['IdNT'];
																			$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																			// validamos si se actualizó el status
																			if ($update == "ok") {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "PERFECTO!";
																				$popup['text'] = "¡Se actualizó el status de la llamada!";
																				$popup['type'] = "success";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																			// el status no se actualizó | mandamos alerta de error
																			else {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "¡OOOOPS!";
																				$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		break;
																		case 'no-aplica':
																			// insertamos el historial de la llamada
																			$tabla = "historial";
																			$insertHis['H_IdU'] = $this -> session -> idSesion;
																			$insertHis['H_IdT'] = $gral['IdNT'];
																			$insertHis['Status'] = $gral['statusLlamada'];
																			$insertHis['Tipificacion'] = $gral['Tipificacion'];
																			$insertHis['Fecha'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertHis);
																			// insertamos el contador
																			$tabla = "contador";
																			$insertCon['C_Id_U'] = $insertHis['H_IdU'];
																			$insertCon['C_Id_T'] = $gral['IdNT'];
																			$insertCon['C_Id_S'] = $gral['statusLlamada'];
																			$insertCon['FModificacion'] = date('Y-m-d');
																			$this -> Model -> Insert($tabla, $insertCon);
																			// actualizamos el status de la llamada
																			$tabla = "numerostelefonicos";
																			$campo1 = "Status";
																			$valor1 = $gral['statusLlamada'];
																			$campo2 = "Tipificacion";
																			$valor2 = $gral['Tipificacion'];
																			$camposet = "IdNT";
																			$ruta = $gral['IdNT'];
																			$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
																			// validamos si se actualizó el status
																			if ($update == "ok") {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "PERFECTO!";
																				$popup['text'] = "¡Se actualizó el status de la llamada!";
																				$popup['type'] = "success";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																			// el status no se actualizó | mandamos alerta de error
																			else {
																				// --------------- POPUP --------------- //
																				$popup['title'] = "¡OOOOPS!";
																				$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header');
																				$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		break;
																		default:
																			// --------------- POPUP --------------- //
																			$popup['title'] = "¡OOOOPS!";
																			$popup['text'] = "¡La página no se encuentra!";
																			$popup['type'] = "error";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header');
																			$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		break;
																	}
																}
																// el status de la llamada no se encuentra en la db | mandamos alerta de error
																else {
																	// --------------- POPUP --------------- //
																	$popup['title'] = "¡OOOOPS!";
																	$popup['text'] = "¡La página no se encuentra!";
																	$popup['type'] = "error";
																	$popup['ruta'] = "base";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('Principal/Header');
																	$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																	$this -> load -> view('Popup/Popup', $popup);
																	$this -> load -> view('Principal/Footer');
																}
															}
															// el seguimiento no existe | redirigimos a la página principal
															else {
																redirect(base_url());
																exit();
															}
														}
														// no seleccionaron status | mandamos alerta de error
														else {
															// --------------- POPUP --------------- //
															$popup['title'] = "¡ERROR!";
															$popup['text'] = "¡Selecciona el status con el que vas a calificar la llamada!";
															$popup['type'] = "info";
															$popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('Principal/Header');
															$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
															$this -> load -> view('Popup/Popup', $popup);
															$this -> load -> view('Principal/Footer');
														}
													}
													// no existe la llamada | mandamos alerta de error
													else {
														// --------------- POPUP --------------- //
														$popup['title'] = "¡ERROR!";
														$popup['text'] = "¡Lo siento el número telefónico no existe, intentalo nuevamente!";
														$popup['type'] = "info";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
												}
												// no viene información del formulario | redirigimos a la página principal
												else {
													redirect(base_url());
													exit();
												}
											break;
											case 'insertar-seguimiento':
												// validamos que venga información del form
												$data['CallUsuario'] = $this -> input -> post('CallUsuario');
												if (isset($data['CallUsuario'])) {
													// si existe la llamada | actualizamos el status de la llamada
													$dataupdate['statusLlamada'] = $this -> input -> post('statusLlamada');
													$dataupdate['IdNT'] = $this -> input -> post('CallNT');
													$Tipificacion = ltrim($this -> input -> post('Tipificacion'));
													$dataupdate['Tipificacion'] = rtrim($Tipificacion);
													// insertamos el historial de la llamada
													$tabla = "historial";
													$hinsert['H_IdU'] = $this -> session -> idSesion;
													$hinsert['H_IdT'] = $dataupdate['IdNT'];
													$hinsert['Status'] = $dataupdate['statusLlamada'];
													$hinsert['Tipificacion'] = $dataupdate['Tipificacion'];
													$hinsert['Fecha'] = date('Y-m-d');
													$this -> Model -> Insert($tabla, $hinsert);
													// insertamos el contador
													$tabla = "contador";
													$insertCon['C_Id_U'] = $hinsert['H_IdU'];
													$insertCon['C_Id_T'] = $dataupdate['IdNT'];
													$insertCon['C_Id_S'] = $dataupdate['statusLlamada'];
													$insertCon['FModificacion'] = date('Y-m-d');
													$this -> Model -> Insert($tabla, $insertCon);
													// actualizamos el status del teléfono
													$tabla = "numerostelefonicos";
													$campo1 = "Status";
													$valor1 = $dataupdate['statusLlamada'];
													$campo2 = "Tipificacion";
													$valor2 = $dataupdate['Tipificacion'];
													$camposet = "IdNT";
													$ruta = $dataupdate['IdNT'];
													$update = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
													// validamos si se actualizó el status
													if ($update == "ok") {
														// si viene información | validamos si existe un registro del seguimiento
														$tabla = "seguimiento";
														$campo = "CallNT";
														$valor = $dataupdate['IdNT'];
														$seguimiento = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
														if ($seguimiento != "") {
															// si viene seguimiento | actualizamos seguimiento
															$tabla = "seguimiento";
															$campo1 = "CallFSeguimiento";
															$valor1 = $this -> input -> post('CallFSeguimiento');
															$campo2 = "CallHSeguimiento";
															$valor2 = $this -> input -> post('CallHSeguimiento');
															$camposet = "CallNT";
															$ruta = $dataupdate['IdNT'];
															$update2 = $this -> Model -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
															if ($update2 == "ok") {
																// --------------- POPUP --------------- //
																$popup['title'] = "LISTO!";
																$popup['text'] = "¡Se actualizó tu seguimiento!";
																$popup['type'] = "success";
																$popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																$this -> load -> view('Popup/Popup', $popup);
																$this -> load -> view('Principal/Footer');
															}
															else {
																// --------------- POPUP --------------- //
																$popup['title'] = "¡OOOOPS!";
																$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																$popup['type'] = "error";
																$popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																$this -> load -> view('Popup/Popup', $popup);
																$this -> load -> view('Principal/Footer');
															}
														}
														// no existe seguimiento | insertamos el seguimiento
														else {
															$data['CallNT'] = $dataupdate['IdNT'];
															$data['CallFSeguimiento'] = $this -> input -> post('CallFSeguimiento');
															$data['CallHSeguimiento'] = $this -> input -> post('CallHSeguimiento');
															// agregamos el seguimiento
															$tabla = "seguimiento";
															$insert = $this -> Model -> Insert($tabla, $data);
															// validamos que se inserto el seguimiento
															if ($insert == "ok") {
																// si se inserto | mandamos alerta de success
																// --------------- POPUP --------------- //
																$popup['title'] = "LISTO!";
																$popup['text'] = "¡Se agregó tu seguimiento!";
																$popup['type'] = "success";
																$popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																$this -> load -> view('Popup/Popup', $popup);
																$this -> load -> view('Principal/Footer');
															}
															// no se inserto | mandamos alerta de error
															else {
																// --------------- POPUP --------------- //
																$popup['title'] = "¡OOOOPS!";
																$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
																$popup['type'] = "error";
																$popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
																$this -> load -> view('Popup/Popup', $popup);
																$this -> load -> view('Principal/Footer');
															}
														}
													}
													// el status no se actualizó | mandamos alerta de error
													else {
														// --------------- POPUP --------------- //
														$popup['title'] = "¡OOOOPS!";
														$popup['text'] = "¡Ocurrio un error, intentalo nuevamente!";
														$popup['type'] = "error";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
												}
												// no viene información | redirigimos a la página principal
												else {
													redirect(base_url());
													exit();
												}
											break;
											case 'ver-mis-seguimientos':
												// obtenemos los seguimientos
												$fecha = date('Y-m-d');
												$tabla1 = "seguimiento";
												$campo1 = "CallUsuario";
												$valor1 = $this -> session -> idSesion;
												$campo2 = "CallFSeguimiento";
												$valor2 = $fecha;
												$data['seguimiento'] = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
												if ($data['seguimiento'] != "") {
													$total = count($data['seguimiento']);
												}
												else {
													$total = 0;
												}
												// buscamos la información de los números
												$fecha = date('Y-m-d');
												$tabla1 = "numerostelefonicos";
												$alias1 = "tbl1";
												$tabla2 = "seguimiento";
												$alias2 = "tbl2";
												$campo1 = "IdNT";
												$campo2 = "CallNT";
												$campo3 = "CallFSeguimiento";
												$valor2 = $data['seguimiento'];
												$valor3 = $fecha;
												$posicion = "CallNT";
												$data['numeros'] = $this -> Model -> GetAllInnerWhere2($tabla1, $alias1, $tabla2, $alias2, $campo1, $campo2, $campo3, $valor2, $valor3, $posicion);
												$tabla = "statusllamada";
												$data['status'] = $this -> Model -> GetAll($tabla);
												$this -> load -> view('Principal/Header');
												$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
												$this -> load -> view('Ejecutivo Telefonico/Ver_Seguimiento', $data);
												$this -> load -> view('Principal/Footer');
											break;
											case 'validar-seguimientos':
												$tabla = "seguimiento";
												$campo1 = "CallUsuario";
												$valor1 = $this -> session -> idSesion;
												$campo2 = "CallFSeguimiento";
												$valor2 = date('Y-m-d');
												$campo3 = "CallHSeguimiento";
												$valor3 = date('H:i:s');
												$data = $this -> Model -> GetAllWhere3($tabla, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3);
												if ($data != "") {
													echo count($data);
												}
												else {
													echo "0";
												}
												// echo $data = count($this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2));
											break;
											default:
												// --------------- POPUP --------------- //
												$popup['title'] = "¡OOOOPS!";
												$popup['text'] = "¡La página no se encuentra!";
												$popup['type'] = "error";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header');
												$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											break;
										}
									}
									// el metodo no existe | redirigimos a la página principal
									else {
										redirect(base_url());
										exit();
									}
								}
								// el metodo no viene | redirigimos a la página principal
								else {
									redirect(base_url());
									exit();
								}
							break;
								// tipo de usuari no existe | mandamos alerta de error
							default:
								// --------------- POPUP --------------- //
								$popup['title'] = "¡OOOOPS!";
								$popup['text'] = "¡La página no se encuentra!";
								$popup['type'] = "error";
								$popup['ruta'] = "base";
								// --------------- VISTAS --------------- //
								$this -> load -> view('Principal/Header');
								$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
								$this -> load -> view('Popup/Popup', $popup);
								$this -> load -> view('Principal/Footer');
							break;
						}
					}
					// el tipo de usuario no es correcto | mandamos alerta de error
					else {
						// --------------- POPUP --------------- //
						$popup['title'] = "¡OOOOPS!";
						$popup['text'] = "¡La página no se encuentra!";
						$popup['type'] = "error";
						$popup['ruta'] = "base";
						// --------------- VISTAS --------------- //
						$this -> load -> view('Principal/Header');
						$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
						$this -> load -> view('Popup/Popup', $popup);
						$this -> load -> view('Principal/Footer');
					}
				}
				else {
					// la sesion es error | mandamos a la página principal
					$this -> load -> view('Principal/Header');
					$this -> load -> view('Principal/Home');
					$this -> load -> view('Principal/Footer');
				}
			}
			else {
				// no vienen las variables de sesion | mandamos a la página principal
				$this -> load -> view('Principal/Header');
				$this -> load -> view('Principal/Home');
				$this -> load -> view('Principal/Footer');
			}
		}
	}
