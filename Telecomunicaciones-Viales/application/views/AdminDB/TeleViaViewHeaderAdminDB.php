<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
	  <head>
			<meta charset="utf-8">
      <!-- PARA INDICAR QUE VAMOS A TRABAJAR EN VARIOS DISPOSITIVOS -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="tittle" content="Telecomunicaciones Viales">
      <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad">
      <meta name="keyword" content="Lorem, ipsum, dolor, sit, amet, consectetur, adipisicing, elit, sed, do, eiusmod, tempor, incididunt, ut, labore, et, dolore, magna, aliqua, Ut, enim, ad">
      <title> Telecomunicaciones Viales | Administrador de la Base de Datos </title>
      <meta http-equiv='X-UA-Compatible' content='IE=11'>
			<!-- PLUGINS CSS -->
			<link rel="stylesheet" href="<?= base_url()?>css/Plugins/bootstrap.css">
	    <!-- FONTAWESOME -->
	    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/all.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/fontawesome.css">
			<!-- ESTILOS PERSONALIZADAS -->
			<!-- <link rel="stylesheet" href="<?= base_url()?>css/AdminDB/TeleviaGeneralAdminDB.css">
			<link rel="stylesheet" href="<?= base_url()?>css/AdminDB/TeleviaAdminDB.css">
			<link rel="stylesheet" href="<?= base_url()?>css/AdminDB/TeleviaVistasAdminDB.css"> -->
			<link rel="stylesheet" href="<?= base_url()?>css/AdminDB/TeleviaGeneralAdminDB.min.css">
			<link rel="stylesheet" href="<?= base_url()?>css/AdminDB/TeleviaAdminDB.min.css">
			<link rel="stylesheet" href="<?= base_url()?>css/AdminDB/TeleviaVistasAdminDB.min.css">
			<!-- PLUGINS DE JAVASCRIPT -->
			<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/bootstrap.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/popper.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.scrollUp.min.js"></script>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
			<!-- ICONO DE LA PÁGINA WEB -->
			<link rel="shortcut icon" type="image/png" href="<?= base_url()?>images/Logo/Tele_Via.png">
	  </head>
		<body>
			<!-- JAVASCRIPT PERSONALIZADOS -->
			<script type="text/javascript" src="<?= base_url()?>js/TViales.js"></script>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3 col-md-5 col-sm-12 col-xs-12 containerMenu">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<img class="imgLogo" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Admin.png" alt="Televia_Icon_Admin">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div id="accordion">
							    <div class="card">
							      <div class="card-header cardTabla">
							        <a class="card-link cardTablaText" data-toggle="collapse" href="#TablasShow"> tablas <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_DB.png" alt="Televia_Icon_DB"> </a>
							      </div>
							      <div id="TablasShow" class="collapse tablaContainer" data-parent="#accordion">
							        <!-- <div class="card-body"> -->
												<ul class="list-group list-group-flush">
											    <li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/correo"> Correo <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_C.png" alt=""> </a> </li>
											    <li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/paquete"> Paquete <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_P.png" alt=""> </a> </li>
											    <li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio"> Seguimiento del Servicio <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_SS.png" alt=""> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/categoria"> Categoria <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Ca.png" alt=""> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/servicio"> Servicio <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_S.png" alt=""> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/subservicio"> SubServicio <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_SubS.png" alt=""> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/usuario"> Usuario <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_U.png" alt=""> </a> </li>
											    <li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-usuario"> Seguimiento del Usuario <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_SU.png" alt=""> </a> </li>
											  </ul>
							        <!-- </div> -->
							      </div>
							    </div>
							    <div class="card">
							      <div class="card-header cardTabla">
							        <a class="collapsed card-link cardTablaText" data-toggle="collapse" href="#collapseTwo"> Reportes <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_R.png" alt="Televia_Icon_R"> </a>
							      </div>
							      <div id="collapseTwo" class="collapse" data-parent="#accordion">
							        <div class="card-body">
												<ul class="list-group list-group-flush">
													<li class="list-group-item tablaItems"> Servicios </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/servicios-mas-vistos"> Servicios más Vistos <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MV.png" alt=""> </a> </li>
											    <li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/servicios-mas-solicitados"> Servicios más Solicitados <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MS.png" alt=""> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/servicios-mas-vendidos"> Servicios más Vendidos <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_M.png" alt="Televia_Icon_M"> </a> </li>

													<li class="list-group-item tablaItems"> Productos </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/productos-mas-vistos"> Productos más Vistos <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MV.png" alt="Televia_Icon_MV"> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/productos-menos-vistos"> Productos menos Vistos <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MeV.png" alt="Televia_Icon_MeV"> </a> </li>
										    	<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/productos-mas-solicitados"> Productos más Solicitados <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MS.png" alt="Televia_Icon_MS"> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/productos-menos-solicitados"> Productos menos Solicitados <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MeS.png" alt="Televia_Icon_MeS"> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/productos-mas-vendidos"> Productos más Vendidos <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_M.png" alt="Televia_Icon_M"> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/productos-menos-vendidos"> Productos menos Vendidos <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_Me.png" alt="Televia_Icon_Me"> </a> </li>

													<li class="list-group-item tablaItems"> Paquetes </li>
											    <li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio"> Paquetes más vistos <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MV.png" alt=""> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/categoria"> Paquetes más solicitados <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MS.png" alt=""> </a> </li>
											  </ul>
							        </div>
							      </div>
							    </div>
							  </div>
							</div>
						</div>
					</div>
