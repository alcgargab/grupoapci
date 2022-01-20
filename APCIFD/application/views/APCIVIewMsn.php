    <div id="apci_panel_user_contenedor">
      <div class="row">
        <div id="aoci_panel_user_menu" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div id="apci_panel_user_menu_container_logo">
                <img id="apci_panel_user_menu_logo" src="<?= base_url()?>images/user/apci_user.png" alt="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <span id="apci_panel_user_menu_name"> <?php print_r($apci_login_usuario); ?> </span>
              <input id="apci_panel_user_menu_name_id" type="text" name="" value="<?php print_r($ApciLogin -> apci_id_user)?>">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <span id="apci_panel_user_menu_tittle"> Formatos </span>
              <ul class="list-group">
                <li class="list-group-item">Active item</li>
                <li class="list-group-item">Second item</li>
                <li class="list-group-item">Third item</li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <span id="apci_panel_user_menu_tittle"> Mensajes </span>
              <ul class="list-group">
                <li class="list-group-item"> <a href="<?= base_url()?>APCILogin/APCISendMsn/<?= $ApciLogin -> apci_id_user ?>"> Nuevo Mensaje </a> </li>
                <li class="list-group-item">Second item</li>
                <li class="list-group-item">Third item</li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <span id="apci_panel_user_menu_tittle"> Pendientes </span>
              <ul class="list-group">
                <li class="list-group-item">Active item</li>
                <li class="list-group-item">Second item</li>
                <li class="list-group-item">Third item</li>
              </ul>
            </div>
          </div>
        </div>
