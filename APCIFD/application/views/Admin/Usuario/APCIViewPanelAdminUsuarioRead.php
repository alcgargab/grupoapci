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
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <?php foreach ($alluser as $row) {
                      foreach ($userarea as $rowarea) { ?>
                      <tr>
                        <td> <?= $row -> apci_id_user ?> </td>
                        <td> <?= $row -> apci_username ?> </td>
                        <td> <?= $row -> apci_password ?> </td>
                        <td> <?= $row -> apci_name ?> </td>
                        <td> <?= $row -> apci_usertype ?> </td>
                        <td> <?= $rowarea -> apci_area ?> </td>
                      </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
