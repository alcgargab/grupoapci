<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIMsn extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> database();
		$this -> load -> model('APCIAdminMsnModel');
    $this -> load -> model('APCIAdminModel');
		$this -> load -> library ('session');
	}
	public function index(){
	}
	public function APCIInsert($idmsn = NULL){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$datainsert['apci_id_emisor'] = $this -> input -> post('selectemi');
			$datainsert['apci_id_remitente'] = $this -> input -> post('selectrem');
			$datainsert['apci_msn_titulo'] = $this -> input -> post('apci_new_tittle');
			$datainsert['apci_msn_msn'] = $this -> input -> post('apci_new_msn');
			$datainsert['apci_msn_estado'] = $this -> input -> post('apci_new_status');
      if ($this -> APCIAdminMsnModel -> insertMsn($datainsert)) { ?>
        <script type="text/javascript">
        alert('Los datos No se insertaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelMensaje");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se insertaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelMensaje");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIread($idmsn = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $data['allmsn'] = $this -> APCIAdminMsnModel -> getallmsnid($idmsn);
			$data['msnemi'] = $this -> APCIAdminMsnModel -> getemisor($data['allmsn'][0] -> apci_id_emisor);
			$data['msnrem'] = $this -> APCIAdminMsnModel -> getremitente($data['allmsn'][0] -> apci_id_remitente);
			$data['statusmsn'] = $this -> APCIAdminMsnModel -> getstatusmsn($data['allmsn'][0] -> apci_msn_estado);
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Msn/APCIViewPanelAdminMsnRead', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEdit($idmsn = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$data['allmsn'] = $this -> APCIAdminMsnModel -> getallmsnid($idmsn);
			$data['alluser'] = $this -> APCIAdminModel -> getalluser();
			$data['statusmsn'] = $this -> APCIAdminModel -> getstatusmsn();
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Msn/APCIViewPanelAdminMsnEdit', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEditSi($idmsn = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $dataEdit['apci_id_mensaje'] = $this -> input -> post('apci_id_mensaje_view');
			$dataEdit['apci_id_emisor'] = $this -> input -> post('apci_id_msn_emisor');
			$dataEdit['apci_id_remitente'] = $this -> input -> post('apci_id_msn_remi');
			$dataEdit['apci_msn_titulo'] = $this -> input -> post('apci_msn_titulo');
			$dataEdit['apci_msn_msn'] = $this -> input -> post('apci_msn_msn');
			$dataEdit['apci_msn_fecha'] = $this -> input -> post('apci_msn_fecha');
      $dataEdit['apci_msn_estado'] = $this -> input -> post('apci_msn_estado');
      if ($this -> APCIAdminMsnModel -> updatemsn($dataEdit)) { ?>
        <script type="text/javascript">
        alert('Los datos No se actualizaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelMensaje");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos estan actualizados correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelMensaje");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIDelete($idmsn = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
      if ($this -> APCIAdminMsnModel -> deletemsn($idmsn)) { ?>
        <script type="text/javascript">
        alert('Los datos No se Eliminaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelMensaje");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se eliminaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelMensaje");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
}
