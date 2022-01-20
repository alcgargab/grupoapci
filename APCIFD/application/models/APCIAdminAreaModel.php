<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIAdminAreaModel extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  public function insertarea($datainsert){
    $this -> db -> insert('tbl_area', $datainsert);
  }
  public function getallareaid($idsesion){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_area` WHERE apci_id_area =".$idsesion);
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
    $this -> db -> where("apci_id_area", $dataEdit['apci_id_area']);
		$this -> db -> update('tbl_area', $dataEdit);
  }
  public function deletearea($idsesion = NULL){
    $this -> db -> where("apci_id_area", $idsesion);
    $this -> db -> delete("tbl_area");
  }
}
