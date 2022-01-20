<?php
	if (! defined('BASEPATH')) exit ('No direct script access allowed');
	class Administrador extends CI_Controller {
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
					switch ($this -> session -> TUSesion) {
						// Tipo de usuario = Supervisor
						case 4:
							// validamos que venga la variable menu
							if (isset($menu)) {
								// la variable menu viene con información | validamos la información
								switch ($menu) {
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
													// obtenemos los paquetes
													$tabla = "paquete";
													$data['paquete'] = $this -> Model -> GetAll($tabla);
													// obtenemos los status de las llamadas
													$tabla = "statusllamada";
													$data['statusllamada'] = $this -> Model -> GetAll($tabla);
													$this -> load -> view('Principal/Header');
													$this -> load -> view('Administrador/Menu');
													$this -> load -> view('Administrador/Home', $data);
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
													$this -> load -> view('Administrador/Menu');
													$this -> load -> view('Administrador/Home', $data);
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
											// obtenemos los paquetes
											$tabla = "paquete";
											$data['paquete'] = $this -> Model -> GetAll($tabla);
											// obtenemos los status de las llamadas
											$tabla = "statusllamada";
											$data['statusllamada'] = $this -> Model -> GetAll($tabla);
											$this -> load -> view('Principal/Header');
											$this -> load -> view('Administrador/Menu');
											$this -> load -> view('Administrador/Home', $data);
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
													// obtenemos los paquetes
													$tabla = "paquete";
													$data['paquete'] = $this -> Model -> GetAll($tabla);
													// obtenemos los status de las llamadas
													$tabla = "statusllamada";
													$data['statusllamada'] = $this -> Model -> GetAll($tabla);
													$this -> load -> view('Principal/Header');
													$this -> load -> view('Administrador/Menu');
													$this -> load -> view('Administrador/Seguimiento', $data);
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
													// obtenemos los paquetes
													$tabla = "paquete";
													$data['paquete'] = $this -> Model -> GetAll($tabla);
													// obtenemos los status de las llamadas
													$tabla = "statusllamada";
													$data['statusllamada'] = $this -> Model -> GetAll($tabla);
													$this -> load -> view('Principal/Header');
													$this -> load -> view('Administrador/Menu');
													$this -> load -> view('Administrador/Seguimiento', $data);
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
											// obtenemos los paquetes
											$tabla = "paquete";
											$data['paquete'] = $this -> Model -> GetAll($tabla);
											// obtenemos los status de las llamadas
											$tabla = "statusllamada";
											$data['statusllamada'] = $this -> Model -> GetAll($tabla);
											$this -> load -> view('Principal/Header');
											$this -> load -> view('Administrador/Menu');
											$this -> load -> view('Administrador/Seguimiento', $data);
											$this -> load -> view('Principal/Footer');
										}
									break;
									case 'reportes':
										if (isset($url[0])) {
											switch ($url[0]) {
												case 'llamadas-buscar-por-anio':
													$data['CallAnio'] = $this -> input -> post('CallAnio');
													// validamos que se haya ingresado el mes
													if (isset($data['CallAnio'])) {
														// el mes viene con información | buscamos las llamadas
														$count = "IdLlamada";
														$alias = "NumLlamadas";
														$campo = "CallUsuario";
														$tabla = "llamada";
														$groupfor = "CallUsuario";
														$campow = "CallFRegistro";
														$valor = $data['CallAnio'];
														$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
														// obtenemos el total de ejecutivos
														$tabla = "usuario";
														$campo = "U_CallTipoUsuario";
														$valor = 1;
														$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
														$data['mensaje'] = "el año". " ". $this -> input -> post('CallAnio');
														$data['titulo'] = "Grafica de Llamadas por año";
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Administrador/Menu');
														$this -> load -> view('Administrador/Reportes/Llamada', $data);
														$this -> load -> view('Principal/Footer');
													}
													// el mes viene vacio | redirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												break;
												case 'llamadas-buscar-por-mes':
													$data['CallMes'] = $this -> input -> post('CallMes');
													// validamos que se haya ingresado el mes
													if (isset($data['CallMes'])) {
														// el mes viene con información | buscamos las llamadas
														$count = "IdLlamada";
														$alias = "NumLlamadas";
														$campo = "CallUsuario";
														$tabla = "llamada";
														$groupfor = "CallUsuario";
														$campow = "CallFRegistro";
														$valor = $data['CallMes'];
														$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
														// obtenemos el total de ejecutivos
														$tabla = "usuario";
														$campo = "U_CallTipoUsuario";
														$valor = 1;
														$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
														$data['mensaje'] = "la fecha". " ". $this -> input -> post('CallMes');
														$data['titulo'] = "Grafica de Llamadas por Mes";
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Administrador/Menu');
														$this -> load -> view('Administrador/Reportes/Llamada', $data);
														$this -> load -> view('Principal/Footer');
													}
													// el mes viene vacio | redirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												break;
												case 'llamadas-buscar-por-dia':
													$data['CallDia'] = $this -> input -> post('CallDia');
													// validamos que se haya ingresado el mes
													if (isset($data['CallDia'])) {
														// el mes viene con información | buscamos las llamadas
														$count = "IdLlamada";
														$alias = "NumLlamadas";
														$campo = "CallUsuario";
														$tabla = "llamada";
														$groupfor = "CallUsuario";
														$campow = "CallFRegistro";
														$valor = $data['CallDia'];
														$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
														// obtenemos el total de ejecutivos
														$tabla = "usuario";
														$campo = "U_CallTipoUsuario";
														$valor = 1;
														$data['ejecutivo'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
														$data['mensaje'] = "la fecha". " ". $this -> input -> post('CallDia');
														$data['titulo'] = "Grafica de Llamadas por día";
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Administrador/Menu');
														$this -> load -> view('Administrador/Reportes/Llamada', $data);
														$this -> load -> view('Principal/Footer');
													}
													// el mes viene vacio | redirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												break;
												case 'llamadas-buscar-todas':
													// buscamos todas las llamadas que realizó el ejecutivo
													$tabla = "contadorllamadas";
													$data['contador'] = $this -> Model -> GetAll($tabla);
													// obtenemos los usuarios de tipo Ejecutivo Telefonico
													$tabla = "usuario";
													$campo = "U_CallTipoUsuario";
													$valor = 1;
													$data['registro'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
													$data['titulo'] = "Grafica de Llamadas";
													$this -> load -> view('Principal/Header');
													$this -> load -> view('Administrador/Menu');
													$this -> load -> view('Administrador/Reportes/Reporte', $data);
													$this -> load -> view('Principal/Footer');
												break;
												case 'seguimientos-buscar-por-anio':
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
														$data['mensaje'] = "el año". " ". $this -> input -> post('CallAnio');
														$data['titulo'] = "Grafica de Seguimientos por Año";
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Administrador/Menu');
														$this -> load -> view('Administrador/Reportes/Seguimiento', $data);
														$this -> load -> view('Principal/Footer');
													}
													// el mes viene vacio | redirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												break;
												case 'seguimientos-buscar-por-mes':
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
														$data['mensaje'] = "la fecha". " ". $this -> input -> post('CallMes');
														$data['titulo'] = "Grafica de Seguimientos por Mes";
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Administrador/Menu');
														$this -> load -> view('Administrador/Reportes/Seguimiento', $data);
														$this -> load -> view('Principal/Footer');
													}
													// el mes viene vacio | redirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												break;
												case 'seguimientos-buscar-por-dia':
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
														$data['mensaje'] = "la fecha". " ". $this -> input -> post('CallDia');
														$data['titulo'] = "Grafica de Seguimientos por Día";
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Administrador/Menu');
														$this -> load -> view('Administrador/Reportes/Seguimiento', $data);
														$this -> load -> view('Principal/Footer');
													}
													// el mes viene vacio | redirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												break;
												case 'seguimientos-buscar-todas':
													// buscamos todas las llamadas que realizó el ejecutivo
													$tabla = "contadorseguimiento";
													$data['contador'] = $this -> Model -> GetAll($tabla);
													// obtenemos los usuarios de tipo Ejecutivo Telefonico
													$tabla = "usuario";
													$campo = "U_CallTipoUsuario";
													$valor = 1;
													$data['registro'] = $this -> Model -> GetAllWhere($tabla, $campo, $valor);
													$data['titulo'] = "Grafica de Seguimientos";
													$this -> load -> view('Principal/Header');
													$this -> load -> view('Administrador/Menu');
													$this -> load -> view('Administrador/Reportes/Reporte', $data);
													$this -> load -> view('Principal/Footer');
												break;
												case 'paquetes-buscar-por-anio':
													$data['CallAnio'] = $this -> input -> post('CallAnio');
													// validamos que se haya ingresado el mes
													if (isset($data['CallAnio'])) {
														// el mes viene con información | buscamos las llamadas
														$count = "IdLlamada";
														$alias = "NumPaquete";
														$campo = "CallPaquete";
														$tabla = "llamada";
														$groupfor = "CallPaquete";
														$campow = "CallFRegistro";
														$valor = $data['CallAnio'];
														$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
														// obtenemos el total de paquetes
														$tabla = "paquete";
														$data['paquete'] = $this -> Model -> GetAll($tabla);
														$data['mensaje'] = "el año". " ". $this -> input -> post('CallAnio');
														$data['titulo'] = "Grafica de Paquetes por Año";
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Administrador/Menu');
														$this -> load -> view('Administrador/Reportes/Paquete', $data);
														$this -> load -> view('Principal/Footer');
													}
													// el mes viene vacio | redirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												break;
												case 'paquetes-buscar-por-mes':
													$data['CallMes'] = $this -> input -> post('CallMes');
													// validamos que se haya ingresado el mes
													if (isset($data['CallMes'])) {
														// el mes viene con información | buscamos las llamadas
														$count = "IdLlamada";
														$alias = "NumPaquete";
														$campo = "CallPaquete";
														$tabla = "llamada";
														$groupfor = "CallPaquete";
														$campow = "CallFRegistro";
														$valor = $data['CallMes'];
														$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
														// obtenemos el total de paquetes
														$tabla = "paquete";
														$data['paquete'] = $this -> Model -> GetAll($tabla);
														$data['mensaje'] = "la fecha". " ". $this -> input -> post('CallMes');
														$data['titulo'] = "Grafica de Paquetes por Mes";
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Administrador/Menu');
														$this -> load -> view('Administrador/Reportes/Paquete', $data);
														$this -> load -> view('Principal/Footer');
													}
													// el mes viene vacio | redirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												break;
												case 'paquetes-buscar-por-dia':
													$data['CallDia'] = $this -> input -> post('CallDia');
													// validamos que se haya ingresado el mes
													if (isset($data['CallDia'])) {
														// el mes viene con información | buscamos las llamadas
														$count = "IdLlamada";
														$alias = "NumPaquete";
														$campo = "CallPaquete";
														$tabla = "llamada";
														$groupfor = "CallPaquete";
														$campow = "CallFRegistro";
														$valor = $data['CallDia'];
														$data['groupby'] = $this -> Model -> GetAllWhereLikeGroupBy($count, $alias, $campo, $tabla, $campow, $valor, $groupfor);
														// obtenemos el total de paquetes
														$tabla = "paquete";
														$data['paquete'] = $this -> Model -> GetAll($tabla);
														$data['mensaje'] = "la fecha". " ". $this -> input -> post('CallDia');
														$data['titulo'] = "Grafica de Paquetes por Día";
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Administrador/Menu');
														$this -> load -> view('Administrador/Reportes/Paquete', $data);
														$this -> load -> view('Principal/Footer');
													}
													// el mes viene vacio | redirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												break;
												case 'paquetes-buscar-todas':
													// buscamos todas las llamadas que realizó el ejecutivo
													$tabla = "contadorpaquetes";
													$data['contador'] = $this -> Model -> GetAll($tabla);
													// obtenemos los usuarios de tipo Ejecutivo Telefonico
													$tabla = "paquete";
													$data['registro'] = $this -> Model -> GetAll($tabla);
													$data['titulo'] = "Grafica de Paquetes";
													$this -> load -> view('Principal/Header');
													$this -> load -> view('Administrador/Menu');
													$this -> load -> view('Administrador/Reportes/Paquetes', $data);
													$this -> load -> view('Principal/Footer');
												break;
												case 'sesiones':
													if (isset($url[1])) {
														switch ($url[1]) {
															case 'buscar-por-empleado':
																$data['CallUsuario'] = $this -> input -> post('CallUsuario');
																if (isset($data['CallUsuario'])) {
																	$tabla = "usuario";
																	$data['usuario'] = $this -> Model -> GetAll($tabla);
																	$tabla1 = "sesion";
																	$alias1 = "tb1";
																	$tabla2 = "cierresesion";
																	$alias2 = "tb2";
																	$campo1 = "IdSesion";
																	$campo2 = "idCierre";
																	$campo3 = "CallUsuario";
																	$valor = $data['CallUsuario'];
																	$data['sesiones'] = $this -> Model -> GetAllInnerJoinAnd($tabla1, $alias1, $tabla2, $alias2, $campo1, $campo2, $campo3, $valor);
																	$this -> load -> view('Principal/Header');
																	$this -> load -> view('Administrador/Menu');
																	$this -> load -> view('Administrador/Reportes/Sesion', $data);
																	$this -> load -> view('Principal/Footer');
																}
																else {
																	redirect(base_url());
																	exit();
																}
															break;
															case 'buscar-por-empleado-y-dia':
																	$data['CallUsuario'] = $this -> input -> post('CallUsuarioF');
																	if (isset($data['CallUsuario'])) {
																		$data['CallFSesion'] = $this -> input -> post('CallFSesionF');
																		$tabla = "usuario";
																		$data['usuario'] = $this -> Model -> GetAll($tabla);
																		$tabla1 = "sesion";
																		$alias1 = "tb1";
																		$tabla2 = "cierresesion";
																		$alias2 = "tb2";
																		$campo1 = "IdSesion";
																		$campo2 = "idCierre";
																		$campo3 = "CallUsuario";
																		$campo4 = "CallFSesion";
																		$valor1 = $data['CallUsuario'];
																		$valor2 = $data['CallFSesion'];
																		$data['sesiones'] = $this -> Model -> GetAllInnerJoinAnd2($tabla1, $alias1, $tabla2, $alias2, $campo1, $campo2, $campo3, $campo4, $valor1, $valor2);
																		$this -> load -> view('Principal/Header');
																		$this -> load -> view('Administrador/Menu');
																		$this -> load -> view('Administrador/Reportes/Sesion', $data);
																		$this -> load -> view('Principal/Footer');
																	}
																	else {
																		redirect(base_url());
																		exit();
																	}
															break;
															case 'buscar-por-empleado-y-mes':
																	$data['CallUsuario'] = $this -> input -> post('CallUsuarioEF');
																	if (isset($data['CallUsuario'])) {
																		$data['CallFSesion'] = $this -> input -> post('CallFSesionM');
																		$tabla = "usuario";
																		$data['usuario'] = $this -> Model -> GetAll($tabla);
																		$tabla1 = "sesion";
																		$alias1 = "tb1";
																		$tabla2 = "cierresesion";
																		$alias2 = "tb2";
																		$campo1 = "IdSesion";
																		$campo2 = "idCierre";
																		$campo3 = "CallUsuario";
																		$campo4 = "CallFSesion";
																		$valor1 = $data['CallUsuario'];
																		$valor2 = $data['CallFSesion'];
																		$data['sesiones'] = $this -> Model -> GetAllInnerJoinAndLike($tabla1, $alias1, $tabla2, $alias2, $campo1, $campo2, $campo3, $campo4, $valor1, $valor2);
																		$this -> load -> view('Principal/Header');
																		$this -> load -> view('Administrador/Menu');
																		$this -> load -> view('Administrador/Reportes/Sesion', $data);
																		$this -> load -> view('Principal/Footer');
																	}
																	else {
																		redirect(base_url());
																		exit();
																	}
															break;
															default:
																// buscamos las sesiones
																$tabla = "usuario";
																$data['usuario'] = $this -> Model -> GetAll($tabla);
																$data['sesiones'] = $this -> Model -> GetAllInnerJoin();
																$this -> load -> view('Principal/Header');
																$this -> load -> view('Administrador/Menu');
																$this -> load -> view('Administrador/Reportes/Sesion', $data);
																$this -> load -> view('Principal/Footer');
															break;
														}
													}else {
														// buscamos las sesiones
														$tabla = "usuario";
														$data['usuario'] = $this -> Model -> GetAll($tabla);
														$data['sesiones'] = $this -> Model -> GetAllInnerJoin();
														$this -> load -> view('Principal/Header');
														$this -> load -> view('Administrador/Menu');
														$this -> load -> view('Administrador/Reportes/Sesion', $data);
														$this -> load -> view('Principal/Footer');
													}
												break;
												// case 'sesiones-buscar-por-anio':
												// break;
												// case 'sesiones-buscar-por-mes':
												// break;
												// case 'sesiones-buscar-por-dia':
												// break;
												// case 'sesiones-buscar-todas':
												// break;
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
											$this -> load -> view('Administrador/Menu');
											$this -> load -> view('Administrador/Reporte');
											$this -> load -> view('Principal/Footer');
										}
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
							// la variable menu viene vacia | redirigimos a la página principal
							else {
								redirect(base_url());
								exit();
							}
						break;
							// tipo de usuari no existe | mandamos alerta de error
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
