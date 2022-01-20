<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
  }
  // --------------- INSERTAR ---------------//
  public function Insert($tabla = NULL, $data = NULL){
    $query = $this -> db -> insert($tabla, $data);
    if ($query) {
      return "ok";
    }else {
      return "error";
    }
    $query = null;
    $query -> close();
  }
  // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO UN CAMPO ---------------//
  public function GetAllWhere($tabla = NULL, $campo = NULL, $valor = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor."'");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- OBTENER UN SOLO REGISTRO CON LIKE ---------------//
  public function GetRowWhere2Like($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 LIKE '%$valor2%' ");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- OBTENER REGISTROS AGRUPADOS WHERE ---------------//
  public function GetAllWhereGroupBy($count = NULL, $alias1 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla = NULL, $campow = NULL, $valor = NULL, $groupfor = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT COUNT($count) as $alias1, $campo1, $campo2 FROM $tabla WHERE $campow LIKE '%".$valor."%' GROUP BY $groupfor ASC");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }
    else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO UN CAMPO ---------------//
  public function GetAllWhere2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 = '".$valor2."'");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- OBTENER REGISTROS CON LIKE ---------------//
  public function GetAllLike2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 LIKE '%$valor2%'");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- OBTENER UN SOLO REGISTRO COMPARANDO UN CAMPO ---------------//
  public function GetRowWhere($tabla = NULL, $campo = NULL, $valor = NULL){
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor."'");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- OBTENER UN SOLO REGISTRO COMPARANDO DOS CAMPOS --------------- //
  public function GetRowWhere2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 = '".$valor2."' ");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- OBTENER UN SOLO REGISTRO COMPARANDO TRES CAMPOS --------------- //
  public function GetRowWhere3($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND ($campo2 = '".$valor2."' AND $campo3 = '".$valor3."')");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  }
