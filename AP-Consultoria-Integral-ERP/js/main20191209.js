$(document).ready(function() {
  // --------------- AGREGAR CLASES --------------- //
  // --------------- CLASES PRINCIPALES --------------- //
  $('.ap-class-12').addClass('col-12');
  $('.Class-11').addClass('col-11');
  $('.ap-class-10').addClass('col-10');
  $('.ap-class-9').addClass('col-9');
  $('.ap-class-8').addClass('col-8');
  $('.ap-class-7').addClass('col-7');
  $('.ap-class-6').addClass('col-6');
  $('.ap-class-5').addClass('col-5');
  $('.ap-class-4').addClass('col-4');
  $('.ap-class-3').addClass('col-3');
  $('.ap-class-2').addClass('col-2');
  $('.Class-1').addClass('col-1');
  $('.ap-class-9-9-9-12').addClass('col-sm-9 col-12');
  $('.ap-class-8-8-8-12').addClass('col-sm-8 col-12');
  $('.ap-class-6-6-6-12').addClass('col-sm-6 col-12');
  $('.ap-class-5-5-5-12').addClass('col-sm-5 col-12');
  $('.ap-class-4-4-4-12').addClass('col-sm-4 col-12');
  $('.ap-class-3-3-3-12').addClass('col-sm-3 col-12');
  $('.ap-class-2-2-2-12').addClass('col-sm-2 col-12');
  $('.ap-class-4-4-6-12').addClass('col-md-4 col-sm-6 col-12');
  $('.ap-class-3-3-6-12').addClass('col-md-3 col-sm-6 col-12');
  // --------------- MENUS --------------- //
  $('.ap-menu-lg-class').addClass('col-md-3 col-sm-6 col-12');
  // $('.ap-menu-s-class').addClass('col-md-1 col-sm-6 col-12');
  // $('.ap-menu-s-class').css('display', 'none');
  // --------------- HOME --------------- //
  $('.ap-home-class').addClass('col-md-9 col-sm-6 col-12');
  $('[data-toggle="tooltip"]').tooltip();
  // --------------- MOSTRAR LOGOS DE LOS BOTONES --------------- //
  $('#btnHome1').mouseover(function() {
    $('#btnHome1 a img').show();
  }).mouseout(function() {
    $('#btnHome1 a img').hide();
  });
  $('#btnHome2').mouseover(function() {
    $('#btnHome2 a img').show();
  }).mouseout(function() {
    $('#btnHome2 a img').hide();
  });
  $('#btnHome3').mouseover(function() {
    $('#btnHome3 a img').show();
  }).mouseout(function() {
    $('#btnHome3 a img').hide();
  });
  $('#btnHome4').mouseover(function() {
    $('#btnHome4 a img').show();
  }).mouseout(function() {
    $('#btnHome4 a img').hide();
  });
  $('#btnHome5').mouseover(function() {
    $('#btnHome5 a img').show();
  }).mouseout(function() {
    $('#btnHome5 a img').hide();
  });
  $('#btnHome6').mouseover(function() {
    $('#btnHome6 a img').show();
  }).mouseout(function() {
    $('#btnHome6 a img').hide();
  });

  // --------------- obtenemos la ubicación --------------- //
  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var ubicacion = position.coords.latitude + "," + position.coords
        .longitude;
      $("#ERPUbicacion").val(ubicacion);
      $("#ap_geolocation").val(ubicacion);
    });
  } else {
    Swal.fire({
      title: 'ERROR',
      text: 'Lo siento tu navegador no soporta la ubicación. Te pedimos que cambies de navegador. Gracias',
      type: 'error',
      confirmButtonText: 'Cerrar <i class="fas fa-times-circle"></i>'
    }).then(
      result => {
        if (result.value) {
          window.location.replace("<?= base_url()?>");
        }
      }
    );
  }
  // --------------- rutas --------------- //
  var rutaActual = location.href;
  $('#btnEditInfoNo, #btnProNo, #work, .btnRuta').click(
    function() {
      localStorage.setItem("rutaActual", rutaActual);
    });
  // --------------- BUSCADOR DE EMPLEADO --------------- //
  $("#SearchUser").on("keyup", function() {
    $('.tablaRegistros').css('display', 'block');
    var value = $(this).val().toLowerCase();
    if (value == "") {
      $('.tablaRegistros').css('display', 'none');
    }
    $("#tablaUserBody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) >
        -1)
    });
  });
  $('#btnerpMenuL').click(function(event) {
    $('.ap-home-class').removeClass('col-md-9 col-sm-6 col-12');
    $('.ap-home-class').addClass('col-md-11 col-sm-6 col-12');
    $('#ap-menu-lg').css('display', 'none');
    $('#btnerpMenuL').css('display', 'none');
    $('#ap-menu-s').css('display', 'block');
    $('#btnerpMenuS').css('display', 'block');
  });
  $('#btnerpMenuS').click(function(event) {
    $('.ap-home-class').removeClass('col-md-11 col-sm-6 col-12');
    $('.ap-home-class').addClass('col-md-9 col-sm-6 col-12');
    $('#ap-menu-s').css('display', 'none');
    $('#btnerpMenuS').css('display', 'none');
    $('#ap-menu-lg').css('display', 'block');
    $('#btnerpMenuL').css('display', 'block');
  });
  // --------------- VALIDAR EL NAVEGADOR --------------- //
  var getBrowserInfo = function() {
    var ua = navigator.userAgent,
      tem,
      M = ua.match(
        /(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i
      ) || [];
    if (/trident/i.test(M[1])) {
      tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
      return 'IE ' + (tem[1] || '');
    }
    if (M[1] === 'Chrome') {
      tem = ua.match(/\b(OPR|Edge)\/(\d+)/);
      if (tem != null) return tem.slice(1).join(' ').replace('OPR',
        'Opera');
    }
    M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion,
      '-?'
    ];
    if ((tem = ua.match(/version\/(\d+)/i)) != null) M.splice(1, 1,
      tem[1]);
    return M.join(' ');
  };
  $('#navegador').val(getBrowserInfo());
  // --------------- ADJUNTAR LOS ARCHIVOS SELECCIONADOS EN EL CORREO --------------- //
  $('.ap-adj-email').change(function() {
    var filename = $(this).val().split('\\').pop();
    $('#ap-adj-email-name').html(filename);
  });
});
// --------------- VALIDAR EL INICIO DE SESION --------------- //
function validate_login() {
  // --------------- VALIDAR CAMPO NOMBRE --------------- //
  var usuario = $('#Usuario').val();
  if (usuario != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(usuario)) {
      $('#ap-error-login').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Usuario. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-login').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de usuario obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CONTRASEÑA --------------- //
  var password = $('#Password').val();
  if (password != "") {
    var expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test(password)) {
      $('#ap-error-login').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> No se permiten caracteres especiales en el campo de contraseña. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-login').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de contraseña obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar envio de email --------------- //
function validate_email() {
  // --------------- campo correo electronico --------------- //
  var from = $('#from').val();
  if (from != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(from)) {
      $('#ap-error-email').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Escriba un Correo electrónico existente. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-email').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de destinatario obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de asunto --------------- //
  var subject = $('#subject').val();
  if (subject != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(subject)) {
      $('#ap-error-email').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se aceptan caracteres especiales en el asunto. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-email').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de asunto obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de redactar --------------- //
  var redactar = $('#redactar').val();
  if (redactar != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(redactar)) {
      $('#ap-error-email').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se aceptan caracteres especiales en el asunto. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-email').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de asunto obligatorio. </div>'
    );
    return false;
  }
}
