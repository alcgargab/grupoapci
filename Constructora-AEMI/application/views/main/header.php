<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es">
    <head>
      <meta charset="utf-8">
      <!-- PARA INDICAR QUE VAMOS A TRABAJAR EN VARIOS DISPOSITIVOS -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <meta name="tittle" content="Constructora | AEMI">
      <meta name="description" content="Somos una empres 100% mexicana con 12 años de experiencia, dedicada a satisfacer a nuestr clientes en todo tipo de servicios. Lo más importante para nossotros es poder brindarle rapidez y calidad sin que esto se traduzca en altos costos.">
      <meta name="keyword" content="Construcción, Mantenimiento, Limpieza, Hidronuemáticos, Hidrosanitarios, Jardinería, Fumigación, Franslux, Proteinasyoleicos, AIG, FUNO, PARKS, PierreFabre, Altesa, Carters, Limpiezaenaltura, Limpiezaperiodica, Limpiezageneral, Limpiezaespecial, Desaguetotaldeltanque, Cuantipark, Limpiezadetableros, Instalacioneshidraulicas, Instalacionessanitarias, Mantenimientodeequipodebombeo, Tultipark, Construcción, Proyectos, Remodelaciondeinterioresyexteriores, Acabados, Mantenimientoengeneral, Instalaciones, RedPark, Limpiezaenjardines, Mantenimientodejardines, Diseñoyconstrucción, Diseñoymantenimientodejardines, Plazasoriana, Desinsectación, Desratización, Desinfectación, Insectocutores">
      <title> Constructora | AEMI </title>
      <meta http-equiv='X-UA-Compatible' content='IE=11'>
      <!-- PLUGINS CSS -->
      <link rel="stylesheet" href="<?= base_url()?>css/Plugins/bootstrap.css">
      <!-- FONTAWESOME -->
      <link rel="stylesheet" href="<?= base_url()?>css/Plugins/all.css">
      <link rel="stylesheet" href="<?= base_url()?>css/Plugins/fontawesome.css">
      <link rel="stylesheet" href="<?= base_url()?>css/Plugins/sweetalert.min.css">
      <!-- ESTILOS PERSONALIZADAS -->
      <link rel="stylesheet" href="<?= base_url()?>css/main.min.css">
      <link rel="stylesheet" href="<?= base_url()?>css/menu.min.css">
      <link rel="stylesheet" href="<?= base_url()?>css/home.min.css">
      <link rel="stylesheet" href="<?= base_url()?>css/services.min.css">
      <link rel="stylesheet" href="<?= base_url()?>css/category.min.css">
      <link rel="stylesheet" href="<?= base_url()?>css/contact.min.css">
      <link rel="stylesheet" href="<?= base_url()?>css/footer.min.css">
      <link rel="stylesheet" href="<?= base_url()?>css/responsive.min.css">
      <!-- PLUGINS DE JAVASCRIPT -->
      <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.min.js"></script>
      <!-- <script type="text/javascript" src="<?= base_url()?>js/Plugins/bootstrap.js"></script> -->
      <script type="text/javascript" src="<?= base_url()?>js/Plugins/popper.js"></script>
      <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.flexslider.js"></script>
      <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.scrollUp.min.js"></script>
      <script type="text/javascript" src="<?= base_url()?>js/Plugins/sweetalert.min.js"></script>
      <!-- <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.md5.js"></script> -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <!-- logo -->
      <link rel="shortcut icon" type="image/png" href="<?= base_url()?>images/Logo/caemi_logo_aemi.webp">
      <!-- reCAPTCHA -->
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
      <!-- scripts personalizados -->
      <script src="<?= base_url()?>js/main.min.js"></script>
      <nav class="navbar navbar-expand-sm aemi-nav">
        <a class="navbar-brand" href="<?= base_url()?>">
          <div class="ctn-Logo">
            <center> <img src="<?= base_url()?>images/Logo/caemi_logo_aemi.webp" alt="AEMI Logo"> </center>
          </div>
        </a>
        <div class="container aemi-items">
          <div class="col-12">
            <div class="row navbar-nav">
              <div class="nav-item col-5 offset-1 aemi-item-servicio">
                <center>
                  <a class="nav-link" href="<?= base_url()?>servicios"> <?= $items[0] -> item_h ?> </a>
                </center>
              </div>
              <div class="nav-item col-5 offset-1 aemi-item-contacto">
                <center>
                  <a class="nav-link" href="<?= base_url()?>contacto"> <?= $items[1] -> item_h ?> </a>
                </center>
              </div>
            </div>
          </div>
        </div>
      </nav>
