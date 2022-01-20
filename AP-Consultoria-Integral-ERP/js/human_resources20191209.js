// --------------- validar formato de la fecha | si viene vacia --------------- //
function validate_empty_date(date) {
  var RegExPattern = /^\d{2,4}\-\d{1,2}\-\d{1,2}$/;
  if ((date.match(RegExPattern)) && (date != '')) {
    return true;
  } else {
    return false;
  }
}
// --------------- validar formato de la fecha | si es real --------------- //
function validate_date_format(date) {
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
// --------------- validar que la fecha no sea anterior a la actual --------------- //
function validate_current_date(date) {
  var x = new Date();
  var fecha = date.split("-");
  x.setFullYear(fecha[2], fecha[1] - 1, fecha[0]);
  var today = new Date();
  // alert(x);
  if (x < today) {
    // alert(today);
    return false;
  } else {
    return true;
  }
}
// --------------- validar el alta de un empleado --------------- //
function validate_add_employee() {
  // ---------- campo apellido paterno ---------- //
  var apellido_paterno = $('#apellido_paterno').val();
  if (apellido_paterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_paterno)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de apellido paterno. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de apellido paterno obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo apellido materno ---------- //
  var apellido_materno = $('#apellido_materno').val();
  if (apellido_materno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_materno)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de apellido materno. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de apellido materno obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo nombre ---------- //
  var nombre = $('#nombre').val();
  if (nombre != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(nombre)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de nombre. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de nombre obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo teléfono de casa ---------- //
  var numero_casa = $('#numero_casa').val();
  if (numero_casa != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(numero_casa)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de teléfono de casa. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de teléfono de casa obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo teléfono celular ---------- //
  var numero_celular = $('#numero_celular').val();
  var expresion = /^[0-9 ]*$/;
  if (!expresion.test(numero_celular)) {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de teléfono celular. </div>'
    );
    return false;
  }
  // ---------- campo correo electrónico ---------- //
  var email = $('#email').val();
  if (email != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(email)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> por favor ingresa un correo existente. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de correo electrónico obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo genero ---------- //
  var sexo = $('#sexo').val();
  if (sexo != "Selecciona-una-opcion") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(sexo)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de genero. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de genero obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo Fecha de nacimiento ---------- //
  var fecha_nacimiento = $('#fecha_nacimiento').val();
  if (validate_empty_date(fecha_nacimiento)) {
    if (validate_date_format(fecha_nacimiento)) {} else {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> campo fecha de nacimiento no existe. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo fecha de nacimiento obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo Edad ---------- //
  // var edad = $('#edad').val();
  // if (edad != "") {
  //   var expresion = /^[0-9]*$/;
  //   if (!expresion.test(edad)) {
  //     $('#ap-error-add-employee').html(
  //       '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de Edad. </div>'
  //     );
  //     return false;
  //   }
  // } else {
  //   $('#ap-error-add-employee').html(
  //     '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Edad obligatorio. </div>'
  //   );
  //   return false;
  // }
  // ---------- campo RFC ---------- //
  var rfc = $('#rfc').val();
  if (rfc != "") {
    var expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test(rfc)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de RFC. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de RFC obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo CURP ---------- //
  var curp = $('#curp').val();
  if (curp != "") {
    var expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test(curp)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de CURP. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de CURP obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo Número de Seguro Social ---------- //
  var imss = $('#imss').val();
  if (imss != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(imss)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de Número de Seguro Social. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Número de Seguro Social obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo Calle ---------- //
  var calle = $('#calle').val();
  if (calle != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(calle)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Calle. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Calle obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo Número exterior ---------- //
  var numero_exterior = $('#numero_exterior').val();
  if (numero_exterior != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(numero_exterior)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Número exterior. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Número exterior obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo Número interior ---------- //
  var numero_interior = $('#numero_interior').val();
  if (numero_interior != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(numero_interior)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Número interior. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Número interior obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo Colonia ---------- //
  var colonia = $('#colonia').val();
  if (colonia != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(colonia)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Colonia. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Colonia obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo Municipio o Delegación ---------- //
  var municipio = $('#municipio').val();
  if (municipio != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(municipio)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Municipio o Delegación. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Municipio o Delegación obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo código postal ---------- //
  var cp = $('#cp').val();
  if (cp != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(cp)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de código postal. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de código postal obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo Fecha de ingreso ---------- //
  var fecha_ingreso = $('#fecha_ingreso').val();
  if (validate_empty_date(fecha_ingreso)) {
    if (validate_date_format(fecha_ingreso)) {} else {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Campo de Fecha de ingreso no existe. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de fecha de ingreso obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo fecha para renovación de contrato ---------- //
  var fecha_proximo_contrato = $('#fecha_proximo_contrato').val();
  if (validate_empty_date(fecha_proximo_contrato)) {
    if (validate_date_format(fecha_proximo_contrato)) {
      date = new Date();
      day = date.getDate();
      month = date.getMonth() + 1;
      year = date.getFullYear();
      if (month < 10) {
        today = year + "-" + "0" + month + "-" + day;
      } else {
        today = year + "-" + month + "-" + day;
      }
      if (fecha_proximo_contrato < today) {
        $('#ap-error-add-employee').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se acepta fecha de renovación de contrato anteriores. </div>'
        );
        return false;
      }
    } else {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> campo fecha de renovación de contrato no existe. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo fecha de renovación de contrato obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo turno ---------- //
  var turno = $('#turno').val();
  if (turno != "Selecciona-una-opcion") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(turno)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de turno. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de turno obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo puesto ---------- //
  var puesto = $('#puesto').val();
  if (puesto != "Selecciona-una-opcion") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(puesto)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de puesto. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de puesto obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo área de trabajo ---------- //
  var lugar_trabajo = $('#lugar_trabajo').val();
  if (lugar_trabajo != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(lugar_trabajo)) {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Área de trabajo. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Área de trabajo obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar la edicion de datos personales --------------- //
function validate_personal_data() {
  // ---------- campo apellido paterno ---------- //
  var apellido_paterno = $('#apellido_paterno').val();
  if (apellido_paterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_paterno)) {
      $('#error_personal_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de apellido paterno. </div>'
      );
      return false;
    }
  } else {
    $('#error_personal_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de apellido paterno obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo de apellido materno ---------- //
  var apellido_materno = $('#apellido_materno').val();
  if (apellido_materno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_materno)) {
      $('#error_personal_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de apellido materno. </div>'
      );
      return false;
    }
  } else {
    $('#error_personal_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de apellido materno obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo de nombre ---------- //
  var nombre = $('#nombre').val();
  if (nombre != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(nombre)) {
      $('#error_personal_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Nombre. </div>'
      );
      return false;
    }
  } else {
    $('#error_personal_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Nombre obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo teléfono de casa ---------- //
  var numero_casa = $('#numero_casa').val();
  if (numero_casa != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(numero_casa)) {
      $('#error_personal_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de Teléfono de casa. </div>'
      );
      return false;
    }
  } else {
    $('#error_personal_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Teléfono de casa obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo telefono celular ---------- //
  var numero_celular = $('#numero_celular').val();
  var expresion = /^[0-9]*$/;
  if (!expresion.test(numero_celular)) {
    $('#error_personal_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de Teléfono Celular. </div>'
    );
    return false;
  }
  // ---------- campo correo electrónico ---------- //
  var email = $('#email').val();
  if (email != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(email)) {
      $('#error_personal_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Escriba un Correo electrónico existente. </div>'
      );
      return false;
    }
  } else {
    $('#error_personal_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Correo electrónico obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo fecha de nacimiento ---------- //
  var fecha_nacimiento = $('#fecha_nacimiento').val();
  if (validate_empty_date(fecha_nacimiento)) {
    if (validate_date_format(fecha_nacimiento)) {} else {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> campo fecha de nacimiento no existe. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo fecha de nacimiento obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo rfc ---------- //
  var rfc = $('#rfc').val();
  if (rfc != "") {
    var expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test(rfc)) {
      $('#error_personal_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo del RFC. </div>'
      );
      return false;
    }
  } else {
    $('#error_personal_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo RFC obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo curp ---------- //
  var curp = $('#curp').val();
  if (curp != "") {
    var expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test(curp)) {
      $('#error_personal_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo del CURP. </div>'
      );
      return false;
    }
  } else {
    $('#error_personal_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo CURP obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo seguro social ---------- //
  var imss = $('#imss').val();
  if (imss != "") {
    var expresion = /^[a-zA-Z0-9]*$/;
    if (!expresion.test(imss)) {
      $('#error_personal_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Número del Seguro Social. </div>'
      );
      return false;
    }
  } else {
    $('#error_personal_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Número del Seguro Social obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar datos del domicilio --------------- //
function validate_address_information() {
  // ---------- campo calle ---------- //
  var calle = $('#calle').val();
  if (calle != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(calle)) {
      $('#error_address_information').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Calle. </div>'
      );
      return false;
    }
  } else {
    $('#error_address_information').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Calle obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo número exterior ---------- //
  var numero_exterior = $('#numero_exterior').val();
  if (numero_exterior != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(numero_exterior)) {
      $('#error_address_information').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Número Exterior. </div>'
      );
      return false;
    }
  } else {
    $('#error_address_information').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Número Exterior obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo número interior ---------- //
  var numero_interior = $('#numero_interior').val();
  if (numero_interior != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(numero_interior)) {
      $('#error_address_information').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Número Interior. </div>'
      );
      return false;
    }
  } else {
    $('#error_address_information').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Número Interior obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo colonia ---------- //
  var colonia = $('#colonia').val();
  if (colonia != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(colonia)) {
      $('#error_address_information').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Colonia. </div>'
      );
      return false;
    }
  } else {
    $('#error_address_information').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Colonia obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo municipio ---------- //
  var municipio = $('#municipio').val();
  if (municipio != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(municipio)) {
      $('#error_address_information').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Municipio. </div>'
      );
      return false;
    }
  } else {
    $('#error_address_information').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Municipio obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo cp ---------- //
  var cp = $('#cp').val();
  if (cp != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(cp)) {
      $('#error_address_information').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de C.P. </div>'
      );
      return false;
    }
  } else {
    $('#error_address_information').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo C.P. obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar datos empresariales --------------- //
function validate_company_data() {
  // --------------- campo área de trabajo --------------- //
  var lugar_trabajo = $('#lugar_trabajo').val();
  if (lugar_trabajo != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(lugar_trabajo)) {
      $('#error_company_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Área de trabajo. </div>'
      );
      return false;
    }
  } else {
    $('#error_company_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de área de trabajo obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo número de cuenta --------------- //
  var numero_cuenta = $('#numero_cuenta').val();
  if (numero_cuenta != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(numero_cuenta)) {
      $('#error_company_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de número de cuenta. </div>'
      );
      return false;
    }
  } else {
    $('#error_company_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de número de cuenta obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo salario --------------- //
  var salario_mensual_neto = $('#salario_mensual_neto').val();
  if (salario_mensual_neto != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(salario_mensual_neto)) {
      $('#error_company_data').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de salario. </div>'
      );
      return false;
    }
  } else {
    $('#error_company_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de salario obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo fecha de renovación de contrato ---------- //
  var fecha_proximo_contrato = $('#fecha_proximo_contrato').val();
  if (validate_empty_date(fecha_proximo_contrato)) {
    if (validate_date_format(fecha_proximo_contrato)) {
      // if (validate_current_date(fecha_proximo_contrato)) {} else {
      //   $('#ap-error-add-employee').html(
      //     '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> campop fecha de renovación de contrato incorrecta. </div>'
      //   );
      //   return false;
      // }
    } else {
      $('#ap-error-add-employee').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> campo fecha de renovación de contrato no existe. </div>'
      );
      return false;
    }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo fecha de renovación de contrato obligatorio. </div>'
    );
    return false;
  }
  // ---------- campo fecha de baja ---------- //
  var fecha_baja = $('#fecha_baja').val();
  if (validate_date_format(fecha_baja)) {
    // if (validate_current_date(fecha_baja)) {} else {
    //   $('#ap-error-add-employee').html(
    //     '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> campop fecha de nbaja incorrecta. </div>'
    //   );
    //   return false;
    // }
  } else {
    $('#ap-error-add-employee').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> campo fecha de baja no existe. </div>'
    );
    return false;
  }
  // --------------- campo motivo de baja --------------- //
  var motivo_baja = $('#motivo_baja').val();
  var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&/()=+\n_ ]*$/;
  if (!expresion.test(motivo_baja)) {
    $('#error_company_data').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Motivo de Baja. </div>'
    );
    return false;
  }
}
// --------------- validar generar entrevista --------------- //
function validate_interviews0() {
  // --------------- campo apellido paterno --------------- //
  var apellido_paterno = $('#apellido_paterno0').val();
  if (apellido_paterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_paterno)) {
      $('#error_validate_interviews0').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido paterno. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews0').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Apellido paterno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo apellido materno --------------- //
  var apellido_materno = $('#apellido_materno0').val();
  if (apellido_materno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_materno)) {
      $('#error_validate_interviews0').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido materno. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews0').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Apellido materno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo nombre --------------- //
  var nombre = $('#nombre0').val();
  if (nombre != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(nombre)) {
      $('#error_validate_interviews0').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Nombre. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews0').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Nombre obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo telefono --------------- //
  var telefono = $('#telefono0').val();
  if (telefono != "") {
    var expresion = /^[0-9 ]*$/;
    if (!expresion.test(telefono)) {
      $('#error_validate_interviews0').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de Teléfono. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews0').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Teléfono obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo email --------------- //
  var email = $('#email0').val();
  if (email != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(email)) {
      $('#error_validate_interviews0').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Escribe un correo existente. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews0').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo correo obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar generar entrevista --------------- //
function validate_interviews1() {
  // --------------- campo apellido paterno --------------- //
  var apellido_paterno = $('#apellido_paterno1').val();
  if (apellido_paterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_paterno)) {
      $('#error_validate_interviews1').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido paterno. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews1').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Apellido paterno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo apellido materno --------------- //
  var apellido_materno = $('#apellido_materno1').val();
  if (apellido_materno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_materno)) {
      $('#error_validate_interviews1').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido materno. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews1').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Apellido materno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo nombre --------------- //
  var nombre = $('#nombre1').val();
  if (nombre != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(nombre)) {
      $('#error_validate_interviews1').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Nombre. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews1').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Nombre obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo telefono --------------- //
  var telefono = $('#telefono1').val();
  if (telefono != "") {
    var expresion = /^[0-9 ]*$/;
    if (!expresion.test(telefono)) {
      $('#error_validate_interviews1').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de Teléfono. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews1').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Teléfono obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo email --------------- //
  var email = $('#email1').val();
  if (email != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(email)) {
      $('#error_validate_interviews1').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Escribe un correo existente. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews1').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo correo obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar generar entrevista --------------- //
function validate_interviews2() {
  // --------------- campo apellido paterno --------------- //
  var apellido_paterno = $('#apellido_paterno2').val();
  if (apellido_paterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_paterno)) {
      $('#error_validate_interviews2').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido paterno. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews2').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Apellido paterno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo apellido materno --------------- //
  var apellido_materno = $('#apellido_materno2').val();
  if (apellido_materno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_materno)) {
      $('#error_validate_interviews2').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido materno. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews2').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Apellido materno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo nombre --------------- //
  var nombre = $('#nombre2').val();
  if (nombre != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(nombre)) {
      $('#error_validate_interviews2').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Nombre. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews2').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Nombre obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo telefono --------------- //
  var telefono = $('#telefono2').val();
  if (telefono != "") {
    var expresion = /^[0-9 ]*$/;
    if (!expresion.test(telefono)) {
      $('#error_validate_interviews2').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de Teléfono. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews2').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Teléfono obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo email --------------- //
  var email = $('#email2').val();
  if (email != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(email)) {
      $('#error_validate_interviews2').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Escribe un correo existente. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews2').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo correo obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar generar entrevista --------------- //
function validate_interviews3() {
  // --------------- campo apellido paterno --------------- //
  var apellido_paterno = $('#apellido_paterno3').val();
  if (apellido_paterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_paterno)) {
      $('#error_validate_interviews3').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido paterno. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews3').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Apellido paterno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo apellido materno --------------- //
  var apellido_materno = $('#apellido_materno3').val();
  if (apellido_materno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_materno)) {
      $('#error_validate_interviews3').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido materno. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews3').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Apellido materno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo nombre --------------- //
  var nombre = $('#nombre3').val();
  if (nombre != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(nombre)) {
      $('#error_validate_interviews3').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Nombre. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews3').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Nombre obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo telefono --------------- //
  var telefono = $('#telefono3').val();
  if (telefono != "") {
    var expresion = /^[0-9 ]*$/;
    if (!expresion.test(telefono)) {
      $('#error_validate_interviews3').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de Teléfono. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews3').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Teléfono obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo email --------------- //
  var email = $('#email3').val();
  if (email != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(email)) {
      $('#error_validate_interviews3').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Escribe un correo existente. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews3').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo correo obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar generar entrevista --------------- //
function validate_interviews4() {
  // --------------- campo apellido paterno --------------- //
  var apellido_paterno = $('#apellido_paterno4').val();
  if (apellido_paterno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_paterno)) {
      $('#error_validate_interviews4').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido paterno. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews4').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Apellido paterno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo apellido materno --------------- //
  var apellido_materno = $('#apellido_materno4').val();
  if (apellido_materno != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(apellido_materno)) {
      $('#error_validate_interviews4').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Apellido materno. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews4').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Apellido materno obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo nombre --------------- //
  var nombre = $('#nombre4').val();
  if (nombre != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(nombre)) {
      $('#error_validate_interviews4').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Nombre. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews4').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Nombre obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo telefono --------------- //
  var telefono = $('#telefono4').val();
  if (telefono != "") {
    var expresion = /^[0-9 ]*$/;
    if (!expresion.test(telefono)) {
      $('#error_validate_interviews4').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de Teléfono. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews4').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Teléfono obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo email --------------- //
  var email = $('#email4').val();
  if (email != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(email)) {
      $('#error_validate_interviews4').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Escribe un correo existente. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_interviews4').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo correo obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar expediente --------------- //
function validate_files() {
  // --------------- campo de empleado --------------- //
  var empleado = $('#empleado').val();
  if (empleado == "Seleccionar_empleado") {
    $('#error_validate_files').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de empleado obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de currículum --------------- //
  var curriculum = $('#curriculum').val();
  if (curriculum == "") {
    $('#error_validate_files').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Currículum obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de acta de nacimiento --------------- //
  var acta = $('#acta').val();
  if (acta == "") {
    $('#error_validate_files').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Acta de Nacimiento obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de ine --------------- //
  var ine = $('#ine').val();
  if (ine == "") {
    $('#error_validate_files').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de INE obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de estudios --------------- //
  var comprobante = $('#comprobante').val();
  if (comprobante == "") {
    $('#error_validate_files').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Comprobante de Estudios obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de domicilio --------------- //
  var domicilio = $('#domicilio').val();
  if (domicilio == "") {
    $('#error_validate_files').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Comprobante de Domicilio obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de curp --------------- //
  var curp = $('#curp').val();
  if (curp == "") {
    $('#error_validate_files').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de CURP obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de nss --------------- //
  var nss = $('#nss').val();
  if (nss == "") {
    $('#error_validate_files').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Número de Seguro Social obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de carta de rfc con homoclave --------------- //
  var rfc_homoclave = $('#rfc_homoclave').val();
  if (rfc_homoclave == "") {
    $('#error_validate_files').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de RFC con homoclave obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de fotos --------------- //
  // var fotos = $('#fotos').val();
  // if (fotos == "") {
  //   $('#error_validate_files').html(
  //     '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Fotos obligatorio. </div>'
  //   );
  //   return false;
  // }
  // --------------- campo de cuenta --------------- //
  var cuenta = $('#cuenta').val();
  if (cuenta == "") {
    $('#error_validate_files').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Cuenta Bancaria obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar buscar vacantes --------------- //
function validate_vacancies() {
  // --------------- campo vacante --------------- //
  var vacante = $('#vacante').val();
  if (vacante != "selecciona-la-vacante") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]*$/;
    if (!expresion.test(vacante)) {
      $('#error_validate_vacancies').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Valor incorrecto, seleccione una vacante que exista. </div>'
      );
      return false;
    }
  } else {
    $('#error_validate_vacancies').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Favor de seleccionar una vacante. </div>'
    );
    return false;
  }
}
// --------------- validar acta administrativa --------------- //
function validate_administrative_act() {
  // --------------- campo motivo de rrhh--------------- //
  var motivo_aa_rrhh = $('#motivo_aa_rrhh').val();
  if (motivo_aa_rrhh != "") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&/()=+\n_ ]*$/;
    if (!expresion.test(motivo_aa_rrhh)) {
      $('#ap_error_administrative_act').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de motivo de RRHH. </div>'
      );
      return false;
    }
  } else {
    $('#ap_error_administrative_act').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Campo de motivo de RRHH obligatorio. </div>'
    );
    return false;
  }
}
