<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class GeneradordeCodigo extends CI_Controller {
    function __construct() {
      // $this -> ci = & get_instance();
    }
    // --------------- generar código aleatorio --------------- //
    public function index(){
      // TRUE O FALSE EN LA OPCIÓN QUE QUIERAS AÑADIR
      $opc_letras = TRUE; //  FALSE para quitar las letras
      $opc_numeros = TRUE; // FALSE para quitar los números
      $opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
      $opc_especiales = FALSE; // FALSE para quitar los caracteres especiales
      $longitud = 3;
      $password = "";
      $letras ="abcdefghijklmnopqrstuvwxyz";
      $numeros = "1234567890";
      $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $especiales ="|@#~$%()=^*+[]{}-_";
      $listado = "";
      if ($opc_letras == TRUE) {
        $listado .= $letras;
      }
      if ($opc_numeros == TRUE) {
        $listado .= $numeros;
      }
      if($opc_letrasMayus == TRUE) {
        $listado .= $letrasMayus;
      }
      if($opc_especiales == TRUE) {
        $listado .= $especiales;
      }
      str_shuffle($listado);
      $max = strlen($listado)-1;
      for( $i=1; $i<=$longitud; $i++) {
        $password[$i] = $listado[mt_rand(0,$max)];
        str_shuffle($listado);
      }
      return $password;
    }
    // --------------- generar código aleatorio de 10 digitos --------------- //
    public function c10(){
      // TRUE O FALSE EN LA OPCIÓN QUE QUIERAS AÑADIR
      $opc_letras = TRUE; //  FALSE para quitar las letras
      $opc_numeros = TRUE; // FALSE para quitar los números
      $opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
      $opc_especiales = TRUE; // FALSE para quitar los caracteres especiales
      $longitud = 10;
      $password = "";
      $letras ="abcdefghijklmnopqrstuvwxyz";
      $numeros = "1234567890";
      $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $especiales ="|@#~$%()=^*+[]{}-_";
      $listado = "";
      if ($opc_letras == TRUE) {
        $listado .= $letras;
      }
      if ($opc_numeros == TRUE) {
        $listado .= $numeros;
      }
      if($opc_letrasMayus == TRUE) {
        $listado .= $letrasMayus;
      }
      if($opc_especiales == TRUE) {
        $listado .= $especiales;
      }
      str_shuffle($listado);
      $max = strlen($listado)-1;
      for( $i=1; $i<=$longitud; $i++) {
        $password[$i] = $listado[mt_rand(0,$max)];
        str_shuffle($listado);
      }
      return $password;
    }
    // --------------- generar código aleatorio de 20 digitos --------------- //
    public function c20(){
      // TRUE O FALSE EN LA OPCIÓN QUE QUIERAS AÑADIR
      $opc_letras = TRUE; //  FALSE para quitar las letras
      $opc_numeros = TRUE; // FALSE para quitar los números
      $opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
      $opc_especiales = TRUE; // FALSE para quitar los caracteres especiales
      $longitud = 20;
      $password = "";
      $letras ="abcdefghijklmnopqrstuvwxyz";
      $numeros = "1234567890";
      $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $especiales ="|@#~$%()=^*+[]{}-_";
      $listado = "";
      if ($opc_letras == TRUE) {
        $listado .= $letras;
      }
      if ($opc_numeros == TRUE) {
        $listado .= $numeros;
      }
      if($opc_letrasMayus == TRUE) {
        $listado .= $letrasMayus;
      }
      if($opc_especiales == TRUE) {
        $listado .= $especiales;
      }
      str_shuffle($listado);
      $max = strlen($listado)-1;
      for( $i=1; $i<=$longitud; $i++) {
        $password[$i] = $listado[mt_rand(0,$max)];
        str_shuffle($listado);
      }
      return $password;
    }
  }
