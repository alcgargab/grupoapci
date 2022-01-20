        <!-- Mis prospectos -->
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <center>
                <h2> Prospectos </h2>
              </center>
            </div>
          </div>
          <br>
          <?php if ($request != ""){ ?>
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-6 offset-3">
                    <input type="search" id="crmSearch" name="crmSearch" class="form-control" placeholder="buscar...">
                  </div>
                </div>
                <br><br>
                <div id="crmbody" class="row">
                  <?php foreach ($request as $row){ ?>
                    <div class="col-3">
                      <div class="card">
                        <div class="card-body">
                          <center>
                            <h4 class="card-title"> <?= $row -> empresa ?> </h4>
                          </center>
                          <hr>
                          <div class="row">
                            <div class="col-12">
                              <p class="card-text"> <span class="fas fa-user-circle"> </span> <b> Contacto: </b> <?= $row -> contacto ?> </p>
                              <p class="card-text"> <span class="fas fa-phone"> </span> <b> Teléfono: </b> <?= $row -> telefono ?> </p>
                              <p class="card-text"> <span class="fas fa-envelope"> </span> <b> Correo electrónico: </b> <?= $row -> email ?> </p>
                              <p class="card-text"> <span class="fas fa-envelope"> </span> <b> Comentarios: </b> <?php print_r(substr($row -> comentarios, 0, 30)."..."); ?> </p>
                              <a href="<?= base_url()?>crm/view-my-request/<?= $row -> c_pencrypt ?>" class="btn btn-info btn-block"> Ver más... </a>
                            </div>
                          </div>
                          <br>
                          <!-- <div class="row">
                            <div class="col-8 offset-2">
                              <a href="<?= base_url()?>crm/follow-edit/<?= $row -> c_rencrypt ?>" class="btn btn-info btn-block"> Ver más... </a>
                            </div>
                          </div> -->
                        </div>
                      </div>
                      <br>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="row">
              <div class="col-12">
                <center>
                  <h1> No cuentas con prospectos. </h1>
                </center>
              </div>
            </div>
          <?php } ?>
        </div>
