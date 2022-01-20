<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class APCIForDig extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> database();
		$this -> load -> model('APCIModel');
		$this -> load -> library ('session');
		$this -> load -> library ('APCIFDConverterPDF');
	}
	public function index(){
		if ($usuario = $this -> session -> userdata('apci_username')) {
			if ($usuario == 'admin') {
				$this -> load -> view('APCIViewHeader');
      	$this -> load -> view('Admin/APCIViewPanelAdmin');
      	$this -> load -> view('APCIViewFooter');
      }else{
				$data['apci_login_usuario'] = $usuario;
				$data['ApciLogin'] = $this -> APCIModel -> APCIGetUsername($data['apci_login_usuario']);
				$data['ApciMsnRecibidos'] = $this -> APCIModel -> APCIGetMsnRec($data['ApciLogin'] -> apci_id_user);
				$data['ApciMsnEnviados'] = $this -> APCIModel -> APCIGetMsnEnv($data['ApciLogin'] -> apci_id_user);
				$data['ApciFD'] = $this -> APCIModel -> APCIGetFD($data['ApciLogin'] -> apci_id_user_area);
				$id_FD = $this -> input -> post('apci_id_fd');
				switch ($id_FD) {
					case 1:
						$this -> load -> view('APCIViewHeader');
						$this -> load -> view('User/APCIViewPanelUser', $data);
						$this -> load -> view('User/Formatos/APCIViewFDOT');
						$this -> load -> view('APCIViewFooter');
						break;
					case 2:
						$this -> load -> view('APCIViewHeader');
						$this -> load -> view('User/APCIViewPanelUser', $data);
						$this -> load -> view('User/Formatos/APCIViewFDPE');
						$this -> load -> view('APCIViewFooter');
						break;
					case 3:
						$this -> load -> view('APCIViewHeader');
						$this -> load -> view('User/APCIViewPanelUser', $data);
						$this -> load -> view('User/Formatos/APCIViewTC');
						$this -> load -> view('APCIViewFooter');
						break;
				}
				// if ($id_FD == 1) {
				// 	$this -> load -> view('APCIViewHeader');
				// 	$this -> load -> view('User/APCIViewPanelUser', $data);
				// 	$this -> load -> view('User/Formatos/APCIViewFDOT');
				// 	$this -> load -> view('APCIViewFooter');
				// }elseif ($id_FD == 2) {
				// 	$this -> load -> view('APCIViewHeader');
				// 	$this -> load -> view('User/APCIViewPanelUser', $data);
				// 	$this -> load -> view('User/Formatos/APCIViewFDPE');
				// 	$this -> load -> view('APCIViewFooter');
				// }
			}
		}else{
			$this -> load -> view('APCIViewLogin');
		}
	}
	public function APCICreatePDF(){
		$data['TipodeFormato'] = $this -> input -> post('TF');
		if($data['OTT'] = $this -> input -> post('APCIFDOTT') == 'Seleccionar'){ ?>
			<script type="text/javascript">
				alert('Slecciona el XXXXX');
				window.location.replace("<?=base_url()?>");
			</script>
		<?php }else{
			$data['OTF'] = $this -> input -> post('APCIFDOTF');
			$data['OTT'] = $this -> input -> post('APCIFDOTT');
			$data['OTPA'] = $this -> input -> post('APCIFDOTPA');
			$data['OTD'] = $this -> input -> post('APCIFDOTD');
			if($data['OTTS'] = $this -> input -> post('APCIFDOTTS') == 'Seleccionar'){ ?>
				<script type="text/javascript">
					alert('Slecciona el Tipo de Servicio:');
					window.location.replace("<?=base_url()?>");
				</script>
			<?php }else {
				$data['OTTS'] = $this -> input -> post('APCIFDOTTS');
				$data['OTFI'] = $this -> input -> post('APCIFDOTFI');
				$data['OTFE'] = $this -> input -> post('APCIFDOTFE');
				$data['OTFT'] = $this -> input -> post('APCIFDOTFT');
				$data['OTHI'] = $this -> input -> post('APCIFDOTHI');
				$data['OTHF'] = $this -> input -> post('APCIFDOTHF');
				$data['OTFEN'] = $this -> input -> post('APCIFDOTFEN');
				$data['OTDS'] = $this -> input -> post('APCIFDOTDS');
				$data['OTOB'] = $this -> input -> post('APCIFDOTOB');
				$usuario = $this -> session -> userdata('apci_username');
				$this -> apcifdconverterpdf -> CreatePDFOT($usuario, $data);
			}
		}
	}
}
