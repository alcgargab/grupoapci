        <!-- Generar expediente -->
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <center>
                <h2> Generar expediente </h2>
              </center>
            </div>
          </div>
          <br>
          <?php if ($file != ""){ ?>
            <div class="row">
              <div class="col-12">
                <form class="" action="<?= base_url()?>crm/add-case-file" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="c_vencrypt" value="<?= $file -> c_vencrypt ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <center>
                        <h4 class="card-title"> <?= $file -> razon_social ?> </h4>
                      </center>
                      <hr>
                      <p class="card-text"> <b> Contacto: </b> <?= $file -> contacto ?> </p>
                      <p class="card-text"> <b> Número de ceunta: </b> <?= $file -> numero_cuenta ?> </p>
                      <p class="card-text"> <b> Comentarios: </b> <?= $file -> comentarios ?> </p>
                      <hr>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="layout"> Layout </label>
                        <input type="file" class="form-control" id="layout" name="layout" required accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="carga"> Formato de carga </label>
                        <input type="file" class="form-control" id="carga" name="carga" required accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="oferta"> Oferta comercial </label>
                        <input type="file" class="form-control" id="oferta" name="oferta" required accept="application/pdf">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="contrato"> Contrato firmado </label>
                        <input type="file" class="form-control" id="contrato" name="contrato" required accept="application/pdf">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="ine"> INE </label>
                        <input type="file" class="form-control" id="ine" name="ine" required accept="application/pdf">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="paternidad"> Paternidad </label>
                        <input type="file" class="form-control" id="paternidad" name="paternidad" required accept="application/pdf">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <span></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="submit" class="btn btn-success btn-block" name="" value="Generar expediente">
                    </div>
                  </div>
                </form>
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
