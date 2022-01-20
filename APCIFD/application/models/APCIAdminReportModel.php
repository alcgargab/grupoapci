<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIAdminReportModel extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  public function GetSesion(){
    $respuesta = array ();
    $query = $this -> db -> query ("SELECT apci_id_sesion_user, count(*) as numbersesion FROM `tbl_sesion` GROUP BY apci_id_sesion_user");
    if($query -> num_rows() > 0){
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function GetFormato(){
    $respuesta = array ();
    $query = $this -> db -> query ("SELECT apci_id_for_user, apci_id_formato, count(*) as NumForm FROM `tbl_formato_user` GROUP BY apci_id_for_user");
    if($query -> num_rows() > 0){
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function GetStaForm(){
    $respuesta = array ();
    $query = $this -> db -> query ("SELECT apci_formato_status, count(*) as NumStaForm FROM `tbl_formato_user` GROUP BY apci_formato_status");
    if($query -> num_rows() > 0){
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function GetUserSesion($dataReport){
    $respuesta = array ();
    $result = array ();
    $total = count($dataReport);
    for ($i=0; $i <= $total -1;) {
      $query = $this -> db -> query ("SELECT * FROM `tbl_user` WHERE apci_id_user =". $dataReport[$i] -> apci_id_sesion_user);
      $respuesta[] = $query -> result();
      $i ++;
    }foreach ($respuesta as $row) {
      $result[] = $row;
    }
    return $result;
  }
  public function GetUserForm($dataReport){
    // echo "<pre>"; print_r($dataReport); echo "</pre>"; die();
    $respuesta = array ();
    $result = array ();
    $total = count($dataReport);
    for ($i=0; $i <= $total -1;) {
      $query = $this -> db -> query ("SELECT * FROM `tbl_user` WHERE apci_id_user =". $dataReport[$i] -> apci_id_for_user);
      $respuesta[] = $query -> result();
      $i ++;
    }foreach ($respuesta as $row) {
      // echo "<pre>"; print_r($row); echo "</pre>"; die();
      $result[] = $row;
    }
    return $result;
  }
}
