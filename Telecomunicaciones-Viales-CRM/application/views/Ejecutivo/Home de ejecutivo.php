        <!-- home de ejecutivo -->
        <div class="col-10 offset-1">
          <div class="row">
            <div class="col-12">
              <center>
                <h2> Agregar nuevo registro </h2>
              </center>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <form class="" action="<?= base_url()?>crm/add-record" onsubmit="return addrecord()" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="companyname"> Nombre de la empresa: </label>
                      <input type="text" class="form-control" name="companyname" id="companyname" placeholder="Ingresa la empresa" required>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="recordname"> Nombre del contacto: </label>
                      <input type="text" class="form-control" name="recordname" id="recordname" placeholder="Ingresa el nombre" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="recordtel"> Número de teléfono: </label>
                      <input type="tel" class="form-control" name="recordtel" id="recordtel" placeholder="Ingresa el teléfono" pattern="[0-9]{10}" required>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="recordemail"> correo electronico: </label>
                      <input type="email" class="form-control" name="recordemail" id="recordemail" placeholder="ejemplo@ejemplo.com" required>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="recordCom"> ¿Hubo comunicación? </label>
                      <select id="recordCom" class="form-control" name="recordCom" required>
                        <option value="seleccione-la-opcion"> Seleccione la opción </option>
                        <?php foreach ($scdll as $row){ ?>
                          <option value="<?= $row -> id_scl ?>"> <?= $row -> status ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8 offset-2">
                    <div id="recordComno" style="display: none;">
                      <center> <h3> Tipifica la llamada </h3> </center>
                      <?php foreach ($stll as $row){ ?>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="recordTipi<?= $row -> id_stl ?>" name="recordTipi" value="<?= $row -> id_stl ?>">
                          <label class="custom-control-label" for="recordTipi<?= $row -> id_stl ?>"> <?= $row -> tipificacion ?> </label>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div id="recordComsi" style="display: none;">
                      <div class="form-group">
                        <label for="recordRl"> ¿Se encuentra el RL o encargado? </label>
                        <select id="recordRl" class="form-control" name="recordRl">
                          <option value="seleccione-la-opcion"> Seleccione la opción </option>
                          <?php foreach ($srle as $row){ ?>
                            <option value="<?= $row -> id_srle ?>"> <?= $row -> status ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div id="recordRlsi" style="display: none;">
                      <div class="form-group">
                        <label for="recordIs"> ¿Le interesa el servicio? </label>
                        <select id="recordIs" class="form-control" name="recordIs">
                          <option value="seleccione-la-opcion"> Seleccione la opción </option>
                          <?php foreach ($sill as $row){ ?>
                            <option value="<?= $row -> id_sill ?>"> <?= $row -> interes ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div id="recordIssi" style="display: none;">
                      <div class="form-group">
                        <label for="recordEm"> ¿En este momento? </label>
                        <select id="recordEm" class="form-control" name="recordEm">
                          <option value="seleccione-la-opcion"> Seleccione la opción </option>
                          <?php foreach ($smll as $row){ ?>
                            <option value="<?= $row -> id_smll ?>"> <?= $row -> status?> </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div id="recordRlno" style="display: none;">
                      <div class="row">
                        <div class="col-12">
                          <center>
                            <h4> Generar agenda </h4>
                          </center>
                        </div>
                        <div class="row">
                          <div class="col-4">
                            <div class="form-group">
                              <label for="recordDate"> Fecha: </label>
                              <input type="date" class="form-control" name="recordDate" id="recordDate">
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="form-group">
                              <label for="recordTime"> Hora: </label>
                              <input type="time" class="form-control" name="recordTime" id="recordTime">
                            </div>
                          </div>
                          <div class="col-4">
                            <div class="form-group">
                              <label for="recordAComen"> Comentarios: </label>
                              <textarea rows="8" cols="80" class="form-control" name="recordAComen" id="recordAComen"> </textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div id="recordEmsi" style="display: none;">
                      <div class="row">
                        <div class="col-12">
                          <center>
                            <h4> Generar registro </h4>
                          </center>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                            <label for="recordNc"> Número de cuenta: </label>
                            <input type="text" class="form-control" name="recordNc" id="recordNc">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="recordRs"> Nombre de la Razón social: </label>
                            <input type="text" class="form-control" name="recordRs" id="recordRs">
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="recordNl"> Número de lineas a renovar: </label>
                            <input type="number" class="form-control" name="recordNl" id="recordNl">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                            <label for="recordEq"> Equipos que solicita el RL: </label>
                            <textarea rows="8" cols="80" class="form-control" name="recordEq" id="recordEq"></textarea>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="recordComent"> Comentarios: </label>
                            <textarea rows="8" cols="80" class="form-control" name="recordComent" id="recordComent"> </textarea>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label for="recordIne"> ¿Documento (identificación) recibido? </label>
                            <select id="recordIne" class="form-control" name="recordIne">
                              <option value="seleccione-la-opcion"> Seleccione la opción </option>
                              <?php foreach ($sdll as $row){ ?>
                                <option value="<?= $row -> id_sdll ?>"> <?= $row -> status ?> </option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4 offset-3">
                    <div id="recordInesi" style="display: none;">
                      <div class="form-group">
                        <label for="recordIneDoc"> Subir documento: </label>
                        <input type="file" class="form-control" name="recordIneDoc" id="recordIneDoc">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-10 offset-1">
                    <span id="errorRecord"></span>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-8 offset-2">
                    <input type="submit" class="btn btn-success btn-block btnRuta" name="" value="Agregar">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
