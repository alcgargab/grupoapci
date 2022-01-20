<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCISesion extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> database();
		$this -> load -> model('APCIAdminSesionModel');
		$this -> load -> model('APCIAdminModel');
		$this -> load -> library ('session');;
	}
	public function index(){
	}
	public function APCIInsert($idsesion = NULL){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$datainsert['apci_id_sesion_user'] = strtoupper($this -> input -> post('selectuser'));
			$datainsert['apci_user_sesion_ip'] = $this -> input -> post('apci_new_sesion');
      if ($this -> APCIAdminSesionModel -> insertsesion($datainsert)) { ?>
        <script type="text/javascript">
        alert('Los datos No se insertaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelSesion");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se insertaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelSesion");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIread($idsesion = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $data['allsesion'] = $this -> APCIAdminSesionModel -> getallsesionid($idsesion);
      $data['sesionusuario'] = $this -> APCIAdminSesionModel -> getusersesion($data['allsesion'][0] -> apci_id_sesion_user);
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Sesion/APCIViewPanelAdminSesionRead', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEdit($idsesion = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $data['allsesion'] = $this -> APCIAdminSesionModel -> getallsesionid($idsesion);
      $data['sesionusuario'] = $this -> APCIAdminSesionModel -> getusersesion($data['allsesion'][0] -> apci_id_sesion_user);
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Sesion/APCIViewPanelAdminSesionEdit', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEditSi($idsesion = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $dataEdit['apci_id_sesion'] = $this -> input -> post('apci_id_sesion_view');
      $dataEdit['apci_id_sesion_user'] = $this -> input -> post('apci_id_sesion_user');
      $dataEdit['apci_user_sesion_ip'] = $this -> input -> post('apci_user_sesion_ip');
      $dataEdit['apci_sesion_date'] = $this -> input -> post('apci_sesion_date');
      if ($this -> APCIAdminSesionModel -> updatesesion($dataEdit)) { ?>
        <script type="text/javascript">
        alert('Los datos No se actualizaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelSesion");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos estan actualizados correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelSesion");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIDelete($idsesion = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
      if ($this -> APCIAdminSesionModel -> deletesesion($idsesion)) { ?>
        <script type="text/javascript">
        alert('Los datos No se Eliminaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelSesion");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se eliminaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelSesion");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
}
