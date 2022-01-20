<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIAdminFormausertoModel extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  public function insertformatouser($datainsert){
    $this -> db -> insert('tbl_formato_user', $datainsert);
  }
  public function getallformatouserid($idformatouser){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_formato_user` WHERE apci_id_formato_user =".$idformatouser);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getalluserid($iduser){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_user` WHERE apci_id_user =".$iduser);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getallformatoid($idformato){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_formato` WHERE apci_id_formato = ".$idformato);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function updatformato($dataEdit = NULL){
    $this -> db -> where("apci_id_formato_user", $dataEdit['apci_id_formato_user']);
		$this -> db -> update('tbl_formato_user', $dataEdit);
  }
  public function deleteformato($idformatouser = NULL){
    $this -> db -> where("apci_id_formato_user", $idformatouser);
    $this -> db -> delete("tbl_formato_user");
  }
  public function getstatusformid($idformst){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_formato_status` WHERE apci_id_form_status = ".$idformst);
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
