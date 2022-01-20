<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
	require('Fpdf/fpdf.php');
	class Generate_file extends FPDF{
  	// Cabecera de página
  	function Header(){
  	    // Logo
  	    // $this -> Image('logo_pb.png',10,8,33);
  	    // Arial bold 15
  	    $this -> SetFont('Arial', 'B' ,15);
  	    // Movernos a la derecha
  	    $this -> Cell(150);
  	    // Título
  	    // $this -> Cell(50, 10, 'Titulo', 0, 0, 'C');
  	    // Salto de línea
  	    $this -> Ln(20);
  	}
  	// Pie de página
  	function Footer(){
  	    // Posición: a 1,5 cm del final
  	    $this -> SetY(-15);
  	    // Arial italic 8
  	    $this -> SetFont('Arial','I',8);
  	    // Número de página
  	    $this -> Cell(0, 10, utf8_decode('Página ').$this -> PageNo().'/{nb}', 0, 0, 'C');
  	}
    // descargar archivos
  	public function download_files($data = NULL) {
      // echo "<pre>"; print_r($data); echo "</pre>"; die();
      $controller_url = base_url().'dcs/case-files/'.$data['tbl_em'] -> ruta_em.'/'.$data['tbl_ex'] -> numero_empleado_e.'/';
    	$crearExpedienete = new Generate_file();
    	$crearExpedienete -> AliasNbPages();
    	$crearExpedienete -> AddPage();
    	$crearExpedienete -> SetFont('Arial', '', 10);
      // PNG para developer y JPEG para production
      $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> curriculum_ex, 10, 10, 190, 267, 'PNG');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> acta_ex, 10, 10, 190, 267, 'PNG');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> ine_ex, 10, 10, 190, 267, 'PNG');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> estudios_ex, 10, 10, 190, 267, 'PNG');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> domicilio_ex, 10, 10, 190, 267, 'PNG');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> curp_ex, 10, 10, 190, 267, 'PNG');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> seguro_social_ex, 10, 10, 190, 267, 'PNG');
      $crearExpedienete -> AddPage('P', 'A4');
      if ($data['tbl_ex'] -> carta1_ex != "sin imagen") {
        $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> carta1_ex, 10, 10, 190, 267, 'PNG');
        $crearExpedienete -> AddPage('P', 'A4');
      }
      if ($data['tbl_ex'] -> carta2_ex != "sin imagen") {
        $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> carta2_ex, 10, 10, 190, 267, 'PNG');
        $crearExpedienete -> AddPage('P', 'A4');
      }
      if ($data['tbl_ex'] -> fotos_ex != "sin imagen") {
        $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> fotos_ex, 10, 10, 190, 267, 'PNG');
        $crearExpedienete -> AddPage('P', 'A4');
      }
      $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> rfc_ex, 10, 10, 190, 267, 'PNG');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($controller_url.$data['tbl_ex'] -> cuenta_ex, 10, 10, 190, 267, 'PNG');
      // $crearExpedienete -> Cell(40, 90, utf8_decode('CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DETERMINADO'));
    	$namepdf = "Expediente"."_".$data['tbl_em'] -> ruta_em."_".$data['tbl_ex'] -> numero_empleado_e.".pdf";
    	$crearExpedienete -> Output('D', $namepdf);
    	// $crearExpedienete -> Output();
  	}
  }
