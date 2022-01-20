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
                      <th> Id Formato </th>
                      <th> Usuario </th>
                      <th> Formato </th>
                      <th> Status </th>
                      <th> Ajuste </th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <?php foreach ($allformatouser as $row) { ?>
                        <form class="" action="<?= base_url()?>APCIFormatouser/APCIEditSi" method="post">
                          <tr>
                            <input type="hidden" name="apci_id_formuser_view" value="<?= $row -> apci_id_formato_user?>">
                            <td> <input type="text" class="form-control" name="apci_id_formato_user" value="<?= $row -> apci_id_formato_user?>" disabled required> </td>
                            <td>
                              <select class="form-control" id="apci_id_for_user" name="apci_id_for_user" required>
                                <?php foreach ($alluser as $row) { ?>
                                  <option value="<?= $row -> apci_id_user ?>"> <?= $row -> apci_username ?> </option>
                                <?php } ?>
                             </select>
                            </td>
                            <td>
                              <select class="form-control" id="apci_id_formato" name="apci_id_formato" required>
                                <?php foreach ($allformato as $row) { ?>
                                  <option value="<?= $row -> apci_id_formato ?>"> <?= $row -> apci_formatoDigital ?> </option>
                                <?php } ?>
                             </select>
                            </td>
                            <td>
                              <select class="form-control" id="apci_formato_status" name="apci_formato_status" required>
                                <?php foreach ($statusform as $row) { ?>
                                  <option value="<?= $row -> apci_id_form_status ?>"> <?= $row -> apci_form_status ?> </option>
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
