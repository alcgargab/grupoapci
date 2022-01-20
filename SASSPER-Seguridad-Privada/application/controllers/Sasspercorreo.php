<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sasspercorreo extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> library ('SASSPERSendCorreo', TRUE);
		$this -> load -> library ('SASSPERSendCorreolocal', TRUE);
		$this -> load -> library ('SassperSendCorreoRobot', TRUE);
		$this -> load -> model('ModelSassper');
		$this -> load -> helper('url');
	}
	public function index(){
		$response_recaptcha = $_POST['g-recaptcha-response'];
		if (isset($response_recaptcha) && $response_recaptcha) {
			$secret = "6Lel9pwUAAAAALcPYDpfP63RMplWZEWNVtcFG6j6";
			$ip = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
			$validation_server = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response_recaptcha&remoteip=$ip");
			$respuesta = json_decode($validation_server, TRUE);
			if ($respuesta['success']) {
				$data['Usuario'] = $this -> input -> post('nombre');
				$data['CorreoElectronico'] = $this -> input -> post('email');
				$data['NumTelefonico'] = $this -> input -> post('telefono');
				$data['Comentarios'] = $this -> input -> post('mensaje');
				$data['DireccionIp'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
				$data['Ubicacion'] = $this -> input -> post('sasspermensajeSASSPER');
				$insert = $this -> ModelSassper -> InsertCorreo($data);
				$envio = $this -> sasspersendcorreo -> correo_sassper($data);
				// $envio = $this -> sasspersendcorreolocal -> correo_sassper($data);
				if (!$envio) {
					$this -> sasspersendcorreorobot -> correo_Gracias($data);
				}else {
					redirect (base_url());
				}
				redirect (base_url());
			}else { ?>
				<script type="text/javascript">
					alert('Error al validar los campos.');
					window.location.replace("<?= base_url()?>");
				</script>
			<?php }
		}else{ ?>
			<script type="text/javascript">
				alert('Llena todos los campos por favor.');
				window.location.replace("<?= base_url()?>");
			</script>
		<?php }
	}
}
