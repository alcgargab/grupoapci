<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Finanzas extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this -> load -> library('GenerarExcel', TRUE);
		}
		public function _remap($method, $params = array()) {
			if (!method_exists($this, $method)) {
				$this -> index($method, $params);
			}
			else {
				return call_user_func_array(array($this,$method), $params);
			}
		}

		public function index($empresa = NULL, $url = NULL){
			// --------------- variables para tablas --------------- //
			$tbl_empleados = "empleados";
			$tbl_puestos = "puestos";
			$tbl_areas = "areas";
			$tbl_empresas = "empresas";
			$tbl_metodos_permitidos = "metodos_permitidos";
			$tbl_movimientos_usuarios = "movimientos_usuarios";
			$tbl_generos = "generos";
			$tbl_status_turnos = "status_turnos";
			$tbl_nomina_empleados = "nomina_empleados";
			$tbl_nomina_status_estados = "nomina_status_estados";
			$tbl_nomina_status_puestos = "nomina_status_puestos";
			$tbl_nomina_status_departamentos = "nomina_status_departamentos";
			$tbl_nomina_status_ubicaciones = "nomina_status_ubicaciones";
			$tbl_nomina_status_nominas = "nomina_status_nominas";
			$tbl_nomina_status_turnos = "nomina_status_turnos";
			$tbl_nomina_status_pagos = "nomina_status_pagos";
			$tbl_nomina_status_bancos = "nomina_status_bancos";
			$tbl_nomina_status_prestaciones = "nomina_status_prestaciones";
			// --------------- HEADER --------------- //
			// obtenemos el empleado
			$campo = "id_e";
			$valor = $this -> session -> empleado_u;
			$header['empleado'] = $this -> Main -> getRowWhere1($tbl_empleados, $campo, $valor);
			// ------ VALORES PARA PONER COLOR Y QUE APAREZCA EL NOMBRE EN EL HEADER ------ //
			// obetenemos el puesto del empleado
			$campo = "id_pue";
			$valor = $header['empleado'] -> puesto_e;
			$header['puesto'] = $this -> Main -> getRowWhere1($tbl_puestos, $campo, $valor);
			// obetenemos el area del empleado
			$campo = "id_a";
			$valor = $header['puesto'] -> area_pue;
			$header['area'] = $this -> Main -> getRowWhere1($tbl_areas, $campo, $valor);
			// obtenemos la empresa
			$campo = "id_em";
			$valor = $header['area'] -> empresa_a;
			$header['empresa'] = $this -> Main -> getRowWhere1($tbl_empresas, $campo, $valor);
			// ruta para la foto del empleado
			$header['ruta'] = $header['empresa'] -> ruta_em;
			// --------------- MENU --------------- //
			// obtenemos las empresas
			$menu['empresamenu'] = $this -> Main -> getAll($tbl_empresas);
			$menu['empleado'] = $header['empleado'];
			// --------------- HOME --------------- //
			// validamos las variables de sesion
			if (isset($this -> session -> validate_sesion)){
				// si viene la variable de sesion | validamos que sea iguala a ok
				if ($this -> session -> validate_sesion == "true") {
					// es igual a ok | validamos el tipo de sesion
					// el usuario es de Finanzas | validamos que la empresa exista en la db
					if ($this -> session -> TUSesion == 2) {
						$campo = "ruta_em";
						$valor = $empresa;
						$home['empresa'] = $this -> Main -> getRowWhere1($tbl_empresas, $campo, $valor);
						if ($home['empresa'] != "") {
							// la empresa si existe | validamos que el metodo exista
							$campo1 = "metodo_mp";
							$valor1 = $url[0];
							$campo2 = "usuario_mp";
							$valor2 = $this -> session -> TUSesion;
							$metodos = $this -> Main -> getRowWhere2Like($tbl_metodos_permitidos, $campo1, $valor1, $campo2, $valor2);
							// validamos que el metodo exista
							if ($metodos != "") {
								switch ($metodos -> metodo_mp) {
									// --------------- enviar correos --------------- //
									case 'send-files':
										// validamos si viene información en la url
										if (!isset($url[1])) {
											// buscamos al empleado con el usuario
											$campo = "id_e";
											$valor = $this -> session -> empleado_u;
											$empleado = $this -> Main -> getRowWhere1($tbl_empleados, $campo, $valor);
											// validamos que el empleado tenga correo
											if ($empleado -> email_password_e != "") {
												// el empleado si tiene email | enviamos email
												$data['email'] = $empleado -> email_e;
												$data['email_password_e'] = $empleado -> email_password_e;
												// validamos que vengan los datos del formulario
												$data['from'] = trim($this -> input -> post('from'));
												$data['Cc'] = trim($this -> input -> post('Cc'));
												$data['Cco'] = trim($this -> input -> post('Cco'));
												$data['subject'] = trim($this -> input -> post('subject'));
												$data['adjArchivos'] = trim($this -> input -> post('adjArchivos'));
												$data['redactar'] = trim($this -> input -> post('redactar'));
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
													//Abrimos el directorio de destino
													$file = opendir($carpeta);
													for ($i=0; $i <= $totalfile - 1; $i++) {
														if(!empty($_FILES['adjArchivos']['name'])) {
															move_uploaded_file($_FILES['adjArchivos']['tmp_name'][$i],"Docs/Correo/".$data['user']."/".$data['hoy']."/".$data['from'].'/'.$data['subject'].'/'.$_FILES['adjArchivos']['name'][$i]);
															$url_baja = $_FILES["adjArchivos"]['name'][$i];
															$data['adjArchivos'][] = $url_baja;
														}
													}
													//Cerramos el directorio de destino
													closedir($file);
													// insertamos el movimiento realizado
							 						$datamovimiento['movimiento_mu'] = 20;
							 						$datamovimiento['usuario_mu'] = $this -> session -> login;
							 						$datamovimiento['receptor_mu'] = $data['from'];
													$this -> Main -> insert($tbl_movimientos_usuarios, $datamovimiento);
													// si viene información | mandamos email
													$bandera = $this -> sendcorreo -> send($data);
													// si se envió correo | enviamos alerta de success
													$popup['title'] = "¡LISTO!";
													$popup['text'] = "¡El correo se envió exitosamente!";
													$popup['type'] = "success";
													$popup['ruta'] = "ruta";
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $header);
													$this -> load -> view('menu/Finanzas', $menu);
													$this -> load -> view('popup/popup', $popup);
													$this -> load -> view('main/Footer');
												}
												// no viene información | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
						 							$this -> load -> view('main/Header', $header);
						 							$this -> load -> view('menu/Finanzas', $menu);
						 							$this -> load -> view('popup/popup', $popup);
						 							$this -> load -> view('main/Footer');
												}
											}
											// el empleado no tiene permiso para enviar email | mandamos alerta de error
											else {
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "Ponte en contacto con el administrador para que genere tus permisos para enviar email.";
												$popup['type'] = "error";
												$popup['ruta'] = "ruta";
												// --------------- VISTAS --------------- //
												$this -> load -> view('main/Header', $header);
												$this -> load -> view('menu/Finanzas', $menu);
												$this -> load -> view('popup/popup', $popup);
												$this -> load -> view('main/Footer');
											}
										}
										// viene variable | redirigimos a la página principal
										else {
											$this -> load -> view('main/Header', $header);
 		 									$this -> load -> view('menu/Finanzas', $menu);
 		 									$this -> load -> view('bug/404');
 		 									$this -> load -> view('main/Footer');
										}
									break;
									// --------------- ver empleados --------------- //
									case 'view-employee':
										if (!isset($url[1])) {
											// la empresa si existe | obtenemos las areas
											$campo = "empresa_a";
											$valor = $home['empresa'] -> id_em;
											$home['area'] = $this -> Main -> getAllWhere1($tbl_areas, $campo, $valor);
											// obtenemos todas los puestos
											$campo = "area_pue";
											$valor = $home['area'];
											$posicion = "id_a";
											$home['puesto'] = $this -> Main -> getAllWhere1For($tbl_puestos, $campo, $valor, $posicion);
											// obtenemos todos los empleados
											$campo1 = "puesto_e";
											$valor1 = $home['puesto'];
											$posicion = "id_pue";
											$campo2 = "status_e";
											$valor2 = 1;
											$home['empleados'] = $this -> Main -> getAllWhere2For($tbl_empleados, $campo1, $valor1, $posicion, $campo2, $valor2);
											$home['totalEmp'] = count($home['empleados']);
											// obtenemos todos los generos
											$home['genero'] = $this -> Main -> getAll($tbl_generos);
											// obtenemos todos los turno
											$home['turno'] = $this -> Main -> getAll($tbl_status_turnos);
											// mandamos la ruta para que aparezca la foto del empleado
											$home['ruta'] = $empresa;
											$this -> load -> view('main/Header', $header);
											$this -> load -> view	('Menus/Finanzas', $menu);
											$this -> load -> view('Finanzas/Tablas/Lista_de_empleados', $home);
											$this -> load -> view('main/Footer');
										}
										// viene información | redirigimos a la página principal
										else {
											$this -> load -> view('main/Header', $header);
 		 									$this -> load -> view('menu/Finanzas', $menu);
 		 									$this -> load -> view('bug/404');
 		 									$this -> load -> view('main/Footer');
										}
									break;
									// --------------- ver perfil de un empleado --------------- //
									case 'view-an-employee-s-profile':
										// validamos si viene información en la url
										if (!isset($url[2])) {
											// validamos que el número de empleado venga con información
											if (isset($url[1])) {
												// el numero de empleado viene con información | validamos que el número de empleado exista en la DB
												$campo = "encrypt_numero_empleado_e";
												$valor = $url[1];
												$home['empleado'] = $this -> Main -> getRowWhere1($tbl_empleados, $campo, $valor);
												if ($home['empleado'] != NULL) {
													// buscamos el genero del empleado
													$campo = "id_g";
													$valor = $home['empleado'] -> sexo_e;
													$home['genero'] = $this -> Main -> getRowWhere1($tbl_generos, $campo, $valor);
													// buscamos el puesto del empleado
													$campo = "id_pue";
													$valor = $home['empleado'] -> puesto_e;
													$home['puesto'] = $this -> Main -> getRowWhere1($tbl_puestos, $campo, $valor);
													// buscamos el área del empleado
													$campo = "id_a";
													$valor = $home['puesto'] -> area_pue;
													$home['area'] = $this -> Main -> getRowWhere1($tbl_areas, $campo, $valor);
													// buscamos la empresa del empleado
													$campo = "id_em";
													$valor = $home['area'] -> empresa_a;
													$home['empresa'] = $this -> Main -> getRowWhere1($tbl_empresas, $campo, $valor);
													// buscamos el turno del empleado
													$campo = "idTEmp";
													$valor = $home['empleado'] -> tueno_e;
													$home['turno'] = $this -> Main -> getRowWhere1($tbl_status_turnos, $campo, $valor);
													// buscamos la información de nómina del empleado
													$campo = "empleado_ne";
													$valor = $home['empleado'] -> numero_empleado_e;
													$home['noempleado'] = $this -> Main -> getRowWhere1($tbl_nomina_empleados, $campo, $valor);
													// validamos que exista información de nómina
													if ($home['noempleado'] != "") {
														// si existe información | buscamos información de la nómina | buscamos el Código de estado de nacimiento
														$campo = "id_ne";
														$valor = $home['noempleado'] -> estado_ne;
														$home['noestados'] = $this -> Main -> getRowWhere1($tbl_nomina_status_estados, $campo, $valor);
														$home['noestados'] = $home['noestados'] -> Nombre;
														// buscamos el Código del puesto
														$campo = "IdNP";
														$valor = $home['noempleado'] -> puesto_ne;
														$home['nopuestos'] = $this -> Main -> getRowWhere1($tbl_nomina_status_puestos, $campo, $valor);
														$home['nopuestos'] = $home['nopuestos'] -> Nombre;
														// buscamos el Código del departamento
														$campo = "IdND";
														$valor = $home['noempleado'] -> nivel_ne;
														$home['nodepartamento'] = $this -> Main -> getRowWhere1($tbl_nomina_status_departamentos, $campo, $valor);
														$home['nodepartamento'] = $home['nodepartamento'] -> Nombre;
														// buscamos el Código de la ubicación
														$campo = "IdNU";
														$valor = $home['noempleado'] -> ubicacion_ne;
														$home['noubicaciones'] = $this -> Main -> getRowWhere1($tbl_nomina_status_ubicaciones, $campo, $valor);
														$home['noubicaciones'] = $home['noubicaciones'] -> Nombre;
														// buscamos el Código de tipo de nómina
														$campo = "IdNN";
														$valor = $home['noempleado'] -> tipo_ne;
														$home['nonomina'] = $this -> Main -> getRowWhere1($tbl_nomina_status_nominas, $campo, $valor);
														$home['nonomina'] = $home['nonomina'] -> Nombre;
														// buscamos el Código de turno
														$campo = "IdNT";
														$valor = $home['noempleado'] -> turno_ne;
														$home['noturnos'] = $this -> Main -> getRowWhere1($tbl_nomina_status_turnos, $campo, $valor);
														$home['noturnos'] = $home['noturnos'] -> Nombre;
														// buscamos la Forma en que se hace el pago
														$campo = "IdNPa";
														$valor = $home['noempleado'] -> forma_pago_ne;
														$home['nopago'] = $this -> Main -> getRowWhere1($tbl_nomina_status_pagos, $campo, $valor);
														$home['nopago'] = $home['nopago'] -> Nombre;
														// buscamos el banco
														$campo = "IdNB";
														$valor = $home['noempleado'] -> banco_ne;
														$home['nobancos'] = $this -> Main -> getRowWhere1($tbl_nomina_status_bancos, $campo, $valor);
														$home['nobancos'] = $home['nobancos'] -> Nombre;
														// buscamos el Código de prestaciones de ley
														$campo = "IdNPr";
														$valor = $home['noempleado'] -> prestaciones_ne;
														$home['noprestaciones'] = $this -> Main -> getRowWhere1($tbl_nomina_status_prestaciones, $campo, $valor);
														$home['noprestaciones'] = $home['noprestaciones'] -> Nombre;
														$home['empresa_ne'] = $home['noempleado'] -> empresa_ne;
														$home['patron_ne'] = $home['noempleado'] -> patron_ne;
														$home['paquete_ne'] = $home['noempleado'] -> paquete_ne;
														$home['variables_ne'] = $home['noempleado'] -> variables_ne;
														$home['salario_integro_ne'] = $home['noempleado'] -> salario_integro_ne;
														$home['codigo_ne'] = $home['noempleado'] -> codigo_ne;
													}
													else {
														// no existe información | mandamos campos vacios
														$home['noestados'] = "Sin Registro";
														$home['nopuestos'] = "Sin Registro";
														$home['nodepartamento'] = "Sin Registro";
														$home['noubicaciones'] = "Sin Registro";
														$home['nonomina'] = "Sin Registro";
														$home['noturnos'] = "Sin Registro";
														$home['nopago'] = "Sin Registro";
														$home['nobancos'] = "Sin Registro";
														$home['noprestaciones'] = "Sin Registro";
														$home['empresa_ne'] = "Sin Registro";
														$home['patron_ne'] = "Sin Registro";
														$home['paquete_ne'] = "Sin Registro";
														$home['variables_ne'] = "Sin Registro";
														$home['salario_integro_ne'] = "Sin Registro";
														$home['codigo_ne'] = "Sin Registro";
													}
													// mandamos la ruta para que aparezca la foto del empleado
													$home['ruta'] = $empresa;
													// el empleado si existe en la DB | mostramos información
													$this -> load -> view('main/Header', $header);
													$this -> load -> view('menu/Finanzas', $menu);
													$this -> load -> view('Finanzas/Tablas/Ver/Perfil_de_un_empleado', $home);
													$this -> load -> view('main/Footer');
												}
												// el empleado no existe | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
						 							$this -> load -> view('main/Header', $header);
						 							$this -> load -> view('menu/Finanzas', $menu);
						 							$this -> load -> view('popup/popup', $popup);
						 							$this -> load -> view('main/Footer');
												}
											}
											// el numero de empleado viene vacio | dirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// viene variable | redirigimos a la página principal
										else {
										  $this -> load -> view('main/Header', $header);
										  $this -> load -> view('menu/Finanzas', $menu);
										  $this -> load -> view('bug/404');
										  $this -> load -> view('main/Footer');
										}
									break;
									// --------------- vista para editar un empleado --------------- //
									case 'edit-employee-profile':
										// validamos si viene información en la url
										if (!isset($url[2])) {
											// validamos que el número de empleado venga con información
											if (isset($url[1])) {
												// buscamos al empleado
												$campo = "encrypt_numero_empleado_e";
												$valor = $url[1];
												$home['empleado'] = $this -> Main -> getRowWhere1($tbl_empleados, $campo, $valor);
												if ($home['empleado'] != NULL) {
													// obtenemos los generos
													$home['genero'] = $this -> Main -> getAll($tbl_generos);
													// buscamos el puesto del empleado
													$campo = "id_pue";
													$valor = $home['empleado'] -> puesto_e;
													$home['puesto'] = $this -> Main -> getRowWhere1($tbl_puestos, $campo, $valor);
													// obtenemos los turnos
													$home['turno'] = $this -> Main -> getAll($tbl_status_turnos);
													// obtenemos las empresas
													$home['empresamenu'] = $this -> Main -> getAll($tbl_empresas);
													// buscamos la información de nómina del empleado
													$campo = "empleado_ne";
													$valor = $home['empleado'] -> numero_empleado_e;
													$home['noempleado'] = $this -> Main -> getRowWhere1($tbl_nomina_empleados, $campo, $valor);
													// obtenemos los codigos de estado
													$home['noestados'] = $this -> Main -> getAll($tbl_nomina_status_estados);
													// obtenemos los codigos de los puestos
													$home['nopuestos'] = $this -> Main -> getAll($tbl_nomina_status_puestos);
													// obtenemos los codigos de los departamentos
													$home['nodepartamento'] = $this -> Main -> getAll($tbl_nomina_status_departamentos);
													// obtenemos los codigos de las ubicaciones
													$home['noubicaciones'] = $this -> Main -> getAll($tbl_nomina_status_ubicaciones);
													// obtenemos los codigos de las nóminas
													$home['nonomina'] = $this -> Main -> getAll($tbl_nomina_status_nominas);
													// obtenemos los codigos de las turnos
													$home['noturnos'] = $this -> Main -> getAll($tbl_nomina_status_turnos);
													// obtenemos los codigos de los pagos
													$home['nopago'] = $this -> Main -> getAll($tbl_nomina_status_pagos);
													// obtenemos los codigos de los bancos
													$home['nobancos'] = $this -> Main -> getAll($tbl_nomina_status_bancos);
													// obtenemos los codigos de los bancos
													$home['noprestaciones'] = $this -> Main -> getAll($tbl_nomina_status_prestaciones);
													// mandamos la ruta para que aparezca la foto del empleado
													$home['ruta'] = $empresa;
													$this -> load -> view('main/Header', $header);
													$this -> load -> view('menu/Finanzas', $menu);
													$this -> load -> view('Finanzas/Tablas/Editar/Perfil_de_un_empleado', $home);
													$this -> load -> view('main/Footer');
												}
												// el empleado no existe | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
						 							$this -> load -> view('main/Header', $header);
						 							$this -> load -> view('menu/Finanzas', $menu);
						 							$this -> load -> view('popup/popup', $popup);
						 							$this -> load -> view('main/Footer');
												}
											}
											// el numero de empleado viene vacio | dirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// viene variable | redirigimos a la página principal
										else {
										  $this -> load -> view('main/Header', $header);
										  $this -> load -> view('menu/Finanzas', $menu);
										  $this -> load -> view('bug/404');
										  $this -> load -> view('main/Footer');
										}
									break;
									// --------------- editar información de la empresa --------------- //
									case 'edit-job-information-of-an-employee':
										// validamos si viene información en la url
										if (!isset($url[2])) {
											// validamos que el número de empleado venga con información
											if (isset($url[1])) {
												// el numero de empleado viene con información | validamos que el número de empleado exista en la DB
												$campo = "encrypt_numero_empleado_e";
												$valor = $url[1];
												$respuesta['empleado'] = $this -> Main -> getRowWhere1($tbl_empleados, $campo, $valor);
												if ($respuesta['empleado'] != NULL) {
													// el empleado si existe en la DB | validamo que venga el Número de cuenta del empleado
													$NumCuenta = trim($this -> input -> post('NumCuentaEmp'));
													if ($NumCuenta != "") {
														// viene apellido | obtenemos datos
														$data['numero_cuenta_e'] = trim($this -> input -> post('NumCuentaEmp'));
														$data['encrypt_numero_empleado_e'] = trim(md5($this -> input -> post('numero_empleado_e')));
														$datam['receptor_mu'] = trim($this -> input -> post('numero_empleado_e'));
														$data['salario_mensual_neto_e'] = trim($this -> input -> post('SalMenNEmp'));
														$data['otros_ingresos_e'] = trim($this -> input -> post('OtrIngEmp'));
														$data['salario_diario_e'] = trim($this -> input -> post('SalDEmp'));
														$data['salario_base_cotizacion_e'] = trim($this -> input -> post('SalBaCEmp'));
														// validamos que el formato de los valores sea el correcto
														if (preg_match('/^[0-9]+$/', $data['numero_cuenta_e']) &&
																preg_match('/^[0-9]+$/', $data['salario_mensual_neto_e']) &&
																preg_match('/^[0-9]+$/', $data['otros_ingresos_e']) &&
																preg_match('/^[0-9]+$/', $data['salario_diario_e']) &&
																preg_match('/^[0-9]+$/', $data['salario_base_cotizacion_e'])){
															// formato valido | editamos los nuevos valores
															$campo = "encrypt_numero_empleado_e";
															$valor = $data['encrypt_numero_empleado_e'];
															$registro = $data;
															$update = $this -> Main -> updateWhere1($tbl_empleados, $campo, $valor, $registro);
															// insertamos el movimiento realizado
							  							$datamovimiento['movimiento_mu'] = 4;
							  							$datamovimiento['usuario_mu'] = $this -> session -> login;
							  							$datamovimiento['receptor_mu'] = $datam['receptor_mu'];
							  							$this -> Main -> insert($tbl_movimientos_usuarios, $datamovimiento);
															// validamo que se haya echo la actualización
															if ($update == "true") {
																// la actualización se realizó correctamente | mandamos alerta de success
																$popup['title'] = "¡LISTO!";
																$popup['text'] = "¡El registro se actualizó correctamente!";
																$popup['type'] = "success";
																$popup['ruta'] = "ruta";
																// --------------- VISTAS --------------- //
																$this -> load -> view('main/Header', $header);
																$this -> load -> view('menu/Finanzas', $menu);
																$this -> load -> view('popup/popup', $popup);
																$this -> load -> view('main/Footer');
															}
															// la actualización no se realizó | mandamos alerta de error
															else {
																$popup['title'] = "¡ERROR!";
																$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																$popup['type'] = "error";
																$popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
									 							$this -> load -> view('main/Header', $header);
									 							$this -> load -> view('menu/Finanzas', $menu);
									 							$this -> load -> view('popup/popup', $popup);
									 							$this -> load -> view('main/Footer');
															}
														}
														// formato no valido | mandamos alerta de error
														else {
															$popup['title'] = "¡ERROR!";
															$popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos, intentalo nuevamente.";
															$popup['type'] = "error";
															$popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $header);
															$this -> load -> view('menu/Finanzas', $menu);
															$this -> load -> view('popup/popup', $popup);
															$this -> load -> view('main/Footer');
														}
													}
													// no viene apellido | dirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												}
												// el empleado no existe | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
						 							$this -> load -> view('main/Header', $header);
						 							$this -> load -> view('menu/Finanzas', $menu);
						 							$this -> load -> view('popup/popup', $popup);
						 							$this -> load -> view('main/Footer');
												}
											}
											// el numero de empleado viene vacio | dirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// viene variable | redirigimos a la página principal
										else {
										  $this -> load -> view('main/Header', $header);
										  $this -> load -> view('menu/Finanzas', $menu);
										  $this -> load -> view('bug/404');
										  $this -> load -> view('main/Footer');
										}
									break;
									// --------------- importar a nómina --------------- //
									case 'import-payroll':
										// validamos si viene información en la url
										if (!isset($url[1])) {
											// la empresa si existe | obtenemos las areas
											$campo = "empresa_a";
											$valor = $home['empresa'] -> id_em;
											$home['area'] = $this -> Main -> getAllWhere1($tbl_areas, $campo, $valor);
											// obtenemos todas los puestos
											$campo = "area_pue";
											$valor = $home['area'];
											$posicion = "id_a";
											$home['puesto'] = $this -> Main -> getAllWhere1For($tbl_puestos, $campo, $valor, $posicion);
											// obtenemos todos los empleados
											$campo1 = "puesto_e";
											$valor1 = $home['puesto'];
											$posicion = "id_pue";
											$campo2 = "status_e";
											$valor2 = 1;
											$home['empleados'] = $this -> Main -> getAllWhere2For($tbl_empleados, $campo1, $valor1, $posicion, $campo2, $valor2);
											$home['totalEmp'] = count($home['empleados']);
											// obtenemos todos los generos
											$home['genero'] = $this -> Main -> getAll($tbl_generos);
											// obtenemos todos los turno
											$home['turno'] = $this -> Main -> getAll($tbl_status_turnos);
											// mandamos la ruta para que aparezca la foto del empleado
											$home['ruta'] = $empresa;
											$this -> load -> view('main/Header', $header);
											$this -> load -> view('menu/Finanzas', $menu);
											$this -> load -> view('Finanzas/Tablas/Nomina/Nomina_de_un_empleado', $home);
											$this -> load -> view('main/Footer');
										}
										// viene variable | redirigimos a la página principal
										else {
										  $this -> load -> view('main/Header', $header);
										  $this -> load -> view('menu/Finanzas', $menu);
										  $this -> load -> view('bug/404');
										  $this -> load -> view('main/Footer');
										}
									break;
									// --------------- editar información para la nómina --------------- //
									case 'edit-payroll':
										// validamos si viene información en la url
										if (!isset($url[2])) {
											// validamos que el número del empleado venga con información
											if (isset($url[1])) {
												// el numero de empleado viene con información | validamos que el número de empleado exista en la DB
												$campo = "encrypt_numero_empleado_e";
												$valor = $url[1];
												$home['empleado'] = $this -> Main -> getRowWhere1($tbl_empleados, $campo, $valor);
												if ($home['empleado'] != "") {
													// obtenemos la información de la nómina
													$nomina['empleado_ne'] = trim($this -> input -> post('N_IdE'));
													$nomina['estado_ne'] = trim($this -> input -> post('NacEstadoCodigo'));
													$nomina['empresa_ne'] = trim($this -> input -> post('EmpresaCodigo'));
													$nomina['patron_ne'] = trim($this -> input -> post('RegPatronCodigo'));
													$nomina['puesto_ne'] = trim($this -> input -> post('PuestoCodigo'));
													$nomina['nivel_ne'] = trim($this -> input -> post('Nivel1Codigo'));
													$nomina['ubicacion_ne'] = trim($this -> input -> post('UbicacionCodigo'));
													$nomina['tipo_ne'] = trim($this -> input -> post('TipoNominaCodigo'));
													$nomina['turno_ne'] = trim($this -> input -> post('TurnoCodigo'));
													$nomina['paquete_ne'] = trim($this -> input -> post('PaqueteCodigo'));
													$nomina['variables_ne'] = trim($this -> input -> post('SalPerVar'));
													$nomina['salario_integro_ne'] = trim($this -> input -> post('SalInt'));
													$nomina['forma_pago_ne'] = trim($this -> input -> post('EmpPago'));
													$nomina['banco_ne'] = trim($this -> input -> post('BancoID'));
													$nomina['prestaciones_ne'] = trim($this -> input -> post('PrestaLeyCodigo'));
													$nomina['codigo_ne'] = trim($this -> input -> post('EmpCheca'));
													// validamos si viene información del fomulario
													if ($nomina['empleado_ne'] != "") {
														// si viene información | buscamos si el empleado ya existe en la nómina
														$campo = "empleado_ne";
														$valor = $nomina['empleado_ne'];
														$empleado = $this -> Main -> getRowWhere1($tbl_nomina_empleados, $campo, $valor);
														// validamos si existe registro
														if ($empleado != "") {
															// insertamos el movimiento realizado
															$datamovimiento['movimiento_mu'] = 26;
															$datamovimiento['usuario_mu'] = $this -> session -> login;
															$datamovimiento['receptor_mu'] = $home['empleado'] -> numero_empleado_e;
															$this -> Main -> insert($tbl_movimientos_usuarios, $datamovimiento);
															// el empleado existe | actualizamos registro
															$campo = "empleado_ne";
															$valor = $nomina['empleado_ne'];
															$registro = $nomina;
															$bandera = $this -> Main -> updateWhere1($tbl_nomina_empleados, $campo, $valor, $registro);
														}
														else {
															// insertamos el movimiento realizado
															$datamovimiento['movimiento_mu'] = 25;
															$datamovimiento['usuario_mu'] = $this -> session -> login;
															$datamovimiento['receptor_mu'] = $home['empleado'] -> numero_empleado_e;
															$this -> Main -> insert($tbl_movimientos_usuarios, $datamovimiento);
															// el empleado no existe | insertamos
															$data = $nomina;
															$bandera = $this -> Main -> insert($tbl_nomina_empleados, $data);
														}
														// validamos que se inserto correctamente
														if ($bandera == "true") {
															// se inserto correctamente | mandamos alerta de success
															$popup['title'] = "¡LISTO!";
															$popup['text'] = "¡El registro se actualizó correctamente!";
															$popup['type'] = "success";
															$popup['ruta'] = "ruta";
															// --------------- VISTAS --------------- //
															$this -> load -> view('main/Header', $header);
															$this -> load -> view('menu/Finanzas', $menu);
															$this -> load -> view('popup/popup', $popup);
															$this -> load -> view('main/Footer');
														}
														// no se inserto | mandamor alerta de error
														else {
															$popup['title'] = "¡ERROR!";
															$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
															$popup['type'] = "error";
															$popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
								 							$this -> load -> view('main/Header', $header);
								 							$this -> load -> view('menu/Finanzas', $menu);
								 							$this -> load -> view('popup/popup', $popup);
								 							$this -> load -> view('main/Footer');
														}
													}
													// no viene información | redirigimos a la página principal
													else {
														redirect(base_url());
														exit();
													}
												}
												// el empleado no existe | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
						 							$this -> load -> view('main/Header', $header);
						 							$this -> load -> view('menu/Finanzas', $menu);
						 							$this -> load -> view('popup/popup', $popup);
						 							$this -> load -> view('main/Footer');
												}
											}
											// el numero de empleado viene vacio | dirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// viene variable | redirigimos a la página principal
										else {
										  $this -> load -> view('main/Header', $header);
										  $this -> load -> view('menu/Finanzas', $menu);
										  $this -> load -> view('bug/404');
										  $this -> load -> view('main/Footer');
										}
									break;
									// --------------- descargar archivo CSSV de la nómina --------------- //
									case 'add-payroll':
										// validamos si viene información en la url
										if (!isset($url[2])) {
											// el numero de empleado viene con información | buscamos al empleado
											$campo = "encrypt_numero_empleado_e";
											$valor = $url[1];
											$home['empleado'] = $this -> Main -> getRowWhere1($tbl_empleados, $campo, $valor);
											// validamos que el número de empleado exista en la DB
											if ($home['empleado'] != NULL) {
												// el empleado existe | validamos si existe un registro de nómina
												$campo = "empleado_ne";
												$valor = $home['empleado'] -> numero_empleado_e;
												$home['empleadonomina'] = $this -> Main -> getRowWhere1($tbl_nomina_empleados, $campo, $valor);
												if ($home['empleadonomina'] != "") {
													// el empleado si tiene nómina | creamos el excel | buscamos el Código de estado de nacimiento
													$campo = "id_ne";
													$valor = $home['empleadonomina'] -> estado_ne;
													$home['noestados'] = $this -> Main -> getRowWhere1($tbl_nomina_status_estados, $campo, $valor);
													// buscamos el Código del puesto
													$campo = "IdNP";
													$valor = $home['empleadonomina'] -> puesto_ne;
													$home['nopuestos'] = $this -> Main -> getRowWhere1($tbl_nomina_status_puestos, $campo, $valor);
													// buscamos el Código del departamento
													$campo = "IdND";
													$valor = $home['empleadonomina'] -> nivel_ne;
													$home['nodepartamento'] = $this -> Main -> getRowWhere1($tbl_nomina_status_departamentos, $campo, $valor);
													// buscamos el Código de la ubicación
													$campo = "IdNU";
													$valor = $home['empleadonomina'] -> ubicacion_ne;
													$home['noubicaciones'] = $this -> Main -> getRowWhere1($tbl_nomina_status_ubicaciones, $campo, $valor);
													// buscamos el Código de tipo de nómina
													$campo = "IdNN";
													$valor = $home['empleadonomina'] -> tipo_ne;
													$home['nonomina'] = $this -> Main -> getRowWhere1($tbl_nomina_status_nominas, $campo, $valor);
													// buscamos el Código de turno
													$campo = "IdNT";
													$valor = $home['empleadonomina'] -> turno_ne;
													$home['noturnos'] = $this -> Main -> getRowWhere1($tbl_nomina_status_turnos, $campo, $valor);
													// buscamos la Forma en que se hace el pago
													$campo = "IdNPa";
													$valor = $home['empleadonomina'] -> forma_pago_ne;
													$home['nopago'] = $this -> Main -> getRowWhere1($tbl_nomina_status_pagos, $campo, $valor);
													// buscamos el banco
													$campo = "IdNB";
													$valor = $home['empleadonomina'] -> banco_ne;
													$home['nobancos'] = $this -> Main -> getRowWhere1($tbl_nomina_status_bancos, $campo, $valor);
													// buscamos el Código de prestaciones de ley
													$campo = "IdNPr";
													$valor = $home['empleadonomina'] -> prestaciones_ne;
													$home['noprestaciones'] = $this -> Main -> getRowWhere1($tbl_nomina_status_prestaciones, $campo, $valor);
													$excel = $this -> generarexcel -> programaNomina($home);
												}
												// no tiene nomina | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos no podemos agregar al empleado en el programa de nómina, falta información de Nómina.";
													$popup['type'] = "error";
													$popup['ruta'] = "ruta";
													// --------------- VISTAS --------------- //
													$this -> load -> view('main/Header', $header);
													$this -> load -> view('menu/Finanzas', $menu);
													$this -> load -> view('popup/popup', $popup);
													$this -> load -> view('main/Footer');
												}
											}
											// el empleado no existe | mandamos alerta de error
											else {
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "Lo sentimos este empleado no se encuentra registrado, intentalo nuevamente.";
												$popup['type'] = "error";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
					 							$this -> load -> view('main/Header', $header);
					 							$this -> load -> view('menu/Finanzas', $menu);
					 							$this -> load -> view('popup/popup', $popup);
					 							$this -> load -> view('main/Footer');
											}
										}
										// viene variable | redirigimos a la página principal
										else {
										  $this -> load -> view('main/Header', $header);
										  $this -> load -> view('menu/Finanzas', $menu);
										  $this -> load -> view('bug/404');
										  $this -> load -> view('main/Footer');
										}
									break;
									// --------------- no existe el metodo --------------- //
									default:
										$this -> load -> view('main/Header', $header);
										$this -> load -> view('menu/Finanzas', $menu);
										$this -> load -> view('bug/404');
										$this -> load -> view('main/Footer');
									break;
								}
							}
							// el metodo no existe | mandamos el error 404
							else {
								$this -> load -> view('main/Header', $header);
								$this -> load -> view('menu/Finanzas', $menu);
								$this -> load -> view('bug/404');
								$this -> load -> view('main/Footer');
							}
						}
						// la empresa no existe | mandamos alerta de error
						else {
							$popup['title'] = "¡ERROR!";
							$popup['text'] = "Lo sentimos esta empresa no se encuentra registrada, intentalo nuevamente.";
							$popup['type'] = "error";
							$popup['ruta'] = "base";
							// --------------- VISTAS --------------- //
							$this -> load -> view('main/Header', $header);
							$this -> load -> view('menu/Finanzas', $menu);
							$this -> load -> view('popup/popup', $popup);
							$this -> load -> view('main/Footer');
						}
					}
					// el usuario es OTRO
					else {
						$popup['title'] = "¡ERROR!";
						$popup['text'] = "Lo sentimos, tu usuario no tiene permisos para ingresar a ésta área.";
						$popup['type'] = "error";
						$popup['ruta'] = "base";
						// --------------- VISTAS --------------- //
						$this -> load -> view('main/Header', $header);
						$this -> load -> view('popup/popup', $popup);
						$this -> load -> view('main/Footer');
					}
				}
				// no es igual a ok | mandamos a la página principal
				else {
					redirect(base_url());
					exit();
				}
			}
			// no viene la variable de sesion mandamos a la página principal
			else {
				redirect(base_url());
				exit();
			}
		}
	}
