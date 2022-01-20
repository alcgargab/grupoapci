// --------------- VALIDAR CREAR EL ARCHIVO DEL RENUNCIA --------------- //
function renuncia() {
  // --------------- VALIDAR CAMPO FECHA DE RENUNCIA --------------- //
  var fRenuncia = $('#FRenuncia').val();
  if (fRenuncia != "") {} else {
    $('#errorRenuncia').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Fecha de Renuncia obligatorio. </div>'
    );
    return false;
  }
}
// --------------- VALIDAR CREAR EL ARCHIVO DEL FINIQUITO --------------- //
function finiquito() {
  var antiguedad = $('#antiguedad').val();
  if (antiguedad != "") {} else {
    $('#errorFiniquito').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Auntigüedad obligatorio. </div>'
    );
    return false;
  }
  var fRenuncia = $('#FRenuncia').val();
  if (fRenuncia != "") {} else {
    $('#errorFiniquito').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Fecha de renuncia obligatorio. </div>'
    );
    return false;
  }
  var fBajaIMSS = $('#FBajaIMSS').val();
  if (fBajaIMSS != "") {} else {
    $('#errorFiniquito').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Fecha de baja del IMSS obligatorio. </div>'
    );
    return false;
  }
  var prestaciones = $('#Prestaciones').val();
  if (prestaciones != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9$, ]*$/;
    if (!expresion.test(prestaciones)) {
      $('#errorFiniquito').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Prestaciones. </div>'
      );
      return false;
    }
  } else {
    $('#errorFiniquito').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Prestaciones obligatorio. </div>'
    );
    return false;
  }
}
// --------------- VALIDAR CREAR EL ARCHIVO DE LA BAJA DEL IMSS --------------- //
function bajaIMSS() {
  var empresacon = $('#empresacon').val();
  if (empresacon != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(empresacon)) {
      $('#errorBajaIMSS').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Empresa contratante. </div>'
      );
      return false;
    }
  } else {
    $('#errorBajaIMSS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Empresa contratante obligatorio. </div>'
    );
    return false;
  }
  var departamento = $('#departamento').val();
  if (departamento != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(departamento)) {
      $('#errorBajaIMSS').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Departamento. </div>'
      );
      return false;
    }
  } else {
    $('#errorBajaIMSS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Departamento obligatorio. </div>'
    );
    return false;
  }
  var fBaja = $('#FBaja').val();
  if (fBaja != "") {} else {
    $('#errorBajaIMSS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Fecha de baja del IMSS obligatorio. </div>'
    );
    return false;
  }
  var motivoR = $('#motivoR').val();
  var motivoD = $('#motivoD').val();
  alert("renuncia " + motivoR);
  alert("despido " + motivoD);
  if (motivoR != "") {} else {
    $('#errorBajaIMSS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Fecha de baja del IMSS obligatorio. </div>'
    );
    return false;
  }
}
