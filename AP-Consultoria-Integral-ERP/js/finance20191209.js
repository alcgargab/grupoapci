// --------------- VALIDAR PROXIMA FIRMA DE CONTRATOS --------------- //
$(document).ready(function() {
  $("#btnValidarCuentas").click(function() {
    var total = $("#totalRegistros").val();
    for (var i = 0; i < total; i++) {
      var numCuentaEmp = $("#NumCuentaEmp" + i).val();
      var salMenBEmp = $("#SalMenBEmp" + i).val();
      var salMenNEmp = $("#SalMenNEmp" + i).val();
      var otrIngEmp = $("#OtrIngEmp" + i).val();
      var salDEmp = $("#SalDEmp" + i).val();
      var salBaCEmp = $("#SalBaCEmp" + i).val();
      if (numCuentaEmp == "" || salMenBEmp == 0 || salMenNEmp == 0 ||
        otrIngEmp == 0 || salDEmp == 0 || salBaCEmp == 0) {
        Swal.fire({
          title: '¡ATENCIÓN!',
          text: '¡Tienes cuentas o saldos por agregar!',
          type: 'info',
          timer: 3000
        });
      } else {}
    }
  });
});
// --------------- VALIDAR EL EDITAR DATOS DE LA EMPRESA DE USUARIO --------------- //
function EditarInfoEF() {
  // --------------- VALIDAR CAMPO NUMERO DE CUENTA --------------- //
  var numCuentaEmp = $('#NumCuentaEmp').val();
  if (numCuentaEmp != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(numCuentaEmp)) {
      $('#errorEditE').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Número de Cuenta. </div>'
      );
      return false;
    }
  } else {
    $('#errorEditE').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Número de Cuenta obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO SALARIO MENSUAL BRUTO --------------- //
  var salMenBEmp = $('#SalMenBEmp').val();
  if (salMenBEmp != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(salMenBEmp)) {
      $('#errorEditE').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Salario Mensual Bruto. </div>'
      );
      return false;
    }
  } else {
    $('#errorEditE').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Salario Mensual Bruto obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO SALARIO MENSUAL NETO --------------- //
  var salMenNEmp = $('#SalMenNEmp').val();
  if (salMenNEmp != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(salMenNEmp)) {
      $('#errorEditE').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Salario Mensual Neto. </div>'
      );
      return false;
    }
  } else {
    $('#errorEditE').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Salario Mensual Neto obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO OTROS INGRESOS --------------- //
  var otrIngEmp = $('#OtrIngEmp').val();
  if (otrIngEmp != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(otrIngEmp)) {
      $('#errorEditE').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Otros Ingresos. </div>'
      );
      return false;
    }
  } else {
    $('#errorEditE').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Otros Ingresos obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO SALARIO DIARIO --------------- //
  var salDEmp = $('#SalDEmp').val();
  if (salDEmp != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(salDEmp)) {
      $('#errorEditE').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Salario Diario. </div>'
      );
      return false;
    }
  } else {
    $('#errorEditE').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Salario Diario obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO SALARIO BASE DE COTIZACIÓN --------------- //
  var salBaCEmp = $('#SalBaCEmp').val();
  if (salBaCEmp != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(salBaCEmp)) {
      $('#errorEditE').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales ni letras en el campo de Salario Base de Cotización. </div>'
      );
      return false;
    }
  } else {
    $('#errorEditE').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Salario Base de Cotización obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO MOTIVO DE BAJA--------------- //
  // var motivoBajaEmp = $('#MotivoBajaEmp').val();
  // var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,. ]*$/;
  // if (!expresion.test(motivoBajaEmp)) {
  //   $('#errorEditE').html(
  //     '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Motivo de Baja. </div>'
  //   );
  //   return false;
  // }
}
// --------------- VALIDAR EL EDITAR DATOS DE LA NOMINA DE USUARIO ---------------//
function EditarInfoNo() {
  // --------------- VALIDAR CAMPO CÓDIGO DE ESTADO --------------- //
  var nacEstadoCodigo = $('#NacEstadoCodigo').val();
  if (nacEstadoCodigo != "selecciona-una-opcion") {} else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Código de Estado de Nacimiento obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO CÓDIGO DE EMPRESA --------------- //
  var empresaCodigo = $('#EmpresaCodigo').val();
  if (empresaCodigo != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(empresaCodigo)) {
      $('#errorNo').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Código de la empresa. </div>'
      );
      return false;
    }
  } else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Código de la empresa obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO CÓDIGO DE REGISTRO PATRONAL DE LA EMPRESA --------------- //
  var regPatronCodigo = $('#RegPatronCodigo').val();
  if (regPatronCodigo != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(regPatronCodigo)) {
      $('#errorNo').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Registro patronal de la Empresa. </div>'
      );
      return false;
    }
  } else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Registro patronal de la Empresa obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO CÓDIGO DEL PUESTO --------------- //
  var puestoCodigo = $('#PuestoCodigo').val();
  if (puestoCodigo != "selecciona-una-opcion") {} else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Código del Puesto obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO CÓDIGO DEL DEPARTAMENTO --------------- //
  var nivel1Codigo = $('#Nivel1Codigo').val();
  if (nivel1Codigo != "selecciona-una-opcion") {} else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Código del departamento obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO CÓDIGO DE LA UBICACIÓN --------------- //
  var ubicacionCodigo = $('#UbicacionCodigo').val();
  if (ubicacionCodigo != "selecciona-una-opcion") {} else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Código de la ubicación obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO CÓDIGO DEL TIPO DE NÓMINA --------------- //
  var tipoNominaCodigo = $('#TipoNominaCodigo').val();
  if (tipoNominaCodigo != "selecciona-una-opcion") {} else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Código de Tipo de Nómina obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO CÓDIGO DEL TURNO --------------- //
  var turnoCodigo = $('#TurnoCodigo').val();
  if (turnoCodigo != "selecciona-una-opcion") {} else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Código de Turno obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO CÓDIGO DE PAQUETE DE PRESTACIONES --------------- //
  var paqueteCodigo = $('#PaqueteCodigo').val();
  if (paqueteCodigo != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(paqueteCodigo)) {
      $('#errorNo').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Código del Paquete de prestaciones. </div>'
      );
      return false;
    }
  } else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Código del Paquete de prestaciones obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO DE ÚLTIMO DE PROMEDIO DE VARIABLES CALCULADO --------------- //
  var salPerVar = $('#SalPerVar').val();
  if (salPerVar != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(salPerVar)) {
      $('#errorNo').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Último promedio de variables calculado. </div>'
      );
      return false;
    }
  } else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Último promedio de variables calculado obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO SALARIO DIARIO INTEGRO --------------- //
  var salInt = $('#SalInt').val();
  if (salInt != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(salInt)) {
      $('#errorNo').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Salario diario integrado. </div>'
      );
      return false;
    }
  } else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo Salario diario integrado obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO FORMA DE FORMA EN QUE SE HACE EL PAGO --------------- //
  var empPago = $('#EmpPago').val();
  if (empPago != "selecciona-una-opcion") {} else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Forma en que se hace el pago obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO ID DEL BANCO --------------- //
  var bancoID = $('#BancoID').val();
  if (bancoID != "selecciona-una-opcion") {} else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de ID del Banco obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO DE CÓDIGO DE PRESTACIONES DE LEY --------------- //
  var prestaLeyCodigo = $('#PrestaLeyCodigo').val();
  if (prestaLeyCodigo != "selecciona-una-opcion") {} else {
    $('#errorNo').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Código de prestaciones de ley obligatorio. </div>'
    );
    return false;
  }
}
