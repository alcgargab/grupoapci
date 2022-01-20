    <div id="apci_panel_admin_contenedor">
      <div class="row">
        <div id="apci_panel_admin_menu" class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div>
                <?php $imagen = $user[0] -> apci_imagen_user;
                if (empty($imagen)) { ?>
                  <a href="<?= base_url()?>"> <img id="apci_panel_admin_menu_logo" src=" <?= base_url()?>images/user/apci_user.png" alt=""> </a>
                <?php }else{ ?>
                  <a href="<?= base_url()?>"> <img id="apci_panel_admin_menu_logo" src=" <?= base_url()?>images/user/<?= $user[0] -> apci_imagen_user?>" alt=""> </a>
                <?php }?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <?php foreach ($user as $row) { ?>
                <span id="apci_panel_admin_menu_name"> <?php print_r($row -> apci_name); ?> </span>
                <input id="apci_panel_admin_menu_name_id" type="hidden" name="" value="<?php print_r($row -> apci_id_user)?>">
                <input id="apci_panel_admin_menu_name_id" type="hidden" name="" value="<?php print_r($row -> apci_id_user_area)?>">
              <?php } ?>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <a id="apci_mostrar_tablas" class="list-group-item" data-toggle="collapse" data-target="#apci_tablas" href="#"> TABLAS </a>
              <div id="apci_tablas" class="collapse">
                <ul id="apci_panel_user_list" class="list-group">
                  <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIPanelAdmin/APCIPanelAreas"> Áreas <i id="apci_admin_menu_icon" class="fas fa-building"> </i> </a>
                  <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIPanelAdmin/APCIPanelFormatos"> Formatos <i id="apci_admin_menu_icon" class="fas fa-file-alt"> </i> </a>
                  <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIPanelAdmin/APCIPanelFormatosUser"> Formatos por Usuario <i id="apci_admin_menu_icon" class="fas fa-paperclip"></i> </a>
                  <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIPanelAdmin/APCIPanelMensaje"> Mensajes <i id="apci_admin_menu_icon" class="fas fa-envelope"> </i> </a>
                  <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIPanelAdmin/APCIPanelSesion"> Sesiones <i id="apci_admin_menu_icon" class="fas fa-address-card"> </i> </a>
                  <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIPanelAdmin/APCIPanelUser"> Usuarios <i id="apci_admin_menu_icon" class="fas fa-user-friends"> </i> </a>
                </ul>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <a id="apci_mostrar_tablas" class="list-group-item" data-toggle="collapse" data-target="#apci_reportes" href="#"> REPORTES </a>
              <div id="apci_reportes" class="collapse">
                <ul id="apci_panel_user_list" class="list-group">
                  <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIReportes/APCISesUsu"> Sesiones por Usuario </a>
                  <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIReportes/APCIFormUser"> Formatos por Usuario </a>
                  <!-- <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIReportes/APCIAreaFormPend"> Formatos por Área  </a> -->
                  <!-- <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIReportes/APCIAreaFormTer"> Área con Formatos Terminados </a> -->
                  <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIReportes/APCIStaForm"> Status de los Formatos </a>
                  <!-- <a id="APCIAdminliga" class="list-group-item" href="<?= base_url()?>APCIPanelAdmin/APCIPanelUser"> Usuarios </a> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
