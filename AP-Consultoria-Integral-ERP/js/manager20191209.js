$(document).ready(function() {
  // --------------- MENU LARGE --------------- //
  // ver el número de horas
  $("#horastart").change(
    function(event) {
      var horastart = $(this).val();
      var horaend = $('#horaend').val();
      var a = parseInt(horaend.split(":")[0]);
      var de = parseInt(horastart.split(":")[0]);
      var numhoras = a - de;
      $('#horas').val(numhoras);
    });
  $("#horaend").change(
    function(event) {
      var horaend = $(this).val();
      var horastart = $('#horastart').val();
      var a = parseInt(horaend.split(":")[0]);
      var de = parseInt(horastart.split(":")[0]);
      var numhoras = a - de;
      $('#horas').val(numhoras);
    });
});
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
// --------------- validar visita --------------- //
function validate_visit() {
  // --------------- campo de nombre --------------- //
  var visitante = $('#visitante_vi').val();
  if (visitante != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]*$/;
    if (!expresion.test(visitante)) {
      $('#ap-visit-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Visitante. </div>'
      );
      return false;
    }
  } else {
    $('#ap-visit-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Visitante obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo fecha --------------- //
  var fecha_vi = $('#fecha_vi').val();
  date = new Date();
  day = date.getDate();
  month = date.getMonth() + 1;
  year = date.getFullYear();
  if (month < 10) {
    today = year + "-" + "0" + month + "-" + day;
  } else {
    today = year + "-" + month + "-" + day;
  }
  if (fecha_vi < today) {
    $('#ap-visit-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se aceptan fechas anteriores. </div>'
    );
    return false;
  }
  // --------------- campo motivo --------------- //
  var motivo = $('#motivo_vi').val();
  if (motivo != "") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\n_ ]*$/;
    if (!expresion.test(motivo)) {
      $('#ap-visit-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Motivo. </div>'
      );
      return false;
    }
  } else {
    $('#ap-visit-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Motivo obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar pase de salida --------------- //
function validate_exit_pass() {
  // --------------- campo empleado --------------- //
  var empleado = $('#empleado_p_s').val();
  if (empleado != "selecciona-un-empleado") {} else {
    $('#ap-exit-pass-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Empleado obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo de motivo de salida --------------- //
  var motivo = $('#motivo_p_s').val();
  if (motivo != "") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\n_ ]*$/;
    if (!expresion.test(motivo)) {
      $('#ap-exit-pass-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Motivo de salida. </div>'
      );
      return false;
    }
  } else {
    $('#ap-exit-pass-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Motivo de salida obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar permiso  --------------- //
function validate_permission() {
  var horas = $('#horas').val();
  if (horas > 2) {
    $('#ap-permission-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> El máximo de horas por permiso es de <b> 2 horas. </b> </div>'
    );
    return false;
  }
  // --------------- campo fecha de permiso --------------- //
  var fechapermiso = $('#FPermiso').val();
  var hoy = new Date();
  var hanio = hoy.getFullYear();
  var hmes = hoy.getMonth() + 1;
  var hdia = hoy.getDate();
  var anioper = parseInt(fechapermiso.split("-")[0]);
  var mesper = parseInt(fechapermiso.split("-")[1]);
  var diaper = parseInt(fechapermiso.split("-")[2]);
  if (diaper == hdia) {
    $('#ap-permission-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Los permisos solo se pueden generar con al menos un día de anticipación. </div>'
    );
    return false;
  }
  // --------------- campo fecha --------------- //
  if (hmes < 10) {
    today = hanio + "-" + "0" + hmes + "-" + hdia;
  } else {
    today = hanio + "-" + hmes + "-" + hdia;
  }
  if (fechapermiso < today) {
    $('#ap-permission-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se aceptan fechas anteriores. </div>'
    );
    return false;
  }
  // --------------- campo empleado --------------- //
  var selectempleado = $('#selectempleadoper').val();
  if (selectempleado != "selecciona-un-empleado") {} else {
    $('#ap-permission-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Empleado obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo motivo de ausencia --------------- //
  var motivo = $('#Motivo').val();
  if (motivo != "") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\n_ ]*$/;
    if (!expresion.test(motivo)) {
      $('#ap-permission-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Motivo de Ausencia. </div>'
      );
      return false;
    }
  } else {
    $('#ap-permission-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Motivo de Ausencia obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar permiso urgente --------------- //
function validate_urgent_permission() {
  // --------------- campo empleado --------------- //
  var selectempleado = $('#selectempleadopase').val();
  if (selectempleado != "selecciona-un-empleado") {} else {
    $('#ap-urgent-permission-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Empleado obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo motivo de ausencia --------------- //
  var motivo = $('#MotivoPase').val();
  if (motivo != "") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\n_ ]*$/;
    if (!expresion.test(motivo)) {
      $('#ap-urgent-permission-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Motivo de Ausencia. </div>'
      );
      return false;
    }
  } else {
    $('#ap-urgent-permission-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Motivo de Ausencia obligatorio. </div>'
    );
    return false;
  }
}
// --------------- validar vacante --------------- //
function validate_vacancy() {
  // --------------- validar campo de puesto --------------- //
  var puesto = $('#Puesto').val();
  if (puesto != "selecciona-el-puesto") {} else {
    $('#ap-vacant-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Puesto obligatorio. </div>'
    );
    return false;
  }
  // --------------- validar campo de núemro de empledos --------------- //
  var empleados_va = $('#empleados_va').val();
  if (empleados_va != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(empleados_va)) {
      $('#ap-vacant-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de número de empleados. </div>'
      );
      return false;
    }
  } else {
    $('#ap-vacant-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de número de empleados obligatorio. </div>'
    );
    return false;
  }
  // --------------- validar campo de puesto --------------- //
  var lTrabajo = $('#LTrabajo').val();
  if (lTrabajo != "") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\n_ ]*$/;
    if (!expresion.test(lTrabajo)) {
      $('#ap-vacant-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Lugar de trabajo. </div>'
      );
      return false;
    }
  } else {
    $('#ap-vacant-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Lugar de trabajo obligatorio. </div>'
    );
    return false;
  }
  // --------------- validar campo de sueldo --------------- //
  var sueldo = $('#Sueldo').val();
  if (sueldo != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(sueldo)) {
      $('#ap-vacant-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Sueldo. </div>'
      );
      return false;
    }
  } else {
    $('#ap-vacant-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Sueldo obligatorio. </div>'
    );
    return false;
  }
  // --------------- validar campo de actividades a desempeñar --------------- //
  var aDesempenae = $('#aDesempenae').val();
  if (aDesempenae != "") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\n_ ]*$/;
    if (!expresion.test(aDesempenae)) {
      $('#ap-vacant-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Actividades a desempeñar. </div>'
      );
      return false;
    }
  } else {
    $('#ap-vacant-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Actividades a desempeñar obligatorio. </div>'
    );
    return false;
  }
  // --------------- validar campo de requisitos --------------- //
  var requisitos = $('#Requisitos').val();
  if (requisitos != "") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\n_ ]*$/;
    if (!expresion.test(requisitos)) {
      $('#ap-vacant-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de Requisitos. </div>'
      );
      return false;
    }
  } else {
    $('#ap-vacant-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Requisitos obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo fecha --------------- //
  var fecha_limite = $('#FLimite').val();
  date = new Date();
  day = date.getDate();
  month = date.getMonth() + 1;
  year = date.getFullYear();
  if (month < 10) {
    today = year + "-" + "0" + month + "-" + day;
  } else {
    today = year + "-" + month + "-" + day;
  }
  if (fecha_limite < today) {
    $('#ap-vacant-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se aceptan fechas anteriores. </div>'
    );
    return false;
  }
}
// --------------- validar evaluación --------------- //
function validate_evaluation() {
  // --------------- validar empeado --------------- //
  var empleado = $('#selectempleado').val();
  if (empleado != "selecciona-un-empleado") {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de Empleado obligatorio. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=comunicacion]:checked').val();
  if ($("input:radio[name='comunicacion']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> comunicación</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=TolFru]:checked').val();
  if ($("input:radio[name='TolFru']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Tolerancia a la frustración</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Autocontrol]:checked').val();
  if ($("input:radio[name='Autocontrol']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Autocontrol</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Motivacion]:checked').val();
  if ($("input:radio[name='Motivacion']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Motivación</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Adaptacion]:checked').val();
  if ($("input:radio[name='Adaptacion']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Adaptabilidad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Seguridad]:checked').val();
  if ($("input:radio[name='Seguridad']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Seguridad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Creatividad]:checked').val();
  if ($("input:radio[name='Creatividad']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Creatividad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Cooperacion]:checked').val();
  if ($("input:radio[name='Cooperacion']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Cooperación</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=ApNormas]:checked').val();
  if ($("input:radio[name='ApNormas']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Apego a normas</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=VisCom]:checked').val();
  if ($("input:radio[name='VisCom']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Visión Comunitaria</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Planeacion]:checked').val();
  if ($("input:radio[name='Planeacion']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Planeación</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Organizacional]:checked').val();
  if ($("input:radio[name='Organizacional']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Organización</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=SegInst]:checked').val();
  if ($("input:radio[name='SegInst']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Seguimiento de instrucciones</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Liderazgo]:checked').val();
  if ($("input:radio[name='Liderazgo']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Liderazgo</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Responsabilidad]:checked').val();
  if ($("input:radio[name='Responsabilidad']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Responsabilidad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=EjSim]:checked').val();
  if ($("input:radio[name='EjSim']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Ejecución simultánea</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Confiabilidad]:checked').val();
  if ($("input:radio[name='Confiabilidad']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Confiabilidad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=ResSocial]:checked').val();
  if ($("input:radio[name='ResSocial']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Responsabilidad social</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=ManCon]:checked').val();
  if ($("input:radio[name='ManCon']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Manejo de conflictos</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=RenPre]:checked').val();
  if ($("input:radio[name='RenPre']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Rendimiento bajo presión</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=TraEqui]:checked').val();
  if ($("input:radio[name='TraEqui']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Trabajo en equipo</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Asertividad]:checked').val();
  if ($("input:radio[name='Asertividad']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Asertividad</b>. </div>'
    );
    return false;
  }
  // --------------- validar evaluación --------------- //
  var check = $('input:radio[name=Empuje]:checked').val();
  if ($("input:radio[name='Empuje']").is(':checked')) {} else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Evalua la <b> Empuje</b>. </div>'
    );
    return false;
  }
  // --------------- validar comentarios --------------- //
  var comentarios = $('#Comentarios').val();
  if (comentarios != " ") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&()=+\n_ ]*$/;
    if (!expresion.test(comentarios)) {
      $('#ap-evaluation-error').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten caracteres especiales en el campo de <b> Comentarios </b>. </div>'
      );
      return false;
    }
  } else {
    $('#ap-evaluation-error').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo de <b> Comentarios </b> obligatorio. </div>'
    );
    return false;
  }
}
