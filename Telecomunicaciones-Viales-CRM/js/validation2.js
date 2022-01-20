// --------------- validar formulario de sesion --------------- //
function login() {
  // --------------- VALIDAR CAMPO NOMBRE --------------- //
  var usuario = $('#usuario').val();
  if (usuario != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(usuario)) {
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
  // --------------- VALIDAR CONTRASEÑA--------------- //
  var password = $('#password').val();
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
  // var callEmail = $('#CallEmail').val();
  // if (callEmail != "") {
  //   var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  //   if (!expresion.test(callEmail)) {
  //     $('#errorFormSeguimiento').html(
  //       '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Email. </div>'
  //     );
  //     return false;
  //   }
  // } else {
  //   $('#errorFormSeguimiento').html(
  //     '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Email obligatorio. </div>'
  //   );
  //   return false;
  // }
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
  if (callPaquete != "Selecciona el paquete") {} else {
    $('#errorFormSeguimiento').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Paquete obligatorio. </div>'
    );
    return false;
  }
}
// --------------- VALIDAR LA BUSQUEDA DEL SUPERVISOR --------------- //
function ValidarBusquedaE() {
  var ejecutivo = $('#Ejecutivo').val();
  if (ejecutivo != "Selecciona-una-opcion") {} else {
    $('#errorFormBE').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Selecciona el ejecutivo. </div>'
    );
    $('#errorFormBEm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Selecciona el empleado. </div>'
    );
    return false;
  }
}
// --------------- VALIDAR LA BUSQUEDA DEL SUPERVISOR Y LA FECHA --------------- //
function ValidarBusquedaET() {
  var ejecutivoTF = $('#EjecutivoTF').val();
  if (ejecutivoTF != "Selecciona-una-opcion") {} else {
    $('#errorFormBEF').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Selecciona el ejecutivo. </div>'
    );
    $('#errorFormBEmF').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Selecciona el empleado. </div>'
    );
    return false;
  }
}
// --------------- VALIDAR LA BUSQUEDA DEL SUPERVISOR Y LA FECHA SESIONES --------------- //
function ValidarBusquedaEmT() {
  var callUsuarioEF = $('#CallUsuarioEF').val();
  if (callUsuarioEF != "Selecciona-una-opcion") {} else {
    $('#errorFormBEmSF').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Selecciona el empleado. </div>'
    );
    return false;
  }
}
