<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIAdminModel extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  public function GetUsername($data){
    $query = $this -> db -> query ("SELECT * FROM `tbl_user` WHERE apci_username ='" .$data."'");
    if($query -> num_rows() > 0){
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getallarea(){
    $respuesta = array();
    $query = $this -> db -> query ("SELECT * FROM `tbl_area`");
      if($query -> num_rows() > 0){
        foreach ($query -> result() as $row) {
          $respuesta[] = $row;
        }
        return $respuesta;
      }else{
        return FALSE;
      }
  }
  public function getallformato(){
    $respuesta = array();
    $query = $this -> db -> query ("SELECT * FROM `tbl_formato`");
      if($query -> num_rows() > 0){
        foreach ($query ->result() as $row) {
          $respuesta[] = $row;
        }
        return $respuesta;
      }else{
        return FALSE;
      }
  }
  public function getallformatouser(){
    $respuesta = array();
    $query = $this -> db -> query ("SELECT * FROM `tbl_formato_user`");
      if($query -> num_rows() > 0){
        foreach ($query -> result() as $row) {
          $respuesta[] = $row;
        }
        return $respuesta;
      }else{
        return FALSE;
      }
  }
  public function getallmsn(){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_mensaje`");
    if ($query -> num_rows() > 0) {
      foreach ($query->result() as $row) {
        $respuesta[]=$row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getallsesion(){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_sesion`");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getallsesionlimit($iniciarconteo = NULL, $totalrows = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_sesion` LIMIT" .' ' .$iniciarconteo. ",8");
      if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getallarealimit($iniciarconteo = NULL, $totalrows = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_area` LIMIT" .' ' .$iniciarconteo. ",8");
      if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getallformlimit($iniciarconteo = NULL, $totalrows = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_formato` LIMIT" .' ' .$iniciarconteo. ",8");
      if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getallformuserlimit($iniciarconteo = NULL, $totalrows = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_formato_user` LIMIT" .' ' .$iniciarconteo. ",8");
      if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getallmsnlimit($iniciarconteo = NULL, $totalrows = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_mensaje` LIMIT" .' ' .$iniciarconteo. ",8");
      if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getalluserlimit($iniciarconteo = NULL, $totalrows = NULL){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_user` LIMIT" .' ' .$iniciarconteo. ",8");
      if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getalluser(){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_user`");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getstatusform(){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_formato_status`");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getstatusmsn(){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_mensaje_status`");
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
}
