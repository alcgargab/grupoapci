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
	    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/sweetalert.min.css">
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
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/sweetalert.min.js"></script>
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
								<img class="imgLogo" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_AdminCC.png" alt="Televia_Icon_AdminCC">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div id="accordion">
							    <div class="card">
							      <div class="card-header cardTabla">
							        <a class="card-link cardTablaText" data-toggle="collapse" href="#TablasShow"> tablas </a>
							      </div>
							      <div id="TablasShow" class="collapse show tablaContainer" data-parent="#accordion">
							        <!-- <div class="card-body"> -->
												<ul class="list-group list-group-flush">
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>CallCenterAdm/Tabla/usuario"> Usuario <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_U.png" alt=""> </a> </li>
											  </ul>
							        <!-- </div> -->
							      </div>
							    </div>
							    <!-- <div class="card">
							      <div class="card-header cardTabla">
							        <a class="collapsed card-link cardTablaText" data-toggle="collapse" href="#collapseTwo"> Reportes </a>
							      </div>
							      <div id="collapseTwo" class="collapse" data-parent="#accordion">
							        <div class="card-body">
												<ul class="list-group list-group-flush">
											    <li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/correo"> Servicios más vistos <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MV.png" alt=""> </a> </li>
											    <li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/paquete"> Servicios más solicitados <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MS.png" alt=""> </a> </li>
											    <li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/seguimiento-del-servicio"> Paquetes más vistos <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MV.png" alt=""> </a> </li>
													<li class="list-group-item tablaItems"> <a class="tablaItemsText" href="<?= base_url()?>TelevialesAdm/Tabla/categoria"> Paquetes más solicitados <img class="float-right tablaItemsImg" src="<?= base_url()?>images/Iconos/Administrador/Televia_Icon_MS.png" alt=""> </a> </li>
											  </ul>
							        </div>
							      </div>
							    </div> -->
							  </div>
							</div>
						</div>
					</div>
