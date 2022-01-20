// CONTADOR DE VISTAS
var contador = 0;
$(window).on("load", function() {
  var vistasServicio = $('.VistasServicio').val();
  if (typeof vistasServicio !== 'undefined') {
    contador = Number(vistasServicio) + 1;
    $('.VistasServicio').val(contador);
    // SUBIR LA NUEVA VISTA A LA BASE DE DATOS
    var base = $("#base").val();
    var datos = new FormData();
    var tabla = "tbl_servicio";
    var campo = "Vistas";
    var rutalocal = location.pathname;
    // CONVERTIR LA VARIABLE EN UN ARREGLO
    var idProd = rutalocal.split("/");
    // OBTENERMOS EL ULTIMO VALOR DEL ARREGLO
    var ruta = idProd.pop();
    // console.log(ruta);
    $.ajax({
      url: base + 'TelevialesAdm/UpdateServicio/' + tabla + '/' +
        contador + '/' + campo + '/' + ruta,
      success: function(respuesta) {}
        // console.log(respuesta);
    });
  }
  var vistasSubServicio = $('.VistasSubServicio').val();
  // ACTUALIZAR LAS VISTAS DE LOS SUBSERVICIOS
  if (typeof vistasSubServicio !== 'undefined') {
    contador = Number(vistasSubServicio) + 1;
    // console.log(vistasSubServicio);
    $('.VistasServicio').val(contador);
    // SUBIR LA NUEVA VISTA A LA BASE DE DATOS
    var base = $("#base").val();
    // var datos = new FormData();
    var campo = "Vistas";
    var tabla = "tbl_subser";
    var rutalocal = location.pathname;
    // CONVERTIR LA VARIABLE EN UN ARREGLO
    var idProd = rutalocal.split("/");
    // OBTENERMOS EL ULTIMO VALOR DEL ARREGLO
    var ruta = idProd.pop();
    $.ajax({
      url: base + 'TelevialesAdm/UpdateServicio/' + tabla + '/' +
        contador + '/' + campo + '/' + ruta,
      success: function(respuesta) {}
        // console.log(respuesta);
    });
  }
});
$(document).ready(function() {
  $("#televia_btn_DW").click(function(event) {
    var solicitudSubServicio = $('.SolicitudSubServicio').val();
    console.log(solicitudSubServicio);
    // ACTUALIZAR LAS SOLICITUDES DE LOS SUBSERVICIOS
    if (typeof solicitudSubServicio !== 'undefined') {
      contador = Number(solicitudSubServicio) + 1;
      $('.SolicitudSubServicio').val(contador);
      // SUBIR LA NUEVA VISTA A LA BASE DE DATOS
      var base = $("#base").val();
      // var datos = new FormData();
      var tabla = "tbl_subser";
      var campo = "Solicitud";
      var rutalocal = location.pathname;
      // CONVERTIR LA VARIABLE EN UN ARREGLO
      var idProd = rutalocal.split("/");
      // OBTENERMOS EL ULTIMO VALOR DEL ARREGLO
      var ruta = idProd.pop();
      $.ajax({
        url: base + 'TelevialesAdm/UpdateServicio/' + tabla + '/' +
          contador + '/' + campo + '/' + ruta,
        success: function(respuesta) {}
          // console.log(respuesta);
      });
    }
  });
  if ("geolocation" in navigator) { //check geolocation available
    //try to get user current location using getCurrentPosition() method
    navigator.geolocation.getCurrentPosition(function(position) {
      // console.log("Found your location nLat : " + position.coords.latitude +
      //   " nLang :" + position.coords.longitude);
      var ubicacion = " " + position.coords.latitude + " " + position.coords
        .longitude;
      $("#TelevialesmensajeTELEVIALES").val(ubicacion);
    });
  } else {
    // console.log("Browser doesn't support geolocation!");
    var ubicacion = "" + position.coords.latitude + "" + position.coords
      .longitude;
    $("#TelevialesmensajeTELEVIALES").val(ubicacion);
  }
  $('[data-toggle="tooltip"]').tooltip();
  $("#SearchUser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tablaUserBody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) >
        -1)
    });
  });
  // grecaptcha.ready(function() {
  //   grecaptcha.execute('6LdC9JwUAAAAAGwKNPrr3n2gUhElyBgyQz3_ol0c', {
  //     action: 'homepage'
  //   }).then(function(token) {
  //     // console.log(token);
  //     $("#g-recaptcha-response").val(token);
  //   });
  // });
  // $("#btnCookies").click(function() {
  //   function getCookie(c_name) {
  //     var c_value = document.cookie;
  //     var c_start = c_value.indexOf(" " + c_name + "=");
  //     if (c_start == -1) {
  //       c_start = c_value.indexOf(c_name + "=");
  //     }
  //     if (c_start == -1) {
  //       c_value = null;
  //     } else {
  //       c_start = c_value.indexOf("=", c_start) + 1;
  //       var c_end = c_value.indexOf(";", c_start);
  //       if (c_end == -1) {
  //         c_end = c_value.length;
  //       }
  //       c_value = unescape(c_value.substring(c_start, c_end));
  //     }
  //     return c_value;
  //   }
  //
  //   function setCookie(c_name, value, exdays) {
  //     var exdate = new Date();
  //     exdate.setDate(exdate.getDate() + exdays);
  //     var c_value = escape(value) + ((exdays == null) ? "" :
  //       "; expires=" +
  //       exdate.toUTCString());
  //     document.cookie = c_name + "=" + c_value;
  //   }
  //   if (getCookie('aviso') != 1) {
  //     // document.getElementById("barracookies").style.display="block";
  //     $("#barracookies").css('display', 'block');
  //   }
  //
  //   function PonerCookie() {
  //     setCookie('aviso', 1, 365);
  //     // document.getElementById("barracookies").style.display="none";
  //     $("#barracookies").css('display', 'none');
  //   }
  //   $("#barracookies").css('display', 'none');
  // });

});
// VALIDAR FORMULARIO DE CONTACTO
function registroUsuario() {
  // VALIDAR CAMPO NOMBRE
  var usuario = $('#Name').val();
  if (usuario != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(usuario)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de nombre. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // VALIDAR CAMPO EMAIL
  var correo = $('#email').val();
  if (correo != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(correo)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Escriba un correo electrónico existente. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // VALIDAR CAMPO ASUNTO
  var asunto = $('#subject').val();
  if (asunto != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(asunto)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de asunto. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // VALIDAR CAMPO TELEFONO
  var telefono = $('#tel').val();
  if (telefono != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(telefono)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de teléfono. </div>'
      );
      return false;
    }
  } else {
    // $('#errorForm').html(
    //   '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    // );
    // return false;
  }
  // VALIDAR CONTRASEÑA
  var comentarios = $('#Comment').val();
  if (comentarios != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,.-?¿!¡*+ ]*$/;
    if (!expresion.test(comentarios)) {
      $('#errorForm').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> No se permiten caracteres especiales en el campo de comentarios. </div>'
      );
      return false;
    }
  } else {
    $('#errorForm').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  return true;
}
