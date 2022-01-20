      <?php
        if ($Banner != NULL) {
        $titulo1 = json_decode($Banner -> Titulo1, TRUE);
        $titulo2 = json_decode($Banner -> Titulo2, TRUE);
        $titulo3 = json_decode($Banner -> Titulo3, TRUE);
      ?>
      <figure class="banner">
        <img src="<?= base_url()?>images/Banner/<?= $Banner -> Imagen ?>" class="img-responsive" alt="<?= $Banner -> Imagen ?>" width="100%">
        <div class="textoBanner <?= $Banner -> Estilo?>">
          <h1 style="color:<?= $titulo1['color']?>"> <?= $titulo1['texto']?> </h1>
          <h2 style="color:<?= $titulo2['color']?>"> <?= $titulo2['texto']?> </h2>
          <h3 style="color:<?= $titulo3['color']?>"> <?= $titulo3['texto']?> </h3>
        </div>
      </figure>
      <?php } ?>
      <!---================== BARRA DE PRODUCTOS MAS VENDIDOS ====================-->
      <div class="container-fluid barraProductos">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 organizarProductos">
              <div class="btn-group float-right">
                <button id="btnGrid0" type="button" class="btn btn-light btnGrid" name="button">
                  <img id="btnIconG0" src="<?= base_url()?>images/Iconos/Oteluma_Icon_MG.png" alt="Oteluma_Icon_MG"> <span class="visible-lg visible-md visible-sm float-right"> GRID </span>
                </button>
                <button id="btnList0" type="button" class="btn btn-light btnList" name="button">
                  <img id="btnIconL0" src="<?= base_url()?>images/Iconos/Oteluma_Icon_L.png" alt="Oteluma_Icon_L"> <span class="visible-lg visible-md visible-sm float-right"> LIST </span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- PRODUCTOS MAS VENDIDOS -->
      <div class="container-fluid productos">
        <div class="container">
          <div class="row">
            <!-- BARRA DE TITULO -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tituloDestacado">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h2> <small> lo más vendido </small> </h2>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <a href="<?= base_url()?>Productos/lo-mas-vendido">
                    <button type="button" class="btn Oteluma_btn float-right" name="button"> Ver más... <i class="fas fa-angle-right"> </i></button>
                  </a>
                </div>
              </div>
              <hr>
            </div>
          </div>
          <!-- LISTA DE PRODUCTOS EN CUADRICULA -->
          <ul class="grid0 row">
            <?php foreach ($VentasProd as $row) { ?>
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
                        <button type="button" class="btn btn-outline-light btn-sm deseos" idProducto="<?= $row -> idProd?>" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Agregar a mi lista de deseos">
                          <i class="far fa-heart" aria-hidden="true"></i>
                        </button>
                        <?php if ($row -> PrecioOferta == 0) { ?>
                          <button type="button" class="btn btn-outline-light btn-sm agregarCarrito" name="button" idProducto="<?= $row -> idProd?>" imagen="<?= base_url()?>images/Productos/<?= $row -> Portada?>" tittle="<?= $row -> Titulo?>" precio="<?= $row -> Precio?>" tipo="mezcal" peso="<?= $row -> Peso?>" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Agregar al carrito de compras">
                            <i class="fas fa-shopping-cart"></i>
                          </button>
                        <?php }else { ?>
                          <button type="button" class="btn btn-outline-light btn-sm agregarCarrito" name="button" idProducto="<?= $row -> idProd?>" imagen="<?= base_url()?>images/Productos/<?= $row -> Portada?>" tittle="<?= $row -> Titulo?>" precio="<?= $row -> PrecioOferta?>" tipo="mezcal" peso="<?= $row -> Peso?>" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Agregar al carrito de compras">
                            <i class="fas fa-shopping-cart"></i>
                          </button>
                        <?php } ?>
                        <a href="#" class="pixelProducto">
                          <button type="button" class="btn btn-outline-light btn-sm" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Ver producto">
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
          <!-- LISTA DE PRODUCTOS EN LISTA -->
          <ul class="list0 row" style="display:none">
            <?php foreach ($VentasProd as $row) { ?>
              <!-- PRODUCTO -->
              <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ListProd">
                <div class="row">
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <figure>
                      <a href="<?= base_url()?>Producto/<?= $row -> Ruta ?>" class="pixelProducto">
                        <img src="<?= base_url()?>images/Productos/<?= $row -> Portada ?>" class="img-thumbnail" alt="<?= $row -> Portada ?>">
                      </a>
                    </figure>
                  </div>
                  <div class="col-lg-10 col-md-9 col-sm-6 col-xs-12">
                    <h4>
                      <small>
                        <a href="<?= base_url()?>Producto/<?= $row -> Ruta ?>" class="pixelProducto"> <?= $row -> Titulo ?>
                          <?php if ($row -> DescuentoOferta) { ?>
                            <span class="badge badge-danger fontSize float-right"> <?= $row -> DescuentoOferta?>% OFF </span>
                          <?php }else { ?>
                          <?php } ?>
                          <?php if ($row -> Nuevo) { ?>
                            <span class="badge badge-success fontSize float-right"> New </span>
                          <?php }else { ?>
                          <?php } ?>
                        </a>
                      </small>
                    </h4>
                    <p class="text-secondary"> <?= $row -> Titular ?>... </p>
                      <h2>
                        <?php if ($row -> PrecioOferta == 0) { ?>
                          <small> $<?= $row -> Precio ?> </small>
                        <?php }else { ?>
                          <small> <b class="oferta"> $<?= $row -> Precio?> </b> </small>
                          <small> $<?= $row -> PrecioOferta ?> </small>
                        <?php } ?>
                      </h2>
                      <div class="float-right enlaces">
                        <button type="button" class="btn btn-outline-light btn-sm deseos" idProducto="<?= $row -> idProd?>" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Agregar a mi lista de deseos">
                          <i class="far fa-heart" aria-hidden="true"></i>
                        </button>
                        <?php if ($row -> PrecioOferta == 0) { ?>
                          <button type="button" class="btn btn-outline-light btn-sm agregarCarrito" name="button" idProducto="<?= $row -> idProd?>" imagen="<?= base_url()?>images/Productos/<?= $row -> Portada?>" tittle="<?= $row -> Titulo?>" precio="<?= $row -> Precio?>" tipo="mezcal" peso="<?= $row -> Peso?>" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Agregar al carrito de compras">
                            <i class="fas fa-shopping-cart"></i>
                          </button>
                        <?php }else { ?>
                          <button type="button" class="btn btn-outline-light btn-sm agregarCarrito" name="button" idProducto="<?= $row -> idProd?>" imagen="<?= base_url()?>images/Productos/<?= $row -> Portada?>" tittle="<?= $row -> Titulo?>" precio="<?= $row -> PrecioOferta?>" tipo="mezcal" peso="<?= $row -> Peso?>" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Agregar al carrito de compras">
                            <i class="fas fa-shopping-cart"></i>
                          </button>
                        <?php } ?>
                        <a href="#" class="pixelProducto">
                          <button type="button" class="btn btn-outline-light btn-sm" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Ver producto">
                            <i class="far fa-eye" aria-hidden="true"></i>
                          </button>
                        </a>
                      </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <hr>
                  </div>
                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <!---================== BARRA DE PRODUCTOS MAS VISTOS ====================-->
      <div class="container-fluid barraProductos">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 organizarProductos">
              <div class="btn-group float-right">
                <button id="btnGrid1" type="button" class="btn btn-light btnGrid" name="button">
                  <img id="btnIconG1" src="<?= base_url()?>images/Iconos/Oteluma_Icon_MG.png" alt="Oteluma_Icon_MG"> <span class="visible-lg visible-md visible-sm float-right"> GRID </span>
                </button>
                <button id="btnList1" type="button" class="btn btn-light btnList" name="button">
                  <img id="btnIconL1" src="<?= base_url()?>images/Iconos/Oteluma_Icon_L.png" alt="Oteluma_Icon_L"> <span class="visible-lg visible-md visible-sm float-right"> LIST </span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- PRODUCTOS MAS VIASTOS -->
      <div class="container-fluid productos">
        <div class="container">
          <div class="row">
            <!-- BARRA DE TITULO -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 tituloDestacado">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h2> <small> lo más visto </small> </h2>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <a href="<?= base_url()?>Productos/lo-mas-visto">
                    <button type="button" class="btn Oteluma_btn float-right" name="button"> Ver más... <i class="fas fa-angle-right"> </i></button>
                  </a>
                </div>
              </div>
              <hr>
            </div>
          </div>
          <!-- LISTA DE PRODUCTOS EN CUADRICULA -->
          <ul class="grid1 row">
            <?php foreach ($VistasProd as $row) { ?>
              <!-- PRODUCTO -->
              <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ListProd">
                <div class="row">
                  <div class="col-lg-12 col-sm-12 col-xs-12">
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
                        <button type="button" class="btn btn-outline-light btn-sm deseos" idProducto="<?= $row -> idProd?>" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Agregar a mi lista de deseos">
                          <i class="far fa-heart" aria-hidden="true"></i>
                        </button>
                        <?php if ($row -> PrecioOferta == 0) { ?>
                          <button type="button" class="btn btn-outline-light btn-sm agregarCarrito" name="button" idProducto="<?= $row -> idProd?>" imagen="<?= base_url()?>images/Productos/<?= $row -> Portada?>" tittle="<?= $row -> Titulo?>" precio="<?= $row -> Precio?>" tipo="mezcal" peso="<?= $row -> Peso?>" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Agregar al carrito de compras">
                            <i class="fas fa-shopping-cart"></i>
                          </button>
                        <?php }else { ?>
                          <button type="button" class="btn btn-outline-light btn-sm agregarCarrito" name="button" idProducto="<?= $row -> idProd?>" imagen="<?= base_url()?>images/Productos/<?= $row -> Portada?>" tittle="<?= $row -> Titulo?>" precio="<?= $row -> PrecioOferta?>" tipo="mezcal" peso="<?= $row -> Peso?>" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Agregar al carrito de compras">
                            <i class="fas fa-shopping-cart"></i>
                          </button>
                        <?php } ?>
                        <a href="#" class="pixelProducto">
                          <button type="button" class="btn btn-outline-light btn-sm" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Ver producto">
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
          <!-- LISTA DE PRODUCTOS EN LISTA -->
          <ul class="list1 row" style="display:none">
            <?php foreach ($VistasProd as $row) { ?>
              <!-- PRODUCTO 1 -->
              <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <figure>
                      <a href="<?= base_url()?>Producto/<?= $row -> Ruta ?>" class="pixelProducto">
                        <img src="<?= base_url()?>images/Productos/<?= $row -> Portada ?>" class="img-thumbnail" alt="<?= $row -> Portada ?>">
                      </a>
                    </figure>
                  </div>
                  <div class="col-lg-10 col-md-9 col-sm-6 col-xs-12">
                    <h4>
                      <small>
                        <a href="<?= base_url()?>Producto/<?= $row -> Ruta ?>" class="pixelProducto"> <?= $row -> Titulo ?>
                          <?php if ($row -> DescuentoOferta) { ?>
                            <span class="badge badge-danger fontSize float-right"> <?= $row -> DescuentoOferta?>% OFF </span>
                          <?php }else { ?>
                            <!-- <span class="badge badge-danger fontSize float-right">  </span> -->
                          <?php } ?>
                          <?php if ($row -> Nuevo) { ?>
                            <span class="badge badge-success fontSize float-right"> New </span>
                          <?php }else { ?>
                            <!-- <span class="badge badge-success fontSize float-right"> </span> -->
                          <?php } ?>
                        </a>
                      </small>
                    </h4>
                    <p class="text-secondary"> <?= $row -> Titular ?>... </p>
                      <h2>
                        <?php if ($row -> PrecioOferta == 0) { ?>
                          <small> $<?= $row -> Precio ?> </small>
                        <?php }else { ?>
                          <small> <b class="oferta"> $<?= $row -> Precio?> </b> </small>
                          <small> $<?= $row -> PrecioOferta ?> </small>
                        <?php } ?>
                      </h2>
                      <div class="float-right enlaces">
                        <button type="button" class="btn btn-outline-light btn-sm deseos" idProducto="<?= $row -> idProd?>" data-toggle="popover" data-trigger="hover" data-placement="left" data-content="Agregar a mi lista de deseos">
                          <i class="far fa-heart" aria-hidden="true"></i>
                        </button>
                        <?php if ($row -> PrecioOferta == 0) { ?>
                          <button type="button" class="btn btn-outline-light btn-sm agregarCarrito" name="button" idProducto="<?= $row -> idProd?>" imagen="<?= base_url()?>images/Productos/<?= $row -> Portada?>" tittle="<?= $row -> Titulo?>" precio="<?= $row -> Precio?>" tipo="mezcal" peso="<?= $row -> Peso?>" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Agregar al carrito de compras">
                            <i class="fas fa-shopping-cart"></i>
                          </button>
                        <?php }else { ?>
                          <button type="button" class="btn btn-outline-light btn-sm agregarCarrito" name="button" idProducto="<?= $row -> idProd?>" imagen="<?= base_url()?>images/Productos/<?= $row -> Portada?>" tittle="<?= $row -> Titulo?>" precio="<?= $row -> PrecioOferta?>" tipo="mezcal" peso="<?= $row -> Peso?>" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Agregar al carrito de compras">
                            <i class="fas fa-shopping-cart"></i>
                          </button>
                        <?php } ?>
                        <a href="#" class="pixelProducto">
                          <button type="button" class="btn btn-outline-light btn-sm" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Ver producto">
                            <i class="far fa-eye" aria-hidden="true"></i>
                          </button>
                        </a>
                      </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <hr>
                  </div>
                </div>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
