$(document).ready(function() {
  // --------------- ADJUNTAR LOS ARCHIVOS SELECCIONADOS EN EL CORREO --------------- //
  $('.adjArchivosS').change(function() {
    var filename = $(this).val().split('\\').pop();
    $('#adjArchivosSpanS').html(filename);
  });
  // --------------- MENU SMALL --------------- //
  // validar la selección del empleado para el permiso
  $("#selectempleadoperS").change(
    function(event) {
      var empleado = $(this).val();
      var base = "http://127.0.0.1/CodeIgniter/erp-apci/";
      // var base = "https://www.erp.apci.com.mx/";
      if (empleado != "selecciona-un-empleado") {
        $.ajax({
          url: base +
            'gerentedearea/apci/buscar-ajax-empleado/' +
            empleado,
          success: function(respuesta) {
            var fecha = new Date();
            var anio = fecha.getFullYear();
            var mes = fecha.getMonth() + 1;
            var dia = fecha.getDate();
            $('#folioEmpS').val(JSON.parse(respuesta).empleado.NumEmp +
              anio + mes + dia);
            $('#dateempleadoS').val(JSON.parse(respuesta).empleado.ApellidoPEmp +
              ' ' + JSON.parse(respuesta).empleado.ApellidoMEmp +
              ' ' +
              JSON.parse(respuesta).empleado.NomEmp);
            $('#areaS').val(JSON.parse(respuesta).area.Area);
            $('#puestoS').val(JSON.parse(respuesta).puesto.Puesto);
            $('#fechaIngS').val(JSON.parse(respuesta).empleado.FIngresoEmp);
          }
        });
      } else {}
    });
  // validar la selección del empleado para el pase de salida
  $("#selectempleadoperUS").change(
    function(event) {
      var empleado = $(this).val();
      var base = "http://127.0.0.1/CodeIgniter/erp-apci/";
      // var base = "https://www.erp.apci.com.mx/";
      if (empleado != "selecciona-un-empleado") {
        $.ajax({
          url: base +
            'gerentedearea/apci/buscar-ajax-empleado/' +
            empleado,
          success: function(respuesta) {
            var fecha = new Date();
            var anio = fecha.getFullYear();
            var mes = fecha.getMonth() + 1;
            var dia = fecha.getDate();
            $('#folioEmpPerUS').val("Per" + "-" + JSON.parse(
                respuesta).empleado
              .NumEmp + "-" + anio + "-" + mes + "-" + dia);
            $('#dateempleadoPerUS').val(JSON.parse(respuesta).empleado
              .ApellidoPEmp +
              ' ' + JSON.parse(respuesta).empleado.ApellidoMEmp +
              ' ' +
              JSON.parse(respuesta).empleado.NomEmp);
            $('#areaPerUS').val(JSON.parse(respuesta).area.Area);
            $('#puestoPerUS').val(JSON.parse(respuesta).puesto.Puesto);
          }
        });
      } else {}
    });
  // ver el número de horas
  $("#horastartS").change(
    function(event) {
      var horastart = $(this).val();
      var horaend = $('#horaendS').val();
      var a = parseInt(horaend.split(":")[0]);
      var de = parseInt(horastart.split(":")[0]);
      var numhoras = a - de;
      $('#horasS').val(numhoras);
    });
  $("#horaendS").change(
    function(event) {
      var horaend = $(this).val();
      var horastart = $('#horastartS').val();
      var a = parseInt(horaend.split(":")[0]);
      var de = parseInt(horastart.split(":")[0]);
      var numhoras = a - de;
      $('#horasS').val(numhoras);
    });
});
// --------------- VALIDAR EL ENVIO DE EMAIL --------------- //
function validaremailS() {
  // --------------- VALIDAR CAMPO CORREO ELÉCTRONICO --------------- //
  var from = $('#fromS').val();
  if (from != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(from)) {
      $('#errorEmailS').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> Escriba un Correo electrónico existente. </div>'
      );
      return false;
    }
  } else {
    $('#errorEmailS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de destinatario obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO CORREO ELÉCTRONICO --------------- //
  var subject = $('#subjectS').val();
  if (subject != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(subject)) {
      $('#errorEmailS').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se aceptan caracteres especiales en el asunto. </div>'
      );
      return false;
    }
  } else {
    $('#errorEmailS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de asunto obligatorio. </div>'
    );
    return false;
  }
}
// --------------- VALIDAR PERMISO DE EMPLEADO MENU SMALL --------------- //
function validarPermisoS() {
  var horas = $('#horasS').val();
  if (horas > 2) {
    $('#errorPermisoS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> El máximo de horas por permiso es de <b> 2 horas. </b> </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO FECHA DEL PERMISO --------------- //
  var fechapermiso = $('#FPermisoS').val();
  var hoy = new Date();
  var hanio = hoy.getFullYear();
  var hmes = hoy.getMonth() + 1;
  var hdia = hoy.getDate();
  var anioper = parseInt(fechapermiso.split("-")[0]);
  var mesper = parseInt(fechapermiso.split("-")[1]);
  var diaper = parseInt(fechapermiso.split("-")[2]);
  if (diaper == hdia) {
    $('#errorPermisoS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Los permisos solo se pueden generar con al menos un día de anticipación. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO EMPLEADO --------------- //
  var selectempleado = $('#selectempleadoperS').val();
  if (selectempleado != "selecciona-un-empleado") {} else {
    $('#errorPermisoS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Empleado obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO MOTIVO DE AUSENCIA --------------- //
  var motivo = $('#MotivoS').val();
  if (motivo != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.?¿!¡%$ ]*$/;
    if (!expresion.test(motivo)) {
      $('#errorPermisoS').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Motivo de Ausencia. </div>'
      );
      return false;
    }
  } else {
    $('#errorPermisoS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Motivo de Ausencia obligatorio. </div>'
    );
    return false;
  }
}
// --------------- VALIDAR PERMISO DE EMPLEADO MENU SMALL --------------- //
function validarPerUS() {
  // --------------- VALIDAR CAMPO EMPLEADO --------------- //
  var selectempleado = $('#selectempleadopaseS').val();
  if (selectempleado != "selecciona-un-empleado") {} else {
    $('#errorPaseS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Empleado obligatorio. </div>'
    );
    return false;
  }
  // --------------- VALIDAR CAMPO MOTIVO DE AUSENCIA --------------- //
  var motivo = $('#MotivoPaseS').val();
  if (motivo != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.?¿!¡%$ ]*$/;
    if (!expresion.test(motivo)) {
      $('#errorPaseS').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Motivo de Ausencia. </div>'
      );
      return false;
    }
  } else {
    $('#errorPaseS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Motivo de Ausencia obligatorio. </div>'
    );
    return false;
  }
}
// --------------- VALIDAR REGISTRO DE UNA NUEVA VACANTE --------------- //
function validarVacante() {
  // --------------- validar campo de puesto --------------- //
  var puesto = $('#Puesto').val();
  if (puesto != "selecciona-el-puesto") {} else {
    $('#errorVacante').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Puesto obligatorio. </div>'
    );
    return false;
  }
  // --------------- validar campo de puesto --------------- //
  var lTrabajo = $('#LTrabajo').val();
  if (lTrabajo != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(lTrabajo)) {
      $('#errorVacante').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Lugar de trabajo. </div>'
      );
      return false;
    }
  } else {
    $('#errorVacante').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Lugar de trabajo obligatorio. </div>'
    );
    return false;
    var sueldo = $('#Sueldo').val();
    if (sueldo != "") {
      var expresion = /^[0-9]*$/;
      if (!expresion.test(sueldo)) {
        $('#errorVacante').html(
          '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Sueldo. </div>'
        );
        return false;
      }
    } else {
      $('#errorVacante').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Sueldo obligatorio. </div>'
      );
      return false;
    }
    // --------------- validar campo de actividades a desempeñar --------------- //
    // var aDesempenae = $('#aDesempenae').val();
    // if (aDesempenae != "") {
    //   var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.?¿!¡%$# ]*$/;
    //   if (!expresion.test(aDesempenae)) {
    //     $('#errorVacante').html(
    //       '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Actividades a desempeñar. </div>'
    //     );
    //     return false;
    //   }
    // } else {
    //   $('#errorVacante').html(
    //     '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Actividades a desempeñar obligatorio. </div>'
    //   );
    //   return false;
    // }
    // --------------- validar campo de requisitos --------------- //
    // var requisitos = $('#Requisitos').val();
    // if (requisitos != "") {
    //   var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.?¿!¡%$# ]*$/;
    //   if (!expresion.test(requisitos)) {
    //     $('#errorVacante').html(
    //       '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Requisitos. </div>'
    //     );
    //     return false;
    //   }
    // } else {
    //   $('#errorVacante').html(
    //     '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Requisitos obligatorio. </div>'
    //   );
    //   return false;
    // }
  }
}
// --------------- VALIDAR EVALUACIÓN DE EMPLEADO --------------- //
function validarEvaluacionS() {
  // --------------- validar empeado --------------- //
  var empleado = $('#selectempleadoS').val();
  if (empleado != "selecciona-un-empleado") {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Empleado obligatorio. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=comunicacion]:checked').val();
  if ($("input:radio[name='comunicacion']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> comunicación</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=TolFru]:checked').val();
  if ($("input:radio[name='TolFru']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Tolerancia a la frustración</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Autocontrol]:checked').val();
  if ($("input:radio[name='Autocontrol']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Autocontrol</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Motivacion]:checked').val();
  if ($("input:radio[name='Motivacion']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Motivación</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Adaptacion]:checked').val();
  if ($("input:radio[name='Adaptacion']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Adaptabilidad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Seguridad]:checked').val();
  if ($("input:radio[name='Seguridad']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Seguridad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Creatividad]:checked').val();
  if ($("input:radio[name='Creatividad']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Creatividad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Cooperacion]:checked').val();
  if ($("input:radio[name='Cooperacion']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Cooperación</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=ApNormas]:checked').val();
  if ($("input:radio[name='ApNormas']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Apego a normas</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=VisCom]:checked').val();
  if ($("input:radio[name='VisCom']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Visión Comunitaria</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Planeacion]:checked').val();
  if ($("input:radio[name='Planeacion']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Planeación</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Organizacional]:checked').val();
  if ($("input:radio[name='Organizacional']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Organización</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=SegInst]:checked').val();
  if ($("input:radio[name='SegInst']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Seguimiento de instrucciones</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Liderazgo]:checked').val();
  if ($("input:radio[name='Liderazgo']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Liderazgo</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Responsabilidad]:checked').val();
  if ($("input:radio[name='Responsabilidad']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Responsabilidad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=EjSim]:checked').val();
  if ($("input:radio[name='EjSim']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Ejecución simultánea</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Confiabilidad]:checked').val();
  if ($("input:radio[name='Confiabilidad']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Confiabilidad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=ResSocial]:checked').val();
  if ($("input:radio[name='ResSocial']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Responsabilidad social</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=ManCon]:checked').val();
  if ($("input:radio[name='ManCon']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Manejo de conflictos</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=RenPre]:checked').val();
  if ($("input:radio[name='RenPre']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Rendimiento bajo presión</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=TraEqui]:checked').val();
  if ($("input:radio[name='TraEqui']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Trabajo en equipo</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Asertividad]:checked').val();
  if ($("input:radio[name='Asertividad']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Asertividad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Empuje]:checked').val();
  if ($("input:radio[name='Empuje']").is(':checked')) {} else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Empuje</b>. </div>'
    );
    return false;
  }
  // --------------- validar comentarios --------------- //
  var comentarios = $('#Comentarios').val();
  if (comentarios != " ") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.?¿!¡%$# ]*$/;
    if (!expresion.test(comentarios)) {
      $('#errorEvaluacionS').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de <b> Comentarios</b>. </div>'
      );
      return false;
    }
  } else {
    $('#errorEvaluacionS').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de <b> Comentarios </b> obligatorio. </div>'
    );
    return false;
  }
}
