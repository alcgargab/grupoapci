        <!-- Contratos sin folio -->
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <center>
                <h2> Contratos sin folio </h2>
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
                            <h4 class="card-title"> <?= $row -> razon_social ?> </h4>
                          </center>
                          <hr>
                          <p class="card-text"> <b> Número de cuenta: </b> <?= $row -> numero_cuenta ?> </p>
                          <p class="card-text"> <b> Número de lineas: </b> <?= $row -> numero_lineas ?> </p>
                          <center>
                            <p class="card-text text-danger"> <b> Folio: </b> <h3 class="text-danger"> <?= $row -> folio ?> </h3> </p>
                          </center>
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
                  <h1> No cuentas con contratos pendientes del folio. </h1>
                </center>
              </div>
            </div>
          <?php } ?>
        </div>
