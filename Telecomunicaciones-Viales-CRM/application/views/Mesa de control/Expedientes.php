        <!-- Expedientes -->
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <center>
                <h2> Expedientes </h2>
              </center>
            </div>
          </div>
          <br>
          <?php if ($ventas != ""){ ?>
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-6 offset-3">
                    <input type="search" id="crmSearch" name="crmSearch" class="form-control" placeholder="buscar...">
                  </div>
                </div>
                <br><br>
                <div id="crmbody" class="row">
                  <?php foreach ($ventas as $row){ ?>
                    <div class="col-3">
                      <div class="card">
                        <div class="card-body">
                          <center>
                            <h4 class="card-title"> <?= $row -> razon_social ?> </h4>
                          </center>
                          <hr>
                          <p class="card-text"> <b> Contacto: </b> <?= $row -> contacto ?> </p>
                          <p class="card-text"> <b> Número de ceunta: </b> <?= $row -> numero_cuenta ?> </p>
                          <p class="card-text"> <b> Comentarios: </b> <?php print_r(substr($row -> comentarios, 0, 50)."..."); ?> </p>
                          <hr>
                          <?php if ($row -> expediente == 1){ ?>
                            <div class="row">
                              <div class="col-12">
                                <a href="<?= base_url()?>crm/download-case-file/<?= $row -> c_vencrypt?>" class="btn btn-dark btn-block"> Descargar expediente </a>
                              </div>
                            </div>
                          <?php } else { ?>
                            <div class="row">
                              <div class="col-12">
                                <a href="<?= base_url()?>crm/case-file/<?= $row -> c_vencrypt?>" class="btn btn-success btn-block"> Generar expediente </a>
                              </div>
                            </div>
                          <?php } ?>
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
                  <h1> No cuentas con ventas para generar expedientes. </h1>
                </center>
              </div>
            </div>
          <?php } ?>
        </div>
