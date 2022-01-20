      <!---================== RUTA ====================-->
      <div class="container-fluid productos">
        <div class="container">
          <div class="row">
            <!-- RUTAS DE ACCESO -->
            <!-- CLASE lead = PARA PONER EL TEXTO MÁS GRANDE -->
            <!-- RUTAS DE ACCESO CON LA FUNCIÓN DE REGRESAR -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <ul class="breadcrumb lead fondoBreadcrumb text-uppercase">
                <li class="breadcrumb-item"> <a href="<?= base_url()?>"> inicio </a> </li>
                <li class="pagActual breadcrumb-item active"> PERFIL </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!---=========== PERFIL DE USUARIO ==============-->
      <div class="container-fluid">
        <div class="container">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#MisCompras">
                <img src="<?= base_url()?>images/Iconos/Oteluma_Icon_MC.png" alt="Oteluma_Icon_MC">
                Mis compras
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#MiListadeDeseos">
                <img src="<?= base_url()?>images/Iconos/Oteluma_Icon_LD.png" alt="Oteluma_Icon_LD">
                Lista de deseos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#EditarMiPerfil">
                <img src="<?= base_url()?>images/Iconos/Oteluma_Icon_US.png" alt="Oteluma_Icon_US">
                Editar Perfil
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url()?>Ofertas">
                <img src="<?= base_url()?>images/Iconos/Oteluma_Icon_MO.png" alt="Oteluma_Icon_MO">
                Ver Ofertas
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <!-- MIS COMPRAS -->
            <div class="tab-pane container fade" id="MisCompras"> MC </div>
            <!-- LISTA DE DESEOS -->
            <div class="tab-pane container fade" id="MiListadeDeseos"> LD </div>
            <!-- EDITAR MI PERFIL -->
            <div class="tab-pane container active" id="EditarMiPerfil">
              <br><br>
              <form action="<?= base_url()?>Usuario/PerfilUpdate" method="post" enctype="multipart/form-data">
                <input type="text" name="idUsuario" value="<?= $_SESSION['idSesion']; ?>">
                <input type="text" name="passUsuario" value="<?= $_SESSION['passSesion']; ?>">
                <input type="text" name="fotoUsuario" value="<?= $_SESSION['fotoSesion']; ?>">
                <input type="text" name="modoUsuario" value="<?= $_SESSION['modoSesion']; ?>">
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 text-center">
                    <figure id="imgPerfil">
                      <?php
                      if ($_SESSION['modoSesion'] == 1) { ?>
                        <!-- <h1> <?= $_SESSION['fotoSesion']; ?> </h1> -->
                        <img src="<?= base_url()?>images/Usuarios/<?= $_SESSION['fotoSesion']; ?>" alt="<?= $_SESSION['fotoSesion']; ?>" class="img-thumbnail">
                        <br>
                        <input type="file" class="form-control" name="editarFoto" value="" id="editarFoto">
                      <?php }else { ?>
                        <img src="<?= $_SESSION['fotoSesion']; ?>" alt="<?= $_SESSION['fotoSesion']; ?>" class="img-thumbnail">
                      <?php } ?>
                    </figure>
                  </div>
                  <br>
                  <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <?php if ($_SESSION['modoSesion'] == 1){ ?>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label text-muted text-uppercase" for="editarNombre"> Nombre </label>
                          <div class="input-group">
                            <input type="text" value="<?= $_SESSION['nameSesion'];?>" class="form-control" name="editarNombre" id="editarNombre">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label text-muted text-uppercase" for="editarApellido"> Apellido </label>
                          <div class="input-group">
                            <input type="text" value="<?= $_SESSION['apellidoSesion'];?>" class="form-control" name="editarApellido" id="editarApellido">
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <label class="control-label text-muted text-uppercase" for="editarEmail"> Correo electrónico </label>
                          <div class="input-group">
                            <input type="text" value="<?= $_SESSION['emailSesion'];?>" class="form-control" name="editarEmail" id="editarEmail">
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label text-muted text-uppercase" for="editarPass"> Contrasña </label>
                          <div class="input-group">
                            <input type="text" value="" placeholder="Escribe la nueva contraseña" class="form-control" name="editarPass" id="editarPass">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label class="control-label text-muted text-uppercase" for="editarModo"> Modo de registro </label>
                          <div class="input-group">
                            <input type="text" value="<?php if ($_SESSION['modoSesion'] == 1) {
                              print_r('Página de OTELUMA');
                            }else if ($_SESSION['modoSesion'] == 2) {
                              print_r('Página de FACEBOOK');
                            }else {
                              print_r('Página de GOOGLE');
                            }?>" class="form-control" name="editarModo" id="editarModo" disabled>
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <input type="submit" class="btn btn-default Oteluma_Color float-left" name="" value="Actualizar datos">
                        </div>
                      </div>
                    <?php }else { ?>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <label class="control-label text-muted text-uppercase" for="editarNombre"> Nombre </label>
                          <div class="input-group">
                            <input type="text" value="<?= $_SESSION['nameSesion'];?>" class="form-control" name="editarNombre" id="editarNombre" disabled>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <label class="control-label text-muted text-uppercase" for="editarEmail"> Correo electrónico </label>
                          <div class="input-group">
                            <input type="text" value="<?= $_SESSION['emailSesion'];?>" class="form-control" name="editarEmail" id="editarEmail" disabled>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <label class="control-label text-muted text-uppercase" for="editarModo"> Modo de registro </label>
                          <div class="input-group">
                            <input type="text" value="<?php if ($_SESSION['modoSesion'] == 1) {
                              print_r('Página de OTELUMA');
                            }else if ($_SESSION['modoSesion'] == 2) {
                              print_r('Página de FACEBOOK');
                            }else {
                              print_r('Página de GOOGLE');
                            }?>" class="form-control" name="editarModo" id="editarModo" disabled>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </form>
              <br><br>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="submit" class="btn btn-outline-danger float-right" id="eliminarUsuario" name="" value="Eliminar mi cuenta">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
