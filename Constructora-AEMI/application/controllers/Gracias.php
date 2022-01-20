<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gracias extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	public function _remap($method, $params = array()) {
		if (!method_exists($this, $method)) {
			$this -> index($method, $params);
		}
		else {
			return call_user_func_array(array($this,$method), $params);
		}
	}
	public function index($universal_url = NULL){
		// --------------- variables para tablas --------------- //
		$tbl_co = "correos";
		$tbl_h = "headers";
		$tbl_rs = "redes_sociales";
		// --------------- HEADER --------------- //
		$select = "item_h, ruta_h";
		$query_header['items'] = $this -> ma -> getAll($select, $tbl_h); // obtenemos las opciones del menú
		// --------------- FOOTER --------------- //
		$select = "red_social_rs, imagen_rs";
		$query_footer['tbl_rs'] = $this -> ma -> getAll($select, $tbl_rs); // obtenemos las redes sociales
		if (empty($universal_url)) {
			$insert_tbl_co['nombre_co'] = trim(mb_strtoupper($this -> input -> post('nombre_contacto'), 'UTF-8'));
			if (!empty($insert_tbl_co['nombre_co'])) { // validamos que venga la información del formulario
				$insert_tbl_co['email_co'] = trim(mb_strtoupper($this -> input -> post('email_contacto'), 'UTF-8'));
				$insert_tbl_co['asunto_co'] = trim(mb_strtoupper($this -> input -> post('asunto_contacto'), 'UTF-8'));
				$insert_tbl_co['telefono_co'] = trim(mb_strtoupper($this -> input -> post('telefono_contacto'), 'UTF-8'));
				$insert_tbl_co['comentario_co'] = trim(mb_strtoupper($this -> input -> post('comentarios_contacto'), 'UTF-8'));
				$insert_tbl_co['hora_envio_co'] = date('H:i:s');
				$insert_tbl_co['fecha_envio_co'] = date('Y-m-d');
				$insert_tbl_co['ubicacion_co'] = trim(mb_strtoupper($this -> input -> post('aemi_mensaje_js'), 'UTF-8'));
				$insert_tbl_co['ip_co'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
				$response_recaptcha = $_POST['g-recaptcha-response'];
				if (!empty($insert_tbl_co['comentario_co'])) { // validamos si viene información en el comentario
					if (!empty($response_recaptcha) && $response_recaptcha) { // si viene información en el comentario | validamos el recaptcha
						$secret = "6Ler3LIUAAAAALd9OQ5ha2bYMU-LgQIOX_DmAm5t";
						$ip = $insert_tbl_co['ip_co'];
						$validation_server = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response_recaptcha&remoteip=$ip");
						$controller_answer = json_decode($validation_server, TRUE);
						if ($controller_answer['success'] == 1) { // validamos la respuesta del captcha
							$insert_tbl_co['recaptcha_co'] = 1;
							$result_insert_tbl_co = $this -> ma -> insert($tbl_co, $insert_tbl_co);
							if ($result_insert_tbl_co == "true") { // validamos que se envió el email
								$email = $this -> se -> send($insert_tbl_co);
								$emailrobot = $this -> ser -> correo_Gracias($insert_tbl_co);
								$this -> load -> view('main/header', $query_header);
								$this -> load -> view('main/gracias');
								$this -> load -> view('main/footer', $query_footer);
							}
							else { // no se envió | mandamos alerta de error
								$query_view_popup['title'] = "¡ERROR!";
								$query_view_popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
								$query_view_popup['type'] = "error";
								$query_view_popup['ruta'] = "base";
								// --------------- VISTAS --------------- //
								$this -> load -> view('main/header', $query_header);
								$this -> load -> view('popup/popup_time', $query_view_popup);
								$this -> load -> view('main/footer', $query_footer);
							}
						}
						else { // la respuesta es 0 | redirigimos a la página principal
							redirect(base_url());
							exit();
						}
					}
					else { // el usuario no valido el recaptcha | mandamos alerta de error
						$query_view_popup['title'] = "¡ERROR!";
						$query_view_popup['text'] = "Lo sentimos para enviar un email debes de validar el captcha.";
						$query_view_popup['type'] = "error";
						$query_view_popup['ruta'] = "base";
						// --------------- VISTAS --------------- //
						$this -> load -> view('main/header', $query_header);
						$this -> load -> view('popup/popup_time', $query_view_popup);
						$this -> load -> view('main/footer', $query_footer);
					}
				}
				else { // no viene información en el comentario | mandamos alerta de error
					$query_view_popup['title'] = "¡ERROR!";
					$query_view_popup['text'] = "Para comunicarte con nosotros debes de ingresar la información correcta. Intetalo nuevamente.";
					$query_view_popup['type'] = "error";
					$query_view_popup['ruta'] = "base";
					// --------------- VISTAS --------------- //
					$this -> load -> view('main/header', $query_header);
					$this -> load -> view('popup/popup_time', $query_view_popup);
					$this -> load -> view('main/footer', $query_footer);
				}
			}
			else { // no viene información del formulario | redirigimos a la página principal
				redirect(base_url());
				exit();
			}
		}
		else { // viene información | redirigimos a la página principal
			redirect(base_url());
			exit();
		}
	}
}
