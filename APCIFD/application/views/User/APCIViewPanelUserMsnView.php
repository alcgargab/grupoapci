      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div id="apci_panel_user_menu_Msn" class="container">
          <div class="card">
            <?php foreach ($apci_mensaje as $row) {?>
            <div class="card-body">
              <label id="apci_panel_user_menu_Msn_tittle" for="">Nombre del Emisor: </label>
              <h4 class="card-title"> <span id="apci_panel_user_menu_Msn_txt"> <?php print_r($row -> apci_username); ?> </span> </h4>
              <label id="apci_panel_user_menu_Msn_tittle" for="">Título: </label>
              <h4 class="card-title"><span id="apci_panel_user_menu_Msn_txt"> <?php print_r($row -> apci_msn_titulo); ?> </span></h4>
              <label id="apci_panel_user_menu_Msn_tittle" for="">Mensaje: </label>
              <p class="card-text"><span id="apci_panel_user_menu_Msn_txt"> <?php print_r($row -> apci_msn_msn); ?> </span></p>
              <div id="accordion">
                <a id="apci_panel_user_menu_Msn_btn" data-toggle="collapse" href="#apci_panel_user_menu_Msn_Contestar" class="btn">Contestar</a>
                <div id="apci_panel_user_menu_Msn_Contestar" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    <form class="form" action="<?= base_url()?>APCILogin/APCISendMsn" method="post">
                      <input type="hidden" name="apci_select_users" value="<?php print_r($row -> apci_id_user); ?>">
                      <div class="row">
                        <div id="apci_margin_row" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <label for="apci_oanel_User_msn_titulo">Título del Mensaje:</label>
                          <input id="apci_oanel_User_msn_titulo" class="form-control" type="text" name="apci_oanel_User_msn_titulo" value="" placeholder="Titulo del Mensaje" required>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                          <input type="hidden" name="apci_oanel_User_msn_status" id="apci_oanel_User_msn_status" value="<?php print_r($StatusMsn[0] -> apci_id_msn_status); ?>">
                        </div>
                      </div>
                      <div class="row">
                        <div id="apci_margin_row" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <label for="apci_oanel_User_msn_txt">Mensaje:</label>
                          <textarea id="apci_oanel_User_msn_txt" class="form-control" name="apci_oanel_User_msn_txt" rows="8" cols="80" required></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div id="apci_margin_row" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <input id="apci_oanel_User_msn_btn" class="btn" type="submit" name="apci_oanel_User_msn_btn" value="Enviar Mensaje">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
