<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ModelTelViaServicio extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  //  OBTENER TODOS LOS REGISTROS DE LAS TABLAS
  public function GetAll($tabla){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla");
    if($query -> num_rows() > 0){
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
    $query -> close();
    $query = null;
  }
  //  OBTENER CIERTOS REGISTROS DE LAS TABLAS
  public function GetLimit($tabla, $base, $tope){
    $respuesta = array();
    // $query = $this -> db -> query("SELECT * FROM $tabla");
    $query = $this -> db -> query("SELECT * FROM $tabla LIMIT $base, $tope");
    if($query -> num_rows() > 0){
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
    $query -> close();
    $query = null;
  }
  // OBTENER UN SOLO REGISTRO CON EL CAMPO Y EL VALOR
  public function GetCampo($tabla, $campo, $valor){
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor."'");
    if ($query -> num_rows() > 0) {
      return $query -> row();
    }else {
      return FALSE;
    }
    $query -> close();
    $query = NULL;
  }
  // OBTENER UN SOLO REGISTRO CON EL CAMPO Y EL VALOR
  public function GetCampoAll($tabla, $campo, $valor){
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor."'");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else {
      return FALSE;
    }
    $query -> close();
    $query = NULL;
  }
  // OBTENER UN SOLO REGISTRO COMPARANDO 2 CAMPOS
  public function GetCampos($tabla, $campo1, $valor1, $campo2, $valor2){
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."'AND $campo2 = '".$valor2."'");
    if ($query -> num_rows() > 0) {
      return $query -> row();
    }else {
      return FALSE;
    }
    $query -> close();
    $query = NULL;
  }
  // ORDENAR TODOS LOS REGISTROS
  public function GetAllOrder($tabla = NULL, $order = NULL, $modo = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla ORDER BY $order $modo");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else {
      return FALSE;
    }
    $query -> close();
    $query = NULL;
  }
  // ORDENAR TODOS LOS REGISTROS CON LIMITE
  public function GetAllOrderLimit($tabla = NULL, $order = NULL, $modo = NULL, $base = NULL, $tope = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla ORDER BY $order $modo LIMIT $base, $tope");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else {
      return FALSE;
    }
    $query -> close();
    $query = NULL;
  }
  // INSERTAR
  public function InsertCorreo($data){
    $query = $this -> db -> insert('correo',$data);
    $query = null;
  }
  // ACTUALIZAR
  public function Update($tabla, $campo, $valor, $registro){
    $query = $this -> db -> where($campo, $valor);
		$query = $this -> db -> update($tabla, $registro);
    if ($query) {
      return "true";
    }else {
      return "false";
    }
    $query -> close();
    $query = null;
  }
  // ACTUALIZAR UN CAMPO
  public function UpdateWhere($tabla = NULL, $campo = NULL, $valor = NULL, $camposet = NULL, $ruta = NULL){
    $query = $this -> db -> query("UPDATE $tabla SET $campo = TRIM('".$valor."') WHERE $camposet = '".$ruta."'");
    if ($query) {
      return "true";
    }else {
      return "false";
    }
    $query -> close();
    $query = null;
  }
  // ELIMINAR
  public function Delete($tabla, $campo, $valor){
    $query = $this -> db -> where($campo, $valor);
    $query = $this -> db -> delete($tabla);
    if ($query) {
      return "true";
    }else {
      return "false";
    }
    $query -> close();
    $query = null;
  }
  // INSERTAR
  public function Insert($tabla, $insert){
    $query = $this -> db -> insert($tabla, $insert);
    if ($query) {
      return "true";
    }else {
      return "false";
    }
    $query -> close();
    $query = null;
  }
  // AGRUPAR TODOS LOS RESULTADOS DE UNA TABLA
  public function GetAllInner(){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM tbl_servicio ser INNER JOIN tbl_subser sub ON ser.id_ser = sub.id_ser");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else {
      return FALSE;
    }
    $query -> close();
    $query = null;
  }
}
