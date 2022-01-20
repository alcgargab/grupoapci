        <!-- prospecto -->
        <br>
        <div class="col-12">
          <?php if ($request != ""){ ?>
            <div class="row">
              <div class="col-12">
                  <div class="row">
                    <div class="col-12">
                      <center>
                        <h1 class="card-title"> <?= $request -> razon_social ?> </h1>
                      </center>
                      <hr>
                      <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                            <label for="contact"> <b> Contacto: </b> </label>
                            <input type="text" id="contact" class="form-control" name="contact" value="<?= $request -> contacto ?>" readonly>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="email"> <b> Correo electronico: </b> </label>
                            <input type="text" id="email" class="form-control" name="email" value="<?= $request -> email ?>" readonly>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="tel"> <b> Teléfono: </b> </label>
                            <input type="text" id="tel" class="form-control" name="tel" value="<?= $request -> telefono ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4 offset-2">
                          <div class="form-group">
                            <label for="num_cuneta"> <b> Número de ceunta: </b> </label>
                            <input type="text" id="num_cuneta" class="form-control" name="num_cuneta" value="<?= $request -> numero_cuenta ?>" readonly>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="num_lineas"> <b> Número de lineas: </b> </label>
                            <input type="text" id="num_lineas" class="form-control" name="num_lineas" value="<?= $request -> numero_lineas ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="equipo"> <b> Equipos: </b> </label>
                            <textarea id="equipo" class="form-control" name="equipo" rows="8" cols="80" readonly> <?= $request -> equipos ?> </textarea>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="coment"> <b> Comentarios </b> </label>
                            <textarea id="coment" class="form-control" name="coment" rows="8" cols="80" readonly> <?= $request -> comentarios ?> </textarea>
                          </div>
                        </div>
                      </div>
                      <hr>
                    </div>
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
