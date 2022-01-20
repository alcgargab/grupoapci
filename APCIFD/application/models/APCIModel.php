<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIModel extends CI_Model{
  function __construct(){
    parent::__construct();
    $this -> load -> database();
    $this -> load -> helper ('form');
  }
  public function APCIGetUser($data){
    $query = $this -> db -> query ("SELECT * FROM `tbl_user` WHERE apci_username= '".$data['apci_name']."' AND `apci_password` = '".$data['apci_pass']."'");
      if($query -> num_rows() > 0){
        return $query -> result();
      }else{
        return FALSE;
      }
  }
  public function APCIGetUsername($data){
    $query = $this -> db -> query ("SELECT * FROM `tbl_user` WHERE apci_username ='" .$data."'");
      if($query -> num_rows() > 0){
        return $query -> row();
      }else{
        return FALSE;
      }
  }
  public function APCIGetAllUser($data){
    $query = $this -> db -> query ("SELECT * FROM `tbl_user` WHERE apci_id_user !=".$data);
      if($query -> num_rows() > 0){
        return $query -> result();
      }else{
        return FALSE;
      }
  }
  public function APCIInsertSesion($datasesion){
    $this -> db -> insert('tbl_sesion',$datasesion);
  }
  public function APCIInsertMsn($datamsn){
    $this -> db -> insert('tbl_mensaje',$datamsn);
    return TRUE;
  }
  public function APCIGetMsn($dataMsn){
    $query = $this -> db -> query ("SELECT * FROM `tbl_mensaje` INNER JOIN `tbl_user` ON tbl_user.apci_id_user=tbl_mensaje.apci_id_emisor WHERE apci_id_mensaje =".$dataMsn);
      if($query -> num_rows() > 0){
        return $query -> result();
      }else{
        return FALSE;
      }
  }
  public function APCIUpdateMsn($dataMsn){
    $query = $this -> db -> query ("UPDATE `tbl_mensaje` SET apci_msn_estado=2 WHERE apci_id_mensaje='" .$dataMsn."'");
  }
  public function APCIGetMsnEnv($data){
    $respuesta = array();
    $query = $this -> db -> query ("SELECT * FROM `tbl_mensaje` INNER JOIN tbl_user ON tbl_user.apci_id_user = tbl_mensaje.apci_id_emisor WHERE apci_id_emisor =".$data);
    if($query->num_rows() > 0){
      foreach ($query->result() as $row) {
        $respuesta[]=$row;
      }
    }
    return $respuesta;
  }
  public function APCIGetMsnRec($data){
    $respuesta = array();
    $query = $this -> db -> query ("SELECT * FROM `tbl_mensaje` INNER JOIN tbl_user ON tbl_user.apci_id_user = tbl_mensaje.apci_id_emisor WHERE apci_id_remitente =".$data);
    if($query->num_rows() > 0){
      foreach ($query->result() as $row) {
        $respuesta[]=$row;
      }
    }
    return $respuesta;
  }
  public function APCIGetFD($data){
    $respuesta = array();
    $query = $this -> db -> query ("SELECT * FROM `tbl_formato` WHERE apci_id_formato_area =".$data);
    if($query -> num_rows() > 0){
      foreach ($query -> result() as $row) {
        $respuesta[]=$row;
      }
    }
    return $respuesta;
  }
  public function APCIGetStatusMsn(){
    $respuesta = array();
    $query = $this -> db -> query ("SELECT * FROM `tbl_mensaje_status`");
    if($query -> num_rows() > 0){
      foreach ($query -> result() as $row) {
        $respuesta[]=$row;
      }
    }
    return $respuesta;
  }
}
