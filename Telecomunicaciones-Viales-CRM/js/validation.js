$(document).ready(function() {
  // ---------------bloquear el copiar y pegar en inputs --------------- //
  $("#usuario").on('paste', function() {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Campos bloqueados para copiar y pegar. </div>'
    );
  });
  $("#usuario").on('copy', function() {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Campos bloqueados para copiar y pegar. </div>'
    );
  });
  $("#password").on('paste', function() {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Campos bloqueados para copiar y pegar. </div>'
    );
  });
  $("#password").on('copy', function() {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Campos bloqueados para copiar y pegar. </div>'
    );
  });
  $("#recordAComen").on("keypress", function() {
    var key = $(this).keyCode;
    // If the user has pressed enter
    if (key == 13) {
      // $('#recordAComen').val($('#recordAComen').val() + "\n");
      // document.getElementById("recordAComen").value = document.getElementById(
      //   "recordAComen").value + "\n";
      alert('enter');
      return false;
    } else {
      return true;
    }
  });
});
// --------------- validar formato de la fecha | si viene vacia --------------- //
function validarFormatoFecha(date) {
  var RegExPattern = /^\d{2,4}\-\d{1,2}\-\d{1,2}$/;
  if ((date.match(RegExPattern)) && (date != '')) {
    return true;
  } else {
    return false;
  }
}
// --------------- validar formato de la fecha | si es real --------------- //
function existeFecha(date) {
  var fechaf = date.split("-");
  var year = fechaf[0];
  var month = fechaf[1];
  var day = fechaf[2];
  var date = new Date(year, month, '0');
  if ((day - 0) > (date.getDate() - 0)) {
    return false;
  }
  return true;
}
// --------------- validar formulario de sesion --------------- //
function login() {
  // --------------- campo nombre --------------- //
  var usuario = $('#usuario').val();
  if (usuario != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9_ ]*$/;
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
  // --------------- campo contraseña --------------- //
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
// --------------- validar formulario agregar licencia --------------- //
function addlicense() {
  // --------------- campo apellido paterno --------------- //
  var aplicense = $('#aplicense').val();
  if (aplicense != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(aplicense)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de apellido paterno. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de apellido paterno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo apellido materno --------------- //
  var amlicense = $('#amlicense').val();
  if (amlicense != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(amlicense)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de apellido materno. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de apellido materno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo nombre --------------- //
  var namelicense = $('#namelicense').val();
  if (namelicense != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(namelicense)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de nombre. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de nombre obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo puesto --------------- //
  var puestolicense = $('#puestolicense').val();
  if (puestolicense != "selecciona-una-opcion") {} else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de puesto obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo usuario --------------- //
  var userlicense = $('#userlicense').val();
  if (userlicense != "") {} else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de usuario obligatorio favor de teclear el nombre para que se genere el usuario. </div>'
    );
    return false;
  }
  // --------------- campo usuario --------------- //
  var passlicense = $('#passlicense').val();
  if (passlicense != "") {} else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de usuario obligatorio favor de teclear el nombre para que se genere la contraseña. </div>'
    );
    return false;
  }
}
// --------------- validar formulario agregar registro --------------- //
function addrecord() {
  // --------------- campo nombre de la empresa --------------- //
  var companyname = $('#companyname').val();
  if (companyname != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9_&*., ]*$/;
    if (!expresion.test(companyname)) {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de nombre de la empresa. </div>'
      );
      return false;
    }
  } else {
    $('#errorRecord').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de nombre de la empresa obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo nombre del contacto --------------- //
  var recordname = $('#recordname').val();
  if (recordname != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(recordname)) {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de nombre del contacto. </div>'
      );
      return false;
    }
  } else {
    $('#errorRecord').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de nombre del contacto obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo teléfono --------------- //
  var recordtel = $('#recordtel').val();
  if (recordtel != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(recordtel)) {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de número de teléfono. </div>'
      );
      return false;
    }
  } else {
    $('#errorRecord').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de número de teléfono obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo teléfono --------------- //
  var recordemail = $('#recordemail').val();
  if (recordemail != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(recordemail)) {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Correo electrónico no valido. </div>'
      );
      return false;
    }
  } else {
    $('#errorRecord').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de correo electrónico obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo hubo comunicación --------------- //
  var recordCom = $('#recordCom').val();
  if (recordCom != "seleccione-la-opcion") {} else {
    $('#errorRecord').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de ¿Hubo comunicación? obligatorio. </div>'
    );
    return false;
  }
  // --------------- validamos la comunicación --------------- //
  if (recordCom == 1) {
    // --------------- campo Rl o encargado --------------- //
    var recordRl = $('#recordRl').val();
    if (recordRl != "seleccione-la-opcion") {} else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de ¿Se encuentra el RL o encargado? obligatorio. </div>'
      );
      return false;
    }
  } else if (recordCom == 2) {
    // --------------- campo tipifica la llamada --------------- //
    var check = $('input:radio[name=recordTipi]:checked').val();
    if ($("input:radio[name='recordTipi']").is(':checked')) {} else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Tipifica la llamada. </div>'
      );
      return false;
    }
  } else {}
  // --------------- validamos el select de se encuentra el RL o encargado --------------- //
  if (recordRl == 1) {
    // --------------- validamos le interesa el servicio --------------- //
    var recordIs = $('#recordIs').val();
    if (recordIs != "seleccione-la-opcion") {} else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de ¿Le interesa el servicio? obligatorio. </div>'
      );
      return false;
    }
  } else if (recordRl == 2) {
    // --------------- validamos el campo fecha --------------- //
    var recordDate = $('#recordDate').val();
    if (validarFormatoFecha(recordDate)) {
      if (existeFecha(recordDate)) {} else {
        $('#errorRecord').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Fecha no existe. </div>'
        );
        return false;
      }
    } else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de fecha obligatorio. </div>'
      );
      return false;
    }
    // --------------- campo hora --------------- //
    var recordTime = $('#recordTime').val();
    if (recordTime != "") {} else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de hora obligatorio. </div>'
      );
      return false;
    }
    // --------------- campo comentarios --------------- //
    var bandera = $('#recordAComen').val();
    var recordAComen = $.trim(bandera);
    if (recordAComen != "") {
      var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-¿?!¡$%()=_*+{}:;&%#\s\S ]*$/;
      if (!expresion.test(recordAComen)) {
        $('#errorRecord').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de comentarios. </div>'
        );
        return false;
      }
    } else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de comentarios obligatorio. </div>'
      );
      return false;
    }
  } else {}
  // --------------- validamos el select de le interesa el servicio --------------- //
  if (recordIs == 1) {
    // --------------- validamos le interesa el servicio --------------- //
    var recordEm = $('#recordEm').val();
    if (recordEm != "seleccione-la-opcion") {} else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de ¿En este momento? obligatorio. </div>'
      );
      return false;
    }
  } else {}
  // --------------- validamos el select de en este momento --------------- //
  if (recordEm == 1) {
    // --------------- campo cuenta --------------- //
    var bandera = $('#recordNc').val();
    var recordNc = $.trim(bandera);
    if (recordNc != "") {
      var expresion = /^[0-9]*$/;
      if (!expresion.test(recordNc)) {
        $('#errorRecord').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de cuenta. </div>'
        );
        return false;
      }
    } else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de cuenta obligatorio. </div>'
      );
      return false;
    }
    // --------------- campo razon social --------------- //
    var recordRs = $('#recordRs').val();
    if (recordRs != "") {
      var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ._ ]*$/;
      if (!expresion.test(recordRs)) {
        $('#errorRecord').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de razón social. </div>'
        );
        return false;
      }
    } else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de razón social obligatorio. </div>'
      );
      return false;
    }
    // --------------- campo número de lineas a renovar --------------- //
    var recordNl = $('#recordNl').val();
    if (recordNl != "") {
      var expresion = /^[0-9]*$/;
      if (!expresion.test(recordNl)) {
        $('#errorRecord').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de número de lineas a renovar. </div>'
        );
        return false;
      }
    } else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de número de lineas a renovar obligatorio. </div>'
      );
      return false;
    }
    // --------------- campo equipos que solicita el RL --------------- //
    var recordEq = $('#recordEq').val();
    if (recordEq != "") {
      var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-¿?!¡$%()=_*+{}:;&%#\s\S ]*$/;
      if (!expresion.test(recordEq)) {
        $('#errorRecord').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de equipos que solicita. </div>'
        );
        return false;
      }
    } else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de equipos que solicita obligatorio. </div>'
      );
      return false;
    }
    // --------------- campo equipos que solicita el RL --------------- //
    var bandera = $('#recordComent').val();
    var recordComent = $.trim(bandera);
    if (recordComent != "") {
      var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-¿?!¡$%()=_*+{}:;&%#\s\S ]*$/;
      if (!expresion.test(recordComent)) {
        $('#errorRecord').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de comentarios. </div>'
        );
        return false;
      }
    } else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de comentarios obligatorio. </div>'
      );
      return false;
    }
    // --------------- campo documento recibido --------------- //
    var recordIne = $('#recordIne').val();
    if (recordIne != "seleccione-la-opcion") {} else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de ¿Documento (identificación) recibido? obligatorio. </div>'
      );
      return false;
    }
  } else if (recordEm == 2) {
    // --------------- validamos el campo fecha --------------- //
    var recordDate = $('#recordDate').val();
    if (validarFormatoFecha(recordDate)) {
      if (existeFecha(recordDate)) {} else {
        $('#errorRecord').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Fecha no existe. </div>'
        );
        return false;
      }
    } else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de fecha obligatorio. </div>'
      );
      return false;
    }
    // --------------- campo hora --------------- //
    var recordTime = $('#recordTime').val();
    if (recordTime != "") {} else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de hora obligatorio. </div>'
      );
      return false;
    }
    // --------------- campo comentarios --------------- //
    var bandera = $('#recordAComen').val();
    var recordAComen = $.trim(bandera);
    if (recordAComen != "") {
      var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-¿?!¡$%()=_ ]*$/;
      if (!expresion.test(recordAComen)) {
        $('#errorRecord').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de comentarios. </div>'
        );
        return false;
      }
    } else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de comentarios obligatorio. </div>'
      );
      return false;
    }
  } else {}
  // --------------- validamos el select de documento recibido --------------- //
  if (recordIne == 1) {
    // --------------- campo subir documento --------------- //
    var recordIneDoc = $('#recordIneDoc').val();
    if (recordIneDoc != "") {} else {
      $('#errorRecord').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Subir documento obligatorio. </div>'
      );
      return false;
    }
  } else if (recordIne == 2) {

  } else {}
}
// --------------- validar formulario agregar folio --------------- //
// function addSheetNumber() {
//   // --------------- campo folio --------------- //
//   var folio = $('#folio').val();
//   if (folio != "") {
//     var expresion = /^[0-9]*$/;
//     if (!expresion.test(folio)) {
//       $('#errorForm').html(
//         '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales. </div>'
//       );
//       return false;
//     }
//   } else {
//     $('#errorForm').html(
//       '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de folio obligatorio. </div>'
//     );
//     return false;
//   }
// }

