<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIAdminUsuarioModel extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  public function insertusuario($datainsert){
    $this -> db -> insert('tbl_user', $datainsert);
  }
  public function getalluserid($idusu){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_user` WHERE apci_id_user =".$idusu);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getuserarea($user){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_area` WHERE apci_id_area =".$user -> apci_id_user_area);
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
  public function updatearea($dataEdit = NULL){
    $this -> db -> where("apci_id_user", $dataEdit['apci_id_user']);
		$this -> db -> update('tbl_user', $dataEdit);
  }
  public function deletearea($idusu = NULL){
    $this -> db -> where("apci_id_user", $idusu);
    $this -> db -> delete("tbl_user");
  }
}
