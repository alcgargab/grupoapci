        <!-- Prospectos sin contrato -->
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <center>
                <h2> Prospectos sin contrato </h2>
              </center>
            </div>
          </div>
          <br>
          <?php if ($doc != ""){ ?>
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-6 offset-3">
                    <input type="search" id="crmSearch" name="crmSearch" class="form-control" placeholder="buscar...">
                  </div>
                </div>
                <br><br>
                <div id="crmbody" class="row">
                  <?php foreach ($doc as $row){ ?>
                    <div class="col-3">
                      <div class="card">
                        <div class="card-body">
                          <center>
                            <h4 class="card-title"> <?= $row -> empresa ?> </h4>
                          </center>
                          <hr>
                          <p class="card-text"> <b> Razón social: </b> <?= $row -> razon_social ?> </p>
                          <p class="card-text"> <b> Número de cuenta: </b> <?= $row -> numero_cuenta ?> </p>
                          <p class="card-text"> <b> Teléfono: </b> <?= $row -> telefono ?> </p>
                          <p class="card-text"> <b> Comentarios: </b> <?php print_r(substr($row -> comentarios, 0, 50)."..."); ?> </p>
                          <hr>
                          <form class="" action="<?= base_url()?>crm/update-request-doc" method="post">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" name="c_pencrypt" value="<?= $row -> c_pencrypt ?>">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-8 offset-2">
                                <input type="submit" class="btn btn-success btn-block btnRuta" name="" value="Actualizar">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <br>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <br>
          <?php } else { ?>
            <div class="row">
              <div class="col-12">
                <center>
                  <h1> No cuentas con prospectos sin contrato. </h1>
                </center>
              </div>
            </div>
          <?php } ?>
        </div>
