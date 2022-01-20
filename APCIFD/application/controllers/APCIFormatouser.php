<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIFormatouser extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> database();
		$this -> load -> model('APCIAdminFormausertoModel');
    $this -> load -> model('APCIAdminModel');
		$this -> load -> library ('session');
	}
	public function index(){
	}
	public function APCIInsert($idformatouser = NULL){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$datainsert['apci_id_for_user'] = strtoupper($this -> input -> post('selectuser'));
			$datainsert['apci_id_formato'] = strtoupper($this -> input -> post('selecformato'));
			$datainsert['apci_formato_status'] = $this -> input -> post('selecstatus');
      if ($this -> APCIAdminFormausertoModel -> insertformatouser($datainsert)) { ?>
        <script type="text/javascript">
        alert('Los datos No se insertaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatosUser");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se insertaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatosUser");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIread($idformatouser = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$data['allformatouser'] = $this -> APCIAdminFormausertoModel -> getallformatouserid($idformatouser);
			$data['alluser'] = $this -> APCIAdminFormausertoModel -> getalluserid($data['allformatouser'][0] -> apci_id_for_user);
      $data['allformato'] = $this -> APCIAdminFormausertoModel -> getallformatoid($data['allformatouser'][0] -> apci_id_formato);
			$data['statusform'] = $this -> APCIAdminFormausertoModel -> getstatusformid($data['allformatouser'][0] -> apci_formato_status);
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/FormatoUser/APCIViewPanelAdminFormatouserRead', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEdit($idformatouser = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $data['allformatouser'] = $this -> APCIAdminFormausertoModel -> getallformatouserid($idformatouser);
			$data['allformato'] = $this -> APCIAdminModel -> getallformato();
			$data['alluser'] = $this -> APCIAdminModel -> getalluser();
			$data['statusform'] = $this -> APCIAdminModel -> getstatusform();
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/FormatoUser/APCIViewPanelAdminFormatouserEdit', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEditSi($idformatouser = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $dataEdit['apci_id_formato_user'] = $this -> input -> post('apci_id_formuser_view');
			$dataEdit['apci_id_for_user'] = strtoupper($this -> input -> post('apci_id_for_user'));
			$dataEdit['apci_id_formato'] = strtoupper($this -> input -> post('apci_id_formato'));
      $dataEdit['apci_formato_status'] = $this -> input -> post('apci_formato_status');
      if ($this -> APCIAdminFormausertoModel -> updatformato($dataEdit)) { ?>
        <script type="text/javascript">
        alert('Los datos No se actualizaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatosUser");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos estan actualizados correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatosUser");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIDelete($idformatouser = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
      if ($this -> APCIAdminFormausertoModel -> deleteformato($idformatouser)) { ?>
        <script type="text/javascript">
        alert('Los datos No se Eliminaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatosUser");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se eliminaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatosUser");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
}
