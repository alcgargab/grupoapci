          <div id="apci_container_tabla_read" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="row">
              <?php $url = htmlspecialchars($_SERVER['HTTP_REFERER']); ?>
              <div id="APCI_btn_regresar" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 offset-10">
                <a href="<?php print_r($url);?>" class="btn btn-outline-primary"> Back <i class="	fas fa-reply"> </i> </a>
              </div>
            </div>
            <div class="row">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead id="bg_tabla">
                    <tr>
                      <th> Id Mensaje </th>
                      <th> Emisor </th>
                      <th> Remitente </th>
                      <th> Título </th>
                      <th> Mensaje </th>
                      <th> Fecha </th>
                      <th> Status </th>
                      <th> Ajuste </th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <?php foreach ($allmsn as $row) { ?>
                        <form class="" action="<?= base_url()?>APCIMsn/APCIEditSi" method="post">
                          <tr>
                            <input type="hidden" name="apci_id_mensaje_view" value="<?= $row -> apci_id_mensaje?>">
                            <td> <input type="text" class="form-control" name="apci_id_mensaje" value="<?= $row -> apci_id_mensaje?>" disabled required> </td>
                            <td>
                              <select class="form-control" id="apci_id_msn_emisor" name="apci_id_msn_emisor" required>
                                <?php foreach ($alluser as $rowuser) { ?>
                                  <option value="<?= $rowuser -> apci_id_user ?>"> <?= $rowuser -> apci_username ?> </option>
                                <?php } ?>
                              </select>
                            </td>
                            <td>
                              <select class="form-control" id="apci_id_msn_remi" name="apci_id_msn_remi" required>
                                <?php foreach ($alluser as $rowuser) { ?>
                                  <option value="<?= $rowuser -> apci_id_user ?>"> <?= $rowuser -> apci_username ?> </option>
                                <?php } ?>
                              </select>
                            </td>
                            <td> <input type="text" class="form-control" name="apci_msn_titulo" value="<?= $row -> apci_msn_titulo?>" required> </td>
                            <td> <input type="text" class="form-control" name="apci_msn_msn" value="<?= $row -> apci_msn_msn?>" required> </td>
                            <td> <input type="text" class="form-control" name="apci_msn_fecha" value="<?= $row -> apci_msn_fecha?>" required> </td>
                            <td>
                              <select class="form-control" id="apci_msn_estado" name="apci_msn_estado" required>
                                <?php foreach ($statusmsn as $rowstat) { ?>
                                  <option value="<?= $rowstat -> apci_id_msn_status ?>"> <?= $rowstat -> apci_msn_status ?> </option>
                                <?php } ?>
                              </select>
                            </td>
                            <td> <input type="submit" name=""  class="btn btn-outline-success" value="Modificar"> </td>
                          </tr>
                        </form>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
