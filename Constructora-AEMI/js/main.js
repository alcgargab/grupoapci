$(document).ready(function() {
  // $('[data-toggle="tooltip"]').tooltip();
  if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var ubicacion = " " + position.coords.latitude + " " + position.coords
        .longitude;
      $("#aemimensajeAEMI").val(ubicacion);
    });
  } else {
    var ubicacion = " " + position.coords.latitude + " " + position.coords.longitude;
    $("#aemimensajeAEMI").val(ubicacion);
  }
  // var windowcat = $(window).width();

  if (screen.width >= 1200) {
    $('#aemi-subcat-desktop').css('display', 'block');
    $('#aemi-subcat-movil').css('display', 'none');
  } else {
    // alert(screen.width);
    $('#aemi-subcat-desktop').css('display', 'none');
    $('#aemi-subcat-movil').css('display', 'block');
  }

  function categoria() {
    // var windowcat = $(window).width();
    if (screen.width >= 1200) {
      // apartado de categorias
      var duration = 600;
      $('#Cat1').hover(function(event) {
        $("#Cat2").stop().animate({
          'left': '590px'
        }, duration);
        $("#Cat3").stop().animate({
          'left': '880px'
        }, duration);
      });
      $('#Cat2').hover(function(event) {
        $("#Cat2").stop().animate({
          'left': '290px'
        }, duration);
        $("#Cat3").stop().animate({
          'left': '880px'
        }, duration);
      });
      $('#Cat3').hover(function(event) {
        $("#Cat2").stop().animate({
          'left': '295px'
        }, duration);
        $("#Cat3").stop().animate({
          'left': '590px'
        }, duration);
      });

      $('#Cat4').hover(function(event) {
        $("#Cat5").stop().animate({
          'left': '590px'
        }, duration);
        $("#Cat6").stop().animate({
          'left': '880px'
        }, duration);
      });
      $('#Cat5').hover(function(event) {
        $("#Cat5").stop().animate({
          'left': '290px'
        }, duration);
        $("#Cat6").stop().animate({
          'left': '880px'
        }, duration);
      });
      $('#Cat6').hover(function(event) {
        $("#Cat5").stop().animate({
          'left': '295px'
        }, duration);
        $("#Cat6").stop().animate({
          'left': '590px'
        }, duration);
      });
    }
  }
  $(window).on('resize', function(event) {
    categoria();
  });
  categoria();
});
// VALIDAR FORMULARIO DE CONTACTO
function validate_contacto() {
  // --------------- campo nombre --------------- //
  var nombre = $('#Nombre').val();
  if (nombre != "") {
    var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
    if (!expresion.test(nombre)) {
      $('#caemi_error_form').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de nombre. </div>'
      );
      return false;
    }
  } else {
    $('#caemi_error_form').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo telefono --------------- //
  var telefono = $('#NumTelefonico').val();
  if (telefono != "") {
    var expresion = /^[0-9]*$/;
    if (!expresion.test(telefono)) {
      $('#caemi_error_form').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten letras ni caracteres especiales en el campo de teléfono. </div>'
      );
      return false;
    }
  } else {}
  // --------------- campo telefono --------------- //
  var correo = $('#CorreoElectronico').val();
  if (correo != "") {
    var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    if (!expresion.test(correo)) {
      $('#caemi_error_form').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Escriba un correo electrónico existente. </div>'
      );
      return false;
    }
  } else {
    $('#caemi_error_form').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo asunto --------------- //
  var asunto = $('#asunto').val();
  if (asunto != "") {
    var expresion = /^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ., ]*$/;
    if (!expresion.test(asunto)) {
      $('#caemi_error_form').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ERROR: </strong> No se permiten números ni caracteres especiales en el campo de Asunto. </div>'
      );
      return false;
    }
  } else {
    $('#caemi_error_form').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Campo obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo commentarios --------------- //
  var comentarios = $('#Comment').val();
  if (comentarios != "  ") {
    var expresion = /^[-a-zA-ZñÑáéíóúÁÉÍÓÚ0-9,:;.?¿!¡%$#&/()=+\n_ ]*$/;
    if (!expresion.test(comentarios)) {
      $('#caemi_error_form').html(
        '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> No se permiten caracteres especiales en el campo de Mensaje. </div>'
      );
      return false;
    }
  } else {
    $('#caemi_error_form').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Mensaje campo obligatorio. </div>'
    );
    return false;
  }
  // --------------- campo recaptcha --------------- //
  var captcha = grecaptcha.getResponse();
  if (captcha.length == 0) {
    $('#caemi_error_form').html(
      '<div class="alert alert-danger alert-dismissible fade show"> <button type ="button" class="close" data-dismiss="alert"> &times; </button> <strong> ATENCIÓN: </strong> Falta validar captcha. </div>'
    );
    return false;
  } else {
    return true;
  }
  return true;
}
