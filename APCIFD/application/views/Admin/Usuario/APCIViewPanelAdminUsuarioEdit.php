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
                      <th> Id Usuario </th>
                      <th> Usuario </th>
                      <th> Contraseña </th>
                      <th> Nombre </th>
                      <th> Tipo de Usuario </th>
                      <th> Área </th>
                      <th> Ajuste </th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <?php foreach ($alluser as $row) { ?>
                        <form class="" action="<?= base_url()?>APCIUsuario/APCIEditSi" method="post">
                          <tr>
                            <input type="hidden" name="apci_id_user_view" value="<?= $row -> apci_id_user?>">
                            <td> <input type="text" class="form-control" name="apci_id_user" value="<?= $row -> apci_id_user?>" disabled> </td>
                            <td> <input type="text" class="form-control" name="apci_username" value="<?= $row -> apci_username?>"> </td>
                            <td> <input type="text" class="form-control" name="apci_password" value="<?= $row -> apci_password?>"> </td>
                            <td> <input type="text" class="form-control" name="apci_name" value="<?= $row -> apci_name?>"> </td>
                            <td> <input type="text" class="form-control" name="apci_usertype" value="<?= $row -> apci_usertype?>"> </td>
                            <td>
                              <select class="form-control" name="select_user">
                                <?php foreach ($allarea as $row) { ?>
                                  <option value="<?= $row -> apci_id_area ?>"> <?= $row -> apci_area ?></option>
                                <?php }?>
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
