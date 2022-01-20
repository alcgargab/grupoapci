<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIFormato extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> database();
		$this -> load -> model('APCIAdminFormatoModel');
    $this -> load -> model('APCIAdminModel');
		$this -> load -> library ('session');
	}
	public function index(){
	}
	public function APCIInsert($idformato = NULL){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$datainsert['apci_formatoDigital'] = strtoupper($this -> input -> post('apci_new_formato'));
			$datainsert['apci_id_formato_area'] = strtoupper($this -> input -> post('selectformato'));
      if ($this -> APCIAdminFormatoModel -> insertformato($datainsert)) { ?>
        <script type="text/javascript">
        alert('Los datos No se insertaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatos");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se insertaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatos");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIread($idformato = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $data['allformato'] = $this -> APCIAdminFormatoModel -> getallformatoid($idformato);
			$data['formatoarea'] = $this -> APCIAdminFormatoModel -> getareaformato($data['allformato'][0] -> apci_id_formato_area);
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Formato/APCIViewPanelAdminFormatoRead', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEdit($idformato = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $data['allformato'] = $this -> APCIAdminFormatoModel -> getallformatoid($idformato);
			$data['allarea'] = $this -> APCIAdminModel -> getallarea();
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Formato/APCIViewPanelAdminFormatoEdit', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIEditSi($idformato = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
      $dataEdit['apci_id_formato'] = $this -> input -> post('apci_id_area_view');
			$dataEdit['apci_formatoDigital'] = strtoupper($this -> input -> post('apci_formatoDigital'));
      $dataEdit['apci_id_formato_area'] = strtoupper($this -> input -> post('apci_id_formato_area'));
      if ($this -> APCIAdminFormatoModel -> updatformato($dataEdit)) { ?>
        <script type="text/javascript">
        alert('Los datos No se actualizaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatos");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos estan actualizados correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatos");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
  public function APCIDelete($idformato = NULL){
    if ($usuario = $this -> session -> userdata('apci_username')) {
      if ($this -> APCIAdminFormatoModel -> deleteformato($idformato)) { ?>
        <script type="text/javascript">
        alert('Los datos No se Eliminaron');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatos");
        </script>
      <?php }else{ ?>
        <script type="text/javascript">
        alert('Los datos se eliminaron correctamente');
        window.location.replace("<?=base_url()?>APCIPanelAdmin/APCIPanelFormatos");
        </script>
      <?php }
    }else{
			$this -> load -> view('APCIViewLogin');
		}
  }
}
