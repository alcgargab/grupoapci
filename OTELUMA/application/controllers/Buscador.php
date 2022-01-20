<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Buscador extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this -> load -> helper('form');
		$this -> load -> library('session');
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
	public function index($ruta = NULL, $url = NULL){
		// VALIDAMOS QUE LA RUTA (PRODUCTO) VENGA CON INFORMAIÓN
		if(isset($ruta)){
			// BUSCAMOS QUE EXISTAN REGISTROS
			// ONTENEMOS LOS PRIMEROS 8 REGISTROS
			$tabla = "producto";
			$campo1 = "Ruta";
			$campo2 = "Titulo";
			$campo3 = "Titular";
			$campo4 = "Descripcion";
			$valor = $ruta;
			$ordenar = "idProd";
			$modo = "DESC";
			$base = 0;
			$tope = 8;
			$producto = $this -> ModelOteluma -> GetAllLikeLimit($tabla, $campo1, $campo2, $campo3, $campo4, $valor, $ordenar, $modo, $base, $tope);
			// print_r($producto); die();
			if ($producto != NULL) {
				// LA RUTA TIENE INFORMAIÓN | VALIDAMOS QUE LA URL VENGA CON INFORMAIÓN
				if (isset($url[0])) {
					// LA URL TIENE INFORMAIÓN | VALIDAMOS QUE LA INFORMAIÓN SEA LA MÁS RECIENTE
					if ($url[0] == "mas-reciente") {
						// VALIDAMOS QUE EL SEGUNDO PARAMETRO TENGA INFORMAIÓN
						if (isset($url[1])) {
							// VALIDAMOS QUE SEA UN NÚMERO
							// BUSCAMOS LOS REGISTROS DE ACUERDO AL NÚMERO DE PÁGINA
							if (is_numeric($url[1])) {
								// ONTENEMOS LOS PRIMEROS 8 REGISTROS
								$tabla = "producto";
								$campo1 = "Ruta";
								$campo2 = "Titulo";
								$campo3 = "Titular";
								$campo4 = "Descripcion";
								$valor = $ruta;
								$ordenar = "idProd";
								$modo = "DESC";
								$base = ($url[1] -1)*8;
								$tope = 8;
								$producto['producto'] = $this -> ModelOteluma -> GetAllLikeLimit($tabla, $campo1, $campo2, $campo3, $campo4, $valor, $ordenar, $modo, $base, $tope);
								// OBTENER TODOS LOS PRODUCTOS
								$tabla = "producto";
								$campo1 = "Ruta";
								$campo2 = "Titulo";
								$campo3 = "Titular";
								$campo4 = "Descripcion";
								$valor = $ruta;
								$producto['Tproducto'] = $this -> ModelOteluma -> GetAllLike($tabla, $campo1, $campo2, $campo3, $campo4, $valor);
								// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
								$producto['subCatP'] = $ruta;
								// MANDAMOS LA BASE PARA LA PÁGINACIÓN
								$producto['base'] = $url[1];
								// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
								$tabla = "categorias";
								$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
								// OBTENEMOS LOS VALORES DE LA PLANTILLA
								$tabla = "plantilla";
								$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
								// MANDAMOS EL ORDEN PARA LAS MIGAS DE PAN
								$producto['orden'] = $url[0];
								// OBTENEMOS LOS VALORES DEL BANNER
								$tabla = "banner";
								$campo = "Ruta";
								$valor = "Productos";
								$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
								$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
								$this -> load -> view ('Cliente/Producto/ViewClieBuscProducto', $producto);
								$this -> load -> view ('Cliente/Principal/ViewClieFooter');
							}
							// SI LA INFORMACIÓN NO ES NÚMERO | LO REDIRIGIMOS AL ERROR 404
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
						// BUSCAMOS LOS PRIMEROS 8 REGISTROS
						else {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$campo1 = "Ruta";
							$campo2 = "Titulo";
							$campo3 = "Titular";
							$campo4 = "Descripcion";
							$valor = $ruta;
							$ordenar = "idProd";
							$modo = "DESC";
							$base = 0;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllLikeLimit($tabla, $campo1, $campo2, $campo3, $campo4, $valor, $ordenar, $modo, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$campo1 = "Ruta";
							$campo2 = "Titulo";
							$campo3 = "Titular";
							$campo4 = "Descripcion";
							$valor = $ruta;
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllLike($tabla, $campo1, $campo2, $campo3, $campo4, $valor);
							// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
							$producto['subCatP'] = $ruta;
							// MANDAMOS LA BASE PARA LA PÁGINACIÓN
							$producto['base'] = 1;
							// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
							$tabla = "categorias";
							$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
							// OBTENEMOS LOS VALORES DE LA PLANTILLA
							$tabla = "plantilla";
							$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
							// MANDAMOS EL ORDEN PARA LAS MIGAS DE PAN
							$producto['orden'] = $url[0];
							// OBTENEMOS LOS VALORES DEL BANNER
							$tabla = "banner";
							$campo = "Ruta";
							$valor = "Productos";
							$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/Producto/ViewClieBuscProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
					}
					// VALIDAMOS QUE LA INFORMAIÓN SEA LA MÁS ANTIGUA
					elseif ($url[0] == "mas-antiguo") {
						// VALIDAMOS QUE EL SEGUNDO PARAMETRO TENGA INFORMAIÓN
						if (isset($url[1])) {
							// VALIDAMOS QUE SEA UN ENTERO
							if (is_numeric($url[1])) {
								// ONTENEMOS LOS PRIMEROS 8 REGISTROS
								$tabla = "producto";
								$campo1 = "Ruta";
								$campo2 = "Titulo";
								$campo3 = "Titular";
								$campo4 = "Descripcion";
								$valor = $ruta;
								$ordenar = "idProd";
								$modo = "ASC";
								$base = ($url[1] -1)*8;
								$tope = 8;
								$producto['producto'] = $this -> ModelOteluma -> GetAllLikeLimit($tabla, $campo1, $campo2, $campo3, $campo4, $valor, $ordenar, $modo, $base, $tope);
								// OBTENER TODOS LOS PRODUCTOS
								$tabla = "producto";
								$campo1 = "Ruta";
								$campo2 = "Titulo";
								$campo3 = "Titular";
								$campo4 = "Descripcion";
								$valor = $ruta;
								$producto['Tproducto'] = $this -> ModelOteluma -> GetAllLike($tabla, $campo1, $campo2, $campo3, $campo4, $valor);
								// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
								$producto['subCatP'] = $ruta;
								// MANDAMOS LA BASE PARA LA PÁGINACIÓN
								$producto['base'] = $url[1];
								// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
								$tabla = "categorias";
								$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
								// OBTENEMOS LOS VALORES DE LA PLANTILLA
								$tabla = "plantilla";
								$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
								// MANDAMOS EL ORDEN PARA LAS MIGAS DE PAN
								$producto['orden'] = $url[0];
								// OBTENEMOS LOS VALORES DEL BANNER
								$tabla = "banner";
								$campo = "Ruta";
								$valor = "Productos";
								$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
								$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
								$this -> load -> view ('Cliente/Producto/ViewClieBuscProducto', $producto);
								$this -> load -> view ('Cliente/Principal/ViewClieFooter');
							}
							// SI LA INFORMACIÓN NO ES NÚMERO | LO REDIRIGIMOS AL ERROR 404
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
						// BUSCAMOS LOS PRIMEROS 8 REGISTROS
						else {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$campo1 = "Ruta";
							$campo2 = "Titulo";
							$campo3 = "Titular";
							$campo4 = "Descripcion";
							$valor = $ruta;
							$ordenar = "idProd";
							$modo = "ASC";
							$base = 0;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllLikeLimit($tabla, $campo1, $campo2, $campo3, $campo4, $valor, $ordenar, $modo, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$campo1 = "Ruta";
							$campo2 = "Titulo";
							$campo3 = "Titular";
							$campo4 = "Descripcion";
							$valor = $ruta;
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllLike($tabla, $campo1, $campo2, $campo3, $campo4, $valor);
							// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
							$producto['subCatP'] = $ruta;
							// MANDAMOS LA BASE PARA LA PÁGINACIÓN
							$producto['base'] = 1;
							// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
							$tabla = "categorias";
							$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
							// OBTENEMOS LOS VALORES DE LA PLANTILLA
							$tabla = "plantilla";
							$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
							// MANDAMOS EL ORDEN PARA LAS MIGAS DE PAN
							$producto['orden'] = $url[0];
							// OBTENEMOS LOS VALORES DEL BANNER
							$tabla = "banner";
							$campo = "Ruta";
							$valor = "Productos";
							$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/Producto/ViewClieBuscProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
					}
					// VALIDAMOS QUE LA INFORMAIÓN SEA UNA PÁGINA
					else {
						// VALIDAMOS QUE SEA UN ENTERO
						if (is_numeric($url[0])) {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$campo1 = "Ruta";
							$campo2 = "Titulo";
							$campo3 = "Titular";
							$campo4 = "Descripcion";
							$valor = $ruta;
							$ordenar = "idProd";
							$modo = "DESC";
							$base = ($url[0] -1)*8;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllLikeLimit($tabla, $campo1, $campo2, $campo3, $campo4, $valor, $ordenar, $modo, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$campo1 = "Ruta";
							$campo2 = "Titulo";
							$campo3 = "Titular";
							$campo4 = "Descripcion";
							$valor = $ruta;
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllLike($tabla, $campo1, $campo2, $campo3, $campo4, $valor);
							// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
							$producto['subCatP'] = $ruta;
							// MANDAMOS LA BASE PARA LA PÁGINACIÓN
							$producto['base'] = $url[0];
							// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
							$tabla = "categorias";
							$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
							// OBTENEMOS LOS VALORES DE LA PLANTILLA
							$tabla = "plantilla";
							$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
							// MANDAMOS EL ORDEN PARA LAS MIGAS DE PAN
							$producto['orden'] = NULL;
							// OBTENEMOS LOS VALORES DEL BANNER
							$tabla = "banner";
							$campo = "Ruta";
							$valor = "Productos";
							$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/Producto/ViewClieBuscProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
						// SI LA INFORMACIÓN NO ES NÚMERO | LO REDIRIGIMOS AL ERROR 404
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
				}
				// NO EXISTE INFORMAIÓN BUSCAMOS LOS PRIMEROS 8
				else {
					// ONTENEMOS LOS PRIMEROS 8 REGISTROS
					$tabla = "producto";
					$campo1 = "Ruta";
					$campo2 = "Titulo";
					$campo3 = "Titular";
					$campo4 = "Descripcion";
					$valor = $ruta;
					$ordenar = "idProd";
					$modo = "DESC";
					$base = 0;
					$tope = 8;
					$producto['producto'] = $this -> ModelOteluma -> GetAllLikeLimit($tabla, $campo1, $campo2, $campo3, $campo4, $valor, $ordenar, $modo, $base, $tope);
					// OBTENER TODOS LOS PRODUCTOS
					$tabla = "producto";
					$campo1 = "Ruta";
					$campo2 = "Titulo";
					$campo3 = "Titular";
					$campo4 = "Descripcion";
					$valor = $ruta;
					$producto['Tproducto'] = $this -> ModelOteluma -> GetAllLike($tabla, $campo1, $campo2, $campo3, $campo4, $valor);
					// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
					$producto['subCatP'] = $ruta;
					// MANDAMOS LA BASE PARA LA PÁGINACIÓN
					$producto['base'] = 1;
					// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
					$tabla = "categorias";
					$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
					// OBTENEMOS LOS VALORES DE LA PLANTILLA
					$tabla = "plantilla";
					$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
					// MANDAMOS EL ORDEN PARA LAS MIGAS DE PAN
					$producto['orden'] = NULL;
					// OBTENEMOS LOS VALORES DEL BANNER
					$tabla = "banner";
					$campo = "Ruta";
					$valor = "Productos";
					$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/Producto/ViewClieBuscProducto', $producto);
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}
			}
			// NO EXISTEN PRODUCTOS | REDIRIGIMOS AL ERROR 404
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
		// NO TIENE INFORMACIÓN | REDIRIGIMOS A LA PÁGINA PRINCIPAL
		else {
			redirect(base_url());
			exit();
		}
	}
}
