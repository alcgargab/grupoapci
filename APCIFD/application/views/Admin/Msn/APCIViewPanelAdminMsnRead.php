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
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <?php foreach ($allmsn as $row) {
                      foreach ($msnemi as $rowemi) {
                        foreach ($msnrem as $rowremi) { ?>
                          <tr>
                            <td> <?= $row -> apci_id_mensaje ?> </td>
                            <td> <?= $rowemi -> apci_username ?> </td>
                            <td> <?= $rowremi -> apci_username ?> </td>
                            <td> <?= $row -> apci_msn_titulo ?> </td>
                            <td> <?= $row -> apci_msn_msn ?> </td>
                            <td> <?= $row -> apci_msn_fecha ?> </td>
                            <td> <?= $row -> apci_msn_estado ?> </td>
                          </tr>
                        <?php }
                      }
                    }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
