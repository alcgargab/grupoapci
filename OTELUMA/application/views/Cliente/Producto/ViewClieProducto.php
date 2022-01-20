<?php
  // print_r(json_decode($Banner -> Titulo2)); die();
  if ($Banner != NULL){
    $titulo1 = json_decode($Banner -> Titulo1, TRUE);
    $titulo2 = json_decode($Banner -> Titulo2, TRUE);
    $titulo3 = json_decode($Banner -> Titulo3, TRUE); ?>
        <figure class="banner">
          <img src="<?= base_url()?>images/Banner/<?= $Banner -> Imagen?>" class="img-responsive" alt="<?= $Banner -> Imagen?>" width="100%">
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
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <!-- <select class="form-control" id="Orden" name="Orden">
                <option value="Ordenar"> Ordenar </option>
                <option value="Mas-reciente"> Más reciente </option>
                <option value="Mas-antiguo"> Más antiguo </option>
              </select> -->
              <div class="dropdown">
                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"> Ordenar </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="<?= base_url()?>Productos/<?php if ($subCatP == "lo-mas-vendido") {
                    print_r("lo-mas-vendido");
                    }elseif ($subCatP == "lo-mas-visto") {
                      print_r("lo-mas-visto");
                    }else {
                      print_r($subCatP);
                    }?>/mas-reciente"> Más reciente </a>
                  <a class="dropdown-item" href="<?= base_url()?>Productos/<?php if ($subCatP == "lo-mas-vendido") {
                    print_r("lo-mas-vendido");
                    }elseif ($subCatP == "lo-mas-visto") {
                      print_r("lo-mas-visto");
                    }else {
                      // print_r($subCatP -> Ruta);
                      print_r($subCatP);
                    }?>/mas-antiguo"> Más antiguo </a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 organizarProductos">
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
      <div class="container-fluid productos">
        <div class="container">
          <div class="row">
            <!-- RUTAS DE ACCESO -->
            <!-- CLASE lead = PARA PONER EL TEXTO MÁS GRANDE -->
            <!-- RUTAS DE ACCESO SIN LA FUNCION DE REGRESAR -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <ul class="breadcrumb lead fondoBreadcrumb text-uppercase">
                <li class="breadcrumb-item"> <a href="<?= base_url()?>"> inicio </a> </li>
                <li class="pagActual breadcrumb-item active">
                  <?php if ($subCatP == "lo-mas-vendido") {
                    print_r("lo más vendido");
                  }elseif ($subCatP == "lo-mas-visto") {
                    print_r("lo más visto");
                  }else {
                    print_r($subCatP);
                  } ?>
                </li>
                <?php if (isset($orden)) {?>
                  <li class="pagActual breadcrumb-item active">
                    <?php if ($orden == "mas-antiguo") {
                      print_r("Más antiguo");
                    }else {
                      print_r("Más reciente");
                    }?>
                  </li>
                  <?php }else {
                  } ?>
              </ul>
            </div>
            <?php
              if (!$producto) {?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 error404 text-center">
                  <h1> <small> ¡Oops! </small> </h1>
                  <h2>Aún no existen productos en esta sección </h2>
                </div>
                <?php }else { ?>
                <!---================== LISTA DE PRODUCTOS ====================-->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <ul class="grid0 row">
                  <?php foreach ($producto as $row) { ?>
                    <!-- PRODUCTO -->
                    <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ListProd">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <input type="hidden" name="" value="<?= $row -> Vistas?>">
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
                                  <p> <small> $<?= $row -> Precio ?> </small> </p>
                                <?php }else { ?>
                                  <p> <small> <b class="oferta"> $<?= $row -> Precio?> </b> </small>
                                  <small> $<?= $row -> PrecioOferta ?> </small> </p>
                                <?php } ?>
                              </h2>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 enlaces float-right">
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
                  <ul class="list0 row" style="display:none">
                    <?php foreach ($producto as $row) { ?>
                      <!-- PRODUCTO -->
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
              <?php }?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if (count($Tproducto) != 0) {
                  $totalrows = 8;
                  $pagProductos = ceil(count($Tproducto)/$totalrows);
                  // $pagProductos = 5;
                  // print_r($base);
                  // VALIDAMOS SI ORDEN NO TIENE INFORMAIÓN
                  if ($orden != NULL) {
                    // SI TIENE INFORMAIÓN PONEMOS LA PAGINACIÓN CON ORDEN
                    if ($pagProductos <= 1) { ?>
                    <?php }elseif ($pagProductos <= 5) { ?>
                      <ul class="pagination justify-content-center">
                        <?php for ($i=1; $i <= $pagProductos; $i++) { ?>
                          <li class="page-item <?php echo $base == $i ? 'active' : '' ?>"> <a class="page-link" href="<?= base_url()?>Productos/<?php if (isset($subCatP -> idSubCat)) { print_r($subCatP -> idSubCat); }else {print_r($subCatP);} ?>/<?= $orden ?>/<?= $i ?>"><?php print_r($i); ?> </a> </li>
                        <?php } ?>
                      </ul>
                    <?php }else { ?>
                      <ul class="pagination justify-content-center">
                        <li class="page-item <?php echo $base <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="<?= base_url()?>Productos/<?php if (isset($subCatP -> idSubCat)) { print_r($subCatP -> idSubCat); }else {print_r($subCatP);} ?>/<?= $base -1 ?>">Previus</a></li>
                        <?php for ($i=1; $i <= $pagProductos-4; $i++) { ?>
                          <li class="page-item <?php echo $base == $i ? 'active' : '' ?>"><a class="page-link" href="<?= base_url()?>Productos/<?php if (isset($subCatP -> idSubCat)) { print_r($subCatP -> idSubCat); }else {print_r($subCatP);} ?>/<?= $i ?>"><?php print_r($i); ?></a></li>
                        <?php } ?>
                        <li class="page-item disabled"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item <?php echo $base == $i+1 ? 'active' : '' ?>"><a class="page-link" href="<?= base_url()?>Productos/<?php if (isset($subCatP -> idSubCat)) { print_r($subCatP -> idSubCat); }else {print_r($subCatP);} ?>/<?= $pagProductos ?>"><?php print_r($pagProductos); ?></a></li>
                        <li class="page-item <?php echo $base >= $pagProductos ? 'disabled' : '' ?>"><a class="page-link" href="<?= base_url()?>Productos/<?php if (isset($subCatP -> idSubCat)) { print_r($subCatP -> idSubCat); }else {print_r($subCatP);} ?>/<?= $base +1 ?>">Next</a></li>
                      </ul>
                    <?php }
                    // NO TIENE INFORMAIÓN PONEMOS LA PAGINACIÓN SIN ORDEN
                  }else {
                    if ($pagProductos <= 1) { ?>
                    <?php }elseif ($pagProductos <= 5) { ?>
                      <ul class="pagination justify-content-center">
                        <?php for ($i=1; $i <= $pagProductos; $i++) { ?>
                          <li class="page-item <?php echo $base == $i ? 'active' : '' ?>"><a class="page-link" href="<?= base_url()?>Productos/<?php if (isset($subCatP -> idSubCat)) { print_r($subCatP -> idSubCat); }else {print_r($subCatP);} ?>/<?= $i ?>"><?php print_r($i); ?></a></li>
                        <?php } ?>
                      </ul>
                    <?php }else { ?>
                      <ul class="pagination justify-content-center">
                        <li class="page-item <?php echo $base <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="<?= base_url()?>Productos/<?php if (isset($subCatP -> idSubCat)) { print_r($subCatP -> idSubCat); }else {print_r($subCatP);} ?>/<?= $base -1 ?>">Previus</a></li>
                        <?php for ($i=1; $i <= $pagProductos-4; $i++) { ?>
                          <li class="page-item <?php echo $base == $i ? 'active' : '' ?>"><a class="page-link" href="<?= base_url()?>Productos/<?php if (isset($subCatP -> idSubCat)) { print_r($subCatP -> idSubCat); }else {print_r($subCatP);} ?>/<?= $i ?>"><?php print_r($i); ?></a></li>
                        <?php } ?>
                        <li class="page-item disabled"> <a class="page-link" href="#">...</a> </li>
                        <li class="page-item <?php echo $base == $i+1 ? 'active' : '' ?>"><a class="page-link" href="<?= base_url()?>Productos/<?php if (isset($subCatP -> idSubCat)) { print_r($subCatP -> idSubCat); }else {print_r($subCatP);} ?>/<?= $pagProductos ?>"><?php print_r($pagProductos); ?></a></li>
                        <li class="page-item <?php echo $base >= $pagProductos ? 'disabled' : '' ?>"><a class="page-link" href="<?= base_url()?>Productos/<?php if (isset($subCatP -> idSubCat)) { print_r($subCatP -> idSubCat); }else {print_r($subCatP);} ?>/<?= $base +1 ?>">Next</a></li>
                      </ul>
                    <?php }
                  }
                }?>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="container-fluid productos">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <center> <div class="spinner-grow text-info"></div> </center>
              </div>
            </div>
          </div>
        </div> -->
        <script type="text/javascript">
          // $(document).ready(function() {
          //   $("#Orden").change(function(event) {
          //     var Orden = $(this).val();
        	// 		var Ruta = $("#Ruta").val();
          //     if (Orden != "" && Orden != "Ordenar") {
          //       $.ajax({
          //         data : "",
          //         url : '<?= base_url() ?>Productos/'+Ruta+'/'+Orden,
          //         type : 'post',
          //         beforeSend : function(){
          //           $(".productos").html('<div class="container"> <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <center> <div class="spinner-grow text-info"> </div> </center> </div> </div> </div>');
          //         },
          //         success : function(respuesta){
          //           console.log(respuesta);
          //           $(".productos").append(respuesta);
          //         }
          //       });
          //     } else{
          //       $(".productos").html('<div class="container"> <div class="row"> <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <center> <div class="spinner-grow text-info"> </div> </center> </div> </div> </div>');
          //     }
          //   });
          // });
        </script>
