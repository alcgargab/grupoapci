  <div id="apci_panel_user_contenedor">
    <div class="row">
      <div id="apci_panel_user_menu" class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
        <div id="apci_panel_user_menu_container_logo" class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div>
              <?php $imagen = $ApciLogin -> apci_imagen_user;
              if (empty($imagen)) { ?>
                <a href="<?= base_url()?>"> <img id="apci_panel_user_menu_logo" src=" <?= base_url()?>images/user/apci_user.png" alt=""> </a>
              <?php }else{ ?>
                <a href="<?= base_url()?>"> <img id="apci_panel_user_menu_logo" src=" <?= base_url()?>images/user/<?=$ApciLogin -> apci_imagen_user?>" alt=""> </a>
              <?php }?>
            </div>
          </div>
        </div>
        <div id="apci_panel_user_menu_" class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <input id="apci_Name"type="hidden" name="" value="<?php print_r($ApciLogin -> apci_name); ?>">
            <span id="apci_panel_user_menu_name"> <?php print_r($ApciLogin -> apci_name); ?> </span>
            <input id="apci_panel_user_menu_name_id" type="hidden" name="" value="<?php print_r($ApciLogin -> apci_id_user)?>">
            <input id="apci_panel_user_menu_name_id_area" type="hidden" name="" value="<?php print_r($ApciLogin -> apci_id_user_area)?>">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <span id="apci_panel_user_menu_tittle"> Formatos </span>
            <ul id="apci_panel_user_ul_form" class="list-group">
              <?php foreach ($ApciFD as $row){ ?>
                <form class="" action="<?= base_url()?>APCIForDig" method="post">
                  <input type="hidden" name="apci_id_fd" value="<?php print_r($row -> apci_id_formato)?>">
                  <input type="hidden" name="apci_name_fd" value="<?php print_r($row -> apci_formatoDigital)?>">
                  <li id="apci_panel_user_ul_form_item" class="list-group-item"> <?php print_r($row -> apci_formatoDigital)?> <span id="apci_panel_user_menu_FD"> <button id="apci_panel_user_menu_FD_btn" type="submit" class="btn"> Crear <i id="apci_panel_user_menu_FD_btn_icon" class="fas fa-edit"> </i> </button> </span> </li>
                </form>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <span id="apci_panel_user_menu_tittle"> Mensajes </span>
            <ul id="apci_panel_user_ul_msn" class="list-group">
              <li class="list-group-item"> <a id="apci_panel_user_ul_msn_new" class="btn" href="<?= base_url()?>APCILogin/APCIMsn/<?= $ApciLogin -> apci_id_user ?>"> Enviar nuevo Mensaje </a> </li>
              <div id="accordion">
                <li class="list-group-item">
                  <div class="card">
                    <div id="apci_panel_user_ul_msn_item" class="card-header">
                      <a id="apci_panel_user_ul_msn_tittle" class="collapsed card-link" data-toggle="collapse" href="#apci_panel_user_menu_msnEnviados"> Mensajes Recibidos
                        <span id="apci_panel_user_menu_msn_user">
                          <button id="apci_panel_user_menu_msn_user_total" type="button" class="btn">
                            <input id="apci_totalMsnRecibidos" type="hidden" name="" value="<?php print_r(count($ApciMsnRecibidos));?>">
                            <span id="apci_panel_user_menu_msn_user_total_t" class="badge">
                              <?php print_r(count($ApciMsnRecibidos));?>
                            </span>
                          </button>
                        </span>
                      </a>
                    </div>
                    <div id="apci_panel_user_menu_msnEnviados" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <ul id="apci_panel_user_menu_msnEnviados_msn" class="list-group">
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="card">
                    <div id="apci_panel_user_ul_msn_item" class="card-header">
                      <a id="apci_panel_user_ul_msn_tittle" class="collapsed card-link" data-toggle="collapse" href="#apci_panel_user_menu_msnRecibidos"> Mensajes Enviados
                        <span id="apci_panel_user_menu_msn_user">
                          <button id="apci_panel_user_menu_msn_user_total" type="button" class="btn">
                            <span class="badge">
                              <?php print_r(count($ApciMsnEnviados));?>
                            </span>
                          </button>
                        </span>
                      </a>
                    </div>
                    <div id="apci_panel_user_menu_msnRecibidos" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                        <ul class="list-group">
                        <?php foreach ($ApciMsnEnviados as $row) {?>
                            <li id="<?php print_r($row -> apci_id_mensaje);?>" class="apci_panel_user_msn_item list-group-item"> <?php print_r($row -> apci_msn_titulo); ?>
                              <input type="hidden" name="" value="<?php print_r($row -> apci_id_emisor);?>"> <?php if ($row -> apci_msn_estado == 1) { ?>
                                <img id="apci_panel_user_menu_msnRecibidos_icon" src="<?= base_url()?>images/Iconos/APCIFD_Check.png" alt="APCIFD_Check">
                              <?php }else{ ?>
                                <img id="apci_panel_user_menu_msnRecibidos_icon" src="<?= base_url()?>images/Iconos/APCIFD_Double_Check.png" alt="APCIFD_Double_Check">
                              <?php }?></li>
                        <?php } ?>
                      </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </div>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <span id="apci_panel_user_menu_tittle"> Pendientes </span>
            <ul id="apci_panel_user_ul_pen" class="list-group">
              <?php foreach ($ApciFD as $row){
                if (count($ApciFD) > 0) { ?>
              <li id="apci_panel_user_ul_form_item" class="list-group-item"> <?php print_r($row -> apci_formatoDigital); ?> <span id="apci_panel_user_menu_FD"> <button id="apci_panel_user_menu_FD_btn" type="submit" class="btn"> Ver <i id="apci_panel_user_menu_FD_btn_icon" class="fas fa-eye"> </i> </button> </span> </li>
              <?php }else{ ?>
              <li id="apci_panel_user_ul_form_item" class="list-group-item"> <?php print_r('No tienes pendientes'); ?> <span id="apci_panel_user_menu_FD"> <button id="apci_panel_user_menu_FD_btn" type="submit" class="btn"> Ver <i id="apci_panel_user_menu_FD_btn_icon" class="fas fa-eye"> </i> </button> </span> </li>
            <?php }
              } ?>
            </ul>
          </div>
        </div>
      </div>
<script type="text/javascript">
$(document).ready(function(){
    var totalMsn = $("#apci_totalMsnRecibidos").val();
  // console.log(totalMsn);
  setInterval(function(){
    var totalMsnInterval = $("#apci_totalMsnRecibidos").val();
    var NombreUsuario = $("#apci_Name").val();
    // console.log(totalMsn);
    // console.log(totalMsnInterval + 'intervalo');
    if (totalMsn < totalMsnInterval) {
      alert('Hola '+' '+ NombreUsuario +' '+'Tienes un mensaje nuevo');
      window.location.replace("<?=base_url()?>");
      // Push.create('Nuevo mensaje',{
      //   body: "Has recibido un nuevo mensaje",
      //   icon: "http://www.caemi.com.mx/images/Icon/Aemi_Msn_Icon.png",
      //   // timeout: 4000,
      //   vibrate: [200, 100, 200]
      //   // onClick: function(){
      //   //   window.location ="https//www.google.com.mx";
      //   //   this.close();
      //   // }
      // });
    }
    // $('#apci_panel_user_menu_msnEnviados_msn').html('');
    $.ajax({
      data : "",
      url : '<?=base_url()?>APCILogin/APCIGetMsnReci',
      type : 'post',
      success : function(response){
        $("#apci_panel_user_menu_msnEnviados_msn").html(response);
      }
    });
    // $('#apci_panel_user_menu_msn_user_total_t').html('');
    $.ajax({
      data : "",
      url : '<?=base_url()?>APCILogin/APCIGetMsnRecitotal',
      type : 'post',
      success : function(response){
        $("#apci_panel_user_menu_msn_user_total_t").html(response);
        $("#apci_totalMsnRecibidos").val(response);
      }
    });
  }, 3000);
  // FUNCION CUANDO SE CARGUE LA PAGINA
  // window.onload = function CargarPagina(){
  //   alert('Prueba');
  // }


  // FUNCIONES CON TIEMPO
  // window.onload = function EjemploTiempo(){
  //   setTimeout('functionTime()', functionHora());
  // }
  // function functionHora(){
  //   HoraActual = new Date();
  //   HoraProgramada = new Date();
  //   HoraProgramada.setHours(12);
  //   HoraProgramada.setMinutes(0);
  //   HoraProgramada.setSeconds(0);
  //   return HoraProgramada.getTime() - HoraActual.getTime();
  // }
  // function Ejecution(){
  //   alert('Prueba');
  // }
});
</script>
