<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Producto extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper ('form');
		$this -> load -> library ('session');
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
	public function index($ruta = NULL){
		// VALIDAMOS QUE LA RUTA VENGA CON INFORMACIÓN
		if (isset($ruta)) {
			// LA RUTA SI TRAE INFORMACIÓN
			$tabla = "producto";
			$campo = "Ruta";
			$valor = $ruta;
			$producto['producto'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
			// VALIDAMOS SI EL PRODUCTO SE ENCUENTRA EN LA DB
			if ($producto['producto'] != NULL) {
				// EL PRODUCTO SI SE ENCUENTRA EN NUESTRA DB
				// OBTENER LA SUBCATEGORIA PARA LOS PRODUCTOS RELACIONADOS
				$tabla = "subcategoria";
				$campo = "idSubCat";
				$valor = $producto['producto'] -> P_idSubCat;
				$producto['subCat'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
				// OBTENEMOS TODOS LOS REGISTROS DE LA SUBCATEGORIA OBTENIDA
				$tabla = "producto";
				$campo = "P_idSubCat";
				$valor = $producto['subCat'] -> idSubCat;
				$order = "";
				$modo = "Rand()";
				$base = 0;
				$tope = 4;
				$producto['subCatProductos'] = $this -> ModelOteluma -> GetAllWhereOrderLimit($tabla, $campo, $valor, $order, $modo, $base, $tope);
				// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
				$producto['subCatP'] = $producto['producto'] -> Titulo;
				// $producto['subcat'] = $subcat;
				// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
				$tabla = "categorias";
				$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
				// OBTENEMOS LOS VALORES DE LA PLANTILLA
				$tabla = "plantilla";
				$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
				// OBTENEMOS LOS VALORES DEL BANNER
				$tabla = "banner";
				$campo = "Ruta";
				$valor = "Producto";
				$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
				$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
				$this -> load -> view ('Cliente/Producto/ViewClieDetalleProducto', $producto);
				$this -> load -> view ('Cliente/Principal/ViewClieFooter');
			}
			// EL PRODUCTO NO SE ENCUENTRA | DIRIGIMOS A LA PÁGINA DE ERROR404
			else {
				$tabla = "categorias";
				$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
				$tabla = "plantilla";
				$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
				$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
				$this -> load -> view ('Cliente/Error/ViewError404');
				$this -> load -> view ('Cliente/Principal/ViewClieFooter');
			}
		}
		// LA RUTA NO VIENE CON INFORMACIÓN | REDIRIGIMOS A LA PÁGINA PRINCIPAL
		else {
			redirect(base_url());
			exit();
		}
	}
	public function UpdateVistas($valor = NULL, $campo = NULL, $ruta = NULL){
		// VALIDAMOS SI VIENE EL NÚMERO DE LAS VISTAS
		if (isset($valor)) {
			// SI VIENE EL VALOR | ACTUALIZAMOS LA VISTA
			$tabla = "producto";
			$camposet = "Ruta";
			$respuesta = $this -> ModelOteluma -> Update($tabla, $campo, $valor, $camposet, $ruta);
			echo $respuesta;
		}
		// EL VALOR VIENE VACIO | REDIRIGIMOS A LA PÁGINA PRINCIPAL
		else {
			redirect(base_url());
			exit();
		}
	}
	public function UpdateVentas(){

	}
}
