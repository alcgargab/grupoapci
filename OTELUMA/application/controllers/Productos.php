<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productos extends CI_Controller {
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
	public function index1($ruta = NULL, $url = NULL ){
		// PRIMERO EVALUAMOS LA PAGINA
		// LA PAGINA VIENE VACIA
		if ($url == NULL) {
			// EVALUAR SI EN LA RUTA VIENE INFORMACIÓN
			if ($ruta == NULL) {
				// SI VIENE VACIO BUSCAMOS PRODUCTOS DENTRO DE UNA CATEGORIA
				$url = NULL;
				$subcat = $this -> input -> post('subcategoria');
				// SI ENCONTRAMOS PRODUCTOS
				if (isset($subcat)) {
					// ONTENEMOS LOS PRIMEROS 8 REGISTROS
					$tabla = "producto";
					$campo = "P_idSubCat";
					$valor = $subcat;
					$base = 0;
					$tope = 8;
					$producto['producto'] = $this -> ModelOteluma -> GetAllLimit($tabla, $campo, $valor, $base, $tope);
					// OBTENER TODOS LOS PRODUCTOS
					$tabla = "producto";
					$campo = "P_idSubCat";
					$valor = $subcat;
					$producto['Tproducto'] = $this -> ModelOteluma -> GetAllWhere($tabla, $campo, $valor);
					$tabla = "subcategoria";
					$campo = "idSubCat";
					$valor = $subcat;
					$producto['subCatP'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
					$producto['base'] = 0;
					$tabla = "categorias";
					$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
					$tabla = "plantilla";
					$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
					$producto['orden'] = NULL;
					// OBTENEMOS LOS VALORES DEL BANNER
					$tabla = "banner";
					$campo = "Ruta";
					$valor = "Productos";
					$home['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					// NO ENCONTRAMOS PRODUCTOS O EL USUARIO METIO LA URL, LO DIRIGIMOS A LA PAGINA PRINCIPAL
				}else {
					redirect(base_url());
				}
				// SI VIENE CON INFORMACIÓN BUSCAMOS INFORMACIÓN
			}else {
				// VALIDAMOS SI LA INFORMAIÓN QUE VIENE EN RUTA ES IGUAL A
				if ($ruta == "lo-mas-vendido") {
					// ONTENEMOS LOS PRIMEROS 8 REGISTROS
					$tabla = "producto";
					$order = "Ventas";
					$modo = "DESC";
					$base = 0;
					$tope = 8;
					$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
					// OBTENER TODOS LOS PRODUCTOS
					$tabla = "producto";
					$order = "Ventas";
					$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
					$producto['subCatP'] = $ruta;
					$producto['base'] = 0;
					$tabla = "categorias";
					$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
					$tabla = "plantilla";
					$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
					$producto['orden'] = NULL;
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}
				// VALIDAMOS SI LA INFORMAIÓN QUE VIENE EN RUTA ES IGUAL A
				elseif ($ruta == "lo-mas-visto") {
					// ONTENEMOS LOS PRIMEROS 8 REGISTROS
					$tabla = "producto";
					$order = "Vistas";
					$modo = "DESC";
					$base = 0;
					$tope = 8;
					$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
					// OBTENER TODOS LOS PRODUCTOS
					$tabla = "producto";
					$order = "Vistas";
					$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
					$producto['subCatP'] = $ruta;
					$producto['base'] = 0;
					$tabla = "categorias";
					$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
					$tabla = "plantilla";
					$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
					$producto['orden'] = NULL;
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}
				// SI NO COINCIDEN LO DIRIGIMOS A LA PAGINA DE ERROR 404
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
			// CUANDO LA PAGINA TIENE INFORMACIÓN
		}else {
			// VALIDAMOS QUE LA INFORMACIÓN SEA LA MÁS RECIENTE
			if ($url[0] =="mas-reciente") {
				// VALIDAMOS QUE LA INFORMACIÓN DE LA RUTA ES LO MÁS VENDIDO
				if ($ruta == "lo-mas-vendido") {
					if (isset($url[1])) {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Ventas";
						$modo = "ASC";
						$base = ($url[1] -1)*8;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Ventas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
						$producto['subCatP'] = $ruta;
						$producto['base'] = $url[1];
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$producto['orden'] = $url[0];
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}else {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Ventas";
						$modo = "ASC";
						$base = 0;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Ventas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
						$producto['subCatP'] = $ruta;
						$producto['base'] = 0;
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$producto['orden'] = $url[0];
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				// VALIDAMOS QUE LA INFORMACIÓN DE LA RUTA ES LO MÁS VISTO
				}elseif ($ruta == "lo-mas-visto") {
					if (isset($url[1])) {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Vistas";
						$modo = "ASC";
						$base = ($url[1] -1)*8;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Vistas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
						$producto['subCatP'] = $ruta;
						$producto['base'] = $url[1];
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$producto['orden'] = $url[0];
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}else {
						if (isset($url[1])) {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$order = "Vistas";
							$modo = "ASC";
							$base = ($url[1] -1)*8;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$order = "Vistas";
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
							$producto['subCatP'] = $ruta;
							$producto['base'] = $url[1];
							$tabla = "categorias";
							$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
							$tabla = "plantilla";
							$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
							$producto['orden'] = $url[0];
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}else {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$order = "Vistas";
							$modo = "ASC";
							$base = 0;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$order = "Vistas";
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
							$producto['subCatP'] = $ruta;
							$producto['base'] = 0;
							$tabla = "categorias";
							$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
							$tabla = "plantilla";
							$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
							$producto['orden'] = $url[0];
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
					}
				// VALIDAMOS QUE LA INFORMACIÓN DE LA RUTA ES UN PRODUCTO
				}else{
					$tabla = "subcategoria";
					$campo = "SubCategoria";
					$valor = $ruta;
					$producto['subcatprod'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
					// OBTENER TODOS LOS PRODUCTOS
					$tabla = "producto";
					$campo = "P_idSubCat";
					$valor = $producto['subcatprod'] -> idSubCat;
					$producto['Tproducto'] = $this -> ModelOteluma -> GetAllWhere($tabla, $campo, $valor);
					$tabla = "producto";
					$campo = "P_idSubCat";
					$valor = $producto['subcatprod'] -> idSubCat;
					$order = "idProd";
					$modo = "ASC";
					$base = 0;
					$tope = 8;
					$producto['producto'] = $this -> ModelOteluma -> GetAllWhereOrderLimit($tabla, $campo, $valor, $order, $modo, $base, $tope);
					$producto['subCatP'] = $producto['subcatprod'];
					$producto['subcat'] = $ruta;
					$producto['base'] = 0;
					$tabla = "categorias";
					$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
					$tabla = "plantilla";
					$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
					$producto['orden'] = $url[0];
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}
			// VALIDAMOS QUE LA INFORMACIÓN SEA LA MÁS ANTIGUA
			}elseif ($url[0] == "mas-antiguo") {
				// VALIDAMOS QUE LA INFORMACIÓN DE LA RUTA ES LO MÁS VENDIDO
				if ($ruta == "lo-mas-vendido") {
					if (isset($url[1])) {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Ventas";
						$modo = "DESC";
						$base = ($url[1] -1)*8;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Ventas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
						$producto['subCatP'] = $ruta;
						$producto['base'] = $url[1];
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$producto['orden'] = $url[0];
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}else {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Ventas";
						$modo = "DESC";
						$base = 0;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Ventas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
						$producto['subCatP'] = $ruta;
						$producto['base'] = 0;
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$producto['orden'] = $url[0];
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				// VALIDAMOS QUE LA INFORMACIÓN DE LA RUTA ES LO MÁS VISTO
				}elseif ($ruta == "lo-mas-visto") {
					if (isset($url[1])) {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Vistas";
						$modo = "DESC";
						$base = ($url[1] -1)*8;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Ventas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
						$producto['subCatP'] = $ruta;
						$producto['base'] = $url[1];
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$producto['orden'] = $url[0];
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}else {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Vistas";
						$modo = "DESC";
						$base = 0;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Ventas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
						$producto['subCatP'] = $ruta;
						$producto['base'] = 0;
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$producto['orden'] = $url[0];
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				// VALIDAMOS QUE LA INFORMACIÓN DE LA RUTA ES UN PRODUCTO
				}else{
					if (isset($url[1])) {
						$tabla = "subcategoria";
						$campo = "SubCategoria";
						$valor = $ruta;
						$producto['subcatprod'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$campo = "P_idSubCat";
						$valor = $producto['subcatprod'] -> idSubCat;
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllWhere($tabla, $campo, $valor);
						$tabla = "producto";
						$campo = "P_idSubCat";
						$valor = $producto['subcatprod'] -> idSubCat;
						$order = "idProd";
						$modo = "DESC";
						$base = ($url[1] -1)*8;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllWhereOrderLimit($tabla, $campo, $valor, $order, $modo, $base, $tope);
						$producto['subCatP'] = $producto['subcatprod'];
						$producto['subcat'] = $ruta;
						$producto['base'] = $url[1];
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						$producto['orden'] = $url[0];
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}else {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$campo = "P_idSubCat";
						$valor = $producto['subcatprod'] -> idSubCat;
						$order = "idProd";
						$modo = "DESC";
						$base = 0;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllWhereOrderLimit($tabla, $campo, $valor, $order, $modo, $base, $tope);

						$tabla = "subcategoria";
						$campo = "SubCategoria";
						$valor = $ruta;
						$producto['subcatprod'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
						print_r($producto); die();

						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$campo = "P_idSubCat";
						$valor = $producto['subcatprod'] -> idSubCat;
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllWhere($tabla, $campo, $valor);
						// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
						$producto['subCatP'] = $producto['subcatprod'];
						$producto['subcat'] = $ruta;
						// MANDAMOS LA BASE PARA LA PÁGINACIÓN
						$producto['base'] = 0;
						// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						// OBTENEMOS LOS VALORES DE LA PLANTILLA
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						// MANDAMOS EL ORDEN PARA LAS MIGAS DE PAN
						$producto['orden'] = $url[0];
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				}
			// VALIDAMOS QUE LA INFORMACIÓN SEAN PÁGINAS
			}else {
				if ($ruta == "lo-mas-vendido") {
					// ONTENEMOS LOS PRIMEROS 8 REGISTROS
					$tabla = "producto";
					$order = "Ventas";
					$modo = "DESC";
					$base = ($url[0] -1)*8;
					$tope = 8;
					$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
					// OBTENER TODOS LOS PRODUCTOS
					$tabla = "producto";
					$order = "Ventas";
					$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}elseif ($ruta == "lo-mas-visto") {
					// ONTENEMOS LOS PRIMEROS 8 REGISTROS
					$tabla = "producto";
					$order = "Vistas";
					$modo = "DESC";
					$base = ($url[0] -1)*8;
					$tope = 8;
					$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
					// OBTENER TODOS LOS PRODUCTOS
					$tabla = "producto";
					$order = "Ventas";
					$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}else{
					// ONTENEMOS LOS PRIMEROS 8 REGISTROS
					$tabla = "producto";
					$campo = "P_idSubCat";
					$valor = $ruta;
					$base = ($url[0] -1)*8;
					$tope = 8;
					$producto['producto'] = $this -> ModelOteluma -> GetAllLimit($tabla, $campo, $valor, $base, $tope);
					// OBTENER TODOS LOS PRODUCTOS
					$tabla = "producto";
					$campo = "P_idSubCat";
					$valor = $subcat;
					$producto['Tproducto'] = $this -> ModelOteluma -> GetAllWhere($tabla, $campo, $valor);
					$tabla = "subcategoria";
					$campo = "idSubCat";
					$valor = $subcat;
					// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
					$producto['subCatP'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
					$producto['subcat'] = $subcat;
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
					$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
					$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}
			}
		}
	}

	public function index($ruta = NULL, $url = NULL){
		// VALIDAMOS SI LA RUTA TIENE INFORMAIÓN
		if ($ruta == NULL) {
			// LA RUTA NO TIENE INFORMAIÓN | BUSCAMOS EN LA SUBCATEGORIA EL PRODUCTO
			$subcat = $this -> input -> post('subcategoria');
			// BUSCAMOS UN REGISTRO | SI ENCONTRAMOS PRODUCTO
			if (isset($subcat)) {
				// ONTENEMOS LOS PRIMEROS 8 REGISTROS
				$tabla = "producto";
				$campo = "P_idSubCat";
				$valor = $subcat;
				$base = 0;
				$tope = 8;
				$producto['producto'] = $this -> ModelOteluma -> GetAllLimit($tabla, $campo, $valor, $base, $tope);
				// OBTENER TODOS LOS PRODUCTOS
				$tabla = "producto";
				$campo = "P_idSubCat";
				$valor = $subcat;
				$producto['Tproducto'] = $this -> ModelOteluma -> GetAllWhere($tabla, $campo, $valor);
				$tabla = "subcategoria";
				$campo = "idSubCat";
				$valor = $subcat;
				$producto['subCatPRow'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
				// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
				$producto['subCatP'] = $producto['subCatPRow'] -> Ruta;
				$producto['subcat'] = $subcat;
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
				$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
				$this -> load -> view ('Cliente/Principal/ViewClieFooter');
			}
			// NO ENCONTRAMOS UN PRODUCTO | LO REDIRIGIMOS A LA PAGINA PRINCIPAL
			else {
				redirect(base_url());
				exit();
			}
			// LA RUTA SI TIENE INFORMAIÓN | VALIDAMOS SI ES IGUAL A LO MÁS VENDIDO
		}
		elseif ($ruta == "lo-mas-vendido") {
			// SI ENCONTRAMOS UN PRODUCTO | VALIDAMOS SI EL SEGUNDO PARAMETRO ES UNA PÁGINA O TEXTO
			if (isset($url[0])) {
				// SI ENCONTRAMOS INFORMACIÓN | ES TEXTO
				if ($url[0] == "mas-reciente") {
					// VALIDAMOS SI EXISTE INFORMACIÓN EN EL TERCER PARAMETRO (PÁGINA)
					if (isset($url[1])) {
						// SI ENCONTRAMOS INFORMAIÓN | VALIDAMOS QUE SEA NÚMERO
						if (is_numeric($url[1])) {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$order = "Ventas";
							$modo = "DESC";
							$base = ($url[1] -1)*8;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$order = "Ventas";
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
							$valor = "lo-mas-vendido";
							$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
						// NO ES NÚMERO | LO DIRIGIMOS AL ERROR 404
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
					// NO VIENE LA PÁGINA
					else {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Ventas";
						$modo = "DESC";
						$base = 0;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Ventas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
						$valor = "lo-mas-vendido";
						$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				}
				// SI ENCONTRAMOS INFORMACIÓN | VALIDAMOS QUE SEA TEXTO
				elseif ($url[0] == "mas-antiguo") {
					// VALIDAMOS SI EXISTE INFORMACIÓN EN EL TERCER PARAMETRO (PÁGINA)
					if (isset($url[1])) {
						// SI ES NUMERO | BUSCAMOS EL NÚMERO DE LA PÁGINA
						if (is_numeric($url[1])) {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$order = "Ventas";
							$modo = "ASC";
							$base = ($url[1] -1)*8;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$order = "Ventas";
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
							$valor = "lo-mas-vendido";
							$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
						// NO ES NÚMERO | LO DIRIGIMOS AL ERROR 404
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
					// NO VIENE LA PÁGINA
					else {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Ventas";
						$modo = "ASC";
						$base = 0;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Ventas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
						$valor = "lo-mas-vendido";
						$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
						// echo "<pre>"; print_r($producto); echo "</pre>"; die();
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				}
				// VALIDAMOS LA INFORMACIÓN |SI ES NUMERO | BUSCAMOS LA PAGINA CORRESPONDIENTE
				else {
					if (is_numeric($url[0])) {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Ventas";
						$modo = "DESC";
						$base = ($url[0] -1)*8;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Ventas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
						// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
						$producto['subCatP'] = $ruta;
						// MANDAMOS LA BASE PARA LA PÁGINACIÓN
						$producto['base'] = $url[0];
						// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
						$tabla = "plantilla";
						$header['plantilla'] = $this -> ModelOteluma -> GetAll($tabla);
						// MANDAMOS EL ORDEN PARA LAS MIGAS DE PAN
						$producto['orden'] = NULL;
						// OBTENEMOS LOS VALORES DEL BANNER
						$tabla = "banner";
						$campo = "Ruta";
						$valor = "lo-mas-vendido";
						$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
					// SI ES BASURA | LO DIRIGIMOS AL ERROR 404
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
			// NO ENCONTRAMOS VALOR EN EL SEGUNDO PARAMETRO
			else {
				// ONTENEMOS LOS PRIMEROS 8 REGISTROS
				$tabla = "producto";
				$order = "Ventas";
				$modo = "DESC";
				$base = 0;
				$tope = 8;
				$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
				// OBTENER TODOS LOS PRODUCTOS
				$tabla = "producto";
				$order = "Ventas";
				$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
				$valor = "lo-mas-vendido";
				$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
				$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
				$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
				$this -> load -> view ('Cliente/Principal/ViewClieFooter');
			}
		}
		// LA RUTA SI TIENE INFORMAIÓN | VALIDAMOS SI ES IGUAL A LO MÁS VISTO
		elseif ($ruta == "lo-mas-visto") {
			// SI ENCONTRAMOS UN PRODUCTO | VALIDAMOS SI EL SEGUNDO PARAMETRO ES UNA PÁGINA O TEXTO
			if (isset($url[0])) {
				// SI ENCONTRAMOS INFORMACIÓN | ES TEXTO
				if ($url[0] == "mas-reciente") {
					// VALIDAMOS SI EXISTE INFORMACIÓN EN EL TERCER PARAMETRO (PÁGINA)
					if (isset($url[1])) {
						// SI ENCONTRAMOS INFORMAIÓN | VALIDAMOS QUE SEA NÚMERO
						if (is_numeric($url[1])) {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$order = "Vistas";
							$modo = "DESC";
							$base = ($url[1] -1)*8;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$order = "Vistas";
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
							$valor = "lo-mas-visto";
							$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
						// NO ES NÚMERO | LO DIRIGIMOS AL ERROR 404
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
					// NO VIENE LA PÁGINA
					else {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Vistas";
						$modo = "DESC";
						$base = 0;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Vistas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
						$valor = "lo-mas-visto";
						$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				}
				// SI ENCONTRAMOS INFORMACIÓN | VALIDAMOS QUE SEA TEXTO
				elseif ($url[0] == "mas-antiguo") {
					// VALIDAMOS SI EXISTE INFORMACIÓN EN EL TERCER PARAMETRO (PÁGINA)
					if (isset($url[1])) {
						// SI ES NUMERO | BUSCAMOS EL NÚMERO DE LA PÁGINA
						if (is_numeric($url[1])) {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$order = "Vistas";
							$modo = "ASC";
							$base = ($url[1] -1)*8;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$order = "Vistas";
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
							$valor = "lo-mas-visto";
							$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
							$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
							$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
						// NO ES NÚMERO | LO DIRIGIMOS AL ERROR 404
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
					// NO VIENE LA PÁGINA
					else {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Vistas";
						$modo = "ASC";
						$base = 0;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Vistas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
						$valor = "lo-mas-visto";
						$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
						$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
				}
				// VALIDAMOS LA INFORMACIÓN |SI ES NUMERO | BUSCAMOS LA PAGINA CORRESPONDIENTE
				else {
					if (is_numeric($url[0])) {
						// ONTENEMOS LOS PRIMEROS 8 REGISTROS
						$tabla = "producto";
						$order = "Vistas";
						$modo = "DESC";
						$base = ($url[0] -1)*8;
						$tope = 8;
						$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
						// OBTENER TODOS LOS PRODUCTOS
						$tabla = "producto";
						$order = "Vistas";
						$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
						// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
						$producto['subCatP'] = $ruta;
						// MANDAMOS LA BASE PARA LA PÁGINACIÓN
						$producto['base'] = $url[0];
						// OBTENEMOS LAS CATEGORIAS PARA EL SELECT DEL HEADER
						$tabla = "categorias";
						$header['cat'] = $this -> ModelOteluma -> GetAll($tabla);
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
						$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
						$this -> load -> view ('Cliente/Principal/ViewClieFooter');
					}
					// SI ES BASURA | LO DIRIGIMOS AL ERROR 404
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
			// NO ENCONTRAMOS VALOR EN EL SEGUNDO PARAMETRO
			else {
				// ONTENEMOS LOS PRIMEROS 8 REGISTROS
				$tabla = "producto";
				$order = "Vistas";
				$modo = "DESC";
				$base = 0;
				$tope = 8;
				$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
				// OBTENER TODOS LOS PRODUCTOS
				$tabla = "producto";
				$order = "Vistas";
				$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
				$valor = "lo-mas-visto";
				$producto['Banner'] = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
				$this -> load -> view ('Cliente/Principal/ViewClieHeader', $header);
				$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
				$this -> load -> view ('Cliente/Principal/ViewClieFooter');
			}
		}
		// LA RUTA TIENE INFORMAIÓN | VALIDAMOS QUE EL PRODUCTO SE ENCUIENTRE EN LA DB
		else {
			// BUSCAMOS LA RUTA EN LOS PRODUCTOS
			$tabla = "subcategoria";
			$campo = "SubCategoria";
			$valor = $ruta;
			$row = $this -> ModelOteluma -> GetRowWhere($tabla, $campo, $valor);
			// SI ENCONTRAMOS UN PRODUCTO | VALIDAMOS SI EL SEGUNDO PARAMETRO ES UNA PÁGINA O TEXTO
			if ($row != NULL) {
				if (isset($url[0])) {
					// SI ENCONTRAMOS INFORMACIÓN | ES TEXTO
					if ($url[0] == "mas-reciente") {
						// VALIDAMOS SI EXISTE INFORMACIÓN EN EL TERCER PARAMETRO (PÁGINA)
						if (isset($url[1])) {
							// SI ENCONTRAMOS INFORMAIÓN | VALIDAMOS QUE SEA NÚMERO
							if (is_numeric($url[1])) {
								// SI ES NUMERO | BUSCAMOS EL NÚMERO DE LA PÁGINA
								// ONTENEMOS LOS PRIMEROS 8 REGISTROS
								$tabla = "producto";
								$order = "idProd";
								$modo = "DESC";
								$base = ($url[1] -1)*8;
								$tope = 8;
								$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
								// OBTENER TODOS LOS PRODUCTOS
								$tabla = "producto";
								$order = "idProd";
								$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
								$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
								$this -> load -> view ('Cliente/Principal/ViewClieFooter');
							}
							// NO ES NÚMERO | LO DIRIGIMOS AL ERROR 404
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
						// NO ENCONTRAMOS INFORMAIÓN | BUSCAMOS LOS PRODUCTOS MÁS RECIENTE
						else {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$campo = "P_idSubCat";
							$valor = $row -> idSubCat;
							$base = 0;
							$tope = 8;
							// $result = $this -> ModelOteluma -> GetAllLimit($tabla, $campo, $valor, $base, $tope);
							$producto['producto'] = $this -> ModelOteluma -> GetAllLimit($tabla, $campo, $valor, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$campo = "P_idSubCat";
							$valor = $row -> idSubCat;
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllWhere($tabla, $campo, $valor);
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
							$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
					}
					// SI ENCONTRAMOS INFORMACIÓN | VALIDAMOS QUE SEA TEXTO
					elseif ($url[0] == "mas-antiguo") {
						// VALIDAMOS SI EXISTE INFORMACIÓN EN EL TERCER PARAMETRO (PÁGINA)
						if (isset($url[1])) {
							// SI ES NUMERO | BUSCAMOS EL NÚMERO DE LA PÁGINA
							if (is_numeric($url[1])) {
								// ONTENEMOS LOS PRIMEROS 8 REGISTROS
								$tabla = "producto";
								$order = "idProd";
								$modo = "ASC";
								$base = ($url[1] -1)*8;
								$tope = 8;
								$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
								// OBTENER TODOS LOS PRODUCTOS
								$tabla = "producto";
								$order = "idProd";
								$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
								$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
								$this -> load -> view ('Cliente/Principal/ViewClieFooter');
							}
							// NO ES NÚMERO | LO DIRIGIMOS AL ERROR 404
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
						// NO ENCONTRAMOS INFORMAIÓN | BUSCAMOS LOS PRODUCTOS MÁS ANTIGUO
						else {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$order = "idProd";
							$modo = "ASC";
							$base = 0;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllOrderLimit($tabla, $order, $modo, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$order = "idProd";
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllOrder($tabla, $order);
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
							$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
					}
					// SI ENCONTRAMOS INFORMACIÓN | ES PÁGINA O TEXTO BASURA
					else {
						// VALIDAMOS LA INFORMACIÓN |SI ES NUMERO | BUSCAMOS LA PAGINA CORRESPONDIENTE
						if (is_numeric($url[0])) {
							// ONTENEMOS LOS PRIMEROS 8 REGISTROS
							$tabla = "producto";
							$campo = "P_idSubCat";
							$valor = $row -> idSubCat;
							$base = ($url[0] -1)*8;
							$tope = 8;
							$producto['producto'] = $this -> ModelOteluma -> GetAllLimit($tabla, $campo, $valor, $base, $tope);
							// OBTENER TODOS LOS PRODUCTOS
							$tabla = "producto";
							$campo = "P_idSubCat";
							$valor = $row -> idSubCat;
							$producto['Tproducto'] = $this -> ModelOteluma -> GetAllWhere($tabla, $campo, $valor);
							// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
							$producto['subCatP'] = $row -> Ruta;
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
							$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
							$this -> load -> view ('Cliente/Principal/ViewClieFooter');
						}
						// SI ES BASURA | LO DIRIGIMOS AL ERROR 404
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
				// NO ENCONTRAMOS VALOR EN EL SEGUNDO PARAMETRO
				else {
					// ONTENEMOS LOS PRIMEROS 8 REGISTROS
					$tabla = "producto";
					$campo = "P_idSubCat";
					$valor = $row -> idSubCat;
					$base = 0;
					$tope = 8;
					$producto['producto'] = $this -> ModelOteluma -> GetAllLimit($tabla, $campo, $valor, $base, $tope);
					// OBTENER TODOS LOS PRODUCTOS
					$tabla = "producto";
					$campo = "P_idSubCat";
					$valor = $row -> idSubCat;
					$producto['Tproducto'] = $this -> ModelOteluma -> GetAllWhere($tabla, $campo, $valor);
					// MANDAMOS EL PRODUCTO PARA PONER EN LA MIGAS DE PAN
					$producto['subCatP'] = $row -> Ruta;
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
					$this -> load -> view ('Cliente/Producto/ViewClieProducto', $producto);
					$this -> load -> view ('Cliente/Principal/ViewClieFooter');
				}
			}
			// NO ENCONTRAMOS PRODUCTO | DIRIGIMOS AL ERROR 404
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
}
