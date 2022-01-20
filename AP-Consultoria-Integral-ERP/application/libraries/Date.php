<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Date extends CI_Controller {
		function __construct() { }
		public function index(){ }
		// --------------- fecha actual en letra --------------- //
		public function get_date(){
			$fechamodificar = date('d-m-Y');
			$fecha = substr($fechamodificar, 0, 10);
			$numeroDia = date('d', strtotime($fechamodificar));
			$dia = date('l', strtotime($fechamodificar));
			$mes = date('F', strtotime($fechamodificar));
			$anio = date('Y', strtotime($fechamodificar));
			$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
			$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
			$nombredia = str_replace($dias_EN, $dias_ES, $dia);
			$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
			$fechaFirma = $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
			return $fechaFirma;
		}
		// --------------- fecha de ingreso del empleado en letra| --------------- //
		public function convert_date_to_letter($fechaIngreso = NULL){
			$fecha = substr($fechaIngreso, 0, 10);
			$numeroDia = date('d', strtotime($fechaIngreso));
			$dia = date('l', strtotime($fechaIngreso));
			$mes = date('F', strtotime($fechaIngreso));
			$anio = date('Y', strtotime($fechaIngreso));
			$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
			$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
			$nombredia = str_replace($dias_EN, $dias_ES, $dia);
			$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
			$fechaFirma = $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
			return $fechaFirma;
		}
		// --------------- antiguedad de los empleados --------------- //
		public function get_seniority($fecha = NULL){
			$anio = $fecha[0].$fecha[1].$fecha[2].$fecha[3];
			$mes = $fecha[5].$fecha[6];
			$dia = $fecha[8].$fecha[9];
			$aniohoy = date('Y');
			$meshoy = date('m');
			$diahoy = date('d');
			if ($aniohoy == $anio) {
				return $antiguedad = 0;
			}
			elseif ($aniohoy > $anio) {
				if ($meshoy > $mes) {
					return $antiguedad = $aniohoy - $anio;
				}
				elseif ($meshoy == $mes) {
					if ($diahoy > $dia || $diahoy == $dia) {
						return $antiguedad = $aniohoy - $anio;
					}
					else {
						return $antiguedad = 0;
					}
				}
				else {
					if ($aniohoy - $anio <= 1) {
						return $antiguedad = 0;
					}
					else {
						return $antiguedad = $aniohoy - $anio;
					}
				}
			}
			else {
				return $antiguedad = 0;
			}
		}
		// --------------- fecha de firma de contrato del empleado --------------- //
		public function obtenerFechaFirmaContrato($empleado = NULL){
			$fechamodificar = date('Y-m-d');
			$totalrow = count($empleado);
			for ($i = 0; $i < $totalrow;) {
				if ($empleado[$i] -> FProxFirmacontrato == $fechamodificar) {
					print_r('Hay que firmar');
				}else {
					print_r('Sin contratos');
				}
				$i++;
			}
			$fecha = substr($fechamodificar, 0, 10);
			$numeroDia = date('d', strtotime($fechamodificar));
			$dia = date('l', strtotime($fechamodificar));
			$mes = date('F', strtotime($fechamodificar));
			$anio = date('Y', strtotime($fechamodificar));
			$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
			$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
			$nombredia = str_replace($dias_EN, $dias_ES, $dia);
			$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
			$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
			$fechaFirma = $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
			return $fechaFirma;
		}
		// --------------- validamos si el día es solicitado con 15 días de enticipación --------------- //
		public function validate_holiday_day($fecha = NULL){
			$hoy = date('Y-m-d');
			$date1 = new DateTime($fecha);
			$date2 = new DateTime($hoy);
			$diff = $date1 -> diff($date2);
			return $diff -> days;
		}
	}
