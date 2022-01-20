<?php
	if (! defined('BASEPATH')) exit ('No direct script access allowed');
	class CallCenter extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this -> load -> helper('form');
			$this -> load -> library('Session');
			$this -> load -> model('Model');
			$this -> load -> helper('url');
		}
		function _remap($method, $params = array()) {
			if (!method_exists($this, $method)) {
				$this -> index($method, $params);
			} else {
				return call_user_func_array(array($this,$method), $params);
			}
		}

		function index($method = NULL){
			if (isset($this -> session -> validarSesion)) {
				if ($this -> session -> validarSesion == "ok") {
					// validamos si viene metodo
					if (isset($method)) {
						$tabla = "metodo";
						$campo1 = "Ruta";
						$valor1 = $method;
						$campo2 = "IdUsuario";
						$valor2 = $this -> session -> TUSesion;
						$metodo = $this -> Model -> GetRowWhere2Like($tabla, $campo1, $valor1, $campo2, $valor2);
						// validamos si el metodo existe en la db
						if ($metodo != "") {
							switch ($metodo -> Ruta) {
								case 'cerrar-sesion':
									// la sesion es ok | insertamos el cierre de la sesion
									$tabla = "cierresesion";
									$data['CallIdSesion'] = $this -> session -> idSesionS;
									$data['C_CallUsuario'] = $this -> session -> idSesion;
									$data['CallHCSesion'] = $this -> input -> post('CallHoraCS');
									$data['CallFCSesion'] = date('Y-m-d');
									$insertCierre = $this -> Model -> Insert($tabla, $data);
									// validamos que la sesion se inserto correctamente
									if ($insertCierre == "ok") {
										// la sesión se inserto correctamente | mandamos alerta de info
										session_destroy();
										// --------------- POPUP --------------- //
										$popup['title'] = "¡HASTA PRONTO!";
										$popup['text'] = "¡Has cerrado sesion!";
										$popup['type'] = "info";
										$popup['ruta'] = "base";
										// --------------- VISTAS --------------- //
										$this -> load -> view('Principal/Header');
										$this -> load -> view('Popup/Popup', $popup);
										$this -> load -> view('Principal/Footer');
									}
									// la sesion no inserto correctamente | mandamos alerta de error
									else {
										// --------------- POPUP --------------- //
										$popup['title'] = "¡ERROR!";
										$popup['text'] = "¡Lo sentimos hubo un error, intentalo nuevamente!";
										$popup['type'] = "error";
										$popup['ruta'] = "base";
										// --------------- VISTAS --------------- //
										$this -> load -> view('Principal/Header');
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
									$this -> load -> view('Popup/Popup', $popup);
									$this -> load -> view('Principal/Footer');
								break;
							}
						}
						// el valor no existe | mandamos alerta de error
						else {
							// --------------- POPUP --------------- //
							$popup['title'] = "¡OOOOPS!";
							$popup['text'] = "¡La página no se encuentra!";
							$popup['type'] = "error";
							$popup['ruta'] = "base";
							// --------------- VISTAS --------------- //
							$this -> load -> view('Principal/Header');
							$this -> load -> view('Popup/Popup', $popup);
							$this -> load -> view('Principal/Footer');
						}
					}
					// metodo viene vacio | mandamos a la página principal
					else {
						// la sesion es ok | validamos el tipo de ususario
						switch ($this -> session -> TUSesion) {
							// tipo de usuario = Ejecutivo Telefonico
							case 1:
								// obtenemos al ejecutivo
								$tabla = "usuario";
								$campo = "IdUsuario";
								$valor = $this -> session -> idSesion;
								$data['ejecutivo'] = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
								// buscamos los numeros asignados
								// $tabla = "ejecutivotelefonos";
								// $campo = "ET_IdU";
								// $valor = $data['ejecutivo'] -> IdUsuario;
								// $data['tel'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
								// // validamos que tengan asignación
								// if ($data['tel'] != "") {
								// 	// si existen números asignados
								// 	$data['tel'] = $data['tel'];
								// }
								// // no existen numeros asignados
								// else {
								// 	$data['tel'] = 0;
								// }
								// buscamos la información de los números
								// $tabla = "numerostelefonicos";
								// $campo1 = "IdNT";
								// $valor1 = $data['tel'];
								// $posicion = "ET_IdNT";
								// $campo2 = "Status";
								// $valor2 = 10;
								// $data['phone'] = $this -> Model -> GetAllWhereFor2($tabla, $campo1, $valor1, $posicion, $campo2, $valor2);
								// obtenemos los seguimientos
								$fecha = date('Y-m-d');
								$tabla = "seguimiento";
								$campo1 = "CallUsuario";
								$valor1 = $this -> session -> idSesion;
								$campo2 = "CallFSeguimiento";
								$valor2 = $fecha;
								$menu['seguimiento'] = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
								// obtenemos los status para clasificar las llamadas
								// $tabla = "statusllamada";
								// $data['status'] = $this -> Model -> GetAll($tabla);
								$this -> load -> view('Principal/Header');
								$this -> load -> view('Ejecutivo Telefonico/Menu', $menu);
								$this -> load -> view('Ejecutivo Telefonico/Home', $data);
								$this -> load -> view('Principal/Footer');
							break;
							// tipo de usuario = Mesa de control
							case 2:
								print_r($this -> session -> TUSesion); die();
							break;
							// tipo de usuario = supervisión
							case 3:
								// obtenemos los usuarios
								$tabla = "usuario";
								$data['usuario'] = $this -> Model -> GetAll($tabla);
								// obtenemos los usuarios de tipo Ejecutivo Telefonico
								$tabla = "usuario";
								$campo = "U_CallTipoUsuario";
								$valor = 1;
								$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
								// obtenemos los números teléfonicos
								// $tabla = "numerostelefonicos";
								// $campo1 = "Status";
								// $valor1 = 10;
								// $campo2 = "Status";
								// $valor2 = 1;
								// $campo3 = "Status";
								// $valor3 = 2;
								// $data['numerostelefonicos'] = $this -> Model -> GetAllWhere3Diferent($tabla, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3);
								// echo "<pre>"; print_r($data); echo "</pre>"; die();
								$this -> load -> view('Principal/Header');
								$this -> load -> view('Supervisor/Menu');
								$this -> load -> view('Supervisor/Home', $data);
								$this -> load -> view('Principal/Footer');
							break;
							// tipo de usuario = administrador
							case 4:
								// obtenemos las llamadas
								$tabla = "llamada";
								$data['llamada'] = $this -> Model -> GetAll($tabla);
								// obtenemos los usuarios
								$tabla = "usuario";
								$data['usuario'] = $this -> Model -> GetAll($tabla);
								// obtenemos los usuarios de tipo Ejecutivo Telefonico
								$tabla = "usuario";
								$campo = "U_CallTipoUsuario";
								$valor = 1;
								$data['usuarioE'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
								// obtenemos los status de las llamadas
								$tabla = "statusllamada";
								$data['statusllamada'] = $this -> Model -> GetAll($tabla);
								$this -> load -> view('Principal/Header');
								$this -> load -> view('Administrador/Menu');
								$this -> load -> view('Administrador/Home', $data);
								$this -> load -> view('Principal/Footer');
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
								$this -> load -> view('Popup/Popup', $popup);
								$this -> load -> view('Principal/Footer');
							break;
						}
					}
				}
				// la sesion es error | mandamos a la página principal
				else {
					$this -> load -> view('Principal/Header');
					$this -> load -> view('Principal/Home');
					$this -> load -> view('Principal/Footer');
				}
			}
			// no existe variable de la sesión
			else {
				if (isset($method)) {
					// validamos el metodo
					$tabla = "metodo";
					$campo = "Ruta";
					$valor = $method;
					$metodo = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
					if ($metodo != "") {
						switch ($metodo -> Ruta) {
							case 'iniciar-sesion':
								// validamos si viene información del formulario
								$data['CallUsuario'] = $this -> input -> post('CallUsuario');
								if (isset($data['CallUsuario'])) {
									// si existe | validamos el formato
									$data['CallPasswordMd5'] = md5($this -> input -> post('CallPassword'));
									$data['navegador'] = $this -> input -> post('navegador');
									// if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $data['CallUsuario']) && preg_match('/^[a-zA-Z0-9]+$/', $data['CallPasswordMd5'])){
										// el formato es el correcto | validamos que exista el usuario en la base de datos
										$tabla = "usuario";
										$campo1 = "CallUsuario";
										$valor1 = $data['CallUsuario'];
										$campo2 = "CallPasswordMd5";
										$valor2 = $data['CallPasswordMd5'];
										$usuario = $this -> Model -> GetRowWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
										if ($usuario != NULL) {
											// el usuario si existe en la base de datos | iniciamos sesion
											// insertamos la sesion
											$datas['CallUsuario'] = $usuario-> IdUsuario;
											$datas['CallDireccionIp'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
											$datas['CallUbicacion'] = $this -> input -> post('CallUbicacion');
											$datas['CallHSesion'] = $this -> input -> post('CallHora');
											$datas['CallFSesion'] = date('Y-m-d');
											// validamos que venga la ubicación del usuario
											if($datas['CallUbicacion'] != ""){
												if (stristr($data['navegador'], 'Chrome') == TRUE) {
													// la ubicación si fue aceptada | insertamos la sesion
													$tabla = "sesion";
													$data = $datas;
													$insert = $this -> Model -> Insert($tabla, $data);
													// echo "<pre>"; print_r($insert); echo "</pre>"; die();
													// validamos que la sesion se inserto correctamente
													if ($insert == "true") {
														// buscamos la sesión creada
														$tabla = "sesion";
														$campo1 = 'CallHSesion';
														$valor1 = $datas['CallHSesion'];
														$campo2 = "CallFSesion";
														$valor2 = $datas['CallFSesion'];
														$campo3 = 'CallUsuario';
														$valor3 = $usuario -> IdUsuario;
														$sesion = $this -> Model -> GetRowWhere3($tabla, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3);
														// la sesion se inserto correctamente | iniciamos sesion
														// variable para validar la sesion del usuario
								 						$this -> session -> validarSesion = "ok";
								 						// variable para id del usuario
								 						$this -> session -> idSesion = $usuario -> IdUsuario;
														// variable para imagen del usuario
														$this -> session -> ImagenSesion = $usuario -> CallImagen;
														// variable para nombre del usuario
														$this -> session -> UNameSesion = $usuario -> CallNombre;
								 						// variable para usuario del usuario
								 						$this -> session -> UserSesion = $usuario -> CallUsuario;
								 						// variable para contraseña del usuario
								 						$this -> session -> PassSesion = $usuario -> CallPassword;
								 						// variable para tipo de ususario del usuario
								 						$this -> session -> TUSesion = $usuario -> U_CallTipoUsuario;
														// variable para el id de la sesion
								 						$this -> session -> idSesionS = $sesion -> IdSesion;
														// --------------- POPUP --------------- //
														$popup['title'] = "¡BIENVENIDO!";
														$popup['text'] = "¡Has iniciado sesión!";
														$popup['type'] = "success";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
													// la sesion no fue creada | mandamos alerta de error
													else {
														// --------------- POPUP --------------- //
														$popup['title'] = "¡ERROR!";
														$popup['text'] = "¡Lo sentimos no se inicio sesión. Intentalo nuevamente!";
														$popup['type'] = "error";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
												}
												else {
													// --------------- POPUP --------------- //
													$popup['title'] = "¡OOOOPS!";
													$popup['text'] = "¡Lo sentimos solo puedes inicar sesion en Google Chrome!";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header');
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											else {
												// --------------- POPUP --------------- //
												$popup['title'] = "¡LO SIENTO!";
												$popup['text'] = "¡No podemos iniciar sesión, favor de permitir acceder a tu ubicación!";
												$popup['type'] = "warning";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header');
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
										}
										else {
											// --------------- POPUP --------------- //
											$popup['title'] = "¡LO SIENTO!";
											$popup['text'] = "¡El usuario no existe.!";
											$popup['type'] = "error";
											$popup['ruta'] = "base";
											// --------------- VISTAS --------------- //
											$this -> load -> view('Principal/Header');
											$this -> load -> view('Popup/Popup', $popup);
											$this -> load -> view('Principal/Footer');
										}
									// }
									// else {
									// 	// --------------- POPUP --------------- //
									// 	$popup['title'] = "¡LO SIENTO!";
									// 	$popup['text'] = "¡El formato no es correcto, no se permiten caracteres especiales!";
									// 	$popup['type'] = "error";
									// 	$popup['ruta'] = "base";
									// 	// --------------- VISTAS --------------- //
									// 	$this -> load -> view('Principal/Header');
									// 	$this -> load -> view('Popup/Popup', $popup);
									// 	$this -> load -> view('Principal/Footer');
									// }
								}
								// la información no viene | redirigimos a la página principal
								else {
									redirect(base_url());
									exit();
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
								$this -> load -> view('Popup/Popup', $popup);
								$this -> load -> view('Principal/Footer');
							break;
						}
					}
					// el metodo no existe | mandamos alerta de error
					else {
						// --------------- POPUP --------------- //
						$popup['title'] = "¡OOOOPS!";
						$popup['text'] = "¡La página no se encuentra!";
						$popup['type'] = "error";
						$popup['ruta'] = "base";
						// --------------- VISTAS --------------- //
						$this -> load -> view('Principal/Header');
						$this -> load -> view('Popup/Popup', $popup);
						$this -> load -> view('Principal/Footer');
					}
				}
				// la sesion es error | mandamos a la página principal
				else {
					$this -> load -> view('Principal/Header');
					$this -> load -> view('Principal/Home');
					$this -> load -> view('Principal/Footer');
				}
			}
		}
	}
