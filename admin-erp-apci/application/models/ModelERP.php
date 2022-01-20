<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ModelERP extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
  }
  // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO UN CAMPO --------------- //
  public function GetAllWhereFor($tabla = NULL, $campo = NULL, $valor = NULL, $posicion = NULL){
    if ($valor != "") {
      $total = count($valor);
      $respuesta = array();
      for ($i = 0; $i < $total; $i++) {
        $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor[$i] -> $posicion."'");
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
  // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO TRES CAMPOS QUE SEAN DIFERENTES --------------- //
  public function GetAllWhereFor3Different($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $posicion = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    if ($valor1 != "") {
      $total = count($valor1);
      $respuesta = array();
      for ($i = 0; $i < $total; $i++) {
        $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1[$i] -> $posicion."' AND $campo2 != '".$valor2."' AND $campo3 != '".$valor3."'");
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
  // --------------- OBTENER TODOS LOS REGISTRO COMPARANDO DOS CAMPOS --------------- //
  public function GetAllWhere2Diferent($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 != '".$valor1."' AND $campo2 != '".$valor2."'");
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
  // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO TRES CAMPOS QUE SEAN IGUALES --------------- //
  public function GetAllWhereFor3Same($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $posicion = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    if ($valor1 != "") {
      $total = count($valor1);
      $respuesta = array();
      for ($i = 0; $i < $total; $i++) {
        $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1[$i] -> $posicion."' AND $campo2 = '".$valor2."' AND $campo3 = '".$valor3."'");
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
  // --------------- OBTENER UN SOLO REGISTRO COMPARANDO DOS CAMPOS --------------- //
  public function GetRowWhere3($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 = '".$valor2."' AND $campo3 = '".$valor3."'");
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
  // --------------- INSERTAR --------------- //
  public function Insert($tabla = NULL, $data = NULL){
    $query = $this -> db -> insert($tabla, $data);
    if ($query) {
      return "true";
    }else {
      return "false";
    }
    $query = null;
    $query -> close();
  }
  // --------------- OBETNER REGISTROS CON LIMIT Y ORDER --------------- //
  public function GetAllWhereLimit($tabla = NULL, $campo = NULL, $valor = NULL, $base = NULL, $tope = NULL){
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
  // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO UN CAMPO --------------- //
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
  // --------------- OBTENER TODOS LOS REGISTRO COMPARANDO DOS CAMPOS --------------- //
  public function GetAllWhere2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 = '".$valor2."' ");
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
  // --------------- OBTENER TODOS LOS REGISTRO COMPARANDO TRES CAMPOS --------------- //
  public function GetAllWhere3($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 = '".$valor2."' AND $campo3 = '".$valor3."'");
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
  // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO UN CAMPO --------------- //
  public function GetAllWhereOrder($tabla = NULL, $campo = NULL, $valor = NULL, $ordercampo = NULL, $order = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor."' ORDER BY $ordercampo $order");
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
  // --------------- OBTENER CIERTOS REGISTROS DE LAS TABLAS --------------- //
  public function GetLimit($tabla = NULL, $base = NULL, $tope = NULL){
    $respuesta = array();
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
  // --------------- OBTENER TODOS LOS REGISTROS --------------- //
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
  // --------------- OBTENER UN SOLO REGISTRO COMPARANDO UN CAMPO --------------- //
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
  // --------------- ACTUALIZAR TODO EL REGISTRO--------------- //
  public function Update($tabla = NULL, $campo = NULL, $valor = NULL, $registro = NULL){
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
  // --------------- ACTUALIZAR UN CAMPO --------------- //
  public function UpdateOne($tabla = NULL, $campo = NULL, $valor = NULL, $camposet = NULL, $ruta = NULL){
    $query = $this -> db -> query("UPDATE $tabla SET $campo = TRIM('".$valor."') WHERE $camposet = '".$ruta."'");
    if ($query) {
      return "ok";
    }else {
      return "error";
    }
    $query -> close();
    $query = null;
  }
  // --------------- ELIMINAR --------------- //
  public function Delete($tabla = NULL, $campo = NULL, $valor = NULL){
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
  // --------------- AGRUPAR TODOS LOS RESULTADOS DE UNA TABLA --------------- //
  public function GetAllInner($tabla1 = NULL, $alias1 = NULL, $tabla2 = NULL, $alias2 = NULL, $campo1 = NULL, $campo2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla1 $alias1 INNER JOIN $tabla2 $alias2 ON $alias1.$campo1 = $alias2.$campo2");
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
  // --------------- AGRUPAR TODOS LOS RESULTADOS DE DOS TABLAS COMPARANDO UN CAMPO --------------- //
  public function GetAllForInner($tabla1 = NULL, $campoinner = NULL, $campo1 = NULL, $valor1 = NULL, $posicion1 = NULL, $tabla2 = NULL, $campo2 = NULL){
    if ($valor1 != "") {
      $total = count($valor1);
      $respuesta = array();
      for ($i = 0; $i < $total; $i++) {
        $query = $this -> db -> query("SELECT * FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.$campoinner = $tabla2.$campo2  WHERE $campo1 = '".$valor1[$i] -> $posicion1."'");
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
  // --------------- AGRUPAR TODOS LOS RESULTADOS DE DOS TABLAS COMPARANDO UN CAMPO --------------- //
  public function GetAllForInner4($tabla1 = NULL, $campoinner = NULL, $campo1 = NULL, $valor1 = NULL, $posicion1 = NULL, $tabla2 = NULL, $campo2 = NULL, $campo3 = NULL, $valor3 = NULL, $campo4 = NULL, $valor4 = NULL){
    if ($valor1 != "") {
      $total = count($valor1);
      $respuesta = array();
      for ($i = 0; $i < $total; $i++) {
        $query = $this -> db -> query("SELECT * FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.$campoinner = $tabla2.$campo2  WHERE $campo1 = '".$valor1[$i] -> $posicion1."' AND $tabla2.$campo3 = $valor3 AND $tabla2.$campo4 = $valor4");
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
  // --------------- AGRUPAR TODOS LOS RESULTADOS DE DOS TABLAS COMPARANDO TRES CAMPO --------------- //
  public function GetAllForInnerWhere3Same($tabla1 = NULL, $campoinner = NULL, $campo1 = NULL, $valor1 = NULL, $posicion1 = NULL, $tabla2 = NULL, $campo2 = NULL, $campo3 = NULL, $valor3 = NULL, $campo4 = NULL, $valor4 = NULL){
    if ($valor1 != "") {
      $total = count($valor1);
      $respuesta = array();
      for ($i = 0; $i < $total; $i++) {
        $query = $this -> db -> query("SELECT * FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.$campoinner = $tabla2.$campo2  WHERE $campo1 = '".$valor1[$i] -> $posicion1."' AND $campo3 = '".$valor3."' AND $campo4 = '".$valor4."'");
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
  // OBTENER REGISTROS COMPARARNDO 2 CAMPOS CON LIKE
  public function GetAllLike2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '$valor1' AND $campo2 like '%$valor2%'");
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
  // --------------- OBTENER LOS EMPLEADOS DEL CALL CENTER --------------- //
  public function GetAllWhereCall($tabla = NULL, $campo1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = 15 OR $campo1 = 18 OR $campo1 = 19 OR $campo1 = 20 AND $campo2 = '".$valor2."' AND $campo3 = '".$valor3."'");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
    }
    return $respuesta;
    $query -> close();
    $query = NULL;
  }
  // --------------- OBTENER LOS EMPLEADOS DE TELEVIALES --------------- //
  public function GetAllWhereTV($tabla = NULL, $campo1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = 14 OR $campo1 = 16 OR $campo1 = 17 AND $campo2 = '".$valor2."' AND $campo3 = '".$valor3."'");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
    }
    return $respuesta;
    $query -> close();
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
}
