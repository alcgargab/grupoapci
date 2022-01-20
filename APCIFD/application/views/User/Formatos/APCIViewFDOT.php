      <div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
        <div id="APCIFDOT">
          <div id="APCIFDOT_cabecera" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                  <img id="APCIFDOT_cabecera_img" src="<?php base_url()?>images/LOGOS/aemi_logo_img.png" alt="">
                </div>
                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <p>Datos</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <p>Dirección:</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                      <p>Datos</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <p>Teléfono:</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                      <p>Datos</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="APCIFDOT_tittle" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <p>Orden de Trabajo</p>
            </div>
          </div>
          <form class="" action="<?= base_url()?>APCIForDig/APCICreatePDF" method="post">
            <div id="APCIFDOT_info" class="row">
              <input type="hidden" id="TF" name="TF" value="Orden de Trabajo">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                    <div class="form-group">
                      <label for="APCIFDOTF">Folio: </label>
                      <input type="text" class="form-control" id="APCIFDOTF" name="APCIFDOTF" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-offset-8">
                    <div class="form-group">
                      <label for="APCIFDOTT">XXXXX:</label>
                      <select class="form-control" id="APCIFDOTT" name="APCIFDOTT" required>
                        <option value="Seleccionar">Seleccionar</option>
                        <option value="Preventivo">Preventivo</option>
                        <option value="Correctivo">Correctivo</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="APCIFDOTPA">Punto de atención: </label>
                      <input type="text" class="form-control" id="APCIFDOTPA" name="APCIFDOTPA" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="APCIFDOTD">Dirección: </label>
                      <input type="text" class="form-control" id="APCIFDOTD" name="APCIFDOTD" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offset-3">
                    <div class="form-group">
                      <label for="APCIFDOTTS">Tipo de Servicio:</label>
                      <select class="form-control" id="APCIFDOTTS" name="APCIFDOTTS" required>
                        <option value="Seleccionar">Seleccionar</option>
                        <option value="Construcción">Construcción</option>
                        <option value="Acabados">Acabados</option>
                        <option value="XXXXX">XXXXX</option>
                        <option value="Limpieza">Limpieza</option>
                        <option value="Fumigación">Fumigación</option>
                        <option value="XXXXX">XXXXX</option>
                        <option value="XXXXX">XXXXX</option>
                        <option value="XXXXX">XXXXX</option>
                        <option value="Jardinería">Jardinería</option>
                        <option value="Aire">Aire</option>
                        <option value="Otros">Otros</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="APCIFDOTFI">Fecha de Inicio:</label>
                      <input type="date" class="form-control" id="APCIFDOTFI" name="APCIFDOTFI" required>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="APCIFDOTFE">Fecha de Escalado:</label>
                      <input type="date" class="form-control" id="APCIFDOTFE" name="APCIFDOTFE" required>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="APCIFDOTFT">Fecha de Termino:</label>
                      <input type="date" class="form-control" id="APCIFDOTFT" name="APCIFDOTFT" required>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="APCIFDOTHI">Hora de Inicio:</label>
                      <input type="time" class="form-control" id="APCIFDOTHI" name="APCIFDOTHI" required>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="APCIFDOTHF">Hora de Termino:</label>
                      <input type="time" class="form-control" id="APCIFDOTHF" name="APCIFDOTHF" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="APCIFDOTFEN">Falla encontrada: </label>
                      <textarea class="form-control" rows="5" id="APCIFDOTFEN" name="APCIFDOTFEN" required></textarea>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="APCIFDOTDS">Descripción del servicio: </label>
                      <textarea class="form-control" rows="5" id="APCIFDOTDS" name="APCIFDOTDS" required></textarea>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="APCIFDOTOB">Observaciones: </label>
                      <textarea class="form-control" rows="5" id="APCIFDOTOB" name="APCIFDOTOB" required></textarea>
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <p id="APCIOT_info_firma"> Nombre y firma del Cliente </p>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <p id="APCIOT_info_firma">Supervisó</p>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <p id="APCIOT_info_firma">Técnico</p>
                  </div>
                </div> -->
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <center> <button id="APCIOT_info_btn" type="submit" class="btn btn-outline-danger" name="button"> Generar Formato </button> </center>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
