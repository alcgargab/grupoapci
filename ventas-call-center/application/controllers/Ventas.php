<?php
	if (! defined('BASEPATH')) exit ('No direct script access allowed');
	class Ventas extends CI_Controller {
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

		function index($method = NULL, $url = NULL){
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
									// la sesión se inserto correctamente | mandamos alerta de info
									session_destroy();
									// --------------- POPUP --------------- //
									$popup['title'] = "¡HASTA PRONTO!";
									$popup['text'] = "¡Has cerrado sesion!";
									$popup['type'] = "info";
									$popup['ruta'] = "base";
									// --------------- VISTAS --------------- //
									$this -> load -> view('Header');
									$this -> load -> view('Popup/Popup', $popup);
									$this -> load -> view('Footer');
								break;
								case 'ventas-del-dia-3':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 3;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-3':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 3;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-dia-4':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 4;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-4':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 4;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-dia-5':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 5;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-5':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 5;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-dia-6':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 6;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-6':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 6;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-dia-7':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 7;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-7':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 7;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-dia-8':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 8;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-8':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 8;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-dia-9':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 9;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-9':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 9;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-dia-10':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 10;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-10':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 10;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-dia-11':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 11;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-11':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 11;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-dia-12':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 12;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-12':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 12;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-dia-13':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 13;
									$campo2 = "Fecha";
									$valor2 = date('Y-m-d');
									$venta = $this -> Model -> GetAllWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								case 'ventas-del-mes-13':
									$tabla = "ventas";
									$campo1 = "V_IdU";
									$valor1 = 13;
									$campo2 = "Fecha";
									$valor2 = date('Y-m');
									$venta = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($venta != "") {
										echo count($venta);
									}
									else {
										echo 0;
									}
								break;
								default:
									// --------------- POPUP --------------- //
									$popup['title'] = "¡OOOOPS!";
									$popup['text'] = "¡La página no se encuentra!";
									$popup['type'] = "error";
									$popup['ruta'] = "base";
									// --------------- VISTAS --------------- //
									$this -> load -> view('Header');
									$this -> load -> view('Popup/Popup', $popup);
									$this -> load -> view('Footer');
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
							$this -> load -> view('Header');
							$this -> load -> view('Popup/Popup', $popup);
							$this -> load -> view('Footer');
						}
					}
					// metodo viene vacio | mandamos a la página principal
					else {
						// la sesion es ok | validamos el tipo de ususario
						switch ($this -> session -> TUSesion) {
							case 5:
								$tabla = "usuario";
								$campo = "U_CallTipoUsuario";
								$valor = 1;
								$data['user'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
								$count = "V_IdU";
								$alias1 = "tblnew";
								$campo1 = "V_IdTel";
								$campo2 = "V_IdU";
								$tabla = "ventas";
								$campow = "FRegistro";
								$valor = date('Y-m-d');
								$groupfor = "V_IdU";
								$data['venta'] = $this -> Model -> GetAllWhereGroupBy($count, $alias1, $campo1, $campo2, $tabla, $campow, $valor, $groupfor);
								$count = "V_IdU";
								$alias1 = "tblnew";
								$campo1 = "V_IdTel";
								$campo2 = "V_IdU";
								$tabla = "ventas";
								$campow = "FRegistro";
								$valor = date('Y-m-d');
								$groupfor = "V_IdU";
								$data['ventamensual'] = $this -> Model -> GetAllWhereGroupBy($count, $alias1, $campo1, $campo2, $tabla, $campow, $valor, $groupfor);
								$this -> load -> view('Header');
								$this -> load -> view('Ventas', $data);
								$this -> load -> view('Footer');
							break;
							// tipo de usuari no existe | mandamos alerta de error
							default:
								// --------------- POPUP --------------- //
								$popup['title'] = "¡OOOOPS!";
								$popup['text'] = "¡La página no se encuentra!";
								$popup['type'] = "error";
								$popup['ruta'] = "base";
								// --------------- VISTAS --------------- //
								$this -> load -> view('Header');
								$this -> load -> view('Popup/Popup', $popup);
								$this -> load -> view('Footer');
							break;
						}
					}
				}
				// la sesion es error | mandamos a la página principal
				else {
					$this -> load -> view('Header');
					$this -> load -> view('Home');
					$this -> load -> view('Footer');
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
											// la ubicación si fue aceptada | insertamos la sesion
											$tabla = "sesion";
											$data = $datas;
											$insert = $this -> Model -> Insert($tabla, $data);
											// validamos que la sesion se inserto correctamente
											if ($insert == "ok") {
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
												$this -> load -> view('Header');
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Footer');
											}
											// la sesion no fue creada | mandamos alerta de error
											else {
												// --------------- POPUP --------------- //
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "¡Lo sentimos no se inicio sesión. Intentalo nuevamente!";
												$popup['type'] = "error";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Header');
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Footer');
											}
										}
										else {
											// --------------- POPUP --------------- //
											$popup['title'] = "¡LO SIENTO!";
											$popup['text'] = "¡No podemos iniciar sesión, favor de permitir acceder a tu ubicación!";
											$popup['type'] = "warning";
											$popup['ruta'] = "base";
											// --------------- VISTAS --------------- //
											$this -> load -> view('Header');
											$this -> load -> view('Popup/Popup', $popup);
											$this -> load -> view('Footer');
										}
									}
									else {
										// --------------- POPUP --------------- //
										$popup['title'] = "¡LO SIENTO!";
										$popup['text'] = "¡El usuario no existe.!";
										$popup['type'] = "error";
										$popup['ruta'] = "base";
										// --------------- VISTAS --------------- //
										$this -> load -> view('Header');
										$this -> load -> view('Popup/Popup', $popup);
										$this -> load -> view('Footer');
									}
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
								$this -> load -> view('Header');
								$this -> load -> view('Popup/Popup', $popup);
								$this -> load -> view('Footer');
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
						$this -> load -> view('Header');
						$this -> load -> view('Popup/Popup', $popup);
						$this -> load -> view('Footer');
					}
				}
				// la sesion es error | mandamos a la página principal
				else {
					$this -> load -> view('Header');
					$this -> load -> view('Home');
					$this -> load -> view('Footer');
				}
			}
		}
	}
