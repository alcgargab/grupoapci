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
    <title> Exportadora de Mezcal </title>
    <meta http-equiv='X-UA-Compatible' content='IE=11'>
    <!-- PLUGINS CSS -->
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/flexslider.css">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/all.css">
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url()?>css/Plugins/sweetalert.min.css">
    <!-- ESTILOS PERSONALIZADAS -->
    <link rel="stylesheet" href="<?= base_url()?>css/OtelumaGeneral.css">
    <link rel="stylesheet" href="<?= base_url()?>css/OtelumaHeader.css">
    <link rel="stylesheet" href="<?= base_url()?>css/OtelumaSlide.css">
    <link rel="stylesheet" href="<?= base_url()?>css/OtelumaHomepage.css">
    <link rel="stylesheet" href="<?= base_url()?>css/OtelumaProducto.css">
    <link rel="stylesheet" href="<?= base_url()?>css/OtelumaVistas.css">
    <link rel="stylesheet" href="<?= base_url()?>css/OtelumaPerfilUsuario.css">
    <!-- PLUGINS DE JAVASCRIPT -->
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="<?= base_url()?>js/Plugins/bootstrap.js"></script> -->
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/popper.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.scrollUp.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/Plugins/jquery.md5.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <!-- ICONO DE LA PÁGINA WEB -->
    <link rel="shortcut icon" href="<?= base_url()?>images/Iconos/<?php print_r($plantilla[0] -> Icono);?>">
  </head>
	<body>
    <!-- JAVASCRIPT PERSONALIZADOS -->
    <script type="text/javascript" src="<?= base_url()?>js/OtelumaScript.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/OtelumaBuscador.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/OtelumaUsuario.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/OtelumaProducto.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/OtelumaVistas.js"></script>
    <script type="text/javascript" src="<?= base_url()?>js/OtelumaRegistro.js"></script>
    <!-- API DE FACEBOOK PARA INICIO DE SESION -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '2449706668591715',
          cookie     : true,
          xfbml      : true,
          version    : 'v3.2'
        });
        FB.AppEvents.logPageView();
      };
      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }
      (document, 'script', 'facebook-jssdk'));
