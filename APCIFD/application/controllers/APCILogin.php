<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCILogin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> database();
		$this -> load -> model('APCIModel');
		$this -> load -> model('APCIAdminModel');
		$this -> load -> library ('session');
	}
	// public function index(){
	// 	session_destroy();
	// 	redirect (base_url());
	// }
	public function index(){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$tipouser = $this -> session -> userdata('apci_usertype');
			if ($tipouser == 'admin') {
				$data['usuario'] = $this -> session -> userdata('apci_username');
				$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
				$this -> load -> view('APCIViewHeader');
      	$this -> load -> view('Admin/APCIViewPanelAdmin', $data);
      	$this -> load -> view('APCIViewFooter');
      }else{
				$data['apci_login_usuario'] = $usuario;
				$data['ApciLogin'] = $this -> APCIModel -> APCIGetUsername($data['apci_login_usuario']);
				$data['ApciMsnRecibidos'] = $this -> APCIModel -> APCIGetMsnRec($data['ApciLogin'] -> apci_id_user);
				$data['ApciMsnEnviados'] = $this -> APCIModel -> APCIGetMsnEnv($data['ApciLogin'] -> apci_id_user);
				$data['ApciFD'] = $this -> APCIModel -> APCIGetFD($data['ApciLogin'] -> apci_id_user_area);
				$this -> load -> view('APCIViewHeader');
				$this -> load -> view('User/APCIViewPanelUser', $data);
				$this -> load -> view('APCIViewFooter');
			}
		}else{
			$this -> load -> view('APCIViewLogin');
		}
	}
	public function ValidarLogin($ipaddress = NULL, $usuario = NULL, $pass = NULL){
    // $data['apci_name'] = $this -> input -> post('apci_main_form_name');
    // $data['apci_pass'] = $this -> input -> post('apci_main_form_pass');
		$data['apci_name'] = $_GET['usuario'];
    $data['apci_pass'] = $_GET['pass'];
		// print_r($data); die();
		if ($ApciLogin = $this -> APCIModel -> APCIGetUser($data)) {
			$datasesion['apci_id_sesion_user'] = $ApciLogin[0] -> apci_id_user;
			$datasesion['apci_user_sesion_ip'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
			$this -> APCIModel -> APCIInsertSesion($datasesion);
			$this -> session -> apci_ip = $datasesion['apci_user_sesion_ip'];
			$this -> session -> apci_id_sesion_user = $ApciLogin[0] -> apci_id_user;
			$this -> session -> apci_username = $ApciLogin[0] -> apci_username;
			$this -> session -> apci_password = $ApciLogin[0] -> apci_password;
			$this -> session -> apci_usertype = $ApciLogin[0] -> apci_usertype;
    	if (count($ApciLogin) == 1) {
      	if ($ApciLogin[0] -> apci_usertype == 'admin') {
					$data['usuario'] = $this -> session -> userdata('apci_username');
					$data['user'] = $this -> APCIAdminModel -> GetUsername($data['usuario']);
        	$this -> load -> view('APCIViewHeader');
        	$this -> load -> view('Admin/APCIViewPanelAdmin',$data);
        	$this -> load -> view('APCIViewFooter');
      	}else{
					$usuario = $this -> session -> userdata('apci_username');
					$data['apci_login_usuario'] = $usuario;
					$data['ApciLogin'] = $this -> APCIModel -> APCIGetUsername($data['apci_login_usuario']);
					$data['ApciMsnEnviados'] = $this -> APCIModel -> APCIGetMsnEnv($data['ApciLogin'] -> apci_id_user);
					$data['ApciMsnRecibidos'] = $this -> APCIModel -> APCIGetMsnRec($data['ApciLogin'] -> apci_id_user);
					$data['ApciFD'] = $this -> APCIModel -> APCIGetFD($data['ApciLogin'] -> apci_id_user_area);
					$this -> load -> view('APCIViewHeader');
					$this -> load -> view('User/APCIViewPanelUser', $data);
					$this -> load -> view('APCIViewFooter');
      	}
			}
    	}else{?>
				<script type="text/javascript">
					alert('usuario o contraseña incorrectos');
					window.location.replace("<?=base_url()?>");
				</script>
			<?php
		}
	}
	public function APCIGetMsnReci(){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['apci_login_usuario'] = $usuario;
			$data['ApciLogin'] = $this -> APCIModel -> APCIGetUsername($data['apci_login_usuario']);
			$ApciMsnRecibidos = $this -> APCIModel -> APCIGetMsnRec($data['ApciLogin'] -> apci_id_user);
			$respuesta="";
			$i=1;
			foreach ($ApciMsnRecibidos as $row){
				$respuesta.='
					<li id="'.$row -> apci_id_mensaje.'" class="apci_panel_user_msn_item list-group-item"> <a id="apci_panel_user_menu_msn_user_right" href="'.base_url().'APCILogin/APCIViewMsn/'.$row -> apci_id_mensaje.'">'.$row -> apci_msn_titulo.'
					<input type="hidden" name="" value="'.$row -> apci_id_emisor.'> <span id="apci_panel_user_menu_msn_user">'.$row -> apci_username.' </span> </a> </li>
				';
				$i++;
			}
			echo $respuesta;
		}else{
			$this -> load -> view('APCIViewLogin');
		}
	}
	public function APCIGetMsnRecitotal(){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['apci_login_usuario'] = $usuario;
			$data['ApciLogin'] = $this -> APCIModel -> APCIGetUsername($data['apci_login_usuario']);
			$ApciMsnRecibidos = $this -> APCIModel -> APCIGetMsnRec($data['ApciLogin'] -> apci_id_user);
			$respuesta= count($ApciMsnRecibidos);
			// $i=1;
			// foreach ($ApciMsnRecibidos as $row){
			// 	$respuesta.='
			// 		<li id="'.$row -> apci_id_mensaje.'" class="apci_panel_user_msn_item list-group-item"> <a id="apci_panel_user_menu_msn_user_right" href="'.base_url().'APCILogin/APCIViewMsn/'.$row -> apci_id_mensaje.'">'.$row -> apci_msn_titulo.'
			// 		<input type="hidden" name="" value="'.$row -> apci_id_emisor.'> <span id="apci_panel_user_menu_msn_user">'.$row -> apci_username.' </span> </a> </li>
			// 	';
			// 	$i++;
			// }
			echo $respuesta;
		}else{
			$this -> load -> view('APCIViewLogin');
		}
	}
	public function APCIMsn($id_user){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			$data['apci_login_usuario'] = $usuario;
			// $data['ApciLogin'] = $this -> APCIModel -> APCIGetUsername($data['apci_login_usuario']);
			$data['APCInewMsn'] = $this -> APCIModel -> APCIGetAllUser($id_user);
			$data['ApciLogin'] = $this -> APCIModel -> APCIGetUsername($data['apci_login_usuario']);
			$data['ApciMsnEnviados'] = $this -> APCIModel -> APCIGetMsnEnv($data['ApciLogin'] -> apci_id_user);
			$data['ApciMsnRecibidos'] = $this -> APCIModel -> APCIGetMsnRec($data['ApciLogin'] -> apci_id_user);
			$data['ApciFD'] = $this -> APCIModel -> APCIGetFD($data['ApciLogin'] -> apci_id_user_area);
			$data['StatusMsn'] = $this -> APCIModel -> APCIGetStatusMsn();
			// print_r($data['StatusMsn'][0] -> apci_id_msn_status); die();
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('User/APCIViewPanelUser', $data);
			$this -> load -> view('User/APCIViewPanelUserMsn', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$this -> load -> view('APCIViewLogin');
		}
	}
	public function APCISendMsn(){
		$data['apci_username'] = $this -> session -> userdata('apci_username');
		$datas['ApciLogin'] = $this -> APCIModel -> APCIGetUsername($data['apci_username']);
		$datamsn['apci_id_emisor'] = $datas['ApciLogin'] -> apci_id_user;
		if($datamsn['apci_id_remitente'] = $this -> input -> post('apci_select_users') == 'Seleccionar'){ ?>
			<script type="text/javascript">
				alert('Slecciona el destinatario');
				window.location.replace("<?=base_url()?>APCILogin");
			</script>
		<?php }else {
			$datamsn['apci_id_remitente'] = $this -> input -> post('apci_select_users');
			$datamsn['apci_msn_titulo'] = $this -> input -> post('apci_oanel_User_msn_titulo');
			$datamsn['apci_msn_msn'] = $this -> input -> post('apci_oanel_User_msn_txt');
			$datamsn['apci_msn_estado'] = $this -> input -> post('apci_oanel_User_msn_status');
			$data = $this -> APCIModel -> APCIInsertMsn($datamsn);
			if($data == 1){ ?>
				<script type="text/javascript">
					alert('Mensaje enviado');
					window.location.replace("<?=base_url()?>APCILogin");
				</script>
			<?}else{?>
				<script type="text/javascript">
					alert('El Mensaje no fue enviado');
					window.location.replace("<?=base_url()?>APCILogin");
				</script>
			<?php }
		}
	}
	public function APCIViewMsn($dataMsn){
		$data['apci_mensaje'] = $this -> APCIModel -> APCIGetMsn($dataMsn);
		if ($data['apci_mensaje'][0]-> apci_msn_estado == 1) {
			$this -> APCIModel -> APCIUpdateMsn($dataMsn);
			$usuario = $this -> session -> userdata('apci_username');
			$data['apci_login_usuario'] = $usuario;
			$data['ApciLogin'] = $this -> APCIModel -> APCIGetUsername($data['apci_login_usuario']);
			$data['ApciMsnEnviados'] = $this -> APCIModel -> APCIGetMsnEnv($data['ApciLogin'] -> apci_id_user);
			$data['ApciMsnRecibidos'] = $this -> APCIModel -> APCIGetMsnRec($data['ApciLogin'] -> apci_id_user);
			$data['ApciFD'] = $this -> APCIModel -> APCIGetFD($data['ApciLogin'] -> apci_id_user_area);
			$data['StatusMsn'] = $this -> APCIModel -> APCIGetStatusMsn();
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('User/APCIViewPanelUser', $data);
			$this -> load -> view('User/APCIViewPanelUserMsnView', $data);
			$this -> load -> view('APCIViewFooter');
		}else{
			$data['apci_mensaje'] = $this -> APCIModel -> APCIGetMsn($dataMsn);
			$usuario = $this -> session -> userdata('apci_username');
			$data['apci_login_usuario'] = $usuario;
			$data['ApciLogin'] = $this -> APCIModel -> APCIGetUsername($data['apci_login_usuario']);
			$data['ApciMsnEnviados'] = $this -> APCIModel -> APCIGetMsnEnv($data['ApciLogin'] -> apci_id_user);
			$data['ApciMsnRecibidos'] = $this -> APCIModel -> APCIGetMsnRec($data['ApciLogin'] -> apci_id_user);
			$data['ApciFD'] = $this -> APCIModel -> APCIGetFD($data['ApciLogin'] -> apci_id_user_area);
			$data['StatusMsn'] = $this -> APCIModel -> APCIGetStatusMsn();
			$this -> load -> view('APCIViewHeader');
			$this -> load -> view('User/APCIViewPanelUser', $data);
			$this -> load -> view('User/APCIViewPanelUserMsnView', $data);
			$this -> load -> view('APCIViewFooter');
		}
	}
	public function cerrarSesion(){
		session_destroy();
		redirect (base_url ());
	}
}
