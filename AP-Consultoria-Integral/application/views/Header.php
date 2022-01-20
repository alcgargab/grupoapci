<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
  <head>
    <meta charset="utf-8">
    <!-- PARA INDICAR QUE VAMOS A TRABAJAR EN VARIOS DISPOSITIVOS -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1, user-scalable=yes">
    <meta name="tittle" content="AP | Consultoria Integral">
    <meta name="author" content="Asesores Profesionales Consultoria Integral">
    <meta name="description" content="Nos enfocamos en satisfacer las necesidades de nuestros clientes para ofrecerles soluciones personalizadas.">
    <meta name="keyword" content="asesores, profesionales, consultoria, integral, mantenimiento, seguridad, privada, telecomunicaciones, calidad, recursos, humanos,">
    <title> AP | Consultoria Integral </title>
    <meta http-equiv='X-UA-Compatible' content='IE=11'>
    <!-- PLUGINS CSS -->
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/bootstrap.css">
		<!-- FONTAWESOME -->
    <!-- <link rel="stylesheet" href="<?= base_url()?>css/Plugins/all.min.css"> -->
		<!-- ESTILOS PERSONALIZADAS -->
    <link rel="stylesheet" href="<?= base_url()?>css/usually.css">
    <link rel="stylesheet" href="<?= base_url()?>css/Business.css">
		<link rel="stylesheet" href="<?= base_url()?>css/Responsive.css">
		<!-- PLUGINS DE JAVASCRIPT -->
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/b236cc8ae2.js" crossorigin="anonymous"></script>
    <!-- LOGO -->
    <link rel="shortcut icon" type="image/png" href="<?= base_url()?>images/Logo/apci_logo.png">
    <!-- GOOGLE ANALYTICS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143101913-1"></script>
    <script>
    function gtag(){dataLayer.push(arguments)}window.dataLayer=window.dataLayer||[],gtag("js",new Date),gtag("config","UA-143101913-1");
    </script>
	</head>
	<body>
		<!-- JAVASCRIPT PERSONALIZADOS -->
    <script type="text/javascript" src="<?= base_url()?>js/main.js"></script>
    <ul class="nav justify-content-center ap-nav">
      <li class="nav-item">
        <a href="<?= base_url()?>nosotros" class="nav-link <?php if ($empresas == 'false' && $nosotros == 'true'){
          print_r('ap-active');
        }
        else {
          print_r('');
        }?>"> nosotros </a>
      </li>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="nav-item">
        <a href="<?= base_url()?>empresas" class="nav-link <?php if ($empresas == 'true' && $nosotros == 'false'){
          print_r('ap-active');
        }
        else {
          print_r('');
        }?>"> apci empresas </a>
      </li>
    </ul>