</script>
    <!-- HEADER UP -->
    <div id="top" class="container-fluid barra_Superior">
      <div class="container">
        <div class="row">
          <!-- SOCIAL -->
          <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">
            <ul>
              <!-- SOCIAL -->
              <?php
                $result = json_decode($plantilla[0] -> RedesSociales, TRUE);
                if ($result != "") {
                  foreach ($result as $row) { ?>
                    <li>
                      <a class="<?= $row['estilo']?>" href="<?= $row['url']?>" target="_blank"> <img class="red_Social" src="<?= base_url()?>images/Iconos/<?= $row['red']?>" alt="<?= $row['red']?>"> </a>
                    </li>
                  <?php } ?>
                <?php }else{ ?>
                  <li>
                    <span style="color: #ffffff;"> Redes Sociales </span>
                  </li>
                <?php } ?>
            </ul>
          </div>
          <!-- REGISTRO DE USUARIO -->
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">
            <ul>
              <?php if (isset($this -> session -> validarSesion)){ ?>
                <?php if ($this -> session -> validarSesion == "ok"){ ?>
                  <?php if ($this -> session -> modoSesion == 1){ ?>
                    <li> <img class="rounded-circle" src="<?= base_url()?>images/Usuarios/<?= $this -> session -> fotoSesion ?>" alt="<?= $this -> session -> fotoSesion ?>" width="15%"> </li>
                  <?php }elseif ($this -> session -> modoSesion == 2) { ?>
                    <li> <img class="rounded-circle" src="<?= $this -> session -> fotoSesion ?>" alt="<?= $this -> session -> fotoSesion ?>" width="15%"> </li>
                  <?php }else { ?>
                    <li></li>
                  <?php } ?>
                    <li> | </li>
                    <li> <a href="<?= base_url()?>Usuario/Perfil"> Ver Perfil </a> </li>
                    <li> | </li>
                    <li> <a id="btnCerrarSesion" href="<?= base_url()?>Usuario/CerrarSesion"> Cerrar Sesion </a> </li>
                <?php } ?>
              <?php }else { ?>
                <li> <a href="#" data-toggle="modal" data-target="#modalIngreso"> Ingresar </a> </li>
                <li> | </li>
                <li> <a href="#" data-toggle="modal" data-target="#modalRegistro"> Crear una Cuenta </a> </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- HEADER -->
    <header class="container-fluid">
      <div class="container asdlki">
        <div id="header_Down" class="row">
          <div id="logo" class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <center> <a href="<?= base_url()?>"> <img src="<?= base_url()?>images/Iconos/<?php print_r($plantilla[0] -> Logo);?>" alt="Oteluma_Icon_Logo"> </a> </center>
          </div>
          <div id="SelecCat" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form class="" action="<?= Base_url() ?>Productos" method="post">
                  <div class="row Otelumacat">
                    <!-- CATEGORIA -->
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6 selectcategoria">
                      <select class="form-control" name="categoria" id="categoria" required>
                        <option value="" selected> Categoria </option>
                        <?php foreach ($cat as $row){ ?>
                          <option value="<?= $row -> idCat ?>"> <?= $row -> Categoria ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                    <!-- SUBCATEGORIA -->
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6 selectsubcategoria">
                      <select class="form-control" name="subcategoria" id="subcategoria" required>
                        <option value="" selected> Subcategoria </option>
                      </select>
                    </div>
                    <!-- BOTON DE CATEGORIAS -->
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 selectbtn">
                      <input id="btn_Cat" type="submit" class="btn Oteluma_btn" name="" value="Aceptar">
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <br><br>
            <div id="searchContainer" class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- <div class="input-group mb-3">
                  <input type="search" class="form-control" placeholder="Search..." id="search" name="search">
                  <div class="input-group-append Oteluma_Color">
                    <a href="<?= base_url()?>Buscador">
                      <span class="">
                        <img src="<?= base_url()?>images/Iconos/Oteluma_Icon_S.png" alt="Oteluma_Icon_S">
                      </span>
                    </a>
                  </div>
                </div> -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <a href="<?= base_url()?>Buscador" class="input-group-text">
                      <span> <i class="fas fa-search"></i> </span>
                    </a>
                  </div>
                  <input type="search" class="form-control" placeholder="Search..." id="search" name="search">
                </div>
              </div>
            </div>
          </div>
          <div id="carrito" class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
            <a href="#">
              <button type="button" name="button" class="btn btn-default Oteluma_Color">
                <img src="<?= base_url()?>images/Iconos/Oteluma_Icon_C.png" alt="Oteluma_Icon_C">
              </button>
              <p> TU CESTA <span class="cantidad_Cesta"></span> <br> USD $ <span class="Suma_Cesta"> </span> </p>
            </a>
          </div>
        </div>
      </div>
    </header>
    <!-- REGISTRO -->
    <div class="modal fade modalFormulario" id="modalRegistro">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <!-- <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div> -->
          <div class="modal-body modalTitulo">
            <h3 class="Oteluma_Color"> Registrarse</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- REGISTRO EN FACEBOOK -->
            <div class="container">
              <div class="row">
                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 facebook"> -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 facebook">
                  <p>
                    <i class="fab fa-facebook-f"> </i>
                    Registro con Facebook
                  </p>
                </div>
                <!-- REGISTRO EN GOOGLE -->
                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 google">
                  <p>
                    <i class="fab fa-google"> </i>
                    <a href="<?= $rutaGoogle ?>"> Registro con Google </a>
                  </p>
                </div> -->
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <!-- FORMULARIO -->
                  <form class="" action="<?= base_url()?>Usuario/ValidarFormulario" onsubmit="return registroUsuario()" method="post">
                    <span id="errorForm">

                    </span>
                    <hr>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="regUsuario"> Nombre:
                            <a href="#" title="Información de ayuda" data-toggle="popover" data-trigger="hover" data-content="El usuario solo debe de tener letras."> <img src="<?= base_url()?>images/Iconos/Oteluma_Icon_Q.png" alt="Oteluma_Icon_Q"> </a>
                          </label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"> <i class="fas fa-user-alt"> </i> </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingresa tu nombre*" id="regUsuario" name="regUsuario" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label for="regUsuarioA"> Apellido:
                            <a href="#" title="Información de ayuda" data-toggle="popover" data-trigger="hover" data-content="El Apellido solo debe de tener letras."> <img src="<?= base_url()?>images/Iconos/Oteluma_Icon_Q.png" alt="Oteluma_Icon_Q"> </a>
                          </label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"> <i class="fas fa-user-alt"> </i> </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Ingresa tu Apellido*" id="regUsuarioA" name="regUsuarioA" required>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="regCorreo"> Correo electrónico:</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fas fa-envelope-open"> </i> </span>
                        </div>
                        <input type="email" class="form-control" placeholder="Ingresa tu correo completo*" id="regCorreo" name="regCorreo" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="regPassword"> Contraseña:
                        <a href="#" title="Información de ayuda" data-toggle="popover" data-trigger="hover" data-content="La contraseña debe de contener solo letras y numeros."> <img src="<?= base_url()?>images/Iconos/Oteluma_Icon_Q.png" alt="Oteluma_Icon_Q"> </a>
                        </label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fas fa-lock"> </i> </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Ingresa tu Contraseña*" id="regPassword" name="regPassword" required autocomplete="off" oncopy="return false" onpaste="return false">
                      </div>
                    </div>
                    <div class="form-group form-check">
                      <label class="form-check-label">
                        <input id="regTerminos" class="form-check-input" type="checkbox">
                        <small>
                          Al registrarse usted acepta nuestras condiciones de uso y políticas de privacidad.
                        </small>
                      </label>
                    </div>
                    <input type="hidden" name="OTELUMAmensajeOTELUMA1" id="OTELUMAmensajeOTELUMA1" value="">
                    <input type="submit" class="btn btn-default Oteluma_Color btn-block" id="btnRegistro" name="btnRegistro" value="Enviar">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            ¿Ya tienes una cuenta registrada? | <strong> <a href="#modalIngreso" data-dismiss="modal" data-toggle="modal"> Ingresar </a> </strong>
            <!-- <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- INGRESAR -->
    <div class="modal fade modalFormulario" id="modalIngreso">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-body modalTitulo">
            <h3 class="Oteluma_Color"> Ingresar </h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- REGISTRO EN FACEBOOK -->
            <div class="container">
              <div class="row">
                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 facebook"> -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 facebook">
                  <p>
                    <i class="fab fa-facebook-f"> </i>
                    Ingresar con Facebook
                  </p>
                </div>
                <!-- REGISTRO EN GOOGLE -->
                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 google">
                  <p>
                    <i class="fab fa-google"> </i>
                    <a href="<?= $rutaGoogle ?>"> Ingresar con Google </a
                  </p>
                </div> -->
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <!-- FORMULARIO -->
                  <form class="" action="<?= base_url()?>Usuario/IngresarUsuario" method="post">
                    <hr>
                    <div class="form-group">
                      <label for="ingCorreo"> Correo electrónico:</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fas fa-envelope-open"> </i> </span>
                        </div>
                        <input type="email" class="form-control" placeholder="Ingresa tu correo completo*" id="ingCorreo" name="ingCorreo" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ingPassword"> Contraseña:
                        <a href="#" title="Información de ayuda" data-toggle="popover" data-trigger="hover" data-content="La contraseña debe de contener solo letras y numeros."> <img src="<?= base_url()?>images/Iconos/Oteluma_Icon_Q.png" alt="Oteluma_Icon_Q"> </a>
                        </label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fas fa-lock"> </i> </span>
                        </div>
                        <input type="password" class="form-control" placeholder="Ingresa tu Contraseña*" id="ingPassword" name="ingPassword" required autocomplete="off">
                        <!-- <input type="password" class="form-control" placeholder="Ingresa tu Contraseña*" id="ingPassword" name="ingPassword" required autocomplete="off" oncopy="return false" onpaste="return false"> -->
                      </div>
                    </div>
                    <input type="hidden" name="OTELUMAmensajeOTELUMA2" id="OTELUMAmensajeOTELUMA2" value="">
                    <input type="submit" class="btn btn-default Oteluma_Color btn-block " id="btnIngreso" name="btnIngreso" value="Enviar">
                    <br>
                    <center>
                      <a href="#modalPassword" data-dismiss="modal" data-toggle="modal"> ¿Olvide mi contraseña? </a>
                    </center>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            ¿No tienes una cuenta registrada? | <strong> <a href="#modalRegistro" data-dismiss="modal" data-toggle="modal"> Registrarse </a> </strong>
          </div>
        </div>
      </div>
    </div>
    <!-- RECUPERAR PASSWORD -->
    <div class="modal fade modalFormulario" id="modalPassword">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-body modalTitulo">
            <h3 class="Oteluma_Color"> Solicitud de Nueva Contraseña </h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- OLVIDAR CONTRASEÑA -->
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <!-- FORMULARIO -->
                  <form class="" action="<?= base_url()?>Usuario/OlvidarPassword" onsubmit="return validarCorreoPassword()" method="post">
                    <hr>
                    <div class="form-group">
                      <label for="passCorreo"> Correo electrónico: </label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fas fa-envelope-open"> </i> </span>
                        </div>
                        <input type="email" class="form-control" placeholder="Ingresa tu correo completo*" id="passCorreo" name="passCorreo" required>
                      </div>
                    </div>
                    <input type="hidden" name="OTELUMAmensajeOTELUMA3" id="OTELUMAmensajeOTELUMA3" value="">
                    <input type="submit" class="btn btn-default Oteluma_Color btn-block " id="btnPassword" name="btnPassword" value="Enviar">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            ¿No tienes una cuenta registrada? | <strong> <a href="#modalRegistro" data-dismiss="modal" data-toggle="modal"> Registrarse </a> </strong>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        // CAMBIAR ESTILOS CON AJAX
        $.ajax({
          data : "",
          url: '<?= base_url()?>Oteluma/GetJSONData',
          type : 'post',
          success : function(response){
            var BarraSuperior = JSON.parse(response).BarraSuperior;
            var TextoSuperior = JSON.parse(response).TextoSuperior;
            var ColorFondo = JSON.parse(response).ColorFondo;
            var ColorTexto = JSON.parse(response).ColorTexto;
            $(".Oteluma_Color, .Oteluma_Color a").css({"background": ColorFondo, "color": ColorTexto});
            $(".barra_Superior, .barra_Superior a").css({"background": BarraSuperior, "color": TextoSuperior});
          }
        });
        $("#categoria").change(function(event) {
          var categoria = $(this).val();
    			$('#subcategoria').html('');
          if (categoria != "") {
            $.ajax({
              url : '<?= base_url() ?>Oteluma/GetSubCat/'+categoria,
              beforeSend : function(){
                $("#btn_Cat").val("Procesando");
              },
              success : function(respuesta){
                $("#subcategoria").append('<option value=""> Subcategoria </option>');
                $("#subcategoria").append(respuesta);
                $("#btn_Cat").val("Aceptar");
              }
            });
          } else{
            $("#subcategoria").append(' <option value=""> Subcategoria </option>');
            $("#btn_Cat").val("Aceptar");
          }
        });
      });
    </script>
