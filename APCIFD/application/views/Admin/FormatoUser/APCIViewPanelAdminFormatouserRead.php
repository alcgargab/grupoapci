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
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <?php foreach ($allformatouser as $rowuserform) {
                      foreach ($alluser as $rowuser) {
                        foreach ($allformato as $rowform) {
                          foreach ($statusform as $rowformst) { ?>
                            <tr>
                              <td> <?= $rowuserform -> apci_id_formato_user ?> </td>
                              <td> <?= $rowuser -> apci_username ?> </td>
                              <td> <?= $rowform -> apci_formatoDigital ?> </td>
                              <td> <?= $rowformst -> apci_form_status ?> </td>
                            </tr>
                          <?php }
                        }
                      }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
