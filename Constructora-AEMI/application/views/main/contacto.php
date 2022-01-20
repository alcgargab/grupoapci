      <!-- banner -->
      <div class="aemi-banner">
        <img src="<?= base_url()?>images/Banners/caemi_banner_principal_desk.webp" alt="Constructora-AEMI">
      </div>
      <div class="aemi-banner-text-contact">
        <div class="row">
          <div class="col-12">
            <p> <?= $tbl_b -> texto_b ?> </p>
          </div>
        </div>
      </div>
      <!-- Contacto -->
      <div class="container">
        <div class="row aemi-ctn-form">
          <div class="col-md-6 col-sm-12">
            <center>
              <img src="<?= base_url()?>images/Landing page/caemi_landing_page_contcato.webp" alt="Constructora-AEMI" width="500px">
            </center>
          </div>
          <div class="col-md-6 col-sm-12 aemi-form">
            <div class="row">
              <div class="col-12">
                <p class="tittle"> hagamos un gran equipo </p>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <p class="tittle2"> contáctanos </p>
              </div>
            </div>
            <form class="aemi-form-form" onsubmit="return validate_contacto()" action="<?= base_url()?>gracias" method="post">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="Nombre"> Nombre </label>
                    <input type="text" class="form-control aemi-input-form" id="Nombre" name="nombre_contacto" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="NumTelefonico"> Teléfono </label>
                    <input type="tel" class="form-control aemi-input-form" id="NumTelefonico" name="telefono_contacto" pattern="[0-9]{10}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="CorreoElectronico"> Email </label>
                    <input type="email" class="form-control aemi-input-form" id="CorreoElectronico" name="email_contacto" required>
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label for="asunto"> Asunto </label>
                    <?php if (!empty($tbl_s)){ ?>
                      <input type="text" class="form-control aemi-input-form" id="asunto" name="asunto_contacto" value="<?= $tbl_s -> texto_correo_s?>" required readonly>
                    <?php } else { ?>
                      <input type="text" class="form-control aemi-input-form" id="asunto" name="asunto_contacto" placeholder="Solicito información sobre..." required>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="Comment"> Mensaje </label>
                    <textarea name="comentarios_contacto" id="Comment" class="form-control aemi-input-form" rows="8" cols="80" required></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <span id="caemi_error_form">  </span>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7 col-sm-12">
                  <input type="hidden" class="form-control" name="aemi_mensaje_js" id="aemimensajeAEMI" value="">
                  <div class="g-recaptcha" data-sitekey="<?= $site_key?>" id="recaptchaAEMI"></div>
                </div>
                <div class="col-md-5 col-sm-12">
                  <input type="submit" class="btn btn-danger btn-block aemi-btn-form" name="" value="Enviar">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <br>
