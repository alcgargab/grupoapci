<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper('form');
		$this -> load -> library('session');
		$this -> load -> library ('OtelumaSendCorreo', TRUE);
		$this -> load -> model('ModelOteluma');
		$this -> load -> helper('url');
	}
	public function _remap($method, $params = array()) {
		if (!method_exists($this, $method)) {
			$this -> index($method, $params);
		} else {
			return call_user_func_array(array($this,$method), $params);
		}
	}
	public function index(){

	}
	// VALIDAR REGISTRO DEL FORMULARIO DE LA PÁGINA
	public function ValidarFormulario(){
		// OBTENEMOS EL USUARIO
		$usuario = $this -> input -> post('regUsuario');
		// VALIDAMOS QUE EL USUARIO VENGA CON INFORMACIÓN
		if ($usuario != NULL) {
			// SI TIENE INFORMACIÓN | OBTENEMOS VALORES DEL REGISTRO PARA VALIDAR CAMPOS
			// APELLIDO DEL USUARIO
			$Apellido = $this -> input -> post('regUsuarioA');
			// CORREO DEL USUARIO
			$correoElectronico = $this -> input -> post('regCorreo');
			// CONTRASEÑA DEL USUARIO
			$password = $this -> input -> post('regPassword');
			// VALIDAMOS NUEVAMENTE QUE EL USUARIO VENGA NO VENGA VACIO
			if (isset($usuario)) {
				// SI TIENE INFORMACIÓN | VALIDAMOS LA ESTRUCTURA DE LAS VARIABLES
				if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $usuario) && preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $Apellido) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $correoElectronico) &&
					   preg_match('/^[a-zA-Z0-9]+$/', $password)){
					// LAS VARIABLES SON CORRECTAS | OBTENEMOS REGISTRO
				 	// NOMBRE DEL USUARIO
					$data['Nombre'] = strtoupper($this -> input -> post('regUsuario'));
					// APELLIDO DEL USUARIO
					$data['Apellido'] = strtoupper($this -> input -> post('regUsuarioA'));
					// CONTRASEÑA DEL USUARIO
					$data['Password'] = $this -> input -> post('regPassword');
					// CONTRASEÑA DEL USUARIO EN FORMATO MD5
					$data['Passwordmd5'] = md5($this -> input -> post('regPassword'));
					// CORREO DEL USUARIO
					$data['CorreoElectronico'] = $this -> input -> post('regCorreo');
					// CORREO DEL USUARIO EN FORMATO MD5
					$data['CorreoElectronicoMd5'] = md5($this -> input -> post('regCorreo'));
					// DECLARAMOS EL MODO DE REGISTRO DIRECTAMNTE DE LA PÁGINA
					$data['RModo'] = 1;
					// $carpeta = 'images/Usuarios/';
					// if (!file_exists($carpeta)) {
					// 		mkdir($carpeta, 0777, true);
					// }
					// if (!empty($_FILES['regFoto']['name'])) {
					// 	move_uploaded_file($_FILES['regFoto']['tmp_name'],"images/Usuarios/$usuario-Foto-".($_FILES['regFoto']['name']));
					// 	$url_img_Foto = "images/Usuarios/$usuario-Foto-".$_FILES['regFoto']['name'];
					// }
					// FOTO DEL USUARIO
					$data['Foto'] = "";
					// VALIDAMOS QUE LA FOTO VIENE VACIA
					if ($data['Foto'] == NULL) {
						// LA FOTO VIENE VACIA | AGREGAMOS UNA FOTO DEFAULT
						$data['Foto'] = "Oteluma_Icon_U1.png";
					}
					// TIPO DE VERIFICACIÓN DEL USUARIO | LO PONEMOS EN 0 PARA ENVIAR CORREO DE VALIDAR CORREO
					$data['RVerificacion'] = 1;
					// UBICACIÓN DEL USUARIO
					$data['Ubicacion'] = $this -> input -> post('OTELUMAmensajeOTELUMA1');
					// DIRECCIÓN IP DEL USUARIO
					$data['DireccionIP'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
					// INSERTAMOS EL NUEVO USUARIO
					$tabla = "Usuario";
					$insert = $this -> ModelOteluma -> Insert($tabla, $data);
					// VALIDAMOS SI LA INSERCIÓN DEL NUEVO USUARIO ES CORRECTA
					if ($insert == "ok") {
						// LA INSERCIÓN ES CORRECTA | MANDAMOS EL CORREO DE VERIFICACIÓN Y MANDAMOS ALERTA DE SUCCESS
						// MANDAR CORREO DE VERIFICACION DE USUARIO
						$respuesta = $this -> otelumasendcorreo -> Verificacion_Usuario($data);
						// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						// OBTENEMOS LOS VALORES DE LA PLANTILLA
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/popup/Success/ViewClieVerificacionUsuario');
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
					// LA INSERCIÓN NO ES CORRECTA | MANDAMOS ALERTA DE ERROR
					else {
						// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						// OBTENEMOS LOS VALORES DE LA PLANTILLA
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/popup/Error/ViewClieErrorRegistro');
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				}
				// LAS VARIABLES NO SON CORRECTAS | MANDAMOS ALERTA DE ERROR
				else {
					// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
					$tabla = "categorias";
					$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
					// OBTENEMOS LOS VALORES DE LA PLANTILLA
					$tabla = "plantilla";
					$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/popup/Error/ViewClieErrorDeForm');
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}
			}
			// NO TIENE INFORMACIÓN | REDIRIGIMOS A LA PÁGINA PRINCIPAL
			else {
				redirect(base_url());
				exit();
			}
		}
		// NO TIENE INFORMACIÓN | REDIRIGIMOS A LA PÁGINA PRINCIPAL
		else {
			redirect(base_url());
			exit();
		}
	}
	// VALIDAMOS SI LA CUENTA YA SE ENCUENTRA VERIFICADA
	public function ValidarCuenta($correo = NULL){
		// VALIDAMOS QUE VENGA EL CORREO
		if ($correo != NULL) {
			// EL CORREO SI VIENE | OBTENEMOS EL REGISTRO MEDIANTE EL CORREO
			$tabla = "usuario";
			$campo = "CorreoElectronicoMd5";
			$valor = $correo;
			$data = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
			// VALIDAMOS SI ENCONTRAMOS UN USUARIO CON ESE CORREO
			if ($data != NULL) {
				// VALIDAMOS SI EL STATUS ES SIN VALIDAR
				if ($data -> RVerificacion == 1) {
					// EL ESTATUS ES SIN VERIFICAR | ACTIVAMOS CUENTA
					// ACTUALIZAMOS EL STATUS DEL USUARIO
					$tabla = "usuario";
					$campo = "RVerificacion";
					$valor = 2;
					$camposet = "idUsuario";
					$ruta = $data -> idUsuario;
					$respuesta = $this -> ModelOteluma -> Update($tabla, $campo, $valor, $camposet, $ruta);
					// VALIDAMOS SI ACTUALIZAMOS EL STATUS DE LA CUENTA
					if ($respuesta == "ok") {
						// ENVIAMOS CORREO DE VERIFICACION DE CUENTA
						$this -> otelumasendcorreo -> CuentaActiva($data);
						// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						// OBTENEMOS LOS VALORES DE LA PLANTILLA
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/popup/Success/ViewClieActivarCuenta');
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
					// EXISTIO UN ERROR AL ACTUALIZAR LA CUENTA
					else {
						// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						// OBTENEMOS LOS VALORES DE LA PLANTILLA
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/popup/Error/ViewClieErrorCuenta');
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				}
				else {
					// EL STATUS ESTA VERIFICADO | MANDAMOS ERROR DE QUE YA ESTA ACTIVADA LA CUENTA
					// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
					$tabla = "categorias";
					$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
					// OBTENEMOS LOS VALORES DE LA PLANTILLA
					$tabla = "plantilla";
					$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/popup/Info/ViewClieInfoCuentaActiva');
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}
			}
			// SI NO ENCONTRAMOS USUARIO | MANDAMOS UN ERROR
			else {
				// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
				$tabla = "categorias";
				$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
				// OBTENEMOS LOS VALORES DE LA PLANTILLA
				$tabla = "plantilla";
				$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
				$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
				$this -> load -> view ('Cliente/popup/Error/ViewClieCuentaNoEncontrada');
				$this -> load -> view ('Cliente/Principal/ViewClieFooter');
			}
		}
		// EL CORREO NO VIENE | REDIRIGIMOS A LA PÁGINA PRINCIPAL
		else {
			redirect(base_url());
			exit();
		}
	}
	// VALIDAR EL EMAIL EN LA BASE DE DATOS
	public function ValidarCorreo($email = NULL){
		// VALIDAMOS SI EL EMAIL EN FORMATO MD5 VIENE VIENE CON INFORMACIÓN
		if ($email != NULL) {
			// EL EMAIL VIENE CON INFORMACIÓN | OBTENEMOS EL CORREO Y VALIDAMOS SI EL CORREO YA EXISTE EN LA BASE DE DATOS
			$tabla = "usuario";
			$campo = "CorreoElectronicoMd5";
			$valor = $email;
			$respuesta = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
			echo json_encode($respuesta);
		}
		// EL EMAIL NO VIENE CON INFORMACIÓN | REDIRIGIMOS A LA PÁGINA PRINCIPAL
		else {
			redirect(base_url());
			exit();
		}
	}
	// INGRESAR AL USUARIO
	public function IngresarUsuario(){
		// CORREO DEL USUARIO
		$correoElectronico = $this -> input -> post('ingCorreo');
		// CONTRASEÑA DEL USUARIO
		$password = $this -> input -> post('ingPassword');
		// VALIDAMOS SI EL CORREO VIENE VACIO
		if ($this -> input -> post('ingCorreo')) {
			// CORREO VIENE CON INFORMACIÓN | VALIDAMOS SI EL FORMATO DEL CORREO Y LA CONTRASEÑA ES CORRECTO
			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $correoElectronico) && preg_match('/^[a-zA-Z0-9]+$/', $password)){
				// LOS FORMATOS SON CORRECTOS | OBTENEMOS AL USUARIO
				// CORREO DEL USUARIO
				$data['CorreoElectronico'] = $this -> input -> post('ingCorreo');
				// CONTRASEÑA DEL USUARIO
				$data['Password'] = $this -> input -> post('ingPassword');
				// OBTENEMOS EL USUARIO
				$tabla = "usuario";
				$campo1 = "CorreoElectronico";
				$valor1 = $data['CorreoElectronico'];
				$campo2 = "Password";
				$valor2 = $data['Password'];
				$respuesta = $this -> ModelOteluma -> GetRowWhere2($tabla, $campo1, $valor1, $campo2, $valor2);
				// VALIDAMOS QUE EL USUARIO EXISTA EN LA BASE DE DATOS
				if ($respuesta) {
					// EL USUARIO EXISTE | VALIDAMOS SI EL USUARIO HA VERIFICADO SU CORREO
					if ($respuesta -> RVerificacion == 1) {
						// USUARIO NO VERIFICADO | MANDAMOS ALERTA DE USUARIO NO VERIFICADO
						// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						// OBTENEMOS LOS VALORES DE LA PLANTILLA
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/popup/Warning/ViewClieWarningCuentaInactiva');
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
					else {
						// USUARIO VERIFICADO | INICIAMOS SESION DE USUARIO
						// ID DE USUARIO
						$sesion['idS_Usuario'] = $respuesta -> idUsuario;
						// UBICACIÓN DE USUARIO
						$sesion['Ubicacion'] = $this -> input -> post('OTELUMAmensajeOTELUMA2');
						// DIRECCIÓN IP DE USUARIO
						$sesion['DireccionIP'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
						// INSERTAMOS LA SESION
						$tabla = "sesion";
						$bandera = $this -> ModelOteluma -> Insert($tabla, $sesion);
						// VALIDAMOS SI LA SESIÓN FUE INSERTADA
						if ($bandera = "ok") {
							// SESION INSERTADA | CREAMOS SESION
							// VARIABLE PARA VALIDAR LA SESIÓN DEL USUARIO
							$this -> session -> validarSesion = "ok";
							// VARIABLE DE SESIÓN PARA ID DEL USUARIO
							$this -> session -> idSesion = $respuesta -> idUsuario;
							// VARIABLE DE SESIÓN PARA EL NOMBRE DEL USUARIO
							$this -> session -> nameSesion = $respuesta -> Nombre;
							// VARIABLE DE SESIÓN PARA EL APELLIDO DEL USUARIO
							$apellido = $this -> session -> apellidoSesion = $respuesta -> Apellido;
							// VARIABLE DE SESIÓN PARA LA FOTO DEL USUARIO
							$this -> session -> fotoSesion = $respuesta -> Foto;
							// VARIABLE DE SESIÓN PARA EL CORREO DEL USUARIO
							$this -> session -> emailSesion = $respuesta -> CorreoElectronico;
							// VARIABLE DE SESIÓN PARA LA CONTRASEÑA DEL USUARIO
							$this -> session -> passSesion = $respuesta -> Password;
							// VARIABLE DE SESIÓN PARA EL MODO DE REGISTRO DEL USUARIO
							$this -> session -> modoSesion = $respuesta -> RModo;
							// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
							$tabla = "categorias";
							$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
							// OBTENEMOS LOS VALORES DE LA PLANTILLA
							$tabla = "plantilla";
							$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/popup/Success/ViewClieIniciarSesion');
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
							// SESIÓN NO INSERTADA | MANDAMOS ALERTA DE ERROR
						}
						else {
							// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
							$tabla = "categorias";
							$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
							// OBTENEMOS LOS VALORES DE LA PLANTILLA
							$tabla = "plantilla";
							$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/popup/Error/ViewClieErrorIniciarSesion');
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
					}
				}
				// EL USUARIO NO EXISTE | MANDAMOS ALERTA DE ERROR
				else {
					// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
					$tabla = "categorias";
					$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
					// OBTENEMOS LOS VALORES DE LA PLANTILLA
					$tabla = "plantilla";
					$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/popup/Error/ViewClieErrorIngreso');
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}
			}
			// EL USUARIO NO EXISTE | MANDAMOS ALERTA DE USUARIO NO EXISTENTE
			else {
				// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
				$tabla = "categorias";
				$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
				// OBTENEMOS LOS VALORES DE LA PLANTILLA
				$tabla = "plantilla";
				$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
				$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
				$this -> load -> view ('Cliente/popup/Error/ViewClieErrorValidarUsuario');
				$this -> load -> view ('Cliente/Principal/ViewClieFooter');
			}
		}
		// CORREO NO VIENE CON INFORMACIÓN | REDIRIGIMOS A LA PÁGINA PRINCIPAL
		else {
			redirect(base_url());
			exit();
		}
	}
	// CERRAR SESION DEL USUARIO
	public function	CerrarSesion(){
		if (!isset($_SESSION['validarSesion'])) {
			redirect(base_url());
			exit();
		}else {
			// CERRAMOS SESIÓN DEL USUARIO
			session_destroy();
			// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
			$tabla = "categorias";
			$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
			// OBTENEMOS LOS VALORES DE LA PLANTILLA
			$tabla = "plantilla";
			$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
			$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
			$this -> load -> view ('Cliente/popup/Success/ViewClieCerrarSesion');
			$this -> load -> view ('Cliente/Principal/ViewClieFooter');
		}
	}
	// REESTABLECER LA CONTRASEÑA DEL USUARIO
	public function OlvidarPassword(){
		// OBTENEMOS EL CORREO DEL USUARIO
		$data['CorreoElectronico'] = $this -> input -> post('passCorreo');
		// VALIDAMOS QUE EL CORREO TENGA INFORMACIÓN
		if ($data['CorreoElectronico'] != "") {
			// SI TIENE INFORMACIÓN | VALIDAMOS QUE EL FORMATO SEA EL CORRECTO
			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $data['CorreoElectronico'])){
				// FORMATO CORRECTO | BUSCAMOS EN LA BASE DE DATOS EL USUARIO MEDIANTE EL CORREO
				$tabla = "usuario";
				$campo = "CorreoElectronico";
				$valor = $data['CorreoElectronico'];
				$respuesta = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
				// VALIDAMOS QUE EL USUARIO EXISTA EN LA BASE DE DATOS
				if ($respuesta) {
					// EL USUARIO EXISTE | GENERAMOS UNA CONTRASEÑA TEMPORAL
					// GENERAR CONTRASEÑA
					function generarPassword(){
						// TRUE O FALSE EN LA OPCIÓN QUE QUIERAS AÑADIR
						$opc_letras = TRUE; //  FALSE para quitar las letras
						$opc_numeros = TRUE; // FALSE para quitar los números
						$opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
						$opc_especiales = FALSE; // FALSE para quitar los caracteres especiales
						$longitud = 15;
						$password = "";
						$letras ="abcdefghijklmnopqrstuvwxyz";
						$numeros = "1234567890";
						$letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
						$especiales ="|@#~$%()=^*+[]{}-_";
						$listado = "";
						if ($opc_letras == TRUE) {
							$listado .= $letras;
						}
						if ($opc_numeros == TRUE) {
							$listado .= $numeros;
						}
						if($opc_letrasMayus == TRUE) {
							$listado .= $letrasMayus;
						}
						if($opc_especiales == TRUE) {
							$listado .= $especiales;
						}
						str_shuffle($listado);
						$max = strlen($listado)-1;
						for( $i=1; $i<=$longitud; $i++) {
							$password[$i] = $listado{mt_rand(0,$max)};
							str_shuffle($listado);
						}
						return $password;
					}
					// NOMBRE DEL USUARIO
					$data['usuario'] = $respuesta;
					// NUEVA CONTRASEÑA DEL USUARIO
					$data['newPassword'] = generarPassword();
					// ACTUALIZAMOS LA CONTRASEÑA DEL USUARIO
					$tabla = "usuario";
					$campo1 = "Password";
					$valor1 = $data['newPassword'];
					$campo2 = "Passwordmd5";
					$valor2 = md5($data['newPassword']);
					$camposet = "idUsuario";
					$ruta = $data['usuario'] -> idUsuario;
					$update = $this -> ModelOteluma -> Update2($tabla, $campo1, $valor1, $campo2, $valor2, $camposet, $ruta);
					// VALIDAMOS SI LA ACTUALIZACIÓN SE REALIZÓ
					if ($update == "ok") {
						// SI SE ACTUALIZO LA CONTRASEÑA | ENVIAMOS CORREO CON LA NUEVA CONTRASEÑA
						$email = $this -> otelumasendcorreo -> UpdatePassword($data);
						// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						// OBTENEMOS LOS VALORES DE LA PLANTILLA
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/popup/Success/ViewCliePassActualizada');
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
					// NO SE ACTUALIZO LA CONTRASEÑA | ENVIAMOS ALERTA DE ERROR
					else {
						// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						// OBTENEMOS LOS VALORES DE LA PLANTILLA
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/popup/Error/ViewClieErrorPassActualizada');
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				}
				// EL USUARIO NO EXISTE | ENVIAMOS ALERTA DE ERROR
				else {
					// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
					$tabla = "categorias";
					$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
					// OBTENEMOS LOS VALORES DE LA PLANTILLA
					$tabla = "plantilla";
					$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/popup/Error/ViewClieErrorRecuperarPass');
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}
			}
			// FORMATO INCORRECTO | ENVIAMOS ALERTA DE ERROR
			else {
				// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
				$tabla = "categorias";
				$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
				// OBTENEMOS LOS VALORES DE LA PLANTILLA
				$tabla = "plantilla";
				$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
				$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
				$this -> load -> view ('Cliente/popup/Error/ViewClieErrorCorreoElectronico');
				$this -> load -> view ('Cliente/Principal/ViewClieFooter');
			}
		}
		// NO TIENE INFORMACIÓN | REDIRIGIMOS A LA PÁGINA PRINCIPAL
		else {
			redirect(base_url());
			exit();
		}
	}
	// REGISTRO CON REDES SOCIALES
	public function RegistroFacebook(){
		if (isset($_POST['nombre'])) {
			// NOMBRE DEL USUARIO
			$data['Nombre'] = strtoupper($_POST['nombre']);
			// APELLIDO DEL USUARIO
			$data['Apellido'] = "NULL";
			// CONTRASEÑA DEL USUARIO
			$data['Password'] = "NULL";
			// CONTRASEÑA DEL USUARIO EN FORMATO MD5
			$data['Passwordmd5'] = "NULL";
			// CORREO DEL USUARIO
			$data['CorreoElectronico'] = $_POST['email'];
			// CORREO DEL USUARIO EN FORMATO MD5
			$data['CorreoElectronicoMd5'] = md5($_POST['email']);
			// DECLARAMOS EL MODO DE REGISTRO CON FACEBOOK
			$data['RModo'] = 2;
			// $carpeta = 'images/Usuarios/';
			// if (!file_exists($carpeta)) {
			// 		mkdir($carpeta, 0777, true);
			// }
			// if (!empty($_FILES['regFoto']['name'])) {
			// 	move_uploaded_file($_FILES['regFoto']['tmp_name'],"images/Usuarios/$usuario-Foto-".($_FILES['regFoto']['name']));
			// 	$url_img_Foto = "images/Usuarios/$usuario-Foto-".$_FILES['regFoto']['name'];
			// }
			// FOTO DEL USUARIO
			$data['Foto'] = $_POST['foto'];
			// PONEMOS QUE EL CORREO YA SE ENCUENTRA VALIDADO
			$data['RVerificacion'] = 2;
			// UBICACIÓN DEL USUARIO
			$data['Ubicacion'] = $_POST['ubicacion'];
			// DIRECCIÓN IP DEL USUARIO
			$data['DireccionIP'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
			// VALIDAMOS SI EL CORREO O USUARIO YA EXISTEN EN LA DB
			$tabla = "usuario";
			$campo = "CorreoElectronico";
			$valor = $_POST['email'];
			$usuario = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
			// VALIDAMOS QUE EL USUARIO TENGA INFORMACIÓN
			if (isset($usuario)) {
				// USUARIO VIENE CON INFORMACIÓN | VALIDAMOS QUE INFORMACIÓN CONTIENE
				if (json_encode($usuario) == "false") {
					// USUARIO ES FALSO | ENTONCES INSERTAMOS USUARIO
					// INSERTAMOS USUARIO
					$tabla = "Usuario";
					$insert = $this -> ModelOteluma -> Insert($tabla, $data);
				}
				// USUARIO CONTIENE INFORMACIÓN DE UN REGISTRO | NO INSERTAMOS Y ENVIAMOS LA VARIABLE COMO TRUE
				else {
						$insert = "ok";
				}
			}
			// USUARIO NO VIENE CON INFORMACIÓN | INSERTAMOS EL USUARIO | CREAMOS LA SESION
			else {
				// INSERTAMOS USUARIO
				$tabla = "Usuario";
				$insert = $this -> ModelOteluma -> Insert($tabla, $data);
			}
			// VALIDAMOS SI SE INSERTO CORRECTAMENTE AL USUARIO
			if ($insert == "ok") {
				// SI SE INTERTO AL USUARIO | BUSCAMOS AL USUSRIO
				$tabla = "usuario";
				$campo = "CorreoElectronico";
				$valor = $_POST['email'];
				$respuesta = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
				if ($respuesta -> RModo == 2) {
					// REGISTRO DESDE FACEBOOK | INSERTAMOS LA SESIÓN
					// ID DE USUARIO
					$sesion['idS_Usuario'] = $respuesta -> idUsuario;
					// UBICACIÓN DE USUARIO
					$sesion['Ubicacion'] = $_POST['ubicacion'];
					// DIRECCIÓN IP DE USUARIO
					$sesion['DireccionIP'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
					// INSERTAMOS LA SESION
					$tabla = "sesion";
					$bandera = $this -> ModelOteluma -> Insert($tabla, $sesion);
					// ENVIAMOS CORREO DE VERIFICACION DE CUENTA
					// $data['Nombre'] = $respuesta -> Nombre;
					// $data['CorreoElectronico'] = $respuesta -> CorreoElectronico;
					// $this -> otelumasendcorreo -> CuentaActiva($data);
					// VARIABLE PARA VALIDAR LA SESIÓN DEL USUARIO
					$this -> session -> validarSesion = "ok";
					// VARIABLE DE SESIÓN PARA ID DEL USUARIO
					$this -> session -> idSesion = $respuesta -> idUsuario;
					// VARIABLE DE SESIÓN PARA EL NOMBRE DEL USUARIO
					$this -> session -> nameSesion = $respuesta -> Nombre;
					// VARIABLE DE SESIÓN PARA LA FOTO DEL USUARIO
					$this -> session -> fotoSesion = $respuesta -> Foto;
					// VARIABLE DE SESIÓN PARA EL CORREO DEL USUARIO
					$this -> session -> emailSesion = $respuesta -> CorreoElectronico;
					// VARIABLE DE SESIÓN PARA LA CONTRASEÑA DEL USUARIO
					$this -> session -> passSesion = $respuesta -> Password;
					// VARIABLE DE SESIÓN PARA EL MODO DE REGISTRO DEL USUARIO
					$this -> session -> modoSesion = $respuesta -> RModo;
					echo "sesionIniciada";
				}else {
					echo json_encode($usuario);
				}
			}
			// NO SE INTERTO AL USUARIO | ENVIAMOS ALERTA DE ERROR
			else {
				echo "errorDeIniciarSesion";
			}
		}else {
			redirect(base_url());
			exit();

		}
	}
	// PERFIL DEL USUARIO
	public function Perfil(){
		// VALIDAMOS LA SESION
		if (isset($_SESSION['validarSesion'])) {
			// LA SESION VIENE INICIADA
			// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
			$tabla = "categorias";
			$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
			// OBTENEMOS LOS VALORES DE LA PLANTILLA
			$tabla = "plantilla";
			$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
			$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
			$this -> load -> view ('Cliente/Perfil//ViewCliePerfil');
			$this -> load -> view ('Cliente/Principal/ViewClieFooter');
		}
		// LA SESION VIENE VACIA | REDIRIGIMOS A LA PÁGINA PRINCIPAL
		else {
			redirect(base_url());
			exit();
		}
	}
	// ACTUALIZAR PERFIL DEL USUARIO
	public function PerfilUpdate(){
		$nombre = $this -> input -> post('editarNombre');
		if (isset($nombre)) {
			$data['idUsuario'] = $this -> input -> post('idUsuario');
			$data['Nombre'] = $nombre;
			$data['Apellido'] = $this -> input -> post('editarApellido');
			$password = $this -> input -> post('editarPass');
			if (isset($password)) {
				$data['Password'] = $password;
				$data['Passwordmd5'] = md5($password);
			}else {
				$data['Password'] = $this -> input -> post('idSesion');
				$data['Passwordmd5'] = md5($this -> input -> post('idSesion'));
			}
			$data['CorreoElectronico'] = $this -> input -> post('editarEmail');
			$data['CorreoElectronicoMd5'] = md5($this -> input -> post('editarEmail'));
			$data['RModo'] = $this -> input -> post('modoUsuario');
			$foto = $this -> input -> post('editarFoto');
			if (isset($foto)) {
				$data['Foto'] = $foto;
			}else {
				$data['Foto'] = $this -> input -> post('fotoUsuario');
			}
			// $data['RVerificacion'] =
			// $data['Ubicacion'] = $this -> input -> post('OTELUMAmensajeOTELUMA1');
			// $data['DireccionIP'] = $_SERVER['REMOTE_ADDR'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_CLIENT_IP'] ?? $_SERVER['HTTP_X_FORWARDED'] ?? $_SERVER['HTTP_FORWARDED_FOR'] ?? $_SERVER['HTTP_FORWARDED'];
			echo "<pre>"; print_r($data); echo "</pre>"; die();
		}else {
			redirect(base_url());
		}
	}
}
