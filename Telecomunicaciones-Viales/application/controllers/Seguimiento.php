<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Seguimiento extends CI_Controller {
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
	public function index($codigo = NULL){
		$tabla = "tbl_oportunidad";
		$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
		$home['Codigo'] = $codigo;
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
		$this -> load -> view ('Principal/TeleViaViewHeader', $header);
		$this -> load -> view ('Seguimiento/TeleViaViewUserSeguimiento', $home);
		$this -> load -> view ('Principal/TeleViaViewFooter', $footer);
	}
	public function Servicio($ruta = NULL){
		$home['Usuario'] =  $this -> input -> post('Usuario');
		$home['Password'] =  $this -> input -> post('Password');
		// if (isset($home['Codigo'])) {
			$tabla = "userseguimiento";
			$campo1 = "Codigo";
			$valor1 = $home['Usuario'];
			$campo2 = "Password";
			$valor2 = $home['Password'];
			$seguimiento = $this -> ModelTelViaServicio -> GetCampos($tabla, $campo1, $valor1, $campo2, $valor2);
			if ($seguimiento) {
				// print_r($seguimiento); die();
				// DATOS PARA EL HEADER
				$tabla = "tbl_oportunidad";
				$header['oportunidad'] = $this -> ModelTelViaServicio -> GetAll($tabla);
				// DATOS PARA EL HOME
				$tabla = "serseguimiento";
				$campo = "SS_idUSeguimiento";
				$valor = $seguimiento -> idUSeguimiento;
				$home['seguimiento'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
				$tabla = "tbl_subser";
				$campo = "id_subser";
				$valor = $home['seguimiento'] -> SS_id_subser;
				$home['servicio'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
				$home['usuario'] = $seguimiento;
				// echo "<pre>"; print_r($home); echo "</pre>"; die();
				// DATOS PARA EL FOOTER
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
				// VISTAS
				$this -> load -> view ('Principal/TeleViaViewHeader', $header);
				$this -> load -> view ('Seguimiento/TeleViaViewSeguimiento', $home);
				$this -> load -> view ('Principal/TeleViaViewFooter', $footer);
				// echo "usuario existente"; die();
			}else { ?>
				<!-- echo "usuario no existe"; die(); -->
				<script type="text/javascript">
					alert('usuario o contraseña incorrectos');
					window.location.replace("<?=base_url()?>Seguimiento");
				</script>
			<?php }
			// print_r("lleno"); die();
		// }else {
		// 	print_r("Adios"); die();
		// }
	}
}
