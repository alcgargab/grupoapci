      <!-- banner -->
      <div class="aemi-banner">
        <img src="<?= base_url()?>images/Banners/caemi_banner_principal_desk.webp" alt="Constructora-AEMI">
      </div>
      <div class="aemi-banner-down">
        <div class="aemi-banner-text-category">
          <div class="row">
            <div class="col-12">
              <p> <?= $tbl_b -> texto_b ?> </p>
            </div>
          </div>
        </div>
      </div>
      <!-- categorias -->
      <div class="aemi-ctn-cat">
        <img class="aemi-ctn-cat-img" src="<?= base_url()?>images/Banners/<?= $tbl_s -> banner_s?>" alt="Constructora-AEMI">
        <div class="aemi-ctn-cat-options" style="<?php if ($tbl_s -> id_s == 2 || $tbl_s -> id_s == 4) { print_r('height: 821px; margin-top: -821px;'); } else { print_r('height: 506px; margin-top: -506px;'); }?>;">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 aemi-ctn-cat-cotizacion">
                <span class="float-right"> <a href="<?= base_url()?>contacto/<?= $tbl_s -> token_s ?>"> solicite una cotización </a> </span>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <?php foreach ($tbl_c as $row){ ?>
                <div class="col-sm-4 col-6">
                  <div class="grid-cat">
                    <figure class="effect-ming">
                        <img src="<?= base_url()?>images/Categories/<?= $row -> icono_c ?>">
                      <figcaption>
                        <h2>
                          <?php if (!empty($row -> categoria_c)){
                            print_r($row -> categoria_c);
                          } else {
                            print_r("");
                          } ?>
                        </h2>
                        <p class="text"> <?= $row -> texto_c ?> </p>
                      </figcaption>
                    </figure>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div id="aemi-subcat-movil" class="container-fluid aemi-subcat-movil">
        <div class="row">
          <?php foreach ($tbl_ss as $row){ ?>
            <div class="col-sm-4 col-6">
              <div class="aemi-services-options">
                <figure class="effect-ming">
                  <img class="img" src="<?= base_url()?>images/Subservices/<?= $row -> imagen_ss ?>" alt="CAEMI | <?= $row -> sub_servicio_ss ?>">
                  <figcaption>
                    <p class="text"> <?= $row -> sub_servicio_ss ?> </p>
                  </figcaption>
                </figure>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div id="aemi-subcat-desktop" class="container-fluid">
        <div class="row aemi-ctn-subcat">
          <div class="aemi-ctn-subcat-items">
            <?php for ($i = 0; $i < 3 ; $i++) { ?>
              <div id="<?= $tbl_ss[$i] -> class_css_ss ?>" class="clearfix">
                <div class="aemi-ctn-subcat-items-img">
                  <img class="img" src="<?= base_url()?>images/Subservices/<?= $tbl_ss[$i] -> imagen_ss ?>" alt="CAEMI | <?= $tbl_ss[$i] -> sub_servicio_ss ?>">
                </div>
                <div class="aemi-ctn-subcat-items-text">
                  <p> <?= $tbl_ss[$i] -> sub_servicio_ss ?> </p>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
        <?php if (count($tbl_ss) > 3){ ?>
          <div class="row aemi-ctn-subcat">
            <div class="aemi-ctn-subcat-items">
              <?php for ($i = 3; $i < 6 ; $i++) { ?>
                <div id="<?= $tbl_ss[$i] -> class_css_ss ?>" class="clearfix">
                  <div class="aemi-ctn-subcat-items-img">
                    <img class="img" src="<?= base_url()?>images/Subservices/<?= $tbl_ss[$i] -> imagen_ss ?>" alt="CAEMI | <?= $tbl_ss[$i] -> sub_servicio_ss ?>">
                  </div>
                  <div class="aemi-ctn-subcat-items-text">
                    <p> <?= $tbl_ss[$i] -> sub_servicio_ss ?> </p>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
        <?php if (count($tbl_ss) > 6){ ?>
          <div class="row aemi-ctn-subcat">
            <div class="aemi-ctn-subcat-items">
              <?php for ($i = 6; $i < 9 ; $i++) { ?>
                <div id="<?= $tbl_ss[$i] -> class_css_ss ?>" class="clearfix">
                  <div class="aemi-ctn-subcat-items-img">
                    <img class="img" src="<?= base_url()?>images/Subservices/<?= $tbl_ss[$i] -> imagen_ss ?>" alt="CAEMI | <?= $tbl_ss[$i] -> sub_servicio_ss ?>">
                  </div>
                  <div class="aemi-ctn-subcat-items-text">
                    <p> <?= $tbl_ss[$i] -> sub_servicio_ss ?> </p>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
