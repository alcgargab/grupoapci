        <!-- Contratros sin folio -->
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <center>
                <h2> Contratros sin folio </h2>
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
                <div class="row">
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
                          <p class="card-text"> <b> Comentarios: </b> <?php print_r(substr($row -> comentarios, 0, 50)."..."); ?> </p>
                          <hr>
                          <div class="row">
                            <div class="col-8 offset-2">
                              <input type="button" class="btn btn-success btn-block" value="Generar folio" data-toggle="collapse" data-target="#update<?= $row -> id_cp?>">
                            </div>
                          </div>
                          <br>
                          <div id="update<?= $row -> id_cp?>" class="collapse">
                            <div class="row">
                              <div class="col-12">
                                <form class="" onsubmit="return addSheetNumber()" action="<?= base_url()?>crm/update-request-without-sheet-number" method="post">
                                  <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_cp" value="<?= $row -> id_cp ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="folio"> Folio </label>
                                        <input type="text" class="form-control" name="folio" id="folio" value="" placeholder="Ingresa folio" pattern="[0-9]{9}" required>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="row">
                                    <div class="col-12">
                                      <span id="errorForm"> </span>
                                    </div>
                                  </div> -->
                                  <div class="row">
                                    <div class="col-8 offset-2">
                                      <input type="submit" class="btn btn-success btn-block btnRuta" value="Agregar folio">
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
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
