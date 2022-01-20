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
                      <th> Formato </th>
                      <th> Área </th>
                      <th> Ajuste </th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <?php foreach ($allformato as $row) { ?>
                        <form class="" action="<?= base_url()?>APCIFormato/APCIEditSi" method="post">
                          <tr>
                            <input type="hidden" name="apci_id_area_view" value="<?= $row -> apci_id_formato?>">
                            <td> <input type="text" class="form-control" name="apci_id_formato" value="<?= $row -> apci_id_formato?>" disabled required> </td>
                            <td> <input type="text" class="form-control" name="apci_formatoDigital" value="<?= $row -> apci_formatoDigital?>" required> </td>
                            <td>
                              <select class="form-control" id="sel1" name="apci_id_formato_area" required>
                                <?php foreach ($allarea as $row) { ?>
                                  <option value="<?= $row -> apci_id_area ?>"> <?= $row -> apci_area ?> </option>
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