function validate_reports_sales() {
  // --------------- campos de fechas --------------- //
  var day = $('#day').val();
  var month = $('#month').val();
  var year = $('#year').val();
  var ejecutivo = $('#ejecutivo').val();
  if (day != "" && month == "" && year == "" && ejecutivo ==
    "selecciona-un-ejecutivo") {

  } else if (day != "" && month == "" && year == "" && ejecutivo !=
    "selecciona-un-ejecutivo") {

  } else if (day == "" && month != "" && year == "" && ejecutivo ==
    "selecciona-un-ejecutivo") {

  } else if (day == "" && month != "" && year == "" && ejecutivo !=
    "selecciona-un-ejecutivo") {

  } else if (day == "" && month == "" && year != "" && ejecutivo ==
    "selecciona-un-ejecutivo") {

  } else if (day == "" && month == "" && year != "" && ejecutivo !=
    "selecciona-un-ejecutivo") {

  } else if (day == "" && month == "" && year == "" && ejecutivo !=
    "selecciona-un-ejecutivo") {

  } else if (day == "" && month == "" && year == "" && ejecutivo ==
    "selecciona-un-ejecutivo") {
    $('#errorReport').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Selecciona una mínimo un campo. </div>'
    );
    return false;
  } else {
    $('#errorReport').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> No se pueden seleccionar 2 fechas al mismo tiempo. </div>'
    );
    return false;
  }
}
