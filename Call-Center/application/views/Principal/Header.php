<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
  <head>
    <meta charset="utf-8">
    <!-- PARA INDICAR QUE VAMOS A TRABAJAR EN VARIOS DISPOSITIVOS -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="tittle" content="Exportadora de Mezcal">
    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad">
    <meta name="keyword" content="Lorem, ipsum, dolor, sit, amet, consectetur, adipisicing, elit, sed, do, eiusmod, tempor, incididunt, ut, labore, et, dolore, magna, aliqua, Ut, enim, ad">
    <title> Call Center </title>
    <meta http-equiv='X-UA-Compatible' content='IE=11'>
    <!-- PLUGINS CSS -->
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/flexslider.css">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/all.css">
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/sweetalert.min.css">
    <!-- ESTILOS PERSONALIZADAS -->
    <link rel="stylesheet" href="<?= base_url()?>css/CallGeneral.css">
    <link rel="stylesheet" href="<?= base_url()?>css/CallVistas.css">
    <!-- PLUGINS DE JAVASCRIPT -->
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/popper.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.scrollUp.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.md5.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/pushjs/bin/push.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- ICONO DE LA PÁGINA WEB -->
    <!-- <link rel="shortcut icon" href="<?= base_url()?>images/Iconos/<?php //print_r($plantilla[0] -> Icono);?>"> -->
  </head>
	<body>
    <!-- <script type="text/javascript" src="<?= base_url()?>js/CallCenter.min.js"></script> -->
    <!-- <script type="text/javascript" src="<?= base_url()?>js/ValidarAjax.min.js"></script> -->
    <script type="text/javascript" src="<?= base_url()?>js/CallCenter.js"></script>
		<script type="text/javascript" src="<?= base_url()?>js/ValidarAjax.js"></script>
    <input id="validarSesion" class="form-control" type="hidden" name="" value="<?= $this -> session -> validarSesion ?>">
