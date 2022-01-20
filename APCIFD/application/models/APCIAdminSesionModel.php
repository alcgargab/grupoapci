<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIAdminSesionModel extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  public function insertsesion($datainsert){
    $this -> db -> insert('tbl_sesion', $datainsert);
  }
  public function getallsesionid($idsesion){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_sesion` WHERE apci_id_sesion =".$idsesion);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getusersesion($idusersesion){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_user` WHERE apci_id_user = ".$idusersesion);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function updatesesion($dataEdit = NULL){
    $this -> db -> where("apci_id_sesion", $dataEdit['apci_id_sesion']);
		$this -> db -> update('tbl_sesion', $dataEdit);
  }
  public function deletesesion($idsesion = NULL){
    $this -> db -> where("apci_id_sesion", $idsesion);
    $this -> db -> delete("tbl_sesion");
  }
}
