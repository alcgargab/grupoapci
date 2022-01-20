<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIAdminFormatoModel extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  public function insertformato($datainsert){
    $this -> db -> insert('tbl_formato', $datainsert);
  }
  public function getallformatoid($idformato){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_formato` WHERE apci_id_formato =".$idformato);
    if ($query -> num_rows() > 0) {
      foreach ($query -> result() as $row) {
        $respuesta[] = $row;
      }
      return $respuesta;
    }else{
      return FALSE;
    }
  }
  public function getareaformato($idformatoarea){
    $respuesta = array();
    $query = $this -> db -> query("SELECT * FROM `tbl_area` WHERE apci_id_area = ".$idformatoarea);
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
    $this -> db -> where("apci_id_formato", $dataEdit['apci_id_formato']);
		$this -> db -> update('tbl_formato', $dataEdit);
  }
  public function deleteformato($idformato = NULL){
    $this -> db -> where("apci_id_formato", $idformato);
    $this -> db -> delete("tbl_formato");
  }
}
