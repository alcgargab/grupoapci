// --------------- VALIDAR EL TIEMPO DE SESIÓN DEL USUARIO --------------- //
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();
  // --------------- OBTENEMOS UBICACION DEL USUARIO --------------- //
  if ("geolocation" in navigator) { //check geolocation available
    //try to get user current location using getCurrentPosition() method
    navigator.geolocation.getCurrentPosition(function(position) {
      var ubicacion = " " + position.coords.latitude + " " + position.coords
        .longitude;
      $("#ERPUbicacion").val(ubicacion);
    });
  } else {
    var ubicacion = "" + position.coords.latitude + "" + position.coords
      .longitude;
    $("#ERPUbicacion").val(ubicacion);
  }
  // --------------- CARTURAR RUTAS --------------- //
  var rutaActual = location.href;
  $(
    '#btnEnvCorreo'
  ).click(
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
  // --------------- PONER TODOS LOS ARCHIVOS ADJUNTOS PARA ENVIAR EL CORREO --------------- //
  $('.adjArchivos').change(function() {
    var filename = $(this).val().split('\\').pop();
    $('#adjArchivosSpan').html(filename);
  });
  // --------------- MENU LATERAL --------------- //
  $('#btnerpMenuL').click(function(event) {
    $('#erpMenuL').css('display', 'none');
    $('#btnerpMenuL').css('display', 'none');
    $('#erpMenuS').css('display', 'block');
    $('#btnerpMenuS').css('display', 'block');
  });
  $('#btnerpMenuS').click(function(event) {
    $('#erpMenuS').css('display', 'none');
    $('#btnerpMenuS').css('display', 'none');
    $('#erpMenuL').css('display', 'block');
    $('#btnerpMenuL').css('display', 'block');
  });
});
// --------------- VALIDAR EL INICIO DE SESION --------------- //
function iniciarSesion() {
  // --------------- VALIDAR CAMPO NOMBRE --------------- //
  var usuario = $('#Usuario').val();
  if (usuario != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(usuario)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Usuario. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de usuario obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CONTRASEÑA --------------- //
  var password = $('#Password').val();
  if (password != "") {
    var expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test(password)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> No se permiten caracteres especiales en el campo de contraseña. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de contraseña obligatorio. </div>'
    );
    return false;
  }
}
