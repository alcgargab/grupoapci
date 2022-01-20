<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CallCenterAdm extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> library ('TeleVialesSendCorreo', TRUE);
		$this -> load -> library ('TeleVialesSendCorreoRobot', TRUE);
		$this -> load -> model('ModelTelViaServicio');
	}
	public function _remap($method, $params = array()) {
		if (!method_exists($this, $method)) {
			$this -> index($method, $params);
		} else {
			return call_user_func_array(array($this,$method), $params);
		}
	}
	public function index(){
		redirect(base_url());
	}
	public function AdmDB($usuario = NULL, $pass = NULL){
		$data['User'] = $_GET['usuario'];
    $data['Password'] = $_GET['pass'];
		if ($data != NULL) {
			$tabla = "user";
			$campo1 = "Usuario";
			$valor1 = $data['User'];
			$campo2 = "Password";
			$valor2 = $data['Password'];
			$registro = $this -> ModelTelViaServicio -> GetCampos($tabla, $campo1, $valor1, $campo2, $valor2);
			if ($registro) {
				$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
				$this -> load -> view('AdminDBCallCenter/TeleViaViewAdminDB');
				$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
			}else {
				redirect(base_url());
			}
		}else {
			redirect(base_url());
		}
	}
	public function Tabla($ruta = NULL, $pag = NULL){
		// VALIDAMOS QUE LA PAGINA VIENE VACIA
		if ($pag == NULL) {
			// SI VIENE VACIA, VALIDAMOS QUE LA RUTA VIENE VACIA
			if ($ruta !=NULL) {
				// SI LA RUTA NO VIENE VACIA VALIDAMOS QUE VALOR TIENE
				switch ($ruta) {
					case 'usuario':
						$base = 0;
						$tope = 5;
						$tabla = "usuariocc";
						$home['usuariocc'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "usuariocc";
						$home['totalUser'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = 1;
						$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDBCallCenter/Tablas/TeleViaViewAdminDBTablaU', $home);
						$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
						break;
				}
				// SI LA RUTA VIENE VACIA DIRIGIMOS A LA PAGINA PRINCIPAL
			}else {
				redirect(base_url());
			}
			// SI LA PAGINA VIENE NO VACIA VALIDAMOS QUE VALOR TIENE Y ESE SERA LA BASE
		}else {
			// SI LA RUTA NO VIENE VACIA VALIDAMOS QUE VALOR TIENE
			if ($ruta !=NULL) {
				switch ($ruta) {
					case 'usuario':
						$base = ($pag -1)*5;
						$tope = 5;
						$tabla = "usuariocc";
						$home['usuariocc'] = $this -> ModelTelViaServicio -> GetLimit($tabla , $base, $tope);
						$tabla = "usuariocc";
						$home['totalUser'] = $this -> ModelTelViaServicio -> GetAll($tabla);
						$home['pagina'] = $pag;
						$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDBCallCenter/Tablas/TeleViaViewAdminDBTablaU', $home);
						$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
						break;
				}
				// SI LA RUTA VIENE VACIA DIRIGIMOS A LA PAGINA PRINCIPAL
			}else {
				redirect(base_url());
			}
		}
	}
	public function Ver($ruta = NULL, $id = NULL){
		if ($ruta != NULL) {
			switch ($ruta) {
				case 'usuario':
					$tabla = 'usuariocc';
					$campo = "idUsuario";
					$valor = $id;
					$home['usuariocc'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDBCallCenter/Tablas/Ver/TeleViaViewAdminDBTablaUVer', $home);
					$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
					break;
			}
		}else {
			redirect(base_url());
		}
	}
	public function Editar($ruta = NULL, $id = NULL){
		if ($ruta != NULL) {
			switch ($ruta) {
				case 'usuario':
					$tabla = 'usuariocc';
					$campo = "idUsuario";
					$valor = $id;
					$home['usuariocc'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
					$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
					$this -> load -> view('AdminDBCallCenter/Tablas/Editar/TeleViaViewAdminDBTablaUEditar', $home);
					$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
					break;
			}
		}else {
			redirect(base_url());
		}
	}
	public function EditarRegistro($ruta = NULL){
		if ($ruta != NULL) {
			switch ($ruta) {
				case 'usuario':
					$tabla = 'usuariocc';
					$campo = "idUsuario";
					$valor = $this -> input -> post('idUsuario');
					$registro['idUsuario'] = $this -> input -> post('idUsuario');
					$NumE = $this -> input -> post('NumEmpleado');
					if (!empty($_FILES['NewFotoUser']['name'])) {
						move_uploaded_file($_FILES['NewFotoUser']['tmp_name'],"images/Call Center/Usuario/$NumE-Foto-".($_FILES['NewFotoUser']['name']));
						$url_img_Foto = "images/Call Center/Usuario/$NumE-Foto-".$_FILES['NewFotoUser']['name'];
					}else {
						$url_img_Foto = $this -> input -> post('FotoUser');
					}
					$registro['FotoUser'] = $url_img_Foto;
					$registro['ApellidoP'] = $this -> input -> post('ApellidoP');
					$registro['ApellidoM'] = $this -> input -> post('ApellidoM');
					$registro['Nombre'] = $this -> input -> post('Nombre');
					$registro['NumeroCasa'] = $this -> input -> post('NumeroCasa');
					$registro['NumeroCelular'] = $this -> input -> post('NumeroCelular');
					$registro['FNacimiento'] = $this -> input -> post('FNacimiento');
					$registro['NumActa'] = $this -> input -> post('NumActa');
					$registro['CURP'] = $this -> input -> post('CURP');
					$registro['RFC'] = $this -> input -> post('RFC');
					$registro['INE'] = $this -> input -> post('INE');
					$registro['IMSS'] = $this -> input -> post('IMSS');
					$registro['FIngreso'] = $this -> input -> post('FIngreso');
					$registro['FBaja'] = $this -> input -> post('FBaja');
					$registro['MotivoBaja'] = $this -> input -> post('MotivoBaja');
					$registro['NumEmpleado'] = $this -> input -> post('NumEmpleado');
					$registro['FRegistro'] = $this -> input -> post('FRegistro');
					// echo "<pre>"; print_r($registro); echo "</pre>"; die();
					$bandera = $this -> ModelTelViaServicio -> Update($tabla, $campo, $valor, $registro);
					if ($bandera == "true") {
						$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDBCallCenter/Popup/TeleViaViewAdminDBEditTrue');
						$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
					}else {
						$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDBCallCenter/Popup/TeleViaViewAdminDBDPopupFalse');
						$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
					}
					break;
			}
		}else {
			redirect(base_url());
		}
	}
	public function Eliminar($ruta = NULL, $id = NULL){
		if ($ruta != NULL) {
			switch ($ruta) {
				case 'usuario':
					$tabla = "usuariocc";
					$campo = "idUsuario";
					$valor = $id;
					$bandera = $this -> ModelTelViaServicio -> Delete($tabla, $campo, $valor);
					if ($bandera == "true") {
						$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDBCallCenter/Popup/TeleViaViewAdminDBDeleteTrue');
						$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
					}else {
						$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDBCallCenter/Popup/TeleViaViewAdminDBDPopupFalse');
						$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
					}
					break;
			}
		}else {
			redirect(base_url());
		}
	}
	public function Insert($ruta = NULL){
		if ($ruta != NULL) {
			switch ($ruta) {
				case 'usuario':
					$tabla = "usuariocc";
					$NumE = $this -> input -> post('NumEmpleado');
					$carpeta = 'images/Call Center/Usuario/';
					if (!file_exists($carpeta)) {
						mkdir($carpeta, 0777, true);
					}
					if (!empty($_FILES['FotoUser']['name'])) {
						move_uploaded_file($_FILES['FotoUser']['tmp_name'],"images/Call Center/Usuario/$NumE-Foto-".($_FILES['FotoUser']['name']));
						$url_img_Foto = "images/Call Center/Usuario/$NumE-Foto-".$_FILES['FotoUser']['name'];
					}else {
						$url_img_Foto = "images/Call Center/Usuario/TeleViales_Usuario.png";
					}
					$insert['FotoUser'] = $url_img_Foto;
					$insert['ApellidoP'] = $this -> input -> post('ApellidoP');
					$insert['ApellidoM'] = $this -> input -> post('ApellidoM');
					$insert['Nombre'] = $this -> input -> post('Nombre');
					$insert['NumeroCasa'] = $this -> input -> post('NumeroCasa');
					$insert['NumeroCelular'] = $this -> input -> post('NumeroCelular');
					$insert['FNacimiento'] = $this -> input -> post('FNacimiento');
					$insert['NumActa'] = $this -> input -> post('NumActa');
					$insert['CURP'] = $this -> input -> post('CURP');
					$insert['RFC'] = $this -> input -> post('RFC');
					$insert['INE'] = $this -> input -> post('INE');
					$insert['IMSS'] = $this -> input -> post('IMSS');
					$insert['FIngreso'] = $this -> input -> post('FIngreso');
					$insert['FBaja'] = $this -> input -> post('FBaja');
					$insert['MotivoBaja'] = $this -> input -> post('MotivoBaja');
					$insert['NumEmpleado'] = $this -> input -> post('NumEmpleado');
					$bandera = $this -> ModelTelViaServicio -> Insert($tabla, $insert);
					if ($bandera == "true") {
						$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDBCallCenter/Popup/TeleViaViewAdminDBInsertTrue');
						$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
					}else {
						$this -> load -> view('AdminDBCallCenter/TeleViaViewHeaderAdminDB');
						$this -> load -> view('AdminDBCallCenter/Popup/TeleViaViewAdminDBDPopupFalse');
						$this -> load -> view ('AdminDBCallCenter/TeleViaViewFooterAdminDB');
					}
					break;
			}
		}else {
			redirect(base_url());
		}
	}
	public function GenerarPass(){
		// TRUE O FALSE EN LA OPCIÓN QUE QUIERAS AÑADIR
		$opc_letras = TRUE; //  FALSE para quitar las letras
		$opc_numeros = TRUE; // FALSE para quitar los números
		$opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
		$opc_especiales = TRUE; // FALSE para quitar los caracteres especiales
		$longitud = 15;
		$password = "";
		$letras ="abcdefghijklmnopqrstuvwxyz";
		$numeros = "1234567890";
		$letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$especiales ="|@#~$%()=^*+[]{}-_";
		$listado = "";
		if ($opc_letras == TRUE) {
		    $listado .= $letras; }
		if ($opc_numeros == TRUE) {
		    $listado .= $numeros; }
		if($opc_letrasMayus == TRUE) {
		    $listado .= $letrasMayus; }
		if($opc_especiales == TRUE) {
		    $listado .= $especiales; }
		str_shuffle($listado);
		for( $i=1; $i<=$longitud; $i++) {
		$password[$i] = $listado[rand(0,strlen($listado))];
		str_shuffle($listado);
		}
		// VERIFICAMOS QUE NO EXISTA LA CONTRASEÑA
		$tabla = "userseguimiento";
		$campo = "Password";
		$valor = $password;
		$data['password'] = $this -> ModelTelViaServicio -> GetCampo($tabla, $campo, $valor);
		// print_r($data); print_r($password); die();
		if ($data) {
			echo $password;
		}else {
			$mensaje = "la contraseña existe";
			echo $mensaje;
		}
	}
}
