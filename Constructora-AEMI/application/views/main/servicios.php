      <!-- banner -->
      <div class="aemi-banner">
        <img src="<?= base_url()?>images/Banners/caemi_banner_principal_desk.webp" alt="Constructora-AEMI">
      </div>
      <div class="aemi-banner-down">
        <img src="<?= base_url()?>images/Banners/caemi_banner_cleaning.webp" alt="Constructora-AEMI">
        <div class="aemi-ctn-our-services">
          <div class="row">
            <div class="col-4">
              <center>
                <img src="<?= base_url()?>images/Logo/caemi_logo_aemi.webp" alt="Constructora-AEMI">
              </center>
            </div>
            <div class="col-8">
              <p> Nuestros Servicios </p>
            </div>
          </div>
        </div>
      </div>
      <!-- Servicios -->
      <div class="container-fluid aemi-services">
        <div class="row">
          <?php foreach ($tbl_s as $row){ ?>
            <div class="col-lg-3 col-6">
              <div class="aemi-services-options">
                <a href="<?= base_url()?>servicios/<?= $row -> ruta_s ?>" class="card-title text-center">
                  <figure class="effect-ming">
                    <img src="<?= base_url()?>images/Services/<?= $row -> imagen_s ?>">
                    <figcaption>
                      <p class="text"> <?= $row -> servicio_s ?> </p>
                    </figcaption>
                  </figure>
                </a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <!-- beneficios -->
      <div class="aemi-ctn-benefits">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-12">
              <center>
                <img class="aemi-ctn-benefits-img" src="<?= base_url()?>images/Landing page/caemi_landing_page_benefits.webp" alt="Constructora-AEMI">
              </center>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-12">
                      <p class="float-right aemi-benefits-tittle"> beneficios </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 col-sm-6 aemi-benefits-img">
                      <img class="float-right" src="<?= base_url()?>images/Logo/caemi_logo_aemi.webp" alt="Constructora-AEMI">
                    </div>
                    <div class="col-md-3 col-sm-6">
                      <p class="float-right"> <span class="aemi-benefits-text"> de nuestra <br> <span> empresa </span> </span> </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-4 aemi-benefits-budgets">
                      <center>
                        <img src="<?= base_url()?>images/Landing page/caemi_landing_page_budgets.webp" alt="Constructora-AEMI">
                        <p> REALIZAMOS PROPUESTAS  SIN COSTO </p>
                      </center>
                    </div>
                    <div class="col-4 aemi-benefits-services">
                      <center>
                        <img src="<?= base_url()?>images/Landing page/caemi_landing_page_our services.webp" alt="Constructora-AEMI">
                        <p> NUESTROS SERVICIOS SE HACEN A LA MEDIDA Y NECESIDAD DEL CLIENTE </p>
                      </center>
                    </div>
                    <div class="col-4 aemi-benefits-personal">
                      <center>
                        <img src="<?= base_url()?>images/Landing page/caemi_landing_page_personal.webp" alt="Constructora-AEMI">
                        <p> PERSONAL ALTAMENTE CALIFICADO PARA SEGURIDAD DE NUESTROS CLIENTES </p>
                      </center>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="aemi-ctn-benefits-stars">
          <div class="row">
            <img class="aemi-benefits-starts-banner" src="<?= base_url()?>images/Landing page/caemi_landing_page_benefits_part_of_below.webp" alt="Constructora-AEMI">
            <div class="aemi-benefits-stars">
              <div class="col-12 aemi-ctn-benefits-tittle">
                <center>
                  <span class="aemi-benefits-stars-tittle"> excelentes servicios <span> caemi </span> </span>
                  <br>
                  <img src="<?= base_url()?>images/Landing page/caemi_landing_page_five_stars.webp" alt="Constructora-AEMI">
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- clientes -->
      <br><br>
      <div class="container">
        <div class="row aemi-our-costumer">
          <div class="col-12">
            <center>
              <p> algunos de nuestros <span style="color: #ed273d;"> clientes </span> </p>
            </center>
          </div>
        </div>
        <div class="row aemi-our-costumer-banner">
          <div id="aemi-carousel-our-costumer" class="carousel slide aemi-carousel-our-costumer" data-ride="carousel">
            <ul class="carousel-indicators">
              <li data-target="#aemi-carousel-our-costumer" data-slide-to="0" class="active"></li>
              <li data-target="#aemi-carousel-our-costumer" data-slide-to="1"></li>
              <li data-target="#aemi-carousel-our-costumer" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?= base_url()?>images/Customers/caemi_customers_1.webp" alt="Constructora-AEMI | Clientes">
              </div>
              <div class="carousel-item">
                <img src="<?= base_url()?>images/Customers/caemi_customers_2.webp" alt="Constructora-AEMI | Clientes">
              </div>
            </div>
            <a class="carousel-control-prev" href="#aemi-carousel-our-costumer" data-slide="prev">
              <span class="fas fa-chevron-circle-left" style="color: #797979;"></span>
            </a>
            <a class="carousel-control-next" href="#aemi-carousel-our-costumer" data-slide="next">
              <span class="fas fa-chevron-circle-right" style="color: #797979;"></span>
            </a>
          </div>
        </div>
      </div>
