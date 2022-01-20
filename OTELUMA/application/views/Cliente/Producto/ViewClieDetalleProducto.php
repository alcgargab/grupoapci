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
                <li class="pagActual breadcrumb-item active">
                  <?php if ($subCatP == "lo-mas-vendido") {
                    print_r("lo más vendido");
                  }elseif ($subCatP == "lo-mas-visto") {
                    print_r("lo más visto");
                  }else {
                    // print_r($subCatP -> Ruta);
                    print_r($subCatP);
                  } ?>
                </li>
                <?php $multimedia = json_decode($producto -> Multimedia, true);?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!---================== PRODUCTO ====================-->
      <div class="container-fluid infoProducto">
        <div class="container">
          <div class="row">
            <!---================== VISOR DE IMAGENES ====================-->
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 visorImg">
              <figure class="visor">
                <?php if (isset($multimedia)) {
                  for ($i=0; $i < count($multimedia); $i++) { ?>
                    <img id="lupa<?= $i+1?>" class="img-thumbnail" src="<?= base_url()?>images/Productos/Detalle/<?= $multimedia[$i]['imagen']; ?>" alt="<?= $multimedia[$i]['imagen']; ?>">
                  <?php }
                }else {
                  for ($i=0; $i < 5; $i++) { ?>
                    <img id="lupa<?= $i+1?>" class="img-thumbnail" src="<?= base_url()?>images/Iconos/Oteluma_Icon_Im.png" alt="Oteluma_Icon_Im.png">
                  <?php }
                } ?>
              </figure>
              <div class="flexslider carousel">
                <ul class="slides">
                  <?php
                  if (isset($multimedia)) {
                    for ($i=0; $i < count($multimedia) ; $i++) {?>
                      <li>
                        <img value="<?= $i+1?>" class="img-thumbnail" src="<?= base_url()?>images/Productos/Detalle/<?= $multimedia[$i]['imagen']?>" alt="<?= $multimedia[$i]['imagen']?>">
                      </li>
                    <?php }
                  }else {
                    for ($i=0; $i < 5 ; $i++) {?>
                      <li>
                        <img value="<?= $i+1?>" class="img-thumbnail" src="<?= base_url()?>images/Iconos/Oteluma_Icon_Im1.png" alt="Oteluma_Icon_Im1.png">
                      </li>
                    <?php }
                  } ?>
                </ul>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 visorImg">
              <div class="row">
                <!-- REGRESAR A LA TIENDA -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h6> <a href="javascript:history.back()" class="text-muted">
                    <i class="fa fa-reply"> </i> Continuar comprando
                  </a> </h6>
                </div>
                <!-- COMPARTIR EN REDES SOCIALES -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h6> <a class="dropdown-toggle float-right text-muted" href="#" data-toggle="dropdown"> <i class="fa fa-plus"></i> Compartir</a>
                    <ul class="dropdown-menu float-right compartirRedes">
                      <li class="dropdown-item">
                        <p class="btnFacebook"> <i class="fab fa-facebook-f"></i> Facebook</p>
                      </li>
                      <li class="dropdown-item">
                        <p class="btnGoogle"> <i class="fab fa-google"></i> Google</p>
                      </li>
                    </ul>
                  </h6>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="clearfix"> </div>
                  <!---================== PRODUCTO ====================-->
                  <!-- ID DEL PRODUCTO -->
                  <input type="hidden" name="idProd" id="idProd" class="idProd" value="<?= $producto -> idProd?>">
                  <!-- URL -->
                  <input type="hidden" name="base" class="base" id="base" value="<?= base_url()?>">
                  <!-- TITULO DEL PRODUCTO -->
                  <?php if ($producto -> Oferta == 0){
                    if ($producto -> Nuevo == 0) { ?>
                      <h1 class=" productoTitulo text-muted text-uppercase"> <?= $producto -> Titulo ?> </h1>
                    <?php }else { ?>
                      <h1 class=" productoTitulo text-muted text-uppercase"> <?= $producto -> Titulo ?>
                        <small> <span class="badge float-right badge-pill badge-success"> New </span> </small>
                      </h1>
                    <?php }
                  }else {
                    if ($producto -> Nuevo == 0) { ?>
                      <h1 class=" productoTitulo text-muted text-uppercase"> <?= $producto -> Titulo ?>
                        <small> <span class="badge float-right badge-pill badge-danger"> <?= $producto -> DescuentoOferta ?>% off </span> </small>
                      </h1>
                    <?php }else { ?>
                      <h1 class=" productoTitulo text-muted text-uppercase"> <?= $producto -> Titulo ?>
                        <small> <span class="badge float-right badge-pill badge-danger"> <?= $producto -> DescuentoOferta ?>% off </span> </small>
                        <small> <span class="badge float-right badge-pill badge-success"> New </span> </small>
                      </h1>
                    <?php }
                  } ?>
                  <!-- PRECIO DEL PRODUCTO -->
                  <?php if ($producto -> Oferta == 0){?>
                    <h2 class="text-muted"> USD $<?= $producto -> Precio?> </h2>
                  <?php }else { ?>
                    <h2 class="text-muted">
                      <span> <strong class="oferta"> USD $<?= $producto -> Precio?> </strong> </span>
                      <span> $<?= $producto -> PrecioOferta ?> </span>
                    </h2>
                  <?php }?>
                  <!-- DESCRIPCIÓN DEL PRODUCTO -->
                  <p> <?= $producto -> Descripcion?> </p>
                  <!-- CARACTERISTICAS DEL PRODUCTO -->
                  <hr>
                  <div class="form-group row">
                    <?php if ($producto -> Detalles != null){
                      $detalles = json_decode($producto -> Detalles, true);?>
                      <br>
                      <ul class="list-group">
                        <li class="list-group-item list-group-item-action"> <strong> Añejamiento: </strong> <?= $detalles['Añejado']?>. </li>
                        <li class="list-group-item list-group-item-action"> <strong> Tamaño: </strong> <?= $detalles['Tamaño']?>. </li>
                        <li class="list-group-item list-group-item-action"> <strong> Tipo de Agave: </strong> <?= $detalles['Agave']?>. </li>
                      </ul>
                    <?php } ?>
                  </div>
                  <!-- ENTREGA -->
                  <?php if ($producto -> Entrega != 0){ ?>
                    <h4 id="Entrega1" class="col-lg-12 col-md-12 col-sm-0 col-xs-0 lead">
                      <hr>
                      <span class="badge badge-secondary">
                        <i style="margin-right:10px;" class="fas fa-clock"> </i>
                        <?= $producto -> Entrega?> días hábiles para la entrega |
                        <i style="margin: 0px 10px;" class="fas fa-shopping-cart"></i>
                        <?= $producto -> Ventas?> Ventas |
                        <i style="margin: 0px 10px;" class="fas fa-eye"></i>
                        Visto por <span class="vistas"> <?= $producto -> Vistas?> </span> personas
                      </span>
                    </h4>
                    <h4 id="Entrega2" class="col-lg-0 col-md-0 col-sm-12 col-xs-12 lead">
                      <hr>
                      <small>
                        <i style="margin-right:10px;" class="fas fa-clock"></i>
                        <?= $producto -> Entrega?> días hábiles para la entrega <br>
                        <i style="margin: 0px 10px;" class="fas fa-shopping-cart"></i>
                        <?= $producto -> Ventas?> Ventas <br>
                        <i style="margin: 0px 10px;" class="fas fa-eye"></i>
                        Visto por <span class="vistas"> <?= $producto -> Vistas?> </span> personas
                      </small>
                    </h4>
                  <?php } ?>
                  <!-- BOTONES DE COMPRA -->
                  <div class="row btnCompraProdcuto">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <button class="btn btn-outline-success btn-block btn-lg" type="button" name="button"> <i class="fas fa-credit-card"></i> Comprar ahora </button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <button class="btn btn-outline-info btn-block btn-lg" type="button" name="button"> <i class="fas fa-cart-plus"></i> Agregar al carrito </button>
                    </div>
                  </div>
                  <!---================== ZONA DE LA LUPA ====================-->
                  <figure class="lupa">
                    <img src="">
                  </figure>
                </div>
              </div>
            </div>
          </div>
          <!-- ZONA DE COMENTARIOS -->
          <br>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#home"> COMENTARIOS 3</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#"> Ver más</a>
                </li>
                <li class="nav-item float-right">
                  <a class="nav-link text-muted" data-toggle="tab" href="#"> PROMEDIO DE CALIFICACIÓN: 3.5 |
                    <i class="fas fa-star text-success">  </i>
                    <i class="fas fa-star text-success">  </i>
                    <i class="fas fa-star text-success">  </i>
                    <i class="fas fa-star-half-alt text-success"></i>
                    <i class="far fa-star text-success">  </i>
                  </a>
                </li>
              </ul>
              <br>
              <div class="row comentarios">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="card">
                    <div class="card-header text-uppercase">
                      Gabriel Alcaraz
                      <span class="text-right">
                        <img class="float-right" class="float-right" src="<?= base_url()?>images/Usuarios/Oteluma_Icon_U.png" alt="Oteluma_Icon_U.png">
                      </span>
                    </div>
                    <div class="card-body">
                      <small> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </small>
                    </div>
                    <div class="card-footer">
                      <i class="fas fa-star text-success">  </i>
                      <i class="fas fa-star text-success">  </i>
                      <i class="fas fa-star text-success">  </i>
                      <i class="fas fa-star-half-alt text-success"></i>
                      <i class="far fa-star text-success">  </i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="card">
                    <div class="card-header text-uppercase">
                      Gabriel Alcaraz
                      <span class="text-right">
                        <img class="float-right" src="<?= base_url()?>images/Usuarios/Oteluma_Icon_U.png" alt="Oteluma_Icon_U.png">
                      </span>
                    </div>
                    <div class="card-body">
                      <small> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </small>
                    </div>
                    <div class="card-footer">
                      <i class="fas fa-star text-success">  </i>
                      <i class="fas fa-star text-success">  </i>
                      <i class="fas fa-star text-success">  </i>
                      <i class="fas fa-star text-success"></i>
                      <i class="far fa-star text-success">  </i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="card">
                    <div class="card-header text-uppercase">
                      Gabriel Alcaraz
                      <span class="text-right">
                        <img class="float-right" src="<?= base_url()?>images/Usuarios/Oteluma_Icon_U.png" alt="Oteluma_Icon_U.png">
                      </span>
                    </div>
                    <div class="card-body">
                      <small> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </small>
                    </div>
                    <div class="card-footer">
                      <i class="fas fa-star text-success">  </i>
                      <i class="fas fa-star text-success">  </i>
                      <i class="far fa-star text-success">  </i>
                      <i class="far fa-star text-success"></i>
                      <i class="far fa-star text-success">  </i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="card">
                    <div class="card-header text-uppercase">
                      Gabriel Alcaraz
                      <span class="text-right">
                        <img class="float-right" src="<?= base_url()?>images/Usuarios/Oteluma_Icon_U.png" alt="Oteluma_Icon_U.png">
                      </span>
                    </div>
                    <div class="card-body">
                      <small> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </small>
                    </div>
                    <div class="card-footer">
                      <i class="far fa-star text-success">  </i>
                      <i class="far fa-star text-success">  </i>
                      <i class="far fa-star text-success">  </i>
                      <i class="far fa-star text-success"></i>
                      <i class="far fa-star text-success">  </i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!---================== VISOR DE VIDEO ====================-->
          <!-- <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="videoPresentacion" src="https://www.youtube.com/embed/dzzos1MSHXA?rel=0&autoplay=0" width="100%" height="415px" frameborder="0" allowfullscreen></iframe>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="row"> -->
                <!-- REGRESAR A LA TIENDA -->
                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <h6> <a href="javascript:history.back()" class="text-muted">
                    <i class="fa fa-reply"> </i> Continuar comprando
                  </a> </h6>
                </div> -->
                <!-- COMPARTIR EN REDES SOCIALES -->
                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <h6> <a class="dropdown-toggle float-right text-muted" href="#" data-toggle="dropdown"> <i class="fa fa-plus"></i> Compartir</a>
                    <ul class="dropdown-menu float-right compartirRedes">
                      <li class="dropdown-item">
                        <p class="btnFacebook"> <i class="fab fa-facebook-f"></i> Facebook</p>
                      </li>
                      <li class="dropdown-item">
                        <p class="btnGoogle"> <i class="fab fa-google"></i> Google</p>
                      </li>
                    </ul>
                  </h6>
                </div>
              </div>
            </div>
          </div> -->
          <hr>
        </div>
      </div>
      <br><br>
      <!-- ARTICULOS RELACIONADOS -->
      <div class="container-fluid productos">
        <div class="container">
          <div class="row">
            <!-- BARRA DE TITULO -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tituloDestacado">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h2> <small> productos relacionados </small> </h2>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <form class="" action="<?= base_url()?>Productos" method="post">
                    <input type="hidden" class="form-control" name="subcategoria" id="subcategoria1" value="<?= $subCat -> idSubCat?>">
                    <!-- <a href="<?= base_url()?>Productos/lo-mas-vendido"> -->
                      <!-- <button type="button" class="btn Oteluma_btn float-right" name="button"> Ver más... <i  class="fas fa-angle-right"> </i></button> -->
                      <input type="submit" class="btn Oteluma_btn float-right" name="button" value="Ver más...">
                    <!-- </a> -->
                </form>
                </div>
              </div>
              <hr>
            </div>
          </div>
          <?php if (isset($subCatProductos)){ ?>
            <!-- LISTA DE PRODUCTOS EN CUADRICULA -->
            <ul class="grid0 row">
              <?php foreach ($subCatProductos as $row) { ?>
                <!-- PRODUCTO -->
                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ListProd">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <figure>
                        <a href="<?= base_url()?>Producto/<?= $row -> Ruta ?>" class="pixelProducto">
                          <img src="<?= base_url()?>images/Productos/<?= $row -> Portada?>" class="img-thumbnail" alt="<?= $row -> Portada?>">
                        </a>
                      </figure>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <h4>
                        <small>
                          <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                              <center> <a href="<?= base_url()?>Producto/<?= $row -> Ruta ?>" class="pixelProducto"> <?= $row -> Titulo ?> </a> </center>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                              <center>
                                <?php if ($row -> DescuentoOferta != 0) { ?>
                                  <span class="badge badge-danger fontSize float-right"> <?= $row -> DescuentoOferta?>% OFF </span>
                                <?php }else { ?>
                                <?php } ?>
                                <?php if ($row -> Nuevo) { ?>
                                  <span class="badge badge-success fontSize float-right"> New </span>
                                <?php }else { ?>
                                <?php } ?>
                              </center>
                            </div>
                          </div>
                        </small>
                      </h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 precio">
                          <h2>
                            <?php if ($row -> PrecioOferta == 0) { ?>
                              <small> $<?= $row -> Precio ?> </small>
                            <?php }else { ?>
                              <small> <b class="oferta"> $<?= $row -> Precio?> </b> </small>
                              <small> $<?= $row -> PrecioOferta ?> </small>
                            <?php } ?>
                          </h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 enlaces">
                          <button type="button" class="btn btn-outline-light btn-sm deseos" idProducto="<?= $row -> idProd?>" data-toggle="tooltip" data-placement="bottom" title="Agregar a mi lista de deseos">
                            <i class="far fa-heart" aria-hidden="true"></i>
                          </button>
                          <?php if ($row -> PrecioOferta == 0) { ?>
                            <button type="button" class="btn btn-outline-light btn-sm agregarCarrito" name="button" idProducto="<?= $row -> idProd?>" imagen="<?= base_url()?>images/Productos/<?= $row -> Portada?>" tittle="<?= $row -> Titulo ?>" precio="<?= $row -> Precio?>" tipo="mezcal" peso="<?= $row -> Peso?>" data-toggle="tooltip" data-placement="bottom" title="Agregar al carrito de compras">
                              <i class="fas fa-shopping-cart"> </i>
                            </button>
                          <?php }else { ?>
                            <button type="button" class="btn btn-outline-light btn-sm agregarCarrito" name="button" idProducto="<?= $row -> idProd?>" imagen="<?= base_url()?>images/Productos/<?= $row -> Portada?>" tittle="<?= $row -> Titulo ?>" precio="<?= $row -> PrecioOferta?>" tipo="mezcal" peso="<?= $row -> Peso?>" data-toggle="tooltip" data-placement="bottom" title="Agregar al carrito de compras">
                              <i class="fas fa-shopping-cart"> </i>
                            </button>
                          <?php } ?>
                          <a href="#" class="pixelProducto">
                            <button type="button" class="btn btn-outline-light btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver producto">
                              <i class="far fa-eye" aria-hidden="true"></i>
                            </button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              <?php } ?>
            </ul>
          <?php }else { ?>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 error404">
                <center>
                  <h1> <small> ¡Oops! </small> </h1>
                  <h2> No existen productos relacionados </h2>
                </center>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
