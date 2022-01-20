          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div id="apci_panel_User_msn" class="container">
              <form class="form" action="<?= base_url()?>APCILogin/APCISendMsn" method="post">
                <div class="row">
                  <div id="apci_margin_row" class="col-lg-8 col-md-8 col-sm-12 col-xs-8 ">
                    <label for="apci_select_users">Selecciona el usuario:</label>
                    <select class="form-control" id="apci_select_users" name="apci_select_users" required>
                      <option> Seleccionar </option>
                      <?php foreach ($APCInewMsn as $row){ ?>
                      <option value="<?php print_r($row -> apci_id_user)?>"> <?php print_r($row -> apci_username)?> </option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div id="apci_margin_row" class="col-lg-6 col-md-6 col-sm-10 col-xs-12 ">
                    <label for="apci_oanel_User_msn_titulo">Título del Mensaje:</label>
                    <input id="apci_oanel_User_msn_titulo" class="form-control" type="text" name="apci_oanel_User_msn_titulo" value="" placeholder="Titulo del Mensaje" required>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <input type="hidden" name="apci_oanel_User_msn_status" id="apci_oanel_User_msn_status" value="<?php print_r($StatusMsn[0] -> apci_id_msn_status); ?>">
                  </div>
                </div>
                <div class="row">
                  <div id="apci_margin_row" class="col-lg-7 col-md-7 col-sm-8 col-xs-12 ">
                    <label for="apci_oanel_User_msn_txt">Mensaje:</label>
                    <textarea id="apci_oanel_User_msn_txt" class="form-control" name="apci_oanel_User_msn_txt" rows="8" cols="80" required></textarea>
                  </div>
                </div>
                <div class="row">
                  <div id="apci_margin_row" class="col-lg-7 col-md-7 col-sm-6 col-xs-12 offset-2">
                    <input id="apci_oanel_User_msn_btn" class="btn" type="submit" name="apci_oanel_User_msn_btn" value="Enviar Mensaje">
                  </div>
                </div>
              </form>
              <input id="sdsdsdsdsds" class="btn" type="submit" name="apci_oanel_User_msn_btn" value="Enaaaviar Mensaje">
              <br><br><br>
              <!-- <a href="<?= base_url()?>APCILogin/APCIGetMsnReci"> dsds</a>
              <span id="iioiojoij"></span>
              <select class="form-control" name="subcategoria" id="iioiojoijdsadsdsa">
								<option value=""> Subcategoria</option>
							</select> -->
            </div>
          </div>
        </div>
      </div>
