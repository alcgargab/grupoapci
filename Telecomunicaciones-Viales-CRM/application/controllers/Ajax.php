<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends CI_Controller {
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
		$tbl_metodos_permitidos = "metodos_permitidos";
		$tbl_seguimiento_llamada = "seguimiento_llamada";
		$tbl_contrato_prospecto = "contrato_prospecto";
		$tbl_folio_contrato = "folio_contrato";
		$tbl_prospecto_venta = "prospecto_venta";
		// obtenemos la información del usuario
		$campo = "id_u";
		$valor = $this -> session -> id;
		$usuario = $this -> Model_crm -> getRowWhere1($tbl_usuarios, $campo, $valor);
		// datos que se ocuparan en las vistas
		// --------------- header --------------- //
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
		}
		else {
			$header['usuario'] = "";
			$header['empresa'] = "";
			$navbar['usuario'] = "";
			$navbar['licencia'] = "";
		}
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
						switch ($this -> session -> puesto) {
							// ejecutivo
							case 1:
								switch ($metodo -> ruta) {
									// seguimientos
									case 'validate-follow-ups':
										// si viene el usuario | buscamos los seguimientos de hoy
										$campo1 = "usuario";
										$valor1 = $this -> session -> id;
										$campo2 = "fecha";
										$valor2 = date('Y-m-d');
										$campo3 = "hora";
										$valor3 = date('H:i:s');
										$seguimiento = $this -> Model_crm -> getAllWhere3($tbl_seguimiento_llamada, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3);
										if ($seguimiento != "") {
											echo count($seguimiento);
										}
										else {
											echo "0";
										}
									break;
									// contratos nuevos
									case 'alaert-doc':
										$campo1 = "elavoracion";
										$valor1 = $this -> session -> id;
										$campo2 = "firma";
										$valor2 = 2;
										$campo3 = "alerta";
										$valor3 = 2;
										$alert = $this -> Model_crm -> getAllWhere3($tbl_contrato_prospecto, $campo1, $valor1, $campo2, $valor2, $campo3, $valor3);
										if ($alert != "") {
											echo count($alert);
										}else {
											echo "0";
										}
									break;
									// actualizar la lerta de los contratos
									case 'update-alert-doc':
										$campo = "alerta";
										$valor = 1;
										$camposet = "elavoracion";
										$ruta = $this -> session -> id;
										$this -> Model_crm -> update1($tbl_contrato_prospecto, $campo, $valor, $camposet, $ruta);
									break;
									// nuevos folios
									case 'alert-sheet-number':
										$campo1 = "id_cp";
										$campo2 = "contrato";
										$campo3 = "elavoracion";
										$valor1 = $this -> session -> id;
										$campo4 = "alerta";
										$valor2 = 2;
										$alert = $this -> Model_crm -> getAll2InnerWhere2_2($tbl_contrato_prospecto, $tbl_folio_contrato, $campo1, $campo2, $campo3, $valor1, $campo4, $valor2);
										if ($alert != "") {
											echo count($alert);
										}
										else {
											echo "0";
										}
									break;
									// actualizar la alerta de contratos
									case 'update-alert-sheet-number':
										$campo = "elavoracion";
										$valor = $this -> session -> id;
										$request = $this -> Model_crm -> getAllWhere1($tbl_contrato_prospecto, $campo, $valor);
										$campo = "alerta";
										$valor = 1;
										$camposet = "contrato";
										$ruta = $request;
										$posicion = "id_cp";
										$this -> Model_crm -> update1For($tbl_folio_contrato, $campo, $valor, $camposet, $ruta, $posicion);
									break;
									// no existe el metodo
									default:
										redirect(base_url());
										exit();
									break;
								}
							break;
							// mesa de control
							case 2:
								switch ($metodo -> ruta) {
									// nuevos prospectos
									case 'alert-requests':
										$campo = "alerta";
										$valor = 2;
										$alert = $this -> Model_crm -> getAllWhere1($tbl_prospecto_venta, $campo, $valor);
										if ($alert != "") {
											echo count($alert);
										}
										else {
											echo "0";
										}
									break;
									// actualizar alerta de nuevos prospectos
									case 'update-alert-requests':
										$campo = "alerta";
										$valor = 1;
										$camposet = "alerta";
										$ruta = 2;
										$alert = $this -> Model_crm -> update1($tbl_prospecto_venta, $campo, $valor, $camposet, $ruta);
									break;
									// no existe el metodo
									default:
										redirect(base_url());
										exit();
									break;
								}
							break;
							// supervisor
							case 3:
								switch ($metodo -> ruta) {
									case 'generar-codigo':
										// buscamos la suscripción
										echo trim($this -> generadordecodigo -> index());
									break;
									// no existe el metodo
									default:
										// code...
									break;
								}
							break;
							// tipo de usuario no valido
							default:
								redirect(base_url());
								exit();
							break;
						}
					}
					// el metodo no existe | mandamos página de error 404
					else {
						$this -> load -> view('Principal/Header', $header);
						$this -> load -> view('Principal/Navbar');
						$this -> load -> view('Error404/404');
						$this -> load -> view('Principal/Footer');
					}
				}
				// el metodo no existe | validamos la sesión
			 else {
				 redirect(base_url());
				 exit();
				}
			}
			// la sesión no es correcta | redirigimos a la página principal
			else {
				redirect(base_url());
				exit();
			}
		}
		// la sesión no es correcta | mandamos vista de login
		else {
			// la sesión no es correcta | redirigimos a la página principal
			redirect(base_url());
			exit();
		}
	}
}
