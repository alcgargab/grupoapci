<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIUsuario extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> database();
		$this -> load -> model('APCIAdminUsuarioModel');
    $this -> load -> model('APCIAdminModel');
		$this -> load -> library ('session');
	}
	public function index(){
	}
	public function APCIInsert($idusu = NULL){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$datainsert['apci_username'] = strtoupper($this -> input -> post('apci_new_usu'));
			$datainsert['apci_password'] = $this -> input -> post('apci_new_pass');
			$datainsert['apci_name'] = strtoupper($this -> input -> post('apci_new_name'));
			$datainsert['apci_usertype'] = $this -> input -> post('apci_new_tusu');
			$datainsert['apci_id_user_area'] = $this -> input -> post('selectarea');
      if ($this -> APCIAdminUsuarioModel -> insertusuario($datainsert)) { ?>
        <script type="text/javascript">
        alert('Los datos No se insertaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelUser");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se insertaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelUser");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIread($idusu = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $data['alluser'] = $this -> APCIAdminUsuarioModel -> getalluserid($idusu);
			$data['userarea'] = $this -> APCIAdminUsuarioModel -> getuserarea($data['alluser'][0]);
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Usuario/APCIViewPanelAdminUsuarioRead', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
		public function APCIEdit($idusu = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$data['alluser'] = $this -> APCIAdminUsuarioModel -> getalluserid($idusu);
      $data['allarea'] = $this -> APCIAdminModel -> getallarea();
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Usuario/APCIViewPanelAdminUsuarioEdit', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEditSi($idusu = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $dataEdit['apci_id_user'] = $this -> input -> post('apci_id_user_view');
			$dataEdit['apci_username'] = strtoupper($this -> input -> post('apci_username'));
			$dataEdit['apci_password'] = $this -> input -> post('apci_password');
			$dataEdit['apci_name'] = strtoupper($this -> input -> post('apci_name'));
			$dataEdit['apci_usertype'] = $this -> input -> post('apci_usertype');
      $dataEdit['apci_id_user_area'] = $this -> input -> post('select_user');
      if ($this -> APCIAdminUsuarioModel -> updatearea($dataEdit)) { ?>
        <script type="text/javascript">
        alert('Los datos No se actualizaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelUser");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos estan actualizados correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelUser");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIDelete($idusu = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
      if ($this -> APCIAdminUsuarioModel -> deletearea($idusu)) { ?>
        <script type="text/javascript">
        alert('Los datos No se Eliminaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelUser");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se eliminaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelUser");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
}
