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
      <title> Telecomunicaciones Viales </title>
      <meta http-equiv='X-UA-Compatible' content='IE=11'>
			<!-- PLUGINS CSS -->
			<link rel="stylesheet" href="<?= base_url()?>css/Plugins/bootstrap.css">
	    <!-- FONTAWESOME -->
	    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/all.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/fontawesome.css">
			<!-- ESTILOS PERSONALIZADAS -->
			<link rel="stylesheet" href="<?= base_url()?>css/TeleviaGeneral.css">
			<link rel="stylesheet" href="<?= base_url()?>css/Televia.css">
			<link rel="stylesheet" href="<?= base_url()?>css/TeleviaVistas.css">
			<!-- <link rel="stylesheet" href="<?= base_url()?>css/TeleviaGeneral.min.css">
			<link rel="stylesheet" href="<?= base_url()?>css/Televia.min.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/TeleviaVistas.min.css"> -->
			<!-- PLUGINS DE JAVASCRIPT -->
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/bootstrap.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/popper.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.scrollUp.min.js"></script>						
			<!-- ICONO DE LA PÁGINA WEB -->
			<link rel="shortcut icon" type="image/png" href="<?= base_url()?>images/Logo/Tele_Via.png">
			<!-- reCAPTCHA -->
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	  </head>
		<!-- <header>
			<div id="barracookies" style="position: fixed; left: 0px; right: 0px; bottom: 0px; width: 100%; min-height: 80px; background: #3757a4; color: #ffffff; z-index: 99999; display: block">
				<div style="width: 100%; position: absolute; padding-left: 5px; font-family: verdana; font-size: 15px; top: 40%; text-align: center">
					Usamos cookies propias y de terceros para ayudarte en tu navegación. Si continúas navegando consideramos que aceptas el uso de cookies.
					<button id="btnCookies" type="button" class="btn" name="button"> Aceptar </button>
				</div>
			</div>
		</header> -->
	<body>
		<!-- JAVASCRIPT PERSONALIZADOS -->
		<script type="text/javascript" src="<?= base_url()?>js/TViales.js"></script>
		<nav id="televia_menu" class="navbar navbar-expand-md fixed-top">
		  <!-- <a id="televia_items_tittle" class="navbar-brand" href="#">TeleVia</a> -->
			<a href="<?= base_url()?>"> <img id="televia_menu_logo" src="<?= base_url()?>images/Logo/Tele_Via2.png" alt=""> </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		    <span id="televia_menu_icon" class="fas fa-list-ul"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="collapsibleNavbar">
		    <ul class="navbar-nav">
		      <li class="nav-item">
						<a id="televia_items" class="nav-link" href="<?= base_url()?>QuienesSomos">QUIÉNES SOMOS</a>
		      </li>
					<?php foreach ($oportunidad as $row) { ?>
						<li class="nav-item">
							<input id="televia_id_item_oportunidad" type="hidden" name="televia_id_item_oportunidad" value="<?php print_r($row -> id_oportunidad);?>">
			        <a id="televia_items" class="nav-link" href="<?= base_url()?>Servicio/<?= $row -> Ruta ?>"> <?= $row -> oportunidad?> </a>
			      </li>
          <?php } ?>
		    </ul>
		  </div>
		</nav>
