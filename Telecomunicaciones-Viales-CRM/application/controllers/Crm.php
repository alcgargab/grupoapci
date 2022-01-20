<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Crm extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function _remap($method, $params = array()) {
		if (!method_exists($this, $method)) {
			$this -> index($method, $params);
		} else {
			return call_user_func_array(array($this,$method), $params);
		}
	}
	public function index($method = NULL, $url = NULL){
		// --------------- variables para tablas --------------- //
		$tbl_usuarios = "usuarios";
		$tbl_licencias = "licencias";
		$tbl_empresas = "empresas";
		$tbl_registro_llamada = "registro_llamada";
		$tbl_seguimiento_llamada = "seguimiento_llamada";
		$tbl_prospecto_venta = "prospecto_venta";
		$tbl_contrato_prospecto = "contrato_prospecto";
		$tbl_folio_contrato = "folio_contrato";
		$tbl_ventas = "ventas";
		$tbl_metodos_permitidos = "metodos_permitidos";
		$tbl_status_codificacion_llamada = "status_codificacion_llamada";
		$tbl_status_tipificacion_llamada = "status_tipificacion_llamada";
		$tbl_status_representante_legal_encargado = "status_representante_legal_encargado";
		$tbl_status_interes_llamada = "status_interes_llamada";
		$tbl_status_momento_llamada = "status_momento_llamada";
		$tbl_status_documento_llamada = "status_documento_llamada";
		$tbl_interes_llamada = "interes_llamada";
		$tbl_documento_prospecto = "documento_prospecto";
		$tbl_seguimiento_historial = "seguimiento_historial";
		$tbl_tipificacion_llamada = "tipificacion_llamada";
		$tbl_iniciar_sesion = "iniciar_sesion";
		$tbl_cerrar_sesion = "cerrar_sesion";
		$tbl_expediente_venta = "expediente_venta";
		$tbl_suscripcion = "suscripcion";
		$tbl_status_tipo_empleado = "status_tipo_empleado";
		$tbl_status_contrato_llamada = "status_contrato_llamada";
		$tbl_status_firma_cotrato = "status_firma_cotrato";
		$tbl_status_folio_contrato = "status_folio_contrato";
		$tbl_status_contrato_entregado = "status_contrato_entregado";
		// obtenemos la información del usuario
		$campo = "id_u";
		$valor = $this -> session -> id;
		$usuario = $this -> Model_crm -> getRowWhere1($tbl_usuarios, $campo, $valor);
		// datos que se ocuparan en las vistas
		// --------------- header --------------- //
		// validamos si viene el usuario
		if ($usuario != "") {
			// si viene el usuario | buscamos las variables
			$navbar['usuario'] = $usuario;
			// obtenemos la licencia
			$campo = "id_l";
			$valor = $usuario -> licencia;
			$navbar['licencia'] = $this -> Model_crm -> getRowWhere1($tbl_licencias, $campo, $valor);
			// obtenemos la empresa
			$campo = "id_e";
			$valor = $navbar['licencia'] -> empresa;
			$header['empresa'] = $this -> Model_crm -> getRowWhere1($tbl_empresas, $campo, $valor);
			$header['usuario'] = $navbar['usuario'];
			// echo "<pre>"; print_r($header); echo "</pre>"; die();
		}
		// no viene el usuario | las variables las mandamos vacias
		else {
			$header['usuario'] = "";
			$header['empresa'] = "";
			$navbar['usuario'] = "";
			$navbar['licencia'] = "";
		}
		// *********************************************************************************** //
		switch ($this -> session -> puesto) {
			// ----------------------------- ejecutivo ----------------------------- //
			case 1:
				// buscamos los registros que no han visto
				$campo1 = "vistoe";
				$valor1 = 2;
				$campo2 = "usuario";
				$valor2 = $this -> session -> id;
				$flag['erllview'] = $this -> Model_crm -> getAllWhere2($tbl_registro_llamada, $campo1, $valor1, $campo2, $valor2);
				if ($flag['erllview'] != "") {
					$header['erllview'] = count($flag['erllview']);
					$navbar['erllview'] = count($flag['erllview']);
				}
				// no existe registros nuevos
				else {
					$header['erllview'] = 0;
					$navbar['erllview'] = 0;
				}
				// buscamos los seguimientos que no han visto
				$campo1 = "vistoe";
				$valor1 = 2;
				$campo2 = "usuario";
				$valor2 = $this -> session -> id;
				$flag['esllview'] = $this -> Model_crm -> getAllWhere2($tbl_seguimiento_llamada, $campo1, $valor1, $campo2, $valor2);
				if ($flag['esllview'] != "") {
					$header['esllview'] = count($flag['esllview']);
					$navbar['esllview'] = count($flag['esllview']);
				}
				// no existe registros nuevos
				else {
					$header['esllview'] = 0;
					$navbar['esllview'] = 0;
				}
				// buscamos los prospectos
				$campo1 = "vistoe";
				$valor1 = 2;
				$campo2 = "usuario";
				$valor2 = $this -> session -> id;
				$flag['epvview'] = $this -> Model_crm -> getAllWhere2($tbl_prospecto_venta, $campo1, $valor1, $campo2, $valor2);
				if ($flag['epvview'] != "") {
					$header['epvview'] = count($flag['epvview']);
					$navbar['epvview'] = count($flag['epvview']);
				}
				// no existe registros nuevos
				else {
					$header['epvview'] = 0;
					$navbar['epvview'] = 0;
				}
				// buscamos los prospectos sin ine
				$campo1 = "vistoe";
				$valor1 = 2;
				$campo2 = "usuario";
				$valor2 = $this -> session -> id;
				$campo3 = "identificacion";
				$valor3 = 2;
				$flag['epvineview'] = $this -> Model_crm -> getAllWhere3($tbl_prospecto_venta, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3);
				if ($flag['epvineview'] != "") {
					$header['epvineview'] = count($flag['epvineview']);
					$navbar['epvineview'] = count($flag['epvineview']);
				}
				// no existe registros nuevos
				else {
					$header['epvineview'] = 0;
					$navbar['epvineview'] = 0;
				}
				// buscamos los prospectos sin contrato
				$campo1 = "vistoe";
				$valor1 = 2;
				$campo2 = "usuario";
				$valor2 = $this -> session -> id;
				$campo3 = "contrato";
				$valor3 = 2;
				$flag['epvdocview'] = $this -> Model_crm -> getAllWhere3($tbl_prospecto_venta, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3);
				if ($flag['epvdocview'] != "") {
					$header['epvdocview'] = count($flag['epvdocview']);
					$navbar['epvdocview'] = count($flag['epvdocview']);
				}
				// no existe registros nuevos
				else {
					$header['epvdocview'] = 0;
					$navbar['epvdocview'] = 0;
				}
				// buscamos los contratos sin firma
				$campo1 = "vistoe";
				$valor1 = 2;
				$campo2 = "elavoracion";
				$valor2 = $this -> session -> id;
				$campo3 = "vistoe";
				$valor3 = 2;
				$flag['ecpsing'] = $this -> Model_crm -> getAllWhere3($tbl_contrato_prospecto, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3);
				if ($flag['ecpsing'] != "") {
					$header['ecpsing'] = count($flag['ecpsing']);
					$navbar['ecpsing'] = count($flag['ecpsing']);
				}
				// no existe registros nuevos
				else {
					$header['ecpsing'] = 0;
					$navbar['ecpsing'] = 0;
				}
				// buscamos los folios nuevos
				$campo1 = "vistoe";
				$valor1 = 2;
				$flag['ecpfolio'] = $this -> Model_crm -> getAllWhere1($tbl_folio_contrato, $campo1, $valor1);
				if ($flag['ecpfolio'] != "") {
					$header['ecpfolio'] = count($flag['ecpfolio']);
					$navbar['ecpfolio'] = count($flag['ecpfolio']);
				}
				// no existe registros nuevos
				else {
					$header['ecpfolio'] = 0;
					$navbar['ecpfolio'] = 0;
				}
				// buscamos los contratos sin entrega
				$campo1 = "vistoe";
				$valor1 = 2;
				$flag['ecpentrega'] = $this -> Model_crm -> getAllWhere1($tbl_contrato_prospecto, $campo1, $valor1);
				if ($flag['ecpentrega'] != "") {
					$header['ecpentrega'] = count($flag['ecpentrega']);
					$navbar['ecpentrega'] = count($flag['ecpentrega']);
				}
				// no existe registros nuevos
				else {
					$header['ecpentrega'] = 0;
					$navbar['ecpentrega'] = 0;
				}
			break;
			// -------------------------- mesa de control -------------------------- //
			case 2:
				// buscamos los prospectos sin contrato
				$campo1 = "vistom";
				$valor1 = 2;
				$campo2 = "contrato";
				$valor2 = 2;
				$flag['mpvdocview'] = $this -> Model_crm -> getAllWhere2($tbl_prospecto_venta, $campo1, $valor1, $campo2, $valor2);
				if ($flag['mpvdocview'] != "") {
					$header['mpvdocview'] = count($flag['mpvdocview']);
					$navbar['mpvdocview'] = count($flag['mpvdocview']);
				}
				// no existe registros nuevos
				else {
					$header['mpvdocview'] = 0;
					$navbar['mpvdocview'] = 0;
				}
				// buscamos los contratos sin folio
				$campo1 = "vistom";
				$valor1 = 2;
				$flag['mcpfolio'] = $this -> Model_crm -> getAllWhere1($tbl_contrato_prospecto, $campo1, $valor1);
				if ($flag['mcpfolio'] != "") {
					$header['mcpfolio'] = count($flag['mcpfolio']);
					$navbar['mcpfolio'] = count($flag['mcpfolio']);
				}
				// no existe registros nuevos
				else {
					$header['mcpfolio'] = 0;
					$navbar['mcpfolio'] = 0;
				}
				// buscamos los prospectos sin contrato
				$campo1 = "vistom";
				$valor1 = 2;
				$flag['mvview'] = $this -> Model_crm -> getAllWhere1($tbl_ventas, $campo1, $valor1);
				if ($flag['mvview'] != "") {
					$header['mvview'] = count($flag['mvview']);
					$navbar['mvview'] = count($flag['mvview']);
				}
				// no existe registros nuevos
				else {
					$header['mvview'] = 0;
					$navbar['mvview'] = 0;
				}
			break;
			default:
				// code...
			break;
		}
		// *********************************************************************************** //
		// validamos que venga la sesión iniciada
		if (isset($this -> session -> sesion)) {
			// si viene la sesión | validamos que sea igual a true
			if ($this -> session -> sesion == "true") {
				// la sesión es correcta | validamos si viene un metodo
				if (isset($method)) {
					$campo1 = "ruta";
					$valor1 = $method;
					$campo2 = "usuario";
					$valor2 = $this -> session -> puesto;
					$metodo = $this -> Model_crm -> getRowWhere2Like($tbl_metodos_permitidos, $campo1, $valor1, $campo2, $valor2);
					// validamos que el metodo existe en la db
					if ($metodo != "") {
						// validamos el puesto
						switch ($this -> session -> puesto) {
							// ejecutivo
							case 1:
								// validamos la ruta ingresada en la url
								switch ($metodo -> ruta) {
									// vista para agregar registro
									case 'new-record':
										// obtenemos las codificaciones de las llamdas
										$home['scdll'] = $this -> Model_crm -> getAll($tbl_status_codificacion_llamada);
										// obtenemos las tipificaciones para las llamdas
										$home['stll'] = $this -> Model_crm -> getAll($tbl_status_tipificacion_llamada);
										// obtenemos los status del representante legal
										$home['srle'] = $this -> Model_crm -> getAll($tbl_status_representante_legal_encargado);
										// obtenemos los status de le interesa el servicio
										$home['sill'] = $this -> Model_crm -> getAll($tbl_status_interes_llamada);
										// obtenemos los status de en este momento
										$home['smll'] = $this -> Model_crm -> getAll($tbl_status_momento_llamada);
										// obtenemos los status de docuemnto
										$home['sdll'] = $this -> Model_crm -> getAll($tbl_status_documento_llamada);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Ejecutivo/Home de ejecutivo', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// agregar nuevo registro
									case 'add-record':
										// validamos que venga información del formulario
										$data['companyname'] = trim($this -> input -> post('companyname'));
										if ($data['companyname'] != "") {
											// si viene información obetenemos los demás valores
											// mb_strtoupper
											$data['recordname'] = mb_strtoupper(trim($this -> input -> post('recordname')), 'UTF-8');
											$data['recordtel'] = mb_strtoupper(trim($this -> input -> post('recordtel')), 'UTF-8');
											$data['recordemail'] = mb_strtoupper(trim($this -> input -> post('recordemail')), 'UTF-8');
											$data['recordCom'] = mb_strtoupper(trim($this -> input -> post('recordCom')), 'UTF-8');
											// validamos que los valores tengan el formato correcto
											if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9_&*., ]+$/', $data['companyname']) &&
													preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $data['recordname']) &&
													preg_match('/([0-9]{10})+$/', $data['recordtel']) &&
													preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $data['recordemail']) &&
													preg_match('/^[0-9]+$/', $data['recordCom'])) {
												// el formato si es correcto | validamos información del select
												if ($data['recordCom'] == 1) {
													// la información del select es SI | validamos si se encuentra el RL o encargado
													$data['recordRl'] = trim($this -> input -> post('recordRl'));
													// validamos si el campo viene vacio
													if ($data['recordRl'] != "seleccione-la-opcion") {
														// el campo no viene vacio | validamos el formato del select
														if (preg_match('/^[0-9]+$/', $data['recordRl'])) {
															// el formato es corecto | validamos la información del select
															if ($data['recordRl'] == 1) {
																// la información del select es si | validamos si le interesa el servicio
																$data['recordIs'] = trim($this -> input -> post('recordIs'));
																// validamos si el campo viene vacio
																if ($data['recordIs'] != "seleccione-la-opcion") {
																	// el campo no viene vacio | validamos el formato del select
																	if (preg_match('/^[0-9]+$/', $data['recordIs'])) {
																		// el formato es corecto | validamos la información del select
																		if ($data['recordIs'] == 1) {
																			// la información del select es si | validamos si en este momento
																			$data['recordEm'] = trim($this -> input -> post('recordEm'));
																			// validamos si el campo viene vacio
																			if ($data['recordEm'] != "seleccione-la-opcion") {
																				// el campo no viene vacio | validamos el formato del select
																				if (preg_match('/^[0-9]+$/', $data['recordEm'])) {
																					// el formato es corecto | generamos prospecto
																					if ($data['recordEm'] == 1) {
																						// la información del select es si | validamos si existe documento
																						$data['recordIne'] = trim($this -> input -> post('recordIne'));
																						// validamos si el campo viene vacio
																						if ($data['recordIne'] != "seleccione-la-opcion") {
																							// el campo no viene vacio | validamos el formato del select
																							if (preg_match('/^[0-9]+$/', $data['recordIne'])) {
																								// el formato es corecto | generamos prospecto
																								if ($data['recordIne'] == 1) {
																									// validamos que venga información del formulario
																									$data['recordNc'] = mb_strtoupper(trim($this -> input -> post('recordNc')), 'UTF-8');
																									if ($data['recordNc'] != "") {
																										// si viene información | obtenemos los demás valores
																										$data['recordRs'] = mb_strtoupper(trim($this -> input -> post('recordRs')), 'UTF-8');
																										$data['recordNl'] = mb_strtoupper(trim($this -> input -> post('recordNl')), 'UTF-8');
																										$data['recordEq'] = mb_strtoupper(trim($this -> input -> post('recordEq')), 'UTF-8');
																										$data['recordComent'] = mb_strtoupper(trim($this -> input -> post('recordComent')), 'UTF-8');
																										// validamos el formato de la información
																										if (preg_match('/^[0-9]+$/', $data['recordNc']) &&
																												preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,. ]+$/', $data['recordRs']) &&
																												preg_match('/^[0-9]+$/', $data['recordNl']) &&
																												preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-¿?!¡$%()=_*+{}:;&%#\s\S ]+$/', $data['recordEq']) &&
																												preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-¿?!¡$%()=_*+{}:;&%#\s\S ]+$/', $data['recordComent'])) {
																											// el formato es correcto | insertamos prospecto
																											$rll['c_registro'] = $this -> generadordecodigo -> c10();
																											$rll['c_rencrypt'] = md5($rll['c_registro']);
																											$rll['usuario'] = $this -> session -> id;
																											$rll['empresa'] = mb_strtoupper($data['companyname'], 'UTF-8');
																											$rll['contacto'] = mb_strtoupper($data['recordname'], 'UTF-8');
																											$rll['telefono'] = mb_strtoupper($data['recordtel'], 'UTF-8');
																											$rll['email'] = mb_strtoupper($data['recordemail'], 'UTF-8');
																											$rll['codificacion'] = mb_strtoupper($data['recordCom'], 'UTF-8');
																											$rll['vistoe'] = 2;
																											// buscamos si no existe el código en la db
																											$campo  = "c_rencrypt";
																											$valor = $rll['c_rencrypt'];
																											$bandera = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																											// validamos si el código no existe
																											if ($bandera == "") {
																												// el código no existe | validamos que no exista el código del prospecto
																												$pv['usuario'] = $this -> session -> id;
																												$pv['c_prospecto'] = trim($this -> generadordecodigo -> c10());
																												$pv['c_pencrypt'] = md5($pv['c_prospecto']);
																												$pv['numero_cuenta'] = $data['recordNc'];
																												$pv['razon_social'] = $data['recordRs'];
																												$pv['numero_lineas'] = $data['recordNl'];
																												$pv['equipos'] = $data['recordEq'];
																												$pv['comentarios'] = $data['recordComent'];
																												$pv['identificacion'] = $data['recordIne'];
																												$pv['contrato'] = 2;
																												$pv['vistoe'] = 2;
																												$pv['vistom'] = 2;
																												$pv['alerta'] = 2;
																												$campo = "c_pencrypt";
																												$valor = $pv['c_pencrypt'];
																												$prospecto = $this -> Model_crm -> getRowWhere1($tbl_prospecto_venta, $campo, $valor);
																												// validamos si el prospecto existe
																												if ($prospecto == "") {
																													// el código no existe | insertamos valores
																													// insertamos registro de la llamada
																													$insertrll = $this -> Model_crm -> insert($tbl_registro_llamada, $rll);
																													// obtenemos el registro que acabamos de insertar
																													$campo  = "c_rencrypt";
																													$valor = $rll['c_rencrypt'];
																													$registro = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																													// insertamos el interes
																													$sill['registro'] = $registro -> id_rll;
																													$sill['status'] = $data['recordIs'];
																													$insertsill = $this -> Model_crm -> insert($tbl_interes_llamada, $sill);
																													// insertamos el prospecto
																													$pv['registro'] = $registro -> id_rll;
																													$insertpv = $this -> Model_crm -> insert($tbl_prospecto_venta, $pv);
																													// obtenemos el prospecto que acabamos de insertar
																													$campo  = "c_pencrypt";
																													$valor = $pv['c_pencrypt'];
																													$prospecto = $this -> Model_crm -> getRowWhere1($tbl_prospecto_venta, $campo, $valor);
																													// insertamos el docuemnto
																													// obtenemos datos | INE del prospecto
																													$namefile = $prospecto -> c_pencrypt;
																													$carpeta = 'Docs/INE/'.$namefile;
																													$name = $data['recordNc'][0].$data['recordNc'][1].$data['recordNc'][2].$data['recordNc'][3].$data['recordNc'][4]."_INE_".$data['recordRs'][0].$data['recordRs'][1].$data['recordRs'][2];
																													if (!file_exists($carpeta)) {
																														mkdir($carpeta, 0777, true);
																													}
																													//Abrimos el directorio de destino
																													$file = opendir($carpeta);
																													if (!empty($_FILES['recordIneDoc']['name'])) {
																														move_uploaded_file($_FILES['recordIneDoc']['tmp_name'],"Docs/INE/$namefile/$name".".png");
																														$url_img_Foto = $name.".png";
																													}
																													//Cerramos el directorio de destino
																													closedir($file);
																													$dp['prospecto'] = $prospecto -> id_pv;
																													$dp['documento'] = $url_img_Foto;
																													$insertdp = $this -> Model_crm -> insert($tbl_documento_prospecto, $dp);
																													// validamos que se inserto correctamente el registro
																													if ($insertrll == "true" && $insertsill == "true" && $insertpv == "true" && $insertdp == "true") {
																														// se inserto el registro | mandamos alerta de success
																														$popup['title'] = "¡PERFECTO!";
																														$popup['text'] = "Se agregó el registro";
																														$popup['type'] = "success";
																														$popup['ruta'] = "ruta";
																														// --------------- VISTAS --------------- //
																														$this -> load -> view('Principal/Header', $header);
																														$this -> load -> view('Principal/Navbar', $navbar);
																														$this -> load -> view('Popup/Popup', $popup);
																														$this -> load -> view('Principal/Footer');
																													}
																													// el registro no se inserto | mandamos alerta de error
																													else {
																														$popup['title'] = "¡ERROR!";
																														$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																														$popup['type'] = "error";
																														$popup['ruta'] = "base";
																														// --------------- VISTAS --------------- //
																														$this -> load -> view('Principal/Header', $header);
																														$this -> load -> view('Principal/Navbar', $navbar);
																														$this -> load -> view('Popup/Popup', $popup);
																														$this -> load -> view('Principal/Footer');
																													}
																												}
																												// el código ya existe | mandamos alerta de error
																												else {
																													$popup['title'] = "¡ERROR!";
																													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																													$popup['type'] = "error";
																													$popup['ruta'] = "base";
																													// --------------- VISTAS --------------- //
																													$this -> load -> view('Principal/Header', $header);
																													$this -> load -> view('Principal/Navbar', $navbar);
																													$this -> load -> view('Popup/Popup', $popup);
																													$this -> load -> view('Principal/Footer');
																												}
																											}
																											// el codigó ya existe | mandamos alerta de error
																											else {
																												$popup['title'] = "¡ERROR!";
																												$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																												$popup['type'] = "error";
																												$popup['ruta'] = "base";
																												// --------------- VISTAS --------------- //
																												$this -> load -> view('Principal/Header', $header);
																												$this -> load -> view('Principal/Navbar', $navbar);
																												$this -> load -> view('Popup/Popup', $popup);
																												$this -> load -> view('Principal/Footer');
																											}
																										}
																										// el formato no es correcto | mandamos alerta de error
																										else {
																											$popup['title'] = "¡Formato no valido!";
																											$popup['text'] = "No se permiten caracteres especiales en los campos. Intentalo nuevamente.";
																											$popup['type'] = "error";
																											$popup['ruta'] = "base";
																											// --------------- VISTAS --------------- //
																											$this -> load -> view('Principal/Header', $header);
																											$this -> load -> view('Principal/Navbar', $navbar);
																											$this -> load -> view('Popup/Popup', $popup);
																											$this -> load -> view('Principal/Footer');
																										}
																									}
																									// no viene información | mandamos alerta de error
																									else {
																										$popup['title'] = "¡ERROR!";
																										$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																										$popup['type'] = "error";
																										$popup['ruta'] = "base";
																										// --------------- VISTAS --------------- //
																										$this -> load -> view('Principal/Header', $header);
																										$this -> load -> view('Principal/Navbar', $navbar);
																										$this -> load -> view('Popup/Popup', $popup);
																										$this -> load -> view('Principal/Footer');
																									}
																								}
																								// la información del select es no | generamos prospecto
																								elseif ($data['recordIne'] == 2) {
																									// validamos que venga información del formulario
																									$data['recordNc'] = mb_strtoupper(trim($this -> input -> post('recordNc')), 'UTF-8');
																									if ($data['recordNc'] != "") {
																										// si viene información | obtenemos los demás valores
																										$data['recordRs'] = mb_strtoupper(trim($this -> input -> post('recordRs')), 'UTF-8');
																										$data['recordNl'] = mb_strtoupper(trim($this -> input -> post('recordNl')), 'UTF-8');
																										$data['recordEq'] = mb_strtoupper(trim($this -> input -> post('recordEq')), 'UTF-8');
																										$data['recordComent'] = mb_strtoupper(trim($this -> input -> post('recordComent')), 'UTF-8');
																										// validamos el formato de la información
																										if (preg_match('/^[0-9]+$/', $data['recordNc']) &&
																												preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,. ]+$/', $data['recordRs']) &&
																												preg_match('/^[0-9]+$/', $data['recordNl']) &&
																												preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-¿?!¡$%()=_*+{}:;&%#\s\S ]+$/', $data['recordEq']) &&
																												preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-¿?!¡$%()=_*+{}:;&%#\s\S ]+$/', $data['recordComent'])) {
																											// el formato es correcto | insertamos prospecto
																											$rll['c_registro'] = $this -> generadordecodigo -> c10();
																											$rll['c_rencrypt'] = md5($rll['c_registro']);
																											$rll['usuario'] = $this -> session -> id;
																											$rll['empresa'] = mb_strtoupper($data['companyname'], 'UTF-8');
																											$rll['contacto'] = mb_strtoupper($data['recordname'], 'UTF-8');
																											$rll['telefono'] = mb_strtoupper($data['recordtel'], 'UTF-8');
																											$rll['email'] = mb_strtoupper($data['recordemail'], 'UTF-8');
																											$rll['codificacion'] = mb_strtoupper($data['recordCom'], 'UTF-8');
																											$rll['vistoe'] = 2;
																											// buscamos si no existe el código en la db
																											$campo  = "c_rencrypt";
																											$valor = $rll['c_rencrypt'];
																											$bandera = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																											// validamos si el código no existe
																											if ($bandera == "") {
																												// el código no existe | validamos que no exista el código de prospecto
																												$pv['usuario'] = $this -> session -> id;
																												$pv['c_prospecto'] = trim($this -> generadordecodigo -> c10());
																												$pv['c_pencrypt'] = md5($pv['c_prospecto']);
																												$pv['numero_cuenta'] = $data['recordNc'];
																												$pv['razon_social'] = $data['recordRs'];
																												$pv['numero_lineas'] = $data['recordNl'];
																												$pv['equipos'] = $data['recordEq'];
																												$pv['comentarios'] = $data['recordComent'];
																												$pv['identificacion'] = $data['recordIne'];
																												$pv['contrato'] = 2;
																												// obtenemos el prospecto
																												$campo = "c_pencrypt";
																												$valor = $pv['c_pencrypt'];
																												$prospecto = $this -> Model_crm -> getRowWhere1($tbl_prospecto_venta, $campo, $valor);
																												// validamos si el prospecto no existe
																												if ($prospecto == "") {
																													// insertamos el registro de la llamada
																													$insertrll = $this -> Model_crm -> insert($tbl_registro_llamada, $rll);
																													// obtenemos el registro que acabamos de insertar
																													$campo  = "c_rencrypt";
																													$valor = $rll['c_rencrypt'];
																													$registro = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																													// insertamos el interes
																													$sill['registro'] = $registro -> id_rll;
																													$sill['status'] = $data['recordIs'];
																													$insertsill = $this -> Model_crm -> insert($tbl_interes_llamada, $sill);
																													// insertamos el prospecto
																													$pv['registro'] = $registro -> id_rll;
																													$pv['vistoe'] = 2;
																													$pv['vistom'] = 2;
																													$pv['alerta'] = 2;
																													$insertpv = $this -> Model_crm -> insert($tbl_prospecto_venta, $pv);
																													// validamos que se inserto correctamente el registro
																													if ($insertrll == "true" && $insertsill == "true" && $insertpv == "true") {
																														// se inserto el registro | mandamos alerta de success
																														$popup['title'] = "¡PERFECTO!";
																														$popup['text'] = "Se agregó el registro";
																														$popup['type'] = "success";
																														$popup['ruta'] = "ruta";
																														// --------------- VISTAS --------------- //
																														$this -> load -> view('Principal/Header', $header);
																														$this -> load -> view('Principal/Navbar', $navbar);
																														$this -> load -> view('Popup/Popup', $popup);
																														$this -> load -> view('Principal/Footer');
																													}
																													// el registro no se inserto | mandamos alerta de error
																													else {
																														$popup['title'] = "¡ERROR!";
																														$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																														$popup['type'] = "error";
																														$popup['ruta'] = "base";
																														// --------------- VISTAS --------------- //
																														$this -> load -> view('Principal/Header', $header);
																														$this -> load -> view('Principal/Navbar', $navbar);
																														$this -> load -> view('Popup/Popup', $popup);
																														$this -> load -> view('Principal/Footer');
																													}
																												}
																												// el código ya existe | mandamos alerta de error
																												else {
																													$popup['title'] = "¡ERROR!";
																													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																													$popup['type'] = "error";
																													$popup['ruta'] = "base";
																													// --------------- VISTAS --------------- //
																													$this -> load -> view('Principal/Header', $header);
																													$this -> load -> view('Principal/Navbar', $navbar);
																													$this -> load -> view('Popup/Popup', $popup);
																													$this -> load -> view('Principal/Footer');
																												}
																											}
																											// el codigó ya existe | mandamos alerta de error
																											else {
																												$popup['title'] = "¡ERROR!";
																												$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																												$popup['type'] = "error";
																												$popup['ruta'] = "base";
																												// --------------- VISTAS --------------- //
																												$this -> load -> view('Principal/Header', $header);
																												$this -> load -> view('Principal/Navbar', $navbar);
																												$this -> load -> view('Popup/Popup', $popup);
																												$this -> load -> view('Principal/Footer');
																											}
																										}
																										// el formato no es correcto | mandamos alerta de error
																										else {
																											$popup['title'] = "¡Formato no valido!";
																											$popup['text'] = "No se permiten caracteres especiales en los campos. Intentalo nuevamente.";
																											$popup['type'] = "error";
																											$popup['ruta'] = "base";
																											// --------------- VISTAS --------------- //
																											$this -> load -> view('Principal/Header', $header);
																											$this -> load -> view('Principal/Navbar', $navbar);
																											$this -> load -> view('Popup/Popup', $popup);
																											$this -> load -> view('Principal/Footer');
																										}
																									}
																									// no viene información | mandamos alerta de error
																									else {
																										$popup['title'] = "¡ERROR!";
																										$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																										$popup['type'] = "error";
																										$popup['ruta'] = "base";
																										// --------------- VISTAS --------------- //
																										$this -> load -> view('Principal/Header', $header);
																										$this -> load -> view('Principal/Navbar', $navbar);
																										$this -> load -> view('Popup/Popup', $popup);
																										$this -> load -> view('Principal/Footer');
																									}
																								}
																								// la información no es correcta | mandamos alerta de error
																								else {
																									$popup['title'] = "¡Campo vacio!";
																									$popup['text'] = "Debes selecionar el campo de ¿Documento (identificación) recibido? Intentalo nuevamente.";
																									$popup['type'] = "error";
																									$popup['ruta'] = "base";
																									// --------------- VISTAS --------------- //
																									$this -> load -> view('Principal/Header', $header);
																									$this -> load -> view('Principal/Navbar', $navbar);
																									$this -> load -> view('Popup/Popup', $popup);
																									$this -> load -> view('Principal/Footer');
																								}
																							}
																							// el formato no es correcto | mandamos alerta de error
																							else {
																								$popup['title'] = "¡Formato no valido!";
																								$popup['text'] = "No se permiten caracteres especiales en los campos. Intentalo nuevamente.";
																								$popup['type'] = "error";
																								$popup['ruta'] = "base";
																								// --------------- VISTAS --------------- //
																								$this -> load -> view('Principal/Header', $header);
																								$this -> load -> view('Principal/Navbar', $navbar);
																								$this -> load -> view('Popup/Popup', $popup);
																								$this -> load -> view('Principal/Footer');
																							}
																						}
																						// el campo viene vacio | mandamos alerta de error
																						else {
																							$popup['title'] = "¡Campo vacio!";
																							$popup['text'] = "Debes selecionar el campo de ¿Documento (identificación) recibido? Intentalo nuevamente.";
																							$popup['type'] = "error";
																							$popup['ruta'] = "base";
																							// --------------- VISTAS --------------- //
																							$this -> load -> view('Principal/Header', $header);
																							$this -> load -> view('Principal/Navbar', $navbar);
																							$this -> load -> view('Popup/Popup', $popup);
																							$this -> load -> view('Principal/Footer');
																						}
																					}
																					// la información del select es no | insertamos el seguimiento
																					elseif ($data['recordEm'] == 2) {
																						$data['recordDate'] = trim($this -> input -> post('recordDate'));
																						$data['recordTime'] = trim($this -> input -> post('recordTime'));
																						$data['recordAComen'] = trim($this -> input -> post('recordAComen'));
																						if ($data['recordDate'] != "0000-00-00" && $data['recordTime'] != "" && $data['recordAComen'] != "") {
																							// si viene información del formulario | validamos si el formato es correcto
																							if (preg_match('/([0-9]{4})\-([0-9]{2})\-([0-9]{2})+$/', $data['recordDate']) &&
																									preg_match('/([0-9]{2})\:([0-9]{2})+$/', $data['recordTime']) &&
																									preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-¿?!¡$%()=_ ]+$/', $data['recordAComen'])) {
																								// formato valido | insertamos el registro
																								$rll['c_registro'] = $this -> generadordecodigo -> c10();
																								$rll['c_rencrypt'] = md5($rll['c_registro']);
																								$rll['usuario'] = $this -> session -> id;
																								$rll['empresa'] = mb_strtoupper($data['companyname'], 'UTF-8');
																								$rll['contacto'] = mb_strtoupper($data['recordname'], 'UTF-8');
																								$rll['telefono'] = mb_strtoupper($data['recordtel'], 'UTF-8');
																								$rll['email'] = mb_strtoupper($data['recordemail'], 'UTF-8');
																								$rll['codificacion'] = mb_strtoupper($data['recordCom'], 'UTF-8');
																								$rll['vistoe'] = 2;
																								// buscamos si no existe el código en la db
																								$campo  = "c_rencrypt";
																								$valor = $rll['c_rencrypt'];
																								$bandera = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																								// validamos si el código no existe
																								if ($bandera == "") {
																									// el código no existe | insertamos registro
																									$insertrll = $this -> Model_crm -> insert($tbl_registro_llamada, $rll);
																									// obtenemos el registro que acabamos de insertar
																									$campo  = "c_rencrypt";
																									$valor = $rll['c_rencrypt'];
																									$registro = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																									// insertamos el seguimiento
																									$sll['c_seguimiento'] = trim($this -> generadordecodigo -> c20());
																									$sll['c_sencrypt'] = md5($sll['c_seguimiento']);
																									$sll['usuario'] = $this -> session -> id;
																									$sll['registro'] = $registro -> id_rll;
																									$sll['fecha'] = $data['recordDate'];
																									$sll['hora'] = $data['recordTime'];
																									$sll['comentario'] = $data['recordAComen'];
																									$sll['vistoe'] = 2;
																									// validamos que no exista el código
																									$campo = "c_sencrypt";
																									$valor = $sll['c_sencrypt'];
																									$seg = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_llamada, $campo, $valor);
																									if ($seg == "") {
																										// el codigo no existe | insertamos seguimiento
																										$insertsll = $this -> Model_crm -> insert($tbl_seguimiento_llamada, $sll);
																										// buscamos el seguimiento
																										$campo = "c_sencrypt";
																										$valor = $sll['c_sencrypt'];
																										$searchfollow = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_llamada, $campo, $valor);
																										// insertamos el historia
																										$sh['c_historial'] = trim($this -> generadordecodigo -> c20());
																										$sh['c_hencrypt'] = trim(md5($sh['c_historial']));
																										$sh['seguimiento'] = $searchfollow -> id_sll;
																										$sh['fecha'] = $searchfollow -> fecha;
																										$sh['hora'] = $searchfollow -> hora;
																										$sh['comentario'] = $searchfollow -> comentario;
																										$sh['fechash'] = date('Y-m-d');
																										$sh['horash'] = date('H:i:s');
																										// validamos si no existe el código
																										$campo  = "c_hencrypt";
																										$valor = $sh['c_hencrypt'];
																										$history = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_historial, $campo, $valor);
																										if ($history == "") {
																											// el código no existe | insertamos los registros
																											$insertsh = $this -> Model_crm -> insert($tbl_seguimiento_historial, $sh);
																											// insertamos el interes
																											$sill['registro'] = $registro -> id_rll;
																											$sill['status'] = $data['recordIs'];
																											$insertsill = $this -> Model_crm -> insert($tbl_interes_llamada, $sill);
																											// validamos que se inserto correctamente el registro
																											if ($insertrll == "true" && $insertsll == "true" && $insertsh == "true" && $insertsill == "true") {
																												// se inserto el registro | mandamos alerta de success
																												$popup['title'] = "¡PERFECTO!";
																												$popup['text'] = "Se agregó el registro";
																												$popup['type'] = "success";
																												$popup['ruta'] = "ruta";
																												// --------------- VISTAS --------------- //
																												$this -> load -> view('Principal/Header', $header);
																												$this -> load -> view('Principal/Navbar', $navbar);
																												$this -> load -> view('Popup/Popup', $popup);
																												$this -> load -> view('Principal/Footer');
																											}
																											// el registro no se inserto | mandamos alerta de error
																											else {
																												$popup['title'] = "¡ERROR!";
																												$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																												$popup['type'] = "error";
																												$popup['ruta'] = "base";
																												// --------------- VISTAS --------------- //
																												$this -> load -> view('Principal/Header', $header);
																												$this -> load -> view('Principal/Navbar', $navbar);
																												$this -> load -> view('Popup/Popup', $popup);
																												$this -> load -> view('Principal/Footer');
																											}
																										}
																										// el código ya existe | mandamos alerta de error
																										else {
																											$popup['title'] = "¡ERROR!";
																											$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																											$popup['type'] = "error";
																											$popup['ruta'] = "base";
																											// --------------- VISTAS --------------- //
																											$this -> load -> view('Principal/Header', $header);
																											$this -> load -> view('Principal/Navbar', $navbar);
																											$this -> load -> view('Popup/Popup', $popup);
																											$this -> load -> view('Principal/Footer');
																										}
																									}
																									// el código no existe | mandamos alerta de error
																									else {
																										$popup['title'] = "¡ERROR!";
																										$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																										$popup['type'] = "error";
																										$popup['ruta'] = "base";
																										// --------------- VISTAS --------------- //
																										$this -> load -> view('Principal/Header', $header);
																										$this -> load -> view('Principal/Navbar', $navbar);
																										$this -> load -> view('Popup/Popup', $popup);
																										$this -> load -> view('Principal/Footer');
																									}
																								}
																								// el codigó ya existe | mandamos alerta de error
																								else {
																									$popup['title'] = "¡ERROR123!";
																									$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																									$popup['type'] = "error";
																									$popup['ruta'] = "base";
																									// --------------- VISTAS --------------- //
																									$this -> load -> view('Principal/Header', $header);
																									$this -> load -> view('Principal/Navbar', $navbar);
																									$this -> load -> view('Popup/Popup', $popup);
																									$this -> load -> view('Principal/Footer');
																								}
																							}
																							// el formato no es correcto | mandamos alerta de error
																							else {
																								$popup['title'] = "¡Formato no valido!";
																								$popup['text'] = "No se permiten caracteres especiales en los campos. Intentalo nuevamente.";
																								$popup['type'] = "error";
																								$popup['ruta'] = "base";
																								// --------------- VISTAS --------------- //
																								$this -> load -> view('Principal/Header', $header);
																								$this -> load -> view('Principal/Navbar', $navbar);
																								$this -> load -> view('Popup/Popup', $popup);
																								$this -> load -> view('Principal/Footer');
																							}
																						}
																						// no viene información del formulario | mandamos alerta de error
																						else {
																							$popup['title'] = "¡ERROR!";
																							$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																							$popup['type'] = "error";
																							$popup['ruta'] = "base";
																							// --------------- VISTAS --------------- //
																							$this -> load -> view('Principal/Header', $header);
																							$this -> load -> view('Principal/Navbar', $navbar);
																							$this -> load -> view('Popup/Popup', $popup);
																							$this -> load -> view('Principal/Footer');
																						}
																					}
																					// la información no es correcta | mandamos alerta de error
																					else {
																						$popup['title'] = "¡Campo vacio!";
																						$popup['text'] = "Debes selecionar el campo de ¿En este momento? Intentalo nuevamente.";
																						$popup['type'] = "error";
																						$popup['ruta'] = "base";
																						// --------------- VISTAS --------------- //
																						$this -> load -> view('Principal/Header', $header);
																						$this -> load -> view('Principal/Navbar', $navbar);
																						$this -> load -> view('Popup/Popup', $popup);
																						$this -> load -> view('Principal/Footer');
																					}
																				}
																				// el formato no es correcto | mandamos alerta de error
																				else {
																					$popup['title'] = "¡Formato no valido!";
																					$popup['text'] = "No se permiten caracteres especiales en los campos. Intentalo nuevamente.";
																					$popup['type'] = "error";
																					$popup['ruta'] = "base";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('Principal/Header', $header);
																					$this -> load -> view('Principal/Navbar', $navbar);
																					$this -> load -> view('Popup/Popup', $popup);
																					$this -> load -> view('Principal/Footer');
																				}
																			}
																			// el campo viene vacio | mandamos alerta de error
																			else {
																				$popup['title'] = "¡Campo vacio!";
																				$popup['text'] = "Debes selecionar el campo de ¿En este momento? Intentalo nuevamente.";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header', $header);
																				$this -> load -> view('Principal/Navbar', $navbar);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		}
																		// la información del select es no | insertamos el registro
																		elseif ($data['recordIs'] == 2) {
																			$rll['c_registro'] = $this -> generadordecodigo -> c10();
																			$rll['c_rencrypt'] = md5($rll['c_registro']);
																			$rll['usuario'] = $this -> session -> id;
																			$rll['empresa'] = mb_strtoupper($data['companyname'], 'UTF-8');
																			$rll['contacto'] = mb_strtoupper($data['recordname'], 'UTF-8');
																			$rll['telefono'] = mb_strtoupper($data['recordtel'], 'UTF-8');
																			$rll['email'] = mb_strtoupper($data['recordemail'], 'UTF-8');
																			$rll['codificacion'] = mb_strtoupper($data['recordCom'], 'UTF-8');
																			$rll['vistoe'] = 2;
																			// buscamos si no existe el código en la db
																			$campo  = "c_rencrypt";
																			$valor = $rll['c_rencrypt'];
																			$bandera = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																			// el código no existe
																			if ($bandera == "") {
																				// el código no existe | insertamos registro
																				$insertrll = $this -> Model_crm -> insert($tbl_registro_llamada, $rll);
																				// obtenemos el registro que acabamos de insertar
																				$campo  = "c_rencrypt";
																				$valor = $rll['c_rencrypt'];
																				$registro = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																				// insertamos el interes
																				$sill['registro'] = $registro -> id_rll;
																				$sill['status'] = $data['recordIs'];
																				$insertsill = $this -> Model_crm -> insert($tbl_interes_llamada, $sill);
																				// validamos que se inserto correctamente el registro
																				if ($insertrll == "true" && $insertsill == "true") {
																					// se inserto el registro | mandamos alerta de success
																					$popup['title'] = "¡PERFECTO!";
																					$popup['text'] = "Se agregó el registro";
																					$popup['type'] = "success";
																					$popup['ruta'] = "ruta";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('Principal/Header', $header);
																					$this -> load -> view('Principal/Navbar', $navbar);
																					$this -> load -> view('Popup/Popup', $popup);
																					$this -> load -> view('Principal/Footer');
																				}
																				// el registro no se inserto | mandamos alerta de error
																				else {
																					$popup['title'] = "¡ERROR!";
																					$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																					$popup['type'] = "error";
																					$popup['ruta'] = "base";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('Principal/Header', $header);
																					$this -> load -> view('Principal/Navbar', $navbar);
																					$this -> load -> view('Popup/Popup', $popup);
																					$this -> load -> view('Principal/Footer');
																				}
																			}
																			// el codigó ya existe | mandamos alerta de error
																			else {
																				$popup['title'] = "¡ERROR!";
																				$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header', $header);
																				$this -> load -> view('Principal/Navbar', $navbar);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		}
																		// la información no es correcta | mandamos alerta de error
																		else {
																			$popup['title'] = "¡Campo vacio!";
																			$popup['text'] = "Debes selecionar el campo de ¿Le interesa el servicio? Intentalo nuevamente.";
																			$popup['type'] = "error";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header', $header);
																			$this -> load -> view('Principal/Navbar', $navbar);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																	}
																	// el formato no es correcto | mandamos alerta de error
																	else {
																		$popup['title'] = "¡Formato no valido!";
																		$popup['text'] = "No se permiten caracteres especiales en los campos. Intentalo nuevamente.";
																		$popup['type'] = "error";
																		$popup['ruta'] = "base";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('Principal/Header', $header);
																		$this -> load -> view('Principal/Navbar', $navbar);
																		$this -> load -> view('Popup/Popup', $popup);
																		$this -> load -> view('Principal/Footer');
																	}
																}
																// el campo viene vacio | mandamos alerta de error
																else {
																	$popup['title'] = "¡Campo vacio!";
																	$popup['text'] = "Debes selecionar el campo de ¿Le interesa el servicio? Intentalo nuevamente.";
																	$popup['type'] = "error";
																	$popup['ruta'] = "base";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('Principal/Header', $header);
																	$this -> load -> view('Principal/Navbar', $navbar);
																	$this -> load -> view('Popup/Popup', $popup);
																	$this -> load -> view('Principal/Footer');
																}
															}
															// la información del select es NO | validamos que venga el seguimiento
															elseif ($data['recordRl'] == 2) {
																$data['recordDate'] = trim($this -> input -> post('recordDate'));
																$data['recordTime'] = trim($this -> input -> post('recordTime'));
																$data['recordAComen'] = mb_strtoupper($this -> input -> post('recordAComen'), 'UTF-8');
																if ($data['recordDate'] != "0000-00-00" && $data['recordTime'] != "00:00" && $data['recordAComen'] != "") {
																	// si viene información del formulario | validamos si el formato es correcto
																	if (preg_match('/([0-9]{4})\-([0-9]{2})\-([0-9]{2})+$/', $data['recordDate']) &&
																			preg_match('/([0-9]{2})\:([0-9]{2})+$/', $data['recordTime']) &&
																			preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-¿?!¡$%()=_*+{}:;&%#\s\S ]+$/', $data['recordAComen'])) {
																		// formato valido | insertamos el registro
																		$rll['c_registro'] = $this -> generadordecodigo -> c10();
																		$rll['c_rencrypt'] = md5($rll['c_registro']);
																		$rll['usuario'] = $this -> session -> id;
																		$rll['empresa'] = mb_strtoupper($data['companyname'], 'UTF-8');
																		$rll['contacto'] = mb_strtoupper($data['recordname'], 'UTF-8');
																		$rll['telefono'] = mb_strtoupper($data['recordtel'], 'UTF-8');
																		$rll['email'] = mb_strtoupper($data['recordemail'], 'UTF-8');
																		$rll['codificacion'] = mb_strtoupper($data['recordCom'], 'UTF-8');
																		$rll['vistoe'] = 2;
																		// buscamos si no existe el código en la db
																		$campo  = "c_rencrypt";
																		$valor = $rll['c_rencrypt'];
																		$bandera = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																		// validamos si el código no existe
																		if ($bandera == "") {
																			// el código no existe | insertamos registro
																			$insertrll = $this -> Model_crm -> insert($tbl_registro_llamada, $rll);
																			// obtenemos el registro que acabamos de insertar
																			$campo  = "c_rencrypt";
																			$valor = $rll['c_rencrypt'];
																			$registro = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																			// insertamos el seguimiento
																			$sll['c_seguimiento'] = trim($this -> generadordecodigo -> c20());
																			$sll['c_sencrypt'] = md5($sll['c_seguimiento']);
																			$sll['usuario'] = $this -> session -> id;
																			$sll['registro'] = $registro -> id_rll;
																			$sll['fecha'] = $data['recordDate'];
																			$sll['hora'] = $data['recordTime'];
																			$sll['comentario'] = $data['recordAComen'];
																			$sll['vistoe'] = 2;
																			// validamos que no exista el código
																			$campo = "c_sencrypt";
																			$valor = $sll['c_sencrypt'];
																			$seg = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_llamada, $campo, $valor);
																			if ($seg == "") {
																				$insertsll = $this -> Model_crm -> insert($tbl_seguimiento_llamada, $sll);
																				// buscamos el seguimiento
																				$campo = "c_sencrypt";
																				$valor = $sll['c_sencrypt'];
																				$searchfollow = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_llamada, $campo, $valor);
																				// insertamos el historial
																				$sh['c_historial'] = trim($this -> generadordecodigo -> c20());
																				$sh['c_hencrypt'] = trim(md5($sh['c_historial']));
																				$sh['seguimiento'] = $searchfollow -> id_sll;
																				$sh['fecha'] = $searchfollow -> fecha;
																				$sh['hora'] = $searchfollow -> hora;
																				$sh['comentario'] = $searchfollow -> comentario;
																				$sh['fechash'] = date('Y-m-d');
																				$sh['horash'] = date('H:i:s');
																				// validamos si no existe el código
																				$campo  = "c_hencrypt";
																				$valor = $sh['c_hencrypt'];
																				$history = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_historial, $campo, $valor);
																				if ($history == "") {
																					// el código no existe | insertamos los registros
																					$insertsh = $this -> Model_crm -> insert($tbl_seguimiento_historial, $sh);
																					// validamos que se inserto correctamente el registro
																					if ($insertrll == "true" && $insertsll == "true" && $insertsh == "true") {
																						// se inserto el registro | mandamos alerta de success
																						$popup['title'] = "¡PERFECTO!";
																						$popup['text'] = "Se agregó el registro";
																						$popup['type'] = "success";
																						$popup['ruta'] = "ruta";
																						// --------------- VISTAS --------------- //
																						$this -> load -> view('Principal/Header', $header);
																						$this -> load -> view('Principal/Navbar', $navbar);
																						$this -> load -> view('Popup/Popup', $popup);
																						$this -> load -> view('Principal/Footer');
																					}
																					// el registro no se inserto | mandamos alerta de error
																					else {
																						$popup['title'] = "¡ERROR!";
																						$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																						$popup['type'] = "error";
																						$popup['ruta'] = "base";
																						// --------------- VISTAS --------------- //
																						$this -> load -> view('Principal/Header', $header);
																						$this -> load -> view('Principal/Navbar', $navbar);
																						$this -> load -> view('Popup/Popup', $popup);
																						$this -> load -> view('Principal/Footer');
																					}
																				}
																				// el código ya existe | mandamos alerta de error
																				else {
																					$popup['title'] = "¡ERROR!";
																					$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																					$popup['type'] = "error";
																					$popup['ruta'] = "base";
																					// --------------- VISTAS --------------- //
																					$this -> load -> view('Principal/Header', $header);
																					$this -> load -> view('Principal/Navbar', $navbar);
																					$this -> load -> view('Popup/Popup', $popup);
																					$this -> load -> view('Principal/Footer');
																				}
																			}
																			// el código no existe | mandamos alerta de error
																			else {
																				$popup['title'] = "¡ERROR!";
																				$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																				$popup['type'] = "error";
																				$popup['ruta'] = "base";
																				// --------------- VISTAS --------------- //
																				$this -> load -> view('Principal/Header', $header);
																				$this -> load -> view('Principal/Navbar', $navbar);
																				$this -> load -> view('Popup/Popup', $popup);
																				$this -> load -> view('Principal/Footer');
																			}
																		}
																		// el codigó ya existe | mandamos alerta de error
																		else {
																			$popup['title'] = "¡ERROR!";
																			$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																			$popup['type'] = "error";
																			$popup['ruta'] = "base";
																			// --------------- VISTAS --------------- //
																			$this -> load -> view('Principal/Header', $header);
																			$this -> load -> view('Principal/Navbar', $navbar);
																			$this -> load -> view('Popup/Popup', $popup);
																			$this -> load -> view('Principal/Footer');
																		}
																	}
																	// el formato no es correcto | mandamos alerta de error
																	else {
																		$popup['title'] = "¡Formato no valido!";
																		$popup['text'] = "No se permiten caracteres especiales en los campos. Intentalo nuevamente.";
																		$popup['type'] = "error";
																		$popup['ruta'] = "base";
																		// --------------- VISTAS --------------- //
																		$this -> load -> view('Principal/Header', $header);
																		$this -> load -> view('Principal/Navbar', $navbar);
																		$this -> load -> view('Popup/Popup', $popup);
																		$this -> load -> view('Principal/Footer');
																	}
																}
																// no viene información del formulario | mandamos alerta de error
																else {
																	$popup['title'] = "¡ERROR!";
																	$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																	$popup['type'] = "error";
																	$popup['ruta'] = "base";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('Principal/Header', $header);
																	$this -> load -> view('Principal/Navbar', $navbar);
																	$this -> load -> view('Popup/Popup', $popup);
																	$this -> load -> view('Principal/Footer');
																}
															}
															// la información no es correcta | mandamos alerta de error
															else {
																$popup['title'] = "¡Campo vacio!";
																$popup['text'] = "Debes selecionar el campo de ¿Se encuentra el RL o encargado? Intentalo nuevamente.";
																$popup['type'] = "error";
																$popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
																$this -> load -> view('Principal/Header', $header);
																$this -> load -> view('Principal/Navbar', $navbar);
																$this -> load -> view('Popup/Popup', $popup);
																$this -> load -> view('Principal/Footer');
															}
														}
														// el formato no es correcto | mandamos alerta de error
														else {
															$popup['title'] = "¡Formato no valido!";
															$popup['text'] = "No se permiten caracteres especiales en los campos. Intentalo nuevamente.";
															$popup['type'] = "error";
															$popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Popup/Popup', $popup);
															$this -> load -> view('Principal/Footer');
														}
													}
													// el campo viene vacio | mandamos alerta de error
													else {
														$popup['title'] = "¡Campo vacio!";
														$popup['text'] = "Debes selecionar el campo de ¿Se encuentra el RL o encargado? Intentalo nuevamente.";
														$popup['type'] = "error";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
												}
												// la información del select es NO | validamos que venga la tipificación
												elseif ($data['recordCom'] == 2) {
													$data['recordTipi'] = trim($this -> input -> post('recordTipi'));
													if ($data['recordTipi'] != "") {
														// si viene información | validamos el formato
														if (preg_match('/^[0-9]+$/', $data['recordTipi'])) {
															// formato valido | insertamos el registro
															$rll['c_registro'] = $this -> generadordecodigo -> c10();
															$rll['c_rencrypt'] = md5($rll['c_registro']);
															$rll['usuario'] = $this -> session -> id;
															$rll['empresa'] = mb_strtoupper($data['companyname'], 'UTF-8');
															$rll['contacto'] = mb_strtoupper($data['recordname'], 'UTF-8');
															$rll['telefono'] = mb_strtoupper($data['recordtel'], 'UTF-8');
															$rll['email'] = mb_strtoupper($data['recordemail'], 'UTF-8');
															$rll['codificacion'] = mb_strtoupper($data['recordCom'], 'UTF-8');
															$rll['vistoe'] = 2;
															// buscamos si no existe el código en la db
															$campo  = "c_rencrypt";
															$valor = $rll['c_rencrypt'];
															$bandera = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
															// validamos el código
															if ($bandera == "") {
																// el código no existe | insertamos registro
																$insertrll = $this -> Model_crm -> insert($tbl_registro_llamada, $rll);
																// obtenemos el registro que acabamos de insertar
																$campo  = "c_rencrypt";
																$valor = $rll['c_rencrypt'];
																$registro = $this -> Model_crm -> getRowWhere1($tbl_registro_llamada, $campo, $valor);
																// insertamos la tipificación de la llamda
																$tp['registro'] = $registro -> id_rll;
																$tp['status'] = $data['recordTipi'];
																$inserttp = $this -> Model_crm -> insert($tbl_tipificacion_llamada, $tp);
																// validamos que se inserto correctamente el registro
																if ($insertrll == "true" && $inserttp == "true") {
																	// se inserto el registro | mandamos alerta de success
																	$popup['title'] = "¡PERFECTO!";
																	$popup['text'] = "Se agregó el registro";
																	$popup['type'] = "success";
																	$popup['ruta'] = "ruta";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('Principal/Header', $header);
																	$this -> load -> view('Principal/Navbar', $navbar);
																	$this -> load -> view('Popup/Popup', $popup);
																	$this -> load -> view('Principal/Footer');
																}
																// el registro no se inserto | mandamos alerta de error
																else {
																	$popup['title'] = "¡ERROR!";
																	$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																	$popup['type'] = "error";
																	$popup['ruta'] = "base";
																	// --------------- VISTAS --------------- //
																	$this -> load -> view('Principal/Header', $header);
																	$this -> load -> view('Principal/Navbar', $navbar);
																	$this -> load -> view('Popup/Popup', $popup);
																	$this -> load -> view('Principal/Footer');
																}
															}
															// el codigó ya existe | mandamos alerta de error
															else {
																$popup['title'] = "¡ERROR!";
																$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
																$popup['type'] = "error";
																$popup['ruta'] = "base";
																// --------------- VISTAS --------------- //
																$this -> load -> view('Principal/Header', $header);
																$this -> load -> view('Principal/Navbar', $navbar);
																$this -> load -> view('Popup/Popup', $popup);
																$this -> load -> view('Principal/Footer');
															}
														}
														// el formato no es correcto | mandamos alerta de error
														else {
															$popup['title'] = "¡Formato no valido!";
															$popup['text'] = "No se permiten caracteres especiales en los campos. Intentalo nuevamente.";
															$popup['type'] = "error";
															$popup['ruta'] = "base";
															// --------------- VISTAS --------------- //
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Popup/Popup', $popup);
															$this -> load -> view('Principal/Footer');
														}
													}
													// no viene información | mandamor alerta de error
													else {
														$popup['title'] = "¡Campo vacio!";
														$popup['text'] = "Debes tipificar la llamada. Intentalo nuevamente.";
														$popup['type'] = "error";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
												}
												// la información no es correcta | mandamos alerta de error
												else {
													$popup['title'] = "¡Campo vacio!";
													$popup['text'] = "Debes selecionar el campo de ¿Hubo comunicación? Intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											// el formato no es correcto | mandamos alerta de error
											else {
												$popup['title'] = "¡Formato no valido!";
												$popup['text'] = "No se permiten caracteres especiales en los campos. Intentalo nuevamente.";
												$popup['type'] = "error";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
										}
										// no viene información | mandamos alerta de error
										else {
											$popup['title'] = "¡ERROR!";
											$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
											$popup['type'] = "error";
											$popup['ruta'] = "base";
											// --------------- VISTAS --------------- //
											$this -> load -> view('Principal/Header', $header);
											$this -> load -> view('Principal/Navbar', $navbar);
											$this -> load -> view('Popup/Popup', $popup);
											$this -> load -> view('Principal/Footer');
										}
									break;
									// ver mis registros
									case 'view-my-records':
										// obtenemos los seguimientos del empleado
										$campo = "usuario";
										$valor = $this -> session -> id;
										$home['records'] = $this -> Model_crm -> getAllWhere1($tbl_registro_llamada, $campo, $valor);
										// actualizamos el status de visto de todos los registros
										$campo = "vistoe";
										$valor = 1;
										$camposet = "usuario";
										$ruta = $this -> session -> id;
										$this -> Model_crm -> update1($tbl_registro_llamada, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Ejecutivo/Mis registros', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// ver mis seguimientos
									case 'my-follow-ups':
										// obtenemos los seguimientos del empleado
										$campo1 = "registro";
										$campo2 = "id_rll";
										$campo3 = "usuario";
										$valor1 = $this -> session -> id;
										$campo4 = "fecha";
										$valor2 = date('Y-m-d');
										$home['follow'] = $this -> Model_crm -> getAll2InnerWhere2($tbl_seguimiento_llamada, $tbl_registro_llamada, $campo1, $campo2, $campo3, $valor1, $campo4, $valor2);
										// actualizamos el status de visto de todos los registros
										$campo = "vistoe";
										$valor = 1;
										$camposet = "usuario";
										$ruta = $this -> session -> id;
										$this -> Model_crm -> update1($tbl_seguimiento_llamada, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Ejecutivo/Seguimientos', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// editar seguimientos
									case 'follow-edit':
										// validamos si viene el seguimiento
										if (isset($url[0])) {
											// si viene el seguimiento | buscamos el seguimiento
											$campo = "c_sencrypt";
											$valor = $url[0];
											$home['seguimiento'] = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_llamada, $campo, $valor);
											// validamos si existe el seguimiento
											if ($home['seguimiento'] != "") {
												// si viene el seguimiento | buscamos la información
												$campo1 = "registro";
												$campo2 = "id_rll";
												$campo3 = "c_sencrypt";
												$valor1 = $url[0];
												$home['follow'] = $this -> Model_crm -> getRow2InnerWhere1($tbl_seguimiento_llamada, $tbl_registro_llamada, $campo1, $campo2, $campo3, $valor1);
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Ejecutivo/Editar seguimiento', $home);
												$this -> load -> view('Principal/Footer');
											}
											// no viene el seguimiento | redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// no viene información | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// editar los datos del seguimiento
									case 'edit-my-follow':
										// validamos si viene el seguimiento
										if (isset($url[0])) {
											// si viene el seguimiento | buscamos el seguimiento
											$campo = "c_sencrypt";
											$valor = $url[0];
											$home['seguimiento'] = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_llamada, $campo, $valor);
											// validamos si existe el seguimiento
											if ($home['seguimiento'] != "") {
												// si viene el seguimiento | eidtamos el seguimiento
												$campo1 = "fecha";
												$valor1 = mb_strtoupper(trim($this -> input -> post('followfecha')), 'UTF-8');
												$campo2 = "hora";
												$valor2 = mb_strtoupper(trim($this -> input -> post('followtime')), 'UTF-8');
												$campo3 = "comentario";
												$valor3 = mb_strtoupper(trim($this -> input -> post('followcomentarios')), 'UTF-8');
												$camposet = "c_sencrypt";
												$ruta = $home['seguimiento'] -> c_sencrypt;
												$unpdatef = $this -> Model_crm -> update3($tbl_seguimiento_llamada, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3, $camposet, $ruta);
												// insertamos el historial
												$datash['c_historial'] = trim($this -> generadordecodigo -> c20());
												$datash['c_hencrypt'] = trim(md5($datash['c_historial']));
												$datash['seguimiento'] = $home['seguimiento'] -> id_sll;
												$datash['fecha'] = $valor1;
												$datash['hora'] = $valor2;
												$datash['comentario'] = $valor3;
												$datash['fechash'] = date('Y-m-d');
												$datash['horash'] = date('H:i:s');
												// validamos si no existe el código
												$campo  = "c_hencrypt";
												$valor = $datash['c_hencrypt'];
												$history = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_historial, $campo, $valor);
												if ($history == "") {
													// el código no existe | insertamos los registros
													$insertsh = $this -> Model_crm -> insert($tbl_seguimiento_historial, $datash);
													// validamos si se actualizó el seguimiento
													if ($unpdatef == "true" && $insertsh == "true") {
														$popup['title'] = "LISTO!";
														$popup['text'] = "Se actualizó tu seguimiento.";
														$popup['type'] = "success";
														$popup['ruta'] = "ruta";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
													// no se actualizó | mandamos alerta de error
													else {
														$popup['title'] = "¡ERROR!";
														$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
														$popup['type'] = "error";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
												}
												// el código ya existe | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											// no viene el seguimiento | redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// no viene información | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// ver mis prospectos
									case 'view-my-requests':
										// obtenemos los seguimientos del empleado
										$campo1 = "registro";
										$campo2 = "id_rll";
										$campo3 = "usuario";
										$valor1 = $this -> session -> id;
										$home['request'] = $this -> Model_crm -> getAll2InnerWhere1($tbl_prospecto_venta, $tbl_registro_llamada, $campo1, $campo2, $campo3, $valor1);
										// actualizamos el status de visto de todos los registros
										$campo = "vistoe";
										$valor = 1;
										$camposet = "usuario";
										$ruta = $this -> session -> id;
										$this -> Model_crm -> update1($tbl_prospecto_venta, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Ejecutivo/Mis prospectos', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// ver el prospecto
									case 'view-my-request':
										// validamos si viene el prospecto
										if (isset($url[0])) {
											// si viene el prospecto | buscamos el prospecto
											$campo = "c_pencrypt";
											$valor = $url[0];
											$home['prospecto'] = $this -> Model_crm -> getRowWhere1($tbl_prospecto_venta, $campo, $valor);
											// validamos si existe el prospecto
											if ($home['prospecto'] != "") {
												// si viene el prospecto | eidtamos el prospecto
												$campo1 = "registro";
												$campo2 = "id_rll";
												$campo3 = "c_pencrypt";
												$valor1 = $url[0];
												$home['request'] = $this -> Model_crm -> getRow2InnerWhere1($tbl_prospecto_venta, $tbl_registro_llamada, $campo1, $campo2, $campo3, $valor1);
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Ejecutivo/Prospecto', $home);
												$this -> load -> view('Principal/Footer');
											}
											// no viene el prospecto | redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// no viene información | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// ver prospectos sin INE
									case 'request-without-file':
										// obtenemos los prospectos sin INE del empleado
										$campo1 = "registro";
										$campo2 = "id_rll";
										$campo3 = "usuario";
										$valor1 = $this -> session -> id;
										$campo4 = "identificacion";
										$valor2 = 2;
										$home['request'] = $this -> Model_crm -> getAll2InnerWhere2($tbl_prospecto_venta, $tbl_registro_llamada, $campo1, $campo2, $campo3, $valor1, $campo4, $valor2);
										// actualizamos el status de visto de todos los registros
										$campo = "vistoe";
										$valor = 1;
										$camposet = "usuario";
										$ruta = $this -> session -> id;
										$this -> Model_crm -> update1($tbl_prospecto_venta, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Ejecutivo/Prospectos sin archivo', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// actualizar prospecto
									case 'update-request-file':
										// validamos que venga iformación del formulario
										$data['c_pencrypt'] = trim($this -> input -> post('c_pencrypt'));
										if (isset($data['c_pencrypt'])) {
											$data['recordRs'] = trim($this -> input -> post('recordRs'));
											$data['recordNc'] = trim($this -> input -> post('recordNc'));
											$data['id_pv'] = trim($this -> input -> post('id_pv'));
											// obtenemos datos | INE del prospecto
											$namefile = $data['c_pencrypt'];
											$carpeta = 'Docs/INE/'.$namefile;
											$name = $data['recordNc'][0].$data['recordNc'][1].$data['recordNc'][2].$data['recordNc'][3].$data['recordNc'][4]."_INE_".$data['recordRs'][0].$data['recordRs'][1].$data['recordRs'][2];
											if (!file_exists($carpeta)) {
												mkdir($carpeta, 0777, true);
											}
											//Abrimos el directorio de destino
											$file = opendir($carpeta);
											if (!empty($_FILES['recordIneDoc']['name'])) {
												move_uploaded_file($_FILES['recordIneDoc']['tmp_name'],"Docs/INE/$namefile/$name".".png");
												$url_img_Foto = $name.".png";
											}
											//Cerramos el directorio de destino
											closedir($file);
											// insertamos el docuemnto
											$dp['prospecto'] = $data['id_pv'];
											$dp['documento'] = $url_img_Foto;
											$insertdp = $this -> Model_crm -> insert($tbl_documento_prospecto, $dp);
											// actualizamos el status del prospecto
											$campo = "identificacion";
											$valor = 1;
											$camposet = "c_pencrypt";
											$ruta = $data['c_pencrypt'];
											$update = $this -> Model_crm -> update1($tbl_prospecto_venta, $campo, $valor, $camposet, $ruta);
											// validamos que se inserto correctamente el registro
											if ($insertdp == "true" && $update == "true") {
												// se inserto el registro | mandamos alerta de success
												$popup['title'] = "¡PERFECTO!";
												$popup['text'] = "Se actualizó el registro";
												$popup['type'] = "success";
												$popup['ruta'] = "ruta";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
											// el registro no se inserto | mandamos alerta de error
											else {
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
												$popup['type'] = "error";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
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
									// ver prospectos sin contrato
									case 'request-without-doc':
										// obtenemos los prospectos sin contrato del empleado
										$campo1 = "registro";
										$campo2 = "id_rll";
										$campo3 = "usuario";
										$valor1 = $this -> session -> id;
										$campo4 = "contrato";
										$valor2 = 2;
										$home['doc'] = $this -> Model_crm -> getAll2InnerWhere2($tbl_prospecto_venta, $tbl_registro_llamada, $campo1, $campo2, $campo3, $valor1, $campo4, $valor2);
										// actualizamos el status de visto de todos los registros
										$campo = "vistoe";
										$valor = 1;
										$camposet = "usuario";
										$ruta = $this -> session -> id;
										$this -> Model_crm -> update1($tbl_prospecto_venta, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Ejecutivo/Prospectos sin contrato', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// contratos sin firma
									case 'request-without-sign':
										// obtenemos todos los prospectos sin contrato
										$campo1 = "prospecto";
										$campo2 = "id_pv";
										$campo3 = "firma";
										$valor1 = 2;
										$home['doc'] = $this -> Model_crm -> getAll2InnerWhere1($tbl_contrato_prospecto, $tbl_prospecto_venta, $campo1, $campo2, $campo3, $valor1);
										// actualizamos el status de visto de todos los registros
										$campo = "vistoe";
										$valor = 1;
										$camposet = "elavoracion";
										$ruta = $this -> session -> id;
										$this -> Model_crm -> update1($tbl_contrato_prospecto, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Ejecutivo/Contratos sin firma', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// actualizar la firma del contrato
									case 'update-request-sing':
										// validamos que venga información del formulario
										$data['id_cp'] = trim($this -> input -> post('id_cp'));
										if (isset($data['id_cp'])) {
											// viene con información | actualizamos la firma
											$campo = "firma";
											$valor = 1;
											$camposet = "id_cp";
											$ruta = $data['id_cp'];
											$updatecp = $this -> Model_crm -> update1($tbl_contrato_prospecto, $campo, $valor, $camposet, $ruta);
											// validamos si se actualizó la firma
											if ($updatecp == "true") {
												// si se actualizó | mandamos alerta de success
												$popup['title'] = "LISTO!";
												$popup['text'] = "Se agregó la firma al contrato.";
												$popup['type'] = "success";
												$popup['ruta'] = "ruta";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
											// no se actualizó | mandamos alerta de error
											else {
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
												$popup['type'] = "error";
												$popup['ruta'] = "ruta";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
										}
										// viene vacio | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// estatus del folio de los contratos
									case 'request-sheet-number':
										// obtenemos todos los prospectos sin contrato
										$campo1 = "id_pv";
										$campo2 = "prospecto";
										$campo3 = "id_cp";
										$campo4 = "contrato";
										$campo5 = "usuario";
										$valor1 = $this -> session -> id;
										$home['doc'] = $this -> Model_crm -> getAll3InnerWhere1($tbl_prospecto_venta, $tbl_contrato_prospecto, $tbl_folio_contrato, $campo1, $campo2, $campo3, $campo4, $campo5, $valor1);
										// actualizamos el status de visto de todos los registros
										$campo = "vistoe";
										$valor = 1;
										$camposet = "vistoe";
										$ruta = 2;
										$this -> Model_crm -> update1($tbl_folio_contrato, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Ejecutivo/Folios', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// paquetes sin entregar
									case 'undelivered-services':
										// obtenemos todos los servicios sin entregar
										$campo1 = "prospecto";
										$campo2 = "id_pv";
										$campo3 = "entregado";
										$valor1 = 2;
										$home['doc'] = $this -> Model_crm -> getAll2InnerWhere1($tbl_contrato_prospecto, $tbl_prospecto_venta, $campo1, $campo2, $campo3, $valor1);
										// actualizamos el status de visto de todos los registros
										$campo = "vistoe";
										$valor = 1;
										$camposet = "elavoracion";
										$ruta = $this -> session -> id;
										$this -> Model_crm -> update1($tbl_contrato_prospecto, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Ejecutivo/Servicios sin entrega', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// actualizar la entrega del contrato
									case 'update-undelivered-services':
										// validamos que venga información del formulario
										$data['id_cp'] = trim($this -> input -> post('id_cp'));
										if (isset($data['id_cp'])) {
											$data['elavoracion'] = trim($this -> input -> post('elavoracion'));
											// viene con información | actualizamos la entrega
											$campo = "entregado";
											$valor = 1;
											$camposet = "id_cp";
											$ruta = $data['id_cp'];
											$updatecp = $this -> Model_crm -> update1($tbl_contrato_prospecto, $campo, $valor, $camposet, $ruta);
											// agregamos la venta
											$venta['contrato'] = $data['id_cp'];
											$venta['c_venta'] = trim($this -> generadordecodigo -> c10());
											$venta['c_vencrypt'] = md5($venta['c_venta']);
											$venta['ejecutivo'] = $data['elavoracion'];
											$venta['expediente'] = 2;
											$venta['fecha'] = date('Y-m-d');
											$venta['hora'] = date('H:i:s');
											$venta['vistom'] = 2;
											$insertv = $this -> Model_crm -> insert($tbl_ventas, $venta);
											// validamos si se actualizó la firma
											if ($updatecp == "true" && $insertv == "true") {
												// si se actualizó | mandamos alerta de success
												$popup['title'] = "LISTO!";
												$popup['text'] = "Se agregó la entrega del servicio.";
												$popup['type'] = "success";
												$popup['ruta'] = "ruta";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
											// no se actualizó | mandamos alerta de error
											else {
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
												$popup['type'] = "error";
												$popup['ruta'] = "ruta";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
										}
										// viene vacio | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// cerrar sesión
									case 'logout':
										// validamos que este la sesion iniciada
										if (isset($this -> session -> sesion)){
											// la sesión si esta iniciada | validamos que este la sesion sea verdadera
											if ($this -> session -> sesion == "true"){
												// la sesión es verdadera |obtenemso la sesión
												$campo = "tencrypt";
												$valor = $this -> session -> token;
												$sesion = $this -> Model_crm -> getRowWhere1($tbl_iniciar_sesion, $campo, $valor);
												// insertamos el cierre de sesión
												$close['sesion'] = $sesion -> id_s;
												$close['hora'] = date('H:i:s');
												$close['fecha'] = date('Y-m-d');
												$insertcs = $this -> Model_crm -> insert($tbl_cerrar_sesion, $close);
												// validamos que se inserto el cierre de sesión
												if ($insertcs == "true") {
													// valores para la barra de navegación
													$navbar['erllview'] = 0;
													$navbar['esllview'] = 0;
													$navbar['epvview'] = 0;
													$navbar['epvineview'] = 0;
													$navbar['epvdocview'] = 0;
													$navbar['ecpsing'] = 0;
													$navbar['ecpfolio'] = 0;
													$navbar['ecpentrega'] = 0;
													// si se inserto el cierre de sesión | cerramos sesión
													session_destroy();
													// --------------- POPUP --------------- //
													$popup['title'] = "¡HASTA PRONTO!";
													$popup['text'] = "¡Has cerrado sesión!";
													$popup['type'] = "info";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/PopupTime', $popup);
													$this -> load -> view('Principal/Footer');
												}
												// no se inserto el cierre de sesión | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											// la sesión no es verdadera | redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// la sesión no este iniciada | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// la ruta no existe en la db
									default:
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Error404/404');
										$this -> load -> view('Principal/Footer');
									break;
								}
							break;
							// mesa de control
							case 2:
								switch ($metodo -> ruta) {
									// ver prospectos sin contrato
									case 'request-without-doc':
										$campo1 = "registro";
										$campo2 = "id_rll";
										$campo3 = "contrato";
										$valor1 = 2;
										$home['doc'] = $this -> Model_crm -> getAll2InnerWhere1($tbl_prospecto_venta, $tbl_registro_llamada, $campo1, $campo2, $campo3, $valor1);
										// actualizamos el status de visto de todos los registros
										$campo = "vistom";
										$valor = 1;
										$camposet = "vistom";
										$ruta = 2;
										$this -> Model_crm -> update1($tbl_prospecto_venta, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Mesa de control/Prospectos sin contrato', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// agregamos contrato
									case 'update-request-doc':
										// validamos que venga información del formulario
										$data['c_pencrypt'] = $this -> input -> post('c_pencrypt');
										if (isset($data['c_pencrypt'])) {
											// si viene información | obtenemos el registro
											// prospecto
											$campo = "c_pencrypt";
											$valor = $data['c_pencrypt'];
											$data['pv'] = $this -> Model_crm -> getRowWhere1($tbl_prospecto_venta, $campo, $valor);
											// usuario
											$campo = "id_u";
											$valor = $data['pv'] -> usuario;
											$data['usuario'] = $this -> Model_crm -> getRowWhere1($tbl_usuarios, $campo, $valor);
											// actualizamos el status de contrato al prospecto
											$campo = "contrato";
											$valor = 1;
											$camposet = "c_pencrypt";
											$ruta = $data['c_pencrypt'];
											$updatepv = $this -> Model_crm -> update1($tbl_prospecto_venta, $campo, $valor, $camposet, $ruta);
											// insertamos el contrato
											$cp['elavoracion'] = $data['usuario'] -> id_u;
											$cp['prospecto'] = $data['pv'] -> id_pv;
											$cp['entregado'] = 2;
											$cp['firma'] = 2;
											$cp['folio'] = 2;
											$cp['vistoe'] = 2;
											$cp['vistom'] = 2;
											$cp['alerta'] = 2;
											$insertpv = $this -> Model_crm -> insert($tbl_contrato_prospecto, $cp);
											// validamos si se inserto el contrato
											if ($insertpv == "true" && $updatepv == "true") {
												// si se inserto | mandamos alerta de success
												$popup['title'] = "LISTO!";
												$popup['text'] = "Se agregó un contrato al prospecto.";
												$popup['type'] = "success";
												$popup['ruta'] = "ruta";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
											// no se inserto | mandamos alerta de error
											else {
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
												$popup['type'] = "error";
												$popup['ruta'] = "ruta";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
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
									// contratos sin folio
									case 'request-without-sheet-number':
										// obtenemos todos los prospectos sin contrato
										$campo1 = "prospecto";
										$campo2 = "id_pv";
										$campo3 = "folio";
										$valor1 = 2;
										$home['doc'] = $this -> Model_crm -> getAll2InnerWhere1($tbl_contrato_prospecto, $tbl_prospecto_venta, $campo1, $campo2, $campo3, $valor1);
										// actualizamos el status de visto de todos los registros
										$campo = "vistom";
										$valor = 1;
										$camposet = "vistom";
										$ruta = 2;
										$this -> Model_crm -> update1($tbl_contrato_prospecto, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Mesa de control/Contratos sin folio', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// actualizar el folio del contrato
									case 'update-request-without-sheet-number':
										// validamos que venga información del formulario
										$data['id_cp'] = mb_strtoupper(trim($this -> input -> post('id_cp')), 'UTF-8');
										$data['folio'] = mb_strtoupper(trim($this -> input -> post('folio')), 'UTF-8');
										if (isset($data['id_cp'])) {
											// viene con información | validamos el formato
											if (preg_match('/^[0-9]+$/', $data['folio'])) {
												// el formato es correcto | insertamos el folio
												$campo = "folio";
												$valor = 1;
												$camposet = "id_cp";
												$ruta = $data['id_cp'];
												$updatecp = $this -> Model_crm -> update1($tbl_contrato_prospecto, $campo, $valor, $camposet, $ruta);
												// agregamos un folio
												$fc['contrato'] = $data['id_cp'];
												$fc['folio'] = $data['folio'];
												$fc['fencrypt'] = md5($fc['folio']);
												$fc['vistoe'] = 2;
												$fc['alerta'] = 2;
												$insertfc = $this -> Model_crm -> insert($tbl_folio_contrato, $fc);
												// validamos si se actualizó el folio
												if ($updatecp == "true" && $insertfc == "true") {
													// si se actualizó | mandamos alerta de success
													$popup['title'] = "LISTO!";
													$popup['text'] = "Se agregó un folio al contrato.";
													$popup['type'] = "success";
													$popup['ruta'] = "ruta";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
												// no se actualizó | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "ruta";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											// el formato no es correcto | mandamos alerta de error
											else {
												// --------------- POPUP --------------- //
											 $popup['title'] = "¡ERROR!";
											 $popup['text'] = "No se aceptan caracteres especiales en los campos.";
											 $popup['type'] = "error";
											 $popup['ruta'] = "base";
											 // --------------- VISTAS --------------- //
											 $this -> load -> view('Principal/Header', $header);
											 $this -> load -> view('Principal/Navbar', $navbar);
											 $this -> load -> view('Popup/Popup', $popup);
											 $this -> load -> view('Principal/Footer');
											}
										}
										// viene vacio | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// vista de todas las ventas
									case 'files':
										// obtenemos todas las ventas
										$campo1 = "contrato";
										$campo2 = "id_cp";
										$campo3 = "prospecto";
										$campo4 = "id_pv";
										$campo5 = "registro";
										$campo6 = "id_rll";
										$home['ventas'] = $this -> Model_crm -> getAll4Inner($tbl_ventas, $tbl_contrato_prospecto, $tbl_prospecto_venta, $tbl_registro_llamada, $campo1, $campo2, $campo3, $campo4, $campo5, $campo6);
										$home['case'] = $this -> Model_crm -> getAll($tbl_expediente_venta);
										// actualizamos el status de visto de todos los registros
										$campo = "vistom";
										$valor = 1;
										$camposet = "vistom";
										$ruta = 2;
										$this -> Model_crm -> update1($tbl_ventas, $campo, $valor, $camposet, $ruta);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Mesa de control/Expedientes', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// desacragr expediente
									case 'download-case-file':
										// validamos que venga inforamción en la url
										if (isset($url[0])) {
											// si viene información| buscamos el registro en la db
											$campo = "c_vencrypt";
											$valor = $url[0];
											$data['ventas'] = $this -> Model_crm -> getRowWhere1($tbl_ventas, $campo, $valor);
											// validamos que la venta si existe
											if ($data['ventas'] != "") {
												// si existe información | buscamos el expediente
												$campo = "venta";
												$valor = $data['ventas'] -> id_v;
												$data['case'] = $this -> Model_crm -> getRowWhere1($tbl_expediente_venta, $campo, $valor);
												// validamos que el expediente si existe
												if ($data['case'] != "") {
													// si existe el expediente | descargamos el expediente
													$zipname = $data['ventas'] -> c_vencrypt.".zip";
													header("Content-disposition: attachment; filename=".$zipname);
													header("Content-type: application/pdf");
													readfile("Docs/Case-file/".$zipname);
													unlink($zipname);
												}
												// no existe el expediente en la db | redirigimos a la página principal
												else {
													redirect(base_url());
													exit();
												}
											}
											// no se encuentra el registro | redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// no viene información | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// generar expediente
									case 'case-file':
										// validamos que venga inforamción en la url
										if (isset($url[0])) {
											// si viene información| buscamos el registro en la db
											$campo = "c_vencrypt";
											$valor = $url[0];
											$ventas = $this -> Model_crm -> getRowWhere1($tbl_ventas, $campo, $valor);
											// validamos si existe la venta
											if ($ventas != "") {
												// si exite | obtenemos la venta
												$campo1 = "contrato";
												$campo2 = "id_cp";
												$campo3 = "prospecto";
												$campo4 = "id_pv";
												$campo5 = "registro";
												$campo6 = "id_rll";
												$campo7 = "c_vencrypt";
												$valor1 = $url[0];
												$home['file'] = $this -> Model_crm -> getRow4InnerWhere1($tbl_ventas, $tbl_contrato_prospecto, $tbl_prospecto_venta, $tbl_registro_llamada, $campo1, $campo2, $campo3, $campo4, $campo5, $campo6, $campo7, $valor1);
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Mesa de control/Generar expediente', $home);
												$this -> load -> view('Principal/Footer');
											}
											// no se encuentra el registro | redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// no viene información | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// agregar expediente
									case 'add-case-file':
										// validamos que venga información del formulario
										$data['c_vencrypt'] = trim($this -> input -> post('c_vencrypt'));
										if (isset($data['c_vencrypt'])) {
											// si viene información | buscamos la venta en la db
											$campo = "c_vencrypt";
											$valor = $data['c_vencrypt'];
											$venta = $this -> Model_crm -> getRowWhere1($tbl_ventas, $campo, $valor);
											// validamos que la venta exista
											if ($venta != "") {
												// si existe la venta | agregamos epediente
												$namefile = $data['c_vencrypt'];
												$carpeta = 'Docs/Case-file/'.$namefile;
												$namel = "Layout_".$namefile;
												$namefc = "Formato_carga_".$namefile;
												$nameoc = "Oferta_comercial_".$namefile;
												$namecf = "Contrato_firmado_".$namefile;
												$nameine = "INE_".$namefile;
												$namep = "Paternidad_".$namefile;
												if (!file_exists($carpeta)) {
													mkdir($carpeta, 0777, true);
												}
												//Abrimos el directorio de destino
												$file = opendir($carpeta);
												// layout
												if (!empty($_FILES['layout']['name'])) {
													move_uploaded_file($_FILES['layout']['tmp_name'],"Docs/Case-file/$namefile/$namel".".xlsx");
													$url_layout = $namel.".xlsx";
												}
												// Formato de carga
												if (!empty($_FILES['carga']['name'])) {
													move_uploaded_file($_FILES['carga']['tmp_name'],"Docs/Case-file/$namefile/$namefc".".xlsx");
													$url_fc = $namefc.".xlsx";
												}
												// Oferta comercial
												if (!empty($_FILES['oferta']['name'])) {
													move_uploaded_file($_FILES['oferta']['tmp_name'],"Docs/Case-file/$namefile/$nameoc".".pdf");
													$url_oc = $nameoc.".pdf";
												}
												// Contrato firmado
												if (!empty($_FILES['contrato']['name'])) {
													move_uploaded_file($_FILES['contrato']['tmp_name'],"Docs/Case-file/$namefile/$namecf".".pdf");
													$url_cf = $namecf.".pdf";
												}
												// INE
												if (!empty($_FILES['ine']['name'])) {
													move_uploaded_file($_FILES['ine']['tmp_name'],"Docs/Case-file/$namefile/$nameine".".pdf");
													$url_ine = $nameine.".pdf";
												}
												// Paternidad
												if (!empty($_FILES['paternidad']['name'])) {
													move_uploaded_file($_FILES['paternidad']['tmp_name'],"Docs/Case-file/$namefile/$namep".".pdf");
													$url_p = $namep.".pdf";
												}
												//Cerramos el directorio de destino
												closedir($file);
												$zip = new ZipArchive();
												$filename = "Docs/Case-file/".$namefile.".zip";
												if ($zip -> open($filename, ZipArchive::CREATE) !== TRUE) {
													exit("cannot open <$filename>\n");
												}
												$zip -> addFile($carpeta."/".$url_layout, $url_layout);
												$zip -> addFile($carpeta."/".$url_fc, $url_fc);
												$zip -> addFile($carpeta."/".$url_oc, $url_oc);
												$zip -> addFile($carpeta."/".$url_cf, $url_cf);
												$zip -> addFile($carpeta."/".$url_ine, $url_ine);
												$zip -> addFile($carpeta."/".$url_p, $url_p);
												$zip -> close();
												$case['venta'] = $venta -> id_v;
												$case['layout'] = $url_layout;
												$case['formato_carga'] = $url_fc;
												$case['oferta_comercial'] = $url_oc;
												$case['contrato_firmado'] = $url_cf;
												$case['ine'] = $url_ine;
												$case['paternidad'] = $url_p;
												$insertc = $this -> Model_crm -> insert($tbl_expediente_venta, $case);
												// actualizamos el estatus de expediente de la venta
												$campo = "expediente";
												$valor = 1;
												$camposet = "id_v";
												$ruta = $venta -> id_v;
												$updatev = $this -> Model_crm -> update1($tbl_ventas, $campo, $valor, $camposet, $ruta);
												// validamos si se inserto el expediente
												if ($insertc == "true" && $updatev == "true") {
													// si se inserto | mandamos alerta de success
													$popup['title'] = "PERFECTO!";
													$popup['text'] = "Se agrego el expediente.";
													$popup['type'] = "success";
													$popup['ruta'] = "ruta";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
												// no se inserto | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											// la venta no existe| redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// no viene información del formulario | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// cerrar sesión
									case 'logout':
										// validamos que este la sesion iniciada
										if (isset($this -> session -> sesion)){
											// la sesión si esta iniciada | validamos que este la sesion sea verdadera
											if ($this -> session -> sesion == "true"){
												// la sesión es verdadera |obtenemso la sesión
												$campo = "tencrypt";
												$valor = $this -> session -> token;
												$sesion = $this -> Model_crm -> getRowWhere1($tbl_iniciar_sesion, $campo, $valor);
												// insertamos el cierre de sesión
												$close['sesion'] = $sesion -> id_s;
												$close['hora'] = date('H:i:s');
												$close['fecha'] = date('Y-m-d');
												$insertcs = $this -> Model_crm -> insert($tbl_cerrar_sesion, $close);
												// validamos que se inserto el cierre de sesión
												if ($insertcs == "true") {
													// valores para la barra de navegación
													$navbar['mpvdocview'] = 0;
													$navbar['mcpfolio'] = 0;
													$navbar['mvview'] = 0;
													// si se inserto el cierre de sesión | cerramos sesión
													session_destroy();
													// --------------- POPUP --------------- //
													$popup['title'] = "¡HASTA PRONTO!";
													$popup['text'] = "¡Has cerrado sesión!";
													$popup['type'] = "info";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/PopupTime', $popup);
													$this -> load -> view('Principal/Footer');
												}
												// no se inserto el cierre de sesión | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											// la sesión no es verdadera | redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// la sesión no este iniciada | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// la ruta no existe en la db
									default:
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Error404/404');
										$this -> load -> view('Principal/Footer');
									break;
								}
							break;
							// supervisor
							case 3:
								switch ($metodo -> ruta) {
									// ver mis licencias
									case 'licenses':
										// buscamos la suscripción
										$campo = "id_s";
										$valor = $header['empresa'] -> suscripcion;
										$home['suscripcion'] = $this -> Model_crm -> getRowWhere1($tbl_suscripcion, $campo, $valor);
										// mandamos la empresa
										$home['empresa'] = $header['empresa'];
										// obtenemos los tipos de empleado
										$home['tipo_emp'] = $this -> Model_crm -> getAll($tbl_status_tipo_empleado);
										// obtenemos todas las licencias con las que cuenta la empresa
										$campo1 = "id_l";
										$campo2 = "licencia";
										$campo3 = "puesto";
										$campo4 = "id_te";
										$campo5 = "empresa";
										$valor1 = $home['empresa'] -> id_e;
										$campo6 = "status";
										$valor2 = 1;
										$home['licencias'] = $this -> Model_crm -> getAll3InnerWhere2($tbl_licencias, $tbl_usuarios, $tbl_status_tipo_empleado, $campo1, $campo2, $campo3, $campo4, $campo5, $valor1, $campo6, $valor2);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Empresa/Licencias de empresas', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// agregar nueva licencia
									case 'add-license':
										// obtenemos los valores para la licencia
										$license['status'] = 1;
										$license['empresa'] = trim($this -> input -> post('empresaidlicense'));
										$license['apaterno'] = mb_strtoupper(trim($this -> input -> post('aplicense')), 'UTF-8');
										$license['amaterno'] = mb_strtoupper(trim($this -> input -> post('amlicense')), 'UTF-8');
										$license['nombre'] = mb_strtoupper(trim($this -> input -> post('namelicense')), 'UTF-8');
										$user['puesto'] = trim($this -> input -> post('puestolicense'));
										$license['usuario'] = trim($this -> input -> post('userlicense'));
										$license['uencrypt'] = trim(md5($license['usuario']));
										$license['password'] = trim($this -> input -> post('passlicense'));
										$license['pencrypt'] = trim(md5($license['password']));
										// validamos que los campos de usuario y contraseña no vengan vacios
										if ($license['usuario'] != "" && $license['password'] != "" && $user['puesto'] != "selecciona-una-opcion") {
											// si viene información | validamos el formato de los valores
											if (preg_match('/^[0-9]+$/', $license['empresa']) &&
													preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $license['apaterno']) &&
													preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $license['amaterno']) &&
													preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/', $license['nombre']) &&
													preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]+$/', $license['usuario']) &&
													preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]+$/', $license['password'])) {
												// si es el formato correcto | validamos que no exista el usuario o la contraseña en la db
												$campo = "userencrypt";
												$valor = $license['uencrypt'];
												$usuario = $this -> Model_crm -> getRowWhere1($tbl_usuarios, $campo, $valor);
												$campo = "passencrypt";
												$valor = $license['pencrypt'];
												$pass = $this -> Model_crm -> getRowWhere1($tbl_usuarios, $campo, $valor);
												if ($usuario == "" && $pass == "") {
													// el usuario y la contraseña no existe | insertamos la licencia
													$linsert = $this -> Model_crm -> insert($tbl_licencias, $license);
													// obtenemos la licencia para agregarla al usuario
													$campo1 = "uencrypt";
													$valor1 = $license['uencrypt'];
													$campo2 = "pencrypt";
													$valor2 = $license['pencrypt'];
													$licencia = $this -> Model_crm -> getRowWhere2($tbl_licencias, $campo1, $valor1, $campo2, $valor2);
													// obetenemos los valores para el usuario
													$user['status'] = 1;
													$user['licencia'] = $licencia -> id_l;
													$user['usuario'] = $license['usuario'];
													$user['userencrypt'] = $license['uencrypt'];
													$user['contraseña'] = $license['password'];
													$user['passencrypt'] = $license['pencrypt'];
													$user['tipo_usuario'] = 2;
													// insertamos el usuario
													$uinsert = $this -> Model_crm -> insert($tbl_usuarios, $user);
													if ($linsert == "true" && $uinsert = "true") {
														$popup['title'] = "¡LISTO!";
														$popup['text'] = "Felicidades se agregó tu nuevo usuario.";
														$popup['type'] = "success";
														$popup['ruta'] = "ruta";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
													// no se insertaron | mandamos alerta de error
													else {
														$popup['title'] = "¡ERROR!";
														$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
														$popup['type'] = "error";
														$popup['ruta'] = "base";
														// --------------- VISTAS --------------- //
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Popup/Popup', $popup);
														$this -> load -> view('Principal/Footer');
													}
												}
												// el usuario ya existe | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos el usuario ya existe. Intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											// no es el formato correcto | mandamos alerta de error
											else {
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "Lo sentimos no se aceptan caracteres especiales en los campos.";
												$popup['type'] = "error";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
										}
										// los campos vienen vacios | mandamos alera de error
										else {
											$popup['title'] = "¡ERROR!";
											$popup['text'] = "Lo sentimos no se generó el usuario y la contraseña. Intentalo nuevamente.";
											$popup['type'] = "error";
											$popup['ruta'] = "base";
											// --------------- VISTAS --------------- //
											$this -> load -> view('Principal/Header', $header);
											$this -> load -> view('Principal/Navbar', $navbar);
											$this -> load -> view('Popup/Popup', $popup);
											$this -> load -> view('Principal/Footer');
										}
									break;
									// eliminar una licencia
									case 'delete-licenses':
										// validamos que la licencia venga en la ruta
										if (isset($url[0])) {
											// si viene la licencia | validamos que exista en la db
											$campo = "uencrypt";
											$valor = $url[0];
											$licencia = $this -> Model_crm -> getRowWhere1($tbl_licencias, $campo, $valor);
											if ($licencia != "") {
												// si existe a licencia | damos de baja la licencia
												$campo = "status";
												$valor = 2;
												$camposet = "uencrypt";
												$ruta = $url[0];
												$lupdate = $this -> Model_crm -> update1($tbl_licencias, $campo, $valor, $camposet, $ruta);
												// damos de baja al usuario
												$campo = "status";
												$valor = 2;
												$camposet = "userencrypt";
												$ruta = $url[0];
												$uupdate = $this -> Model_crm -> update1($tbl_usuarios, $campo, $valor, $camposet, $ruta);
												if ($lupdate == "true" && $uupdate == "true") {
													// si se actualizó | mandamos alerta de success
													$popup['title'] = "¡LISTO!";
													$popup['text'] = "Se elimino tu usuario. Sigue disfrutando del CRM.";
													$popup['type'] = "success";
													$popup['ruta'] = "ruta";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
												// no se actualizó | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "ruta";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											// la licencia no existe | mandamos alerta de error
											else {
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
												$popup['type'] = "error";
												$popup['ruta'] = "ruta";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
										}
										// la licencia viene vacia | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// ver el historial de las llamdas
									case 'call-history':
										// obtenemos todos los registros del historial
										$campo1 = "id_l";
										$campo2 = "licencia";
										$campo3 = "id_u";
										$campo4 = "usuario";
										$campo5 = "id_sll";
										$campo6 = "seguimiento";
										$campo7 = "empresa";
										$valor1 = $this -> session -> company;
										$groupfor = "seguimiento";
										$home['historial'] = $this -> Model_crm -> getAll4InnerWhere1GroupBy($tbl_licencias, $tbl_usuarios, $tbl_seguimiento_llamada, $tbl_seguimiento_historial, $campo1, $campo2, $campo3, $campo4, $campo5, $campo6, $campo7, $valor1, $groupfor);
										// echo "<pre>"; print_r($home); echo "</pre>"; die();
										// $home['historial'] = $this -> Model_crm -> getAllGroupBy($tbl_seguimiento_historial, $groupfor);
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Empresa/Historial', $home);
										$this -> load -> view('Principal/Footer');
									break;
									// ver el historial de un registro
									case 'view-history':
										// validamos si viene el registro
										if (isset($url[0])) {
											// si viene el registro | buscamos el registro
											$campo = "seguimiento";
											$valor = $url[0];
											$home['history'] = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_historial, $campo, $valor);
											// validamos si existe el registro
											if ($home['history'] != "") {
												// si viene el seguimiento | buscamos la información
												// $campo1 = "seguimiento";
												// $campo2 = "id_sll";
												// $campo3 = "usuario";
												// $campo4 = "id_u";
												// $campo5 = "licencia";
												// $campo6 = "id_l";
												// $campo7 = "seguimiento";
												// $valor1 = $url[0];
												// $home['follow'] = $this -> Model_crm -> getAll4InnerWhere1($tbl_seguimiento_historial, $tbl_seguimiento_llamada, $tbl_usuarios, $tbl_licencias, $campo1, $campo2, $campo3, $campo4, $campo5, $campo6, $campo7, $valor1);
												$campo = "seguimiento";
												$valor = $url[0];
												$home['history'] = $this -> Model_crm -> getAllWhere1($tbl_seguimiento_historial, $campo, $valor);
												$campo1 = "usuario";
												$campo2 = "id_u";
												$campo3 = "licencia";
												$campo4 = "id_l";
												$campo5 = "id_sll";
												$valor1 = $url[0];
												$home['follow'] = $this -> Model_crm -> getRow3InnerWhere1($tbl_seguimiento_llamada, $tbl_usuarios, $tbl_licencias, $campo1, $campo2, $campo3, $campo4, $campo5, $valor1);
												// // obtenemos los usuarios
												// $home['users'] = $this -> Model_crm -> getAll($tbl_usuarios);
												// // obtenemos los seguimientos
												// $campo = "id_sll";
												// $valor = $url[0];
												// $home['follow'] = $this -> Model_crm -> getRowWhere1($tbl_seguimiento_llamada, $campo, $valor);
												// echo "<pre>"; print_r($home); echo "</pre>"; die();
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Empresa/Historial de un registro', $home);
												$this -> load -> view('Principal/Footer');
											}
											// no viene el registro | redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// no viene información | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// reportes
									case 'reports':
										// validamos que venga el tipo de reporte
										if (isset($url[0])) {
											$campo1 = "ruta";
											$valor1 = $url[0];
											$campo2 = "usuario";
											$valor2 = $this -> session -> puesto;
											$metodo = $this -> Model_crm -> getRowWhere2Like($tbl_metodos_permitidos, $campo1, $valor1, $campo2, $valor2);
											// validamos que el metodo existe en la db
											if ($metodo != "") {
												switch ($url[0]) {
													// reporte de ventas
													case 'request':
														$count = "id_rll";
														$alias = "total";
														$select1 = "usuario";
														$select2 = "apaterno";
														$select3 = "amaterno";
														$select4 = "nombre";
														$campo1 = "usuario";
														$campo2 = "id_u";
														$campo3 = "licencia";
														$campo4 = "id_l";
														$campo5 = "empresa";
														$valor1 = $this -> session -> company;
														$groupfor = "usuario";
														$order = "DESC";
														// $home['request'] = $this -> Model_crm -> get4Rows3InnerGroupByOrderBy($count, $alias, $select1, $select2, $select3, $select4, $tbl_registro_llamada, $tbl_usuarios, $campo1, $campo2, $tbl_licencias, $campo3, $campo4, $groupfor, $order);
														$home['request'] = $this -> Model_crm -> get4Rows3InnerWhere1GroupByOrderBy1($count, $alias, $select1, $select2, $select3, $select4, $tbl_registro_llamada, $tbl_usuarios, $campo1, $campo2, $tbl_licencias, $campo3, $campo4, $campo5, $valor1, $groupfor, $order);
														// titulo de la vista
														$home['tittle'] = "<h1> Total de registros </h1>";
														// mensaje de la vista
														$home['msn'] = "<h1> Sin registros </h1>";
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Empresa/Reportes/Registro de llamadas', $home);
														$this -> load -> view('Principal/Footer');
													break;
													case 'sales':
														$data['day'] = trim($this -> input -> post('day'));
														$data['month'] = trim($this -> input -> post('month'));
														$data['year'] = trim($this -> input -> post('year'));
														$data['ejecutivo'] = trim($this -> input -> post('ejecutivo'));
														// obtenemos los ejecutivos para el select
														$campo1 = "id_l";
														$campo2 = "licencia";
														$campo3 = "empresa";
														$valor1 = $this -> session -> company;
														$campo4 = "puesto";
														$valor2 = 1;
														$campo5 = "status";
														$valor3 = 1;
														$home['licencias'] = $this -> Model_crm -> getAll2InnerWhere3($tbl_licencias, $tbl_usuarios, $campo1, $campo2, $campo3, $valor1, $campo4, $valor2, $campo5, $valor3);
														if ($data['ejecutivo'] != "" || $data['ejecutivo'] != "selecciona-un-ejecutivo") {
															// obtenemos al ejecutivo
															$campo1 = "licencia";
															$campo2 = "id_l";
															$campo3 = "id_u";
															$valor1 = $data['ejecutivo'];
															$ejecutivo = $this -> Model_crm -> getRow2InnerWhere1($tbl_usuarios, $tbl_licencias, $campo1, $campo2, $campo3, $valor1);
														}
														else {
															$ejecutivo = "";
														}
														// validamos si viene información del fomulario
														if ($data['day'] == "" && $data['month'] == "" && $data['year'] == "" && $data['ejecutivo'] == "selecciona-un-ejecutivo" || $data['ejecutivo'] == "") {
															// no viene informacion | obtenemos las ventas totales
															$count = "id_v";
															$alias = "total";
															$select1 = "ejecutivo";
															$select2 = "apaterno";
															$select3 = "amaterno";
															$select4 = "nombre";
															$campo1 = "ejecutivo";
															$campo2 = "id_u";
															$campo3 = "licencia";
															$campo4 = "id_l";
															$campo5 = "empresa";
															$valor1 = $this -> session -> company;
															$groupfor = "ejecutivo";
															$order = "DESC";
															$home['ventas'] = $this -> Model_crm -> get4Rows3InnerWhere1GroupByOrderBy2($count, $alias, $select1, $select2, $select3, $select4, $tbl_ventas, $tbl_usuarios, $campo1, $campo2, $tbl_licencias, $campo3, $campo4, $campo5, $valor1, $groupfor, $order);
															// titulo de la vista
															$home['tittle'] = "<h1> Total de ventas </h1>";
															// mensaje de la vista
															$home['msn'] = "<h1> Sin registros </h1>";
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Empresa/Reportes/Ventas', $home);
															$this -> load -> view('Principal/Footer');
														}
														// buscamos las ventas por día
														else if ($data['day'] != "" && $data['month'] == "" && $data['year'] == "" && $data['ejecutivo'] == "selecciona-un-ejecutivo") {
															$count = "id_v";
															$alias = "total";
															$select1 = "ejecutivo";
															$select2 = "apaterno";
															$select3 = "amaterno";
															$select4 = "nombre";
															$campo1 = "ejecutivo";
															$campo2 = "id_u";
															$campo3 = "licencia";
															$campo4 = "id_l";
															$campo5 = "fecha";
															$valor1 = $data['day'];
															$groupfor = "ejecutivo";
															$order = "DESC";
															$home['ventas'] = $this -> Model_crm -> get4Rows3InnerWhere1GroupByOrderBy($count, $alias, $select1, $select2, $select3, $select4, $tbl_ventas, $tbl_usuarios, $campo1, $campo2, $tbl_licencias, $campo3, $campo4, $campo5, $valor1, $groupfor, $order);
															// convertimos la fecha en letra
															$fecha = $this -> generadordefecha -> convert_date_to_letter($data['day']);
															// titulo de la vista
															$home['tittle'] = "<h1> Ventas el día <small class='text-danger'>".$fecha."</small> </h1>";
															// mensaje de la vista
															$home['msn'] = "<h1> Sin registros el día <small class='text-danger'>".$fecha."</small> </h1>";
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Empresa/Reportes/Ventas', $home);
															$this -> load -> view('Principal/Footer');
														}
														// buscamos las ventas por día y por ejecutivo
														else if ($data['day'] != "" && $data['month'] == "" && $data['year'] == "" && $data['ejecutivo'] != "selecciona-un-ejecutivo") {
															$count = "id_v";
															$alias = "total";
															$select1 = "ejecutivo";
															$select2 = "apaterno";
															$select3 = "amaterno";
															$select4 = "nombre";
															$campo1 = "ejecutivo";
															$campo2 = "id_u";
															$campo3 = "licencia";
															$campo4 = "id_l";
															$campo5 = "fecha";
															$valor1 = $data['day'];
															$campo6 = "ejecutivo";
															$valor2 = $data['ejecutivo'];
															$groupfor = "ejecutivo";
															$order = "DESC";
															$home['ventas'] = $this -> Model_crm -> get4Rows3InnerWhere2GroupByOrderBy($count, $alias, $select1, $select2, $select3, $select4, $tbl_ventas, $tbl_usuarios, $campo1, $campo2, $tbl_licencias, $campo3, $campo4, $campo5, $valor1, $campo6, $valor2, $groupfor, $order);
															// convertimos la fecha en letra
															$fecha = $this -> generadordefecha -> convert_date_to_letter($data['day']);
															// titulo de la vista
															$home['tittle'] = "<h1> Ventas de <small class='text-danger'>".$ejecutivo -> apaterno." ".$ejecutivo -> amaterno." ".$ejecutivo -> nombre." </small> <br> el día <small class='text-danger'>".$fecha."</small> </h1>";
															// mensaje de la vista
															$home['msn'] = "<h1> Sin registros de <small class='text-danger'>".$ejecutivo -> apaterno." ".$ejecutivo -> amaterno." ".$ejecutivo -> nombre." </small> <br> el día <small class='text-danger'>".$fecha."</small> </h1>";
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Empresa/Reportes/Ventas', $home);
															$this -> load -> view('Principal/Footer');
														}
														// buscamos las ventas por mes
														else if ($data['day'] == "" && $data['month'] != "" && $data['year'] == "" && $data['ejecutivo'] == "selecciona-un-ejecutivo") {
															$count = "id_v";
															$alias = "total";
															$select1 = "ejecutivo";
															$select2 = "apaterno";
															$select3 = "amaterno";
															$select4 = "nombre";
															$campo1 = "ejecutivo";
															$campo2 = "id_u";
															$campo3 = "licencia";
															$campo4 = "id_l";
															$campo5 = "fecha";
															$valor1 = $data['month'];
															$groupfor = "ejecutivo";
															$order = "DESC";
															$home['ventas'] = $this -> Model_crm -> get4Rows3InnerWhere1LikeGroupByOrderBy($count, $alias, $select1, $select2, $select3, $select4, $tbl_ventas, $tbl_usuarios, $campo1, $campo2, $tbl_licencias, $campo3, $campo4, $campo5, $valor1, $groupfor, $order);
															// convertimos la fecha en letra
															$fecha = $this -> generadordefecha -> convert_date_to_letter($data['month']);
															// titulo de la vista
															$home['tittle'] = "<h1> Ventas el mes de <small class='text-danger'>".$fecha."</small> </h1>";
															// mensaje de la vista
															$home['msn'] = "<h1> Sin registros el mes de <small class='text-danger'>".$fecha."</small> </h1>";
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Empresa/Reportes/Ventas', $home);
															$this -> load -> view('Principal/Footer');
														}
														// buscamos las ventas por mes y ejecutivo
														else if ($data['day'] == "" && $data['month'] != "" && $data['year'] == "" && $data['ejecutivo'] != "selecciona-un-ejecutivo") {
															$count = "id_v";
															$alias = "total";
															$select1 = "ejecutivo";
															$select2 = "apaterno";
															$select3 = "amaterno";
															$select4 = "nombre";
															$campo1 = "ejecutivo";
															$campo2 = "id_u";
															$campo3 = "licencia";
															$campo4 = "id_l";
															$campo5 = "fecha";
															$valor1 = $data['month'];
															$campo6 = "ejecutivo";
															$valor2 = $data['ejecutivo'];
															$groupfor = "ejecutivo";
															$order = "DESC";
															$home['ventas'] = $this -> Model_crm -> get4Rows3InnerWhereLike2GroupByOrderBy($count, $alias, $select1, $select2, $select3, $select4, $tbl_ventas, $tbl_usuarios, $campo1, $campo2, $tbl_licencias, $campo3, $campo4, $campo5, $valor1, $campo6, $valor2, $groupfor, $order);
															// convertimos la fecha en letra
															$fecha = $this -> generadordefecha -> convert_date_to_letter($data['month']);
															// titulo de la vista
															$home['tittle'] = "<h1> Ventas de <small class='text-danger'>".$ejecutivo -> apaterno." ".$ejecutivo -> amaterno." ".$ejecutivo -> nombre." </small> <br> en el mes de <small class='text-danger'>".$fecha."</small> </h1>";
															// mensaje de la vista
															$home['msn'] = "<h1> Sin registros de <small class='text-danger'>".$ejecutivo -> apaterno." ".$ejecutivo -> amaterno." ".$ejecutivo -> nombre." </small> <br> en el mes de <small class='text-danger'>".$fecha."</small> </h1>";
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Empresa/Reportes/Ventas', $home);
															$this -> load -> view('Principal/Footer');
														}
														// buscamos las ventas por año
														else if ($data['day'] == "" && $data['month'] == "" && $data['year'] != "" && $data['ejecutivo'] == "selecciona-un-ejecutivo") {
															$count = "id_v";
															$alias = "total";
															$select1 = "ejecutivo";
															$select2 = "apaterno";
															$select3 = "amaterno";
															$select4 = "nombre";
															$campo1 = "ejecutivo";
															$campo2 = "id_u";
															$campo3 = "licencia";
															$campo4 = "id_l";
															$campo5 = "fecha";
															$valor1 = $data['year'];
															$groupfor = "ejecutivo";
															$order = "DESC";
															$home['ventas'] = $this -> Model_crm -> get4Rows3InnerWhere1LikeGroupByOrderBy($count, $alias, $select1, $select2, $select3, $select4, $tbl_ventas, $tbl_usuarios, $campo1, $campo2, $tbl_licencias, $campo3, $campo4, $campo5, $valor1, $groupfor, $order);
															// titulo de la vista
															$home['tittle'] = "<h1> Ventas del año <small class='text-danger'>".$data['year']."</small> </h1>";
															// mensaje de la vista
															$home['msn'] = "<h1> Sin registros del año <small class='text-danger'>".$data['year']."</small> </h1>";
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Empresa/Reportes/Ventas', $home);
															$this -> load -> view('Principal/Footer');
														}
														// buscamos las ventas por año y ejecutivo
														else if ($data['day'] == "" && $data['month'] == "" && $data['year'] != "" && $data['ejecutivo'] != "selecciona-un-ejecutivo") {
															$count = "id_v";
															$alias = "total";
															$select1 = "ejecutivo";
															$select2 = "apaterno";
															$select3 = "amaterno";
															$select4 = "nombre";
															$campo1 = "ejecutivo";
															$campo2 = "id_u";
															$campo3 = "licencia";
															$campo4 = "id_l";
															$campo5 = "fecha";
															$valor1 = $data['year'];
															$campo6 = "ejecutivo";
															$valor2 = $data['ejecutivo'];
															$groupfor = "ejecutivo";
															$order = "DESC";
															$home['ventas'] = $this -> Model_crm -> get4Rows3InnerWhereLike2GroupByOrderBy($count, $alias, $select1, $select2, $select3, $select4, $tbl_ventas, $tbl_usuarios, $campo1, $campo2, $tbl_licencias, $campo3, $campo4, $campo5, $valor1, $campo6, $valor2, $groupfor, $order);
															// titulo de la vista
															$home['tittle'] = "<h1> Ventas de <small class='text-danger'>".$ejecutivo -> apaterno." ".$ejecutivo -> amaterno." ".$ejecutivo -> nombre." </small> <br> en el año <small class='text-danger'>".$data['year']."</small> </h1>";
															// mensaje de la vista
															$home['msn'] = "<h1> Sin registros de <small class='text-danger'>".$ejecutivo -> apaterno." ".$ejecutivo -> amaterno." ".$ejecutivo -> nombre." </small> <br> en el año <small class='text-danger'>".$data['year']."</small> </h1>";
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Empresa/Reportes/Ventas', $home);
															$this -> load -> view('Principal/Footer');
														}
														// buscamos las ventas por ejecutivo
														else if ($data['day'] == "" && $data['month'] == "" && $data['year'] == "" && $data['ejecutivo'] != "selecciona-un-ejecutivo") {
															$count = "id_v";
															$alias = "total";
															$select1 = "ejecutivo";
															$select2 = "apaterno";
															$select3 = "amaterno";
															$select4 = "nombre";
															$campo1 = "ejecutivo";
															$campo2 = "id_u";
															$campo3 = "licencia";
															$campo4 = "id_l";
															$campo5 = "ejecutivo";
															$valor1 = $data['ejecutivo'];
															$groupfor = "ejecutivo";
															$order = "DESC";
															$home['ventas'] = $this -> Model_crm -> get4Rows3InnerWhere1LikeGroupByOrderBy($count, $alias, $select1, $select2, $select3, $select4, $tbl_ventas, $tbl_usuarios, $campo1, $campo2, $tbl_licencias, $campo3, $campo4, $campo5, $valor1, $groupfor, $order);
															// titulo de la vista
															$home['tittle'] = "<h1> Ventas de <small class='text-danger'>".$ejecutivo -> apaterno." ".$ejecutivo -> amaterno." ".$ejecutivo -> nombre."</small> </h1>";
															// mensaje de la vista
															$home['msn'] = "<h1> Sin registros de <small class='text-danger'>".$ejecutivo -> apaterno." ".$ejecutivo -> amaterno." ".$ejecutivo -> nombre."</small> </h1>";
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Empresa/Reportes/Ventas', $home);
															$this -> load -> view('Principal/Footer');
														}
														// no viene informacion | mandamos alerta de error
														else {
															$home['ventas'] = "";
															// titulo de la vista
															$home['tittle'] = "<h1> Total de ventas </h1>";
															// mensaje de la vista
															$home['msn'] = "<h1> <span class='text-danger'> Lo sentimos los datos que ingresaste son incorrectos. </span> </h1>";
															$this -> load -> view('Principal/Header', $header);
															$this -> load -> view('Principal/Navbar', $navbar);
															$this -> load -> view('Empresa/Reportes/Ventas', $home);
															$this -> load -> view('Principal/Footer');
														}
													break;
													// reporte de tipificación
													case 'typify':
														$count = "status";
														$alias = "total";
														$select1 = "tipificacion";
														$campo1 = "status";
														$campo2 = "id_stl";
														$groupfor = "status";
														$order = "ASC";
														$home['tipify'] = $this -> Model_crm -> getAll2InnerGroupbyOrderBy($count, $alias, $select1, $tbl_tipificacion_llamada, $tbl_status_tipificacion_llamada, $campo1, $campo2, $groupfor, $order);
														// titulo de la vista
														$home['tittle'] = "<h1> Tipificación de llamadas </h1>";
														// mensaje de la vista
														$home['msn'] = "<h1> Sin registros de llamadas </h1>";
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Empresa/Reportes/Tipificacion', $home);
														$this -> load -> view('Principal/Footer');
													break;
													// seguimientos
													case 'follow':
														// code...
													break;
													// llamadas con interes
													case 'call-interest':
														$count = "status";
														$alias = "total";
														$select1 = "interes";
														$campo1 = "status";
														$campo2 = "id_sill";
														$groupfor = "status";
														$order = "ASC";
														$home['interest'] = $this -> Model_crm -> getAll2InnerGroupbyOrderBy($count, $alias, $select1, $tbl_interes_llamada, $tbl_status_interes_llamada, $campo1, $campo2, $groupfor, $order);
														// titulo de la vista
														$home['tittle'] = "<h1> Servicios ofrecidos </h1>";
														// mensaje de la vista
														$home['msn'] = "<h1> Sin registros de llamadas </h1>";
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Empresa/Reportes/Interes', $home);
														$this -> load -> view('Principal/Footer');
													break;
													// prospectos con contrato
													case 'request-doc':
														$count = "status";
														$alias = "total";
														$select1 = "status";
														$campo1 = "contrato";
														$campo2 = "id_scll";
														$groupfor = "contrato";
														$order = "ASC";
														$home['doc'] = $this -> Model_crm -> getAll2InnerGroupbyOrderBy($count, $alias, $select1, $tbl_prospecto_venta, $tbl_status_contrato_llamada, $campo1, $campo2, $groupfor, $order);
														// titulo de la vista
														$home['tittle'] = "<h1> Status del contrato del prospecto </h1>";
														// mensaje de la vista
														$home['msn'] = "<h1> Sin registros de llamadas </h1>";
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Empresa/Reportes/Contratos', $home);
														$this -> load -> view('Principal/Footer');
													break;
													// prospectos con INE
													case 'request-file':
														$count = "status";
														$alias = "total";
														$select1 = "status";
														$campo1 = "identificacion";
														$campo2 = "id_sdll";
														$groupfor = "identificacion";
														$order = "ASC";
														$home['file'] = $this -> Model_crm -> getAll2InnerGroupbyOrderBy($count, $alias, $select1, $tbl_prospecto_venta, $tbl_status_documento_llamada, $campo1, $campo2, $groupfor, $order);
														// titulo de la vista
														$home['tittle'] = "<h1> Status de la identificación del prospecto </h1>";
														// mensaje de la vista
														$home['msn'] = "<h1> Sin registros de llamadas </h1>";
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Empresa/Reportes/File', $home);
														$this -> load -> view('Principal/Footer');
													break;
													// contratos con firma
													case 'docs-sing':
														$count = "status";
														$alias = "total";
														$select1 = "status";
														$campo1 = "firma";
														$campo2 = "id_sfc";
														$groupfor = "firma";
														$order = "ASC";
														$home['sing'] = $this -> Model_crm -> getAll2InnerGroupbyOrderBy($count, $alias, $select1, $tbl_contrato_prospecto, $tbl_status_firma_cotrato, $campo1, $campo2, $groupfor, $order);
														// titulo de la vista
														$home['tittle'] = "<h1> Status de la firma del contrato </h1>";
														// mensaje de la vista
														$home['msn'] = "<h1> Sin registros de llamadas </h1>";
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Empresa/Reportes/Sing', $home);
														$this -> load -> view('Principal/Footer');
													break;
													// contratos con folio
													case 'docs-sheet-number':
														$count = "status";
														$alias = "total";
														$select1 = "status";
														$campo1 = "folio";
														$campo2 = "id_sfoc";
														$groupfor = "folio";
														$order = "ASC";
														$home['sheetNumber'] = $this -> Model_crm -> getAll2InnerGroupbyOrderBy($count, $alias, $select1, $tbl_contrato_prospecto, $tbl_status_folio_contrato, $campo1, $campo2, $groupfor, $order);
														// titulo de la vista
														$home['tittle'] = "<h1> Status del folio del contrato </h1>";
														// mensaje de la vista
														$home['msn'] = "<h1> Sin registros de llamadas </h1>";
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Empresa/Reportes/Sheet number', $home);
														$this -> load -> view('Principal/Footer');
													break;
													// servicios entregados
													case 'services':
														$count = "status";
														$alias = "total";
														$select1 = "status";
														$campo1 = "entregado";
														$campo2 = "id_sce";
														$groupfor = "entregado";
														$order = "ASC";
														$home['services'] = $this -> Model_crm -> getAll2InnerGroupbyOrderBy($count, $alias, $select1, $tbl_contrato_prospecto, $tbl_status_contrato_entregado, $campo1, $campo2, $groupfor, $order);
														// titulo de la vista
														$home['tittle'] = "<h1> Status del folio del contrato </h1>";
														// mensaje de la vista
														$home['msn'] = "<h1> Sin registros de llamadas </h1>";
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Empresa/Reportes/Servicios', $home);
														$this -> load -> view('Principal/Footer');
													break;
													// no existe el reporte
													default:
														$this -> load -> view('Principal/Header', $header);
														$this -> load -> view('Principal/Navbar', $navbar);
														$this -> load -> view('Error404/404');
														$this -> load -> view('Principal/Footer');
													break;
												}
											}
											// el metodo no existe | mandamos página de error 404
											else {
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Error404/404');
												$this -> load -> view('Principal/Footer');
											}
										}
										// no viene el tipo de reporte | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// cerrar sesión
									case 'logout':
										// validamos que este la sesion iniciada
										if (isset($this -> session -> sesion)){
											// la sesión si esta iniciada | validamos que este la sesion sea verdadera
											if ($this -> session -> sesion == "true"){
												// la sesión es verdadera |obtenemso la sesión
												$campo = "tencrypt";
												$valor = $this -> session -> token;
												$sesion = $this -> Model_crm -> getRowWhere1($tbl_iniciar_sesion, $campo, $valor);
												// insertamos el cierre de sesión
												$close['sesion'] = $sesion -> id_s;
												$close['hora'] = date('H:i:s');
												$close['fecha'] = date('Y-m-d');
												$insertcs = $this -> Model_crm -> insert($tbl_cerrar_sesion, $close);
												// validamos que se inserto el cierre de sesión
												if ($insertcs == "true") {
													// si se inserto el cierre de sesión | cerramos sesión
													session_destroy();
													// --------------- POPUP --------------- //
													$popup['title'] = "¡HASTA PRONTO!";
													$popup['text'] = "¡Has cerrado sesión!";
													$popup['type'] = "info";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/PopupTime', $popup);
													$this -> load -> view('Principal/Footer');
												}
												// no se inserto el cierre de sesión | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
													$this -> load -> view('Principal/Header', $header);
													$this -> load -> view('Principal/Navbar', $navbar);
													$this -> load -> view('Popup/Popup', $popup);
													$this -> load -> view('Principal/Footer');
												}
											}
											// la sesión no es verdadera | redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// la sesión no este iniciada | redirigimos a la página principal
										else {
											redirect(base_url());
											exit();
										}
									break;
									// el metodo no existe en la db
									default:
										$this -> load -> view('Principal/Header', $header);
										$this -> load -> view('Principal/Navbar', $navbar);
										$this -> load -> view('Error404/404');
										$this -> load -> view('Principal/Footer');
									break;
								}
							break;
							// tipo de usuario no valido
							default:
								$this -> load -> view('Principal/Header', $header);
								$this -> load -> view('Principal/Navbar', $navbar);
								$this -> load -> view('Error404/404');
								$this -> load -> view('Principal/Footer');
							break;
						}
					}
					// el metodo no existe | mandamos página de error 404
					else {
						$this -> load -> view('Principal/Header', $header);
						$this -> load -> view('Principal/Navbar', $navbar);
						$this -> load -> view('Error404/404');
						$this -> load -> view('Principal/Footer');
					}
				}
				// el metodo no existe | validamos la sesión
			 else {
				 // validamos el tipo de usuario
				 switch ($this -> session -> t_usuario) {
					 // tipo de usuario empresa
				 	case 1:
				 		$this -> load -> view('Principal/Header', $header);
						$this -> load -> view('Principal/Navbar', $navbar);
						$this -> load -> view('Empresa/Home de empresas');
						$this -> load -> view('Principal/Footer');
				 	break;
					// tipo de usuario empleado
					case 2:
						// validamos el puesto del empleado
				 		switch ($this -> session -> puesto) {
							// ejecutivo telefónico
				 			case 1:
				 				// obtenemos las codificaciones de las llamdas
								$home['scdll'] = $this -> Model_crm -> getAll($tbl_status_codificacion_llamada);
								// obtenemos las tipificaciones para las llamdas
								$home['stll'] = $this -> Model_crm -> getAll($tbl_status_tipificacion_llamada);
								// obtenemos los status del representante legal
								$home['srle'] = $this -> Model_crm -> getAll($tbl_status_representante_legal_encargado);
								// obtenemos los status de le interesa el servicio
								$home['sill'] = $this -> Model_crm -> getAll($tbl_status_interes_llamada);
								// obtenemos los status de en este momento
								$home['smll'] = $this -> Model_crm -> getAll($tbl_status_momento_llamada);
								// obtenemos los status de docuemnto
								$home['sdll'] = $this -> Model_crm -> getAll($tbl_status_documento_llamada);
								$this -> load -> view('Principal/Header', $header);
								$this -> load -> view('Principal/Navbar', $navbar);
								$this -> load -> view('Ejecutivo/Home de ejecutivo', $home);
								$this -> load -> view('Principal/Footer');
				 			break;
							// mesa de control
							case 2:
								// obtenemos las codificaciones de las llamda
								$home['scdll'] = $this -> Model_crm -> getAll($tbl_status_codificacion_llamada);
								// obtenemos las tipificaciones para las llamdas
								$home['stll'] = $this -> Model_crm -> getAll($tbl_status_tipificacion_llamada);
								// obtenemos los status del representante legal
								$home['srle'] = $this -> Model_crm -> getAll($tbl_status_representante_legal_encargado);
								// obtenemos los status de le interesa el servicio
								$home['sill'] = $this -> Model_crm -> getAll($tbl_status_interes_llamada);
								// obtenemos los status de en este momento
								$home['smll'] = $this -> Model_crm -> getAll($tbl_status_momento_llamada);
								// obtenemos los status de docuemnto
								$home['sdll'] = $this -> Model_crm -> getAll($tbl_status_documento_llamada);
								$this -> load -> view('Principal/Header', $header);
								$this -> load -> view('Principal/Navbar', $navbar);
								$this -> load -> view('Mesa de control/Home de mesa de control', $home);
								$this -> load -> view('Principal/Footer');
				 			break;
							// el usuario no exite
				 			default:
				 				echo "sin tipo de usuario asignado"; die();
				 			break;
				 		}
				 	break;
					// el usuario no existe
				 	default:
				 		echo "sin tipo de usuario asignado"; die();
				 	break;
				 }
				}
			}
			// la sesión no es correcta | mandamos vista de login
			else {
				$this -> load -> view('Principal/Header', $header);
				$this -> load -> view('Principal/Navbar', $navbar);
				$this -> load -> view('Principal/Login');
				$this -> load -> view('Principal/Footer');
			}
		}
		// la sesión no es correcta | mandamos vista de login
		else {
			// la sesión no es correcta | validamos si viene un metodo
			if (isset($method)) {
				$campo = "ruta";
				$valor = $method;
				$metodo = $this -> Model_crm -> getRowWhere1($tbl_metodos_permitidos, $campo, $valor);
				// validamos que el metodo existe en la db
				if ($metodo != "") {
					switch ($metodo -> ruta) {
						// iniciar sesión
						case 'login':
							// validamos si viene información del formulario
							$data['userencrypt'] = trim(md5($this -> input -> post('usuario')));
							$data['ubicacion'] = trim($this -> input -> post('ubicacion'));
							$data['passencrypt'] = trim(md5($this -> input -> post('contraseña')));
							$data['navegador'] = trim($this -> input -> post('navegador'));
							// validamos si viene la ubicación del empleado
							if ($data['ubicacion'] != "") {
								// si viene la ubicación | validamos si viene usuario
								if ($data['userencrypt'] != "") {
									// validamos que el formato es correcto
									if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9_ ]+$/', $data['userencrypt'])
									&& preg_match('/^[a-zA-Z0-9]+$/', $data['passencrypt'])){
										// el formato es el correcto | validamos que exista el usuario en la base de datos
										$campo1 = "userencrypt";
										$valor1 = $data['userencrypt'];
										$campo2 = "passencrypt";
										$valor2 = $data['passencrypt'];
										$campo3 = "status";
										$valor3 = 1;
										$usuario = $this -> Model_crm -> getRowWhere3($tbl_usuarios, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3);
										if ($usuario != "") {
											$datasesion['token'] = trim($this -> generadordecodigo -> c20());
											$datasesion['tencrypt'] = md5($datasesion['token']);
											$datasesion['usuario'] = $usuario -> id_u;
											$datasesion['direccionip'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
											$datasesion['ubicacion'] = $data['ubicacion'];
											$datasesion['hora'] = date('H:i:s');
											$datasesion['fecha'] = date('Y-m-d');
											// el usuario es correcto | insertamos la sesión
											$insert = $this -> Model_crm -> insert($tbl_iniciar_sesion, $datasesion);
											// validamos que la sesión se inserto
											if ($insert == "true") {
												// la sesión se inserto | creamos variables de la sesión
												// sesión
												$campo = "tencrypt";
												$valor = $datasesion['tencrypt'];
												$sesion = $this -> Model_crm -> getRowWhere1($tbl_iniciar_sesion, $campo, $valor);
												// licencia
												$campo = "id_l";
												$valor = $usuario -> licencia;
												$licencia = $this -> Model_crm -> getRowWhere1($tbl_licencias, $campo, $valor);
												// variables de la sesión
												$this -> session -> sesion = "true";
												$this -> session -> id = $usuario -> id_u;
												$this -> session -> name = $usuario -> usuario;
												$this -> session -> company = $licencia -> empresa;
												$this -> session -> t_usuario = $usuario -> tipo_usuario;
												$this -> session -> puesto = $usuario -> puesto;
												$this -> session -> token = $sesion -> tencrypt;
												$this -> session -> time = date("H:i:s");
												// valores para la barra de navegación
												$navbar['erllview'] = 0;
												$navbar['esllview'] = 0;
												$navbar['epvview'] = 0;
												$navbar['epvineview'] = 0;
												$navbar['epvdocview'] = 0;
												$navbar['ecpsing'] = 0;
												$navbar['ecpfolio'] = 0;
												$navbar['ecpentrega'] = 0;
												$navbar['mpvdocview'] = 0;
												$navbar['mcpfolio'] = 0;
												$navbar['mvview'] = 0;
												// valores para el menu
												$header['erllview'] = 0;
												$header['esllview'] = 0;
												$header['epvview'] = 0;
												$header['epvineview'] = 0;
												$header['epvdocview'] = 0;
												$header['ecpsing'] = 0;
												$header['ecpfolio'] = 0;
												$header['ecpentrega'] = 0;
												$header['mpvdocview'] = 0;
												$header['mcpfolio'] = 0;
												$header['mvview'] = 0;
												// --------------- POPUP --------------- //
												$popup['title'] = "¡BIENVENIDO!";
												$popup['text'] = "¡Has iniciado sesión!";
												$popup['type'] = "success";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/PopupTime', $popup);
												$this -> load -> view('Principal/Footer');
											}
											// la sesión no se inserto | mandamos alerta de error
											else {
												$popup['title'] = "¡ERROR!";
												$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
												$popup['type'] = "error";
												$popup['ruta'] = "base";
												// --------------- VISTAS --------------- //
												$this -> load -> view('Principal/Header', $header);
												$this -> load -> view('Principal/Navbar', $navbar);
												$this -> load -> view('Popup/Popup', $popup);
												$this -> load -> view('Principal/Footer');
											}
										}
										// el usuario no existe | mandamos alerta de error
										else {
											$popup['title'] = "¡ERROR!";
											$popup['text'] = "El usuario no existe. Intentalo nuevamente.";
											$popup['type'] = "error";
											$popup['ruta'] = "base";
											// --------------- VISTAS --------------- //
											$this -> load -> view('Principal/Header', $header);
											$this -> load -> view('Principal/Navbar', $navbar);
											$this -> load -> view('Popup/Popup', $popup);
											$this -> load -> view('Principal/Footer');
										}
									}
									// el formato no es correcto | mandamos alerta de error
									else {
									 // --------------- POPUP --------------- //
									 $popup['title'] = "¡ERROR!";
									 $popup['text'] = "No se aceptan caracteres especiales en los campos.";
									 $popup['type'] = "error";
									 $popup['ruta'] = "base";
									 // --------------- VISTAS --------------- //
									 $this -> load -> view('Principal/Header', $header);
									 $this -> load -> view('Principal/Navbar', $navbar);
									 $this -> load -> view('Popup/Popup', $popup);
									 $this -> load -> view('Principal/Footer');
									}
								}
								// la información no viene | redirigimos a la página principal
								else {
									redirect(base_url());
									exit();
								}
							}
							// no hay acceso a la ubicación | mandamos alerta de error
							else {
								$popup['title'] = "¡ERROR!";
								$popup['text'] = "Lo sentimos para acceder a la plataforma deberás dar permisos para acceder a tu UBICACIÓN.";
								$popup['type'] = "error";
								$popup['ruta'] = "base";
								// --------------- VISTAS --------------- //
								$this -> load -> view('Principal/Header', $header);
								$this -> load -> view('Principal/Navbar', $navbar);
								$this -> load -> view('Popup/Popup', $popup);
								$this -> load -> view('Principal/Footer');
							}
						break;
						// el metodo no existe
						default:
							$this -> load -> view('Principal/Header', $header);
							$this -> load -> view('Principal/Navbar', $navbar);
							$this -> load -> view('Error404/404');
							$this -> load -> view('Principal/Footer');
						break;
					}
				}
				// el metodo no existe | mandamos página de error 404
				else {
					$this -> load -> view('Principal/Header', $header);
					$this -> load -> view('Principal/Navbar', $navbar);
					$this -> load -> view('Error404/404');
					$this -> load -> view('Principal/Footer');
				}
			}
			// el metodo no existe | mandamos página principal
		 else {
				$this -> load -> view('Principal/Header', $header);
				$this -> load -> view('Principal/Navbar', $navbar);
				$this -> load -> view('Principal/Login');
				$this -> load -> view('Principal/Footer');
			}
		}
	}
}
