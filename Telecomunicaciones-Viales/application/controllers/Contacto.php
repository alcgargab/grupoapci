<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contacto extends CI_Controller {
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
	public function index(){
		$tabla = "tbl_oportunidad";
		$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
		$this -> load -> view ('Principal/TeleViaViewHeader', $header);
		$home['asunto'] =  $this -> input -> post('servicio_item');
		$this -> load -> view ('Servicio/TeleViaViewCont', $home);
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
