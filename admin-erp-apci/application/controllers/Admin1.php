<?php
	if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
	class Admin extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this -> load -> helper('form');
			$this -> load -> library('session');
			// $this -> load -> library('GeneradordePDF', TRUE);
			// $this -> load -> library('ConvertirNumeroEnLetra', TRUE);
			// $this -> load -> library('ObtenerFechaActual', TRUE);
			// $this -> load -> library('ObtenerFechaFirmaContrato', TRUE);
			// $this -> load -> library('GenerarExpedientePDF', TRUE);
			// $this -> load -> library('GeneradordeCodigo', TRUE);
			// $this -> load -> library('SendCorreo', TRUE);
			$this -> load -> model('ModelERP');
			$this -> load -> helper('url');
		}
		public function _remap($method, $params = array()) {
			if (!method_exists($this, $method)) {
				$this -> index($method, $params);
			}
			else {
				return call_user_func_array(array($this,$method), $params);
			}
		}
		public function index($metodo = NULL, $url = NULL){
			// --------------- HEADER --------------- //
			// obtenemos el empleado para pintar de color el header
			$tabla = "empleado";
			$campo = "idEmp";
			$valor = $this -> session -> U_IdEmp;
			$header['empleado'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
			// --------------- MENU --------------- //
			// obtenemos al usuario para las variables de reinicio de sesión
			$tabla = "usuario";
			$campo = "idUsuario";
			$valor = $this -> session -> idSesion;
			$menu['usuario'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
			// obetenemos el puesto del empleado
			$tabla = "puesto";
			$campo = "idPuesto";
			$valor = $header['empleado'] -> E_idPuesto;
			$bandera['puesto'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
			// obetenemos el area del empleado
			$tabla = "area";
			$campo = "idArea";
			$valor = $bandera['puesto'] -> P_idArea;
			$bandera['area'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
			// obtenemos la empresa
			$tabla = "empresa";
			$campo = "idEmpresa";
			$valor = $bandera['area'] -> A_idEmpresa;
			$menu['empresaruta'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
			// --------------- HEADER --------------- //
			// ruta para las fotos y la url
			$header['ruta'] = 'tele-viales';
			// obtenemos los puestos para las vacantes | obtenemos las areas
			$tabla = "area";
			$campo = "A_idEmpresa";
			$valor = $this -> session -> TUSesion;
			$menu['area'] = $this -> ModelERP -> GetAllWhere($tabla, $campo, $valor);
			// obtenemos todas los puestos
			$tabla = "puesto";
			$campo = "P_idArea";
			$valor = $menu['area'];
			$posicion = "idArea";
			$menu['puesto'] = $this -> ModelERP -> GetAllWhereFor($tabla, $campo, $valor, $posicion);
			// obtenemos todos los empleados para los permisos
			$tabla = "empleado";
			$campo1 = "E_idPuesto";
			$valor1 = $menu['puesto'];
			$posicion = "idPuesto";
			$campo2 = "FBajaEmp";
			$valor2 = '0000-00-00';
			$campo3 = "MotivoBajaEmp";
			$valor3 = "";
			$menu['empleados'] = $this -> ModelERP -> GetAllWhereFor3Same($tabla, $campo1, $valor1, $posicion, $campo2, $valor2, $campo3, $valor3);
			$menu['empleado'] = $header['empleado'];
			// --------------- HOME --------------- //
			$tabla = "empresa";
			$home['empresas'] = $this -> ModelERP -> GetAll($tabla);
			// obtenemos las empresas para los menus
			$menu['empresamenu'] = $home['empresas'];
			// validamos las variables de sesion
			if (isset($this -> session -> validarSesion)){
				// si viene la variable de sesion | validamos que sea iguala a ok
				if ($this -> session -> validarSesion == "ok") {
					// el usuario es de recursos humanos
					if ($this -> session -> TUSesion == 12) {
						// validamos que venga información en la ruta
						if (isset($metodo)) {
							// obtenemos el puesto del empleado para pintar de color el header
							$tabla = "puesto";
							$campo = "idPuesto";
							$valor = $header['empleado'] -> E_idPuesto;
							$header['puesto'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
							// obtenemos el area del empleado para pintar de color el header
							$tabla = "area";
							$campo = "idArea";
							$valor = $header['puesto'] -> P_idArea;
							$header['area'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
							// obtenemos la empresa del empleado para pintar de color el header
							$tabla = "empresa";
							$campo = "idEmpresa";
							$valor = $header['area'] -> A_idEmpresa;
							$header['empresa'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
							// validamos que el metodo exista y que el usuario sea el correcto
							$tabla = "metodospermitidos";
							$campo1 = "CallRutaMetodo";
							$valor1 = $metodo;
							$campo2 = "M_idTipoUsuario";
							$valor2 = $this -> session -> TUSesion;
							$bandera = $this -> ModelERP -> GetRowWhere2Like($tabla, $campo1, $valor1, $campo2, $valor2);
							if ($bandera != "") {
								switch ($bandera -> CallRutaMetodo) {
									// --------------- CERRAMOS SESIÓN --------------- //
									case 'cerrar-sesion':
										// validamosm que venga la variable sesion
										if (isset($_SESSION['validarSesion'])) {
											// viene la variable de sesion | cerramos sesion del usuario
											session_destroy();
											// enviamos alerta de success
											// --------------- HEADER --------------- //
											// obtenemos el empleado
											$tabla = "empleado";
											$campo = "idEmp";
											$valor = $this -> session -> U_IdEmp;
											$header['empleado'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
											$header['ruta'] = "";
											// --------------- POPUP --------------- //
											$popup['title'] = "¡HASTA PRONTO!";
											$popup['text'] = "¡Has cerrado sesion!";
											$popup['type'] = "info";
											$popup['ruta'] = "base";
											// --------------- VISTAS --------------- //
											$this -> load -> view('Principal/Header', $header);
											$this -> load -> view('Popup/ViewPopup', $popup);
											$this -> load -> view('Principal/Footer');
										}
										// no viene la variable de sesion | dirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// --------------- VALIDAMOS EL TIEMPO DE LA SESIÓN --------------- //
									case 'validar-tiempo-de-la-sesion':
										// validamosm que venga la variable sesion
										if (isset($_SESSION['validarSesion'])) {
											// viene la variable de validar | validamos la variable de hora de sesion
											if (isset($_SESSION['HoraSesion'])) {
												// viene la variable de hora de sesion | obtenemos datos
												// hora de la sesión iniciada
												$horaSesion = $this -> session -> HoraSesion;
												// hora actual
												$horaActual = date("H:i:s");
												// calculamos el tiempo de sesión
												$tiempoSesion = strtotime($horaActual)-strtotime($horaSesion);
												// validamos que el tiempo de sesión es igual a 20 minutos
												// if ($tiempoSesion == 1800) {
												if ($tiempoSesion == 3600) {
													// la sesion es de 20 minutos | cerramos sesion del usuario
													// session_destroy();
													// enviamos alerta de success
													echo "true";
												}
												// la sesión es de otro tiempo
												else {
													echo "false";
												}
											}
											// No viene la variable de validar | dirigimos a la página principal
											else {
												echo "false";
												redirect(base_url());
												exit();
											}
										}
										// no viene la variable de sesion | dirigimos a la página principal
										else {
											echo "false";
											redirect(base_url());
											exit();
										}
									break;
									// --------------- REINICIAMOS LA SESIÓN --------------- //
									case 'reiniciar-sesion':
										// creamos variables de la sesion
										// variable para validar la sesion del usuario
										$this -> session -> validarSesion = "ok";
										// variable para id del usuario
										$this -> session -> idSesion = $menu['usuario'] -> idUsuario;
										// variable para id del empleado
										$this -> session -> U_IdEmp = $menu['usuario'] -> U_IdEmp;
										// variable para usuario del usuario
										$this -> session -> UserSesion = $menu['usuario'] -> Usuario;
										// variable para nombre del usuario
										$this -> session -> NameSesion = $menu['usuario'] -> Nombre;
										// variable para password del usuario
										$this -> session -> PassSesion = $menu['usuario'] -> Password;
										// variable para tipo de usuario del usuario
										$this -> session -> TUSesion = $menu['usuario'] -> U_idTipoUsuario;
										// variable de la hora de sesion
										$this -> session -> HoraSesion = date("H:i:s");
										redirect(base_url());
										exit();
									break;
									// --------------- ENVIAR DOCUMENTOS PARA LA BAJA --------------- //
									case 'enviar-documentos':
										print_r('hola'); die();
										// buscamos al empleado con el usuario
										$tabla = "empleado";
										$campo = "idEmp";
										$valor = $this -> session -> U_IdEmp;
										$empleado = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
										// validamos que el empleado tenga correo
										if ($empleado -> emailPass != "") {
											// el empleado si tiene email | enviamos email
											$data['email'] = $empleado -> CorreoElecEmp;
											$data['emailPass'] = $empleado -> emailPass;
											// validamos que vengan los datos del formulario
											$data['from'] = $this -> input -> post('from');
											$data['Cc'] = $this -> input -> post('Cc');
											$data['Cco'] = $this -> input -> post('Cco');
											$data['subject'] = $this -> input -> post('subject');
											$data['adjArchivos'] = $this -> input -> post('adjArchivos');
											$data['redactar'] = $this -> input -> post('redactar');
											$data['empresa'] = $empresa;
											// mandamos la el nombre del usuario para el correo
											$data['usuario'] = $this -> session -> NameSesion;
											$data['user'] = $this -> session -> UserSesion;
											if (isset($data['from'])) {
												// archivos enviados por correo
												$data['hoy'] = date('Y-m-d');
												$carpeta = 'Docs/Correo/'.$data['user'].'/'.$data['hoy'].'/'.$data['from'].'/'.$data['subject'];
												$data['adjArchivos'] = array();
												$totalfile = count($_FILES["adjArchivos"]['name']);
												if (!file_exists($carpeta)) {
													mkdir($carpeta, 0777, true);
												}
												$file = opendir($carpeta); //Abrimos el directorio de destino
												for ($i=0; $i <= $totalfile - 1; $i++) {
													if(!empty($_FILES['adjArchivos']['name'])) {
														move_uploaded_file($_FILES['adjArchivos']['tmp_name'][$i],"Docs/Correo/".$data['user']."/".$data['hoy']."/".$data['from'].'/'.$data['subject'].'/'.$_FILES['adjArchivos']['name'][$i]);
														$url_baja = $_FILES["adjArchivos"]['name'][$i];
														$data['adjArchivos'][] = $url_baja;
													}
												}
												closedir($file); //Cerramos el directorio de destino
												// insertamos el movimiento realizado
												$tabla = "movimientosusuario";
												$datamovimiento['M_idMov'] = 20;
												$datamovimiento['M_idUsuario'] = $this -> session -> idSesion;
												$datamovimiento['NumEmp'] = $data['from'];
												$this -> ModelERP -> Insert($tabla, $datamovimiento);
												// si viene información | mandamos email
												$bandera = $this -> sendcorreo -> send($data);
												// si se envió correo | enviamos alerta de success
												$popup['title'] = "¡LISTO!";
												$popup['text'] = "¡El correo se envió exitosamente!";
												$popup['type'] = "success";
												$popup['ruta'] = "ruta";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Admin/Menu', $menu);
												$this -> load -> view('Popup/ViewPopup', $popup);
												$this -> load -> view('Principal/ViewFooter');
											}
											// no viene información | mandamos alerta de error
											else {
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
												$popup['type'] = "error";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Admin/Menu', $menu);
												$this -> load -> view('Popup/ViewPopup', $popup);
												$this -> load -> view('Principal/ViewFooter');
											}
										}
										// el empleado no tiene permiso para enviar email | mandamos alerta de error
										else {
											$popup['title'] = "¡ERROR!";
											$popup['text'] = "Ponte en contacto con el administrador para que genere tus permisos para enviar email.";
											$popup['type'] = "error";
											$popup['ruta'] = "ruta";
											// --------------- VISTAS --------------- //
											$this -> load -> view('Principal/Header', $header);
											$this -> load -> view('Admin/Menu', $menu);
											$this -> load -> view('Popup/ViewPopup', $popup);
											$this -> load -> view('Principal/ViewFooter');
										}
									break;
									default:
										$popup['title'] = "¡ERROR!";
										$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
										$popup['type'] = "error";
										$popup['ruta'] = "base";
										// --------------- VISTAS --------------- //
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Popup/ViewPopup', $popup);
										$this -> load -> view('Principal/Footer');
									break;
								}
							}
							// el metodo no existe | mandamos alerta de error
							else {
								$popup['title'] = "¡ERROR!";
								$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
								$popup['type'] = "error";
								$popup['ruta'] = "base";
								// --------------- VISTAS --------------- //
								$this -> load -> view('Principal/Header', $header);
								$this -> load -> view('Popup/ViewPopup', $popup);
								$this -> load -> view('Principal/Footer');
							}
						}
						// no viene información | mandamos pagina principal dependiendo la sesión
						else {
							// --------------- MENU --------------- //
							// obtenemos las empresas para los menus
							$menu['empresamenu'] = $home['empresas'];
							// obtenemos el usuario
							$tabla = "usuario";
							$campo = "idUsuario";
							$valor = $this -> session -> idSesion;
							$menu['usuario'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
							// obetenemos el puesto del empleado
							$tabla = "puesto";
							$campo = "idPuesto";
							$valor = $header['empleado'] -> E_idPuesto;
							$bandera['puesto'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
							// obetenemos el area del empleado
							$tabla = "area";
							$campo = "idArea";
							$valor = $bandera['puesto'] -> P_idArea;
							$bandera['area'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
							// obtenemos la empresa
							$tabla = "empresa";
							$campo = "idEmpresa";
							$valor = $bandera['area'] -> A_idEmpresa;
							$menu['empresaruta'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
							// --------------- HEADER --------------- //
							// ruta para las fotos y la url
							$header['ruta'] = 'tele-viales';
							// obtenemos los puestos para las vacantes | obtenemos las areas
							$tabla = "area";
							$campo = "A_idEmpresa";
							$valor = $this -> session -> TUSesion;
							$menu['area'] = $this -> ModelERP -> GetAllWhere($tabla, $campo, $valor);
							// obtenemos todas los puestos
							$tabla = "puesto";
							$campo = "P_idArea";
							$valor = $menu['area'];
							$posicion = "idArea";
							$menu['puesto'] = $this -> ModelERP -> GetAllWhereFor($tabla, $campo, $valor, $posicion);
							// obtenemos todos los empleados para los permisos
							$tabla = "empleado";
							$campo1 = "E_idPuesto";
							$valor1 = $menu['puesto'];
							$posicion = "idPuesto";
							$campo2 = "FBajaEmp";
							$valor2 = '0000-00-00';
							$campo3 = "MotivoBajaEmp";
							$valor3 = "";
							$menu['empleados'] = $this -> ModelERP -> GetAllWhereFor3Same($tabla, $campo1, $valor1, $posicion, $campo2, $valor2, $campo3, $valor3);
							$menu['empleado'] = $header['empleado'];
							// echo "<pre>"; print_r($menu); echo "</pre>"; die();
							$this -> load -> view('Principal/Header', $header);
							$this -> load -> view('Admin/Menu', $menu);
							$this -> load -> view('Admin/Home', $home);
							$this -> load -> view('Principal/Footer');
						}
					}
					// el usuario es OTRO
					else {
						$popup['title'] = "¡ERROR!";
						$popup['text'] = "Lo sentimos, tu usuario no tiene permisos para ingresar a ésta área.";
						$popup['type'] = "error";
						$popup['ruta'] = "base";
						// --------------- VISTAS --------------- //
						$this -> load -> view('Principal/ViewHeader', $header);
						$this -> load -> view('Popup/ViewPopup', $popup);
						$this -> load -> view('Principal/ViewFooter');
					}
				}
				// no es igual a ok | mandamos a la página principal
				else {
						$this -> load -> view('Principal/Header', $header);
						$this -> load -> view('Home/ViewHome', $home);
						$this -> load -> view('Principal/Footer');
					}
			}
			// no viene la variable de sesion | validamos que venga información en a ruta
			else {
				if (isset($metodo)) {
					// validamos que el metodo exista y que el usuario sea el correcto
					$tabla = "metodospermitidos";
					$campo1 = "CallRutaMetodo";
					$valor1 = $metodo;
					$campo2 = "M_idTipoUsuario";
					$valor2 = $this -> session -> TUSesion;
					$bandera = $this -> ModelERP -> GetRowWhere2Like($tabla, $campo1, $valor1, $campo2, $valor2);
					if ($bandera != "") {
						switch ($bandera -> CallRutaMetodo) {
							case 'iniciar-sesion':
								// obtenemos usuario y contraseña
								$data['Usuario'] = $this -> input -> post('Usuario');
								$data['Password'] = $this -> input -> post('Password');
								// validamos que exista un valor
								if (isset($data['Usuario'])) {
									// existe valor | validamos que los formatos sean correctos
									if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $data['Usuario']) && preg_match('/^[a-zA-Z0-9]+$/', $data['Password'])){
										 // formatos correctos | obtenemos los demas valores para buscar usuario
										$data['Password'] = $this -> input -> post('Password');
										$data['Ubicacion'] = $this -> input -> post('ERPUbicacion');
										// validamos que acepte la ubicación
										if ($data['Ubicacion'] != "") {
											// la ubicación esta habilitada | validamos en la db que este registrado el usuario
											// mandamos la tabla
											$tabla = "usuario";
											// primer campo a validar
											$campo1 = "Usuario";
											// primer valor a comparar
											$valor1 = $data['Usuario'];
											// segundo campo a validar
											$campo2 = "Password";
											// segundo valor a comparar
											$valor2 = $data['Password'];
											// tercer campo a validar
											$campo3 = "Ubicacion";
											// tercer valor a comparar
											$valor3 = $data['Ubicacion'];
											// $resUsuario = $this -> ModelERP -> GetRowWhere3($tabla, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3);
											$resUsuario = $this -> ModelERP -> GetRowWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
											// validamos que exista el usuario
											if ($resUsuario) {
												// el usuario existe | creamos la sesion del usuario
												// mandamos la tabla
												$tabla = "sesionusuario";
												// mandamos valores
												$datasesion['S_idUsuario'] = $resUsuario -> idUsuario;
												$datasesion['Ubicacion'] = $this -> input -> post('ERPUbicacion');
												$datasesion['DireccionIP'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
												$resSesion = $this -> ModelERP -> Insert($tabla, $datasesion);
												// validamos que se inserto la sesion
												if ($resSesion == "true") {
													// creamos variables de la sesion
													// variable para validar la sesion del usuario
													$this -> session -> validarSesion = "ok";
													// variable para id del usuario
													$this -> session -> idSesion = $resUsuario -> idUsuario;
													// variable para id del empleado
													$this -> session -> U_IdEmp = $resUsuario -> U_IdEmp;
													// variable para usuario del usuario
													$this -> session -> UserSesion = $resUsuario -> Usuario;
													// variable para nombre del usuario
													$this -> session -> NameSesion = $resUsuario -> Nombre;
													// variable para password del usuario
													$this -> session -> PassSesion = $resUsuario -> Password;
													// variable para tipo de usuario del usuario
													$this -> session -> TUSesion = $resUsuario -> U_idTipoUsuario;
													// variable de la hora de sesion
													$this -> session -> HoraSesion = date("H:i:s");
													// mandamos alerta de sesión iniciada
													// --------------- HEADER --------------- //
													// obtenemos el empleado
													$tabla = "empleado";
													$campo = "idEmp";
													$valor = $this -> session -> U_IdEmp;
													$header['empleado'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
													// obtenemos el puesto del empleado para pintar de color el header
													$tabla = "puesto";
													$campo = "idPuesto";
													$valor = $header['empleado'] -> E_idPuesto;
													$header['puesto'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
													// obtenemos el area del empleado para pintar de color el header
													$tabla = "area";
													$campo = "idArea";
													$valor = $header['puesto'] -> P_idArea;
													$header['area'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
													// obtenemos la empresa del empleado para pintar de color el header
													$tabla = "empresa";
													$campo = "idEmpresa";
													$valor = $header['area'] -> A_idEmpresa;
													$header['empresa'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
													// ruta para la foto del empleado
													$header['ruta'] = 'rheo';
													$popup['title'] = "¡BIENVENIDO!";
													$popup['text'] = "¡Has iniciado sesion!";
													$popup['type'] = "success";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Popup/ViewPopup', $popup);
													$this -> load -> view('Principal/Footer');
												}
												// no se creo la sesion | mandamos alerta de inicio de sesión
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "No se pudo iniciar sesión. Intentalo más tarde.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Popup/ViewPopup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											// el usuario no existe | mandamos alerta de error
											else {
												// --------------- HEADER --------------- //
												// obtenemos el empleado
												$tabla = "empleado";
												$campo = "idEmp";
												$valor = $this -> session -> U_IdEmp;
												$header['empleado'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
												// --------------- POPUP --------------- //
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "El usuario o la contraseña no coinciden, intentalo de nuevo.";
												$popup['type'] = "error";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Popup/ViewPopup', $popup);
												$this -> load -> view('Principal/Footer');
											}
										}
										// la ubicación no esta habilitada | mandamos alerta de error
										else {
											// --------------- HEADER --------------- //
											// obtenemos el empleado
											$tabla = "empleado";
											$campo = "idEmp";
											$valor = $this -> session -> U_IdEmp;
											$header['empleado'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
											// --------------- POPUP --------------- //
											$popup['title'] = "¡ERROR!";
											$popup['text'] = "Para iniciar SESION debes de conceder permisos para acceder a tu UBICACIÓN.";
											$popup['type'] = "error";
											$popup['ruta'] = "base";
											// --------------- VISTAS --------------- //
											$this -> load -> view('Principal/Header', $header);
											$this -> load -> view('Popup/ViewPopup', $popup);
											$this -> load -> view('Principal/Footer');
										}
									}
									// formatos incorrectos | mandamos alerta de error
									else {
										// --------------- HEADER --------------- //
										// obtenemos el empleado
										$tabla = "empleado";
										$campo = "idEmp";
										$valor = $this -> session -> U_IdEmp;
										$header['empleado'] = $this -> ModelERP -> GetRowWhere($tabla, $campo, $valor);
										// --------------- POPUP --------------- //
										$popup['title'] = "¡ERROR!";
										$popup['text'] = "El usuario o la contraseña tienen caracteres especiales, intentalo nuevamente.";
										$popup['type'] = "error";
										$popup['ruta'] = "base";
										// --------------- VISTAS --------------- //
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Popup/ViewPopup', $popup);
										$this -> load -> view('Principal/Footer');
									}
								}
								// no existe valor | dirigimos a la página principal
								else {
									redirect(base_url());
									exit();
								}
							break;
							default:
								$popup['title'] = "¡ERROR!";
								$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
								$popup['type'] = "error";
								$popup['ruta'] = "base";
								// --------------- VISTAS --------------- //
								$this -> load -> view('Principal/Header', $header);
								$this -> load -> view('Popup/ViewPopup', $popup);
								$this -> load -> view('Principal/Footer');
							break;
						}
					}
					// el metodo no existe | mandamos alerta de error
					else {
						$popup['title'] = "¡ERROR!";
						$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
						$popup['type'] = "error";
						$popup['ruta'] = "base";
						// --------------- VISTAS --------------- //
						$this -> load -> view('Principal/Header', $header);
						$this -> load -> view('Popup/ViewPopup', $popup);
						$this -> load -> view('Principal/Footer');
					}
				}
				// no viene información | mandamos a la página principal
				else {
					$this -> load -> view('Principal/Header');
					// $this -> load -> view('Principal/Menu');
					$this -> load -> view('Principal/Home');
					$this -> load -> view('Principal/Footer');
				}
			}
		}
	}
