<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
	  <head>
	    <title> Ropa Tradicional de Oaxaca </title>
	    <meta http-equiv='X-UA-Compatible' content='IE=11'>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap.min.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-grid.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-grid.min.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-reboot.css">
			<link rel="stylesheet" href="<?= base_url()?>css/bootstrap-reboot.min.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/ATQRAPrincipal.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
			<!-- <script type="text/javascript" src="<?= base_url()?>js/ANTEQUERAScript.js"></script> -->
	    <script type="text/javascript" src="<?= base_url()?>js/bootstrap.bundle.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/bootstrap.bundle.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/bootstrap.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/jquery-3.3.1.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/popper.min.js"></script>
	    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
			<link rel="shortcut icon" type="image/png" href="<?= base_url()?>images/Logo/Logo_antequera.png">
	  </head>
		<script type="text/javascript">
		// var position = $(window).scrollTop();
		// $(window).scroll(function() {
		// 	var scroll = $(window).scrollTop();
		// 	if(position >= 50) {
				// $("#ATQRA_Menu_logo").css("width","150px");
				// $("#ATQRA_Menu_logo").css("margin-left","400px");
				// $("#ATQRA_Menu_logo").attr("src","<?=base_url()?>images/Logo/Logo_antequera.png");
				// $("#ATQRA_Menu_item").css("margin-left","100px");
			// }else {
				// $("#ATQRA_Menu_logo").css("width","200px");
				// $("#ATQRA_Menu_logo").css("margin-left","350px");
				// $("#ATQRA_Menu_logo").attr("src","<?=base_url()?>images/Logo/Logo_antequera_letras.png");
				// $("#ATQRA_Menu_item").css("margin-left","100px");
			}
			// if (position >=730) {
			// 	$("#ATQRA_Menu").css("background-color","rgb(146, 34, 31, 0.8)");
			// }else{
			// 	$("#ATQRA_Menu").css("background-color","rgb(146, 34, 31, 0.4)");
			// }
		// 	position = scroll;
		// });
			// $(document).ready(function($){
			// 	var position = $(window).scrollTop();
			// 	var scroll = $(window).scrollTop();
			// 	var ventana_ancho = $(window).width();
			// 	var ventana_alto = $(window).height();
			// 	if (ventana_ancho > 768) {
			// 		if(position >= 50) {
			// 			$("#ATQRA_Menu_logo").css("width","150px");
			// 			$("#ATQRA_Menu_logo").css("margin-left","400px");
			// 			$("#ATQRA_Menu_logo").attr("src","<?=base_url()?>images/Logo/Logo_antequera.png");
			// 			$("#ATQRA_Menu_item").css("margin-left","100px");
			// 		}else {
			// 			$("#ATQRA_Menu_logo").css("width","200px");
			// 			$("#ATQRA_Menu_logo").css("margin-left","350px");
			// 			$("#ATQRA_Menu_logo").attr("src","<?=base_url()?>images/Logo/Logo_antequera_letras.png");
			// 			$("#ATQRA_Menu_item").css("margin-left","100px");
			// 		}
			// 		if (position >=730) {
			// 			$("#ATQRA_Menu").css("background-color","rgb(146, 34, 31, 0.8)");
			// 		}else{
			// 			$("#ATQRA_Menu").css("background-color","rgb(146, 34, 31, 0.4)");
			// 		}
			// 	}else if(ventana_ancho <=768){
			// 		if(position >= 50) {
			// 			$("#ATQRA_Menu_logo").css("width","150px");
			// 			$("#ATQRA_Menu_logo").css("margin-left","150px");
			// 			$("#ATQRA_Menu_logo").attr("src","<?=base_url()?>images/Logo/Logo_antequera.png");
			// 			$("#ATQRA_Menu_item").css("margin-left","100px");
			// 		}else {
			// 			$("#ATQRA_Menu_logo").css("width","200px");
			// 			$("#ATQRA_Menu_logo").css("margin-left","150px");
			// 			$("#ATQRA_Menu_logo").attr("src","<?=base_url()?>images/Logo/Logo_antequera_letras.png");
			// 			$("#ATQRA_Menu_item").css("margin-left","100px");
			// 		}
			// 		if (position >=730) {
			// 			$("#ATQRA_Menu").css("background-color","rgb(146, 34, 31, 0.8)");
			// 		}else{
			// 			$("#ATQRA_Menu").css("background-color","rgb(146, 34, 31, 0.4)");
			// 		}
			// 	}
			// 	alert(ventana_ancho);
			// 	alert(ventana_alto)
			// });
		</script>
		<body>
			<nav id="ATQRA_Menu" class="navbar navbar-expand-md fixed-top">
				<a class="navbar-brand" href="<?= base_url()?>"> <img id="ATQRA_Menu_logo" src="<?=base_url()?>images/Logo/Logo_antequera.png" alt="Logo_antequera" class="navbar-brand"> </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ATQRA_Menu_item">
					<span id="ATQRA_Menu_icon" class="fas fa-list-ul"></span>
				</button>
				<div id="ATQRA_Menu_item" class="collapse navbar-collapse">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a id="ATQRA_Menu_items" class="nav-link" href="<?= base_url()?>Antequera/Mujer">Mujer</a>
						</li>
						<li class="nav-item">
							<a id="ATQRA_Menu_items" class="nav-link" href="<?= base_url()?>Antequera/Hombre">Hombre</a>
						</li>
						<li class="nav-item">
							<a id="ATQRA_Menu_items" class="nav-link" href="<?= base_url()?>Antequera/Kids">Niños</a>
						</li>
						<li class="nav-item">
							<a id="ATQRA_Menu_items" class="nav-link" href="<?= base_url()?>Antequera/Accesorios">Accesorios</a>
						</li>
						<li class="nav-item">
							<a id="ATQRA_Menu_items" class="nav-link" href="<?= base_url()?>Antequera/Contacto">Contacto</a>
						</li>
					</ul>
				</div>
			</nav>
