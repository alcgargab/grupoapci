<?php
  if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
	require('Fpdf/fpdf.php');
	class GenerarExpedientePDF extends FPDF{
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
    // CONTRATO PARCIAL
  	public function ExpedienteCCPDF($expediente = NULL, $empleado = NULL, $ruta = NULL) {
      $url = base_url().'images/Empleado/'.$ruta.'/Expediente/'.$empleado -> NumEmp.'/';
    	$crearExpedienete = new GenerarExpedientePDF();
    	$crearExpedienete -> AliasNbPages();
    	$crearExpedienete -> AddPage();
    	$crearExpedienete -> SetFont('Arial', '', 10);
      $crearExpedienete -> Image($url.$expediente -> FormCurriculum, 10, 10, 190, 267, 'png');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($url.$expediente -> FormActa, 10, 10, 190, 267, 'png');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($url.$expediente -> FormINE, 10, 10, 190, 267, 'png');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($url.$expediente -> FormEstudios, 10, 10, 190, 267, 'png');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($url.$expediente -> FormDomicilio, 10, 10, 190, 267, 'png');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($url.$expediente -> FormCURP, 10, 10, 190, 267, 'png');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($url.$expediente -> FormNSS, 10, 10, 190, 267, 'png');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($url.$expediente -> FormCarta1, 10, 10, 190, 267, 'png');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($url.$expediente -> FormCarta2, 10, 10, 190, 267, 'png');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($url.$expediente -> FormFotos, 10, 10, 190, 267, 'png');
      $crearExpedienete -> AddPage('P', 'A4');
      $crearExpedienete -> Image($url.$expediente -> FormCuenta, 10, 10, 190, 267, 'png');
      // $crearExpedienete -> Cell(40, 90, utf8_decode('CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO DETERMINADO'));
    	$namepdf = "Expediente"." ".$ruta." ".$empleado -> NumEmp.".pdf";
    	$crearExpedienete -> Output('D', $namepdf);
    	// $crearExpedienete -> Output();
  	}
  }
