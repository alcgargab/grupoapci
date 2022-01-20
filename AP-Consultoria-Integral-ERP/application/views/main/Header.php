<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
	  <head>
	    <meta charset="utf-8">
	    <!-- PARA INDICAR QUE VAMOS A TRABAJAR EN VARIOS DISPOSITIVOS -->
			<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	    <meta name="tittle" content="AP-Consultoria-Integral | ERP">
	    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad">
	    <meta name="keyword" content="Lorem, ipsum, dolor, sit, amet, consectetur, adipisicing, elit, sed, do, eiusmod, tempor, incididunt, ut, labore, et, dolore, magna, aliqua, Ut, enim, ad">
	    <title> AP-Consultoria-Integral | ERP </title>
	    <meta http-equiv='X-UA-Compatible' content='IE=11'>
			<meta name="google-site-verification" content="nPqFCn_79YvdmJcClc_j9DUbf4G6rpyuMjbGzlw-Duw" />
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
	    <!-- <link rel="stylesheet" href="<?= base_url()?>css/ERPVistas.css"> -->
	    <!-- PLUGINS DE JAVASCRIPT -->
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.flexslider.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.scrollUp.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/sweetalert.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/pushjs/bin/push.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Core/CoreFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/DayGridFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/InteractionFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/ListFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/TimeGridFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/BootstrapFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Plugins/MomentFullCalendar.min.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/Plugins/FullCalendar/Idioma/es.js"></script>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	    <!-- ICONO DE LA PÁGINA WEB -->
	    <link rel="shortcut icon" href="">
			<!-- Google Analytics -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156190987-1"></script>
			<script>
			  function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag("js",new Date),gtag("config","UA-156190987-1");
			</script>
	  </head>
		<body>
			<!-- SCRIPTS PERSONALIZADOS -->
			<script type="text/javascript" src="<?= base_url()?>js/ajax20191209.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/low_employee20191209.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/main20191209.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/manager20191209.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/contract_renewal20191209.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/finance20191209.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/human_resources20191209.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/employee20191209.js"></script>
			<script type="text/javascript" src="<?= base_url()?>js/executive20191209.js"></script>
			<header class="<?php if ($this -> session -> validate == "true") {
										   if ($tbl_em != "") {
												 if ($tbl_em -> id_em == 1){ print_r('bg-dark'); }
												 elseif ($tbl_em -> id_em == 2) { print_r('bg-danger'); }
												 elseif ($tbl_em -> id_em == 3) { print_r('bg-primary'); }
												 elseif ($tbl_em -> id_em == 4) { print_r('bg-success'); }
												 elseif ($tbl_em -> id_em == 5) { print_r('bg-warning'); }
												 else { print_r('bg-dark'); }
											 }else {  print_r('bg-dark'); }
										 } else { print_r('bg-dark'); } ?> navbar-dark fixed-top">
				<center>
					<a class="navbar-brand" href="#">
						<?php if (isset($this -> session -> validate)){
							if ($this -> session -> validate == "true") { ?>
								<!-- valores para ajax -->
								<input id="ap_session" class="form-control" type="hidden" name="" value="<?= $this -> session -> validate ?>">
								<input id="ap_user" class="form-control" type="hidden" name="" value="<?= $this -> session -> user ?>">
								<input id="ap_company" class="form-control" type="hidden" name="" value="<?= $tbl_em -> ruta_em ?>">
								<input id="ap_geolocation" class="form-control" type="hidden" name="" value="">
								<?php if ($tbl_em != "") {
									if ($tbl_em -> id_em == 1) { ?> AP | Consultoría Integral
									<?php }elseif ($tbl_em -> id_em == 2) { ?> Constructora AEMI
									<?php }elseif ($tbl_em -> id_em == 3) { ?> Telecomunicaciones Viales
									<?php }elseif ($tbl_em -> id_em == 4) { ?> RH Eficiencia Organizacional
									<?php }elseif ($tbl_em -> id_em == 5) { ?> S.ASSPER Seguridad Privada
									<?php }elseif ($this -> session -> type == 6) { ?> Administración
									<?php }elseif ($this -> session -> type == 7) { ?> Finanzas
									<?php } else { ?> ERP
									<?php }
								}else { ?> ERP <?php }
							}else { ?> ERP <?php }
						}else { ?> ERP <?php } ?>
					</a>
				</center>
				<div class="navbar navbar-expand-sm float-right">
					<ul class="navbar-nav">
						<?php if (isset($this -> session -> validate)){
							if ($this -> session -> validate == "true") { ?>
								<!-- <li id="btnerpMenuL" class="nav-item" style="display: none">
									<a class="nav-link" data-toggle="collapse" data-target="#collapsibleNavbar">
										<img src="<?= base_url()?>images/Icono/ERP_Icon_Menu.webp" alt="AP-Consultoria-Integral-ERP">
									</a>
								</li>
								<li id="btnerpMenuS" class="nav-item">
									<a class="nav-link" data-toggle="collapse" data-target="#collapsibleNavbar">
										<img src="<?= base_url()?>images/Icono/ERP_Icon_Menu.webp" alt="AP-Consultoria-Integral-ERP">
									</a>
								</li> -->
								<li class="nav-item">
									<span class="nav-link"> | </span>
								</li>
								<li class="nav-item">
									<a href="<?= base_url()?>" class="nav-link"> Inicio </a>
								</li>
								<li class="nav-item">
									<span class="nav-link"> | </span>
								</li>
								<li class="nav-item">
									<span class="nav-link"> Bienvenid@ <?php if ($tbl_e != "") {
											print_r($tbl_e -> nombre_e);
									}else {
										print_r('');
									} ?> </span>
								</li>
								<li class="nav-item">
									<span class="nav-link"> | </span>
								</li>
								<li class="nav-item dropdown dropleft">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="<?= base_url()?>">
										<?php if ($tbl_e != ""){ ?>
											<img src="<?= base_url()?>images/Empleado/<?= $tbl_em_ruta ?>/<?= $tbl_e -> foto_empleado_e?>" alt="AP-Consultoria-Integral-ERP" width="30px" class="rounded-circle">
										<?php } else { ?>
											<img src="<?= base_url()?>images/Icono/ERP_Icon_Emp.webp" alt="AP-Consultoria-Integral-ERP" width="30px" class="rounded-circle">
										<?php } ?>
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?= base_url()?>Erpapci/logout"> Cerrar sesión </a>
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
							<input id="ap_geolocation" class="form-control" type="hidden" name="" value="">
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
