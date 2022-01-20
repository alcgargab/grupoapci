        <!-- licencias de empresas -->
        <div class="col-12">
          <center>
            <h1> Tu empresa cuenta con un total de <?= $suscripcion -> licencia ?> licencias. </h1>
          </center>
          <br>
          <?php if ($licencias != "") {
            $ltotal = count($licencias);
          }
          else {
            $ltotal = 0;
          }
          if ($ltotal < $suscripcion -> licencia){ ?>
            <h3> Agregar nueva licencia </h3>
            <div class="row">
              <div class="col-8 offset-2">
                <form class="" action="<?= base_url()?>crm/add-license" onsubmit="return addlicense()" method="post">
                  <div class="row">
                    <div class="col-4">
                      <input type="hidden" class="form-control" name="empresalicense" id="empresalicense" value="<?= $empresa -> empresa?>">
                    </div>
                    <div class="col-4">
                      <input type="hidden" class="form-control" name="empresaidlicense" id="empresaidlicense" value="<?= $empresa -> id_e?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="aplicense"> Apellido paterno del ejecutivo: </label>
                        <input type="text" class="form-control" name="aplicense" id="aplicense" required autocomplete="off" placeholder="Ingresa apellido paterno">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="amlicense"> Apellido materno del ejecutivo: </label>
                        <input type="text" class="form-control" name="amlicense" id="amlicense" required autocomplete="off" placeholder="Ingresa apellido materno">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="namelicense"> Nombre(s) del ejecutivo: </label>
                        <input type="text" class="form-control" name="namelicense" id="namelicense" required autocomplete="off" placeholder="Ingresa nombre">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="puestolicense"> Puesto: </label>
                        <select class="form-control" name="puestolicense" id="puestolicense" required>
                          <option value="selecciona-una-opcion"> Selecciona una opción </option>
                          <?php foreach ($tipo_emp as $row){ ?>
                            <option value="<?= $row -> id_te ?>"> <?= $row -> empleado ?> </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="userlicense"> Usuario: </label>
                        <input type="text" class="form-control" name="userlicense" id="userlicense" value="" readonly>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="passlicense"> Password: </label>
                        <input type="text" class="form-control" name="passlicense" id="passlicense" value="" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <span id="errorForm"></span>
                      <span id="alertsuccess"></span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="submit" class="btn btn-success btn-block btnRuta" name="" value="Generar">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          <?php } else { ?>
            <center>
              <h1 class="text-danger"> Ya no cuentas con licencias disponibles, te sugerimos que cambies de plan para segir disfrutando del CRM. </h1>
            </center>
          <?php } ?>
          <br>
          <a href="#" class="btn btn-primary"> <h3> Licencias activas  <span class="badge badge-light"> <?php if ($licencias != "") {
            print_r(count($licencias));
          } else {
            print_r(0);
          }?> </span> </h3> </a>
          <br><br>
          <?php if ($licencias != ""){ ?>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>
                    <center>
                      Dar de baja
                    </center>
                  </th>
                  <th>
                    <center>
                      Nombre
                    </center>
                  </th>
                  <th>
                    <center>
                      Usuario
                    </center>
                  </th>
                  <th>
                    <center>
                      Contraseña
                    </center>
                  </th>
                  <th>
                    <center>
                      Puesto
                    </center>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($licencias as $row){ ?>
                  <tr>
                    <td>
                      <center>
                        <a href="<?= base_url()?>crm/delete-licenses/<?= $row -> uencrypt ?>" class="text-danger" class="btnRuta"> <img src="<?= base_url()?>images/Iconos/CRM_Icon_Dlt.png" alt="Telecomunicaciones Viales | CRM" width="10%"> </a>
                      </center>
                    </td>
                    <td>
                      <center>
                        <?= $row -> apaterno." ".$row -> amaterno." ".$row -> nombre ?>
                      </center>
                    </td>
                    <td>
                      <center>
                        <?= $row -> usuario ?>
                      </center>
                    </td>
                    <td>
                      <center>
                        <?= $row -> password ?>
                      </center>
                    </td>
                    <td>
                      <center>
                        <?= $row -> empleado ?>
                      </center>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          <?php }
          else { ?>
            <center>
              <h1> Sin licencias activas </h1>
            </center>
          <?php } ?>
        </div>
