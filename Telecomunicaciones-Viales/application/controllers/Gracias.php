<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gracias extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> library ('TeleVialesSendCorreo', TRUE);
		$this -> load -> library ('TeleVialesSendCorreolocal', TRUE);
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

				$data['Usuario'] = $this -> input -> post('Name');
				$data['CorreoElectronico'] = $this -> input -> post('email');
				$asunto = $this -> input -> post('subject');
				if (isset($asunto)) {
					$data['Asunto'] = $this -> input -> post('subject');
					$data['NumTelefonico'] = $this -> input -> post('tel');
					$data['Comentarios'] = $this -> input -> post('Comment');
					$data['Ubicacion'] = $this -> input -> post('OTELUMAmensajeOTELUMA');
					$data['DireccionIp'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
					// $this -> ModelTelViaServicio -> InsertCorreo($data);
					$envio = $this -> televialessendcorreo -> correo_TeleViales($data);
					// $envio = $this -> televialessendcorreolocal -> correo_TeleViales($data);
					if (!$envio) {
						$this -> televialessendcorreorobot -> correo_Gracias($data);
						$tabla = "tbl_oportunidad";
						$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$this -> load -> view ('Principal/TeleViaViewHeader', $header);
						$this -> load -> view ('Gracias/TeleViaViewGracias');
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
					$data['Asunto'] = $this -> input -> post('subject1');
					$data['NumTelefonico'] = $this -> input -> post('tel');
					$data['Comentarios'] = $this -> input -> post('Comment');
					$data['Ubicacion'] = $this -> input -> post('TelevialesmensajeTELEVIALES');
					$data['DireccionIp'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
					$this -> ModelTelViaServicio -> InsertCorreo($data);
					$envio = $this -> televialessendcorreo -> correo_TeleViales($data);
					// $envio = $this -> televialessendcorreolocal -> correo_TeleViales($data);
					if (!$envio) {
						$this -> televialessendcorreorobot -> correo_Gracias($data);
						$tabla = "tbl_oportunidad";
						$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$this -> load -> view ('Principal/TeleViaViewHeader', $header);
						$this -> load -> view ('Gracias/TeleViaViewGracias');
						$tabla = "tbl_servicio";
						$campo = "id_ser_oportunidad";
						$valor = 1;
						$footer['dw'] = $this -> ModelTelViaServicio -> GetCampoAll($tabla, $campo, $valor);
						$tabla = "tbl_servicio";
						$campo = "id_ser_oportunidad";
						$valor = 2;
						$footer['emp'] = $this -> ModelTelViaServicio -> GetCampoAll($tabla, $campo, $valor);
						$tabla = "tbl_servicio";
						$campo = "id_ser_oportunidad";
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
				}

	}
}
