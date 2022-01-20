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
                      <th> Id Sesion </th>
                      <th> Usuario </th>
                      <th> IP </th>
                      <th> Fecha </th>
                      <th> Modificar </th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <?php foreach ($allsesion as $row) {
                      foreach ($sesionusuario as $rowuser) {?>
                        <form class="" action="<?= base_url()?>APCISesion/APCIEditSi" method="post">
                          <tr>
                            <input type="hidden" name="apci_id_sesion_view" value="<?= $row -> apci_id_sesion?>">
                            <td> <input type="text" class="form-control" name="apci_id_sesion" value="<?= $row -> apci_id_sesion?>" disabled> </td>
                            <td> <input type="text" class="form-control" name="apci_id_sesion_user" value="<?= $rowuser -> apci_username?>"> </td>
                            <td> <input type="text" class="form-control" name="apci_user_sesion_ip" value="<?= $row -> apci_user_sesion_ip?>"> </td>
                            <td> <input type="text" class="form-control" name="apci_sesion_date" value="<?= $row -> apci_sesion_date?>"> </td>
                            <td> <input type="submit" name=""  class="btn btn-outline-success" value="Modificar"> </td>
                          </tr>
                        </form>
                      <?php }
                    }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
