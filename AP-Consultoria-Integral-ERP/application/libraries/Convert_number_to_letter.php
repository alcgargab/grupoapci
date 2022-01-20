<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Convert_number_to_letter extends CI_Controller {
    function __construct() {
      // $this -> ci = & get_instance();
    }
    public function index(){
    }
    function unidad($numero = NULL){
      if ($numero == 9) {
        $numu = "NUEVE";
      }
      else if ($numero == 8) {
        $numu = "OCHO";
      }
      else if ($numero == 7) {
        $numu = "SIETE";
      }
      else if ($numero == 6) {
        $numu = "SEIS";
      }
      else if ($numero == 5) {
        $numu = "CINCO";
      }
      else if ($numero == 4) {
        $numu = "CUATRO";
      }
      else if ($numero == 3) {
        $numu = "TRES";
      }
      else if ($numero == 2) {
        $numu = "DOS";
      }
      else if ($numero == 1) {
        $numu = "UNO";
      }
      else {
        $numu = "";
      }
      return $numu;
    }
    function decena($numdero){
      if ($numdero >= 90 && $numdero <= 99){
        $numd = "NOVENTA ";
        if ($numdero > 90)
        $numd = $numd."Y ". $this -> unidad($numdero - 90);
      }
      else if ($numdero >= 80 && $numdero <= 89){
        $numd = "OCHENTA ";
        if ($numdero > 80)
        $numd = $numd."Y ". $this -> unidad($numdero - 80);
      }
      else if ($numdero >= 70 && $numdero <= 79){
        $numd = "SETENTA ";
        if ($numdero > 70)
        $numd = $numd."Y ". $this -> unidad($numdero - 70);
      }
      else if ($numdero >= 60 && $numdero <= 69){
        $numd = "SESENTA ";
        if ($numdero > 60)
        $numd = $numd."Y ". $this -> unidad($numdero - 60);
      }
      else if ($numdero >= 50 && $numdero <= 59){
        $numd = "CINCUENTA ";
        if ($numdero > 50)
        $numd = $numd."Y ". $this -> unidad($numdero - 50);
      }
      else if ($numdero >= 40 && $numdero <= 49){
        $numd = "CUARENTA ";
        if ($numdero > 40)
        $numd = $numd."Y ". $this -> unidad($numdero - 40);
      }
      else if ($numdero >= 30 && $numdero <= 39){
        $numd = "TREINTA ";
        if ($numdero > 30)
        $numd = $numd."Y ". $this -> unidad($numdero - 30);
      }
      else if ($numdero >= 20 && $numdero <= 29){
        if ($numdero == 20)
        $numd = "VEINTE ";
        else
        $numd = "VEINTI". $this -> unidad($numdero - 20);
      }
      else if ($numdero >= 10 && $numdero <= 19){
        switch ($numdero){
          case 10:{
            $numd = "DIEZ ";
            break;
          }
          case 11:{
            $numd = "ONCE ";
            break;
          }
          case 12:{
            $numd = "DOCE ";
            break;
          }
          case 13:
          {
            $numd = "TRECE ";
            break;
          }
          case 14:
          {
            $numd = "CATORCE ";
            break;
          }
          case 15:
          {
            $numd = "QUINCE ";
            break;
          }
          case 16:
          {
            $numd = "DIECISEIS ";
            break;
          }
          case 17:
          {
            $numd = "DIECISIETE ";
            break;
          }
          case 18:
          {
            $numd = "DIECIOCHO ";
            break;
          }
          case 19:
          {
            $numd = "DIECINUEVE ";
            break;
          }
        }
      }
      else
      $numd = $this -> unidad($numdero);
      return $numd;
    }
    function centena($numc){
      if ($numc >= 100){
        if ($numc >= 900 && $numc <= 999){
          $numce = "NOVECIENTOS ";
          if ($numc > 900)
          $numce = $numce. $this -> decena($numc - 900);
        }
        else if ($numc >= 800 && $numc <= 899){
          $numce = "OCHOCIENTOS ";
          if ($numc > 800)
          $numce = $numce. $this -> decena($numc - 800);
        }
        else if ($numc >= 700 && $numc <= 799){
          $numce = "SETECIENTOS ";
          if ($numc > 700)
          $numce = $numce. $this -> decena($numc - 700);
        }
        else if ($numc >= 600 && $numc <= 699){
          $numce = "SEISCIENTOS ";
          if ($numc > 600)
          $numce = $numce. $this -> decena($numc - 600);
        }
        else if ($numc >= 500 && $numc <= 599){
          $numce = "QUINIENTOS ";
          if ($numc > 500)
          $numce = $numce. $this -> decena($numc - 500);
        }
        else if ($numc >= 400 && $numc <= 499){
          $numce = "CUATROCIENTOS ";
          if ($numc > 400)
          $numce = $numce. $this -> decena($numc - 400);
        }
        else if ($numc >= 300 && $numc <= 399){
          $numce = "TRESCIENTOS ";
          if ($numc > 300)
          $numce = $numce. $this -> decena($numc - 300);
        }
        else if ($numc >= 200 && $numc <= 299){
          $numce = "DOSCIENTOS ";
          if ($numc > 200)
          $numce = $numce. $this -> decena($numc - 200);
        }
        else if ($numc >= 100 && $numc <= 199){
          if ($numc == 100)
          $numce = "CIEN ";
          else
          $numce = "CIENTO ". $this -> decena($numc - 100);
        }
      }
      else
      $numce = $this -> decena($numc);
      return $numce;
    }
    function miles($nummero){
      if ($nummero >= 1000 && $nummero < 2000){
        $numm = "MIL ". $this -> centena($nummero%1000);
      }
      if ($nummero >= 2000 && $nummero <10000){
        $numm = unidad(Floor($nummero/1000))." MIL ". $this -> centena($nummero%1000);
      }
      if ($nummero < 1000)
      $numm = $this -> centena($nummero);
      return $numm;
    }
    function decmiles($numdmero){
      if ($numdmero == 10000)
      $numde = "DIEZ MIL";
      if ($numdmero > 10000 && $numdmero <20000){
        $numde = $this -> decena(Floor($numdmero/1000))."MIL ". $this -> centena($numdmero%1000);
      }
      if ($numdmero >= 20000 && $numdmero <100000){
        $numde = $this -> decena(Floor($numdmero/1000))." MIL ". $this -> miles($numdmero%1000);
      }
      if ($numdmero < 10000)
      $numde = $this -> miles($numdmero);
      return $numde;
    }
    function cienmiles($numcmero){
      if ($numcmero == 100000)
      $num_letracm = "CIEN MIL";
      if ($numcmero >= 100000 && $numcmero <1000000){
        $num_letracm = $this -> centena(Floor($numcmero/1000))." MIL ". $this -> centena($numcmero%1000);
      }
      if ($numcmero < 100000)
      $num_letracm = $this -> decmiles($numcmero);
      return $num_letracm;
    }
    function millon($nummiero){
      if ($nummiero >= 1000000 && $nummiero <2000000){
        $num_letramm = "UN MILLON ". $this -> cienmiles($nummiero%1000000);
      }
      if ($nummiero >= 2000000 && $nummiero <10000000){
        $num_letramm = $this -> unidad(Floor($nummiero/1000000))." MILLONES ". $this -> cienmiles($nummiero%1000000);
      }
      if ($nummiero < 1000000)
      $num_letramm = $this -> cienmiles($nummiero);
      return $num_letramm;
    }
    function decmillon($numerodm){
      if ($numerodm == 10000000)
      $num_letradmm = "DIEZ MILLONES";
      if ($numerodm > 10000000 && $numerodm <20000000){
        $num_letradmm = $this -> decena(Floor($numerodm/1000000))."MILLONES ". $this -> cienmiles($numerodm%1000000);
      }
      if ($numerodm >= 20000000 && $numerodm <100000000){
        $num_letradmm = $this -> decena(Floor($numerodm/1000000))." MILLONES ". $this -> millon($numerodm%1000000);
      }
      if ($numerodm < 10000000)
      $num_letradmm = $this -> millon($numerodm);
      return $num_letradmm;
    }
    function cienmillon($numcmeros){
      if ($numcmeros == 100000000)
      $num_letracms = "CIEN MILLONES";
      if ($numcmeros >= 100000000 && $numcmeros <1000000000){
        $num_letracms = $this -> centena(Floor($numcmeros/1000000))." MILLONES ". $this -> millon($numcmeros%1000000);
      }
      if ($numcmeros < 100000000)
      $num_letracms = $this -> decmillon ($numcmeros);
      return $num_letracms;
    }
    function milmillon($nummierod){
      if ($nummierod >= 1000000000 && $nummierod <2000000000){
        $num_letrammd = "MIL ". $this -> cienmillon($nummierod%1000000000);
      }
      if ($nummierod >= 2000000000 && $nummierod <10000000000){
        $num_letrammd = $this -> unidad(Floor($nummierod/1000000000))." MIL ". $this -> cienmillon($nummierod%1000000000);
      }
      if ($nummierod < 1000000000)
      $num_letrammd = $this -> cienmillon ($nummierod);
      return $num_letrammd;
    }
		// generar número en letra
		function generate($numero){
      $num = str_replace(",", "", $numero);
      $num = number_format($num, 2, '.', '');
      $cents = substr($num, strlen($num)-2, strlen($num)-1);
      $num = (int)$num;
      $numf = $this -> milmillon($num);
      return $numf." PESOS ".$cents."/100 MONEDA NACIONAL";
    }
  }
