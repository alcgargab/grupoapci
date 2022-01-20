<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paquete extends CI_Controller {
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
			$tabla = "paquete";
			$campo = "Ruta";
			$valor = $ruta;
			$registro = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
			if ($registro) {
				$tabla = "tbl_oportunidad";
				$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
				// $tabla = "tbl_servicio";
				// $campo = "id_ser_oportunidad";
				// $valor = $registro -> id_ser_oportunidad;
				// $headerMenu['servicio'] = $this -> ModelTelViaServicio -> GetCampoAll($tabla, $campo, $valor);
				$tabla = "Paquete";
				$campo = "idPaquete";
				$valor = $registro -> idPaquete;
				$home['paquete'] = $registro;
				// print_r($home); die();
				$this -> load -> view ('Principal/TeleViaViewHeader', $header);
				// $this -> load -> view ('Menu/TeleViaViewMenu', $headerMenu);
				$this -> load -> view ('Cotizador/TeleViaViewCotizadorItem', $home);
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
				$tabla = "paquete";
				$home['servicio'] = $this -> ModelTelViaServicio -> GetAll($tabla);
				$this -> load -> view ('Principal/TeleViaViewHeader', $header);
				$this -> load -> view ('Error/TeleViaViewPaqueteError404', $home);
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
			redirect(base_url());
		}
	}
}
