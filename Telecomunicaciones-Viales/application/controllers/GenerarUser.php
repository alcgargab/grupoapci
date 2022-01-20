<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GenerarUser extends CI_Controller {
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
		// TRUE O FALSE EN LA OPCIÓN QUE QUIERAS AÑADIR
		$opc_letras = TRUE; //  FALSE para quitar las letras
		$opc_numeros = TRUE; // FALSE para quitar los números
		$opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
		$opc_especiales = FALSE; // FALSE para quitar los caracteres especiales
		$longitud = 10;
		$Usuario = "";
		$letras ="abcdefghijklmnopqrstuvwxyz";
		$numeros = "1234567890";
		$letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$especiales ="|@#~$%()=^*+[]{}-_";
		$listado = "";
		if ($opc_letras == TRUE){
			$listado .= $letras;
		}if ($opc_numeros == TRUE){
		  $listado .= $numeros;
		}if($opc_letrasMayus == TRUE){
			$listado .= $letrasMayus;
		}if($opc_especiales == TRUE){
			$listado .= $especiales;
		}
		str_shuffle($listado);
		for( $i=1; $i<=$longitud; $i++) {
			$Usuario[$i] = $listado[rand(0,strlen($listado))];
			str_shuffle($listado);
		}
		// VERIFICAMOS QUE NO EXISTA LA CONTRASEÑA
		$tabla = "userseguimiento";
		$campo = "Usuario";
		$valor = $Usuario;
		$data['password'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
		// print_r($data); print_r($Usuario); die();
		if ($data) {
			echo "El usuario no existe";
			echo "<br>";
			echo "<br>";
			print_r($Usuario);
		}else {
			echo "El usuario existe";
			print_r($Usuario);
		}
	}
}
