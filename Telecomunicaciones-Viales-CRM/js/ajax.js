$(document).ready(function() {
  // --------------- formulario de agregar nuevo registro --------------- //
  // ¿Hubo comunicación?
  $('#recordCom').change(function() {
    var value = $(this).val();
    if (value == 1) {
      $('#recordComsi').css('display', 'block');
      $('#recordComno').css('display', 'none');
      $('#recordRlsi').css('display', 'none');
      $('#recordRlno').css('display', 'none');
      $('#recordIssi').css('display', 'none');
      $('#recordEmsi').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    } else if (value == 2) {
      $('#recordComsi').css('display', 'none');
      $('#recordComno').css('display', 'block');
      $('#recordRlsi').css('display', 'none');
      $('#recordRlno').css('display', 'none');
      $('#recordIssi').css('display', 'none');
      $('#recordEmsi').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    } else {
      $('#recordComsi').css('display', 'none');
      $('#recordComno').css('display', 'none');
      $('#recordRlsi').css('display', 'none');
      $('#recordRlno').css('display', 'none');
      $('#recordEmsi').css('display', 'none');
      $('#recordIssi').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    }
  });
  // ¿se encuentra el Rl o encargado?
  $('#recordRl').change(function() {
    var value = $(this).val();
    if (value == 1) {
      $('#recordRlsi').css('display', 'block');
      $('#recordRlno').css('display', 'none');
      $('#recordIssi').css('display', 'none');
      $('#recordEmsi').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    } else if (value == 2) {
      $('#recordRlsi').css('display', 'none');
      $('#recordRlno').css('display', 'block');
      $('#recordIssi').css('display', 'none');
      $('#recordEmsi').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    } else {
      $('#recordRlsi').css('display', 'none');
      $('#recordRlno').css('display', 'none');
      $('#recordIssi').css('display', 'none');
      $('#recordEmsi').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    }
  });
  // ¿le interesa el servicio?
  $('#recordIs').change(function() {
    var value = $(this).val();
    if (value == 1) {
      $('#recordIssi').css('display', 'block');
      $('#recordRlno').css('display', 'none');
      $('#recordEmsi').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    } else if (value == 2) {
      $('#recordIssi').css('display', 'none');
      $('#recordRlno').css('display', 'none');
      $('#recordEmsi').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    } else {
      $('#recordIssi').css('display', 'none');
      $('#recordRlno').css('display', 'none');
      $('#recordEmsi').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    }
  });
  // ¿en este momento?
  $('#recordEm').change(function() {
    var value = $(this).val();
    if (value == 1) {
      $('#recordEmsi').css('display', 'block');
      $('#recordRlno').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    } else if (value == 2) {
      $('#recordEmsi').css('display', 'none');
      $('#recordRlno').css('display', 'block');
      $('#recordInesi').css('display', 'none');
    } else {
      $('#recordEmsi').css('display', 'none');
      $('#recordRlno').css('display', 'none');
      $('#recordInesi').css('display', 'none');
    }
  });
  // docuemnto recibido
  $('#recordIne').change(function() {
    var value = $(this).val();
    if (value == 1) {
      $('#recordInesi').css('display', 'block');
    } else if (value == 2) {
      $('#recordInesi').css('display', 'none');
    } else {
      $('#recordInesi').css('display', 'none');
    }
  });
  // --------------- generador de usuario y contraseña --------------- //
  $('#namelicense').on('keyup', function() {
    var name = $(this).val().toLowerCase();
    var ap = $('#aplicense').val().toLowerCase();
    var am = $('#amlicense').val().toLowerCase();
    var total = name.length;
    var empresa = $('#empresalicense').val().toLowerCase();
    if (name != "") {
      if (total == 3) {
        var base = "https://crmcc.televiales.net/ajax";
        // var base =
        // "http://127.0.0.1/CodeIgniter/Telecomunicaciones-Viales-CRM/ajax";
        $.ajax({
          url: base + '/generar-codigo',
          success: function(seguimiento) {
            var usuario = empresa[0] + empresa[1] + seguimiento +
              "tv" + ap[0] + am[0] + name[0];
            $('#userlicense').val(usuario);
            $('#passlicense').val(usuario);
            $('#alertsuccess').html(
              '<div class="alert alert-info alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> PERFECTO: </strong> Te sugerimos que copies y pegues el usuario y la contraseña en un lugar seguro. </div>'
            )
          }
        });
      } else {}
    } else {
      $('#userlicense').val('');
      $('#passlicense').val('');
      $('#alertsuccess').html('')
    }
  });

  function validate_follow() {
    var base = "https://crmcc.televiales.net/ajax";
    // var base =
    // "http://127.0.0.1/CodeIgniter/Telecomunicaciones-Viales-CRM/Ajax/";
    var sesion = $('#validarSesion').val();
    var tsesion = $('#TUSesion').val();
    if (sesion == "true") {
      if (tsesion == "2") {
        $.ajax({
          url: base + 'validate-follow-ups',
          success: function(seguimiento) {
            // console.log(seguimiento);
            if (seguimiento > 0) {
              Push.create('Seguimiento', {
                // body: "El dia de hoy tienes" + " " + seguimiento " " +
                // "seguimientos.",
                body: "El dia de hoy tienes seguimientos.",
                icon: "http://127.0.0.1/CodeIgniter/Telecomunicaciones-Viales-CRM/images/Iconos/CRM_Icon_Follow.png",
                // icon: "https://callcenter.televiales.net/images/Icono/Call_Icon_Call.png",
                // vibrate: [200, 100, 200]
              });
            } else {
              // console.log('no');
            }
          }
        });
      }
    }
  }
  setInterval(validate_follow, 1000);

  function validate_doc() {
    var sesion = $('#validarSesion').val();
    if (sesion == "true") {
      var base = "https://crmcc.televiales.net/ajax";
      // var base =
      // "http://127.0.0.1/CodeIgniter/Telecomunicaciones-Viales-CRM/Ajax/";
      $.ajax({
        url: base + 'alaert-doc',
        type: 'POST',
        success: function(respuesta) {
          if (respuesta > 0) {
            for (var i = 1; i <= respuesta; i++) {
              Push.create('Nuevo contrato', {
                body: "Mesa de control agregó un nuevo contrato de uno de tus prospectos.",
                icon: "http://127.0.0.1/CodeIgniter/Telecomunicaciones-Viales-CRM/images/Iconos/CRM_Icon_Con.png",
                vibrate: [200, 100, 200],
              });
            }
            $.ajax({
              url: base + 'update-alert-doc',
              type: 'POST',
              success: function(respuesta) {}
            });
          } else {}
        }
      });
    } else {}
  }
  setInterval(validate_doc, 1000);

  function validate_alert_sheet_number() {
    var sesion = $('#validarSesion').val();
    if (sesion == "true") {
      var base = "https://crmcc.televiales.net/ajax";
      // var base =
      // "http://127.0.0.1/CodeIgniter/Telecomunicaciones-Viales-CRM/Ajax/";
      $.ajax({
        url: base + 'alert-sheet-number',
        type: 'POST',
        success: function(respuesta) {
          if (respuesta > 0) {
            for (var i = 1; i <= respuesta; i++) {
              Push.create('Nuevo folio', {
                body: "Mesa de control agregó un nuevo folio de uno de tus prospectos.",
                icon: "http://127.0.0.1/CodeIgniter/Telecomunicaciones-Viales-CRM/images/Iconos/CRM_Icon_Fol.png",
                vibrate: [200, 100, 200],
              });
            }
            $.ajax({
              url: base + 'update-alert-sheet-number',
              type: 'POST',
              success: function(respuesta) {}
            });
          } else {}
        }
      });
    } else {}
  }
  setInterval(validate_alert_sheet_number, 1000);

  function validate_alert_request() {
    var sesion = $('#validarSesion').val();
    if (sesion == "true") {
      var base = "https://crmcc.televiales.net/ajax";
      // var base =
      // "http://127.0.0.1/CodeIgniter/Telecomunicaciones-Viales-CRM/Ajax/";
      $.ajax({
        url: base + 'alert-requests',
        type: 'POST',
        success: function(respuesta) {
          if (respuesta > 0) {
            for (var i = 1; i <= respuesta; i++) {
              Push.create('Nuevo prosptecto', {
                body: "Se agregó un nuevo prosptecto de venta.",
                icon: "http://127.0.0.1/CodeIgniter/Telecomunicaciones-Viales-CRM/images/Iconos/CRM_Icon_Pro.png",
                vibrate: [200, 100, 200],
              });
            }
            $.ajax({
              url: base + 'update-alert-requests',
              type: 'POST',
              success: function(respuesta) {
                console.log(respuesta);
              }
            });
          } else {
            // console.log('no');
          }
        }
      });
    } else {}
  }
  setInterval(validate_alert_request, 1000);
  // function validate_time_sesion() {
  //   var sesion = $('#validarSesion').val();
  //   if (sesion == "true") {
  //     // var base = "https://www.erp.apci.com.mx/";
  //     var base =
  //       "http://127.0.0.1/CodeIgniter/Telecomunicaciones-Viales-CRM/Ajax/";
  //     $.ajax({
  //       url: base + 'validate-my-sesion',
  //       success: function(respuesta) {
  //         if (respuesta != "false") {
  //           let timerInterval
  //           Swal.fire({
  //             title: '¡ATENCIÓN!',
  //             text: '¡Faltan 5 minutos para cerrar sesión.!',
  //             type: 'warning',
  //             timer: 5000,
  //             onBeforeOpen: () => {
  //               Swal.showLoading()
  //               timerInterval = setInterval(() => {
  //                 Swal.getContent().querySelector('strong')
  //                   .textContent = Swal.getTimerLeft()
  //               }, 100)
  //             },
  //             onClose: () => {
  //               clearInterval(timerInterval)
  //             }
  //           }).then((result) => {
  //             if (
  //               result.dismiss === Swal.DismissReason.timer
  //             ) {}
  //           });
  //         } else {
  //           // console.log(respuesta);
  //         }
  //       }
  //     });
  //   }
  // }
  // setInterval(validate_time_sesion, 1000);
});
