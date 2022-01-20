<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ModelOteluma extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
  }
  // OBTENER TODOS LOS REGISTROS
  public function GetAll($tabla = NULL){
    $respuesta = array();
    $query =  $this -> db -> query("SELECT * FROM $tabla");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else {
      return false;
    }
    $query -> close;
    $query = NULL;
  }
  // OBETNER REGISTROS CON LIMIT Y ORDER
  public function GetAllOrderLimit($tabla = NULL, $order = NULL, $modo = NULL, $base = NULL, $tope = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla ORDER BY $order $modo LIMIT $base, $tope");
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
  // OBETNER REGISTROS CON LIMIT Y ORDER
  public function GetAllWhereOrderLimit($tabla = NULL, $campo = NULL, $valor = NULL, $order = NULL, $modo = NULL, $base = NULL, $tope = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor."' ORDER BY $order $modo LIMIT $base, $tope");
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
  // OBTENER TODOS LOS REGISTROS COMPARANDO UN CAMPO
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
  // OBTENER UN SOLO REGISTRO COMPARANDO UN CAMPO
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
  // OBTENER UN SOLO REGISTRO COMPARANDO DOS CAMPOS
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
  // OBTENER TODOS LOS REGISTROS CON LIMIT
  public function GetAllLimit($tabla = NULL, $campo = NULL, $valor = NULL, $base = NULL, $tope = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor."' LIMIT $base, $tope");
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
  // OBTENER TODOS LOS REGISTROS ORDENADOS
  public function GetAllOrder($tabla = NULL, $order = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla ORDER BY $order DESC");
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
  // OBTENER REGISTROS CON LIKE
  public function GetAllLikeLimit($tabla = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $valor = NULL, $ordenar = NULL, $modo = NULL, $base = NULL, $tope = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 like '%$valor%' OR $campo2 like '%$valor%' OR $campo3 like '%$valor%' OR $campo4 like '%$valor%' ORDER BY $ordenar $modo LIMIT $base, $tope");
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
  // OBTENER REGISTROS CON LIKE
  public function GetAllLike($tabla = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $valor = NULL, $ordenar = NULL, $modo = NULL, $base = NULL, $tope = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 like '%$valor%' OR $campo2 like '%$valor%' OR $campo3 like '%$valor%' OR $campo4 like '%$valor%'");
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
  // ACTUALIZAR UN CAMPO
  public function Update($tabla = NULL, $campo = NULL, $valor = NULL, $camposet = NULL, $ruta = NULL){
    $query = $this -> db -> query("UPDATE $tabla SET $campo = TRIM('".$valor."') WHERE $camposet = '".$ruta."'");
    if ($query) {
      return "ok";
    }else {
      return "error";
    }
    $query -> close();
    $query = null;
  }
  // ACTUALIZAR 2 CAMPOS
  public function Update2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $camposet = NULL, $ruta = NULL){
    $query = $this -> db -> query("UPDATE $tabla SET $campo1 = TRIM('".$valor1."'), $campo2 = TRIM('".$valor2."') WHERE $camposet = '".$ruta."'");
    if ($query) {
      return "ok";
    }else {
      return "error";
    }
    $query -> close();
    $query = null;
  }
  // INSERTAR
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
}
