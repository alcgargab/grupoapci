<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ModelAEMI extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  // --------------- insertar registros --------------- //
  public function insert($tabla = NULL, $data = NULL){
    $query = $this -> db -> insert($tabla, $data);
    if ($query) {
      return "true";
    }else {
      return "false";
    }
    $query = null;
    $query -> close();
  }
  // --------------- obtener todos los registros de una tabla --------------- //
  public function getAll($select = NULL, $tabla = NULL){
    $respuesta = array();
    $query =  $this -> db -> query("SELECT $select FROM $tabla");
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
  // --------------- obtener un solo registro de una tabla comparando 1 campo --------------- //
  public function getRowWhere1($select = NULL, $tabla = NULL, $campo = NULL, $valor = NULL){
    $query = $this -> db -> query("SELECT $select FROM $tabla WHERE $campo = '".$valor."'");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- obtener todos los registros comparando 1 campo --------------- //
  public function getAllWhere1($select = NULL, $tabla = NULL, $campo = NULL, $valor = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT $select FROM $tabla WHERE $campo = '".$valor."'");
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
}
