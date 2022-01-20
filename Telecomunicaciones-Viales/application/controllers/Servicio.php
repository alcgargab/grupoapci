<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Servicio extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> model('ModelTelViaServicio');
	}
	public function _remap($method, $params = array()) {
		if (!method_exists($this, $method)) {
			$this -> index($method, $params);
		} else {
			return call_user_func_array(array($this,$method), $params);
		}
	}
	public function index($ruta = NULL){
		if ($ruta) {
			$tabla = "tbl_oportunidad";
			$campo = "Ruta";
			$valor = $ruta;
			$registro = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
			if ($registro) {
				$tabla = "tbl_oportunidad";
				$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
				$tabla = "tbl_oportunidad";
				$campo = "Ruta";
				$valor = $ruta;
				$home['ser_op'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
				$tabla = "tbl_servicio";
				$campo = "id_ser_oportunidad";
				$valor = $home['ser_op'] -> id_oportunidad;
				$home['servicio'] = $this -> ModelTelViaServicio -> GetCampoAll($tabla, $campo, $valor);
				$this -> load -> view ('Principal/TeleViaViewHeader', $header);
				$this -> load -> view ('Servicio/TeleViaViewOpor', $home);
				$this -> load -> view ('Boton/TeleViaViewBtnContac');
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
				$tabla = "tbl_servicio";
				$campo = "Ruta";
				$valor = $ruta;
				$registro = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
				if ($registro) {
					$tabla = "tbl_oportunidad";
					$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
					$tabla = "tbl_servicio";
					$campo = "id_ser_oportunidad";
					$valor = $registro -> id_ser_oportunidad;
					$headerMenu['servicio'] = $this -> ModelTelViaServicio -> GetCampoAll($tabla, $campo, $valor);
					$tabla = "tbl_subser";
					$campo = "id_ser";
					$valor = $registro -> id_ser;
					$home['Subservicio'] = $this -> ModelTelViaServicio -> GetCampoAll($tabla, $campo, $valor);
					if ($home['Subservicio']) {
						$tabla = "tbl_servicio";
						$campo = "id_ser";
						$valor = $home['Subservicio'][0] -> id_ser;
						$home['servicio'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
						$tabla = "tbl_oportunidad";
						$campo = "id_oportunidad";
						$valor = $home['servicio'] -> id_ser_oportunidad;
						$home['oportunidad'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
						$this -> load -> view ('Principal/TeleViaViewHeader', $header);
						$this -> load -> view ('Menu/TeleViaViewMenu', $headerMenu);
						$this -> load -> view ('Servicio/TeleViaViewSubSer', $home);
						$this -> load -> view ('Boton/TeleViaViewBtnContac');
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
						$this -> load -> view ('Principal/TeleViaViewHeader', $header);
						$this -> load -> view ('Menu/TeleViaViewMenu', $headerMenu);
						$this -> load -> view ('Servicio/TeleViaViewSubSer', $home);
						$this -> load -> view ('Boton/TeleViaViewBtnContac');
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
					}
				}else {
					$tabla = "tbl_subser";
					$campo = "Ruta";
					$valor = $ruta;
					$registro = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					if ($registro) {
						$tabla = "tbl_oportunidad";
						$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['SubservicioItem'] = $registro;
						$tabla = "tbl_servicio";
						$campo = "id_ser";
						$valor = $home['SubservicioItem'] -> id_ser;
						$home['servicio'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
						$tabla = "tbl_oportunidad";
						$campo = "id_oportunidad";
						$valor = $home['servicio'] -> id_ser_oportunidad;
						$home['oportunidad'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
						// echo "<pre>"; print_r($home); echo "</pre>"; die();
						$this -> load -> view ('Principal/TeleViaViewHeader', $header);
						$this -> load -> view ('Servicio/TeleViaViewSubSerItem', $home);
						$this -> load -> view ('Boton/TeleViaViewBtnContac');
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
						$tabla = "tbl_oportunidad";
						$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['ruta'] = $ruta;
						$tabla = "tbl_subser";
						$home['servicio'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						// echo "<pre>"; print_r($home['servicio']); echo "</pre>"; die();
						$this -> load -> view ('Principal/TeleViaViewHeader', $header);
						$this -> load -> view ('Error/TeleViaViewError404', $home);
						$this -> load -> view ('Boton/TeleViaViewBtnContac');
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
					}
				}
			}
		}else {
			redirect(base_url());
		}
	}
}
