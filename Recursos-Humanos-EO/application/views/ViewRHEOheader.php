<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
	<head>
		<title> RH Eficacia Organizacional </title>
		<meta http-equiv='X-UA-Compatible' content='IE=11'>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-grid.css">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-reboot.css">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url()?>css/RHEOestilosPrincipal.css">
    <script src="<?= base_url()?>js/bootstrap.bundle.js"></script>
    <script src="<?= base_url()?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>js/bootstrap.js"></script>
    <script src="<?= base_url()?>js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url()?>js/popper.min.js"></script>
		<script src="<?= base_url()?>js/scriptPrincipal.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/png" href="<?= base_url()?>images/Logo/rheo_logo.png">
	</head>
	<body>
		<nav id="rheo_navbar" class="navbar navbar-expand-lg fixed-top">
			<a href="<?= base_url()?>"> <img id="rheo_logo_img" src="<?= base_url()?>images/Logo/rheo_logo_white.png" alt="rheo_logo_img"> </a>
      <!-- <a id="rheo_tittle" class="navbar-brand" href="<?= base_url()?>">RHEO</a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#rheo_Menu">
        <span id="rheo_menu_icon" class="fas fa-list-ul"></span>
      </button>
      <div id="rheo_Menu" class="collapse navbar-collapse pull-right">
        <ul class="navbar-nav">
          <!-- <li class="nav-item">
            <a id="rheo_menu_ul_items" class="nav-link" href="<?= base_url()?>"> Inicio </a>
          </li> -->
          <li class="nav-item">
            <a id="rheo_menu_ul_items" class="nav-link" href="#rheo-quienessomos">Quienes Somos </a>
          </li>
          <!--<li class="nav-item">
            <a id="rheo_menu_ul_items" class="nav-link" href="<?= base_url()?>index.php/Filosofia"> Bolsa de Trabajo </a>
          </li>-->
          <li class="nav-item">
            <a id="rheo_menu_ul_items" class="nav-link" href="#rheo-servicios"> Servicios </a>
          </li>
          <li class="nav-item">
            <a id="rheo_menu_ul_items" class="nav-link" href="#rheo-linea-eventos"> Eventos </a>
          </li>
          <li class="nav-item">
            <a id="rheo_menu_ul_items" class="nav-link" href="#" data-toggle="modal" data-target="#rheo_modalcontacto"> Contacto </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container" id="contacto">
      <div class="modal fade" id="rheo_modalcontacto">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-info">
              <h4 class="modal-title" style="color:rgb(255, 255, 255);">Contáctanos</h4>
              <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times" style="font-size:15px;color:rgb(255, 255, 255);"></i></button>
            </div>
            <form action="#">
              <div class="modal-body">
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light"><i class="fas fa-user" style="font-size:15px;color:rgb(44, 162, 182);"></i></span>
                    </div>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre *" name="nombre">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-light" > <i class="iconomenu fas fa-envelope" style="font-size:15px;color:rgb(44, 162, 182);"> </i> </span>
                    </div>
                    <input type="email" class="form-control" id="email" placeholder="ejemplo@ejemplo.com *" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="asunto">Asunto:</label>
                  <input type="text" class="form-control" id="asunto" placeholder="Asunto *" name="asunto">
                </div>
                <div class="form-group">
                  <label for="mensaje">Mensaje:</label>
                  <textarea class="form-control" id="mensaje" name="mensaje" rows="8" cols="80" placeholder="Mensaje"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-success">Enviar <i class="fas fa-paper-plane" style="font-size:15px;color:rgb(255, 255, 255);"></i> </button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close <i class="fas fa-times" style="font-size:15px;color:rgb(255, 255, 255);"></i> </button>
            </div>
          </div>
        </div>
      </div>
    </div>
