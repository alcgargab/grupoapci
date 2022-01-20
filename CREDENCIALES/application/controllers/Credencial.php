<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Credencial extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> library ('CredConverterPDF');
	}
	public function index(){
		$this	->	load	->	view('CredHeader');
		// $this	->	load	->	view('CredAPCI');
		$this	->	load	->	view('CredFooter');
	}
	public function APCI(){
		$this	->	load	->	view('CredHeader');
		$this	->	load	->	view('CredAPCI');
		$this	->	load	->	view('CredFooter');
	}
	public function AEMI(){
		$this	->	load	->	view('CredHeader');
		$this	->	load	->	view('CredAEMI');
		$this	->	load	->	view('CredFooter');
	}
	public function RHEO(){
		$this	->	load	->	view('CredHeader');
		$this	->	load	->	view('CredRHEO');
		$this	->	load	->	view('CredFooter');
	}
	public function SASSPER(){
		$this	->	load	->	view('CredHeader');
		$this	->	load	->	view('CredSASSPER');
		$this	->	load	->	view('CredFooter');
	}
	public function TV(){
		$this	->	load	->	view('CredHeader');
		$this	->	load	->	view('CredTV');
		$this	->	load	->	view('CredFooter');
	}
	public function CreateTVCred(){
		$Empresa = $this -> input -> post('CredEMpresa');
		$Puesto = $this -> input -> post('CredPuesto');
		$data['CredName'] = $this -> input -> post('CredName');
		$data['CredApellidos'] = $this -> input -> post('CredApellidos');
		$data['CredPuesto'] = $this -> input -> post('CredPuesto');
		$data['CredNSS'] = $this -> input -> post('CredNSS');
		$data['CredCurp'] = $this -> input -> post('CredCurp');
		$data['nameEmpresa'] = $this -> input -> post('CredEMpresa');
		$carpeta = 'images/'.$Empresa.'/'.$Puesto;
		if (!file_exists($carpeta)) {
			mkdir($carpeta, 0777, true);
		}
		if (!empty($_FILES['CredFoto']['name'])) {
			move_uploaded_file($_FILES['CredFoto']['tmp_name'],"images/$Empresa/$Puesto/$Empresa-Cred-".($_FILES['CredFoto']['name']));
			$url_img_Foto = "images/$Empresa/$Puesto/$Empresa-Cred-".$_FILES['CredFoto']['name'];
		}
		$data['CredFoto'] = $url_img_Foto;
		$this -> credconverterpdf -> CreatePDFCred($data);
	}
	public function CreateTVCred1(){
		$Empresa = $this -> input -> post('CredEMpresa');
		$Puesto = $this -> input -> post('CredPuesto');
		$data['CredName'] = $this -> input -> post('CredName');
		$data['CredApellidos'] = $this -> input -> post('CredApellidos');
		$data['CredPuesto'] = $this -> input -> post('CredPuesto');
		$data['CredNSS'] = $this -> input -> post('CredNSS');
		$data['CredCurp'] = $this -> input -> post('CredCurp');
		// $this -> apcifdconverterpdf -> CreatePDFOT($data);

		// $data['CredFoto'] = $this -> input -> post('CredFoto');
		$carpeta = 'images/'.$Empresa.'/'.$Puesto;
		if (!file_exists($carpeta)) {
			mkdir($carpeta, 0777, true);
		}
		if ( !empty($_FILES['CredFoto']['name'])) {
			move_uploaded_file($_FILES['CredFoto']['tmp_name'],"images/$Empresa/$Puesto/$Empresa-Cred-".($_FILES['CredFoto']['name']));
			$url_img_Foto = "images/$Empresa/$Puesto/$Empresa-Cred-".$_FILES['CredFoto']['name'];
		}
		$data['CredFoto'] = $url_img_Foto;
		// echo "<pre>"; print_r($data); echo "</pre>"; echo "<pre>"; print_r($Empresa); echo "</pre>"; die();
		$this	->	load	->	view('CredHeader');
		$this	->	load	->	view('CredTVCred' ,$data);
		$this	->	load	->	view('CredFooter');
	}
	public function DownloadTVCred(){
		$Cred_name = $this -> input -> post('Cred_name');
		$Cred_Apellidos = $this -> input -> post('Cred_Apellidos');
		$Cred_Puesto = $this -> input -> post('Cred_Puesto');
		$Cred_NSS = $this -> input -> post('Cred_NSS');
		$Cred_CURP = $this -> input -> post('Cred_CURP');
		$Cred_img_Foto = $this -> input -> post('Cred_img_Foto');
		// print_r($Cred_name);
		// die();
		// header("Content-type: image/png"); //TIPO DE ARCHIVO QUE OCUPAREMOS
		// $save_location = "images/Credenciales/Cred_".$Cred_name.".png"; //RUTA DONDE SE GUARDARA LA IMAGEN JUNTO CON EL NOMBRE
		// $x = 240; //ANCHO DE LA IMAGEN
		// $y = 380; //LARGO DE LA IMAGEN
		// $image = imagecreate($x,$y); //IMAGEN
		// $white = imagecolorallocate($image,255,255,255); //COLOR DEL MARCO DE LA IMAGEN
		// imagepng($image, $save_location); //CREAR IMAGEN
		// echo "<pre>";
		// var_dump(gd_info());
		// echo "</pre>";

		header("Content-type: image/png");
		$name = $this -> input -> post('Cred_name');
		$output = "images/Credenciales/Cred1_".$name.".png";
		$apellidos = $this ->input -> post('Cred_Apellidos');
		$Cred_name = $name." ".$apellidos;
		$im     = imagecreatefrompng("images/PantillaCred.png");
		$empresa     = imagecreatefrompng("images/Logos/TV.png");
		$logo     = imagecreatefrompng("images/Logos/Logo_APCI.png");
		$black = imagecolorallocate($im, 0, 0, 0);
		$px     = (imagesx($im) - 7.5 * strlen($Cred_name)) / 2;
		$px1     = (imagesx($im) - 7.5 * strlen($Cred_Puesto)) / 2;
		imagestring($im, 3, $px, 240, $Cred_name, $black);
		imagestring($im, 3, $px1, 260, $Cred_Puesto, $black);
		imagepng($im);
		imagedestroy($im);



		// IMAGEN CON TEXTO
		// $source = "images/PantillaCred/PantillaCred_1.jpg";
		// $image = imagecreatefromjpeg($source);
		// $output = "images/PantillaCred.png";
		// $x = 240;
		// $y = 380;
		// $image = imagecreate($x,$y);
		// $white = imagecolorallocate($image, 255, 255, 255);
		// $black = imagecolorallocate($image, 0, 0, 0);
		// // $fuente = dirname(__FILE__) . '/AarvarkCafe.ttf';
		// $fuente = dirname(__FILE__).'/AarvarkCafe.ttf';
		// // $fuente = '.00/AarvarkCafe'; //FUENTE PARA LA LETRA
		// $txtimg = $this -> input -> post('Cred_name');
		// // IDEA: PRIMER PARAMETRO: IMAGEN
		// // IDEA: SEGUNDO PARAMETRO: TAMAÑO DE LETRA
		// // IDEA: TERCER PARAMETRO: ANGULO EN GRADOS
		// // IDEA: CUARTO PARAMETRO: COORDENADA EN X
		// // IDEA: QUINTO PARAMETRO: COORDENADA EN Y
		// // IDEA: SEXTO PARAMETRO: COLOR DE LA LETRA
		// // IDEA: SEPTIMO PARAMETRO: FUENTE DE LA LETRA
		// // IDEA: OCTAVO PARAMETRO: TEXTO QUE APARECERA
		// $txt1 = imagettftext($image, 120, 0, 20, 40, $black, $fuente, $txtimg); //AGREGAR TEXTO A LA IMAGEN
		// imagepng($image,$output);



		// Establecer el tipo de contenido
		// header('Content-Type: image/jpeg');
		// $source = "images/PantillaCred/PantillaCred_1.jpg";
		// $image = imagecreatefromjpeg($source);
		// $output = "images/PantillaCred.png";
		// $x = 240;
		// $y = 380;
		// $image = imagecreate($x,$y);
		// $white = imagecolorallocate($image, 255, 255, 255);
		// $black = imagecolorallocate($image, 0, 0, 0);
		// putenv('GDFONTPATH=' . realpath('.'));
		// $fuente = '/Fonts/AarvarkCafe.ttf';
		// // $txtimg = $this -> input -> post('Cred_name');
		// $txtimg = 'hola';
		// // // IDEA: PRIMER PARAMETRO: IMAGEN
		// // // IDEA: SEGUNDO PARAMETRO: TAMAÑO DE LETRA
		// // // IDEA: TERCER PARAMETRO: ANGULO EN GRADOS
		// // // IDEA: CUARTO PARAMETRO: COORDENADA EN X
		// // // IDEA: QUINTO PARAMETRO: COORDENADA EN Y
		// // // IDEA: SEXTO PARAMETRO: COLOR DE LA LETRA
		// // // IDEA: SEPTIMO PARAMETRO: FUENTE DE LA LETRA
		// // // IDEA: OCTAVO PARAMETRO: TEXTO QUE APARECERA
		// imagettftext($image, 120, 0, 20, 40, $black, $fuente, $txtimg); //AGREGAR TEXTO A LA IMAGEN
		// imagejpeg($image,$output);


		// TEXTO
		// header("Content-type: image/png");
		// $output = "images/PantillaCred.png";
		// $x = 240;
		// $y = 380;
		// $image = imagecreate($x,$y);
		// $white = imagecolorallocate($image, 255, 255, 255);
		// $black = imagecolorallocate($image, 0, 0, 0);
		// $fuente = './Fonts/raleway.bold.ttf'; //FUENTE PARA LA LETRA
		// $txtimg = $this -> input -> post('Cred_name');
		// // IDEA: PRIMER PARAMETRO: IMAGEN
		// // IDEA: SEGUNDO PARAMETRO: TAMAÑO DE LETRA
		// // IDEA: TERCER PARAMETRO: ANGULO EN GRADOS
		// // IDEA: CUARTO PARAMETRO: COORDENADA EN X
		// // IDEA: QUINTO PARAMETRO: COORDENADA EN Y
		// // IDEA: SEXTO PARAMETRO: COLOR DE LA LETRA
		// // IDEA: SEPTIMO PARAMETRO: FUENTE DE LA LETRA
		// // IDEA: OCTAVO PARAMETRO: TEXTO QUE APARECERA
		// $txt1 = imagettftext($image,120,0,20,40,$black,$fuente,$txtimg); //AGREGAR TEXTO A LA IMAGEN
		// imagepng($image,$output);

		// $CredimagenFondo = 'images/PantillaCred/PantillaCred_1.jpg';
		// $CredimagenFoto = $Cred_img_Foto;
		// list($width,$height) = getimagesize($CredimagenFondo);
		// $CredimagenFondoImg = imagecreatefromstring(file_get_contents($CredimagenFondo));
		// $CredimagenFotoImg = imagecreatefromstring(file_get_contents($CredimagenFoto));
		// imagecopymerge($CredimagenFondoImg, $CredimagenFotoImg, 10, 10, 0, 0, $width, $height, 100);
		// header("Content-type: image/png");
		// imagepng($CredimagenFotoImg);
		// imagepng($CredimagenFotoImg, 'foto123.png');
		// imagepng($CredimagenFotoImg, '"'.$Cred_img_Foto.'1.png"');
		// imagedestroy($CredimagenFondo);
	}
}
