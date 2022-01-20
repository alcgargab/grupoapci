<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Main extends CI_Model{
    function __construct(){
      parent::__construct();
      $this -> load -> database();
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
    // --------------- obtener todos los registros de los developers --------------- //
    public function getAllDeveloperInner2Where2($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $valor2 = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla1
        INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
        WHERE $campo4 = '".$valor2."' AND $campo3 = 5 OR $campo3 = 8 OR $campo3 = 14 OR $campo3 = 55");
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
    // --------------- obtenber todos los registros de 2 tablas comparando 1 campo de la primera tabla --------------- //
    public function getAllInner2Where1($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $valor1 = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla1
        INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
        WHERE $tabla1.$campo3 = '".$valor1."'");
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
    // --------------- obtenber todos los registros de 2 tablas comparando 1 campo de la primera tabla y con for --------------- //
    public function getAllInner2Where1For($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campoinner = NULL, $campo2 = NULL, $campo1 = NULL, $valor1 = NULL, $posicion1 = NULL){
      if ($valor1 != "") {
        $total = count($valor1);
        $respuesta = array();
        for ($i = 0; $i < $total; $i++) {
          $query = $this -> db -> query("SELECT $select FROM $tabla1
            INNER JOIN $tabla2 ON $tabla1.$campoinner = $tabla2.$campo2
            WHERE $tabla1.$campo1 = '".$valor1[$i] -> $posicion1."'");
          if ($query -> num_rows() > 0) {
            foreach ($query -> result() as $row) {
              $respuesta[] = $row;
            }
          }
        }
        return $respuesta;
      }
      else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtener todos los registros de 2 tablas comparando 1 campo de la segunda tabla y agrupados por un campo de la primera tabla --------------- //
    public function getAllInner2Where1GroupBy($count = NULL, $alias = NULL, $select = NULL, $tabla1 = NULL, $campoinner = NULL, $campo1 = NULL, $tabla2 = NULL, $campo2 = NULL, $campo3 = NULL, $valor3 = NULL, $groupfor = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT COUNT($count) as $alias, $select FROM $tabla1
      INNER JOIN $tabla2 ON $tabla1.$campoinner = $tabla2.$campo2
      WHERE $tabla2.$campo3 = '".$valor3."'
      GROUP BY $tabla2.$groupfor");
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
    // --------------- obtenber todos los registros de 2 tablas comparando 1 campo de la primera tabla y ordenarlos --------------- //
    public function getAllInner2Where1Order($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $valor1 = NULL, $ordercampo = NULL, $order = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla1
        INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
        WHERE $tabla1.$campo3 = '".$valor1."'
        ORDER BY $ordercampo $order");
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
    // --------------- obtenber todos los registros de 2 tablas comparando 2 campos 1 de la primera tabla y 1 de la segunda tabla --------------- //
    public function getAllInner2Where2($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $valor1 = NULL, $campo4 = NULL, $valor2 = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla1
        INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
        WHERE $tabla1.$campo3 = '".$valor1."'
        AND $tabla2.$campo4 = '".$valor2."'");
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
    // --------------- obtenber todos los registros de 2 tablas comparando 1 campo de la primera tabla y con for y 1 campo de la segunda tabla --------------- //
    public function getAllInner2Where2For($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campoinner = NULL, $campo2 = NULL, $campo1 = NULL, $valor1 = NULL, $posicion1 = NULL, $campo3 = NULL, $valor2 = NULL){
      if ($valor1 != "") {
        $total = count($valor1);
        $respuesta = array();
        for ($i = 0; $i < $total; $i++) {
          $query = $this -> db -> query("SELECT $select FROM $tabla1
            INNER JOIN $tabla2 ON $tabla1.$campoinner = $tabla2.$campo2
            WHERE $tabla1.$campo1 = '".$valor1[$i] -> $posicion1."'
            AND $tabla2.$campo3 = '".$valor2."'");
          if ($query -> num_rows() > 0) {
            foreach ($query -> result() as $row) {
              $respuesta[] = $row;
            }
          }
        }
        return $respuesta;
      }
      else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtener todos los registros de 2 tablas comparando 3 campos 1 de la primera tabla con for y 2 de la segunda tabla --------------- //
    public function getAllInner2Where3For($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campoinner = NULL, $campo2 = NULL, $campo1 = NULL, $valor1 = NULL, $posicion1 = NULL, $campo3 = NULL, $valor3 = NULL, $campo4 = NULL, $valor4 = NULL){
      if ($valor1 != "") {
        $total = count($valor1);
        $respuesta = array();
        for ($i = 0; $i < $total; $i++) {
          $query = $this -> db -> query("SELECT $select FROM $tabla1
            INNER JOIN $tabla2 ON $tabla1.$campoinner = $tabla2.$campo2
            WHERE $tabla1.$campo1 = '".$valor1[$i] -> $posicion1."'
            AND $tabla2.$campo3 = '".$valor3."'
            AND $tabla2.$campo4 = '".$valor4."'");
          if ($query -> num_rows() > 0) {
            foreach ($query -> result() as $row) {
              $respuesta[] = $row;
            }
          }
        }
        return $respuesta;
      }
      else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtenber todos los registros de 3 tablas comparando 1 campo de la primera tabla y con for --------------- //
    public function getAllInner3Where1For($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor = NULL, $posicion = NULL){
      if ($valor != "") {
        $total = count($valor);
        $respuesta = array();
        for ($i = 0; $i < $total; $i++) {
          $query = $this -> db -> query("SELECT $select FROM $tabla1
            INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
            INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
            WHERE $tabla1.$campo5 = '".$valor[$i] -> $posicion."'");
          if ($query -> num_rows() > 0) {
            foreach ($query -> result() as $row) {
              $respuesta[] = $row;
            }
          }
        }
        return $respuesta;
      }
      else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtenber todos los registros de 3 tablas comparando 1 campo de la primera tabla con for y 1 campo de la tabla 3 --------------- //
    public function getAllInner3Where2For($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL, $posicion = NULL, $campo6 = NULL, $valor2 = NULL){
      if ($valor1 != "") {
        $total = count($valor1);
        $respuesta = array();
        for ($i = 0; $i < $total; $i++) {
          $query = $this -> db -> query("SELECT $select FROM $tabla1
            INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
            INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
            WHERE $tabla1.$campo5 = '".$valor1[$i] -> $posicion."'
            AND $tabla3.$campo6 = '".$valor2."'");
          if ($query -> num_rows() > 0) {
            foreach ($query -> result() as $row) {
              $respuesta[] = $row;
            }
          }
        }
        return $respuesta;
      }
      else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtenber todos los registros de 3 tablas comparando 1 campo de la primera tabla con for y 1 campo de la tabla 2 --------------- //
    public function getAllInner3Where2For2($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL, $posicion = NULL, $campo6 = NULL, $valor2 = NULL){
      if ($valor1 != "") {
        $total = count($valor1);
        $respuesta = array();
        for ($i = 0; $i < $total; $i++) {
          $query = $this -> db -> query("SELECT $select FROM $tabla1
            INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
            INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
            WHERE $tabla1.$campo5 = '".$valor1[$i] -> $posicion."'
            AND $tabla2.$campo6 = '".$valor2."'");
          if ($query -> num_rows() > 0) {
            foreach ($query -> result() as $row) {
              $respuesta[] = $row;
            }
          }
        }
        return $respuesta;
      }
      else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtenber todos los registros de 4 tablas comparando 4 campos de la primera tabla --------------- //
    public function getAllInner4Where1($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $tabla4 = NULL, $campo5 = NULL, $campo6 = NULL, $campo7 = NULL, $valor = NULL){
      $query = $this -> db -> query("SELECT $select FROM $tabla1
        INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
        INNER JOIN $tabla3 ON $tabla1.$campo3 = $tabla3.$campo4
        INNER JOIN $tabla4 ON $tabla1.$campo5 = $tabla4.$campo6
        WHERE $tabla1.$campo7 = '".$valor."'");
      if ($query -> num_rows() > 0) {
          return $query -> row();
      }else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtenber todos los registros de 4 tablas comparando 1 campo de la primera tabla --------------- //
    public function getAllInner4Where1_2($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $tabla4 = NULL, $campo5 = NULL, $campo6 = NULL, $campo7 = NULL, $valor = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla1
        INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
        INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
        INNER JOIN $tabla4 ON $tabla3.$campo5 = $tabla4.$campo6
        WHERE $tabla1.$campo7 = '".$valor."'");
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
    // --------------- obtenber todos los registros de 4 tablas comparando 1 campo de la primera tabla y con for --------------- //
    public function getAllInner4Where1For($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $tabla4 = NULL, $campo5 = NULL, $campo6 = NULL, $campo7 = NULL, $valor = NULL, $posicion = NULL){
      if ($valor != "") {
        $total = count($valor);
        $respuesta = array();
        for ($i = 0; $i < $total; $i++) {
          $query = $this -> db -> query("SELECT $select FROM $tabla1
            INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
            INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
            INNER JOIN $tabla4 ON $tabla3.$campo5 = $tabla4.$campo6
            WHERE $tabla1.$campo7 = '".$valor[$i] -> $posicion."'");
          if ($query -> num_rows() > 0) {
            foreach ($query -> result() as $row) {
              $respuesta[] = $row;
            }
          }
        }
        return $respuesta;
      }
      else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtenber todos los registros de 4 tablas comparando 1 campo de la primera tabla y otro de la 3 tabla --------------- //
    public function getAllInner4Where2($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $tabla4 = NULL, $campo5 = NULL, $campo6 = NULL, $campo7 = NULL, $valor1 = NULL, $campo8 = NULL, $valor2 = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla1
        INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
        INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
        INNER JOIN $tabla4 ON $tabla3.$campo5 = $tabla4.$campo6
        WHERE $tabla1.$campo7 = '".$valor1."'
        AND $tabla3.$campo8 = '".$valor2."'");
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
    // --------------- obtenber todos los registros de 5 tablas comparando 1 campo de la primera tabla --------------- //
    public function getAllInner5Where1($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $tabla4 = NULL, $campo5 = NULL, $campo6 = NULL, $tabla5 = NULL, $campo7 = NULL, $campo8 = NULL, $campo9 = NULL, $valor = NULL){
      $query = $this -> db -> query("SELECT $select FROM $tabla1
        INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
        INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
        INNER JOIN $tabla4 ON $tabla3.$campo5 = $tabla4.$campo6
        INNER JOIN $tabla5 ON $tabla4.$campo7 = $tabla5.$campo8
        WHERE $tabla1.$campo9 = '".$valor."'");
      if ($query -> num_rows() > 0) {
          return $query -> row();
      }else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtenber un registro de 2 tablas comparando 1 campo de la primera tabla --------------- //
    public function getRowInner2Where1($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $valor1 = NULL){
      $query = $this -> db -> query("SELECT $select FROM $tabla1
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
    // --------------- obtenerun solo registro de 3 tablas comparando 1 campo de la primera tabla --------------- //
    public function getRowInner3Where1($select = NULL, $tabla1 = NULL, $tabla2 = NULL, $campo1 = NULL, $campo2 = NULL, $tabla3 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor = NULL){
      $query = $this -> db -> query("SELECT $select FROM $tabla1
        INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
        INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
        WHERE $tabla1.$campo5 = '".$valor."'");
      if ($query -> num_rows() > 0) {
        return $query -> row();
      }else {
        return false;
      }
      $query -> close();
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
    // --------------- obtener un solo registro de una tabla comparando 2 campos --------------- //
    public function getRowWhere2($select = NULL, $tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
      $query = $this -> db -> query("SELECT $select FROM $tabla
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
    // --------------- obtener un solo registro de una tabla comparando 2 campos el segundo con like ---------------//
    public function getRowWhere2Like($select = NULL, $tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla
        WHERE $campo1 = '".$valor1."' AND $campo2 LIKE '%$valor2%' ");
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
    // --------------- obtener todos los registros comparando 1 campo y otro con like --------------- //
    public function getAllWhere1AndLike1($select = NULL, $tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla
        WHERE $campo1 = '$valor1' AND $campo2 like '%$valor2%'");
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
    // --------------- obtener todos los registros comparando 1 campo con un for --------------- //
    public function getAllWhere1For($select = NULL, $tabla = NULL, $campo = NULL, $valor = NULL, $posicion = NULL){
      if ($valor != "") {
        $total = count($valor);
        $respuesta = array();
        for ($i = 0; $i < $total; $i++) {
          $query = $this -> db -> query("SELECT $select FROM $tabla
            WHERE $campo = '".$valor[$i] -> $posicion."'");
          if ($query -> num_rows() > 0) {
            foreach ($query -> result() as $row) {
              $respuesta[] = $row;
            }
          }
        }
        return $respuesta;
      }
      else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtener todos los registros comparando 1 campo y ordenarlos --------------- //
    public function getAllWhere1Order($select = NULL, $tabla = NULL, $campo = NULL, $valor = NULL, $ordercampo = NULL, $order = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla
        WHERE $campo = '".$valor."' ORDER BY $ordercampo $order");
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
    // --------------- obtener todos los registros comparando 2 campo --------------- //
    public function getAllWhere2($select = NULL, $tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla
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
    // --------------- obtener todos los registros comparando 2 campos uno diferente --------------- //
    public function getAllWhere2Different($select = NULL, $tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla
        WHERE $campo1 = '".$valor1."'
        AND $campo2 != '".$valor2."'");
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
    // --------------- obtener todos los registros comparando 2 campos con un for --------------- //
    public function getAllWhere2For($select = NULL, $tabla = NULL, $campo1 = NULL, $valor1 = NULL, $posicion = NULL, $campo2 = NULL, $valor2 = NULL){
      if ($valor1 != "") {
        $total = count($valor1);
        $respuesta = array();
        for ($i = 0; $i < $total; $i++) {
          $query = $this -> db -> query("SELECT $select FROM $tabla
            WHERE $campo1 = '".$valor1[$i] -> $posicion."'
            AND $campo2 = '".$valor2."'");
          if ($query -> num_rows() > 0) {
            foreach ($query -> result() as $row) {
              $respuesta[] = $row;
            }
          }
        }
        return $respuesta;
      }
      else {
        return false;
      }
      $query -> close();
      $query = NULL;
    }
    // --------------- obtener todos los registros comparando 2 campos y ordenarlos --------------- //
    public function getAllWhere2Order($select = NULL, $tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $ordercampo = NULL, $order = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla
        WHERE $campo1 = '".$valor1."'
        AND $campo2 = '".$valor2."'
        ORDER BY $ordercampo $order");
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
    // --------------- obtener todos los registros comparando 4 campos --------------- //
    public function getAllWhere4($select = NULL, $tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL, $campo4 = NULL, $valor4 = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla
        WHERE $campo1 = '".$valor1."'
        OR $campo2 = '".$valor2."'
        OR $campo3 = '".$valor3."'
        OR $campo4 = '".$valor4."'");
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
    // --------------- obtener todos los empleados de call center --------------- //
    public function getAllWhereCall($select = NULL, $tabla = NULL, $campo = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla WHERE
        $campo = 13 OR
        $campo = 15 OR
        $campo = 18 OR
        $campo = 19 OR
        $campo = 20");
      if ($query -> num_rows() > 0) {
        foreach ($query -> result() as $row) {
          $respuesta[] = $row;
        }
      }
      return $respuesta;
      $query -> close();
      $query = NULL;
    }
    // --------------- obtener todos los empleados de casa infinito --------------- //
    public function getAllWhereCI($select = NULL, $tabla = NULL, $campo = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT $select FROM $tabla WHERE
        $campo = 36 OR
        $campo = 37 OR
        $campo = 38 OR
        $campo = 39 OR
        $campo = 40 OR
        $campo = 41 OR
        $campo = 42");
      if ($query -> num_rows() > 0) {
        foreach ($query -> result() as $row) {
          $respuesta[] = $row;
        }
      }
      return $respuesta;
      $query -> close();
      $query = NULL;
    }
    // --------------- obtener todos los empleados de televiales --------------- //
    public function getAllWhereTV($select = NULL, $tabla = NULL, $campo = NULL){
      $respuesta = array();
      $query = $this -> db -> query("SELECT * FROM $tabla WHERE
        $campo = 13 OR
        $campo = 14 OR
        $campo = 16 OR
        $campo = 17 OR
        $campo = 44 OR
        $campo = 48");
      if ($query -> num_rows() > 0) {
        foreach ($query -> result() as $row) {
          $respuesta[] = $row;
        }
      }
      return $respuesta;
      $query -> close();
      $query = NULL;
    }
    // --------------- actualizar 1 campo del registro comparando 1 campo --------------- //
    public function updateOneWhere1($tabla = NULL, $campo = NULL, $valor = NULL, $camposet = NULL, $ruta = NULL){
      $query = $this -> db -> query("UPDATE $tabla SET $campo = TRIM('".$valor."') WHERE $camposet = '".$ruta."'");
      if ($query) {
        return "true";
      }else {
        return "false";
      }
      $query -> close();
      $query = null;
    }
    // --------------- actualizar todo el registro comparando 1 campo --------------- //
    public function updateWhere1($tabla = NULL, $campo = NULL, $valor = NULL, $registro = NULL){
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









    // // --------------- obtener todos los registros comparando 1 campo con un for --------------- //
    // public function getSelectWhere1For($tabla = NULL, $select = NULL, $campo = NULL, $valor = NULL, $posicion = NULL){
    //   if ($valor != "") {
    //     $total = count($valor);
    //     $respuesta = array();
    //     for ($i = 0; $i < $total; $i++) {
    //         $query = $this -> db -> query("SELECT $select FROM $tabla WHERE $campo = '".$valor[$i] -> $posicion."'");
    //       if ($query -> num_rows() > 0) {
    //         foreach ($query -> result() as $row) {
    //           $respuesta[] = $row;
    //         }
    //       }
    //     }
    //     return $respuesta;
    //   }
    //   else {
    //     return false;
    //   }
    //   $query -> close();
    //   $query = NULL;
    // }
    // // --------------- obetener todos los registros comparando 3 campos con un for --------------- //
    // public function getAllWhere3For($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $posicion = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    //   if ($valor1 != "") {
    //     $total = count($valor1);
    //     $respuesta = array();
    //     for ($i = 0; $i < $total; $i++) {
    //       $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1[$i] -> $posicion."' AND $campo2 = '".$valor2."' AND $campo3 = '".$valor3."'");
    //       if ($query -> num_rows() > 0) {
    //         foreach ($query -> result() as $row) {
    //           $respuesta[] = $row;
    //         }
    //       }
    //     }
    //     return $respuesta;
    //   }
    //   else {
    //     return false;
    //   }
    //   $query -> close();
    //   $query = NULL;
    // }

    // // --------------- agrupar todos los registros de 3 tablas comparando 2 campos uno de la primera tabla y otro de la tercera --------------- //
    // public function getAllInner3Where2($tabla1 = NULL, $tabla2 = NULL, $tabla3 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $campo5 = NULL, $valor1 = NULL, $campo6 = NULL, $valor2 = NULL){
    //   $respuesta = array();
    //   $query = $this -> db -> query("SELECT * FROM $tabla1
    //     INNER JOIN $tabla2 ON $tabla1.$campo1 = $tabla2.$campo2
    //     INNER JOIN $tabla3 ON $tabla2.$campo3 = $tabla3.$campo4
    //     WHERE $tabla1.$campo5 = '".$valor1."'
    //     AND $tabla3.$campo6 = '".$valor2."'");
    //   if ($query -> num_rows() > 0) {
    //     foreach ($query -> result() as $row) {
    //       $respuesta[] = $row;
    //     }
    //     return $respuesta;
    //   }else {
    //     return FALSE;
    //   }
    //   $query -> close();
    //   $query = null;
    // }
    // // --------------- obtener todos los registros comparando 1 campo con for y ordenarlos --------------- //
    // public function getAllWhere1ForOrderBy($tabla = NULL, $select = NULL, $campo = NULL, $valor = NULL, $posicion = NULL, $ordercampo = NULL, $order = NULL){
    //   if ($valor != "") {
    //     $total = count($valor);
    //     $respuesta = array();
    //     for ($i = 0; $i < $total; $i++) {
    //         $query = $this -> db -> query("SELECT $select FROM $tabla WHERE $campo = '".$valor[$i] -> $posicion."' ORDER BY $ordercampo $order");
    //       if ($query -> num_rows() > 0) {
    //         foreach ($query -> result() as $row) {
    //           $respuesta[] = $row;
    //         }
    //       }
    //     }
    //     return $respuesta;
    //   }
    //   else {
    //     return false;
    //   }
    //   $query -> close();
    //   $query = NULL;
    // }
    // // --------------- obtener un solo registro de una tabla comparando 3 campos --------------- //
    // public function getRowWhere3($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    //   $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 = '".$valor2."' AND $campo3 = '".$valor3."'");
    //   if ($query -> num_rows() > 0) {
    //       return $query -> row();
    //   }else {
    //     return false;
    //   }
    //   $query -> close();
    //   $query = NULL;
    // }
    // // --------------- actualizar 1 campo de varios registros comparando 1 campo --------------- //
    // public function updateWhere1For($tabla = NULL, $campo = NULL, $valor = NULL, $camposet = NULL, $ruta = NULL, $posicion = NULL){
    //   if ($ruta != "") {
    //     $total = count($ruta);
    //     for ($i = 0; $i < $total; $i++) {
    //       $query = $this -> db -> query("UPDATE $tabla SET $campo = TRIM('".$valor."') WHERE $camposet = '".$ruta[$i] -> $posicion."'");
    //     }
    //     return "true";
    //   }
    //   else {
    //     return "false";
    //   }
    //   $query -> close();
    //   $query = NULL;
    // }
    // // --------------- eliminar un registro --------------- //
    // public function delete($tabla = NULL, $campo = NULL, $valor = NULL){
    //   $query = $this -> db -> where($campo, $valor);
    //   $query = $this -> db -> delete($tabla);
    //   if ($query) {
    //     return "true";
    //   }else {
    //     return "false";
    //   }
    //   $query -> close();
    //   $query = null;
    // }
  }
