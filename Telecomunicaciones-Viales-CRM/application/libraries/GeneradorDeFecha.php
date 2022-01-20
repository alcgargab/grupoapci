<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class GeneradorDeFecha extends CI_Controller {
		function __construct() { }
		public function index(){ }
		// --------------- fecha en letra --------------- //
		public function convert_date_to_letter($date = NULL){
			$fecha = substr($date, 0, 10);
			$tfecha = strlen($fecha);
			if ($tfecha == 10) {
				$numeroDia = date('d', strtotime($date));
				$dia = date('l', strtotime($date));
				$mes = date('F', strtotime($date));
				$anio = date('Y', strtotime($date));
				$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
				$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
				$nombredia = str_replace($dias_EN, $dias_ES, $dia);
				$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
				$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
				$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
				$dateletter = $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
			}
			elseif ($tfecha == 7) {
				$mes = date('F', strtotime($date));
				$anio = date('Y', strtotime($date));
				$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
				$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
				$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
				$dateletter = $nombreMes." de ".$anio;
			}
			return $dateletter;
		}
	}
