<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
  <head>
    <title> APCIFD </title>
    <meta http-equiv='X-UA-Compatible' content='IE=11'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-grid.css">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-reboot.css">
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url()?>css/APCIestilosPrincipal.css">
    <script src="<?= base_url()?>js/bootstrap.bundle.js"></script>
    <script src="<?= base_url()?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>js/bootstrap.js"></script>
    <script src="<?= base_url()?>js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url()?>js/popper.min.js"></script>
		<script src="<?= base_url()?>js/APCIScript.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  </head>
  <body>
    <img id="apci_img_banner" src="<?php base_url()?>images/Login/APCI_Login_Banner.png" alt="apci_img_banner">
    <div id="apci_main">
      <form id="apci_main_form" class="" action="<?php base_url()?>APCILogin/ValidarLogin" method="post">
				<input id="apci_main_form_name" class="form-control" type="text" name="apci_main_form_name" value="" placeholder="Ingresa tu Usuario" required autocomplete="off" oncopy="return false" onpaste="return false">
				<input id="apci_main_form_pass" class="form-control" type="password" name="apci_main_form_pass" value="" placeholder="Ingresa tu Contraseña" required autocomplete="off" oncopy="return false" onpaste="return false">
        <span id="apci_main_form_text"> El usuario y la contraseña debe tener un rango de 3 a 10 caracteres </span><br><br>
				<input id="apci_main_form_btn" type="submit" class="btn" name="apci_main_form_btn" value="Iniciar Sesión">
			</form>
    </div>
	</body>
</html>
