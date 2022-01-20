<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
	  <head>
	    <title> Credenciales </title>
	    <meta http-equiv='X-UA-Compatible' content='IE=11'>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap.min.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-grid.min.css">
			<link rel="stylesheet" href="<?= base_url()?>css/bootstrap-reboot.min.css">
	    <link rel="stylesheet" href="<?= base_url()?>css/CredCSS.css">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
			<script type="text/javascript" src="<?= base_url()?>js/TeleViaScript.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/bootstrap.bundle.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/jquery-3.3.1.min.js"></script>
	    <script type="text/javascript" src="<?= base_url()?>js/popper.min.js"></script>
	    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
			<!-- <link rel="shortcut icon" type="image/png" href="<?= base_url()?>images/Logo/Tele_Via.png"> -->
	  </head>
		<body>
			<nav id="Cred_Menu" class="navbar navbar-expand-md fixed-top">
			  <a class="navbar-brand" href="#">Home</a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="collapsibleNavbar">
			    <ul id="Cred_Menu_Ul" class="navbar-nav">
			      <li class="nav-item">
			        <a id="Cred_Menu_Ul_Items" class="nav-link" href="<?= base_url()?>Credencial/APCI">APCI</a>
			      </li>
			      <li class="nav-item">
			        <a id="Cred_Menu_Ul_Items" class="nav-link" href="<?= base_url()?>Credencial/AEMI">AEMI</a>
			      </li>
			      <li class="nav-item">
			        <a id="Cred_Menu_Ul_Items" class="nav-link" href="<?= base_url()?>Credencial/RHEO">RHEO</a>
			      </li>
						<li class="nav-item">
			        <a id="Cred_Menu_Ul_Items" class="nav-link" href="<?= base_url()?>Credencial/SASSPER">S.ASSPER</a>
			      </li>
						<li class="nav-item">
			        <a id="Cred_Menu_Ul_Items" class="nav-link" href="<?= base_url()?>Credencial/TV">Telecomunicaciones Viales</a>
			      </li>
			    </ul>
			  </div>
			</nav>
