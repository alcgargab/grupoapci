<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
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














//   // --------------- OBTENER UN SOLO REGISTRO COMPARANDO DOS CAMPOS --------------- //
//   public function GetRowWhere2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
//     $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 = '".$valor2."' ");
//     if ($query -> num_rows() > 0) {
//         return $query -> row();
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // --------------- INSERTAR ---------------//
//   public function Insert($tabla = NULL, $data = NULL){
//     $query = $this -> db -> insert($tabla, $data);
//     if ($query) {
//       return "ok";
//     }else {
//       return "error";
//     }
//     $query = null;
//     $query -> close();
//   }
//   // --------------- OBTENER TODOS LOS REGISTROS ---------------//
//   public function GetAll($tabla = NULL){
//     $respuesta = array();
//     $query =  $this -> db -> query("SELECT * FROM $tabla");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close;
//     $query = NULL;
//   }
//   // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO UN CAMPO ---------------//
//   public function GetAllWhere2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 = '".$valor2."' ");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // --------------- ACTUALIZAR UN CAMPO ---------------//
//   public function Update($tabla = NULL, $camposet = NULL, $valor = NULL, $campo = NULL, $ruta = NULL){
//     $query = $this -> db -> query("UPDATE $tabla SET $camposet = TRIM('".$valor."') WHERE $campo = '".$ruta."'");
//     if ($query) {
//       return "ok";
//     }else {
//       return "error";
//     }
//     $query -> close();
//     $query = null;
//   }
//   // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO UN CAMPO ---------------//
//   public function GetAllWhere($tabla = NULL, $campo = NULL, $valor = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor."'");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // --------------- OBTENER REGISTROS CON LIKE ---------------//
//   public function GetAllLike2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND $campo2 LIKE '%$valor2%'");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // --------------- OBTENER REGISTROS AGRUPADOS WHERE ---------------//
//   public function GetAllWhereGroupBy($count = NULL, $alias = NUL, $campo = NULL, $tabla = NULL, $campow = NULL, $valor = NULL, $groupfor = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT COUNT($count) as $alias, $campo FROM $tabla WHERE $campow = '".$valor."' GROUP BY $groupfor");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }
//     else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // --------------- OBTENER REGISTROS AGRUPADOS CON LIKE ---------------//
//   public function GetAllWhereLikeGroupBy($count = NULL, $alias = NUL, $campo = NULL, $tabla = NULL, $campow = NULL, $valor = NULL, $groupfor = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT COUNT($count) as $alias, $campo FROM $tabla WHERE $campow LIKE '%$valor%' GROUP BY $groupfor");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }
//     else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO 2 TABLAS --------------- //
//   public function GetAllInnerJoin(){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT CallUsuario, CallHSesion, CallFSesion, CallHCSesion, CallFCSesion FROM sesion as tb1 INNER JOIN cierresesion as tb2 ON tb1.IdSesion = tb2.CallIdSesion");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO 2 TABLAS Y 2 CAMPOS --------------- //
//   public function GetAllInnerJoinAnd($tabla1 = NULL, $alias1 = NULL, $tabla2 = NULL, $alias2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $valor = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla1 as $alias1 INNER JOIN $tabla2 as $alias2 ON $alias1.$campo1 = $alias2.$campo2 AND $alias1.$campo3 = '".$valor."'");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO 2 TABLAS Y 3 CAMPOS --------------- //
//   public function GetAllInnerJoinAnd2($tabla1 = NULL, $alias1 = NULL, $tabla2 = NULL, $alias2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $valor1 = NULL, $valor2 = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla1 as $alias1 INNER JOIN $tabla2 as $alias2 ON $alias1.$campo1 = $alias2.$campo2 WHERE $alias1.$campo3 = '".$valor1."' AND $alias1.$campo4 = '".$valor2."'");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // --------------- OBTENER TODOS LOS REGISTROS COMPARANDO 2 TABLAS Y 3 CAMPOS CON lIKE --------------- //
//   public function GetAllInnerJoinAndLike($tabla1 = NULL, $alias1 = NULL, $tabla2 = NULL, $alias2 = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $valor1 = NULL, $valor2 = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla1 as $alias1 INNER JOIN $tabla2 as $alias2 ON $alias1.$campo1 = $alias2.$campo2 WHERE $alias1.$campo3 = '".$valor1."' AND $alias1.$campo4 LIKE '$valor2%'");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // --------------- OBTENER UN SOLO REGISTRO COMPARANDO TRES CAMPOS --------------- //
//   public function GetRowWhere3($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $campo3 = NULL, $valor3 = NULL){
//     $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 = '".$valor1."' AND ($campo2 = '".$valor2."' AND $campo3 = '".$valor3."')");
//     if ($query -> num_rows() > 0) {
//         return $query -> row();
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//   // OBETNER REGISTROS CON LIMIT Y ORDER
//   public function GetAllOrderLimit($tabla = NULL, $order = NULL, $modo = NULL, $base = NULL, $tope = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla ORDER BY $order $modo LIMIT $base, $tope");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // OBETNER REGISTROS CON LIMIT Y ORDER
//   public function GetAllWhereOrderLimit($tabla = NULL, $campo = NULL, $valor = NULL, $order = NULL, $modo = NULL, $base = NULL, $tope = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor."' ORDER BY $order $modo LIMIT $base, $tope");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//     // OBTENER TODOS LOS REGISTROS CON LIMIT
//   public function GetAllLimit($tabla = NULL, $campo = NULL, $valor = NULL, $base = NULL, $tope = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo = '".$valor."' LIMIT $base, $tope");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // OBTENER TODOS LOS REGISTROS ORDENADOS
//   public function GetAllOrder($tabla = NULL, $order = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla ORDER BY $order DESC");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // OBTENER REGISTROS CON LIKE
//   public function GetAllLikeLimit($tabla = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $valor = NULL, $ordenar = NULL, $modo = NULL, $base = NULL, $tope = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 LIKE '%$valor%' OR $campo2 LIKE '%$valor%' OR $campo3 LIKE '%$valor%' OR $campo4 LIKE '%$valor%' ORDER BY $ordenar $modo LIMIT $base, $tope");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//   // OBTENER REGISTROS CON LIKE
//   public function GetAllLike($tabla = NULL, $campo1 = NULL, $campo2 = NULL, $campo3 = NULL, $campo4 = NULL, $valor = NULL, $ordenar = NULL, $modo = NULL, $base = NULL, $tope = NULL){
//     $respuesta = array();
//     $query = $this -> db -> query("SELECT * FROM $tabla WHERE $campo1 LIKE '%$valor%' OR $campo2 LIKE '%$valor%' OR $campo3 LIKE '%$valor%' OR $campo4 LIKE '%$valor%'");
//     if ($query -> num_rows() > 0) {
//       foreach ($query -> result() as $row) {
//         $respuesta[] = $row;
//       }
//       return $respuesta;
//     }else {
//       return false;
//     }
//     $query -> close();
//     $query = NULL;
//   }
//
//   // ACTUALIZAR 2 CAMPOS
//   public function Update2($tabla = NULL, $campo1 = NULL, $valor1 = NULL, $campo2 = NULL, $valor2 = NULL, $camposet = NULL, $ruta = NULL){
//     $query = $this -> db -> query("UPDATE $tabla SET $campo1 = TRIM('".$valor1."'), $campo2 = TRIM('".$valor2."') WHERE $camposet = '".$ruta."'");
//     if ($query) {
//       return "ok";
//     }else {
//       return "error";
//     }
//     $query -> close();
//     $query = null;
//   }

}
