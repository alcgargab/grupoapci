<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" >
  <head>
    <title> APCI Formatos Digitales </title>
    <meta http-equiv='X-UA-Compatible' content='IE=11'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="<?= base_url()?>css/bootstrap.css"> -->
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-grid.css"> -->
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-grid.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-reboot.css"> -->
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="<?= base_url()?>css/APCIestilosPrincipal.css">
    <link rel="stylesheet" href="<?= base_url()?>css/APCICssPanelAdmin.css">
    <link rel="stylesheet" href="<?= base_url()?>css/APCICssPanelUser.css">
    <link rel="stylesheet" href="<?= base_url()?>css/APCICssPanelAdminForm.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- <script src="<?= base_url()?>js/bootstrap.bundle.js"></script> -->
    <script src="<?= base_url()?>js/bootstrap.bundle.min.js"></script>
    <!-- <script src="<?= base_url()?>js/bootstrap.js"></script> -->
    <script src="<?= base_url()?>js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url()?>js/popper.min.js"></script>
    <script src="<?= base_url()?>js/pushjs/bin/push.min.js"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <link rel="shortcut icon" type="image/png" href="<?= base_url()?>images/LOGO/aemi_logo_img.png"> -->
  </head>
  <script type="text/javascript">
    $(document).ready(function(){
      var d = new Date();
      var h = d.getHours();
      var m = d.getMinutes();
      var s = d.getSeconds();
      if (h >= 6 && h < 12) {
        $("#apci_bienvenido").prepend("Buenos dias");
      }else if (h >=12 && h < 20) {
        $("#apci_bienvenido").prepend("Buenas Tardes");
      }else{
        $("#apci_bienvenido").prepend("Buenas Noches");
      }
    });
  </script>
  <body>
    <script src="<?= base_url()?>js/APCIScript.js"></script>
    <nav id="apci_menu" class="navbar navbar-expand-sm navbar-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <?php if ($this -> session -> userdata('apci_username')) {
            $sesion = $this -> session -> userdata('apci_username');?>
            <li class="nav-item">
              <a class="navbar-brand" href="<?= base_url()?>"> <span id="apci_bienvenido"> </span>  <?php echo $sesion; ?> </a>
              <!-- <a class="navbar-brand" href="<?= base_url()?>"> Bienvenido <?php echo $sesion; ?> </a> -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>APCILogin/cerrarSesion">Cerrar Sesion</a>
            </li>
          <?php }else { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>Login"> Iniciar Sesion </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
