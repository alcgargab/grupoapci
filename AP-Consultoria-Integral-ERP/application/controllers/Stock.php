<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Stock extends CI_Controller {
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

		public function index($empresa = NULL, $url = NULL){
			// --------------- variables para tablas --------------- //
			$tbl_empleados = "empleados";
			$tbl_puestos = "puestos";
			$tbl_areas = "areas";
			$tbl_empresas = "empresas";
			$tbl_metodos_permitidos = "metodos_permitidos";
			$tbl_stock_proveedores = "stock_proveedores";
			$tbl_stock_productos = "stock_productos";
			// --------------- HEADER --------------- //
			// obtenemos el empleado
			$campo = "id_e";
			$valor = $this -> session -> empleado_u;
			$header['empleado'] = $this -> ModelERP -> getRowWhere1($tbl_empleados, $campo, $valor);
			// ------ VALORES PARA PONER COLOR Y QUE APAREZCA EL NOMBRE EN EL HEADER ------ //
			// obetenemos el puesto del empleado
			$campo = "id_pue";
			$valor = $header['empleado'] -> puesto_e;
			$header['puesto'] = $this -> ModelERP -> getRowWhere1($tbl_puestos, $campo, $valor);
			// obetenemos el area del empleado
			$campo = "id_a";
			$valor = $header['puesto'] -> area_pue;
			$header['area'] = $this -> ModelERP -> getRowWhere1($tbl_areas, $campo, $valor);
			// obtenemos la empresa
			$campo = "id_em";
			$valor = $header['area'] -> empresa_a;
			$header['empresa'] = $this -> ModelERP -> getRowWhere1($tbl_empresas, $campo, $valor);
			// // --------------- MENU --------------- //
			// obtenemos la empresa
			$menu['empresaruta'] = $header['empresa'];
			// // --------------- HEADER --------------- //
			// ruta para las fotos y la url
			$header['ruta'] = $menu['empresaruta'] -> ruta_em;
			// obtenemos todos los empleados para los permisos
			$campo1 = "fecha_baja_e";
			$valor1 = '0000-00-00';
			$campo2 = "motivo_baja_e";
			$valor2 = "";
			$menu['empleados'] = $this -> ModelERP -> getAllWhere2($tbl_empleados, $campo1, $valor1, $campo2, $valor2);
			$stock['empleado'] = $menu['empleados'];
			// --------------- HOME --------------- //
			// validamos las variables de sesion
			if (isset($this -> session -> validate_sesion)){
				// si viene la variable de sesion | validamos que sea iguala a ok
				if ($this -> session -> validate_sesion == "true") {
					// es igual a ok | validamos el tipo de sesion
					// el usuario es de inventario
					if ($this -> session -> TUSesion == 9) {
						// validamos que la empresa exista en la db
						$campo = "ruta_em";
						$valor = $empresa;
						$home['empresa'] = $this -> ModelERP -> getRowWhere1($tbl_empresas, $campo, $valor);
						if ($home['empresa'] != "") {
							// la empresa si existe | validamos que el metodo exista
							$campo1 = "metodo_mp";
							$valor1 = $url[0];
							$campo2 = "usuario_mp";
							$valor2 = $this -> session -> TUSesion;
							$metodos = $this -> ModelERP -> getRowWhere2Like($tbl_metodos_permitidos, $campo1, $valor1, $campo2, $valor2);
							if ($metodos != "") {
								switch ($metodos -> metodo_mp) {
									// --------------- enviar correos --------------- //
									case 'add-stock':
										// validamos si viene información en la url
										if (!isset($url[1])) {
											// obtenemos los proveedores
											$stock['proveedor'] = $this -> ModelERP -> getAll($tbl_stock_proveedores);
											$this -> load -> view('main/Header', $header);
											$this -> load -> view('menu/Stock', $menu);
											$this -> load -> view('Stock/Agregar_stock', $stock);
											$this -> load -> view('main/Footer');
										}
										// viene variable | redirigimos a la página principal
										else {
										  $this -> load -> view('main/Header', $header);
										  $this -> load -> view('menu/Stock', $menu);
										  $this -> load -> view('bug/404');
										  $this -> load -> view('main/Footer');
										}
									break;
									// --------------- agregar producto nuevo --------------- //
									case 'add-utility':
										// validamos si viene información en la url
										if (!isset($url[1])) {
											$producto['P_Id_Producto'] = trim($this -> input -> post('Proveedor'));
											$producto['Producto'] = trim($this -> input -> post('producto'));
											$producto['Cantidad'] = trim($this -> input -> post('cantidad'));
											// validamos que venga información del formulario
											if (isset($producto)) {
												// si viene información | insertamos el producto
												$data = $producto;
												$bandera = $this -> ModelERP -> insert($tbl_stock_productos, $data);
												// validamos si se inserto el producto
												if ($bandera == "true") {
													$popup['title'] = "LISTO!";
													$popup['text'] = "Se agregó el producto.";
													$popup['type'] = "success";
													$popup['ruta'] = "ruta";
													// --------------- VISTAS --------------- //
						 							$this -> load -> view('main/Header', $header);
						 							$this -> load -> view('menu/Stock', $menu);
						 							$this -> load -> view('popup/popup', $popup);
						 							$this -> load -> view('main/Footer');
												}
												// no se inserto el producto | mandamos alerta de error
												else {
													$popup['title'] = "¡ERROR!";
													$popup['text'] = "Lo sentimos hubo un error en la solicitud, intentalo nuevamente.";
													$popup['type'] = "error";
													$popup['ruta'] = "base";
													// --------------- VISTAS --------------- //
						 							$this -> load -> view('main/Header', $header);
						 							$this -> load -> view('menu/Stock', $menu);
						 							$this -> load -> view('popup/popup', $popup);
						 							$this -> load -> view('main/Footer');
												}
											}
											// no viene información | redirigimos a la página principal
											else {
												redirect(base_url());
												exit();
											}
										}
										// viene variable | redirigimos a la página principal
										else {
										  $this -> load -> view('main/Header', $header);
										  $this -> load -> view('menu/Recursos_humanos', $menu);
										  $this -> load -> view('bug/404');
										  $this -> load -> view('main/Footer');
										}
									break;
									// --------------- vender producto --------------- //
									case 'sell-utility':
										// validamos si viene información en la url
										if (!isset($url[1])) {
											$this -> load -> view('main/Header', $header);
											$this -> load -> view('menu/Stock', $menu);
											$this -> load -> view('Stock/Vender_stock', $stock);
											$this -> load -> view('main/Footer');
										}
										// viene variable | redirigimos a la página principal
										else {
										  $this -> load -> view('main/Header', $header);
										  $this -> load -> view('menu/Recursos_humanos', $menu);
										  $this -> load -> view('bug/404');
										  $this -> load -> view('main/Footer');
										}
									break;
									// --------------- no existe el metodo --------------- //
									default:
										$this -> load -> view('main/Header', $header);
										$this -> load -> view('menu/Stock', $menu);
										$this -> load -> view('bug/404');
										$this -> load -> view('main/Footer');
									break;
								}
							}
							// el metodo no existe | mandamos el error 404
							else {
								$this -> load -> view('main/Header', $header);
								$this -> load -> view('menu/Stock', $menu);
								$this -> load -> view('bug/404');
								$this -> load -> view('main/Footer');
							}
						}
						// la empresa no existe | mandamos alerta de error
						else {
							$popup['title'] = "¡ERROR!";
							$popup['text'] = "Lo sentimos esta empresa no se encuentra registrada, intentalo nuevamente.";
							$popup['type'] = "error";
							$popup['ruta'] = "base";
							// --------------- VISTAS --------------- //
							$this -> load -> view('main/Header', $header);
							$this -> load -> view('menu/Stock', $menu);
							$this -> load -> view('popup/popup', $popup);
							$this -> load -> view('main/Footer');
						}
					}
					// el usuario es OTRO
					else {
						$popup['title'] = "¡ERROR!";
						$popup['text'] = "Lo sentimos, tu usuario no tiene permisos para ingresar a ésta área.";
						$popup['type'] = "error";
						$popup['ruta'] = "base";
						// --------------- VISTAS --------------- //
						$this -> load -> view('main/Header', $header);
						$this -> load -> view('popup/popup', $popup);
						$this -> load -> view('main/Footer');
					}
				}
				// no es igual a ok | mandamos a la página principal
				else {
					redirect(base_url());
					exit();
				}
			}
			// no viene la variable de sesion mandamos a la página principal
			else {
				redirect(base_url());
				exit();
			}
		}
	}
