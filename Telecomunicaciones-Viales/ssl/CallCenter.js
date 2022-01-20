$(document).ready(function() {
  // --------------- OBTENEMOS LA HORA LOCAL --------------- //
  var horalocal = new Date();
  hora = horalocal.getHours() + ":" + horalocal.getMinutes() + ":" +
    horalocal.getSeconds();
  $("#horaLocal").val(hora);
  // --------------- BLOQUEAMOS EL BOTON DE BREAK --------------- //
  $("#tomarbreak").click(function() {
    // $("#tomarbreak").attr('disabled', 'disabled');
    $("#tomarbreak").css('display', 'none');
  });
  // --------------- OBTENEMOS UBICACION DEL USUARIO --------------- //
  if ("geolocation" in navigator) { //check geolocation available
    //try to get user current location using getCurrentPosition() method
    navigator.geolocation.getCurrentPosition(function(position) {
      var ubicacion = " " + position.coords.latitude + " " + position.coords
        .longitude;
      $("#CallUbicacion").val(ubicacion);
    });
  } else {
    var ubicacion = "" + position.coords.latitude + "" + position.coords
      .longitude;
    $("#CallUbicacion").val(ubicacion);
  }
  // --------------- CARTURAR RUTAS --------------- //
  var rutaActual = location.href;
  $(
    '#btnCallForm, #btnCallFormLlamada, #btnCallFormSeguimiento, #btnEditInfoLlamada, #tomarbreak',
  ).click(
    function() {
      localStorage.setItem("rutaActual", rutaActual);
    });
  // --------------- BUSCADOR DE EMPLEADO --------------- //
  $("#SearchSeg").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaSeguimientos tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) >
        -1)
    });
  });
});
// --------------- VALIDAR EL INICIO DE SESION --------------- //
function iniciarSesion() {
  // --------------- VALIDAR CAMPO NOMBRE --------------- //
  var callUsuario = $('#CallUsuario').val();
  if (callUsuario != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(callUsuario)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Usuario. </div>'
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
  var callPassword = $('#CallPassword').val();
  if (callPassword != "") {
    var expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test(callPassword)) {
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
// --------------- VALIDAR AGREGAR UNA LLAMADA --------------- //
function ValidarLlamada() {
  // --------------- VALIDAR CAMPO APELLIDO PATERNO --------------- //
  var callApPaterno = $('#CallApPaterno').val();
  if (callApPaterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(callApPaterno)) {
      $('#errorFormLlamada').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido paterno. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormLlamada').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Apellido paterno obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO APELLIDO MATERNO --------------- //
  var callApMaterno = $('#CallApMaterno').val();
  if (callApMaterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(callApMaterno)) {
      $('#errorFormLlamada').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido materno. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormLlamada').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Apellido materno obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO NOMBRE --------------- //
  var callNombres = $('#CallNombres').val();
  if (callNombres != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(callNombres)) {
      $('#errorFormLlamada').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Nombre. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormLlamada').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Nombre obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO EMAIL --------------- //
  var callEmail = $('#CallEmail').val();
  if (callEmail != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(callEmail)) {
      $('#errorFormLlamada').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Email. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormLlamada').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Email obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO TELEFONO DE CASA --------------- //
  var callNumCasa = $('#CallNumCasa').val();
  if (callNumCasa != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(callNumCasa)) {
      $('#errorFormLlamada').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Teléfono de Casa. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormLlamada').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Teléfono de Casa obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO TELEFONO CELULAR --------------- //
  var callNumCelular = $('#CallNumCelular').val();
  if (callNumCelular != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(callNumCelular)) {
      $('#errorFormLlamada').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Teléfono de Celular. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormLlamada').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Teléfono de Celular obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO TELEFONO CELULAR --------------- //
  var callPaquete = $('#CallPaquete').val();
  if (callPaquete != "Selecciona el paquete") {
    // var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    // if (!expresion.test(callPaquete)) {
    //   $('#errorFormLlamada').html(
    //     '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Paquete. </div>'
    //   );
    //   return false;
    // }
  } else {
    $('#errorFormLlamada').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Paquete obligatorio. </div>'
    );
    return false;
  }
}
// --------------- VALIDAR AGREGAR UNA LLAMADA --------------- //
function ValidarSeguimiento() {
  // --------------- VALIDAR CAMPO APELLIDO PATERNO --------------- //
  var callApPaterno = $('#CallApPaterno').val();
  if (callApPaterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(callApPaterno)) {
      $('#errorFormSeguimiento').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido paterno. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormSeguimiento').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Apellido paterno obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO APELLIDO MATERNO --------------- //
  var callApMaterno = $('#CallApMaterno').val();
  if (callApMaterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(callApMaterno)) {
      $('#errorFormSeguimiento').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido materno. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormSeguimiento').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Apellido materno obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO NOMBRE --------------- //
  var callNombres = $('#CallNombres').val();
  if (callNombres != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(callNombres)) {
      $('#errorFormSeguimiento').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Nombre. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormSeguimiento').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Nombre obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO EMAIL --------------- //
  var callEmail = $('#CallEmail').val();
  if (callEmail != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(callEmail)) {
      $('#errorFormSeguimiento').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Email. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormSeguimiento').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Email obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO TELEFONO DE CASA --------------- //
  var callNumCasa = $('#CallNumCasa').val();
  if (callNumCasa != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(callNumCasa)) {
      $('#errorFormSeguimiento').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Teléfono de Casa. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormSeguimiento').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Teléfono de Casa obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO TELEFONO CELULAR --------------- //
  var callNumCelular = $('#CallNumCelular').val();
  if (callNumCelular != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(callNumCelular)) {
      $('#errorFormSeguimiento').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Teléfono de Celular. </div>'
      );
      return false;
    }
  } else {
    $('#errorFormSeguimiento').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Teléfono de Celular obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO TELEFONO CELULAR --------------- //
  var callPaquete = $('#CallPaquete').val();
  if (callPaquete != "Selecciona el paquete") {
    // var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    // if (!expresion.test(callPaquete)) {
    //   $('#errorFormSeguimiento').html(
    //     '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Paquete. </div>'
    //   );
    //   return false;
    // }
  } else {
    $('#errorFormSeguimiento').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Paquete obligatorio. </div>'
    );
    return false;
  }
}
