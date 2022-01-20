$(document).ready(function() {
  // *************** APLICA PARA TODOS LOS USUARIOS *************** //
  // --------------- validar timepo de sesión --------------- //
  function validate_sesion_time() {
    var ap_session = $('#ap_session').val();
    if (ap_session == "true") {
      // var base = "https://www.erp.apci.com.mx/";
      var base =
        "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
      $.ajax({
        url: base + 'Erpapci/validate-sesion-time',
        success: function(respuesta) {
          if (respuesta == "alert") {
            let timerInterval
            Swal.fire({
              title: '¡ATENCIÓN!',
              text: '¡Faltan 5 minutos para cerrar sesión!',
              type: 'warning',
              timer: 5000,
              onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                  Swal.getContent().querySelector('strong')
                    .textContent = Swal.getTimerLeft()
                }, 100)
              },
              onClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              if (
                result.dismiss === Swal.DismissReason.timer
              ) {}
            });
          } else if (respuesta == "true") {
            let timerInterval
            Swal.fire({
              title: '¡HASTA PRONTO!',
              text: '¡La sesión ha caducado. Favor de volver a iniciar sesión. Gracias!',
              type: 'info',
              timer: 5000,
              onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                  Swal.getContent().querySelector('strong')
                    .textContent = Swal.getTimerLeft()
                }, 100)
              },
              onClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
                window.location.replace(base);
              }
            });
          } else {}
        }
      });
    }
  }
  setInterval(validate_sesion_time, 1000);
  // --------------- validar ubicación del empleado --------------- //
  function validate_geocode() {
    // var base = "https://www.erp.apci.com.mx/";
    var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
    var ap_session = $('#ap_session').val();
    var ap_user = $('#ap_user').val();
    var ap_geolocation = $('#ap_geolocation').val();
    if (ap_session == "true") {
      if (ap_user != "EMapci") {
        if ("geolocation" in navigator) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var ubicacion = position.coords.latitude + "," + position.coords
              .longitude;
            $('#ap_geolocation').val(ubicacion);
          });
          $.ajax({
            url: base + 'Erpapci/validate-geocode/' + ap_geolocation,
            success: function(respuesta) {
              if (respuesta == "false") {
                let timerInterval
                Swal.fire({
                  title: '¡HASTA PRONTO!',
                  text: '¡Has salido de la oficina. Favor de volver a iniciar sesión. Gracias!',
                  type: 'info',
                  timer: 1000,
                  onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                      Swal.getContent().querySelector(
                          'strong')
                        .textContent = Swal.getTimerLeft()
                    }, 100)
                  },
                  onClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                  if (result.dismiss === Swal.DismissReason.timer) {
                    window.location.replace(base);
                  }
                });
              } else {}
            }
          });
        } else {
          var ubicacion = " ";
        }
      }
    }
  }
  // setInterval(validate_geocode, 5000);
  // *************** APLICA LOS USUARIOS EMPLEADOS *************** //
  // --------------- validar nuevas entrevistas de trabajo --------------- //
  function validate_new_task() {
    var ap_company = $('#ap_company').val();
    // var base = "https://www.erp.apci.com.mx/";
    var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
    var ap_session = $('#ap_session').val();
    var ap_user = $('#ap_user').val();
    if (ap_session == "true") {
      if (ap_user != "EMapci") {
        $.ajax({
          url: base + 'ajax/' + ap_company +
            '/validate-new-task',
          success: function(ttask) {
            if (ttask > 0) {
              Push.create('Nueva tarea', {
                body: "Se te agregaron " + ttask +
                  " nueva(s) tarea(s).",
                icon: base + "images/Icono/ERP_Icon_VMP.webp",
                timeout: 5000,
                vibrate: [200, 100, 200],
              });
              $.ajax({
                url: base + "ajax/" + ap_company +
                  '/update-alert-task',
                type: 'POST',
                success: function(respuesta) {}
              });
            } else {}
          }
        });
      }
    }
  }
  setInterval(validate_new_task, 10000);
  // *************** APLICA PARA USUARIOS DE RRHH *************** //
  // --------------- validar nuevos empleados --------------- //
  function validate_new_employee() {
    var ap_company = $('#ap_company').val();
    // var base = "https://www.erp.apci.com.mx/";
    var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
    var ap_session = $('#ap_session').val();
    var ap_user = $('#ap_user').val();
    if (ap_session == "true") {
      if (ap_user == "DTrheo" || ap_user == "ESrheo" || ap_user == "TTrheo") {
        $.ajax({
          url: base + "ajax/" + ap_company +
            '/validate-new-employee',
          success: function(templeado) {
            if (templeado > 0) {
              Push.create('Nuevo empleado', {
                body: "Se agregaron " + templeado +
                  " nuevo(s) empleado(s)",
                icon: base + "images/Icono/ERP_Icon_Emp.webp",
                timeout: 5000,
                vibrate: [200, 100, 200],
              });
              $.ajax({
                url: base + "ajax/" + ap_company +
                  '/update-alert-new-employee',
                type: 'POST',
                success: function(respuesta) {}
              });
            } else {}
          }
        });
      }
    }
  }
  setInterval(validate_new_employee, 10000);
  // --------------- validar nuevas vacantes --------------- //
  function validate_new_job_vacancies() {
    var ap_company = $('#ap_company').val();
    // var base = "https://www.erp.apci.com.mx/";
    var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
    var ap_session = $('#ap_session').val();
    var ap_user = $('#ap_user').val();
    if (ap_session == "true") {
      if (ap_user == "DTrheo" || ap_user == "ESrheo" || ap_user == "TTrheo") {
        $.ajax({
          url: base + "ajax/" + ap_company +
            '/validate-new-job-vacancies',
          success: function(tvacante) {
            if (tvacante > 0) {
              Push.create("Nueva vacante", {
                body: "Se agregaron " + tvacante +
                  " nueva(s) vacante(s)",
                icon: base + "images/Icono/ERP_Icon_V.webp",
                timeout: 5000,
                vibrate: [200, 100, 200],
              });
              $.ajax({
                url: base + "ajax/" + ap_company +
                  '/update-alert-new-job-vacancies',
                type: 'POST',
                success: function(respuesta) {}
              });
            } else {}
          }
        });
      }
    }
  }
  setInterval(validate_new_job_vacancies, 10000);
  // --------------- validar nuevas evaluaciones --------------- //
  function validate_new_evaluation() {
    var ap_company = $('#ap_company').val();
    // var base = "https://www.erp.apci.com.mx/";
    var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
    var ap_session = $('#ap_session').val();
    var ap_user = $('#ap_user').val();
    if (ap_session == "true") {
      if (ap_user == "DTrheo" || ap_user == "ESrheo" || ap_user == "TTrheo") {
        $.ajax({
          url: base + 'ajax/' + ap_company +
            '/validate-new-evaluation',
          success: function(tevaluacion) {
            if (tevaluacion > 0) {
              Push.create('Nueva evaluación', {
                body: "Se agregaron " + tevaluacion +
                  " nueva(s) evaluación(es)",
                icon: base + "images/Icono/ERP_Icon_EME.webp",
                timeout: 5000,
                vibrate: [200, 100, 200],
              });
              $.ajax({
                url: base + "ajax/" + ap_company +
                  '/update-alert-new-evaluation',
                type: 'POST',
                success: function(respuesta) {}
              });
            } else {}
          }
        });
      }
    }
  }
  setInterval(validate_new_evaluation, 10000);
  // --------------- validar nuevos pases de salida --------------- //
  function validate_new_exit_pass() {
    var ap_company = $('#ap_company').val();
    // var base = "https://www.erp.apci.com.mx/";
    var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
    var ap_session = $('#ap_session').val();
    var ap_user = $('#ap_user').val();
    if (ap_session == "true") {
      if (ap_user == "DTrheo" || ap_user == "ESrheo" || ap_user == "TTrheo") {
        $.ajax({
          url: base + 'ajax/' + ap_company +
            '/validate-new-exit-pass',
          success: function($tpases) {
            if ($tpases > 0) {
              Push.create('Nuevo pase de salida', {
                body: "Se agregaron " + $tpases +
                  " nuevo(s) pases(s) de salida",
                icon: base + "images/Icono/ERP_Icon_O.webp",
                timeout: 5000,
                vibrate: [200, 100, 200],
              });
              $.ajax({
                url: base + "ajax/" + ap_company +
                  '/update-alert-new-exit-pass',
                type: 'POST',
                success: function(respuesta) {}
              });
            } else {}
          }
        });
      }
    }
  }
  setInterval(validate_new_exit_pass, 10000);
  // --------------- validar nuevos permisos --------------- //
  function validate_new_work_permits() {
    var ap_company = $('#ap_company').val();
    // var base = "https://www.erp.apci.com.mx/";
    var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
    var ap_session = $('#ap_session').val();
    var ap_user = $('#ap_user').val();
    if (ap_session == "true") {
      if (ap_user == "DTrheo" || ap_user == "ESrheo" || ap_user == "TTrheo") {
        $.ajax({
          url: base + 'ajax/' + ap_company +
            '/validate-new-work-permits',
          success: function(tpermiso) {
            if (tpermiso > 0) {
              Push.create('Nuevo permiso', {
                body: "Se agregaron " + tpermiso +
                  " nuevo(s) permiso(s)",
                icon: base + "images/Icono/ERP_Icon_Per.webp",
                timeout: 5000,
                vibrate: [200, 100, 200],
              });
              $.ajax({
                url: base + "ajax/" + ap_company +
                  '/update-alert-new-work-permits',
                type: 'POST',
                success: function(respuesta) {}
              });
            } else {}
          }
        });
      }
    }
  }
  setInterval(validate_new_work_permits, 10000);
  // --------------- validar nuevas vacaciones --------------- //
  function validate_new_holidays() {
    var ap_company = $('#ap_company').val();
    // var base = "https://www.erp.apci.com.mx/";
    var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
    var ap_session = $('#ap_session').val();
    var ap_user = $('#ap_user').val();
    if (ap_session == "true") {
      if (ap_user == "DTrheo" || ap_user == "ESrheo" || ap_user == "TTrheo") {
        $.ajax({
          url: base + 'ajax/' + ap_company +
            '/validate-new-holidays',
          success: function(tvacacion) {
            if (tvacacion > 0) {
              Push.create('Nuevo día de vacación', {
                body: "Se agregaron " + tvacacion +
                  " día(s) de vacación(es)",
                icon: base + "images/Icono/ERP_Icon_HD.webp",
                vibrate: [200, 100, 200],
              });
              $.ajax({
                url: base + "ajax/" + ap_company +
                  '/update-alert-holidays',
                type: 'POST',
                success: function(respuesta) {}
              });
            } else {}
          }
        });
      }
    }
  }
  setInterval(validate_new_holidays, 10000);
  // --------------- validar vencimiento de vacantes --------------- //
  function validate_vacancy_date() {
    var ap_company = $('#ap_company').val();
    // var base = "https://www.erp.apci.com.mx/";
    var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
    var ap_session = $('#ap_session').val();
    var ap_user = $('#ap_user').val();
    if (ap_session == "true") {
      if (ap_user == "DTrheo" || ap_user == "ESrheo" || ap_user == "TTrheo") {
        $.ajax({
          url: base + "ajax/" + ap_company +
            '/validate-vacancy-date',
          success: function(tvacante) {
            if (tvacante > 0) {
              Push.create("Vacante", {
                body: "El día de hoy tienes " + tvacante +
                  " vacante(s) que se vence la fecha limite.",
                icon: base + "images/Icono/ERP_Icon_V.webp",
                timeout: 5000,
                vibrate: [200, 100, 200],
              });
            } else {}
          }
        });
      }
    }
  }
  setInterval(validate_vacancy_date, 360000);
  // *************** APLICA PARA USUARIOS DE DEVELOPER *************** //
  // --------------- validar nuevas entrevistas de trabajo --------------- //
  function validate_new_job_interviews_FIX() {
    var ap_company = $('#ap_company').val();
    // var base = "https://www.erp.apci.com.mx/";
    var base = "http://127.0.0.1/CodeIgniter/AP-Consultoria-Integral-ERP/";
    var ap_session = $('#ap_session').val();
    var ap_user = $('#ap_user').val();
    if (ap_session == "true") {
      if (ap_user == "4") {
        $.ajax({
          url: base + 'ajax/' + ap_company +
            '/validate-new-job-interviews',
          success: function(tentrevista) {
            if (tentrevista > 0) {
              Push.create('Nueva entrevista', {
                body: "Se agregaron " + tentrevista +
                  " nueva(s) entrevista(s) a una de tus vacantes",
                icon: base + "images/Icono/ERP_Icon_VMP.webp",
                timeout: 5000,
                vibrate: [200, 100, 200],
              });
              $.ajax({
                url: base + "ajax/" + ap_company +
                  '/update-alert-job-interviews',
                type: 'POST',
                success: function(respuesta) {}
              });
            } else {}
          }
        });
      }
    }
  }
  setInterval(validate_new_job_interviews_FIX, 10000);
});
