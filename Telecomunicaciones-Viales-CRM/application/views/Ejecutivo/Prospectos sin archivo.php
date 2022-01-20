        <!-- Prospectos sin archivo -->
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <center>
                <h2> Prospectos sin identificación </h2>
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
                          <p class="card-text"> <b> Razón social: </b> <?= $row -> razon_social ?> </p>
                          <p class="card-text"> <b> Número de cuenta: </b> <?= $row -> numero_cuenta ?> </p>
                          <p class="card-text"> <b> Teléfono: </b> <?= $row -> telefono ?> </p>
                          <p class="card-text"> <b> Comentarios: </b> <?php print_r(substr($row -> comentarios, 0, 30)."..."); ?> </p>
                          <hr>
                          <form class="" action="<?= base_url()?>crm/update-request-file" method="post" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="recordIneDoc"> Subir documento: </label>
                                  <input type="file" class="form-control" name="recordIneDoc" id="recordIneDoc" required>
                                  <input type="hidden" class="form-control" name="c_pencrypt" value="<?= $row -> c_pencrypt ?>">
                                  <input type="hidden" class="form-control" name="recordNc" value="<?= $row -> numero_cuenta ?>">
                                  <input type="hidden" class="form-control" name="recordRs" value="<?= $row -> razon_social ?>">
                                  <input type="hidden" class="form-control" name="id_pv" value="<?= $row -> id_pv ?>">
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
          <?php } else { ?>
            <div class="row">
              <div class="col-12">
                <center>
                  <h1> No cuentas con prospectos sin identificación. </h1>
                </center>
              </div>
            </div>
          <?php } ?>
        </div>
