<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ModelSassper extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
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
  // INSERTAR
  public function InsertCorreo($data){
    $query = $this -> db -> insert('correos',$data);
    $query = null;
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
}
