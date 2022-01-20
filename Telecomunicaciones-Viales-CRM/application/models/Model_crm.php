<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_crm extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
  }
  // --------------- insertar registros ---------------//
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
  // --------------- obtener un solo registro comparando 1 campo ---------------//
  public function getRowWhere1($tabla = NULL, $campo = NULL, $valor = NULL){
    $query = $this -> db -> query("SELECT * FROM $tabla
      WHERE $campo = '".$valor."'");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- obtener un solo registro comparando 2 campos --------------- //
  public function getRowWhere2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
    $query = $this -> db -> query("SELECT * FROM $tabla
      WHERE $campo1 = '".$valor1."'
      AND $campo2 = '".$valor2."' ");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- obtener un solo registro comparando 3 campos --------------- //
  public function getRowWhere3($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    $query = $this -> db -> query("SELECT * FROM $tabla
      WHERE $campo1 = '".$valor1."'
      AND $campo2 = '".$valor2."'
      AND $campo3 = '".$valor3."'");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- obtener un solo registro comparando 2 campos pero el segundo campo con like ---------------//
  public function getRowWhere2Like($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla
      WHERE $campo1 = '".$valor1."'
      AND $campo2 LIKE '%$valor2%' ");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- agrupar todos los registros de 2 tablas comparando 1 campo de la primera tabla --------------- //
  public function getRow2InnerWhere1($tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $valor1 = NULL){
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      WHERE $tabla1.$campo3 = '".$valor1."'");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- agrupar todos los registros de 4 tablas comparando 1 campo de la primera tabla --------------- //
  public function getRow4InnerWhere1($tabla1 = NULL, $tabla2 = NULL, $tabla3 = NULL, $tabla4 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $campo6 = NULL, $campo7 = NULL, $valor1 = NULL){
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
      INNER JOIN $tabla4 ON $tabla3.$campo5 = $tabla4.$campo6
      WHERE $tabla1.$campo7 = '".$valor1."'");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- obtener todos los registros --------------- //
  public function getAll($tabla = NULL){
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
  // --------------- obtener todos los registros agrupados --------------- //
  public function getAllGroupBy($tabla = NULL, $groupfor = NULL){
    $respuesta = array();
    $query =  $this -> db -> query("SELECT * FROM $tabla
      GROUP BY $groupfor");
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
  // --------------- obtener todos los registros comparando 1 campo --------------- //
  public function getAllWhere1($tabla = NULL, $campo = NULL, $valor = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla
      WHERE $campo = '".$valor."'");
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
  // --------------- obtener todos los registros comparando 2 campos --------------- //
  public function getAllWhere2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla
      WHERE $campo1 = '".$valor1."'
      AND $campo2 = '".$valor2."'");
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
  // --------------- obtener todos los regisros comparando 3 campos  --------------- //
  public function getAllWhere3($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla
      WHERE $campo1 = '".$valor1."'
      AND $campo2 = '".$valor2."'
      AND $campo3 = '".$valor3."'");
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
  // --------------- agrupar todos los registros de 2 tablas --------------- //
  public function getAll2Inner($tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2");
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
  // --------------- agrupar todos los registros de 3 tablas --------------- //
  public function getAll3Inner($tabla1 = NULL, $tabla2 = NULL, $tabla3 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4");
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
  // --------------- agrupar todos los registros de 2 tablas comparando 1 campo de la primera tabla --------------- //
  public function getAll2InnerWhere1($tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $valor1 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      WHERE $tabla1.$campo3 = '".$valor1."'");
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
  // --------------- agrupar todos los registros de 2 tablas comparando 2 campos de la primera tabla --------------- //
  public function getAll2InnerWhere2($tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $valor1 = NULL, $campo4 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      WHERE $tabla1.$campo3 = '".$valor1."'
      AND $tabla1.$campo4 = '".$valor2."'");
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
  // --------------- agrupar todos los registros de 2 tablas comparando 2 campos 1 de la primera tabla y 1 de la segunda tabla --------------- //
  public function getAll2InnerWhere2_2($tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $valor1 = NULL, $campo4 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      WHERE $tabla1.$campo3 = '".$valor1."'
      AND $tabla2.$campo4 = '".$valor2."'");
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
  // --------------- agrupar todos los registros de 2 tablas comparando 2 campos de la primera tabla y 1 campo de la segunda tabla --------------- //
  public function getAll2InnerWhere3($tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $valor1 = NULL, $campo4 = NULL, $valor2 = NULL, $campo5 = NULL, $valor3 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      WHERE $tabla1.$campo3 = '".$valor1."'
      AND $tabla2.$campo4 = '".$valor2."'
      AND $tabla1.$campo5 = '".$valor3."'");
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
  // --------------- agrupar todos los registros de 3 tablas comparando 2 campos de la primera tabla --------------- //
  public function getAll3InnerWhere1($tabla1 = NULL, $tabla2 = NULL, $tabla3 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
      WHERE $tabla1.$campo5 = '".$valor1."'");
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
  // --------------- agrupar todos los registros de 3 tablas comparando 2 campos de la primera tabla --------------- //
  public function getAll3InnerWhere2($tabla1 = NULL, $tabla2 = NULL, $tabla3 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL, $campo6 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
      WHERE $tabla1.$campo5 = '".$valor1."' AND $tabla1.$campo6 = '".$valor2."'");
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
  // --------------- agrupar todos los registros de 4 tablas --------------- //
  public function getAll4Inner($tabla1 = NULL, $tabla2 = NULL, $tabla3 = NULL, $tabla4 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $campo6 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
      INNER JOIN $tabla4 ON $tabla3.$campo5 = $tabla4.$campo6");
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
  // --------------- agrupar todos los registros de 4 tablas comparando 1 campo de la primera tabla --------------- //
  public function getAll4InnerWhere1($tabla1 = NULL, $tabla2 = NULL, $tabla3 = NULL, $tabla4 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $campo6 = NULL, $campo7 = NULL, $valor1 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
      INNER JOIN $tabla4 ON $tabla3.$campo5 = $tabla4.$campo6
      WHERE $tabla1.$campo7 = '".$valor1."'");
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
  // --------------- agrupar todos los registros de 4 tablas comparando 1 campo de la primera tabla y agrupados por un campo de la 4 tabla --------------- //
  public function getAll4InnerWhere1GroupBy($tabla1 = NULL, $tabla2 = NULL, $tabla3 = NULL, $tabla4 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $campo6 = NULL, $campo7 = NULL, $valor1 = NULL, $groupfor = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
      INNER JOIN $tabla4 ON $tabla3.$campo5 = $tabla4.$campo6
      WHERE $tabla1.$campo7 = '".$valor1."'
      GROUP BY $tabla4.$groupfor");
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
  // --------------- agrupar todos los registros de 2 tablas comparando 1 campo de la primera tabla agrupados y ordenados --------------- //
  public function getAll2InnerGroupbyOrderBy($count = NULL, $alias = NULL, $select1 = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $groupfor = NULL, $order = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT COUNT($count) as $alias, $select1
      FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      GROUP BY $groupfor
      ORDER BY COUNT($count) $order");
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
  // --------------- actualizamos 1 campo --------------- //
  public function update1($tabla = NULL, $campo = NULL, $valor = NULL, $camposet = NULL, $ruta = NULL){
    $query = $this -> db -> query("UPDATE $tabla SET $campo = TRIM('".$valor."')
    WHERE $camposet = '".$ruta."'");
    if ($query) {
      return "true";
    }else {
      return "false";
    }
    $query -> close();
    $query = null;
  }
  // --------------- actualizamos 1 campo de varios registros --------------- //
  public function update1For($tabla = NULL, $campo = NULL, $valor = NULL, $camposet = NULL, $ruta = NULL, $posicion = NULL){
    if ($ruta != "") {
      $total = count($ruta);
      for ($i = 0; $i < $total; $i++) {
        $query = $this -> db -> query("UPDATE $tabla SET $campo = TRIM('".$valor."')
        WHERE $camposet = '".$ruta[$i] -> $posicion."'");
        // $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor[$i] -> $posicion."'");
      }
      return "true";
    }
    else {
      return "false";
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- actualizamos 3 campos --------------- //
  public function update3($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL, $camposet = NULL, $ruta = NULL){
    $query = $this -> db -> query("UPDATE $tabla SET $campo1 = TRIM('".$valor1."'), $campo2 = TRIM('".$valor2."'), $campo3 = TRIM('".$valor3."') WHERE $camposet = '".$ruta."'");
    if ($query) {
      return "true";
    }else {
      return "false";
    }
    $query -> close();
    $query = null;
  }
  // --------------- agrupar todos los registros de 3 tablas comparando 2 campos de la primera tabla --------------- //
  public function getRow3InnerWhere1($tabla1 = NULL, $tabla2 = NULL, $tabla3 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL){
    $query = $this -> db -> query("SELECT * FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
      INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
      WHERE $tabla1.$campo5 = '".$valor1."'");
    if ($query -> num_rows() > 0) {
        return $query -> row();
    }else {
      return false;
    }
    $query -> close();
    $query = NULL;
  }
  // --------------- obtener 4 campos agrupando 3 tablas comparando agrupados y ordenados ---------------//
  public function get4Rows3InnerGroupByOrderBy($count = NULL, $alias = NULL, $select1 = NULL, $select2 = NULL, $select3 = NULL, $select4 = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $groupfor = NULL, $order = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT COUNT($count) as $alias, $tabla1.$select1, $select2, $select3, $select4
    FROM $tabla1
    INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
    INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
    GROUP BY $tabla1.$groupfor
    ORDER BY COUNT($count) $order");
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
  // --------------- obtener 4 campos comparando 3 tablas comparando un campo de la tabla 1 agruapdos y ordenados ---------------//
  public function get4Rows3InnerWhere1GroupByOrderBy($count = NULL, $alias = NULL, $select1 = NULL, $select2 = NULL, $select3 = NULL, $select4 = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL, $groupfor = NULL, $order = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT COUNT($count) as $alias, $select1, $select2, $select3, $select4
    FROM $tabla1
    INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
    INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
    WHERE $tabla1.$campo5 = '".$valor1."'
    GROUP BY $groupfor
    ORDER BY COUNT($count) $order");
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
  // --------------- obtener 4 campos de la 3 tabla comparando 3 tablas comparando un campo de la tabla 3 agruapdos y ordenados ---------------//
  public function get4Rows3InnerWhere1GroupByOrderBy1($count = NULL, $alias = NULL, $select1 = NULL, $select2 = NULL, $select3 = NULL, $select4 = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL, $groupfor = NULL, $order = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT COUNT($count) as $alias, $tabla3.$select1, $tabla3.$select2, $tabla3.$select3, $tabla3.$select4
    FROM $tabla1
    INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
    INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
    WHERE $tabla3.$campo5 = '".$valor1."'
    GROUP BY $tabla1.$groupfor
    ORDER BY COUNT($count) $order");
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
  // --------------- obtener 4 campos comparando 3 tablas comparando un campo de la tabla 3 agruapdos por un campo de la 1 tabla y ordenados ---------------//
  public function get4Rows3InnerWhere1GroupByOrderBy2($count = NULL, $alias = NULL, $select1 = NULL, $select2 = NULL, $select3 = NULL, $select4 = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL, $groupfor = NULL, $order = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT COUNT($count) as $alias, $select1, $select2, $select3, $select4
    FROM $tabla1
    INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
    INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
    WHERE $tabla3.$campo5 = '".$valor1."'
    GROUP BY $tabla1.$groupfor
    ORDER BY COUNT($count) $order");
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
  // --------------- obtener 4 campos comparando 3 tablas comparando un campo de la tabla 1 con like agruapdos y ordenados ---------------//
  public function get4Rows3InnerWhere1LikeGroupByOrderBy($count = NULL, $alias = NULL, $select1 = NULL, $select2 = NULL, $select3 = NULL, $select4 = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL, $groupfor = NULL, $order = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT COUNT($count) as $alias, $select1, $select2, $select3, $select4
    FROM $tabla1
    INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
    INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
    WHERE $tabla1.$campo5 LIKE '%$valor1%'
    GROUP BY $groupfor
    ORDER BY COUNT($count) $order");
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
  // --------------- obtener 4 campos comparando 3 tablas comparando 2 campos de la tabla 1 agruapdos y ordenados ---------------//
  public function get4Rows3InnerWhere2GroupByOrderBy($count = NULL, $alias = NULL, $select1 = NULL, $select2 = NULL, $select3 = NULL, $select4 = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL, $campo6 = NULL, $valor2 = NULL, $groupfor = NULL, $order = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT COUNT($count) as $alias, $select1, $select2, $select3, $select4
    FROM $tabla1
    INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
    INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
    WHERE $tabla1.$campo5 = '".$valor1."'
    AND $tabla1.$campo6 = '".$valor2."'
    GROUP BY $groupfor
    ORDER BY COUNT($count) $order");
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
  // --------------- obtener 4 campos comparando 3 tablas comparando 2 campos de la tabla 1 uno con Like agruapdos y ordenados ---------------//
  public function get4Rows3InnerWhereLike2GroupByOrderBy($count = NULL, $alias = NULL, $select1 = NULL, $select2 = NULL, $select3 = NULL, $select4 = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL, $campo6 = NULL, $valor2 = NULL, $groupfor = NULL, $order = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT COUNT($count) as $alias, $select1, $select2, $select3, $select4
    FROM $tabla1
    INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
    INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
    WHERE $tabla1.$campo5 LIKE '%$valor1%'
    AND $tabla1.$campo6 = '".$valor2."'
    GROUP BY $groupfor
    ORDER BY COUNT($count) $order");
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
}
