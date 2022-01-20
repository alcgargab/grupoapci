<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIAdminMsnModel extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  public function insertMsn($datainsert){
    $this -> db -> insert('tbl_mensaje', $datainsert);
  }
  public function getallmsnid($idmsn){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_mensaje` WHERE apci_id_mensaje =".$idmsn);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getemisor($idemi){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_user` WHERE apci_id_user = ".$idemi);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getremitente($idrem){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_user` WHERE apci_id_user = ".$idrem);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getstatusmsn($idstatus){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_mensaje_status` WHERE apci_id_msn_status = ".$idstatus);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function updatemsn($dataEdit = NULL){
    $this -> db -> where("apci_id_mensaje", $dataEdit['apci_id_mensaje']);
		$this -> db -> update('tbl_mensaje', $dataEdit);
  }
  public function deletemsn($idmsn = NULL){
    $this -> db -> where("apci_id_mensaje", $idmsn);
    $this -> db -> delete("tbl_mensaje");
  }
}
