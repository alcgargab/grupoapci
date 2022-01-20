<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIPanelAdmin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> database();
		$this -> load -> model('APCIModel');
		$this -> load -> model('APCIAdminModel');
		$this -> load -> library ('session');
		$this -> load -> library ('APCIFDConverterPDF');
	}
	public function index(){

	}
	public function APCIPanelAreas(){
		if (empty($_GET)) {
			header('Location:'.base_url().'APCIPanelAdmin/APCIPanelAreas?pagina=1');
		}else{
			if ($usuario = $this -> session -> userdata('apci_username')) {
				$data['usuario'] = $this -> session -> userdata('apci_username');
				$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
				$data['allarea'] = $this -> APCIAdminModel -> getallarea();
				$totalrows = 7;
				$iniciarconteo = ($_GET['pagina'] -1) * $totalrows;
				$data['allarealimit'] = $this -> APCIAdminModel -> getallarealimit($iniciarconteo, $totalrows);
				$this -> load -> view('APCIViewHeader');
				$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
				$this -> load -> view('Admin/Tablas/APCIViewPanelAdminArea', $data);
				$this -> load -> view('APCIViewFooter');
			}else{
				$this -> load -> view('APCIViewLogin');
			}
		}
	}
	public function APCIPanelFormatos(){
		if (empty($_GET)) {
			header('Location:'.base_url().'APCIPanelAdmin/APCIPanelFormatos?pagina=1');
		}else{
			if ($usuario = $this -> session -> userdata('apci_username')) {
				$data['usuario'] = $this -> session -> userdata('apci_username');
				$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
				$data['allformato'] = $this -> APCIAdminModel -> getallformato();
				$data['allarea'] = $this -> APCIAdminModel -> getallarea();
				$totalrows = 7;
				$iniciarconteo = ($_GET['pagina'] -1) * $totalrows;
				$data['allformlimit'] = $this -> APCIAdminModel -> getallformlimit($iniciarconteo, $totalrows);
				$this -> load -> view('APCIViewHeader');
				$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
				$this -> load -> view('Admin/Tablas/APCIViewPanelAdminFormatos', $data);
				$this -> load -> view('APCIViewFooter');
			}else{
				$this -> load -> view('APCIViewLogin');
			}
		}
	}
	public function APCIPanelFormatosUser(){
		if (empty($_GET)) {
			header('Location:'.base_url().'APCIPanelAdmin/APCIPanelFormatosUser?pagina=1');
		}else{
			if ($usuario = $this -> session -> userdata('apci_username')) {
				$data['usuario'] = $this -> session -> userdata('apci_username');
				$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
				$data['allformatouser'] = $this -> APCIAdminModel -> getallformatouser();
				$data['allformato'] = $this -> APCIAdminModel -> getallformato();
				$data['alluser'] = $this -> APCIAdminModel -> getalluser();
				$data['statusform'] = $this -> APCIAdminModel -> getstatusform();
				$totalrows = 7;
				$iniciarconteo = ($_GET['pagina'] -1) * $totalrows;
				$data['allformuserlimit'] = $this -> APCIAdminModel -> getallformuserlimit($iniciarconteo, $totalrows);
				$this -> load -> view('APCIViewHeader');
				$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
				$this -> load -> view('Admin/Tablas/APCIViewPanelAdminFormatosUser', $data);
				$this -> load -> view('APCIViewFooter');
			}else{
				$this -> load -> view('APCIViewLogin');
			}
		}
	}
	public function APCIPanelMensaje(){
		if (empty($_GET)) {
			header('Location:'.base_url().'APCIPanelAdmin/APCIPanelMensaje?pagina=1');
		}else{
			if ($usuario = $this -> session -> userdata('apci_username')) {
				$data['usuario'] = $this -> session -> userdata('apci_username');
				$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
				$data['allmsn'] = $this -> APCIAdminModel -> getallmsn();
				$data['alluser'] = $this -> APCIAdminModel -> getalluser();
				$data['statusmsn'] = $this -> APCIAdminModel -> getstatusmsn();
				$totalrows = 7;
				$iniciarconteo = ($_GET['pagina'] -1) * $totalrows;
				$data['allmsnlimit'] = $this -> APCIAdminModel -> getallmsnlimit($iniciarconteo, $totalrows);
				$this -> load -> view('APCIViewHeader');
				$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
				$this -> load -> view('Admin/Tablas/APCIViewPanelAdminMensaje', $data);
				$this -> load -> view('APCIViewFooter');
			}else{
				$this -> load -> view('APCIViewLogin');
			}
		}
	}
	public function APCIPanelSesion(){
		if (empty($_GET)) {
			header('Location:'.base_url().'APCIPanelAdmin/APCIPanelSesion?pagina=1');
		}else{
			if ($usuario = $this -> session -> userdata('apci_username')) {
				$data['usuario'] = $this -> session -> userdata('apci_username');
				$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
				$data['allsesion'] = $this -> APCIAdminModel -> getallsesion();
				$data['alluser'] = $this -> APCIAdminModel -> getalluser();
				$totalrows = 7;
				$iniciarconteo = ($_GET['pagina'] -1) * $totalrows;
				$data['allsesionlimit'] = $this -> APCIAdminModel -> getallsesionlimit($iniciarconteo, $totalrows);
				$this -> load -> view('APCIViewHeader');
				$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
				$this -> load -> view('Admin/Tablas/APCIViewPanelAdminSesion', $data);
				$this -> load -> view('APCIViewFooter');
			}else{
				$this -> load -> view('APCIViewLogin');
			}
		}
	}
	public function APCIPanelUser(){
		if (empty($_GET)) {
			header('Location:'.base_url().'APCIPanelAdmin/APCIPanelUser?pagina=1');
		}else{
			if ($usuario = $this -> session -> userdata('apci_username')) {
				$data['usuario'] = $this -> session -> userdata('apci_username');
				$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
				$data['alluser'] = $this -> APCIAdminModel -> getalluser();
				$data['allarea'] = $this -> APCIAdminModel -> getallarea();
				$totalrows = 7;
				$iniciarconteo = ($_GET['pagina'] -1) * $totalrows;
				$data['alluserlimit'] = $this -> APCIAdminModel -> getalluserlimit($iniciarconteo, $totalrows);
				$this -> load -> view('APCIViewHeader');
				$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
				$this -> load -> view('Admin/Tablas/APCIViewPanelUser', $data);
				$this -> load -> view('APCIViewFooter');
			}else{
				$this -> load -> view('APCIViewLogin');
			}
		}
	}
}
