      <div class="jumbotron text-center aemi-footer">
        <div class="container">
          <div class="row">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <h2 class="aemi-footer-tittle"> Constructora <span> <b> AEMI </b> </span> </h2>
                  <hr>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6 aemi-footer-our-services">
              <h3> Nuestros servicios </h3>
              <ul>
                <li> <i class='fas fa-chevron-right'></i> &nbsp;&nbsp;&nbsp; <a href="http://www.caemi.com.mx/servicios/limpieza" target="_blank"> Limpieza </a> </li>
                <li> <i class='fas fa-chevron-right'></i> &nbsp;&nbsp;&nbsp; <a href="http://www.caemi.com.mx/servicios/hidroneumaticos" target="_blank"> Hidrosanitarios </a> </li>
                <li> <i class='fas fa-chevron-right'></i> &nbsp;&nbsp;&nbsp; <a href="http://www.caemi.com.mx/servicios/hidrosanitarios" target="_blank"> Hidroneumaticos </a> </li>
                <li> <i class='fas fa-chevron-right'></i> &nbsp;&nbsp;&nbsp; <a href="http://www.caemi.com.mx/servicios/mantenimiento-en-industrias-centros-comerciales-y-residencias" target="_blank"> Mantenimiento </a> </li>
                <li> <i class='fas fa-chevron-right'></i> &nbsp;&nbsp;&nbsp; <a href="http://www.caemi.com.mx/servicios/jardineria" target="_blank"> Jardinería </a> </li>
                <li> <i class='fas fa-chevron-right'></i> &nbsp;&nbsp;&nbsp; <a href="http://www.caemi.com.mx/servicios/fumigacion" target="_blank"> Fumigación </a> </li>
              </ul>
            </div>
            <div class="col-6 aemi-footer-contact">
              <h3> Contacto </h3>
              <div class="row">
                <?php foreach ($tbl_rs as $row){ ?>
                  <div class="col-md-4 col-sm-6">
                    <img class="aemi-footer-social" src="<?= base_url()?>images/Icons/<?= $row -> imagen_rs ?>" alt="<?= $row -> red_social_rs ?> CAEMI">
                  </div>
                <?php } ?>
                <div class="col-md-4 col-sm-12 aemi-footer-contact-phone">
                  <span> 55-10-80-77-41 <br> 55-55-08-36-00 <br> 58-03-23-83 <br> 58-03-23-89 </span>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-12">
                  <h3> Atención </h3>
                  <span> Horarios: <br> Lunes a Viernes de 09:00 a 19:00 hrs. <br> Sabados de 09:00 a 14:00 hrs. </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
