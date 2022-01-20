<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIReportes extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> database();
		$this -> load -> model('APCIAdminModel');
    $this -> load -> model('APCIAdminReportModel');
		$this -> load -> library ('session');
	}
	public function index(){
	}
	public function APCISesUsu(){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$dataReport['sesiones'] = $this -> APCIAdminReportModel -> GetSesion();
			if ($dataReport['sesiones'] == "") {
				$this -> load -> view('APCIViewHeader');
				$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
				$this -> load -> view('Admin/Reportes/APCIViewReportSesUsu',$dataReport);
				$this -> load -> view('APCIViewFooter');
			}else{
				$dataReport['usersesion'] = $this -> APCIAdminReportModel -> GetUserSesion($dataReport['sesiones']);
				$this -> load -> view('APCIViewHeader');
				$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
				$this -> load -> view('Admin/Reportes/APCIViewReportSesUsu',$dataReport);
				$this -> load -> view('APCIViewFooter');
			}
		}else{
			$this -> load -> view('APCIViewLogin');
		}
	}
	public function APCIFormUser(){
		if ($usuario = $this -> session -> userdata('apci_username')){
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$dataReport['formatos'] = $this -> APCIAdminReportModel -> GetFormato();
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Reportes/APCIViewReportFormUser', $dataReport);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
	}
	public function APCIAreaFormPend(){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Reportes/APCIViewReportFormPend');
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
	}
	public function APCIAreaFormTer(){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Reportes/APCIViewReportFormTer');
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
	}
	public function APCIStaForm(){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['usuario'] = $this -> session -> userdata('apci_username');
			$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
			$dataReport['statusformatos'] = $this -> APCIAdminReportModel -> GetStaForm();
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
			$this -> load -> view('Admin/Reportes/APCIViewReportStaForm',$dataReport);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
	}
}
