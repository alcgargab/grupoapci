<?php
	if (! defined('BASEPATH')) exit ('No direct script access allowed');
	class Supervisor extends CI_Controller {
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
		public function index($menu = NULL, $url = NULL){
			// validamos que vengan las variables de la sesion
			if (isset($this -> session -> validarSesion)) {
				// si vienen las variables de sesion | validamos que la variable de sesion sea ok
				if ($this -> session -> validarSesion == "ok") {
					// la sesion es ok | validamos el tipo de ususario
					if ($this -> session -> TUSesion == 3) {
						// la sesion es ok | validamos el tipo de ususario
						switch ($this -> session -> TUSesion) {
							// Tipo de usuario = Supervisor
							case 3:
								// validamos que venga el metodo
								if (isset($menu)) {
									// validamos que el metodo exista en la db
									$tabla = "metodo";
									$campo1 = "Ruta";
									$valor1 = $menu;
									$campo2 = "IdUsuario";
									$valor2 = $this -> session -> TUSesion;
									$metodo = $this -> Model -> GetRowWhere2Like($tabla, $campo1, $valor1, $campo2, $valor2);
									if ($metodo != "") {
										// la variable menu viene con información | validamos la información
										switch ($metodo -> Ruta) {
											// case 'ver-numeros-de-telefonicos':
											// 	// validamos la variable url
											// 	if (isset($url[0])) {
											// 		// la variable viene con informacion | validamos que información trae
											// 	}
											// 	// la variable viene vacia | mandamos a la página principal
											// 	else {
											// 		// obtenemos los ejecutivos teléfonicos | obtenemos los usuarios
											// 		$tabla = "usuario";
											// 		$data['usuario'] = $this -> Model -> GetAll($tabla);
											// 		// obtenemos los usuarios de tipo Ejecutivo Telefonico
											// 		$tabla = "usuario";
											// 		$campo = "U_CallTipoUsuario";
											// 		$valor = 1;
											// 		$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
											// 		// obtenemos los números teléfonicos
											// 		$tabla = "numerostelefonicos";
											// 		$campo = "Status";
											// 		$valor = 9;
											// 		$data['numerostelefonicos'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
											// 		$this -> load -> view('Principal/Header');
											// 		$this -> load -> view('Supervisor/Menu');
											// 		$this -> load -> view('Supervisor/SupervisorNT', $data);
											// 		$this -> load -> view('Principal/Footer');
											// 	}
											// break;

											// case 'asignar-numeros-de-telefonos':
											// 	$data['Ejecutivo'] = $this -> input -> post('Ejecutivo');
											// 	$data['cantidadNumeros'] = $this -> input -> post('cantidadNumeros');
											// 	// obtenemos los numeros de telefono disponibles
											// 	$tabla = "numerostelefonicos";
											// 	$campo = "Status";
											// 	$valor = 9;
											// 	$base = 0;
											// 	$tope = $data['cantidadNumeros'];
											// 	$phone = $this -> Model -> GetAllWhereLimit($tabla, $campo, $valor, $base, $tope);
											// 	// $phone = $this -> Model -> GetAllLimit($tabla, $base, $tope);
											// 	// asignar telefonos al ejecutivo
											// 	$tabla = "ejecutivotelefonos";
											// 	$insert['ET_IdU'] = $data['Ejecutivo'];
											// 	$asignar = $this -> Model -> InsertFor($tabla, $insert, $phone);
											// 	// validamos que se hayan asignado los numeros al ejecutivo
											// 	if($asignar == "ok"){
											// 		// si se asignaron correctamente | actualizamos el estatus de los telefonos
											// 		$tabla = "numerostelefonicos";
											// 		$camposet = "Status";
											// 		$valor = 10;
											// 		$campo = "IdNT";
											// 		$updatephone = $this -> Model -> updateFor($tabla, $camposet, $valor, $campo, $phone);
											// 		// validamos que se actualizaron los estatus
											// 		if ($updatephone == "ok") {
											// 			// si se actualizarón | mandamos alerta de success
											// 			// --------------- POPUP --------------- //
											// 			$popup['title'] = "LISTO!";
											// 			$popup['text'] = "¡Se asignarón los teléfonos correctamente. Comunicate con el Ejecutivo para dar a conocer las actualizaciones!";
											// 			$popup['type'] = "success";
											// 			$popup['ruta'] = "ruta";
											// 			// --------------- VISTAS --------------- //
											// 			$this -> load -> view('Principal/Header');
											// 			$this -> load -> view('Supervisor/Menu');
											// 			$this -> load -> view('Popup/Popup', $popup);
											// 			$this -> load -> view('Principal/Footer');
											// 		}
											// 		// no se actualizarón | mandamos alerta de error
											// 		else {
											// 			// --------------- POPUP --------------- //
											// 			$popup['title'] = "¡OOOOPS!";
											// 			$popup['text'] = "¡La página no se encuentra!";
											// 			$popup['type'] = "error";
											// 			$popup['ruta'] = "base";
											// 			// --------------- VISTAS --------------- //
											// 			$this -> load -> view('Principal/Header');
											// 			$this -> load -> view('Supervisor/Menu');
											// 			$this -> load -> view('Popup/Popup', $popup);
											// 			$this -> load -> view('Principal/Footer');
											// 		}
											// 	}
											// 	// no se asignaron teléfonos | mandamos alerta de error
											// 	else {
											// 		// --------------- POPUP --------------- //
											// 		$popup['title'] = "¡OOOOPS!";
											// 		$popup['text'] = "¡La página no se encuentra!";
											// 		$popup['type'] = "error";
											// 		$popup['ruta'] = "base";
											// 		// --------------- VISTAS --------------- //
											// 		$this -> load -> view('Principal/Header');
											// 		$this -> load -> view('Supervisor/Menu');
											// 		$this -> load -> view('Popup/Popup', $popup);
											// 		$this -> load -> view('Principal/Footer');
											// 	}
											// break;
											case 'historial-de-llamadas':
												$tabla = "historial";
												$campo = "H_IdT";
												$data['historial'] = $this -> Model -> GetAllGroup($tabla, $campo);
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header');
												$this -> load -> view('Supervisor/Menu');
												$this -> load -> view('Supervisor/Historial', $data);
												$this -> load -> view('Principal/Footer');
											break;
											case 'ver-historial':
												if (isset($url[0])) {
													// obtenemos el historial de la llamada
													$tabla = "historial";
													$campo = "H_IdT";
													$valor = $url[0];
													$data['numero'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
													// obtenemos los ejecutivos
													$tabla = "usuario";
													$campo = "U_CallTipoUsuario";
													$valor = 1;
													$data['ejecutivo'] = $this -> Model ->GetAllWhere($tabla, $campo, $valor);
													// obtenemos los status de las llamadas
													$tabla = "statusllamada";
													$data['status'] = $this -> Model ->GetAll($tabla);
													// echo "<pre>"; print_r($data); echo "</pre>"; die();
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header');
													// $this -> load -> view('Supervisor/Menu');
													$this -> load -> view('Supervisor/Historial de llamadas', $data);
													$this -> load -> view('Principal/Footer');
												}
											break;
											case 'ver-llamadas':
												// validamos la variable url
												if (isset($url[0])) {
													// la variable viene con informacion | validamos que información trae
													switch ($url[0]) {
														case 'buscar-por-ejecutivo':
															$CallUsuario = $this -> input -> post('Ejecutivo');
															// buscamos todas las llamadas que realizó el ejecutivo
															$tabla = "llamada";
															$campo = "CallUsuario";
															$valor = $CallUsuario;
															$data['llamada'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
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
															$this -> load -> view('Supervisor/Menu');
															$this -> load -> view('Supervisor/Home', $data);
															$this -> load -> view('Principal/Footer');
														break;
														case 'buscar-por-ejecutivo-y-fecha':
															$CallUsuario = $this -> input -> post('EjecutivoTF');
															$CallFRegistro = $this -> input -> post('EjecutivoTFe');
															// buscamos todas las llamadas que realizó el ejecutivo
															$tabla = "llamada";
															$campo1 = "CallUsuario";
															$valor1 = $CallUsuario;
															$campo2 = "CallFRegistro";
															$valor2 = $CallFRegistro;
															$data['llamada'] = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
															// obtenemos los usuarios
															$tabla = "usuario";
															$data['usuario'] = $this -> Model -> GetAll($tabla);
															// obtenemos los usuarios de tipo Ejecutivo Telefonico
															$tabla = "usuario";
															$campo = "U_CallTipoUsuario";
															$valor = 1;
															$data['usuarioE'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
															// obtenemos los paquetes
															$tabla = "paquete";
															$data['paquete'] = $this -> Model -> GetAll($tabla);
															// obtenemos los status de las llamadas
															$tabla = "statusllamada";
															$data['statusllamada'] = $this -> Model -> GetAll($tabla);
															$this -> load -> view('Principal/Header');
															$this -> load -> view('Supervisor/Menu');
															$this -> load -> view('Supervisor/Home', $data);
															$this -> load -> view('Principal/Footer');
														break;
														default:
															// --------------- POPUP --------------- //
															$popup['title'] = "¡OOOOPS!";
															$popup['text'] = "Hubo un Error, intentalo nuevamente.";
															$popup['type'] = "error";
															$popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('Principal/Header');
															$this -> load -> view('Popup/Popup', $popup);
															$this -> load -> view('Principal/Footer');
														break;
													}
												}
												// la variable viene vacia | mandamos a la página principal
												else {
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
													$this -> load -> view('Supervisor/Menu');
													$this -> load -> view('Supervisor/Llamada', $data);
													$this -> load -> view('Principal/Footer');
												}
											break;
											case 'ver-seguimiento-de-llamadas':
												// validamos la variable url
												if (isset($url[0])) {
													// la variable viene con informacion | validamos que información trae
													switch ($url[0]) {
														case 'buscar-por-ejecutivo':
															$CallUsuario = $this -> input -> post('Ejecutivo');
															// buscamos todas las llamadas que realizó el ejecutivo
															$tabla = "seguimiento";
															$campo = "CallUsuario";
															$valor = $CallUsuario;
															$data['seguimiento'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
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
															$this -> load -> view('Supervisor/Menu');
															$this -> load -> view('Supervisor/Seguimiento', $data);
															$this -> load -> view('Principal/Footer');
														break;
														case 'buscar-por-ejecutivo-y-fecha':
															$CallUsuario = $this -> input -> post('EjecutivoTF');
															$CallFSeguimiento = $this -> input -> post('EjecutivoTFe');
															// buscamos todas las llamadas que realizó el ejecutivo
															$tabla = "seguimiento";
															$campo1 = "CallUsuario";
															$valor1 = $CallUsuario;
															$campo2 = "CallFSeguimiento";
															$valor2 = $CallFSeguimiento;
															$data['seguimiento'] = $this -> Model -> GetAllLike2($tabla, $campo1, $valor1, $campo2, $valor2);
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
															$this -> load -> view('Supervisor/Menu');
															$this -> load -> view('Supervisor/Seguimiento', $data);
															$this -> load -> view('Principal/Footer');
														break;
														default:
															// --------------- POPUP --------------- //
															$popup['title'] = "¡OOOOPS!";
															$popup['text'] = "Hubo un Error, intentalo nuevamente.";
															$popup['type'] = "error";
															$popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('Principal/Header');
															$this -> load -> view('Popup/Popup', $popup);
															$this -> load -> view('Principal/Footer');
														break;
													}
												}
												// la variable viene vacia | mandamos a la página principal
												else {
													// obtenemos las llamadas
													$tabla = "seguimiento";
													$data['seguimiento'] = $this -> Model -> GetAll($tabla);
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
													$this -> load -> view('Supervisor/Menu');
													$this -> load -> view('Supervisor/Seguimiento', $data);
													$this -> load -> view('Principal/Footer');
												}
											break;
											case 'reportes':
												if (isset($url[0])) {
													switch ($url[0]) {
														case 'buscar-llamadas-por-anio':
															// validamos que exista información del status
															$data['status'] = $this -> input -> post('StatusLlamada');
															if (isset($data['status'])) {
																$data['Fecha'] = $this -> input -> post('Fecha');
																// el mes viene con información | buscamos las llamadas
																$count = "IdContador";
																$alias = "NumContador";
																$campo = "C_Id_U";
																$tabla = "contador";
																$groupfor = "C_Id_U";
																$campow = "FModificacion";
																$valor = $data['Fecha'];
																$campo2 = "C_Id_S";
																$valor2 = $data['status'];
																$data['groupby'] = $this -> Model -> GetAllWhereAndLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $campo2, $valor2, $groupfor);
																if ($data['groupby'] != "") {
																	$data['totalRegistros'] = count($data['groupby']);
																}else {
																	$data['totalRegistros'] = 0;
																}
																// obtenemos el total de ejecutivos
																$tabla = "usuario";
																$campo = "U_CallTipoUsuario";
																$valor = 1;
																$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																// obtenemos el status para enviar el titulo
																$tabla = "statusllamada";
																$campo = "IdStatus";
																$valor = $data['status'];
																$status = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
																$data['mensaje'] = "Lo sentimos en el año"." ".$data['Fecha']." "."no tuvimos"." ".$status -> CallStatus;
																$data['titulo'] = "Grafica de total de "." ".$status -> CallStatus." "."en el año"." ".$data['Fecha'];
																// obtenemos los status de las llamadas
																$tabla = "statusllamada";
																$data['status'] = $this -> Model -> GetAll($tabla);
																// mandamos el reporte
																$data['reporte'] = $url[0];
																// echo json_encode($data);
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Supervisor/Menu');
																$this -> load -> view('Supervisor/Reportes/Llamada', $data);
																$this -> load -> view('Principal/Footer');
															}
															else {
																// no existe información | buscamos todas las llamadas
																$data['Fecha'] = $this -> input -> post('CallAnio');
																// validamos que se haya ingresado el mes
																if (isset($data['Fecha'])) {
																	// el mes viene con información | buscamos las llamadas
																	$count = "IdContador";
																	$alias = "NumContador";
																	$campo = "C_Id_U";
																	$tabla = "contador";
																	$groupfor = "C_Id_U";
																	$campow = "FModificacion";
																	$valor = $data['Fecha'];
																	$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
																	if ($data['groupby'] != "") {
																		$data['totalRegistros'] = count($data['groupby']);
																	}else {
																		$data['totalRegistros'] = 0;
																	}
																	// obtenemos el total de ejecutivos
																	$tabla = "usuario";
																	$campo = "U_CallTipoUsuario";
																	$valor = 1;
																	$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																	$data['mensaje'] = "Lo sentimos en el año"." ".$data['Fecha']." "."no tuvimos llamadas";
																	$data['titulo'] = "Grafica de total de llamadas en el año"." ".$data['Fecha'];
																	// obtenemos los status de las llamadas
																	$tabla = "statusllamada";
																	$data['status'] = $this -> Model -> GetAll($tabla);
																	// mandamos el reporte
																	$data['reporte'] = $url[0];
																	$this -> load -> view('Principal/Header');
																	$this -> load -> view('Supervisor/Menu');
																	$this -> load -> view('Supervisor/Reportes/Llamada', $data);
																	$this -> load -> view('Principal/Footer');
																}
																// el mes viene vacio | redirigimos a la página principal
																else {
																	redirect(base_url());
																	exit();
																}
															}
														break;
														case 'buscar-llamadas-por-mes':
															// validamos que exista información del status
															$data['status'] = $this -> input -> post('StatusLlamada');
															if (isset($data['status'])) {
																$data['Fecha'] = $this -> input -> post('Fecha');
																// el mes viene con información | buscamos las llamadas
																$count = "IdContador";
																$alias = "NumContador";
																$campo = "C_Id_U";
																$tabla = "contador";
																$groupfor = "C_Id_U";
																$campow = "FModificacion";
																$valor = $data['Fecha'];
																$campo2 = "C_Id_S";
																$valor2 = $data['status'];
																$data['groupby'] = $this -> Model -> GetAllWhereAndLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $campo2, $valor2, $groupfor);
																if ($data['groupby'] != "") {
																	$data['totalRegistros'] = count($data['groupby']);
																}else {
																	$data['totalRegistros'] = 0;
																}
																// obtenemos el total de ejecutivos
																$tabla = "usuario";
																$campo = "U_CallTipoUsuario";
																$valor = 1;
																$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																// obtenemos el status para enviar el titulo
																$tabla = "statusllamada";
																$campo = "IdStatus";
																$valor = $data['status'];
																$status = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
																$data['mensaje'] = "Lo sentimos en el mes"." ".$data['Fecha']." "."no tuvimos"." ".$status -> CallStatus;
																$data['titulo'] = "Grafica de total de "." ".$status -> CallStatus." "."en el mes de "." ".$data['Fecha'];
																// obtenemos los status de las llamadas
																$tabla = "statusllamada";
																$data['status'] = $this -> Model -> GetAll($tabla);
																// mandamos el reporte
																$data['reporte'] = $url[0];
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Supervisor/Menu');
																$this -> load -> view('Supervisor/Reportes/Llamada', $data);
																$this -> load -> view('Principal/Footer');
															}
															else {
																// no existe información | mandamos la vista general
																$data['Fecha'] = $this -> input -> post('CallMes');
																// validamos que se haya ingresado el mes
																if (isset($data['Fecha'])) {
																	// el mes viene con información | buscamos las llamadas
																	$count = "IdContador";
																	$alias = "NumContador";
																	$campo = "C_Id_U";
																	$tabla = "contador";
																	$groupfor = "C_Id_U";
																	$campow = "FModificacion";
																	$valor = $data['Fecha'];
																	$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
																	if ($data['groupby'] != "") {
																		$data['totalRegistros'] = count($data['groupby']);
																	}else {
																		$data['totalRegistros'] = 0;
																	}
																	// obtenemos el total de ejecutivos
																	$tabla = "usuario";
																	$campo = "U_CallTipoUsuario";
																	$valor = 1;
																	$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																	$data['mensaje'] = "Lo sentimos en el mes"." ".$data['Fecha']." "."no tuvimos llamadas";
																	$data['titulo'] = "Grafica de total de llamadas en el mes de"." ".$data['Fecha'];
																	// obtenemos los status de las llamadas
																	$tabla = "statusllamada";
																	$data['status'] = $this -> Model -> GetAll($tabla);
																	// mandamos el reporte
																	$data['reporte'] = $url[0];
																	$this -> load -> view('Principal/Header');
																	$this -> load -> view('Supervisor/Menu');
																	$this -> load -> view('Supervisor/Reportes/Llamada', $data);
																	$this -> load -> view('Principal/Footer');
																}
																// el mes viene vacio | redirigimos a la página principal
																else {
																	redirect(base_url());
																	exit();
																}
															}
														break;
														case 'buscar-llamadas-por-dia':
															// validamos que exista información del status
															$data['status'] = $this -> input -> post('StatusLlamada');
															if (isset($data['status'])) {
																$data['Fecha'] = $this -> input -> post('Fecha');
																// el mes viene con información | buscamos las llamadas
																$count = "IdContador";
																$alias = "NumContador";
																$campo = "C_Id_U";
																$tabla = "contador";
																$groupfor = "C_Id_U";
																$campow = "FModificacion";
																$valor = $data['Fecha'];
																$campo2 = "C_Id_S";
																$valor2 = $data['status'];
																$data['groupby'] = $this -> Model -> GetAllWhereAndLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $campo2, $valor2, $groupfor);
																if ($data['groupby'] != "") {
																	$data['totalRegistros'] = count($data['groupby']);
																}else {
																	$data['totalRegistros'] = 0;
																}
																// obtenemos el total de ejecutivos
																$tabla = "usuario";
																$campo = "U_CallTipoUsuario";
																$valor = 1;
																$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																// obtenemos el status para enviar el titulo
																$tabla = "statusllamada";
																$campo = "IdStatus";
																$valor = $data['status'];
																$status = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
																$data['mensaje'] = "Lo sentimos en el día"." ".$data['Fecha']." "."no tuvimos"." ".$status -> CallStatus;
																$data['titulo'] = "Grafica de total de"." ".$status -> CallStatus." "."en el día"." ".$data['Fecha'];
																// obtenemos los status de las llamadas
																$tabla = "statusllamada";
																$data['status'] = $this -> Model -> GetAll($tabla);
																// mandamos el reporte
																$data['reporte'] = $url[0];
																// echo json_encode($data);
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Supervisor/Menu');
																$this -> load -> view('Supervisor/Reportes/Llamada', $data);
																$this -> load -> view('Principal/Footer');
															}
															else {
																// no existe información | mandamos la vista general
																$data['Fecha'] = $this -> input -> post('CallDia');
																// validamos que se haya ingresado el mes
																if (isset($data['Fecha'])) {
																	// el mes viene con información | buscamos las llamadas
																	$count = "IdContador";
																	$alias = "NumContador";
																	$campo = "C_Id_U";
																	$tabla = "contador";
																	$groupfor = "C_Id_U";
																	$campow = "FModificacion";
																	$valor = $data['Fecha'];
																	$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
																	if ($data['groupby'] != "") {
																		$data['totalRegistros'] = count($data['groupby']);
																	}else {
																		$data['totalRegistros'] = 0;
																	}
																	// obtenemos el total de ejecutivos
																	$tabla = "usuario";
																	$campo = "U_CallTipoUsuario";
																	$valor = 1;
																	$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																	$data['mensaje'] = "Lo sentimos en el día"." ".$data['Fecha']." "."no tuvimos llamadas";
																	$data['titulo'] = "Grafica de total de llamadas en el día"." ".$data['Fecha'];
																	// obtenemos los status de las llamadas
																	$tabla = "statusllamada";
																	$data['status'] = $this -> Model -> GetAll($tabla);
																	// mandamos el reporte
																	$data['reporte'] = $url[0];
																	$this -> load -> view('Principal/Header');
																	$this -> load -> view('Supervisor/Menu');
																	$this -> load -> view('Supervisor/Reportes/Llamada', $data);
																	$this -> load -> view('Principal/Footer');
																}
																// el mes viene vacio | redirigimos a la página principal
																else {
																	redirect(base_url());
																	exit();
																}
															}
														break;
														case 'buscar-todas-las-llamadas':
															// validamos que exista información del status
															$data['status'] = $this -> input -> post('StatusLlamada');
															if (isset($data['status'])) {
																// el mes viene con información | buscamos las llamadas
																$count = "IdContador";
																$alias = "NumContador";
																$campo = "C_Id_U";
																$tabla = "contador";
																$campow = "C_Id_S";
																$valor = $data['status'];
																$groupfor = "C_Id_U";
																$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
																if ($data['groupby'] != "") {
																	$data['totalRegistros'] = count($data['groupby']);
																}else {
																	$data['totalRegistros'] = 0;
																}
																// obtenemos el total de ejecutivos
																$tabla = "usuario";
																$campo = "U_CallTipoUsuario";
																$valor = 1;
																$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																// obtenemos el status para enviar el titulo
																$tabla = "statusllamada";
																$campo = "IdStatus";
																$valor = $data['status'];
																$status = $this -> Model -> GetRowWhere($tabla, $campo, $valor);
																$data['mensaje'] = "Lo sentimos aun no contamos con llamadas";
																$data['titulo'] = "Grafica de total de"." ".$status -> CallStatus;
																// obtenemos los status de las llamadas
																$tabla = "statusllamada";
																$data['status'] = $this -> Model -> GetAll($tabla);
																// mandamos el reporte
																$data['reporte'] = $url[0];
																// mandamos la fecha
																$data['Fecha'] = date('Y-m-d');
																// echo json_encode($data);
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Supervisor/Menu');
																$this -> load -> view('Supervisor/Reportes/Llamada', $data);
																$this -> load -> view('Principal/Footer');
															}
															else {
																// no existe información | buscamos todas las llamdas
																$count = "IdContador";
																$alias = "NumContador";
																$campo = "C_Id_U";
																$tabla = "contador";
																$groupfor = "C_Id_U";
																$data['groupby'] = $this -> Model -> GetAllGroupBy($count, $alias, $campo, $tabla, $groupfor);
																// obtenemos el total de ejecutivos
																$tabla = "usuario";
																$campo = "U_CallTipoUsuario";
																$valor = 1;
																$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																$data['mensaje'] = "aún";
																$data['titulo'] = "Grafica de total de llamadas";
																// obtenemos los status de las llamadas
																$tabla = "statusllamada";
																$data['status'] = $this -> Model -> GetAll($tabla);
																// mandamos el reporte
																$data['reporte'] = $url[0];
																// mandamos la fecha
																$data['Fecha'] = date('Y-m-d');
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Supervisor/Menu');
																$this -> load -> view('Supervisor/Reportes/Llamada', $data);
																$this -> load -> view('Principal/Footer');
															}
														break;
														case 'buscar-seguimientos-por-anio':
															$data['CallAnio'] = $this -> input -> post('CallAnio');
															// validamos que se haya ingresado el mes
															if (isset($data['CallAnio'])) {
																// el mes viene con información | buscamos las llamadas
																$count = "IdSeguimiento";
																$alias = "NumSeguimiento";
																$campo = "CallUsuario";
																$tabla = "seguimiento";
																$groupfor = "CallUsuario";
																$campow = "CallFRegistro";
																$valor = $data['CallAnio'];
																$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
																// obtenemos el total de ejecutivos
																$tabla = "usuario";
																$campo = "U_CallTipoUsuario";
																$valor = 1;
																$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																$data['mensaje'] = "Lo sentimos el año"." ".$data['CallAnio']." "."no tuvimos llamadas";
																$data['titulo'] = "Total de seguimientos en el año"." ".$data['CallAnio'];
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Supervisor/Menu');
																$this -> load -> view('Supervisor/Reportes/Seguimiento', $data);
																$this -> load -> view('Principal/Footer');
															}
															// el mes viene vacio | redirigimos a la página principal
															else {
																redirect(base_url());
																exit();
															}
														break;
														case 'buscar-seguimientos-por-mes':
															$data['CallMes'] = $this -> input -> post('CallMes');
															// validamos que se haya ingresado el mes
															if (isset($data['CallMes'])) {
																// el mes viene con información | buscamos las llamadas
																$count = "IdSeguimiento";
																$alias = "NumSeguimiento";
																$campo = "CallUsuario";
																$tabla = "seguimiento";
																$groupfor = "CallUsuario";
																$campow = "CallFRegistro";
																$valor = $data['CallMes'];
																$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
																// obtenemos el total de ejecutivos
																$tabla = "usuario";
																$campo = "U_CallTipoUsuario";
																$valor = 1;
																$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																$data['mensaje'] = "Lo sentimos el mes"." ".$data['CallMes']." "."no tuvimos llamadas";
																$data['titulo'] = "Total de seguimientos en el mes"." ".$data['CallMes'];
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Supervisor/Menu');
																$this -> load -> view('Supervisor/Reportes/Seguimiento', $data);
																$this -> load -> view('Principal/Footer');
															}
															// el mes viene vacio | redirigimos a la página principal
															else {
																redirect(base_url());
																exit();
															}
														break;
														case 'buscar-seguimientos-por-dia':
															$data['CallDia'] = $this -> input -> post('CallDia');
															// validamos que se haya ingresado el mes
															if (isset($data['CallDia'])) {
																// el mes viene con información | buscamos las llamadas
																$count = "IdSeguimiento";
																$alias = "NumSeguimiento";
																$campo = "CallUsuario";
																$tabla = "seguimiento";
																$groupfor = "CallUsuario";
																$campow = "CallFRegistro";
																$valor = $data['CallDia'];
																$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
																// obtenemos el total de ejecutivos
																$tabla = "usuario";
																$campo = "U_CallTipoUsuario";
																$valor = 1;
																$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
																$data['mensaje'] = "Lo sentimos el la fecha"." ".$data['CallDia']." "."no tuvimos llamadas";
																$data['titulo'] = "Total de seguimientos en el día"." ".$data['CallDia'];
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Supervisor/Menu');
																$this -> load -> view('Supervisor/Reportes/Seguimiento', $data);
																$this -> load -> view('Principal/Footer');
															}
															// el mes viene vacio | redirigimos a la página principal
															else {
																redirect(base_url());
																exit();
															}
														break;
														case 'buscar-todos-los-seguimientos':
															// el mes viene con información | buscamos las llamadas
															$count = "IdSeguimiento";
															$alias = "NumSeguimiento";
															$campo = "CallUsuario";
															$tabla = "seguimiento";
															$groupfor = "CallUsuario";
															$data['groupby'] = $this -> Model -> GetAllGroupBy($count, $alias, $campo, $tabla, $groupfor);
															// obtenemos el total de ejecutivos
															$tabla = "usuario";
															$campo = "U_CallTipoUsuario";
															$valor = 1;
															$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
															$data['mensaje'] = "Lo sentimos no contamos con seguimientos";
															$data['titulo'] = "Grafica del total de seguimientos";
															$this -> load -> view('Principal/Header');
															$this -> load -> view('Supervisor/Menu');
															$this -> load -> view('Supervisor/Reportes/Seguimiento', $data);
															$this -> load -> view('Principal/Footer');
														break;
														default:
															// --------------- POPUP --------------- //
															$popup['title'] = "¡OOOOPS!";
															$popup['text'] = "Hubo un Error, intentalo nuevamente.";
															$popup['type'] = "error";
															$popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('Principal/Header');
															$this -> load -> view('Popup/Popup', $popup);
															$this -> load -> view('Principal/Footer');
														break;
													}
												}
												else {
													$this -> load -> view('Principal/Header');
													$this -> load -> view('Supervisor/Menu');
													$this -> load -> view('Supervisor/Reporte');
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
