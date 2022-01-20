<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIArea extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> database();
		$this -> load -> model('APCIAdminAreaModel');
    $this -> load -> model('APCIAdminModel');
		$this -> load -> library ('session');
	}
	public function index(){
	}
	public function APCIInsert($idsesion = NULL){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$datainsert['apci_area'] = strtoupper($this -> input -> post('apci_new_area'));
      if ($this -> APCIAdminAreaModel -> insertarea($datainsert)) { ?>
        <script type="text/javascript">
        alert('Los datos No se insertaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelAreas");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se insertaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelAreas");
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
      $data['allarea'] = $this -> APCIAdminAreaModel -> getallareaid($idsesion);
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Area/APCIViewPanelAdminAreaRead', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEdit($idsesion = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $data['allarea'] = $this -> APCIAdminAreaModel -> getallareaid($idsesion);
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Area/APCIViewPanelAdminAreaEdit', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEditSi($idsesion = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $dataEdit['apci_id_area'] = $this -> input -> post('apci_id_area_view');
      $dataEdit['apci_area'] = $this -> input -> post('apci_area');
      if ($this -> APCIAdminAreaModel -> updatearea($dataEdit)) { ?>
        <script type="text/javascript">
        alert('Los datos No se actualizaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelAreas");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos estan actualizados correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelAreas");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIDelete($idsesion = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
      if ($this -> APCIAdminAreaModel -> deletearea($idsesion)) { ?>
        <script type="text/javascript">
        alert('Los datos No se Eliminaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelAreas");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se eliminaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelAreas");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
}
