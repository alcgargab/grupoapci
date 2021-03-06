<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
	  <head>
	    <meta charset="utf-8">
	    <!-- PARA INDICAR QUE VAMOS A TRABAJAR EN VARIOS DISPOSITIVOS -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	    <meta name="tittle" content="ERP">
	    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad">
	    <meta name="keyword" content="Lorem, ipsum, dolor, sit, amet, consectetur, adipisicing, elit, sed, do, eiusmod, tempor, incididunt, ut, labore, et, dolore, magna, aliqua, Ut, enim, ad">
	    <title> ERPAPCI </title>
	    <meta http-equiv='X-UA-Compatible' content='IE=11'>
	    <!-- PLUGINS CSS -->
			<link rel="stylesheet" href="<?= base_url()?>css/Plugins/bootstrap.css">
			<link rel="stylesheet" href="<?= base_url()?>css/Plugins/flexslider.css">
			<link rel="stylesheet" href="<?= base_url()?>css/Plugins/FullCalendar/Core/CoreFullCalendar.min.css">
			<link rel="stylesheet" href="<?= base_url()?>css/Plugins/FullCalendar/Plugins/DayGridFullCalendar.min.css">
			<link rel="stylesheet" href="<?= base_url()?>css/Plugins/FullCalendar/Plugins/ListFullCalendar.min.css">
			<link rel="stylesheet" href="<?= base_url()?>css/Plugins/FullCalendar/Plugins/TimeGridFullCalendar.min.css">
			<link rel="stylesheet" href="<?= base_url()?>css/Plugins/FullCalendar/Plugins/BootstrapFullCalendar.min.css">
	    <!-- FONTAWESOME -->
	    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/all.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/fontawesome.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/sweetalert.min.css">
	    <!-- ESTILOS PERSONALIZADAS -->
			<link rel="stylesheet" href="<?= base_url()?>css/ERPGeneral.css">
			<link rel="stylesheet" href="<?= base_url()?>css/HomeRHEO.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/ERPVistas.css">
	    <!-- PLUGINS DE JAVASCRIPT -->
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/popper.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.flexslider.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.scrollUp.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/sweetalert.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.md5.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/pushjs/bin/push.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Core/CoreFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/DayGridFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/InteractionFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/ListFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/TimeGridFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/BootstrapFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/MomentFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Idioma/es.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/ERPFullCalesndar.js"></script>

	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	    <!-- ICONO DE LA P??GINA WEB -->
	    <link rel="shortcut icon" href="">
	  </head>
		<body>
			<!-- SCRIPTS PERSONALIZADAS -->
			<script type="text/javascript" src="<?= base_url()?>js/admin.js"></script>
			<header class="bg-dark navbar-dark fixed-top">
				<center>
					<a class="navbar-brand" href="#">
						ADMINISTRADOR
						<input id="sesion" type="hidden" name="" value="<?= $this -> session -> validarSesion?>">
						<input id="tipodeusuario" type="hidden" name="" value="<?= $this -> session -> TUSesion?>">
					</a>
				</center>
				<div class="navbar navbar-expand-sm float-right">
					<ul class="navbar-nav">
						<?php if (isset($this -> session -> validarSesion)){
							if ($this -> session -> validarSesion == "ok") { ?>
								<li id="btnerpMenuL" class="nav-item">
									<a class="nav-link" data-toggle="collapse" data-target="#collapsibleNavbar">
										<img src="<?= base_url()?>images/Icono/ERP_Icon_Menu.png" alt="ERP_Icon_Menu">
									</a>
								</li>
								<li id="btnerpMenuS" class="nav-item" style="display: none">
									<a class="nav-link" data-toggle="collapse" data-target="#collapsibleNavbar">
										<img src="<?= base_url()?>images/Icono/ERP_Icon_Menu.png" alt="ERP_Icon_Menu">
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url()?>"> Bienvenid@ <?= $empleado -> NomEmp ?></a>
								</li>
								<li class="nav-item">
									<span class="nav-link"> | </span>
								</li>
								<li class="nav-item dropdown dropleft">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="<?= base_url()?>">
										<img src="<?= base_url()?>images/Empleado/<?= $ruta?>/<?= $empleado -> FotoEmp?>" alt="AP | Consultor??a Integral" width="30px" class="rounded-circle">
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?= base_url()?>Admin/<?= $ruta?>/cerrar-sesion"> Cerrar sesi??n </a>
									</div>
								</li>
							<?php } else { ?>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url()?>"> Bienvenido </a>
								</li>
								<li class="nav-item">
									<span class="nav-link"> | </span>
								</li>
						<?php }
					}else { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url()?>"> Bienvenido </a>
						</li>
						<li class="nav-item">
							<span class="nav-link"> | </span>
						</li>
					<?php } ?>
					</ul>
				</div>
			</header>
			<br><br><br><br><br>
