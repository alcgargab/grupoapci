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
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <?php foreach ($allsesion as $row) {
                      foreach ($sesionusuario as $rowuser) {?>
                          <tr>
                            <td> <?= $row -> apci_id_sesion ?> </td>
                            <td> <?= $rowuser -> apci_username ?> </td>
                            <td> <?= $row -> apci_user_sesion_ip ?> </td>
                            <td> <?= $row -> apci_sesion_date ?> </td>
                      <?php }
                      }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
