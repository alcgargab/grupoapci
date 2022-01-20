<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class TelevialesAdm extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> library ('TeleVialesSendCorreo', TRUE);
		$this -> load -> library ('TeleVialesSendCorreoRobot', TRUE);
		$this -> load -> model('ModelTelViaServicio');
	}
	public function _remap($method, $params = array()) {
		if (!method_exists($this, $method)) {
			$this -> index($method, $params);
		} else {
			return call_user_func_array(array($this,$method), $params);
		}
	}
	public function index(){
		redirect(base_url());
	}
	public function Adm($usuario = NULL, $pass = NULL){
		$data['User'] = $_GET['usuario'];
    $data['Password'] = $_GET['pass'];
		if ($data != NULL) {
			$tabla = "user";
			$campo1 = "Usuario";
			$valor1 = $data['User'];
			$campo2 = "Password";
			$valor2 = $data['Password'];
			$registro = $this -> ModelTelViaServicio -> GetCampos($tabla, $campo1, $valor1, $campo2, $valor2);
			if ($registro) {
				$tabla = "correo";
				$data['correos'] = $this -> ModelTelViaServicio -> GetAll($tabla);
				// print_r($data['correos']); die();
				$tabla = "tbl_oportunidad";
				$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
				$this -> load -> view('Principal/TeleViaViewHeader', $header);
				$this -> load -> view('Admin/TeleViaViewAdmin', $data);
				$tabla = "tbl_servicio";
				$campo = "id_ser_oportunidad";
				$valor = 1;
				$footer['dw'] = $this -> ModelTelViaServicio -> GetCampoAll($tabla, $campo, $valor);
				$valor = 2;
				$footer['emp'] = $this -> ModelTelViaServicio -> GetCampoAll($tabla, $campo, $valor);
				$valor = 3;
				$footer['sp'] = $this -> ModelTelViaServicio -> GetCampoAll($tabla, $campo, $valor);
				$valor = 4;
				$footer['cc'] = $this -> ModelTelViaServicio -> GetCampoAll($tabla, $campo, $valor);
				$tabla = "tbl_oportunidad";
				$footer['op'] = $this -> ModelTelViaServicio -> GetAll($tabla);
				$this -> load -> view ('Principal/TeleViaViewFooter', $footer);
			}else {
				redirect(base_url());
			}
		}else {
			redirect(base_url());
		}
	}
	public function AdmDB($usuario = NULL, $pass = NULL){
		$data['User'] = $_GET['usuario'];
    $data['Password'] = $_GET['pass'];
		if ($data != NULL) {
			$tabla = "user";
			$campo1 = "Usuario";
			$valor1 = $data['User'];
			$campo2 = "Password";
			$valor2 = $data['Password'];
			$registro = $this -> ModelTelViaServicio -> GetCampos($tabla, $campo1, $valor1, $campo2, $valor2);
			if ($registro) {
				$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
				$this -> load -> view('AdminDB/TeleViaViewAdminDB');
				$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
			}else {
				redirect(base_url());
			}
		}else {
			redirect(base_url());
		}
	}
	public function Tabla($ruta = NULL, $pag = NULL){
		// VALIDAMOS QUE LA PAGINA VIENE VACIA
		if ($pag == NULL) {
			// SI VIENE VACIA, VALIDAMOS QUE LA RUTA VIENE VACIA
			if ($ruta !=NULL) {
				// SI LA RUTA NO VIENE VACIA VALIDAMOS QUE VALOR TIENE
				switch ($ruta) {
					case 'correo':
						$base = 0;
						$tope = 5;
						$tabla = "correo";
						$home['correo'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "correo";
						$home['totalCorreos'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = 1;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaC', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'paquete':
						$base = 0;
						$tope = 5;
						$tabla = "paquete";
						$home['paquete'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "paquete";
						$home['totalPaquetes'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = 1;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaP', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'seguimiento-del-servicio':
						$base = 0;
						$tope = 5;
						$tabla = "serseguimiento";
						$home['serseguimiento'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "serseguimiento";
						$home['totalSeguimiento'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$tabla = "tbl_subser";
						$home['totalSubServicios'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$tabla = "userseguimiento";
						$home['totalUser'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = 1;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaSS', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'categoria':
						$base = 0;
						$tope = 5;
						$tabla = "tbl_oportunidad";
						$home['categoria'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "tbl_oportunidad";
						$home['totalCategorias'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = 1;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaCat', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'servicio':
						$base = 0;
						$tope = 5;
						$tabla = "tbl_servicio";
						$home['servicio'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "tbl_servicio";
						$home['totalServicios'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$tabla = "tbl_oportunidad";
						$home['categoria'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = 1;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaS', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'subservicio':
						$base = 0;
						$tope = 5;
						$tabla = "tbl_subser";
						$home['subservicio'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "tbl_subser";
						$home['totalSubServicios'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$tabla = "tbl_servicio";
						$home['servicio'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = 1;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaSuS', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'usuario':
						$base = 0;
						$tope = 5;
						$tabla = "user";
						$home['user'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "user";
						$home['totalUser'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = 1;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaU', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'seguimiento-del-usuario':
						$base = 0;
						$tope = 5;
						$tabla = "userseguimiento";
						$home['userseguimiento'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "userseguimiento";
						$home['totalUserSeguimiento'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = 1;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaUS', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					// REPORTES SERVICIOS
					case 'servicios-mas-vistos':
						$tabla = "tbl_servicio";
						$order = "vistas";
						$modo = "DESC";
						$base = 0;
						$tope = 10;
						$home['totaltbl_servicio'] = $this -> ModelTelViaServicio -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Reportes/Servicios/TeleViaViewAdminDBReportSMV', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'servicios-mas-solicitados':
							$tabla = "tbl_subser";
							$home['totaltbl_servicio'] = $this -> ModelTelViaServicio -> GetAll($tabla);
							// $tabla = "tbl_subser";
							// $groupby = "id_ser";
							// $home['totaltbl_servicio'] = $this -> ModelTelViaServicio -> GetAllGroupBy($tabla, $groupby);
							// echo "<pre>"; print_r($home); echo "</pre>"; die();
							$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
							$this -> load -> view('AdminDB/Reportes/Servicios/TeleViaViewAdminDBReportSMS', $home);
							$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
							break;
						case 'servicios-mas-vendidos':
							$tabla = "tbl_servicio";
							$order = "Ventas";
							$modo = "DESC";
							$base = 0;
							$tope = 10;
							$home['totaltbl_servicio'] = $this -> ModelTelViaServicio -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
							$this -> load -> view('AdminDB/Reportes/Servicios/TeleViaViewAdminDBReportSMVe', $home);
							$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
							break;
						// REPORTES PRODUCTOS
						case 'productos-mas-vistos':
							$tabla = "tbl_subser";
							$order = "Vistas";
							$modo = "DESC";
							$base = 0;
							$tope = 10;
							$home['totaltbl_subser'] = $this -> ModelTelViaServicio -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
							$this -> load -> view('AdminDB/Reportes/Productos/TeleViaViewAdminDBReportPMV', $home);
							$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
							break;
						case 'productos-menos-vistos':
							$tabla = "tbl_subser";
							$order = "Vistas";
							$modo = "ASC";
							$base = 0;
							$tope = 10;
							$home['totaltbl_subser'] = $this -> ModelTelViaServicio -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
							$this -> load -> view('AdminDB/Reportes/Productos/TeleViaViewAdminDBReportPMeV', $home);
							$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
							break;
						case 'productos-mas-solicitados':
							$tabla = "tbl_subser";
							$order = "Solicitud";
							$modo = "DESC";
							$base = 0;
							$tope = 10;
							$home['totaltbl_subser'] = $this -> ModelTelViaServicio -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
							$this -> load -> view('AdminDB/Reportes/Productos/TeleViaViewAdminDBReportPMS', $home);
							$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
							break;
						case 'productos-menos-solicitados':
							$tabla = "tbl_subser";
							$order = "Solicitud";
							$modo = "ASC";
							$base = 0;
							$tope = 10;
							$home['totaltbl_subser'] = $this -> ModelTelViaServicio -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
							$this -> load -> view('AdminDB/Reportes/Productos/TeleViaViewAdminDBReportPMeS', $home);
							$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
							break;
						case 'productos-mas-vendidos':
							$tabla = "tbl_subser";
							$order = "Ventas";
							$modo = "DESC";
							$base = 0;
							$tope = 10;
							$home['totaltbl_subser'] = $this -> ModelTelViaServicio -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
							$this -> load -> view('AdminDB/Reportes/Productos/TeleViaViewAdminDBReportPMVe', $home);
							$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
							break;
						case 'productos-menos-vendidos':
							$tabla = "tbl_subser";
							$order = "Ventas";
							$modo = "ASC";
							$base = 0;
							$tope = 10;
							$home['totaltbl_subser'] = $this -> ModelTelViaServicio -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
							$this -> load -> view('AdminDB/Reportes/Productos/TeleViaViewAdminDBReportPMeVe', $home);
							$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
							break;
				}
				// SI LA RUTA VIENE VACIA DIRIGIMOS A LA PAGINA PRINCIPAL
			}else {
				redirect(base_url());
			}
			// SI LA PAGINA VIENE NO VACIA VALIDAMOS QUE VALOR TIENE Y ESE SERA LA BASE
		}else {
			// SI LA RUTA NO VIENE VACIA VALIDAMOS QUE VALOR TIENE
			if ($ruta !=NULL) {
				switch ($ruta) {
					case 'correo':
						$base = ($pag -1)*5;
						$tope = 5;
						$tabla = "correo";
						$home['correo'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "correo";
						$home['totalCorreos'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = $pag;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaC', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'paquete':
						$base = ($pag -1)*5;
						$tope = 5;
						$tabla = "paquete";
						$home['paquete'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "paquete";
						$home['totalPaquetes'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = $pag;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaP', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'seguimiento-del-servicio':
						$base = ($pag -1)*5;
						$tope = 5;
						$tabla = "serseguimiento";
						$home['serseguimiento'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "serseguimiento";
						$home['totalSeguimiento'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$tabla = "tbl_subser";
						$home['totalSubServicios'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$tabla = "userseguimiento";
						$home['totalUser'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = $pag;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaSS', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'categoria':
						$base = ($pag -1)*5;
						$tope = 5;
						$tabla = "tbl_oportunidad";
						$home['categoria'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "tbl_oportunidad";
						$home['totalCategorias'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = $pag;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaCat', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'servicio':
						$base = ($pag -1)*5;
						$tope = 5;
						$tabla = "tbl_servicio";
						$home['servicio'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "tbl_servicio";
						$home['totalServicios'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$tabla = "tbl_oportunidad";
						$home['categoria'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = $pag;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaS', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'subservicio':
						$base = ($pag -1)*5;
						$tope = 5;
						$tabla = "tbl_subser";
						$home['subservicio'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "tbl_subser";
						$home['totalSubServicios'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$tabla = "tbl_servicio";
						$home['servicio'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = $pag;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaSuS', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'usuario':
						$base = ($pag -1)*5;
						$tope = 5;
						$tabla = "user";
						$home['user'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "user";
						$home['totalUser'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = $pag;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaU', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
					case 'seguimiento-del-usuario':
						$base = ($pag -1)*5;
						$tope = 5;
						$tabla = "userseguimiento";
						$home['userseguimiento'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "userseguimiento";
						$home['totalUserSeguimiento'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = $pag;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Tablas/TeleViaViewAdminDBTablaUS', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
						// REPORTES
					case 'servicios-mas-vistos':
						$base = ($pag -1)*5;
						$tope = 5;
						$tabla = "tbl_servicio";
						$home['tbl_servicio'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "tbl_servicio";
						$order = "vistas";
						$modo = "ASC";
						$home['totaltbl_servicio'] = $this -> ModelTelViaServicio -> GetAllOrder($tabla, $order, $modo);
						$home['pagina'] = $pag;
						$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDB/Reportes/TeleViaViewAdminDBReportSMV', $home);
						$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
						break;
				}
				// SI LA RUTA VIENE VACIA DIRIGIMOS A LA PAGINA PRINCIPAL
			}else {
				redirect(base_url());
			}
		}
	}
	public function Ver($ruta = NULL, $id = NULL){
		if ($ruta != NULL) {
			switch ($ruta) {
				case 'correo':
					$tabla = 'correo';
					$campo = "idCorreo";
					$valor = $id;
					$home['correo'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Ver/TeleViaViewAdminDBTablaCVer', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'paquete':
					$tabla = 'paquete';
					$campo = "idPaquete";
					$valor = $id;
					$home['paquete'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Ver/TeleViaViewAdminDBTablaPVer', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'seguimiento-del-servicio':
					$tabla = 'serseguimiento';
					$campo = "idSerSeguimiento";
					$valor = $id;
					$home['serseguimiento'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$tabla = 'tbl_subser';
					$campo = "id_subser";
					$valor = $home['serseguimiento'] -> SS_id_subser;
					$home['subServicio'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$tabla = 'userseguimiento';
					$campo = "idUSeguimiento";
					$valor = $home['serseguimiento'] -> SS_idUSeguimiento;
					$home['User'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Ver/TeleViaViewAdminDBTablaSSVer', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'categoria':
					$tabla = 'tbl_oportunidad';
					$campo = "id_oportunidad";
					$valor = $id;
					$home['categoria'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Ver/TeleViaViewAdminDBTablaCatVer', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'servicio':
					$tabla = 'tbl_servicio';
					$campo = "id_ser";
					$valor = $id;
					$home['servicio'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$tabla = 'tbl_oportunidad';
					$campo = "id_oportunidad";
					$valor = $home['servicio'] -> id_ser_oportunidad;
					$home['categoria'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					// echo "<pre>"; print_r($home); echo "</pre>"; die();
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Ver/TeleViaViewAdminDBTablaSVer', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'subservicio':
					$tabla = 'tbl_subser';
					$campo = "id_subser";
					$valor = $id;
					$home['subservicio'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$tabla = 'tbl_servicio';
					$campo = "id_ser";
					$valor = $home['subservicio'] -> id_ser;
					$home['servicio'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Ver/TeleViaViewAdminDBTablaSuSVer', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'usuario':
					$tabla = 'user';
					$campo = "idUser";
					$valor = $id;
					$home['user'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Ver/TeleViaViewAdminDBTablaUVer', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'seguimiento-del-usuario':
					$tabla = 'userseguimiento';
					$campo = "idUSeguimiento";
					$valor = $id;
					$home['userseguimiento'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Ver/TeleViaViewAdminDBTablaUSVer', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
			}
		}else {
			redirect(base_url());
		}
	}
	public function Editar($ruta = NULL, $id = NULL){
		if ($ruta != NULL) {
			switch ($ruta) {
				case 'correo':
					$tabla = 'correo';
					$campo = "idCorreo";
					$valor = $id;
					$home['correo'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Editar/TeleViaViewAdminDBTablaCEditar', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'paquete':
					$tabla = 'paquete';
					$campo = "idPaquete";
					$valor = $id;
					$home['paquete'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Editar/TeleViaViewAdminDBTablaPEditar', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'seguimiento-del-servicio':
					$tabla = 'serseguimiento';
					$campo = "idSerSeguimiento";
					$valor = $id;
					$home['serseguimiento'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Editar/TeleViaViewAdminDBTablaSSEditar', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'categoria':
					$tabla = 'tbl_oportunidad';
					$campo = "id_oportunidad";
					$valor = $id;
					$home['categoria'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Editar/TeleViaViewAdminDBTablaCatEditar', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'servicio':
					$tabla = 'tbl_servicio';
					$campo = "id_ser";
					$valor = $id;
					$home['servicio'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Editar/TeleViaViewAdminDBTablaSEditar', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'subservicio':
					$tabla = 'tbl_subser';
					$campo = "id_subser";
					$valor = $id;
					$home['subservicio'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Editar/TeleViaViewAdminDBTablaSuSEditar', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'usuario':
					$tabla = 'user';
					$campo = "idUser";
					$valor = $id;
					$home['user'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Editar/TeleViaViewAdminDBTablaUEditar', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
				case 'seguimiento-del-usuario':
					$tabla = 'userseguimiento';
					$campo = "idUSeguimiento";
					$valor = $id;
					$home['userseguimiento'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDB/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDB/Tablas/Editar/TeleViaViewAdminDBTablaUSEditar', $home);
					$this -> load -> view ('AdminDB/TeleViaViewFooterAdminDB');
					break;
			}
		}else {
			redirect(base_url());
		}
	}
	public function EditarRegistro($ruta = NULL){
		if ($ruta != NULL) {
			switch ($ruta) {
				case 'correo':
					$tabla = 'correo';
					$campo = "idCorreo";
					$valor = $this -> input -> post('idCorreo');
					$registro['idCorreo'] = $this -> input -> post('idCorreo');
					$registro['Usuario'] = $this -> input -> post('Usuario');
					$registro['CorreoElectronico'] = $this -> input -> post('CorreoElectronico');
					$registro['Asunto'] = $this -> input -> post('Asunto');
					$registro['NumTelefonico'] = $this -> input -> post('NumTelefonico');
					$registro['Comentarios'] = $this -> input -> post('Comentarios');
					$registro['FEnvio'] = $this -> input -> post('FEnvio');
					$registro['Ubicacion'] = $this -> input -> post('Ubicacion');
					$registro['DireccionIp'] = $this -> input -> post('DireccionIp');
					$bandera = $this -> ModelTelViaServicio -> Update($tabla, $campo, $valor, $registro);
					if ($bandera) {?>
						<script type="text/javascript">
							alert('Los datos No se actualizaron');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/correo");
						</script>
					<?php }else { ?>
						<script type="text/javascript">
							alert('Los datos se actualizaron correctamente');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/correo");
						</script>
					<?php }
					break;
				case 'paquete':
					$tabla = 'paquete';
					$campo = "idPaquete";
					$valor = $this -> input -> post('idPaquete');
					$registro['idPaquete'] = $this -> input -> post('idPaquete');
					$registro['Paquete'] = $this -> input -> post('Paquete');
					$registro['Precio'] = $this -> input -> post('Precio');
					$registro['Descripcion1'] = $this -> input -> post('Descripcion1');
					$registro['Descripcion2'] = $this -> input -> post('Descripcion2');
					$registro['Descripcion3'] = $this -> input -> post('Descripcion3');
					$registro['Descripcion4'] = $this -> input -> post('Descripcion4');
					$registro['Descripcion5'] = $this -> input -> post('Descripcion5');
					$registro['Logo'] = $this -> input -> post('Logo');
					$registro['Ruta'] = $this -> input -> post('Ruta');
					$registro['FRegistro'] = $this -> input -> post('FRegistro');
					$bandera = $this -> ModelTelViaServicio -> Update($tabla, $campo, $valor, $registro);
					if ($bandera) {?>
						<script type="text/javascript">
							alert('Los datos No se actualizaron');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/paquete");
						</script>
					<?php }else { ?>
						<script type="text/javascript">
							alert('Los datos se actualizaron correctamente');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/paquete");
						</script>
					<?php }
					break;
				case 'seguimiento-del-servicio':
				$tabla = 'serseguimiento';
				$campo = "idSerSeguimiento";
				$valor = $this -> input -> post('idSerSeguimiento');
				$registro['idSerSeguimiento'] = $this -> input -> post('idSerSeguimiento');
				$registro['SS_id_subser'] = $this -> input -> post('SS_id_subser');
				$registro['SS_idUSeguimiento'] = $this -> input -> post('SS_idUSeguimiento');
				$registro['StatusProceso'] = $this -> input -> post('StatusProceso');
				$registro['StatusServicio'] = $this -> input -> post('StatusServicio');
				$registro['FTermino'] = $this -> input -> post('FTermino');
				$registro['FRegistro'] = $this -> input -> post('FRegistro');
				$bandera = $this -> ModelTelViaServicio -> Update($tabla, $campo, $valor, $registro);
				if ($bandera) {?>
					<script type="text/javascript">
						alert('Los datos No se actualizaron');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio");
					</script>
				<?php }else { ?>
					<script type="text/javascript">
						alert('Los datos se actualizaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio");
					</script>
				<?php }
					break;
				case 'categoria':
					$tabla = 'tbl_oportunidad';
					$campo = "id_oportunidad";
					$valor = $this -> input -> post('id_oportunidad');
					$registro['id_oportunidad'] = $this -> input -> post('id_oportunidad');
					$registro['oportunidad'] = $this -> input -> post('oportunidad');
					$registro['Ruta'] = $this -> input -> post('Ruta');
					$registro['banner_imagen'] = $this -> input -> post('banner_imagen');
					$bandera = $this -> ModelTelViaServicio -> Update($tabla, $campo, $valor, $registro);
					if ($bandera) {?>
						<script type="text/javascript">
							alert('Los datos No se actualizaron');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/categoria");
						</script>
					<?php }else { ?>
						<script type="text/javascript">
							alert('Los datos se actualizaron correctamente');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/categoria");
						</script>
					<?php }
					break;
				case 'servicio':
					$tabla = 'tbl_servicio';
					$campo = "id_ser";
					$valor = $this -> input -> post('id_ser');
					$registro['id_ser'] = $this -> input -> post('id_ser');
					$registro['servicio'] = $this -> input -> post('servicio');
					$registro['Ruta'] = $this -> input -> post('Ruta');
					$registro['icono'] = $this -> input -> post('icono');
					$registro['id_ser_oportunidad'] = $this -> input -> post('id_ser_oportunidad');
					$bandera = $this -> ModelTelViaServicio -> Update($tabla, $campo, $valor, $registro);
					if ($bandera) {?>
						<script type="text/javascript">
							alert('Los datos No se actualizaron');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/servicio");
						</script>
					<?php }else { ?>
						<script type="text/javascript">
							alert('Los datos se actualizaron correctamente');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/servicio");
						</script>
					<?php }
					break;
				case 'subservicio':
					$tabla = 'tbl_subser';
					$campo = "id_subser";
					$valor = $this -> input -> post('id_subser');
					$registro['id_subser'] = $this -> input -> post('id_subser');
					$registro['subser'] = $this -> input -> post('subser');
					$registro['precio'] = $this -> input -> post('precio');
					$registro['descripcion'] = $this -> input -> post('descripcion');
					$registro['descripcion2'] = $this -> input -> post('descripcion2');
					$registro['descripcion3'] = $this -> input -> post('descripcion3');
					$registro['logo'] = $this -> input -> post('logo');
					$registro['requisitos'] = $this -> input -> post('requisitos');
					$registro['requisitos2'] = $this -> input -> post('requisitos2');
					$registro['requisitos3'] = $this -> input -> post('requisitos3');
					$registro['requisitos4'] = $this -> input -> post('requisitos4');
					$registro['id_ser'] = $this -> input -> post('id_ser');
					$bandera = $this -> ModelTelViaServicio -> Update($tabla, $campo, $valor, $registro);
					if ($bandera) {?>
						<script type="text/javascript">
							alert('Los datos No se actualizaron');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/subservicio");
						</script>
					<?php }else { ?>
						<script type="text/javascript">
							alert('Los datos se actualizaron correctamente');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/subservicio");
						</script>
					<?php }
					break;
				case 'usuario':
					$tabla = 'user';
					$campo = "idUser";
					$valor = $this -> input -> post('idUser');
					$registro['idUser'] = $this -> input -> post('idUser');
					$registro['Usuario'] = $this -> input -> post('Usuario');
					$registro['Password'] = $this -> input -> post('Password');
					$bandera = $this -> ModelTelViaServicio -> Update($tabla, $campo, $valor, $registro);
					if ($bandera) {?>
						<script type="text/javascript">
							alert('Los datos No se actualizaron');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/usuario");
						</script>
					<?php }else { ?>
						<script type="text/javascript">
							alert('Los datos se actualizaron correctamente');
							window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/usuario");
						</script>
					<?php }
					break;
				case 'seguimiento-del-usuario':
				$tabla = 'userseguimiento';
				$campo = "idUSeguimiento";
				$valor = $this -> input -> post('idUSeguimiento');
				$registro['idUSeguimiento'] = $this -> input -> post('idUSeguimiento');
				$registro['Codigo'] = $this -> input -> post('Codigo');
				$registro['Password'] = $this -> input -> post('Password');
				$registro['Usuario'] = $this -> input -> post('Usuario');
				$registro['Correo'] = $this -> input -> post('Correo');
				$bandera = $this -> ModelTelViaServicio -> Update($tabla, $campo, $valor, $registro);
				if ($bandera) {?>
					<script type="text/javascript">
						alert('Los datos No se actualizaron');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-usuario");
					</script>
				<?php }else { ?>
					<script type="text/javascript">
						alert('Los datos se actualizaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-usuario");
					</script>
				<?php }
					break;
			}
		}else {
			redirect(base_url());
		}
	}
	public function Eliminar($ruta = NULL, $id = NULL){
		if ($ruta != NULL) {
			switch ($ruta) {
				case 'correo':
					$tabla = "correo";
					$campo = "idCorreo";
					$valor = $id;
					$this -> ModelTelViaServicio -> Delete($tabla, $campo, $valor); ?>
					<script type="text/javascript">
						alert('Los datos se eliminaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/correo");
					</script>
					<?php break;
				case 'paquete':
					$tabla = "paquete";
					$campo = "idPaquete";
					$valor = $id;
					$this -> ModelTelViaServicio -> Delete($tabla, $campo, $valor); ?>
					<script type="text/javascript">
						alert('Los datos se eliminaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/paquete");
					</script>
					<?php break;
				case 'seguimiento-del-servicio':
					$tabla = "serseguimiento";
					$campo = "idSerSeguimiento";
					$valor = $id;
					$this -> ModelTelViaServicio -> Delete($tabla, $campo, $valor); ?>
					<script type="text/javascript">
						alert('Los datos se eliminaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio");
					</script>
					<?php break;
				case 'categoria':
					$tabla = "tbl_oportunidad";
					$campo = "id_oportunidad";
					$valor = $id;
					$this -> ModelTelViaServicio -> Delete($tabla, $campo, $valor); ?>
					<script type="text/javascript">
						alert('Los datos se eliminaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/categoria");
					</script>
					<?php break;
				case 'servicio':
					$tabla = "tbl_servicio";
					$campo = "id_ser";
					$valor = $id;
					$this -> ModelTelViaServicio -> Delete($tabla, $campo, $valor); ?>
					<script type="text/javascript">
						alert('Los datos se eliminaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/servicio");
					</script>
					<?php break;
				case 'subservicio':
					$tabla = "tbl_subser";
					$campo = "id_subser";
					$valor = $id;
					$this -> ModelTelViaServicio -> Delete($tabla, $campo, $valor); ?>
					<script type="text/javascript">
						alert('Los datos se eliminaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/subservicio");
					</script>
					<?php break;
				case 'usuario':
					$tabla = "user";
					$campo = "idUser";
					$valor = $id;
					$this -> ModelTelViaServicio -> Delete($tabla, $campo, $valor); ?>
					<script type="text/javascript">
						alert('Los datos se eliminaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/usuario");
					</script>
					<?php break;
				case 'seguimiento-del-usuario':
					$tabla = "userseguimiento";
					$campo = "idUSeguimiento";
					$valor = $id;
					$this -> ModelTelViaServicio -> Delete($tabla, $campo, $valor); ?>
					<script type="text/javascript">
						alert('Los datos se eliminaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-usuario");
					</script>
					<?php break;
			}
		}else {
			redirect(base_url());
		}
	}
	public function Insert($ruta = NULL){
		if ($ruta != NULL) {
			switch ($ruta) {
				case 'correo':
					$tabla = "correo";
					$insert['Usuario'] = $this -> input -> post('Usuario');
					$insert['CorreoElectronico'] = $this -> input -> post('CorreoElectronico');
					$insert['Asunto'] = $this -> input -> post('Asunto');
					$insert['NumTelefonico'] = $this -> input -> post('NumTelefonico');
					$insert['Comentarios'] = $this -> input -> post('Comentarios');
					$insert['Ubicacion'] = $this -> input -> post('TelevialesmensajeTELEVIALES');
					$insert['DireccionIp'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
					$this -> ModelTelViaServicio -> Insert($tabla, $insert); ?>
					<script type="text/javascript">
						alert('Los datos se insertaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/correo");
					</script>
					<?php break;
				case 'paquete':
					$tabla = "paquete";
					$insert['Paquete'] = $this -> input -> post('Paquete');
					$insert['Precio'] = $this -> input -> post('Precio');
					$insert['Descripcion1'] = $this -> input -> post('Descripcion1');
					$insert['Descripcion2'] = $this -> input -> post('Descripcion2');
					$insert['Descripcion3'] = $this -> input -> post('Descripcion3');
					$insert['Descripcion4'] = $this -> input -> post('Descripcion4');
					$insert['Descripcion5'] = $this -> input -> post('Descripcion5');
					$insert['Logo'] = $this -> input -> post('Logo');
					$insert['Ruta'] = $this -> input -> post('Ruta');
					$this -> ModelTelViaServicio -> Insert($tabla, $insert); ?>
					<script type="text/javascript">
						alert('Los datos se insertaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/paquete");
					</script>
					<?php break;
				case 'seguimiento-del-servicio':
					$tabla = "serseguimiento";
					$insert['idSerSeguimiento'] = $this -> input -> post('idSerSeguimiento');
					$insert['SS_id_subser'] = $this -> input -> post('SS_id_subser');
					$insert['SS_idUSeguimiento'] = $this -> input -> post('SS_idUSeguimiento');
					$insert['StatusProceso'] = $this -> input -> post('StatusProceso');
					$insert['StatusServicio'] = $this -> input -> post('StatusServicio');
					$insert['FTermino'] = $this -> input -> post('FTermino');
					$insert['FRegistro'] = $this -> input -> post('FRegistro');
					$this -> ModelTelViaServicio -> Insert($tabla, $insert); ?>
					<script type="text/javascript">
						alert('Los datos se insertaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio");
					</script>
					<?php break;
				case 'categoria':
					$tabla = "tbl_oportunidad";
					$insert['oportunidad'] = $this -> input -> post('oportunidad');
					$insert['Ruta'] = $this -> input -> post('Ruta');
					$insert['banner_imagen'] = $this -> input -> post('banner_imagen');
					$this -> ModelTelViaServicio -> Insert($tabla, $insert); ?>
					<script type="text/javascript">
						alert('Los datos se insertaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/categoria");
					</script>
					<?php break;
				case 'servicio':
					$tabla = "tbl_servicio";
					$insert['servicio'] = $this -> input -> post('servicio');
					$insert['Ruta'] = $this -> input -> post('Ruta');
					$insert['icono'] = $this -> input -> post('icono');
					$insert['id_ser_oportunidad'] = $this -> input -> post('id_ser_oportunidad');
					$this -> ModelTelViaServicio -> Insert($tabla, $insert); ?>
					<script type="text/javascript">
						alert('Los datos se insertaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/servicio");
					</script>
					<?php break;
				case 'subservicio':
					$tabla = "tbl_subser";
					$insert['subser'] = $this -> input -> post('subser');
					$insert['Ruta'] = $this -> input -> post('Ruta');
					$insert['precio'] = $this -> input -> post('precio');
					$insert['descripcion'] = $this -> input -> post('descripcion');
					$insert['descripcion2'] = $this -> input -> post('descripcion2');
					$insert['descripcion3'] = $this -> input -> post('descripcion3');
					$insert['logo'] = $this -> input -> post('logo');
					$insert['requisitos'] = $this -> input -> post('requisitos');
					$insert['requisitos2'] = $this -> input -> post('requisitos2');
					$insert['requisitos3'] = $this -> input -> post('requisitos3');
					$insert['requisitos4'] = $this -> input -> post('requisitos4');
					$insert['id_ser'] = $this -> input -> post('id_ser');
					$insert['FRegistro'] = $this -> input -> post('FRegistro');
					$this -> ModelTelViaServicio -> Insert($tabla, $insert); ?>
					<script type="text/javascript">
						alert('Los datos se insertaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/subservicio");
					</script>
					<?php break;
				case 'usuario':
					$tabla = "user";
					$insert['Usuario'] = $this -> input -> post('Usuario');
					$insert['Password'] = $this -> input -> post('Password');
					$this -> ModelTelViaServicio -> Insert($tabla, $insert); ?>
					<script type="text/javascript">
						alert('Los datos se insertaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/usuario");
					</script>
					<?php break;
				case 'seguimiento-del-usuario':
					$tabla = "userseguimiento";
					$insert['Codigo'] = $this -> input -> post('Codigo');
					$insert['Password'] = $this -> input -> post('Password');
					$insert['Usuario'] = $this -> input -> post('Usuario');
					$insert['Correo'] = $this -> input -> post('Correo');
					$this -> ModelTelViaServicio -> Insert($tabla, $insert); ?>
					<script type="text/javascript">
						alert('Los datos se insertaron correctamente');
						window.location.replace("<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-usuario");
					</script>
					<?php break;
			}
		}else {
			redirect(base_url());
		}
	}
	public function GenerarPass(){
		// TRUE O FALSE EN LA OPCIÓN QUE QUIERAS AÑADIR
		$opc_letras = TRUE; //  FALSE para quitar las letras
		$opc_numeros = TRUE; // FALSE para quitar los números
		$opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
		$opc_especiales = TRUE; // FALSE para quitar los caracteres especiales
		$longitud = 10;
		$password = "";
		$letras ="abcdefghijklmnopqrstuvwxyz";
		$numeros = "1234567890";
		$letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$especiales ="|@#~$%()=^*+[]{}-_";
		$listado = "";
		if ($opc_letras == TRUE) {
		    $listado .= $letras; }
		if ($opc_numeros == TRUE) {
		    $listado .= $numeros; }
		if($opc_letrasMayus == TRUE) {
		    $listado .= $letrasMayus; }
		if($opc_especiales == TRUE) {
		    $listado .= $especiales; }
		str_shuffle($listado);
		for( $i=1; $i<=$longitud; $i++) {
		$password[$i] = $listado[rand(0,strlen($listado))];
		str_shuffle($listado);
		}
		// VERIFICAMOS QUE NO EXISTA LA CONTRASEÑA
		$tabla = "userseguimiento";
		$campo = "Password";
		$valor = $password;
		$data['password'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
		if ($data) {
			echo $password;
		}else {
			$mensaje = "la contraseña existe";
			echo $mensaje;
		}
	}
	public function UpdateServicio($tabla = NULL, $valor = NULL, $campo = NULL, $ruta = NULL){
		$camposet = "Ruta";
		$respuesta = $this -> ModelTelViaServicio -> UpdateWhere($tabla, $campo, $valor, $camposet, $ruta);
		echo $respuesta;
	}
	public function UpdateVentas(){

	}
}
