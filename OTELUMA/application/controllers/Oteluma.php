<?php
	if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
	// require_once 'C:/xampp/htdocs/OTELUMA/application/libraries/vendor/autoload.php';
	class Oteluma extends CI_Controller {
		function __construct(){
			parent::__construct();
			$this -> load -> helper('form');
			$this -> load -> library('session');
			$this -> load -> model('ModelOteluma');
			$this -> load -> helper('url');
		}
		public function index1(){
			$this -> load -> view ('Administrador/ViewAdmHeader');
			$this -> load -> view ('Administrador/ViewAdmHome');
			$this -> load -> view ('Administrador/ViewAdmFooter');
		}
		public function _remap($method, $params = array()) {
			if (!method_exists($this, $method)) {
				$this -> index($method, $params);
			}
			else {
				return call_user_func_array(array($this,$method), $params);
			}
		}
		public function index(){
			$tabla = "slide";
			$slide['slide'] = $this -> ModelOteluma -> GetAll($tabla);
			$tabla = "categorias";
			$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
			$tabla = "plantilla";
			$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
			$tabla = "producto";
			$order = "Ventas";
			$modo = "DESC";
			$base = 0;
			$tope = 4;
			$home['VentasProd'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
			$order = "Vistas";
			$modo = "DESC";
			$home['VistasProd'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
			$tabla = "banner";
			$campo = "Ruta";
			$valor = "home";
			$home['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
			// // OBJETO DE LA API DE GOOGLE
			// $clienteGoogle = new Google_Client();
			// // $clienteGoogle -> setAuthConfig(base_url().'models/ClientGoogle.json');
			// $clienteGoogle -> setAuthConfig('C:/xampp/htdocs/OTELUMA/application/models/ClientGoogle.json');
			// $clienteGoogle -> setAccessType('offline');
			// $clienteGoogle -> setScopes(['profile', 'email']);
			// // RUTA PARA LOGEAR A GOOGLE
			// $header['rutaGoogle'] = $clienteGoogle -> createAuthUrl();
			// if (isset($_GET["code"])) {
			// 	$token = $clienteGoogle -> authenticate($_GET["code"]);
			// 	$clienteGoogle -> setAccessToken($token);
			// }
			// // RECIBIMOS DATOS DE GOOGLE
			// if ($clienteGoogle -> getAccessToken()) {
			// 	$item = $clienteGoogle ->verifyIdToken();
			// 	print_r($item);
			// }
			$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
			$this -> load -> view ('Cliente/Slide/ViewClieSlide', $slide);
			$this -> load -> view ('Cliente/Principal/ViewClieHome', $home);
			$this -> load -> view ('Cliente/Principal/ViewClieFooter');
		}
		public function pruebaindex(){
			$tabla = "slide";
			$slide['slide'] = $this -> ModelOteluma -> GetAll($tabla);
			$tabla = "categorias";
			$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
			$tabla = "plantilla";
			$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
			$tabla = "producto";
			$order = "Ventas";
			$modo = "DESC";
			$base = 0;
			$tope = 4;
			$home['VentasProd'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
			$order = "Vistas";
			$modo = "DESC";
			$home['VistasProd'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
			$tabla = "banner";
			$campo = "Ruta";
			$valor = "home";
			$home['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
			// OBJETO DE LA API DE GOOGLE
			$clienteGoogle = new Google_Client();
			// $clienteGoogle -> setAuthConfig(base_url().'models/ClientGoogle.json');
			$clienteGoogle -> setAuthConfig('C:/xampp/htdocs/OTELUMA/application/models/ClientGoogle.json');
			$clienteGoogle -> setAccessType('offline');
			$clienteGoogle -> setScopes(['profile', 'email']);
			// RUTA PARA LOGEAR A GOOGLE
			$header['rutaGoogle'] = $clienteGoogle -> createAuthUrl();
			$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
			$this -> load -> view ('Cliente/Slide/ViewClieSlide', $slide);
			$this -> load -> view ('Cliente/Principal/ViewClieHome', $home);
			$this -> load -> view ('Cliente/Principal/ViewClieFooter');
		}
		public function GetJSONData(){
			$respuesta = "";
			$tabla = "plantilla";
			$data = $this -> ModelOteluma -> GetAll($tabla);
			foreach ($data as $row) {
				$respuesta = $row;
			}
			echo json_encode($respuesta);
		}
		public function GetSubCat($idCat = NULL){
			$tabla = "subcategoria";
			$campo = "Sub_idCat";
			$valor = $idCat;
			$subcategoria = $this -> ModelOteluma -> GetAllWhere($tabla, $campo, $valor);
			$respuesta="";
			$i=1;
			foreach ($subcategoria as $row){
				$respuesta.='
				<option value="'.$row -> idSubCat.'">
					'.$row -> SubCategoria.'
				</option>';
				$i++;
			}
			echo $respuesta;
		}
	}
