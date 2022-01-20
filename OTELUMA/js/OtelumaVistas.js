// CONTADOR DE VISTAS
var contador = 0;
$(window).on("load", function() {
  var vistas = $("span.vistas").html();
  // console.log(vistas);
  if (typeof vistas !== 'undefined') {
    contador = Number(vistas) + 1;
    $("span.vistas").html(contador);
    // SUBIR LA NUEVA VISTA A LA BASE DE DATOS
    var base = $("#base").val();
    var datos = new FormData();
    var campo = "Vistas";
    // var idProd = $("#idProd").val();
    var rutalocal = location.pathname;
    // CONVERTIR LA VARIABLE EN UN ARREGLO
    var idProd = rutalocal.split("/");
    // OBTENERMOS EL ULTIMO VALOR DEL ARREGLO
    var ruta = idProd.pop();
    $.ajax({
      url: base + 'Producto/UpdateVistas/' + contador + '/' + campo +
        '/' + ruta,
      success: function(respuesta) {}
        // console.log(respuesta);
    });
  }
});

$(document).ready(function() {
  function reporte() {
    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo",
      "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre",
      "Diciembre");
    var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles",
      "Jueves", "Viernes", "Sábado");
    var fecha = new Date();
    // console.log(diasSemana[fecha.getDay()] + ", " + fecha.getDate() +
    //   " de " + meses[fecha.getMonth()] + " de " + fecha.getFullYear());
    var diasemana = fecha.getDay();
    var dia = fecha.getDate();
    var mes = fecha.getMonth();
    var anio = fecha.getFullYear();
    var hora = fecha.getHours();
    var minutos = fecha.getMinutes();
    var segundos = fecha.getSeconds();
    var horalocal = hora + ":" + minutos + ":" + segundos;
    // console.log(horalocal);
    // console.log(diasemana);
    // VALIDAMOS EL MES
    if (mes == 0) {
      console.log('Enero');
    } else if (mes == 1) {
      console.log('Febrero');
    } else if (mes == 2) {
      console.log('Marzo');
    } else if (mes == 3) {
      // console.log('Abril');
      // VALIDAMOS EL DÍA
      if (dia == 30) {
        // SI ES FIN DE SEMANA | INSERTAMOS LAS VISTAS SEMANALES

        // NO ES FIN DE SEMANA | INSERTAMOS LAS VISTAS DIARIAS
      } else {
        // VALIDAMOS EL DIA DE LA SEMANA
        if (fecha.getDay() == 7) {
          // SI ES DOMINGO | GUARDAREMOS LAS VISTAS TOTALES DE LA SEMANA
          // console.log('Domingo');
        } else {
          // NO ES FIN DE SEMANA | GUARDARMOS LAS VISTAS DEL DÍA
          console.log(diasemana);
          // VALIDAMOS LA HORA
          if (hora == 23 && minutos == 59 && segundos == 59) {
            // SI SON LAS 11:59:59 | INSERTAMOS VISTAS
            console.log('listo');
          } else {
            // NO SON LAS 11:59:59 | ESPERAMOS A LA HORA
            console.log('no listo');
          }
        }
      }

    } else if (mes == 4) {
      console.log('Mayo');
    } else if (mes == 5) {
      console.log('Junio');
    } else if (mes == 6) {
      console.log('Juliuo');
    } else if (mes == 7) {
      console.log('Agosto');
    } else if (mes == 8) {
      console.log('Septiembre');
    } else if (mes == 9) {
      console.log('Octubre');
    } else if (mes == 10) {
      console.log('Noviembre');
    } else {
      console.log('Diciembre');
    }
  }
  setInterval(reporte, 1000);
});
